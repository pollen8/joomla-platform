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
 * Renders a list element
 *
 * @package     Joomla.Platform
 * @subpackage  Parameter
 * @since       11.1
<<<<<<< HEAD
 * @deprecated  Use Jorm instead
 */

class JElementList extends JElement
{
	/**
	* Element type
	*
	* @var    string
	*/
=======
 * @deprecated  Use JFormFieldList instead
 */
class JElementList extends JElement
{
	/**
	 * Element type
	 *
	 * @var    string
	 */
>>>>>>> upstream/master
	protected $_name = 'List';

	/**
	 * Get the options for the element
	 *
<<<<<<< HEAD
	 * @param   object  The current XML node.
	 * @return  array
	 * @since   11.1
	 */
	protected function _getOptions(&$node)
	{
		$options = array ();
		foreach ($node->children() as $option)
		{
			$val	= $option->attributes('value');
			$text	= $option->data();
=======
	 * @param   object  &$node  Element object
	 *
	 * @return  array
	 *
	 * @since   11.1
	 *
	 * @deprecated  12.1  Use JFormFieldList::getOptions Instead
	 */
	protected function _getOptions(&$node)
	{
		// Deprecation warning.
		JLog::add('JElementList::getOptions() is deprecated.', JLog::WARNING, 'deprecated');

		$options = array();
		foreach ($node->children() as $option)
		{
			$val = $option->attributes('value');
			$text = $option->data();
>>>>>>> upstream/master
			$options[] = JHtml::_('select.option', $val, JText::_($text));
		}
		return $options;
	}

	/**
	 * Fetch the HTML code for the parameter element.
	 *
<<<<<<< HEAD
	 * @param   string   The field name.
	 * @param   mixed    The value of the field.
	 * @param   object   The current XML node.
	 * @param   string   The name of the HTML control.
	 */
	public function fetchElement($name, $value, &$node, $control_name)
	{
		$ctrl	= $control_name .'['. $name .']';
		$attribs	= ' ';

		if ($v = $node->attributes('size')) {
			$attribs	.= 'size="'.$v.'"';
		}
		if ($v = $node->attributes('class')) {
			$attribs	.= 'class="'.$v.'"';
		} else {
			$attribs	.= 'class="inputbox"';
		}
		if ($m = $node->attributes('multiple'))
		{
			$attribs	.= 'multiple="multiple"';
			$ctrl		.= '[]';
=======
	 * @param   string  $name          The field name.
	 * @param   mixed   $value         The value of the field.
	 * @param   object  &$node         The current JSimpleXMLElement node.
	 * @param   string  $control_name  The name of the HTML control.
	 *
	 * @return  string
	 *
	 * @deprecated    12.1
	 * @since   11.1
	 */
	public function fetchElement($name, $value, &$node, $control_name)
	{
		$ctrl = $control_name . '[' . $name . ']';
		$attribs = ' ';

		if ($v = $node->attributes('size'))
		{
			$attribs .= 'size="' . $v . '"';
		}
		if ($v = $node->attributes('class'))
		{
			$attribs .= 'class="' . $v . '"';
		}
		else
		{
			$attribs .= 'class="inputbox"';
		}
		if ($m = $node->attributes('multiple'))
		{
			$attribs .= 'multiple="multiple"';
			$ctrl .= '[]';
>>>>>>> upstream/master
		}

		return JHtml::_(
			'select.genericlist',
			$this->_getOptions($node),
			$ctrl,
<<<<<<< HEAD
			array(
				'id' => $control_name.$name,
				'list.attr' => $attribs,
				'list.select' => $value
			)
		);
	}
}
=======
			array('id' => $control_name . $name, 'list.attr' => $attribs, 'list.select' => $value)
		);
	}
}
>>>>>>> upstream/master
