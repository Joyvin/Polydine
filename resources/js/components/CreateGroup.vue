<template>
  <div class="container mx-5">
  <div class="card rounded-3 myshadow w-100">
    <div class="card-body p-0 justify-content-between d-flex w-100">
        <div class="align-items-center d-flex w-100"><iframe src='https://my.spline.design/untitled-b86ccdc634a12d08481df0c671b5ba7d/' frameborder='0' width='100%' height='400px'></iframe></div>
        <div class="col-7 rounded-3 bg-primary text-white">
            <br>
            <h1 class="text-white px-4">Create a Group</h1>
        <form action="submit" method="POST">
            <div class="mb-3 px-5 row ">
                <label for="InputGroupName" class="form-label">Group Name</label>
                <input type="text" class="form-control" id="InputGroupName" placeholder="Group Name">
            </div>
            <div class="mb-3 px-5 row ">
                <label for="exampleInputPassword1" class="form-label">Group Description</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Tell other why you made this group">
            </div>
            <br>
            <div class="px-4">
            <button type="submit" class="button ">Submit</button>
            </div>
        </form>
        </div>
    </div>
  </div>
    </div>

</template>

<script>
export default {
    name: 'CreateGroup'
}
</script>

<style>

</style>