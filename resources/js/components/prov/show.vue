<template>
<dir class="p-0">

    <div class="card mt-4 bg-light mb-2">
        <div class="card-header p-2">
             <h3 class="m-0"><strong>Proveedor</strong></h3>
        </div>
        <div class="card-body">
            
            <div class="form-row mx-auto">
            <div class="form-group col-sm-2 mb-1">
                <label for="txtRUT" class="font-weight-bold mb-0"> RUT :</label>
                <input type="text" class="form-control-plaintext form-control-sm border border-secondary px-2" id="txtRUT"  v-model="provAll.rut" disabled>
            </div>
            <div class="form-group col-md-10 mb-1">
                <label for="txtRazonSocial" class="font-weight-bold mb-0"> Nombre :</label>
                <input type="text" class="form-control-plaintext form-control-sm border border-secondary px-2" id="txtRazonSocial" v-model="provAll.nombre" disabled >
            </div>
        </div>
        <div class="form-row mx-auto">
            <div class="form-group col-md-9 mb-1">
              <label for="txtRUT" class="font-weight-bold mb-0">Giro :</label>
              <input type="text" class="form-control-plaintext form-control-sm border border-secondary px-2" id="txtFono" v-model="provAll.giro" disabled>
            </div>
            <div class="form-group col-md-3 mb-1">
              <label for="txtRUT" class="font-weight-bold mb-0">Palzo de Pago <small>(Ej 30, 60 Dias)</small> :</label>
              <input type="text" class="form-control-plaintext form-control-sm border border-secondary px-2" id="txtFono" placeholder="" v-model="provAll.plazo_pago" disabled>
            </div>
        </div>
        <div class="form-row mx-auto">
            <div class="form-group col-md-6 mb-1">
              <label for="txtCodigo" class="font-weight-bold mb-0">Direccion :</label>
              <input type="text" class="form-control-plaintext form-control-sm border border-secondary px-2" id="txtDireccion"  v-model="provAll.direccion" disabled>
            </div>
            <div class="form-group col-md-3 mb-1">
                <label for="txtCiudad" class="font-weight-bold mb-0">Ciudad :</label>
                <input type="text" class="form-control-plaintext form-control-sm border border-secondary px-2" id="txtCiudad"  v-model="provAll.ciudad" disabled>
            </div>
            <div class="form-group col-md-3 mb-1">
                <label for="txtPais" class="font-weight-bold mb-0" >Pais :</label>
                <input type="text" class="form-control-plaintext form-control-sm border border-secondary px-2" id="txtPais" v-model="provAll.pais" disabled>
            </div>
        </div>
        <div class="form-row mx-auto">
            <div class="form-group col-md-4 mb-1">
              <label for="txtFono" class="font-weight-bold mb-0" >Fono :</label>
              <input type="text" class="form-control-plaintext form-control-sm border border-secondary px-2" id="txtFono" v-model="provAll.fono" disabled>
            </div>
            <div class="form-group col-md-4 mb-1">
              <label for="txtmail" class="font-weight-bold mb-0">E-Mail :</label>
              <input type="email" class="form-control-plaintext form-control-sm border border-secondary px-2" id="txtMail" v-model="provAll.email" disabled>
            </div>
    
        </div>

        </div>
        
    </div>

    <div class="card mt-4 bg-light mb-3">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs" id="proveedoresTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active p-2" id="tabInfoproveedores" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">
                        <strong>Documentos</strong> 
                    </a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link p-2" id="tabNotas" data-toggle="tab" href="#tab-6" role="tab" aria-controls="tab-6" aria-selected="false">
                        <strong>Pagos</strong> 
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-2"  id="tabContactoproveedores" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">
                        <strong>Contactos</strong> 
                    </a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link p-2" id="tabNotas" data-toggle="tab" href="#tab-5" role="tab" aria-controls="tab-5" aria-selected="false">
                        <strong>Notas</strong> 
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-2" id="tabDCompra" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">
                        <strong>Memos</strong> 
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-2" id="tabNotas" data-toggle="tab" href="#tab-4" role="tab" aria-controls="tab-4" aria-selected="false">
                        <strong>Observaciones</strong> 
                    </a>
                </li>
                
               
            </ul>
        </div>
        <div class="card-body tab-content p-0">
            <!-- Tab-1 DTE -->
            <div class="tab-pane fade show active table-responsive-sm p-0" id="tab-1" role="tabpanel" aria-labelledby="tab-1">
                
               <table class="table table-sm table-striped table-inverse ">
                   <thead class="thead-dark">
                       <tr>
                           <th>N° Factura</th>
                           <th>F. Emision</th>
                           <th>F. Vence</th>
                           <th>Estado</th>
                           <th>Neto</th>
                           <th>Descuento</th>
                           <th>IVA</th>
                           <th>Total</th>
                           <th>Abono</th>
                           <th>Saldo</th>
                           <th>Actividad</th>
                       </tr>
                       </thead>
                       <tbody>
                           <tr v-for="(dte, index) of this.dteAll" :key="index">
                               <td scope="row">{{dte.folio}}</td>s
                               <td>{{dte.fchemis}}</td>
                               <th>{{dte.fchvenc}}</th>
                               <th>{{dte.estado}}</th>
                               <th>{{dte.desc}}</th>
                               <th>{{dte.mntneto}}</th>
                               <th>{{dte.iva}}</th>
                               <th>{{dte.mnttotal}}</th>
                               <th>{{dte.abono}}</th>
                               <th>{{dte.mnttotal - dte.abono}}</th>
                               <th></th>
                           </tr>
                       </tbody>
               </table>
            </div>
            <!-- Tab-2 Contacto -->
            <div class="tab-pane fade table-responsive-sm p-0" id="tab-2" role="tabpanel" aria-labelledby="tab-2">
                
                <button type="button" class="btn btn-sm btn-primary float-right m-1" data-toggle="modal" data-target="#ModalContacto">  <strong><i class="fa fa-user-plus" aria-hidden="true"></i>  Contacto</strong> </button> 

                <table class="table table-sm table-striped table-inverse mb-0">
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
            <!-- Tab-3 Memo -->
            <div class="tab-pane fade py-0" id="tab-3" role="tabpanel" aria-labelledby="tab-3">
                <div class="clearfix ">
                    <button type="button" class="btn btn-sm btn-primary float-right my-2" @click="onMemoUpdate()"> <i class="fa fa-save" aria-hidden="true"></i>  <strong> Guardar</strong> </button>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <textarea name="" id="" class="form-control form-control-sm" rows="5" v-model="provAll.memo"></textarea>
                    </div>
                </div>
            </div>
            <!-- Tab-4 Observacion -->
            <div class="tab-pane fade py-0 " id="tab-4" role="tabpanel" aria-labelledby="tab-4">
                <div class="clearfix">
                    <button type="button" class="btn btn-sm btn-primary float-right my-2" @click="onObserUpdate()"> <i class="fa fa-save" aria-hidden="true"></i> <strong>  Guardar</strong> </button>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <textarea name="" id="" class="form-control form-control-sm" rows="5" v-model="provAll.observacion"></textarea>
                    </div>
                </div>
            </div>
            <!-- Tab-5 Nota -->
            <div class="tab-pane fade p-0" id="tab-5" role="tabpanel" aria-labelledby="tab-5">
                <div class="clearfix px-5">
                    <button type="button" class="btn btn-sm btn-primary float-right my-2" data-toggle="modal" data-target="#ModalNota">  <strong> <i class="fa fa-plus" aria-hidden="true"></i>  Nota</strong> </button>
                </div>
                <div class="container-fluid">
                     
                    <div class="row">
                        
                        <div class="col-sm-4" v-for="(nota, index) in this.notaAll" :key="index">
                            <div class="card bg-light mb-2">
                            <div class="card-body p-2">
                                <h5 class="card-title mb-2"> <strong>{{nota.titulo}}</strong> </h5>
                                <p class="card-text mb-2">{{nota.nota}}</p>
                                <p class="card-text float-right"><small class="text-muted">Ultima actualizacion {{nota.updated_at }}</small></p>
                            </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            
            </div>
            <!-- Tab-6 Nota -->
            <div class="tab-pane fade p-0" id="tab-6" role="tabpanel" aria-labelledby="tab-6">
                pagos
            </div>

        </div>
        <!-- <div class="card-footer text-muted">
            Footer
        </div> -->
    </div>

        
    <!-- Modal Contacto-->
    <div class="modal fade" id="ModalContacto" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content bg-light">
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
                            <input type="text" class="form-control form-control-sm"  :class="isSetErrors('nombre')" v-model="contac.nombre">
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


    <!-- Modal de Notas -->
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
                        <input type="text" class="form-control form-control-sm"  :class="isSetErrors('titulo')" v-model="nota.titulo">
                    </div>
                    <div class="form-group m-0 col">
                        <label for="" class="col-form-label py-1"> <strong>Nota :</strong> </label> <br>
                        <textarea class="form-control form-control-sm" :class="isSetErrors('nota')"  rows="10" v-model="nota.nota" ></textarea>
                    </div>    
                </div>
                <div class="modal-footer p-2">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"> <strong>Cerrar</strong> </button>
                    <button type="button" class="btn btn-sm btn-primary" @click="onStoreNota()"><strong> Guardar</strong></button>
                </div>
            </div>
        </div>
    </div>
    
        

