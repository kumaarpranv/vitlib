<?



if(isset($_POST['email'])&&isset($_POST['message'])){




$to = "kumaarpranv@gmail.com";
$subject = "request";
$body = $_POST['message'];
$headers = "From:".$_POST['email'];

mail($to,$subject,$body,$headers);


header('location:index.php');


}




?>
