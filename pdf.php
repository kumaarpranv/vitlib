
<?php include('header.php') ?>


<?

echo "<div align='center'>";


echo "<br />";
echo "<br />";
echo "<br />";

if(isset($_GET['mid'])){
$mid=$_GET['mid'];

$sro = "select * from materials where id=".$mid."";
  $res = $conn->query($sro);
  
  if ($res->num_rows > 0) {
      // output data of each row
      while($ro = $res->fetch_assoc()) {

          echo "<object data='".$ro["address"]."' type='application/pdf' width='400' height='450'>";

echo "<a href='".$ro["address"]."'>".$ro["name"]."</a>";

echo "</object>";

echo "<br />";
echo "<a href='".$ro["address"]."' >fullview</a>";
echo "</div>";

                                        }
                            }


}
if(isset($_GET['qid'])){
$mid=$_GET['qid'];

$sro = "select * from qp where id=".$mid."";
  $res = $conn->query($sro);
  
  if ($res->num_rows > 0) {
      // output data of each row
      while($ro = $res->fetch_assoc()) {

          echo "<object data='".$ro["address"]."' type='application/pdf' width='400' height='450'>";

echo "<a href='".$ro["address"]."'>".$ro["name"]."</a>";

echo "</object>";

echo "<br />";
echo "<a href='".$ro["address"]."' >fullview</a>";
echo "</div>";

                                        }
                            }


}
if(isset($_GET['bid'])){
$mid=$_GET['bid'];

$sro = "select * from books where id=".$mid."";
  $res = $conn->query($sro);
  
  if ($res->num_rows > 0) {
      // output data of each row
      while($ro = $res->fetch_assoc()) {

          echo "<object data='".$ro["address"]."' type='application/pdf' width='400' height='450'>";

echo "<a href='".$ro["address"]."'>".$ro["name"]."</a>";

echo "</object>";

echo "<br />";
echo "<a href='".$ro["address"]."' >fullview</a>";
echo "</div>";

                                        }
                            }


}

?>

</div>
<? include('footer.php');?>
