<?php
/**
 * @version		$Id$
 * @copyright	Copyright (C) 2005 - 2009 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

/**
 * Utility class for creating HTML Grids
 *
 * @package 	Joomla.Framework
 * @subpackage	HTML
 * @since		1.6
 */
abstract class JHtmlJGrid
{
	/**
	 * @param	int $value	The state value
	 * @param	int $i
	 */
	function published($value = 0, $i, $taskPrefix = '')
	{
		// Array of image, task, title, action
		$states	= array(
			1	=> array('tick.png',		$taskPrefix.'unpublish',	'JState_Published',		'JState_UnPublish_Item'),
			0	=> array('publish_x.png',	$taskPrefix.'publish',		'JState_UnPublished',	'JState_Publish_Item'),
			-2	=> array('trash.png',		$taskPrefix.'publish',		'JState_Trashed',		'JState_Publish_Item'),
		);
		$state	= JArrayHelper::getValue($states, (int) $value, $states[0]);
		$html	= '<a href="javascript:void(0);" onclick="return listItemTask(\'cb'.$i.'\',\''.$state[1].'\')" title="'.JText::_($state[3]).'">'
				. JHtml::_('image.administrator', $state[0], '/images/', null, '/images/', JText::_($state[2])).'</a>';

		return $html;
	}

	/**
	 * Display an HTML select list of state filters
	 *
	 * @param	int $selected	The selected value of the list
	 * @return	string			The HTML code for the select tag
	 * @since	1.6
	 */
	function filterPublished($name, $selected = 0, $attribs = null)
	{
		// Build the active state filter options.
		$options	= array();
		$options[]	= JHtml::_('select.option', '*', JText::_('JSelect_Any'));
		$options[]	= JHtml::_('select.option', '1', JText::_('JState_Published'));
		$options[]	= JHtml::_('select.option', '0', JText::_('JState_UnPublished'));
		$options[]	= JHtml::_('select.option', '-2', JText::_('JState_Trashed'));

		if ($attribs === null)
		{
			$attribs = array(
				'list.attr' => 'class="inputbox" onchange="this.form.submit();"',
				'list.select' => $selected
			);
		}

		return JHTML::_('select.genericlist', $options, $name,
			$attribs
		);
	}

	/**
	 * Displays a checked-out icon
	 *
	 * @param	string	The name of the editor.
	 * @param	string	The time that the object was checked out.
	 *
	 * @return	string	The required HTML.
	 */
	function checkedout($editorName, $time)
	{
		$text	= addslashes(htmlspecialchars($editorName));
		$date 	= JHTML::_('date',  $time, '%A, %d %B %Y');
		$time	= JHTML::_('date',  $time, '%H:%M');

		$hover = '<span class="editlinktip hasTip" title="'. JText::_('Checked Out') .'::'. $text .'<br />'. $date .'<br />'. $time .'">';
		$checked = $hover .'<img src="images/checked_out.png" alt="'.JText::_('Checked Out').'" /></span>';

		return $checked;
	}

}