<template>
  <div class="container mx-5">
  <div class="card rounded-3 myshadow w-100">
    <div class="card-body p-0 justify-content-between d-flex w-100">
      <div class="align-items-center d-flex w-100">
        <iframe
          src="https://my.spline.design/untitled-b86ccdc634a12d08481df0c671b5ba7d/"
          frameborder="0"
          width="100%"
          height="400px"
        ></iframe>
      </div>
      <div class="col-7 rounded-3 bg-primary text-white">
        <br />
        <h1 class="text-white px-4">Create a Plan</h1>
        <form action="submit" method="POST">
          <div class="mb-3 px-5 row">
            <label for="InputGroupName" class="form-label">Plan Name</label>
            <input
              type="text"
              class="form-control"
              id="InputGroupName"
              placeholder="Plan Name"
            />
          </div>
          <div class="mb-3 px-5 row">
            <label for="exampleInputPassword1" class="form-label"
              >Plan Description</label>
            <input
              type="text"
              class="form-control"
              id="exampleInputPassword1"
              placeholder="Plan for"
            />
          </div>
          <br />
          <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button bg-body" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Specifications
                    </button>
                  </h2>
                  <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Any Fixed Date</label>
                                <input type="date" class="form-control" id="exampleInputPassword1"
                                    placeholder="Enter a Date">
                            </div>
                            <div class="mycol">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Any Fixed Time</label>
                                    <input type="time" class="form-control" id="exampleInputPassword1">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Any Fixed Budget</label>
                                <input type="number" class="form-control" id="exampleInputPassword1">
                            </div>
                        </div>
                    </div>
                    </div>
                  </div>
                </div>
            </div>
          <div class="px-4 p-3">
            <button type="submit" class="button">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  </div>

</template>

<script>
export default {
  name: "CreatePlan",
};
</script>

<style>
</style>