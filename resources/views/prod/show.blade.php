@extends('layouts.dash_admin')

@section('menu')
    
@endsection

@section('content')


{{-- <pre>{{$prod->id}}</pre> <br>  --}}
{{-- @isset($producto)
    <pre>{{$producto}}</pre> <br>
@endisset

@isset($prodV)
    <pre>{{$prodV}}</pre>
@endisset --}}


<prod-show :prod="{{ $producto }}" :prodv="{{ $prodV }}"></prod-show> 
{{-- <prod-show :prod="{{ $prod }}" :prodv="{{$prodV}}"></prod-show> --}}

{{-- <div class="row">
    <div class="col">
        <prod-almacen-add :prod_id="{{$prod->id}}"></prod-almacen-add>
    </div>
    <div class="col">
        <prod-detalle-add :prod_id="{{$prod->id}}"></prod-detalle-add> 
    </div>
</div>     --}}

@endsection