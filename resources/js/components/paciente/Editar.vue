<template>
    <div class="row">
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <h4>Actualizar paciente</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="update">
                        <div class="mb-3">
                            <label class="form-label">Nombres</label>
                            <input
                                type="text"
                                class="form-control"
                                v-model="paciente.nombres"
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Apellidos</label>
                            <input
                                type="text"
                                class="form-control"
                                v-model="paciente.apellidos"
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Edad</label>
                            <input
                                type="text"
                                class="form-control"
                                v-model="paciente.edad"
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Sexo</label>
                            <input
                                type="text"
                                class="form-control"
                                v-model="paciente.sexo"
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Dirección</label>
                            <input
                                type="text"
                                class="form-control"
                                v-model="paciente.direccion"
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Cédula</label>
                            <input
                                type="text"
                                class="form-control"
                                v-model="paciente.cedula"
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Teléfono</label>
                            <input
                                type="text"
                                class="form-control"
                                v-model="paciente.telefono"
                            />
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Actualizar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default{
   
   name:"actualizar-paciente",
    data(){
        return{
            paciente:{
                nombres: "",
                apellidos: "",
                edad: "",
                sexo: "",
                direccion: "",
                cedula: "",
                telefono: "",
                _method:"patch"
            }
        }
    },
    mounted(){
        this.mostrarpaciente()
    }, 
    methods:{
        async mostrarpaciente(){
            await this.axios.get('/api/paciente/'+this.$route.params.id).then(response=>{
                const { nombres, apellidos, edad, sexo, direccion, cedula, telefono} = response.data
                this.paciente.nombres = nombres
                this.paciente.apellidos = apellidos
                this.paciente.edad = edad
                this.paciente.sexo = sexo
                this.paciente.direccion = direccion
                this.paciente.cedula = cedula
                this.paciente.telefono = telefono
            }).catch(error=>{
                console.log(error)
            })
        },
        async update(){
            await this.axios.post('/api/paciente/'+this.$route.params.id, this.paciente).then(response=>{
                this.$router.push({name:"listaPaciente"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}

</script>