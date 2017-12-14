<? include('header.php')?>

<?php
function multiexplode ($delimiters,$string) {
   
    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return  $launch;
}
?>

 <div class="w3-container" style="margin-top:80px" id="showcase">

<div align="center">

<div class="search">
<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post">
 <br />
<input type="text" placeholder="Search..." name="query" />

	<input type="submit" class="button-mall" value="Search">
        </form>		

</div>
<?

echo "<br />";
echo "<br />";
?>
<?



if(isset($_POST['subject'])){


$sql = "select * from books where subject='".$_POST['subject']."'";
  $res = $conn->query($sql);
  
  if ($res->num_rows > 0) {
      // output data of each row
      while($ro = $res->fetch_assoc()) {
             
         echo '<div class="w3-container w3-card w3-white w3-round w3-margin" style=" width:300px;"><br>';

                echo "<a href='pdf.php?bid=".$ro["id"]."'><p>name: ".$ro['name'];
                echo "<br />";
                echo "subject: ".$ro['subject'];
                echo "<br />";
                echo "author: ".$ro['author'];
                echo "<br />";
        
                echo "time: ".$ro['datetime']."</p></a>";
         echo "</div>";
                echo "<br />";
             }
                    }


$conn->close();
}



?>

<?php if (isset($_POST['query'])){

$search=$_POST['query'];
$se=strtolower($search);
$s=multiexplode(array("-","."," ",",","_","+"),$se);


?>
 
<?

$sro = "select * from books";
  $res = $conn->query($sro);
  
  if ($res->num_rows > 0) {
      // output data of each row
  
      while($ro = $res->fetch_assoc()) {

     for($i=0;$i<count($s);$i++){
          if($s[$i]==$ro['name'] or $s[$i]==$ro['author']or $s[$i]==$ro['subject']){

              
                   
                   echo '<div class="w3-container w3-card w3-white w3-round w3-margin" style=" width:300px;"><br>';

                echo "<a href='pdf.php?bid=".$ro["id"]."'><p>name: ".$ro['name'];
                echo "<br />";
                echo "subject: ".$ro['subject'];
                echo "<br />";
                echo "author: ".$ro['author'];
                echo "<br />";
        
                echo "time: ".$ro['datetime']."</p></a>";
         echo "</div>";
                echo "<br />";

                   $i=count($s);
               
                                  
                              }   
                              }
                             }
                            }


}
?>
<?

if(empty($_POST)){
?>
<div class="w3-container">
<form method="post" enctype="multipart/form-data" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> >



<br />

Subject:
<input type="text" name="subject" />
 <br />
<br /> 
<br />


    <button type="submit" name="submit">submit</button>



</form>

</div>

<?
}
?>
<?

if(empty($_POST)){
?>
<div class="w3-container">

<p style="text-decoration:none"><a name="all" href="books.php?all" >All </a></p>


</div>

<?
}
?>

<?
if(isset($_GET['all'])){

$sql = "SELECT * from books";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       
                
           echo '<div class="w3-container w3-card w3-white w3-round w3-margin" style=" width:300px;"><br>';

                echo "<a href='pdf.php?bid=".$row["id"]."'><p>name: ".$row['name'];
                echo "<br />";
                echo "subject: ".$row['subject'];
                echo "<br />";
                echo "author: ".$row['author'];
                echo "<br />";
        
                echo "time: ".$row['datetime']."</p></a>";
         echo "</div>";
                echo "<br />";
    }
} else {
    echo "0 results";
}




}
?>
</div>
</div>
</div>

<? include('footer.php')?>
