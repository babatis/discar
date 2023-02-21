<template>
<div>

     <!-- index:cliente -->
        <div id="pedido" class="card mt-4 bg-light mb-3">
            <div class="card-header p-2 align-middle">
                <h3 class="float-left justify-content-center m-0"> <strong>Nota de Pedido</strong> </h3>
                    <!-- <button type="button" class="btn  btn-primary " @click="onStoreVenta()"> <strong>Guardar</strong></button> -->

                
                <h3  class="float-right mx-1" v-for="(dte, index) of this.setDte" :key="index">
                    <span class="badge text-light" :class="isPago(dte.estado)"> {{dte.tipodte | dteAbr}} {{ dte.folio }}</span>
                </h3> 
                <h3  class="float-right mx-1"><span class="badge badge-info text-light">NP / {{ this.vent }}</span></h3> 
            </div>
            <div class="card-body table-responsive-sm p-2">
                <div class="clearfix">
                    <h4 class="float-left "><strong> Cliente :</strong></h4> 
                    <button type="button" class="btn btn-sm btn-secondary float-right sr-only" data-toggle="modal" data-target="#cliente"> <strong><i class="fas fa-search"></i> Cliente</strong></button>
                </div>

               
               
              
               <div class="form-row">

                    <div class="input-group input-group-sm col-lg-3 mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text text-dark" id="inputGroup-sizing-sm"><strong>Rut</strong></span>
                        </div>
                        <input type="text" class="form-control-plaintext form-control-sm  border border-left-0 border-secondary px-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" v-model="setCliente.rut" disabled>
                    </div>

                    <div class="input-group input-group-sm col-lg-9  mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text text-dark " id="inputGroup-sizing-sm"><strong>Nombre</strong></span>
                        </div>
                        <input type="text" class="form-control-plaintext form-control-sm border border-left-0 border-secondary px-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" v-model="setCliente.nombre" disabled>
                    </div>

                    <!-- <div class="form-group col-sm-12 col-lg-3 mb-1">
                        <label for="" class="mb-0"> <strong>Rut</strong> </label>
                        <input type="text" name="" id="" class="form-control-plaintext form-control-sm border border-secondary px-2" v-model="setCliente.rut" disabled>
                    </div>

                    <div class="form-group col-sm-12 col-lg-9  mb-1">
                        <label for="" class="mb-0"> <strong>Nombre</strong> </label>
                        <input type="text" name="" id="nombrec" class="form-control-plaintext form-control-sm border border-secondary px-2"  v-model="setCliente.nombre" disabled>
                    </div>      -->
                   
                </div>
                <div class="form-row">

                    <div class="input-group input-group-sm col-sm-12 col-lg-9 mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text text-dark" id="inputGroup-sizing-sm"><strong>Dirección</strong></span>
                        </div>
                        <input type="text" class="form-control-plaintext form-control-sm border border-left-0 border-secondary px-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" v-model="setCliente.direccion" disabled>
                    </div>

                    <div class="input-group input-group-sm col-sm-12 col-lg-3 mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text text-dark" id="inputGroup-sizing-sm"><strong>Ciudad</strong></span>
                        </div>
                        <select class="form-control-plaintext form-control-sm border border-left-0 border-secondary px-2" id="" v-model="setCliente.ciudad" disabled>
                            <option v-for="(ciudad, index) in this.setCiudad" :key="index" :value="ciudad.PROVINCIA_ID">
                                {{ ciudad.PROVINCIA_NOMBRE}}
                            </option>
                        </select>
                    </div>

                    <!-- <div class="form-group col-sm-12 col-lg-9 mb-1">
                        <label for="" class="mb-0"> <strong>Direccion</strong>  </label>
                        <input type="text" name="" id="" class="form-control-plaintext form-control-sm border border-secondary px-2" placeholder=""  v-model="setCliente.direccion" disabled>
                    </div>
                    <div class="form-group col-sm-12 col-lg-3 mb-1">
                        <label for=""  class="m-0" > <strong>Ciudad</strong> </label>                                        
                        <select class="form-control-plaintext form-control-sm border border-secondary px-2" id="" v-model="setCliente.ciudad" disabled>
                            <option v-for="(ciudad, index) in this.setCiudad" :key="index" :value="ciudad.PROVINCIA_ID">
                                {{ ciudad.PROVINCIA_NOMBRE}}
                            </option>
                        </select>
                    </div> -->
               </div>

                <div class="form-row">
                     <div class="input-group input-group-sm col">
                        <div class="input-group-prepend">
                            <span class="input-group-text text-dark " id="inputGroup-sizing-sm"><strong>E-Mail</strong></span>
                        </div>
                        <input type="text" class="form-control-plaintext form-control-sm border border-left-0 border-secondary px-2"  placeholder="" v-model="setCliente.email" disabled>
                    </div>

                     <div class="input-group input-group-sm col">
                        <div class="input-group-prepend">
                            <span class="input-group-text text-dark" id="inputGroup-sizing-sm"><strong>Telefono</strong></span>
                        </div>
                        <input type="text" class="form-control-plaintext form-control-sm border border-left-0 border-secondary px-2"  placeholder="" v-model="setCliente.fono" disabled>
                    </div>

                    <div class="input-group input-group-sm col">
                        <div class="input-group-prepend">
                            <span class="input-group-text text-dark" id="inputGroup-sizing-sm"><strong>Celular</strong></span>
                        </div>
                        <input type="text" class="form-control-plaintext form-control-sm border border-left-0 border-secondary px-2"  placeholder="" v-model="setCliente.celular" disabled>
                    </div>
                </div>

               <div class="form-row">

                   <!-- <div class="form-group col-sm-12 col-lg-2 mb-1">
                     <label for="" class="mb-0"> <strong>E-Mail</strong> </label>
                     <input type="text" name="" id="" class="form-control-plaintext form-control-sm border border-secondary px-2" placeholder="" v-model="setCliente.email" disabled>
                   </div>
                   <div class="form-group col-sm-12 col-lg-2 mb-1">
                     <label for="" class="mb-0"> <strong>Telefono</strong> </label>
                     <input type="text" name="" id="" class="form-control-plaintext form-control-sm border border-secondary px-2" placeholder="" v-model="setCliente.fono" disabled>
                   </div>
                   <div class="form-group col-sm-12 col-lg-2 mb-1">
                     <label for="" class="mb-0"> <strong>Celular</strong> </label>
                     <input type="text" name="" id="" class="form-control-plaintext form-control-sm border border-secondary px-2" placeholder="" v-model="setCliente.celular" disabled>
                   </div> -->
                   
               </div>
                <hr class="my-1">
                <div>
                    <h4 class="float-left "> <strong>Productos :</strong> </h4> 
                    <button type="button" class="btn btn-sm btn-secondary float-right sr-only" data-toggle="modal" data-target="#productos"> <strong><i class="fas fa-search"></i> Producto</strong></button>
                </div>
                
               <!-- index:tabladetalle -->
               <table class="table table-sm table-inverse table-borden table-bordered m-0" style="font-size: 0.9em">
                   <thead>
                       <tr class="text-center align-middle table-primary">
                           <th>N°</th>
                           <th>Codigo</th>
                           <th>Detalle</th>
                           <th>Catintidad</th>
                           <th>Unidad</th>
                           <th>Precio</th>
                           <th>% Desc</th>
                           <th>Total</th>
                       </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(prod, index) of this.setdtll" :key="index"  class="py-0 align-middle">
                            <th scope="row" class="py-0 text-center">{{prod.item }}</th>
                            <td class="py-0">{{prod.codinterno}}</td>
                            <td class="py-0">{{prod.nombre}}</td>
                            <td class="py-0 text-right">{{prod.cantidad | number('0,0', { thousandsSeparator: '.' })}}</td>
                            <td class="py-0 text-right">unidad</td>
                            <td class="py-0 text-right">{{ prod.precio | currency('$', 0, { thousandsSeparator: '.' }) }}</td>
                            <td class="py-0 text-right">{{prod.descuento | por}}</td>
                            <td class="py-0 text-right">{{prod.monto | currency('$', 0, { thousandsSeparator: '.' }) }}</td>
                        </tr>
                    </tbody>
               </table>
               <hr class="my-1">
                <div class="row p-1">
                
                <div class="col-7">
                    <div class="form-row">

                        <div class="form-group col-6 m-0">
                            <div class="input-group input-group-sm mb-1 ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text text-dark " > <strong>Forma de Pago</strong> </span>
                                </div>
                                <select name="" id="" class="form-control-plaintext form-control-sm border border-secondary px-2" v-model="this.setVenta.fmapago" disabled>
                                    <option value="1">Contado</option>
                                    <option value="2">Credito</option>
                                    <option value="3">Sin Costo</option>
                                </select>
                            </div>
                        </div>     

                    </div>
                </div>
                
                <div class="col-5">

                <div class="form-row">
                    <div class="form-group col-sm m-0">
                        <div class="input-group input-group-sm mb-1 ">
                            <div class="input-group-prepend">
                                <span class="input-group-text" > <strong>Sub Total</strong> </span>
                            </div>
                            <input type="text" class="form-control-plaintext form-control-sm border border-left-0 border-secondary text-right px-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" :value="setVenta.neto | Moneda " disabled>
                        </div>
                    </div>     
                </div>
                
                <div class="form-row">
                    <div class="form-group col-5 m-0">
                        <div class="input-group input-group-sm mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text" > <strong>Desc.</strong> </span>
                            </div>
                            <input type="text" class="form-control-plaintext form-control-sm border border-left-0 border-secondary text-right px-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" :value="setVenta.desc" @keyup.enter="onMonto" disabled>
                            <div class="input-group-prepend">
                                    <span class="input-group-text" > <strong>%</strong> </span>
                            </div>
                        </div>   
                    </div>
                    <div class="form-group col m-0">
                        <div class="input-group input-group-sm mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text" > <strong>Monto</strong> </span>
                            </div>
                            <input type="text" class="form-control-plaintext form-control-sm border border-secondary text-right px-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" :value="setVenta.mont " disabled>
                        </div>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col mb-0">
                        <div class="input-group input-group-sm mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text" > <strong>Neto</strong> </span>
                            </div>
                            <input type="text" class="form-control-plaintext form-control-sm border border-secondary text-right px-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" :value="setVenta.neto | Moneda" disabled>
                        </div> 
                    </div>
                    
                </div>
                    
                <div class="form-row">
                    <div class="form-group col-4 m-0">
                        <div class="input-group input-group-sm mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text" > <strong>IVA</strong> </span>
                            </div>
                            <input type="text" class="form-control-plaintext form-control-sm border border-left-0 border-secondary text-center px-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="19" disabled>
                            <div class="input-group-prepend">
                                <span class="input-group-text text-dark" > <strong>%</strong> </span>
                            </div>
                        </div>
                        
                    </div>
                    <div class="form-group col m-0">
                        <div class="input-group input-group-sm mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text text-dark" > <strong>Total IVA</strong> </span>
                            </div>
                            <input type="text" class="form-control-plaintext form-control-sm border border-left-0 border-secondary text-right px-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" :value="setVenta.iva | Moneda" disabled>
                        </div>
                    </div>

                </div>    
                                      
                    <div class="input-group input-group-sm mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text text-dark" > <strong>Total</strong> </span>
                        </div>
                        <input type="text" class="form-control-plaintext form-control-sm border border-left-0 border-secondary text-right px-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" :value="setVenta.total | Moneda" disabled>
                    </div>

                </div>
            </div>
        </div>
        </div>

        <!-- index:cardtab -->
        <div class="card text-center">
          <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
              <li class="nav-item">
                <a class="nav-link active p-2" id="tabventdoc" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">
                    <strong>Documentos</strong> 
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link p-2" id="tabventpag" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="true">
                    <strong>Pago</strong> 
                </a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link p-2" id="tabInfoproveedores" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="true">
                    Disabled tab
                </a>
              </li> -->
            </ul>
          </div>
          <div class="card-body tab-content p-0">
               <!-- index:tabdocumentos -->
            <div class="tab-pane fade show active table-responsive-sm p-0" id="tab-1" role="tabpanel" aria-labelledby="tab-1">
                <h3 class="card-title float-left pl-2 m-0"> <strong>Documentos</strong> </h3>
                <div class="btn-group float-right">
                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-plus-square" aria-hidden="true"></i>  <strong>Nuevo</strong>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" @click="onModalBoleta()" >Boleta</a> 
                            <a class="dropdown-item" @click="onModalFactura()" >Factura</a>
                            <!-- <a class="dropdown-item" @click="onModalNotaC()" >Nota de Credito</a>
                            <a class="dropdown-item" @click="onModalNotaD()" >Nota de Debito</a>       -->
                        </div>
                </div>

                <table class="table table-sm  table-inverse table-borden table-bordered m-0" style="font-size: 0.9em;">
                    <thead class="thead-dark">
                        <tr class="text-center align-middle">
                            <th>Tipo</th>
                            <th>Folio</th>
                            <th>Neto</th>
                            <th>IVA</th>
                            <th>Total</th>
                            <th>Abono</th>
                            <th>Saldo</th>
                            <th>Estado</th>
                            <th>Fcha Emision</th>
                            <th>Actividad</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(dte, index) of this.setDte" :key="index" class="text-center align-middle font-weight-bold" :class="isPagoT(dte.estado)">
                            <td scope="row">{{ dte.tipodte | dteName}}</td>
                            <td class="font-weight-normal">{{ dte.folio }}</td>
                            <td>{{ dte.mntneto | Moneda}}</td>
                            <td>{{ dte.iva | Moneda }}</td>
                            <td>{{ dte.mnttotal | Moneda}}</td>
                            <td>{{ dte.abono | Moneda }}</td>
                            <td>{{ dte.mnttotal - dte.abono | Moneda}}</td>
                            <td>{{ dte.estado }}</td>
                            <td>{{ dte.fchemis | Fecha}}</td>
                            <td> <button class="btn btn-primary btn-sm" v-if="dte.estado === 'IMP'" @click="onModalPago(dte)">pago</button> </td>
                        </tr>
                    </tbody>
                </table>

               
            </div>
            <!-- index:tabpago -->
            <div class="tab-pane fade table-responsive-sm p-0" id="tab-2" role="tabpanel" aria-labelledby="tab-1">
                <h3 class="card-title float-left pl-2 m-0"> <strong>Pagos</strong> </h3>
                <div class="btn-group float-right">
                        <button type="button" class="btn dropdown-toggle" data-toggle="modal" data-target="#modelId">
                            <i class="fa fa-plus-square" aria-hidden="true"></i>  <strong>Nuevo</strong>
                        </button>
                </div>
                
                <table class="table table-sm table-striped table-inverse table-borden table-bordered m-0 rounded">
                    <thead class="thead-dark">
                        <tr>
                            <th>N° Recibo</th>
                            <th>Tipo</th>
                            <th>N° Folio</th>
                            <th>F. pago</th>
                            <th>Monto</th>
                            <th>Fecha</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(pago, index) of this.setPago" :key="index" class="align-middle">
                                <td scope="row">{{pago.id | number()}}</td>
                                <td>{{pago.tipodte | dteName}}</td>
                                <td>{{pago.foliodte | number()}}</td>
                                <td>{{pago.tipopago |  formaPag}}</td>
                                <td>{{pago.total | currency('$', 0, { thousandsSeparator: '.' })}}</td>
                                <td>{{pago.fcha_pago | Fecha}}</td>
                            </tr>
                            
                        </tbody>
                </table>
            </div>
            
          </div>
        </div>


        <!-- index:modalfactura -->
        <div class="modal fade" id="modelfact" ref="ModalFactura" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header p-2">
                        <h5 class="modal-title"> <strong>Factura Electronica</strong> </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body p-2">
                        

                    <div class="form-row">
                        <div class="form-group col m-0">
                            <div class="input-group input-group-sm mb-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" > <strong>Folio</strong> </span>
                                </div>
                                <input type="text" class="form-control-plaintext form-control-sm border border-secondary text-right px-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" v-model="factura.folio">                 
                            </div>   
                        </div>
                        <div class="form-group col m-0">
                            <div class="input-group input-group-sm mb-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" > <strong>Form. Pago</strong> </span>
                                </div>
                                <select class="custom-select" id="inputGroupSelect01" v-model="factura.fmapago">
                                    <option value="1">Contado</option>
                                    <option value="2">Credito</option>
                                    <option value="3">Sin Costo</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm m-0">
                            <div class="input-group input-group-sm mb-1 ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" > <strong>Sub Total</strong> </span>
                                </div>
                                <input type="text" class="form-control-plaintext form-control-sm border border-secondary text-right px-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" v-model="factura.subtotal" >
                            </div>
                        </div>     
                    </div>
                
                    <div class="form-row">
                        <div class="form-group col-5 m-0">
                            <div class="input-group input-group-sm mb-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" > <strong>Desc.</strong> </span>
                                </div>
                                <input type="text" class="form-control-plaintext form-control-sm border border-secondary text-right px-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" v-model="factura.desc" >
                                <div class="input-group-prepend">
                                        <span class="input-group-text" > <strong>%</strong> </span>
                                </div>
                            </div>   
                        </div>
                        <div class="form-group col m-0">
                            <div class="input-group input-group-sm mb-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" > <strong>Monto</strong> </span>
                                </div>
                                <input type="text" class="form-control-plaintext form-control-sm border border-secondary text-right px-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"  v-model="factura.monto">
                            </div>
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group col mb-0">
                            <div class="input-group input-group-sm mb-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" > <strong>Neto</strong> </span>
                                </div>
                                <input type="text" class="form-control-plaintext form-control-sm border border-secondary text-right px-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"  v-model="factura.neto">
                            </div> 
                        </div>
                        
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-5 m-0">
                            <div class="input-group input-group-sm mb-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" > <strong>IVA</strong> </span>
                                </div>
                                <input type="text" class="form-control-plaintext form-control-sm border border-secondary text-center px-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="19" >
                                <div class="input-group-prepend">
                                    <span class="input-group-text" > <strong>%</strong> </span>
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-group col m-0">
                            <div class="input-group input-group-sm mb-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" > <strong>Total IVA</strong> </span>
                                </div>
                                <input type="text" class="form-control-plaintext form-control-sm border border-secondary text-right px-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"  v-model="factura.iva" >
                            </div>
                        </div>

                    </div>    
                                      
                    <div class="input-group input-group-sm mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" > <strong>Total</strong> </span>
                        </div>
                        <input type="text" class="form-control-plaintext form-control-sm border border-secondary text-right px-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" v-model="factura.total" >
                    </div>

                    <hr>


                </div>
            

                        
                    <div class="modal-footer p-2">
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-sm btn-success" @click="onStoreFactura()">Guardar</button>
                    </div>
                    </div>
                </div>
            </div>


        <!-- index:modalnotacredito -->
        <div class="modal fade" id="modelnc" ref="ModalNotaC" tabindex="-1" role="dialog" aria-labelledby="modelnc" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> <strong>Nota de Credito</strong> </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body p-2">
                        

                <div class="form-row">
                    <div class="form-group col m-0">
                        <div class="input-group input-group-sm mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text" > <strong>Folio</strong> </span>
                            </div>
                            <input type="text" class="form-control-plaintext form-control-sm border border-secondary text-right px-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" :value="setVenta.desc" @keyup.enter="onMonto" >
                
                        </div>   
                    </div>
                    <div class="form-group col m-0">
                        <div class="input-group input-group-sm mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text" > <strong>Form. Pago</strong> </span>
                            </div>
                             <select class="custom-select" id="inputGroupSelect01">
                                <option value="1">Contado</option>
                                <option value="2">Credito</option>
                                <option value="3">Sin Costo</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm m-0">
                        <div class="input-group input-group-sm mb-1 ">
                            <div class="input-group-prepend">
                                <span class="input-group-text" > <strong>Sub Total</strong> </span>
                            </div>
                            <input type="text" class="form-control-plaintext form-control-sm border border-secondary text-right px-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" :value="setVenta.neto | Moneda " >
                        </div>
                    </div>     
                </div>
                
                <div class="form-row">
                    <div class="form-group col-5 m-0">
                        <div class="input-group input-group-sm mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text" > <strong>Desc.</strong> </span>
                            </div>
                            <input type="text" class="form-control-plaintext form-control-sm border border-secondary text-right px-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" :value="setVenta.desc" @keyup.enter="onMonto" >
                            <div class="input-group-prepend">
                                    <span class="input-group-text" > <strong>%</strong> </span>
                            </div>
                        </div>   
                    </div>
                    <div class="form-group col m-0">
                        <div class="input-group input-group-sm mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text" > <strong>Monto</strong> </span>
                            </div>
                            <input type="text" class="form-control-plaintext form-control-sm border border-secondary text-right px-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" :value="setVenta.mont " >
                        </div>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col mb-0">
                        <div class="input-group input-group-sm mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text" > <strong>Neto</strong> </span>
                            </div>
                            <input type="text" class="form-control-plaintext form-control-sm border border-secondary text-right px-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" :value="setVenta.neto | Moneda" >
                        </div> 
                    </div>
                    
                </div>
                    
                <div class="form-row">
                    <div class="form-group col-5 m-0">
                        <div class="input-group input-group-sm mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text" > <strong>IVA</strong> </span>
                            </div>
                            <input type="text" class="form-control-plaintext form-control-sm border border-secondary text-center px-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="19" >
                            <div class="input-group-prepend">
                                <span class="input-group-text" > <strong>%</strong> </span>
                            </div>
                        </div>
                        
                    </div>
                    <div class="form-group col m-0">
                        <div class="input-group input-group-sm mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text" > <strong>Total IVA</strong> </span>
                            </div>
                            <input type="text" class="form-control-plaintext form-control-sm border border-secondary text-right px-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" :value="setVenta.iva | Moneda" >
                        </div>
                    </div>

                </div>    
                                      
                    <div class="input-group input-group-sm mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" > <strong>Total</strong> </span>
                        </div>
                        <input type="text" class="form-control-plaintext form-control-sm border border-secondary text-right px-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" :value="setVenta.total | Moneda" >
                    </div>

                </div>
            

                        
                <div class="modal-footer p-2">
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-sm btn-primary">Guardar</button>
                </div>
                </div>
            </div>
        </div>

            <!-- index:modalboleta -->
            <div class="modal fade" id="modelboleta" ref="ModalBoleta" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header p-2">
                            <h5 class="modal-title">Boleta</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                              <div class="form-row">
                                    <div class="input-group input-group-sm mb-1">

                                        <div class="input-group-prepend">
                                            <span class="input-group-text" > <strong>Folio</strong> </span>
                                        </div>
                                        <input type="text" class="form-control-plaintext form-control-sm border border-secondary text-right px-2" v-model="boleta.bolfolio" >
                                        
                                    </div>

                                    <div class="input-group input-group-sm mb-1">

                                        <div class="input-group-prepend">
                                            <span class="input-group-text" > <strong>Total</strong> </span>
                                        </div>
                                        <input type="number" class="form-control-plaintext form-control-sm border border-secondary text-right px-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" v-model="boleta.boltotal" >
                                        
                                    </div>  

                                    <div class="input-group input-group-sm mb-1">

                                        <div class="input-group-prepend">
                                            <span class="input-group-text" > <strong>Pagos</strong> </span>
                                        </div>
                                        <input type="text" class="form-control-plaintext form-control-sm border border-secondary text-right px-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" v-model="boleta.bolpago" @keypress.enter="onVueltoBoleta()">
                                        
                                    </div> 

                                     <div class="input-group input-group-sm mb-1">

                                        <div class="input-group-prepend">
                                            <span class="input-group-text" > <strong>Vuelto</strong> </span>
                                        </div>
                                        <input type="text" class="form-control-plaintext form-control-sm border border-secondary text-right px-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" v-model="boleta.bolvuelto"  >
                                        
                                    </div>                 
                              </div>
                        </div>
                        <div class="modal-footer p-2">
                            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-sm  btn-success" @click="onStoreBoleta()">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- index:recivopago -->
            <div class="modal fade" id="modalpago" ref="ModalPago" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header p-2">
                            <h5 class="modal-title">Recibo de Dinero</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body p-2">

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-row">
                                        <div class="input-group input-group-sm mb-1">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"> <strong>Efectivo</strong> </span>
                                            </div>
                                            <input 
                                                type="text" 
                                                class="form-control text-right px-2" 
                                                v-model.number="pago.efectivo"
                                                @keydown.enter="onEfectivo()"  
                                            >
                                            <!-- <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button"> <i class="fa fa-plus" aria-hidden="true"></i></button>
                                            </div> -->
                                        </div>   
                                        <div class="input-group input-group-sm mb-1">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" > <strong>Cheque </strong> </span>
                                            </div>
                                            <input 
                                                type="text" 
                                                class="form-control border border-secondary text-right px-2" 
                                                v-model.number="pago.cheque"  
                                            >
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button" @click="onModalCheque()"> <i class="fa fa-plus" aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                        <div class="input-group input-group-sm mb-1">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" > <strong>Tarjeta</strong> </span>
                                            </div>
                                            <input 
                                                type="text" 
                                                class="form-control border border-secondary text-right px-2" 
                                                v-model.number="pago.tarjeta"  
                                            >
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button"  @click="onModalTarjeta()"> <i class="fa fa-plus" aria-hidden="true"></i></button>
                                            </div>
                                        </div>    
                                        <div class="input-group input-group-sm mb-1">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" > <strong>Trasferecia</strong> </span>
                                            </div>
                                            <input 
                                                type="text" 
                                                class="form-control border border-secondary text-right px-2" 
                                                v-model.number="pago.trasfer" 
                                            >
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button"  @click="onModalTrasferencia()"> <i class="fa fa-plus" aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                        <div class="input-group input-group-sm mb-1">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" > <strong>Recibos</strong> </span>
                                            </div>
                                            <input 
                                                type="text" 
                                                class="form-control border border-secondary text-right px-2" 
                                                v-model.number="pago.recibo"
                                            >
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button"  @click="onModalRecibo()"> <i class="fa fa-plus" aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                        <!-- Separar las nota de Credito del pago -->
                                        <!-- <div class="input-group input-group-sm mb-1">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" > <strong>Nota de Credito</strong> </span>
                                            </div>
                                            <input 
                                                type="text" 
                                                class="form-control border border-secondary text-right px-2" 
                                                v-model.number="pago.ncredito"  >
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button"  @click="onModalNCredito()"> <i class="fa fa-plus" aria-hidden="true"></i></button>
                                            </div>
                                        </div>  -->
                                       
                                        
                                    </div>
                                </div>
                                <!-- <div class="col-5 offset-2">
                                     
                                    <ul class="list-group">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span class="text-muted"> Total a Pagar :</span>
                                            <span > <strong> $ {{pago.fact_total}}</strong></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            List item
                                            <span class="badge badge-secondary badge-pill">pill2</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span class="text-muted"> Saldo :</span>
                                            <span ></span>
                                        </li>
                                    </ul>
                                </div> -->
                            </div>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item p-2">
                                <div class="input-group input-group-sm mb-1">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" > <strong>Total</strong> </span>
                                    </div>
                                    <input 
                                        type="text" 
                                        class="form-control border border-secondary text-right px-2" 
                                        v-model.number="pago.abono"
                                    >
                                </div>
                            </li>
                           
                        </ul>
                        <div class="modal-footer p-2">
                            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-sm btn-success" @click="onStorePago()">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>

                        
            <!-- Modal Cheque-->
            <div class="modal fade" id="pagoCheque" ref="pagoCheque"  tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Pago Cheques</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-row">
                                
                               <div class="form-group col mb-1">
                                    <label for="" class="font-weight-bold m-1">Banco</label>
                                    <input type="text" name="" id="" class="form-control form-control-sm border border-secondary px-2" placeholder="" >    
                                </div>
                                <div class="form-group col mb-1">
                                    <label for="" class="font-weight-bold m-1">Cta Cte</label>
                                    <input type="text" name="" id="" class="form-control form-control-sm border border-secondary px-2" placeholder="" >    
                                </div>
                                  <div class="form-group col mb-1">
                                    <label for="" class="font-weight-bold m-1">Titular</label>
                                    <input type="text" name="" id="" class="form-control form-control-sm border border-secondary px-2" placeholder="" >    
                                </div>
                                <div class="form-group col mb-1">
                                    <label for="" class="font-weight-bold m-1">N° Cheque</label>
                                    <input type="text" name="" id="" class="form-control form-control-sm border border-secondary px-2" placeholder="" >    
                                </div>
                                <div class="form-group col mb-1">
                                    <label for="" class="font-weight-bold m-1">Fecha de Cobro</label>
                                    <input type="date" name="" id="" class="form-control form-control-sm border border-secondary px-2" placeholder="" >    
                                </div>
                                 <div class="form-group col mb-1">
                                    <label for="" class="font-weight-bold m-1">Monto</label>
                                    <input type="text" name="" id="" class="form-control form-control-sm border border-secondary px-2" placeholder="" >    
                                </div>
                            </div>
                            <div class="table-responsive-xl">
                                <table class="table table-sm table-striped table-inverse table-responsive">
                                    <thead class="thead-inverse">
                                        <tr>
                                            <th>Banco</th>
                                            <th>Cta Cte</th>
                                            <th>N° Cheque </th>
                                            <th>Monto</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td scope="row">Santander</td>
                                                <td>2415415</td>
                                                <td>515151</td>
                                                <td>56655615</td>
                                            </tr>
                                        </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Trajeta-->
            <div class="modal fade" id="pagoTrajeta" ref="pagoTarjeta" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Pago Tarjeta</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-row">
                                <div class="form-group col mb-1">
                                    <label for="" class="font-weight-bold m-1">Tipo de Tarjeta</label>
                                    <input type="text" name="" id="" class="form-control form-control-sm border border-secondary px-2" placeholder="" >    
                                </div>
                                <div class="form-group col mb-1">
                                    <label for="" class="font-weight-bold m-1">Fecha</label>
                                    <input type="text" name="" id="" class="form-control form-control-sm border border-secondary px-2" placeholder="" >    
                                </div>
                                <div class="form-group col mb-1">
                                    <label for="" class="font-weight-bold m-1">Fecha</label>
                                    <input type="text" name="" id="" class="form-control form-control-sm border border-secondary px-2" placeholder="" >    
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-sm  btn-success">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Trasferenci-->
            <div class="modal fade" id="pagoTrasferencia" ref="pagoTrasferencia" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Pago Trasferencia</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <div class="modal-body">
                            Body
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Cheque-->
            <div class="modal fade" id="pagoCheque" ref="pagoRecibos" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Pago Recibos</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <div class="modal-body">
                            Body
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal NCredito-->
            <div class="modal fade" id="pagoCheque" ref="pagoNCredito" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Pago Nota de Cedito</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <div class="modal-body">
                            Body
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Cheque-->
            <div class="modal fade" id="pagoCheque" ref="pagoNCredito" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Pago por Cheque</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group col mb-1">
                                <label for="" class="font-weight-bold m-1">Banco</label>
                                <input type="text" name="" id="" class="form-control form-control-sm border border-secondary px-2" placeholder="" >    
                            </div>
                            <div class="form-group col mb-1">
                                <label for="" class="font-weight-bold m-1">Cta Cte</label>
                                <input type="text" name="" id="" class="form-control form-control-sm border border-secondary px-2" placeholder="" >    
                            </div>
                                <div class="form-group col mb-1">
                                <label for="" class="font-weight-bold m-1">Titular</label>
                                <input type="text" name="" id="" class="form-control form-control-sm border border-secondary px-2" placeholder="" >    
                            </div>
                            <div class="form-group col mb-1">
                                <label for="" class="font-weight-bold m-1">N° Cheque</label>
                                <input type="text" name="" id="" class="form-control form-control-sm border border-secondary px-2" placeholder="" >    
                            </div>
                            <div class="form-group col mb-1">
                                <label for="" class="font-weight-bold m-1">Fecha de Cobro</label>
                                <input type="date" name="" id="" class="form-control form-control-sm border border-secondary px-2" placeholder="" >    
                            </div>
                                <div class="form-group col mb-1">
                                <label for="" class="font-weight-bold m-1">Monto</label>
                                <input type="text" name="" id="" class="form-control form-control-sm border border-secondary px-2" placeholder="" >    
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Recibo de Dinero es original-->
            <div class="modal fade" id="pagoCheque" ref="pagoRecibo" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Pago Recibo de Dinero</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group col mb-1">
                                <label for="" class="font-weight-bold m-1">Fecha de Cobro</label>
                                <input 
                                    type="date" 
                                    class="form-control form-control-sm border border-secondary px-2"
                                    name="" 
                                    id=""  
                                    placeholder=""
                                    v-model="rec.fchpago" 
                                >    
                            </div>
                            <div class="form-group col mb-1">
                                <label for="" class="font-weight-bold m-1">Folio</label>
                                <input 
                                    type="text" 
                                    class="form-control form-control-sm border border-secondary px-2"
                                    ref="recfolio"
                                    name="" 
                                    id="recfolio" 
                                    placeholder="" 
                                    v-model.number="rec.folio"
                                >    
                            </div>
                            <div class="form-group col mb-1">
                                <label for="" class="font-weight-bold m-1">Monto</label>
                                <input 
                                    type="number"
                                    class="form-control form-control-sm border border-secondary px-2"
                                    name="" 
                                    id=""  
                                    placeholder="" 
                                    v-model.number="rec.total"
                                >    
                            </div>
                            <!-- <div class="form-group col mb-1">
                                <label for="" class="font-weight-bold m-1">Detalle</label>
                                <textarea 
                                    type="text"
                                    class="form-control form-control-sm border border-secondary px-2"
                                    id=""  
                                    placeholder=""
                                    v-model="rec.detalle" 
                                > 
                                </textarea>   
                            </div> -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" @click="onAddRecibo()">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        
    <!-- <pre class="bg-secondary">{{ $data.pago }}</pre> -->
    
