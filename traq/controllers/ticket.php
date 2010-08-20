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

class Ticket extends AppController
{
	public function index()
	{
		preg_match('/ticket-(?P<id>\d+)/',$this->uri->seg[2],$matches);
		$ticket = $this->db->select('tickets',array('where'=>array('ticket_id'=>$matches['id'],'project_id'=>$this->project['id']),'limit'=>1));
		
		$this->set('ticket',$ticket[0]);
		
		$this->load->view('ticket');
	}
}