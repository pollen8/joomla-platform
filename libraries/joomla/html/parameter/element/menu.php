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
 * Renders a menu element
 *
 * @package     Joomla.Platform
 * @subpackage  Parameter
 * @since       11.1
<<<<<<< HEAD
 * @deprecated  Use JForm instead
 */

class JElementMenu extends JElement
{
	/**
	* Element name
	*
	* @var    string
	*/
	protected $_name = 'Menu';

	public function fetchElement($name, $value, &$node, $control_name)
	{
		require_once JPATH_ADMINISTRATOR.DS.'components'.DS.'com_menus'.DS.'helpers'.DS.'menus.php';
		$menuTypes	= MenusHelper::getMenuTypes();

		foreach ($menuTypes as $menutype) {
=======
 * @deprecated  Use JFormMenu instead
 */
class JElementMenu extends JElement
{
	/**
	 * Element name
	 *
	 * @var    string
	 */
	protected $_name = 'Menu';

	/**
	 * Fetch a html for a list of menus
	 *
	 * @param   string  $name          Element name
	 * @param   string  $value         Element value
	 * @param   object  &$node         The current JSimpleXMLElement node.
	 * @param   string  $control_name  Control name
	 *
	 * @return  string
	 *
	 * @deprecated    12.1  Use JFormFieldMenu::getOptions instead
	 * @since   11.1
	 */
	public function fetchElement($name, $value, &$node, $control_name)
	{
		// Deprecation warning.
		JLog::add('JElementMenu::fetchElement() is deprecated.', JLog::WARNING, 'deprecated');

		require_once JPATH_ADMINISTRATOR . '/components/com_menus/helpers/menus.php';
		$menuTypes = MenusHelper::getMenuTypes();

		foreach ($menuTypes as $menutype)
		{
>>>>>>> upstream/master
			$options[] = JHtml::_('select.option', $menutype, $menutype);
		}
		array_unshift($options, JHtml::_('select.option', '', JText::_('JOPTION_SELECT_MENU')));

<<<<<<< HEAD
		return JHtml::_('select.genericlist',  $options, $control_name.'['.$name.']',
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
