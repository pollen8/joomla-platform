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
class JFormRuleEquals extends JFormRule
{
	/**
	 * Method to test if two values are equal. To use this rule, the form
	 * XML needs a validate attribute of equals and a field attribute
	 * that is equal to the field to test against.
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
	{
		// Initialize variables.
		$field	= (string) $element['field'];

		// Check that a validation field is set.
		if (!$field) {
=======
	 * @throws  JException on invalid rule.
	 */
	public function test(&$element, $value, $group = null, &$input = null, &$form = null)
	{
		// Initialize variables.
		$field = (string) $element['field'];

		// Check that a validation field is set.
		if (!$field)
		{
>>>>>>> upstream/master
			return new JException(JText::sprintf('JLIB_FORM_INVALID_FORM_RULE', get_class($this)));
		}

		// Check that a valid JForm object is given for retrieving the validation field value.
<<<<<<< HEAD
		if (!($form instanceof JForm)) {
=======
		if (!($form instanceof JForm))
		{
>>>>>>> upstream/master
			return new JException(JText::sprintf('JLIB_FORM_INVALID_FORM_OBJECT', get_class($this)));
		}

		// Test the two values against each other.
<<<<<<< HEAD
		if ($value == $input->get($field)) {
=======
		if ($value == $input->get($field))
		{
>>>>>>> upstream/master
			return true;
		}

		return false;
	}
<<<<<<< HEAD
}
=======
}
>>>>>>> upstream/master
