<?php

namespace App\Http\Livewire\Admin\Pagos;

use App\Models\Facturacion\ApiFacturacion;
use App\Models\Facturacion\Xml;
use App\Models\Pago;
use Livewire\Component;
use Luecano\NumeroALetras\NumeroALetras;

class PagoProcesar extends Component
{

    public $open = false;
    public $pago, $estadofe="";
    public function mount(Pago $pago)
    {
        $this->pago = $pago;
    }
    public function save()
    {
        $pago = Pago::where("id", $this->pago->id)->first();
        $n = new NumeroALetras;
        $emisor = array(
            'tipodoc'                   =>  '6',
            'ruc'                       =>  '20602546391',
            'razon_social'              =>  'ASOC. MOTOS SAC',
            'nombre_comercial'          =>  'MOTOTAXIS 6 OCTUBRE',
            'direccion'                 =>  'CALLE REAL 123',
            'pais'                      =>  'PE',
            'departamento'              =>  'PIURA',
            'provincia'                 =>  'PIURA',
            'distrito'                  =>  'CASTILLA',
            'ubigeo'                    =>  '200104',
            'usuario_secundario'        =>  'DTORRES1', //MODDATOS=USUARIO SECUNDARIO DE PRUEBA DE SUNAT
            'clave_usuario_secundario'  =>  'Solidaria1+',
        );

        $cliente = array(
            'tipodoc'           =>  '1', //1:dni, 6: ruc; 0:sin ruc o sin DNI u otro
            'ruc'               =>  $this->pago->socio->numero,
            'razon_social'      =>  $this->pago->socio->user->name,
            'direccion'         =>  'LIMA',
            'pais'              =>  'PE'
        );

        $comprobante = array(
            'tipodoc'           =>  '03', //01: FA, 03: BV
            'serie'             =>  'B001',
            'correlativo'       =>  $this->pago->id,
            'fecha_emision'     =>  date('Y-m-d'),
            'moneda'            =>  'PEN',
            'total_opgravadas'  =>  0,
            'total_opexoneradas'    =>  0,
            'total_opinafectas'     =>  0,
            'igv'                   =>  0,
            'total'                 =>  0,
            'total_texto'           =>  '',
            'forma_pago'           =>  'Contado',
        );

        $detalle = array(
            array(
                'item'                      =>  1,
                'codigo'                    =>  'COD01',
                'descripcion'               =>  'por la Falta que me haces :v',
                'cantidad'                  =>  1,
                'unidad'                    =>  'NIU',
                'valor_unitario'            =>  $this->pago->opgravadas,
                'precio_unitario'           =>  $this->pago->total,
                'tipo_precio'               =>  '01', //01:CON IGV, 02: SIN IGV
                'igv'                       =>  $this->pago->igv,
                'porcentaje_igv'            =>  18,
                'valor_total'               =>  $this->pago->opgravadas,
                'importe_total'             =>  $this->pago->total,
                'codigo_afectacion_alt'     =>  '10', //10: GRAVADOS/IGV, 20: EXONERADOS, 30: INAFECTOS
                'codigo_afectacion'         =>  '1000',
                'nombre_afectacion'         =>  'IGV',
                'tipo_afectacion'           =>  'VAT'
            ),
        );
        $op_grabadas = 0;
        $op_inafectas = 0;
        $op_exoneradas = 0;
        $igv = 0;
        $total = 0;

        foreach ($detalle as $k => $v) {
            if ($v['codigo_afectacion_alt'] == '10') //OPERACIONES GRABADAS
            {
                $op_grabadas = $op_grabadas + $v['valor_total'];
            }
            if ($v['codigo_afectacion_alt'] == '20') //OPERACIONES EXONERADAS
            {
                $op_exoneradas = $op_exoneradas + $v['valor_total'];
            }
            if ($v['codigo_afectacion_alt'] == '30') //OPERACIONES INAFECTOS
            {
                $op_inafectas = $op_inafectas + $v['valor_total'];
            }
            $igv = $igv + $v['igv'];
            $total = $total + $v['importe_total'];
        }
        $comprobante['total_opgravadas'] = $op_grabadas;
        $comprobante['total_opexoneradas'] = $op_exoneradas;
        $comprobante['total_opinafectas'] = $op_inafectas;
        $comprobante['igv'] = $igv;
        $comprobante['total'] = $total;
        $comprobante['total_texto'] = $n->toInvoice($comprobante['total'], 2, 'SOLES');
        //paso 1 crear xml
        $nombreXML = $emisor["ruc"] . "-" . $comprobante['tipodoc'] . '-' . $comprobante['serie'] . '-' . $comprobante['correlativo'];
        $ruta = storage_path('app\\public\\Facturacion') . '\\xml\\';
        $xml = new Xml();
        $xml->CrearXML($nombreXML, $ruta, $emisor, $cliente, $comprobante, $detalle);
        //fin paso 1
        $objApi = new ApiFacturacion();
        $rutacertificado = public_path() . '\\certificados\\';
        $ruta_archivo_cdr = storage_path('app\\public\\Facturacion') . '\\cdr\\';
        $ruta_archivoxml = storage_path('app\\public\\Facturacion') . '\\xml\\';

        $estadofe = $objApi->EnviarComprobanteElectronico($emisor, $nombreXML, $rutacertificado, $ruta_archivoxml, $ruta_archivo_cdr);
        $pago->update([
            'estadofe' => $estadofe,
        ]);
        $this->reset(['open']);
        $this->emitTo('admin.pagos.pagos-index','render');
        $this->emit('alert');

    }

    public function render()
    {
        return view('livewire.admin.pagos.pago-procesar');
    }
}
