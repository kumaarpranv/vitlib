<?php
include('header.php');

if($_FILES['file_upload']['error'] > 0){
    die('An error ocurred when uploading.');
}


if($_FILES['file_upload']['type']!='application/pdf'){
 
   die('Only PDF format is supported.. use apps like camscanner,pdf converter to converted image files to PDF');

}

if($_POST['categ']=='materials'){
// Check for errors



$_FILES['file_upload']['name']="material -".$_POST['subject']."-".$_POST['year']."-".$_POST['branch']."-".$_POST['unit'];

 $sr = "select * from materials where year='".$_POST['year']."' and branch='".$_POST['branch']."' and subject='".$_POST['subject']."' and unit='".$_POST['unit']."'";
  $res = $conn->query($sr);
  
 $lo=0; 
  if ($res->num_rows > 0) {
      // output data of each row
      while($ro = $res->fetch_assoc()) {
          if($ro["unit"]==$_POST["unit"]){
          
           $lo=-1;
           $lo=$lo+$lo;
                                         }
                                        }
                            }



// Check filetype

$my_time= date("Y-m-d H:i:s");

// Check if the file exists
if(file_exists('upload/' . $_FILES['file_upload']['name']) and $lo !=0){
   die('File duplicate exists! please change');
}

$sql="insert into materials(name,email,datetime,year,branch,subject,description,unit,address)values('".$_FILES['file_upload']['name']."','".$email."','".$my_time."','".$_POST["year"]."','".$_POST["branch"]."','".$_POST["subject"]."','".$_POST["description"]."','".$_POST["unit"]."','upload/".$_FILES['file_upload']['name']."')";
// Upload file
 if ($conn->query($sql) === TRUE) {
     
 }
 else {
     echo "Error: " . $sql . "<br>" . $conn->error;
 }
 

if(!move_uploaded_file($_FILES['file_upload']['tmp_name'], 'upload/' . $_FILES['file_upload']['name'])){
    die('Error uploading file - check destination is writeable.');
}


$conn->close();



}
if($_POST['categ']=='qp'){
// Check for errors


$_FILES['file_upload']['name']="questionpaper-".$_POST['subject']."-".$_POST['branch']."-".$_POST['year']."-".$_POST['sem'];


 $sr = "select * from qp where year='".$_POST['year']."' and subject='".$_POST['subject']."' and branch ='".$_POST['branch']."'";
  $res = $conn->query($sr);
  
 $lo=0; 
  if ($res->num_rows > 0) {
      // output data of each row
      while($ro = $res->fetch_assoc()) {
          if($ro["sem"]==$_POST["sem"]){
          
           $lo=-1;
           $lo=$lo+$lo;
                                         }
                                        }
                            }



// Check filetype

$my_time= date("Y-m-d H:i:s");

// Check if the file exists
if(file_exists('upload/' . $_FILES['file_upload']['name']) and $lo !=0){
   die('File duplicate exists! please change');
}

$sql="insert into qp(name,email,datetime,year,branch,subject,sem,address)values('".$_FILES['file_upload']['name']."','".$email."','".$my_time."','".$_POST["year"]."','".$_POST["branch"]."','".$_POST["subject"]."','".$_POST["sem"]."','upload/".$_FILES['file_upload']['name']."')";
// Upload file
 if ($conn->query($sql) === TRUE) {
     
 }
 else {
     echo "Error: " . $sql . "<br>" . $conn->error;
 }
 

if(!move_uploaded_file($_FILES['file_upload']['tmp_name'], 'upload/' . $_FILES['file_upload']['name'])){
    die('Error uploading file - check destination is writeable.');
}


$conn->close();



}

if($_POST['categ']=='book'){



$_FILES['file_upload']['name']="book -".$_POST['name']."-".$_POST['author'];

 $sr = "select * from books where subject='".$_POST['subject']."' and name='".$_POST['name']."'";
  $res = $conn->query($sr);
  
 $lo=0; 
  if ($res->num_rows > 0) {
      // output data of each row
      while($ro = $res->fetch_assoc()) {
          if($ro["author"]==$_POST["author"]){
          
           $lo=-1;
           $lo=$lo+$lo;
                                         }
                                        }
                            }



// Check filetype

$my_time= date("Y-m-d H:i:s");

// Check if the file exists
if($lo !=0){
   die('File duplicate exists! please change');
}

$sql="insert into books(name,email,datetime,subject,author,address)values('".$_FILES['file_upload']['name']."','".$email."','".$my_time."','".$_POST["subject"]."','".$_POST["author"]."','upload/".$_FILES['file_upload']['name']."')";
// Upload file
 if ($conn->query($sql) === TRUE) {
     
 }
 else {
     echo "Error: " . $sql . "<br>" . $conn->error;
 }
 

if(!move_uploaded_file($_FILES['file_upload']['tmp_name'], 'upload/' . $_FILES['file_upload']['name'])){
    die('Error uploading file - check destination is writeable.');
}


$conn->close();



}

echo "<script>if(!alert('file uploading was successful')) document.location = '/vlib/upload.php';</script>";
//header( "Location:upload.php");

?>
