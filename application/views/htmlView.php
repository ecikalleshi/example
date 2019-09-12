<html>
<head>
	<title>CodeIgniter Shoutbox</title>

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
	<p id="messagewindow">
	
	<?php echo $html; ?>
		
	</p>
	<form id="chatform" action="/login/index.php/chati/update" method="post">
	<div id="author">
	Name: <input name="name" type="text" id="name" value="<?php echo $this->session->userdata('username');?>"> 
	</div><br />

	<div id="txt">
	Message: <input type="text" name="message" id="content" value="" />
	</div>
	
	<br />
	<input type="hidden" name="action" value="postmsg" />
	<input type="hidden" name="html_redirect" value="true" >
	<input type="submit" value="ok" /><br />
	</form>
	</div>
</body>
</html>