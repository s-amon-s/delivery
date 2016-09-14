<!DOCTYPE html>
<html>
  <head>
  	<title>TCDC Delivery</title>
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">

    	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    	<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
    	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


      <style>

        @media screen and (min-width: 180px){
            .yokform{
            width: 82%;
            }
            .amon{
              margin: 0 auto;
            }
        }

        @media screen and (min-width: 480px){
          .yokform{

          width: 70%;
          }
          .amon{
            margin: 0 auto;
          }
        }


        @media screen and (min-width: 660px){
          .yokform{
          width: 29%;
          }
          .amon{
            margin: 0 auto;
          }
        }
      </style>
  </head>
	<body id="amon">
  	<nav class="navbar navbar-default" >
  		<div class="container-fluid">
    		<div class="navbar-header">
    			<a class="navbar-brand" href="#">Order-Customer Relationship</a>
    	</div>
	    <form method="POST" class="navbar-form navbar-right" enctype="application/x-www-form-urlencoded" action="#">
        <button type="button" class="btn btn-warning" id="<?=$db_url?>" onclick="divert(this.id)">
    			<span class="glyphicon glyphicon-new-window"></span> 
    			<?=$db_code?>
  			</button>

				<button type="button" class="btn btn-warning" id="<?=$tbC_url?>" onclick="divert(this.id)">
  				<span class="glyphicon glyphicon-new-window"></span> 
  				<?=$tbC_code?>
				</button>

				<button type="button" class="btn btn-warning" id="<?=$tbO_url?>" onclick="divert(this.id)">
  				<span class="glyphicon glyphicon-new-window"></span> 
  				<?=$tbO_code?>
  			</button>
	    </form>			    
  	</div>
  </nav>
  <div align="center">
    <a href="#" id="create_oi_table"> Create order_item table</a>
    <a href="#" id="show_order_table"> Show Order table</a>
    <a href="#" id="show_corporate_table"> Show Corporate table</a>
    Seed Table &nbsp;<select id="seed_table" >
      <option value="">  -- </option>
      <option value="orders.sql"> Order Table </option>
      <option value="corporate.sql"> Corporate Table </option>
      <option value="orders_items.sql"> Order Item Table </option>
    </select>
  </div>
    