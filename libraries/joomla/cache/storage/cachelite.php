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

/**
 * Cache litestorage handler
 *
 * @package     Joomla.Platform
 * @subpackage  Cache
=======
defined('JPATH_PLATFORM') or die();

/**
 * Cache lite storage handler
 *
 * @package     Joomla.Platform
 * @subpackage  Cache
 * @see         http://pear.php.net/package/Cache_Lite/
>>>>>>> upstream/master
 * @since       11.1
 */
class JCacheStorageCachelite extends JCacheStorage
{
	/**
<<<<<<< HEAD
	 * @since   11.1
=======
	 * @var    object
	 * @since  11.1
>>>>>>> upstream/master
	 */
	protected static $CacheLiteInstance = null;

	/**
<<<<<<< HEAD
=======
	 * @var
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected $_root;

	/**
	 * Constructor
	 *
	 * @param   array  $options  Optional parameters.
	 *
	 * @return  JCacheStorageCachelite
	 *
	 * @since   11.1
	 */
	public function __construct($options = array())
	{
		parent::__construct($options);

<<<<<<< HEAD
		$this->_root	= $options['cachebase'];

		$cloptions = array(
			'cacheDir' 					=> $this->_root.DS,
			'lifeTime' 					=> $this->_lifetime,
			'fileLocking'   			=> $this->_locking,
			'automaticCleaningFactor'	=> isset($options['autoclean']) ? $options['autoclean'] : 200,
			'fileNameProtection'		=> false,
			'hashedDirectoryLevel'		=> 0,
			'caching' 					=> $options['caching']
		);

		if (self::$CacheLiteInstance === null) {
=======
		$this->_root = $options['cachebase'];

		$cloptions = array(
			'cacheDir' => $this->_root . '/',
			'lifeTime' => $this->_lifetime,
			'fileLocking' => $this->_locking,
			'automaticCleaningFactor' => isset($options['autoclean']) ? $options['autoclean'] : 200,
			'fileNameProtection' => false,
			'hashedDirectoryLevel' => 0,
			'caching' => $options['caching']);

		if (self::$CacheLiteInstance === null)
		{
>>>>>>> upstream/master
			$this->initCache($cloptions);
		}
	}

	/**
	 * Instantiates the appropriate CacheLite object.
	 * Only initializes the engine if it does not already exist.
	 * Note this is a protected method
	 *
<<<<<<< HEAD
	 * @param   array  $options  optional parameters
=======
	 * @param   array  $cloptions  optional parameters
>>>>>>> upstream/master
	 *
	 * @return  object
	 *
	 * @since   11.1
	 */
	protected function initCache($cloptions)
	{
		require_once 'Cache/Lite.php';

		self::$CacheLiteInstance = new Cache_Lite($cloptions);

		return self::$CacheLiteInstance;
	}

	/**
	 * Get cached data from a file by id and group
	 *
	 * @param   string   $id         The cache data id.
	 * @param   string   $group      The cache data group.
	 * @param   boolean  $checkTime  True to verify cache time expiration threshold.
	 *
	 * @return  mixed  Boolean false on failure or a cached data string.
	 *
	 * @since   11.1
	 */
	public function get($id, $group, $checkTime = true)
	{
		$data = false;
<<<<<<< HEAD
		self::$CacheLiteInstance->setOption('cacheDir', $this->_root.DS.$group.DS);
=======
		self::$CacheLiteInstance->setOption('cacheDir', $this->_root . '/' . $group . '/');
>>>>>>> upstream/master
		$this->_getCacheId($id, $group);
		$data = self::$CacheLiteInstance->get($this->rawname, $group);

		return $data;
	}

<<<<<<< HEAD

=======
>>>>>>> upstream/master
	/**
	 * Get all cached data
	 *
	 * @return  array
	 *
	 * @since   11.1
	 */
	public function getAll()
	{
		parent::getAll();

		$path = $this->_root;
		jimport('joomla.filesystem.folder');
		$folders = JFolder::folders($path);
		$data = array();

		foreach ($folders as $folder)
		{
<<<<<<< HEAD
			$files = JFolder::files($path.DS.$folder);
			$item = new JCacheStorageHelper($folder);

			foreach ($files as $file) {
				$item->updateSize(filesize($path.DS.$folder.DS.$file)/1024);
=======
			$files = JFolder::files($path . '/' . $folder);
			$item = new JCacheStorageHelper($folder);

			foreach ($files as $file)
			{
				$item->updateSize(filesize($path . '/' . $folder . '/' . $file) / 1024);
>>>>>>> upstream/master
			}

			$data[$folder] = $item;
		}

		return $data;
	}

	/**
	 * Store the data to a file by id and group
	 *
	 * @param   string  $id     The cache data id.
	 * @param   string  $group  The cache data group.
	 * @param   string  $data   The data to store in cache.
	 *
	 * @return  boolean  True on success, false otherwise
	 *
	 * @since   11.1
	 */
	public function store($id, $group, $data)
	{
<<<<<<< HEAD
		$dir = $this->_root.DS.$group;

		// If the folder doesn't exist try to create it
		if (!is_dir($dir)) {
			// Make sure the index file is there
			$indexFile = $dir.'/index.html';
			@mkdir($dir) && file_put_contents($indexFile, '<html><body bgcolor="#FFFFFF"></body></html>');
		}

		// Make sure the folder exists
		if (!is_dir($dir)) {
			return false;
		}

		self::$CacheLiteInstance->setOption('cacheDir', $this->_root.DS.$group.DS);
		$this->_getCacheId($id, $group);
		$success = self::$CacheLiteInstance->save($data, $this->rawname, $group);

		if ($success == true) {
			return $success;
		}
		else {
=======
		$dir = $this->_root . '/' . $group;

		// If the folder doesn't exist try to create it
		if (!is_dir($dir))
		{
			// Make sure the index file is there
			$indexFile = $dir . '/index.html';
			@mkdir($dir) && file_put_contents($indexFile, '<!DOCTYPE html><title></title>');
		}

		// Make sure the folder exists
		if (!is_dir($dir))
		{
			return false;
		}

		self::$CacheLiteInstance->setOption('cacheDir', $this->_root . '/' . $group . '/');
		$this->_getCacheId($id, $group);
		$success = self::$CacheLiteInstance->save($data, $this->rawname, $group);

		if ($success == true)
		{
			return $success;
		}
		else
		{
>>>>>>> upstream/master
			return false;
		}
	}

	/**
	 * Remove a cached data file by id and group
	 *
<<<<<<< HEAD
	 * @param   string   $id     The cache data id
	 * @param   string   $group  The cache data group
=======
	 * @param   string  $id     The cache data id
	 * @param   string  $group  The cache data group
>>>>>>> upstream/master
	 *
	 * @return  boolean  True on success, false otherwise
	 *
	 * @since   11.1
	 */
	public function remove($id, $group)
	{
<<<<<<< HEAD
		self::$CacheLiteInstance->setOption('cacheDir', $this->_root.DS.$group.DS);
		$this->_getCacheId($id, $group);
		$success = self::$CacheLiteInstance->remove($this->rawname, $group);

		if ($success == true) {
			return $success;
		}
		else {
=======
		self::$CacheLiteInstance->setOption('cacheDir', $this->_root . '/' . $group . '/');
		$this->_getCacheId($id, $group);
		$success = self::$CacheLiteInstance->remove($this->rawname, $group);

		if ($success == true)
		{
			return $success;
		}
		else
		{
>>>>>>> upstream/master
			return false;
		}
	}

	/**
	 * Clean cache for a group given a mode.
	 *
<<<<<<< HEAD
	 * group mode    : cleans all cache in the group
	 * notgroup mode : cleans all cache not in the group
	 *
	 * @param   string  $group  The cache data group.
	 * @param   string  $mode   The mode for cleaning cache [group|notgroup].
=======
	 * @param   string  $group  The cache data group.
	 * @param   string  $mode   The mode for cleaning cache [group|notgroup].
	 * group mode    : cleans all cache in the group
	 * notgroup mode : cleans all cache not in the group
>>>>>>> upstream/master
	 *
	 * @return  boolean  True on success, false otherwise.
	 *
	 * @since   11.1
	 */
	public function clean($group, $mode = null)
	{
		jimport('joomla.filesystem.folder');

<<<<<<< HEAD
		if (trim($group) == '') {
			$clmode = 'notgroup';
		}

		if ($mode == null) {
=======
		if (trim($group) == '')
		{
			$clmode = 'notgroup';
		}

		if ($mode == null)
		{
>>>>>>> upstream/master
			$clmode = 'group';
		}

		switch ($mode)
		{
			case 'notgroup':
				$clmode = 'notingroup';
				$success = self::$CacheLiteInstance->clean($group, $clmode);
				break;

			case 'group':
<<<<<<< HEAD
				if (is_dir($this->_root.DS.$group)) {
					$clmode = $group;
					self::$CacheLiteInstance->setOption('cacheDir', $this->_root.DS.$group.DS);
					$success = self::$CacheLiteInstance->clean($group, $clmode);
 					$return = JFolder::delete($this->_root.DS.$group);
 				}
				else {
=======
				if (is_dir($this->_root . '/' . $group))
				{
					$clmode = $group;
					self::$CacheLiteInstance->setOption('cacheDir', $this->_root . '/' . $group . '/');
					$success = self::$CacheLiteInstance->clean($group, $clmode);
					$return = JFolder::delete($this->_root . '/' . $group);
				}
				else
				{
>>>>>>> upstream/master
					$success = true;
				}

				break;

			default:
<<<<<<< HEAD
				if (is_dir($this->_root.DS.$group)) {
					$clmode = $group;
					self::$CacheLiteInstance->setOption('cacheDir', $this->_root.DS.$group.DS);
					$success = self::$CacheLiteInstance->clean($group, $clmode);
				}
				else {
=======
				if (is_dir($this->_root . '/' . $group))
				{
					$clmode = $group;
					self::$CacheLiteInstance->setOption('cacheDir', $this->_root . '/' . $group . '/');
					$success = self::$CacheLiteInstance->clean($group, $clmode);
				}
				else
				{
>>>>>>> upstream/master
					$success = true;
				}

				break;
		}

<<<<<<< HEAD
		if ($success == true)  {
			return $success;
		}
		else {
=======
		if ($success == true)
		{
			return $success;
		}
		else
		{
>>>>>>> upstream/master
			return false;
		}
	}

	/**
	 * Garbage collect expired cache data
	 *
<<<<<<< HEAD
	 * @return boolean  True on success, false otherwise.
=======
	 * @return  boolean  True on success, false otherwise.
>>>>>>> upstream/master
	 *
	 * @since   11.1
	 */
	public function gc()
	{
		$result = true;
		self::$CacheLiteInstance->setOption('automaticCleaningFactor', 1);
		self::$CacheLiteInstance->setOption('hashedDirectoryLevel', 1);
<<<<<<< HEAD
		$test 		= self::$CacheLiteInstance;
		$success1 	= self::$CacheLiteInstance->_cleanDir($this->_root.DS, false, 'old');

		if (!($dh = opendir($this->_root.DS))) {
=======
		$test = self::$CacheLiteInstance;
		$success1 = self::$CacheLiteInstance->_cleanDir($this->_root . '/', false, 'old');

		if (!($dh = opendir($this->_root . '/')))
		{
>>>>>>> upstream/master
			return false;
		}

		while ($file = readdir($dh))
		{
<<<<<<< HEAD
			if (($file != '.') && ($file != '..') && ($file != '.svn')) {
				$file2 = $this->_root.DS.$file;

				if (is_dir($file2)) {
					$result = ($result and (self::$CacheLiteInstance->_cleanDir($file2.DS, false, 'old')));
=======
			if (($file != '.') && ($file != '..') && ($file != '.svn'))
			{
				$file2 = $this->_root . '/' . $file;

				if (is_dir($file2))
				{
					$result = ($result and (self::$CacheLiteInstance->_cleanDir($file2 . '/', false, 'old')));
>>>>>>> upstream/master
				}
			}
		}

		$success = ($success1 && $result);

		return $success;
	}

	/**
	 * Test to see if the cache storage is available.
	 *
	 * @return  boolean  True on success, false otherwise.
	 *
	 * @since   11.1
	 */
	public static function test()
	{
<<<<<<< HEAD
			@include_once 'Cache/Lite.php';

			if (class_exists('Cache_Lite')) {
				return true;
			}
			else {
				return false;
			}
=======
		@include_once 'Cache/Lite.php';

		if (class_exists('Cache_Lite'))
		{
			return true;
		}
		else
		{
			return false;
		}
>>>>>>> upstream/master
	}
}