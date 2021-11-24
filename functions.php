<?php require('config/config.php'); ?>
<?php

	function getPostsDashboard(){
		global $conn;
		$sql = "SELECT p.PID as pid, u.FirstName as fName, p.Title as pTitle, m.CatName as catName, p.DateDue as dateDue, p.CID as cid, l.LID as lid 
			FROM post p
			INNER JOIN users u ON p.UID = u.UID
			INNER JOIN meta m ON m.CID = p.CID
			INNER JOIN location l ON l.LID = p.LID
			ORDER BY dateDue ASC";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$date1 = new DateTime($row['dateDue']);
				$date2 = new Datetime();
				$diff = date_diff($date1,$date2);
				$due =  $diff->format("%r%a");
				$lid = $row['lid'];

				if($lid == 5)
				{
					echo '<div class="item" style="background-color: #4CAF50"><a href="edit-post.php?pid='.$row['pid'].'">';
					echo $row['pTitle'];
					echo '</a><hr/><span class="dueDate"> Due in '.str_replace('-',' ', $due).' days | <a href="cat.php?cid='.$row['cid'].'">'.$row['catName'].'</a></span>';
					echo '</div>';
				}
				else if($due >= '-14' && $due < '-7'){
					echo '<div class="item reminderTwoWeek"><a href="edit-post.php?pid='.$row['pid'].'">';
					echo $row['pTitle'];
					echo '</a><hr/><span class="dueDate"> Due in '.str_replace('-',' ', $due).' days | <a href="cat.php?cid='.$row['cid'].'">'.$row['catName'].'</a></span>';
					echo '</div>';
				}
				else if($due >= '-7' && $due <= 0){
					echo '<div class="item reminderOneWeek"><a href="edit-post.php?pid='.$row['pid'].'">';
					echo $row['pTitle'];
					echo '</a><hr/><span class="dueDate"> Due in '.str_replace('-',' ', $due).' days | <a href="cat.php?cid='.$row['cid'].'">'.$row['catName'].'</a></span>';
					echo '</div>';
				}
				else if($due > 0){
					echo '<div class="item reminderPastWeek"><a href="edit-post.php?pid='.$row['pid'].'">';
					echo $row['pTitle'];
					echo '</a><hr/><span class="dueDate"> Due date passed '.str_replace('-',' ', $due).' days ago | <a href="cat.php?cid='.$row['cid'].'">'.$row['catName'].'</a></span>';
					echo '</div>';
				}
				else {
					echo '<div class="item reminderNone"><a href="edit-post.php?pid='.$row['pid'].'">';
					echo $row['pTitle'];
					echo '</a><hr/><span class="dueDate"> Due in '.str_replace('-',' ', $due).' days | <a href="cat.php?cid='.$row['cid'].'">'.$row['catName'].'</a></span>';
					echo '</div>';
				}
			}
		} else {
			echo 'Nothing to show here.';
		}
	}
	
	function getPost($location){
		global $conn;
		$sql = "SELECT p.PID as pid, u.FirstName as fName, p.Title as pTitle, m.CatName as catName, p.DateDue as dateDue, p.CID as cid, l.LID as lid, p.DateModified as dateModified 
			FROM post p
			INNER JOIN users u ON p.UID = u.UID
			INNER JOIN meta m ON m.CID = p.CID
			INNER JOIN location l ON l.LID = p.LID
			WHERE l.LID = ".$location." ORDER BY dateDue ASC";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$date1 = new DateTime($row['dateDue']);
				$date2 = new Datetime();
				$diff = date_diff($date1,$date2);
				$due =  $diff->format("%r%a");
				$lid = $row['lid'];
				$dateModified = date("m-d-Y", strtotime($row['dateModified']));
				
				if($lid == 5)
				{
					echo '<div class="item" style="background-color: #4CAF50"><a href="edit-post.php?pid='.$row['pid'].'">';
					echo $row['pTitle'];
					echo '</a><hr/><span class="dueDate"> Updated on '.$dateModified.' | <a href="cat.php?cid='.$row['cid'].'">'.$row['catName'].'</a></span>';
					echo '</div>';
				}
				else if($due >= '-14' && $due < '-7'){
					echo '<div class="item reminderTwoWeek"><a href="post.php?pid='.$row['pid'].'">';
					echo $row['pTitle'];
					echo '</a><hr/><span class="dueDate"> Due in '.str_replace('-',' ', $due).' days | <a href="cat.php?cid='.$row['cid'].'">'.$row['catName'].'</a></span>';
					echo '</div>';
				}
				else if($due >= '-7' && $due <= 0){
					echo '<div class="item reminderOneWeek"><a href="post.php?pid='.$row['pid'].'">';
					echo $row['pTitle'];
					echo '</a><hr/><span class="dueDate"> Due in '.str_replace('-',' ', $due).' days | <a href="cat.php?cid='.$row['cid'].'">'.$row['catName'].'</a></span>';
					echo '</div>';
				}
				else if($due > 0){
					echo '<div class="item reminderPastWeek"><a href="post.php?pid='.$row['pid'].'">';
					echo $row['pTitle'];
					echo '</a><hr/><span class="dueDate"> Due date passed '.str_replace('-',' ', $due).' days ago | <a href="cat.php?cid='.$row['cid'].'">'.$row['catName'].'</a></span>';
					echo '</div>';
				}
				else {
					echo '<div class="item reminderNone"><a href="post.php?pid='.$row['pid'].'">';
					echo $row['pTitle'];
					echo '</a><hr/><span class="dueDate"> Due in '.str_replace('-',' ', $due).' days | <a href="cat.php?cid='.$row['cid'].'">'.$row['catName'].'</a></span>';
					echo '</div>';
				}
			}
		} else {
			echo 'Nothing to show here.';
		}
	}

