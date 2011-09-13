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
 * Custom session storage handler for PHP
 *
 * @package     Joomla.Platform
 * @subpackage  Session
<<<<<<< HEAD
 * @since       11.1
 * @see         http://www.php.net/manual/en/function.session-set-save-handler.php
=======
 * @see         http://www.php.net/manual/en/function.session-set-save-handler.php
 * @since       11.1
>>>>>>> upstream/master
 */
abstract class JSessionStorage extends JObject
{
	/**
<<<<<<< HEAD
	* Constructor
	*
	* @param   array  $options	Optional parameters.
	*/
=======
	 * Constructor
	 *
	 * @param   array  $options  Optional parameters.
	 *
	 * @return  JSessionStorage
	 *
	 * @since   11.1
	 */
>>>>>>> upstream/master
	public function __construct($options = array())
	{
		$this->register($options);
	}

	/**
<<<<<<< HEAD
	 * Returns a session storage handler object, only creating it
	 * if it doesn't already exist.
	 *
	 * @param   name		$name The session store to instantiate
	 *
	 * @return  database	A JSessionStorage object
=======
	 * Returns a session storage handler object, only creating it if it doesn't already exist.
	 *
	 * @param   name   $name     The session store to instantiate
	 * @param   array  $options  Array of options
	 *
	 * @return  JSessionStorage
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function getInstance($name = 'none', $options = array())
	{
		static $instances;

<<<<<<< HEAD
		if (!isset ($instances)) {
			$instances = array ();
=======
		if (!isset($instances))
		{
			$instances = array();
>>>>>>> upstream/master
		}

		$name = strtolower(JFilterInput::getInstance()->clean($name, 'word'));

<<<<<<< HEAD
		if (empty ($instances[$name])) {
			$class = 'JSessionStorage'.ucfirst($name);

			if (!class_exists($class)) {
				$path = dirname(__FILE__).DS.'storage'.DS.$name.'.php';

				if (file_exists($path)) {
					require_once $path;
				} else {
					// No call to JError::raiseError here, as it tries to close the non-existing session
					jexit('Unable to load session storage class: '.$name);
=======
		if (empty($instances[$name]))
		{
			$class = 'JSessionStorage' . ucfirst($name);

			if (!class_exists($class))
			{
				$path = dirname(__FILE__) . '/storage/' . $name . '.php';

				if (file_exists($path))
				{
					require_once $path;
				}
				else
				{
					// No call to JError::raiseError here, as it tries to close the non-existing session
					jexit('Unable to load session storage class: ' . $name);
>>>>>>> upstream/master
				}
			}

			$instances[$name] = new $class($options);
		}

		return $instances[$name];
	}

	/**
<<<<<<< HEAD
	* Register the functions of this class with PHP's session handler
	*
	* @param   array  $options optional parameters
	*/
=======
	 * Register the functions of this class with PHP's session handler
	 *
	 * @param   array  $options  Optional parameters
	 *
	 * @return  void
	 *
	 * @since   11.1
	 */
>>>>>>> upstream/master
	public function register($options = array())
	{
		// use this object as the session handler
		session_set_save_handler(
<<<<<<< HEAD
			array($this, 'open'),
			array($this, 'close'),
			array($this, 'read'),
			array($this, 'write'),
			array($this, 'destroy'),
			array($this, 'gc')
=======
			array($this, 'open'), array($this, 'close'), array($this, 'read'), array($this, 'write'),
			array($this, 'destroy'), array($this, 'gc')
>>>>>>> upstream/master
		);
	}

	/**
	 * Open the SessionHandler backend.
	 *
<<<<<<< HEAD
	 * @param   string  $save_path		The path to the session object.
	 * @param   string  $session_name	The name of the session.
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
<<<<<<< HEAD
	 * @return boolean  True on success, false otherwise.
=======
	 * @return  boolean  True on success, false otherwise.
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function close()
	{
		return true;
	}

	/**
	 * Read the data for a particular session identifier from the
	 * SessionHandler backend.
	 *
	 * @param   string  $id  The session identifier.
<<<<<<< HEAD
	 * @return  string  The session data.
=======
	 *
	 * @return  string  The session data.
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function read($id)
	{
		return;
	}

	/**
	 * Write session data to the SessionHandler backend.
	 *
<<<<<<< HEAD
	 * @param   string  $id				The session identifier.
	 * @param   string  $session_data	The session data.
	 *
	 * @return  boolean  True on success, false otherwise.
=======
	 * @param   string  $id            The session identifier.
	 * @param   string  $session_data  The session data.
	 *
	 * @return  boolean  True on success, false otherwise.
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function write($id, $session_data)
	{
		return true;
	}

	/**
	 * Destroy the data for a particular session identifier in the
	 * SessionHandler backend.
	 *
	 * @param   string  $id  The session identifier.
	 *
	 * @return  boolean  True on success, false otherwise.
<<<<<<< HEAD
=======
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function destroy($id)
	{
		return true;
	}

	/**
	 * Garbage collect stale sessions from the SessionHandler backend.
	 *
<<<<<<< HEAD
	 * @param   integer  $maxlifetime	The maximum age of a session.
	 * @return  boolean  True on success, false otherwise.
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
<<<<<<< HEAD
	 * @return boolean  True on success, false otherwise.
=======
	 * @return  boolean  True on success, false otherwise.
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public static function test()
	{
		return true;
	}
}
