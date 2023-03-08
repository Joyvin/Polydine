import './bootstrap';
import { createApp } from 'vue';

const app = createApp({});

import Polyheader from './components/Polyheader.vue'
import Dashboard from './components/Dashboard.vue'
<<<<<<< HEAD
import Login from './components/Login.vue'
import Register from './components/Register.vue'
=======
import CreateGroup from './components/CreateGroup.vue'
import CreatePlan from './components/CreatePlan.vue'
import JoinPlan from './components/JoinPlan.vue'
>>>>>>> 1904707c4d8c430034ec336bd5e587dbcc65027c

app
.component('polyheader', Polyheader)
.component('dashboard', Dashboard)
<<<<<<< HEAD
.component('register', Register)
.component('login', Login)
=======
.component('creategroup', CreateGroup)
.component('createplan', CreatePlan)
.component('joinplan', JoinPlan)
>>>>>>> 1904707c4d8c430034ec336bd5e587dbcc65027c

app.mount("#app")