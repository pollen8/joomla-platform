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
 * Memcache session storage handler for PHP
 *
 * -- Inspired in both design and implementation by the Horde memcache handler --
 *
 * @package     Joomla.Platform
 * @subpackage  Session
<<<<<<< HEAD
 * @since       11.1
 * @see http://www.php.net/manual/en/function.session-set-save-handler.php
=======
 * @see         http://www.php.net/manual/en/function.session-set-save-handler.php
 * @since       11.1
>>>>>>> upstream/master
 */
class JSessionStorageMemcache extends JSessionStorage
{
	/**
	 * Resource for the current memcached connection.
	 *
<<<<<<< HEAD
	 * @var resource
=======
	 * @var    resource
	 * @since  11.1
>>>>>>> upstream/master
	 */
	var $_db;

	/**
	 * Use compression?
	 *
<<<<<<< HEAD
	 * @var int
=======
	 * @var    int
	 * @since  11.1
>>>>>>> upstream/master
	 */
	var $_compress = null;

	/**
	 * Use persistent connections
	 *
<<<<<<< HEAD
	 * @var boolean
=======
	 * @var    boolean
	 * @since  11.1
>>>>>>> upstream/master
	 */
	var $_persistent = false;

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
	 * @return  JSessionStorageMemcache
	 *
	 * @since   11.1
	 */
	public function __construct($options = array())
	{
		if (!$this->test())
		{
>>>>>>> upstream/master
			return JError::raiseError(404, JText::_('JLIB_SESSION_MEMCACHE_EXTENSION_NOT_AVAILABLE'));
		}

		parent::__construct($options);

		$config = JFactory::getConfig();
		$params = $config->get('memcache_settings');
		if (!is_array($params))
		{
			$params = unserialize(stripslashes($params));
		}

		if (!$params)
		{
			$params = array();
		}

<<<<<<< HEAD
		$this->_compress	= (isset($params['compression'])) ? $params['compression'] : 0;
		$this->_persistent	= (isset($params['persistent'])) ? $params['persistent'] : false;

		// This will be an array of loveliness
		$this->_servers	= (isset($params['servers'])) ? $params['servers'] : array();
=======
		$this->_compress = (isset($params['compression'])) ? $params['compression'] : 0;
		$this->_persistent = (isset($params['persistent'])) ? $params['persistent'] : false;

		// This will be an array of loveliness
		$this->_servers = (isset($params['servers'])) ? $params['servers'] : array();
>>>>>>> upstream/master
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
		$this->_db = new Memcache;
<<<<<<< HEAD
		for ($i=0, $n=count($this->_servers); $i < $n; $i++)
=======
		for ($i = 0, $n = count($this->_servers); $i < $n; $i++)
>>>>>>> upstream/master
		{
			$server = $this->_servers[$i];
			$this->_db->addServer($server['host'], $server['port'], $this->_persistent);
		}
		return true;
	}

	/**
	 * Close the SessionHandler backend.
	 *
	 * @return boolean  True on success, false otherwise.
	 */
	public function close()
	{
		return $this->_db->close();
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
		$this->_setExpire($sess_id);
		return $this->_db->get($sess_id);
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
		if ($this->_db->get($sess_id.'_expire')) {
			$this->_db->replace($sess_id.'_expire', time(), 0);
		} else {
			$this->_db->set($sess_id.'_expire', time(), 0);
		}
		if ($this->_db->get($sess_id)) {
			$this->_db->replace($sess_id, $session_data, $this->_compress);
		} else {
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
		if ($this->_db->get($sess_id . '_expire'))
		{
			$this->_db->replace($sess_id . '_expire', time(), 0);
		}
		else
		{
			$this->_db->set($sess_id . '_expire', time(), 0);
		}
		if ($this->_db->get($sess_id))
		{
			$this->_db->replace($sess_id, $session_data, $this->_compress);
		}
		else
		{
>>>>>>> upstream/master
			$this->_db->set($sess_id, $session_data, $this->_compress);
		}
		return;
	}

	/**
<<<<<<< HEAD
	 * Destroy the data for a particular session identifier in the
	 * SessionHandler backend.
	 *
	 * @param   string   $id  The session identifier.
	 *
	 * @return boolean  True on success, false otherwise.
	 */
	public function destroy($id)
	{
		$sess_id = 'sess_'.$id;
		$this->_db->delete($sess_id.'_expire');
=======
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
		$this->_db->delete($sess_id . '_expire');
>>>>>>> upstream/master
		return $this->_db->delete($sess_id);
	}

	/**
	 * Garbage collect stale sessions from the SessionHandler backend.
	 *
<<<<<<< HEAD
	 *	-- Not Applicable in memcache --
	 *
	 * @param   integer  $maxlifetime  The maximum age of a session.
	 * @return boolean  True on success, false otherwise.
=======
	 * -- Not Applicable in memcache --
	 *
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
	static public function test()
	{
		return (extension_loaded('memcache') && class_exists('Memcache'));
	}

	/**
	 * Set expire time on each call since memcache sets it on cache creation.
	 *
<<<<<<< HEAD
	 * @param   string  $key		Cache key to expire.
	 * @param   integer  $lifetime  Lifetime of the data in seconds.
	 */
	protected function _setExpire($key)
	{
		$lifetime	= ini_get("session.gc_maxlifetime");
		$expire		= $this->_db->get($key.'_expire');

		// set prune period
		if ($expire + $lifetime < time()) {
			$this->_db->delete($key);
			$this->_db->delete($key.'_expire');
		} else {
			$this->_db->replace($key.'_expire', time());
=======
	 * @param   string  $key  Cache key to expire.
	 *
	 * @return  void
	 *
	 * @since   11.1
	 */
	protected function _setExpire($key)
	{
		$lifetime = ini_get("session.gc_maxlifetime");
		$expire = $this->_db->get($key . '_expire');

		// set prune period
		if ($expire + $lifetime < time())
		{
			$this->_db->delete($key);
			$this->_db->delete($key . '_expire');
		}
		else
		{
			$this->_db->replace($key . '_expire', time());
>>>>>>> upstream/master
		}
	}
}
