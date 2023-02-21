<template>
<dir class="p-0">

    <div class="card mt-4 bg-light mb-2">
        <div class="card-header p-2">
            <div class="clearfix">
                <h3 class="m-0 pt-1"><strong>Cliente</strong> <span class=" float-right"> Sector:  <span class="badge badge-primary">Lunes</span></span></h3> 
            </div>
        </div>
        <div class="card-body p-3">
            <div class="form-row">
                <div class="form-group col-sm-2  mb-1">
                    <label for="" class="font-weight-bold mb-0">Rut</label> 
                    <input type="text" name="" id="" class="form-control-plaintext form-control-sm border border-secondary px-2"  placeholder="" v-model="setCliente.rut" disabled>                   
                </div>
                <div class="form-group col mb-1">
                    <label for="" class="font-weight-bold mb-0">Nombre</label>
                    <input type="text" name="" id="" class="form-control-plaintext form-control-sm border border-secondary px-2" placeholder="" v-model="setCliente.nombre" disabled>                    
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col mb-1">
                    <label for="" class="font-weight-bold mb-01">Nombre de Negocio</label>
                    <input type="text" name="" id="" class="form-control-plaintext form-control-sm border border-secondary px-2" placeholder="" v-model="setCliente.giro" disabled>
                </div> 
                <div class="form-group col mb-1">
                    <label for="" class="font-weight-bold mb-0">Giro</label>
                    <input type="text" name="" id="" class="form-control-plaintext form-control-sm border border-secondary px-2" placeholder="" v-model="setCliente.giro" disabled>
                </div> 
            </div>
                            
            <div class="form-row">
                <div class="form-group col mb-1">
                    <label for="" class="font-weight-bold mb-0">Pais</label>
                    <input type="text" name="" id="" class="form-control-plaintext form-control-sm border border-secondary px-2" placeholder="" v-model="setCliente.pais" disabled>                   
                </div>
                <div class="form-group col mb-1">
                    <label for="" class="font-weight-bold mb-0">Region</label>
                    <select class="form-control-plaintext form-control-sm border border-secondary px-2" id="" v-model="setCliente.region" disabled>
                            <option v-for="(region, index) in this.setRegion" :key="index" :value="region.REGION_ID">
                                {{ region.REGION_NOMBRE}}
                            </option>
                        </select>                   
                </div>
                <div class="form-group col mb-1">
                    <label for="" class="font-weight-bold mb-0">Ciudad</label>
                    <select class="form-control-plaintext form-control-sm border border-secondary px-2" id="" v-model="setCliente.ciudad" disabled>
                            <option v-for="(ciudad, index) in this.setCiudad" :key="index" :value="ciudad.PROVINCIA_ID">
                                {{ ciudad.PROVINCIA_NOMBRE}}
                            </option>
                    </select>                    
                </div>
                <div class="form-group col mb-1">
                    <label for="" class="font-weight-bold mb-0">Comuna</label>
                    <select class="form-control-plaintext form-control-sm border border-secondary px-2" id="" v-model="setCliente.comuna" disabled>
                            <option v-for="(comuna, index) in this.setComuna" :key="index" :value="comuna.COMUNA_ID">
                            {{ comuna.COMUNA_NOMBRE}}
                        </option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col mb-1">
                    <label for="" class="font-weight-bold mb-0">Direccion</label>
                    <input type="text" name="" id="" class="form-control-plaintext form-control-sm border border-secondary px-2" placeholder="" v-model="setCliente.direccion" disabled>                   
                </div>   
            </div>
            <div class="form-row">
                <div class="form-group col mb-1">
                    <label for="" class="font-weight-bold mb-0">Fono</label>
                    <input type="text" name="" id="" class="form-control-plaintext form-control-sm border border-secondary px-2" placeholder="" v-model="setCliente.fono" disabled>                    
                </div>
                    <div class="form-group col mb-1">
                    <label for="" class="font-weight-bold mb-0">Celular</label>
                    <input type="text" name="" id="" class="form-control-plaintext form-control-sm border border-secondary px-2" placeholder="" v-model="setCliente.celular" disabled>                    
                </div>
                    <div class="form-group col mb-1">
                    <label for="" class="font-weight-bold mb-0">E-Mail</label>
                    <input type="text" name="" id="" class="form-control-plaintext form-control-sm border border-secondary px-2" placeholder="" v-model="setCliente.email" disabled>    
                </div>
            </div>
        </div>
        <!-- <div class="card-footer text-muted">
            Footer
        </div> -->
    </div>

        <div class="card mt-4 bg-light mb-3">
            <div class="card-header">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active p-2" id="doc-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                            <strong>Documentos</strong> 
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-2" id="pago-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                           <strong> Pagos</strong>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-2" id="cont-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">
                            <strong>Contactos</strong> 
                        </a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link p-2" id="nota-tab" data-toggle="tab" href="#nota" role="tab" aria-controls="contact" aria-selected="false">
                            <strong>Notas</strong> 
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body tab-content p-0">
                <div class="tab-pane fade show active table-responsive-sm p-0" id="home" role="tabpanel" aria-labelledby="doc-tab">
                    <table class="table table-sm  table-inverse table-borden table-bordered mb-0" style="font-size: 0.9em;">
                        <thead class="thead-dark text-center align-middle">
                            <tr>
                                <th>Tipo DTE</th>
                                <th>N° Factura</th>
                                <th>Estado</th>
                                <th>Neto</th>
                                <th>Descuento</th>
                                <th>IVA</th>
                                <th>Total</th>
                                <th>Abono</th>
                                <th>Saldo</th> 
                                <th>F. Emision</th>
                                <th>Actividad</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center font-weight-bold" v-for="(dte, index) in this.setDTE" :key="index" :class="isPagoT(dte.estado)">
                                <td scope="row" class="text-left align-middle">{{dte.tipodte | dteName}}</td>
                                <td class="text-right align-middle">{{dte.folio}}</td>
                                <td class="text-right align-middle">{{dte.estado}}</td>
                                <td class="text-right align-middle">{{dte.mntneto | Moneda}}</td>
                                <td class="text-right align-middle">{{dte.desc | Moneda}}</td>
                                <td class="text-right align-middle">{{dte.iva | Moneda}}</td>
                                <td class="text-right align-middle">{{dte.mnttotal | Moneda}}</td>
                                <td class="text-right align-middle">{{dte.abono | Moneda}}</td>
                                <td class="text-right align-middle">{{ dte.mnttotal - dte.abono | Moneda}}</td>
                                <td class="text-right align-middle">{{dte.fchemis | Fecha}}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary btn-lg" data-toggle="modal" data-target="#modalpago">
                                        Pago
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot class="justify-content-center">
                            <!-- <nav aria-label="Page navigation example"> -->
                                <ul class="pagination justify-content-center m-3">
                                    <li class="page-item" v-if="paginate.current_page > 1">
                                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true" @click.prevent="changePage(paginate.current_page - 1)">Atras</a>
                                    </li>
                                    <li class="page-item" v-for="(page, index) of pageNumber" :key="index" :class="[page == isActived ? 'active' : '']">
                                        <a class="page-link" href="#"  @click.prevent="changePage(page)">{{page}}</a>
                                    </li>
                                    
                                    <li class="page-item" v-if="paginate.current_page < paginate.last_page">
                                        <a class="page-link" href="#" @click.prevent="changePage(paginate.current_page + 1)">Siguiente</a>
                                    </li>
                                </ul>
                            <!-- </nav> -->
                        </tfoot>
                    </table>
                </div>
                <div class="tab-pane fade p-0" id="profile" role="tabpanel" aria-labelledby="pago-tab">
                    profile
                </div>
                <div class="tab-pane fade table-responsive-sm p-0" id="contact" role="tabpanel" aria-labelledby="contac-tab">
                    <button type="button" class="btn btn-sm btn-primary float-right m-1" data-toggle="modal" data-target="#ModalContacto">  
                        <strong><i class="fa fa-user-plus" aria-hidden="true"></i>  Contacto</strong> 
                    </button>

                    <table class="table table-sm table-striped table-inverse table-borden table-bordered mb-0">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nombre</th>
                                <th>Cargo</th>
                                <th>Fono</th>
                                <th>Celular</th>
                                <th>WhatApp</th>
                                <th>E-Mail</th>
                            </tr>
                       </thead>
                       <tbody>
                           <tr v-for="(contac, index) of this.contacAll" :key="index">
                               <td scope="row">{{contac.nombre}}</td>
                               <td>{{contac.cargo}}</td>
                               <td>{{contac.fono}}</td>
                               <td>{{contac.celular}}</td>
                               <td>{{contac.WhatsApp}}</td>
                               <td>{{contac.email}}</td>
                           </tr>
                       </tbody>
                    </table>
                </div>
                <div class="tab-pane fade p-0" id="nota" role="tabpanel" aria-labelledby="nota-tab">
                    <div class="clearfix px-5">
                        <button type="button" class="btn btn-sm btn-primary float-right my-2" data-toggle="modal" data-target="#ModalNota">  
                            <strong> <i class="fa fa-plus" aria-hidden="true"></i>  Nota</strong> 
                        </button>
                    </div>
                    <div class="container-fluid">
                     
                        <div class="row">
                            
                            <div class="col-sm-4"  v-for="(nota, index) in this.notaAll" :key="index">
                                <div class="card mb-2">
                                <div class="card-body p-2">
                                    <h5 class="card-title mb-2"> <strong>{{nota.titulo}}</strong> </h5>
                                    <p class="card-text mb-2">{{nota.nota}}</p>
                                    <p class="card-text float-right"><small class="text-muted">Ultima actualizacion {{ nota.updated_at }}</small></p>
                                </div>
                                </div>
                            </div>

                           
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="card-footer text-muted">
                Footer
            </div> -->
        </div>


        <!-- Modal -->
        <div class="modal fade" id="ModalContacto" tabindex="-1" role="dialog" aria-labelledby="ModalContacto" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header p-2">
                        <h5 class="modal-title"> <strong>Nuevo Contacto</strong> </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body p-2">
                        
                        <div v-if="isErr" class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul>
                                <li v-for="(error, index) in outErr" :key="index">{{error[0]}}</li>
                            </ul>
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

                        <div class="form-row">
                            <div class="form-group m-0 col-8">
                                <label for="" class="col-form-label py-1"> <strong>Nombre :</strong> </label>
                                <input type="text" class="form-control form-control-sm"   v-model="contac.nombre">
                            </div>
                            <div class="form-group m-0 col-4">
                                <label for="" class="col-form-label py-1"> <strong>Cargo :</strong> </label>
                                <input type="text" class="form-control form-control-sm" id="" v-model="contac.cargo">
                            </div>
                            <div class="form-group m-0 col-4">
                                <label for="" class="col-form-label py-1"> <strong>Telefono :</strong> </label>
                                <input type="text" class="form-control form-control-sm" id="" v-model="contac.fono">
                            </div>
                            <div class="form-group m-0 col-4">
                                <label for="" class="col-form-label py-1"> <strong>Celular :</strong> </label>
                                <input type="text" class="form-control form-control-sm" id="" v-model="contac.celular">
                            </div>
                            <div class="form-group m-0 col-4">
                                <label for="" class="col-form-label py-1"> <strong>WhatsApp :</strong> </label>
                                <input type="text" class="form-control form-control-sm" id="" v-model="contac.WhatsApp">
                            </div>
                            <div class="form-group m-0 col-12">
                                <label for="" class="col-form-label py-1"> <strong>E-mail :</strong> </label>
                                <input type="mail" class="form-control form-control-sm" id="" v-model="contac.email">
                            </div>
                        
                            <div class="form-group m-0 col">
                                <label for="" class="col-form-label py-1"> <strong>Nota :</strong> </label> <br>
                                <textarea class="form-control form-control-sm" v-model="contac.nota" ></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer p-2">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"> <strong>Cerrar</strong> </button>
                        <button type="button" class="btn btn-sm btn-primary" @click="onStoreContac()"> <strong>Guardar</strong> </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="ModalNota" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content bg-light">
                        <div class="modal-header p-2">
                            <h5 class="modal-title"> <strong>Nueva Nota</strong> </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <div class="modal-body p-2">
                    
                        <div v-if="isErr" class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul>
                                <li v-for="(error, index) in outErr" :key="index">{{error[0]}}</li>
                            </ul>
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
                    
                        <div class="form-group m-0 col">
                                <label for="" class="col-form-label py-1"> <strong>Titulo :</strong> </label>
                                <input type="text" class="form-control form-control-sm"   v-model="nota.titulo">
                            </div>
                            <div class="form-group m-0 col">
                                <label for="" class="col-form-label py-1"> <strong>Nota :</strong> </label> <br>
                                <textarea class="form-control form-control-sm"   rows="10" v-model="nota.nota" ></textarea>
                            </div>    
                        </div>

                    <div class="modal-footer p-2">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"> <strong>Cerrar</strong> </button>
                        <button type="button" class="btn btn-sm btn-primary" @click="onStoreNota()"><strong> Guardar</strong></button>
                    </div>
                </div>
            </div>
        </div>

       
        <!-- Modal -->
        <div class="modal fade" id="modalpago" tabindex="-1" role="dialog" aria-labelledby="modeltitlepago" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                        Body
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>

    <!-- <pre>{{$data.paginate}}</pre> -->

