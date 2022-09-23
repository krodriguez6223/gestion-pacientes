<template>
    <div class="row">
        <div class="col-12 mb-2 text-end">
            <router-link :to='{name:"agregarPaciente"}' class="btn btn-primary">Crear</router-link>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Lista de pacientes</h4>
                </div>
                <div class="card-body">
                    <div class="table responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Cedula</th>
                                    <th>Dirección</th>
                                    <th>Teléfono</th>
                                    <th>Edad</th>
                                    <th>Sexo</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody v-if="pacientes.length > 0">
                                <tr v-for="(paciente,key) in pacientes" :key="key">
                                    <td>{{ paciente.id }}</td>
                                    <td>{{ paciente.nombres }}</td>
                                    <td>{{ paciente.apellidos }}</td>
                                    <td>{{ paciente.cedula}}</td>
                                    <td>{{ paciente.direccion}}</td>
                                    <td>{{ paciente.telefono}}</td>
                                    <td>{{ paciente.edad}}</td>
                                    <td>{{ paciente.sexo}}</td>
                                    <td>
                                        <router-link :to='{ name:"actualizarPaciente" , params:{ id:paciente.id } }' class="btn btn-success m-1">Editar</router-link>

                                        <router-link :to='{ name:"historialPaciente" , params:{ id:paciente.id } }' class="btn btn-info m-1">Historial</router-link>

                                        <button type="button" @click="deletepaciente(paciente.id)" class="btn btn-danger">Eliminar</button>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td colspan="4" align="center">Pacientes no encontrados.</td>
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
    name:"pacientes",
    data(){
        return{
            pacientes:[]
        }
    },
    mounted(){
        this.getpacientes()
    },
    methods:{
        async getpacientes(){
            await this.axios.get('/api/paciente').then(response=>{
                this.pacientes = response.data
            }).catch(error=>{
                console.log(error)
                this.pacientes = []
            })
        },
        deletepaciente(id){
            if(confirm("Realmente desea eliminar este paciente ?")){
                this.axios.delete('/api/paciente/'+id).then(response=>{
                    this.getpacientes()
                }).catch(error=>{
                    console.log(error)
                })
            }
        }
    }
}

</script>