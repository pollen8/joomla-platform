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

jimport('joomla.application.component.modelform');

/**
 * Prototype admin model.
 *
 * @package     Joomla.Platform
 * @subpackage  Application
 * @since       11.1
 */
abstract class JModelAdmin extends JModelForm
{
	/**
<<<<<<< HEAD
	 * @var    string	The prefix to use with controller messages.
=======
	 * The prefix to use with controller messages.
	 *
	 * @var    string
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $text_prefix = null;

	/**
<<<<<<< HEAD
	 * @var    string	The event to trigger after deleting the data.
=======
	 * The event to trigger after deleting the data.
	 *
	 * @var    string
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $event_after_delete = null;

	/**
<<<<<<< HEAD
	 * @var    string	The event to trigger after saving the data.
=======
	 * The event to trigger after saving the data.
	 *
	 * @var    string
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $event_after_save = null;

	/**
<<<<<<< HEAD
	 * @var    string	The event to trigger before deleting the data.
=======
	 * The event to trigger before deleting the data.
	 *
	 * @var    string
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $event_before_delete = null;

	/**
<<<<<<< HEAD
	 * @var    string	The event to trigger before saving the data.
=======
	 * The event to trigger before saving the data.
	 *
	 * @var    string
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $event_before_save = null;

	/**
<<<<<<< HEAD
	 * @var    string	The event to trigger after changing the published state of the data.
=======
	 * The event to trigger after changing the published state of the data.
	 *
	 * @var    string
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $event_change_state = null;

	/**
	 * Constructor.
	 *
<<<<<<< HEAD
	 * @param   array  $config	An optional associative array of configuration settings.
	 *
	 * @see		JController
	 * @since  11.1
=======
	 * @param   array  $config  An optional associative array of configuration settings.
	 *
	 * @return  JModelAdmin
	 *
	 * @see     JController
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function __construct($config = array())
	{
		parent::__construct($config);

<<<<<<< HEAD
		if (isset($config['event_after_delete'])) {
			$this->event_after_delete = $config['event_after_delete'];
		} else  if (empty($this->event_after_delete)) {
			$this->event_after_delete = 'onContentAfterDelete';
		}

		if (isset($config['event_after_save'])) {
			$this->event_after_save = $config['event_after_save'];
		} else  if (empty($this->event_after_save)) {
			$this->event_after_save = 'onContentAfterSave';
		}

		if (isset($config['event_before_delete'])) {
			$this->event_before_delete = $config['event_before_delete'];
		} else  if (empty($this->event_before_delete)) {
			$this->event_before_delete = 'onContentBeforeDelete';
		}

		if (isset($config['event_before_save'])) {
			$this->event_before_save = $config['event_before_save'];
		} else  if (empty($this->event_before_save)) {
			$this->event_before_save = 'onContentBeforeSave';
		}

		if (isset($config['event_change_state'])) {
			$this->event_change_state = $config['event_change_state'];
		} else  if (empty($this->event_change_state)) {
=======
		if (isset($config['event_after_delete']))
		{
			$this->event_after_delete = $config['event_after_delete'];
		}
		else if (empty($this->event_after_delete))
		{
			$this->event_after_delete = 'onContentAfterDelete';
		}

		if (isset($config['event_after_save']))
		{
			$this->event_after_save = $config['event_after_save'];
		}
		else if (empty($this->event_after_save))
		{
			$this->event_after_save = 'onContentAfterSave';
		}

		if (isset($config['event_before_delete']))
		{
			$this->event_before_delete = $config['event_before_delete'];
		}
		else if (empty($this->event_before_delete))
		{
			$this->event_before_delete = 'onContentBeforeDelete';
		}

		if (isset($config['event_before_save']))
		{
			$this->event_before_save = $config['event_before_save'];
		}
		else if (empty($this->event_before_save))
		{
			$this->event_before_save = 'onContentBeforeSave';
		}

		if (isset($config['event_change_state']))
		{
			$this->event_change_state = $config['event_change_state'];
		}
		else if (empty($this->event_change_state))
		{
>>>>>>> upstream/master
			$this->event_change_state = 'onContentChangeState';
		}

		// Guess the JText message prefix. Defaults to the option.
<<<<<<< HEAD
		if (isset($config['text_prefix'])) {
			$this->text_prefix = strtoupper($config['text_prefix']);
		} else  if (empty($this->text_prefix)) {
=======
		if (isset($config['text_prefix']))
		{
			$this->text_prefix = strtoupper($config['text_prefix']);
		}
		else if (empty($this->text_prefix))
		{
>>>>>>> upstream/master
			$this->text_prefix = strtoupper($this->option);
		}
	}

	/**
<<<<<<< HEAD
	 * Method to test whether a record can be deleted.
	 *
	 * @param   object   $record	A record object.
	 *
	 * @return  boolean  True if allowed to delete the record. Defaults to the permission for the component.
=======
	 * Method to perform batch operations on an item or a set of items.
	 *
	 * @param   array  $commands  An array of commands to perform.
	 * @param   array  $pks       An array of item ids.
	 *
	 * @return	boolean	 Returns true on success, false on failure.
	 *
	 * @since	11.1
	 */
	public function batch($commands, $pks)
	{
		// Sanitize user ids.
		$pks = array_unique($pks);
		JArrayHelper::toInteger($pks);

		// Remove any values of zero.
		if (array_search(0, $pks, true))
		{
			unset($pks[array_search(0, $pks, true)]);
		}

		if (empty($pks))
		{
			$this->setError(JText::_('JGLOBAL_NO_ITEM_SELECTED'));
			return false;
		}

		$done = false;

		if (!empty($commands['assetgroup_id']))
		{
			if (!$this->batchAccess($commands['assetgroup_id'], $pks))
			{
				return false;
			}

			$done = true;
		}

		if (!empty($commands['category_id']))
		{
			$cmd = JArrayHelper::getValue($commands, 'move_copy', 'c');

			if ($cmd == 'c' && !$this->batchCopy($commands['category_id'], $pks))
			{
				return false;
			}
			else if ($cmd == 'm' && !$this->batchMove($commands['category_id'], $pks))
			{
				return false;
			}
			$done = true;
		}

		if (!$done)
		{
			$this->setError(JText::_('JLIB_APPLICATION_ERROR_INSUFFICIENT_BATCH_INFORMATION'));
			return false;
		}

		// Clear the cache
		$this->cleanCache();

		return true;
	}

