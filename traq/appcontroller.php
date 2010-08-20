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

class AppController extends Controller
{
	public $project = null;
	
	public function __construct()
	{
		parent::__construct();
		
		if(isset($this->uri->seg[1]) && $this->is_project($this->uri->seg[1]))
		{
			$this->project = $this->db->query_first("SELECT * FROM ".$this->db->prefix."projects WHERE slug='".$this->db->es($this->uri->seg[1])."' LIMIT 1");
			$this->set('project',$this->project);
		}
		
		$this->load->helper('html');
	}
	
	public function is_project($slug)
	{
		if($this->db->num_rows($this->db->query("SELECT * FROM ".$this->db->prefix."projects WHERE slug='".$this->db->es($slug)."' LIMIT 1")))
			return true;
		
		return false;
	}
}