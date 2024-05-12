<?php

include('./extends/header.php');

?>


<div class="row">

  <div class="col">
    <div class="page-description">
      <h1 class="text-danger">Dashboard</h1>
      <h5 class="text-primary">Welcome!</h5>
      <p>ID:<?= $_SESSION['admin_id']; ?></p>
      <div>
        <img src="../images/profile/<?= $_SESSION['admin_image']; ?>" style="width:50px; height:50px; border-radius:50%; border:2px solid #262626;">
      </div>
      <p>Name:<?= $_SESSION['admin_name']; ?></p>
    </div>
  </div>
</div>


<?php

include('./extends/footer.php');

?>