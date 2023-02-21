<template>
<div>
        <div class="card mt-4 bg-light mb-3"> <!-- Documento -->
        <div class="card-header p-2">
            <div class="float-left text-muted"><strong class="h3">Compra</strong></div>
            <!-- <div class="float-right">
                <button type="button" class="btn btn-sm btn-primary " @click.prevent="onStoreVenta()"> <strong>Guardar</strong> </button>
            </div> -->
        </div>
        <div class="card-body p-2">

            <div class="form-row mx-1 mb-2">

                <div class="from-group">
                      <label for="" class="m-0 pl-2"><strong>Rut</strong></label>
                     <div class="input-group">
                        <input type="text" class="form-control-plaintext form-control-sm border px-2" name="" id="" placeholder="_ _ _ _ _ _ _ _-_" aria-describedby="buscarprov" v-model="setComp.rut" disabled>
                        <!-- <div class="input-group-append">
                            <button class="btn btn-sm btn-outline-success" type="button" id="buscarprov" @click="showModalProv()"> <i class="fas fa-search"></i></button>
                            
                        </div> -->
                    </div>
                </div>

                <div class="form-group col-md-4 m-0">

                    <label for="" class="m-0 pl-2"><strong>Nombre o Razon Social</strong></label>
                    <input type="text" class="form-control-plaintext form-control-sm border px-2" name="" id="" v-model="setComp.nombre" disabled>

                </div>

                <div class="col"></div>

                <div class="form-group col-xs-1 m-0"> 
                    
                    <label for="" class="m-0 pl-2"><strong>Fecha Ingreso</strong></label>
                    <input type="date"  ref="ingres" class="form-control-plaintext form-control-sm border px-2" v-model="setComp.fchingres" disabled>
                     
                </div>

                <div class="form-group col-xs-1 m-0"> 
                
                    <label for="" class="m-0 pl-2"><strong>Fecha Emision</strong></label>
                    <input type="date" class="form-control-plaintext form-control-sm border px-2" v-model="setComp.fchemis" disabled>
                    
                </div>

                <div class="form-group  col-xs-1 m-0"> 
                    
                    <label for="" class="m-0 pl-2"><strong>Fecha Vencimiento</strong></label>
                    <input type="date" class="form-control-plaintext form-control-sm border px-2" v-model="setComp.fchvenc" disabled>
                    
                </div>
                    
            </div>
            <div class="form-row mx-1">


                <div class="form-group">
                    <label for="" class="m-0 pl-2"><strong>Tipo de Documento</strong></label>
                        
                    <select id="inputState" class="form-control-plaintext form-control-sm border px-2" v-model="setComp.tipodte" disabled>
                        <option :value="33" selected>Factura Electronica</option>
                        <option :value="34" >Factura No Afecta o Exenta Electronica</option>
                        <option :value="52">Guía de Depacho Electrónica</option>
                        <option :value="56">Nota de Débito Electrónica</option>
                        <option :value="61">Nota de Credito Electrónica</option>
                        <option :value="30">Factura Manual</option>
                        <option :value="50">Guia de Despacho</option>
                        <option :value="108">SRF Solicitud de Registro de Factura</option>
                    </select>
                    
                </div>

                <div class="form-group col-sm-2 m-0"> 

                        <label for="" class="m-0 pl-2"><strong>Folio</strong></label>
                        <input type="text" class="form-control-plaintext form-control-sm border px-2" v-model="setComp.folio" disabled>

                </div>

                <!-- <div class="col sr-only"></div>
                <div class="d-flex align-items-center justify-content-end mb-2 sr-only">
                    
                    <button type="button" class="btn  btn-sm btn-primary  align-botton mt-3 mx-2 pt-2"> <strong>Trasporte</strong> </button>
                    <button type="button" class="btn btn-sm  btn-primary  align-botton mt-3 mx-2 pt-2"> <strong>Productos</strong> </button>
                </div> -->

            </div>  
            
        </div>
    </div>

        <div class="card"> <!-- detalle -->
        <div class="card-body table-responsive-sm p-0">
           <table class="table table-sm table-bordered table-bordered justify-content-center" style="font-size: 0.8em">
               <thead class="thead-dark">
                   <tr class="text-center">
                       <th>#</th>
                       <th>Codigo</th>
                       <th>Nombre Producto</th>
                       <th>Cantidad</th>
                       <th>Unidad</th>
                       <th>Precio</th>
                       <th>% Desc.</th>
                       <th>Sub Total</th>
                   </tr>
               </thead>
               <tbody>
                   <tr class="text-center" v-for="(detalle, index) in this.setDtl" :key="index">
                       <td scope="row" class="table-active">{{index + 1}}</td>
                       <td>{{detalle.codinterno}}</td>
                       <td>{{detalle.nombre}}</td>
                       <td>{{detalle.cantidad}}</td>
                       <td>{{detalle.unidad}}</td>
                       <td>{{detalle.pcosto | Moneda}}</td>
                       <td>{{detalle.desct1}}</td>
                       <td>{{detalle.monto | Moneda}}</td>
                   </tr>
               </tbody>
           </table>

            <div class="container-fluid">
               
               <div class="row p-1">
                
                <div class="col">
                    <div class="form-row m-0">
                        <div class="form-group mb-1">
                            <label for="" class="mb-0 pl-2"> <strong> Ref. de Documentos</strong></label>
                            <select id="inputState" class="form-control-plaintext form-control-sm border px-2" > <!-- ref.doc -->
                                <option :value="0">Documento</option>
                                <option :value="33">Factura Electronica</option>
                                <option :value="56">Nota de Débito Electrónica</option>
                                <option :value="61">Nota de Credito Electrónica</option>
                                <option :value="52">Guia de Despacho Electrónica</option>
                                <option :value="30">Factura Manual</option>
                                <option :value="55">Nota de Débito</option>
                                <option :value="60">Nota de Credito</option>
                                <option :value="50">Guia de Despacho</option>
                            </select>
                        </div>
                        <div class="form-group mx-2 mb-1">
                            <label for="" class="mb-0 pl-2"> <strong>Ref. Folio</strong> </label>
                            <input type="text" class="form-control-plaintext form-control-sm border px-2" name="" id="" > <!-- ref.folio -->
                        </div>
                    </div>
                   
                    <label for="exampleFormControlTextarea1" class="mb-0 pl-2"> <strong>Nota</strong> </label>
                    <textarea class="form-control-plaintext form-control-sm border px-2" id="exampleFormControlTextarea1" rows="4" ></textarea> <!-- nota -->
                   
                </div>
                
                <div class="col-5">

                <div class="form-row">
                    <div class="form-group col m-0">
                        <div class="input-group input-group-sm mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text" > <strong>Sub Total</strong> </span>
                            </div>
                            <input type="text" class="form-control-plaintext form-control-sm border px-2 text-right" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" :value="setComp.subtotal | Moneda" disabled>
                        </div>
                    </div>     
                </div>
                
                <div class="form-row">
                    <div class="form-group col-5 m-0">
                        <div class="input-group input-group-sm mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text "  > <strong>Descuento</strong> </span>
                            </div>
                            <input type="text" class="form-control-plaintext form-control-sm border px-2 text-right" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" :value="setComp.desc">
                            <div class="input-group-prepend">
                                    <span class="input-group-text " > <strong>%</strong> </span>
                            </div>
                        </div>   
                    </div>
                    <div class="form-group col m-0">
                        <div class="input-group input-group-sm mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text" > <strong>Monto</strong> </span>
                            </div>
                            <input type="text" class="form-control form-control-sm text-right" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" >
                        </div>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col mb-0">
                        <div class="input-group input-group-sm mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="lb-neto" > <strong>Neto</strong> </span>
                            </div>
                            <input type="text" class="form-control form-control-sm text-right" aria-label="Neto" aria-describedby="lb-neto" :value="setComp.neto | Moneda" >
                        </div> 
                    </div>
                    
                </div>
                    
                <div class="form-row">
                    <div class="form-group col-4 m-0">
                        <div class="input-group input-group-sm mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text " id="lb-IVA" > <strong>IVA</strong> </span>
                            </div>
                            <input type="text" class="form-control form-control-sm bold text-center bg-secondary" aria-label="IVA" aria-describedby="lb-IVA"  :value="setComp.tasaiva">
                            <div class="input-group-prepend">
                                <span class="input-group-text " > <strong>%</strong> </span>
                            </div>
                        </div>
                        
                    </div>
                    <div class="form-group col m-0">
                        <div class="input-group input-group-sm mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text " id="lb-total-iva" > <strong>Total IVA</strong> </span>
                            </div>
                            <input type="text" class="form-control form-control-sm text-right" aria-label="Total IVA" aria-describedby="lb-total-iva" :value="setComp.iva | Moneda">
                        </div>
                    </div>



                </div>    
                   
                    
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text " > <strong>Total</strong> </span>
                        </div>
                        <input type="text" class="form-control form-control-sm text-right" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" :value="setComp.total | Moneda" >
                    </div>

                </div>
            </div>
            </div>
   
        </div>
    </div>

</div> 
</template>

<script>
export default {
    props: ['comp'],
    data() {
        return {
            setComp: {},
            setDtl: []
        }
    },
    mounted(){
        this.getCompra(),
        this.getCompraDtl()
    },
    methods: {
        getCompra(){
            let cURL = '/api/compras/fineid/' + this.comp
            console.log(cURL)
            axios.get(cURL)
            .then( res => {
                this.setComp = _.cloneDeep(res.data)
                console.log(res.data)
            })
            .catch( err => {
                console.log(res.data)
            })
        },
        getCompraDtl(){
            let cURL = '/api/compras/dtls/fine/' + this.comp
            axios.get(cURL)
            .then( res => {
                this.setDtl = _.cloneDeep(res.data)
            })
            .catch( err => {
                console.log(res.data)
            })
        }
    },
    filters: {
        Fecha(fch){
        return moment(fch).format('DD-MM-YY')
        },
        Moneda(mnt){
            return '$' + Number(mnt).toFixed(0)
        }
    }

}
</script>

<style>

</style>