	/**
	 * Batch access level changes for a group of rows.
	 *
	 * @param   integer  $value  The new value matching an Asset Group ID.
	 * @param   array    $pks    An array of row IDs.
	 *
	 * @return  booelan  True if successful, false otherwise and internal error is set.
	 *
	 * @since   11.1
	 */
	protected function batchAccess($value, $pks)
	{
		// Check that user has edit permission for items
		$extension = JRequest::getCmd('option');
		$user = JFactory::getUser();
		if (!$user->authorise('core.edit', $extension))
		{
			$this->setError(JText::_('JLIB_APPLICATION_ERROR_BATCH_CANNOT_EDIT'));
			return false;
		}

		$table = $this->getTable();

		foreach ($pks as $pk)
		{
			$table->reset();
			$table->load($pk);
			$table->access = (int) $value;

			if (!$table->store())
			{
				$this->setError($table->getError());
				return false;
			}
		}

		// Clean the cache
		$this->cleanCache();

		return true;
	}

	/**
	 * Batch copy items to a new category or current.
	 *
	 * @param   integer  $value  The new category.
	 * @param   array    $pks    An array of row IDs.
	 *
	 * @return  boolean  True if successful, false otherwise and internal error is set.
	 *
	 * @since	11.1
	 */
	protected function batchCopy($value, $pks)
	{
		$categoryId = (int) $value;

		$table = $this->getTable();
		$db = $this->getDbo();

		// Check that the category exists
		if ($categoryId)
		{
			$categoryTable = JTable::getInstance('Category');
			if (!$categoryTable->load($categoryId))
			{
				if ($error = $categoryTable->getError())
				{
					// Fatal error
					$this->setError($error);
					return false;
				}
				else
				{
					$this->setError(JText::_('JLIB_APPLICATION_ERROR_BATCH_MOVE_CATEGORY_NOT_FOUND'));
					return false;
				}
			}
		}

		if (empty($categoryId))
		{
			$this->setError(JText::_('JLIB_APPLICATION_ERROR_BATCH_MOVE_CATEGORY_NOT_FOUND'));
			return false;
		}

		// Check that the user has create permission for the component
		$extension = JRequest::getCmd('option');
		$user = JFactory::getUser();
		if (!$user->authorise('core.create', $extension))
		{
			$this->setError(JText::_('JLIB_APPLICATION_ERROR_BATCH_CANNOT_CREATE'));
			return false;
		}

		// Parent exists so we let's proceed
		while (!empty($pks))
		{
			// Pop the first ID off the stack
			$pk = array_shift($pks);

			$table->reset();

			// Check that the row actually exists
			if (!$table->load($pk))
			{
				if ($error = $table->getError())
				{
					// Fatal error
					$this->setError($error);
					return false;
				}
				else
				{
					// Not fatal error
					$this->setError(JText::sprintf('JLIB_APPLICATION_ERROR_BATCH_MOVE_ROW_NOT_FOUND', $pk));
					continue;
				}
			}

			// Alter the title & alias
			$data = $this->generateNewTitle($categoryId, $table->alias, $table->title);
			$table->title = $data['0'];
			$table->alias = $data['1'];

			// Reset the ID because we are making a copy
			$table->id = 0;

			// New category ID
			$table->catid = $categoryId;

			// TODO: Deal with ordering?
			//$table->ordering	= 1;

			// Check the row.
			if (!$table->check())
			{
				$this->setError($table->getError());
				return false;
			}

			// Store the row.
			if (!$table->store())
			{
				$this->setError($table->getError());
				return false;
			}
		}

		// Clean the cache
		$this->cleanCache();

		return true;
	}

