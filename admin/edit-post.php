<?php include('header.php'); ?>
<div class="container">
<div class="panel panel-primary">
	<div class="panel-heading">Update Post    <a style="float: right; color: #fff" href="#" onClick="goBack()">Cancel Editing</a> </div>
		<div class="panel-body">
	<!--	<form action="update-post.php?pid=<?php // echo $_GET['pid']; ?>" method="POST"> -->
		<form action="update-post.php" method="POST">
		<?php
		global $conn;
		$sql = 'SELECT post.PID as PID, post.Title as Title, post.Content as Content, post.DateDue as DateDue, post.UID as UID, post.LID as LID, post.CID as CID, meta.CatName as CatName, location.LID as LID, location.LocationName as LocationName FROM post 
		INNER JOIN meta ON post.CID = meta.CID 
		INNER JOIN location ON post.LID = location.LID 
		WHERE post.PID ='.$_GET['pid'];
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()){
				$title = $row['Title'];
				$content = $row['Content'];
				$dateDue = $row['DateDue'];
				$uid = $row['UID'];
				$lid = $row['LID'];
				$cid = $row['CID'];
				$pid = $_GET['pid'];
				$catName = $row['CatName'];
				echo '<div class="form-group">';
				echo '	Title: <input type="text" name="title" class="form-control" value="'.$title.'" required></input>';
				echo '</div>';
				echo '<div class="form-group">';
				echo '	Description: <textarea cols="50" rows="10" name="content" class="form-control" required>'.$content.'</textarea>';
				echo '</div>';
				echo '<div class="form-group">';
				echo '	Due Date: <input type="text" name="dateDue" class="form-control" value="'.$dateDue.'" required></input> ';
				echo '</div>';
				echo '<div class="form-group">';
				echo '	UserID: <input type="text" name="uid" class="form-control" value="'.$uid.'" required></input>';
				echo '</div>';
				echo '<div class="form-group">';
				echo 'Location: <select name="lid">';
					echo '<option value="'.$row['LID'].'">';
					echo $row['LocationName'];
					echo '</option>';	
					echo getLocationList($_GET['pid']);
				echo '</select>';
				echo '</div>';
				echo '<div class="form-group">';
				echo 'Category: ';
				echo '<select name="cid">';
					echo '<option value="'.$row['CID'].'">';
					echo $row['CatName'];
					echo '</option>';	
					echo getCatList($_GET['pid']);
				echo '</select>';
				echo '</div>';
				echo '<div class="form-group">';
				echo '<input type="integer" name="pid" value="'.$pid.'"></input>';
				echo '</div>';
				echo '<div class="form-group">';
				echo '	<button type="submit" name="submit" class="btn btn-default">Update</button>';
				echo '</div>';
			} 
		}
		?>
		</form>
		<form action="delete-post.php" METHOD="POST" >
			<input type="integer" name="deletePid" value="<?php $_GET['pid']; ?>"></input>
			<button type="submit" name="deletePost" class="btn btn-default" style="background-color: #c00; color: #fff">Delete</button>
		</form>
		</div>
	</div>
</div>
<script>
function goBack() {
    window.history.back();
}
</script>
</body>
</html>