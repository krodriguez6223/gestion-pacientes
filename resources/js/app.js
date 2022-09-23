import './bootstrap';

//importamos axio
import VueAxios from 'vue-axios';
import axios from 'axios';
import { createApp } from 'vue';


import router from './routes.js';
import App from './components/App.vue';

createApp(App)
     .use(router)
     .use(VueAxios, axios)
     .mount("#app")
   