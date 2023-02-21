<template>
  <div>
    <div class="row mt-4 ">
        <div class="col-12">

            <div class="card shadow mb-5 rounded">

                <div class="card-header p-2">
                    <div class="float-left"><P class="h3 m-0"> <strong>Producto</strong> </P></div>
                <div class="float-right">
                    <button type="button" class="btn btn-sm btn-primary " @click="onSubmit" > <strong>Guardar</strong> </button>
                </div>
                </div>

                <div class="card-body">
                   <form method="post" name="forma" id="frm" files="true" enctype="multipart/form-data" action="/admin/productos">
                    <slot></slot>
                    <!-- <div class="row head-card p-3 rounded">
                         <div class="col-12">
                             <div class="row">

                                <div class="col-5 ">
                                    <h2> <strong></strong>  </h2>
                                </div>
                                <div class="col-4 offset-3">
                                    <div class="row justify-content-end align-middle">
                                        
                                        <button type="button" class="btn btn-primary " >Guardar</button>
                                       
                                    </div>
                                </div>

                            </div> 
                        </div>
                    </div> -->
                    <div class="row">

                        <div class="col-6">

                            <div class="row mt-2">

                                <div class="col-6 ">  <!--Seccion de imagen -->

                                    <div class="text-center mx-auto">
                                        <img v-if="imagen" :src="imagen" class="mw-100 mh-100 rounded" alt="" >
                                        <img v-else src="https://via.placeholder.com/150" alt="">
                                    </div>

                                    <div class="custom-file mt-2 mb-2">
                                        <input type="file" class="custom-file-input" name="file" id="file" ref="file" aria-describedby="fileHelpId" @change="onFileChange" accept="image/jpeg, image/png" >
                                        <label class="custom-file-label" for="file" data-browse="Elegir" >{{ file_name ? file_name.name : 'Archivo' }}</label>
                                    </div>

                                </div>

                                <div class="col-6 pt-0">

                                    <div class="form-row">

                                        <div class="form-group col-12 m-0">
                                        <label for="txtinter" class="m-0 pl-2" > <strong>Cod. Interno</strong></label>
                                        <input type="text" class="form-control  form-control-sm  font-weight-bolder" id="codinterno" :class="isSetErrors('codinterno')" name="codinterno" v-model="codinterno" placeholder="">
                                        <div class="invalid-feedback">
                                            {{issetErrorMsg('codinterno')}}
                                        </div>
                                        </div>
                                        <div class="form-group col-12 m-0">
                                        <label for="txtbarcode" class="m-0 pl-2"> <strong>Cod. Barra</strong></label>
                                        <input type="text" class="form-control  form-control-sm  font-weight-bolder" :class="isSetErrors('barcode')" id="barcode" name="barcode" v-model="barcode" placeholder="">
                                        <div class="invalid-feedback">
                                            {{issetErrorMsg('barcode')}}
                                        </div>
                                        </div>
                                        <div class="form-group col-12 m-0">
                                        <label for="txtnomprod" class="m-0 pl-2"><strong>Nombre Producto</strong></label>
                                        <input type="text" class="form-control  form-control-sm  font-weight-bolder"  :class="isSetErrors('nombre')" id="nombre" name="nombre" v-model="nombre" placeholder="">
                                        <div class="invalid-feedback">
                                           {{issetErrorMsg('nombre')}}
                                        </div>
                                        </div>
                                        <div class="form-group col-12 m-0">
                                        <label for="txtdesprod" class="m-0 pl-2"><strong>Descripcion Producto</strong></label>
                                        <textarea class="form-control  form-control-sm  font-weight-bolder" :class="isSetErrors('descripcion')" id="descripcion" name="descripcion" v-model="descripcion" placeholder=""></textarea>
                                        <div class="invalid-feedback">
                                           {{issetErrorMsg('descripcion')}}
                                        </div>
                                        </div>

                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-12">

                                    <div class="form-row">

                                        <div class="form-group col-3 m-0">
                                            <label for="sel-unidad" class="m-0 pl-2"><strong>U. Medida</strong></label>
                                            <select class="form-control  form-control-sm  font-weight-bolder" :class="isSetErrors('unidad')" id="unidad" name="unidad" v-model="unidad" >
                                            <!-- <option selected>Unidad de Medida </option> -->
                                            <template v-if="setunidades && setunidades.length">
                                                <option  v-for="(setunidad, index) of setunidades" :key="index" v-bind:value="setunidad.code_u">{{setunidad.nombre}} </option>
                                            </template>
                                            </select>
                                        </div>

                                        <div class="form-group col-3 m-0">
                                            <label for="linea" class="m-0 pl-2"><strong>Linea</strong></label>
                                            <select class="form-control  form-control-sm  font-weight-bolder" :class="isSetErrors('linea')"  id="linea" name="linea" v-model="linea">
                                            <template v-if="setlineas && setlineas.length">
                                                <!-- <option selected >Linea ...</option> -->
                                                <option  v-for="(setlinea, index) of setlineas" :key="index" v-bind:value="setlinea.code_l">{{setlinea.nombre}} </option>
                                            </template>
                                            </select>
                                        </div>

                                        <div class="form-group col-3 m-0">
                                            <label for="familia" class="m-0 pl-2"><strong>Familia</strong></label>
                                            <select class="form-control  form-control-sm  font-weight-bolder" :class="isSetErrors('familia')"  id="familia" name="familia" v-model="familia" >
                                            <!-- <option selected >Familia ...</option> -->
                                            <template v-if="setfamilias && setfamilias.length">
                                                <option  v-for="(setfamilia, index) of setfamilias" :key="index" v-bind:value="setfamilia.code_f">{{setfamilia.nombre}} </option>
                                            </template>
                                            </select>
                                        </div>

                                        <div class="form-group col-3 m-0">
                                            <label for="marca" class="m-0 pl-2"><strong>Marca</strong></label>
                                            <select class="form-control  form-control-sm  font-weight-bolder" :class="isSetErrors('marca')"  id="marca" name="marca" v-model="marca">
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
                                <input type="text" name="rutProv" id="rutProv" class="form-control  form-control-sm  font-weight-bolder" :class="isSetErrors('rutProv')" v-model="rutProv" placeholder="" aria-describedby="helpId">
                                <small id="helpId" class="text-muted sr-only">Help text</small>
                                </div>
                                <div class="form-group col col-sm-9 m-0">
                                <label for="" class="m-0 pl-2"> <strong>Nombre Proveedor</strong>  </label>
                                <select  class="form-control  form-control-sm  font-weight-bolder" :class="isSetErrors('idprov')" name="idprov" id="idprov" v-model="idprov" >
                                    <template v-if="setNameProv && setNameProv.length">
                                        <option v-for="(NameProv, index) of setNameProv" :key="index" :value="NameProv.id" selected>{{NameProv.nombre}}</option>
                                    </template>
                                </select>
                                </div>
                                <div class="form-group col-3 m-0">
                                <label for="" class="m-0 pl-2"> <strong>N° Factura</strong></label>
                                <input type="text" name="numFactura" id="numFactura" class="form-control  form-control-sm  font-weight-bolder" :class="isSetErrors('numFactura')" v-model.number="numFactura" placeholder="" aria-describedby="helpId">
                                <small id="helpId" class="text-muted sr-only">Help text</small>
                                </div>
                                <div class="form-group col-3 m-0">
                                <label for="" class="m-0 pl-2"> <strong>Precio Costo</strong></label>
                                <input type="text" name="pCosto" id="pCosto" class="form-control  form-control-sm  font-weight-bolder" :class="isSetErrors('pCosto')"  v-model.number="pCosto" placeholder="" aria-describedby="helpId">
                                <small id="helpId" class="text-muted sr-only">Help text</small>
                                </div>
                                <div class="form-group col-3 m-0">
                                <label for="" class="m-0 pl-2"> <strong>Cantidad</strong></label>
                                <input type="text" name="cantidad" id="cantidad" class="form-control  form-control-sm  font-weight-bolder" :class="isSetErrors('cantidad')" v-model.number="cantidad" placeholder="" aria-describedby="helpId">
                                <small id="helpId" class="text-muted sr-only">Help text</small>
                                </div>
                                <div class="form-group col-3 m-0">
                                <label for="" class="m-0 pl-2"> <strong>Descuento 1</strong></label>
                                <input type="text" name="desc1" id="desc1" class="form-control  form-control-sm  font-weight-bolder" :class="isSetErrors('cdesc1')" v-model.number="desc1" placeholder="" aria-describedby="helpId">
                                <small id="helpId" class="text-muted sr-only">Help text</small>
                                </div>
                             </div>

                             <div class="form-row">

                                <div class="form-group col-3 m-0">
                                <label for="" class="m-0 pl-2"> <strong>Descuento 2</strong></label>
                                <input type="text" name="desc2" id="desc2" class="form-control  form-control-sm  font-weight-bolder" :class="isSetErrors('desc2')" v-model.number="desc2" placeholder="" aria-describedby="helpId">
                                <small id="helpId" class="text-muted sr-only">Help text</small>
                                </div>
                                <div class="form-group col-3 m-0">
                                <label for="" class="m-0 pl-2"> <strong>Flete</strong></label>
                                <input type="text" name="flete" id="flete" class="form-control  form-control-sm  font-weight-bolder" :class="isSetErrors('flete')" v-model.number="flete" placeholder="" aria-describedby="helpId">
                                <small id="helpId" class="text-muted sr-only">Help text</small>
                                </div>
                                <div class="form-group col-3 m-0">
                                <label for="" class="m-0 pl-2"> <strong>Costo Final</strong></label>
                                <input type="text" name="pFinal" id="pFinal" class="form-control  form-control-sm  font-weight-bolder" :class="isSetErrors('pFinal')" v-model.number="pFinal" placeholder="" aria-describedby="helpId" @keyup.enter="onPFinal">
                                <small id="helpId" class="text-muted sr-only">Help text</small>
                                </div>
							    <div class="form-group col-3 m-0">
                                    <div class="custom-control custom-switch m-4"> <!-- busca que me de un boleano -->
                                        <input type="checkbox" class="custom-control-input" id="activo" name="activo" v-model="activo">
                                        <label class="custom-control-label" for="activo"><strong>Activo</strong></label>
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
                                    <tr class="p-0">
                                        <td scope="row" class="table-active p-0 text-center align-middle"> <strong>Meson</strong> </td>
                                        <td class="p-0"><input  type="numbrer" class="form-control-sm text-center font-weight-bolder form-control-plaintext"  id="p1Margen" name="p1Margen" v-model.number="p1Margen" @keyup.enter="onP1Margen()"></td>
                                        <td class="p-0"><input  type="numbrer" class="form-control-sm text-center font-weight-bolder form-control-plaintext"  id="p1Utilidad" name="p1Utilidad" v-model.number="p1Utilidad" readonly></td>
                                        <td class="p-0"><input  type="numbrer" class="form-control-sm text-center font-weight-bolder form-control-plaintext"  id="p1Neto" name="p1Neto" v-model.number="p1Neto" readonly></td>
                                        <td class="p-0"><input  type="numbrer" class="form-control-sm text-center font-weight-bolder form-control-plaintext"  id="p1Iva" name="p1Iva" v-model.number="p1iva" readonly></td>
                                        <td class="p-0"><input  type="numbrer" class="form-control-sm text-center font-weight-bolder form-control-plaintext"  id="p1PrecioV" name="p1PrecioV" v-model.number="p1PrecioV" @keyup.enter="onP1PrecioV()" ></td>
                                    </tr>
                                    <tr class="p-0">
                                        <td scope="row" class="table-active p-0 text-center align-middle"> <strong>Mayorista</strong> </td>
                                        <td class="p-0"><input  type="numbrer" class="form-control-sm text-center font-weight-bolder form-control-plaintext"  id="p2Margen" name="p2Margen" v-model.number="p2Margen" @keyup.enter="onP2Margen()"></td>
                                        <td class="p-0"><input  type="numbrer" class="form-control-sm text-center font-weight-bolder form-control-plaintext"  id="p2Utilidad" name="p2Utilidad" v-model.number="p2Utilidad" readonly></td>
                                        <td class="p-0"><input  type="numbrer" class="form-control-sm text-center font-weight-bolder form-control-plaintext"  id="p2Neto" name="p2Neto" v-model.number="p2Neto"  readonly></td>
                                        <td class="p-0"><input  type="numbrer" class="form-control-sm text-center font-weight-bolder form-control-plaintext"  id="p2Iva" name="p2Iva" v-model.number="p2iva" readonly></td>
                                        <td class="p-0"><input  type="numbrer" class="form-control-sm text-center font-weight-bolder form-control-plaintext"  id="p2PrecioV" name="p2PrecioV" v-model.number="p2PrecioV" @keyup.enter="onP2PrecioV()"></td>
                                    </tr>
                                    <tr class="p-0">
                                        <td scope="row" class="table-active p-1 text-cente align-middle"> <strong>Distribucion</strong> </td>
                                        <td class="p-0"><input  type="numbrer" class="form-control-sm text-center font-weight-bolder form-control-plaintext"  id="p3Margen" name="p3Margen" v-model.number="p3Margen" @keyup.enter="onP3Margen()"></td>
                                        <td class="p-0"><input  type="numbrer" class="form-control-sm text-center font-weight-bolder form-control-plaintext"  id="p3Utilidad" name="p3Utilidad"  v-model.number="p3Utilidad" readonly></td>
                                        <td class="p-0"><input  type="numbrer" class="form-control-sm text-center font-weight-bolder form-control-plaintext"  id="p3Neto" name="p3Neto" v-model.number="p3Neto" readonly></td>
                                        <td class="p-0"><input  type="numbrer" class="form-control-sm text-center font-weight-bolder form-control-plaintext"  id="p1Iva" name="p1Iva" v-model.number="p3iva" readonly></td>
                                        <td class="p-0"><input  type="numbrer" class="form-control-sm text-center font-weight-bolder form-control-plaintext"  id="p3PrecioV" name="p3PrecioV" v-model.number="p3PrecioV" @keyup.enter="onP3PrecioV()"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="alert alert-dark" role="alert">
        <pre>{{this.errors}}</pre>
        <br>
        <pre v-if="this.errors">{{this.errors['codinterno']}}</pre>
        <br>
        <pre>{{this.olds}}</pre>
    </div> -->

    <!-- <div class="alert alert-dark" role="alert">
        <pre>{{$data}}</pre>
    </div> -->



    <!-- <div class="row">
        <div class="col">
            <prod-almacen-add></prod-almacen-add>
        </div>
        <div class="col">
            <prod-detalle-add></prod-detalle-add>
        </div>
    </div>    -->

