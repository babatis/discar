<template>
<div>
    <div class="card mt-4 bg-light mb-3">
        <div class="card-header p-2 ">
            <strong class="float-left h3 m-0 ml-3">Listado de Productos</strong> 

            <div class="form-inline float-right">
                <input class="form-control form-control-sm" type="search" placeholder="Buscar" aria-label="Search" name="search" v-model="search" @keypress.enter="getProdVenta()"> 
                <!-- <div class="input-group input-group-sm mb-0 float-right">
                    <input class="form-control form-control-sm" type="search" placeholder="Buscar" aria-label="Search" name="search" v-model="search" @keypress.enter="getProdAll()"> 
                    <div class="input-group-append">
                        <button class="btn btn-sm btn-outline-success m-0 p-1" type="submit"><i class="fa fa-search px-1" aria-hidden="true" @click.prevent="getProdAll()"></i></button>
                    </div>
                </div> -->
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-reponsive-sm p-0">
            <table class="table table-sm table-striped table-inverse table-borden  m-0 " style="font-size: 0.9em">
                <thead class="thead-dark">
                    <tr>
                        <!-- <th>#</th> -->
                        <th scope="col">Codigo</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Costo</th>
                        <th scope="col">Descuento</th>
                        <th scope="col">Costo Total</th>
                        <th scope="col">Meson</th>
                        <th scope="col">Mayorista</th>
                        <th scope="col">Distribucion</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(prod, index) of prodAll" :key="index" class="" >
                            <td class="text-left align-middle"><strong class="pl-2"> {{ prod.codinterno}}</strong></td>
                            <td class="text-left align-middle"> <a :href="'/admin/productos/' + prod.slug" class="pl-2"> {{prod.nombre}} </a></td>
                            <td class="text-right align-middle"> <strong >{{prod.pcosto | currency('$', 0, { thousandsSeparator: '.' }) }}</strong></td>
                            <td class="text-right align-middle"> <strong class="ps-3"> {{prod.desct1}}</strong>%</td>
                            <td class="text-right align-middle"> <strong class="ps-3">{{prod.costotot | currency('$', 0, { thousandsSeparator: '.' }) }}</strong></td>
                            <td class="text-right align-middle"> <strong class="ps-3">{{prod.p1_venta | currency('$', 0, { thousandsSeparator: '.' }) }}</strong></td>
                            <td class="text-right align-middle"> <strong class="ps-3">{{prod.p2_venta | currency('$', 0, { thousandsSeparator: '.' }) }}</strong> </td>
                            <td class="text-right align-middle"> <strong class="ps-3">{{prod.p3_venta | currency('$', 0, { thousandsSeparator: '.' }) }}</strong> </td>
                        </tr>
                        
                    </tbody>
            </table>  
            </div>
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
    <!-- <pre>{{$data}}</pre> -->
</div>
</template>
<script>
import Vue2Filters from 'vue2-filters'
export default {
    data(){
        return {
            prodAll: null,
            search: null,
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
    mounted(){
        this.getProdVenta()
    },
    mixins: [Vue2Filters.mixin],
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
    methods: {
        getProdVenta(page){

            if(this.search === null || this.search === undefined){
                var cURL = '/api/productos/precioall?page='+page
            } else {
                var cURL = '/api/productos/precioall?search='+ this.search +'&page='+page
            }
            
            // let cURL = '/api/productos/price?search='+ this.search +'&page='+page
            
            axios.get(cURL)
            .then( res => {
                this.prodAll = _.cloneDeep(res.data.prod.data)
                this.paginate = _.cloneDeep(res.data.paginate)
                console.log(res.data);
                
            })
            .catch(err => {
                console.error(err)
            })
        },
        changePage(page){
            this.paginate.current_page = page
            this.getProdVenta(page)
        }
    },
    filters: {
        Moneda(mnt){
			return Number(mnt).toFixed(0)
		},
    }
}
</script>

<style>

</style>