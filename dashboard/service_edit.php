<?php

include('../config/database.php');

include('./extends/header.php');
include('./extends/icons.php');


$id = $_GET['edit_id'];
$service_query = "SELECT * FROM services WHERE id='$id'";

$connect = mysqli_query($database_connect, $service_query);
$service = mysqli_fetch_assoc($connect);

?>

<div class="bg-secondary px-2">
  <div class="row">
    <div class="col">
      <div class="page-description">
        <h3 class="text-dark fw-bolder">Services_Update_Page</h3>
      </div>
    </div>
  </div>
</div>


<!-- form servicer insert -->


<div class="row mt-5">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="text-danger">->Update_Service_ID<?= $service['id'];?></h3>
        <hr class="border border-primary border-2 opacity-50">
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-6">

            <form action="service_post.php" method="POST">
              <h5>Update Service title</h5>
              <input type="text" class="form-control py-5" id="servicetitle" name="title" value="<?= $service['title'];  ?>">

              <input type="hidden" value="<?= $service['id']; ?>" name="service_id">
          </div>
          <div class="col-6">
            <h5>Update Service description</h5>
            <input type="text" class="form-control py-5" id="servicedescription" name="description" value="<?= $service['description'];  ?>">
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-12">
            <h5 class="text-warning">Update Service icon🖥️</h5>
            <input type="text" class="form-control py-5" id="serviceicon" name="icon" value="<?= $service['icon'];  ?> ">
            <div class="divider"></div>

            <!-- icons sections start -->

            <div class="card bg-dark">
              <div class="card-boy scroll" style="overflow-y: auto; max-height: 200px; background-color: #262626; color: white; border-radius: 10px">
                <?php foreach ($icons as $icon) : ?>
                  <span class="fa-2x m-4"><i onclick="myFun(event)" class="<?= $icon ?>"></i></span>
                <?php endforeach; ?>
              </div>
            </div>

            <!-- input field connect icon -->

            <script>
              let input = document.getElementById('serviceicon');

              function myFun() {
                input.value = event.target.getAttribute('class');
              }
            </script>

            <!-- icons sections end -->
            <div>

            </div>
            <button type="submit" class="btn btn-primary mt-4 px-4 py-4 fw-bold fs-5" name="service_edit">Update</button>
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