<html>
<head>

</head>
<body>
  <h1>Change article Data</h1>
  
  <?php
  // Load file koneksi.php
  include "connect.php";
  
  // Ambil data NIS yang dikirim oleh index.php melalui URL
  $id_article = $_GET['id_article'];
  
  // Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
  $query = "SELECT * FROM article WHERE id_article='".$id_article."'";
  $sql = mysqli_query($conn, $query);  // Eksekusi/Jalankan query dari variabel $query
  $data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql
  ?>
  
  <form method="post" action="editprocessarticle.php?id_article=<?php echo $id_article; ?>" enctype="multipart/form-data" >

  <table cellpadding="8">
  <tr>
    <td>Title</td>
    <td><input type="text" name="title" required value="<?php echo $data['title']; ?>"></td>
  </tr>
  <tr>
    <td>Category</td>
    <td><input type="text" name="category" required value="<?php echo $data['category']; ?>"></td>
  </tr>
  <tr>
    <td>Description</td>
    <td>
    <input type="text" name="description" required value="<?php echo $data['description']; ?>">
    </td>
  </tr>
  <tr>
    <td>Article Picture</td>
    <td>
      <input type="checkbox" name="change_picture" value="true" > Ceklis jika ingin mengubah foto<br>
      <input type="file" name="pict">
    </td>
  </tr>
  <tr>
    <td>Content</td>
    <td><input type="text" name="content" required value="<?php echo $data['content']; ?>"></td>
  </tr>
  
  </table>
  
  <hr>
  <input type="submit" value="Ubah">
  </form>
</body>
</html