import { createWebHistory, createRouter } from 'vue-router';

//paciente
const Home = () => import('./components/Home.vue');
const AgregarPaciente = () => import('./components/paciente/Agregar.vue');
const ActualizarPaciente = () => import('./components/paciente/Editar.vue');
const ListaPaciente = () => import('./components/paciente/Mostrar.vue');
const historialPaciente = () => import('./components/paciente/Historial.vue');

//agenda

const agregarAgenda = () => import('./components/agenda/Agregar.vue');
const ActualizarAgenda = () => import('./components/agenda/Editar.vue');
const ListaAgenda = () => import('./components/agenda/Mostrar.vue');


const routes = [

    {
        name:'home',
        path: '/',
        component: Home
    },
    //rutas de Pacientes
    {
        name:'agregarPaciente',
        path:'/paciente/agregar',
        component: AgregarPaciente
    },
    {
        name:'actualizarPaciente',
        path:'/paciente/:id/editar',
        component: ActualizarPaciente
    },
    {
        name: 'listaPaciente',
        path: '/paciente',
        component: ListaPaciente
    },
    {
        name: 'historialPaciente',
        path: '/historial/:id',
        component:historialPaciente
    },
    //rutas de Agenas
    {
        name:'agregarAgenda',
        path:'/agenda/agregar',
        component: agregarAgenda
    },
    {
        name:'actualizarAgenda',
        path:'/agenda/:id/editar',
        component: ActualizarAgenda
    },
    {
        name: 'listaAgenda',
        path: '/agenda',
        component: ListaAgenda
    },

]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router;