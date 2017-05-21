<?php
include "connect.php";

$id = $_SESSION['id'];
if($id==NULL)
	{?>
	<script language="javascript">alert("Login First");</script>
	<script>document.location.href='../../interface/login/login.php';</script><?php
	}
else
	{?>	
		<html>
		<head>
  
		</head>
		<body>
		<h1>Article</h1>
		<form method="post" action="inputprocessarticle.php" enctype="multipart/form-data">
		<table cellpadding="8">
		<tr>
			<td>Title</td>
			<td><input type="text" name="title" required ></td>
		</tr>
		<tr>
			<td>Category</td>
			<td><input type="text" name="category" required ></td>
		</tr>
		<tr>
			<td>Description</td>
			<td>
			<input type="text" name="description" required>
			</td>
		</tr>
		<tr>
			<td>Article Picture</td>
			<td><input type="file" name="pict" ></textarea></td>
		</tr>
		<tr>
		<td>Content</td>
			<td><input type="text" name="content" required></td>
		</tr>
  

		</table>
  
		<hr>
		<input type="submit" value="Submit">
 
		</form>
		</body>
		</html>
		<?php
}?>