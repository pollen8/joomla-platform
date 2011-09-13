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

/**
<<<<<<< HEAD
 * Form Field class for the Joomla Framework.
=======
 * Form Field class for the Joomla Platform.
 *
 * Provides a pop up date picker linked to a button.
 * Optionally may be filtered to use user's or server's time zone.
>>>>>>> upstream/master
 *
 * @package     Joomla.Platform
 * @subpackage  Form
 * @since       11.1
 */
class JFormFieldCalendar extends JFormField
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
	public $type = 'Calendar';

	/**
	 * Method to get the field input markup.
	 *
	 * @return  string   The field input markup.
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function getInput()
	{
		// Initialize some field attributes.
		$format = $this->element['format'] ? (string) $this->element['format'] : '%Y-%m-%d';

		// Build the attributes array.
		$attributes = array();
<<<<<<< HEAD
		if ($this->element['size']) {
			$attributes['size'] = (int) $this->element['size'];
		}
		if ($this->element['maxlength']) {
			$attributes['maxlength'] = (int) $this->element['maxlength'];
		}
		if ($this->element['class']) {
			$attributes['class'] = (string) $this->element['class'];
		}
		if ((string) $this->element['readonly'] == 'true') {
			$attributes['readonly'] = 'readonly';
		}
		if ((string) $this->element['disabled'] == 'true') {
			$attributes['disabled'] = 'disabled';
		}
		if ($this->element['onchange']) {
=======
		if ($this->element['size'])
		{
			$attributes['size'] = (int) $this->element['size'];
		}
		if ($this->element['maxlength'])
		{
			$attributes['maxlength'] = (int) $this->element['maxlength'];
		}
		if ($this->element['class'])
		{
			$attributes['class'] = (string) $this->element['class'];
		}
		if ((string) $this->element['readonly'] == 'true')
		{
			$attributes['readonly'] = 'readonly';
		}
		if ((string) $this->element['disabled'] == 'true')
		{
			$attributes['disabled'] = 'disabled';
		}
		if ($this->element['onchange'])
		{
>>>>>>> upstream/master
			$attributes['onchange'] = (string) $this->element['onchange'];
		}

		// Handle the special case for "now".
<<<<<<< HEAD
		if (strtoupper($this->value) == 'NOW') {
=======
		if (strtoupper($this->value) == 'NOW')
		{
>>>>>>> upstream/master
			$this->value = strftime($format);
		}

		// Get some system objects.
		$config = JFactory::getConfig();
<<<<<<< HEAD
		$user	= JFactory::getUser();
=======
		$user = JFactory::getUser();
>>>>>>> upstream/master

		// If a known filter is given use it.
		switch (strtoupper((string) $this->element['filter']))
		{
			case 'SERVER_UTC':
				// Convert a date to UTC based on the server timezone.
<<<<<<< HEAD
				if (intval($this->value)) {
=======
				if (intval($this->value))
				{
>>>>>>> upstream/master
					// Get a date object based on the correct timezone.
					$date = JFactory::getDate($this->value, 'UTC');
					$date->setTimezone(new DateTimeZone($config->get('offset')));

					// Transform the date string.
					$this->value = $date->toMySQL(true);
				}
				break;

			case 'USER_UTC':
				// Convert a date to UTC based on the user timezone.
<<<<<<< HEAD
				if (intval($this->value)) {
=======
				if (intval($this->value))
				{
>>>>>>> upstream/master
					// Get a date object based on the correct timezone.
					$date = JFactory::getDate($this->value, 'UTC');
					$date->setTimezone(new DateTimeZone($user->getParam('timezone', $config->get('offset'))));

					// Transform the date string.
					$this->value = $date->toMySQL(true);
				}
				break;
		}

		return JHtml::_('calendar', $this->value, $this->name, $this->id, $format, $attributes);
	}
<<<<<<< HEAD
}
=======
}
>>>>>>> upstream/master
