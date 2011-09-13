<?php
/**
 * @package     Joomla.Platform
 * @subpackage  FileSystem
 *
 * @copyright   Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

<<<<<<< HEAD
defined('JPATH_PLATFORM') or die;

/** boolean True if a Windows based host */
define('JPATH_ISWIN', (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN'));

/** boolean True if a Mac based host */
define('JPATH_ISMAC', (strtoupper(substr(PHP_OS, 0, 3)) === 'MAC'));

if (!defined('DS')) {
	/** string Shortcut for the DIRECTORY_SEPARATOR define */
	define('DS', DIRECTORY_SEPARATOR);
}

if (!defined('JPATH_ROOT')) {
	/** string The root directory of the file system in native format */
=======
defined('JPATH_PLATFORM') or die();

// Define a boolean constant as true if a Windows based host
define('JPATH_ISWIN', (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN'));

// Define a boolean constant as true if a Mac based host
define('JPATH_ISMAC', (strtoupper(substr(PHP_OS, 0, 3)) === 'MAC'));

if (!defined('DS'))
{
	// Define a string constant shortcut for the DIRECTORY_SEPARATOR define
	define('DS', DIRECTORY_SEPARATOR);
}

if (!defined('JPATH_ROOT'))
{
	// Define a string constant for the root directory of the file system in native format
>>>>>>> upstream/master
	define('JPATH_ROOT', JPath::clean(JPATH_SITE));
}

/**
 * A Path handling class
 *
 * @package     Joomla.Platform
 * @subpackage  FileSystem
 * @since       11.1
 */
class JPath
{
	/**
<<<<<<< HEAD
	 * Checks if a path's permissions can be changed
	 *
	 * @param   string  Path to check
	 *
	 * @return  boolean  True if path can have mode changed
=======
	 * Checks if a path's permissions can be changed.
	 *
	 * @param   string  $path  Path to check.
	 *
	 * @return  boolean  True if path can have mode changed.
>>>>>>> upstream/master
	 *
	 * @since   11.1
	 */
	public static function canChmod($path)
	{
		$perms = fileperms($path);
<<<<<<< HEAD
		if ($perms !== false) {
			if (@chmod($path, $perms ^ 0001)) {
=======
		if ($perms !== false)
		{
			if (@chmod($path, $perms ^ 0001))
			{
>>>>>>> upstream/master
				@chmod($path, $perms);
				return true;
			}
		}

		return false;
	}

	/**
<<<<<<< HEAD
	 * Chmods files and directories recursivly to given permissions
	 *
	 * @param   string   $path        Root path to begin changing mode [without trailing slash]
	 * @param   string   $filemode    Octal representation of the value to change file mode to [null = no change]
	 * @param   string   $foldermode  Octal representation of the value to change folder mode to [null = no change]
	 *
	 * @return  boolean  True if successful [one fail means the whole operation failed]
=======
	 * Chmods files and directories recursivly to given permissions.
	 *
	 * @param   string  $path        Root path to begin changing mode [without trailing slash].
	 * @param   string  $filemode    Octal representation of the value to change file mode to [null = no change].
	 * @param   string  $foldermode  Octal representation of the value to change folder mode to [null = no change].
	 *
	 * @return  boolean  True if successful [one fail means the whole operation failed].
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function setPermissions($path, $filemode = '0644', $foldermode = '0755')
	{
		// Initialise return value
		$ret = true;

<<<<<<< HEAD
		if (is_dir($path)) {
			$dh = opendir($path);

			while ($file = readdir($dh)) {
				if ($file != '.' && $file != '..') {
					$fullpath = $path.'/'.$file;
					if (is_dir($fullpath)) {
						if (!JPath::setPermissions($fullpath, $filemode, $foldermode)) {
							$ret = false;
						}
					} else {
						if (isset ($filemode)) {
							if (!@ chmod($fullpath, octdec($filemode))) {
=======
		if (is_dir($path))
		{
			$dh = opendir($path);

			while ($file = readdir($dh))
			{
				if ($file != '.' && $file != '..')
				{
					$fullpath = $path . '/' . $file;
					if (is_dir($fullpath))
					{
						if (!JPath::setPermissions($fullpath, $filemode, $foldermode))
						{
							$ret = false;
						}
					}
					else
					{
						if (isset($filemode))
						{
							if (!@ chmod($fullpath, octdec($filemode)))
							{
>>>>>>> upstream/master
								$ret = false;
							}
						}
					}
				}
			}
			closedir($dh);
<<<<<<< HEAD
			if (isset ($foldermode)) {
				if (!@ chmod($path, octdec($foldermode))) {
					$ret = false;
				}
			}
		} else {
			if (isset ($filemode)) {
=======
			if (isset($foldermode))
			{
				if (!@ chmod($path, octdec($foldermode)))
				{
					$ret = false;
				}
			}
		}
		else
		{
			if (isset($filemode))
			{
>>>>>>> upstream/master
				$ret = @ chmod($path, octdec($filemode));
			}
		}

		return $ret;
	}

	/**
<<<<<<< HEAD
	 * Get the permissions of the file/folder at a give path
	 *
	 * @param   string  $path  The path of a file/folder
	 *
	 * @return  string   Filesystem permissions
=======
	 * Get the permissions of the file/folder at a give path.
	 *
	 * @param   string  $path  The path of a file/folder.
	 *
	 * @return  string  Filesystem permissions.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function getPermissions($path)
	{
		$path = JPath::clean($path);
		$mode = @ decoct(@ fileperms($path) & 0777);

<<<<<<< HEAD
		if (strlen($mode) < 3) {
=======
		if (strlen($mode) < 3)
		{
>>>>>>> upstream/master
			return '---------';
		}

		$parsed_mode = '';
<<<<<<< HEAD
		for ($i = 0; $i < 3; $i ++) {
			// read
			$parsed_mode .= ($mode { $i } & 04) ? "r" : "-";
			// write
			$parsed_mode .= ($mode { $i } & 02) ? "w" : "-";
			// execute
			$parsed_mode .= ($mode { $i } & 01) ? "x" : "-";
=======
		for ($i = 0; $i < 3; $i++)
		{
			// read
			$parsed_mode .= ($mode{$i} & 04) ? "r" : "-";
			// write
			$parsed_mode .= ($mode{$i} & 02) ? "w" : "-";
			// execute
			$parsed_mode .= ($mode{$i} & 01) ? "x" : "-";
>>>>>>> upstream/master
		}

		return $parsed_mode;
	}

	/**
<<<<<<< HEAD
	 * Checks for snooping outside of the file system root
	 *
	 * @param   string  A file system path to check
	 * @param   string  Directory separator (optional)
	 *
	 * @return  string  A cleaned version of the path or exit on error
=======
	 * Checks for snooping outside of the file system root.
	 *
	 * @param   string  $path  A file system path to check.
	 * @param   string  $ds    Directory separator (optional).
	 *
	 * @return  string  A cleaned version of the path or exit on error.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function check($path, $ds = DIRECTORY_SEPARATOR)
	{
<<<<<<< HEAD
		if (strpos($path, '..') !== false) {
=======
		if (strpos($path, '..') !== false)
		{
>>>>>>> upstream/master
			// Don't translate
			JError::raiseError(20, 'JPath::check Use of relative paths not permitted');
			jexit();
		}

		$path = JPath::clean($path);
<<<<<<< HEAD
		if (strpos($path, JPath::clean(JPATH_ROOT)) !== 0) {
			// Don't translate
			JError::raiseError(20, 'JPath::check Snooping out of bounds @ '.$path);
=======
		if (strpos($path, JPath::clean(JPATH_ROOT)) !== 0)
		{
			// Don't translate
			JError::raiseError(20, 'JPath::check Snooping out of bounds @ ' . $path);
>>>>>>> upstream/master
			jexit();
		}

		return $path;
	}

	/**
<<<<<<< HEAD
	 * Function to strip additional / or \ in a path name
	 *
	 * @param   string  The path to clean
	 * @param   string  Directory separator (optional)
	 * @return  string  The cleaned path
=======
	 * Function to strip additional / or \ in a path name.
	 *
	 * @param   string  $path  The path to clean.
	 * @param   string  $ds    Directory separator (optional).
	 *
	 * @return  string  The cleaned path.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function clean($path, $ds = DIRECTORY_SEPARATOR)
	{
		$path = trim($path);

<<<<<<< HEAD
		if (empty($path)) {
			$path = JPATH_ROOT;
		} else {
=======
		if (empty($path))
		{
			$path = JPATH_ROOT;
		}
		else
		{
>>>>>>> upstream/master
			// Remove double slashes and backslahses and convert all slashes and backslashes to DS
			$path = preg_replace('#[/\\\\]+#', $ds, $path);
		}

		return $path;
	}

	/**
<<<<<<< HEAD
	 * Method to determine if script owns the path
	 *
	 * @param   string  Path to check ownership
	 *
	 * @return  boolean  True if the php script owns the path passed
=======
	 * Method to determine if script owns the path.
	 *
	 * @param   string  $path  Path to check ownership.
	 *
	 * @return  boolean  True if the php script owns the path passed.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function isOwner($path)
	{
		jimport('joomla.filesystem.file');
		jimport('joomla.user.helper');

		$tmp = md5(JUserHelper::genRandomPassword(16));
		$ssp = ini_get('session.save_path');
<<<<<<< HEAD
		$jtp = JPATH_SITE.DS.'tmp';
=======
		$jtp = JPATH_SITE . '/tmp';
>>>>>>> upstream/master

		// Try to find a writable directory
		$dir = is_writable('/tmp') ? '/tmp' : false;
		$dir = (!$dir && is_writable($ssp)) ? $ssp : false;
		$dir = (!$dir && is_writable($jtp)) ? $jtp : false;

<<<<<<< HEAD
		if ($dir) {
			$test = $dir.DS.$tmp;
=======
		if ($dir)
		{
			$test = $dir . '/' . $tmp;
>>>>>>> upstream/master

			// Create the test file
			$blank = '';
			JFile::write($test, $blank, false);

			// Test ownership
			$return = (fileowner($test) == fileowner($path));

			// Delete the test file
			JFile::delete($test);

			return $return;
		}

		return false;
	}

	/**
	 * Searches the directory paths for a given file.
	 *
<<<<<<< HEAD
	 * @param   mixed   An path string or array of path strings to search in
	 * @param   string  The file name to look for.
	 *
	 * @return  mixed  The full path and file name for the target file, or boolean false if the file is not found in any of the paths.
=======
	 * @param   mixed   $paths  An path string or array of path strings to search in
	 * @param   string  $file   The file name to look for.
	 *
	 * @return  mixed   The full path and file name for the target file, or boolean false if the file is not found in any of the paths.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function find($paths, $file)
	{
		settype($paths, 'array'); //force to array

		// Start looping through the path set
<<<<<<< HEAD
		foreach ($paths as $path) {
			// Get the path to the file
			$fullname = $path.'/'.$file;

			// Is the path based on a stream?
			if (strpos($path, '://') === false) {
=======
		foreach ($paths as $path)
		{
			// Get the path to the file
			$fullname = $path . '/' . $file;

			// Is the path based on a stream?
			if (strpos($path, '://') === false)
			{
>>>>>>> upstream/master
				// Not a stream, so do a realpath() to avoid directory
				// traversal attempts on the local file system.
				$path = realpath($path); // needed for substr() later
				$fullname = realpath($fullname);
			}

			// The substr() check added to make sure that the realpath()
			// results in a directory registered so that
			// non-registered directores are not accessible via directory
			// traversal attempts.
<<<<<<< HEAD
			if (file_exists($fullname) && substr($fullname, 0, strlen($path)) == $path) {
=======
			if (file_exists($fullname) && substr($fullname, 0, strlen($path)) == $path)
			{
>>>>>>> upstream/master
				return $fullname;
			}
		}

		// Could not find the file in the set of paths
		return false;
	}
}