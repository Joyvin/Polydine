import './bootstrap';
import { createApp } from 'vue';

const app = createApp({});

import Polyheader from './components/Polyheader.vue'
import Dashboard from './components/Dashboard.vue'
import Login from './components/Login.vue'
import Register from './components/Register.vue'
import CreateGroup from './components/CreateGroup.vue'
import CreatePlan from './components/CreatePlan.vue'
import JoinPlan from './components/JoinPlan.vue'
import Group from './components/Group.vue'
import YourPlans from './components/YourPlans.vue'
import Home from './components/Home.vue'

app
.component('polyheader', Polyheader)
.component('dashboard', Dashboard)
.component('register', Register)
.component('login', Login)
.component('creategroup', CreateGroup)
.component('createplan', CreatePlan)
.component('joinplan', JoinPlan)
.component('group', Group)
.component('yourplans', YourPlans)
.component('home', Home)

app.mount("#app")