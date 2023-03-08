import './bootstrap';
import { createApp } from 'vue';

const app = createApp({});

import Polyheader from './components/Polyheader.vue'
import Dashboard from './components/Dashboard.vue'
import Login from './components/Login.vue'
import Register from './components/Register.vue'

app
.component('polyheader', Polyheader)
.component('dashboard', Dashboard)
.component('register', Register)
.component('login', Login)

app.mount("#app")