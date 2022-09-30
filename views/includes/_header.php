<?php 
if (!isset($_SESSION['user']) || $_SESSION['user'] == null) {
    return header('Location:?login');
}
 ?>

<!DOCTYPE html>
<html dir="ltr" lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="storage/images/{{config('app.icon')}}">
    <title>Gestion Bibliotheque</title>
    <!-- Custom CSS -->
    <link href="assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
     <!-- Custom CSS -->
    <link href="assets/dist/css/style.min.css" rel="stylesheet">
    <link href="assets/flag-icon/css/flag-icon.min.css" rel="stylesheet">
    <link href="assets/borderCard.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-tagsinput.css">
    
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css"> -->
    <link rel="stylesheet" type="text/css" href="assets/DataTables/css/jquery.dataTables.min.css"/>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <style>
        .active{
            border-top-right-radius: 25px!important;
            border-bottom-right-radius: 25px!important;
        }
        #sidebarnav .active{
            background: rgb(104, 101, 101);
            color: white!important;
        }

    </style>

</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <!-- <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div> -->
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">

        <?php require_once("views/includes/_navbar.php"); ?>
        <?php require_once("views/includes/_sidebar.php"); ?>

        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb card topbar bg-white" style="z-index: 1;">
                <div class="row">
                    <div  id="typed-element" class="col-md-7 align-self-center">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1 display-4">
                            <i class="fas fa-arrows-alt"></i><?= ucfirst($_GET['page']) ?> </h3>

                    </div>
                    <h3 class="page-title text-truncate text-dark font-weight-medium mb-1 display-4" id="typed"></h3>
                    <div class="col-5 align-self-center">
                        <div class="customize-input float-right">

                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid" style="margin-top: 90px;">

                <?php  require_once('views/includes/_flash.php'); ?>