<template>
    <div>
        <div v-if="isErr" class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error</strong> {{this.outErr}}
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

        <div class="card">
            <div class="card-header">
                Actualizar Datos de Clientes
                <a class="card-header-action btn-minimize float-right" href="#" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false">
                    <i class="icon-arrow-up"></i>
                </a>
            </div>
            <div class="collapse" id="collapseExample" style="">
                <div class="card-body">
                    <div class="container-fluid">
                                
                                <div class="form-row">
                                    <div class="form-group col-sm-2 m-0">
                                    <label for="" class="m-0"> <strong> Rut</strong></label>
                                    <input type="text" name="" id="rut" class="form-control form-control-sm" placeholder=""  v-model="setAllSelec.rut">
                                    
                                    </div>
                                    <div class="form-group col m-0">
                                    <label for="" class="m-0"> <strong>Nombre</strong> </label>
                                    <input type="text" name="" id="" class="form-control form-control-sm" placeholder="" v-model="setAllSelec.nombre">
                                    
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col m-1">
                                    <label for=""  class="m-0"> <strong>Giro</strong> </label>
                                    <input type="text" name="" id="" class="form-control form-control-sm" placeholder="" v-model="setAllSelec.actividad">
                                    
                                    </div>
                                    
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group col m-1">
                                        <label for="" class="m-0"> <strong>Pais</strong> </label>
                                        <input type="text" name="" id="" class="form-control form-control-sm" placeholder="" v-model="setAllSelec.pais">
                                    </div>
                                    <div class="form-group col m-1">
                                        <label for=""  class="m-0">  <strong>Region</strong> </label>                                        
                                        <select class="form-control form-control-sm" id="" v-model="setAllSelec.REGION">
                                            <option v-for="(region, index) in this.setRegion" :key="index" :value="region.REGION_ID">
                                                {{ region.REGION_NOMBRE}}
                                            </option>
                                        
                                        </select>
                                    </div>
                                    <div class="form-group col m-1">
                                        <label for=""  class="m-0" > <strong>Ciudad</strong> </label>                                        
                                        <select class="form-control form-control-sm" id="" v-model="setAllSelec.CIUDAD">
                                            <option v-for="(ciudad, index) in this.setCiudad" :key="index" :value="ciudad.PROVINCIA_ID">
                                                {{ ciudad.PROVINCIA_NOMBRE}}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group col m-1">
                                        <label for=""  class="m-0"> <strong>Comuna</strong> </label>
                                        <select class="form-control form-control-sm" id="" v-model="setAllSelec.COMUNA">
                                             <option v-for="(comuna, index) in this.setComuna" :key="index" :value="comuna.COMUNA_ID">
                                                {{ comuna.COMUNA_NOMBRE}}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col m-1">
                                    <label for=""  class="m-0"> <strong>Direccion</strong> </label>
                                    <input type="text" name="" id="" class="form-control form-control-sm" placeholder="" v-model="setAllSelec.domicilio">
                                    
                                    </div>
                                    
                                </div>
                                <div class="form-row">
                                    <div class="form-group col m-1">
                                        <label for=""  class="m-0"> <strong>Fono</strong> </label>
                                        <input type="text" name="" id="" class="form-control form-control-sm" placeholder="" v-model="setAllSelec.fono">
                                        
                                    </div>
                                    <div class="form-group col m-1">
                                        <label for=""  class="m-0"> <strong>Celular</strong> </label>
                                        <input type="text" name="" id="" class="form-control form-control-sm" placeholder="" v-model="setAllSelec.cel">
                                        
                                    </div>
                                    <div class="form-group col m-1">
                                        <label for=""  class="m-0"> <strong>E-Mail</strong> </label>
                                        <input type="text" name="" id="" class="form-control form-control-sm" placeholder="" v-model="setAllSelec.email">
                                        
                                    </div>
                                </div>
                                <!-- <div class="form-row m-2">
                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" v-model="setAllSelec.credito">
                                    <label class="form-check-label" for="inlineCheckbox1"> <strong>Credito</strong> </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" v-model="setAllSelec.chq">
                                    <label class="form-check-label" for="inlineCheckbox2"> <strong>Recibir Cheques</strong> </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" v-model="setAllSelec.descto">
                                    <label class="form-check-label" for="inlineCheckbox1"> <strong>Realizar Descto.</strong></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" v-model="setAllSelec.mandato">
                                    <label class="form-check-label" for="inlineCheckbox2"> <strong>Mandato</strong></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" v-model="setAllSelec.MAYORISTA">
                                    <label class="form-check-label" for="inlineCheckbox1"> <strong>Mayorista</strong></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" v-model="setAllSelec.sobregiro">
                                    <label class="form-check-label" for="inlineCheckbox2"> <strong>Sobre Giro</strong></label>
                                    </div>
                                </div> -->
                                                        
                            </div>


                </div>
            </div>
            <div class="card-footer text-muted">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button> -->
                <button type="button" class="btn btn-primary float-right" @click="onStore()">Guardar</button>
            </div>
        </div>
        
        

        <div class="card">
            <div class="card-header">
                <input class="form-control mr-sm-2" type="search" placeholder="Buscar " aria-label="Search" name="search" v-model="search" @keyup.enter="onSearch" >
            </div>
            <div class="card-body p-0 ">
                <div class="p-0 table-responsive-sm">
                <table class="table table-sm table-inverse table-borden table-bordered" style="font-size: 0.9em">
                    <thead class="thead-dark">
                        <tr class="text-center align-middle">
                            <!-- <th scope="col" >#</th> -->
                            <th scope="col" >rut</th>
                            <th scope="col" >nombre</th>
                            <th scope="col" >actividad</th>
                            <th scope="col" >Actividad</th>
                        </tr>
                        </thead>
                        <tbody class="text-left">
                            <tr v-for="(client, index) of this.setAllClientes" :key="index" >
                                <!-- <td scope="row" class="text-center align-middle">{{index}}</td> -->
                                <td class="text-left align-middle"  style="width: 6rem;">{{client.rut}}</td>
                                <td class="align-middle">{{client.nombre}}</td>
                                <td class="align-middle">{{client.actividad}}</td>
                                <td class="align-middle text-center">
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-light" @click="onSelec(client)"><i class="far fa-edit text-primary" ></i></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                </table>
                </div>
            </div>
            <div class="card-footer text-muted">
                 
            </div>

        </div>
       
    </div>
    
