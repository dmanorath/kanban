<?php require('../config/config.php'); ?>
<?php
	function getPostsDashboard(){
		global $conn;
		$sql = "SELECT p.PID as pid, u.FirstName as fName, p.Title as pTitle, m.CatName as catName, p.DateDue as dateDue, p.CID as cid, l.LID as lid, p.DateModified as dateModified 
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
				$dateModified = date('m-d-Y', strtotime($row['dateModified']));

				if($lid == 5)
				{
					echo '<div class="item" style="background-color: #4CAF50"><a href="edit-post.php?pid='.$row['pid'].'">';
					echo $row['pTitle'];
					echo '</a><hr/><span class="dueDate"> Updated on '.$dateModified.' | <a href="cat.php?cid='.$row['cid'].'">'.$row['catName'].'</a></span>';
					echo '</div>';
				}
				else if($due >= '-14' && $due < '-7')
				{
					echo '<div class="item reminderTwoWeek"><a href="edit-post.php?pid='.$row['pid'].'">';
					echo $row['pTitle'];
					echo '</a><hr/><span class="dueDate"> Due in '.str_replace('-',' ', $due).' days | <a href="cat.php?cid='.$row['cid'].'">'.$row['catName'].'</a></span>';
					echo '</div>';
				}
				else if($due >= '-7' && $due <= 0)
				{
					echo '<div class="item reminderOneWeek"><a href="edit-post.php?pid='.$row['pid'].'">';
					echo $row['pTitle'];
					echo '</a><hr/><span class="dueDate"> Due in '.str_replace('-',' ', $due).' days | <a href="cat.php?cid='.$row['cid'].'">'.$row['catName'].'</a></span>';
					echo '</div>';
				}
				else if($due > 0)
				{
					echo '<div class="item reminderPastWeek"><a href="edit-post.php?pid='.$row['pid'].'">';
					echo $row['pTitle'];
					echo '</a><hr/><span class="dueDate"> Due date passed '.str_replace('-',' ', $due).' days ago | <a href="cat.php?cid='.$row['cid'].'">'.$row['catName'].'</a></span>';
					echo '</div>';
				}
				else 
				{
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
	
// Update Post
	function getCatList($pid){
		global $conn;
		$sql = "SELECT CID, CatName FROM meta";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				if(!empty($row['CID'])){
					echo '<option value="'.$row['CID'].'">';
					echo $row['CatName'];
					echo '</option>';	
				}
			} 
		}
	}
	function getLocationList($pid){
		global $conn;
		$sql = "SELECT LID, LocationName FROM location";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				if(!empty($row['LID'])){
					echo '<option value="'.$row['LID'].'">';
					echo $row['LocationName'];
					echo '</option>';	
				}
			} 
		}
	}
?>
