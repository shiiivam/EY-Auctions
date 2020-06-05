<?php

session_start();
header('location:formlog.php');
$con =mysqli_connect('localhost','root');
mysqli_select_db($con,'userregistration');
$na=$_POST['userna'];
$ema=$_POST['emai'];
$pass=$_POST['passw'];
$s="select * from usertable where name='$na' ";

$result=mysqli_query($con,$s);
$num=mysqli_num_rows($result);
if($num==1){
  echo "Username already taken";

}
else{
  $reg="insert into usertable(name,email,password) values('$na','$ema','$pass')";
  mysqli_query($con,$reg);
  echo "Registered successfully";
}
?>