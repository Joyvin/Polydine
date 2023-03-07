import './bootstrap';
import { createApp } from 'vue';

const app = createApp({});

import Polyheader from './components/Polyheader.vue'
import Dashboard from './components/Dashboard.vue'

app
.component('polyheader', Polyheader)
.component('dashboard', Dashboard)

app.mount("#app")