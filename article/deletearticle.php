<?php
    include "connect.php";
    $id_article = $_GET['id_article'];

    $sql_hapus = "DELETE FROM article WHERE id_article = '$id_article'";

    if (mysqli_query($conn, $sql_hapus)){
?>
  		<script language="javascript">alert("Delete Successful");</script>
  		<script>document.location.href='readarticle.php';</script>

<?php
  	}
  	else{
?>
  		<script language="javascript">alert("Delete Failed");</script>
  		<script>document.location.href='readarticle.php';</script>
<?php
  	}
  	mysqli_close($conn);
?>
