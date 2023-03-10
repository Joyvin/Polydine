<template>
  
  <div class="container">
    <div class="card myshadow rounded-3">
        <div class="card-body p-0">
            <div class="d-flex justify-content-between">
                <div class="col-4 bg-primary">
                    <div class="bg-white m-3 rounded-3" style="height: 550px">
                        <div :class="gcode == group.code ? 'selected' : ''" @click="getSMS(group.code)" v-for="group in groups" :key="group.code" class="align-items-center border-2 border-bottom d-flex p-3">
                        <div class="me-2">
                            <img class="img-fluid border rounded-circle img-profile" src="http://localhost:8000/img/avatar-2.jpg" style="width: 32px;">
                        </div>
                        <div>{{group.name}}</div>
                    </div>
                    </div>
                </div>
                <div class="col-8 bg-white d-flex flex-column justify-content-between rounded-3">
                    <div><h2 class="border-bottom border-light p-3">Cafe Hub</h2></div>
                    <div class="chat-conversation d-flex flex-column"  style="height: 460px">
                        <div v-for="(s, index) in sms" :key="index" :class="user.name == s.user ? 'right' : ''">
                            <div class="conversation-list">
                                <div class="ctext-wrap">
                                    <div class="ctext-wrap-content">
                                        <h5 class="font-size-14 conversation-name"><a href="#" class="text-dark">{{s.user}}</a> <span class="d-inline-block font-size-12 text-muted ms-2"></span></h5>
                                        <p class="mb-0">
                                            {{s.text}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="align-items-center border-light border-top d-flex pb-1 px-3"><input v-model="text" @keyup.enter="sendSMS()" type="text" placeholder="Enter a Message" class="border-0 p-2 w-100" style="outline: 0; margin: 0;"><i class="fa fa-location-arrow"></i></div>
                </div>
            </div>
        </div>
    </div>
  </div>
</template>

<script>
export default {
    name: 'Group',
    props: ['user'],
    data(){
        return{
            sms: '',
            text: '',
            groups: '',
            gcode: '',
            token: getToken()
        }
    },

    methods:{
        async sendSMS(){
            var form = {_token: this.token, text: this.text, groupID: this.gcode}
            this.text = ''
            var res = await axios.post(route("create.sms"), form).then((e) => {return e.data;});
            if (res == 200) {this.getSMS()}
        },

        async getGroups() {
            var form = {_token: this.token,};
            var res = await axios.post(route("get.group"), form).then((e) => {return e.data;});
            this.groups = res
            this.gcode = res[0].code
        },

        async getSMS(gcd){
            console.log(gcd)
            this.gcode = gcd
            var form = {_token: this.token, groupID: this.gcode}
            var res = await axios.post(route("get.sms"), form).then((e) => {return e.data;});
            this.sms = res
        }

    },

    mounted(){
        this.getGroups()
        this.getSMS(this.gcode)
        // setInterval(this.getSMS(this.gcode), 5000);
    }
}
</script>

<style>

</style>