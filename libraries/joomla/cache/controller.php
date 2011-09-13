<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Cache
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
 * Public cache handler
 *
 * @package     Joomla.Platform
 * @subpackage  Cache
 * @since       11.1
 */
class JCacheController
{
	/**
<<<<<<< HEAD
	 * @var
	 * @since   11.1
=======
	 * @var    JCache
	 * @since  11.1
>>>>>>> upstream/master
	 */
	public $cache;

	/**
	 * @var    array  Array of options
	 * @since  11.1
	 */
	public $options;

	/**
	 * Constructor
	 *
	 * @param   array  $options  Array of options
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function __construct($options)
	{
<<<<<<< HEAD
		$this->cache 	= new JCache($options);
		$this->options 	= & $this->cache->_options;

		// Overwrite default options with given options
		foreach ($options AS $option=>$value) {
			if (isset($options[$option])) {
=======
		$this->cache = new JCache($options);
		$this->options = & $this->cache->_options;

		// Overwrite default options with given options
		foreach ($options as $option => $value)
		{
			if (isset($options[$option]))
			{
>>>>>>> upstream/master
				$this->options[$option] = $options[$option];
			}
		}
	}

	/**
<<<<<<< HEAD
	 *
	 * @param   $name
	 * @param   $arguments
	 * @since   11.1
	 */
	public function __call ($name, $arguments)
	{
		$nazaj = call_user_func_array (array ($this->cache, $name), $arguments);
=======
	 * Magic method to proxy JCacheControllerMethods
	 *
	 * @param   string  $name       Name of the function
	 * @param   array   $arguments  Array of arguments for the function
	 *
	 * @return  mixed
	 *
	 * @since   11.1
	 */
	public function __call($name, $arguments)
	{
		$nazaj = call_user_func_array(array($this->cache, $name), $arguments);
>>>>>>> upstream/master
		return $nazaj;
	}

	/**
	 * Returns a reference to a cache adapter object, always creating it
	 *
<<<<<<< HEAD
	 * @param   string   $type     The cache object type to instantiate; default is output.
	 * @param   array    $options  Array of options
	 *
	 * @return  JCache             A JCache object
=======
	 * @param   string  $type     The cache object type to instantiate; default is output.
	 * @param   array   $options  Array of options
	 *
	 * @return  JCache  A JCache object
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function getInstance($type = 'output', $options = array())
	{
<<<<<<< HEAD
		JCacheController::addIncludePath(JPATH_PLATFORM.DS.'joomla'.DS.'cache'.DS.'controller');

		$type = strtolower(preg_replace('/[^A-Z0-9_\.-]/i', '', $type));

		$class = 'JCacheController'.ucfirst($type);

		if (!class_exists($class)) {
			// Search for the class file in the JCache include paths.
			jimport('joomla.filesystem.path');

			if ($path = JPath::find(JCacheController::addIncludePath(), strtolower($type).'.php')) {
				require_once $path;
			} else {
				JError::raiseError(500, 'Unable to load Cache Controller: '.$type);
=======
		JCacheController::addIncludePath(JPATH_PLATFORM . '/joomla/cache/controller');

		$type = strtolower(preg_replace('/[^A-Z0-9_\.-]/i', '', $type));

		$class = 'JCacheController' . ucfirst($type);

		if (!class_exists($class))
		{
			// Search for the class file in the JCache include paths.
			jimport('joomla.filesystem.path');

			if ($path = JPath::find(JCacheController::addIncludePath(), strtolower($type) . '.php'))
			{
				include_once $path;
			}
			else
			{
				JError::raiseError(500, 'Unable to load Cache Controller: ' . $type);
>>>>>>> upstream/master
			}
		}

		return new $class($options);
	}

	/**
	 * Set caching enabled state
	 *
	 * @param   boolean  $enabled  True to enable caching
	 *
	 * @return  void
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function setCaching($enabled)
	{
		$this->cache->setCaching($enabled);
	}

	/**
	 * Set cache lifetime
	 *
	 * @param   integer  $lt  Cache lifetime
	 *
	 * @return  void
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function setLifeTime($lt)
	{
		$this->cache->setLifeTime($lt);
	}

	/**
	 * Add a directory where JCache should search for controllers. You may
	 * either pass a string or an array of directories.
	 *
<<<<<<< HEAD
	 * @param   string   A path to search.
	 *
	 * @return  array    An array with directory elements
	 * @since   11.1
	 */
	public static function addIncludePath($path='')
	{
		static $paths;

		if (!isset($paths)) {
			$paths = array();
		}
		if (!empty($path) && !in_array($path, $paths)) {
=======
	 * @param   string  $path  A path to search.
	 *
	 * @return  array   An array with directory elements
	 *
	 * @since   11.1
	 */
	public static function addIncludePath($path = '')
	{
		static $paths;

		if (!isset($paths))
		{
			$paths = array();
		}
		if (!empty($path) && !in_array($path, $paths))
		{
>>>>>>> upstream/master
			jimport('joomla.filesystem.path');
			array_unshift($paths, JPath::clean($path));
		}
		return $paths;
	}

	/**
	 * Get stored cached data by id and group
	 *
<<<<<<< HEAD
	 * @param   string   $id     The cache data id
	 * @param   string   $group  The cache data group
	 *
	 * @return  mixed    False on no result, cached object otherwise
	 * @since   11.1
	 */
	public function get($id, $group=null)
=======
	 * @param   string  $id     The cache data id
	 * @param   string  $group  The cache data group
	 *
	 * @return  mixed   False on no result, cached object otherwise
	 *
	 * @since   11.1
	 */
	public function get($id, $group = null)
>>>>>>> upstream/master
	{
		$data = false;
		$data = $this->cache->get($id, $group);

<<<<<<< HEAD
		if ($data === false) {
=======
		if ($data === false)
		{
>>>>>>> upstream/master
			$locktest = new stdClass;
			$locktest->locked = null;
			$locktest->locklooped = null;
			$locktest = $this->cache->lock($id, $group);
<<<<<<< HEAD
			if ($locktest->locked == true && $locktest->locklooped == true) {
				$data = $this->cache->get($id, $group);
			}
			if ($locktest->locked == true) $this->cache->unlock($id, $group);
		}

		// Check again because we might get it from second attempt
		if ($data !== false) {
			$data = unserialize(trim($data));  // trim to fix unserialize errors
=======
			if ($locktest->locked == true && $locktest->locklooped == true)
			{
				$data = $this->cache->get($id, $group);
			}
			if ($locktest->locked == true)
			{
				$this->cache->unlock($id, $group);
			}
		}

		// Check again because we might get it from second attempt
		if ($data !== false)
		{
			$data = unserialize(trim($data)); // trim to fix unserialize errors
>>>>>>> upstream/master
		}
		return $data;
	}

	/**
	 * Store data to cache by id and group
	 *
<<<<<<< HEAD
	 * @param   string   $id      The cache data id
	 * @param   string   $group   The cache data group
	 * @param   mixed    $data    The data to store
	 *
	 * @return  boolean  True if cache was stored
	 * @since   11.1
	 */
	public function store($data, $id, $group=null)
=======
	 * @param   mixed   $data   The data to store
	 * @param   string  $id     The cache data id
	 * @param   string  $group  The cache data group
	 *
	 * @return  boolean  True if cache was stored
	 *
	 * @since   11.1
	 */
	public function store($data, $id, $group = null)
>>>>>>> upstream/master
	{
		$locktest = new stdClass;
		$locktest->locked = null;
		$locktest->locklooped = null;

		$locktest = $this->cache->lock($id, $group);

<<<<<<< HEAD
		if ($locktest->locked == false && $locktest->locklooped == true) {
			$locktest = $this->cache->lock($id, $group);
		}

		$sucess = $this->cache->store(serialize($data), $id,  $group);

		if ($locktest->locked == true) $this->cache->unlock($id, $group);

		return $sucess;
	}
}
=======
		if ($locktest->locked == false && $locktest->locklooped == true)
		{
			$locktest = $this->cache->lock($id, $group);
		}

		$sucess = $this->cache->store(serialize($data), $id, $group);

		if ($locktest->locked == true)
		{
			$this->cache->unlock($id, $group);
		}

		return $sucess;
	}
}
>>>>>>> upstream/master
