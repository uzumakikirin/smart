<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!--material icon font -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <!--css-circular progress bar style-->
  <link href="/public/css/css-circular-prog-bar.css" rel="stylesheet">

  <link rel="stylesheet" href="/public/css/style.css">

  <title><?php echo SITENAME; ?></title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <button class="navbar-toggler mr-2" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">Ecommerce</a>
      <div class="dropdown text-white ml-auto">
        <a class="dropdown-toggle" role="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
          aria-expanded="false">
          <?php echo (isset($_SESSION['user_name']) ? $_SESSION['user_name'] : "Accounts"); ?>
        </a>
        <div class="dropdown-menu dropdown-menu-right mt-3" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="<?php echo URLROOT ?>">View Site</a>
        <a class="dropdown-item" href="<?php echo URLROOT; ?>/users/profile/<?php echo $_SESSION['user_id']; ?>">Profile</a>
              <a class="dropdown-item" href="<?php echo URLROOT; ?>/users/changepassword/<?php echo $_SESSION['user_id']; ?>">Password Change</a>
              <a class="dropdown-item" href="<?php echo URLROOT; ?>/users/logout">Logout</a>
        </div>
      </div>
    </div>
  </nav>
  <div class="row m-0">
    <div class="col-lg-2 bg-light">
      <nav class="navbar-expand-lg bg-light" style="width:100%">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav flex-column flex-fill">
            <li class="nav-item">
              <a class="nav-link mt-2" href="<?php echo URLROOT?>/cpanels">
                <h5><i class="fa fa-dashboard"></i> Dashboard</h5>
              </a>
            </li>

            <li class="nav-item dropdown">
              <a style="font-size: 1.25rem" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-gift"></i> Product
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?php echo URLROOT; ?>/cpanels/productadd">Add Product</a>
                <a class="dropdown-item" href="<?php echo URLROOT; ?>/cpanels/productview">View Products</a>
              </div>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" style="font-size: 1.25rem" href="#" id="navbarDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-align-center"></i> Category
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?php echo URLROOT;?>/cpanels/categoryadd">Add Category</a>
                <a class="dropdown-item" href="<?php echo URLROOT;?>/cpanels/categoryview">View Categories</a>
              </div>
            </li>

            <!-- <li class="nav-item dropdown">
              <a style="font-size: 1.25rem" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-users"></i> User
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Add User</a>
                <a class="dropdown-item" href="#">View Users</a>
              </div>
            </li>

            <li class="nav-item dropdown">
              <a style="font-size: 1.25rem" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-shopping-cart"></i> Order
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">View Users</a>
              </div>
            </li> -->

          </ul>
        </div>
      </nav>
    </div>
    <div class="col-lg-10 my-3">