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
<!-- 		<ul class="nav navbar-nav">
			<li><a href="#/">DB Status: <?=$db_status?></a></li>
		</ul> -->
	       <form method="POST" class="navbar-form navbar-right" enctype="application/x-www-form-urlencoded" action="#">
		        <button type="button" class="btn btn-warning" id="create_db" onclick="divert(this.id)">
    				<span class="glyphicon glyphicon-new-window"></span> 
    				Create Database
  				</button>

  				<button type="button" class="btn btn-warning" id="create_tbC" onclick="divert(this.id)">
    				<span class="glyphicon glyphicon-new-window"></span> 
    				Seed Corporate Table
  				</button>

  				<button type="button" class="btn btn-warning" id="create_tbO" onclick="divert(this.id)">
    				<span class="glyphicon glyphicon-new-window"></span> 
    				Create Order Table
    			</button>
	      	</form>			    
	  	</div>
	</nav>