</dir>
</template>

<script>
export default {
    props: ['prov'],
    data(){
        return {
            provAll: {
                rut: "",
                nombre: "",
                giro: "",
                direccion: "",
                comuna: "",
                ciudad: "",
                pais: "",
                zipecode: "",
                fono: "",
                email: "",
                plazo_pago: "",
                observacion: "",
                memo: "",
                created_at: "",
                updated_at : ""
            },
            contacAll: {},
            dteAll: {},
            contac: {
                prov_id: this.prov,
                nombre: "",
                cargo: "",
                fono: "",
                celular: "",
                WhatsApp: "",
                email: "",
                nota: ""
            },
            notaAll: {},
            nota: {
                prov_id: this.prov,
                titulo: "",
                nota: ""
            },
            isErr: false,
            outErr: "",
            isClose: false,
            outPut: ""

            
        }
    },
    mounted(){
        this.getProv()
        this.getContac()
        this.getNota()
    },
    methods: {

        getProv(){
            let cURL = '/api/proveedores/fineid/' + this.prov
            axios.get(cURL)
            .then( res => {
                this.provAll = _.cloneDeep(res.data)
                console.log(this.provAll)
            })
            .catch( err => {
                console.error(err)
            })
        },
        getDTE(){

            let cURL = '/api/proveedores/contac/fineid/' + this.prov
            axios.get(cURL)
            .then( res => {
                this.contacAll = _.cloneDeep(res.data)
                console.log()
            })
            .catch( err => {
                console.error(err)
            })
            
        },
        getContac(){
            
            let cURL = '/api/proveedores/contac/fineid/' + this.prov
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
            this.isClose = ""
            this.isErr = ""
            // this.contac.prov_id = this.prov
            let cURL = '/api/proveedores/contac/store'
            axios.post(cURL, 
                this.contac
            )
            .then( res => {
                this.contac = {}
                this.outPut = res.data
                this.isClose = true
                this.getContac()
                this.contac = {
                    prov_id: this.prov,
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
                this.outErr = err.response.data.errors

                this.isErr = true
            })

        },
        getNota(){
            
            let cURL = '/api/proveedores/nota/fineid/' + this.prov
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
           
            let cURL = '/api/proveedores/nota/store'
            axios.post(cURL, 
                _.cloneDeep(this.nota)
            )
            .then( res => {
                
                this.nota = {}
                this.outPut = _.cloneDeep(res.data)
                this.isClose = true
                this.getNota()
                this.nota = {
                    prov_id: this.prov,
                    titulo: "",
                    nota: ""
                }
                console.log(res.data)
            })
            .catch( err => {
                // console.log(err.response.data.errors)
                this.outErr = _.cloneDeep(err.response)
                this.isErr = true
            })

        },
        onMemoUpdate(){

            let cURL = '/api/proveedores/memo/update'
            axios.put(cURL, 
                this.provAll
            )
            .then(res => {
                this.getProv()
                console.log(res.data)
            })
            .catch( err => {
                console.log(err)
            })

        },
        onObserUpdate(){

            let cURL = '/api/proveedores/obser/update'
            axios.put(cURL, 
                this.provAll
            )
            .then(res => {
                this.getProv()
                console.log(res.data)
            })
            .catch( err => {
                console.log(err)
            })

        },
        isSetErrors(name){
            if(this.outErr != ""){
                if(this.outErr[name]){
                    console.log(this.outErr[name])
                    return 'is-invalid'
                } else {
                    return 'is-valid'
                }
            } else {
                return ''
            }
        }

    }
}
</script>

<style>

</style> 