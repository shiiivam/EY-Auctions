<?php
session_start();

$con =mysqli_connect('localhost','root');
mysqli_select_db($con,'userregistration');
$ema=$_POST['emai'];
$pass=$_POST['passw'];
$s="select * from usertable where email ='$ema' && password='$pass' ";
$result=mysqli_query($con,$s);
$arr=mysqli_fetch_array($result);
$num=mysqli_num_rows($result);
echo $num;
if($num==1){
    $_SESSION['username']=$arr[0];
  header('location:home.php');
  echo $_SESSION['username'];

}
else{
header('location:formlog.php');
}

?>