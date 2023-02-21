@extends('layouts.dash_admin')

@section('content')

<div class="card mt-4 bg-light mb-3">
    <div class="card-header p-2 ">
        <h3 class="float-left d-print-block">Listado de Productos</h3> 
        <form class="form-inline float-right d-print-none" action="{{ url('/admin/precios/search')}}" method="POST" >
            {!! csrf_field() !!}
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
    <div class="card-body table-reponsive-sm p-0 ">
        <table class="table table-hover table-sm d-print-table" style="font-size: 0.8em">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" class="text-center">Codigo</th>
                    <th scope="col" class="text-center">Nombre</th>
                    {{-- <th scope="col" class="text-center">unidad</th>
                    <th scope="col" class="text-center">Existencia</th> --}}
                    <th scope="col" class="text-center">Costo</th>
                    <th scope="col" class="text-center">Descuento</th>
                    <th scope="col" class="text-center">Costo Total</th>
                    <th scope="col" class="text-center">Meson</th>
                    <th scope="col" class="text-center">Mayorista</th>
                    <th scope="col" class="text-center">Distribucion</th>
                    <th scope="col" class="text-center">Cambio</th>
                    {{-- <th scope="col" class="text-center">2</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($prods as $prod)                     
                <tr>
                    <td class="text-right align-middle" >{{ $prod->codinterno }}</td>
                    <td class="align-middle"> <span class="d-inline-block text-wrap" style="max-width: 300px;"> <a href="{{ url('/admin/productos/' . $prod->slug) }}">{{ $prod->nombre }}</a> </span> </td>
                    <td class="text-right align-middle">{{ '$ '.number_format($prod->pcosto, 0, ',', '.') }}</td>
                    <td class="text-right align-middle">{{ number_format($prod->desct1, 2, ',', '.').' %' }}</td>
                    <td class="text-right align-middle">{{ '$ '.number_format($prod->costotot, 0, ',', '.') }}</td>
                    <td class="text-right align-middle">{{ '$ '.number_format($prod->p1_venta, 0, ',', '.') }}</td>
                    <td class="text-right align-middle">{{ '$ '.number_format($prod->p2_venta, 0, ',', '.') }}</td>
                    <td class="text-right align-middle">{{ '$ '.number_format($prod->p3_venta, 0, ',', '.') }}</td>
                    <td class="text-right align-middle">{{ date("d-m-Y", strtotime( $prod->created_at)) }}</td>
                </tr>    
                @endforeach 
            </tbody>
        </table>       
    </div>
    <div class="card-footer d-flex justify-content-center p-2 t-0 d-print-none">
        {{ $prods->links() }}
    </div>
    
</div> 

@endsection