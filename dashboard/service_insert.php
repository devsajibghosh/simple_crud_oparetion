<?php

include('./extends/header.php');
include('./extends/icons.php');

?>

<div class="bg-secondary px-2">
  <div class="row">
    <div class="col">
      <div class="page-description">
        <h3 class="text-dark fw-bolder">Services_Insert_Field</h3>
      </div>
    </div>
  </div>
</div>


<!-- form servicer insert -->


<div class="row mt-5">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="text-danger">->Insert_Service_Type</h3>
        <hr class="border border-primary border-2 opacity-50">
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-6">

            <form action="service_post.php" method="POST">
              <h5>Service title</h5>
              <input type="text" class="form-control py-5" id="servicetitle" name="title">
          </div>
          <div class="col-6">
            <h5>Service description</h5>
            <input type="text" class="form-control py-5" id="servicedescription" name="description">
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-12">
            <h5 class="text-warning">Service icon🖥️</h5>
            <input type="text" class="form-control py-5" id="serviceicon" name="icon">
            <div class="divider"></div>

            <!-- icons sections start -->

            <div class="card bg-dark">
              <div class="card-boy scroll" style="overflow-y: auto; max-height: 200px; background-color: #161616; color: white; border-radius: 10px" >
                <?php foreach ($icons as $icon) : ?>
                  <span class="fa-2x m-4"><i onclick="myFun(event)"  class="<?= $icon ?>"></i></span>
                <?php endforeach; ?>
              </div>
            </div>

            <!-- input field connect icon -->

          <script>

            let input = document.getElementById('serviceicon');
            function myFun(){
              input.value = event.target.getAttribute('class');
            }

          </script>

            <!-- icons sections end -->

            <button type="submit" class="btn btn-success mt-4 px-4 py-4 fw-bold fs-5" name="service_btn">Update</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php

include('./extends/footer.php');

?>