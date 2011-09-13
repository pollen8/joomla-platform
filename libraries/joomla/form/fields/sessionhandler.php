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
jimport('joomla.session.session');
jimport('joomla.form.formfield');
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');

/**
<<<<<<< HEAD
 * Form Field class for the Joomla Framework.
=======
 * Form Field class for the Joomla Platform.
 * Provides a select list of session handler options.
>>>>>>> upstream/master
 *
 * @package     Joomla.Platform
 * @subpackage  Form
 * @since       11.1
 */
class JFormFieldSessionHandler extends JFormFieldList
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
	protected $type = 'SessionHandler';

	/**
<<<<<<< HEAD
	 * Method to get the field options.
	 *
	 * @return  array  The field option objects.
=======
	 * Method to get the session handler field options.
	 *
	 * @return  array  The field option objects.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function getOptions()
	{
		// Initialize variables.
		$options = array();

		// Get the options from JSession.
<<<<<<< HEAD
		foreach (JSession::getStores() as $store) {
			$options[] = JHtml::_('select.option', $store, JText::_('JLIB_FORM_VALUE_SESSION_'.$store), 'value', 'text');
=======
		foreach (JSession::getStores() as $store)
		{
			$options[] = JHtml::_('select.option', $store, JText::_('JLIB_FORM_VALUE_SESSION_' . $store), 'value', 'text');
>>>>>>> upstream/master
		}

		// Merge any additional options in the XML definition.
		$options = array_merge(parent::getOptions(), $options);

		return $options;
	}
}