</dir>
</template>

<script>
export default {
    props: ['client'],
    data(){
        return {
            setCliente: {},
            setRegion: {},
            setCiudad: {},
            setComuna: {},
            setDTE: [],
            contac: {},
            isErr: "",
            isClose: "",
            outErr: "",
            nota: {
                client_id: this.client,
                titulo: "",
                nota: ""
            },
            contac: {
                client_id: this.client,
                nombre: "",
                cargo: "",
                fono: "",
                celular: "",
                WhatsApp: "",
                email: "",
                nota: ""
            },
            contacAll: {},
            notaAll: {},
            paginate: {
                'total': 0,
                'current_page': 0,
                'per_page': 0,
                'last_page': 0,
                'form': 0,
                'to': 0
            }

        }
    },
    computed:{
        isActived(){
            return this.paginate.current_page
        },
        pageNumber(){
            if(!this.paginate.to){
                return []
            }

            var from = this.paginate.current_page - 2 //TODO setoff
            if(from < 1){
                from = 1
            }

            var to = from + (2 * 2)
            if(to >= this.paginate.last_page){
                to = this.paginate.last_page
            }

            var pagesArray = []
            while(from <= to ){
                pagesArray.push(from)
                from++
            }

            return pagesArray
        }
    },
    mounted(){
        this.getCliente()
        this.getRegion()
        this.getCiudad()
        this.getComuna()
        this.getDTE()
        this.getNota()
        this.getContac()
    },
    methods: {

        getCliente(){
            
            let cURL = '/api/cliente/fineid/' +  this.client
            axios.get(cURL)
            .then( res => {
                this.setCliente = _.cloneDeep(res.data)

            })
            .catch( err => {
                console.log(err)
            })
        },
        getRegion() {

            let cURL = '/api/region'
            axios.get(cURL)
            .then(res => {
            // JSON responses are automatically parsed.
            this.setRegion = _.cloneDeep(res.data)
            })
            .catch(e => {
                console.log(e);
            })

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
        getComuna() {

            let cURL = '/api/comuna'
            axios.get(cURL)
            .then(res => {
            // JSON responses are automatically parsed.
            this.setComuna = _.cloneDeep(res.data)
            })
            .catch(e => {
                console.log(e);
            })

        },
        getDTE(page){
            let mi = this
            let cURL = '/api/clientes/dte/findeid/?client=' + mi.client +'&page='+page
            axios.get(cURL)
            .then( res => {
                this.setDTE = _.cloneDeep(res.data.dte.data)
                this.paginate = _.cloneDeep(res.data.paginate)
            })
            .catch( err => {
                console.log(err)
            })
        },
        changePage(page){
            this.paginate.current_page = page
            this.getDTE(page)
        },
        getNota(){
            
            let cURL = '/api/clientes/nota/fineid/' + this.client
            axios.get(cURL)
            .then( res => {
                this.notaAll = _.cloneDeep(res.data)
                console.log(res.data)
            })
            .catch( err => {
                console.error(err)
            })
        },
        onStoreNota(){

            this.outPut = ""
            this.outErr= ""
            this.isClose = false
            this.isErr = false
           
            let cURL = '/api/clientes/nota/store'
            axios.post(cURL, 
               this.nota
            )
            .then( res => {
                
                this.nota = {}
                this.outPut = _.cloneDeep(res.data)
                this.isClose = true
                this.getNota()
                this.nota = {
                    client_id: this.client,
                    titulo: "",
                    nota: ""
                }
                console.log(res.data)
            })
            .catch( err => {
                // console.log(err.response.data.errors)
                this.outErr = _.cloneDeep(err.response)
                console.log(err)
                this.isErr = true
            })
        },
        getContac(){
            
            let cURL = '/api/clientes/contac/fineid/' + this.client
            axios.get(cURL)
            .then( res => {
                this.contacAll = _.cloneDeep(res.data)
                console.log()
            })
            .catch( err => {
                console.error(err)
            })
        },
        onStoreContac(){

            this.outPut = ""
            this.outErr= ""
            this.isClose = false
            this.isErr = false
            // this.contac.prov_id = this.client
            let cURL = '/api/clientes/contac/store'
            axios.post(cURL, 
                this.contac
            )
            .then( res => {
                this.contac = {}
                this.outPut = _.cloneDeep(res.data)
                this.isClose = true
                this.getContac()
                this.contac = {
                    client_id: this.client,
                    nombre: "",
                    cargo: "",
                    fono: "",
                    celular: "",
                    WhatsApp: "",
                    email: "",
                    nota: ""
                }
            })
            .catch( err => {
                console.log(err.response.data.errors)
                // let msg = Object.values(err.response.data.errors)
                // this.outErr = [].concat.apply([, msg])
                this.outErr = _.cloneDeep(err.response.data.errors)

                this.isErr = true
            })

        },
        isPago(status){

            switch (status) {
                case 'NULA':
                    return 'badge-secondary'
                break;
                case 'IMP':
                    return 'badge-warning'
                break;
                case 'PAG':
                    return 'badge-success'
                break;
                default:
                    return 'badge-info'
                break;
            }
        },
        isPagoT(status){
            switch (status) {
                case 'NULA':
					// return 'badge-secondary'
					return 'text-reset table-secondary'
                break;
                case 'IMP':
                    // return 'badge-warning'
					return 'text-reset table-warning'
                break;
                case 'PAG':
					// return 'bg-success'
					return 'bg-success'
                break;
                default:
					// return 'badge-info'
					return 'table-info'
                break;
            }
        }

    },
    filters : {
        dteName(tipo){

            switch (tipo) {
                case 33:
                    return 'Factura E.'
                    break;
                case 61:
                    return 'Nota Credito E.'
                    break;
                case 56:
                    return 'Nota de Debito E.'
            }
        },
        Moneda(mnt){
            return '$' + Number(mnt).toFixed(0)
        },
        Fecha(fch){
            return moment(fch).format('DD-MM-YY')
        }
    }
}
</script>


<style>

</style>