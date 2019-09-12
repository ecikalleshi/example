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

<!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script-->
  </head>

<!link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

  <body id="page-top">

  <style type="text/css">
  #blah {
  width: 100px;
  height: 100px;
  border: 2px solid;
  display: block;
  margin: 10px;
  background-color: white;
  border-radius: 5px;
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  transition: all 0.3s cubic-bezier(.25,.8,.25,1);
  overflow: hidden;
}

input[type=submit] {
  background-color: black;
  color: white;
}
#bt{
  background-color: black;
}

</style>

  <script type="text/javascript">
 function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
 
          reader.onload = function (e) {
              $('#blah')
                  .attr('src', e.target.result);
          };
 
          reader.readAsDataURL(input.files[0]);
      }
  }
 
 $(document).ready(function(){  
      $('#upload_form').on('submit', function(e){  
           e.preventDefault();  
           if($('#image_file').val() == '')  
           {  
                alert("Please Select the File");  
           }  
           else 
           {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>index.php/ajax/ajaxImageStore",   
                     method:"POST",  
                     data:new FormData(this),  
                     contentType: false,  
                     cache: false,  
                     processData:false,  
                     dataType: "json",
                     success:function(res)  
                     {  
                        console.log(res.success);
                        if(res.success == true){
                         $('#blah').attr('src','<?= base_url() ?>assets/images/<?= $this->session->userdata('profileImage');?>');   
                         $('#msg').html(res.msg);   
                         $('#divMsg').show();   
                        }
                        else if(res.success == false){
                          $('#msg').html(res.msg); 
                          $('#divMsg').show(); 
                        }
                        setTimeout(function(){
                         $('#msg').html('');
                         $('#divMsg').hide(); 
                        }, 3000);
                     }  
                });  
           }  
      });  
 });  

</script>

   <?php include APPPATH.'views/includes/header.php';?>

    <div id="wrapper">

      <!-- Sidebar -->
  <?php include APPPATH.'views/includes/sidebar.php';?>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">User</a>
            </li>
            <li class="breadcrumb-item active">My Profile</li>
          </ol>

          <!-- Page Content -->
          <h1>My Profile</h1>
          <hr>
<?php echo form_open('profile/update_data')?>

<div class="form-group">
<div class="form-row">
<div class="col-md-6">
<div class="form-label-group">
    Firstname:
    <input name="firstname" value="<?php echo $this->session->userdata('firstname');?>">
</div>
</div>
</div>
</div>

<div class="form-group">
<div class="form-row">
<div class="col-md-6">
<div class="form-label-group">           
    Lastname:
    <input name="lastname" value="<?php echo $this->session->userdata('lastname');?>">
</div>
</div>
</div>
</div>


<div class="form-group">
<div class="form-row">
<div class="col-md-6">
<div class="form-label-group">
    Email:
    <input name="email" value="<?php echo $this->session->userdata('email');?>">
</div>
</div>
</div>
</div>


<!--div class="form-group">
<div class="form-row">
<div class="col-md-6">
<div class="form-label-group">            
    Profile Image: 
    <img alt="image" src="<?= base_url() ?>assets/images/<?= $this->session->userdata('profileImage');?>"  width="100" height="100"/>

    <input type="file" name="fileToUpload" id="fileToUpload">

</div>
</div>
</div>
</div-->

<div class="form-row">
<div class="col-md-6">  
    <input type="submit" name="Update" value="Update">
</div>
</div>

<?php echo form_close();?>
<br/>
<div  class="container">
   <div class="row">
   <form method="post" id="upload_form" enctype="multipart/form-data">  
     <div class="col-md-7">
       
        <div id="divMsg" class="alert alert-success" style="display: none">
         <span id="msg"></span>
        </div>
    
        Profile Image:
        <img id="blah" src="<?= base_url() ?>assets/images/<?= $this->session->userdata('profileImage');?>" alt="your image" />
         <input type="file" name="image_file" multiple="true" accept="image/*" id="finput" onchange="readURL(this);"></br></br>
         <button id="bt" class="btn btn-success">Upload</button>
     </div>
     <div class="col-md-5"></div>
   </form>
   </div>
 </div> 

 
<!--div class="form-row">
<div class="col-md-6">  
    <input type="submit" name="Update" value="Update">
</div>
</div-->



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



