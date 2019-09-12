<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.css" />
  <script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.js"></script>


<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Employees List</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/jquery.dataTables.css'?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/dataTables.bootstrap4.css'?>">


  <!--title>PHP Codeigniter 3 - Create Dynamic Treeview Example - ItSolutionStuff.com</title-->
  
</head>
<body>
<?php include('admin_dashboard_view.php');?>
<div class="container">
  <!--div class="panel panel-default"-->
    <!--div class="panel-heading"-->
      <!--h1>PHP Codeigniter 3 - Create Dynamic Treeview Example - ItSolutionStuff.com</h1-->
    <!--/div-->
    <div class="panel-body">
      <div class="col-md-8" id="treeview_json">
      </div>
      <div id="selectable-output"></div>
        </div>
    </div>
  <!--/div-->
<!--/div-->


<div class="container"-->
	
    <div class="row">
        <div class="col-12">
            <div class="col-md-12">
                <h1>Employees
                    <small>List</small>
                    <!--div class="float-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Add New</a></div-->
                </h1>
            </div>
            
            <table class="table table-striped" id="mydata">
                <thead>
                    <tr>
						<th>Employee Id</th>  
                        <th>First Name</th>  
                        <th>Last Name</th>  
					    <th>Email</th> 
                    </tr>
                </thead>
                <tbody id="show_data">
                    
                </tbody>
            </table>
        </div>
    </div>
        
</div>
  
<script type="text/javascript">
$(document).ready(function(){
  
   var treeData;
   
   $.ajax({
        type: "GET",  
        url: "TreeController/getItem",
        dataType: "json",       
        success: function(response)  
        {
           initTree(response);

        }   
  });
    


function initTree(treeData) {
 
    $('#treeview_json').treeview({data: treeData,
 
       onNodeSelected: function(event, data,){
        // alert(data.departmentId);
         show_emp_dep();
          $('#mydata').dataTable();
		 
            function show_emp_dep(){
                $.ajax({
                    type:"post",
                    url   : '<?php echo site_url('TreeController/emp_info')?>',
                    //async : false,
                    dataType : 'json',
                    data:{ id:data.departmentId}, //data to be sent to the server.It can be JSON object, string or array.
                    success : function(response){
                        var html = '';
                        var i;
                        for(i=0; i<response.length; i++){
                    
                            html += '<tr>'+
                                  '<td>'+response[i].empId+'</td>'+
                                  '<td>'+response[i].first_name+'</td>'+
                                  '<td>'+response[i].last_name+'</td>'+
                                  '<td>'+response[i].email+'</td>'+
                                    '</tr>';
                        }
                        $('#show_data').html(html);
                    }

                });
            }
       }
    });
}     
});
</script>


<script type="text/javascript">
	$(document).ready(function(){
		show_emp();	//call function show all product
		
		$('#mydata').dataTable();
		 
		//function show all product
		function show_emp(){
		    $.ajax({
		        type  : 'ajax',
		        url   : '<?php echo site_url('TreeController/emp_data')?>',
		        async : false,
		        dataType : 'json',
		        success : function(data){
		            var html = '';
		            var i;
		            for(i=0; i<data.length; i++){
						
		                html += '<tr>'+
		                  		'<td>'+data[i].empId+'</td>'+
		                      '<td>'+data[i].first_name+'</td>'+
		                      '<td>'+data[i].last_name+'</td>'+
								          '<td>'+data[i].email+'</td>'+
		                        '</tr>';
		            }
		            $('#show_data').html(html);
		        }

		    });
		}


	});

</script>

<!--script type="text/javascript">
	$(document).ready(function(){
		show_emp();	//call function show all product
		
		$('#mydata').dataTable();
		 
		//function show all product
		function show_emp(){
		    $.ajax({
		        type  : 'ajax',
		        url   : '<?php echo site_url('TreeController/emp_info')?>',
		        async : false,
		        dataType : 'json',
		        success : function(data){
		            var html = '';
		            var i;
		            for(i=0; i<data.length; i++){
						
		                html += '<tr>'+
		                  		'<td>'+data[i].empId+'</td>'+
		                      '<td>'+data[i].first_name+'</td>'+
		                      '<td>'+data[i].last_name+'</td>'+
								          '<td>'+data[i].email+'</td>'+
		                        '</tr>';
		            }
		            $('#show_data').html(html);
		        }

		    });
		}


	});

</script-->
   
</body>
</html>