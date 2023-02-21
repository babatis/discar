@extends('layouts.dash_admin')

@section('content')

    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                {{-- <div class="card-header">Dashboard</div> --}}

                <div class="card-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                            
                        </div>
                    @endif
                    @auth
                        <h3>Bienvenido  {{ Auth::user()->name }} </h3>
                        <br>
                    @else 
                        <h3>ERROR DE SESSION</h3>
                    @endauth
                           
                    @auth
                        <rotacion-venta></rotacion-venta>    
                    @endauth

                </div>

            </div>
        </div>
    </div>

@endsection
