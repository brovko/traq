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

class TicketsHelper
{
	public function column_header($name,$before='<td>',$after='</td>')
	{
		$col = $before;
		switch($name)
		{
			case 'id':
			case 'summary':
			case 'status':
				$col .= l(ucfirst($name));
			break;
			
			default:
			
			break;
		}
		$col .= $after;
		
		return $col;
	}
	
	public function column_content($name,$ticket,$before='<td>',$after='</td>')
	{
		$avalon = getAvalon();
		$project = $avalon->project;
		
		$col = $before;
		switch($name)
		{
			case 'id':
				$col .= $ticket['ticket_id'];
			break;
			case 'summary':
				$col .= $this->html->link($this->uri->anchor('p',$project['slug'],'ticket-'.$ticket['id']),$ticket['summary']);
			break;
			case 'status':
				$col .= $ticket['status'];
			break;
			
			default:
			
			break;
		}
		$col .= $after;
		
		return $col;
	}
}