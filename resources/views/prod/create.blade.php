
@extends('layouts.dash_admin')

@section('menu')
    {{-- hola mundo --}}
@endsection

@section('content')

    {{-- <pre>{{ json_encode(Session::getOldInput()) }}</pre> --}}

    @if ($status)

        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>  {{ $status }} </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

    @endif

    
    @if($errors->any())
    
        <prod-add :errors="{{$errors}}" :olds="{{ json_encode(Session::getOldInput()) }}">
            {{ csrf_field() }}
        </prod-add>

    @else

        <prod-add :errors=null :olds="null">
            {{ csrf_field() }}
        </prod-add>

    @endif


@endsection