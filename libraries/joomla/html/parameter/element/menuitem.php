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
 * Renders a menu item element
 *
 * @package     Joomla.Platform
 * @subpackage  Parameter
 * @since       11.1
<<<<<<< HEAD
 * @deprecated  Use Jform instead
 */

class JElementMenuItem extends JElement
{
	/**
	* Element name
	*
	* @var    string
	*/
	protected $_name = 'MenuItem';

	public function fetchElement($name, $value, &$node, $control_name)
	{
		$db = JFactory::getDbo();

		$menuType = $this->_parent->get('menu_type');
		if (!empty($menuType)) {
			$where = ' WHERE menutype = '.$db->Quote($menuType);
		} else {
=======
 * @deprecated  Use JformFieldMenuItem instead
 */
class JElementMenuItem extends JElement
{
	/**
	 * Element name
	 *
	 * @var    string
	 */
	protected $_name = 'MenuItem';

	/**
	 * Fetch menu item element HTML
	 *
	 * @param   string  $name          Element name
	 * @param   string  $value         Element value
	 * @param   object  &$node         The current JSimpleXMLElement node.
	 * @param   string  $control_name  Control name
	 *
	 * @return  string
	 *
	 * @deprecated    12.1  useJFormFieldMenuItem::getGroups
	 * @since   11.1
	 *
	 */
	public function fetchElement($name, $value, &$node, $control_name)
	{
		// Deprecation warning.
		JLog::add('JElementMenuitem::fetchElement() is deprecated.', JLog::WARNING, 'deprecated');

		$db = JFactory::getDbo();

		$menuType = $this->_parent->get('menu_type');
		if (!empty($menuType))
		{
			$where = ' WHERE menutype = ' . $db->Quote($menuType);
		}
		else
		{
>>>>>>> upstream/master
			$where = ' WHERE 1';
		}

		// Load the list of menu types
		// TODO: move query to model
<<<<<<< HEAD
		$query = 'SELECT menutype, title' .
				' FROM #__menu_types' .
				' ORDER BY title';
		$db->setQuery($query);
		$menuTypes = $db->loadObjectList();

		if ($state = $node->attributes('state')) {
			$where .= ' AND published = '.(int) $state;
=======
		$query = 'SELECT menutype, title' . ' FROM #__menu_types' . ' ORDER BY title';
		$db->setQuery($query);
		$menuTypes = $db->loadObjectList();

		if ($state = $node->attributes('state'))
		{
			$where .= ' AND published = ' . (int) $state;
>>>>>>> upstream/master
		}

		// load the list of menu items
		// TODO: move query to model
<<<<<<< HEAD
		$query = 'SELECT id, parent_id, name, menutype, type' .
				' FROM #__menu' .
				$where .
				' ORDER BY menutype, parent_id, ordering'
				;
=======
		$query = 'SELECT id, parent_id, name, menutype, type' . ' FROM #__menu' . $where . ' ORDER BY menutype, parent_id, ordering';
>>>>>>> upstream/master

		$db->setQuery($query);
		$menuItems = $db->loadObjectList();

		// Establish the hierarchy of the menu
		// TODO: use node model
		$children = array();

		if ($menuItems)
		{
			// First pass - collect children
			foreach ($menuItems as $v)
			{
<<<<<<< HEAD
				$pt	= $v->parent_id;
				$list	= @$children[$pt] ? $children[$pt] : array();
=======
				$pt = $v->parent_id;
				$list = @$children[$pt] ? $children[$pt] : array();
>>>>>>> upstream/master
				array_push($list, $v);
				$children[$pt] = $list;
			}
		}

		// Second pass - get an indent list of the items
		$list = JHtml::_('menu.treerecurse', 0, '', array(), $children, 9999, 0, 0);

		// Assemble into menutype groups
		$n = count($list);
		$groupedList = array();
<<<<<<< HEAD
		foreach ($list as $k => $v) {
=======
		foreach ($list as $k => $v)
		{
>>>>>>> upstream/master
			$groupedList[$v->menutype][] = &$list[$k];
		}

		// Assemble menu items to the array
<<<<<<< HEAD
		$options	= array();
		$options[]	= JHtml::_('select.option', '', JText::_('JOPTION_SELECT_MENU_ITEM'));
=======
		$options = array();
		$options[] = JHtml::_('select.option', '', JText::_('JOPTION_SELECT_MENU_ITEM'));
>>>>>>> upstream/master

		foreach ($menuTypes as $type)
		{
			if ($menuType == '')
			{
<<<<<<< HEAD
				$options[]	= JHtml::_('select.option',  '0', '&#160;', 'value', 'text', true);
				$options[]	= JHtml::_('select.option',  $type->menutype, $type->title . ' - ' . JText::_('JGLOBAL_TOP'), 'value', 'text', true);
=======
				$options[] = JHtml::_('select.option', '0', '&#160;', 'value', 'text', true);
				$options[] = JHtml::_('select.option', $type->menutype, $type->title . ' - ' . JText::_('JGLOBAL_TOP'), 'value', 'text', true);
>>>>>>> upstream/master
			}
			if (isset($groupedList[$type->menutype]))
			{
				$n = count($groupedList[$type->menutype]);
				for ($i = 0; $i < $n; $i++)
				{
					$item = &$groupedList[$type->menutype][$i];

					// If menutype is changed but item is not saved yet, use the new type in the list
<<<<<<< HEAD
					if (JRequest::getString('option', '', 'get') == 'com_menus') {
						$currentItemArray = JRequest::getVar('cid', array(0), '', 'array');
						$currentItemId = (int) $currentItemArray[0];
						$currentItemType = JRequest::getString('type', $item->type, 'get');
						if ($currentItemId == $item->id && $currentItemType != $item->type) {
=======
					if (JRequest::getString('option', '', 'get') == 'com_menus')
					{
						$currentItemArray = JRequest::getVar('cid', array(0), '', 'array');
						$currentItemId = (int) $currentItemArray[0];
						$currentItemType = JRequest::getString('type', $item->type, 'get');
						if ($currentItemId == $item->id && $currentItemType != $item->type)
						{
>>>>>>> upstream/master
							$item->type = $currentItemType;
						}
					}

					$disable = strpos($node->attributes('disable'), $item->type) !== false ? true : false;
<<<<<<< HEAD
					$options[] = JHtml::_('select.option',  $item->id, '&#160;&#160;&#160;' .$item->treename, 'value', 'text', $disable);
=======
					$options[] = JHtml::_('select.option', $item->id, '&#160;&#160;&#160;' . $item->treename, 'value', 'text', $disable);
>>>>>>> upstream/master

				}
			}
		}

<<<<<<< HEAD
		return JHtml::_('select.genericlist', $options, $control_name.'['.$name.']',
			array(
				'id' => $control_name.$name,
				'list.attr' => 'class="inputbox"',
				'list.select' => $value
			)
=======
		return JHtml::_(
			'select.genericlist',
			$options,
			$control_name . '[' . $name . ']',
			array('id' => $control_name . $name, 'list.attr' => 'class="inputbox"', 'list.select' => $value)
>>>>>>> upstream/master
		);
	}
}
