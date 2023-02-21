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

        <div class="d-flex justify-content-end">
            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                <button type="button" class="btn btn-secondary bg-light" data-toggle="modal" data-target="#modelId">+ Agregar</button>
            </div>
        </div> 
        
        <!-- Modal -->
        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content bg-light">
                        <div class="modal-header p-2">
                            <h5 class="modal-title">Crear Cliente</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            
                            <div class="form-row">
                                <div class="form-group col-sm-2  mb-1">
                                    <label for="" class="m-1">Rut</label>
                                    <input type="text" name="" id="" class="form-control form-control-sm" :class="isSetErrors('rut')" placeholder="" v-model="setCliente.rut">
                                    <div class="invalid-feedback">
                                        {{issetErrorMsg('rut')}}
                                    </div>
                                </div>
                                <div class="form-group col mb-1">
                                  <label for="" class="m-1">Nombre</label>
                                  <input type="text" name="" id="" class="form-control form-control-sm" placeholder="" v-model="setCliente.nombre">
                                  
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col mb-1">
                                  <label for="" class="m-1">Giro</label>
                                  <input type="text" name="" id="" class="form-control form-control-sm" placeholder="" v-model="setCliente.giro">
                                  
                                </div>
                                
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group col mb-1">
                                    <label for="" class="m-1">Pais</label>
                                    <input type="text" name="" id="" class="form-control form-control-sm" placeholder="" v-model="setCliente.pais">
                                    
                                </div>
                                <div class="form-group col mb-1">
                                  <label for="" class="m-1">Region</label>
                                   <select class="form-control form-control-sm" id="" v-model="setCliente.REGION">
                                            <option v-for="(region, index) in this.setRegion" :key="index" :value="region.REGION_ID">
                                                {{ region.REGION_NOMBRE}}
                                            </option>
                                     </select>
                                  
                                </div>
                                <div class="form-group col mb-1">
                                    <label for="" class="m-1">Ciudad</label>
                                    <select class="form-control form-control-sm" id="" v-model="setCliente.CIUDAD">
                                            <option v-for="(ciudad, index) in this.setCiudad" :key="index" :value="ciudad.PROVINCIA_ID">
                                                {{ ciudad.PROVINCIA_NOMBRE}}
                                            </option>
                                    </select>
                                    
                                </div>
                                <div class="form-group col mb-1">
                                    <label for="" class="m-1">Comuna</label>
                                    <select class="form-control form-control-sm" id="" v-model="setCliente.COMUNA">
                                            <option v-for="(comuna, index) in this.setComuna" :key="index" :value="comuna.COMUNA_ID">
                                            {{ comuna.COMUNA_NOMBRE}}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col mb-1">
                                  <label for="" class="m-1">Direccion</label>
                                  <input type="text" name="" id="" class="form-control form-control-sm" placeholder="" v-model="setCliente.direccion">
                                  
                                </div>
                                
                            </div>
                            <div class="form-row">
                                <div class="form-group col mb-1">
                                    <label for="" class="m-1">Fono</label>
                                    <input type="text" name="" id="" class="form-control form-control-sm" placeholder="" v-model="setCliente.fono">
                                    
                                </div>
                                  <div class="form-group col mb-1">
                                    <label for="" class="m-1">Celular</label>
                                    <input type="text" name="" id="" class="form-control form-control-sm" placeholder="" v-model="setCliente.celular">
                                    
                                </div>
                                 <div class="form-group col mb-1">
                                    <label for="" class="m-1">E-Mail</label>
                                    <input type="text" name="" id="" class="form-control form-control-sm" placeholder="" v-model="setCliente.email">
                                    
                                </div>
                            </div>
                            <!-- <div class="form-row">
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                <label class="form-check-label" for="inlineCheckbox1">Credito</label>
                                </div>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                <label class="form-check-label" for="inlineCheckbox2">Recibir Cheques</label>
                                </div>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                <label class="form-check-label" for="inlineCheckbox1">Realizar Descto.</label>
                                </div>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                <label class="form-check-label" for="inlineCheckbox2">Mandato</label>
                                </div>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                <label class="form-check-label" for="inlineCheckbox1">Mayorista</label>
                                </div>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                <label class="form-check-label" for="inlineCheckbox2">Sobre Giro</label>
                                </div>
                            </div> -->
                                                       
                        </div>
                    </div>
                    <div class="modal-footer p-2">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" @click="onStore()">Guardar</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="card mt-4 bg-light mb-3">
            <div class="card-header p-2">
                <strong class="float-left h3 m-0 ml-3">Clientes</strong>

                <div class="form-inline float-right">
                    <div class="input-group input-group-sm mb-0 float-right">
                        <input class="form-control form-control-sm" type="search" placeholder="Buscar" aria-label="Search" name="search" v-model="search" @keypress.enter="getClientes()"> 
                        <div class="input-group-append">
                            <button class="btn btn-sm btn-outline-success m-0 p-1" type="submit" @click="getClientes()"><i class="fa fa-search px-1" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body table-reponsive-sm p-0">
                <table class="table table-sm table-striped table-inverse table-borden table-bordered m-0" style="font-size: 0.9em">
                    <thead class="thead-dark">
                        <tr class="text-center align-middle">
                            <!-- <th scope="col">#</th> -->
                            <th scope="col">Rut</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Direccion</th>
                            <th scope="col">Celular</th>
                            <th scope="col">Telefono</th>
                            <!-- <th scope="col">E-Mail</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(cliente, index) in this.setClientes" :key="index" class="" >
                            <td scope="row" class=" text-center align-middle" style="width: 6rem;" > <a :href="'/admin/cliente/' + cliente.id"> {{cliente.rut}}</a></td>
                            <td class="align-middle">{{cliente.nombre}}</td>
                            <td class="align-middle">{{cliente.direccion}}</td>
                            <td class="align-middle">{{cliente.celular}}</td>
                            <td class="align-middle">{{cliente.fono}}</td>
                            <!-- <td class="align-middle">{{cliente.email}}</td> -->
                        </tr>
                    </tbody>
                </table>

            </div>
            <div class="card-footer text-muted">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center m-0">
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
                </nav>
        </div>
        </div>
        <!-- {{$data}} -->
    </div> 
