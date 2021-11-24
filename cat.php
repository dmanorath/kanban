<?php include('header.php'); ?>
	<?php $cid = $_GET['cid']; ?>
    <div id="board">
        <div id="todo">
        	<div class="title">To Do</div>
            <?php getListByCat($cid, 1); ?>
        </div>
        <!-- end todo -->
        
		<div id="plan">
        	<div class="title">Planning</div>
            <?php getListByCat($cid, 2); ?>
        </div>
        <!-- end todo -->
		
		<div id="inprogress">
			<div class="title">In Progress</div>
			<?php getListByCat($cid, 3); ?>
		</div>
		<!-- end inprogress -->
        
        <div id="intest">
			<div class="title">Testing</div>
			<?php getListByCat($cid, 4); ?>
		</div>
		<!-- end inprogress -->
        
		<div id="done">
			<div class="title">Done</div>
			<?php getListByCat($cid, 5); ?>
		</div>
        <!-- end done -->
	</div>	
<?php include('footer.php'); ?>