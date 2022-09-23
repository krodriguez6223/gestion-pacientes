import { createWebHistory, createRouter } from 'vue-router';

const Home = () => import('./components/Home.vue');
const AgregarPaciente = () => import('./components/paciente/Agregar.vue');
const ActualizarPaciente = () => import('./components/paciente/Editar.vue');
const ListaPaciente = () => import('./components/paciente/Mostrar.vue');
const historialPaciente = () => import('./components/paciente/Historial.vue');

const routes = [

    {
        name:'home',
        path: '/',
        component: Home
    },
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
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router;