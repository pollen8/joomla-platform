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
* File session handler for PHP
*
 * @package     Joomla.Platform
 * @subpackage  Session
 * @since       11.1
 * @see http://www.php.net/manual/en/function.session-set-save-handler.php
=======
defined('JPATH_PLATFORM') or die();

/**
 * File session handler for PHP
 *
 * @package     Joomla.Platform
 * @subpackage  Session
 * @see         http://www.php.net/manual/en/function.session-set-save-handler.php
 * @since       11.1
>>>>>>> upstream/master
 */
class JSessionStorageNone extends JSessionStorage
{
	/**
<<<<<<< HEAD
	* Register the functions of this class with PHP's session handler
	*
	* @param   array    $options optional parameters
	*/
=======
	 * Register the functions of this class with PHP's session handler
	 *
	 * @param   array  $options  Optional parameters.
	 *
	 * @return  void
	 *
	 * @since   11.1
	 */
>>>>>>> upstream/master
	public function register($options = array())
	{
		//let php handle the session storage
	}

	/**
	 * Open the SessionHandler backend.
	 *
<<<<<<< HEAD
	 * @param	string	The path to the session object.
	 * @param	string	The name of the session.
	 * @return	boolean	True on success, false otherwise.
	 * @since	11.1
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
	 * @return	boolean	True on success, false otherwise.
	 * @since	11.1
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
<<<<<<< HEAD
	 * @param	string	The session identifier.
	 * @return	string	The session data.
	 * @since	11.1
=======
	 * @param   string  $id  The session identifier.
	 *
	 * @return  string  The session data.
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function read($id)
	{
		return true;
	}

	/**
	 * Write session data to the SessionHandler backend.
	 *
<<<<<<< HEAD
	 * @param	string	The session identifier.
	 * @param	string	The session data.
	 *
	 * @return	boolean	True on success, false otherwise.
	 * @since	11.1
=======
	 * @param   string  $id    The session identifier.
	 * @param   string  $data  The session data.
	 *
	 * @return  boolean  True on success, false otherwise.
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function write($id, $data)
	{
		return true;
	}

	/**
	 * Destroy the data for a particular session identifier in the
	 * SessionHandler backend.
	 *
<<<<<<< HEAD
	 * @param	string	The session identifier.
	 *
	 * @return	boolean	True on success, false otherwise.
	 * @since	11.1
=======
	 * @param   string  $id  The session identifier.
	 *
	 * @return  boolean  True on success, false otherwise.
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
	 * @param	integer	The maximum age of a session.
	 * @return	boolean	True on success, false otherwise.
	 * @since	11.1
=======
	 * @param   integer  $lifetime  The maximum age of a session.
	 *
	 * @return  boolean  True on success, false otherwise.
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	function gc($lifetime = 1440)
	{
		return true;
	}

	/**
	 * Test to see if the SessionHandler is available.
	 *
<<<<<<< HEAD
	 * @return	boolean	True on if available, false otherwise.
	 * @since	11.1
=======
	 * @return  boolean  True on if available, false otherwise.
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public static function test()
	{
		return true;
	}
}