</template>

<script>
export default {
    data(){
        return {
            setAllClientes: [],
            setAllSelec: [],
            setRegion: [],
            setComuna: [],
            setCiudad: [],
            search: null,
            outErr: null,
            outPut: null,
            isClose: false,
            isErr: false

        }
    }, 
    mounted(){
        // this.getAllClientes()
        this.getRegion()
        this.getCiudad()
        this.getComuna()
    },
    methods: {
        getAllClientes(){
            let cURL = '/api/allclientes'
            axios.get(cURL)
            .then( res => {
                this.setAllClientes = _.cloneDeep(res.data)
            })
            .catch( err => {
                console.log(e)
            })
        },
        onSearch(){
            let cURL = '/api/allclientes/search/' + this.search
            axios.get(cURL)
            .then( res => {
                this.setAllClientes = _.cloneDeep(res.data)
            })
            .catch( e => {
                console.log(e)
            })
        },
        onSelec(params){
            $('#collapseExample').collapse({ toggle: true })
            $('#rut').focus()
            this.setAllSelec = _.cloneDeep(params)
            
        },
        getRegion() {

            let cURL = '/api/region'
            axios.get(cURL)
            .then(response => {
            // JSON responses are automatically parsed.
            this.setRegion = _.cloneDeep(response.data)
            })
            .catch(e => {
                console.log(e);
            })

        },
        getCiudad() {

            let cURL = '/api/provincia'
            axios.get(cURL)
            .then(response => {
            // JSON responses are automatically parsed.
            this.setCiudad = _.cloneDeep(response.data)
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
        onStore(){

            let mi = this
            axios.post(' /admin/cliente', {
               client: _.cloneDeep(mi.setAllSelec)
            })
            .then( res => {
                console.log(res.data)
                mi.outPut = res.data
                mi.isClose = true 
                setTimeout(() => { mi.isClose = !mi.isClose}, 3000)             
            })
            .catch( err => {
                console.log(err.response.data)
                mi.outErr = err.response.data.errors
                mi.isErr = true
                setTimeout(() => { mi.isErr = !mi.isErr}, 3000)
            })
             $('#collapseExample').collapse({ toggle: false })
                mi.setAllSelec = []
        }

    }
}
</script>

<style>


</style>
