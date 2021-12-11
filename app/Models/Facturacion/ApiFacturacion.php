<?php

namespace App\Models\Facturacion;

use DOMDocument;
use Illuminate\Database\Eloquent\Model;
use ZipArchive;

class ApiFacturacion extends Model
{
    public function EnviarComprobanteElectronico($emisor, $nombre, $rutacertificado = "", $ruta_archivo_xml = "xml/", $ruta_archivo_cdr = "cdr/")
    {
        //PASO 02: FIRMAR DIGITALMENTE - INICIO
        $objFirma = new Signature();
        $flg_firma = 0; //posicion donde se firma en el XML
        $ruta = $ruta_archivo_xml . $nombre . '.xml';
        $ruta_firma = $rutacertificado . '20602546391.pfx';
        $pass_firma = 'Peru123';
        $objFirma->signature_xml($flg_firma, $ruta, $ruta_firma, $pass_firma);
        //echo "</br>PASO 02: XML Firmado digitalmente";
        //PASO 02: FIRMAR DIGITALMENTE - FIN

        //PASO 03: COMPRIMIR EN ZIP - INICIO
        $zip = new ZipArchive();
        $nombrezip = $nombre . '.ZIP';
        $ruta_zip = $ruta_archivo_xml . $nombre . '.ZIP';

        if ($zip->open($ruta_zip, ZipArchive::CREATE) == TRUE) {
            $zip->addFile($ruta, $nombre . '.XML');
            $zip->close();
        }
        //echo "<br>PASO 03: XML comprimido en formato $nombre.ZIP";
        //PASO 03: COMPRIMIR EN ZIP - FIN

        //PASO 04: Codificar en base64 el .ZIP - INICIO
        $ruta_archivo = $ruta_zip;

        $nombre_archivo = $nombrezip;
        $contenido_del_zip = base64_encode(file_get_contents($ruta_archivo));
        //echo "</br>PASO 04: ZIP codificado en base64: "; // . $contenido_del_zip;
        //PASO 04: Codificar en base64 el .ZIP - FIN

        //PASO 05: ENVIO Y RPTA DE SUNTA - WB - INICIO

        //WS BETA DE SUNAT
        $ws = "https://e-beta.sunat.gob.pe/ol-ti-itcpfegem-beta/billService";
        //ws DE SUNAT PRODUCCION
        //$ws = https://e-factura.sunat.gob.pe/ol-ti-itcpfegem/billService

        $xml_envio = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ser="http://service.sunat.gob.pe" xmlns:wsse="http://docs.oasisopen.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd">
            <soapenv:Header>
                <wsse:Security>
                    <wsse:UsernameToken>
                        <wsse:Username>' . $emisor['ruc'] . $emisor['usuario_secundario'] . '</wsse:Username>
                        <wsse:Password>' . $emisor['clave_usuario_secundario'] . '</wsse:Password>
                    </wsse:UsernameToken>
                </wsse:Security>
            </soapenv:Header>
            <soapenv:Body>
                <ser:sendBill>
                    <fileName>' . $nombre_archivo . '</fileName>
                    <contentFile>' . $contenido_del_zip . '</contentFile>
                </ser:sendBill>
            </soapenv:Body>
        </soapenv:Envelope>';

        $header = array(
            "Content-type: text/xml; charset=\"utf-8\"",
            "Accept: text/xml",
            "Cache-Control: no-cache",
            "Pragma: no-cache",
            "SOAPAction: ",
            "Content-lenght: " . strlen($xml_envio)
        );

        $ch = curl_init(); //inicia la llamada
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1); //
        curl_setopt($ch, CURLOPT_URL, $ws); //url a consultar
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_envio);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_CAINFO, $rutacertificado . "cacert.pem"); //windows, cuando estemos productivos comenta esta linea

        $response = curl_exec($ch); //Ejecutar y obtiene respuesta
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        //echo "</br>PASO 05: Envio del XML envelope a SUNAT ".$response;

        //PASO 05: ENVIO Y RPTA DE SUNTA - WB - FIN

        //PASO 06 - 09: RECIBIR LA RPTA DE SUNAT - INICIO
        $estadofe = '0'; // aun no se ha enviado a sunat

        if($httpcode == 200)//hubo conexion
        {
            $doc = new DOMDocument();
            $doc->loadXML($response); //lo que tengo en memoria lo convierto en un XML

            if(isset($doc->getElementsByTagName('applicationResponse')->item(0)->nodeValue))
            {
                $cdr = $doc->getElementsByTagName('applicationResponse')->item(0)->nodeValue;
                //echo "</br>PASO 06: Obtuve respuesta de SUNAT";

                $cdr = base64_decode($cdr);
                //echo "</br>PASO 07: Respuesta de SUNAT decodificada";

                file_put_contents($ruta_archivo_cdr . "R-" . $nombrezip, $cdr);//ZIP DE MEMORIA A DISCO LOCAL
                $zip = new ZipArchive();
                if($zip->open($ruta_archivo_cdr . 'R-' . $nombrezip) == TRUE)
                {
                    $zip->extractTo($ruta_archivo_cdr, 'R-' . $nombre . '.XML');
                    $zip->close();
                    //echo "</br>PASO 08: ZIP copiado y extraido a disco";
                }
                $estadofe = '1';//Todo Correcto
                //echo "</br>PASO 09: PROCESO TERMINADO";
            }
            else
            {
                $estadofe = '2';//error o obs
                $codigo = $doc->getElementsByTagName('faultcode')->item(0)->nodeValue;
                $mensaje = $doc->getElementsByTagName('faultstring')->item(0)->nodeValue;
                //echo "</br> Ocurrio un error con código: " . $codigo . " Msje: " . $mensaje;
            }
                return $estadofe;
        }
        else
        {
            $estadofe = '3';//problemas de conexion
            //echo curl_error($ch);
            //echo "</br> Problema de conexión";
            return $estadofe;
        }

        //PASO 06: RECIBIR LA RPTA DE SUNAT - FIN
    }
}
