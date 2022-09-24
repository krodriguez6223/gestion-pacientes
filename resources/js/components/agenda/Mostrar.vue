<template>
    <div class="row">
        <div class="col-12 mb-2 text-end">
            <router-link :to='{name:"agregarAgenda"}' class="btn btn-primary">Crear</router-link>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Lista de agendamiento</h4>
                </div>
                <div class="card-body">
                    <div class="table responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Paciente</th>
                                    <th>Sintomas</th>
                                    <th>Departamento</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody v-if="agendas.length > 0">
                                <tr v-for="(agenda,key) in agendas" :key="key">
                                    <td>{{ agenda.id }}</td>
                                    <td>{{ agenda.fecha }}</td>
                                    <td>{{ agenda.hora}}</td>
                                    <td>{{ agenda.paciente_id }}</td>
                                    <td>{{ agenda.sintomas}}</td>
                                    <td>{{ agenda.departamento}}</td>

                                    <td>
                                        <!--<router-link :to='{ name:"actualizarAgenda" , params:{ id:agenda.id } }' class="btn btn-success m-1">Editar</router-link>-->

                                        <button type="button" @click="deleteagenda(agenda.id)" class="btn btn-danger">Eliminar</button>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td colspan="4" align="center">sin registros.</td>
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
    name:"agendas",
    data(){
        return{
            agendas:[]
        }
    },
    mounted(){
        this.getagendas()
    },
    methods:{
        async getagendas(){
            await this.axios.get('/api/agenda').then(response=>{
                this.agendas = response.data
            }).catch(error=>{
                console.log(error)
                this.agendas = []
            })
        },
        deleteagenda(id){
            if(confirm("Realmente desea eliminar la agenda de este paciente ?")){
                this.axios.delete('/api/agenda/'+id).then(response=>{
                    this.getagendas()
                }).catch(error=>{
                    console.log(error)
                })
            }
        }
    }
}

</script>