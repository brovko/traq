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

function init_traq()
{
	
}

/**
 * Used to get the value of the specified setting.
 * @param string $setting The setting...
 */
function settings($setting)
{
	global $CACHE, $db;
	
	// Check if the setting has already been fetched
	// and return it if it has.
	if(isset($CACHE['settings'][$setting])) return $CACHE['settings'][$setting];
	
	// Looks like the setting isn't in the cache,
	// lets fetch it now...
	$result = $db->query_first("SELECT * FROM traq_settings WHERE setting='".$db->es($setting)."' LIMIT 1");
	$CACHE['settings'][$setting] = $result['value'];
	
	return $CACHE['settings'][$setting];
} 


/**
 * Gets the specified locale string for the set language.
 * @param string $string String name/key
 * @param mixed $vars
 * @return string
 */
function l($string,$vars=array())
{
	global $lang;

	// Check if the string exists
	if(!isset($lang[$string])) return '['.$string.']';
	
	// Get the locale string
	$string = $lang[$string];
	
	// Check if the $vars is an array or use the function args.
	if(!is_array($vars)) $vars = array_slice(func_get_args(),1);
	
	// Loop through the vars and replace the the {x} stuff
	foreach($vars as $var)
	{
		++$v;
		$string = str_replace('{'.$v.'}',$var,$string);
	}
	
	// Now return it...
	return $string;
} 