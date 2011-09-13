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
=======
defined('JPATH_PLATFORM') or die();
>>>>>>> upstream/master

jimport('joomla.filesystem.path');

/**
 * A Folder handling class
 *
 * @package     Joomla.Platform
 * @subpackage  FileSystem
 * @since       11.1
 */
abstract class JFolder
{
	/**
	 * Copy a folder.
	 *
	 * @param   string   $src          The path to the source folder.
	 * @param   string   $dest         The path to the destination folder.
	 * @param   string   $path         An optional base path to prefix to the file names.
<<<<<<< HEAD
	 * @param   boolean  $use_streams  Optionally force folder/file overwrites.
	 *
	 * @return  mixed  JError object on failure or boolean True on success.
	 * @since   11.1
	 */
	public static function copy($src, $dest, $path = '', $force = false, $use_streams=false)
	{
=======
	 * @param   string   $force        Force copy.
	 * @param   boolean  $use_streams  Optionally force folder/file overwrites.
	 *
	 * @return  mixed  JError object on failure or boolean True on success.
	 *
	 * @since   11.1
	 */
	public static function copy($src, $dest, $path = '', $force = false, $use_streams = false)
	{
		@set_time_limit(ini_get('max_execution_time'));

>>>>>>> upstream/master
		// Initialise variables.
		jimport('joomla.client.helper');
		$FTPOptions = JClientHelper::getCredentials('ftp');

		if ($path)
		{
<<<<<<< HEAD
			$src = JPath::clean($path . DS . $src);
			$dest = JPath::clean($path . DS . $dest);
=======
			$src = JPath::clean($path . '/' . $src);
			$dest = JPath::clean($path . '/' . $dest);
>>>>>>> upstream/master
		}

		// Eliminate trailing directory separators, if any
		$src = rtrim($src, DS);
		$dest = rtrim($dest, DS);

<<<<<<< HEAD
		if (!self::exists($src)) {
			return JError::raiseError(-1, JText::_('JLIB_FILESYSTEM_ERROR_FIND_SOURCE_FOLDER'));
		}
		if (self::exists($dest) && !$force) {
=======
		if (!self::exists($src))
		{
			return JError::raiseError(-1, JText::_('JLIB_FILESYSTEM_ERROR_FIND_SOURCE_FOLDER'));
		}
		if (self::exists($dest) && !$force)
		{
>>>>>>> upstream/master
			return JError::raiseError(-1, JText::_('JLIB_FILESYSTEM_ERROR_FOLDER_EXISTS'));
		}

		// Make sure the destination exists
<<<<<<< HEAD
		if (! self::create($dest)) {
=======
		if (!self::create($dest))
		{
>>>>>>> upstream/master
			return JError::raiseError(-1, JText::_('JLIB_FILESYSTEM_ERROR_FOLDER_CREATE'));
		}

		// If we're using ftp and don't have streams enabled
		if ($FTPOptions['enabled'] == 1 && !$use_streams)
		{
			// Connect the FTP client
			jimport('joomla.client.ftp');
<<<<<<< HEAD
			$ftp = JFTP::getInstance(
				$FTPOptions['host'], $FTPOptions['port'], null,
				$FTPOptions['user'], $FTPOptions['pass']
			);

			if (!($dh = @opendir($src))) {
=======
			$ftp = JFTP::getInstance($FTPOptions['host'], $FTPOptions['port'], null, $FTPOptions['user'], $FTPOptions['pass']);

			if (!($dh = @opendir($src)))
			{
>>>>>>> upstream/master
				return JError::raiseError(-1, JText::_('JLIB_FILESYSTEM_ERROR_FOLDER_OPEN'));
			}
			// Walk through the directory copying files and recursing into folders.
			while (($file = readdir($dh)) !== false)
			{
<<<<<<< HEAD
				$sfid = $src . DS . $file;
				$dfid = $dest . DS . $file;
=======
				$sfid = $src . '/' . $file;
				$dfid = $dest . '/' . $file;
>>>>>>> upstream/master
				switch (filetype($sfid))
				{
					case 'dir':
						if ($file != '.' && $file != '..')
						{
							$ret = self::copy($sfid, $dfid, null, $force);
<<<<<<< HEAD
							if ($ret !== true) {
								return $ret;
							}
						}
					break;

					case 'file':
						// Translate path for the FTP account
						$dfid = JPath::clean(str_replace(JPATH_ROOT, $FTPOptions['root'], $dfid), '/');
						if (! $ftp->store($sfid, $dfid)) {
							return JError::raiseError(-1, JText::_('JLIB_FILESYSTEM_ERROR_COPY_FAILED'));
						}
					break;
=======
							if ($ret !== true)
							{
								return $ret;
							}
						}
						break;

					case 'file':
					// Translate path for the FTP account
						$dfid = JPath::clean(str_replace(JPATH_ROOT, $FTPOptions['root'], $dfid), '/');
						if (!$ftp->store($sfid, $dfid))
						{
							return JError::raiseError(-1, JText::_('JLIB_FILESYSTEM_ERROR_COPY_FAILED'));
						}
						break;
>>>>>>> upstream/master
				}
			}
		}
		else
		{
<<<<<<< HEAD
			if (!($dh = @opendir($src))) {
=======
			if (!($dh = @opendir($src)))
			{
>>>>>>> upstream/master
				return JError::raiseError(-1, JText::_('JLIB_FILESYSTEM_ERROR_FOLDER_OPEN'));
			}
			// Walk through the directory copying files and recursing into folders.
			while (($file = readdir($dh)) !== false)
			{
<<<<<<< HEAD
				$sfid = $src . DS . $file;
				$dfid = $dest . DS . $file;
=======
				$sfid = $src . '/' . $file;
				$dfid = $dest . '/' . $file;
>>>>>>> upstream/master
				switch (filetype($sfid))
				{
					case 'dir':
						if ($file != '.' && $file != '..')
						{
							$ret = self::copy($sfid, $dfid, null, $force, $use_streams);
<<<<<<< HEAD
							if ($ret !== true) {
								return $ret;
							}
						}
					break;

					case 'file':
						if($use_streams)
						{
							$stream = JFactory::getStream();
							if(!$stream->copy($sfid, $dfid)) {
								return JError::raiseError(-1, JText::_('JLIB_FILESYSTEM_ERROR_COPY_FAILED').': '. $stream->getError());
=======
							if ($ret !== true)
							{
								return $ret;
							}
						}
						break;

					case 'file':
						if ($use_streams)
						{
							$stream = JFactory::getStream();
							if (!$stream->copy($sfid, $dfid))
							{
								return JError::raiseError(-1, JText::_('JLIB_FILESYSTEM_ERROR_COPY_FAILED') . ': ' . $stream->getError());
>>>>>>> upstream/master
							}
						}
						else
						{
<<<<<<< HEAD
							if (!@copy($sfid, $dfid)) {
								return JError::raiseError(-1, JText::_('JLIB_FILESYSTEM_ERROR_COPY_FAILED'));
							}
						}
					break;
=======
							if (!@copy($sfid, $dfid))
							{
								return JError::raiseError(-1, JText::_('JLIB_FILESYSTEM_ERROR_COPY_FAILED'));
							}
						}
						break;
>>>>>>> upstream/master
				}
			}
		}
		return true;
	}

	/**
	 * Create a folder -- and all necessary parent folders.
	 *
<<<<<<< HEAD
	 * @param   string   $path   A path to create from the base path.
	 * @param   integer  $mode   Directory permissions to set for folders created. 0755 by default.
	 *
	 * @return  boolean  True if successful.
=======
	 * @param   string   $path  A path to create from the base path.
	 * @param   integer  $mode  Directory permissions to set for folders created. 0755 by default.
	 *
	 * @return  boolean  True if successful.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function create($path = '', $mode = 0755)
	{
		// Initialise variables.
		jimport('joomla.client.helper');
		$FTPOptions = JClientHelper::getCredentials('ftp');
		static $nested = 0;

		// Check to make sure the path valid and clean
		$path = JPath::clean($path);

		// Check if parent dir exists
		$parent = dirname($path);
		if (!self::exists($parent))
		{
			// Prevent infinite loops!
			$nested++;
			if (($nested > 20) || ($parent == $path))
			{
<<<<<<< HEAD
				JError::raiseWarning(
					'SOME_ERROR_CODE',
					__METHOD__ . ': ' . JText::_('JLIB_FILESYSTEM_ERROR_FOLDER_LOOP')
				);
=======
				JError::raiseWarning('SOME_ERROR_CODE', __METHOD__ . ': ' . JText::_('JLIB_FILESYSTEM_ERROR_FOLDER_LOOP'));
>>>>>>> upstream/master
				$nested--;
				return false;
			}

			// Create the parent directory
			if (self::create($parent, $mode) !== true)
			{
				// JFolder::create throws an error
				$nested--;
				return false;
			}

			// OK, parent directory has been created
			$nested--;
		}

		// Check if dir already exists
<<<<<<< HEAD
		if (self::exists($path)) {
=======
		if (self::exists($path))
		{
>>>>>>> upstream/master
			return true;
		}

		// Check for safe mode
		if ($FTPOptions['enabled'] == 1)
		{
			// Connect the FTP client
			jimport('joomla.client.ftp');
<<<<<<< HEAD
			$ftp = JFTP::getInstance(
				$FTPOptions['host'], $FTPOptions['port'], null,
				$FTPOptions['user'], $FTPOptions['pass']
			);
=======
			$ftp = JFTP::getInstance($FTPOptions['host'], $FTPOptions['port'], null, $FTPOptions['user'], $FTPOptions['pass']);
>>>>>>> upstream/master

			// Translate path to FTP path
			$path = JPath::clean(str_replace(JPATH_ROOT, $FTPOptions['root'], $path), '/');
			$ret = $ftp->mkdir($path);
			$ftp->chmod($path, $mode);
		}
		else
		{
			// We need to get and explode the open_basedir paths
			$obd = ini_get('open_basedir');

			// If open_basedir is set we need to get the open_basedir that the path is in
			if ($obd != null)
			{
<<<<<<< HEAD
				if (JPATH_ISWIN) {
					$obdSeparator = ";";
				}
				else {
=======
				if (JPATH_ISWIN)
				{
					$obdSeparator = ";";
				}
				else
				{
>>>>>>> upstream/master
					$obdSeparator = ":";
				}
				// Create the array of open_basedir paths
				$obdArray = explode($obdSeparator, $obd);
				$inBaseDir = false;
				// Iterate through open_basedir paths looking for a match
				foreach ($obdArray as $test)
				{
					$test = JPath::clean($test);
<<<<<<< HEAD
					if (strpos($path, $test) === 0) {
=======
					if (strpos($path, $test) === 0)
					{
>>>>>>> upstream/master
						$obdpath = $test;
						$inBaseDir = true;
						break;
					}
				}
				if ($inBaseDir == false)
				{
					// Return false for JFolder::create because the path to be created is not in open_basedir
<<<<<<< HEAD
					JError::raiseWarning(
						'SOME_ERROR_CODE',
						__METHOD__ . ': ' . JText::_('JLIB_FILESYSTEM_ERROR_FOLDER_PATH')
					);
=======
					JError::raiseWarning('SOME_ERROR_CODE', __METHOD__ . ': ' . JText::_('JLIB_FILESYSTEM_ERROR_FOLDER_PATH'));
>>>>>>> upstream/master
					return false;
				}
			}

			// First set umask
			$origmask = @umask(0);

			// Create the path
			if (!$ret = @mkdir($path, $mode))
			{
				@umask($origmask);
				JError::raiseWarning(
<<<<<<< HEAD
					'SOME_ERROR_CODE',
					__METHOD__ . ': ' . JText::_('JLIB_FILESYSTEM_ERROR_COULD_NOT_CREATE_DIRECTORY'),
=======
					'SOME_ERROR_CODE', __METHOD__ . ': ' . JText::_('JLIB_FILESYSTEM_ERROR_COULD_NOT_CREATE_DIRECTORY'),
>>>>>>> upstream/master
					'Path: ' . $path
				);
				return false;
			}

			// Reset umask
			@umask($origmask);
		}
		return $ret;
	}

	/**
	 * Delete a folder.
	 *
	 * @param   string  $path  The path to the folder to delete.
	 *
	 * @return  boolean  True on success.
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function delete($path)
	{
<<<<<<< HEAD
=======
		@set_time_limit(ini_get('max_execution_time'));

>>>>>>> upstream/master
		// Sanity check
		if (!$path)
		{
			// Bad programmer! Bad Bad programmer!
			JError::raiseWarning(500, __METHOD__ . ': ' . JText::_('JLIB_FILESYSTEM_ERROR_DELETE_BASE_DIRECTORY'));
			return false;
		}

		// Initialise variables.
		jimport('joomla.client.helper');
		$FTPOptions = JClientHelper::getCredentials('ftp');

		// Check to make sure the path valid and clean
		$path = JPath::clean($path);

		// Is this really a folder?
		if (!is_dir($path))
		{
			JError::raiseWarning(21, JText::sprintf('JLIB_FILESYSTEM_ERROR_PATH_IS_NOT_A_FOLDER', $path));
			return false;
		}

		// Remove all the files in folder if they exist; disable all filtering
		$files = self::files($path, '.', false, true, array(), array());
		if (!empty($files))
		{
			jimport('joomla.filesystem.file');
<<<<<<< HEAD
			if (JFile::delete($files) !== true) {
=======
			if (JFile::delete($files) !== true)
			{
>>>>>>> upstream/master
				// JFile::delete throws an error
				return false;
			}
		}

		// Remove sub-folders of folder; disable all filtering
		$folders = self::folders($path, '.', false, true, array(), array());
		foreach ($folders as $folder)
		{
			if (is_link($folder))
			{
				// Don't descend into linked directories, just delete the link.
				jimport('joomla.filesystem.file');
<<<<<<< HEAD
				if (JFile::delete($folder) !== true) {
=======
				if (JFile::delete($folder) !== true)
				{
>>>>>>> upstream/master
					// JFile::delete throws an error
					return false;
				}
			}
<<<<<<< HEAD
			elseif (self::delete($folder) !== true) {
=======
			elseif (self::delete($folder) !== true)
			{
>>>>>>> upstream/master
				// JFolder::delete throws an error
				return false;
			}
		}

		if ($FTPOptions['enabled'] == 1)
		{
			// Connect the FTP client
			jimport('joomla.client.ftp');
<<<<<<< HEAD
			$ftp = JFTP::getInstance(
				$FTPOptions['host'], $FTPOptions['port'], null,
				$FTPOptions['user'], $FTPOptions['pass']
			);
=======
			$ftp = JFTP::getInstance($FTPOptions['host'], $FTPOptions['port'], null, $FTPOptions['user'], $FTPOptions['pass']);
>>>>>>> upstream/master
		}

		// In case of restricted permissions we zap it one way or the other
		// as long as the owner is either the webserver or the ftp.
		if (@rmdir($path))
		{
			$ret = true;
		}
		elseif ($FTPOptions['enabled'] == 1)
		{
			// Translate path and delete
			$path = JPath::clean(str_replace(JPATH_ROOT, $FTPOptions['root'], $path), '/');
			// FTP connector throws an error
			$ret = $ftp->delete($path);
		}
		else
		{
			JError::raiseWarning('SOME_ERROR_CODE', JText::sprintf('JLIB_FILESYSTEM_ERROR_FOLDER_DELETE', $path));
			$ret = false;
		}
		return $ret;
	}

	/**
	 * Moves a folder.
	 *
	 * @param   string   $src          The path to the source folder.
	 * @param   string   $dest         The path to the destination folder.
	 * @param   string   $path         An optional base path to prefix to the file names.
<<<<<<< HEAD
	 * @param   boolean  $use_streams
	 *
	 * @return  mixed  Error message on false or boolean true on success.
	 * @since   11.1
	 */
	public static function move($src, $dest, $path = '', $use_streams=false)
=======
	 * @param   boolean  $use_streams  Optionally use streams.
	 *
	 * @return  mixed  Error message on false or boolean true on success.
	 *
	 * @since   11.1
	 */
	public static function move($src, $dest, $path = '', $use_streams = false)
>>>>>>> upstream/master
	{
		// Initialise variables.
		jimport('joomla.client.helper');
		$FTPOptions = JClientHelper::getCredentials('ftp');

		if ($path)
		{
<<<<<<< HEAD
			$src = JPath::clean($path . DS . $src);
			$dest = JPath::clean($path . DS . $dest);
		}

		if (!self::exists($src)){
			return JText::_('JLIB_FILESYSTEM_ERROR_FIND_SOURCE_FOLDER');
		}
		if (self::exists($dest)) {
			return JText::_('JLIB_FILESYSTEM_ERROR_FOLDER_EXISTS');
		}
		if($use_streams)
		{
			$stream = JFactory::getStream();
			if(!$stream->move($src, $dest)) {
=======
			$src = JPath::clean($path . '/' . $src);
			$dest = JPath::clean($path . '/' . $dest);
		}

		if (!self::exists($src))
		{
			return JText::_('JLIB_FILESYSTEM_ERROR_FIND_SOURCE_FOLDER');
		}
		if (self::exists($dest))
		{
			return JText::_('JLIB_FILESYSTEM_ERROR_FOLDER_EXISTS');
		}
		if ($use_streams)
		{
			$stream = JFactory::getStream();
			if (!$stream->move($src, $dest))
			{
>>>>>>> upstream/master
				return JText::sprintf('JLIB_FILESYSTEM_ERROR_FOLDER_RENAME', $stream->getError());
			}
			$ret = true;
		}
		else
		{
			if ($FTPOptions['enabled'] == 1)
			{
				// Connect the FTP client
				jimport('joomla.client.ftp');
<<<<<<< HEAD
				$ftp = JFTP::getInstance(
					$FTPOptions['host'], $FTPOptions['port'], null,
					$FTPOptions['user'], $FTPOptions['pass']
				);
=======
				$ftp = JFTP::getInstance($FTPOptions['host'], $FTPOptions['port'], null, $FTPOptions['user'], $FTPOptions['pass']);
>>>>>>> upstream/master

				//Translate path for the FTP account
				$src = JPath::clean(str_replace(JPATH_ROOT, $FTPOptions['root'], $src), '/');
				$dest = JPath::clean(str_replace(JPATH_ROOT, $FTPOptions['root'], $dest), '/');

				// Use FTP rename to simulate move
<<<<<<< HEAD
				if (!$ftp->rename($src, $dest)) {
=======
				if (!$ftp->rename($src, $dest))
				{
>>>>>>> upstream/master
					return JText::_('Rename failed');
				}
				$ret = true;
			}
			else
			{
<<<<<<< HEAD
				if (!@rename($src, $dest)) {
=======
				if (!@rename($src, $dest))
				{
>>>>>>> upstream/master
					return JText::_('Rename failed');
				}
				$ret = true;
			}
		}
		return $ret;
	}

	/**
	 * Wrapper for the standard file_exists function
	 *
	 * @param   string  $path  Folder name relative to installation dir
	 *
	 * @return  boolean  True if path is a folder
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function exists($path)
	{
		return is_dir(JPath::clean($path));
	}

	/**
	 * Utility function to read the files in a folder.
	 *
<<<<<<< HEAD
	 * @param   string  The path of the folder to read.
	 * @param   string  A filter for file names.
	 * @param   mixed   True to recursively search into sub-folders, or an
	 *                  integer to specify the maximum depth.
	 * @param   boolean True to return the full path to the file.
	 * @param   array   Array with names of files which should not be shown in
	 *                  the result.
	 * @param   array   Array of filter to exclude
	 *
	 * @return  array  Files in the given folder.
	 * @since   11.1
	 */
	public static function files($path, $filter = '.', $recurse = false, $full = false, $exclude = array('.svn', 'CVS','.DS_Store','__MACOSX'), $excludefilter = array('^\..*','.*~'))
=======
	 * @param   string   $path           The path of the folder to read.
	 * @param   string   $filter         A filter for file names.
	 * @param   mixed    $recurse        True to recursively search into sub-folders, or an integer to specify the maximum depth.
	 * @param   boolean  $full           True to return the full path to the file.
	 * @param   array    $exclude        Array with names of files which should not be shown in the result.
	 * @param   array    $excludefilter  Array of filter to exclude
	 *
	 * @return  array  Files in the given folder.
	 *
	 * @since   11.1
	 */
	public static function files($path, $filter = '.', $recurse = false, $full = false, $exclude = array('.svn', 'CVS', '.DS_Store', '__MACOSX'),
		$excludefilter = array('^\..*', '.*~'))
>>>>>>> upstream/master
	{
		// Check to make sure the path valid and clean
		$path = JPath::clean($path);

		// Is the path a folder?
		if (!is_dir($path))
		{
			JError::raiseWarning(21, JText::sprintf('JLIB_FILESYSTEM_ERROR_PATH_IS_NOT_A_FOLDER_FILES', $path));
			return false;
		}

		// Compute the excludefilter string
<<<<<<< HEAD
		if(count($excludefilter)) {
			$excludefilter_string = '/('. implode('|', $excludefilter) .')/';
		}
		else {
=======
		if (count($excludefilter))
		{
			$excludefilter_string = '/(' . implode('|', $excludefilter) . ')/';
		}
		else
		{
>>>>>>> upstream/master
			$excludefilter_string = '';
		}

		// Get the files
		$arr = self::_items($path, $filter, $recurse, $full, $exclude, $excludefilter_string, true);

		// Sort the files
		asort($arr);
		return array_values($arr);
	}

	/**
	 * Utility function to read the folders in a folder.
	 *
	 * @param   string   $path           The path of the folder to read.
	 * @param   string   $filter         A filter for folder names.
<<<<<<< HEAD
	 * @param   mixed    $recurse        True to recursively search into sub-folders, or an
	 *                                   integer to specify the maximum depth.
	 * @param   boolean  $full           True to return the full path to the folders.
	 * @param   array    $exclude        Array with names of folders which should not be shown in
	 *                                   the result.
	 * @param   array    $excludefilter  Array with regular expressions matching folders which
	 *                                   should not be shown in the result.
	 *
	 * @return  array  Folders in the given folder.
	 * @since   11.1
	 */
	public static function folders($path, $filter = '.', $recurse = false, $full = false, $exclude = array('.svn', 'CVS','.DS_Store','__MACOSX'), $excludefilter = array('^\..*'))
=======
	 * @param   mixed    $recurse        True to recursively search into sub-folders, or an integer to specify the maximum depth.
	 * @param   boolean  $full           True to return the full path to the folders.
	 * @param   array    $exclude        Array with names of folders which should not be shown in the result.
	 * @param   array    $excludefilter  Array with regular expressions matching folders which should not be shown in the result.
	 *
	 * @return  array  Folders in the given folder.
	 *
	 * @since   11.1
	 */
	public static function folders($path, $filter = '.', $recurse = false, $full = false, $exclude = array('.svn', 'CVS', '.DS_Store', '__MACOSX'),
		$excludefilter = array('^\..*'))
>>>>>>> upstream/master
	{
		// Check to make sure the path valid and clean
		$path = JPath::clean($path);

		// Is the path a folder?
		if (!is_dir($path))
		{
			JError::raiseWarning(21, JText::sprintf('JLIB_FILESYSTEM_ERROR_PATH_IS_NOT_A_FOLDER_FOLDER', $path));
			return false;
		}

		// Compute the excludefilter string
<<<<<<< HEAD
		if(count($excludefilter)){
			$excludefilter_string = '/('. implode('|', $excludefilter) .')/';
		}
		else {
=======
		if (count($excludefilter))
		{
			$excludefilter_string = '/(' . implode('|', $excludefilter) . ')/';
		}
		else
		{
>>>>>>> upstream/master
			$excludefilter_string = '';
		}

		// Get the folders
		$arr = self::_items($path, $filter, $recurse, $full, $exclude, $excludefilter_string, false);

		// Sort the folders
		asort($arr);
		return array_values($arr);
	}

	/**
	 * Function to read the files/folders in a folder.
	 *
	 * @param   string   $path                  The path of the folder to read.
	 * @param   string   $filter                A filter for file names.
<<<<<<< HEAD
	 * @param   mixed    $recurse               True to recursively search into sub-folders, or an
	 *                                          integer to specify the maximum depth.
	 * @param   boolean  $full                  True to return the full path to the file.
	 * @param   array    $exclude               Array with names of files which should not be shown in
	 *                                          the result.
	 * @param   string   $excludefilter_string  Regexp of files to exclude
	 * @param   boolean  $fndfiles              True to read the files, false to read the folders
	 *
	 * @return  array  Files.
=======
	 * @param   mixed    $recurse               True to recursively search into sub-folders, or an integer to specify the maximum depth.
	 * @param   boolean  $full                  True to return the full path to the file.
	 * @param   array    $exclude               Array with names of files which should not be shown in the result.
	 * @param   string   $excludefilter_string  Regexp of files to exclude
	 * @param   boolean  $findfiles             True to read the files, false to read the folders
	 *
	 * @return  array  Files.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected static function _items($path, $filter, $recurse, $full, $exclude, $excludefilter_string, $findfiles)
	{
<<<<<<< HEAD
=======
		@set_time_limit(ini_get('max_execution_time'));

>>>>>>> upstream/master
		// Initialise variables.
		$arr = array();

		// Read the source directory
<<<<<<< HEAD
		$handle = opendir($path);
		while (($file = readdir($handle)) !== false)
		{
			if ($file != '.' && $file != '..' && !in_array($file, $exclude) && (empty($excludefilter_string) || !preg_match($excludefilter_string, $file)))
			{
				// Compute the fullpath
				$fullpath = $path . DS . $file;
=======
		if (!($handle = @opendir($path)))
		{
			return $arr;
		}

		while (($file = readdir($handle)) !== false)
		{
			if ($file != '.' && $file != '..' && !in_array($file, $exclude)
				&& (empty($excludefilter_string) || !preg_match($excludefilter_string, $file)))
			{
				// Compute the fullpath
				$fullpath = $path . '/' . $file;
>>>>>>> upstream/master

				// Compute the isDir flag
				$isDir = is_dir($fullpath);

				if (($isDir xor $findfiles) && preg_match("/$filter/", $file))
				{
					// (fullpath is dir and folders are searched or fullpath is not dir and files are searched) and file matches the filter
<<<<<<< HEAD
					if ($full) {
						// Full path is requested
						$arr[] = $fullpath;
					}
					else {
=======
					if ($full)
					{
						// Full path is requested
						$arr[] = $fullpath;
					}
					else
					{
>>>>>>> upstream/master
						// Filename is requested
						$arr[] = $file;
					}
				}
				if ($isDir && $recurse)
				{
					// Search recursively
<<<<<<< HEAD
					if (is_integer($recurse)) {
						// Until depth 0 is reached
						$arr = array_merge($arr, self::_items($fullpath, $filter, $recurse - 1, $full, $exclude, $excludefilter_string, $findfiles));
					}
					else {
=======
					if (is_integer($recurse))
					{
						// Until depth 0 is reached
						$arr = array_merge($arr, self::_items($fullpath, $filter, $recurse - 1, $full, $exclude, $excludefilter_string, $findfiles));
					}
					else
					{
>>>>>>> upstream/master
						$arr = array_merge($arr, self::_items($fullpath, $filter, $recurse, $full, $exclude, $excludefilter_string, $findfiles));
					}
				}
			}
		}
		closedir($handle);
		return $arr;
	}

	/**
	 * Lists folder in format suitable for tree display.
	 *
	 * @param   string   $path      The path of the folder to read.
	 * @param   string   $filter    A filter for folder names.
<<<<<<< HEAD
	 * @param   integer  $maxLevel  The maximum number of levels to recursively read,
	 *                              defaults to three.
=======
	 * @param   integer  $maxLevel  The maximum number of levels to recursively read, defaults to three.
>>>>>>> upstream/master
	 * @param   integer  $level     The current level, optional.
	 * @param   integer  $parent    Unique identifier of the parent folder, if any.
	 *
	 * @return  array  Folders in the given folder.
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function listFolderTree($path, $filter, $maxLevel = 3, $level = 0, $parent = 0)
	{
<<<<<<< HEAD
		$dirs = array ();
		if ($level == 0){
=======
		$dirs = array();
		if ($level == 0)
		{
>>>>>>> upstream/master
			$GLOBALS['_JFolder_folder_tree_index'] = 0;
		}
		if ($level < $maxLevel)
		{
			$folders = self::folders($path, $filter);
			// First path, index foldernames
			foreach ($folders as $name)
			{
				$id = ++$GLOBALS['_JFolder_folder_tree_index'];
<<<<<<< HEAD
				$fullName = JPath::clean($path . DS . $name);
				$dirs[] = array(
					'id' => $id,
					'parent' => $parent,
					'name' => $name,
					'fullname' => $fullName,
					'relname' => str_replace(JPATH_ROOT, '', $fullName)
				);
=======
				$fullName = JPath::clean($path . '/' . $name);
				$dirs[] = array('id' => $id, 'parent' => $parent, 'name' => $name, 'fullname' => $fullName,
					'relname' => str_replace(JPATH_ROOT, '', $fullName));
>>>>>>> upstream/master
				$dirs2 = self::listFolderTree($fullName, $filter, $maxLevel, $level + 1, $id);
				$dirs = array_merge($dirs, $dirs2);
			}
		}
		return $dirs;
	}

	/**
	 * Makes path name safe to use.
	 *
<<<<<<< HEAD
	 * @param   string  The full path to sanitise.
	 *
	 * @return  string  The sanitised string.
=======
	 * @param   string  $path  The full path to sanitise.
	 *
	 * @return  string  The sanitised string.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function makeSafe($path)
	{
<<<<<<< HEAD
		//$ds = (DS == '\\') ? '\\' . DS : DS;
=======
		//$ds = (DS == '\\') ? '\\/' : DS;
>>>>>>> upstream/master
		$regex = array('#[^A-Za-z0-9:_\\\/-]#');
		return preg_replace($regex, '', $path);
	}
}
