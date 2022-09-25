<template>
    <div class="row">
        <div class="col-12 mb-2 text-end">
            <router-link :to="{ name: 'agregarAgenda' }" class="btn btn-primary"
                >Crear</router-link
            >
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
                                    <th>Cita</th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Paciente</th>
                                    <th>Sintomas</th>
                                    <th>Departamento</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="agenda in agendas.data"
                                    :key="agenda.id"
                                >
                                    <td>{{ agenda.id }}</td>
                                    <td>{{ agenda.fecha }}</td>
                                    <td>{{ agenda.hora }}</td>
                                    <td>{{ agenda.paciente.nombres }}</td>
                                    <td>{{ agenda.sintomas }}</td>
                                    <td>{{ agenda.departamento }}</td>

                                    <td>
                                        <router-link
                                            :to="{
                                                name: 'actualizarAgenda',
                                                params: { id: agenda.id },
                                            }"
                                            class="btn btn-success m-1"
                                            >Editar</router-link
                                        >

                                        <button
                                            type="button"
                                            @click="deleteagenda(agenda.id)"
                                            class="btn btn-danger"
                                        >
                                            Eliminar
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody></tbody>
                        </table>
                        <Pagination
                            :data="agendas"
                            @pagination-change-page="getAgenda"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "agendas",
    data() {
        return {
            agendas: {},
        };
    },
    mounted() {
       
        this.getAgenda();
    },
    methods: {
        async getAgenda(page = 1) {
            await this.axios
                .get("/api/agenda?page=" + page)
                .then((response) => {
                    this.agendas = response.data;
                })
                .catch((error) => {
                    console.log(error);
                    this.agendas = {};
                });
        },

        deleteagenda(id) {
            if (
                confirm("Realmente desea eliminar la agenda de este paciente ?")
            ) {
                this.axios
                    .delete("/api/agenda/" + id)
                    .then((response) => {
                        this.getagendas();
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            }
        },
    },
};
</script>
