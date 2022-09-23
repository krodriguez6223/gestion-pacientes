<template>
    <div class="row">
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <h4>Historial del paciente</h4>
                </div>
                <div class="card-body">
                    <div class="table responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Antecedentes</th>
                                    <th>Tratamiento</th>
                                    <th>Enfermedades</th>
                                    <th>Altura</th>
                                    <th>Peso</th>
                                    <th>Temperatura</th>
                                </tr>
                            </thead>
                            <tbody v-if="historiales.length > 0">
                                <tr v-for="(historial,key) in historiales" :key="key">
                                    
                                    <td>{{ historial.id }}</td>
                                    <td>{{ historial.antecedentes }}</td>
                                    <td>{{ historial.tratamiento }}</td>
                                    <td>{{ historial.enfermedades}}</td>
                                    <td>{{ historial.altura}}</td>
                                    <td>{{ historial.peso}}</td>
                                    <td>{{ historial.temperatura}}</td>
                                    <td>

                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td colspan="4" align="center">No tiene historial clinico aun.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name:"historiales",
    data(){
        return{
            historiales:[]
        }
    },
    mounted(){
        this.gethistoriales()
    },
    methods:{
        async gethistoriales(){
            await this.axios.get('/api/historial/'+this.$route.params.id).then(response=>{
                this.historiales = response.data
            }).catch(error=>{
                console.log(error)
                this.historiales = []
            })
        },

    }
}


</script>
