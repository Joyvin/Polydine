<template>
  <div class="container text-center">
    <div class="row row-cols-2 row-cols-lg-4 g-2 g-lg-3">
      <div class="col">
        <div class="card rounded-2 p-3">
            <form action="submit" method="POST">
              <div class="mb-3 px-1 row">
                <label for="InputGroupName" class="form-label">Join Plan</label>
                <div class="d-flex">
                <input
                  type="text"
                  class="form-control"
                  id="InputGroupName"
                  placeholder="Plan Code"
                />
                  <button type="link" class="button ms-1">Join</button>
                </div>
              </div>
              <br />
              <div class="px-4">
                <button type="link" class="button w-100">Create Plan</button>
              </div>
            </form>
          </div>      
      </div>
      <div id="copy" style="display: none;">Copied!</div>
      <div v-for="plan in plans" :key="plan.code" class="col">
        <div class="card rounded-2 p-3">
          <img :src="getImg()" />
          <div class="" v-show="false"><input v-model="flist" id="flist" type="text"><input id="sCode" v-model='sCode' type="text"></div>
          <h2>{{plan.name}}</h2><br>
          <div class=""><input style="cursor: pointer" @click="copyCode(plan.code)" class="form-control copy" readonly :value="plan.code"></div><br>
          <span><label for="">Plan Date:</label>{{plan.date ? plan.date : ' Undecided'}}</span>
          <span><label for="">Plan Time:</label>{{plan.time ? plan.time : ' Undecided'}}</span>
          <span><label for="">Plan Location:</label>{{plan.budget ? plan.budget : ' Undecided'}}</span>
          <div class=""><button @click="getSpot(plan.code)" class="btn mt-2 btn-primary w-100">Find Your Spot</button></div>
          </div>
      </div>
    </div>
    <div class="">{{flist}}</div>
  </div>
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="d-flex justify-content-between modal-header">
          <h4 class="modal-title">Modal Header</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div v-if="load" class="container text-dark text-"></div>
          <div v-else class="container text-center text-dark">
            <div class="row row-cols-2 row-cols-lg-4 g-2 g-lg-3">
              
              
              <div class="col">
                <div class="card rounded-2 p-3">
                  <div class=""><h2 id="r1-name"></h2></div>
                  <div class="d-flex"><label for="">Price:</label><div id="r1-price"></div></div>
                  <div class="d-flex"><label for="">Region:</label><div id="r1-region"></div></div>
                  <div class="d-flex"><label for="">City:</label><div id="r1-city"></div></div>
                  <div class="d-flex"><label for="">Rating:</label><div id="r1-rating"></div></div>
                </div>
              </div>
              <div class="col">
                <div class="card rounded-2 p-3">
                  <div class=""><h2 id="r2-name"></h2></div>
                  <div class="d-flex"><label for="">Price:</label><div id="r2-price"></div></div>
                  <div class="d-flex"><label for="">Region:</label><div id="r2-region"></div></div>
                  <div class="d-flex"><label for="">City:</label><div id="r2-city"></div></div>
                  <div class="d-flex"><label for="">Rating:</label><div id="r2-rating"></div></div>
                </div>
              </div>
              <div class="col">
                <div class="card rounded-2 p-3">
                  <div class=""><h2 id="r3-name"></h2></div>
                  <div class="d-flex"><label for="">Price:</label><div id="r3-price"></div></div>
                  <div class="d-flex"><label for="">Region:</label><div id="r3-region"></div></div>
                  <div class="d-flex"><label for="">City:</label><div id="r3-city"></div></div>
                  <div class="d-flex"><label for="">Rating:</label><div id="r3-rating"></div></div>
                </div>
              </div>
              <div class="col">
                <div class="card rounded-2 p-3">
                  <div class=""><h2 id="r4-name"></h2></div>
                  <div class="d-flex"><label for="">Price:</label><div id="r4-price"></div></div>
                  <div class="d-flex"><label for="">Region:</label><div id="r4-region"></div></div>
                  <div class="d-flex"><label for="">City:</label><div id="r4-city"></div></div>
                  <div class="d-flex"><label for="">Rating:</label><div id="r4-rating"></div></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    name: "MyPlans",
    data() {
      return {
        grp1: assetPath("img/grp1.svg"),
        grp2: assetPath("img/grp2.svg"),
        grp3: assetPath("img/grp3.svg"),
        grp4: assetPath("img/grp4.svg"),
        grp5: assetPath("img/grp5.svg"),
        grp6: assetPath("img/grp6.svg"),
        grp7: assetPath("img/grp7.svg"),
        createPlan: route('create.plan'),
        plans: [],
        add: assetPath("img/add (1).png"),
        latitude: '',
        longitude: '',
        sCode:'',
        flist: '',
        load: true
      };
    },

    methods:{
      copyCode(code){
        navigator.clipboard.writeText(code);
        var left  = clientX  + "px";
        var top  = clientY  + "px";
        $("#copy").toggle(150).css("top",top).css("left",left).css("position","fixed");
      },

      async getPlans(){
        var form = {_token: this.token}
        var res = await axios.post(route("get.plan"), form).then((e) => {return e.data;});
        if(res[1].length != 0){
          window.location.replace(route('show.join.plan')+'?code='+res[1].code);
        }
        else{
          this.plans = res[0]
        }
      },

      getImg(){
        var img = [this.grp1, this.grp2, this.grp3, this.grp4, this.grp5, this.grp6, this.grp7]
        var item = img[Math.floor(Math.random()*img.length)];
        return item
      },

      async getSpot(code){
        this.load = true
        $("#myModal").modal('toggle')
        this.sCode = code
        navigator.geolocation.getCurrentPosition(async function(position){
          var pos = position
          var form = {code: $("#sCode").val(), _token: $("meta[name=csrf-token]").attr('content'), latitude: pos.coords.latitude, longitude: pos.coords.longitude}
          var res = await axios.post(route("get.spot"), form).then((e) => {return e.data;});
          var c = 1
          $.each(res, function(index,val){
            console.log("#r-"+c.toString()+"name")
            $("#r"+c.toString()+"-name").html(' '+val['name']) 
            $("#r"+c.toString()+"-price").html(' '+val['price'])  
            $("#r"+c.toString()+"-region").html(' '+val['region']) 
            $("#r"+c.toString()+"-rating").html(' '+val['rating'].toFixed(2)) 
            c = c + 1 
          })
          }
        )

        this.load = false
      }
    },

    mounted(){
      this.getPlans()
      $('.copy').click(function() {
        $('.menu').toggle("slide");
      });
    }

}
</script>

<style>

</style>