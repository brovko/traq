<div class="content">
	<h2>Projects</h2>
	
	<ul>
	<?php foreach($projects as $project) { ?>
		<li>
			<h3><?php echo anchor(array('p',$project['slug']),$project['name']); ?></h3>
			<?php echo $project['info']; ?>
		</li>
	<?php } ?>
	</ul>
</div>