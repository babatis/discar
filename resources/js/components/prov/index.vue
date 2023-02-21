<template>
<div> <!-- Ini  -->
    
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


    <div class="d-flex justify-content-end">
        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
            <button type="button" class="btn btn-secondary bg-light" data-toggle="modal" data-target="#modalAddProv">+ Agregar</button>
          
            <div class="btn-group" role="group">
              <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle bg-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Exportar
              </button>
              <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                <a class="dropdown-item" href="#">Impprimir</a>
                <a class="dropdown-item" href="#">Exportar Exel</a>
              </div>
            </div>
        </div>
    </div>

   <div class="card mt-4 bg-light mb-3"> <!--  Card ini -->
        <div class="card-header p-2 ">
            <h3 class="float-left m-0 ml-3"><strong >Lista de Provedores</strong></h3>
            <div class="form-inline float-right">
                <div class="input-group input-group-sm mb-0 float-right">
                    <input class="form-control form-control-sm" type="search" placeholder="Buscar" aria-label="Search" name="search" v-model="search" @keypress.enter="onSearch()"> 
                    <div class="input-group-append">
                        <button class="btn btn-sm btn-outline-success m-0 p-1" type="submit" @click="onSearch()"><i class="fa fa-search px-1" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body table-responsive-sm p-0">
       
          <table class="table table-sm table-striped table-inverse table-borden table-bordered" style="font-size: 0.9em">
              <thead class="thead-dark">
                  <tr>
                      <th scope="col" class="text-center">RUT</th>
                      <th scope="col" class="text-center">Nombre</th>
                      <th scope="col" class="text-center">Actividad</th>
                      <th scope="col" class="text-center">Direccion</th>
                      <th scope="col" class="text-center">Contacto</th>
                  </tr>
                  </thead>
                  <tbody>
                      <tr v-for="(prov, index) of  this.provAll" :key="index ">
                          <td scope="row" class="align-middle" style="width: 6rem;"><a :href="'/admin/proveedor/' + prov.id"> {{ prov.rut}} </a> </td>
                          <td  class="align-middle">{{ prov.nombre}} </td>
                          <td class="align-middle text-wrap" style="width: 15rem;"> {{ prov.giro}} </td>
                          <td class="align-middle">
                               <ul class="list-group list-group-flush">
                                    <li class="list-group-item py-1 px-0 trasp"> <strong>Direccion :</strong>  {{ prov.direccion}}</li>
                                    <li class="list-group-item py-1 px-0 trasp"> <strong>Pais :</strong>  {{ prov.pais}}</li>
                                </ul>
                          </td>
                          <td class="align-middle">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item py-1 px-0 trasp"> <strong>E-mail :</strong> {{ prov.email}}</li>
                                    <li class="list-group-item py-1 px-0 trasp"> <strong>Fono :</strong> {{ prov.fono}}</li>
                                </ul>
                          </td>
                      </tr>  
                  </tbody>
          </table>
      </div>
    </div> <!--  Card end -->

    <div class="modal fade" id="dtlVenta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Venta N° {{this.data}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            ...
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
    </div>

    <!-- Modal agrgar proveedor -->
    <div class="modal fade" id="modalAddProv" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bg-light">
            <div class="modal-header p-2">
                <h5 class="modal-title" id="exampleModalLabel"> <strong>Nuevo proveedor</strong> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="modal-body p-2">
          
            <div class="form-row">
                <div class="form-group col-md-3 mb-1">
                  <label for="txtRut" class="m-0 pl-1"> <strong>Rut :</strong> </label>
                  <input type="text" class="form-control form-control-sm" id="txtRut" placeholder="__.___.___-_" v-model="prov.rut">
                </div>
                <div class="form-group col-md-9 mb-1">
                  <label for="txtNombre" class="m-0"> <strong>Razon Social o Nombre :</strong> </label>
                  <input type="text" class="form-control form-control-sm" id="txtNombre" placeholder="Nombre" v-model="prov.nombre">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col mb-1">
                    <label for="txtGiro" class="m-0 pl-1"> <strong>Giro :</strong></label>
                    <input type="text" class="form-control form-control-sm" id="txtGiro" placeholder="" v-model="prov.giro">
                    <!-- <textarea name="" id="" cols="20" rows="" class="form-control form-control-sm"></textarea> -->
                </div>
            </div>