</div>
</template>

<script>

export default {
    props: ['errors', 'olds'],
    data() {
        return {
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
            prod_id: null,
            even: null,
            rutProv: null,
            nameProv: null,
            numFactura: null,
            idprov: null,
            nfactura: null,
            activo: null,
            pCosto: null,
            cantidad: null,
            desc1: 0,
            desc2: 0,
            flete: 0,
            pFinal: null,
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
            setfamilias: []
        }
    },
    mounted() {

        console.log('Componente Nuevo Producto');
        this.getUnidad();
        this.getMarca();
        this.getLineas();
        this.getOlds();

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
        rutProv(val){
             var uURL = '/api/proveedores/name/' + val ;
             axios.get(uURL)
            .then(response => {
            // JSON responses are automatically parsed.
            this.setNameProv = response.data;
            // console.log(this.setNameProv)
            })
            .catch(e => {
              this.setNameProv = 'no';  
              console.log(e);
            })

        },
        codinter(val){
          console.log(val);
        }

    },
    methods: {
        getOlds(){
             if(this.olds != null){
                console.log(this.olds)
                this.codinterno = this.olds['codinterno'];
                this.barcode = this.olds['barcode'];
                this.nombre = this.olds['nombre'];
                this.descripcion = this.olds['descripcion'];
                this.unidad = this.olds['unidad'];
                this.linea = this.olds['linea'];
                this.familia = this.olds['familia'];
                this.marca = this.olds['marca'];
                this.rutProv = this.olds['rutProv'];
                this.idprov = this.olds['idprov'];
                this.numFactura = this.olds['numFactura'];
                this.pCosto = this.olds['pCosto'];
                this.cantidad =this.olds['cantidad'];
                this.desc1 = this.olds['desc1'];
                this.desc2 = this.olds['desc2'];
                this.flete = this.olds['flete'];
                this.pFinal = this.olds['pFinal'];
                this.activo = this.olds['activo'];
                this.p1Margen = this.olds['p1Margen'];
                this.p1Utilidad = this.olds['p1Utilidad'];
                this.p1Neto = this.olds['p1Neto'];
                this.p1PrecioV = this.olds['p1PrecioV'];
                this.p2Margen = this.olds['p2Margen'];
                this.p2Utilidad = this.olds['p2Margen'];
                this.p2Neto = this.olds['p2Neto'];
                this.p2PrecioV = this.olds['p2PrecioV'];
                this.p3Margen = this.olds['p3Margen'];
                this.p3Utilidad = this.olds['p3Utilidad'];
                this.p3Neto = this.olds['p3Neto'];
                this.p3PrecioV = this.olds['p3PrecioV'];
                createImage( this.olds['imagen']);
             }
        },
        issetErrorMsg(name){
             if(this.errors != null){
                if(this.errors[name]){
                    return this.errors[name].toString()
                }
            } else {
                return ''
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
            this.p1Neto = Math.round(this.pFinal * (1 + mag));
            this.p1Utilidad = Math.round(this.pFinal * mag);
            this.p1iva = Math.round(this.p1Neto * 0.19);
            this.p1PrecioV = Math.round(this.p1Neto * 1.19);

            // this.p1Utilidad = this.p1Utilidad.toFixed(0);
            // this.p1Neto = this.p1Neto.toFixed(0);
            // this.p1PrecioV = this.p1PrecioV.toFixed(0)

        },
        onP1PrecioV(){

            this.p1Neto  = Math.round(this.p1PrecioV / 1.19);
            this.p1iva = Math.round(this.p1Neto * 0.19);
            this.p1Utilidad = Math.round(this.p1Neto - this.pCosto);
            this.p1Margen = Math.round((this.p1Neto * 100) / this.pFinal - 100);

            // this.p1Neto = this.p1Neto.toFixed(0);
            // this.p1Utilidad = this.p1Utilidad.toFixed(0);
            // this.p1Margen = this.p1Margen.toFixed(2);

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
            this.p2Neto = Math.round(this.pFinal * (1 + mag));
            this.p2iva = Math.round(this.p2Neto * 0.19);
            this.p2Utilidad = Math.round(this.pFinal * mag);
            this.p2PrecioV = Math.round(this.p2Neto * 1.19);

            // this.p2Utilidad = this.p2Utilidad.toFixed(0);
            // this.p2Neto = this.p2Neto.toFixed(0);
            // this.p2PrecioV = this.p2PrecioV.toFixed(0);

        },
        onP2PrecioV() {

            this.p2Neto  = Math.round(this.p2PrecioV / 1.19);
            this.p2iva = Math.round(this.p2Neto * 0.19);
            this.p2Utilidad = Math.round(this.p2Neto - this.pCosto);
            this.p2Margen = Math.round((this.p2Neto * 100) / this.pFinal - 100);

            // this.p2Neto = this.p2Neto.toFixed(0);
            // this.p2Utilidad = this.p2Utilidad.toFixed(0);
            // this.p2Margen = this.p2Margen.toFixed(2);

        },
        onP3Margen() {

            this.p3Margen = this.p3Margen.toFixed(2)
            let mag = this.p3Margen / 100 ;
            this.p3Neto = Math.round(this.pFinal * (1 + mag));
            this.p3iva = Math.round(this.p3Neto *0.19);
            this.p3Utilidad = Math.round(this.pFinal * mag);
            this.p3PrecioV = Math.round(this.p3Neto * 1.19);

            // this.p3Utilidad = this.p3Utilidad.toFixed(0);
            // this.p3Neto = this.p3Neto.toFixed(0);
            // this.p3PrecioV = this.p3PrecioV.toFixed(0)

        },
        onP3PrecioV() {

            this.p3Neto  = Math.round(this.p3PrecioV / 1.19);
            this.p3iva = Math.round(this.p3Neto * 0.19);
            this.p3Utilidad = Math.round(this.p3Neto - this.pCosto);
            this.p3Margen = (this.p3Neto * 100) / this.pFinal - 100;

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
            // alert('Se creara el producto ' + this.nombre);
            // return document.getElementById('frm').submit((res) =>{
            //     console.log(res)
            //     console.log('succes')
            // });
            return document.getElementById('frm').submit();
        }
    }

}
</script>

<style>

</style>
