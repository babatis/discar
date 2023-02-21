@extends('layouts.dash_admin')

@section('content')
    
    <venta-show :vent="{{ $ventas }}"></venta-show>

@endsection