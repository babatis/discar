
<template>
  <div>  
    
    <div class="row mt-4">
        <div class="col-12">

            <div class="card shadow mb-5 ">

                <div class="card-header p-2">
                    <div class="float-left"><P class="h3 m-0"> <strong>Producto</strong> </P></div>
                <div class="float-right">
                    <button v-if="disabled" type="button" class="btn btn-sm btn-primary " @click="disabled = !disabled">Editar</button>
                    <button class="btn btn-sm btn-danger" v-if="!disabled" @click="disabled = !disabled">Cancelar</button>
                    <button class="btn btn-sm btn-primary" v-if="!disabled" @click="onSubmitUpdate()">Guardar</button>
                </div>
                </div>

    
                <div class="card-body">
                   <form method="post" name="forma" id="frm"  ref="frm" files="true" enctype="multipart/form-data" action="/admin/productos">
                    <slot></slot>
                      
                    
                    <fieldset  :disabled="disabled">
                    <div class="row mt-4">
                        
                        <div class="col-6">

                            <div class="row mt-2">

                                <div class="col-6 ">  <!--Seccion de imagen --> 
                                
                                    <div class="text-center mx-auto">
                                        <img v-if="imagen" :src="imagen" class="mw-100 mh-100" alt="">
                                        <img v-else src="https://via.placeholder.com/150" alt="">
                                    </div>
                                
                                    <div class="custom-file mt-2 mb-2" :class="{ 'sr-only' : disabled}" >
                                    <input type="file" class="custom-file-input" name="file" id="file" ref="file" placeholder="" aria-describedby="fileHelpId" @change="onFileChange" accept="image/jpeg, image/png">
                                    <label class="custom-file-label" for="file" data-browse="Elegir" >{{ file_name ? file_name.name : 'Archivo' }}</label>
                                    <!-- <small id="fileHelpId" class="form-text text-muted sr-only">Help text</small> -->
                                    </div>
                                        
                                </div>

                                <div class="col-6 pt-0"> 

                                    <div class="form-row">

                                        <div class="form-group col-12 m-0">
                                        <label for="txtinter" class="m-0 pl-2" > <strong>Cod. Interno</strong> </label>
                                        <input type="text" class="form-control form-control-sm font-weight-bolder" id="codinterno" name="codinterno" v-model="codinterno" placeholder="" disabled readonly>
                                        </div>
                                        <div class="form-group col-12 m-0">
                                        <label for="txtbarcode" class="m-0 pl-2" > <strong>Cod. Barra</strong> </label>
                                        <input type="text" class="form-control form-control-sm font-weight-bolder" id="barcode" name="barcode" v-model="barcode" placeholder="">
                                        </div>
                                        <div class="form-group col-12 m-0">
                                        <label for="txtnomprod" class="m-0 pl-2"> <strong>Nombre Producto</strong> </label>
                                        <input type="text" class="form-control form-control-sm font-weight-bolder" id="nombre" name="nombre" v-model="nombre" placeholder="">
                                        </div>
                                        <div class="form-group col-12 m-0">
                                        <label for="txtdesprod" class="m-0 pl-2"> <strong>Descripcion Producto</strong> </label>
                                        <textarea class="form-control form-control-sm font-weight-bolder" id="descripcion" name="descripcion" v-model="descripcion" placeholder=""></textarea> 
                                        </div>

                                    </div>
                                </div>

                            </div> 

                            <div class="row">

                                <div class="col-12">
                                
                                    <div class="form-row">

                                        <div class="form-group col-3 m-0">
                                            <label for="sel-unidad" class="m-0 pl-2"> <strong>U. Medida</strong> </label>
                                            <select class="form-control form-control-sm font-weight-bolder" id="unidad" name="unidad" v-model="unidad" >
                                            <!-- <option selected>Unidad de Medida </option> -->
                                            <template v-if="setunidades && setunidades.length">
                                            <option  v-for="(setunidad, index) of setunidades" :key="index" v-bind:value="setunidad.code_u">{{setunidad.nombre}} </option>
                                            </template>
                                            </select>
                                        </div>
                                            
                                        <div class="form-group col-3 m-0">
                                            <label for="linea" class="m-0 pl-2"> <strong>Linea</strong> </label>
                                            <select class="form-control form-control-sm font-weight-bolder" id="linea" name="linea" v-model="linea">
                                            <template v-if="setlineas && setlineas.length">
                                                <option selected >Linea ...</option>
                                                <option  v-for="(setlinea, index) of setlineas" :key="index" v-bind:value="setlinea.code_l">{{setlinea.nombre}} </option>
                                            </template>
                                            </select>
                                        </div>

                                        <div class="form-group col-3 m-0">
                                            <label for="familia" class="m-0 pl-2"> <strong>Familia</strong> </label>
                                            <select class="form-control form-control-sm font-weight-bolder" id="familia" name="familia" v-model="familia" >
                                            <!-- <option selected >Familia ...</option> -->
                                            <template v-if="setfamilias && setfamilias.length">
                                                <option  v-for="(setfamilia, index) of setfamilias" :key="index" v-bind:value="setfamilia.code_f">{{setfamilia.nombre}} </option>
                                            </template>
                                            </select>
                                        </div>

                                        <div class="form-group col-3 m-0">
                                            <label for="marca" class="m-0 pl-2"> <strong>Marca</strong> </label>
                                            <select class="form-control form-control-sm font-weight-bolder" id="marca" name="marca" v-model="marca">
                                            <!-- <option selected >Marca ... </option> -->
                                            <template v-if="setmarcas && setmarcas.length">
                                                <option  v-for="(setmarca, index) of setmarcas" :key="index" v-bind:value="setmarca.code_m">{{setmarca.nombre}} </option>
                                            </template>
                                            </select>
                                        </div>
                                        
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="col-6 table-responsive-sm">

                             <div class="form-row">

                                <div class="form-group col-2 col-sm-3 m-0">
                                <label for="" class="m-0 pl-2"> <strong>Rut Proveedor</strong> </label>
                                <input type="text" name="rutProv" id="rutProv" class="form-control form-control-sm font-weight-bolder" v-model="rutProv" placeholder="" aria-describedby="helpId" disabled readonly>
                                <small id="helpId" class="text-muted sr-only">Help text</small>
                                </div>
                                <div class="form-group col col-sm-9 m-0">
                                <label for="" class="m-0 pl-2"> <strong>Nombre Proveedor</strong>  </label>
                                
                                  <input type="text" name="provnombre" id="provnombre" class="form-control form-control-sm font-weight-bolder" placeholder="" v-model="provnombre" aria-describedby="helpId" disabled readonly>
                                  <small id="helpId" class="text-muted sr-only">Help text</small>
                                
                                <!-- <select  class="form-control form-control-sm font-weight-bolder" name="idprov" id="idprov" v-model="idprov" >
                                    <template v-if="setNameProv && setNameProv.length">
                                        <option v-for="(NameProv, index) of setNameProv" :key="index" v-bind:value="NameProv.id">{{NameProv.nombre}}</option>
                                    </template>
                                </select> -->
                                </div> 
                                

                             </div>

                             <div class="form-row">
                                <div class="form-group col-3 m-0">
                                <label for="" class="m-0 pl-2"> <strong>N° Factura</strong> </label>
                                <input type="text" name="numFactura" id="numFactura" class="form-control form-control-sm font-weight-bolder" v-model.number="numFactura" placeholder="" aria-describedby="helpId" disabled readonly>
                                <small id="helpId" class="text-muted sr-only">Help text</small>
                                </div>
                                <div class="form-group col-3 m-0">
                                <label for="" class="m-0 pl-2"> <strong>Precio Costo</strong> </label>
                                <input type="text" name="pCosto" id="pCosto" class="form-control form-control-sm font-weight-bolder"  v-model.number="pCosto" placeholder="" aria-describedby="helpId" disabled readonly>
                                <small id="helpId" class="text-muted sr-only">Help text</small>
                                </div>
                                <div class="form-group col-3 m-0">
                                <label for="" class="m-0 pl-2"> <strong>Descuento 1</strong> </label>
                                <input type="text" name="desc1" id="desc1" class="form-control form-control-sm font-weight-bolder" v-model.number="desc1" placeholder="" aria-describedby="helpId" disabled readonly>
                                <small id="helpId" class="text-muted sr-only">Help text</small>
                                </div>
                                <div class="form-group col-3 m-0">
                                <label for="" class="m-0 pl-2"> <strong>Descuento 2</strong> </label>
                                <input type="text" name="desc2" id="desc2" class="form-control form-control-sm font-weight-bolder" v-model.number="desc2" placeholder="" aria-describedby="helpId" disabled readonly>
                                <small id="helpId" class="text-muted sr-only">Help text</small>
                                </div>
                                <div class="form-group col-3 m-0">
                                <label for="" class="m-0 pl-2"> <strong>Flete</strong> </label>
                                <input type="text" name="flete" id="flete" class="form-control form-control-sm font-weight-bolder" v-model.number="flete" placeholder="" aria-describedby="helpId" disabled readonly>
                                <small id="helpId" class="text-muted sr-only">Help text</small>
                                </div>
                                <div class="form-group col-3 m-0">
                                <label for="" class="m-0 pl-2"> <strong>Precio Final</strong> </label>
                                <input type="text" name="pFinal" id="pFinal" class="form-control form-control-sm font-weight-bolder" v-model.number="pFinal" placeholder="" aria-describedby="helpId" @keyup.enter="onPFinal" disabled readonly>
                                <small id="helpId" class="text-muted sr-only">Help text</small>
                                </div>
                                <div class="form-group col-3 m-0">
                                    <div class="custom-control custom-switch m-4"> <!-- busca que me de un boleano -->
                                        <input type="checkbox" class="custom-control-input" id="activo" name="activo" v-model="activo">
                                        <label class="custom-control-label" for="activo"><strong> Activar</strong></label>
                                    </div>
                                </div>

                            </div>

                            <table v-if="activo" class="table table-sm table-bordered justify-content-center">
                                <thead class="thead-dark">
                                    <tr>
                                    <th class="p-0 text-center align-middle"></th>
                                    <th class="p-0 text-center align-middle" >Margen <small>(%)</small></th>
                                    <th class="p-0 text-center align-middle">Utilidad</th>
                                    <th class="p-0 text-center align-middle">Neto</th>
                                    <th class="p-0 text-center align-middle">IVA</th>
                                    <th class="p-0 text-center align-middle">Precio Venta</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td scope="row" class="table-active p-0 text-center align-middle"> <strong>Meson</strong> </td>
                                    <td class="p-0"><input class="form-control-sm text-center font-weight-bolder form-control-plaintext" type="numbrer" id="p1Margen" name="p1Margen" v-model.number="p1Margen"  @keyup.enter="onP1Margen"></td>
                                    <td class="p-0"><input class="form-control-sm text-center font-weight-bolder form-control-plaintext" type="numbrer" id="p1Utilidad" name="p1Utilidad" v-model.number="p1Utilidad"  readonly></td>
                                    <td class="p-0"><input class="form-control-sm text-center font-weight-bolder form-control-plaintext" type="numbrer" id="p1Neto" name="p1Neto" v-model.number="p1Neto"  readonly></td>
                                    <td class="p-0"><input class="form-control-sm text-center font-weight-bolder form-control-plaintext" type="numbrer" id="p1Neto" name="p1Neto" v-model.number="p1iva"  readonly></td>
                                    <td class="p-0"><input class="form-control-sm text-center font-weight-bolder form-control-plaintext" type="numbrer" id="p1PrecioV" name="p1PrecioV" v-model.number="p1PrecioV"  @change="onP1PrecioV" ></td>
                                    </tr>
                                    <tr>
                                    <td scope="row" class="table-active p-0 text-center align-middle"> <strong> Mayorista</strong></td>
                                    <td class="p-0"><input class="form-control-sm text-center font-weight-bolder form-control-plaintext" type="numbrer" id="p2Margen" name="p2Margen" v-model.number="p2Margen"  @keyup.enter="onP2Margen"></td>
                                    <td class="p-0"><input class="form-control-sm text-center font-weight-bolder form-control-plaintext" type="numbrer" id="p2Utilidad" name="p2Utilidad" v-model.number="p2Utilidad"  readonly></td>
                                    <td class="p-0"><input class="form-control-sm text-center font-weight-bolder form-control-plaintext" type="numbrer" id="p2Neto" name="p2Neto" v-model.number="p2Neto"   readonly></td>
                                    <td class="p-0"><input class="form-control-sm text-center font-weight-bolder form-control-plaintext" type="numbrer" id="p2Neto" name="p2Neto" v-model.number="p2iva"   readonly></td>
                                    <td class="p-0"><input class="form-control-sm text-center font-weight-bolder form-control-plaintext" type="numbrer" id="p2PrecioV" name="p2PrecioV" v-model.number="p2PrecioV"  @change="onP2PrecioV"></td>
                                    </tr>
                                    <tr>
                                    <td scope="row" class="table-active p-1 text-center align-middle"> <strong>Distribucion</strong> </td>
                                    <td class="p-0"><input class="form-control-sm text-center font-weight-bolder form-control-plaintext" type="numbrer" id="p3Margen" name="p3Margen" v-model.number="p3Margen"  @keyup.enter="onP3Margen"></td>
                                    <td class="p-0"><input class="form-control-sm text-center font-weight-bolder form-control-plaintext" type="numbrer" id="p3Utilidad" name="p3Utilidad"  v-model.number="p3Utilidad"  readonly></td>
                                    <td class="p-0"><input class="form-control-sm text-center font-weight-bolder form-control-plaintext" type="numbrer" id="p3Neto" name="p3Neto" v-model.number="p3Neto"  readonly></td>
                                    <td class="p-0"><input class="form-control-sm text-center font-weight-bolder form-control-plaintext" type="numbrer" id="p2Neto" name="p2Neto" v-model.number="p3iva"   readonly></td>
                                    <td class="p-0"><input class="form-control-sm text-center font-weight-bolder form-control-plaintext" type="numbrer" id="p3PrecioV" name="p3PrecioV" v-model.number="p3PrecioV"  @change="onP3PrecioV"></td>
                                    </tr>
                                </tbody>
                            </table>



                        </div>

                    </div>
                    </fieldset>
                    </form>
                </div>

            </div>
        </div>

    </div>

 <!-- <pre class="bg-secondary">{{ $data }}</pre> -->
 
    
 
