<template>
  <div class="container">
  <div class="card rounded-3 myshadow w-100">
    <div class="card-body p-0 justify-content-between d-flex w-100">
        <div class="align-items-center d-flex w-100"><iframe src='https://my.spline.design/untitled-b86ccdc634a12d08481df0c671b5ba7d/' frameborder='0' width='100%' height='400px'></iframe></div>
        <div class="col-7 rounded-3 bg-primary text-white">
            <br>
            <h1 class="text-white px-4">Create a Group</h1>
            <div class="px-4">
                <div class="mb-3">
                    <label for="InputGroupName" class="form-label">Group Name</label>
                    <input v-model="name" type="text" class="form-control" id="InputGroupName" placeholder="Group Name">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Group Description</label>
                    <textarea v-model="desc" type="text" class="form-control" id="exampleInputPassword1" placeholder="Tell other why you made this group"></textarea>
                </div>
                <br>
                <div class="">
                <button @click="submitForm()" class="btn bg-white myshadow">Submit</button>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>

</template>

<script>
export default {
    name: 'CreateGroup',

    data(){
        return{
            name: '',
            desc: '',
            token: getToken(),
        }
    },

    methods:{
        async submitForm(){
            var form = {name: this.name, desc: this.desc, _token: this.token}

            // var res = await axios.post(route('create.group'), form).catch((e)=>{return e.response});
            console.log(form)
        }
    }
}
</script>

<style>

</style>