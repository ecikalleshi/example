<html>
<head>
	<title>CodeIgniter Shoutbox</title>
	<!-- Bootstrap core CSS-->
<?php echo link_tag('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>
<!-- Custom fonts for this template-->
<?php echo link_tag('assets/vendor/fontawesome-free/css/all.min.css'); ?>
<!-- Page level plugin CSS-->
<?php echo link_tag('assets/vendor/datatables/dataTables.bootstrap4.css'); ?>
<!-- Custom styles for this template-->
<?php echo link_tag('assets/css/sb-admin.css'); ?>
	<script type="text/javascript" src="../public/js/jquery-1.4.2.min.js"></script>
	<!--script type="text/javascript" src='<?php echo base_url('public/js/jquery-1.4.2.min.js'); ?>' ></script-->
	<script type="text/javascript">
		$(document).ready(function(){
			
			loadMsg();			
			hideLoading();
						
			$("form#chatform").submit(function(){
											
				$.post("/login/index.php/chati/update",{
							message: $("#content").val(),
							name: $("#name").val(),
							action: "postmsg"
						}, function() {
					
					$("#messagewindow").prepend("<b>"+$("#name").val()+"</b>: "+$("#content").val()+"<br />");
					
					$("#content").val("");					
					$("#content").focus();
				});		
				return false;
			});
			
			
		});

		function showLoading(){
			$("#contentLoading").show();
			$("#txt").hide();
			$("#author").hide();
		}
		function hideLoading(){
			$("#contentLoading").hide();
			$("#txt").show();
			$("#author").show();
		}
		
		function addMessages(xml) {
			
			$(xml).find('message').each(function() {
				
				author = $(this).find("author").text();
				msg = $(this).find("text").text();
				
				$("#messagewindow").append("<b>"+author+"</b>: "+msg+"<br />");
			});
			
		}
		
		function loadMsg() {
			$.get("/login/index.php/chati/backend", function(xml) {
				$("#loading").remove();				
				addMessages(xml);
			});
			
		//setTimeout('loadMsg()', 2000);

		setTimeout(function() {
 		 location.reload();
		}, 3000);
		}
	</script>
	<style type="text/css">
		#messagewindow {
			height: 250px;
			border: 1px solid;
			padding: 5px;
			overflow: auto;
		}
		#wrappe {
			margin: auto;
			width: 438px;
		}
	</style>
</head>
<body id="page-top">

<?php include APPPATH.'views/includes/header.php';?>
<div id="wrapper">
<?php include APPPATH.'views/includes/sidebar.php';?>

	<div id="wrappe">
	<p id="messagewindow"><span id="loading">Loading...</span></p>
	<form id="chatform">
	<div id="author">
	Name: 
	<input name="name" type="text" id="name" value="<?php echo $this->session->userdata('username');?>">
	</div><br />

	<div id="txt">
	Message: <input type="text" name="content" id="content" value="" />
	</div>
	
	<div id="contentLoading" class="contentLoading">  
	<img src='<?php echo base_url('public/images/blueloading.gif'); ?>' alt="Loading data, please wait...">  
	<!--img src="public/images/blueloading.gif" alt="Loading data, please wait..."-->  
	</div><br />
	
	<input type="submit" value="ok" /><br />
	</form>
	</div>

	<!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

    <!-- Page level plugin JavaScript-->
    <script src="<?php echo base_url('assets/vendor/chart.js/Chart.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/datatables/jquery.dataTables.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.js'); ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assets/js/sb-admin.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/demo/datatables-demo.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/demo/chart-area-demo.js'); ?>"></script>
</body>
</html>