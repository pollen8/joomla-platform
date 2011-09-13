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
 * Renders a SQL element
 *
 * @package     Joomla.Platform
 * @subpackage  Parameter
<<<<<<< HEAD
 * @since		11.1
 * @deprecated	JParameter is deprecated and will be removed in a future version. Use JForm instead.
 */

class JElementSQL extends JElement
{
	/**
	* Element name
	*
	* @var    string
	*/
	protected $_name = 'SQL';

	public function fetchElement($name, $value, &$node, $control_name)
	{
		$db			= JFactory::getDbo();
=======
 * @since       11.1
 * @deprecated  12.1    Use JFormFieldSQL Instead.
 */
class JElementSQL extends JElement
{
	/**
	 * Element name
	 *
	 * @var    string
	 */
	protected $_name = 'SQL';

	/**
	 * Fetch the sql element
	 *
	 * @param   string  $name          Element name
	 * @param   string  $value         Element value
	 * @param   object  &$node         The current JSimpleXMLElement node.
	 * @param   string  $control_name  Control name
	 *
	 * @return  string
	 *
	 * @deprecated  12.1
	 * @since   11.1
	 */
	public function fetchElement($name, $value, &$node, $control_name)
	{
		// Deprecation warning.
		JLog::add('JElementSQL::getOptions is deprecated.', JLog::WARNING, 'deprecated');

		$db = JFactory::getDbo();
>>>>>>> upstream/master
		$db->setQuery($node->attributes('query'));
		$key = ($node->attributes('key_field') ? $node->attributes('key_field') : 'value');
		$val = ($node->attributes('value_field') ? $node->attributes('value_field') : $name);

		$options = $db->loadObjectlist();

		// Check for an error.
<<<<<<< HEAD
		if ($db->getErrorNum()) {
=======
		if ($db->getErrorNum())
		{
>>>>>>> upstream/master
			JError::raiseWarning(500, $db->getErrorMsg());
			return false;
		}

<<<<<<< HEAD
		if (!$options) {
			$options = array();
		}

		return JHtml::_('select.genericlist', $options, $control_name.'['.$name.']',
			array(
				'id' => $control_name.$name,
=======
		if (!$options)
		{
			$options = array();
		}

		return JHtml::_(
			'select.genericlist',
			$options,
			$control_name . '[' . $name . ']',
			array(
				'id' => $control_name . $name,
>>>>>>> upstream/master
				'list.attr' => 'class="inputbox"',
				'list.select' => $value,
				'option.key' => $key,
				'option.text' => $val
			)
		);
	}
}
