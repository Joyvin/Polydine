<template>
  <div class="container">
    <div class="card rounded-3 myshadow w-100">
      <div class="card-body p-0 justify-content-between d-flex w-100">
        <div class="align-items-center d-flex w-100">
          <iframe
            src="https://my.spline.design/untitled-b86ccdc634a12d08481df0c671b5ba7d/"
            frameborder="0"
            width="100%"
            height="350px"
          ></iframe>
        </div>
        <div class="col-7 rounded-3 bg-primary text-white">
          <br />
          <h1 class="text-white px-4">Create a Plan</h1>
          <div>
            <div class="mb-3 px-4">
              <label for="InputGroupName" class="form-label">Plan Name</label>
              <input
                v-model="name"
                type="text"
                class="form-control"
                id="InputGroupName"
                placeholder="Plan Name"
              />
            </div>
            <div class="mb-3 px-4">
              <label for="exampleInputPassword1" class="form-label"
                >Plan Description</label
              >
              <input
                v-model="desc"
                type="text"
                class="form-control"
                id="exampleInputPassword1"
                placeholder="Plan for"
              />
            </div>
            <div class="mb-3 px-4">
              <label for="exampleInputPassword1" class="form-label">Add Group</label>
              <select v-model="sGroup" class="form-select" aria-label="Default select example">
                <option value="0">No Group Selected</option>
                <option v-for="group in groups" :key="group.id" :value="group.id">{{group.name}}</option>
              </select>
            </div>
            <br />
            <div class="d-flex justify-content-between px-4">
              <label>Specifications</label>
              <div class="">
                <label class="switch">
                  <input v-model="specs" type="checkbox">
                  <span class="slider round"></span>
                </label>
              </div>
            </div>
            <div v-if="specs" class="">
                <div class="mb-3 px-4">
                  <label for="exampleInputPassword1" class="form-label">Any Fixed Date</label>
                  <input v-model="date" type="date" class="form-control" id="exampleInputPassword1" placeholder="Enter a Date"/>
                </div>
                <div class="mb-3 px-4">
                  <label for="exampleInputPassword1" class="form-label">Any Fixed Time</label>
                  <input type="time" v-model="time" class="form-control" id="exampleInputPassword1" />
                </div>
                <div class="mb-3 px-4">
                  <label for="exampleInputPassword1" class="form-label">Any Fixed Budget</label>
                  <input type="number" v-model="budget" class="form-control" id="exampleInputPassword1"/>
                </div>
            </div>
            <div class="px-4 p-3">
              <button @click="createPlan()" class="button">Submit</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "CreatePlan",
  data() {
    return {
      name: '',
      desc: '',
      groups: '',
      specs: '',
      sGroup: '0',
      date: '',
      time: '',
      budget: '',
      latitude: '',
      longitude: '',
      token: getToken(),
    };
  },

  methods: {
    async getGroups() {
      var form = {
        _token: this.token,
      };
      var res = await axios.post(route("get.group"), form).then((e) => {return e.data;});
      this.groups = res
    },

    async createPlan(){
      var form = {_token: this.token, name: this.name, desc: this.desc, groupID: this.sGroup, date: this.date, time: this.time, budget: this.budget}
      var res = await axios.post(route("create.plan"), form).then((e) => {return e.data;});
      if(res == 200){
        window.location.replace(route('plan'))
      }
    },

    getLoc(){
      navigator.geolocation.getCurrentPosition((position) => {
        this.latitude = position.coords.latitude,
        this.longitude = position.coords.longitude
      }, (error) => {console.log(error)})
    },

  },

  mounted(){
    this.getLoc()
    this.getGroups()
  }
};
</script>

<style scoped>
  .switch {
    position: relative;
    display: inline-block;
    width: 50px;
    height: 28px;
  }

  .switch input { 
    opacity: 0;
    width: 0;
    height: 0;
  }

  .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
  }

  .slider:before {
    position: absolute;
    content: "";
    height: 20px;
    width: 20px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
  }

  input:checked + .slider {
    background-color: #2196F3;
  }

  input:focus + .slider {
    box-shadow: 0 0 1px #2196F3;
  }

  input:checked + .slider:before {
    -webkit-transform: translateX(20px);
    -ms-transform: translateX(20px);
    transform: translateX(20px);
  }

  /* Rounded sliders */
  .slider.round {
    border-radius: 34px;
  }

  .slider.round:before {
    border-radius: 50%;
  }

</style>