// get post content
	function getPostCont($pid){
		global $conn;
		$sql = "SELECT p.PID as pid, u.FirstName as fName, u.LastName as lName, p.Title as pTitle, m.CatName as catName, p.Content as pContent, p.DateCreated as dateCreated
			FROM post p
			INNER JOIN users u ON p.UID = u.UID
			INNER JOIN meta m ON m.CID = p.CID
			INNER JOIN location l ON l.LID = p.LID
			WHERE p.PID = ".$pid;
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$user = $row['fName'].' '.$row['lName'];
				$dateCreated = date("l, F j, Y", strtotime($row['dateCreated']));
				echo '<h1>'.$row['pTitle'].'</h1>';
				echo '<h5>'.$user.' - '.$dateCreated.' | '.$row['catName'].' </h5>';
				echo '<p id="postArea">'.$row['pContent'].'</p>';
			}
		} else {
			echo '<span style="font-size: 20px; text-align: center; margin-top: 20px;"> Error: 404 - Page not found!</span>';
		}
	}

// get items by cat
	function getListByCat($cid, $location){
		global $conn;
		$sql = "SELECT p.PID as pid, u.FirstName as fName, p.Title as pTitle, m.CatName as catName, p.DateDue as dateDue, p.CID as cid
			FROM post p
			INNER JOIN users u ON p.UID = u.UID
			INNER JOIN meta m ON m.CID = p.CID
			INNER JOIN location l ON l.LID = p.LID
			WHERE p.CID = ".$cid." AND p.LID = ".$location." ORDER BY dateDue ASC";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$date1 = new DateTime($row['dateDue']);
				$date2 = new Datetime();
				$diff = date_diff($date1,$date2);
				$due =  $diff->format("%r%a");

				if($due >= '-14' && $due < '-7'){
					echo '<div class="item reminderTwoWeek"><a href="post.php?pid='.$row['pid'].'">';
					echo $row['pTitle'];
					echo '</a><hr/><span class="dueDate"> Due in '.$due.' days </span>';
					echo '</div>';
				}
				else if($due >= '-7' && $due <= 0){
					echo '<div class="item reminderOneWeek"><a href="post.php?pid='.$row['pid'].'">';
					echo $row['pTitle'];
					echo '</a><hr/><span class="dueDate"> Due in '.$due.' days </span>';
					echo '</div>';
				}
				else if($due > 0){
					echo '<div class="item reminderPastWeek"><a href="post.php?pid='.$row['pid'].'">';
					echo $row['pTitle'];
					echo '</a><hr/><span class="dueDate"> Due date passed '.$due.' ago </span>';
					echo '</div>';
				}
				else {
					echo '<div class="item reminderNone"><a href="post.php?pid='.$row['pid'].'">';
					echo $row['pTitle'];
					echo '</a><hr/><span class="dueDate"> Due in '.$due.' days</span>';
					echo '</div>';
				}
			}
		} else {
			echo 'Nothing to show here.';
		}
	}


	// post filter by user

	function getListByUser($uid, $location){
		global $conn;
		$sql = "SELECT p.PID as pid, u.FirstName as fName, p.Title as pTitle, m.CatName as catName, p.DateDue as dateDue, p.CID as cid
			FROM post p
			INNER JOIN users u ON p.UID = u.UID
			INNER JOIN meta m ON m.CID = p.CID
			INNER JOIN location l ON l.LID = p.LID
			WHERE u.UID = ".$uid." AND p.LID = ".$location;
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$date1 = new DateTime($row['dateDue']);
				$date2 = new Datetime();
				$diff = date_diff($date1,$date2);
				$due =  $diff->format("%r%a");

				if($due >= '-14' && $due < '-7'){
					echo '<div class="item reminderTwoWeek"><a href="post.php?pid='.$row['pid'].'">';
					echo $row['pTitle'];
					echo '</a><hr/><span class="dueDate"> Due in '.$due.' days </span>';
					echo '</div>';
				}
				else if($due >= '-7' && $due <= 0){
					echo '<div class="item reminderOneWeek"><a href="post.php?pid='.$row['pid'].'">';
					echo $row['pTitle'];
					echo '</a><hr/><span class="dueDate"> Due in '.$due.' days </span>';
					echo '</div>';
				}
				else if($due > 0){
					echo '<div class="item reminderPastWeek"><a href="post.php?pid='.$row['pid'].'">';
					echo $row['pTitle'];
					echo '</a><hr/><span class="dueDate"> Due date passed '.$due.' ago </span>';
					echo '</div>';
				}
				else {
					echo '<div class="item reminderNone"><a href="post.php?pid='.$row['pid'].'">';
					echo $row['pTitle'];
					echo '</a><hr/><span class="dueDate"> Due in '.$due.' days</span>';
					echo '</div>';
				}
			}
		} else {
			echo '<div class="item">Nothing to show here.</div>';
		}
	}

	function accountSetting($uid){
		global $conn;
		$sql = "SELECT * FROM users WHERE UID = ".$uid;
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$name = $row['FirstName'].' '.$row['LastName'];
				echo '<h2>'.$name.'</h2>';
				echo '<h5>'.$row['UID'].' | Username: '.$row['UserName'].'</h5>';
				//echo '<p>'.$row['pContent'].'</p>';
			}
		} else {
			echo 'Item Not Found!';
		}
	}
?>
