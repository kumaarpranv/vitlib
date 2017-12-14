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



if(isset($_POST['year']) and isset($_POST['branch']) and isset($_POST['subject'])){


$sql = "select * from qp where year=".$_POST['year']." and branch='".$_POST['branch']."'and subject='".$_POST['subject']."'";
  $res = $conn->query($sql);
  
  if ($res->num_rows > 0) {
      // output data of each row
      while($ro = $res->fetch_assoc()) {
             
 echo '<div class="w3-container w3-card w3-white w3-round w3-margin" style=" width:300px;"><br>';

     echo "<a href='pdf.php?qid=".$ro["id"]."'><p>";
     
                echo "subject: ".$ro['subject'];
                echo "<br />";
                echo "branch: ".$ro['branch'];
                echo "<br />";
                echo "year: ".$ro['year'];
               echo "<br />";
                echo "time: ".$ro['datetime']."</p>"."</a>";
                echo "<div />";
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

$sro = "select * from qp";
  $res = $conn->query($sro);
  
  if ($res->num_rows > 0) {
      // output data of each row
   
      while($ro = $res->fetch_assoc()) {

     for($i=0;$i<count($s);$i++){
          if($s[$i]==$ro['branch'] or $s[$i]==$ro['subject']){
 echo '<div class="w3-container w3-card w3-white w3-round w3-margin" style=" width:300px;"><br>';

     echo "<a href='pdf.php?qid=".$ro["id"]."'><p>";
     
                echo "subject: ".$ro['subject'];
                echo "<br />";
                echo "branch: ".$ro['branch'];
                echo "<br />";
                echo "year: ".$ro['year'];
               echo "<br />";
                echo "time: ".$ro['datetime']."</p>"."</a>";
                echo "<div />";
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



 Year :
     <select name="year">
  <option value="1">first</option>
  <option value="2">second</option>
  <option value="3">third</option>
  <option value="4">final</option>
</select> 
 <br />
<br />  
<br />
Branch:
 <select name="branch">
  <option value="cse">CSE</option>
  <option value="ece">ECE</option>
  <option value="eee">EEE</option>
  <option value="civil">Civil</option>
  <option value="mech">Mechanical</option>
  <option value="other">Other</option>
</select> 
<br />
 <br />
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

<p style="text-decoration:none"><a name="all" href="qp.php?all" >All </a></p>


</div>

<?
}
?>

<?
if(isset($_GET['all'])){

$sql = "SELECT * from qp";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       
 echo '<div class="w3-container w3-card w3-white w3-round w3-margin" style=" width:300px;"><br>';

     echo "<a href='pdf.php?qid=".$row["id"]."'><p>";
     
                echo "subject: ".$row['subject'];
                echo "<br />";
                echo "branch: ".$row['branch'];
                echo "<br />";
                echo "year: ".$row['year'];
               echo "<br />";
                echo "time: ".$row['datetime']."</p>"."</a>";
                echo "<div />";
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
