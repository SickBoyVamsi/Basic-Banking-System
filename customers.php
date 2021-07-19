
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<title>All customers</title>
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
				<li class="active"><a href="Customers.php" class="active">View Customers</a></li>
				<li class=""><a href="">Transfer Money</a></li>
				<li class=""><a href="history.php">Transaction History</a></li>
		      	<li class=""></li>
		    </ul>
		</div>
		
	</div>
</nav>



<div class="container">
	<h1 style="text-align: center;"><u>All Customers</u></h1> <br><br>
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
	      				<th>Details</th>
	      			</tr>
	      		</thead>

	      			<?php 
	      				include"Database.php";
	      				$query=mysqli_query($con,"select * from customer;");


	      				while ($row=mysqli_fetch_array($query)){
	      					# code...
	      					$id=$row['id'];
	      					$name=$row['name'];
	      					$email=$row['email'];
	      					$balance=$row['balance'];
	      					
	      			?>
	      			<tbody>
		      			<tr>
		      				<th><?php echo $id; ?></td>
		      				<td><?php echo $name; ?></td>
		      				<td><?php echo $email; ?></td>
		      				<td><?php echo $balance; ?></td>
		      				<td>
		      					<form method="post" action="transfer.php">
		      						<input type="hidden" name="customer_id" value="<?php echo $id ?>">
		      						<input type="submit" name="submit" value="Show Details" class="btn btn-primary">
		      					</form>
		      				</td>
		      			</tr>
	      			</tbody>

	      		<?php } ?>
	      	</table>
	    </div>
	    <div class="col-sm-2">
	      
	    </div>
  	</div>
</div>

</body>
</html>