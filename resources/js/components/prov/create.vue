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

    <div class="card mt-4">

        <div class="card-body col-12">

            <div class="container-fluid">


                    <div class="row">

                        <div class="col-5 ">
                            <h2> <strong>Provedores</strong>  </h2>
                        </div>
                        <div class="col-4 offset-3">
                            <div class="row justify-content-end align-middle">

                                <button type="button" class="btn btn-primary " @click="onStoreProv()" >Guardar</button>

                            </div>
                        </div>

                    </div>
                <br>
                <form action="" method="post">

                    <div class="form-row">
                        <div class="form-group col-md-2 mb-1">
                            <label for="txtRUT" class="font-weight-bold m-0 pl-2">R.U.T. :</label>
                            <input type="text" class="form-control form-control-sm " id="txtRUT" value="" v-model="prov.rut">
                        </div>
                        <div class="form-group col-md-4 mb-1">
                            <label for="txtRazonSocial" class="font-weight-bold m-0 pl-2">Nombre o Razon Social :</label>
                            <input type="text" class="form-control form-control-sm " id="txtNombre" value="" v-model="prov.nombre">
                        </div>
                        <div class="form-group col-md-6 mb-1">
                            <label for="txtRazonSocial" class="font-weight-bold m-0 pl-2">Giro :</label>
                            <input type="text" class="form-control form-control-sm " id="txtGiro" value="" v-model="prov.giro">
                        </div>
                        <div class="form-group col-md-6 mb-1">
                            <label for="txtCodigo" class="font-weight-bold m-0 pl-2">Direccion :</label>
                            <input type="text" class="form-control form-control-sm " id="txtDireccion" value="" v-model="prov.direc">
                        </div>
                        <div class="form-group col-md-3 mb-1">
                            <label for="txtPais" class="font-weight-bold m-0 pl-2" >Comuna :</label>
                            <input type="text" class="form-control form-control-sm " id="txtComuna" value="" v-model="prov.comuna">
                        </div>
                        <div class="form-group col-md-3 mb-1">
                            <label for="txtCiudad" class="font-weight-bold m-0 pl-2">Ciudad :</label>
                            <input type="text" class="form-control form-control-sm " id="txtCiudad" value="" v-model="prov.ciudad">
                        </div>
                        <div class="form-group col-md-2 mb-1">
                            <label for="txtPais" class="font-weight-bold m-0 pl-2" >Pais :</label>
                            <input type="text" class="form-control form-control-sm " id="txtPais" value="" v-model="prov.pais">
                        </div>
                        <div class="form-group col-md-5 mb-1">
                            <label for="txtmail" class="font-weight-bold m-0 pl-2">E-Mail :</label>
                            <input type="email" class="form-control form-control-sm " id="txtMail" value="" v-model="prov.mail">
                        </div>
                        <div class="form-group col-md-3 mb-1">
                            <label for="txtFono" class="font-weight-bold m-0 pl-2" >Fono :</label>
                            <input type="text" class="form-control form-control-sm " id="txtFono" value="" v-model="prov.fono">
                        </div>
                        <div class="form-group col-md-2 mb-1">
                            <label for="txtRazonSocial" class="font-weight-bold m-0 pl-2">Palzo de Pago :</label>
                            <input type="text" class="form-control form-control-sm " id="txtPlazo" value="" v-model="prov.plazo">
                            <small class="m">Ej. 30, 60 Dias</small>
                        </div>

                    </div>



                </form> <!-- fin de form-->
            </div> <!-- fin de container-fluid -->

            <!-- <div class="card text-center"> #inicio de card
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" id="proveedoresTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="tabInfoproveedores" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">
                            Nota
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  id="tabContactoproveedores" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">
                            Contactos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tabDCompra" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">
                            Documentos de Compras
                        </a>
                    </li>
                    </ul>
                </div>
                    <div class="card-body"> -->
                <!--<div class="card-body tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab-1">

                </div>
                <div class="tab-pane fade " id="tab-2" role="tabpanel" aria-labelledby="tab-2">
                    @include('comp/proveedores_tab_contacto') agregar Contacto de proveedoresedor  -->
                <!--</div>
                <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="tab-3">
                    @include('comp/proveedores_tab_fproveedores') -->
                <!--</div>
                </div>
                    </div>
            </div>  -->


        </div>

    </div>
</div>
</template>

<script>
export default {
    data(){
        return {
            prov: {
                rut: null,
                nombre: null,
                giro: null,
                plazo: null,
                direc: null,
                pais:null,
                ciudad: null,
                comuna: null,
                fono: null,
                mail: null,
            },
            isErr: null,
            isClose: null,
            outErr: null,
            outPut: null
        }
    },
    mounted(){

    },
    methods: {
        onStoreProv(){
            let mi = this

            axios.post('/admin/proveedor', {
                proveedor : _.cloneDeep(mi.prov)
            })
            .then (res => {
                mi.outPut = _.cloneDeep(res.data)
                mi.isClose = true
                setTimeout(() => { mi.isClose = !mi.isClose}, 5000)
            })
            .catch ( err => {
                mi.outErr = _.cloneDeep(err.response)
                mi.isErr = true
                setTimeout( () => { mi.isErr = !mi.isErr}, 12000)
            })
        }
    }
}
</script>

<style>

</style>
