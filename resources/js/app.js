import './bootstrap';
import { createApp } from 'vue';

const app = createApp({});

import Polyheader from './components/Polyheader.vue'

app
.component('polyheader', Polyheader)

app.mount("#app")