<?php
	include "connect.php";
	error_reporting(E_PARSE);
	$id = $_SESSION['id'];
	$query = mysqli_query($conn, "SELECT * FROM article WHERE id_user = '$id'");
	$result = mysqli_fetch_array($query);
	$idarticle = $result['id_user'];
  $queryuser = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$id'");
  $resultuser = mysqli_fetch_array($queryuser);
  $idadmin=$resultuser['id_status'];?>
<html>
<head>
  <title>Article</title>
</head>
<body>
  <h1>Article</h1>
  <a href="inputarticle.php">Input article</a><br><br>
  <table border="1" width="100%">
  <tr>
    <th>NO</th>
    <th>Title</th>
	<th>Category</th>
    <th>Description</th>
    <th>Article Picture</th>
    <th>Content</th>
  </tr>
  <?php
  // Load file koneksi.php
  
  $query1 = "SELECT * FROM article"; // Query untuk menampilkan semua data siswa
  $sql = mysqli_query($conn, $query1); // Eksekusi/Jalankan query dari variabel $query
  $count = 1;
  while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
    echo "<tr>";
    echo "<td>".$count++."</td>";
    echo "<td>".$data['title']."</td>";
	echo "<td>".$data['category']."</td>";
	echo "<td>".$data['description']."</td>";
    echo "<td><img src='images/".$data['article_picture']."' width='100' height='100'></td>";
    echo "<td>".$data['content']."</td>";
	if($id==$data['id_user']||$idadmin=='1'){
		echo "<td><a href='editarticle.php?id_article=".$data['id_article']."'>Edit</a></td>";
		echo "<td><a href='deletearticle.php?id_article=".$data['id_article']."'>Delete</a></td>";
		echo "</tr>";
		}
	else{
		echo "</tr>";
	}
		
    echo "</tr>";
  }
  ?>
 </html>
