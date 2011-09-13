<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Session
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
 * Database session storage handler for PHP
 *
 * @package     Joomla.Platform
 * @subpackage  Session
<<<<<<< HEAD
 * @since       11.1
 * @see			http://www.php.net/manual/en/function.session-set-save-handler.php
 */
class JSessionStorageDatabase extends JSessionStorage
{
=======
 * @see         http://www.php.net/manual/en/function.session-set-save-handler.php
 * @since       11.1
 */
class JSessionStorageDatabase extends JSessionStorage
{
	/**
	 * @var    unknown  No idea what this does.
	 * @since  11.1
	 */
>>>>>>> upstream/master
	protected $_data = null;

	/**
	 * Open the SessionHandler backend.
	 *
<<<<<<< HEAD
	 * @param   string   The path to the session object.
	 * @param   string   The name of the session.
	 * @return  boolean  True on success, false otherwise.
=======
	 * @param   string  $save_path     The path to the session object.
	 * @param   string  $session_name  The name of the session.
	 *
	 * @return  boolean  True on success, false otherwise.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function open($save_path, $session_name)
	{
		return true;
	}

	/**
	 * Close the SessionHandler backend.
	 *
	 * @return  boolean  True on success, false otherwise.
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function close()
	{
		return true;
	}

	/**
<<<<<<< HEAD
	 * Read the data for a particular session identifier from the
	 * SessionHandler backend.
	 *
	 * @param   string   The session identifier.
	 * @return  string   The session data.
=======
	 * Read the data for a particular session identifier from the SessionHandler backend.
	 *
	 * @param   string  $id  The session identifier.
	 *
	 * @return  string  The session data.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function read($id)
	{
		// Get the database connection object and verify its connected.
		$db = JFactory::getDbo();
<<<<<<< HEAD
		if (!$db->connected()) {
=======
		if (!$db->connected())
		{
>>>>>>> upstream/master
			return false;
		}

		// Get the session data from the database table.
<<<<<<< HEAD
		$db->setQuery(
			'SELECT `data`' .
			' FROM `#__session`' .
			' WHERE `session_id` = '.$db->quote($id)
		);
=======
		$query = $db->getQuery(true);
		$query->select($db->quoteName('data'))
			->from($db->quoteName('#__session'))
			->where($db->quoteName('session_id') . ' = ' . $db->quote($id));

		$db->setQuery($query);

>>>>>>> upstream/master
		return (string) $db->loadResult();
	}

	/**
	 * Write session data to the SessionHandler backend.
	 *
<<<<<<< HEAD
	 * @param   string   The session identifier.
	 * @param   string   The session data.
	 *
	 * @return  boolean  True on success, false otherwise.
=======
	 * @param   string  $id    The session identifier.
	 * @param   string  $data  The session data.
	 *
	 * @return  boolean  True on success, false otherwise.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function write($id, $data)
	{
		// Get the database connection object and verify its connected.
		$db = JFactory::getDbo();
<<<<<<< HEAD
		if (!$db->connected()) {
=======
		if (!$db->connected())
		{
>>>>>>> upstream/master
			return false;
		}

		// Try to update the session data in the database table.
		$db->setQuery(
<<<<<<< HEAD
			'UPDATE `#__session`' .
			' SET `data` = '.$db->quote($data).',' .
			'	  `time` = '.(int) time() .
			' WHERE `session_id` = '.$db->quote($id)
		);
		if (!$db->query()) {
			return false;
 		}

		if ($db->getAffectedRows()) {
			return true;
		} else {
			// If the session does not exist, we need to insert the session.
			$db->setQuery(
				'INSERT INTO `#__session` (`session_id`, `data`, `time`)' .
				' VALUES ('.$db->quote($id).', '.$db->quote($data).', '.(int) time().')'
=======
			'UPDATE ' . $db->quoteName('#__session') .
			' SET ' . $db->quoteName('data') . ' = ' . $db->quote($data) . ',' . '	  ' . $db->quoteName('time') . ' = ' . (int) time() .
			' WHERE ' . $db->quoteName('session_id') . ' = ' . $db->quote($id)
		);
		if (!$db->query())
		{
			return false;
		}

		if ($db->getAffectedRows())
		{
			return true;
		}
		else
		{
			// If the session does not exist, we need to insert the session.
			$db->setQuery(
				'INSERT INTO ' . $db->quoteName('#__session') .
				' (' . $db->quoteName('session_id') . ', ' . $db->quoteName('data') . ', ' . $db->quoteName('time') . ')' .
				' VALUES (' . $db->quote($id) . ', ' . $db->quote($data) . ', ' . (int) time() . ')'
>>>>>>> upstream/master
			);
			return (boolean) $db->query();
		}
	}

	/**
<<<<<<< HEAD
	 * Destroy the data for a particular session identifier in the
	 * SessionHandler backend.
	 *
	 * @param   string   The session identifier.
	 *
	 * @return  boolean  True on success, false otherwise.
=======
	 * Destroy the data for a particular session identifier in the SessionHandler backend.
	 *
	 * @param   string  $id  The session identifier.
	 *
	 * @return  boolean  True on success, false otherwise.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function destroy($id)
	{
		// Get the database connection object and verify its connected.
		$db = JFactory::getDbo();
<<<<<<< HEAD
		if (!$db->connected()) {
=======
		if (!$db->connected())
		{
>>>>>>> upstream/master
			return false;
		}

		// Remove a session from the database.
		$db->setQuery(
<<<<<<< HEAD
			'DELETE FROM `#__session`' .
			' WHERE `session_id` = '.$db->quote($id)
		);
=======
			'DELETE FROM ' . $db->quoteName('#__session') .
			' WHERE ' . $db->quoteName('session_id') . ' = ' . $db->quote($id)
		);

>>>>>>> upstream/master
		return (boolean) $db->query();
	}

	/**
	 * Garbage collect stale sessions from the SessionHandler backend.
	 *
<<<<<<< HEAD
	 * @param   integer  The maximum age of a session.
	 * @return  boolean  True on success, false otherwise.
=======
	 * @param   integer  $lifetime  The maximum age of a session.
	 *
	 * @return  boolean  True on success, false otherwise.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	function gc($lifetime = 1440)
	{
		// Get the database connection object and verify its connected.
		$db = JFactory::getDbo();
<<<<<<< HEAD
		if (!$db->connected()) {
=======
		if (!$db->connected())
		{
>>>>>>> upstream/master
			return false;
		}

		// Determine the timestamp threshold with which to purge old sessions.
		$past = time() - $lifetime;

		// Remove expired sessions from the database.
		$db->setQuery(
<<<<<<< HEAD
			'DELETE FROM `#__session`' .
			' WHERE `time` < '.(int) $past
		);
		return (boolean) $db->query();
	}
}
=======
			'DELETE FROM ' . $db->quoteName('#__session') .
			' WHERE ' . $db->quoteName('time') . ' < ' . (int) $past
		);

		return (boolean) $db->query();
	}
}
>>>>>>> upstream/master