	/**
	 * Batch move articles to a new category
	 *
	 * @param   integer  $value  The new category ID.
	 * @param   array    $pks    An array of row IDs.
	 *
	 * @return  booelan  True if successful, false otherwise and internal error is set.
	 *
	 * @since	11.1
	 */
	protected function batchMove($value, $pks)
	{
		$categoryId = (int) $value;

		$table = $this->getTable();
		$db = $this->getDbo();

		// Check that the category exists
		if ($categoryId)
		{
			$categoryTable = JTable::getInstance('Category');
			if (!$categoryTable->load($categoryId))
			{
				if ($error = $categoryTable->getError())
				{
					// Fatal error
					$this->setError($error);
					return false;
				}
				else
				{
					$this->setError(JText::_('JLIB_APPLICATION_ERROR_BATCH_MOVE_CATEGORY_NOT_FOUND'));
					return false;
				}
			}
		}

		if (empty($categoryId))
		{
			$this->setError(JText::_('JLIB_APPLICATION_ERROR_BATCH_MOVE_CATEGORY_NOT_FOUND'));
			return false;
		}

		// Check that user has create and edit permission for the component
		$extension = JRequest::getCmd('option');
		$user = JFactory::getUser();
		if (!$user->authorise('core.create', $extension))
		{
			$this->setError(JText::_('JLIB_APPLICATION_ERROR_BATCH_CANNOT_CREATE'));
			return false;
		}

		if (!$user->authorise('core.edit', $extension))
		{
			$this->setError(JText::_('JLIB_APPLICATION_ERROR_BATCH_CANNOT_EDIT'));
			return false;
		}

		// Parent exists so we let's proceed
		foreach ($pks as $pk)
		{
			// Check that the row actually exists
			if (!$table->load($pk))
			{
				if ($error = $table->getError())
				{
					// Fatal error
					$this->setError($error);
					return false;
				}
				else
				{
					// Not fatal error
					$this->setError(JText::sprintf('JLIB_APPLICATION_ERROR_BATCH_MOVE_ROW_NOT_FOUND', $pk));
					continue;
				}
			}

			// Set the new category ID
			$table->catid = $categoryId;

			// Check the row.
			if (!$table->check())
			{
				$this->setError($table->getError());
				return false;
			}

			// Store the row.
			if (!$table->store())
			{
				$this->setError($table->getError());
				return false;
			}
		}

		// Clean the cache
		$this->cleanCache();

		return true;
	}

