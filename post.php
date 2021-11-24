<?php include('header.php'); ?>
<style>
a.button {
    padding: 5px 10px;
}
#content h5 {
    color: #90949c;
    font-weight: normal;
    text-transform: uppercase;
    font-size: 12px;
}
#content {
	color: #757575;
	line-height: 1.34em;
}
</style>
<div id="content">
<div class="clearfix">
	<a class="button" href="#" onClick="goBack()">Go Back</a>  <a class="button" href="admin/edit-post.php?pid=<?php echo $_GET['pid']; ?>">Edit this post</a>
	<hr/>
</div>
<?php 
	$pid = $_GET['pid'];
	getPostCont($pid);
?>
</div>
<script>
function goBack() {
    window.history.back();
}
</script>