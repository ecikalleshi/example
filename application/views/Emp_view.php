<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Employees List</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/jquery.dataTables.css'?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/dataTables.bootstrap4.css'?>">
</head>
<body>

  <?php include('admin_dashboard_view.php');?>

  <div class="container">
	  <!-- Page Heading -->
    <div class="row">
        <div class="col-12">
            <div class="col-md-12">
                <h1>Employees
                    <small>List</small>
                    <div class="float-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Add New</a></div>
                </h1>
            </div>
            
            <table class="table table-striped" id="mydata">
                <thead>
                    <tr>
						            <th>Employee Id</th>  
                        <th>First Name</th>  
                        <th>Last Name</th>  
					              <th>Email</th> 
					              <!--th>Department Id</th-->
                        <th style="text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody id="show_data">
                    
                </tbody>
            </table>
        </div>
    </div>
        
</div>

		<!-- MODAL ADD -->
            <form>
            <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Employee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                        <!--div class="form-group row">
                            <label class="col-md-2 col-form-label">Employee Id</label>
                            <div class="col-md-10">
                              <input type="text" name="emp_id" id="emp_id" class="form-control" placeholder="Employee Id">
                            </div>
                        </div-->
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">First Name</label>
                            <div class="col-md-10">
                              <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Last Name</label>
                            <div class="col-md-10">
                              <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name">
                            </div>
                        </div>
						
						          <div class="form-group row">
                            <label class="col-md-2 col-form-label">Email</label>
                            <div class="col-md-10">
                              <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                            </div>
                        </div>
						<!--div class="form-group row">
                            <label class="col-md-2 col-form-label">Department Id</label>
                            <div class="col-md-10">
                              <input type="text" name="department_id" id="department_id" class="form-control" placeholder="Department Id">
                            </div>
                        </div-->
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">User Level</label>
                            <div class="col-md-10">
                              <input type="text" name="user_level" id="user_level" class="form-control" placeholder="1 (admin) or 2 (employee)">
                            </div>
                        </div>
						
						
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" type="submit" id="btn_save" class="btn btn-primary">Save</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
        <!--END MODAL ADD-->

        <!-- MODAL EDIT -->
        <form>
            <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Employee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Employee Id</label>
                            <div class="col-md-10">
                              <input type="text" name="emp_id_edit" id="emp_id_edit" class="form-control" placeholder="Employee Id" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">First Name</label>
                            <div class="col-md-10">
                              <input type="text" name="first_name_edit" id="first_name_edit" class="form-control" placeholder="First Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Last Name</label>
                            <div class="col-md-10">
                              <input type="text" name="last_name_edit" id="last_name_edit" class="form-control" placeholder="Last Name">
                            </div>
                        </div>
						            <div class="form-group row">
                            <label class="col-md-2 col-form-label">Email</label>
                            <div class="col-md-10">
                              <input type="text" name="email_edit" id="email_edit" class="form-control" placeholder="Email">
                            </div>
                        </div>
						            <!--div class="form-group row">
                            <label class="col-md-2 col-form-label">Department Id</label>
                            <div class="col-md-10">
                              <input type="text" name="department_id_edit" id="department_id_edit" class="form-control" placeholder="Department Id">
                            </div>
                        </div-->
						
						
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" type="submit" id="btn_update" class="btn btn-primary">Update</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
        <!--END MODAL EDIT-->

        <!--MODAL DELETE-->
         <form>
            <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Employee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                       <strong>Are you sure to delete this record?</strong>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="emp_id_delete" id="emp_id_delete" class="form-control">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" type="submit" id="btn_delete" class="btn btn-primary">Yes</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
        <!--END MODAL DELETE-->

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.2.1.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.dataTables.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/dataTables.bootstrap4.js'?>"></script>

<script type="text/javascript">

