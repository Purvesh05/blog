<?php session_start(); ob_start(); 
include("includes/db.php");
include("includes/function.php");
?>

<?php
if(isset($_POST['id'])){
	/*echo $_POST['id'];*/
	$blog_id = $_POST['id'];
	$uid = $_SESSION['id'];
	
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

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
	i.fa.fa-heart{
		color: red;
	}
	i.fa.fa-heart-o{
		color: black;
	}
	</style>
</head>
<body>
<!--<a  rel=""><i class="fa fa-bookmark" style="font-size:25px;color=grey;"></i></a>
<a rel=""><i class="fa fa-bookmark-o" style="font-size:25px;"></i></a>-->


</body>
</html>

