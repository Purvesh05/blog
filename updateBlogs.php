<?php session_start(); ob_start(); 
$uid = $_SESSION['id'];?>
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
	<a href="blog_comment.php?b_id=<?php echo $blog_id ?>">
		<?php echo $blog_title; ?></a>
</h2><br>
<p class="lead">
	by
	<?php echo $blog_author; ?>
</p><br>
<p><span class="fa fa-clock-o"></span>
	<?php 
	$blog_date = date('d/m/Y ', strtotime($blog_date));
	echo $blog_date ;?>
</p><br>


<p>
	<?php echo $blog_content;?>
</p><br>
<span>
<?php 
			$sql = 'SELECT * FROM `likes` WHERE user_id = '.$uid.'  and blog_id = '.$blog_id.';';
			$like = mysqli_query($conn,$sql);
			$count = mysqli_num_rows($like);
			query_check($like);
			$row = mysqli_fetch_array($like);
				$likes = $row['likes'];
			
				
				if($likes == 1){
					echo "<span class='like' rel='$blog_id'><i class='fa fa-heart' ></i></span>";
				}else{
					echo "<span   class='like' rel='$blog_id'><i class='fa fa-heart-o' ></i></span>";
				}
			
			?>

</span>
<span>
	<?php 
	
	$sql = 'SELECT * FROM `likes` WHERE blog_id = '.$blog_id.';';
			$like = mysqli_query($conn,$sql);
			$count = mysqli_num_rows($like);
			if($count > 0){
					echo "<span class='count'>$count</span>";
				}
	
	?>
</span>

<hr>
<?php }?>

<?php
if(isset($_POST['id'])){
	/*echo $_POST['id'];*/
	$blog_id = $_POST['id'];
	$uid = 1;
	
	$sql = 'SELECT * FROM `likes` WHERE user_id = '.$uid.'  and blog_id = '.$blog_id.';';
			$like = mysqli_query($conn,$sql);
			$count = mysqli_num_rows($like);
			query_check($like);
			$row = mysqli_fetch_array($like);
			 $likes = $row['likes'];
			
				
				if($likes == 1){
					$query = "delete from `likes`  WHERE user_id = $uid  and blog_id = $blog_id;";
					$result = mysqli_query($conn,$query);
					query_check($result);
					
				}else{
					$query = "INSERT INTO `likes` (`blog_id`, `user_id`, `likes`) VALUES ('$blog_id', '$uid', '1');";
					$result = mysqli_query($conn,$query);
					query_check($result);
					
				}
			
}

?>

<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script>
	$(document).ready(function() {



		$('.like').on('click', function() {


			var id = $(this).attr("rel");
			$.post("like.php", {
				id: id
			});

		});
	});

</script>
