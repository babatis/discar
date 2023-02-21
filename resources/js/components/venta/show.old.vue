<template>
    <div>

        <div v-if="isErr" class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error</strong> - {{this.outErr}}
            <button type="button" class="close" data-dismiss="alert" @click="isErr = !isErr">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <!-- editar el v-show con el btn de close -->
        <div v-if="isClose" class="alert alert-success alert-dismissible fade show" role="alert">
            {{ this.outPut }} 
            <button type="button" class="close" data-dismiss="alert" @click="isClose = !isClose">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>


        <div class="clearfix" >
            <div class="btn-group ml-3 mb-3 float-right" role="group">
                <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
                </button>
                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                <a class="dropdown-item" href="#">Editar</a>
                <a class="dropdown-item" href="#" @click="onStoreVenta()">Guardar</a>
                </div>
            </div>
        </div>

        <!-- cliente -->
        <div class="card">
            <div class="card-body">
                <div class="clearfix" >
                    <h3 class="float-left justify-content-center m-0 pt-2"> <strong>Nota de Ventas</strong> </h3>
                    <!-- <button type="button" class="btn  btn-primary " @click="onStoreVenta()"> <strong>Guardar</strong></button> -->
                    
                    <h3 class="float-right border border-primari p-2 m-1" > <strong class="text-danger">F: 23456</strong> </h3>
                    <h3 class="float-right border border-danger p-2 m-1" > <strong class="text-danger">NV: {{this.vent}}</strong> </h3>
                </div> 
                
                <hr class="mt-1">
                <div class="clearfix">
                    <h4 class="float-left "> Cliente</h4> 
                    <button type="button" class="btn btn-sm btn-secondary float-right" data-toggle="modal" data-target="#cliente"> <strong><i class="fas fa-search"></i> Cliente</strong></button>
                </div>

               
               
                <!-- <hr class="mt-1"> -->
               <div class="form-row">
                   <div class="form-group col-sm-12 col-lg-9  mb-1">
                     <label for="" class="mb-0"> <strong>Nombre</strong> </label>
                     <input type="text" name="" id="nombrec" class="form-control form-control-sm" placeholder="" v-model="setclient.nombre">
                     
                   </div>
                    <div class="form-group col-sm-12 col-lg-3 mb-1">
                     <label for="" class="mb-0"> <strong>Rut</strong> </label>
                     <input type="text" name="" id="" class="form-control form-control-sm" placeholder="" v-model="setclient.rut">
                   </div>
               </div>
                <div class="form-row">
                    <div class="form-group col-sm-12 col-lg-9 mb-1">
                        <label for="" class="mb-0"> <strong>Direccion</strong>  </label>
                        <input type="text" name="" id="" class="form-control form-control-sm" placeholder=""  v-model="setclient.direccion">
                    </div>
                    <div class="form-group col-sm-12 col-lg-3 mb-1">
                        <label for=""  class="m-0" > <strong>Ciudad</strong> </label>                                        
                        <select class="form-control form-control-sm" id="" v-model="setclient.ciudad">
                            <option v-for="(ciudad, index) in this.setCiudad" :key="index" :value="ciudad.PROVINCIA_ID">
                                {{ ciudad.PROVINCIA_NOMBRE}}
                            </option>
                        </select>
                    </div>
               </div>
               <div class="form-row">
                   <div class="form-group col-sm-12 col-lg-2 mb-1">
                     <label for="" class="mb-0"> <strong>Telefono</strong> </label>
                     <input type="text" name="" id="" class="form-control form-control-sm" placeholder="" v-model="setclient.fono">
                   </div>
                   <div class="form-group col-sm-12 col-lg-2 mb-1">
                     <label for="" class="mb-0"> <strong>Celular</strong> </label>
                     <input type="text" name="" id="" class="form-control form-control-sm" placeholder="" v-model="setclient.celular">
                   </div>
                   <div class="form-group col-sm-12 col-lg-2 mb-1">
                     <label for="" class="mb-0"> <strong>Forma de Pago</strong> </label>
                     <!-- <input type="text" name="" id="" class="form-control form-control-sm" placeholder="" > -->
                     <select name="" id="" class="form-control form-control-sm">
                         <option value="1">Contado</option>
                         <option value="2">Credito</option>
                         <option value="3">Sin Costo</option>
                     </select>

                   </div>
               </div>
                <hr>
                <div>
                    <h4 class="float-left "> Productos</h4> 
                    <button type="button" class="btn btn-sm btn-secondary float-right" data-toggle="modal" data-target="#productos"> <strong><i class="fas fa-search"></i> Producto</strong></button>
                </div>
                
               <!-- TABLA -->
               <table class="table table-sm table-striped table-inverse table-borden table-bordered">
                   <thead class="thead-dark">
                       <tr>
                           <th>N°</th>
                           <th>Codigo</th>
                           <th>Producto</th>
                           <th>catintidad</th>
                           <th>unidad</th>
                           <th>Precio</th>
                           <th>% Desc</th>
                           <!-- <th>P. Unidad</th> -->
                           <th>Total</th>
                       </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(prod, index) of this.setdtll" :key="index">
                            <th scope="row">{{prod.item = index + 1}}</th>
                            <td scope="row">{{prod.codinterno}}</td>
                            <td>{{prod.nombre}}</td>
                            <td>{{prod.cantidad}}</td>
                            <td>unidad</td>
                            <td>$ {{prod.p3_neto}}</td>
                            <td>{{prod.descuento}}</td>
                            <!-- <td>$10000</td> -->
                            <td>$ {{prod.cantidad * prod.p3_neto}}</td>
                        </tr>
                    </tbody>
               </table>
               <hr class="mt-0">
                <div class="row p-1">

                
                <div class="col-sm-4 offset-sm-8">

                <div class="form-row">
                    <div class="form-group col-sm m-0">
                        <div class="input-group input-group-sm mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default"> <strong>Sub Total</strong> </span>
                            </div>
                            <input type="text" class="form-control form-control-sm text-right" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" v-model="this.res.sub">
                        </div>
                    </div>     
                </div>
                
                <div class="form-row">
                    <div class="form-group col-5 col-sm-12 m-0">
                        <div class="input-group input-group-sm mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default"> <strong>Descuento</strong> </span>
                            </div>
                            <input type="text" class="form-control form-control-sm text-right" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" v-model="res.desc" @keyup.enter="onMonto">
                            <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default"> <strong>%</strong> </span>
                            </div>
                        </div>   
                    </div>
                    <div class="form-group col-7 col-sm-12 m-0">
                        <div class="input-group input-group-sm mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default"> <strong>Monto</strong> </span>
                            </div>
                            <input type="text" class="form-control form-control-sm text-right" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" v-model="res.mont">
                        </div>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col mb-0">
                        <div class="input-group input-group-sm mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default"> <strong>Neto</strong> </span>
                            </div>
                            <input type="text" class="form-control form-control-sm text-right" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" v-model="res.neto">
                        </div> 
                    </div>
                    
                </div>
                    
                <div class="form-row">
                    <div class="form-group col-4 m-0">
                        <div class="input-group input-group-sm mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default"> <strong>IVA</strong> </span>
                            </div>
                            <input type="text" class="form-control form-control-sm bold text-center" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="19" disabled>
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default"> <strong>%</strong> </span>
                            </div>
                        </div>
                        
                    </div>
                    <div class="form-group col m-0">
                        <div class="input-group input-group-sm mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default"> <strong>Total IVA</strong> </span>
                            </div>
                            <input type="text" class="form-control form-control-sm text-right" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" v-model="res.iva">
                        </div>
                    </div>

                </div>    
                                      
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default"> <strong>Total</strong> </span>
                        </div>
                        <input type="text" class="form-control form-control-sm text-right" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" v-model="res.total">
                    </div>

                </div>
            </div>
        </div>
        </div>

        <!-- Card de Docuemtos -->
        <div class="card">
            <div class="card-header">
                <div class="clearfix" >
                    <h3 class="float-left justify-content-center m-0 pt-2"> <strong>Documentos Electronicos</strong> </h3>
                    <button class="btn float-right"> Agregar <i class="fa fa-plus-square" aria-hidden="true"></i> </button>
                    <!-- <h3 class="float-right border border-danger p-2 " > <strong class="text-danger">N°: 234</strong> </h3> -->
                </div> 
            </div>
            <div class="card-body table-responsive-sm p-0">
                <!-- <h4 class="card-title">Title</h4>
                <p class="card-text">Text</p> -->

                <table class="table table-sm table-bordered justify-content-center text-center">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Tipo</th>
                            <th>Folio</th>
                            <th>Neto</th>
                            <th>IVA</th>
                            <th>Total</th>
                            <th>Fcha Emision</th>
                            <th>Actividad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">33</td>
                            <td>1111</td>
                            <td>1000000</td>
                            <td>1000000</td>
                            <td>1000000</td>
                            <td>01/01/01</td>
                            <td>IMP</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Card de Pagos -->
        <div class="card">
            <div class="card-header">
                <div class="clearfix" >
                    <h3 class="float-left justify-content-center m-0 pt-2"> <strong>Pagos de Documento</strong> </h3>
                    <button class="btn float-right"> Agregar <i class="fa fa-plus-square" aria-hidden="true"></i> </button>
                    <!-- <h3 class="float-right border border-danger p-2 " > <strong class="text-danger">N°: 234</strong> </h3> -->
                </div> 
            </div>
            <div class="card-body table-responsive-sm p-0">
                <!-- <h4 class="card-title">Title</h4>
                <p class="card-text">Text</p> -->

                <table class="table table-sm table-bordered justify-content-center text-center">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Tipo</th>
                            <th>Folio</th>
                            <th>Neto</th>
                            <th>IVA</th>
                            <th>Total</th>
                            <th>Fcha Emision</th>
                            <th>Actividad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">33</td>
                            <td>1111</td>
                            <td>1000000</td>
                            <td>1000000</td>
                            <td>1000000</td>
                            <td>01/01/01</td>
                            <td>IMP</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        
        <!-- Modal Cliente -->
        <div class="modal fade" id="cliente" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header py-1">
                        <h5 class="modal-title">Buscar Cliente</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col">
                                <input type="text" name="" id="" class="form-control form-control-sm co-12" placeholder="Buscar Cliente" v-model="searchclient" @keyup.enter="onSearchClient">
                            </div>
                        </div>
                        <div class="table-responsive-sm">
                            <table class="table table-sm table-striped table-inverse w-100">
                                <thead class="thead-inverse">
                                    <tr class="p-0">
                                        <th>#</th>
                                        <th>Rut</th>
                                        <th>Nombre</th>
                                        <th>Giro</th>
                                        <th>Actividad</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(client, index) of this.getclientes" :key="index" >
                                        <td scope="row">{{index + 1}}</td>
                                        <td>{{client.rut}}</td>
                                        <td>{{client.nombre}}</td>
                                        <td>{{client.giro}}</td>
                                        <td>
                                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                                <button type="button" class="btn btn-light" @click="onSelec(client)"><i class="far fa-edit text-primary" ></i></button>
                                            </div>
                                        </td>
                                    </tr>                               
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                    <!-- <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save</button>
                    </div> -->
                </div>
            </div>
        </div>


        <!-- Modal  Productos-->
        <div class="modal fade" id="productos" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Agregar Productos</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body table-responsive-sm p-1">
                       <div class="form-row">
                            <div class="form-group col">
                                <input type="text" name="" id="" class="form-control form-control-sm col-12" placeholder="Buscar Producto" v-model="searchcprod" @keyup.enter="onSearchProd">
                            </div>
                        </div>
                        <div class="table-responsive-sm">
                            <table class="table table-sm table-striped table-bordered w-100 justify-content-center">
                                <thead class="thead-inverse">
                                    <tr class="p-0">
                                        <th class="text-center">Codigo</th>
                                        <th class="text-center">Nombre</th>
                                        <th class="text-center">Stock</th>
                                        <th class="text-center">Cantidad</th>
                                        <th class="text-center">Precio</th>
                                        <th class="text-center">Agregar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(prod, index) of this.getprod" :key="index" >
                                        <td scope="row" style="max-width: 150px;">{{prod.codinterno}}</td>
                                        <td class="text-truncate" style="max-width: 250px;">{{prod.nombre}}</td>
                                        <td>1000</td>
                                        <td>
                                            <div class="form-group m-0 col-12">
                                              <input type="text" class="form-control form-control-sm" name="" id="" aria-describedby="helpId" placeholder="" v-model="prod.cantidad">
                                            </div>
                                        </td>
                                        <td>$ {{Math.round(prod.p3_neto)}}</td>
                                        <td>
                                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                                <button type="button" class="btn btn-light" @click="onSelecProd(prod)"><i class="far fa-edit text-primary" ></i></button>
                                            </div>
                                        </td>
                                    </tr>                                 
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cerra</button>
                        <button type="button" class="btn btn-sm btn-primary">Guardar</button>
                    </div> -->
                </div>
            </div>
        </div>

        <!-- <div class="alert alert-primary" role="alert">
            <div>{{$data}}</div>
        </div>
         -->

    </div>
</template>

<script>
export default {
    props: ['vent'],
    data() {
        return {
            nvfecha: moment().format('YYYY-MM-DD'),
            setVenta: [],
            setclient: null,
            getclientes: [],
            searchclient: null,
            setCiudad: [],
            searchcprod: null,
            getprod: [],
            setprod: [],
            setdtll: [],
            isClose: false,
            isErr: false,
            outPut: null,
            outErr: null,
            nombre: null,
            res: {
                sub: 0,
                desc: 0,
                mont: 0,
                iva: 0,
                total: 0,
            },
            // venta_id 
        }
    },
    mounted() {
       
    },
    computed: {

    },
    watch: {
        
    },
    methods: {

        
    }
}
</script>

<style>

</style>