<!--             
                <div class="form-group col-3">
                    <label for="textPago">Plazo de Pago :</label>
                    <input type="text" class="form-control form-control-sm" id="textPago" placeholder="">
                </div>
            </div>  -->
            <div class="form-row">
                <div class="form-group col-md-12 mb-1">
                    <label for="txtDireccion" class="m-0 pl-1"> <strong>Direccion :</strong></label>
                    <input type="text" class="form-control form-control-sm" id="txtDireccion" v-model="prov.direccion">
                </div>
                <div class="form-group col-md-6 mb-1">
                    <label for="txtCiudad" class="m-0 pl-1"> <strong>Ciudad :</strong></label>
                    <input type="text" class="form-control form-control-sm" id="txtCiudad" v-model="prov.ciudad">
                </div>
                <div class="form-group col-md-6 mb-1">
                    <label for="Pais" class="m-0 pl-1" > <strong>Pais :</strong></label>
                    <input type="text" class="form-control form-control-sm" id="Pais" v-model="prov.pais">
                </div>
            </div>
           
            <div class="form-row">    
                <div class="form-group col-md-4 mb-1">
                  <label for="txtfono" class="m-0 pl-1" > <strong>Fono :</strong></label>
                  <input type="text" class="form-control form-control-sm" id="txtfono" v-model="prov.fono">
                </div>
                <div class="form-group col-md-4 mb-1">
                  <label for="txtMail" class="m-0 pl-1"> <strong>E-Mail :</strong></label>
                  <input type="email" class="form-control form-control-sm" id="txtMail" v-model="prov.email">
                </div>
                <div class="form-group col-md-4 mb-1">
                    <label for="txtWeb" class="m-0 pl-1"> <strong>Web  :</strong></label>
                    <input type="text" class="form-control form-control-sm" id="txtWeb" v-model="prov.web">
                  </div>
            </div>

        </div>
        <div class="modal-footer p-2">
          <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-sm btn-primary" @click="onStoreProv()">Guardar</button>
        </div>
      </div>
    </div>
  </div>

</div> <!-- End  --> 
</template>

<script>
export default {
    data(){
        return {
            provAll: [],
            data: null,
            search: null,
            prov: {
                rut: '',
                nombre: '',
                giro: '',
                direccion: '',


            },
            isErr: '',
            outErr: '',
            isClose: '',
            outPut: ''
        }
    },
    mounted(){
        this.getProv()
        // console.log(moment().format('DD-MM-YYYY'))
        
    },
    methods: {
        getProv(){
            var cURL = '/api/proveedores'
            axios.get(cURL)
            .then( res => {
                this.provAll = _.cloneDeep(res.data)
            })
            .catch( err => {
                console.error(err)
            })
        },
        onSearch(){
            let cURL = '/api/proveedores/search/' + this.search
            axios.get(cURL)
            .then(res => {
                this.provAll = _.cloneDeep(res.data)
            })
            .catch( err => {
                console.err(err)
            })
        },
         onStoreProv(){
            let mi = this
            axios.post('',{
                prov : _.cloneDeep(mi.prov)
            })
            .then ( res => {
            mi.outPut = _.cloneDeep(res.data)
            mi.isClose = true
            setTimeout(() => { mi.isClose = !mi.isClose}, 5000)
            })
            .catch ( err => {
                mi.outErr = _.cloneDeep(err.response)
                mi.isErr = true
                setTimeout(() => { mi.isErr = !mi.isErr}, 12000)
            })
        },
    }
}
</script>

<style>

</style>
