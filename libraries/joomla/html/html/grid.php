<?php
/**
 * @package     Joomla.Platform
 * @subpackage  HTML
 *
 * @copyright   Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('JPATH_PLATFORM') or die;

/**
 * Utility class for creating HTML Grids
 *
 * @package     Joomla.Platform
 * @subpackage  HTML
 * @since       11.1
 */
abstract class JHtmlGrid
{
	/**
	 * Display a boolean setting widget.
	 *
<<<<<<< HEAD
	 * @param   integer  The row index.
	 * @param   integer  The value of the boolean field.
	 * @param   string   Task to turn the boolean setting on.
	 * @param   string   Task to turn the boolean setting off.
	 *
	 * @return  string   The boolean setting widget.
	 * @since	11.1
=======
	 * @param   integer  $i        The row index.
	 * @param   integer  $value    The value of the boolean field.
	 * @param   string   $taskOn   Task to turn the boolean setting on.
	 * @param   string   $taskOff  Task to turn the boolean setting off.
	 *
	 * @return  string   The boolean setting widget.
	 *
	 * @since    11.1
>>>>>>> upstream/master
	 */
	static function boolean($i, $value, $taskOn = null, $taskOff = null)
	{
		// Load the behavior.
		self::behavior();

		// Build the title.
		$title = ($value) ? JText::_('JYES') : JText::_('JNO');
<<<<<<< HEAD
		$title .= '::'.JText::_('JGLOBAL_CLICK_TO_TOGGLE_STATE');

		// Build the <a> tag.
		$bool	= ($value) ? 'true' : 'false';
		$task	= ($value) ? $taskOff : $taskOn;
		$toggle	= (!$task) ? false : true;

		if ($toggle) {
			$html = '<a class="grid_'.$bool.' hasTip" title="'.$title.'" rel="{id:\'cb'.$i.'\', task:\''.$task.'\'}" href="#toggle"></a>';
		}
		else {
			$html = '<a class="grid_'.$bool.'" rel="{id:\'cb'.$i.'\', task:\''.$task.'\'}"></a>';
=======
		$title .= '::' . JText::_('JGLOBAL_CLICK_TO_TOGGLE_STATE');

		// Build the <a> tag.
		$bool = ($value) ? 'true' : 'false';
		$task = ($value) ? $taskOff : $taskOn;
		$toggle = (!$task) ? false : true;

		if ($toggle)
		{
			$html = '<a class="grid_' . $bool . ' hasTip" title="' . $title . '" rel="{id:\'cb' . $i . '\', task:\'' . $task
				. '\'}" href="#toggle"></a>';
		}
		else
		{
			$html = '<a class="grid_' . $bool . '" rel="{id:\'cb' . $i . '\', task:\'' . $task . '\'}"></a>';
>>>>>>> upstream/master
		}

		return $html;
	}

	/**
<<<<<<< HEAD
	 * @param   string   The link title
	 * @param   string   The order field for the column
	 * @param   string   The current direction
	 * @param   string   The selected ordering
	 * @param   string   An optional task override
	 * @param   string   An optional direction for the new column
	 *
	 * @return  string
	 */
	public static function sort($title, $order, $direction = 'asc', $selected = 0, $task=NULL, $new_direction='asc')
	{
		$direction	= strtolower($direction);
		$images		= array('sort_asc.png', 'sort_desc.png');
		$index		= intval($direction == 'desc');

		if ($order != $selected) {
			$direction = $new_direction;
		} else {
			$direction	= ($direction == 'desc') ? 'asc' : 'desc';
		}

		$html = '<a href="javascript:tableOrdering(\''.$order.'\',\''.$direction.'\',\''.$task.'\');" title="'.JText::_('JGLOBAL_CLICK_TO_SORT_THIS_COLUMN').'">';
		$html .= JText::_($title);

		if ($order == $selected) {
			$html .= JHtml::_('image','system/'.$images[$index], '', NULL, true);
=======
	 * Method to sort a column in a grid
	 *
	 * @param   string  $title          The link title
	 * @param   string  $order          The order field for the column
	 * @param   string  $direction      The current direction
	 * @param   string  $selected       The selected ordering
	 * @param   string  $task           An optional task override
	 * @param   string  $new_direction  An optional direction for the new column
	 *
	 * @return  string
	 *
	 * @since   11.1
	 */
	public static function sort($title, $order, $direction = 'asc', $selected = 0, $task = null, $new_direction = 'asc')
	{
		$direction = strtolower($direction);
		$images = array('sort_asc.png', 'sort_desc.png');
		$index = intval($direction == 'desc');

		if ($order != $selected)
		{
			$direction = $new_direction;
		}
		else
		{
			$direction = ($direction == 'desc') ? 'asc' : 'desc';
		}

		$html = '<a href="javascript:tableOrdering(\'' . $order . '\',\'' . $direction . '\',\'' . $task . '\');" title="'
			. JText::_('JGLOBAL_CLICK_TO_SORT_THIS_COLUMN') . '">';
		$html .= JText::_($title);

		if ($order == $selected)
		{
			$html .= JHtml::_('image', 'system/' . $images[$index], '', null, true);
>>>>>>> upstream/master
		}

		$html .= '</a>';

		return $html;
	}

	/**
<<<<<<< HEAD
	 * @param   integer The row index
	 * @param   integer The record id
	 * @param   boolean
	 * @param   string The name of the form element
	 *
	 * @return  string
	 */
	public static function id($rowNum, $recId, $checkedOut=false, $name='cid')
	{
		if ($checkedOut) {
			return '';
		}
		else {
			return '<input type="checkbox" id="cb'.$rowNum.'" name="'.$name.'[]" value="'.$recId.'" onclick="isChecked(this.checked);" title="'.JText::sprintf('JGRID_CHECKBOX_ROW_N', ($rowNum + 1)).'" />';
=======
	 * Method to create a checkbox for a grid row.
	 *
	 * @param   integer  $rowNum      The row index
	 * @param   integer  $recId       The record id
	 * @param   boolean  $checkedOut  True if item is checke out
	 * @param   string   $name        The name of the form element
	 *
	 * @return  mixed    String of html with a checkbox if item is not checked out, null if checked out.
	 */
	public static function id($rowNum, $recId, $checkedOut = false, $name = 'cid')
	{
		if ($checkedOut)
		{
			return '';
		}
		else
		{
			return '<input type="checkbox" id="cb' . $rowNum . '" name="' . $name . '[]" value="' . $recId
				. '" onclick="isChecked(this.checked);" title="' . JText::sprintf('JGRID_CHECKBOX_ROW_N', ($rowNum + 1)) . '" />';
>>>>>>> upstream/master
		}
	}

	/**
<<<<<<< HEAD
	 * @deprecated
	 */
	public static function access(&$row, $i, $archived = NULL)
	{
		// TODO: This needs to be reworked to suit the new access levels
		if ($row->access <= 1)  {
			$color_access = 'class="allow"';
			$task_access = 'accessregistered';
		}
		else if ($row->access == 1) {
			$color_access = 'class="deny"';
			$task_access = 'accessspecial';
		}
		else {
=======
	 * Deprecated method to change access level in a grid
	 *
	 * @param   integer  &$row      Row id
	 * @param   integer  $i         Row index
	 * @param   boolean  $archived  True if the item is archived
	 *
	 * @return  string
	 *
	 * @deprecated  12.1
	 * @note    This method is incompatible with JAccess
	 * @since   11.1
	 */
	public static function access(&$row, $i, $archived = null)
	{
		// Deprecation warning.
		JLog::add('JGrid::access is deprecated.', JLog::WARNING, 'deprecated');

		// TODO: This needs to be reworked to suit the new access levels
		if ($row->access <= 1)
		{
			$color_access = 'class="allow"';
			$task_access = 'accessregistered';
		}
		else if ($row->access == 1)
		{
			$color_access = 'class="deny"';
			$task_access = 'accessspecial';
		}
		else
		{
>>>>>>> upstream/master
			$color_access = 'class="none"';
			$task_access = 'accesspublic';
		}

<<<<<<< HEAD
		if ($archived == -1) {
			$href = JText::_($row->groupname);
		}
		else {
			$href = '
			<a href="javascript:void(0);" onclick="return listItemTask(\'cb'. $i .'\',\''. $task_access .'\')" '. $color_access .'>
			'. JText::_($row->groupname) .'</a>'
			;
=======
		if ($archived == -1)
		{
			$href = JText::_($row->groupname);
		}
		else
		{
			$href = '
			<a href="javascript:void(0);" onclick="return listItemTask(\'cb' . $i . '\',\'' . $task_access . '\')" ' . $color_access . '>
			' . JText::_($row->groupname) . '</a>';
>>>>>>> upstream/master
		}

		return $href;
	}

<<<<<<< HEAD
	public static function checkedOut(&$row, $i, $identifier = 'id')
	{
		$user	= JFactory::getUser();
		$userid = $user->get('id');

		$result = false;
		if ($row instanceof JTable) {
			$result = $row->isCheckedOut($userid);
		}
		else {
=======
	/**
	 * Displays a checked out icon.
	 *
	 * @param   object   &$row        A data object (must contain checkedout as a property).
	 * @param   integer  $i           The index of the row.
	 * @param   string   $identifier  The property name of the primary key or index of the row.
	 *
	 * @return  string
	 *
	 * @since   11.1
	 */
	public static function checkedOut(&$row, $i, $identifier = 'id')
	{
		$user = JFactory::getUser();
		$userid = $user->get('id');

		$result = false;
		if ($row instanceof JTable)
		{
			$result = $row->isCheckedOut($userid);
		}
		else
		{
>>>>>>> upstream/master
			$result = JTable::isCheckedOut($userid, $row->checked_out);
		}

		$checked = '';
<<<<<<< HEAD
		if ($result) {
			$checked = JHtmlGrid::_checkedOut($row);
		}
		else {
			if ($identifier == 'id') {
				$checked = JHtml::_('grid.id', $i, $row->$identifier);
			}
			else {
=======
		if ($result)
		{
			$checked = JHtmlGrid::_checkedOut($row);
		}
		else
		{
			if ($identifier == 'id')
			{
				$checked = JHtml::_('grid.id', $i, $row->$identifier);
			}
			else
			{
>>>>>>> upstream/master
				$checked = JHtml::_('grid.id', $i, $row->$identifier, $result, $identifier);
			}
		}

		return $checked;
	}

	/**
<<<<<<< HEAD
	 * @param   mixed    $value	Either the scalar value, or an object (for backward compatibility, deprecated)
	 * @param   integer  $i
	 * @param   string   $img1	Image for a positive or on value
	 * @param   string   $img0	Image for the empty or off value
	 * @param   string   $prefix	An optional prefix for the task
	 *
	 * @return  string
	 */
	public static function published($value, $i, $img1 = 'tick.png', $img0 = 'publish_x.png', $prefix='')
	{
		if (is_object($value)) {
			$value = $value->published;
		}

		$img	= $value ? $img1 : $img0;
		$task	= $value ? 'unpublish' : 'publish';
		$alt	= $value ? JText::_('JPUBLISHED') : JText::_('JUNPUBLISHED');
		$action = $value ? JText::_('JLIB_HTML_UNPUBLISH_ITEM') : JText::_('JLIB_HTML_PUBLISH_ITEM');

		$href = '
		<a href="#" onclick="return listItemTask(\'cb'. $i .'\',\''. $prefix.$task .'\')" title="'. $action .'">'.
		JHtml::_('image','admin/'.$img, $alt, NULL, true).'</a>'
		;

		return $href;
	}

	public static function state(
		$filter_state = '*',
		$published = 'Published',
		$unpublished = 'Unpublished',
		$archived = null,
		$trashed = null
	) {
		$state = array(
			'' => '- ' . JText::_('JLIB_HTML_SELECT_STATE') . ' -',
			'P' => JText::_($published),
			'U' => JText::_($unpublished)
		);

		if ($archived) {
			$state['A'] = JText::_($archived);
		}

		if ($trashed) {
=======
	 * Method to create a clickable icon to change the state of an item
	 *
	 * @param   mixed    $value   Either the scalar value or an object (for backward compatibility, deprecated)
	 * @param   integer  $i       The index
	 * @param   string   $img1    Image for a positive or on value
	 * @param   string   $img0    Image for the empty or off value
	 * @param   string   $prefix  An optional prefix for the task
	 *
	 * @return  string
	 *
	 * @since   11.1
	 */
	public static function published($value, $i, $img1 = 'tick.png', $img0 = 'publish_x.png', $prefix = '')
	{
		if (is_object($value))
		{
			$value = $value->published;
		}

		$img = $value ? $img1 : $img0;
		$task = $value ? 'unpublish' : 'publish';
		$alt = $value ? JText::_('JPUBLISHED') : JText::_('JUNPUBLISHED');
		$action = $value ? JText::_('JLIB_HTML_UNPUBLISH_ITEM') : JText::_('JLIB_HTML_PUBLISH_ITEM');

		$href = '
		<a href="#" onclick="return listItemTask(\'cb' . $i . '\',\'' . $prefix . $task . '\')" title="' . $action . '">'
			. JHtml::_('image', 'admin/' . $img, $alt, null, true) . '</a>';

		return $href;
	}
	/**
	 * Method to create a select list of states for filtering
	 * By default the filter shows only published and unpublishe items
	 *
	 * @param   string  $filter_state  The initial filter state
	 * @param   string  $published     The JText string for published
	 * @param   string  $unpublished   The JText string for Unpublished
	 * @param   string  $archived      The JText string for Archived
	 * @param   string  $trashed       The JText string for Trashed
	 *
	 * @return  string
	 *
	 * @since   11.1
	 */
	public static function state($filter_state = '*', $published = 'Published', $unpublished = 'Unpublished', $archived = null, $trashed = null)
	{
		$state = array('' => '- ' . JText::_('JLIB_HTML_SELECT_STATE') . ' -', 'P' => JText::_($published), 'U' => JText::_($unpublished));

		if ($archived)
		{
			$state['A'] = JText::_($archived);
		}

		if ($trashed)
		{
>>>>>>> upstream/master
			$state['T'] = JText::_($trashed);
		}

		return JHtml::_(
			'select.genericlist',
			$state,
			'filter_state',
			array(
				'list.attr' => 'class="inputbox" size="1" onchange="Joomla.submitform();"',
				'list.select' => $filter_state,
				'option.key' => null
			)
		);
	}
<<<<<<< HEAD

	public static function order($rows, $image = 'filesave.png', $task = 'saveorder')
	{
		// $image = JHtml::_('image','admin/'.$image, JText::_('JLIB_HTML_SAVE_ORDER'), NULL, true);
		$href = '<a href="javascript:saveorder('.(count($rows)-1).', \''.$task.'\')" class="saveorder" title="'.JText::_('JLIB_HTML_SAVE_ORDER').'"></a>';
=======
	/**
	 * Method to create an icon for saving a new ordering in a grid
	 *
	 * @param   array   $rows   The array of rows of rows
	 * @param   string  $image  The image
	 * @param   string  $task   The task to use, defaults to save order
	 *
	 * @return  string
	 *
	 * @since   11.1
	 */
	public static function order($rows, $image = 'filesave.png', $task = 'saveorder')
	{
		// $image = JHtml::_('image','admin/'.$image, JText::_('JLIB_HTML_SAVE_ORDER'), NULL, true);
		$href = '<a href="javascript:saveorder(' . (count($rows) - 1) . ', \'' . $task . '\')" class="saveorder" title="'
			. JText::_('JLIB_HTML_SAVE_ORDER') . '"></a>';
>>>>>>> upstream/master

		return $href;
	}

<<<<<<< HEAD

=======
	/**
	 * Method to create a checked out icon with optional overlib in a grid.
	 *
	 * @param   object   &$row     The row object
	 * @param   boolean  $overlib  True if an overlib with checkout information should be created.
	 *
	 * @return  string   HTMl for the icon and ovelib
	 *
	 * @since   11.1
	 */
>>>>>>> upstream/master
	protected static function _checkedOut(&$row, $overlib = 1)
	{
		$hover = '';

<<<<<<< HEAD
		if ($overlib) {
			$text = addslashes(htmlspecialchars($row->editor, ENT_COMPAT, 'UTF-8'));

			$date	= JHtml::_('date',$row->checked_out_time, JText::_('DATE_FORMAT_LC1'));
			$time	= JHtml::_('date',$row->checked_out_time, 'H:i');

			$hover = '<span class="editlinktip hasTip" title="'. JText::_('JLIB_HTML_CHECKED_OUT') .'::'. $text .'<br />'. $date .'<br />'. $time .'">';
		}

		$checked = $hover .JHtml::_('image','admin/checked_out.png', NULL, NULL, true).'</span>';

		return $checked;
	}

=======
		if ($overlib)
		{
			$text = addslashes(htmlspecialchars($row->editor, ENT_COMPAT, 'UTF-8'));

			$date = JHtml::_('date', $row->checked_out_time, JText::_('DATE_FORMAT_LC1'));
			$time = JHtml::_('date', $row->checked_out_time, 'H:i');

			$hover = '<span class="editlinktip hasTip" title="' . JText::_('JLIB_HTML_CHECKED_OUT') . '::' . $text . '<br />' . $date . '<br />'
				. $time . '">';
		}

		$checked = $hover . JHtml::_('image', 'admin/checked_out.png', null, null, true) . '</span>';

		return $checked;
	}
	/**
	 * Method to build the behavior script and add it to the document head.
	 *
	 * @return  void
	 *
	 * @since   11.1
	 */
>>>>>>> upstream/master
	static function behavior()
	{
		static $loaded;

		if (!$loaded)
		{
			// Build the behavior script.
			$js = '
		window.addEvent(\'domready\', function(){
			actions = $$(\'a.move_up\');
			actions.combine($$(\'a.move_down\'));
			actions.combine($$(\'a.grid_true\'));
			actions.combine($$(\'a.grid_false\'));
			actions.combine($$(\'a.grid_trash\'));
			actions.each(function(a){
				a.addEvent(\'click\', function(){
					args = JSON.decode(this.rel);
					listItemTask(args.id, args.task);
				});
			});
			$$(\'input.check-all-toggle\').each(function(el){
				el.addEvent(\'click\', function(){
					if (el.checked) {
						document.id(this.form).getElements(\'input[type=checkbox]\').each(function(i){
							i.checked = true;
						})
					}
					else {
						document.id(this.form).getElements(\'input[type=checkbox]\').each(function(i){
							i.checked = false;
						})
					}
				});
			});
		});';

			// Add the behavior to the document head.
			$document = JFactory::getDocument();
			$document->addScriptDeclaration($js);

			$loaded = true;
		}
	}
<<<<<<< HEAD
}
=======
}
>>>>>>> upstream/master
