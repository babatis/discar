<template>
<div> <!-- Ini  -->
    
   <div class="card mt-4 bg-light mb-3"> <!--  Card ini -->
        <div class="card-header p-2 ">
            <strong class="float-left h3 m-0 ml-3">Lista de Compra</strong> 
            <div class="form-inline float-right">
                <div class="input-group input-group-sm mb-0 float-right">
                    <input class="form-control form-control-sm" type="search" placeholder="Buscar" aria-label="Search" name="search" v-model="search" @keypress.enter="setCompras()"> 
                    <div class="input-group-append">
                        <button class="btn btn-sm btn-outline-success m-0 p-1" type="submit" @click="setCompras()"><i class="fa fa-search px-1" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body table-responsive-sm p-0">
       
            <table class="table table-sm table-striped table-inverse table-borden table-bordered m-0" style="font-size: 0.9em">
                <thead class="thead-dark">
                  <tr> 
                      <th scope="col" class="text-center">Rut</th>
                      <th scope="col" class="text-center">Nombre</th>
                      <th scope="col" class="text-center">N° Factura</th>
                      <th scope="col" class="text-center">Estado</th>
                      <th scope="col" class="text-center">Neto</th>
                      <th scope="col" class="text-center">IVA</th>
                      <th scope="col" class="text-center">Total</th>
                      <th scope="col" class="text-center">Abono</th>
                      <th scope="col" class="text-center">Saldo</th>
                      <th scope="col" class="text-center">Fch. Emision</th>
                      <th scope="col" class="text-center">Fch Vence</th>
                  </tr>
                </thead>
                <tbody>
                    <tr v-for="(compr, index) of  this.ComprAll" :key="index ">
                    <td scope="row" class="text-right align-middle"> <a :href="'/admin/compras/' + compr.id"> {{ compr.rut}} </a></td>
                    <td class="text-left align-middle">{{ compr.nombre}}</td>
                    <td class="text-right align-middle">{{ compr.folio}}</td>
                    <td class="text-center align-middle">{{ compr.estado}}</td>
                    <td class="text-right align-middle">{{ compr.neto | Moneda}}</td>
                    <td class="text-right align-middle">{{ compr.iva | Moneda}}</td>
                    <td class="text-right align-middle">{{ compr.total | Moneda }}</td>
                    <td class="text-right align-middle">{{ compr.abono | Moneda }}</td>
                    <td class="text-right align-middle">{{ compr.total - compr.abono | Moneda }} </td>
                    <td class="text-center align-middle">{{ compr.fchemis | fecha }}</td>
                    <td class="text-center align-middle">{{ compr.fchvenc | fecha}}</td>
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

</div> <!-- End  --> 
</template>

<script>
export default {
    data(){
        return {
            search: null,
            ComprAll: [],
            data: null,
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
        this.setCompras()
        
        // console.log(moment().format('DD-MM-YYYY'))
        
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
        setCompras(page){

            if(this.search === null || this.search === undefined){
                var cURL = '/api/compras?page='+page
            } else {
                var cURL = '/api/compras?search='+ this.search +'&page='+page
            }
            
            axios.get(cURL)
			.then( res => {
				this.ComprAll = _.cloneDeep(res.data.compras.data)
				this.paginate = _.cloneDeep(res.data.paginate)
				console.log(res.data)
			})
			.catch( err => {
				console.error(err)
            })
            
        },
        changePage(page){
            this.paginate.current_page = page
            this.setCompras(page)
        },
        getModalVenta(val){
            $('#dtlVenta').modal('show')
            this.data = val
        },
        onSearch(){
            let cURL = '/api/compras/search/' + this.search
            axios.get(cURL)
            .then(res => {
                this.VentasAll = _.cloneDeep(res.data)
            })
            .catch( err => {
                console.err(err)
            })
        }
    },
    filters: {
        fecha(fch){
            return moment(fch).format('DD-MM-YY')
        },
        Moneda(mnt){
            return '$' + Number(mnt).toFixed(0)
        },
        Por(por){
            return Number(por).toFixed(2) + '%'
        }
    }
}
</script>

<style>

</style>
