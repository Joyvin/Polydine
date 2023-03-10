<template>
  <div class="row g-0 text-center text-white">
    <div class="col-sm-3 col-md-2">
      <img :src="pers1" style="height: 510px" />
    </div>
    <div class="col-6 col-md-7 px-3">
      <div class="TopHead text-center py-5 text-dark">
        <div class="px-5">Welcome to Polydine</div>
        <h3 class="px-5">Getting you closer with every plan</h3>
      </div>
    </div>
    <div class="col-6 col-md-2">
      <img :src="pers2" style="height: 495px"/>
    </div>
  </div>
<div class="py-5">
  <img :src="start" style="width: -webkit-fill-available;"/>
</div>
  <div class="container px-4 text-center">
    <div class="row gx-5">
      <div class="col">
        <div class="p-3">
          <img :src="chair" />
        </div>
      </div>
      <div class="col">
        <div>
            <div class="container text-start">
            <br />
            <h1>We at Polydine provide, </h1>
            <br>
            <h5>
              Making a plan. Sounds easy doesn't it? It's always easier said
              than done and I think many of you would agree with me on the same.
              This proverb dates long back to Terentius Afer's 1483 book and
              stands true till this date.
            </h5>
            <br>
            <h5>
               " Leave planning on us as we leave entertainment for you "
            </h5>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Home",
  data() {
    return {
      start: assetPath("img/Polydinestart.jpg"),
      pers1: assetPath("img/Pers1.png"),
      pers2: assetPath("img/Pers2.png"),
      chair: assetPath("img/chair.png"),
    };
  },
};
</script>

<style>
</style>