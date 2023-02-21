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

        <!-- cliente -->
        <div class="card mt-4 bg-light mb-3">
            
            <div class="card-header">
                <div class="float-left text-muted"><strong class="h3">Nota de Ventas</strong></div>
                <div class="float-right">
                    <button type="button" class="btn btn-sm btn-primary " @click="onStoreVenta()"> <strong>Guardar</strong> </button>
                </div>
            </div>

            <div class="card-body p-2">
                <!-- <div class="clearfix">
                    <h3 class="float-left"> <strong>Nota de Ventas</strong> </h3>
                    <button type="button" class="btn  btn-primary float-right" @click="onStoreVenta()"> <strong>Guardar</strong></button>
                </div>  -->
                
                <div class="clearfix">
                    <h4 class="float-left "> Cliente</h4> 
                    <!-- <button type="button" class="btn btn-sm btn-secondary float-right" data-toggle="modal" data-target="#cliente"> <strong><i class="fas fa-search"></i> Cliente</strong></button> -->
                </div>
               
                <!-- <hr class="mt-1"> -->
                <div class="form-row">


                    <div class="from-group col-sm-12 col-lg-3 mb-1">
                        <label for="" class="m-0 pl-2"><strong>Rut</strong></label>
                        <div class="input-group">
                            <input 
                                type="text" 
                                name="" 
                                id="" 
                                class="form-control form-control-sm" 
                                maxlength="10"
                                placeholder="" 
                                v-model="setclient.rut"

                            >
                            <div class="input-group-append">
                                <button class="btn btn-sm btn-outline-success" type="button" id="buscarprov" @click="showModalCliente()"> <i class="fas fa-search"></i></button>
                                <!-- <button class="btn btn-sm btn-outline-secondary" type="button" id="buscarprov" data-toggle="modal" data-target="#msearchprov"> <i class="fas fa-search"></i></button> -->
                            </div>
                        </div>
                    </div>

                    
                    <div class="form-group col-sm-12 col-lg-9  mb-1">
                        <label for="" class="m-0 pl-2"> <strong>Nombre</strong> </label>
                        <input type="text" name="" id="nombre" class="form-control form-control-sm" placeholder="" v-model="setclient.nombre">
                    </div>
                    
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-12 col-lg-8 mb-1">
                     <label for="" class="m-0 pl-2"> <strong>Direccion</strong>  </label>
                     <input type="text" name="" id="" class="form-control form-control-sm" placeholder=""  v-model="setclient.direccion">
                   </div>
                    <div class="form-group col-sm-12 col-lg-4 mb-1">
                        <label for=""  class="m-0" > <strong>Ciudad</strong> </label>                                        
                        <select class="form-control form-control-sm" id="" v-model="setclient.ciudad">
                            <option v-for="(ciudad, index) in this.setCiudad" :key="index" :value="ciudad.PROVINCIA_ID">
                                {{ ciudad.PROVINCIA_NOMBRE}}
                            </option>
                        
                        </select>
                   </div>
               </div>
               <div class="form-row">
                   <div class="form-group col-sm-12 col-lg-4 mb-1">
                     <label for="" class="m-0 pl-2"> <strong>Telefono</strong> </label>
                     <input type="text" name="" id="" class="form-control form-control-sm" placeholder="" v-model="setclient.fono">
                   </div>
                   <div class="form-group col-sm-12 col-lg-4 mb-1">
                     <label for="" class="m-0 pl-2"> <strong>Celular</strong> </label>
                     <input type="text" name="" id="" class="form-control form-control-sm" placeholder="" v-model="setclient.celular">
                   </div>
                   <div class="form-group col-sm-12 col-lg-4 mb-1">
                     <label for="" class="m-0 pl-2"> <strong>Forma de Pago</strong> </label>
                     <select class="form-control form-control-sm" id="" v-model="setclient.fmapago">
                            <option value="1">Contado</option>
                            <option value="2">Crédito</option> 
                     </select>
                   </div>
               </div>
                <hr>
                <div class="clearfix">
                    <h4 class="float-left "> Productos</h4> 
                    <button type="button" class="btn btn-sm btn-secondary float-right" data-toggle="modal" data-target="#productos"> <strong><i class="fas fa-search"></i> Producto</strong></button>
                </div>

                
                <div class="form-row pt-2">
                    <div class="form-group col text-center pr-0">
                      <label for="" class="m-0 pl-2"> <strong>Codigo</strong> </label>
                      <input 
                        type="numbrer" 
                        class="form-control form-control-sm text-center font-weight-bolder" 
                        name=""
                        id=""
                        v-model="addprod.codinterno"
                        @keydown.enter="onSearchProdCode()"
                      >
                    </div>
                    <div class="form-group col-4 text-center px-0">
                      <label for="" class="m-0 pl-2"> <strong>Producto</strong> </label>
                      <input 
                        type="numbrer" 
                        class="form-control form-control-sm text-center font-weight-bolder " 
                        name="" 
                        id=""
                        :value="addprod.nombre"
                      >
                    </div>
                    <div class="form-group col text-center px-0">
                      <label for="" class="m-0 pl-2"> <strong>Cantidad</strong> </label>
                      <input 
                        type="numbrer" 
                        class="form-control form-control-sm text-center font-weight-bolder " 
                        name="" 
                        id="numcont" 
                        v-model.number="addprod.cont"
                      >
                    </div>
                     <div class="form-group col text-center px-0">
                      <label for="" class="m-0 pl-2"> <strong>Unidad</strong> </label>
                      <input 
                        type="numbrer" 
                        class="form-control form-control-sm text-center font-weight-bolder " 
                        name="" 
                        id="" 
                        :value="addprod.unidad"
                      >
                    </div>
                    <div class="form-group col text-center px-0">
                      <label for="" class="m-0 pl-2"> <strong>Precio</strong> </label>
                      <input 
                        type="numbrer" 
                        class="form-control form-control-sm text-center font-weight-bolder" 
                        name="" 
                        id="" 
                        v-model.number="addprod.p3_neto"
                      >
                    </div>
                    <div class="form-group col text-center px-0">
                      <label for="" class="m-0 pl-2"> <strong>% Desc.</strong> </label>
                      <input 
                        type="numbrer" 
                        class="form-control form-control-sm text-center font-weight-bolder " 
                        name="" 
                        id="" 
                        v-model.number="addprod.descdtl"
                      >
                    </div>
                     <!-- <div class="form-group col text-center px-0">
                      <label for="" class="m-0 pl-2"> <strong>Precio Uni.</strong></label>
                      <input type="numbrer" class="form-control form-control-sm text-center font-weight-bolder " name="" id="" >
                     
                    </div> -->
                     <div class="form-group col text-center pl-0">
                      <label for="" class="m-0 pl-2"> <strong>Total</strong></label>
                      <input 
                        type="numbrer" 
                        class="form-control form-control-sm text-center font-weight-bolder" 
                        name="" 
                        id="numtot" 
                        :value="addprod.tot"
                        @keydown.enter="onSelecAddProd()"
                      >
                    </div>
                     <!-- <div class="form-group col text-center pl-0">
                      <label for="" class="m-0 pl-2"> </label> 
                      <button 
                        type="button" 
                        class="btn btn-sm btn-primary mt-3" 
                        @click="onSelecAddProd()">+ Agregar
                      </button>
                    </div> -->
                </div>
                
                <!-- <table class="table">
                    <thead>
                        <tr>
                           <th>Codigo</th>
                           <th>Producto</th>
                           <th>catintidad</th>
                           <th>unidad</th>
                           <th>Precio</th>
                           <th>% Desc</th>
                           <th>P. Unidad</th>
                           <th>Total</th>
                       </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="p-0"><input type="numbrer" class="form-control-sm text-center font-weight-bolder form-control-plaintext" name="" id="" > </td>
                            <td class="p-0"><input type="numbrer" class="form-control-sm text-center font-weight-bolder form-control-plaintext" name="" id="" > </td>
                            <td class="p-0"><input type="numbrer" class="form-control-sm text-center font-weight-bolder form-control-plaintext" name="" id="" > </td>
                            <td class="p-0"><input type="numbrer" class="form-control-sm text-center font-weight-bolder form-control-plaintext" name="" id="" > </td>
                            <td class="p-0"><input type="numbrer" class="form-control-sm text-center font-weight-bolder form-control-plaintext" name="" id="" > </td>
                            <td class="p-0"><input type="numbrer" class="form-control-sm text-center font-weight-bolder form-control-plaintext" name="" id="" > </td>
                            <td class="p-0"><input type="numbrer" class="form-control-sm text-center font-weight-bolder form-control-plaintext" name="" id="" > </td>
                            <td class="p-0"><input type="numbrer" class="form-control-sm text-center font-weight-bolder form-control-plaintext" name="" id="" > </td>
                        </tr>
                       
                    </tbody>
                </table> -->
                
               <!-- TABLA -->
               <table class="table table-sm table-striped table-inverse ">
                   <thead class="thead-dark">
                       <tr class="text-center">
                           <th>N°</th>
                           <th>Codigo</th>
                           <th>Producto</th>
                           <th>catintidad</th>
                           <th>unidad</th>
                           <th>Precio</th>
                           <th>% Desc</th>
                           <!-- <th>Precio Uni.</th> -->
                           <th>Total</th>
                           <th>Actividad</th>
                       </tr>
                       </thead>
                       <tbody class="text-center">
                           <tr v-for="(prod, index) of this.setdtll" :key="index">
                               <th scope="row">{{prod.item = index + 1}}</th>
                               <td scope="row">{{prod.codinterno}}</td>
                               <td>{{prod.nombre}}</td>
                               <td>{{prod.cont | cont}}</td>
                               <td>unidad</td>
                               <td>$ {{prod.p3_neto}}</td>
                               <td>{{prod.descuento}}</td>
                               <!-- <td>$10000</td> -->
                               <td>$ {{prod.cont * prod.p3_neto}}</td>
                               <td>
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-light" @click="onSelecDtl(prod)"><i class="far fa-edit text-primary" ></i></button>
                                    </div>
                               </td>
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
                    <div class="form-group col m-0 pl-2">
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

        
        <!-- Modal Cliente -->
        <div class="modal fade" id="cliente" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content bg-light">
                    <div class="modal-header p-2 px-3">
                        <h5 class="modal-title">Buscar Cliente</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body p-0">
                        <div class="form-row">
                            <div class="form-group col p-2 m-0">
                                <input type="text" name="" id="" class="form-control form-control-sm co-12" placeholder="Buscar Cliente" v-model="searchclient" @keyup.enter="onSearchClient">
                            </div>
                        </div>
                        <div class="table-responsive-sm">
                            <table class="table table-sm table-striped table-bordered table-inverse p-0">
                                <thead class="thead-dark">
                                    <tr class="text-center">
                                        <!-- <th>#</th> -->
                                        <th scope="col">Rut</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Giro</th>
                                        <th scope="col">Actividad</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(client, index) of this.getclientes" :key="index" class="p-0">
                                        <!-- <td scope="row">{{index + 1}}</td> -->
                                        <td scope="row" class="align-middle" style="width: 6rem;"><strong>{{client.rut}}</strong></td>
                                        <td class="text-sm-left align-middle">{{client.nombre}}</td>
                                        <td class="text-sm-center align-middle">{{client.giro}}</td>
                                        <td class="text-sm-center align-middle">  
                                            <div class="btn-group btn-group-sm" role="group">
                                                <button type="button" class="btn btn-sm btn-outline-success" @click="onSelec(client)"><i class="fa fa-plus-square fa-lg text-lights" ></i></button>
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
                <div class="modal-content bg-light">
                    <div class="modal-header p-2 px-3">
                        <h5 class="modal-title">Agregar Productos</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body table-responsive-sm p-0">
                       <div class="form-row">
                            <div class="form-group col p-2 m-0">
                                <input type="text" name="" id="" class="form-control form-control-sm col-12" placeholder="Buscar Producto" v-model="searchcprod" @keyup.enter="onSearchProd">
                            </div>
                        </div>
                        <div class="table-responsive-sm">
                            <table class="table table-sm table-striped table-bordered justify-content-center p-0">
                                <thead class="thead-dark">
                                    <tr class="text-center">
                                        <th scope="col">Codigo</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Stock</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Precio</th>
                                        <th scope="col">Agregar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(prod, index) of this.getprod" :key="index" class="p-0" >
                                        <td scope="row" style="max-width: 150px;"><strong>{{prod.codinterno}}</strong></td>
                                        <td class="text-truncate" style="max-width: 250px;">{{prod.nombre}}</td>
                                        <td>{{prod.cantidad | cont}}</td>
                                        <td>
                                            <div class="form-group m-0 p-0 col-12">
                                              <input type="text" class="form-control form-control-sm" name="" id="" aria-describedby="helpId" placeholder="" v-model="prod.cont">
                                            </div>
                                        </td>
                                        <!-- <td>$ {{Math.round(prod.p3_neto)}}</td> -->
                                        <td>
                                            <div class="form-group m-0 p-0 col-12">
                                              <input type="text" class="form-control form-control-sm" name="" id="" aria-describedby="helpId" placeholder="" v-model="prod.p3_neto">
                                            </div>
                                        </td>
                                        <td class="text-center">
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

        <!-- <div class="alert alert-primary border border-white" role="alert">
            <div>{{$data}}</div>
        </div> -->
        

    </div>
