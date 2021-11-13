@extends('layouts.basePage')
@section('content')
    <!-- Page Content -->
    <div class="m-auto">
        <div class=" flex-row lg:flex bg-cover pt-4 bg-center bg-fixed text-center" style="background-image: url({{asset('img/fondomoto.png')}})">
            <div class="mt-30">
                <iframe class="mt-20 ml-8 mb-30 w-80 sm:w-96 sm:mt-20" width="560" height="315" src="https://www.youtube.com/embed/Ke0QgLHog8I?autoplay=1" title="YouTube video player" frameborder="0" allow="autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class=" mt-10 pb-4 md:mt-10 lg:m-auto pr-10 -space-y-5 lg:pr-24">

                <div class="font-bold text-xl md:font-extrabold lg:text-3xl lg:font-extrabold mb-4 mt-5 ">
                    <span class=" pl-10 bg-clip-text md:font-bold  text-transparent lg:font-bold- bg-gradient-to-r from-green-300 to-red-600">
                        Bienvenido a la Pagina de Administracion de Mototaxistas 8 Diciembre
                    </span>
                  </div>

            <span class=" italic text-base text-yellow-100">tu mejor opcion en servicio de Trimovil</span>
            </div>
            </div>
    </div>
@endsection
