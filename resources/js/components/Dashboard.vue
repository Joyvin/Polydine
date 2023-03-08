<template>
    <div class="container-fluid px-5">
        <div class="row">
            <div class="card myshadow col-12 col-lg-7">
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
                        <div class="d-flex">
                            <button class="align-items-center bg-white border-white btn d-flex justify-content-center me-2 myshadow w-100">
                                <i class="mdi mdi-party-popper me-2"></i>Make A Plan
                            </button>
                            <button class="align-items-center bg-white border-white btn d-flex justify-content-center myshadow w-100">
                                <i class="mdi mdi-18px mdi-account-group-outline me-2"></i>Join A Plan
                            </button>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="timeline">
                        <ul class="p-0 m-0">
                            <div class="d-none" id="events">{{this.events}}</div>
                            <li class="">
                                <div class=" text-primary ms-5 myshadow pt-0 rounded-3 bg-white ps-2 my-3">
                                    <div class="d-flex justify-content-end p-0 pe-2">
                                        <div class="bg-primary p-0 p-2 text-white w-auto">04 Apr 2023</div>
                                    </div>
                                    <div class="p-1">
                                        <h3 class="text-primary">Shaun's Birthday Party</h3>
                                        <div class="p-0">18 Birthday</div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <ul class="p-0 m-0" style="position:relative; top:-17px" >
                            <li class="">
                                <div class=" text-primary ms-5 myshadow pt-0 rounded-3 bg-white ps-2 my-3">
                                    <div class="d-flex justify-content-end p-0 pe-2">
                                        <div class="bg-primary p-0 p-2 text-white w-auto">10 Apr 2023</div>
                                    </div>
                                    <div class="p-1">
                                        <h3 class="text-primary">Vacation Party</h3>
                                        <div class="p-0">Lunch</div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Calendar } from '@fullcalendar/core'
import dayGridPlugin from '@fullcalendar/daygrid'
import interactionPlugin from '@fullcalendar/interaction'
export default {
    name: 'Dashboard',

    data(){
        return{
            events: [
                { // this object will be "parsed" into an Event Object
                title: "Shaun's Birthday", 
                start: '2023-03-22', // a property!
                end: '2023-03-22'
                },
                { // this object will be "parsed" into an Event Object
                title: 'Vaction Party', // a property!
                start: '2023-03-22', // a property!
                end: '2023-03-22' // a property! ** see important note below about 'end' **
                }
            ]
        }
    },

    methods:{
        // showEvent(info){
        //     var res = Swal.fire({title: 'Clicked on: ' + info.dateStr,})
        // }
    },

    mounted(){
        var calendarEl = document.getElementById('calendar')
        var calendar = new Calendar(calendarEl, {
            plugins: [ dayGridPlugin, interactionPlugin ],
            initialView: 'dayGridMonth',
            dateClick: function(info){
                var e = []
                var desc = ''
                var events = JSON.parse($('#events').html())
                $.each(events, function(key, val){
                    console.log('hi')
                    if (val.start == info.dateStr){
                        
                        e.push(val.title)
                    }
                })

                if(e.length != 0){
                    $.each(e, function(key, val){
                        desc = desc + '<div class="border-start text-white border-primary border-5 ps-2 my-3"><div class="d-flex ms-3"><h4 class="text-primary m-0">'+val+'</h4></div></div>'
                    })
                }
                else{
                    desc = '<div class="border-start text-white border-primary border-5 ps-2 my-3"><div class="d-flex ms-3"><h4 class="text-primary m-0">No Plans</h4></div></div>'
                }

                var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']

                var num = info.dateStr.split('-')

                var date = num[2] + ' '+ months[parseInt(num[1])] +' ' + num[0]

                Swal.fire({
                    title: date,
                    html: desc
                })
            },
            headerToolbar: {
                start:'today',
                center: 'title',
                end: 'prev,next'
            },
            contentHeight: 'auto',
            eventDisplay: 'list-item',
            eventColor: '#138085',
            events: this.events,
            eventClick: function(info){
                console.log(info.event)
            }
        });
        calendar.render();
    }
}
</script>

<style>

</style>