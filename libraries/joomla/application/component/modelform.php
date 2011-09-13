<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Application
 *
 * @copyright   Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

<<<<<<< HEAD
defined('JPATH_PLATFORM') or die;
=======
defined('JPATH_PLATFORM') or die();
>>>>>>> upstream/master

jimport('joomla.application.component.model');
jimport('joomla.form.form');

/**
 * Prototype form model.
 *
 * @package     Joomla.Platform
 * @subpackage  Application
<<<<<<< HEAD
=======
 * @see         JForm
 * @see         JFormField
 * @see         JformRule
>>>>>>> upstream/master
 * @since       11.1
 */
abstract class JModelForm extends JModel
{
	/**
	 * Array of form objects.
<<<<<<< HEAD
=======
	 *
	 * @var    array
	 * @since  11.1
>>>>>>> upstream/master
	 */
	protected $_forms = array();

	/**
	 * Method to checkin a row.
	 *
<<<<<<< HEAD
	 * @param   integer  $pk The numeric id of the primary key.
	 *
	 * @return  boolean	False on failure or error, true otherwise.
=======
	 * @param   integer  $pk  The numeric id of the primary key.
	 *
	 * @return  boolean  False on failure or error, true otherwise.
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function checkin($pk = null)
	{
		// Only attempt to check the row in if it exists.
<<<<<<< HEAD
		if ($pk) {
=======
		if ($pk)
		{
>>>>>>> upstream/master
			$user = JFactory::getUser();

			// Get an instance of the row to checkin.
			$table = $this->getTable();
<<<<<<< HEAD
			if (!$table->load($pk)) {
=======
			if (!$table->load($pk))
			{
>>>>>>> upstream/master
				$this->setError($table->getError());
				return false;
			}

			// Check if this is the user having previously checked out the row.
<<<<<<< HEAD
			if ($table->checked_out > 0 && $table->checked_out != $user->get('id') && !$user->authorise('core.admin', 'com_checkin')) {
=======
			if ($table->checked_out > 0 && $table->checked_out != $user->get('id') && !$user->authorise('core.admin', 'com_checkin'))
			{
>>>>>>> upstream/master
				$this->setError(JText::_('JLIB_APPLICATION_ERROR_CHECKIN_USER_MISMATCH'));
				return false;
			}

			// Attempt to check the row in.
<<<<<<< HEAD
			if (!$table->checkin($pk)) {
=======
			if (!$table->checkin($pk))
			{
>>>>>>> upstream/master
				$this->setError($table->getError());
				return false;
			}
		}

		return true;
	}

	/**
	 * Method to check-out a row for editing.
	 *
<<<<<<< HEAD
	 * @param   integer  $pk	The numeric id of the primary key.
	 *
	 * @return  boolean	False on failure or error, true otherwise.
=======
	 * @param   integer  $pk  The numeric id of the primary key.
	 *
	 * @return  boolean  False on failure or error, true otherwise.
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function checkout($pk = null)
	{
		// Only attempt to check the row in if it exists.
<<<<<<< HEAD
		if ($pk) {
=======
		if ($pk)
		{
>>>>>>> upstream/master
			$user = JFactory::getUser();

			// Get an instance of the row to checkout.
			$table = $this->getTable();
<<<<<<< HEAD
			if (!$table->load($pk)) {
=======
			if (!$table->load($pk))
			{
>>>>>>> upstream/master
				$this->setError($table->getError());
				return false;
			}

			// Check if this is the user having previously checked out the row.
<<<<<<< HEAD
			if ($table->checked_out > 0 && $table->checked_out != $user->get('id')) {
=======
			if ($table->checked_out > 0 && $table->checked_out != $user->get('id'))
			{
>>>>>>> upstream/master
				$this->setError(JText::_('JLIB_APPLICATION_ERROR_CHECKOUT_USER_MISMATCH'));
				return false;
			}

			// Attempt to check the row out.
<<<<<<< HEAD
			if (!$table->checkout($user->get('id'), $pk)) {
=======
			if (!$table->checkout($user->get('id'), $pk))
			{
>>>>>>> upstream/master
				$this->setError($table->getError());
				return false;
			}
		}

		return true;
	}

	/**
	 * Abstract method for getting the form from the model.
	 *
<<<<<<< HEAD
	 * @param   array    $data		Data for the form.
	 * @param   boolean  $loadData	True if the form is to load its own data (default case), false if not.
	 * @return  mixed    A JForm object on success, false on failure
=======
	 * @param   array    $data      Data for the form.
	 * @param   boolean  $loadData  True if the form is to load its own data (default case), false if not.
	 *
	 * @return  mixed  A JForm object on success, false on failure
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	abstract public function getForm($data = array(), $loadData = true);

	/**
	 * Method to get a form object.
	 *
	 * @param   string   $name     The name of the form.
	 * @param   string   $source   The form source. Can be XML string if file flag is set to false.
	 * @param   array    $options  Optional array of options for the form creation.
	 * @param   boolean  $clear    Optional argument to force load a new form.
	 * @param   string   $xpath    An optional xpath to search for the fields.
	 *
	 * @return  mixed  JForm object on success, False on error.
<<<<<<< HEAD
=======
	 *
	 * @see     JForm
	 * @since   11.1
>>>>>>> upstream/master
	 */
	protected function loadForm($name, $source = null, $options = array(), $clear = false, $xpath = false)
	{
		// Handle the optional arguments.
<<<<<<< HEAD
		$options['control']	= JArrayHelper::getValue($options, 'control', false);

		// Create a signature hash.
		$hash = md5($source.serialize($options));

		// Check if we can use a previously loaded form.
		if (isset($this->_forms[$hash]) && !$clear) {
=======
		$options['control'] = JArrayHelper::getValue($options, 'control', false);

		// Create a signature hash.
		$hash = md5($source . serialize($options));

		// Check if we can use a previously loaded form.
		if (isset($this->_forms[$hash]) && !$clear)
		{
>>>>>>> upstream/master
			return $this->_forms[$hash];
		}

		// Get the form.
<<<<<<< HEAD
		JForm::addFormPath(JPATH_COMPONENT.'/models/forms');
		JForm::addFieldPath(JPATH_COMPONENT.'/models/fields');

		try {
			$form = JForm::getInstance($name, $source, $options, false, $xpath);

			if (isset($options['load_data']) && $options['load_data']) {
				// Get the data for the form.
				$data = $this->loadFormData();
			} else {
=======
		JForm::addFormPath(JPATH_COMPONENT . '/models/forms');
		JForm::addFieldPath(JPATH_COMPONENT . '/models/fields');

		try
		{
			$form = JForm::getInstance($name, $source, $options, false, $xpath);

			if (isset($options['load_data']) && $options['load_data'])
			{
				// Get the data for the form.
				$data = $this->loadFormData();
			}
			else
			{
>>>>>>> upstream/master
				$data = array();
			}

			// Allow for additional modification of the form, and events to be triggered.
			// We pass the data because plugins may require it.
			$this->preprocessForm($form, $data);

			// Load the data into the form after the plugins have operated.
			$form->bind($data);

<<<<<<< HEAD
		} catch (Exception $e) {
=======
		}
		catch (Exception $e)
		{
>>>>>>> upstream/master
			$this->setError($e->getMessage());
			return false;
		}

		// Store the form for later.
		$this->_forms[$hash] = $form;

		return $form;
	}

	/**
	 * Method to get the data that should be injected in the form.
	 *
	 * @return  array    The default data is an empty array.
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function loadFormData()
	{
		return array();
	}

	/**
	 * Method to allow derived classes to preprocess the form.
	 *
<<<<<<< HEAD
	 * @param   object   A form object.
	 * @param   mixed    The data expected for the form.
	 * @param   string   The name of the plugin group to import (defaults to "content").
	 * @throws	Exception if there is an error in the form event.
	 * @since   11.1
=======
	 * @param   object  $form   A form object.
	 * @param   mixed   $data   The data expected for the form.
	 * @param   string  $group  The name of the plugin group to import (defaults to "content").
	 *
	 * @return  void
	 *
	 * @see     JFormField
	 * @since   11.1
	 * @throws  Exception if there is an error in the form event.
>>>>>>> upstream/master
	 */
	protected function preprocessForm(JForm $form, $data, $group = 'content')
	{
		// Import the approriate plugin group.
		JPluginHelper::importPlugin($group);

		// Get the dispatcher.
<<<<<<< HEAD
		$dispatcher	= JDispatcher::getInstance();
=======
		$dispatcher = JDispatcher::getInstance();
>>>>>>> upstream/master

		// Trigger the form preparation event.
		$results = $dispatcher->trigger('onContentPrepareForm', array($form, $data));

		// Check for errors encountered while preparing the form.
<<<<<<< HEAD
		if (count($results) && in_array(false, $results, true)) {
=======
		if (count($results) && in_array(false, $results, true))
		{
>>>>>>> upstream/master
			// Get the last error.
			$error = $dispatcher->getError();

			// Convert to a JException if necessary.
<<<<<<< HEAD
			if (!JError::isError($error)) {
=======
			if (!JError::isError($error))
			{
>>>>>>> upstream/master
				throw new Exception($error);
			}
		}
	}

	/**
	 * Method to validate the form data.
	 *
<<<<<<< HEAD
	 * @param   object  $form		The form to validate against.
	 * @param   array   $data		The data to validate.
	 * @return  mixed  Array of filtered data if valid, false otherwise.
	 * @since	1.1
	 */
	function validate($form, $data)
	{
		// Filter and validate the form data.
		$data	= $form->filter($data);
		$return	= $form->validate($data);

		// Check for an error.
		if (JError::isError($return)) {
=======
	 * @param   object  $form   The form to validate against.
	 * @param   array   $data   The data to validate.
	 * @param   string  $group  The name of the field group to validate.
	 *
	 * @return  mixed  Array of filtered data if valid, false otherwise.
	 *
	 * @see     JFormRule
	 * @see     JFilterInput
	 * @since   11.1
	 */
	function validate($form, $data, $group = null)
	{
		// Filter and validate the form data.
		$data = $form->filter($data);
		$return = $form->validate($data, $group);

		// Check for an error.
		if (JError::isError($return))
		{
>>>>>>> upstream/master
			$this->setError($return->getMessage());
			return false;
		}

		// Check the validation results.
<<<<<<< HEAD
		if ($return === false) {
			// Get the validation messages from the form.
			foreach ($form->getErrors() as $message) {
=======
		if ($return === false)
		{
			// Get the validation messages from the form.
			foreach ($form->getErrors() as $message)
			{
>>>>>>> upstream/master
				$this->setError(JText::_($message));
			}

			return false;
		}

		return $data;
	}
}
