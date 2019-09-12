<!DOCTYPE html>
<html lang="en">

<head>
<title>My Profile</title>
<!-- Bootstrap core CSS-->
<?php echo link_tag('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>
<!--link href="../assests/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"-->
<!-- Custom fonts for this template-->
<?php echo link_tag('assets/vendor/fontawesome-free/css/all.min.css'); ?>
<!--link href="../assests/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"-->
<!-- Page level plugin CSS-->
<?php echo link_tag('assets/vendor/datatables/dataTables.bootstrap4.css'); ?>
<!--link href="../assests/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet"-->
<!-- Custom styles for this template-->
<?php echo link_tag('assets/css/sb-admin.css'); ?>
<!--link href="../assests/css/sb-admin.css" rel="stylesheet"-->

  </head>

  <body id="page-top">

   <?php include APPPATH.'views/includes/header.php';?>

    <div id="wrapper">

      <!-- Sidebar -->
  <?php include APPPATH.'views/includes/sidebar.php';?>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?php echo site_url('Dashboard'); ?>">User</a>
            </li>
            <li class="breadcrumb-item active">My Profile</li>
          </ol>

          <!-- Page Content -->
          <h1>My Profile</h1>
          <hr>
<!---- Success Message ---->
<?php if ($this->session->flashdata('success')) { ?>
<p style="color:green; font-size:18px;"><?php echo $this->session->flashdata('success'); ?></p>
</div>
<?php } ?>

<!---- Error Message ---->
<?php if ($this->session->flashdata('error')) { ?>
<p style="color:red; font-size:18px;"><?php echo $this->session->flashdata('error');?></p>
<?php } ?> 



 <?php echo form_open('User_profile/updateprofile');?>




            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">

<?php echo form_input(['name'=>'first_name','id'=>'firstname','class'=>'form-control','autofocus'=>'autofocus','value'=>set_value('first_name',$profile->first_name)]);?>
<?php echo form_label('Enter your first name', 'first_name'); ?>
<?php echo form_error('first_name',"<div style='color:red'>","</div>");?>

                  </div>
                </div>
              </div>
            </div>


                  <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">

<?php echo form_input(['name'=>'last_name','id'=>'lastname','class'=>'form-control','autofocus'=>'autofocus','value'=>set_value('last_name',$profile->last_name)]);?>
<?php echo form_label('Enter your  last name', 'last_name'); ?>
<?php echo form_error('last_name',"<div style='color:red'>","</div>");?>

                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
               <div class="form-row">
                    <div class="col-md-6">
              <div class="form-label-group">

<?php echo form_input(['name'=>'email','id'=>'emailid','class'=>'form-control','autofocus'=>'autofocus','value'=>set_value('email',$profile->email)]);?>
<?php echo form_label('Enter valid email', 'email'); ?>
<?php echo form_error('email',"<div style='color:red'>","</div>");?>

              </div>
            </div>
</div>
</div>
     <div class="form-group">
       <div class="form-row">
            <div class="col-md-6">
              <div class="form-label-group">


              </div>
            </div>
  </div>
</div>

       <div class="form-row">
            <div class="col-md-6">  
 <?php echo form_submit(['name'=>'Update','value'=>'Update','class'=>'btn btn-primary btn-block']); ?>
</div>
</div>

 


 <?php echo form_close();?>

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
     <!--?php include APPPATH.'views/includes/footer.php';?-->

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>
  <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assets/js/sb-admin.min.js '); ?>"></script>

  </body>

</html>
