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
 * XCache session storage handler
 *
 * @package     Joomla.Platform
<<<<<<< HEAD
 * @subpackage	Cache
 * @since		11.1
=======
 * @subpackage  Cache
 * @since       11.1
>>>>>>> upstream/master
 */
class JSessionStorageXcache extends JSessionStorage
{
	/**
<<<<<<< HEAD
	* Constructor
	*
	* @param array $options optional parameters
	*/
	public function __construct($options = array())
	{
		if (!$this->test()) {
=======
	 * Constructor
	 *
	 * @param   array  $options  Optional parameters.
	 *
	 * @return  JSessionStorageXcache
	 *
	 * @since   11.1
	 */
	public function __construct($options = array())
	{
		if (!$this->test())
		{
>>>>>>> upstream/master
			return JError::raiseError(404, JText::_('JLIB_SESSION_XCACHE_EXTENSION_NOT_AVAILABLE'));
		}

		parent::__construct($options);
	}

	/**
	 * Open the SessionHandler backend.
	 *
<<<<<<< HEAD
	 * @param string $save_path	The path to the session object.
	 * @param string $session_name  The name of the session.
	 *
	 * @return boolean  True on success, false otherwise.
=======
	 * @param   string  $save_path     The path to the session object.
	 * @param   string  $session_name  The name of the session.
	 *
	 * @return  boolean  True on success, false otherwise.
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function open($save_path, $session_name)
	{
		return true;
	}

	/**
	 * Close the SessionHandler backend.
	 *
	 * @return boolean  True on success, false otherwise.
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
	 * @param string $id  The session identifier.
	 *
	 * @return string  The session data.
	 */
	public function read($id)
	{
		$sess_id = 'sess_'.$id;

		// Check if id exists
		if (!xcache_isset($sess_id)){
			return;
		}

		return (string)xcache_get($sess_id);
=======
	 * Read the data for a particular session identifier from the SessionHandler backend.
	 *
	 * @param   string  $id  The session identifier.
	 *
	 * @return  string  The session data.
	 *
	 * @since   11.1
	 */
	public function read($id)
	{
		$sess_id = 'sess_' . $id;

		// Check if id exists
		if (!xcache_isset($sess_id))
		{
			return;
		}

		return (string) xcache_get($sess_id);
>>>>>>> upstream/master
	}

	/**
	 * Write session data to the SessionHandler backend.
	 *
<<<<<<< HEAD
	 * @param string $id			The session identifier.
	 * @param string $session_data  The session data.
	 *
	 * @return boolean  True on success, false otherwise.
	 */
	public function write($id, $session_data)
	{
		$sess_id = 'sess_'.$id;
		return xcache_set($sess_id, $session_data, ini_get("session.gc_maxlifetime") );
	}

	/**
	 * Destroy the data for a particular session identifier in the
	 * SessionHandler backend.
	 *
	 * @param string $id  The session identifier.
	 *
	 * @return boolean  True on success, false otherwise.
	 */
	public function destroy($id)
	{
		$sess_id = 'sess_'.$id;

		if (!xcache_isset($sess_id)){
=======
	 * @param   string  $id            The session identifier.
	 * @param   string  $session_data  The session data.
	 *
	 * @return  boolean  True on success, false otherwise.
	 *
	 * @since   11.1
	 */
	public function write($id, $session_data)
	{
		$sess_id = 'sess_' . $id;
		return xcache_set($sess_id, $session_data, ini_get("session.gc_maxlifetime"));
	}

	/**
	 * Destroy the data for a particular session identifier in the SessionHandler backend.
	 *
	 * @param   string  $id  The session identifier.
	 *
	 * @return  boolean  True on success, false otherwise.
	 *
	 * @since   11.1
	 */
	public function destroy($id)
	{
		$sess_id = 'sess_' . $id;

		if (!xcache_isset($sess_id))
		{
>>>>>>> upstream/master
			return true;
		}

		return xcache_unset($sess_id);
	}

	/**
	 * Garbage collect stale sessions from the SessionHandler backend.
	 *
<<<<<<< HEAD
	 * @param integer $maxlifetime  The maximum age of a session.
	 *
	 * @return boolean  True on success, false otherwise.
=======
	 * @param   integer  $maxlifetime  The maximum age of a session.
	 *
	 * @return  boolean  True on success, false otherwise.
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function gc($maxlifetime = null)
	{
		return true;
	}

	/**
	 * Test to see if the SessionHandler is available.
	 *
	 * @return boolean  True on success, false otherwise.
	 */
<<<<<<< HEAD
	static public function test() {
=======
	static public function test()
	{
>>>>>>> upstream/master
		return (extension_loaded('xcache'));
	}
}
