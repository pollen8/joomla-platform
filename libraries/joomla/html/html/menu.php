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
 * Utility class working with menu select lists
 *
 * @package     Joomla.Platform
 * @subpackage  HTML
 * @since       11.1
 */
abstract class JHtmlMenu
{
	/**
<<<<<<< HEAD
	 * @var    array  Cached array of the menus.
=======
	 * Cached array of the menus.
	 *
	 * @var    array
	 * @since  11.1
>>>>>>> upstream/master
	 */
	protected static $menus = null;

	/**
<<<<<<< HEAD
	 * @var    array  Cached array of the menus items.
=======
	 * Cached array of the menus items.
	 *
	 * @var    array
	 * @since  11.1
>>>>>>> upstream/master
	 */
	protected static $items = null;

	/**
	 * Get a list of the available menus.
	 *
	 * @return  string
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function menus()
	{
		if (empty(self::$menus))
		{
			$db = JFactory::getDbo();
<<<<<<< HEAD
			$db->setQuery(
				'SELECT menutype As value, title As text' .
				' FROM #__menu_types' .
				' ORDER BY title'
			);
=======
			$query = $db->getQuery(true);
			$query->select('menutype AS value, title AS text');
			$query->from($db->quoteName('#__menu_types'));
			$query->order('title');
			$db->setQuery($query);
>>>>>>> upstream/master
			self::$menus = $db->loadObjectList();
		}

		return self::$menus;
	}

	/**
<<<<<<< HEAD
	 * Returns an array of menu items groups by menu.
	 *
	 * @param   array  An array of configuration options.
=======
	 * Returns an array of menu items grouped by menu.
	 *
	 * @param   array  $config  An array of configuration options.
>>>>>>> upstream/master
	 *
	 * @return  array
	 */
	public static function menuitems($config = array())
	{
		if (empty(self::$items))
		{
			$db = JFactory::getDbo();
<<<<<<< HEAD
			$db->setQuery(
				'SELECT menutype AS value, title AS text' .
				' FROM #__menu_types' .
				' ORDER BY title'
			);
			$menus = $db->loadObjectList();

			$query	= $db->getQuery(true);
			$query->select('a.id AS value, a.title AS text, a.level, a.menutype');
			$query->from('#__menu AS a');
			$query->where('a.parent_id > 0');
			$query->where('a.type <> '.$db->quote('url'));
			$query->where('a.client_id = 0');

			// Filter on the published state
			if (isset($config['published'])) {
				if (is_numeric($config['published'])) {
					$query->where('a.published = '.(int) $config['published']);
				} else if ($config['published'] === '') {
=======
			$query = $db->getQuery(true);
			$query->select('menutype AS value, title AS text');
			$query->from($db->quoteName('#__menu_types'));
			$query->order('title');
			$db->setQuery($query);
			$menus = $db->loadObjectList();

			$query->clear();
			$query->select('a.id AS value, a.title AS text, a.level, a.menutype');
			$query->from('#__menu AS a');
			$query->where('a.parent_id > 0');
			$query->where('a.type <> ' . $db->quote('url'));
			$query->where('a.client_id = 0');

			// Filter on the published state
			if (isset($config['published']))
			{
				if (is_numeric($config['published']))
				{
					$query->where('a.published = ' . (int) $config['published']);
				}
				else if ($config['published'] === '')
				{
>>>>>>> upstream/master
					$query->where('a.published IN (0,1)');
				}
			}

			$query->order('a.lft');

			$db->setQuery($query);
			$items = $db->loadObjectList();

			// Collate menu items based on menutype
			$lookup = array();
<<<<<<< HEAD
			foreach ($items as &$item) {
				if (!isset($lookup[$item->menutype])) {
=======
			foreach ($items as &$item)
			{
				if (!isset($lookup[$item->menutype]))
				{
>>>>>>> upstream/master
					$lookup[$item->menutype] = array();
				}
				$lookup[$item->menutype][] = &$item;

<<<<<<< HEAD
				$item->text = str_repeat('- ',$item->level).$item->text;
			}
			self::$items = array();

			foreach ($menus as &$menu) {
				// Start group:
				self::$items[] = JHtml::_('select.optgroup',	$menu->text);

				// Special "Add to this Menu" option:
				self::$items[] = JHtml::_('select.option', $menu->value.'.1', JText::_('JLIB_HTML_ADD_TO_THIS_MENU'));

				// Menu items:
				if (isset($lookup[$menu->value])) {
					foreach ($lookup[$menu->value] as &$item) {
						self::$items[] = JHtml::_('select.option', $menu->value.'.'.$item->value, $item->text);
=======
				$item->text = str_repeat('- ', $item->level) . $item->text;
			}
			self::$items = array();

			foreach ($menus as &$menu)
			{
				// Start group:
				self::$items[] = JHtml::_('select.optgroup', $menu->text);

				// Special "Add to this Menu" option:
				self::$items[] = JHtml::_('select.option', $menu->value . '.1', JText::_('JLIB_HTML_ADD_TO_THIS_MENU'));

				// Menu items:
				if (isset($lookup[$menu->value]))
				{
					foreach ($lookup[$menu->value] as &$item)
					{
						self::$items[] = JHtml::_('select.option', $menu->value . '.' . $item->value, $item->text);
>>>>>>> upstream/master
					}
				}

				// Finish group:
<<<<<<< HEAD
				self::$items[] = JHtml::_('select.optgroup',	$menu->text);
=======
				self::$items[] = JHtml::_('select.optgroup', $menu->text);
>>>>>>> upstream/master
			}
		}

		return self::$items;
	}

	/**
	 * Displays an HTML select list of menu items.
	 *
<<<<<<< HEAD
	 * @param   string   The name of the control.
	 * @param   string   The value of the selected option.
	 * @param   string   Attributes for the control.
	 * @param   array    An array of options for the control.
=======
	 * @param   string  $name      The name of the control.
	 * @param   string  $selected  The value of the selected option.
	 * @param   string  $attribs   Attributes for the control.
	 * @param   array   $config    An array of options for the control.
>>>>>>> upstream/master
	 *
	 * @return  string
	 */
	public static function menuitemlist($name, $selected = null, $attribs = null, $config = array())
	{
		static $count;

		$options = self::menuitems($config);

		return JHtml::_(
<<<<<<< HEAD
			'select.genericlist',
			$options,
			$name,
			array(
				'id' =>				isset($config['id']) ? $config['id'] : 'assetgroups_'.++$count,
				'list.attr' =>		(is_null($attribs) ? 'class="inputbox" size="1"' : $attribs),
				'list.select' =>	(int) $selected,
=======
			'select.genericlist', $options, $name,
			array(
				'id' => isset($config['id']) ? $config['id'] : 'assetgroups_' . ++$count,
				'list.attr' => (is_null($attribs) ? 'class="inputbox" size="1"' : $attribs),
				'list.select' => (int) $selected,
>>>>>>> upstream/master
				'list.translate' => false
			)
		);
	}

<<<<<<< HEAD

	/**
	 * Build the select list for Menu Ordering
=======
	/**
	 * Build the select list for Menu Ordering
	 *
	 * @param   object   &$row  The row object
	 * @param   integer  $id    The id for the row. Must exist to enable menu ordering
	 *
	 * @return  string
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public static function ordering(&$row, $id)
	{
		$db = JFactory::getDbo();
<<<<<<< HEAD

		if ($id)
		{
			$query = 'SELECT ordering AS value, title AS text'
			. ' FROM #__menu'
			. ' WHERE menutype = '.$db->Quote($row->menutype)
			. ' AND parent_id = '.(int) $row->parent_id
			. ' AND published != -2'
			. ' ORDER BY ordering';
			$order = JHtml::_('list.genericordering',  $query);
			$ordering = JHtml::_(
				'select.genericlist',
				$order,
				'ordering',
=======
		$query = $db->getQuery(true);

		if ($id)
		{
			$query->select('ordering AS value, title AS text');
			$query->from($db->quoteName('#__menu'));
			$query->where($db->quoteName('menutype').' = ' . $db->quote($row->menutype));
			$query->where($db->quoteName('parent_id').' = ' . (int) $row->parent_id);
			$query->where($db->quoteName('published').' != -2');
			$query->order('ordering');
			$order = JHtml::_('list.genericordering', $query);
			$ordering = JHtml::_(
				'select.genericlist', $order, 'ordering',
>>>>>>> upstream/master
				array('list.attr' => 'class="inputbox" size="1"', 'list.select' => intval($row->ordering))
			);
		}
		else
		{
<<<<<<< HEAD
			$ordering = '<input type="hidden" name="ordering" value="'. $row->ordering .'" />'. JText::_('JGLOBAL_NEWITEMSLAST_DESC');
		}
=======
			$ordering = '<input type="hidden" name="ordering" value="' . $row->ordering . '" />' . JText::_('JGLOBAL_NEWITEMSLAST_DESC');
		}

>>>>>>> upstream/master
		return $ordering;
	}

	/**
	 * Build the multiple select list for Menu Links/Pages
<<<<<<< HEAD
	 */
	public static function linkoptions($all=false, $unassigned=false)
	{
		$db = JFactory::getDbo();

		// get a list of the menu items
		$query = 'SELECT m.id, m.parent_id, m.title, m.menutype'
		. ' FROM #__menu AS m'
		. ' WHERE m.published = 1'
		. ' ORDER BY m.menutype, m.parent_id, m.ordering'
		;
=======
	 *
	 * @param   boolean  $all         True if all can be selected
	 * @param   boolean  $unassigned  True if unassigned can be selected
	 *
	 * @return  string
	 *
	 * @since   11.1
	 */
	public static function linkoptions($all = false, $unassigned = false)
	{
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);

		// get a list of the menu items
		$query->select('m.id, m.parent_id, m.title, m.menutype');
		$query->from($db->quoteName('#__menu').' AS m');
		$query->where($db->quoteName('mpublished').' = 1');
		$query->order('m.menutype, m.parent_id, m.ordering');
>>>>>>> upstream/master
		$db->setQuery($query);

		$mitems = $db->loadObjectList();

		// Check for a database error.
<<<<<<< HEAD
		if ($db->getErrorNum()) {
			JError::raiseNotice(500, $db->getErrorMsg());
		}

		if (!$mitems) {
=======
		if ($db->getErrorNum())
		{
			JError::raiseNotice(500, $db->getErrorMsg());
		}

		if (!$mitems)
		{
>>>>>>> upstream/master
			$mitems = array();
		}

		$mitems_temp = $mitems;

		// Establish the hierarchy of the menu
		$children = array();
		// First pass - collect children
		foreach ($mitems as $v)
		{
			$id = $v->id;
			$pt = $v->parent_id;
			$list = @$children[$pt] ? $children[$pt] : array();
			array_push($list, $v);
			$children[$pt] = $list;
		}
		// Second pass - get an indent list of the items
		$list = JHtmlMenu::TreeRecurse(intval($mitems[0]->parent_id), '', array(), $children, 9999, 0, 0);

		// Code that adds menu name to Display of Page(s)
<<<<<<< HEAD
		$mitems_spacer	= $mitems_temp[0]->menutype;

		$mitems = array();
		if ($all | $unassigned) {
			$mitems[] = JHtml::_('select.option',  '<OPTGROUP>', JText::_('JOPTION_MENUS'));

			if ($all) {
				$mitems[] = JHtml::_('select.option',  0, JText::_('JALL'));
			}
			if ($unassigned) {
				$mitems[] = JHtml::_('select.option',  -1, JText::_('JOPTION_UNASSIGNED'));
			}

			$mitems[] = JHtml::_('select.option',  '</OPTGROUP>');
		}

		$lastMenuType	= null;
		$tmpMenuType	= null;
=======
		$mitems_spacer = $mitems_temp[0]->menutype;

		$mitems = array();
		if ($all | $unassigned)
		{
			$mitems[] = JHtml::_('select.option', '<OPTGROUP>', JText::_('JOPTION_MENUS'));

			if ($all)
			{
				$mitems[] = JHtml::_('select.option', 0, JText::_('JALL'));
			}
			if ($unassigned)
			{
				$mitems[] = JHtml::_('select.option', -1, JText::_('JOPTION_UNASSIGNED'));
			}

			$mitems[] = JHtml::_('select.option', '</OPTGROUP>');
		}

		$lastMenuType = null;
		$tmpMenuType = null;
>>>>>>> upstream/master
		foreach ($list as $list_a)
		{
			if ($list_a->menutype != $lastMenuType)
			{
<<<<<<< HEAD
				if ($tmpMenuType) {
					$mitems[] = JHtml::_('select.option',  '</OPTGROUP>');
				}
				$mitems[] = JHtml::_('select.option',  '<OPTGROUP>', $list_a->menutype);
				$lastMenuType = $list_a->menutype;
				$tmpMenuType  = $list_a->menutype;
			}

			$mitems[] = JHtml::_('select.option',  $list_a->id, $list_a->title);
		}
		if ($lastMenuType !== null) {
			$mitems[] = JHtml::_('select.option',  '</OPTGROUP>');
=======
				if ($tmpMenuType)
				{
					$mitems[] = JHtml::_('select.option', '</OPTGROUP>');
				}
				$mitems[] = JHtml::_('select.option', '<OPTGROUP>', $list_a->menutype);
				$lastMenuType = $list_a->menutype;
				$tmpMenuType = $list_a->menutype;
			}

			$mitems[] = JHtml::_('select.option', $list_a->id, $list_a->title);
		}
		if ($lastMenuType !== null)
		{
			$mitems[] = JHtml::_('select.option', '</OPTGROUP>');
>>>>>>> upstream/master
		}

		return $mitems;
	}

<<<<<<< HEAD
	public static function treerecurse($id, $indent, $list, &$children, $maxlevel=9999, $level=0, $type=1)
=======
	/**
	 * Build the list representing the menu tree
	 *
	 * @param   integer  $id         Id of the menu item
	 * @param   string   $indent     The indentation string
	 * @param   array    $list       The list to process
	 * @param   array    &$children  The children of the current item
	 * @param   integer  $maxlevel   The maximum number of levels in the tree
	 * @param   integer  $level      The starting level
	 * @param   string   $type       Type of link: component, URL, alias, separator
	 *
	 * @return  array
	 *
	 * @since   11.1
	 */
	public static function treerecurse($id, $indent, $list, &$children, $maxlevel = 9999, $level = 0, $type = 1)
>>>>>>> upstream/master
	{
		if (@$children[$id] && $level <= $maxlevel)
		{
			foreach ($children[$id] as $v)
			{
				$id = $v->id;

<<<<<<< HEAD
				if ($type) {
					$pre	= '<sup>|_</sup>&#160;';
					$spacer = '.&#160;&#160;&#160;&#160;&#160;&#160;';
				} else {
					$pre	= '- ';
					$spacer = '&#160;&#160;';
				}

				if ($v->parent_id == 0) {
					$txt	= $v->title;
				} else {
					$txt	= $pre . $v->title;
=======
				if ($type)
				{
					$pre = '<sup>|_</sup>&#160;';
					$spacer = '.&#160;&#160;&#160;&#160;&#160;&#160;';
				}
				else
				{
					$pre = '- ';
					$spacer = '&#160;&#160;';
				}

				if ($v->parent_id == 0)
				{
					$txt = $v->title;
				}
				else
				{
					$txt = $pre . $v->title;
>>>>>>> upstream/master
				}
				$pt = $v->parent_id;
				$list[$id] = $v;
				$list[$id]->treename = "$indent$txt";
				$list[$id]->children = count(@$children[$id]);
<<<<<<< HEAD
				$list = JHtmlMenu::TreeRecurse($id, $indent . $spacer, $list, $children, $maxlevel, $level+1, $type);
=======
				$list = JHtmlMenu::TreeRecurse($id, $indent . $spacer, $list, $children, $maxlevel, $level + 1, $type);
>>>>>>> upstream/master
			}
		}
		return $list;
	}
<<<<<<< HEAD
}
=======
}
>>>>>>> upstream/master
