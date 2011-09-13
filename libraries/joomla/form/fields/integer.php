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
JFormHelper::loadFieldClass('list');

/**
<<<<<<< HEAD
 * Form Field class for the Joomla Framework.
=======
 * Form Field class for the Joomla Platform.
 * Provides a select list of integers with specified first, last and step values.
>>>>>>> upstream/master
 *
 * @package     Joomla.Platform
 * @subpackage  Form
 * @since       11.1
 */
class JFormFieldInteger extends JFormFieldList
{
<<<<<<< HEAD
=======

>>>>>>> upstream/master
	/**
	 * The form field type.
	 *
	 * @var    string
	 * @since  11.1
	 */
	protected $type = 'Integer';

	/**
	 * Method to get the field options.
	 *
	 * @return  array  The field option objects.
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function getOptions()
	{
		// Initialize variables.
		$options = array();

		// Initialize some field attributes.
<<<<<<< HEAD
		$first	= (int) $this->element['first'];
		$last	= (int) $this->element['last'];
		$step	= (int) $this->element['step'];

		// Sanity checks.
		if ($step == 0) {
			// Step of 0 will create an endless loop.
			return $options;
		} else if ($first < $last && $step < 0) {
			// A negative step will never reach the last number.
			return $options;
		} else if ($first > $last && $step > 0) {
=======
		$first = (int) $this->element['first'];
		$last = (int) $this->element['last'];
		$step = (int) $this->element['step'];

		// Sanity checks.
		if ($step == 0)
		{
			// Step of 0 will create an endless loop.
			return $options;
		}
		else if ($first < $last && $step < 0)
		{
			// A negative step will never reach the last number.
			return $options;
		}
		else if ($first > $last && $step > 0)
		{
>>>>>>> upstream/master
			// A position step will never reach the last number.
			return $options;
		}

		// Build the options array.
<<<<<<< HEAD
		for ($i = $first; $i <= $last; $i += $step) {
=======
		for ($i = $first; $i <= $last; $i += $step)
		{
>>>>>>> upstream/master
			$options[] = JHtml::_('select.option', $i);
		}

		// Merge any additional options in the XML definition.
		$options = array_merge(parent::getOptions(), $options);

		return $options;
	}
}