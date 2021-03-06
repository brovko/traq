﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title><?php echo settings('title')?> / <?php echo $project['name']?></title>
		<?php require(template('headerinc')); ?>
	</head>
	<body id="project_info">
		<?php require(template('header')); ?>
		
		<?php require(template('breadcrumbs')); ?>
		
		<h1><?php echo $project['name']?></h1>
		<?php if($user->loggedin) { ?>
		<div><a href="<?php echo $uri->anchor($project['slug'],'watch')?>"><?php echo l(iif(is_subscribed('project',$project['id']),'Unwatch','Watch').'_this_project')?></a></div>
		<?php } ?>
		<p>
			<?php echo formattext($project['info'])?>
		</p>
		
		<?php require(template('footer')); ?>
	</body>
</html>