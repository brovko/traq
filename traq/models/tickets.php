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

class TicketsModel
{
	public function get()
	{
		$tickets = array();
		$rows = $this->db->select('tickets',array('where'=>array('project_id'=>$this->project['id'])));
		foreach($rows as $ticket)
		{
			$status = $this->db->select('ticket_status',array('where'=>array('id'=>$ticket['status'])));
			$ticket['status'] = $status[0];
			$priority = $this->db->select('priorities',array('where'=>array('id'=>$ticket['priority'])));
			$ticket['priority'] = $priority[0];
			$milestone = $this->db->select('milestones',array('where'=>array('id'=>$ticket['milestone_id'])));
			$ticket['milestone'] = $milestone[0];
			$version = $this->db->select('versions',array('where'=>array('id'=>$ticket['version_id'])));
			$ticket['version'] = $version[0];
			$assigned_to = $this->db->select('users',array('where'=>array('id'=>$ticket['assigned_to'])));
			$ticket['assigned_to'] = $assigned_to[0];
			
			$tickets[] = $ticket;
		}
		
		return $tickets;
	}
}