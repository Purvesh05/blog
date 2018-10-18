<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Retrive</title>
</head>
<link rel="stylesheet" href="css/bootstrap.min.css">
<style>
	body {
		margin-left: 50px;
		margin-right: 50px;
	}

</style>

<body>

	<div class="container">
		<div class="row">
			<h1 class="text-center">
				Posts

			</h1>
			<hr>
			<!--First Blog Post -->


			<?php

include("includes/db.php");
include("includes/function.php");

$query = "select * from blog";
$result = mysqli_query($conn,$query);

while($row = mysqli_fetch_array($result)){
	$blog_id = $row['id'];
	$blog_title = $row['title'];
	$blog_author = $row['aurthor_name'];
	$blog_date = $row['date'];
	$blog_content = $row['content'];
?>
			<h2>
				<a href="blog_comment.php?b_id=<?php echo $blog_id ?>"><?php echo $blog_title; ?></a>
			</h2>
			<p class="lead">
				by 
					<?php echo $blog_author; ?>
			</p>
			<p><span class="fa fa-clock-o"></span>
				<?php 
	$blog_date = date('d/m/Y ', strtotime($blog_date));
	echo $blog_date ;?>
			</p>



			<p>
				<?php echo $blog_content;?>
			</p>
			<hr>
		</div>
	</div>
	<?php }?>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery-3.2.1.min.js"></script>
</body>

</html>
