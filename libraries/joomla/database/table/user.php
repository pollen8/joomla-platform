<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Database
 *
 * @copyright   Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

<<<<<<< HEAD
defined('JPATH_PLATFORM') or die;
=======
defined('JPATH_PLATFORM') or die();
>>>>>>> upstream/master

/**
 * Users table
 *
 * @package     Joomla.Platform
 * @subpackage  Table
 * @since       11.1
 */
class JTableUser extends JTable
{
	/**
	 * Associative array of user names => group ids
	 *
<<<<<<< HEAD
	 * @since   11.1
	 * @var    array
=======
	 * @var    array
	 * @since  11.1
>>>>>>> upstream/master
	 */
	var $groups;

	/**
<<<<<<< HEAD
	* @param database A database connector object
	*/
=======
	 * Contructor
	 *
	 * @param   database  &$db  A database connector object.
	 *
	 * @return  JTableUser
	 *
	 * @since  11.1
	 */
>>>>>>> upstream/master
	function __construct(&$db)
	{
		parent::__construct('#__users', 'id', $db);

		// Initialise.
		$this->id = 0;
		$this->sendEmail = 0;
	}

	/**
	 * Method to load a user, user groups, and any other necessary data
	 * from the database so that it can be bound to the user object.
	 *
<<<<<<< HEAD
	 * @param   integer  $userId		An optional user id.
	 *
	 * @return  bool  True on success, false on failure.
=======
	 * @param   integer  $userId  An optional user id.
	 * @param   boolean  $reset   False if row not found or on error
	 * (internal error state set in that case).
	 *
	 * @return  boolean  True on success, false on failure.
>>>>>>> upstream/master
	 *
	 * @since   11.1
	 */
	function load($userId = null, $reset = true)
	{
		// Get the id to load.
<<<<<<< HEAD
		if ($userId !== null) {
			$this->id = $userId;
		} else {
=======
		if ($userId !== null)
		{
			$this->id = $userId;
		}
		else
		{
>>>>>>> upstream/master
			$userId = $this->id;
		}

		// Check for a valid id to load.
<<<<<<< HEAD
		if ($userId === null) {
=======
		if ($userId === null)
		{
>>>>>>> upstream/master
			return false;
		}

		// Reset the table.
		$this->reset();

		// Load the user data.
<<<<<<< HEAD
		$this->_db->setQuery(
			'SELECT *' .
			' FROM #__users' .
			' WHERE id = '.(int) $userId
		);
		$data = (array) $this->_db->loadAssoc();

		// Check for an error message.
		if ($this->_db->getErrorNum()) {
=======
		$this->_db->setQuery('SELECT *' . ' FROM #__users' . ' WHERE id = ' . (int) $userId);
		$data = (array) $this->_db->loadAssoc();

		// Check for an error message.
		if ($this->_db->getErrorNum())
		{
>>>>>>> upstream/master
			$this->setError($this->_db->getErrorMsg());
			return false;
		}

<<<<<<< HEAD
		if(!count($data))
=======
		if (!count($data))
>>>>>>> upstream/master
		{
			return false;
		}
		// Bind the data to the table.
		$return = $this->bind($data);

		if ($return !== false)
		{
			// Load the user groups.
			$this->_db->setQuery(
<<<<<<< HEAD
				'SELECT g.id, g.title' .
				' FROM #__usergroups AS g' .
				' JOIN #__user_usergroup_map AS m ON m.group_id = g.id' .
				' WHERE m.user_id = '.(int) $userId
			);
			// Add the groups to the user data.
			$this->groups = $this->_db->loadAssocList('title','id');

			// Check for an error message.
			if ($this->_db->getErrorNum()) {
=======
				'SELECT g.id, g.title' . ' FROM #__usergroups AS g' . ' JOIN #__user_usergroup_map AS m ON m.group_id = g.id'
				. ' WHERE m.user_id = ' . (int) $userId
			);
			// Add the groups to the user data.
			$this->groups = $this->_db->loadAssocList('title', 'id');

			// Check for an error message.
			if ($this->_db->getErrorNum())
			{
>>>>>>> upstream/master
				$this->setError($this->_db->getErrorMsg());
				return false;
			}
		}

		return $return;
	}

	/**
	 * Method to bind the user, user groups, and any other necessary data.
	 *
<<<<<<< HEAD
	 * @param   array  $array		The data to bind.
	 * @param   mixed  $ignore		An array or space separated list of fields to ignore.
=======
	 * @param   array  $array   The data to bind.
	 * @param   mixed  $ignore  An array or space separated list of fields to ignore.
>>>>>>> upstream/master
	 *
	 * @return  boolean  True on success, false on failure.
	 *
	 * @since   11.1
	 */
	function bind($array, $ignore = '')
	{
<<<<<<< HEAD
		if (key_exists('params', $array) && is_array($array['params'])) {
			$registry = new JRegistry();
			$registry->loadArray($array['params']);
			$array['params'] = (string)$registry;
=======
		if (key_exists('params', $array) && is_array($array['params']))
		{
			$registry = new JRegistry;
			$registry->loadArray($array['params']);
			$array['params'] = (string) $registry;
>>>>>>> upstream/master
		}

		// Attempt to bind the data.
		$return = parent::bind($array, $ignore);

		// Load the real group data based on the bound ids.
		if ($return && !empty($this->groups))
		{
			// Set the group ids.
			JArrayHelper::toInteger($this->groups);

			// Get the titles for the user groups.
			$this->_db->setQuery(
<<<<<<< HEAD
				'SELECT '.$this->_db->quoteName('id').', '.$this->_db->quoteName('title') .
				' FROM '.$this->_db->quoteName('#__usergroups') .
				' WHERE '.$this->_db->quoteName('id').' = '.implode(' OR '.$this->_db->quoteName('id').' = ', $this->groups)
			);
			// Set the titles for the user groups.
			$this->groups = $this->_db->loadAssocList('title','id');

			// Check for a database error.
			if ($this->_db->getErrorNum()) {
=======
				'SELECT ' . $this->_db->quoteName('id') . ', ' . $this->_db->quoteName('title') . ' FROM '
				. $this->_db->quoteName('#__usergroups') . ' WHERE ' . $this->_db->quoteName('id') . ' = '
				. implode(' OR ' . $this->_db->quoteName('id') . ' = ', $this->groups)
			);
			// Set the titles for the user groups.
			$this->groups = $this->_db->loadAssocList('title', 'id');

			// Check for a database error.
			if ($this->_db->getErrorNum())
			{
>>>>>>> upstream/master
				$this->setError($this->_db->getErrorMsg());
				return false;
			}
		}

		return $return;
	}

	/**
	 * Validation and filtering
	 *
	 * @return  boolean  True is satisfactory
<<<<<<< HEAD
=======
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	function check()
	{
		jimport('joomla.mail.helper');

		// Validate user information
<<<<<<< HEAD
		if (trim($this->name) == '') {
=======
		if (trim($this->name) == '')
		{
>>>>>>> upstream/master
			$this->setError(JText::_('JLIB_DATABASE_ERROR_PLEASE_ENTER_YOUR_NAME'));
			return false;
		}

<<<<<<< HEAD
		if (trim($this->username) == '') {
=======
		if (trim($this->username) == '')
		{
>>>>>>> upstream/master
			$this->setError(JText::_('JLIB_DATABASE_ERROR_PLEASE_ENTER_A_USER_NAME'));
			return false;
		}

<<<<<<< HEAD
		if (preg_match( "#[<>\"'%;()&]#i", $this->username) || strlen(utf8_decode($this->username )) < 2) {
			$this->setError( JText::sprintf( 'JLIB_DATABASE_ERROR_VALID_AZ09', 2 ));
			return false;
		}

		if ((trim($this->email) == "") || ! JMailHelper::isEmailAddress($this->email)) {
=======
		if (preg_match("#[<>\"'%;()&]#i", $this->username) || strlen(utf8_decode($this->username)) < 2)
		{
			$this->setError(JText::sprintf('JLIB_DATABASE_ERROR_VALID_AZ09', 2));
			return false;
		}

		if ((trim($this->email) == "") || !JMailHelper::isEmailAddress($this->email))
		{
>>>>>>> upstream/master
			$this->setError(JText::_('JLIB_DATABASE_ERROR_VALID_MAIL'));
			return false;
		}

		// Set the registration timestamp
<<<<<<< HEAD
		if ($this->registerDate == null || $this->registerDate == $this->_db->getNullDate() ) {
			$this->registerDate = JFactory::getDate()->toMySQL();
		}


		// check for existing username
		$query = 'SELECT id'
		. ' FROM #__users '
		. ' WHERE username = ' . $this->_db->Quote($this->username)
		. ' AND id != '. (int) $this->id;
		;
		$this->_db->setQuery($query);
		$xid = intval($this->_db->loadResult());
		if ($xid && $xid != intval($this->id)) {
			$this->setError( JText::_('JLIB_DATABASE_ERROR_USERNAME_INUSE'));
			return false;
		}


		// check for existing email
		$query = 'SELECT id'
			. ' FROM #__users '
			. ' WHERE email = '. $this->_db->Quote($this->email)
			. ' AND id != '. (int) $this->id
			;
		$this->_db->setQuery($query);
		$xid = intval($this->_db->loadResult());
		if ($xid && $xid != intval($this->id)) {
=======
		if ($this->registerDate == null || $this->registerDate == $this->_db->getNullDate())
		{
			$this->registerDate = JFactory::getDate()->toMySQL();
		}

		// check for existing username
		$query = 'SELECT id' . ' FROM #__users ' . ' WHERE username = ' . $this->_db->Quote($this->username) . ' AND id != ' . (int) $this->id;

		$this->_db->setQuery($query);
		$xid = intval($this->_db->loadResult());
		if ($xid && $xid != intval($this->id))
		{
			$this->setError(JText::_('JLIB_DATABASE_ERROR_USERNAME_INUSE'));
			return false;
		}

		// check for existing email
		$query = 'SELECT id' . ' FROM #__users ' . ' WHERE email = ' . $this->_db->Quote($this->email) . ' AND id != ' . (int) $this->id;
		$this->_db->setQuery($query);
		$xid = intval($this->_db->loadResult());
		if ($xid && $xid != intval($this->id))
		{
>>>>>>> upstream/master
			$this->setError(JText::_('JLIB_DATABASE_ERROR_EMAIL_INUSE'));
			return false;
		}

		// check for root_user != username
<<<<<<< HEAD
		$config		= JFactory::getConfig();
		$rootUser	= $config->get('root_user');
=======
		$config = JFactory::getConfig();
		$rootUser = $config->get('root_user');
>>>>>>> upstream/master
		if (!is_numeric($rootUser))
		{
			$query = $this->_db->getQuery(true);
			$query->select('id');
			$query->from('#__users');
<<<<<<< HEAD
			$query->where('username = '.$this->_db->quote($rootUser));
			$this->_db->setQuery($query);
			$xid = intval($this->_db->loadResult());
			if ($rootUser==$this->username && (!$xid || $xid && $xid != intval($this->id))  || $xid && $xid == intval($this->id) && $rootUser!=$this->username) {
				$this->setError( JText::_('JLIB_DATABASE_ERROR_USERNAME_CANNOT_CHANGE'));
=======
			$query->where('username = ' . $this->_db->quote($rootUser));
			$this->_db->setQuery($query);
			$xid = intval($this->_db->loadResult());
			if ($rootUser == $this->username && (!$xid || $xid && $xid != intval($this->id))
				|| $xid && $xid == intval($this->id) && $rootUser != $this->username
			)
			{
				$this->setError(JText::_('JLIB_DATABASE_ERROR_USERNAME_CANNOT_CHANGE'));
>>>>>>> upstream/master
				return false;
			}
		}

		return true;
	}

<<<<<<< HEAD
=======
	/**
	 * Method to store a row in the database from the JTable instance properties.
	 * If a primary key value is set the row with that primary key value will be
	 * updated with the instance property values.  If no primary key value is set
	 * a new row will be inserted into the database with the properties from the
	 * JTable instance.
	 *
	 * @param   boolean  $updateNulls  True to update fields even if they are null.
	 *
	 * @return  boolean  True on success.
	 *
	 * @link    http://docs.joomla.org/JTable/store
	 * @since   11.1
	 */
>>>>>>> upstream/master
	function store($updateNulls = false)
	{
		// Get the table key and key value.
		$k = $this->_tbl_key;
<<<<<<< HEAD
		$key =  $this->$k;
=======
		$key = $this->$k;
>>>>>>> upstream/master

		// TODO: This is a dumb way to handle the groups.
		// Store groups locally so as to not update directly.
		$groups = $this->groups;
		unset($this->groups);

		// Insert or update the object based on presence of a key value.
<<<<<<< HEAD
		if ($key) {
			// Already have a table key, update the row.
			$return = $this->_db->updateObject($this->_tbl, $this, $this->_tbl_key, $updateNulls);
		}
		else {
=======
		if ($key)
		{
			// Already have a table key, update the row.
			$return = $this->_db->updateObject($this->_tbl, $this, $this->_tbl_key, $updateNulls);
		}
		else
		{
>>>>>>> upstream/master
			// Don't have a table key, insert the row.
			$return = $this->_db->insertObject($this->_tbl, $this, $this->_tbl_key);
		}

		// Handle error if it exists.
		if (!$return)
		{
			$this->setError(JText::sprintf('JLIB_DATABASE_ERROR_STORE_FAILED', strtolower(get_class($this)), $this->_db->getErrorMsg()));
			return false;
		}

		// Reset groups to the local object.
		$this->groups = $groups;
		unset($groups);

		// Store the group data if the user data was saved.
		if ($return && is_array($this->groups) && count($this->groups))
		{
			// Delete the old user group maps.
			$this->_db->setQuery(
<<<<<<< HEAD
				'DELETE FROM '.$this->_db->quoteName('#__user_usergroup_map') .
				' WHERE '.$this->_db->quoteName('user_id').' = '.(int) $this->id
=======
				'DELETE FROM ' . $this->_db->quoteName('#__user_usergroup_map') .
				' WHERE ' . $this->_db->quoteName('user_id') . ' = ' . (int) $this->id
>>>>>>> upstream/master
			);
			$this->_db->query();

			// Check for a database error.
<<<<<<< HEAD
			if ($this->_db->getErrorNum()) {
=======
			if ($this->_db->getErrorNum())
			{
>>>>>>> upstream/master
				$this->setError($this->_db->getErrorMsg());
				return false;
			}

			// Set the new user group maps.
			$this->_db->setQuery(
<<<<<<< HEAD
				'INSERT INTO '.$this->_db->quoteName('#__user_usergroup_map').' ('.$this->_db->quoteName('user_id').', '.$this->_db->quoteName('group_id').')' .
				' VALUES ('.$this->id.', '.implode('), ('.$this->id.', ', $this->groups).')'
=======
				'INSERT INTO ' . $this->_db->quoteName('#__user_usergroup_map') . ' (' . $this->_db->quoteName('user_id') . ', '
				. $this->_db->quoteName('group_id') . ')' . ' VALUES (' . $this->id . ', '
				. implode('), (' . $this->id . ', ', $this->groups) . ')'
>>>>>>> upstream/master
			);
			$this->_db->query();

			// Check for a database error.
<<<<<<< HEAD
			if ($this->_db->getErrorNum()) {
=======
			if ($this->_db->getErrorNum())
			{
>>>>>>> upstream/master
				$this->setError($this->_db->getErrorMsg());
				return false;
			}
		}

		return true;
	}

	/**
<<<<<<< HEAD
	 * Method to delete a user, user groups, and any other necessary
	 * data from the database.
	 *
	 * @param   integer  $userId		An optional user id.
	 *
	 * @return  bool  True on success, false on failure.
=======
	 * Method to delete a user, user groups, and any other necessary data from the database.
	 *
	 * @param   integer  $userId  An optional user id.
	 *
	 * @return  boolean  True on success, false on failure.
>>>>>>> upstream/master
	 *
	 * @since   11.1
	 */
	function delete($userId = null)
	{
		// Set the primary key to delete.
		$k = $this->_tbl_key;
<<<<<<< HEAD
		if ($userId) {
=======
		if ($userId)
		{
>>>>>>> upstream/master
			$this->$k = intval($userId);
		}

		// Delete the user.
		$this->_db->setQuery(
<<<<<<< HEAD
			'DELETE FROM '.$this->_db->quoteName($this->_tbl).
			' WHERE '.$this->_db->quoteName($this->_tbl_key).' = '.(int) $this->$k
=======
			'DELETE FROM ' . $this->_db->quoteName($this->_tbl) .
			' WHERE ' . $this->_db->quoteName($this->_tbl_key) . ' = ' . (int) $this->$k
>>>>>>> upstream/master
		);
		$this->_db->query();

		// Check for a database error.
<<<<<<< HEAD
		if ($this->_db->getErrorNum()) {
=======
		if ($this->_db->getErrorNum())
		{
>>>>>>> upstream/master
			$this->setError($this->_db->getErrorMsg());
			return false;
		}

		// Delete the user group maps.
		$this->_db->setQuery(
<<<<<<< HEAD
			'DELETE FROM '.$this->_db->quoteName('#__user_usergroup_map') .
			' WHERE '.$this->_db->quoteName('user_id').' = '.(int) $this->$k
=======
			'DELETE FROM ' . $this->_db->quoteName('#__user_usergroup_map') .
			' WHERE ' . $this->_db->quoteName('user_id') . ' = ' . (int) $this->$k
>>>>>>> upstream/master
		);
		$this->_db->query();

		// Check for a database error.
<<<<<<< HEAD
		if ($this->_db->getErrorNum()) {
=======
		if ($this->_db->getErrorNum())
		{
>>>>>>> upstream/master
			$this->setError($this->_db->getErrorMsg());
			return false;
		}

		/*
		 * Clean Up Related Data.
		 */

		$this->_db->setQuery(
<<<<<<< HEAD
			'DELETE FROM '.$this->_db->quoteName('#__messages_cfg') .
			' WHERE '.$this->_db->quoteName('user_id').' = '.(int) $this->$k
=======
			'DELETE FROM ' . $this->_db->quoteName('#__messages_cfg') .
			' WHERE ' . $this->_db->quoteName('user_id') . ' = ' . (int) $this->$k
>>>>>>> upstream/master
		);
		$this->_db->query();

		// Check for a database error.
<<<<<<< HEAD
		if ($this->_db->getErrorNum()) {
=======
		if ($this->_db->getErrorNum())
		{
>>>>>>> upstream/master
			$this->setError($this->_db->getErrorMsg());
			return false;
		}

		$this->_db->setQuery(
<<<<<<< HEAD
			'DELETE FROM '.$this->_db->quoteName('#__messages') .
			' WHERE '.$this->_db->quoteName('user_id_to').' = '.(int) $this->$k
=======
			'DELETE FROM ' . $this->_db->quoteName('#__messages') .
			' WHERE ' . $this->_db->quoteName('user_id_to') . ' = ' . (int) $this->$k
>>>>>>> upstream/master
		);
		$this->_db->query();

		// Check for a database error.
<<<<<<< HEAD
		if ($this->_db->getErrorNum()) {
=======
		if ($this->_db->getErrorNum())
		{
>>>>>>> upstream/master
			$this->setError($this->_db->getErrorMsg());
			return false;
		}

		return true;
	}

	/**
	 * Updates last visit time of user
	 *
<<<<<<< HEAD
	 * @param   integer  The timestamp, defaults to 'now'
	 *
	 * @return  bool  False if an error occurs
=======
	 * @param   integer  $timeStamp  The timestamp, defaults to 'now'.
	 * @param   integer  $userId     The user id (optional).
	 *
	 * @return  boolean  False if an error occurs
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	function setLastVisit($timeStamp = null, $userId = null)
	{
		// Check for User ID
		if (is_null($userId))
		{
<<<<<<< HEAD
			if (isset($this)) {
				$userId = $this->id;
			} else {
=======
			if (isset($this))
			{
				$userId = $this->id;
			}
			else
			{
>>>>>>> upstream/master
				// do not translate
				jexit(JText::_('JLIB_DATABASE_ERROR_SETLASTVISIT'));
			}
		}

		// If no timestamp value is passed to functon, than current time is used.
		$date = JFactory::getDate($timeStamp);

		// Update the database row for the user.
<<<<<<< HEAD
		$this->_db->setQuery(
			'UPDATE '.$this->_db->quoteName($this->_tbl).
			' SET '.$this->_db->quoteName('lastvisitDate').' = '.$this->_db->Quote($this->_db->toSQLDate($date)) .
			' WHERE '.$this->_db->quoteName('id').' = '.(int) $userId
		);
		$this->_db->query();

		// Check for a database error.
		if ($this->_db->getErrorNum()) {
			$this->setError($this->_db->getErrorMsg());
=======
		$db = $this->_db;
		$query = $db->getQuery(true);
		$query->update($db->quoteName($this->_tbl));
		$query->set($db->quoteName('lastvisitDate') . '=' . $db->quote($date->format($db->getDateFormat())));
		$query->where($db->quoteName('id') . '=' . (int) $userId);
		$db->setQuery($query);
		$db->query();

		// Check for a database error.
		if ($db->getErrorNum())
		{
			$this->setError($db->getErrorMsg());
>>>>>>> upstream/master
			return false;
		}

		return true;
	}
}
