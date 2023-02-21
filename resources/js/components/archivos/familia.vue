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
            <button type="button" class="close" data-dismiss="alert" @click="isClose = !isErr">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="card text-right p-0">
           <nav class="navbar navbar-light bg-light border-bottom">
            <h3 class="mb-0">Familia</h3>
            </nav>
            <div class="card-body">
                
                <div class="input-group ">
                    <div class="input-group-prepend">
                        <span class="input-group-text">familia</span>
                    </div>
                    <select class="form-control col-2" :value="setfamilia.code_l">
                        <option selected>Linea</option>
                        <option v-for="(linea, index) in lineaALL" :key="index" :value="linea.code_l" >{{linea.nombre}}</option>
                    </select>
                    <input type="text" aria-label="codigo" class="form-control col-2" placeholder="Codigo" v-model="setfamilia.code_f"  >
                    <input type="text" aria-label="nombre" ref="nombre" class="form-control col-7" placeholder="Nombre"  v-model="setfamilia.nombre" >
                    <input type="text" class="form-control col-3" ref="descripcion" placeholder="Descripcion" aria-label="descripcion" aria-describedby="inputGroup-sizing-default" v-model="setfamilia.descripcion"  >
                </div>
                <!-- {{this.setfamilia}} -->
            </div>
             <div class="card-footer p-1 bg-light">
                    <button type="submit" :class="[ isSave ? '' : 'sr-only' ]" class="btn btn-primary mx-2" @click="onStore()">Crear</button>
                    <button type="submit"  :class="[ isRemove ? '' : 'sr-only' ]" class="btn btn-primary mx-2" @click="onDestroy()">Eliminar</button>
                    <button type="submit" :class="[ isEdit ? '' : 'sr-only' ]" class="btn btn-primary mx-2" @click="onUpdate()">Editar</button>
                    <button type="submit" class="btn btn-danger mx-2"  @click="onReset()">Cancelar</button>
             </div>
        </div>

        <div class="card">
           
            <div class="card-body table-reponsive p-0">
                <!-- <h4 class="card-title">Title</h4> -->
                <nav class="navbar navbar-light bg-light">
                    <h3 class="float-left mb-0">Listado de familias</h3> 
                    <div class="form-inline float-right">
                        <!-- <select class="form-control mr-sm-2" v-model="setlinea">
                            <option selected>Linea</option>
                            <option v-for="(linea, index) in lineaALL" :key="index" :value="linea.code_l" >{{linea.nombre}}</option>
                        </select> -->
                        <input class="form-control mr-sm-2" type="search" placeholder="Buscar " aria-label="Search" name="search" v-model="search" @keyup.enter="getFamilia()" >    
                    </div>
                </nav>
                <table class="table table-striped table-bordered table-inverse table-sm m-0">
                    <thead  class="thead-dark">
                        <tr class="text-center">
                            <th class="">#</th>
                            <th scope="col">Linea</th>
                            <th scope="col">Codigo</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col" class="">Actividad</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(familia, index) of  this.familiaAll" :key="index " class="text-center">
                                <td scope="row" >{{index + 1}}</td>
                                <td>{{familia.nombre_l}}</td>
                                <td>{{ familia.code_f }}</td>
                                <td class="text-left align-middle">{{ familia.nombre}}</td>
                                <td>{{ familia.descripcion}}</td>
                                <td class="align-middle">
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-light" @click="onEdit(familia)"><i class="far fa-edit text-primary" ></i></button>
                                        <button type="button" class="btn btn-light" @click="onRemove(familia)"><i class="far fa-trash-alt text-danger" ></i></button>
                                    </div>
                                    
                                    
                                </td>
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
    </div>
</template>

<script>
export default {
    data(){
        return {
            familiaAll: null,
            lineaALL: null,
            setfamilia: {},
            setlinea:{},
            search: null,
            outPut: null,
            outErr: null,
            isEdit: false,
            isRemove: false,
            isSave: true,
            isClose: false,
            isErr: false,
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
        this.getFamilia()
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
        getFamilia(page){

            if(this.search === null || this.search === undefined){
                var cURL = '/api/familias?page='+page
            } else {
                var cURL = '/api/familias?search='+ this.search +'&page='+page
            }

            axios.get(cURL)
            .then( res => {
                this.familiaAll = _.cloneDeep(res.data.familias.data)
                this.paginate = _.cloneDeep(res.data.paginate)
            })
            .catch( err => {
                console.error(err)
            })

            axios.get('/api/lineas')
            .then( res => {
                this.lineaALL = _.cloneDeep(res.data)
            })
            .catch (err => {
                console.err(err)
            })
        },
        changePage(page){
            this.paginate.current_page = page
            this.getFamilia(page)
        },
        onSearch(){
            var cURL = '/api/familias/search/' + this.search
            axios.get(cURL)
            .then( res => {
                this.familiaAll = _.cloneDeep(res.data)
            })
            .catch( e => {
                console.err(e)
            })
        },
        onEdit(params){
            
            this.isEdit = true
            this.isRemove = false
            this.isSave = false
            this.setfamilia = _.cloneDeep(params)
            console.log(params)
            this.$refs.nombre.focus()
            
        },
        onRemove(params){

            this.isEdit = false
            this.isRemove = true
            this.isSave = false
            this.setfamilia = _.cloneDeep(params)
            
        },
        onReset(){
            this.setfamilia = {}
            this.isEdit = false
            this.isRemove = false
            this.isSave = true
        },
        onStore(){

            let mi = this
            mi.outPut = null
            axios.post('/admin/archivos/familias/', {
               code_m: mi.setfamilia.code_m,
               nombre: mi.setfamilia.nombre,
               descripcion: mi.setfamilia.descripcion
            })
            .then( res => {
                console.log(res.data)
                mi.outPut = res.data
                mi.isClose = true
                this.getfamilia()
            })
            .catch( err => {
                console.log(err.response.data)
                mi.outErr = err.response.data.errors
                mi.isErr = true
            })
            
        },
        onUpdate(){

            let mi = this
             mi.outPut = null
            axios.put('/admin/archivos/familias/' + mi.setfamilia.id, {
                code_m: mi.setfamilia.code_m,
                nombre: mi.setfamilia.nombre,
                descripcion: mi.setfamilia.descripcion
            })
            .then( res => {
               console.log(res.data)
               mi.outPut = res.data
               mi.isClose = true
               mi.getfamilia()    
            })
            .catch( err => {
                console.error(err)
                outErr = err.response.data.errors
                mi.isErr = true
            })

            this.setfamilia = {}
            this.isEdit = false
            this.isRemove = false
            this.isSave = true
        },
        onDestroy(){

            let mi = this
             mi.outPut = null
            axios.delete('/admin/archivos/familias/' + mi.setfamilia.id , {
                _method: 'DELETE',
                id: this.checkedNames
            })
            .then( res => {
               console.log(res.data)
               mi.outPut = res.data
               mi.isClose = true
               mi.getfamilia()    
            })
            .catch( err => {
                console.error(err)
                outErr = err.response.data.errors
                mi.isErr = true
            })

            this.setfamilia = {}
            this.isEdit = false
            this.isRemove = false
            this.isSave = true
        }
    }
}
</script>

<style>

</style>
