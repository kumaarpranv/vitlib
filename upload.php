<? include('header.php');?>
<script type="text/javascript">
 function toggleDiv(formid)
  {

 if(formid == 'form1')
    {
    document.getElementById('form1').style.display = 'block';
    document.getElementById('form2').style.display = 'none';
    document.getElementById('form3').style.display = 'none';
    }

    else if(formid=='form2')
    {  
    document.getElementById('form2').style.display = 'block';
    document.getElementById('form1').style.display = 'none'
    document.getElementById('form3').style.display = 'none';

    }

    else if(formid=='form3')
    {  
    document.getElementById('form3').style.display = 'block';
    document.getElementById('form1').style.display = 'none'
    document.getElementById('form2').style.display = 'none';

    }


}
</script>


<? if(isset($email)){
echo '<div class="w3-container" style="margin-top:80px" id="showcase">
<h1>Select a file to upload: <br /></h1>

';?>

<select id="choose-form">
    <option>Please choose...</option>
    <option onmousedown="toggleDiv('form1');">materials</option>
    <option onmousedown="toggleDiv('form2');">question paper</option>
    <option onmousedown="toggleDiv('form3');">books</option>
</select>
<br />

<?
echo' <br />

<div id="form1" style="display:block">
<form method="post" enctype="multipart/form-data" action="up1.php">



    File: <input type="file" name="file_upload">
 <br />
<br />  
<br />
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
Lecturer<p style="color:red;">*not required</p>:
<input type="text" name="subject" />
 <br />
<br /> 
<br />
Unit:
 <select name="unit">
  <option value="1">one</option>
  <option value="2">two</option>
  <option value="3">three</option>
  <option value="4">four</option>
  <option value="5">five</option>
  <option value="all">all</option>
  <option value="part">partunit</option>
</select> 
<br />
 <br />
<br /> 

Description<p style="color:red;">*not required</p>
<textarea name="description" id="txtArea" rows="5" cols="50"></textarea>

 <br />
<br /> 
<br />
    <button type="submit" name="submit">submit</button>

<input name="categ" value="materials" style="display:none"/>

</form>

</div>

<div id="form2" style="display:none">

<form method="post" enctype="multipart/form-data" action="up1.php">



    File: <input type="file" name="file_upload">

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

sem:
 <select name="sem">
  <option value="1">one</option>
  <option value="2">two</option>

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

<input name="categ" value="qp" style="display:none"/>

</form>


</div>


<div id="form3" style="display:none">
<form method="post" enctype="multipart/form-data" action="up1.php">



    File: <input type="file" name="file_upload">
 <br />
<br />  
<br />
name of the book:
<input type="text" name="name" />
 <br />
<br /> 
<br />
Subject<p style="color:red;">*if it is textbook</p>:
<input type="text" name="subject" />
 <br />
<br /> 
<br />
Author<p style="color:red;">*not required</p>:
<input type="text" name="author" />


 <br />
<br /> 
<br />
    <button type="submit" name="submit">submit</button>


<input name="categ" value="book" style="display:none"/>
</form>


</div>


</div>';

}
else{
echo "<h2>you have to login to upload</h2>";

}

?>
<? include('footer.php');?>


