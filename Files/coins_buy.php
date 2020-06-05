<?php
session_start();
if(!isset($_SESSION['username'])){
  header('location:formlog.php');
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login/Sign Up</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="abcde.css">
<style>
.c{
  width:80px;
  background-color:yellow;
}


</style>
</head>
<body style="background: linear-gradient(110deg, #FFFFFF 50%,#5D6D7E 70%);">
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark " style="background-color: #4B0082	;position:fixed; width:1545px;top:0px;">
        <a class="navbar-brand" href="home.php"><img src="Logo.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
		  
      <li class="nav-link active" style="color:#7FFF00;">
      <div class="wallet">
		<?php 
			$na=$_SESSION['username'];
			$con =mysqli_connect('localhost','root');
			mysqli_select_db($con,'userregistration');
			$s="select ey_coins from usertable where name ='$na' ";
			$result=mysqli_query($con,$s);
			$rs=mysqli_fetch_array($result);
			echo "Balance ₹ $rs[0]";
		?>
	
	</div>
      </li>
      <li class="nav-item active">
      <a class="nav-link" href="coins_buy.php"> BUY MORE COINS </a>
      </li>
            <li class="nav-item ">
              <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
            </li>
			<li class="nav-item">
        <a class="nav-link" href="logout.php"> Logout </a>
      </li>
          </ul>
		  
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="c btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      
      </nav>
      </header>
      <div id="home_wave">
        </div>
      
<div style="position:absolute;top:110px;left:450px;">
	<div style="color:green;font-family: 'Libre Baskerville', serif;"> <?php 
				$na=$_SESSION['username'];
				$con =mysqli_connect('localhost','root');
				mysqli_select_db($con,'userregistration');
				$s="select ey_coins from usertable where name ='$na' ";
				$result=mysqli_query($con,$s);
				$rs=mysqli_fetch_array($result);
				echo "You Have $rs[0] Coins";
			?>
			</div>
			<br>
			<div class="form">
				<form method="POST" action=" ">
					<button class="submit" name="b1">500</button>
					<button class="submit"  name="b2">1000</button>
					<button class="submit"  name="b3">2000</button>
					<button class="submit" name="b4">5000</button><br>
					<input type="Text" name="t1" value="
					<?php
					if(isset($_POST['b1'])){$n=intval($_POST['t1'])+500;	echo $n;}
					if(isset($_POST['b2'])){$n=intval($_POST['t1'])+1000;	echo $n;}
					if(isset($_POST['b3'])){$n=intval($_POST['t1'])+2000;	echo $n;}
					if(isset($_POST['b4'])){$n=intval($_POST['t1'])+5000;	echo $n;}
					?>"><br>
					<button class="submit" name="b5">ADD COINS</button>
				</form>
			</div>
</div>
	
</body>	
</html>
<?php
	if(isset($_POST['b5'])){
	$n=intval($_POST['t1']);
	$na=$_SESSION['username'];
	$con =mysqli_connect('localhost','root');
	mysqli_select_db($con,'userregistration');
	$s="update usertable set ey_coins='$n' where name='$na'";
	mysqli_query($con,$s);
	echo $n+"coins added succesfully";
	}
	

?>

