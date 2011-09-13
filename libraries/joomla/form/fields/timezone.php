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

/**
<<<<<<< HEAD
 * Form Field class for the Joomla Framework.
=======
 * Form Field class for the Joomla Platform.
>>>>>>> upstream/master
 *
 * @package     Joomla.Platform
 * @subpackage  Form
 * @since       11.1
 */
class JFormFieldTimezone extends JFormFieldGroupedList
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
	protected $type = 'Timezone';

	/**
	 * The list of available timezone groups to use.
	 *
	 * @var    array
<<<<<<< HEAD
	 * @since  11.1
	 */
	protected static $zones = array(
		'Africa', 'America', 'Antarctica', 'Arctic', 'Asia',
		'Atlantic', 'Australia', 'Europe', 'Indian', 'Pacific'
	);

	/**
	 * Method to get the field option groups.
	 *
	 * @return  array  The field option objects as a nested array in groups.
=======
	 *
	 * @since  11.1
	 */
	protected static $zones = array('Africa', 'America', 'Antarctica', 'Arctic', 'Asia', 'Atlantic', 'Australia', 'Europe', 'Indian', 'Pacific');

	/**
	 * Method to get the time zone field option groups.
	 *
	 * @return  array  The field option objects as a nested array in groups.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function getGroups()
	{
		// Initialize variables.
		$groups = array();

		// If the timezone is not set use the server setting.
<<<<<<< HEAD
		if (strlen($this->value) == 0) {
=======
		if (strlen($this->value) == 0)
		{
>>>>>>> upstream/master
			$value = JFactory::getConfig()->get('offset');
		}

		// Get the list of time zones from the server.
		$zones = DateTimeZone::listIdentifiers();

		// Build the group lists.
<<<<<<< HEAD
		foreach ($zones as $zone) {

			// Time zones not in a group we will ignore.
			if (strpos($zone, '/') === false) {
=======
		foreach ($zones as $zone)
		{

			// Time zones not in a group we will ignore.
			if (strpos($zone, '/') === false)
			{
>>>>>>> upstream/master
				continue;
			}

			// Get the group/locale from the timezone.
			list ($group, $locale) = explode('/', $zone, 2);

			// Only use known groups.
<<<<<<< HEAD
			if (in_array($group, self::$zones)) {

				// Initialize the group if necessary.
				if (!isset($groups[$group])) {
=======
			if (in_array($group, self::$zones))
			{

				// Initialize the group if necessary.
				if (!isset($groups[$group]))
				{
>>>>>>> upstream/master
					$groups[$group] = array();
				}

				// Only add options where a locale exists.
<<<<<<< HEAD
				if (!empty($locale)) {
					$groups[$group][$zone] = JHtml::_('select.option',
						$zone,
						str_replace('_', ' ', $locale), 'value', 'text', false);
=======
				if (!empty($locale))
				{
					$groups[$group][$zone] = JHtml::_('select.option', $zone, str_replace('_', ' ', $locale), 'value', 'text', false);
>>>>>>> upstream/master
				}
			}
		}

		// Sort the group lists.
		ksort($groups);
<<<<<<< HEAD
		foreach($groups as $zone => & $location) {
=======
		foreach ($groups as $zone => & $location)
		{
>>>>>>> upstream/master
			sort($location);
		}

		// Merge any additional groups in the XML definition.
		$groups = array_merge(parent::getGroups(), $groups);

		return $groups;
	}
}