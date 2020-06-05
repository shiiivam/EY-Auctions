<?php
session_start();
if(!isset($_SESSION['username'])){
  header('location:formlog.php');
}

?>

<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Fjalla+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Righteous&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<style>
    .abt {
      background-color: #4B0082;
      height:200px;
      width:100%;
    }
  .carousel-inner img {
    width: 100%;
    height: 100%;
  }
  .demo{

  	text-align: center;
  font-size: 60px;
  margin-top: 0px;
  }
  </style>
   <style>
   	h4{

font-family: 'Oswald', sans-serif;


   	}
   	p{
   		font-family: 'Libre Baskerville', serif;
   	}
   	    
      hr{
        border: 0;
        height: 1px;background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));
        background-color:#FF7482;
    }
     .vertical { 
            border-left: 2px solid #900C3F; 
            height: 100%;
            position:absolute; 
            left: 100%; 
            background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));
            -webkit-box-shadow: inset -1px 3px 8px 5px #1F87FF, 2px 5px 16px 0px #0B325E, 5px 5px 15px 5px rgba(0,0,0,0); 
            border-radius: 20px;

        } 

.a:hover{
-webkit-box-shadow: 0px 10px 13px -7px #000000, 5px 5px 15px 5px rgba(0,0,0,0); 
box-shadow: 0px 10px 13px -7px #000000, 5px 5px 15px 5px rgba(0,0,0,0);
}
.button {
  border-radius: 2px;
  background-color: #FF0066;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 16px;
  padding: 10px;
  width: 150px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 2px;
 
  font-family: 'Fjalla One', sans-serif;>
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}
.button:hover{
	background-color: #7D3C98;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
.c{
	background-color:#FFEB3B;
	color:#52BE80;
}

</style>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
<link href="https://fonts.googleapis.com/css?family=Bad+Script|Dancing+Script|Galada|Great+Vibes|Kaushan+Script|Lobster|Merienda|Parisienne|Playball|Tangerine&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Libre+Baskerville&display=swap" rel="stylesheet">
</head>
<body style="background: linear-gradient(110deg, #FFFFFF 50%,#e0d6ff 70%);">
<header>
	<nav class="navbar navbar-expand-lg navbar-dark " style="background-color: #4B0082	;">
  <a class="navbar-brand" href="home.php"><img src="logo.png"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>


  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
    <li class="nav-link active">
    <p style="font-family: 'Libre Baskerville', serif;">	Welcome <?php echo $_SESSION['username']; ?>
    </li>
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
      <li class="nav-item active">
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
      
        <a class="nav-link" href="sell_upload.php" tabindex="-1" aria-disabled="true">Sell Product</a>
        
     
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="c btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>

</nav>
</header>

<section >


	<div class="container-fluid">
	
	<div class="row mb-5 pt-5">
		<div class="col-lg-2 col-md-2 col-12  text-center pl-3">
<h4 class="animated bounceInRight" style="font-family: 'Libre Baskerville', serif;"> Important Dates</h4>
<hr class=" mx-auto w-25 animated zoomIn" style="border: 0;height: 1px;background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));">

 <div class = "vertical animated zoomIn"></div>
		 </div>

		 <div class="text-center col-lg-10 col-md-10 col-col-12 ">
		 <h4 class="animated bounceInRight text-center" style="font-family: 'Libre Baskerville', serif;"> Ongoing Auctions</h4>
		 <hr class=" mx-auto w-25 animated zoomIn" style="border: 0;height: 1px;background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));">

		 <p style="font-family: 'Merienda';" class="animated zoomIn">  </p> 
		 <section>
<div class="container pb-5 text-center pt-3" >


<div class="  row text-center pt-3"> 
<?php
  $na=$_SESSION['username']; 
  $con =mysqli_connect('localhost','root');
  mysqli_select_db($con,'userregistration');
  $q="select product_name,category,price,img,date,description,product_id from products ";
  $result=mysqli_query($con,$q) or die(mysqli_error($con));
  while($rs=mysqli_fetch_array($result)){
  ?>
  <div class="a col-lg-4 col-md-4 col-12 " > 
  <div class="card" >
  <img class="card-img-top" src="<?php echo $rs['img'];?>" height=200 width=200 alt="Card image" >
  <div class="card-body" style="">
    <h4 class="card-title" ><?php echo $rs['product_name'];?></h4>
    <p class="card-text" ><?php echo "Category : ".$rs['category'];?></p>


<!--<p id="demo"></p>

<script>
// Set the date we're counting down to
var countDownDate = new Date("").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>-->
  <p class="card-text" ><?php echo "Start Price : ".$rs['price'];?></p>

    <a href="logged_product.php"><button class="button" ><span>View Product</span></button></a>
    

  </div>
</div>
 </div>
</div>
    <?php }?>
  </section>
		 


		</div>

	 </div>
 </div>
  </section>

  <footer class="abt container-fluid" >
    <div class="row">
    <div class="col-lg-2 col-12 ">
      <center><h6 style="font-family: 'Libre Baskerville', serif;color:#B9A49F;padding-top:10px;">About</h6></center>
      <ul style="list-style-type:none;color:white;font-family: 'Libre Baskerville', serif;color:white;padding-top:10px;font-size: 14px;">
          <li style="padding-left:30px;"> Contact Us </li>
          <li style="padding-left:30px;"> About Us </li>
         
          
           
           
         </ul>
    </div>
    <div class="col-lg-2 col-12 ">
        <center><h6 style="font-family: 'Libre Baskerville', serif;color:#B9A49F;padding-top:10px;">Help</h6></center>
        <ul style="list-style-type:none;color:white;font-family: 'Libre Baskerville', serif;color:white;padding-top:10px;font-size: 14px;">
            <li style="padding-left:30px;"> FAQ</li>
            <li style="padding-left:30px;"> Cancellation </li>
            
            
             
             
           </ul>
      </div>
      <div class="col-lg-2 col-12 ">
          <center><h6 style="font-family: 'Libre Baskerville', serif;color:#B9A49F;padding-top:10px;">Policy </h6></center>
          <ul style="list-style-type:none;color:white;font-family: 'Libre Baskerville', serif;color:white;padding-top:10px;font-size: 14px;">
              <li style="padding-left:30px;"> Terms & Conditions </li>
              <li style="padding-left:30px;"> Privacy Policy</li>
              
              
               
               
             </ul>
        </div>
        <div class="col-lg-2 col-12 ">
          <center><h6 style="font-family: 'Libre Baskerville', serif;color:#B9A49F;padding-top:10px;">Social</h6></center>
          <ul style="list-style-type:none;color:white;font-family: 'Libre Baskerville', serif;color:white;padding-top:10px;font-size: 14px;">
              <li style="padding-left:30px;"> Facebook  </li>
              <li style="padding-left:30px;"> Instagram </li>
              <li style="padding-left:30px;"> Twitter </li>
              
               
               
             </ul>

          </div>
          <div class="col-lg-2 col-12 ">
              <center><h6 style="font-family: 'Libre Baskerville', serif;color:#B9A49F;padding-top:10px;">Mail Us</h6></center>
              <ul style="list-style-type:none;color:white;font-family: 'Libre Baskerville', serif;color:white;padding-top:10px;font-size: 14px;">
                  <li style="padding-left:30px;"> Ey@google.com</li>
                  
                  
                   
                   
                 </ul>
            
            </div>
            <div class="col-lg-2 col-12 ">
              <center><h6 style="font-family: 'Libre Baskerville', serif;color:white;padding-top:10px;font-family: 'Libre Baskerville', serif;color:#B9A49F;padding-top:5px;">Registered Address</h6></center>
                <ul style="list-style-type:none;color:white;font-family: 'Libre Baskerville', serif;color:white;padding-top:10px;font-size: 14px;">
                 
                    <li style="padding-left:30px;"> Sharda University, Knowledge Park 3  </li>
                    <li style="padding-left:30px;"> Pari Chowk, Greater Noida </li>
                    <li style="padding-left:30px;"> 201310</li>
                    <li style="padding-left:30px;"> Uttar Pardesh </li>
                    
                   
                  
                </ul>
              </div>
              
              
    </div>
  </footer>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>