<div class="content">
	<h2>Projects</h2>
	
	<ul>
	<?php foreach($projects as $project) { ?>
		<li>
			<h3><a href="<?php echo $this->uri->anchor('p',$project['slug']); ?>"><?php echo $project['name']; ?></a></h3>
			<?php echo $project['info']; ?>
		</li>
	<?php } ?>
	</ul>
</div>