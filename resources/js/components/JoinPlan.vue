<template>
  <div class="container">
    <div class="card rounded-3 myshadow w-100">
      <div class="card-body p-0 justify-content-between d-flex w-100">
        <div class="align-items-center d-flex w-100">
          <iframe
            :class="page ? 'p-4' : ''"
            src="https://my.spline.design/untitled-b86ccdc634a12d08481df0c671b5ba7d/"
            frameborder="0"
            width="100%"
            height="335px"
          ></iframe>
        </div>
        <div class="col-7 rounded-3 bg-primary text-white">
          <br />
          <h1 :class="!page ? 'mb-3' : ''" class="text-white px-4">Join a Plan</h1>
          <div>
            <div v-if="!page" class="mb-3 px-4">
                Enter availiable days
            </div>
            <div v-if="!page" class="px-4 mb-3">
              <button @click="page = true" class="button">Next</button>
            </div>
            <div v-if="!page" class="">
              <div class="bg-white mx-auto me-4 ms-4 mb-4 myshadow p-4 rounded-3" id="calendar"></div>
            </div>
            <div v-else class="">
              <div class="px-4">
                <label for="InputGroupName" class="form-label"
                  >Enter your preferred budget</label
                >
                <input v-model="budget"
                  type="number"
                  class="form-control"
                  id="InputGroupName"
                  placeholder="Enter a budget you like "
                />
              </div>
            <br />
            </div>
            <input id="sDate" type="text" v-model='sDate' class="d-none"><input id="eDate" type="text" v-model='eDate' class="d-none">
            <div v-if="page" class="px-4 mb-3">
              <button @click="giveOpinion" class="button">Submit</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { Calendar } from "@fullcalendar/core";
import dayGridPlugin from "@fullcalendar/daygrid";
import interactionPlugin from "@fullcalendar/interaction";
export default {
  name: "JoinPlan",

  props:['plan'],

  data() {
    return {
      dates: "",
      page: false,
      budget: "",
      location: "",
      token: getToken(),
      sDate: '',
      eDate: ''
    };
  },
  methods: {
    async giveOpinion(){
      var form = {_token: this.token, budget: parseInt(this.budget), code: this.plan.code}
      var res = await axios.post(route("give.opinion"), form).then((e) => {return e.response;});
      window.location.replace(route('plan'))
    }
  },

  mounted() {
    var calendarEl = document.getElementById("calendar");
    var calendar = new Calendar(calendarEl, {
      plugins: [dayGridPlugin, interactionPlugin],
      initialView: "dayGridMonth",
      selectable: true,
      headerToolbar: {
        start: "today",
        center: "title",
        end: "prev,next",
      },
      select: function(start, end, jsEvent, view) {
        console.log(start.startStr, start.endStr)
         $("#sDate").val(start.startStr);
         $("#eDate").val(start.endStr)
      }
      // contentHeight: "auto",
    });
    calendar.render();
  },
};
</script>

<style>
</style>