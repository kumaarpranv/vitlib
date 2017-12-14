<? include('header.php');?>



  <!-- Header -->
  <div class="w3-container" style="margin-top:80px" id="showcase">
    <?php if(isset($email)){
          echo '<h1><b>Welcome, </b>'.$name.'</h1>';
            
     }   
     else{  
    echo '<h1 class="w3-jumbo"><b>Welcome to</b></h1>';

 }?>  
 <h1 class="w3-xxxlarge w3-text-red"><b>VITLIB</b></h1>
  <hr style="width:50px;border:5px solid red" class="w3-round">

 <p>We are trying to publish every pdf materials and books of engineering of PBR VITS affl. JNTUA in the website. so everyone can access the resources free </p>
  </div>
  
<div class="w3-container" style="margin-top:80px" id="showcase">

 <h1 class="w3-xxxlarge w3-text-red"><b>Latest</b></h1>
  <hr style="width:50px;border:5px solid red" class="w3-round">
<?php

$sq="SELECT * FROM materials ORDER BY datetime DESC LIMIT 3";

$res = $conn->query($sq);
  
  if ($res->num_rows > 0) {
      // output data of each row
      while($ro = $res->fetch_assoc()) {
     
          echo "<object data='".$ro["address"]."' type='application/pdf' width='450' height='600'>";
echo "<a href='".$ro["address"]."'>".$ro["name"]."</a>";
echo "</object>";
echo "<a href='".$ro["address"]."' >fullview</a>";

                                        }
                            }

?>

</div>
 <div class="w3-container" id="links" style="margin-top:75px">
 <div style="float:left;width:33%;margin-left:375px;">


<?php
  if(isset($authUrl)) {
    print "<a class='login' href='javascript:void(0);'><img alt='Signin in with Google' src='google.png' width='200' height='50'/></a>";
  } else {
   
   //   print "<a class='logout' href='logout.php'>Logout</a>";
  }
?>
</div>
      </div>
     
    

  
  <!-- Contact -->
  <div class="w3-container" id="request" style="margin-top:75px">
    <h1 class="w3-xxxlarge w3-text-red"><b>Request</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round">
    <p>if you have any Requests or queries ready to help :)</p>
    <form action="request.php" method="post">
      <div class="w3-section">
        <label>Name</label>
        <input class="w3-input w3-border" type="text" name="name" <? if(isset($name)){ echo"value=".$name."";} ?>required>
      </div>
      <div class="w3-section">
        <label>Email</label>
        <input class="w3-input w3-border" type="text" name="email" <?if(isset($email)){ echo"value=".$email."";} ?> required>
      </div>
      <div class="w3-section">
        <label>Message</label>
        <input class="w3-input w3-border" type="text" name="message" required>
      </div>
      <input type="submit" value="submit" class="w3-button w3-block w3-padding-large w3-red w3-margin-bottom" />
    </form>  
</div>




<? include('footer.php');?>
