@extends('layouts.dash_admin')

@section('menu')
    {{-- hola mundo --}}
@endsection

@section('content')


<inven-create></inven-create>


{{-- <div class="card">
    <div class="card-header">
            <h3 class="float-left">Ingreso de Inventario</h3> 
    <form class="form-inline float-right" action="{{ route('inventario.index')}}" method="GET" >
                
                @csrf
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    </div>
    <div class="card-body table-reponsive p-0">
        <table class="table table-md table-striped table-inverse table-hover table-responsive ">
            <thead class="thead-inverse">
                <tr>
                    <th class="text-center">Codigo Interno</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Cantidad</th>
                    <th class="text-center">Unidad</th>
                    <th class="text-center">Actividad</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($prods as $prod)
                        <tr>
                            <td scope="row">{{ $prod->codinterno }}</td>
                            <td><a href="{{ url('/admin/productos/' . $prod->slug) }}">{{ $prod->nombre }}</a></td>
                            <td> {{ $prod->cantidad }}</td>
                            <td>{{ $prod->unidad }} </td>
                            <td>
                                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
                                    Nuevo
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
    <div class="card-footer text-muted">
        {{ $prods->links() }}
    </div>
</div> --}}

<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
  Launch
</button> --}}

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">
                    
                <form action="{{ route('inventario.store')}}" method="post">
                    <div class="container">
                        <form>
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-1-12 col-form-label"></label>
                                <div class="col-sm-1-12">
                                    <input type="text" class="form-control" name="inputName" id="inputName" placeholder="">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-1-12 col-form-label"></label>
                                <div class="col-sm-1-12">
                                    <input type="text" class="form-control" name="inputName" id="inputName" placeholder="">
                                </div>
                            </div>
                        </form>
                    </div>
                </form>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>



@endsection

