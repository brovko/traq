<div id="wrapper">
	<div id="header">
		<span id="head"><a href="<?=$uri->anchor()?>"><?=$settings->title?></a></span>
		<div id="metanav" class="nav">
			<ul>
<? if($user->loggedin) { ?>
					<li class="first"><a href="<?=$uri->anchor(array('user','settings'))?>">UserCP</a></li>
					<? if($user->group->isadmin) { ?>
					<li><a href="<?=$uri->anchor()?>admincp">AdminCP</a></li>
					<? } ?>
					<li class="last"><a href="<?=$uri->anchor(array('user','logout'))?>">Logout (<?=$user->info->username?>)</a></li>
<? } else { ?>
					<li class="first"><a href="<?=$uri->anchor(array('user','login'))?>">Login</a></li>
					<li class="last"><a href="<?=$uri->anchor(array('user','register'))?>">Register</a></li>
<? } ?>
			</ul>
		</div>
	</div>
