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

/**
* eAccelerator session storage handler for PHP
*
 * @package     Joomla.Platform
 * @subpackage  Session
 * @since       11.1
 * @see http://www.php.net/manual/en/function.session-set-save-handler.php
=======
defined('JPATH_PLATFORM') or die();

/**
 * eAccelerator session storage handler for PHP
 *
 * @package     Joomla.Platform
 * @subpackage  Session
 * @see         http://www.php.net/manual/en/function.session-set-save-handler.php
 * @since       11.1
>>>>>>> upstream/master
 */
class JSessionStorageEaccelerator extends JSessionStorage
{
	/**
<<<<<<< HEAD
	* Constructor
	*
	* @param   array    $options optional parameters
	*/
	public function __construct($options = array())
	{
		if (!$this->test()) {
=======
	 * Constructor
	 *
	 * @param   array  $options  Optional parameters.
	 *
	 * @return  JSessionStorageEaccelerator
	 *
	 * @since   11.1
	 */
	public function __construct($options = array())
	{
		if (!$this->test())
		{
>>>>>>> upstream/master
			return JError::raiseError(404, JText::_('JLIB_SESSION_EACCELERATOR_EXTENSION_NOT_AVAILABLE'));
		}

		parent::__construct($options);
	}

	/**
	 * Open the SessionHandler backend.
	 *
<<<<<<< HEAD
	 * @param   string   $save_path	The path to the session object.
	 * @param   string   $session_name  The name of the session.
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
	 * @param   string   $id  The session identifier.
	 *
	 * @return  string    The session data.
	 */
	public function read($id)
	{
		$sess_id = 'sess_'.$id;
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
>>>>>>> upstream/master
		return (string) eaccelerator_get($sess_id);
	}

	/**
	 * Write session data to the SessionHandler backend.
	 *
<<<<<<< HEAD
	 * @param   string   $id			The session identifier.
	 * @param   string   $session_data  The session data.
	 *
	 * @return boolean  True on success, false otherwise.
	 */
	public function write($id, $session_data)
	{
		$sess_id = 'sess_'.$id;
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
>>>>>>> upstream/master
		return eaccelerator_put($sess_id, $session_data, ini_get("session.gc_maxlifetime"));
	}

	/**
<<<<<<< HEAD
	 * Destroy the data for a particular session identifier in the
	 * SessionHandler backend.
	 *
	 * @param   string   $id  The session identifier.
	 * @return boolean  True on success, false otherwise.
	 */
	public function destroy($id)
	{
		$sess_id = 'sess_'.$id;
=======
	 * Destroy the data for a particular session identifier in the SessionHandler backend.
	 *
	 * @param   string  $id  The session identifier.
	 *
	 * @return  boolean  True on success, false otherwise.
	 */
	public function destroy($id)
	{
		$sess_id = 'sess_' . $id;
>>>>>>> upstream/master
		return eaccelerator_rm($sess_id);
	}

	/**
	 * Garbage collect stale sessions from the SessionHandler backend.
	 *
	 * @param   integer  $maxlifetime  The maximum age of a session.
	 *
	 * @return boolean  True on success, false otherwise.
	 */
	public function gc($maxlifetime = null)
	{
		eaccelerator_gc();
		return true;
	}

	/**
	 * Test to see if the SessionHandler is available.
	 *
	 * @return boolean  True on success, false otherwise.
	 */
<<<<<<< HEAD
	public static function test() {
=======
	public static function test()
	{
>>>>>>> upstream/master
		return (extension_loaded('eaccelerator') && function_exists('eaccelerator_get'));
	}
}
