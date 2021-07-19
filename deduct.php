<?php
include'Database.php';

if(isset($_POST['submit'])){
	$from_user=$_POST['from_user'];
	$receiver_name=$_POST['deduct_cust'];
	$amount=$_POST['amount'];

	/*receiver*/
	$query=mysqli_query($con,"select * from customer where name='$receiver_name';");
	$row=mysqli_fetch_array($query);

	$balance=$row['balance'];
	$receiver=$row['name'];

	/*main user*/
	$query2=mysqli_query($con,"select * from customer where id='$from_user';");
	$row=mysqli_fetch_array($query2);
	$sender_id=$row['id'];

	$balance2=$row['balance'];
	$sender=$row['name'];

	if($amount<0){
		echo "<script>alert('Oops! Negative values cannot be transferred');
			window.location='customers.php';
			</script>";
	}
	else if($amount>$balance2){
		echo "<script>alert('Oops! Insufficient Balance');
			window.location='customers.php';
			</script>";
	}
	else if($amount==0){
		echo "<script>alert('Oops! Zero value cannot be transferred');
			window.location='customers.php';
			</script>";
	}
	else{
		/*adding money to receiver*/
		$add_balance=$balance+$amount;
		$update1=mysqli_query($con,"UPDATE customer set balance='$add_balance' where name='$receiver_name';");

		/*subtracting from main user*/
		$sub_balance=$balance2-$amount;
		$update2=mysqli_query($con,"UPDATE customer set balance='$sub_balance' where id='$from_user';");

		/*transaction history*/
		$query=mysqli_query($con,"INSERT INTO transaction(sender_id,sender,receiver,amount) VALUES('$sender_id','$sender','$receiver','$amount');");

		if($query){
			echo "<script>alert('Transaction Successful');
                     window.location='history.php';      
                  </script>";
		}

	}
}
?>
























<?php
/*include"Database.php";

$from_user=$_POST['from_user'];
$c_name=$_POST['deduct_cust'];
$amount=$_POST['amount'];*/

/*adding money to receiver
$query=mysqli_query($con,"select * from customer where name='$c_name';");

$row=mysqli_fetch_array($query);

$balance=$row['balance'];
$receiver=$row['name'];


$add_balance=$balance+$amount;

$update1=mysqli_query($con,"update customer set balance='$add_balance' where name='$c_name';");

*/

/*subtracting from main user*/

/*$query2=mysqli_query($con,"select * from customer where id='$from_user';");

$row=mysqli_fetch_array($query2);

$balance2=$row['balance'];
$sender=$row['name'];

$sub_balance=$balance2-$amount;

$update2=mysqli_query($con,"update customer set balance='$sub_balance' where id='$from_user';");*/


/*transaction history*/

/*$sender_id='$from_user';

$query2=mysqli_query($con,"INSERT INTO transaction('sender_id','sender','receiver','amount') VALUES('$sender_id','$sender','$receiver');");

echo $query2;
if($query2){
	echo "<script>alert('Transaction Successful');
	window.location='tranfer.php';
	</script>";
}
else{
	echo "error";
}
	

*/
?>