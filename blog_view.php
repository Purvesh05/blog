<?php session_start(); ob_start(); 
$uid = $_SESSION['id'];?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Retrive</title>
</head>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
	i.fa.fa-heart {
		color: red;
		font-size: 25px;
	}

	i.fa.fa-heart-o {
		color: black;
		font-size: 25px;
	}
	
	.count{
		margin-left: 10px;
		color: red;
		font-size: 25px;
	}
	
	
	

</style>

<body>
	<h1 class="text-center my-5">
		Posts

	</h1>
	<div class="container">

		<div class="row">
			<!--First Blog Post -->
			<br><br><br><br>
			<div id="blog">
				
			</div>
		</div>

	</div>


	<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
	<script>
		$(document).ready(function() {

			setInterval(function() {
				updateBlogs();
			}, 500);


			function updateBlogs() {
				
				$.ajax({
					url: 'updateBlogs.php',
					type: 'POST',
					success: function(data) {
						if (!data.error) {
							$('#blog').html(data);
						}
					}
				});
			}

		});

	</script>

	

</body>

</html>
