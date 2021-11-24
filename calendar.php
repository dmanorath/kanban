<?php include('header.php'); ?>
<section>
    <div id="board">
        <div id="todo">
        	<div class="title">To Do</div>
            <?php getPost(1); ?>
        </div>
        <!-- end todo -->
        
		<div id="plan">
        	<div class="title">Planning</div>
            <?php getPost(2); ?>
        </div>
        <!-- end todo -->
		
		<div id="inprogress">
			<div class="title">In Progress</div>
			<?php getPost(3); ?>
		</div>
		<!-- end inprogress -->
        
        <div id="intest">
			<div class="title">Testing</div>
			<?php getPost(4); ?>
		</div>
		<!-- end inprogress -->
        
		<div id="done">
			<div class="title">Done</div>
			<?php getPost(5); ?>
		</div>
        <!-- end done -->
	</div>
</section>	
<?php include('footer.php'); ?>