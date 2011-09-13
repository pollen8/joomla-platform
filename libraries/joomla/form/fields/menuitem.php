<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Form
 *
 * @copyright   Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

<<<<<<< HEAD
defined('JPATH_PLATFORM') or die;
=======
defined('JPATH_PLATFORM') or die();
>>>>>>> upstream/master

jimport('joomla.html.html');
jimport('joomla.form.formfield');
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('groupedlist');

// Import the com_menus helper.
<<<<<<< HEAD
require_once realpath(JPATH_ADMINISTRATOR.'/components/com_menus/helpers/menus.php');

/**
 * Supports an HTML select list of menu item
=======
require_once realpath(JPATH_ADMINISTRATOR . '/components/com_menus/helpers/menus.php');

/**
 * Supports an HTML grouped select list of menu item grouped by menu
>>>>>>> upstream/master
 *
 * @package     Joomla.Platform
 * @subpackage  Form
 * @since       11.1
 */
class JFormFieldMenuItem extends JFormFieldGroupedList
{
	/**
	 * The form field type.
	 *
	 * @var    string
	 * @since  11.1
	 */
	public $type = 'MenuItem';

	/**
	 * Method to get the field option groups.
	 *
	 * @return  array  The field option objects as a nested array in groups.
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function getGroups()
	{
		// Initialize variables.
		$groups = array();

		// Initialize some field attributes.
		$menuType = (string) $this->element['menu_type'];
		$published = $this->element['published'] ? explode(',', (string) $this->element['published']) : array();
		$disable = $this->element['disable'] ? explode(',', (string) $this->element['disable']) : array();
<<<<<<< HEAD

		// Get the menu items.
		$items = MenusHelper::getMenuLinks($menuType, 0, 0, $published);

		// Build group for a specific menu type.
		if ($menuType) {
=======
		$language = $this->element['language'] ? explode(',', (string) $this->element['language']) : array();

		// Get the menu items.
		$items = MenusHelper::getMenuLinks($menuType, 0, 0, $published, $language);

		// Build group for a specific menu type.
		if ($menuType)
		{
>>>>>>> upstream/master
			// Initialize the group.
			$groups[$menuType] = array();

			// Build the options array.
<<<<<<< HEAD
			foreach($items as $link) {
				$groups[$menuType][] = JHtml::_('select.option', $link->value, $link->text, 'value', 'text', in_array($link->type, $disable));
			}
		}

		// Build groups for all menu types.
		else {
			// Build the groups arrays.
			foreach($items as $menu)
=======
			foreach ($items as $link)
			{
				$groups[$menuType][] = JHtml::_('select.option', $link->value, $link->text, 'value', 'text', in_array($link->type, $disable));
			}
		}
		// Build groups for all menu types.
		else
		{
			// Build the groups arrays.
			foreach ($items as $menu)
>>>>>>> upstream/master
			{
				// Initialize the group.
				$groups[$menu->menutype] = array();

				// Build the options array.
<<<<<<< HEAD
				foreach($menu->links as $link) {
					$groups[$menu->menutype][] = JHtml::_('select.option', $link->value, $link->text, 'value', 'text', in_array($link->type, $disable));
=======
				foreach ($menu->links as $link)
				{
					$groups[$menu->menutype][] = JHtml::_(
						'select.option', $link->value, $link->text, 'value', 'text',
						in_array($link->type, $disable)
					);
>>>>>>> upstream/master
				}
			}
		}

		// Merge any additional groups in the XML definition.
		$groups = array_merge(parent::getGroups(), $groups);

		return $groups;
	}
<<<<<<< HEAD
}
=======
}
>>>>>>> upstream/master
