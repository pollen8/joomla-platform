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

jimport('joomla.filesystem.file');
>>>>>>> upstream/master

/**
 * File cache storage handler
 *
 * @package     Joomla.Platform
 * @subpackage  Cache
 * @since       11.1
 */
class JCacheStorageFile extends JCacheStorage
{
	/**
<<<<<<< HEAD
	 * @since   11.1
=======
	 * @var    string
	 * @since  11.1
>>>>>>> upstream/master
	 */
	protected $_root;

	/**
	 * Constructor
	 *
<<<<<<< HEAD
	 * @param   array    $options optional parameters
=======
	 * @param   array  $options  Optional parameters
	 *
	 * @return  void
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function __construct($options = array())
	{
		parent::__construct($options);
<<<<<<< HEAD
		$this->_root	= $options['cachebase'];
=======
		$this->_root = $options['cachebase'];
>>>>>>> upstream/master
	}

	// NOTE: raw php calls are up to 100 times faster than JFile or JFolder

	/**
	 * Get cached data from a file by id and group
	 *
<<<<<<< HEAD
	 * @param   string   $id			The cache data id
	 * @param   string   $group		The cache data group
	 * @param   boolean  $checkTime	True to verify cache time expiration threshold
	 * @return  mixed    Boolean false on failure or a cached data string
=======
	 * @param   string   $id         The cache data id
	 * @param   string   $group      The cache data group
	 * @param   boolean  $checkTime  True to verify cache time expiration threshold
	 *
	 * @return  mixed  Boolean false on failure or a cached data string
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function get($id, $group, $checkTime = true)
	{
		$data = false;

		$path = $this->_getFilePath($id, $group);

<<<<<<< HEAD
		if ($checkTime == false || ($checkTime == true && $this->_checkExpire($id, $group) === true)) {
			if (file_exists($path)) {
				$data = file_get_contents($path);
				if ($data) {
=======
		if ($checkTime == false || ($checkTime == true && $this->_checkExpire($id, $group) === true))
		{
			if (file_exists($path))
			{
				$data = file_get_contents($path);
				if ($data)
				{
>>>>>>> upstream/master
					// Remove the initial die() statement
					$data = str_replace('<?php die("Access Denied"); ?>#x#', '', $data);
				}
			}

			return $data;
<<<<<<< HEAD
		} else {
=======
		}
		else
		{
>>>>>>> upstream/master
			return false;
		}
	}

	/**
	 * Get all cached data
	 *
<<<<<<< HEAD
	 * @return  array    data
=======
	 * @return  array  The cached data
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function getAll()
	{
		parent::getAll();

<<<<<<< HEAD
		$path		= $this->_root;
		$folders 	= $this->_folders($path);
		$data 		= array();

		foreach ($folders as $folder) {
			$files 	= array();
			$files 	= $this->_filesInFolder($path.DS.$folder);
			$item 	= new JCacheStorageHelper($folder);

			foreach ($files as $file) {
				$item->updateSize(filesize($path.DS.$folder.DS.$file) / 1024);
=======
		$path = $this->_root;
		$folders = $this->_folders($path);
		$data = array();

		foreach ($folders as $folder)
		{
			$files = array();
			$files = $this->_filesInFolder($path . '/' . $folder);
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
<<<<<<< HEAD
	 * @param   string   $id		The cache data id
	 * @param   string   $group	The cache data group
	 * @param   string   $data	The data to store in cache
	 * @return  boolean  True on success, false otherwise
=======
	 * @param   string  $id     The cache data id
	 * @param   string  $group  The cache data group
	 * @param   string  $data   The data to store in cache
	 *
	 * @return  boolean  True on success, false otherwise
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function store($id, $group, $data)
	{
<<<<<<< HEAD
		$written	= false;
		$path		= $this->_getFilePath($id, $group);
		$die		= '<?php die("Access Denied"); ?>#x#';

		// Prepend a die string
		$data		= $die.$data;

		$_fileopen = @fopen($path, "wb");

		if ($_fileopen) {
=======
		$written = false;
		$path = $this->_getFilePath($id, $group);
		$die = '<?php die("Access Denied"); ?>#x#';

		// Prepend a die string
		$data = $die . $data;

		$_fileopen = @fopen($path, "wb");

		if ($_fileopen)
		{
>>>>>>> upstream/master
			$len = strlen($data);
			@fwrite($_fileopen, $data, $len);
			$written = true;
		}

		// Data integrity check
<<<<<<< HEAD
		if ($written && ($data == file_get_contents($path))) {
			return true;
		} else {
=======
		if ($written && ($data == file_get_contents($path)))
		{
			return true;
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
	 * @param   string   $id		The cache data id
	 * @param   string   $group	The cache data group
	 * @return  boolean  True on success, false otherwise
=======
	 * @param   string  $id     The cache data id
	 * @param   string  $group  The cache data group
	 *
	 * @return  boolean  True on success, false otherwise
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function remove($id, $group)
	{
		$path = $this->_getFilePath($id, $group);
<<<<<<< HEAD
		if (!@unlink($path)) {
=======
		if (!@unlink($path))
		{
>>>>>>> upstream/master
			return false;
		}
		return true;
	}

	/**
	 * Clean cache for a group given a mode.
	 *
<<<<<<< HEAD
	 * group mode		: cleans all cache in the group
	 * notgroup mode	: cleans all cache not in the group
	 *
	 * @param   string   $group	The cache data group
	 * @param   string   $mode	The mode for cleaning cache [group|notgroup]
	 * @return  boolean  True on success, false otherwise
=======
	 * @param   string  $group  The cache data group
	 * @param   string  $mode   The mode for cleaning cache [group|notgroup]
	 * group mode     : cleans all cache in the group
	 * notgroup mode  : cleans all cache not in the group
	 *
	 * @return  boolean  True on success, false otherwise
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function clean($group, $mode = null)
	{
		$return = true;
<<<<<<< HEAD
		$folder	= $group;

		if (trim($folder) == '') {
			$mode = 'notgroup';
		}

		switch ($mode) {
			case 'notgroup':
				$folders = $this->_folders($this->_root);
				for ($i=0, $n=count($folders); $i<$n; $i++) {
					if ($folders[$i] != $folder) {
						$return |= $this->_deleteFolder($this->_root.DS.$folders[$i]);
=======
		$folder = $group;

		if (trim($folder) == '')
		{
			$mode = 'notgroup';
		}

		switch ($mode)
		{
			case 'notgroup':
				$folders = $this->_folders($this->_root);
				for ($i = 0, $n = count($folders); $i < $n; $i++)
				{
					if ($folders[$i] != $folder)
					{
						$return |= $this->_deleteFolder($this->_root . '/' . $folders[$i]);
>>>>>>> upstream/master
					}
				}
				break;
			case 'group':
			default:
<<<<<<< HEAD
				if (is_dir($this->_root.DS.$folder)) {
					$return = $this->_deleteFolder($this->_root.DS.$folder);
=======
				if (is_dir($this->_root . '/' . $folder))
				{
					$return = $this->_deleteFolder($this->_root . '/' . $folder);
>>>>>>> upstream/master
				}
				break;
		}
		return $return;
	}

	/**
	 * Garbage collect expired cache data
	 *
	 * @return  boolean  True on success, false otherwise.
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function gc()
	{
		$result = true;
		// files older than lifeTime get deleted from cache
<<<<<<< HEAD
		$files = $this->_filesInFolder($this->_root, '', true, true);
		foreach($files As $file) {
			$time = @filemtime($file);
			if (($time + $this->_lifetime) < $this->_now || empty($time)) {
=======
		$files = $this->_filesInFolder($this->_root, '', true, true, array('.svn', 'CVS', '.DS_Store', '__MACOSX', 'index.html'));
		foreach ($files as $file)
		{
			$time = @filemtime($file);
			if (($time + $this->_lifetime) < $this->_now || empty($time))
			{
>>>>>>> upstream/master
				$result |= @unlink($file);
			}
		}
		return $result;
	}

	/**
	 * Test to see if the cache storage is available.
	 *
	 * @return  boolean  True on success, false otherwise.
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function test()
	{
		$conf = JFactory::getConfig();
		return is_writable($conf->get('cache_path', JPATH_CACHE));
	}

	/**
	 * Lock cached item
	 *
<<<<<<< HEAD
	 * @param   string   $id		The cache data id
	 * @param   string   $group	The cache data group
	 * @param   integer  $locktime Cached item max lock time
	 * @return  boolean  True on success, false otherwise.
	 * @since   11.1
	 */
	public function lock($id,$group,$locktime)
	{
		$returning = new stdClass();
		$returning->locklooped = false;

		$looptime 	= $locktime * 10;
		$path		= $this->_getFilePath($id, $group);

		$_fileopen = @fopen($path, "r+b");

		if ($_fileopen) {
				$data_lock = @flock($_fileopen, LOCK_EX);
		} else {
			$data_lock = false;
		}

		if ($data_lock === false) {
=======
	 * @param   string   $id        The cache data id
	 * @param   string   $group     The cache data group
	 * @param   integer  $locktime  Cached item max lock time
	 *
	 * @return  boolean  True on success, false otherwise.
	 *
	 * @since   11.1
	 */
	public function lock($id, $group, $locktime)
	{
		$returning = new stdClass;
		$returning->locklooped = false;

		$looptime = $locktime * 10;
		$path = $this->_getFilePath($id, $group);

		$_fileopen = @fopen($path, "r+b");

		if ($_fileopen)
		{
			$data_lock = @flock($_fileopen, LOCK_EX);
		}
		else
		{
			$data_lock = false;
		}

		if ($data_lock === false)
		{
>>>>>>> upstream/master

			$lock_counter = 0;

			// loop until you find that the lock has been released.  that implies that data get from other thread has finished
<<<<<<< HEAD
			while ($data_lock === false) {

				if ($lock_counter > $looptime) {
					$returning->locked 		= false;
					$returning->locklooped 	= true;
=======
			while ($data_lock === false)
			{

				if ($lock_counter > $looptime)
				{
					$returning->locked = false;
					$returning->locklooped = true;
>>>>>>> upstream/master
					break;
				}

				usleep(100);
<<<<<<< HEAD
				$data_lock =  @flock($_fileopen, LOCK_EX);
=======
				$data_lock = @flock($_fileopen, LOCK_EX);
>>>>>>> upstream/master
				$lock_counter++;
			}

		}
		$returning->locked = $data_lock;

		return $returning;
	}

	/**
	 * Unlock cached item
	 *
<<<<<<< HEAD
	 * @param   string   $id		The cache data id
	 * @param   string   $group	The cache data group
	 * @return  boolean  True on success, false otherwise.
=======
	 * @param   string  $id     The cache data id
	 * @param   string  $group  The cache data group
	 *
	 * @return  boolean  True on success, false otherwise.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function unlock($id, $group = null)
	{
		$path = $this->_getFilePath($id, $group);

		$_fileopen = @fopen($path, "r+b");

<<<<<<< HEAD
		if ($_fileopen) {
				$ret = @flock($_fileopen, LOCK_UN);
				@fclose($_fileopen);
=======
		if ($_fileopen)
		{
			$ret = @flock($_fileopen, LOCK_UN);
			@fclose($_fileopen);
>>>>>>> upstream/master
		}

		return $ret;
	}

<<<<<<< HEAD


	/**
	 * Check to make sure cache is still valid, if not, delete it.
	 *
	 * @param   string   $id		Cache key to expire.
	 * @param   string   $group	The cache data group.
=======
	/**
	 * Check to make sure cache is still valid, if not, delete it.
	 *
	 * @param   string  $id     Cache key to expire.
	 * @param   string  $group  The cache data group.
	 *
	 * @return  boolean  False if not valid
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function _checkExpire($id, $group)
	{
		$path = $this->_getFilePath($id, $group);

		// check prune period
<<<<<<< HEAD
		if (file_exists($path)) {
			$time = @filemtime($path);
			if (($time + $this->_lifetime) < $this->_now || empty($time)) {
=======
		if (file_exists($path))
		{
			$time = @filemtime($path);
			if (($time + $this->_lifetime) < $this->_now || empty($time))
			{
>>>>>>> upstream/master
				@unlink($path);
				return false;
			}
			return true;
		}
		return false;
	}

	/**
	 * Get a cache file path from an id/group pair
	 *
<<<<<<< HEAD
	 * @param   string   $id		The cache data id
	 * @param   string   $group	The cache data group
	 * @return  string   The cache file path
=======
	 * @param   string  $id     The cache data id
	 * @param   string  $group  The cache data group
	 *
	 * @return  string   The cache file path
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function _getFilePath($id, $group)
	{
<<<<<<< HEAD
		$name	= $this->_getCacheId($id, $group);
		$dir	= $this->_root.DS.$group;

		// If the folder doesn't exist try to create it
		if (!is_dir($dir)) {

			// Make sure the index file is there
			$indexFile = $dir.'/index.html';
			@ mkdir($dir) && file_put_contents($indexFile, '<html><body bgcolor="#FFFFFF"></body></html>');
		}

		// Make sure the folder exists
		if (!is_dir($dir)) {
			return false;
		}
		return $dir.DS.$name.'.php';
=======
		$name = $this->_getCacheId($id, $group);
		$dir = $this->_root . '/' . $group;

		// If the folder doesn't exist try to create it
		if (!is_dir($dir))
		{

			// Make sure the index file is there
			$indexFile = $dir . '/index.html';
			@ mkdir($dir) && file_put_contents($indexFile, '<!DOCTYPE html><title></title>');
		}

		// Make sure the folder exists
		if (!is_dir($dir))
		{
			return false;
		}
		return $dir . '/' . $name . '.php';
>>>>>>> upstream/master
	}

	/**
	 * Quickly delete a folder of files
	 *
<<<<<<< HEAD
	 * @param   string The path to the folder to delete.
	 * @return  boolean  True on success.
=======
	 * @param   string  $path  The path to the folder to delete.
	 *
	 * @return  boolean  True on success.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function _deleteFolder($path)
	{
<<<<<<< HEAD
	// Sanity check
		if (!$path || !is_dir($path) || empty($this->_root)) {
=======
		// Sanity check
		if (!$path || !is_dir($path) || empty($this->_root))
		{
>>>>>>> upstream/master
			// Bad programmer! Bad Bad programmer!
			JError::raiseWarning(500, 'JCacheStorageFile::_deleteFolder ' . JText::_('JLIB_FILESYSTEM_ERROR_DELETE_BASE_DIRECTORY'));
			return false;
		}

		$path = $this->_cleanPath($path);

		// Check to make sure path is inside cache folder, we do not want to delete Joomla root!
		$pos = strpos($path, $this->_cleanPath($this->_root));

<<<<<<< HEAD
		if ($pos === false || $pos > 0) {
=======
		if ($pos === false || $pos > 0)
		{
>>>>>>> upstream/master
			JError::raiseWarning(500, 'JCacheStorageFile::_deleteFolder' . JText::sprintf('JLIB_FILESYSTEM_ERROR_PATH_IS_NOT_A_FOLDER', $path));
			return false;
		}

<<<<<<< HEAD

		// Remove all the files in folder if they exist; disable all filtering
		$files = $this->_filesInFolder($path, '.', false, true, array(), array());

		if (!empty($files) && !is_array($files)) {
			if (@unlink($files) !== true) {
				return false;
			}
		} else if (!empty($files) && is_array($files)) {
=======
		// Remove all the files in folder if they exist; disable all filtering
		$files = $this->_filesInFolder($path, '.', false, true, array(), array());

		if (!empty($files) && !is_array($files))
		{
			if (@unlink($files) !== true)
			{
				return false;
			}
		}
		else if (!empty($files) && is_array($files))
		{
>>>>>>> upstream/master

			foreach ($files as $file)
			{
				$file = $this->_cleanPath($file);

				// In case of restricted permissions we zap it one way or the other
				// as long as the owner is either the webserver or the ftp
<<<<<<< HEAD
				if (@unlink($file)) {
					// Do nothing
				} else {
=======
				if (@unlink($file))
				{
					// Do nothing
				}
				else
				{
>>>>>>> upstream/master
					$filename = basename($file);
					JError::raiseWarning('SOME_ERROR_CODE', 'JCacheStorageFile::_deleteFolder' . JText::sprintf('JLIB_FILESYSTEM_DELETE_FAILED', $filename));
					return false;
				}
			}
		}

<<<<<<< HEAD

		// Remove sub-folders of folder; disable all filtering
		$folders = $this->_folders($path, '.', false, true, array(), array());

		foreach ($folders as $folder) {
			if (is_link($folder)) {
				// Don't descend into linked directories, just delete the link.
				if (@unlink($folder) !== true) {
					return false;
				}
			} elseif ($this->_deleteFolder($folder) !== true) {
=======
		// Remove sub-folders of folder; disable all filtering
		$folders = $this->_folders($path, '.', false, true, array(), array());

		foreach ($folders as $folder)
		{
			if (is_link($folder))
			{
				// Don't descend into linked directories, just delete the link.
				if (@unlink($folder) !== true)
				{
					return false;
				}
			}
			elseif ($this->_deleteFolder($folder) !== true)
			{
>>>>>>> upstream/master
				return false;
			}
		}

<<<<<<< HEAD

		// In case of restricted permissions we zap it one way or the other
		// as long as the owner is either the webserver or the ftp
		if (@rmdir($path)) {
			$ret = true;
		} else {
=======
		// In case of restricted permissions we zap it one way or the other
		// as long as the owner is either the webserver or the ftp
		if (@rmdir($path))
		{
			$ret = true;
		}
		else
		{
>>>>>>> upstream/master
			JError::raiseWarning('SOME_ERROR_CODE', 'JCacheStorageFile::_deleteFolder' . JText::sprintf('JLIB_FILESYSTEM_ERROR_FOLDER_DELETE', $path));
			$ret = false;
		}
		return $ret;
	}

<<<<<<< HEAD

	/**
	 * Function to strip additional / or \ in a path name
	 *
	 * @param   string   The path to clean
	 * @param   string   Directory separator (optional)
	 * @return  string   The cleaned path
=======
	/**
	 * Function to strip additional / or \ in a path name
	 *
	 * @param   string  $path  The path to clean
	 * @param   string  $ds    Directory separator (optional)
	 *
	 * @return  string  The cleaned path
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function _cleanPath($path, $ds = DS)
	{
		$path = trim($path);

<<<<<<< HEAD
		if (empty($path)) {
			$path = $this->_root;
		} else {
=======
		if (empty($path))
		{
			$path = $this->_root;
		}
		else
		{
>>>>>>> upstream/master
			// Remove double slashes and backslahses and convert all slashes and backslashes to DS
			$path = preg_replace('#[/\\\\]+#', $ds, $path);
		}

		return $path;
	}

<<<<<<< HEAD

	/**
	 * Utility function to quickly read the files in a folder.
	 *
	 * @param   string   The path of the folder to read.
	 * @param   string   A filter for file names.
	 * @param   mixed    True to recursively search into sub-folders, or an
	 * integer to specify the maximum depth.
	 * @param   boolean  True to return the full path to the file.
	 * @param   array    Array with names of files which should not be shown in
	 * the result.
	 * @return  array    Files in the given folder.
=======
	/**
	 * Utility function to quickly read the files in a folder.
	 *
	 * @param   string   $path           The path of the folder to read.
	 * @param   string   $filter         A filter for file names.
	 * @param   mixed    $recurse        True to recursively search into sub-folders, or an
	 *                                   integer to specify the maximum depth.
	 * @param   boolean  $fullpath       True to return the full path to the file.
	 * @param   array    $exclude        Array with names of files which should not be shown in
	 *                                   the result.
	 * @param   array    $excludefilter  Array of folder names to exclude
	 *
	 * @return  array    Files in the given folder.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function _filesInFolder($path, $filter = '.', $recurse = false, $fullpath = false, $exclude = array('.svn', 'CVS','.DS_Store','__MACOSX'), $excludefilter = array('^\..*','.*~'))
	{
		// Initialise variables.
		$arr = array();

		// Check to make sure the path valid and clean
		$path = $this->_cleanPath($path);

		// Is the path a folder?
<<<<<<< HEAD
		if (!is_dir($path)) {
=======
		if (!is_dir($path))
		{
>>>>>>> upstream/master
			JError::raiseWarning(21, 'JCacheStorageFile::_filesInFolder' . JText::sprintf('JLIB_FILESYSTEM_ERROR_PATH_IS_NOT_A_FOLDER', $path));
			return false;
		}

<<<<<<< HEAD
		// read the source directory
		$handle = opendir($path);
		if (count($excludefilter)) {
			$excludefilter = '/('. implode('|', $excludefilter) .')/';
		} else {
=======
		// Read the source directory.
		if (!($handle = @opendir($path)))
		{
			return $arr;
		}

		if (count($excludefilter))
		{
			$excludefilter = '/(' . implode('|', $excludefilter) . ')/';
		}
		else
		{
>>>>>>> upstream/master
			$excludefilter = '';
		}
		while (($file = readdir($handle)) !== false)
		{
<<<<<<< HEAD
			if (($file != '.') && ($file != '..') && (!in_array($file, $exclude)) && (!$excludefilter || !preg_match($excludefilter, $file))) {
				$dir = $path . DS . $file;
				$isDir = is_dir($dir);
				if ($isDir) {
					if ($recurse) {
						if (is_integer($recurse)) {
							$arr2 = $this->_filesInFolder($dir, $filter, $recurse - 1, $fullpath);
						} else {
=======
			if (($file != '.') && ($file != '..') && (!in_array($file, $exclude)) && (!$excludefilter || !preg_match($excludefilter, $file)))
			{
				$dir = $path . '/' . $file;
				$isDir = is_dir($dir);
				if ($isDir)
				{
					if ($recurse)
					{
						if (is_integer($recurse))
						{
							$arr2 = $this->_filesInFolder($dir, $filter, $recurse - 1, $fullpath);
						}
						else
						{
>>>>>>> upstream/master
							$arr2 = $this->_filesInFolder($dir, $filter, $recurse, $fullpath);
						}

						$arr = array_merge($arr, $arr2);
					}
<<<<<<< HEAD
				} else {
					if (preg_match("/$filter/", $file)) {
						if ($fullpath) {
							$arr[] = $path . DS . $file;
						} else {
=======
				}
				else
				{
					if (preg_match("/$filter/", $file))
					{
						if ($fullpath)
						{
							$arr[] = $path . '/' . $file;
						}
						else
						{
>>>>>>> upstream/master
							$arr[] = $file;
						}
					}
				}
			}
		}
		closedir($handle);

		return $arr;
	}

<<<<<<< HEAD
/**
	 * Utility function to read the folders in a folder.
	 *
	 * @param   string   The path of the folder to read.
	 * @param   string   A filter for folder names.
	 * @param   mixed    True to recursively search into sub-folders, or an
	 * integer to specify the maximum depth.
	 * @param   boolean  True to return the full path to the folders.
	 * @param   array    Array with names of folders which should not be shown in
	 * the result.
	 * @param   array    Array with regular expressions matching folders which
	 * should not be shown in the result.
	 * @return  array    Folders in the given folder.
=======
	/**
	 * Utility function to read the folders in a folder.
	 *
	 * @param   string   $path           The path of the folder to read.
	 * @param   string   $filter         A filter for folder names.
	 * @param   mixed    $recurse        True to recursively search into sub-folders, or an integer to specify the maximum depth.
	 * @param   boolean  $fullpath       True to return the full path to the folders.
	 * @param   array    $exclude        Array with names of folders which should not be shown in the result.
	 * @param   array    $excludefilter  Array with regular expressions matching folders which should not be shown in the result.
	 *
	 * @return  array  Folders in the given folder.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function _folders($path, $filter = '.', $recurse = false, $fullpath = false, $exclude = array('.svn', 'CVS','.DS_Store','__MACOSX'), $excludefilter = array('^\..*'))
	{
		// Initialise variables.
		$arr = array();

		// Check to make sure the path valid and clean
		$path = $this->_cleanPath($path);

		// Is the path a folder?
<<<<<<< HEAD
		if (!is_dir($path)) {
=======
		if (!is_dir($path))
		{
>>>>>>> upstream/master
			JError::raiseWarning(21, 'JCacheStorageFile::_folders' . JText::sprintf('JLIB_FILESYSTEM_ERROR_PATH_IS_NOT_A_FOLDER', $path));
			return false;
		}

		// read the source directory
<<<<<<< HEAD
		$handle = opendir($path);

		if (count($excludefilter)) {
			$excludefilter_string = '/('. implode('|', $excludefilter) .')/';
		} else {
=======
		if (!($handle = @opendir($path)))
		{
			return $arr;
		}

		if (count($excludefilter))
		{
			$excludefilter_string = '/(' . implode('|', $excludefilter) . ')/';
		}
		else
		{
>>>>>>> upstream/master
			$excludefilter_string = '';
		}
		while (($file = readdir($handle)) !== false)
		{
<<<<<<< HEAD
			if (($file != '.') && ($file != '..') && (!in_array($file, $exclude)) && (empty($excludefilter_string) || !preg_match($excludefilter_string, $file))) {
				$dir = $path . DS . $file;
				$isDir = is_dir($dir);
				if ($isDir) {
					// Removes filtered directories
					if (preg_match("/$filter/", $file)) {
						if ($fullpath) {
							$arr[] = $dir;
						} else {
							$arr[] = $file;
						}
					}
					if ($recurse) {
						if (is_integer($recurse)) {
						$arr2 = $this->_folders($dir, $filter, $recurse - 1, $fullpath, $exclude, $excludefilter);
						} else {
						$arr2 = $this->_folders($dir, $filter, $recurse, $fullpath, $exclude, $excludefilter);
=======
			if (($file != '.') && ($file != '..') && (!in_array($file, $exclude)) && (empty($excludefilter_string) || !preg_match($excludefilter_string, $file)))
			{
				$dir = $path . '/' . $file;
				$isDir = is_dir($dir);
				if ($isDir)
				{
					// Removes filtered directories
					if (preg_match("/$filter/", $file))
					{
						if ($fullpath)
						{
							$arr[] = $dir;
						}
						else
						{
							$arr[] = $file;
						}
					}
					if ($recurse)
					{
						if (is_integer($recurse))
						{
							$arr2 = $this->_folders($dir, $filter, $recurse - 1, $fullpath, $exclude, $excludefilter);
						}
						else
						{
							$arr2 = $this->_folders($dir, $filter, $recurse, $fullpath, $exclude, $excludefilter);
>>>>>>> upstream/master
						}

						$arr = array_merge($arr, $arr2);
					}
				}
			}
		}
		closedir($handle);

		return $arr;
	}
}
