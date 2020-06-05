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
span{
	font-family: 'Libre Baskerville', serif;
}
input{
	font-family: 'Libre Baskerville', serif;
}
textarea{
	font-family: 'Libre Baskerville', serif;
}

</style>
</head>
<body style="background: linear-gradient(110deg, #eef2f3 50%, #8e9eab 70%);">
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark " style="background-color: #4B0082; width:auto;top:0px;">
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
      <li class="nav-item ">
      <a class="nav-link" href="coins_buy.php"> BUY MORE COINS </a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="home.php"> Buy Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="your_post.php">Your Posts <span class="sr-only">(current)</span></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="logout.php"> Logout </a>
      </li>
      

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Category
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#"> Cars</a>
          <a class="dropdown-item" href="#">Bikes</a>
          <a class="dropdown-item" href="#">Real State</a>
          <a class="dropdown-item" href="#">Furnishings</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      
        <a class="nav-link active" href="sell_upload.php" tabindex="-1" aria-disabled="true">Sell Product</a>
		  <li class="nav-item">
        <a class="nav-link" href="logout.php"> Logout </a>
      </li>
            <li class="nav-item">
              <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
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
      
<div style="margin-top: 70px; ">
	<!--<a href="home.php"><p><-Back</p></a>-->
	
			<div class="form" style="position:absolute;left:490px;border-radius:100px;background: linear-gradient(110deg, #948E99 50%,#abbaab 70%);">
				<div class="box"><form method="POST" action=" " enctype="multipart/form-data">
					<label>
					<span>Name of Product</span>
					<input type="text" name="t1">
					</label>
					<label>
					<span>Category</span>
					<div class="box">
					<select >
					<option>Choose a category</option>
					<option value="Mobile" name="o1">Mobile</option>
					<option value="Laptop" name="o1">Laptop</option>
					<option value="Furniture" name="o1">Furniture</option>
					<option value="Car" name="o1">Car</option>
					</select>
                    </div>
					</label>
					<label>
					<span>Enter Price</span>
					<input type="text" name="t2">
					</label>
					<label>
					<span>Choose an image</span>
					<input type="file" name="f1">
					</label>
					<label>
					<span>Date till which bids can be made</span>
					<input type="date" name="d1">
					</label>
					<label>
					<span>Description</span>
					<textarea style="background-image:url(images/form_bg.jpg);
	background-repeat:repeat-x;
	border:1px solid yellow;
	width: 230px;
	height: 60px;
	color:#333333;
	padding:3px;
	margin-right:4px;
	margin-bottom:8px;
	font-family:tahoma, arial, sans-serif;"name="ta1" rows="5" cols="20"></textarea>
					</label>
					<button type="submit" class="submit" name="b1">Upload</button>
				</form>
</div>
			</div>
</div>

	
</body>	
</html>
<?php
	$pname=" ";$cate=" ";$prc=" ";$dt=" ";$des=" ";$file=" ";    
	$na=$_SESSION['username'];
	$con =mysqli_connect('localhost','root');
	mysqli_select_db($con,'userregistration');
	if(isset($_POST['b1'])){
		if(isset($_POST['t1'])){
			$pname=$_POST['t1'];
		}
		if(isset($_POST['o1'])){
			$cate=$_POST['o1'];
		}
		if(isset($_POST['t2'])){
			$prc=$_POST['t2'];
		}
		if(isset($_POST['d1'])){
			$dt=$_POST['d1'];
		}
		if(isset($_POST['ta1'])){
			$des=$_POST['ta1'];
		}
		if(isset($_FILES['f1']))
					{
						$a=".";
						$errors= array();
						$file_name = $_FILES['f1']['name'];
						$file_size =$_FILES['f1']['size'];
						$file_tmp =$_FILES['f1']['tmp_name'];
						$file_type=$_FILES['f1']['type'];
						$file_ext=explode($a,$file_name);
						$file_ext=end($file_ext);
						$extensions= array("jpeg","jpg");
      
						if(in_array($file_ext,$extensions)=== false)
						{
							$errors[]="extension not allowed, please choose a JPEG or JPG file.";
						}
      
						if($file_size > 12097152)
						{
							$errors[]='File size must be excately 2 MB';
						}
      
						if(empty($errors)==true)
						{
							if(!file_exists("upload/$na/"))
							{
								mkdir("upload/$na/");
							}
							move_uploaded_file($_FILES['f1']['tmp_name'],"upload/$na/".$file_name);
							
							$file="upload/$na/".$file_name." ";
							
							
						}
						else
						{
						print_r($errors);
						}
					}
		
	$query="insert into products(name,product_name,category,price,img,date,description) values('$na','$pname','$cate','$prc','$file','$dt','$des')";
	if(mysqli_query($con,$query)){
	
		echo "<p style='position:absolute;top:1000px;right:625px;font-family: 'Libre Baskerville', serif;'>Product uploaded</p>";
	
	}
	}

?>

