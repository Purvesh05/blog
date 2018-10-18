<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Comments</title>
</head>
<style>
	body{
margin-left:50px;
margin-right:50px;
	}
	.well {
  min-height: 20px;
  padding: 19px;
  margin-bottom: 20px;
  background-color: #f5f5f5;
  border: 1px solid #e3e3e3;
  border-radius: 4px;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05);
          box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05);
}
</style>

<body>

	<?php
	
	include("includes/db.php");
include("includes/function.php");
	if(isset($_GET['b_id'])){
		$blog_id = $_GET['b_id'];
		
		$query = "select * from blog where id = $blog_id";
		$result = mysqli_query($conn,$query);
		while($row = mysqli_fetch_array($result)){
			$blog_title = $row['title'];
			$blog_author = $row['aurthor_name'];
			$blog_date = $row['date'];
			$blog_content = $row['content'];
		}
	}
	
	?>

	<div class="container">
		<div class="row">
		<hr>
			<h2>
				<?php echo $blog_title; ?>
			</h2>
			<p class="lead">
				by 
					<?php echo $blog_author; ?>
			</p>
			<p><span class="fa fa-clock-o"></span>
				<?php 
	$blog_date = date('d/m/Y ', strtotime($blog_date));
	echo $blog_date ;
				?>
			</p>

			<p>
				<?php echo $blog_content;?>
			</p>
			<hr>
		</div>
		
		<hr>
		<div class="row">
			
				<?php 
				
					$query = "select * from comments where comment_blog_id = $blog_id;";
					$result = mysqli_query($conn,$query);
				
				    while($row = mysqli_fetch_array($result)){
						echo $author_name = $row['author_name']."  ";
						echo $date = date('d/m/Y ', strtotime($row['date']));
						echo "<br>";
						echo $content = $row['content'];
						echo "<br>";
					}
				
				?>
				
			
		</div>
		
		<?php 
			if(isset($_POST['create_comment'])){
				$comment_author = string_check($_POST['comment_author']);
				$comment_email = string_check($_POST['comment_email']);
				$comment_content = string_check($_POST['comment_content']);
				
				$query = "INSERT INTO `comments` (`comment_id`, `comment_blog_id`, `author_name`, `author_email`, `content`, `date`) VALUES (NULL, '$blog_id', '$comment_author', '$comment_email', '$comment_content', now());";
				$result = mysqli_query($conn,$query);
				
				query_check($result);
				header("Location:blog_comment.php?b_id=$blog_id");				
			}
		
		?>
		<div class="row">
			 <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="post" role="form">
                       
                       <div class="form-group">
                           <label for="Author">Author</label>
                            <input type="text"  required class=" form-control" name="comment_author">
                        </div>
                       
                       <div class="form-group">
                           <label for="Email">Email</label>
                            <input type="email" required class=" form-control" name="comment_email">
                        </div> 
                       
                        <div class="form-group">
                           <label for="Comments">Your Comments</label>
                            <textarea name="comment_content" required class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>
		</div>
		<hr>
	</div>
</body>

</html>
