<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title><?php echo $page_title; ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<style>
		body {
			font-family: Verdana, sans-serif;
			font-size: 12px;
			background: #042D3F;
			color: #fff;
			margin: 0;
			padding: 0;
		}

		#wrapper {
			width: 80%;
			min-width: 1024px;
			margin: 0 auto;
		}

		#header {
			background: #0A6793;
			padding: 5px;
			padding-bottom: 0;
		}
		#header h1 {
			margin: 0;
		}

		#nav {
			margin-top: 10px;
		}
		#nav a {
			color: #fff;
			text-decoration: none;
		}
		#nav ul {
			margin: 0;
			padding: 0;
			list-style: none;
			height: 18px;
		}
		#nav ul li {
			display: inline;
			float: left;
		}
		#nav ul li a {
			padding: 4px;
			margin-right: 2px;
		}
		#nav ul li a:hover {
			background: #fff;
			color: #000;
		}
		#nav ul li.active a {
			background: #fff;
			color: #000;
		}

		#page {
			background: #fff;
			color: #000;
		}
		#page h2 {
			margin-top: 0;
			margin-bottom: 4px;
		}
		.content {
			padding: 5px;
		}

		#footer {
			background: #F6F6F6;
			color: #000;
			padding: 4px;
			font-size: 10px;
		}
		</style>
	</head>
	<body>
		<div id="wrapper">
			<div id="header">
				<h1><?php echo ($project['id'] ? $project['name'] : settings('title')); ?></h1>
				<div id="nav">
					<ul>
					<?php if($project != null) { ?>
						<li><?php echo alink($this->uri->anchor('p',$project['slug'],'wiki'),l('Wiki')); ?></li>
						<li><?php echo alink($this->uri->anchor('p',$project['slug'],'tickets'),l('Tickets')); ?></li>
					<?php } ?>
					</ul>
				</div>
			</div>
			<div id="page">
				<?php echo $output; ?>
			</div>
			<div id="footer">
				<div id="powered_by">
					Powered by Traq <?php echo TRAQVER; ?><br />
					Copyright &copy 2009-2010 Jack Polgar
				</div>
			</div>
		</div>
	</body>
</html>