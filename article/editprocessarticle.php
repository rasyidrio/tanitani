<?php
// Load file koneksi.php
include "connect.php";
error_reporting(E_PARSE);
// Ambil data NIS yang dikirim oleh form_ubah.php melalui URL
  $id_article = $_GET['id_article'];
  $category= $_POST['category'];
  $title = $_POST['title'];
  $description = $_POST['description'];
  $content = $_POST['content'];
// Cek apakah user ingin mengubah fotonya atau tidak
if(isset($_POST['change_picture'])){ // Jika user menceklis checkbox yang ada di form ubah, lakukan :
  // Ambil data foto yang dipilih dari form
  $picture = $_FILES['pict']['name'];
  $tmp = $_FILES['pict']['tmp_name'];
  $foto_size = $_FILES["pict"]["size"];
$info = getimagesize($tmp);
		if (($info[2] !== IMAGETYPE_GIF) && ($info[2] !== IMAGETYPE_JPEG) && ($info[2] !== IMAGETYPE_PNG)&& ($info[2] !== IMAGETYPE_JPG)) {?>
			<script language="javascript">alert("Not an Image");</script>
			<script>document.location.href='readarticle.php';</script>
			<?php
			}
		else{ 
				// Rename nama fotonya dengan menambahkan tanggal dan jam upload
				$newpict = date('dmYHis').$newpict;
  
				// Set path folder tempat menyimpan fotonya
				$path = "images/".$newpict;
				// Proses upload
				if($foto_size < 1000000){
					if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
						// Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
						$query = "SELECT * FROM article WHERE id_article='".$id_article."'";
						$sql = mysqli_query($conn, $query); // Eksekusi/Jalankan query dari variabel $query
						$data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql
						// Cek apakah file foto sebelumnya ada di folder images
						if(is_file("images/".$data['pict'])){// Jika foto ada
							unlink("images/".$data['pict']); // Hapus file foto sebelumnya yang ada di folder images
							}
						// Proses ubah data ke Database
						$query = "UPDATE article SET title = '$title',description = '$description', category = '$category', article_picture= '$newpict', content = '$content' WHERE id_article = '$id_article'";
						$sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query
						if($sql){
								?>
								<script language="javascript">alert("Edit Successful");</script>
								<script>document.location.href='readarticle.php';</script>
								<?php
								}
						else{
							?>
							<script language="javascript">alert("Edit Failed");</script>
							<script>document.location.href='editarticle.php';</script>
							<?php // Cek jika proses simpan ke database sukses atau tidak
							// Jika Sukses, Lakukan :
							// Redirect ke halaman index.php
							}
					}
					else{
							// Jika gambar gagal diupload, Lakukan :
							echo "Cant upload picture.";
							echo "<br><a href='editarticle.php'>Back to Form</a>";
						}
				}
			else{
					echo "Sorry picture too big.";
				}
	}
	}
	
else{ // Jika user tidak menceklis checkbox yang ada di form ubah, lakukan :
  // Proses ubah data ke Database
  $query = "UPDATE article SET title = '$title', description = '$description',category='$category', content= '$content' WHERE id_article = '$id_article'";
    $sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query
    if($sql){
    ?>
    <script language="javascript">alert("Edit Successful");</script>
    <script>document.location.href='readarticle.php';</script>
<?php
  }
  else{
?>
    <script language="javascript">alert("Edit Failed");</script>
    <script>document.location.href='editarticle.php';</script>
    <?php
}
  mysqli_close($conn);
}

?>