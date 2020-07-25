<?php
 $username= $_POST['username'];
 $gender= $_POST['gender'];
 $college=  $_POST['college'];
 $email= $_POST['email'] ;
 $phone= $_POST['phno'] ;
 $pass_1= $_POST['pwd'] ;

  
$conn = new mysqli('localhost', 'root','qwer123' ,'startup');

if($conn->connect_error){
    die('connection failed : ' . $conn->connect_error);

}
$duplicate=mysqli_query($conn,"select * from user where username='$username' or email='$email'");
if (mysqli_num_rows($duplicate)>0)
{
header("Location: registerms.html");
}
else{
date_default_timezone_set("Asia/Calcutta");
$date1 = date("Y-m-d H:i:s");
$stmt=$conn->prepare("insert into user(date, username, gender, college , email , phno, pwd) values 
    (?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssis", $date1 ,$username , $gender, $college , $email ,$phone ,$pass_1);
    $stmt->execute();
    header("location: homems.html" );
    $stmt->close();
    $conn->close();
}

?>