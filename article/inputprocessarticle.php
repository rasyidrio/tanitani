<?php

include "connect.php";
error_reporting(E_PARSE);
$id = $_SESSION['id'];
$title = $_POST['title'];
$category = $_POST['category'];
$description = $_POST['description'];
$content = $_POST['content'];
$pict = $_FILES['pict']['name'];
$tmp = $_FILES['pict']['tmp_name'];
$foto_size = $_FILES["pict"]["size"];
$info = getimagesize($tmp);
if (($info[2] !== IMAGETYPE_GIF) && ($info[2] !== IMAGETYPE_JPEG) && ($info[2] !== IMAGETYPE_PNG)&& ($info[2] !== IMAGETYPE_JPG)) {?>
	<script language="javascript">alert("Not an Image");</script>
	<script>document.location.href='inputarticle.php';</script>
	<?php
}
else{ 
// Rename nama fotonya dengan menambahkan tanggal dan jam upload
$newpict = date('dmYHis').$pict;
// Set path folder tempat menyimpan fotonya
$path = "images/".$newpict;
// Proses upload
if($foto_size < 1000000){
if(move_uploaded_file($tmp, $path)){
  $sql_buat = "INSERT INTO article(id_article,id_user, title, category, description, article_picture,content) VALUE('','$id','$title','$category','$description','$newpict','$content')";
  if (mysqli_query($conn, $sql_buat)){
?>
      <script language="javascript">alert("Input Successful");</script>
      <script>document.location.href='readarticle.php';</script>
    
    <?php
  }
  else{
?>
    <script language="javascript">alert("Input Failed");</script>
    <script>document.location.href='inputarticle.php';</script>
    <?php
  }
  }
  else{
  echo "Sorry picture cant upload.";
  echo "<br><a href='inputarticle.php'>Back to Form</a>";
} 
}
else{
	echo "Sorry picture too big.";
  }
}
  mysqli_close($conn);
  
?>