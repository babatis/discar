<template>
<div>
    <h1></h1>
    <form enctype="multipart/form-data" method="post" name="fileinfo">
        <div class="custom-file mt-2 mb-2">
            <input type="file" class="custom-file-input" name="file" id="file" ref="file" aria-describedby="fileHelpId" @change="onFileChange" >
            <label class="custom-file-label" for="file" data-browse="Elegir" >{{ file_name ? file_name.name : 'Archivo' }}</label>
        </div>
        <button @click="onStoreVenta()">guardar</button>
        <textarea name="" id="" cols="30" rows="10" v-model="filexml"></textarea>
    </form>

    <table class="table" ref="tablexml">
        <thead>
            <tr>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody ref="tbodyxml">
            <tr>
              
            </tr>
            
        </tbody>
    </table>

    <pre>{{ $data }}</pre>
</div>
</template>

<script>
export default {
    data(){
        return {
            file_name: null,
            filexml: null,
            filejson: null,
            datasource: null,
            dtes: null,
            reader: null,
            xml: null,
            reader: null
        }
    },
    methods: {
        onFileChange(e){
            // this.file_name = this.$refs.file.files[0]
            // console.log(this.file_name)
            // console.log(e.target.files)

            this.file_name = this.$refs.file.files[0]
            //this.file_name = e;
            console.log(this.file_name)
            console.log(e)
            let files = e.target.files || e.dataTransfer.files
            if (!files.length)
                return;
            this.file = e.target.files[0]
            this.ReadFile(files[0])
            // this.parseDoc(this.filexml)
            // this.showDocInTable(this.xml)
            
        },
        ReadFile(file) {

            this.reader = new FileReader()
            
            // return new Promise((ok) => {
            //     reader.readAsText(file)
            //      reader.onloadend = function(){
            //     ok(reader.result)
            //     }
            // })

            // this.reader.readAsXml(file)
            this.reader.onload = (file) => {
                this.filexml = file.target.result
                console.log(file.target.result)
            }

            this.reader.readAsDataURL(file)

            let parser = new DOMParser()
            this.xml = parser.parseFromString(this.filexml, 'text/html')
        },
        parseDoc(rawXML){
           const parser = new DOMParser()
           this.xml = parser.parseFromString(rawXML, 'text/html')

       },
       showDocInTable(xml){
            const table = this.$refs.tbodyxml
            this.datasource = xml
            this.dtes = datasource.querySelectorAll('DTE > Documento')
       },
       onError(reason) {
           console.error(reason)
       },
       onStoreVenta(){
           axios.post('/api/venta/up/xml', {
               file: this.filexml
        //    },
        //    {
        //     headers: {
        //         'Content-Type': 'multipart/form-data'
        //     }
            })
           .then( res => {
               console.log(res)
           })
           .catch( err => {
               console.log(err)
           })
       }

    //    axios.post('https://example.com/postSomething', {
    //     email: varEmail, //varEmail is a variable which holds the email
    //     password: varPassword
    //     },
    //     {
    //     headers: {
    //         Authorization: 'Bearer ' + varToken
    //     }
    //     })

    }
}
</script>

<style>

</style>