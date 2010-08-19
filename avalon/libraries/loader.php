<?php
/**
 * Avalon
 * Copyright (C) 2010 Jack Polgar
 *
 * This file is part of Avalon.
 * 
 * Avalon is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; version 3 only.
 * 
 * Avalon is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with Avalon. If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * Loader
 * @package Avalon
 */
class Loader
{
	private $classes = array();
	private $models = array();
	
	/**
	 * Library loader.
	 *
	 * @param string $class The class name.
	 * @return object
	 */
	public function library($class)
	{
		if(isset($this->classes[$class])) return $this->classes[$class];
		
		if(file_exists(BASEPATH.'avalon/libraries/'.$class.'.php'))
		{
			include(BASEPATH.'avalon/libraries/'.$class.'.php');
		}
		elseif(file_exists(APPPATH.'libraries/'.$class.'.php'))
		{
			include(APPPATH.'libraries/'.$class.'.php');
		}
		else
		{
			return false;
		}
		
		$this->classes[$class] = new $class();
		
		// Assign some required things
		$avalon =& getAvalon();
		$this->classes[$class]->db =& $avalon->db;
		$this->classes[$class]->uri =& $avalon->uri;
		$this->classes[$class]->load =& $avalon->load;
		
		return $this->classes[$class];
	}
	
	/**
	 * Model loader.
	 *
	 * @param string $class The model name.
	 * @return bool
	 */
	public function model($model)
	{
		if(isset($this->models[$model])) return $this->models[$model];
		
		if(file_exists(BASEPATH.'avalon/models/'.$model.'.php'))
		{
			include(BASEPATH.'avalon/models/'.$model.'.php');
		}
		elseif(file_exists(APPPATH.'models/'.$model.'.php'))
		{
			include(APPPATH.'models/'.$model.'.php');
		}
		else
		{
			return false;
		}
		
		$this->models[$model] = new $model();
		
		// Assign core libraries and models
		$avalon =& getAvalon();
		$avalon->$model =& $this->models[$model];
		foreach(array_keys(get_object_vars($avalon)) as $key)
			if(!isset($this->classes[$class]->$key) && is_object($avalon->$key))
				$this->classes[$class]->$key =& $avalon->$key;
		
		// Assign to libraries
		foreach($this->classes as $class)
			$class->$model =& $this->models[$model];
		
		return true;
	}
	
	/**
	 * Helper loader
	 *
	 * Loads a helper into the View class.
	 * @param string $helper The helper name.
	 * @return bool
	 */
	public function helper($helper)
	{
		if(isset($this->helpers[$helper])) return $this->helpers[$helper];
		
		if(file_exists(BASEPATH.'avalon/helpers/'.$helper.'.php'))
		{
			include(BASEPATH.'avalon/helpers/'.$helper.'.php');
		}
		elseif(file_exists(APPPATH.'helpers/'.$helper.'.php'))
		{
			include(APPPATH.'helpers/'.$helper.'.php');
		}
		else
		{
			return false;
		}
		
		$this->helpers[$helper] = new $helper();
		
		// Assign core libraries
		$avalon =& getAvalon();
		$this->helpers[$helper]->load =& $avalon->load;
		$this->helpers[$helper]->uri =& $avalon->uri;
		$avalon->view->helpers[$helper] =& $this->helpers[$helper];
		
		return true;
	}
	
	// probably dont need this?
	private function getKeys()
	{
		$avalon = getAvalon();
		
		foreach(array_keys(get_object_vars($avalon)) as $key)
		{
			if(!isset($this->$key))
				$this->$key = $avalon->$key;
		}
	}
}