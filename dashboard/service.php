<?php

include('./extends/header.php');
// database connect
include('../config/database.php');

$select_services = "SELECT * FROM services";
$services = mysqli_query($database_connect, $select_services);

$serial = 0;


?>

<div class="bg-dark px-2">
  <div class="row">
    <div class="col">
      <div class="page-description">
        <h3 class="text-white fw-bold">Services_Show_Area</h3>
      </div>
    </div>
  </div>
</div>

<div class="row mt-4">
  <div class="col-12">
    <div class="card bg-warning">
      <div class="card-body">
        <table class="table">
          <thead class="table-primary ">
            <tr>
              <th class="text-danger fw-bold fs-3">ID</th>
              <th class="text-danger fw-bold fs-3">Icon</th>
              <th class="text-danger fw-bold fs-3">Title</th>
              <th class="text-danger fw-bold fs-3">Description</th>
              <th class="text-danger fw-bold fs-3">Status</th>
              <th class="text-danger fw-bold fs-3">Action</th>
            </tr>
          </thead>
          <tbody class="bg-dark text-white">
            <?php foreach ($services as $service) : ?>
              <tr>
                <td scope="row" class="fs-5"><?= ++$serial ?></td>
                <td class="fs-5"><i class="<?= $service['icon'] ?>"></i></td>
                <td class="fs-5"><?= $service['title'] ?></td>
                <td class="fs-5"><?= $service['description'] ?></td>
                <td>

                  <?php if($service['status'] == "active") : ?>
                  <a href="service_post.php?change_status=<?= $service['id'] ?>" class="badge bg-success"><?=$service['status'] ?></a>
                  <?php else:  ?>
                  <a href="service_post.php?change_status=<?= $service['id'] ?>" class="badge bg-danger"><?=$service['status'] ?></a>
                  <?php endif;  ?>

                </td>
                <td>
                  <a class="btn btn-primary" href="service_edit.php?edit_id=<?= $service['id'] ?>">Edit</a>
                  <a class="btn btn-danger" href="service_post.php?delet_id=<?= $service['id'] ?>">Delet</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<!-- update sweet alert  -->

<?php if(isset($_SESSION['update_success'])) : ?>

<script>
const Tost = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
  }
});

Tost.fire({
  icon: "success",
  title: "<?=$_SESSION['update_success']?>",
});
</script>

<?php endif;unset($_SESSION['update_success']); ?>

<!-- delet swet alert -->

<?php if(isset($_SESSION['delet_error'])) : ?>

<script>
const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
  }
});

Toast.fire({
  icon: "success",
  title: "<?=$_SESSION['delet_error']?>",
  background: 'red',
  color: 'white',
});
</script>

<?php endif;unset($_SESSION['delet_error']); ?>


<?php

include('./extends/footer.php');

?>