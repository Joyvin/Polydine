<template>
    <nav :style="scroll != 0 ? 'box-shadow: 0 8px 10px;' : ''" :class="scroll != 0 ? 'bg-primary' : 'bg-white'" class="rounded-bottom navbar navbar-light navbar-expand-md fixed-top" id="mainNav">
        <div class="container d-flex justify-content-between">
            <div class="">
                <a class="navbar-brand d-flex align-items-center" href="/"><img height="72" :src="logoImg" alt=""></a>
                <button data-bs-toggle="collapse" class="navbar-toggler collapsed" data-bs-target="#navcol-1" aria-expanded="false"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            </div>
            <div class="">
                <div class="navbar-collapse collapse" id="navcol-1" style="">
                    <ul class="navbar-nav mx-auto pe-5">
                        <li class="nav-item me-3"><a :class="scroll != 0 ? 'text-white' : ''" class="nav-link active" href="index.html">Home</a></li>
                        <li class="nav-item me-3"><a :class="scroll != 0 ? 'text-white' : ''" class="nav-link" href="projects.html">Plans</a></li>
                        <li class="nav-item me-3"><a :class="scroll != 0 ? 'text-white' : ''" class="nav-link" href="services.html">Groups</a></li>
                        <li class="nav-item me-3"><a :class="scroll != 0 ? 'text-white' : ''" class="nav-link" href="pricing.html">Chat</a></li>
                        <li class="nav-item me-3"><a :class="scroll != 0 ? 'text-white' : ''" class="nav-link" href="contacts.html">Memories</a></li>
                    </ul>
                </div>
            </div>
            <div class="">
                <div class="col-auto d-flex align-items-center">
                    <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link show" aria-expanded="true" data-bs-toggle="dropdown" href="#"><span :class="scroll != 0 ? 'text-white' : ''" class="d-none d-lg-inline me-2 text-gray-600 small me-2 pe-1">Joyvin Mendonca</span><img style="width: 32px" class="img-fluid border rounded-circle img-profile" :src="userPic"></a>
                        <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in" data-bs-popper="none"><a class="dropdown-item" href="#"><i class="fas fa-user fa-sm fa-fw me-2 text-black-50"></i>&nbsp;Profile</a><a class="dropdown-item" href="#"><i class="fas fa-cogs fa-sm fa-fw me-2 text-black-50"></i>&nbsp;Settings</a><a class="dropdown-item" href="#"><i class="fas fa-list fa-sm fa-fw me-2 text-black-50"></i>&nbsp;Activity log</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-black-50"></i>&nbsp;Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="container" style="padding-top: 130px;">
        <div class="row">
            <div class="card myshadow col-7">
                <div class="card-body">
                    <div id="calendar"></div>
                </div>
            </div>
            <div class="col-4 mx-auto">
                <div class="bg-primary myshadow card">
                    <div class="card-body">
                        <div class="font-size-22 text-white"> 27 Mar 2023</div>
                        <div class="border-start text-white border-5 ps-2 my-3">
                            <h3 class="text-white">No Plan Today</h3>
                            <div class="">Birthday Party</div>
                        </div>
                        <button class="bg-white btn w-100"><i class="mdi mdi-party-popper me-2"></i>Make A Plan</button>
                    </div>
                </div>
                <div class="card myshadow"></div>
            </div>
        </div>
    </div>
</template>

<script>
import { Calendar } from '@fullcalendar/core'
import dayGridPlugin from '@fullcalendar/daygrid'
import interactionPlugin from '@fullcalendar/interaction'
export default {
    name:'Polyheader',

    data(){
        return{
            logoImg: assetPath('img/logo-lg.png'),
            userPic: assetPath('img/avatar-2.jpg'),
            scroll: 0
        }
    },

    methods:{
        handleScroll(){
            this.scroll = $(window).scrollTop()
        }
    },

    mounted(){
        window.addEventListener('scroll', this.handleScroll);
        
        var calendarEl = document.getElementById('calendar')
        var calendar = new Calendar(calendarEl, {
            plugins: [ dayGridPlugin, interactionPlugin ],
            initialView: 'dayGridMonth',
            headerToolbar: {
                start:'today',
                center: 'title',
                end: 'prev,next'
            },
            contentHeight: 'auto',
            events: [
                { // this object will be "parsed" into an Event Object
                start: '2023-03-22', // a property!
                end: '2023-03-22' // a property! ** see important note below about 'end' **
                },
                { // this object will be "parsed" into an Event Object
                title: 'Party', // a property!
                start: '2023-03-22', // a property!
                end: '2023-03-22' // a property! ** see important note below about 'end' **
                }
            ],
            eventClick: function(info){
                console.log(info.event)
            }
        });
        calendar.render();
        
        $(".vertical-menu-btn").click(function(){
            console.log('true')
            calendar.render();
        })
    }
}
</script>

<style>

</style>