	/**
	 * Method to test whether a record can be deleted.
	 *
	 * @param   object  $record  A record object.
	 *
	 * @return  boolean  True if allowed to delete the record. Defaults to the permission for the component.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function canDelete($record)
	{
		$user = JFactory::getUser();
		return $user->authorise('core.delete', $this->option);
	}

	/**
	 * Method to test whether a record can be deleted.
	 *
<<<<<<< HEAD
	 * @param   object   $record	A record object.
	 *
	 * @return  boolean  True if allowed to change the state of the record. Defaults to the permission for the component.
=======
	 * @param   object  $record  A record object.
	 *
	 * @return  boolean  True if allowed to change the state of the record. Defaults to the permission for the component.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function canEditState($record)
	{
		$user = JFactory::getUser();
		return $user->authorise('core.edit.state', $this->option);
	}

	/**
	 * Method override to check-in a record or an array of record
	 *
<<<<<<< HEAD
	 * @param   integer|array	$pks	The ID of the primary key or an array of IDs
	 *
	 * @return  mixed    Boolean false if there is an error, otherwise the count of records checked in.
=======
	 * @param   mixed  $pks  The ID of the primary key or an array of IDs
	 *
	 * @return  mixed  Boolean false if there is an error, otherwise the count of records checked in.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function checkin($pks = array())
	{
		// Initialise variables.
<<<<<<< HEAD
		$user		= JFactory::getUser();
		$pks		= (array) $pks;
		$table		= $this->getTable();
		$count		= 0;

		if (empty($pks)) {
			$pks = array((int) $this->getState($this->getName().'.id'));
=======
		$user = JFactory::getUser();
		$pks = (array) $pks;
		$table = $this->getTable();
		$count = 0;

		if (empty($pks))
		{
			$pks = array((int) $this->getState($this->getName() . '.id'));
>>>>>>> upstream/master
		}

		// Check in all items.
		foreach ($pks as $i => $pk)
		{
<<<<<<< HEAD
			if ($table->load($pk)) {

				if ($table->checked_out > 0) {
					if (!parent::checkin($pk)) {
=======
			if ($table->load($pk))
			{

				if ($table->checked_out > 0)
				{
					if (!parent::checkin($pk))
					{
>>>>>>> upstream/master
						return false;
					}
					$count++;
				}
			}
<<<<<<< HEAD
			else {
=======
			else
			{
>>>>>>> upstream/master
				$this->setError($table->getError());

				return false;
			}
		}

		return $count;
	}

	/**
	 * Method override to check-out a record.
	 *
<<<<<<< HEAD
	 * @param   integer  $pk	The ID of the primary key.
	 *
	 * @return  boolean  True if successful, false if an error occurs.
=======
	 * @param   integer  $pk  The ID of the primary key.
	 *
	 * @return  boolean  True if successful, false if an error occurs.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function checkout($pk = null)
	{
		// Initialise variables.
<<<<<<< HEAD
		$pk = (!empty($pk)) ? $pk : (int) $this->getState($this->getName().'.id');
=======
		$pk = (!empty($pk)) ? $pk : (int) $this->getState($this->getName() . '.id');
>>>>>>> upstream/master

		return parent::checkout($pk);
	}

	/**
	 * Method to delete one or more records.
	 *
<<<<<<< HEAD
	 * @param   array    $pks	An array of record primary keys.
	 *
	 * @return  boolean  True if successful, false if an error occurs.
=======
	 * @param   array  &$pks  An array of record primary keys.
	 *
	 * @return  boolean  True if successful, false if an error occurs.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function delete(&$pks)
	{
		// Initialise variables.
<<<<<<< HEAD
		$dispatcher	= JDispatcher::getInstance();
		$user		= JFactory::getUser();
		$pks		= (array) $pks;
		$table		= $this->getTable();
=======
		$dispatcher = JDispatcher::getInstance();
		$user = JFactory::getUser();
		$pks = (array) $pks;
		$table = $this->getTable();
>>>>>>> upstream/master

		// Include the content plugins for the on delete events.
		JPluginHelper::importPlugin('content');

		// Iterate the items to delete each one.
<<<<<<< HEAD
		foreach ($pks as $i => $pk) {

			if ($table->load($pk)) {

				if ($this->canDelete($table)) {

					$context = $this->option.'.'.$this->name;

					// Trigger the onContentBeforeDelete event.
					$result = $dispatcher->trigger($this->event_before_delete, array($context, $table));
					if (in_array(false, $result, true)) {
=======
		foreach ($pks as $i => $pk)
		{

			if ($table->load($pk))
			{

				if ($this->canDelete($table))
				{

					$context = $this->option . '.' . $this->name;

					// Trigger the onContentBeforeDelete event.
					$result = $dispatcher->trigger($this->event_before_delete, array($context, $table));
					if (in_array(false, $result, true))
					{
>>>>>>> upstream/master
						$this->setError($table->getError());
						return false;
					}

<<<<<<< HEAD
					if (!$table->delete($pk)) {
=======
					if (!$table->delete($pk))
					{
>>>>>>> upstream/master
						$this->setError($table->getError());
						return false;
					}

					// Trigger the onContentAfterDelete event.
					$dispatcher->trigger($this->event_after_delete, array($context, $table));

<<<<<<< HEAD
				} else {
=======
				}
				else
				{
>>>>>>> upstream/master

					// Prune items that you can't change.
					unset($pks[$i]);
					$error = $this->getError();
<<<<<<< HEAD
					if ($error) {
						JError::raiseWarning(500, $error);
					}
					else {
						JError::raiseWarning(403, JText::_('JLIB_APPLICATION_ERROR_DELETE_NOT_PERMITTED'));
					}
				}

			} else {
=======
					if ($error)
					{
						JError::raiseWarning(500, $error);
						return false;
					}
					else
					{
						JError::raiseWarning(403, JText::_('JLIB_APPLICATION_ERROR_DELETE_NOT_PERMITTED'));
						return false;
					}
				}

			}
			else
			{
>>>>>>> upstream/master
				$this->setError($table->getError());
				return false;
			}
		}

		// Clear the component's cache
		$this->cleanCache();

		return true;
	}

	/**
<<<<<<< HEAD
	 * Method to get a single record.
	 *
	 * @param   integer  $pk	The id of the primary key.
	 *
	 * @return  mixed    Object on success, false on failure.
=======
	 * Method to change the title & alias.
	 *
	 * @param   integer  $category_id  The id of the category.
	 * @param   string   $alias        The alias.
	 * @param   string   $title        The title.
	 *
	 * @return	array  Contains the modified title and alias.
	 *
	 * @since	11.1
	 */
	protected function generateNewTitle($category_id, $alias, $title)
	{
		// Alter the title & alias
		$table = $this->getTable();
		while ($table->load(array('alias' => $alias, 'catid' => $category_id)))
		{
			$title = JString::increment($title);
			$alias = JString::increment($alias, 'dash');
		}

		return array($title, $alias);
	}

