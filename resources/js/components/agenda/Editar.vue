<template>
    <div class="row">
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <h4>Actualizar agenda</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="update">
                        <div class="mb-3">
                            <label class="form-label">Fecha</label>
                            <input
                                type="date"
                                class="form-control"
                                v-model="agenda.fecha"
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Hora</label>
                            <input
                                type="time"
                                class="form-control"
                                v-model="agenda.hora"
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Sintomas</label>
                            <textarea
                                class="form-control"
                                v-model="agenda.sintomas"
                                rows="3"
                            >
                            </textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Departamento</label>
                            <input
                                type="text"
                                class="form-control"
                                v-model="agenda.departamento"
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Paciente</label>
                            <v-select 
                                :options="agenda.paciente" 
                                v-model="agenda.paciente_id"
                                :reduce="(paciente) => agenda.paciente.id" label="paciente.nombres"  />
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
   
   name:"actualizar-agenda",
    data(){
        return{
            agenda:{
                fecha: "",
                hora: "",
                sintomas: "",
                departamento: "",
                paciente_id:"",
                _method:"patch"
            },
          
        }
    },
    mounted(){
        this.mostraragenda()
    }, 
    methods:{
        async mostraragenda(){
            await this.axios.get('/api/agenda/'+this.$route.params.id).then(response=>{
                const { fecha, hora, sintomas, departamento, paciente_id, nombres} = response.data;
                this.agenda.fecha = fecha;
                this.agenda.hora = hora;
                this.agenda.sintomas = sintomas;
                this.agenda.paciente_id = paciente_id;
                this.agenda.departamento = departamento;
                console.log( response.data);
                
            }).catch(error=>{
                console.log(error)
            })
        },
        async update(){
            await this.axios.post('/api/agenda/'+this.$route.params.id, this.agenda).then(response=>{
                this.$router.push({name:"listaAgenda"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}

</script>
