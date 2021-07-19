<?php
include"Database.php";

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<title>Transfer Money</title>
</head>
<body style="background-color:#e6e6e6; margin-top:5%;">
<!--navbar-->
<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: #000066;">
	<div class="container-fluid">
		<div class="navbar-header" style="margin-left: 80px;">
			<!--button for responsive-->
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNav">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php">BasicBankingSystem</a>
		</div>
		<div class="collapse navbar-collapse" id="myNav">
			<ul class="nav navbar-nav navbar-right">
				<li class=""><a href="index.php">Home</a></li>
				<li class=""><a href="Customers.php" class="active">View Customers</a></li>
				<li class="active"><a href="">Transfer Money</a></li>
				<li class=""><a href="history.php">Transaction History</a></li>
		    </ul>
		</div>
		
	</div>
</nav>



<div class="container">
	<h1 style="text-align: center;"><u>Transaction</u></h1> <br><br>
  	<div class="row">
    	<div class="col-sm-2">
      
    	</div>
	    <div class="col-sm-8">
	      	<table class="table table-hover">
	      		<thead>
	      			<tr>
	      				<th>Id</th>
	      				<th>Name</th>
	      				<th>Email</th>
	      				<th>Balance</th>
	      			</tr>
	      		</thead>
	      			<?php 
	      				include"Database.php";

	      				if(isset($_POST['submit'])){
	      					$c_id=$_POST['customer_id'];

	      				
	      				$query=mysqli_query($con,"select * from customer where id='$c_id';");

	      				while ($row=mysqli_fetch_array($query)) {
	      					# code...
	
	      			?>
	      			<tbody>
		      			<tr>
		      				<th><?php echo $row['id']; ?></td>
		      				<td><?php echo $row['name']; ?></td>
		      				<td><?php echo $row['email']; ?></td>
		      				<td><?php echo $row['balance']; ?></td>
		      			</tr>
	      			</tbody>
	      			<?php } ?>
	      			<?php } ?>
	      	</table>
	      	<br><br>

	      	<label>Transfer to :</label>
	      	<form method="post" action="deduct.php">
	      		<div class="form-group">
		      		<select class="form-control" id="" style="background-color: #f2f2f2;" name="deduct_cust">
		      		<?php
		      			$query=mysqli_query($con,"select * from customer where id!='$c_id';");

		      			while ($row=mysqli_fetch_array($query)) {
		      				
		      		?>	
		      		<option><?php echo $row['name'];?></option>
		      		<?php } ?>
		      		</select>
		      	</div>
		      	<div class="form-group">
		      		<label>Enter amount :</label>
		      		<input type="number" name="amount" class="form-control" placeholder="Amount" style="background-color: #f2f2f2;" required="">
		      	</div>
		      	<div>
		      		<input type="hidden" name="from_user" value="<?php echo $c_id=$_POST['customer_id'];?>">
		      	</div>
		      	<div class="form-group">
		      		<input type="submit" name="submit" value="Submit" class="btn btn-primary form-control">
		      	</div>
	      	</form>
	      	
	      	
	    </div>

	    <div class="col-sm-2"></div>
  	</div>
</div>

</body>
</html>
