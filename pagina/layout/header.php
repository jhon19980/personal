<?php include '../layout/session.php'; ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Clinica Versalles</title>

  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../layout/apps/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../layout/apps/dist/css/adminlte.min.css">


  <!-- jQuery -->
  <script src="../layout/apps/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../layout/apps/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../layout/apps/dist/js/adminlte.min.js"></script>



  <style>
    h5,
    h6 {
      text-align: center;
    }


    @media print {
      .btn-print {
        display: none !important;
      }

      .main-footer {
        display: none !important;
      }

      .box.box-primary {
        border-top: none !important;
      }

      .nav_menu {
        display: none;
      }

      footer {
        display: none;
      }


    }
  </style>


  <!---dataTable--->

  <?php include 'dbcon.php'; ?>
</head>