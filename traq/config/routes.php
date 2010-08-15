<?php
/**
 * Traq
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

$routes = array(
	'default'	=> 'project_list',
	'projects'	=> 'project_list',
	
	// Project routes
	'p/:any/tickets'	=> 'tickets',
	'p/:any/wiki'		=> 'wiki',
	'p/:any'			=> 'project',
	
	// User routes
	'user/login'	=> 'user/login',
	'user/register'	=> 'user/register',
	'user/cp'		=> 'user/cp',
	
	// Admin routes
	'admincp/settings'	=> 'admincp/settings',
	'admincp'			=> 'admincp'
);