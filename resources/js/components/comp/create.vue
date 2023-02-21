<template>
<div>

    <div v-if="isErr" ref="iserr" class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{this.outErr}}</strong> 
        <button type="button" class="close" data-dismiss="alert" @click="isErr = !isErr">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <!-- editar el v-show con el btn de close -->
    <div v-if="isClose" id="isclose" class="alert alert-success alert-dismissible fade show" role="alert">
        {{ this.outPut }} 
        <button type="button" class="close" data-dismiss="alert" @click="isClose = !isClose">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="card my-3"> <!-- Documento -->
        <div class="card-header p-2">
            <div class="float-left text-muted"><strong class="h3">Compra</strong></div>
            <!-- <h4 class="float-left">Compra</h4> -->
            <div class="float-right">
                <button type="button" class="btn btn-sm btn-primary " @click.prevent="onStoreVenta()"> <strong>Guardar</strong> </button>
            </div>
        </div>
        <div class="card-body p-2">

            <div class="form-row mx-1 my-0">

                <div class="from-group  col-md-3 mb-2"> <!-- rut prov -->
                      
                     <div class="input-group input-group-sm"> 
                        <div class="input-group-prepend">
                            <span class="input-group-text"><strong>Rut</strong></span>
                        </div>
                        <input type="text" class="form-control form-control-sm" name=""  ref="txtRutProv" id="txtRutProv" placeholder="_ _ _ _ _ _ _ _-_" aria-describedby="buscarprov" v-model="setprov.rut" @keypress.enter="onGetProv(setprov.rut)">
                        <div class="input-group-append">
                            <button class="btn btn-sm btn-outline-success" type="button" id="buscarprov" @click="showModalProv()"> <i class="fas fa-search"></i></button>
                            <!-- <button class="btn btn-sm btn-outline-secondary" type="button" id="buscarprov" data-toggle="modal" data-target="#msearchprov"> <i class="fas fa-search"></i></button> -->
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-9 m-0 mb-2"> <!-- Nombre prov -->

                    <div class="input-group input-group-sm ">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm"><strong>Nombre o Razon Social</strong></span>
                        </div>
                        <input type="text" class="form-control form-control-sm" name="" id="txtNombreProv" ref="txtNombreProv" v-model="setprov.nombre" @keyup.enter="nextInput('slcTipoDoc')">
                    </div>

                </div>

                <div class="form-group col-md-auto m-0">
                    
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm"><strong>Tipo de Documento</strong></span>
                        </div>
                        <select ref="slcTipoDoc" id="slcTipoDoc" class="form-control form-control-sm" v-model="setcomp.tipodoc" @keydown.enter="nextInput('txtFolio')">
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
                    
                </div>

                <div class="form-group col-md-2 m-0"> 

                        <!-- <label for="" class="m-0 pl-2"><strong>Folio</strong></label>
                        <input type="text" class="form-control form-control-sm" v-model="setcomp.folio"> -->

                        <div class="input-group input-group-sm m-0">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm"><strong>Folio</strong></span>
                            </div>
                            <input 
                                type="text" 
                                id="txtFolio" 
                                ref="txtFolio" 
                                class="form-control form-control-sm" 
                                v-model="setcomp.folio" 
                                @keydown.enter="getValidarFolio()"
                            >
                        </div>

                </div>

                <div class="form-group col m-0"> 
                
                    <!-- <label for="" class="m-0 pl-2"><strong>Fecha Emision</strong></label>
                    <input type="date" id="dataEmision" ref="dataEmision" class="form-control form-control-sm" v-model="setcomp.fchemite"> -->
                    
                    <div class="input-group input-group-sm m-0">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><strong>Fch. Emision</strong></span>
                        </div>
                        <input  type="date" id="dateEmision" ref="dateEmision" class="form-control form-control-sm" v-model="setcomp.fchemite"  @keydown.enter="nextInput('dateVencimiento')">
                    </div>
                </div>

                <div class="form-group  col m-0"> 
                    
                    <!-- <label for="" class="m-0 pl-2"><strong>Fecha Vencimiento</strong></label>
                    <input type="date" class="form-control form-control-sm" v-model="setcomp.fchvence"> -->

                    <div class="input-group input-group-sm mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text" ><strong>Fch. Vence.</strong></span>
                        </div>
                        <input  type="date" id="dateVencimiento" ref="dateVencimiento" class="form-control form-control-sm" v-model="setcomp.fchvence"  @keydown.enter="nextInput('txtCodigoInt')">
                    </div>
                    
                </div>

                <div class="form-group col-xs-1 m-0 sr-only"> 
                    
                    <!-- <label for="" class="m-0 pl-2"><strong>Fecha Ingreso</strong></label>
                    <input type="date"  ref="ingres" class="form-control form-control-sm" v-model="setcomp.fchingrso" @keyup.enter="nextPlease('emision')" > -->

                    <div class="input-group input-group-sm mb-3 ">
                        <div class="input-group-prepend">
                            <span class="input-group-text" ><strong>Fecha Ingreso</strong></span>
                        </div>
                        <input type="date"  ref="dateIngres" id="dateIngres" class="form-control form-control-sm" v-model="setcomp.fchingrso"  @keyup.enter="nextInput('dateEmision')">
                    </div>
                     
                </div>
                    
            </div>
                        
        </div>
    </div>

    <!-- <div class="card sr-only"> -- Trasporte 
        <div class="card-header">
            <strong>Transporte</strong> 
        </div>
        <div class="card-body">

            <div class="form-row">
                <div class="form-group col m-1">
                    <div class="input-group input-group-sm mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <strong>Rut</strong> </span>
                        </div>
                        <input type="text" name="" id="" class="form-control col-3">
                    </div>
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <strong>Nombre</strong></span>
                        </div>
                        <input type="text" name="" id="" class="form-control">
                    </div>

                </div>

                <div class="form-group col-3">
                   <div class="input-group input-group-sm m-0 ">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <strong>Envio / OT</strong></span>
                        </div>
                        <input type="text" name="" id="" class="form-control">
                    </div>
                </div>
                
                <div class="form-group col-3">
                    
                    <div class="input-group input-group-sm m-0">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <strong>Fecha</strong> </span>
                        </div>
                        <input type="date" name="" id="" class="form-control">
                    </div>
                </div>
            </div>

            <div class="form-row">
                
                <div class="form-group text-center col m-1">
                    <label for="" class="m-0 pl-2"> <strong>Origen</strong> </label>
                    <input type="text" class="form-control form-control-sm" name="" id="" aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group text-center col m-1">
                    <label for="" class="m-0 pl-2"><strong>Destino</strong></label>
                    <input type="text" class="form-control form-control-sm" name="" id="" aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group text-center col m-1">
                    <label for="" class="m-0 pl-2"><strong>Bultos</strong></label>
                    <input type="text" class="form-control form-control-sm" name="" id="" aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group text-center col m-1">
                    <label for="" class="m-0 pl-2"><strong>Volumen</strong></label>
                    <input type="text" class="form-control form-control-sm" name="" id="" aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group text-center col m-1">
                    <label for="" class="m-0 pl-2"><strong>Peso Real</strong></label>
                    <input type="text" class="form-control form-control-sm" name="" id="" aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group text-center col m-1">
                    <label for="" class="m-0 pl-2"><strong>Kg/TASAD</strong></label>
                    <input type="text" class="form-control form-control-sm" name="" id="" aria-describedby="helpId" placeholder="">
                </div>

            </div>

           
            <div class="row">
                <div class="col">
                    <div class="form-row">
                        <div class="form-group col mb-1">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text p-2">Remitente</span>
                                </div>
                                <textarea class="form-control" aria-label="With textarea"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group m-0 col">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text p-1">Consignacion</span>
                                </div>
                                <textarea class="form-control" aria-label="With textarea"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="input-group m-0">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <strong>Total</strong> </span>
                        </div>
                        <input type="text" name="" id="" class="form-control">
                    </div>
                   

                </div>
            </div>
        </div>
        
    </div> -->

    <!-- 
    -   Productos 
    -->
    <div class="card my-3"> 
        <div class="card-header p-2 bg-ligh">
            <div class="float-left"><strong class="h5">Agregar Producto</strong></div>
            <div class="float-right">
              
                <!-- <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-secondary" @click="this.onResetProd()" >Limpiar</button>
                    <button type="button" class="btn btn-secondary" @click="this.onProd()">Agregar</button>
                </div> -->

                <button type="button" class="btn btn-primary btn-sm"  @click="onResetProd()" @keydown.enter="onResetProd()"> <strong>Limpiar</strong> </button>
                <button type="button" class="btn btn-primary btn-sm" id="btagregarprod" @click="onProd()" @keydown.enter="onProd()"> <strong>Agregar</strong> </button>
                
                <!-- <button type="button" class="btn btn-sm btn-secondary float-right  align-botton mx-2" data-toggle="modal" data-target="#searchprod"><i class="fas fa-search"></i> <strong>Producto</strong> </button> -->
            </div>
        </div>
        <div class="card-body p-2">
            <div class="row">

                <div class="col-12 mb-2">
                    <div class="form-row">
                        <div class="from-group col-3 m-0">
                            <label for="" class="m-0 pl-2"><strong>Codigo</strong></label>
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm" id="txtCodigoInt" ref="txtCodigoInt" v-model="setprod.codinterno" :disabled="disabled" @keydown.enter="onSearchProdCode()">
                                <div class="input-group-append">
                                    <button class="btn btn-sm btn-outline-success" type="button" id="buscarprov" @click.prevent="showModalProd()"> <i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>

                        <div class="from-group col m-0">
                            <label for="" class="m-0 pl-2"><strong>Nombre</strong></label>
                            <input type="text" class="form-control form-control-sm" id="txtNombreSetProd" ref="txtNombreSetProd" v-model="setprod.nombre" :disabled="disabled" @keydown.enter="nextInput('slcUnidadSetProd')">
                        </div>

                    </div>
                </div>

                <div class="col-7">
                    <!-- <div class="form-row">

                        <div class="form-group col-4 m-0">
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" >  <strong>Codigo</strong> </span>
                                </div>
                                <input type="text" class="form-control form-control-sm" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" v-model="setprod.codinterno" :disabled="disabled">
                            </div>
                        </div>   
                        <div class="form-group col m-0">
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" >  <strong>Nombre</strong> </span>
                                </div>
                                <input type="text" class="form-control form-control-sm" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" v-model="setprod.nombre" :disabled="disabled">
                            </div>
                        </div>   
                    </div> form-row -->
                    <div class="form-row">
                        <div class="form-group col-3 mb-1">
                            <label for="" class="m-0 pl-2"><strong>Unidad</strong></label>
                            <select 
                                class="form-control form-control-sm" 
                                id="slcUnidadSetProd" 
                                ref="slcUnidadSetProd" 
                                v-model="setprod.unidad" 
                                @keydown.enter="nextInput('slcMarcaSetProd')"
                            >
                                <option 
                                    v-for="(setunidad, index) in this.setunidades"
                                    :key="index" v-bind:value="setunidad.code_u"
                                >   {{setunidad.nombre}} 
                                </option>
                            </select>
                        </div>
                        <div class="form-group col-3 mb-1">
                            <label for="" class="m-0 pl-2"><strong>Marca</strong></label>
                            <select 
                                class="form-control form-control-sm"
                                id="slcMarcaSetProd" 
                                ref="slcMarcaSetProd" 
                                v-model="setprod.marca" 
                                @keydown.enter="nextInput('slcLineaSetProd')"
                            >
                                <option 
                                    v-for="(setmarca, index) in this.setmarcas"
                                    :key="index"
                                    v-bind:value="setmarca.code_m"
                                >   {{setmarca.nombre}} 
                                </option>
                            </select>
                        </div>                       
                        <div class="form-group col-3 mb-1">
                            <label for="" class="m-0 pl-2"><strong>Linea</strong></label>
                            <select 
                                class="form-control form-control-sm" 
                                id="slcLineaSetProd" 
                                ref="slcLineaSetProd" 
                                v-model="setprod.linea" 
                                @keydown.enter="nextInput('slcFamiliaSetProd')"
                            >
                                <option 
                                    v-for="(setline, index) in this.setlineas" 
                                    :key="index" 
                                    :value="setline.code_l"
                                >   {{setline.nombre}} 
                                </option>

                            </select>
                        </div>
                        <div class="form-group col-3 mb-1">
                            <label for="" class="m-0 pl-2"><strong>Familia</strong></label>
                            <select 
                                class="form-control form-control-sm"
                                id="slcFamiliaSetProd"
                                v-model="setprod.familia"
                                @keydown.enter="nextInput('txtCantidadSetProd')"
                            >
                                <option 
                                    v-for="(setfamilia, index) in this.setfamilias" 
                                    :key="index" 
                                    :value="setfamilia.code_f" 
                                >   {{setfamilia.nombre}} </option>
                            </select>
                        </div>
                    </div> <!-- form-row -->
                    <div class="form-row p-0">
                        <div class="form-group col-3 mb-1">
                            <label for="" class="m-0 pl-2"><strong>cantidad</strong></label>
                            <input 
                                type="number"  
                                class="form-control form-control-sm text-right" 
                                id="txtCantidadSetProd" 
                                ref="txtCantidadSetProd" 
                                v-model.number="setprod.cantidad" 
                                @keydown.enter="nextInput('txtPcostoSetProd')"
                            >
                        </div>
                        <div class="form-group col-3 mb-1">
                            <label for="" class="m-0 pl-2"><strong>Precio Costo</strong></label>
                            <input 
                                type="number"  
                                class="form-control form-control-sm m-0 text-right" 
                                id="txtPcostoSetProd" 
                                ref="txtPcostoSetProd"  
                                v-model.number="setprod.pcosto" 
                                @keydown.enter="onPCosto()" 
                            >
                        </div>
                        <div class="form-group col-3 mb-1">
                            <label for="" class="m-0 pl-2"><strong>Descuento 1</strong></label>
                            <input 
                                type="number"  
                                class="form-control form-control-sm text-right" 
                                id="txtDesct1SetProd" 
                                ref="txtDesct1SetProd" 
                                v-model.number="setprod.desct1" 
                                @keydown.enter="nextInput('txtDesct2SetProd')"
                            >
                        </div>
                        <div class="form-group col-3 mb-1">
                            <label for="" class="m-0 pl-2"><strong>Descuento 2</strong></label>
                            <input 
                                type="number"  
                                class="form-control form-control-sm text-right" 
                                id="txtDesct2SetProd" 
                                ref="txtDesct2SetProd" 
                                v-model.number="setprod.desct2" 
                                @keydown.enter="nextInput('txtFleteSetProd')"
                            >
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-3 m-0">
                            <label for="" class="m-0 pl-2"><strong>Flete</strong></label>
                            <input 
                                type="number"  
                                class="form-control form-control-sm text-right" 
                                id="txtFleteSetProd" 
                                ref="txtFleteSetProd" 
                                v-model.number="setprod.flete" 
                                @keydown.enter="nextInput('txtSubtotalSetProd')"
                            >
                        </div>
                        <div class="form-group col-3 m-0">
                            <label for="" class="m-0 pl-2"><strong>Sub Total</strong></label>
                            <input 
                                type="number"  
                                class="form-control-plaintext form-control-sm text-right border px-2" 
                                id="txtSubtotalSetProd" 
                                ref="txtSubtotalSetProd"
                                v-model.number="setprod.subtotal" 
                                @keydown.enter="onSubTotal()"
                                readonly
                            >
                        </div>
                        <div class="form-group col-3 m-0">
                            <label for="" class="m-0 pl-2"><strong>Costo Final</strong></label>
                            <input 
                                type="number"  
                                class="form-control-plaintext form-control-sm text-right border px-2" 
                                id="txtCostfinalSetProd" 
                                v-model.number="setprod.costfinal" 
                                @keydown.enter="onPrecioFinal()"
                                readonly
                            >
                        </div>
                    </div>
                </div> <!-- col-7 -->
                    
                
                <div class="col-5 table-responsive-sm">
                    <table class="table table-sm  table-bordered justify-content-center" style="font-size: 0.8em">
                        <thead class="thead-dark">
                            <tr>
                                <th class="p-0 text-center align-middle"></th>
                                <th class="p-0 text-center align-middle">Margen  <small>(%)</small> </th>
                                <th class="p-0 text-center align-middle">Utilidad</th>
                                <th class="p-0 text-center align-middle">Neto</th>
                                <th class="p-0 text-center align-middle">IVA</th>
                                <th class="p-0 text-center align-middle">Precio Venta</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="p-0">
                                <td scope="row" class="table-active p-0  text-center align-middle"> <strong>Meson</strong> </td>
                                <td class="p-0">
                                    <input 
                                        type="number" 
                                        class="form-control-sm text-center font-weight-bolder form-control-plaintext" 
                                        id="txtp1margenSetProd" 
                                        ref="txtp1margenSetProd"
                                        v-model.number="setprod.p1_margen" 
                                        @keydown.enter="onP1Margen()"
                                    > 
                                </td>
                                <td class="p-0">
                                    <input 
                                        type="number" 
                                        class="form-control-sm text-center font-weight-bolder form-control-plaintext" 
                                        :value="setprod.p1_utilidad" 
                                        readonly
                                    > 
                                </td>
                                <td class="p-0">
                                    <input 
                                        type="number" 
                                        class="form-control-sm text-center font-weight-bolder form-control-plaintext" 
                                        v-model.number="setprod.p1_neto"
                                         readonly
                                    > 
                                </td>
                                <td class="p-0">
                                    <input 
                                        type="number" 
                                        class="form-control-sm text-center font-weight-bolder form-control-plaintext" 
                                        id="" 
                                        v-model.number="setprod.p1_iva" 
                                        readonly
                                    > 
                                </td>
                                <td class="p-0">
                                    <input 
                                        type="number" 
                                        class="form-control-sm text-center font-weight-bolder form-control-plaintext" 
                                        id="txtp1ventaSetProd"
                                        ref="txtp1ventaSetProd"
                                        v-model.number="setprod.p1_venta" 
                                        @keydown.enter="onkeydownP1PrecioV()"
                                    > 
                                </td>
                            </tr>
                            <tr class="p-0">
                                <td scope="row" class="table-active p-0  text-center align-middle"> <strong>Mayorista</strong> </td>
                                <td class="p-0">
                                    <input 
                                        type="number" 
                                        class="form-control-sm text-center font-weight-bolder form-control-plaintext" 
                                        id="txtp2margensetprod"
                                        v-model.number="setprod.p2_margen" 
                                        @keydown.enter="onP2Margen()" 
                                    > 
                                </td>
                                <td class="p-0">
                                    <input 
                                        type="number" 
                                        class="form-control-sm text-center font-weight-bolder form-control-plaintext" 
                                        v-model.number="setprod.p2_utilidad" 
                                        readonly
                                    > 
                                </td>
                                <td class="p-0">
                                    <input 
                                        type="number" 
                                        class="form-control-sm text-center font-weight-bolder form-control-plaintext" 
                               
                                        v-model.number="setprod.p2_neto" 
                                        readonly
                                    > 
                                </td>
                                <td class="p-0">
                                    <input 
                                        type="number" 
                                        class="form-control-sm text-center font-weight-bolder form-control-plaintext" 
                                   
                                        v-model.number="setprod.p2_iva" 
                                        readonly
                                    > 
                                </td>
                                <td class="p-0">
                                    <input 
                                        type="number" 
                                        class="form-control-sm text-center font-weight-bolder form-control-plaintext" 
                                        id="txtp2ventaSetProd" 
                                        v-model.number="setprod.p2_venta" 
                                        @keydown.enter="onkeydownP2PrecioV()"
                                    > 
                                </td>
                            </tr>
                            <tr class="p-0">
                                <td scope="row" class="table-active p-1 text-center align-middle"> <strong>Distribucion</strong> </td>
                                <td class="p-0">
                                    <input 
                                        type="number" 
                                        class="form-control-sm text-center font-weight-bolder form-control-plaintext" 
                                        id="txtp3margensetprod"
                                        v-model.number="setprod.p3_margen" 
                                        @keydown.enter="onP3Margen()"
                                    > 
                                </td>
                                <td class="p-0">
                                    <input 
                                    type="number" 
                                    class="form-control-sm text-center font-weight-bolder form-control-plaintext" 
                                    id="" 
                                    v-model.number="setprod.p3_utilidad" 
                                    readonly
                                    >    
                                </td>
                                <td class="p-0">
                                    <input 
                                        type="number" 
                                        class="form-control-sm text-center font-weight-bolder form-control-plaintext" 
                                        v-model.number="setprod.p3_neto" 
                                        readonly
                                    > 
                                </td>
                                <td class="p-0">
                                    <input 
                                        type="number" 
                                        class="form-control-sm text-center font-weight-bolder form-control-plaintext" 
                                        id="" 
                                        v-model.number="setprod.p3_iva" 
                                        readonly
                                    > 
                                </td>
                                <td class="p-0">
                                    <input 
                                        type="number" 
                                        class="form-control-sm text-center font-weight-bolder form-control-plaintext" 
                                        id="txtp3ventaSetProd" 
                                        v-model.number="setprod.p3_venta" 
                                        @keydown.enter="onkeydownP3PrecioV()"
                                    > 
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div> <!-- col-5 -->
            </div> <!-- row -->
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
                       <th>Actividad</th>
                   </tr>
               </thead>
               <tbody>
                   <tr class="text-center" v-for="(detalle, index) in this.setdetallecomp" :key="index">
                       <td scope="row" class="table-active">{{index + 1}}</td>
                       <td class="py-0 align-middle">{{detalle.codinterno}}</td>
                       <td class="py-0 align-middle text-left">{{detalle.nombre}}</td>
                       <td class="py-0 align-middle">{{detalle.cantidad}}</td>
                       <td class="py-0 align-middle">{{detalle.unidad}}</td>
                       <td class="py-0 align-middle">{{detalle.pcosto}}</td>
                       <td class="py-0 align-middle">{{detalle.desct1}}</td>
                       <td class="py-0 align-middle">{{detalle.subtotal}}</td>
                       <td class="py-0 align-middle">
                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-light"><i class="far fa-edit text-primary"  @click="onSelecDtl(detalle)"></i></button>
                            </div>
                       </td>
                   </tr>
               </tbody>
           </table>

            <div class="container-fluid">
               
               <div class="row p-1">
                
                    <div class="col">

                        <div class="form-row m-0">
                            <div class="form-group mb-1">
                                <label for="" class="mb-0 pl-2"> <strong> Ref. de Documentos</strong></label>
                                <select id="inputState" class="form-control form-control-sm" v-model="ref.tipodoc">
                                    <option :value="0"></option>
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
                            <div class="form-group mx-2 mb-1 col-2">
                                <label for="" class="mb-0 pl-2"> <strong>Ref. Folio</strong> </label>
                                <input type="text" class="form-control form-control-sm" name="" id="" v-model="ref.folio">
                            </div>
                           
                            <div class="form-group mb-1" v-if="setcomp.tipodoc == 61">
                                <label for="" class="mb-0 pl-2"> <strong>Codigo de Ref.</strong></label>
                                <select id="inputState" class="form-control form-control-sm" v-model="ref.codref">
                                    <option :value="1">Anula Documento de Referencia</option>
                                    <option :value="2">Corrige texto Documento</option>r
                                    <option :value="3">Corrige Montos</option>
                                </select>
                            </div>
                        </div>
                    
                        <label for="exampleFormControlTextarea1" class="mb-0 pl-2"> <strong>Nota</strong> </label>
                        <textarea class="form-control form-control-sm" id="exampleFormControlTextarea1" rows="4" v-model="nota"></textarea>
                    
                    </div>
                    
                    <div class="col-5">

                        <div class="form-row">
                            <div class="form-group col m-0">
                                <div class="input-group input-group-sm mb-1">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" > <strong>Sub Total</strong> </span>
                                    </div>
                                    <input 
                                        type="text" 
                                        class="form-control form-control-sm text-right" 
                                        aria-label="Sizing example input" 
                                        aria-describedby="inputGroup-sizing-default" 
                                        v-model.number="totsubtotal" 
                                    >
                                </div>
                            </div>     
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-5 m-0">
                                <div class="input-group input-group-sm mb-1">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text "  > <strong>Descuento</strong> </span>
                                    </div>
                                    <input 
                                        type="text" 
                                        class="form-control form-control-sm text-right" 
                                        aria-label="Sizing example input" 
                                        aria-describedby="inputGroup-sizing-default" 
                                        v-model.number="totdesct" 
                                        @keypress.enter="onDesct"
                                    >
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
                                    <input 
                                        type="text" 
                                        class="form-control form-control-sm text-right" 
                                        aria-label="Sizing example input" 
                                        aria-describedby="inputGroup-sizing-default" 
                                        v-model.number="totmonto"
                                    >
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col mb-0">
                                <div class="input-group input-group-sm mb-1">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="lb-neto" > <strong>Neto</strong> </span>
                                    </div>
                                    <input 
                                        type="text" 
                                        class="form-control form-control-sm text-right" 
                                        aria-label="Neto" 
                                        aria-describedby="lb-neto" 
                                        v-model.number="totneto"
                                    >
                                </div> 
                            </div>
                            
                        </div>
                            
                        <div class="form-row">
                            <div class="form-group col-4 m-0">
                                <div class="input-group input-group-sm mb-1">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text " id="lb-IVA" > <strong>IVA</strong> </span>
                                    </div>
                                    <input 
                                        type="text" 
                                        class="form-control form-control-sm bold text-center bg-secondary" 
                                        aria-label="IVA" 
                                        aria-describedby="lb-IVA" 
                                        v-model.number="tasaiva" 
                                    >
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
                                    <input 
                                        type="text" 
                                        class="form-control form-control-sm text-right" 
                                        aria-label="Total IVA" 
                                        aria-describedby="lb-total-iva" 
                                        v-model.number="totiva"
                                    >
                                </div>
                            </div>
                        </div>                       
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text " > <strong>Total</strong> </span>
                            </div>
                            <input 
                                type="text" 
                                class="form-control form-control-sm text-right" 
                                aria-label="Sizing example input" 
                                aria-describedby="inputGroup-sizing-default" 
                                v-model.number="tottotal"
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>        
        <div class="card-footer p-2">
            <div class="float-right">
                <button type="button" class="btn btn-sm btn-primary " @click.prevent="onStoreVenta()"> <strong>Guardar</strong> </button>
            </div>
        </div>
    </div>
    

    <!-- 
    - Modal Proveedor 
    -->
    <div class="modal fade" id="msearchprov" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content bg-light">
                <div class="modal-header py-2">
                    <h5 class="modal-title">Buscar Proveedor</h5>
                    <button type="button" class="close btn btn-sm" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body table-responsive-sm p-0">
                    <div class="form-row">
                        <div class="form-group col p-2 m-0">
                            <input 
                                type="text" 
                                id="searchprov" 
                                class="form-control form-control-sm co-12" 
                                placeholder="Buscar Provedor" 
                                ref="searchprov" 
                                v-model.number="searchprov" 
                                @keydown.enter="onSearchProv()"
                                autofocus
                            >
                        </div>
                    </div>
                        <table class="table table-sm table-striped table-bordered table-inverse p-0" >
                            <thead class="thead-dark">
                                <tr class="text-center">
                                    <th scope="col">Rut</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Comuna</th>
                                    <th scope="col">Pais</th>
                                    <th scope="col">Actividad</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(prov, index) of this.getProveedor" :key="index" class="p-0">
                                    <td scope="row" class="align-middle" style="width: 6rem;"><strong>{{prov.rut}}</strong> </td>
                                    <td class="text-sm-left align-middle">{{prov.nombre}}</td>
                                    <td class="text-sm-center align-middle">{{prov.comuna}}</td>
                                    <td class="text-sm-center align-middle">{{prov.pais}}</td>
                                    <td class="text-sm-center align-middle">
                                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                            <button 
                                                type="button" 
                                                class="btn btn-sm btn-outline-success" 
                                                @click="onSelecProv(prov)"
                                            >
                                            <i class="fa fa-plus-square fa-lg text-lights" ></i></button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div> -->
            </div>
        </div>
    </div>

    <!-- Modal  Productos-->
    <div class="modal fade" id="searchprod" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content bg-light">
                <div class="modal-header p-2 px-3">
                    <h5 class="modal-title">Agregar Productos</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body p-0">
                    <div class="form-row">
                        <div class="form-group col p-2 m-0">
                            <input 
                                type="text" 
                               
                                class="form-control form-control-sm col-12" 
                                placeholder="Buscar Producto" 
                                ref="searchcprod" 
                                v-model="searchcprod" 
                                @keypress.enter="onSearchProd"
                            >
                        </div>
                    </div>
                    <div class="table-responsive-sm">
                        <table class="table table-sm table-striped table-bordered table-inverse p-0">
                            <thead class="thead-dark">
                                <tr class="text-center align-middle">
                                    <th scope="col">Codigo</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Stock</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Agregar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(prod, index) of this.getprod" :key="index" class="align-middle">
                                    <td scope="row" style="width: 8rem;"> <strong>{{prod.codinterno}}</strong> </td>
                                    <td class="text-truncate" style="max-width: 250px;">{{prod.nombre}}</td>
                                    <td>{{prod.stock}}</td>
                                    <td>
                                        <div class="form-group m-0 px-0">
                                            <input 
                                                type="text" 
                                                class="form-control form-control-sm form-control-plaintext" 
                                                name="" 
                                                 
                                                placeholder="" 
                                                v-model="prod.cantidad" 
                                                @keypress.enter="onSelecProd(prod)"
                                            >
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group m-0 px-0">
                                            <input 
                                                type="text" 
                                                class="form-control form-control-sm form-control-plaintext" 
                                                name="" 
                                                
                                                placeholder="" 
                                                v-model="prod.pcosto" 
                                                @keypress.enter="onSelecProd(prod)"
                                            >
                                        </div> 
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-sm btn-outline-success" @click="onSelecProd(prod)">
                                                <i class="fa fa-plus-square fa-lg text-lights" ></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>                                 
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cerra</button>
                    <button type="button" class="btn btn-sm btn-primary">Guardar</button>
                </div> -->
            </div>
        </div>
    </div>

    <!-- <pre>{{$data}}</pre> -->

