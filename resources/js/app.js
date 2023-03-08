import './bootstrap';
import { createApp } from 'vue';

const app = createApp({});

import Polyheader from './components/Polyheader.vue'
import Dashboard from './components/Dashboard.vue'
import CreateGroup from './components/CreateGroup.vue'
import CreatePlan from './components/CreatePlan.vue'
import JoinPlan from './components/JoinPlan.vue'

app
.component('polyheader', Polyheader)
.component('dashboard', Dashboard)
.component('creategroup', CreateGroup)
.component('createplan', CreatePlan)
.component('joinplan', JoinPlan)

app.mount("#app")