</div>
</template>

<script>
export default {
    props: ['vent'],
    data() {
        return {
            setVenta: {},
            setCliente: {},
            setCiudad: {},
            setdtll: [],
            setDte: null,
            setPago: [],
            factura: {
                folio: 0,
                subtotal: 0,
                desc: 0,
                iva: 0,
                total: 0,
                desc: 0,
                monto: 0,
                neto: 0
            },
            boleta: {
                boltotal: 0,
                bolfolio: 0,
                bolvuelto: 0,
                bolpago: 0
            },
            notac: {
                ntcfolio: 0,
                ntcsubtotal: 0,
                ntcdesc: 0,
                ntciva: 0,
                ntctotal: 0,
                ntcdesc: 0,
                ntcmonto: 0,
                ntcneto: 0,
                ntccodref: 0,
                ntcfolioref: 0,
                ntcrazonref: 0
            },
            notad: {
                ntcfolio: 0,
                ntcsubtotal: 0,
                ntcdesc: 0,
                ntciva: 0,
                ntctotal: 0,
                ntcdesc: 0,
                ntcmonto: 0,
                ntcneto: 0,
                ntccodref: 0,
                ntcfolioref: 0,
                ntcrazonref: 0
            },
            pago: {
                client_id: null,
                venta_id: null,
                tipodte: null,
                folio: null,
                total: 0,
                abono: 0,
                saldo: 0,
                efectivo: 0,
                cheque: 0,
                tarjeta: 0,
                trasfer: 0,
                recibo: 0,
                ncredito: 0,
                dtll: [],
                fact_total: 0
            },
            pagdtl:{
                tipopago: 0,
                folio: 0,
                monto: 0,
                fecha_pago: moment().format('YYYY-MM-DD'),
                banco: 0,
                ctacte: null,
                titular: null,
                tipTrajeta: null,
                cuotas: 0,
            },
            cheque: {
                tipopago: 2,
                totcheq: 0,
                dtllcheq: [],
            },
            tarjeta: {
                tipopago: 3,
            },
            trasf: {
                tipopago: 4,
            },
            rec: {
                tipopago: 5,
                folio: 0,
                fchpago: moment().format('YYYY-MM-DD'),
                total: 0,
                detalle: null
            },
            ncred: {
                tipopago: 6,
            }
        }
    },
    mounted(){
        this.getVenta()
        this.getCiudad()
        this.getDte()
        this.getVentaDtl()
        this.getPago()
    },
    methods: {
        //
        getVenta(){
            let cURL = '/api/ventas/fineid/' + this.vent
            console.log(cURL)
            axios.get(cURL)
            .then( res => {
                this.setVenta = _.cloneDeep(res.data)
                this.getClient()
                console.log('venta')
                console.log(res.data)
                
            })
            .catch( err => {
                console.error(err)
            })
        },
        getVentaDtl(){
            let cURL = '/api/venta/dtls/fineVent/' + this.vent
            axios.get(cURL)
            .then( res => {
                this.setdtll = _.cloneDeep(res.data)
            })
            .catch( err => {
                console.error(err)
            })
        },
        getClient() {
            
            let cURL = '/api/cliente/fineid/' + this.setVenta.cliente_id
            console.log(cURL)
            axios.get(cURL)
            .then( res => {
                this.setCliente = _.cloneDeep(res.data)
            })
            .catch( e => {
                console.error(e)
            })

        },
        getCiudad() {

            let cURL = '/api/provincia'
            axios.get(cURL)
            .then( res => {
            // JSON setVentaponses are automatically parsed.
            this.setCiudad = _.cloneDeep(res.data)
            })
            .catch(e => {
                console.log(e);
            })

        },
        getDte() {
            let cURL = '/api/venta/dte/finedte/' + this.vent 
            axios.get(cURL)
            .then( res => {
                this.setDte = _.cloneDeep(res.data)
                console.log('SE SETIO setDte')
            })
            .catch( err => {
                console.log(err)
            })

        },
        getPago(){
            let cURL = '/api/pago/indexid/?venta_id=' + this.vent
            axios.get(cURL)
            .then( res => {
                this.setPago = _.cloneDeep(res.data)
                console.log(res.data)
            })
            .catch( err => {
                console.log(err)
            })
        },
        isPago(status){

            switch (status) {
                case 'NULA':
                    return 'badge-secondary'
                break;
                case 'IMP':
                    return 'badge-warning'
                break;
                case 'PAG':
                    return 'badge-success'
                break;
                default:
                    return 'badge-info'
                break;
            }
        },
        isPagoT(status){
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
        },
        onVueltoBoleta(){

            this.boleta.bolvuelto = this.decimalAdjust('round', this.boleta.bolpago - this.boleta.boltotal, 1)
 
        },
        onModalBoleta(){

            this.boleta.boltotal = Math.round(this.setVenta.total)
            
            $(this.$refs.ModalBoleta).modal('show')

        },
        onStoreBoleta(){

            axios.post('/api/venta/registrar/boleta', {
                venta_id: _.cloneDeep(this.setVenta.id),
                cliente_id: _.cloneDeep(this.setVenta.cliente_id),
                bolfolio: _.cloneDeep(this.boleta.bolfolio),
                bolpago: _.cloneDeep(this.boleta.bolpago),
                setventa: _.cloneDeep(this.setVenta),
                setdtll: _.cloneDeep(this.setdtll)
                // fchnow: moment().format('YYYY-MM-DD')
            })
            .then( res => {
                alert("Se guardo la Boleta")
                console.log(res)
            })
            .catch( err => {
                alert("Se prodiujo un Error " + err)
            })

            $(this.$refs.ModalBoleta).modal('hide')

        },
        onModalFactura(){

            // this.factura.factfolio = this.setVenta.subtotal
            this.factura.subtotal = Math.round(this.setVenta.subtotal)
            if (this.setVenta.desc != null) {
                this.factura.desc = this.setVenta.desc

            }else {
                 this.factura.desc = 0
                 this.factura.monto = 0
            }

            this.factura.fmapago = this.setVenta.fmapago
            this.factura.neto = Math.round(this.setVenta.neto)
            this.factura.iva = Math.round(this.setVenta.iva)
            this.factura.total = Math.round(this.setVenta.total)

            $(this.$refs.ModalFactura).modal('show')

        },
        onStoreFactura(){
            
            axios.post('/api/venta/registrar/factura', {
                venta_id: _.cloneDeep(this.setVenta.id),
                cliente_id: _.cloneDeep(this.setVenta.cliente_id),
                fact: _.cloneDeep(this.factura),
                setventa: _.cloneDeep(this.setVenta),
                setdtll: _.cloneDeep(this.setdtll)
                
            })
            .then( res => {
                alert("Se guardo la Factura")
                console.log(res)
            })
            .catch( err => {
                alert("Se prodiujo un Error ")
                console.log('ERROR FACTURA')
                console.log(err)
            })

            $(this.$refs.ModalFactura).modal('hide')

        },
        onStorePago(){
            axios.post('/api/pago/store', {
                pago: this.pago
                
            })
            .then( res =>{
                console.log(res)
            })
            .catch(err => {
                console.log(err)
            })

            $(this.$refs.ModalPago).modal('hide')

            this.getDte()
        },
        onEfectivo(){
            this.pago.abono = _.sum([this.pago.efectivo, this.pago.cheque, this.pago.tarjeta, this.pago.trasfer, this.pago.recibo])
        },
        onModalCheque(){
            $(this.$refs.pagoCheque).modal('show')
        },
        onModalTarjeta(){
            $(this.$refs.pagoTarjeta).modal('show')
        },
        onModalTrasferencia(){
            $(this.$refs.pagoTrasferencia).modal('show')
        },
        onModalRecibo(){
            
            this.onClearRecibo()
            this.rec.total = this.pago.total
            this.nextInput('recfolio')
            $(this.$refs.pagoRecibo).modal('show')

        },
        onAddRecibo(doc){
            
            _.pullAllBy(this.pago.dtll, [{ 'tipopago': 5 }], 'tipopago');
            if (this.rec.total != 0) {
                this.pago.dtll.push(_.cloneDeep(this.rec))
                this.pago.recibo = this.rec.total
            }else {
                this.pago.recibo = 0
            }
            
            // this.pago.recibo = _.cloneDeep(this.rec)
            // this.pago.recibo.monto = this.decimalAdjust('round', this.pago.recibo.monto, 1)
            // this.pago.abono = this.decimalAdjust('round', this.pago.total - , 1)
            // this.pago.abono = _.toSafeInteger() - _.toSafeInteger(this.pago.recibo.total)
            // _.sumBy(this.pago.dtll, 'total'); serve para sumar en un json
            
            this.pago.efectivo = _.subtract(this.pago.efectivo, this.pago.recibo)
            
            if ( this.pago.efectivo < 0) {
                this.pago.efectivo = 0
            }

            // this.pago.abono = _.sum([this.pago.efectivo, this.pago.cheque, this.pago.tarjeta, this.pago.trasfer, this.pago.recibo])
            // this.pago.saldo = _.subtract(this.pago.total, this.pago.abono)
            // this.pago.efectivo = this.pago.saldo
            this.pago.abono = _.sum([this.pago.efectivo, this.pago.cheque, this.pago.tarjeta, this.pago.trasfer, this.pago.recibo])
            
            $(this.$refs.pagoRecibo).modal('hide')
            this.onClearRecibo()
        },
        onClearRecibo(){
            
            this.rec.tipopago = 5
            this.rec.folio = 0 
            this.rec.fchpago = moment().format('YYYY-MM-DD')
            this.rec.total = 0
            this.rec.detalle = null
            
        },
        onModalNCredito(){
            $(this.$refs.pagoNCredito).modal('show')
        },
        onModalPago(dte){
            
            this.pago.client_id = _.cloneDeep(dte.client_id)
            this.pago.venta_id = _.cloneDeep(dte.venta_id)
            this.pago.tipodte = _.cloneDeep(dte.tipodte)
            this.pago.folio = _.cloneDeep(dte.folio)
            // this.pago.total = _.cloneDeep(dte.mnttotal)
            this.pago.total = _.toSafeInteger(dte.mnttotal - dte.abono)
            this.pago.efectivo = this.pago.total
            this.pago.abono = _.sum([this.pago.efectivo, this.pago.cheque, this.pago.tarjeta, this.pago.trasfer, this.pago.recibo])
            $(this.$refs.ModalPago).modal('show')
            
        },
        decimalAdjust(type, value, exp) {
            // Si el exp no está definido o es cero...
            if (typeof exp === 'undefined' || +exp === 0) {
                return Math[type](value);
            }
            value = +value;
            exp = +exp;
            // Si el valor no es un número o el exp no es un entero...
            if (isNaN(value) || !(typeof exp === 'number' && exp % 1 === 0)) {
                return NaN;
            }
            // Shift
            value = value.toString().split('e');
            value = Math[type](+(value[0] + 'e' + (value[1] ? (+value[1] - exp) : -exp)));
            // Shift back
            value = value.toString().split('e');
            return +(value[0] + 'e' + (value[1] ? (+value[1] + exp) : exp));
        
        },
        onAddpago() {

            axios.post('/admin/pagos',{
                tipodte: _.cloneDeep(),
                folio: _.cloneDeep(),

            })
            
        },
        nextInput(refinp) {
            let input = document.getElementById(refinp)
            input.focus()
            input.select()
        },
    },
    filters: {
        Fecha(fch){
            return moment(fch).format('DD-MM-YY')
        },
        Moneda(mnt){
            return '$' + Number(mnt).toFixed(0)
        },
        Por(por){
            if (por === undefined ) {
                 return 0 + '%'
            }
            return Number(por).toFixed(2) + '%'
        },
        dteName(tipo){

            switch (tipo) {
                case 33:
                    return 'Factura E.'
                    break;
                case 35:
                    return 'Boleta'
                    break;
                case 61:
                    return 'Nota de Credito E.'
                    break;
                case 56:
                    return 'Nota de Debito E.'
            }
        },
        dteAbr(tipo){

            switch (tipo) {
                case 33:
                    return 'F/'
                    break;
                case 61:
                    return 'NC/'
                    break;
                case 56:
                    return 'ND/'
            }
        },
        formaPag(tipo){

            switch(tipo){
                case 1:
                    return 'Efectivo'
                    break;
                case 2:
                    return 'Cheque'
                    break;
                case 3:
                    return 'Tarjeta'
                    break;
                case 4:
                    return 'Trasferencia'
                    break;
                case 5:
                    return 'Recibo de Dinero'
                    break; 
            }
        }

    }


}
</script>

<style>

</style>
