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
            <button type="button" class="close" data-dismiss="alert" @click="isErr = !isErr">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="card text-right p-0">
           <nav class="navbar navbar-light bg-light border-bottom">
            <h3 class="mb-0">Linea</h3>
            </nav>
            <div class="card-body">
                
                <div class="input-group ">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Linea</span>
                    </div>
                    <input type="text" aria-label="codigo" class="form-control col-2" placeholder="Codigo" v-model="setLinea.code_l"  >
                    <input type="text" aria-label="nombre" ref="nombre" class="form-control col-7" placeholder="Nombre"  v-model="setLinea.nombre" >
                    <input type="text" class="form-control col-3" ref="descripcion" placeholder="Descripcion" aria-label="descripcion" aria-describedby="inputGroup-sizing-default" v-model="setLinea.descripcion"  >
                </div>
                <!-- {{this.setLinea}} -->
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
            <h3 class="float-left mb-0">Listado de Lineas</h3> 
            <div class="form-inline float-right">
                <input class="form-control mr-sm-2" type="search" placeholder="Buscar " aria-label="Search" name="search" v-model="search" @keyup.enter="onSearch" >    
            </div>
        </nav>
                <table class="table table-striped table-bordered table-inverse table-sm">
                    <thead  class="thead-dark">
                        <tr class="text-center">
                            <th class="">#</th>
                            <th scope="col">Codigo</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col" class="">Actividad</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(linea, index) of  lineaAll" :key="index " class="text-center">
                                <td scope="row" >{{index + 1}}</td>
                                <td>{{ linea.code_l }}</td>
                                <td class="text-left align-middle">{{ linea.nombre}}</td>
                                <td>{{ linea.descripcion}}</td>
                                <td class="align-middle">
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-light" @click="onEdit(linea)"><i class="far fa-edit text-primary" ></i></button>
                                        <button type="button" class="btn btn-light" @click="onRemove(linea)"><i class="far fa-trash-alt text-danger" ></i></button>
                                    </div>
                                    
                                    
                                </td>
                            </tr>
                            
                        </tbody>
                </table>
                
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            lineaAll: null,
            setLinea: {},
            search: null,
            outPut: null,
            outErr: null,
            isEdit: false,
            isRemove: false,
            isSave: true,
            isClose: false,
            isErr: false
        }
    },
    mounted(){
        this.getLinea()
    },
    methods: {
        getLinea(){
            var cURL = '/api/lineas'
            axios.get(cURL)
            .then( res => {
                this.lineaAll = _.cloneDeep(res.data)
            })
            .catch( err => {
                console.error(e)
            })
        },
        onSearch(){
            var cURL = '/api/lineas/search/' + this.search
            axios.get(cURL)
            .then( res => {
                this.lineaAll = _.cloneDeep(res.data)
            })
            .catch( e => {
                console.err(e)
            })
        },
        onEdit(params){
            
            this.isEdit = true
            this.isRemove = false
            this.isSave = false
            this.setLinea = _.cloneDeep(params)
            console.log(params)
            this.$refs.nombre.focus()
            
        },
        onRemove(params){

            this.isEdit = false
            this.isRemove = true
            this.isSave = false
            this.setLinea = _.cloneDeep(params)
            
        },
        onReset(){
            this.setLinea = {}
            this.isEdit = false
            this.isRemove = false
            this.isSave = true
        },
        onStore(){

            let mi = this
            mi.outPut = null
            axios.post('/admin/archivos/lineas', {
               code_l: mi.setLinea.code_l,
               nombre: mi.setLinea.nombre,
               descripcion: mi.setLinea.descripcion
            })
            .then( res => {
                console.log(res.data)
                mi.outPut = res.data
                mi.isClose = true
                mi.getLinea()
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
            axios.put('/admin/archivos/lineas/' + mi.setLinea.id, {
                code_l: mi.setLinea.code_l,
                nombre: mi.setLinea.nombre,
                descripcion: mi.setLinea.descripcion
            })
            .then( res => {
               console.log(res.data)
               mi.outPut = res.data
               mi.isClose = true
               mi.getLinea()    
            })
            .catch( err => {
                console.error(err)
                outErr = err.response.data.errors
                mi.isErr = true
            })

            this.setLinea = {}
            this.isEdit = false
            this.isRemove = false
            this.isSave = true
        },
        onDestroy(){

            let mi = this
             mi.outPut = null
            axios.delete('/admin/archivos/lineas/' + mi.setLinea.id , {
                _method: 'DELETE',
                id: this.checkedNames
            })
            .then( res => {
               console.log(res.data)
               mi.outPut = res.data
               mi.isClose = true
               mi.getLinea()    
            })
            .catch( err => {
                console.error(err)
                outErr = err.response.data.errors
                mi.isErr = true
            })

            this.setLinea = {}
            this.isEdit = false
            this.isRemove = false
            this.isSave = true
        }
    }
}
</script>

<style>

</style>
