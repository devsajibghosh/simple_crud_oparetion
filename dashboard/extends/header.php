<?php

session_start();

if (!isset($_SESSION['admin_id'])) {
  header("location: ../error.php");
}


$server = $_SERVER['PHP_SELF'];
$explore = explode('/', $server);
$link = end($explore);


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Responsive Admin Dashboard Template">
  <meta name="keywords" content="admin,dashboard">
  <meta name="author" content="stacks">
  <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  <!-- Title -->
  <title>NexT_Tarbo_Dashboard</title>

  <!-- Styles -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
  <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
  <link href="../assets/plugins/pace/pace.css" rel="stylesheet">

  <!-- fontawsome 4.7 link  -->


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />



  <!-- Theme Styles -->
  <link href="../assets/css/main.min.css" rel="stylesheet">
  <link href="../assets/css/custom.css" rel="stylesheet">

  <link rel="icon" type="image/png" sizes="32x32" href="../assets/images/sajib.png" />
  <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/sajib.png" />

<!-- swwet alert -->

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


  <style>
    .imgs {
      width: 50px;
      height: 50px;
      border: 1px solid red;
      border-radius: 10px;
    }
  </style>
</head>

<body>
  <div class="app align-content-stretch d-flex flex-wrap">
    <div class="app-sidebar">
      <div class="logo">
        <span class="logo-text text-danger fw-bold fs-4">Id: <?= $_SESSION['admin_id'];  ?></span>
        <div class="sidebar-user-switcher">
          <a href="#">
            <img src="../images/profile/<?= $_SESSION['admin_image']; ?>" class="imgs">
            <span class="user-info-text">Name: <?= $_SESSION['admin_name'];  ?><br><span class="user-state-info">Email: <?= $_SESSION['admin_email']; ?></span></span>
          </a>
        </div>
      </div>
      <div class="app-menu">
        <ul class="accordion-menu">
          <li class="sidebar-title">
            Menus
          </li>
          <li class="<?= ($link == 'home.php') ? 'active-page' : ''; ?>">
            <a href="home.php" class="active"><i class="material-icons-two-tone">dashboard</i>Dashboard</a>
          </li>

          <!-- website link -->

          <li class="<?= ($link == 'index.php') ? 'active-page' : ''; ?>">
            <a href="../index.php" target="_blank" class="active"><i class="material-icons-two-tone">language</i>Visit Site</a>
          </li>

          <!-- profile -->
          <li class="<?= ($link == 'profile.php') ? 'active-page' : ''; ?>">
            <a href="profile.php" class="active"><i class="material-icons-two-tone">face</i></i>Profile</a>
          </li>

          <li>
            <a href="mailbox.html"><i class="material-icons-two-tone">inbox</i>Mailbox<span class="badge rounded-pill badge-danger float-end">87</span></a>

          <li <?= ($link == 'service.php') ? 'active-page' : ''; ?> >
            <a href="#"><i class="material-icons-two-tone">link</i>Service<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
            <ul class="sub-menu">
              <li>
                <a href="service.php">Service List</a>
              </li>
              <li>
                <a href="service_insert.php">New Service Insert</a>
              </li>
              <li>
                <!-- <a href="styles-icons.html">Icons</a> -->
              </li>
      </div>

    </div>
    <div class="app-container">
      <div class="search">
        <form>
          <input class="form-control" type="text" placeholder="Type here..." aria-label="Search">
        </form>
        <a href="#" class="toggle-search"><i class="material-icons">close</i></a>
      </div>


      <div class="app-header">
        <nav class="navbar navbar-light navbar-expand-lg">
          <div class="container-fluid">
            <div class="navbar-nav" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link hide-sidebar-toggle-button" href="#"><i class="material-icons">first_page</i></a>
                </li>
                <li class="nav-item dropdown hidden-on-mobile">
                  <a class="nav-link dropdown-toggle" href="#" id="addDropdownLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="material-icons">add</i>
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="addDropdownLink">
                    <li><a class="dropdown-item" href="#">New Workspace</a></li>
                    <li><a class="dropdown-item" href="#">New Board</a></li>
                    <li><a class="dropdown-item" href="#">Create Project</a></li>
                  </ul>
                </li>
                <li class="nav-item dropdown hidden-on-mobile">
                  <a class="nav-link dropdown-toggle" href="#" id="exploreDropdownLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="material-icons-outlined">explore</i>
                  </a>
                  <ul class="dropdown-menu dropdown-lg large-items-menu" aria-labelledby="exploreDropdownLink">
                    <li>
                      <h6 class="dropdown-header">Repositories</h6>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <h5 class="dropdown-item-title">
                          Neptune iOS
                          <span class="badge badge-warning">1.0.2</span>
                          <span class="hidden-helper-text">switch<i class="material-icons">keyboard_arrow_right</i></span>
                        </h5>
                        <span class="dropdown-item-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <h5 class="dropdown-item-title">
                          Neptune Android
                          <span class="badge badge-info">dev</span>
                          <span class="hidden-helper-text">switch<i class="material-icons">keyboard_arrow_right</i></span>
                        </h5>
                        <span class="dropdown-item-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
                      </a>
                    </li>
                    <li class="dropdown-btn-item d-grid">
                      <button class="btn btn-primary">Create new repository</button>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>



            <div class="d-flex">
              <ul class="navbar-nav">
                <li>
                  <a href="logout.php" class="btn btn-outline-danger px-md-4 fs-4">Logout</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
      <div class="app-content">
        <div class="content-wrapper">
          <div class="container">

            <!-- header part end -->