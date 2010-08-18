<div class="content">
	<h2><?php echo l('Tickets'); ?></h2>
	<p>
		<table width="100%">
		<?php foreach($tickets as $ticket) { ?>
			<tr>
				<td><?php echo $ticket['id']; ?></td>
				<td><?php echo $html->link($this->uri->anchor('p',$this->project['slug'],'ticket-'.$ticket['ticket_id']),$ticket['summary']); ?></td>
			</tr>
		<?php } ?>
		</table>
	</p>
</div>