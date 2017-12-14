<? include('header.php');?>

<?
echo "<br />";
echo "<br />";
echo "<br />";
echo "<br />";
echo "<br />";

if(isset($_GET["br"])and!isset($_GET["sub"])){

$br=$_GET["br"];
$bran = "select distinct(subject) from materials where branch='".$br."'";
  $res = $conn->query($bran);
  
  if ($res->num_rows > 0) {
      // output data of each row
   
      while($ro = $res->fetch_assoc()) {
                echo "<a href=categ.php?br=$br&&sub=".$ro['subject']."><h2> ".$ro['subject']."</h2></a>";
                
               
                
                                  }
                                   
                                                    }
}


if(isset($_GET["br"]) and isset($_GET["sub"])){

$br=$_GET["br"];
$sub=$_GET["sub"];
$bran = "select * from materials where branch='".$br."' and subject='".$sub."'";
  $res = $conn->query($bran);
  
  if ($res->num_rows > 0) {
      // output data of each row
   
      while($ro = $res->fetch_assoc()) {
                echo "<a href=pdf.php?pid=".$ro['id']."><h2> ".$ro['name']."</h2></a>";
            
               
                
                                  }
                                   
                                                    }
}


if(isset($_GET["sub"])and!isset($_GET["br"])){

$sub=$_GET["sub"];
$bran = "select * from materials where subject='".$sub."'";
  $res = $conn->query($bran);
  
  if ($res->num_rows > 0) {
      // output data of each row
   
      while($ro = $res->fetch_assoc()) {
                echo "<h5>name:<a href=pdf.php?pid=".$ro['id'].">".$ro['name']."</a> unit:".$ro['unit']." subject:".$ro['subject']." lecturer:".$ro['lecturer']." year:".$ro['year']."</h5>";
                
               
                
                                  }
                                   
                                                    }
}



?>








</div>


<? include('footer.php');?>
