<?php
/**
 * Traq 2
 * Copyright (C) 2009, 2010 Jack Polgar
 *
 * This file is part of Traq.
 * 
 * Traq is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; version 3 only.
 * 
 * Traq is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with Traq. If not, see <http://www.gnu.org/licenses/>.
 */

// Fetch required files
require('common.php');
require('../inc/version.php');
include('../inc/config.php');
include('../inc/db.class.php');

// Start the DB class.
$db = new Database($conf['db']['server'],$conf['db']['user'],$conf['db']['pass'],$conf['db']['dbname']);
define("DBPF",$conf['db']['prefix']);

if(settings('db_revision') < $db_revision) $upgrade = 1;

if(!isset($_POST['action'])) {
	head('Upgrade');
	if($upgrade) {
		?>
		<form action="upgrade.php" method="post">
			<input type="hidden" name="action" value="upgrade" />
			There is a database upgrade available, click next to continue.
			<p><strong>It is highly recommended that you backup your database before each upgrade.</strong></p>
			<input type="submit" value="Next" />
		</form>
		<?php
	} else {
		?>
		<p align="center">Your database appears to be up-to-date.</p>
		<?php
	}
	foot();
}
elseif($_POST['action'] == 'upgrade')
{
	if(settings('db_revision') < 19)
	{
		$db->query("ALTER TABLE ".DBPF."ticket_types ADD `template` LONGTEXT NOT NULL");
	}
	
	$db->query("UPDATE ".DBPF."settings SET value=".$db_revision." WHERE setting='db_revision' LIMIT 1");
	head('Upgrade');
	?>
	<p align="center">Database upgrade complete.</p>
	<?php
	foot();
}