<?php

include("includes/db.php");
include("includes/function.php");

if(isset($_POST['blog_submit'])){
	$title = string_check($_POST['blogtitle']);
	$content = string_check($_POST['content']);
	$authorname = string_check($_POST['authorname']);

$sql="INSERT into blog (title,content,aurthor_name,date) values('$title','$content','$authorname',now())";
if (!mysqli_query($conn,$sql))
{
die('Error: ' . mysqli_error($conn));
}else{
	echo '<h1 class="bg-success">1 record added</h1>';
}
}
mysqli_close($conn);
	

?>

<html>

<head>
	<title>Insert Blog</title>
	<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">-->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<style>
		body{
			margin-left: 50px;
			margin-right: 50px;
		}
	</style>
</head>

<body>
	<form  method="post">
		<div class="contianer">
			<div class="row">

				<table>
					<tr>
						<td>Post Title :</td>
						<td><input type="text" class="form-control" id="posttitle" name="blogtitle" /></td>
					</tr>
					<tr>
						<td>Content :</td>
						<td><textarea id="content" class="form-control" name="content"></textarea></td>
					</tr>
					<tr>
						<td>Author Name : </td>
						<td><input type="text" class="form-control" id="authorname" name="authorname" /></td>
					</tr>
					<tr>
						<td></td>
						<td align="center">
							<input id="submit" class="form-control" name="blog_submit" type="submit" value="Save">
						</td>
					</tr>
				</table>

			</div>
		</div>
	</form>
</body>

<script>
	tinymce.init({
		selector: 'textarea'
	});

</script>

<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-3.2.1.min.js"></script>

</html>
