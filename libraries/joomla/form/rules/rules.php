<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Form
 *
 * @copyright   Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('JPATH_PLATFORM') or die;

jimport('joomla.form.formrule');

/**
<<<<<<< HEAD
 * Form Rule class for the Joomla Framework.
=======
 * Form Rule class for the Joomla Platform.
>>>>>>> upstream/master
 *
 * @package     Joomla.Platform
 * @subpackage  Form
 * @since       11.1
 */
class JFormRuleRules extends JFormRule
{
	/**
	 * Method to test the value.
	 *
<<<<<<< HEAD
	 * @param   object  $element	The JXMLElement object representing the <field /> tag for the
	 * 								form field object.
	 * @param   mixed   $value		The form field value to validate.
	 * @param   string  $group		The field name group control value. This acts as as an array
	 * 								container for the field. For example if the field has name="foo"
	 * 								and the group value is set to "bar" then the full field name
	 * 								would end up being "bar[foo]".
	 * @param   object  $input		An optional JRegistry object with the entire data set to validate
	 * 								against the entire form.
	 * @param   object  $form		The form object for which the field is being tested.
=======
	 * @param   object  &$element  The JXmlElement object representing the <field /> tag for the form field object.
	 * @param   mixed   $value     The form field value to validate.
	 * @param   string  $group     The field name group control value. This acts as as an array container for the field.
	 *                             For example if the field has name="foo" and the group value is set to "bar" then the
	 *                             full field name would end up being "bar[foo]".
	 * @param   object  &$input    An optional JRegistry object with the entire data set to validate against the entire form.
	 * @param   object  &$form     The form object for which the field is being tested.
>>>>>>> upstream/master
	 *
	 * @return  boolean  True if the value is valid, false otherwise.
	 *
	 * @since   11.1
<<<<<<< HEAD
	 * @throws	JException on invalid rule.
	 */
	public function test(& $element, $value, $group = null, & $input = null, & $form = null)
=======
	 * @throws  JException on invalid rule.
	 */
	public function test(&$element, $value, $group = null, &$input = null, &$form = null)
>>>>>>> upstream/master
	{
		// Get the possible field actions and the ones posted to validate them.
		$fieldActions = self::getFieldActions($element);
		$valueActions = self::getValueActions($value);

		// Make sure that all posted actions are in the list of possible actions for the field.
		foreach ($valueActions as $action)
		{
<<<<<<< HEAD
			if (!in_array($action, $fieldActions)) {
=======
			if (!in_array($action, $fieldActions))
			{
>>>>>>> upstream/master
				return false;
			}
		}

		return true;
	}

	/**
	 * Method to get the list of permission action names from the form field value.
	 *
	 * @param   mixed  $value  The form field value to validate.
	 *
	 * @return  array  A list of permission action names from the form field value.
	 *
	 * @since   11.1
	 */
	protected function getValueActions($value)
	{
		// Initialise variables.
		$actions = array();

		// Iterate over the asset actions and add to the actions.
		foreach ((array) $value as $name => $rules)
		{
			$actions[] = $name;
		}

		return $actions;
	}

	/**
	 * Method to get the list of possible permission action names for the form field.
	 *
	 * @param   object  $element  The JXMLElement object representing the <field /> tag for the
	 *                            form field object.
	 *
<<<<<<< HEAD
	 * @return  array  A list of permission action names from the form field element definition.
=======
	 * @return  array   A list of permission action names from the form field element definition.
>>>>>>> upstream/master
	 *
	 * @since   11.1
	 */
	protected function getFieldActions($element)
	{
		// Initialise variables.
		$actions = array();

		// Initialise some field attributes.
<<<<<<< HEAD
		$section	= $element['section'] ? (string) $element['section'] : '';
		$component	= $element['component'] ? (string) $element['component'] : '';

		// Get the asset actions for the element.
		$elActions	= JAccess::getActions($component, $section);
=======
		$section = $element['section'] ? (string) $element['section'] : '';
		$component = $element['component'] ? (string) $element['component'] : '';

		// Get the asset actions for the element.
		$elActions = JAccess::getActions($component, $section);
>>>>>>> upstream/master

		// Iterate over the asset actions and add to the actions.
		foreach ($elActions as $item)
		{
			$actions[] = $item->name;
		}

		// Iterate over the children and add to the actions.
		foreach ($element->children() as $el)
		{
<<<<<<< HEAD
			if ($el->getName() == 'action') {
=======
			if ($el->getName() == 'action')
			{
>>>>>>> upstream/master
				$actions[] = (string) $el['name'];
			}
		}

		return $actions;
	}
<<<<<<< HEAD
}
=======
}
>>>>>>> upstream/master
