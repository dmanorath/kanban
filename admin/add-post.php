<?php include('header.php'); ?>
<div class="container">
<div class="panel panel-primary">
	<div class="panel-heading">Add New Post</div>
		<div class="panel-body">
		<form action="insert-post.php" method="POST">
			<div class="form-group">
				Title: <input type="text" name="title" class="form-control"  placeholder="Enter title here..." required></input> 
			</div>
			<div class="form-group">
				Description: <textarea cols="50" rows="10" name="content" class="form-control" placeholder="Description goes here..." required></textarea>
			</div>
			<div class="form-group">
				Due Date: <input type="datetime-local" name="dateDue" class="form-control" required></input> 
			</div>
			<div class="form-group">
				UserID: <input type="text" name="uid" class="form-control" required></input>
			</div>
			<div class="form-group">
				LocationID: <input type="text" name="lid" class="form-control" required></input>
			</div>
			<div class="form-group">
				CatID: <input type="text" name="cid" class="form-control" required></input>
			</div>
			<div class="form-group">
				<button type="submit" name="submit" class="btn btn-default">Publish</button>
			</div>
		</form>
		</div>
	</div>
</div>
</body>
</html>