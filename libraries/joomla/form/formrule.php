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

// Detect if we have full UTF-8 and unicode PCRE support.
if (!defined('JCOMPAT_UNICODE_PROPERTIES')) {
=======
defined('JPATH_PLATFORM') or die();

// Detect if we have full UTF-8 and unicode PCRE support.
if (!defined('JCOMPAT_UNICODE_PROPERTIES'))
{
>>>>>>> upstream/master
	define('JCOMPAT_UNICODE_PROPERTIES', (bool) @preg_match('/\pL/u', 'a'));
}

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
class JFormRule
{
	/**
	 * The regular expression to use in testing a form field value.
	 *
	 * @var    string
	 * @since  11.1
	 */
	protected $regex;

	/**
	 * The regular expression modifiers to use when testing a form field value.
	 *
	 * @var    string
	 * @since  11.1
	 */
	protected $modifiers;

	/**
	 * Method to test the value.
	 *
<<<<<<< HEAD
	 * @param   object  $element  The JXMLElement object representing the <field /> tag for the
	 *                            form field object.
	 * @param   mixed   $value    The form field value to validate.
	 * @param   string  $group    The field name group control value. This acts as as an array
	 *                            container for the field. For example if the field has name="foo"
	 *                            and the group value is set to "bar" then the full field name
	 *                            would end up being "bar[foo]".
	 * @param   object  $input    An optional JRegistry object with the entire data set to validate
	 *                            against the entire form.
	 * @param   object  $form     The form object for which the field is being tested.
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
		// Initialize variables.
		$name = (string) $element['name'];

		// Check for a valid regex.
<<<<<<< HEAD
		if (empty($this->regex)) {
=======
		if (empty($this->regex))
		{
>>>>>>> upstream/master
			throw new JException(JText::sprintf('JLIB_FORM_INVALID_FORM_RULE', get_class($this)));
		}

		// Add unicode property support if available.
<<<<<<< HEAD
		if (JCOMPAT_UNICODE_PROPERTIES) {
			$this->modifiers = (strpos($this->modifiers, 'u') !== false) ? $this->modifiers : $this->modifiers.'u';
		}

		// Test the value against the regular expression.
		if (preg_match(chr(1).$this->regex.chr(1).$this->modifiers, $value)) {
=======
		if (JCOMPAT_UNICODE_PROPERTIES)
		{
			$this->modifiers = (strpos($this->modifiers, 'u') !== false) ? $this->modifiers : $this->modifiers . 'u';
		}

		// Test the value against the regular expression.
		if (preg_match(chr(1) . $this->regex . chr(1) . $this->modifiers, $value))
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