	/**
	 * Method to get a single record.
	 *
	 * @param   integer  $pk  The id of the primary key.
	 *
	 * @return  mixed    Object on success, false on failure.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function getItem($pk = null)
	{
		// Initialise variables.
<<<<<<< HEAD
		$pk		= (!empty($pk)) ? $pk : (int) $this->getState($this->getName().'.id');
		$table	= $this->getTable();

		if ($pk > 0) {
=======
		$pk = (!empty($pk)) ? $pk : (int) $this->getState($this->getName() . '.id');
		$table = $this->getTable();

		if ($pk > 0)
		{
>>>>>>> upstream/master
			// Attempt to load the row.
			$return = $table->load($pk);

			// Check for a table object error.
<<<<<<< HEAD
			if ($return === false && $table->getError()) {
=======
			if ($return === false && $table->getError())
			{
>>>>>>> upstream/master
				$this->setError($table->getError());
				return false;
			}
		}

		// Convert to the JObject before adding other data.
		$properties = $table->getProperties(1);
		$item = JArrayHelper::toObject($properties, 'JObject');

<<<<<<< HEAD
		if (property_exists($item, 'params')) {
			$registry = new JRegistry;
			$registry->loadJSON($item->params);
=======
		if (property_exists($item, 'params'))
		{
			$registry = new JRegistry;
			$registry->loadString($item->params);
>>>>>>> upstream/master
			$item->params = $registry->toArray();
		}

		return $item;
	}

	/**
	 * A protected method to get a set of ordering conditions.
	 *
<<<<<<< HEAD
	 * @param   object  $table	A JTable object.
	 *
	 * @return  array  An array of conditions to add to ordering queries.
=======
	 * @param   object  $table  A JTable object.
	 *
	 * @return  array  An array of conditions to add to ordering queries.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function getReorderConditions($table)
	{
		return array();
	}

	/**
	 * Stock method to auto-populate the model state.
	 *
	 * @return  void
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function populateState()
	{
		// Initialise variables.
		$app = JFactory::getApplication('administrator');
		$table = $this->getTable();
		$key = $table->getKeyName();

		// Get the pk of the record from the request.
		$pk = JRequest::getInt($key);
<<<<<<< HEAD
		$this->setState($this->getName().'.id', $pk);
=======
		$this->setState($this->getName() . '.id', $pk);
>>>>>>> upstream/master

		// Load the parameters.
		$value = JComponentHelper::getParams($this->option);
		$this->setState('params', $value);
	}

	/**
	 * Prepare and sanitise the table data prior to saving.
	 *
<<<<<<< HEAD
	 * @param   JTable	$table	A reference to a JTable object.
	 *
	 * @return  void
=======
	 * @param   JTable  &$table  A reference to a JTable object.
	 *
	 * @return  void
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function prepareTable(&$table)
	{
		// Derived class will provide its own implentation if required.
	}

	/**
	 * Method to change the published state of one or more records.
	 *
<<<<<<< HEAD
	 * @param   array    $pks	A list of the primary keys to change.
	 * @param   integer  $value	The value of the published state.
	 *
	 * @return  boolean  True on success.
=======
	 * @param   array    &$pks   A list of the primary keys to change.
	 * @param   integer  $value  The value of the published state.
	 *
	 * @return  boolean  True on success.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	function publish(&$pks, $value = 1)
	{
		// Initialise variables.
<<<<<<< HEAD
		$dispatcher	= JDispatcher::getInstance();
		$user		= JFactory::getUser();
		$table		= $this->getTable();
		$pks		= (array) $pks;
=======
		$dispatcher = JDispatcher::getInstance();
		$user = JFactory::getUser();
		$table = $this->getTable();
		$pks = (array) $pks;
>>>>>>> upstream/master

		// Include the content plugins for the change of state event.
		JPluginHelper::importPlugin('content');

		// Access checks.
<<<<<<< HEAD
		foreach ($pks as $i => $pk) {
			$table->reset();

			if ($table->load($pk)) {
				if (!$this->canEditState($table)) {
=======
		foreach ($pks as $i => $pk)
		{
			$table->reset();

			if ($table->load($pk))
			{
				if (!$this->canEditState($table))
				{
>>>>>>> upstream/master
					// Prune items that you can't change.
					unset($pks[$i]);
					JError::raiseWarning(403, JText::_('JLIB_APPLICATION_ERROR_EDITSTATE_NOT_PERMITTED'));
					return false;
				}
			}
		}

		// Attempt to change the state of the records.
<<<<<<< HEAD
		if (!$table->publish($pks, $value, $user->get('id'))) {
=======
		if (!$table->publish($pks, $value, $user->get('id')))
		{
>>>>>>> upstream/master
			$this->setError($table->getError());
			return false;
		}

<<<<<<< HEAD
		$context = $this->option.'.'.$this->name;
=======
		$context = $this->option . '.' . $this->name;
>>>>>>> upstream/master

		// Trigger the onContentChangeState event.
		$result = $dispatcher->trigger($this->event_change_state, array($context, $pks, $value));

<<<<<<< HEAD
		if (in_array(false, $result, true)) {
=======
		if (in_array(false, $result, true))
		{
>>>>>>> upstream/master
			$this->setError($table->getError());
			return false;
		}

		// Clear the component's cache
		$this->cleanCache();

		return true;
	}

	/**
	 * Method to adjust the ordering of a row.
	 *
	 * Returns NULL if the user did not have edit
	 * privileges for any of the selected primary keys.
	 *
	 * @param   integer  $pks    The ID of the primary key to move.
	 * @param   integer  $delta  Increment, usually +1 or -1
	 *
<<<<<<< HEAD
	 * @return  boolean|null	False on failure or error, true on success.
=======
	 * @return  mixed  False on failure or error, true on success, null if the $pk is empty (no items selected).
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function reorder($pks, $delta = 0)
	{
		// Initialise variables.
<<<<<<< HEAD
		$user	= JFactory::getUser();
		$table	= $this->getTable();
		$pks	= (array) $pks;
		$result	= true;

		$allowed = true;

		foreach ($pks as $i => $pk) {
			$table->reset();

			if ($table->load($pk) && $this->checkout($pk)) {
				// Access checks.
				if (!$this->canEditState($table)) {
=======
		$user = JFactory::getUser();
		$table = $this->getTable();
		$pks = (array) $pks;
		$result = true;

		$allowed = true;

		foreach ($pks as $i => $pk)
		{
			$table->reset();

			if ($table->load($pk) && $this->checkout($pk))
			{
				// Access checks.
				if (!$this->canEditState($table))
				{
>>>>>>> upstream/master
					// Prune items that you can't change.
					unset($pks[$i]);
					$this->checkin($pk);
					JError::raiseWarning(403, JText::_('JLIB_APPLICATION_ERROR_EDITSTATE_NOT_PERMITTED'));
					$allowed = false;
					continue;
				}

				$where = array();
				$where = $this->getReorderConditions($table);

<<<<<<< HEAD
				if (!$table->move($delta, $where)) {
=======
				if (!$table->move($delta, $where))
				{
>>>>>>> upstream/master
					$this->setError($table->getError());
					unset($pks[$i]);
					$result = false;
				}

				$this->checkin($pk);
<<<<<<< HEAD
			} else {
=======
			}
			else
			{
>>>>>>> upstream/master
				$this->setError($table->getError());
				unset($pks[$i]);
				$result = false;
			}
		}

<<<<<<< HEAD
		if ($allowed === false && empty($pks)) {
=======
		if ($allowed === false && empty($pks))
		{
>>>>>>> upstream/master
			$result = null;
		}

		// Clear the component's cache
<<<<<<< HEAD
		if ($result == true) {
=======
		if ($result == true)
		{
>>>>>>> upstream/master
			$this->cleanCache();
		}

		return $result;
	}

	/**
	 * Method to save the form data.
	 *
<<<<<<< HEAD
	 * @param   array  $data	The form data.
	 *
	 * @return  boolean  True on success.
=======
	 * @param   array  $data  The form data.
	 *
	 * @return  boolean  True on success, False on error.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function save($data)
	{
		// Initialise variables;
		$dispatcher = JDispatcher::getInstance();
<<<<<<< HEAD
		$table		= $this->getTable();
		$key			= $table->getKeyName();
		$pk			= (!empty($data[$key])) ? $data[$key] : (int)$this->getState($this->getName().'.id');
		$isNew		= true;
=======
		$table = $this->getTable();
		$key = $table->getKeyName();
		$pk = (!empty($data[$key])) ? $data[$key] : (int) $this->getState($this->getName() . '.id');
		$isNew = true;
>>>>>>> upstream/master

		// Include the content plugins for the on save events.
		JPluginHelper::importPlugin('content');

		// Allow an exception to be thrown.
		try
		{
			// Load the row if saving an existing record.
<<<<<<< HEAD
			if ($pk > 0) {
=======
			if ($pk > 0)
			{
>>>>>>> upstream/master
				$table->load($pk);
				$isNew = false;
			}

			// Bind the data.
<<<<<<< HEAD
			if (!$table->bind($data)) {
=======
			if (!$table->bind($data))
			{
>>>>>>> upstream/master
				$this->setError($table->getError());
				return false;
			}

			// Prepare the row for saving
			$this->prepareTable($table);

			// Check the data.
<<<<<<< HEAD
			if (!$table->check()) {
=======
			if (!$table->check())
			{
>>>>>>> upstream/master
				$this->setError($table->getError());
				return false;
			}

			// Trigger the onContentBeforeSave event.
<<<<<<< HEAD
			$result = $dispatcher->trigger($this->event_before_save, array($this->option.'.'.$this->name, &$table, $isNew));
			if (in_array(false, $result, true)) {
=======
			$result = $dispatcher->trigger($this->event_before_save, array($this->option . '.' . $this->name, &$table, $isNew));
			if (in_array(false, $result, true))
			{
>>>>>>> upstream/master
				$this->setError($table->getError());
				return false;
			}

			// Store the data.
<<<<<<< HEAD
			if (!$table->store()) {
=======
			if (!$table->store())
			{
>>>>>>> upstream/master
				$this->setError($table->getError());
				return false;
			}

			// Clean the cache.
			$this->cleanCache();

			// Trigger the onContentAfterSave event.
<<<<<<< HEAD
			$dispatcher->trigger($this->event_after_save, array($this->option.'.'.$this->name, &$table, $isNew));
=======
			$dispatcher->trigger($this->event_after_save, array($this->option . '.' . $this->name, &$table, $isNew));
>>>>>>> upstream/master
		}
		catch (Exception $e)
		{
			$this->setError($e->getMessage());

			return false;
		}

		$pkName = $table->getKeyName();

<<<<<<< HEAD
		if (isset($table->$pkName)) {
			$this->setState($this->getName().'.id', $table->$pkName);
		}
		$this->setState($this->getName().'.new', $isNew);
=======
		if (isset($table->$pkName))
		{
			$this->setState($this->getName() . '.id', $table->$pkName);
		}
		$this->setState($this->getName() . '.new', $isNew);
>>>>>>> upstream/master

		return true;
	}

	/**
	 * Saves the manually set order of records.
	 *
<<<<<<< HEAD
	 * @param   array    $pks	An array of primary key ids.
	 * @param   integer  $order	+/-1
	 *
	 * @return  mixed
=======
	 * @param   array    $pks    An array of primary key ids.
	 * @param   integer  $order  +1 or -1
	 *
	 * @return  mixed
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	function saveorder($pks = null, $order = null)
	{
		// Initialise variables.
<<<<<<< HEAD
		$table		= $this->getTable();
		$conditions	= array();
		$user = JFactory::getUser();

		if (empty($pks)) {
			return JError::raiseWarning(500, JText::_($this->text_prefix.'_ERROR_NO_ITEMS_SELECTED'));
		}

		// update ordering values
		foreach ($pks as $i => $pk) {
			$table->load((int) $pk);

			// Access checks.
			if (!$this->canEditState($table)) {
				// Prune items that you can't change.
				unset($pks[$i]);
				JError::raiseWarning(403, JText::_('JLIB_APPLICATION_ERROR_EDITSTATE_NOT_PERMITTED'));
			} else if ($table->ordering != $order[$i]) {
				$table->ordering = $order[$i];

				if (!$table->store()) {
=======
		$table = $this->getTable();
		$conditions = array();
		$user = JFactory::getUser();

		if (empty($pks))
		{
			return JError::raiseWarning(500, JText::_($this->text_prefix . '_ERROR_NO_ITEMS_SELECTED'));
		}

		// update ordering values
		foreach ($pks as $i => $pk)
		{
			$table->load((int) $pk);

			// Access checks.
			if (!$this->canEditState($table))
			{
				// Prune items that you can't change.
				unset($pks[$i]);
				JError::raiseWarning(403, JText::_('JLIB_APPLICATION_ERROR_EDITSTATE_NOT_PERMITTED'));
			}
			else if ($table->ordering != $order[$i])
			{
				$table->ordering = $order[$i];

				if (!$table->store())
				{
>>>>>>> upstream/master
					$this->setError($table->getError());
					return false;
				}

				// Remember to reorder within position and client_id
				$condition = $this->getReorderConditions($table);
				$found = false;

<<<<<<< HEAD
				foreach ($conditions as $cond) {
					if ($cond[1] == $condition) {
=======
				foreach ($conditions as $cond)
				{
					if ($cond[1] == $condition)
					{
>>>>>>> upstream/master
						$found = true;
						break;
					}
				}

<<<<<<< HEAD
				if (!$found) {
					$key = $table->getKeyName();
					$conditions[] = array ($table->$key, $condition);
=======
				if (!$found)
				{
					$key = $table->getKeyName();
					$conditions[] = array($table->$key, $condition);
>>>>>>> upstream/master
				}
			}
		}

		// Execute reorder for each category.
<<<<<<< HEAD
		foreach ($conditions as $cond) {
=======
		foreach ($conditions as $cond)
		{
>>>>>>> upstream/master
			$table->load($cond[0]);
			$table->reorder($cond[1]);
		}

		// Clear the component's cache
		$this->cleanCache();

		return true;
	}
}