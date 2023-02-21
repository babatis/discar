<template>
    <div>

        <div v-show="outerr" class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error</strong> {{outerr}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div v-show="output" class="alert alert-success alert-dismissible fade show" role="alert">
            El Inventari  se a <strong>Guardado</strong>  y el stock del producto {{ this.output.codinterno }} se <strong>Actualizo</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
       
    <div class="card text-right border-primary">
      
      <div class="card-body p-0">
        <nav class="navbar navbar-light bg-light">
            <h3 class="mb-0">Crear Inventario</h3>
        </nav>
        <div class="container-fluid justify-content-center">
             <p class=""  v-show="this.setinven.cantidad">Stock : {{cantidad + ' - ' + setinven.unidad}}</p>
            <div class="form-group row  align-items-center font-weight-bolder my-4">
                <div class="input-group ">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Producto</span>
                    </div>
                    <input type="text" aria-label="First name" class="form-control col-2" placeholder="Codigo" :value="setinven.codinterno" readonly>
                    <input type="text" aria-label="Last name" class="form-control col-7" placeholder="Nombre" :value="setinven.nombre" readonly>
                    <input type="text" class="form-control col-3" ref="cantidad" placeholder="Cantidad" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"  v-model="setinven.cantidad">
                </div>
                <br>

                <!-- <div class="col-4">
                    <label for="">Codigo :</label>
                    <input type="text" name="" id="" class="form-control form-control-plaintext mb-2" placeholder="" :value="setinven.codinterno" readonly>
                </div>
                <div class="col-6">
                    <label for="">Nombre :</label>
                    <input type="text" name="" id="" class="form-control form-control-plaintext mb-2" placeholder=""  :value="setinven.nombre" readonly>
                </div>
                <div class="col-auto">
                    <label for="">Cantidad :</label>
                    <input type="text" name="" id=""  ref="cantidad" class="form-control mb-2" placeholder=""  v-model="setinven.cantidad" autofocus>
                </div>
                <div class="col-auto">
                    <label for="" class=""></label>
                    <button type="submit" class="btn btn-primary" @click="editarInven()">Enviar</button>
                </div> -->
            </div>
        </div>
       
      </div>

        <div class="card-footer p-1">
           <button type="submit" class="btn btn-primary mx-2" @click="editarInven()">Actualizar</button>
           <button type="submit" class="btn btn-danger mx-2" @click="onReset()">Cancelar</button>
        </div>
        
    </div>
    <!-- <div>{{output}}</div> -->
    <div class="card">
   
    <div class="card-body table-reponsive p-0" >

        <nav class="navbar navbar-light bg-light">
            <h3 class="float-left mb-0">Ingreso de Inventario</h3> 
            <div class="form-inline float-right">
                <input class="form-control mr-sm-2" type="search" placeholder="Buscar " aria-label="Search" name="search" v-model="search" @keyup.enter="onSearch" >    
            </div>
        </nav>
        <table class="table table-responsive-sm table-sm table-striped table-bordered" >
            <thead class="thead-dark">
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Codigo Interno</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Unidad</th>
                    <th scope="col">Actividad</th>
                </tr>
                </thead>
                <tbody class="p-0" >
                    <tr v-for="(prod, index) of this.setprod" :key="index" class="text-center" ref="trprod" @click.self="addPrd(prod)">
                        <td scope="row" class=" align-middle">{{ index + 1 }}</td>
                        <td class="text-right  align-middle">{{ prod.codinterno }} </td>
                        <td class="text-left  align-middle"> {{ prod.nombre }} </td> 
                        <td class=" align-middle"> {{ prod.cantidad }} </td>
                        <td class=" align-middle"> {{ prod.unidad }} </td>
                        <td class="align-middle">
                            <button type="button" class="btn btn-sm btn-primary btn-lg " @click.self="addPrd(prod)">
                                Agregar
                            </button>
                        </td>
                    </tr>    
                </tbody>
        </table>
    </div>
    <!-- <div class="card-footer text-muted">
       {{output}}
    </div> -->
    </div>

    </div>
</template>

<script>
export default {
    props:[],
    data(){
        return {
            prodAll: null,
            setprod: null,
            search:'',
            setsearch: null,
            setinven: [],
            cantidad: null,
            cod : '',
            name: '',
            output: '',
            outerr: ''
        }
    },
    mounted() {
        // console.log('Inventario');
        this.getProd();
        
    },
    methods: {
        getProd() {
            this.setprod = null
            var uURL = '/api/productos'
             axios.get(uURL)
            .then(response => {
            // JSON responses are automatically parsed.
                this.setprod = _.cloneDeep(response.data)
                // console.log(this.setprod)
            })
            .catch(e => {
                console.log(e);
            })
        },
        onSearch(){
            // console.log(this.search);
            var uURL = '/api/productos/search?search=' + this.search
             axios.get(uURL)
            .then(response => {
            // JSON responses are automatically parsed.
               this.setprod = _.cloneDeep(response.data);
            })
            .catch(e => {
              console.log(e);
            })
        },
        onTrFocus(){
            //n destacar
            // this.$refs.trprod.focus();
        },
        addPrd(params) {
           
            // console.log(params);
            this.setinven = _.cloneDeep(params)
            this.cantidad = this.setinven.cantidad
            this.$refs.cantidad.focus();
        },
        editarInven(){
            // console.log('submit')
            let mi = this;
            axios.post('/admin/inventario', {
                id: mi.setinven.id,
                cantidad: mi.setinven.cantidad,
            })
            .then(function (response) {
               mi.setprod = []
               mi.output = response.data;
               console.log(mi.output)
               mi.search = mi.output.slug
               mi.onSearch()
               mi.setinven = []
            })
            .catch(function (error) {
                mi.outerr = error;
                console.log(mi.outerr)
            });
        },
        onReset(){
            let mi = this;
            mi.getProd();
            mi.setinven = [];
        }

    }
    

}
</script>

<style>

</style>
