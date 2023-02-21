<template>
<div> <!-- Ini  -->
	
   <div class="card mt-4 bg-light mb-3"> <!--  Card ini -->
		<div class="card-header p-2 ">
			<strong class="float-left h3 m-0 ml-3">Lista de Venta</strong> 

			<div class="form-inline float-right">
				<div class="input-group input-group-sm mb-0 float-right">
					<input class="form-control form-control-sm" type="search" placeholder="Buscar" aria-label="Search" name="search" v-model="search" @keypress.enter="setVentas()"> 
					<div class="input-group-append">
						<button class="btn btn-sm btn-outline-success m-0 p-1" type="submit" @click="setVentas()"><i class="fa fa-search px-1" aria-hidden="true"></i></button>
					</div>
				</div>
			</div>
		</div>
	  <div class="card-body p-0">
	    <div class="table-responsive-sm p-0">
		  <table class="table table-sm table-inverse table-borden table-bordered m-0" style="font-size: 0.9em">
			  <thead class="thead-dark">
				  <tr class="text-center align-middle">
					  <th scope="col">N°</th>
					  <th scope="col">Folio</th>
					  <th scope="col">Cliente</th>
					  <th scope="col">Neto</th>
					  <th scope="col">IVA</th>
					  <th scope="col">Total</th>
					  <th scope="col">Abono</th>
					  <th scope="col">Saldo</th>
					  <th scope="col">Estado</th>
					  <th scope="col">Fecha</th>
				  </tr>
				  </thead>
				  <tbody>
					  <tr v-for="(venta, index) of  this.VentasAll" :key="index" :class="isNula(venta.estado)" class="font-weight-bold">
						  <td scope="row" class="text-center align-middle" > <a :href="'/admin/venta/' + venta.id" class="text-reset">{{venta.id}}</a> </td>
						  <td class="text-center align-middle" style="width: 4rem;"><a :href="'/admin/venta/' + venta.id" class="text-reset">{{venta | Fact}} </a></td>
						  <td class="text-left align-middle" style="width: 30rem;">{{venta.nombrec}}</td>
						  <td class="text-right align-middle">{{venta.neto | currency('$', 0, { thousandsSeparator: '.' })}}</td>
						  <td class="text-right align-middle">{{venta.iva | currency('$', 0, { thousandsSeparator: '.' })}}</td>
						  <td class="text-right align-middle">{{venta.total | currency('$', 0, { thousandsSeparator: '.' })}}</td>
						  <td class="text-right align-middle">{{venta.abono | currency('$', 0, { thousandsSeparator: '.' })}}</td>
						  <td class="text-right align-middle">{{venta.total - venta.abono | currency('$', 0, { thousandsSeparator: '.' })}}</td>
						  <td class="text-right align-middle">{{venta.estado }}</td>
						  <td class="text-right align-middle">{{venta.fchcrea | Fecha}}</td>
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

	<!-- <pre>{{$data}}</pre> -->

</div> <!-- End  --> 
</template>

<script>
import Vue2Filters from 'vue2-filters'
export default {
	data(){
		return {
			VentasAll: [],
			data: null,
			search: null,
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
		this.setVentas()
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
		setVentas(page){

			if(this.search === null || this.search === undefined){
                var cURL = '/api/ventas?page='+page
            } else {
                var cURL = '/api/ventas?search='+ this.search +'&page='+page
			}
			
			// var cURL = '/api/ventas'

			axios.get(cURL)
			.then( res => {
				this.VentasAll = _.cloneDeep(res.data.ventas.data)
				this.paginate = _.cloneDeep(res.data.paginate)
				// console.log(res.data)
			})
			.catch( err => {
				console.error(err)
			})
		},
		changePage(page){
            this.paginate.current_page = page
            this.setVentas(page)
        },
		getModalVenta(val){
			$('#dtlVenta').modal('show')
			this.data = val
		},
		onSearch(){
			let cURL = '/api/ventas/search/' + this.search
			axios.get(cURL)
			.then(res => {
				this.VentasAll = _.cloneDeep(res.data)
			})
			.catch( err => {
				console.err(err)
			})
		},
		isNula(status){
            switch (status) {
                case 'NULA':
					// return 'badge-secondary'
					return 'text-reset table-secondary'
                break;
                case 'IMP':
                    // return 'badge-warning'
					return 'text-reset table-warning'
                break;
                case 'PAG':
					// return 'bg-success'
					return 'bg-success'
                break;
                default:
					// return 'badge-info'
					return 'table-info'
                break;
            }
        }
	},
	filters: {
		Fecha(fch){
			return moment(fch).format('DD-MM-YY')
		},
		Moneda(mnt){
			return '$' + Number(mnt).toFixed(0)
		},
		Por(por){
			return Number(por).toFixed(2) + '%'
		},
		Fact(vent){

			switch (vent.tipodte) {
				case 33:
					return 'F-' +  vent.folio
				break;
				case 35:
					return 'B-' +  vent.folio
				break;
				case 39:
					return 'BE-' +  vent.folio
				break;
				default:
                    return 'S/N'
                break;
			}
			
		}
	}
}
</script>

<style>

</style>