</template>

<script>
export default {
    data() {
        return {

            setclient: [],
            getclientes: [],
            searchclient: null,
            setCiudad: [],
            searchcprod: null,
            addprod: {
                codinterno: null,
                nombre: null,
                pcosto: new Number(0),
                cantidad: new Number(0),
                desct1: new Number(0),
                desct2: new Number(0),
                flete: new Number (0),
                subtotal: new Number(0),
                costfinal: new Number(0),
                unidad: null,
                marca: null,
                linea: null,
                familia: null,
                p1_margen: new Number(0),
                p1_utilidad: new Number(0),
                p1_neto: new Number(0),
                p1_iva: new Number(0),
                p1_venta: new Number(0),
                p2_margen: new Number(0),
                p2_utilidad: new Number(0),
                p2_neto: new Number(0),
                p2_iva: new Number(0),
                p2_venta: new Number(0),
                p3_margen: new Number(0),
                p3_utilidad: new Number(0),
                p3_neto: new Number(0),
                p3_iva: new Number(0),
                p3_venta: new Number(0),
                cont: new Number(0),
                tot: new Number(0)
            },
            getprod: [],
            setprod: [],
            setdtll: [],
            isClose: false,
            isErr: false,
            outPut: null,
            outErr: null,
            res: {
                sub: 0,
                desc: 0,
                mont: 0,
                iva: 0,
                total: 0,
            }
        }
    },
    mounted() {
        this.getCiudad()
    },
    computed: {

    },
    watch: {
        
    },
    methods: {

        onSearchClient() {
            
            let cURL = '/api/clientes/search/' + this.searchclient
            axios.get(cURL)
            .then( res => {
                this.getclientes = _.cloneDeep(res.data)
            })
            .catch( e => {
                console.error(e)
            })

        },
        onSelec(params) {
            
            $('#nombre').focus()
            this.setclient = _.cloneDeep(params)
            $('#cliente').modal('hide')

        },
        getCiudad() {

            let cURL = '/api/provincia'
            axios.get(cURL)
            .then(res => {
            // JSON responses are automatically parsed.
            this.setCiudad = _.cloneDeep(res.data)
            })
            .catch(e => {
                console.log(e);
            })

        },
        onSearchProd(){

            let cURL = '/api/productos/searchprecio/' + this.searchcprod
             axios.get(cURL)
            .then( res => {
                this.getprod = _.cloneDeep(res.data)
                this.nextInput('numcont')
            })
            .catch( e => {
                console.log(e)
            })

        },
        onSearchProdCode(){

            if(this.addprod.codinterno === undefined || this.addprod.codinterno == null){
                alert('Ingrese el Codigo de producto')
            } else {

                let cURL = '/api/producto/code/' + this.addprod.codinterno
                axios.get(cURL)
                .then( res => {
                    this.addprod = _.cloneDeep(res.data)
                    this.nextInput('numcont')
                    // console.log(res.data)
                })
                .catch( err => {
                    console.log(err)
                })

            }
        },
        onSelecProd(params) {
            
            params.total = parseInt(params.p3_neto) * parseInt(params.cont)
            params.descdtl = new Number(params.descdtl)
            this.res.sub = new Number(this.res.sub + params.total)
            this.onMonto()
            this.setdtll.push(_.cloneDeep(params))

            // this.setprod = _.cloneDeep(params)
            // console.log(this.setdtll);
            // console.log(this.res);
            $('#productos').modal('hide')

            // setdtll: []

        },
        
        nextInput(refinp) {
            document.getElementById(refinp).focus();
            document.getElementById(refinp).select();
        },
        onSelecAddProd(){
            // revisar el redondeo de los numeros

            this.addprod.total = parseInt(this.addprod.p3_neto) * parseInt(this.addprod.cont)
            this.descdtl = new Number(this.descdtl)
            this.res.sub = new Number(this.res.sub + this.addprod.total)
            this.onMonto()
            this.setdtll.push(_.cloneDeep(this.addprod))

            this.addprod = {}
            this.addprod = { cont: 0, p3_neto: 0 }

        },
        onStoreVenta(){

            let mi = this

            axios.post('/admin/venta', {
                
                cliente : _.cloneDeep(mi.setclient),
                dtll_prod : _.cloneDeep(mi.setdtll),
                venta : _.cloneDeep(mi.res)

            })
            .then ( res => {
                mi.outPut = _.cloneDeep(res.data)
                mi.isClose = true
                setTimeout(() => { mi.isClose = !mi.isClose}, 13000)
            })
            .catch ( err => {
                // mi.outErr = _.cloneDeep(err.response.data.errors)
                // mi.outErr = _.cloneDeep(err.response.data.errors)
                mi.outErr = _.cloneDeep(err.response.data)
                mi.isErr = true
                setTimeout(() => { mi.isErr = !mi.isErr}, 13000)
            })
           
            $('#collpseExample').collapse({ toggle: false})
            mi.setclient = []
            mi.setdtll = []
            mi.res = []
             
        },
        onSelecDtl(params){

        let mi = this

        let pos = this.setdtll.indexOf(params)

        this.setdtll.splice(pos, 1)

        this.res.sub -= parseInt(params.total)
        this.onMonto()
        // this.setprod = _.cloneDeep(params)

        // this.totsubtotal -= new Number(this.setprod.subtotal)
       
        // this.totsubtotal -= new Number()

        },
        onMonto(){
            
            let mi = this

            mi.res.mont = new Number(parseInt(mi.res.sub * (mi.res.desc / 100)).toFixed(0))
            mi.res.neto = new Number(parseInt(mi.res.sub - mi.res.mont).toFixed(0))
            mi.res.iva =  new Number(parseInt(mi.res.neto * 0.19).toFixed(0))
            mi.res.total =  new Number(parseInt((mi.res.iva) + (mi.res.neto)).toFixed(0))

        },
        showModalCliente()
        {
            $('#cliente').modal('show')
        }
        
    },
    filters : {
        Moneda(mnt){
            return '$' + Number(mnt).toFixed(0)
        },
        cont(mnt){
            return Number(mnt).toFixed(0)
        }
    }
}
</script>

<style>

</style>
