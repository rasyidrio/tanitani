<html>
<head>
  <title>Article</title>
</head>
<body>
  <h1>List Article</h1>
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

  include "connect.php";
	$term = mysqli_real_escape_string($conn,$_REQUEST['search']);    

	$sql = "SELECT * FROM article WHERE title LIKE '%".$term."%' OR description LIKE '%".$term."%' OR category LIKE '%".$term."%' OR content LIKE '%".$term."%'";
	$r_query = mysqli_query($conn,$sql);
	
		$count = 1;
		while ($data = mysqli_fetch_array($r_query,MYSQLI_ASSOC)){ 

		echo "<tr>";
			echo "<td>".$count++."</td>";
			echo "<td>".$data['title']."</td>";
			echo "<td>".$data['category']."</td>";
			echo "<td>".$data['description']."</td>";
			echo "<td><img src='images/".$data['article_picture']."' width='100' height='100'></td>";
			echo "<td>".$data['content']."</td>";
		echo "</tr>";
  }

  ?>
</html>