</template>

<script>
export default {
    data(){
        return {
            setClientes: [],
            setRegion: [],
            setCiudad: [],
            setComuna: [],
            setCliente: {},
            search: null,
            outErr: null,
            outPut: null,
            isClose: false,
            isErr: false,
            err: null,
            paginate: {
                'total': 0,
                'current_page': 0,
                'per_page': 0,
                'last_page': 0,
                'form': 0,
                'to': 0
            },
            offset: 3
        }
    },
    mounted(){
        this.getClientes()
        this.getRegion()
        this.getCiudad()
        this.getComuna()
    },
    computed:{
        isActived(){
            return this.paginate.current_page
        },
        pageNumber(){
            if(!this.paginate.to){
                return []
            }

            var from = this.paginate.current_page - this.offset
            if(from < 1){
                from = 1
            }

            var to = from + (this.offset * 2)
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
    methods: {

        getClientes(page){
            let mi = this
            // let cURL = '/api/clientes'

            if(this.search === null || this.search === undefined){
                var cURL = '/api/clientes?page='+page
            } else {
                var cURL = '/api/clientes?search='+ this.search +'&page='+page
            }

            axios.get(cURL)
            .then( res => {
                mi.setClientes = _.cloneDeep(res.data.clientes.data)
                mi.paginate = _.cloneDeep(res.data.paginate)
                // console.log(mi.setClientes)
            })
            .catch( err => {
                console.error(e)
            })

            axios.get('/api/lineas')
            .then( res => {
                mi.lineaALL = _.cloneDeep(res.data)
            })
            .catch (err => {
                console.err(err)
            })
        },
        changePage(page){
            this.paginate.current_page = page
            this.getClientes(page)
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
            //    client: _.cloneDeep(mi.setCliente)
                rut: mi.setCliente.rut
            })
            .then( res => {
                console.log(res.data)
                mi.outPut = res.data
                mi.isClose = true 
                // mi.setCliente = []
                // mi.err = null
                setTimeout(() => { mi.isClose = !mi.isClose}, 3000)             
            })
            .catch( err => {
                console.log(err.response.data)
                if(err.response.status == 422){
                    this.err = err.response.data.errors
                    mi.outErr = err.response.data.errors
                    mi.isErr = true
                }
               
                // mi.setCliente = []
                setTimeout(() => { mi.isErr = !mi.isErr}, 3000)
            })

             $('#collapseExample').collapse({ toggle: false })
                mi.setCliente = []
        },
        onSearch(){
            let cURL = '/api/clientes/search/' + this.search
            axios.get(cURL)
            .then( res => {
                this.setClientes = _.cloneDeep(res.data)
            })
            .catch( err => {
                console.err(err)
            })
        },
        issetErrorMsg(name){
             if(this.err != null){
                if(this.err[name]){
                    return this.err[name].toString()
                }
            } else {
                return ''
            }
        },
        isSetErrors(name){
            if(this.err != null){
                if(this.err[name]){
                    console.log(this.err[name])
                    return 'is-invalid'
                } else {
                    return 'is-valid'
                }
            } else {
                return ''
            }
        },

    }
}
</script>

<style>


</style>
