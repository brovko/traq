<div class="content">
	<h2><?php echo l('Tickets'); ?></h2>
	<p>
		<table width="100%">
		<tr>
			<?php foreach($columns as $name) { ?>
			<?php echo $helpers->tickets->column_header($name); ?>
			<?php } ?>
		</tr>
		<?php foreach($tickets as $ticket) { ?>
			<tr>
				<?php foreach($columns as $name) { ?>
				<?php echo $helpers->tickets->column_content($name,$ticket); ?>
				<?php } ?>
			</tr>
		<?php } ?>
		</table>
	</p>
</div>