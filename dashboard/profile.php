<?php

include('./extends/header.php');

?>

<div class="bg-dark px-2">
  <div class="row">

    <div class="col">
      <div class="page-description">
        <h1 class="text-danger">Profile</h1>
        <br>
        <br>
        <h5 class="text-primary">Welcome!</h5>
        <div>
          <img src="../images/profile/<?= $_SESSION['admin_image']; ?>" style="width:50px; height:50px; border-radius:50%; border:2px solid #FFFFFF;">
        </div>
        <p class="bg-dark d-inline text-white">Name: <?= $_SESSION['admin_name']; ?></p>
      </div>
    </div>
  </div>

  <!-- Update name and email -->


  <div class="row">
    <div class="col-6">
      <div class="card">
        <div class="card-header">
          <h1>Update Name</h1>
        </div>
        <div class="card-body">
          <form action="profile_post.php" method="POST">

            <!-- Name erorr msg -->
            <?php if (isset($_SESSION['name_errors'])) : ?>
              <div id="emailHelp" class="text-danger m-b-md"><?= $_SESSION['name_errors']; ?>*</div>
            <?php endif;
            unset($_SESSION['name_errors']); ?>
            <!-- Name erorr msg  end-->

            <input type="name" class="form-control btn-outline-primary fs-4" id="nameHelp1" aria-describedby="nameHelp" placeholder="update your name" name="name">
            <div id="emailHelp" class="form-text"></div>
            <button type="submit" class="btn btn-primary btn-sm mt-4" name="update_btn">Update</button>
          </form>
        </div>
      </div>
    </div>


    <!-- update Email -->

    <div class="col-6">
      <div class="card">
        <div class="card-header">
          <h1>Update Email</h1>
        </div>
        <div class="card-body">
          <form action="profile_post.php" method="POST">

            <!-- email erorr msg -->
            <?php if (isset($_SESSION['email_errors'])) : ?>
              <div id="emailHelp" class="text-danger m-b-md"><?= $_SESSION['email_errors']; ?>*</div>
            <?php endif;
            unset($_SESSION['email_errors']); ?>
            <!-- email erorr msg  end-->

            <input type="email" class="form-control btn-outline-primary fs-4" id="emailHelp1" aria-describedby="emailHelp" placeholder="update your email" name="email">
            <div id="emailHelp" class="form-text"></div>
            <button type="submit" class="btn btn-primary btn-sm mt-4" name="update_email">Update</button>
          </form>
        </div>
      </div>
    </div>
  </div>



  <!-- 2nd row password update  image upload-->



  <div class="row">
    <div class="col-6">
      <div class="card">
        <div class="card-header">
          <h1>Update Password</h1>
        </div>
        <div class="card-body">
          <form action="profile_post.php" method="POST">

            <!-- password erorr msg -->
            <?php if (isset($_SESSION['password_errors'])) : ?>
              <div id="emailHelp" class="text-danger m-b-md"><?= $_SESSION['password_errors']; ?>*</div>
            <?php endif;
            unset($_SESSION['password_errors']); ?>
            <!-- password erorr msg  end-->

            <label for="exampleInputPassword1" class="form-label">Current Password</label>

            <input type="password" class="form-control btn-outline-primary fs-4" placeholder="your current password" name="current_password">
            <br>

            <label for="exampleInputPassword1" class="form-label">New Password</label>
            <input type="password" class="form-control btn-outline-primary fs-4" placeholder="your new password" name="new_password">
            <br>

            <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
            <input type="password" class="form-control btn-outline-primary fs-4" placeholder="your confirm password" name="confirm_password">
            <button type="submit" class="btn btn-primary btn-sm mt-4" name="update_password">Update</button>
          </form>
        </div>
      </div>
    </div>


    <!-- image upload -->

    <div class="col-6">
      <div class="card">
        <div class="card-header">
          <h1 class="text-warning">Update Image</h1>
        </div>
        <div class="card-body">
          <form action="profile_post.php" method="POST" enctype="multipart/form-data">
            <div>
              <img src="../images/profile/<?= $_SESSION['admin_image']; ?>" style="width:150px; height:150px; border-radius:50%; border:1px solid black;">
            </div>
            <br>
            <label for="exampleInputPassword1" class="form-label">image</label>

            <!-- image erorr msg -->
            <?php if (isset($_SESSION['image_errors'])) : ?>
              <div id="emailHelp" class="text-danger m-b-md"><?= $_SESSION['image_errors']; ?>*</div>
            <?php endif;
            unset($_SESSION['image_errors']); ?>
            <!-- image erorr msg  end-->

            <input type="file" class="form-control btn-outline-danger fs-4" name="image">
            <button type="submit" class="btn btn-danger btn-sm mt-4" name="update_image">Update Image</button>
          </form>
        </div>
      </div>
    </div>


  </div>
</div>

<?php

include('./extends/footer.php');

?>