<html>
<head>
	<title>CodeIgniter Shoutbox - JSON edition</title>
	<script type="text/javascript" src="../public/js/jquery-1.4.2.min.js"></script>
	<!--script type="text/javascript" src="/js/jquery-1.4.2.min.js"></script-->
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
		
		function addMessages(json) {
			//console.log(json);
			
			$.each(json, function(i,val){
				//console.log(val.id);
				$("#messagewindow").append("<b>"+val.user+"</b>: "+val.msg+"<br />");				
			});
		}
		
		function loadMsg() {
			$.getJSON("/login/index.php/chati/json_backend", function(json) {
				$("#loading").remove();				
				addMessages(json);
			});
			
			//setTimeout('loadMsg()', 4000);
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
		#wrapper {
			margin: auto;
			width: 438px;
		}
	</style>
</head>
<body>
<?php include APPPATH.'views/includes/header.php';?>
<?php include APPPATH.'views/includes/sidebar.php';?>
	<div id="wrapper">
	<p id="messagewindow"><span id="loading">Loading...</span></p>
	<form id="chatform">
	<div id="author">
	Name: <input type="text" id="name" />
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
</body>
</html>