</div> 
</template>

<script>

export default {
    props: ['prod', 'prodv'],
    data() {
        return {
            slug: null,
            codinterno: null,
            barcode: null,
            nombre: null,
            descripcion: null,
            imagen: null,
            file: null,
            file_name: null,
            unidad: null,
            marca: null,
            linea: null,
            familia: null,
            activo: 0,
            disabled: true,
            prod_id: null, 
            even: null,
            rutProv: null,
            provnombre: null,
            nameProv: null,
            numFactura: null,
            idprov: null,
            nfactura: null,
            pCosto: 0,
            desc1: 0,
            desc2: 0,
            flete: 0,
            pFinal: 0,
            p1Margen: 0,
            p1Utilidad: 0,
            p1Neto: 0,
            p1iva: 0,
            p1PrecioV: 0,
            p2Margen: 0,
            p2Utilidad: 0,
            p2Neto: 0,
            p2iva: 0,
            p2PrecioV: 0,
            p3Margen: 0,
            p3Utilidad: 0,
            p3Neto: 0,
            p3iva: 0,
            p3PrecioV: 0,
            setNameProv: [],
            setunidades: [],
            setmarcas: [],
            setlineas: [],
            setfamilias: [],
            setPrecio: {}
        }
    },
    mounted() {
        console.log('Componente Nuevo Producto');
        this.getUnidad();
        this.getMarca();
        this.getLineas();
        console.log(this.prod)
        console.log(this.prodv)
        this.getProd();
  
        this.getPrecVenta();
        
    },
    watch: {

        linea(val){
             var uURL = '/api/familias/linea/' + val ;
             axios.get(uURL)
            .then(response => {
            // JSON responses are automatically parsed.
            this.setfamilias = response.data
            })
            .catch(e => {
                console.log(e);
            })
        },
        activo(val){
            if (val) {
                this.activo = 1;
            } else {
                this.activo = 0;
            }
        },
        // rutProv(val){
        //      var uURL = '/admin/proveedor/api/name/' + val ;
        //      axios.get(uURL)
        //     .then(response => {
        //     // JSON responses are automatically parsed.
        //     this.setNameProv = response.data;
        //     })
        //     .catch(e => {
        //       console.log(e);
        //     })
            
        // },
        codinter(val){
          console.log(val);
        },
        p1PrecioV(val){
            this.p1Neto  = Math.round(val / 1.19);
            this.p1iva = Math.round(this.p1Neto * 0.19)
            this.p1Utilidad = Math.round(this.p1Neto - this.pCosto);
            this.p1Margen = ((this.p1Neto * 100) / this.pFinal - 100).toFixed(2);

            // this.p1Neto = this.p1Neto.toFixed(0);
            // this.p1Utilidad = this.p1Utilidad.toFixed(0);
            // this.p1Margen = this.p1Margen.toFixed(2);
        },
        p2PrecioV(val){
            this.p2Neto  = Math.round(val / 1.19);
            this.p2iva = Math.round(this.p2Neto * 0.19)
            this.p2Utilidad = Math.round(this.p2Neto - this.pCosto);
            this.p2Margen = ((this.p2Neto * 100) / this.pFinal - 100).toFixed(2);

            // this.p2Neto = this.p2Neto.toFixed(0);
            // this.p2Utilidad = this.p2Utilidad.toFixed(0);
            // this.p2Margen = this.p2Margen.toFixed(2);
        },
        p3PrecioV(val){
            this.p3Neto  = Math.round(val / 1.19);
            this.p3iva = Math.round(this.p3Neto * 0.19)
            this.p3Utilidad = Math.round(this.p3Neto - this.pCosto);
            this.p3Margen = ((this.p3Neto * 100) / this.pFinal - 100).toFixed(2);

            // this.p3Neto = this.p3Neto.toFixed(0);
            // this.p3Utilidad = this.p3Utilidad.toFixed(0);
            // this.p3Margen = this.p3Margen;
        }

       
    },
    methods: {
        
        getProd() {
            //let myProd = JSON.parse(this.prod);
            //console.log(myProd);
            // console.log(myobj.barcode);

            this.codinterno = this.prod.codinterno;
            this.barcode = this.prod.barcode;
            this.nombre = this.prod.nombre;
            this.descripcion = this.prod.descripcion;
            this.unidad = this.prod.unidad;
            this.marca = this.prod.marca;
            this.linea = this.prod.linea;
            this.familia = this.prod.familia;
            if (this.prod.imagen !=  null){
                 this.imagen = '/uploads/' + this.prod.imagen;
            }
            this.activo = this.prod.activo;
            this.slug = this.prod.slug;

        },
        getPrecVenta() {
            
            
            this.rutProv = this.getProvedorRut(this.prodv.prov_id);
            // this.provnombre = this.prodv.prov_nombre;
            this.numFactura = this.prodv.nfactura;
            this.pCosto = this.prodv.pcosto;
            this.desc1 = this.prodv.desct1;
            this.desc2 = this.prodv.desct2;
            this.flete =  this.prodv.flete;
            this.pFinal = this.prodv.costotot;

            
            this.p1Neto =  Math.round(this.prodv.p1_neto);
            this.p1PrecioV =  Math.round(this.prodv.p1_venta);
            
            this.p2Neto =  Math.round(this.prodv.p2_neto);
            this.p2PrecioV =  Math.round(this.prodv.p2_venta);

            this.p3Neto =  Math.round(this.prodv.p3_neto);
            this.p3PrecioV =  Math.round(this.prodv.p3_venta);

        },
        getProvedorRut(val){
            var cURL = '/api/proveedores/id/' + val;
            axios.get(cURL)
            .then(res => {
                this.rutProv = res.data[0].rut;
                this.provnombre = res.data[0].nombre;
                console.log(res);
            })
            .catch(e => {
                console.log(e);
            })
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
        //  createProd(){
        //      console.log("Crear producto");
        //       let formData = new FormData();
        //       formData.append('imagen', this.imagen);
        //       formData.append('file', this.file_name);
        //       formData.append('name', this.file);
        //       console.log('>>> formData >>>', formData);
        //      axios.post('/admin/producto/store',
        //         formData,{
        //         headers: {
        //             'enctype': 'multipart/form-data'
        //         }
        //     }) 
        //     .then(function(res){
        //         console.log(res)
        //     })
        //     .catch(function(err){
        //         console.log(err)
        //     });
        //  },
        createProd(){
             console.log("Crear producto");
              //uURL = '/admin/producto/create'
             axios.post('/admin/producto/store', {
                 codinterno: this.codinterno,
                 barcode: this.barcode,
                 nombre: this.nombre,
                 descripcion: this.descripcion,
                 linea: this.linea,
                 familia: this.familia,
                 marca: this.marca,
                 //imagen: this.file,
                 //img: this.imagen,
                 unidad: this.unidad,
                 activo: this.activo   
            }
            // {
            //     headers: {
            //         'enctype': 'multipart/form-data'
            //     }
            // }
            )
            .then((response) => {
            
              console.log(response);
              this.prod_id = response.data;
              console.log(this.prod_id['idprod']);
              this.createVentProd();

            })
            .catch(function(err){
                console.log(err)
            });

            
        },
        onFileChange(e) {
            
            this.file_name = this.$refs.file.files[0];
            //this.file_name = e;
            console.log(this.file_name);
            console.log(e);
            let files = e.target.files || e.dataTransfer.files;
            if (!files.length)
                return;
            this.file = e.target.files[0];
            this.createImage(files[0]);
        },
        createImage(file) {
           
            let reader = new FileReader();
            let vm = this;
            
            reader.onload = (e) => {
                console.log(e);
                vm.imagen = e.target.result;
            };
            reader.readAsDataURL(file);
        },
        onP1Margen(){

            this.p1Margen = this.p1Margen.toFixed(2)
            let mag = this.p1Margen / 100 ;
            this.p1Neto = this.pFinal * (1 + mag);
            this.p1Utilidad = this.pFinal * mag;
            this.p1PrecioV = this.p1Neto * 1.19;

            this.p1Utilidad = this.p1Utilidad.toFixed(0);
            this.p1Neto = this.p1Neto.toFixed(0);
            this.p1PrecioV = this.p1PrecioV.toFixed(0)
                    
        },
        onP1PrecioV(){

            this.p1Neto  = this.p1PrecioV / 1.19;
            this.p1Utilidad = this.p1Neto - this.pCosto;
            this.p1Margen = (this.p1Neto * 100) / this.pFinal - 100;

            this.p1Neto = this.p1Neto.toFixed(0);
            this.p1Utilidad = this.p1Utilidad.toFixed(0);
            this.p1Margen = this.p1Margen.toFixed(2);

        },
        onPFinal()  {

            if (this.desc1 > 0){
                var des1 = new Number(this.pCosto * (this.desc1 / 100));
            } else {
                var des1 = 0;
            }
            if (this.desc1 > 0 && this.desc2 > 0){
                var des2 = new Number(this.pCosto * (this.desc2 / 100));
            } else {
                var des2 = 0;
            }
            if (this.flete > 0){

                var flet  = new Number(this.flete);
                
            } else {

                var flet = new Number(0);
            }
            
            var des3 = new Number(des1 + des2);

            this.pFinal = new Number((this.pCosto - des3) + flet);
            console.log(des1 + ' ' + des2 + ' ' + flet + ' ' + des3);

        },
        onP2Margen() {

            this.p2Margen = this.p2Margen.toFixed(2);
            let mag = this.p2Margen / 100 ;
            this.p2Neto = this.pFinal * (1 + mag);
            this.p2Utilidad = this.pFinal * mag;
            this.p2PrecioV = this.p2Neto * 1.19;

            this.p2Utilidad = this.p2Utilidad.toFixed(0);
            this.p2Neto = this.p2Neto.toFixed(0);
            this.p2PrecioV = this.p2PrecioV.toFixed(0);

        },
        onP2PrecioV() {

            this.p2Neto  = this.p2PrecioV/ 1.19;
            this.p2Utilidad = this.p2Neto - this.pCosto;
            this.p2Margen = (this.p2Neto * 100) / this.pFinal - 100;

            this.p2Neto = this.p2Neto.toFixed(0);
            this.p2Utilidad = this.p2Utilidad.toFixed(0);
            this.p2Margen = this.p2Margen.toFixed(2);

        },
        onP3Margen() {

            this.p3Margen = this.p3Margen.toFixed(2)
            let mag = this.p3Margen / 100 ;
            this.p3Neto = this.pFinal * (1 + mag);
            this.p3Utilidad = this.pFinal * mag;
            this.p3PrecioV = this.p3Neto * 1.19;

            this.p3Utilidad = this.p3Utilidad.toFixed(0);
            this.p3Neto = this.p3Neto.toFixed(0);
            this.p3PrecioV = this.p3PrecioV.toFixed(0)

        },
        onP3PrecioV() {

            this.p3Neto  = this.p3PrecioV/ 1.19;
            this.p3Utilidad = this.p3Neto - this.pCosto;
            this.p3Margen = (this.p3Neto * 100) / this.pFinal - 100;

            this.p3Neto = this.p3Neto.toFixed(0);
            this.p3Utilidad = this.p3Utilidad.toFixed(0);
            this.p3Margen = this.p3Margen.toFixed(2);
          
        },
        createVentProd() {

            console.log("Crear Precio de Producto");
            console.log(this.prod_id);
            //uURL = '/admin/producto/create'
            axios.post('/admin/precioVenta/store', {

                prod_id: this.prod_id,
                prov_id: this.idprov, 
                nfactura: this.numFactura,
                pcosto: this.pCosto,
                desct1: this.desc1,
                desct2: this.desc2,
                flete: this.flete,
                costotot: this.pFinal,
                p1_neto: this.p1Neto,
                p1_venta: this.p1PrecioV,
                p2_neto: this.p2Neto,
                p2_venta: this.p2PrecioV,
                p3_neto: this.p3Neto,
                p3_venta: this.p3PrecioV
                
            })
            .then((res) => {
                console.log(res)
            })
            .catch((err) => {
                console.log(err)
            });

        },
        onSubmit() {
            //console.log("Hola Mundo Nose ")
            alert('Se Actualizara el Producto ' + this.nombre);
            // return document.getElementById('frm').submit();
            return $(this.$refs.frm).submit()
        },
        onSubmitUpdate() {

            let mi = this
                       
            axios.put('/admin/productos/' + mi.slug, {
                
                barcode: mi.barcode,
                nombre: mi.nombre,
                descripcion: mi.descripcion,
                unidad: mi.unidad,
                marca: mi.marca,
                linea: mi.linea,
                familia: mi.familia,
                activo: mi.activo,
                p1_neto: mi.p1Neto,
                p1_venta: mi.p1PrecioV,
                p2_neto: mi.p2Neto,
                p2_venta: mi.p2PrecioV,
                p3_neto: mi.p3Neto,
                p3_venta: mi.p3PrecioV
            })
            .then( res => {
                console.log(res.data)
                mi.disabled =  true
            })
            .catch( err => {
                console.error(err)
            })
        }
    }

}
</script>

<style>

</style>
