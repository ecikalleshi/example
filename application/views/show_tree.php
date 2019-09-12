<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Employees List</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/jquery.dataTables.css'?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/dataTables.bootstrap4.css'?>">


<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
<link href="../assets/css/style.min.css" rel="stylesheet">
<!--link rel="stylesheet" href="base_url() ?>global/site/dist/style.min.css" /-->
<script src="../assets/js/jstree.min.js"></script>
<!--script src="base_url() ?>global/site/dist/jstree.min.js"></script-->


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.css" />
<script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.9.1.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.js"></script>

</head>

<body>
    <script type="text/javascript">
            $(document).ready(function(){

                //setting to hidden field
                //fill data to tree  with AJAX call
                $('#tree-container').on('changed.jstree', function (e, data) {
                    var i, j, r = [];
                    // var state = false;
                    for(i = 0, j = data.selected.length; i < j; i++) {
                        r.push(data.instance.get_node(data.selected[i]).id);
                    }
                    //$('#txttuser').val(r.join(','));
                    $('#txttuser').html('Selected: ' + r.join(', '));
                }).jstree({
                            'plugins': ["wholerow","checkbox"],
                            'core' : {
                                "multiple" : true,
                                'data' : {
									url: "/index.php/getChildren",
									//"url" : "<?php echo base_url() . 'index.php/tree/show_tree'; ?>",
                                    //"url" : "base_url() ?>index.php/tree/getChildren",
                                    "dataType" : "json" // needed only if you do not supply JSON headers
                                }
                            },
                            'checkbox': {
                                three_state: false,
                                cascade: 'up'
                            },
                            'plugins': ["checkbox"]
                        }
                )
            });
</script>


<div class="row">

    <div class="container">


        <input type="hidden" name="node" id="node" value="" />

        <div class="form-group">
            <div id="tree-container"></div>
            </div>
            <div id="txttuser"></div>
        </div>
    </div>


    <div class="container">
	
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
                    </tr>
                </thead>
                <tbody id="show_data">
                    
                </tbody>
            </table>
        </div>
    </div>
        
</div>


<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.2.1.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.dataTables.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/dataTables.bootstrap4.js'?>"></script>



<script type="text/javascript">
	$(document).ready(function(){
		show_emp();	//call function show all product
		
		$('#mydata').dataTable();
		 
		//function show all product
		function show_emp(){
		    $.ajax({
		        type  : 'ajax',
		        url   : '<?php echo site_url('tree/emp_data')?>',
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
		                        '<td style="text-align:right;">'+
                                    '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-emp_id="'+data[i].empId+'" data-first_name="'+data[i].first_name+'" data-last_name="'+data[i].last_name+'" data-email="'+data[i].email+'">Edit</a>'+' '+
                                    '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-emp_id="'+data[i].empId+'">Delete</a>'+
                                '</td>'+
		                        '</tr>';
		            }
		            $('#show_data').html(html);
		        }

		    });
		}


	});

</script>
</body>
</html>










		

    

