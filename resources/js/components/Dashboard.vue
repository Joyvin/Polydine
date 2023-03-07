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
                        <button class="bg-white btn w-100"><i class="mdi mdi-party-popper me-2"></i>Make A Plan</button>
                    </div>
                </div>
                <div class="">
                    <div class="timeline">
                        <ul class="p-0 m-0">
                            <li class="">
                                <div class=" text-primary ms-5 myshadow pt-0 rounded-3 bg-white ps-2 my-3">
                                    <div class="d-flex justify-content-end p-0 pe-2">
                                        <div class="bg-primary p-0 p-2 text-white w-auto">04 Apr 2023</div>
                                    </div>
                                    <h3 class="text-primary">Shaun's Birthday Party</h3>
                                    <div class="">18 Birthday</div>
                                </div>
                            </li>
                        </ul>
                        <ul class="p-0 m-0" style="position:relative; top:-17px" >
                            <li class="">
                                <div class=" text-primary ms-5 myshadow pt-0 rounded-3 bg-white ps-2 my-3">
                                    <div class="d-flex justify-content-end p-0 pe-2">
                                        <div class="bg-primary p-0 p-2 text-white w-auto">10 Apr 2023</div>
                                    </div>
                                    <h3 class="text-primary">Vacation Party</h3>
                                    <div class="">Lunch</div>
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

    mounted(){
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
    }
}
</script>

<style>

</style>