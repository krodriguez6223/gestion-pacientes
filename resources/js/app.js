import "./bootstrap";

import { createApp } from "vue";
import App from "./components/App.vue";

//importamos axio
import VueAxios from "vue-axios";
import axios from "axios";

import router from "./routes.js";

//componente
import vSelect from "vue-select";
import LaravelVuePagination from 'laravel-vue-pagination';

//estilos de componente select
import "vue-select/dist/vue-select.css";

createApp(App)
    .use(router)
    .use(VueAxios, axios)
    .component("v-select", vSelect)
    .component("Pagination", LaravelVuePagination)
    .mount("#app");
