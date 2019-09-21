<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!$this->session->userdata('login_user')){
    redirect('login');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Product</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('public/plugins/admin-assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('public/plugins/admin-assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

  <link href="<?php echo base_url('public/plugins/bootstrap-notify/'); ?>animate.css" rel="stylesheet">
  <link href="<?php echo base_url('public/css/'); ?>jquery.dataTables.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <style type="text/css">
    .error{
      color: #ff0000;
      font-size: 10px;
    }
  </style>

  <?php $this->load->view('product/product_form'); ?>

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php $this->load->view('sections/sidebar'); ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <!-- Sidebar -->
    <?php $this->load->view('sections/topbar'); ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <?php 
                $this->load->view('product/product_grid',$grid_data);
            ?>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
        <?php $this->load->view('sections/footer-admin') ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('public/plugins/admin-assets/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url('public/plugins/admin-assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('public/plugins/admin-assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('public/plugins/admin-assets/'); ?>js/sb-admin-2.min.js"></script>
  <script src="<?php echo base_url('public/js/'); ?>jquery.dataTables.min.js"></script>

  <!-- notification plugin -->
  <script src="<?php echo base_url('public/plugins/bootstrap-notify/'); ?>bootstrap-notify.min.js"></script>
  <script src="<?php echo base_url('public/plugins/bootstrap-notify/'); ?>notify-msg.js"></script>

  <!-- other functions -->

  <script src="<?php echo base_url('public/plugins/validation/'); ?>custom-validation.js"></script>

<script>
	$(document).ready( function () {
			$('#dataTable').DataTable();
	} );

	function openForm(isEdit){
		$('#productForm').modal();
	}
</script>


</body>

</html>