</div>    
</template>

<script>
export default {
data(){
    return {
        setcomp: {
            tipodoc: 33,
            fchingrso: moment().format('YYYY-MM-DD'),
            fchemite: moment().format('YYYY-MM-DD'),
            fchvence: moment().format('YYYY-MM-DD'),
            folio: null,
        },
        setprov: {
            prov_id: null,
            rut: null,
            nombre: null
        },
        setprod: {
            codinterno: null,
            nombre: null,
            pcosto: new Number(0),
            cantidad: new Number(0),
            desct1: new Number(0),
            desct2: new Number(0),
            flete: new Number (0),
            subtotal: new Number(0),
            costfinal: new Number(0),
            unidad: null,
            marca: null,
            linea: null,
            familia: null,
            p1_margen: new Number(0),
            p1_utilidad: new Number(0),
            p1_neto: new Number(0),
            p1_iva: new Number(0),
            p1_venta: new Number(0),
            p2_margen: new Number(0),
            p2_utilidad: new Number(0),
            p2_neto: new Number(0),
            p2_iva: new Number(0),
            p2_venta: new Number(0),
            p3_margen: new Number(0),
            p3_utilidad: new Number(0),
            p3_neto: new Number(0),
            p3_iva: new Number(0),
            p3_venta: new Number(0),
        },
        ref: {
            tipodoc: 0,
            folio: 0
        },
        nota: '',
        totsubtotal: new Number(0),
        totdesct: new Number(0),
        totmonto: new Number(0),
        totneto: new Number(0),
        tasaiva : 19,
        totiva: new Number(0),
        tottotal: new Number(0),
        setdetallecomp: [],
        setunidades: [],
        setmarcas: [],
        setlineas: [],
        setfamilias: [],
        isErr: null,
        isClose: null,
        searchprov: null,
        getclientes: null,
        setfamilias: null,
        linea: null,
        searchcprod: null,
        getprod: null,
        getProveedor: null,
        disabled: null,
        cont: 1

    }
},
mounted(){
    this.getUnidad()
    this.getMarca()
    this.getLineas()
    
    // console.log(moment().format('DD-MM-YYYY'))
},
watch: {

    linea: function (val){

        var uURL = '/api/familias/linea/' + val ;
        axios.get(uURL)
        .then(response => {
        // JSON responses are automatically parsed.
        this.setfamilias = response.data
        })
        .catch(e => {
            console.log(e);
        })

        this.setprod.linea = val
        
    },
   
    totsubtotal(val){

        val = new Number(val).toFixed(0)

        if (typeof this.totdesct == "undefined" || this.totdesct == null){
            this.totneto =  new Number(val).toFixed(0)
        } else {
            this.totmonto = new Number( val * ( this.totdesct / 100)).toFixed(0)
            this.totneto =  new Number(val - this.totmonto).toFixed(0)
        }

        if (this.setcomp.tipodoc != 34 ) {
            this.totiva = new Number(this.totneto * 0.19).toFixed(0)
            this.tottotal = new Number(this.totneto * 1.19).toFixed(0)
        } else {
            // this.totiva = new Number(this.totneto).toFixed(0)
            this.tottotal = new Number(this.totneto).toFixed(0)
        }
        

    },
    // totdesct(val){
        
    //     this.totmonto = new Number( this.totsubtotal * ( this.totdesct * 100))
    //     this.totneto =  new Number(this.totsubtotal - this.totmonto)
    //     this.totiva = new Number(this.totneto * 0.19)
    //     this.tottotal = new Number(this.totneto * 1.19)
    // }
},
methods: {

    onProd(){

        this.setprod.item = this.cont

        if (typeof this.setprod.subtotal == "undefined" || this.setprod.subtotal == null || this.setprod.subtotal == 0 || this.setprod.codinterno == null || this.setprod.cantidad == null){

            alert('Error en el dato Subtotal')

        } else {

            this.setdetallecomp.push(_.cloneDeep(this.setprod))
            this.totsubtotal += new Number(this.setprod.subtotal)
            this.cont ++
            this.onResetProd()
            this.nextInput('txtCodigoInt')
        }


        

        // if (typeof this.totdesct == "undefined" || this.totdesct == null){
        //     this.totneto =  this.totsubtotal
        // } else {
        //     this.totmonto = new Number( this.totsubtotal * ( this.totdesct * 100))
        // }
        
        // this.setprod = {
        //     codinterno: null,
        //     nombre: null,
        //     pcosto: new Number(0),
        //     cantidad: new Number(0),
        //     desct1: new Number(0),
        //     desct2: new Number(0),
        //     flete: new Number (0),
        //     subtotal: new Number(0),
        //     costfinal: new Number(0),
        //     unidad: null,
        //     marca: null,
        //     linea: null,
        //     familia: null,
        //     p1_margen: new Number(0),
        //     p1_utilidad: new Number(0),
        //     p1_neto: new Number(0),
        //     p1_iva: new Number(0),
        //     p1_venta: new Number(0),
        //     p2_margen: new Number(0),
        //     p2_utilidad: new Number(0),
        //     p2_neto: new Number(0),
        //     p2_iva: new Number(0),
        //     p2_venta: new Number(0),
        //     p3_margen: new Number(0),
        //     p3_utilidad: new Number(0),
        //     p3_neto: new Number(0),
        //     p3_iva: new Number(0),
        //     p3_venta: new Number(0),
        // }
        
        // this.linea = null
        // this.disabled = null
        // this.searchcprod = null
        // this.onRest()
        
    },
    onResetProd()
    {
        this.setprod = {
            codinterno: null,
            nombre: null,
            pcosto: new Number(0),
            cantidad: new Number(0),
            desct1: new Number(0),
            desct2: new Number(0),
            flete: new Number (0),
            subtotal: new Number(0),
            costfinal: new Number(0),
            unidad: null,
            marca: null,
            linea: null,
            familia: null,
            p1_margen: new Number(0),
            p1_utilidad: new Number(0),
            p1_neto: new Number(0),
            p1_iva: new Number(0),
            p1_venta: new Number(0),
            p2_margen: new Number(0),
            p2_utilidad: new Number(0),
            p2_neto: new Number(0),
            p2_iva: new Number(0),
            p2_venta: new Number(0),
            p3_margen: new Number(0),
            p3_utilidad: new Number(0),
            p3_neto: new Number(0),
            p3_iva: new Number(0),
            p3_venta: new Number(0),
        }
        this.linea = null
        this.disabled = null
        this.searchcprod = null
    },
    onDesct()
    {
        this.totmonto = new Number( this.totsubtotal * ( this.totdesct / 100))
        this.totneto =  new Number(this.totsubtotal - this.totmonto)
        this.totiva = new Number(this.totneto * 0.19)
        this.tottotal = new Number(this.totneto * 1.19)

        this.totmonto = this.totmonto.toFixed(0)
        this.totneto = this.totneto.toFixed(0)
        this.totiva = this.totiva.toFixed(0)
        this.tottotal = this.tottotal.toFixed(0)    
    },
    onStoreVenta(){

        let mi = this

        axios.post('/admin/compras', {
            
            compra : _.cloneDeep(mi.setcomp),
            dtll_prod : _.cloneDeep(mi.setdetallecomp),
            tot : {
                subtotal: _.cloneDeep(mi.totsubtotal),
                desct: _.cloneDeep(mi.totdesct),
                monto: _.cloneDeep(mi.totmonto),
                neto: _.cloneDeep(mi.totneto),
                iva: _.cloneDeep(mi.totiva),
                total: _.cloneDeep(mi.tottotal),
            },
            prov : _.cloneDeep(mi.setprov),
            ref: _.cloneDeep(mi.ref),
            nota:  _.cloneDeep(mi.nota)

        })
        .then ( res => {
            mi.outPut = _.cloneDeep(res.data)
            mi.isClose = true
            // mi.onRest()
            mi.setcomp = {
            tipodoc: 33,
            fchingrso: moment().format('YYYY-MM-DD'),
            fchemite: moment().format('YYYY-MM-DD'),
            fchvence: moment().format('YYYY-MM-DD'),
            folio: null,
            };

            mi.setprov = []
            mi.setdetallecomp = []
            mi.totsubtotal = new Number(0)
            mi.totdesct = new Number(0)
            mi.totmonto = new Number(0)
            mi.totneto = new Number(0)
            mi.tasaiva  = 19
            mi.totiva = new Number(0)
            mi.tottotal = new Number(0)
            // mi.setprov = {
            //     prov_id: 0,
            //     rut: null,
            //     nombre: null
            // }

            mi.ref = {
            tipodoc: 0,
            folio: 0
            }

            setTimeout(() => { mi.isClose = !mi.isClose}, 10000)
            // this.nextInput('isclose')

        })
        .catch ( err => {
            mi.outErr = _.cloneDeep('Ha ocurrido un error')
            mi.isErr = true
            console.log(err)
            setTimeout(() => { mi.isErr = !mi.isErr}, 5000)
        })
        
        $('#collpseExample').collapse({ toggle: false })
        mi.setclient = []
        mi.setdtll = []
        mi.res = []
             
    },
    getUnidad() {

        var uURL = '/api/unidades'
        axios.get(uURL)
        .then(response => {
        // JSON responses are automatically parsed.
        this.setunidades = response.data
        })
        .catch(e => {
            console.log(e);
        })

    },
    getMarca() {

        var uURL = '/api/marcas'
        axios.get(uURL)
        .then(response => {
        // JSON responses are automatically parsed.
        this.setmarcas = response.data
        })
        .catch(e => {
            console.log(e);
        })
    },
    getLineas() {

        var uURL = '/api/lineas'
        axios.get(uURL)
        .then(response => {
        // JSON responses are automatically parsed.
        this.setlineas = response.data
        })
        .catch(e => {
            console.log(e);
        })
    },
    onSearchProd(){

        let cURL = '/api/productos/searchpcompra/' + this.searchcprod
        axios.get(cURL)
        .then( res => {
            this.getprod = _.cloneDeep(res.data)
            // console.log(this.getprod)
        })
        .catch( e => {
            console.log(e)
        })

    },
    onSearchProdCode(){

        if(this.setprod.codinterno === undefined || this.setprod.codinterno === null) {
            
            alert('Ingrese el Codigo de producto')

        } else {

            let cURL = '/api/producto/code/' + this.setprod.codinterno
            axios.get(cURL)
            .then( res => {
                if (res.data === undefined || res.data === null) {
                    // this.setprod.codinterno = _.cloneDeep(this.setprod.codinterno)
                    // this.onPFinal()
                    // this.onP1PrecioV()
                    // this.onP2PrecioV()
                    // this.onP3PrecioV()
                    this.$refs.txtNombreSetProd.focus()
                } else {
                    this.setprod = _.cloneDeep(res.data)
                    this.onPFinal()
                    this.onP1PrecioV()
                    this.onP2PrecioV()
                    this.onP3PrecioV()
                    this.$refs.txtNombreSetProd.focus()
                }
                
            // this.onSelecProd(res.data)

            console.log(res.data)
            })
            .catch( err => {
                // console.log(err)
                this.$refs.txtNombreSetProd.focus()
            })
        }
    },
    onSelecProd(params) {
            
        // params.total = parseInt(params.p3_neto) * parseInt(params.cantidad)
        // params.descdtl = null
        // this.res.sub = new Number(this.res.sub + params.total)
        // this.onMonto()
        this.setprod  = _.cloneDeep(params)
        this.linea = this.setprod.linea
        this.setprod.subtotal = new Number (this.setprod.pcosto * this.setprod.cantidad)
        this.onPFinal()
        this.onP1PrecioV()
        this.onP2PrecioV()
        this.onP3PrecioV()
        // this.setprod = _.cloneDeep(params)
        // console.log(this.setdtll);
        // console.log(this.res);
        this.disabled = 1
        $('#searchprod').modal('hide')

    },
    onSelecDtl(params){

        let mi = this

        let pos = this.setdetallecomp.indexOf(params)

        this.setdetallecomp.splice(pos, 1);

        this.setprod = _.cloneDeep(params)

        this.totsubtotal -= new Number(this.setprod.subtotal)
       
        // this.totsubtotal -= new Number()

    },
    onSearchProv(){

        let cURL = '/api/proveedores/search/' + this.searchprov
        axios.get(cURL)
        .then( res => {
            this.getProveedor = _.cloneDeep(res.data)
            // console.log(this.getprod)
        })
        .catch( e => {
            console.log(e)
        })

    },
    onSelecProv(params) {
            
        // params.total = parseInt(params.p3_neto) * parseInt(params.cantidad)
        // params.descdtl = null
        // this.res.sub = new Number(this.res.sub + params.total)
        // this.onMonto()
        this.setprov  = _.cloneDeep(params)
        // this.linea = this.setprod.linea
        // this.setprod.subtotal = new Number (this.setprod.pcosto * this.setprod.cantidad)
        // this.setprod = _.cloneDeep(params)
        // console.log(this.setdtll);
        // console.log(this.res);
        $('#msearchprov').modal('hide')

    },
    onPFinal() 
    {
        if (this.setprod.desct1 > 0){
            var des1 = new Number(this.setprod.pcosto * (this.setprod.desct1 / 100))
        } else {
            var des1 = 0;
        }
        if (this.setprod.desct1 > 0 && this.setprod.desct2 > 0){
            var des2 = new Number(this.setprod.pcosto * (this.setprod.desct2 / 100))
        } else {
            var des2 = 0;
        }
        if (this.setprod.flete > 0){

            var flet  = new Number(this.setprod.flete)

        } else {

            var flet = new Number(0)
        }

        var des3 = new Number(des1 + des2)

        this.setprod.costfinal = new Number((this.setprod.pcosto - des3) + flet).toFixed(0)
        console.log(des1 + ' ' + des2 + ' ' + flet + ' ' + des3)
    },
    onSubTotal()
    {
        this.setprod.subtotal = new Number(this.setprod.cantidad * this.setprod.pcosto).toFixed(0)
        // this.$refs.txtCostfinalSetProd.focus()
        this.nextInput('txtCostfinalSetProd')
        // this.setprod.subtotal = this.setprod.subtotal.toFixed(0)
    },
    onP1PrecioV()
    {   
        this.setprod.p1_utilidad = 0
        this.setprod.p1_margen = 0
        this.setprod.p1_neto  = new Number(this.setprod.p1_venta / 1.19).toFixed(0)
        this.setprod.p1_utilidad = new Number(this.setprod.p1_neto - this.setprod.costfinal).toFixed(0)
        this.setprod.p1_margen = new Number((this.setprod.p1_neto * 100) / this.setprod.costfinal - 100).toFixed(2)
        this.setprod.p1_iva = new Number(this.setprod.p1_neto * 0.19).toFixed(0)

        this.setprod.p1_venta = new Number(this.setprod.p1_venta).toFixed(0);

    },
    onP2PrecioV()
    {
        this.setprod.p2_neto  = new Number(this.setprod.p2_venta / 1.19).toFixed(0)
        this.setprod.p2_utilidad = new Number(this.setprod.p2_neto - this.setprod.costfinal).toFixed(0)
        this.setprod.p2_margen =  new Number((this.setprod.p2_neto * 100) / this.setprod.costfinal - 100).toFixed(2)
        this.setprod.p2_iva = new Number(this.setprod.p2_neto * 0.19).toFixed(0)
        this.setprod.p2_venta = new Number(this.setprod.p2_venta).toFixed(0)

    },
    onP3PrecioV()
    {
        this.setprod.p3_neto  = new Number(this.setprod.p3_venta / 1.19).toFixed(0)
        this.setprod.p3_utilidad = new Number(this.setprod.p3_neto - this.setprod.costfinal).toFixed(0)
        this.setprod.p3_margen = new Number((this.setprod.p3_neto * 100) / this.setprod.costfinal - 100).toFixed(2)
        this.setprod.p3_iva = new Number(this.setprod.p3_neto * 0.19).toFixed(0)
        this.setprod.p3_venta = new Number(this.setprod.p3_venta).toFixed(0)

    },
    onP1Margen()
    {
        this.setprod.p1_margen = new Number(this.setprod.p1_margen).toFixed(2)
        let mag = new Number(this.setprod.p1_margen / 100)
        this.setprod.p1_neto = new Number(this.setprod.costfinal * (1 + mag)).toFixed(0)
        this.setprod.p1_utilidad = new Number(this.setprod.costfinal * mag).toFixed(0)
        this.setprod.p1_iva = new Number( this.setprod.p1_neto * 0.19).toFixed(0)
        this.setprod.p1_venta = new Number(this.setprod.p1_neto * 1.19).toFixed(0)

        this.nextInput('txtp1ventaSetProd')
    },
    onP2Margen()
    {
        this.setprod.p2_margen = new Number(this.setprod.p2_margen).toFixed(2)
        let mag = new Number(this.setprod.p2_margen / 100 )
        this.setprod.p2_neto = new Number(this.setprod.costfinal * (1 + mag)).toFixed(0)
        this.setprod.p2_utilidad = new Number(this.setprod.costfinal * mag).toFixed(0)
        this.setprod.p2_venta = new Number(this.setprod.p2_neto * 1.19).toFixed(0)
        this.setprod.p2_iva = new Number(this.setprod.p2_neto * 0.19).toFixed(0)

        this.nextInput('txtp2ventaSetProd')
    },
    onP3Margen()
    {
        this.setprod.p3_margen = new Number(this.setprod.p3_margen).toFixed(2)
        let mag = new Number(this.setprod.p3_margen / 100)
        this.setprod.p3_neto = new Number(this.setprod.costfinal * (1 + mag)).toFixed(0)
        this.setprod.p3_utilidad = new Number(this.setprod.costfinal * mag).toFixed(0)
        this.setprod.p3_iva = new   Number(this.setprod.p3_neto * 0.19).toFixed(0)
        this.setprod.p3_venta = new Number(this.setprod.p3_neto * 1.19).toFixed(0)

        this.nextInput('txtp3ventaSetProd')
    },
    showModalProv()
    {   
        $('#msearchprov').modal('show')
        // $.fn.modal.Constructor.prototype.enforceFocus = $.noop
        // $(document).off('focusin.bs.modal');
        //  Vue.nextTick().then(()=
        // this.nextInput('searchprov')
        // this.$refs.searchprov.focus()
    },
    showModalProd()
    {
        $('#searchprod').modal('show')
        // this.$nextTick(this.$refs.searchcprod.focus())
    },
    onPCosto(){
        this.onPFinal()
        this.setprod.subtotal = new Number(this.setprod.cantidad * this.setprod.pcosto).toFixed(0)
        this.setprod.pcosto = new Number(this.setprod.pcosto).toFixed(0)
        this.$refs.txtDesct1SetProd.focus()  
    },
    onPrecioFinal(){
        this.onPFinal()
        this.nextInput('txtp1margenSetProd')
    },
    onGetProv(val){

        var uURL = '/api/proveedores/name/' + val ;
        axios.get(uURL)
        .then(response => {
        // JSON responses are automatically parsed.
        // this.setprov.nombre = response.data;
        response.data.forEach(element => {
            this.setprov = _.cloneDeep(element)
        });
        // this.nextInput('txtNombreProv')
        this.$refs.txtNombreProv.focus()  
        })
        .catch(e => {
            console.log(e);
        })
    },
    nextInput(refinp) {
        document.getElementById(refinp).focus();
    },
    onkeydownP1PrecioV(){
        this.onP1PrecioV()
        this.nextInput('txtp2margensetprod')
    },
    onkeydownP2PrecioV(){
        this.onP2PrecioV()
        this.nextInput('txtp3margensetprod')
    },
    onkeydownP3PrecioV(){
        this.onP3PrecioV()
        this.nextInput('btagregarprod')
    },
    getValidarFolio(){
        
        if(this.setcomp.folio === undefined || this.setcomp.folio === null) {
            
            alert('Ingrese el Numero de Factura')

        } else {

            axios.post('/api/compras/finefolio', {
                tipodoc: _.cloneDeep(this.setcomp.tipodoc),
                folio: _.cloneDeep(this.setcomp.folio),
                prov_id: _.cloneDeep(this.setprov.id)
            })
            .then( res => {
                console.log(res.data.existe)
                if(res.data.existe === 1){
                    alert('El Documento N° : ' + this.setcomp.folio + ' ya esta Ingresado')
                    this.nextInput('txtFolio')
                }else {
                    this.nextInput('dateEmision')
                }
            })
            .catch( err => {
                console.log(err)
            })
        }
    },
    isSetErrors(name){
        if(this.errors != null){
            if(this.errors[name]){
                console.log(this.errors[name])
                return 'is-invalid'
            } else {
                return 'is-valid'
            }
        } else {
            return ''
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
    }
}
}
</script>

<style>

input[type=number]::-webkit-outer-spin-button,

input[type=number]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

input[type=number] {
    -moz-appearance:textfield;
}

</style>
