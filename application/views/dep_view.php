<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Departments List</title>
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
                <h1>Departments
                    <small>List</small>
                    <div class="float-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Add New</a></div>
                </h1>
            </div>
            
            <table class="table table-striped" id="mydata">
                <thead>
                    <tr> 
                          
					  <th>Department Id</th>
						<th>Department Name</th> 
						<th>Department Code</th> 
            <th>Main Department</th>
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
                    <h5 class="modal-title" id="exampleModalLabel">Add New Department</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Department Id</label>
                            <div class="col-md-10">
                              <input type="text" name="departmentId" id="departmentId" class="form-control" placeholder="Department Id">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Department Name</label>
                            <div class="col-md-10">
                              <input type="text" name="departmentName" id="departmentName" class="form-control" placeholder="Department Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Department Code</label>
                            <div class="col-md-10">
                              <input type="text" name="departmentCode" id="departmentCode" class="form-control" placeholder="Department Code">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Main Department</label>
                            <div class="col-md-10">
                              <input type="text" name="departmentMain" id="departmentMain" class="form-control" placeholder="Main Department">
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit Department</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Department Id</label>
                            <div class="col-md-10">
                              <input type="text" name="departmentId_edit" id="departmentId_edit" class="form-control" placeholder="Department Id" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Department Name</label>
                            <div class="col-md-10">
                              <input type="text" name="departmentName_edit" id="departmentName_edit" class="form-control" placeholder="Department Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Department Code</label>
                            <div class="col-md-10">
                              <input type="text" name="departmentCode_edit" id="departmentCode_edit" class="form-control" placeholder="Department Code">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Main Department</label>
                            <div class="col-md-10">
                              <input type="text" name="departmentMain_edit" id="departmentMain_edit" class="form-control" placeholder="Main Department">
                            </div>
                        </div>
						

                        <!--div class="form-group row">
                        <label class="col-md-2 col-form-label">Main Department</label>
                        <div class="col-md-10">
                        
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
                    <h5 class="modal-title" id="exampleModalLabel">Delete Department</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                       <strong>Are you sure to delete this record?</strong>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="departmentId_delete" id="departmentId_delete" class="form-control">
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
	$(document).ready(function(){
		show_dep();	//call function show all product
		
		$('#mydata').dataTable();
		 
		//function show all dep
		function show_dep(){
		    $.ajax({
		        type  : 'ajax',
		        url   : '<?php echo site_url('dep/dep_data')?>',
		        async : false,
		        dataType : 'json',
		        success : function(data){
		            var html = '';
		            var i;
		            for(i=0; i<data.length; i++){
						
		                html += '<tr>'+
								'<td>'+data[i].departmentId+'</td>'+
		                        '<td>'+data[i].departmentName+'</td>'+
		                        '<td>'+data[i].departmentCode+'</td>'+
                            //'<td>'+data[i].id_dep+'</td>'+
                            '<td>'+data[i].main_dep+'</td>'+
		                        '<td style="text-align:right;">'+
                                    '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-department_id="'+data[i].departmentId+'" data-department_name="'+data[i].departmentName+'" data-department_code="'+data[i].departmentCode+'" data-department_main="'+data[i].main_dep+'">Edit</a>'+' '+
                                    '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-department_id="'+data[i].departmentId+'">Delete</a>'+
                                '</td>'+
		                        '</tr>';
		            }
		            $('#show_data').html(html);
		        }

		    });
		}

        //Save product
        $('#btn_save').on('click',function(){
            var departmentId = $('#departmentId').val();
            var departmentName = $('#departmentName').val();
            var departmentCode  = $('#departmentCode').val();
            var departmentMain  = $('#departmentMain').val();
			
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('dep/save')?>",
                dataType : "JSON",
                data : {departmentId:departmentId , departmentName:departmentName, departmentCode:departmentCode, departmentMain:departmentMain},
                success: function(data){
                    $('[name="departmentId"]').val("");
                    $('[name="departmentName"]').val("");
                    $('[name="departmentCode"]').val("");
                    $('[name="departmentMain"]').val("");
                    $('#Modal_Add').modal('hide');
                    show_dep();
					
					
                }
            });
            return false;
        });
		


        //get data for update record
        $('#show_data').on('click','.item_edit',function(){
            var departmentId = $(this).data('department_id');
            var departmentName = $(this).data('department_name');
            var departmentCode  = $(this).data('department_code');
            var departmentMain  = $(this).data('department_main');
            
			//console.log(first_name);
			//console.log(last_name);
			
            $('#Modal_Edit').modal('show');
            $('[name="departmentId_edit"]').val(departmentId);
            $('[name="departmentName_edit"]').val(departmentName);
            $('[name="departmentCode_edit"]').val(departmentCode);
            $('[name="departmentMain_edit"]').val(departmentMain);
			//console.log(last_name);
			
        });

        //update record to database
         $('#btn_update').on('click',function(){
			 
            var departmentId = $('#departmentId_edit').val();
            var departmentName = $('#departmentName_edit').val();
			//console.log(first_name);
            var departmentCode  = $('#departmentCode_edit').val();
            var departmentMain  = $('#departmentMain_edit').val();
			//console.log(last_name);
			
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('dep/update')?>",
                dataType : "JSON",
                data : {departmentId:departmentId , departmentName:departmentName, departmentCode:departmentCode, departmentMain:departmentMain},
				//console.log(first_name);
                success: function(data){
                    $('[name="departmentId_edit"]').val("");
                    $('[name="departmentName_edit"]').val("");
                    $('[name="departmentCode_edit"]').val("");
                    $('[name="departmentMain_edit"]').val("");
                    $('#Modal_Edit').modal('hide');
                    show_dep();
					//console.log(first_name);
				    //console.log(last_name);
					//console.log($data);
                }
				
            });
            return false;
        });

        //get data for delete record
        $('#show_data').on('click','.item_delete',function(){
            var departmentId = $(this).data('department_id');
            
            $('#Modal_Delete').modal('show');
            $('[name="departmentId_delete"]').val(departmentId);
        });

        //delete record to database
         $('#btn_delete').on('click',function(){
            var departmentId = $('#departmentId_delete').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('dep/delete')?>",
                dataType : "JSON",
                data : {departmentId:departmentId},
                success: function(data){
                    $('[name="departmentId_delete"]').val("");
                    $('#Modal_Delete').modal('hide');
                    show_dep();
                }
            });
            return false;
        });

	});

</script>
</body>
</html>