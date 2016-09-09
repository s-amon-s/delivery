<!DOCTYPE html>
<html>
<head>
	<title>TCDC Delivery</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
</head>
<body id="amon">

	<nav class="navbar navbar-default" >
		<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">Order-Customer Relationship</a>
		</div>
		<ul class="nav navbar-nav">
			<li><a href="#/">DB Status: <?=$db_status?></a></li>
		</ul>
	        <form method="POST" class="navbar-form navbar-right" enctype="application/x-www-form-urlencoded" action="">
		        <button type="button" class="btn btn-warning" onclick="divert('<?=$db_url?>')">
    				<span class="glyphicon <?=$db_logo?>"></span> 
    				<?=$db_code?>
  				</button>

  				<button type="button" class="btn btn-warning" onclick="divert('<?=$tbC_url?>')">
    				<span class="glyphicon <?=$db_logo?>"></span> 
    				<?=$tbC_code?>
  				</button>

  				<button type="button" class="btn btn-warning" onclick="divert('<?=$tbO_url?>')">
    				<span class="glyphicon <?=$db_logo?>"></span> 
    				<?=$tbO_code?>
    			</button>
	      	</form>			    
	  	</div>
	</nav>
	

 <script>
function divert(url) {
	console.log(url);
  location.replace(url);
  }
</script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>
</html>