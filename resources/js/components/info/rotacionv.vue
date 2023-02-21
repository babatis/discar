<template>
<div>
    <div class="table-responsive-sm">
    <table class="table table-sm table-inverse table-borden table-bordered m-0" style="font-size: 0.9em">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Productos</th>
                <th scope="col">Enero 20</th>
                <th scope="col">Febrero 20</th>
                <th scope="col">Marzo 20</th>
                <th scope="col">Abril 19</th>
                <th scope="col">Mayo 19</th>
                <th scope="col">Junio 19</th>
                <th scope="col">Agosto 19</th>
                <th scope="col">Septiembre 19</th>
                <th scope="col">Octubre 19</th>
                <th scope="col">Noviembre 19</th>
                <th scope="col">Diciembre 19</th>
                <th scope="col">Costo</th>
                <th scope="col">Precio</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(rota, index) of this.rota" :key="index">
                <td scope="row align-middle text-wrap" class="table-active text-left py-0 align-middle"><strong>{{rota.Nombre }}</strong></td>
                <td class="py-0 align-middle">{{rota.Enero_20 | number() }}</td>
                <td class="py-0 align-middle">{{rota.Febrero_20 | number() }}</td>
                <td class="py-0 align-middle">{{rota.Marzo_20 | number() }}</td>
                <td class="py-0 align-middle">{{rota.Abril_19 | number() }}</td>
                <td class="py-0 align-middle">{{rota.Mayo_19 | number() }}</td>
                <td class="py-0 align-middle">{{rota.Junio_19 | number()  }}</td>
                <td class="py-0 align-middle">{{rota.Julio_19 | number() }}</td>
                <td class="py-0 align-middle">{{rota.Agosto_19 | number() }}</td>
                <td class="py-0 align-middle">{{rota.Septiembre_19 | number()}}</td>
                <td class="py-0 align-middle">{{rota.Noviembre_19 | number()}}</td>
                <td class="py-0 align-middle">{{rota.Diciembre_19 | number()}}</td>
                <td class="py-0 align-middle text-right">{{rota.Costo | currency('$', 0, { thousandsSeparator: '.' }) }}</td>
                <td class="py-0 align-middle text-right">{{rota.Precio | currency('$', 0, { thousandsSeparator: '.' }) }}</td>
            </tr>
        </tbody>
    </table>
    </div>
</div>
</template>

<script>
import Vue2Filters from 'vue2-filters'
export default {
    data(){
        return {
            rota: []
        }
    },
    mounted(){
        this.setRotacion()
    },
    mixins: [Vue2Filters.mixin],
    methods: {

        setRotacion(){

            let cURL = '/api/info/rotacion'

            axios.get(cURL)
            .then( res => {
                this.rota = _.cloneDeep(res.data.data)
                console.log(res)
            })
            .catch( err => {
                console.log(err)
            })
        }
    }

}
</script>

<style>

</style>