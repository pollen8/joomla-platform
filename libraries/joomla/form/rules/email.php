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
class JFormRuleEmail extends JFormRule
{
	/**
	 * The regular expression to use in testing a form field value.
	 *
	 * @var    string
	 * @since  11.1
	 */
	protected $regex = '^[\w.-]+(\+[\w.-]+)*@\w+[\w.-]*?\.\w{2,4}$';

	/**
	 * Method to test the email address and optionally check for uniqueness.
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
		// If the field is empty and not required, the field is valid.
		$required = ((string) $element['required'] == 'true' || (string) $element['required'] == 'required');
		if (!$required && empty($value)) {
=======
	 * @throws  JException on invalid rule.
	 */
	public function test(&$element, $value, $group = null, &$input = null, &$form = null)
	{
		// If the field is empty and not required, the field is valid.
		$required = ((string) $element['required'] == 'true' || (string) $element['required'] == 'required');
		if (!$required && empty($value))
		{
>>>>>>> upstream/master
			return true;
		}

		// Test the value against the regular expression.
<<<<<<< HEAD
		if (!parent::test($element, $value, $group, $input, $form)) {
=======
		if (!parent::test($element, $value, $group, $input, $form))
		{
>>>>>>> upstream/master
			return false;
		}

		// Check if we should test for uniqueness.
		$unique = ((string) $element['unique'] == 'true' || (string) $element['unique'] == 'unique');
<<<<<<< HEAD
		if ($unique) {

			// Get the database object and a new query object.
			$db		= JFactory::getDBO();
			$query	= $db->getQuery(true);
=======
		if ($unique)
		{

			// Get the database object and a new query object.
			$db = JFactory::getDBO();
			$query = $db->getQuery(true);
>>>>>>> upstream/master

			// Build the query.
			$query->select('COUNT(*)');
			$query->from('#__users');
<<<<<<< HEAD
			$query->where('email = '.$db->quote($value));

			// Get the extra field check attribute.
			$userId = ($form instanceof JForm) ? $form->getValue('id') : '';
			$query->where($db->quoteName('id').' <> '.(int) $userId);
=======
			$query->where('email = ' . $db->quote($value));

			// Get the extra field check attribute.
			$userId = ($form instanceof JForm) ? $form->getValue('id') : '';
			$query->where($db->quoteName('id') . ' <> ' . (int) $userId);
>>>>>>> upstream/master

			// Set and query the database.
			$db->setQuery($query);
			$duplicate = (bool) $db->loadResult();

			// Check for a database error.
<<<<<<< HEAD
			if ($db->getErrorNum()) {
				JError::raiseWarning(500, $db->getErrorMsg());
			}

			if ($duplicate) {
=======
			if ($db->getErrorNum())
			{
				JError::raiseWarning(500, $db->getErrorMsg());
			}

			if ($duplicate)
			{
>>>>>>> upstream/master
				return false;
			}
		}

		return true;
	}
<<<<<<< HEAD
}
=======
}
>>>>>>> upstream/master