//Whenever you use jQuery to manipulate your web page, you wait until the document ready event has fired. 
//The document ready event signals that the DOM of the page is now ready, so you can manipulate it 
//without worrying that parts of the DOM has not yet been created. 

	$(document).ready(function(){
		show_emp();	//call function show all emp
		
		$('#mydata').dataTable(); //call datatable
    //Datatables is a plugin built from jquery to display data in table form and 
    //has integrated with filters, show per page, and pagination.
		 
		//function show all emp
		function show_emp(){
		    $.ajax({
		        type  : 'ajax', //http request
		        url   : '<?php echo site_url('Emp/emp_data')?>', //retrieve data
		        async : false, //requests are sent synchronously
		        dataType : 'json', //type of data that you're expecting back from the server
		        success : function(data){ //A callback function to be executed when Ajax request succeeds
		            var html = '';
		            var i;
		            for(i=0; i<data.length; i++){

		                html += '<tr>'+
		                  		    '<td>'+data[i].empId+'</td>'+
		                          '<td>'+data[i].first_name+'</td>'+
		                          '<td>'+data[i].last_name+'</td>'+
								              '<td>'+data[i].email+'</td>'+
								              //'<td>'+data[i].departmentId+'</td>'+
		                          '<td style="text-align:right;">'+
                                    '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-emp_id="'+data[i].empId+'" data-first_name="'+data[i].first_name+'" data-last_name="'+data[i].last_name+'" data-email="'+data[i].email+'">Edit</a>'+' '+
                                    '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-emp_id="'+data[i].empId+'">Delete</a>'+
                              '</td>'+
		                        '</tr>';
		            }
		            $('#show_data').html(html); //sets the content (innerHTML) of the selected elements
		        }

		    });
		}

        //Save emp
        $('#btn_save').on('click',function(){
            //var empId = $('#emp_id').val();
            var first_name = $('#first_name').val();
            var last_name  = $('#last_name').val();
			      var email  = $('#email').val();
            var user_level = $('#user_level').val();
			      //var departmentId  = $('#department_id').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('Emp/save')?>",
                dataType : "JSON",
                data : { first_name:first_name, last_name:last_name, email:email, user_level:user_level}, //, departmentId:departmentId},
                success: function(data){
                    //$('[name="emp_id"]').val("");
                    $('[name="first_name"]').val("");
                    $('[name="last_name"]').val("");
					          $('[name="email"]').val("");
                    $('[name="user_level"]').val("");
					          //$('[name="department_id"]').val("");
                    $('#Modal_Add').modal('hide');
                    show_emp();
                }
            });
            return false;
        });
		


        //get data for update record
        $('#show_data').on('click','.item_edit',function(){
            //attach data of any type to DOM elements
            var empId = $(this).data('emp_id');
            var first_name = $(this).data('first_name');
            var last_name  = $(this).data('last_name');
			      var email      = $(this).data('email');
			      //var departmentId  = $(this).data('department_id');
			
            $('#Modal_Edit').modal('show');
            $('[name="emp_id_edit"]').val(empId);
            $('[name="first_name_edit"]').val(first_name);
            $('[name="last_name_edit"]').val(last_name);
			      $('[name="email_edit"]').val(email);
			      //$('[name="department_id_edit"]').val(departmentId);
        });


        //update record to database
         $('#btn_update').on('click',function(){
			 
            var empId = $('#emp_id_edit').val();
            var first_name = $('#first_name_edit').val();
            var last_name  = $('#last_name_edit').val();
			      var email      = $('#email_edit').val();
			      //var departmentId      = $('#department_id_edit').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('emp/update')?>",
                dataType : "JSON",
                data : {empId:empId , first_name:first_name, last_name:last_name, email:email}, //, departmentId:departmentId},
				
                success: function(data){
                    $('[name="emp_id_edit"]').val("");
                    $('[name="first_name_edit"]').val("");
                    $('[name="last_name_edit"]').val("");
					          $('[name="email_edit"]').val("");
					          //$('[name="department_id_edit"]').val("");
                    $('#Modal_Edit').modal('hide');
                    show_emp();
				
                }
				
            });
            return false;
        });


        //get data for delete record
        $('#show_data').on('click','.item_delete',function(){
            var empId = $(this).data('emp_id');
            
            $('#Modal_Delete').modal('show');
            $('[name="emp_id_delete"]').val(empId);
        });


        //delete record to database
         $('#btn_delete').on('click',function(){
            var empId = $('#emp_id_delete').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('emp/delete')?>",
                dataType : "JSON",
                data : {empId:empId},
                success: function(data){
                    $('[name="emp_id_delete"]').val("");
                    $('#Modal_Delete').modal('hide');
                    show_emp();
                }
            });
            return false;
        });

	});

</script>
</body>
</html>