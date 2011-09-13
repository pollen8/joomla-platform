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
 * A File handling class
 *
 * @package     Joomla.Platform
 * @subpackage  FileSystem
 * @since       11.1
 */
class JFile
{
	/**
	 * Gets the extension of a file name
	 *
<<<<<<< HEAD
	 * @param   string  $file	The file name
	 *
	 * @return  string  The file extension
=======
	 * @param   string  $file  The file name
	 *
	 * @return  string  The file extension
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function getExt($file)
	{
		$dot = strrpos($file, '.') + 1;

		return substr($file, $dot);
	}

	/**
	 * Strips the last extension off of a file name
	 *
	 * @param   string  $file  The file name
	 *
	 * @return  string  The file name without the extension
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function stripExt($file)
	{
		return preg_replace('#\.[^.]*$#', '', $file);
	}

	/**
	 * Makes file name safe to use
	 *
<<<<<<< HEAD
	 * @param   string  $file	The name of the file [not full path]
	 *
	 * @return  string  The sanitised string
=======
	 * @param   string  $file  The name of the file [not full path]
	 *
	 * @return  string  The sanitised string
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function makeSafe($file)
	{
		$regex = array('#(\.){2,}#', '#[^A-Za-z0-9\.\_\- ]#', '#^\.#');

		return preg_replace($regex, '', $file);
	}

	/**
	 * Copies a file
	 *
<<<<<<< HEAD
	 * @param   string  $src   The path to the source file
	 * @param   string  $dest  The path to the destination file
	 * @param   string  $path  An optional base path to prefix to the file names
	 *
	 * @return  boolean  True on success
	 * @since   11.1
	 */
	public static function copy($src, $dest, $path = null, $use_streams=false)
	{
		// Prepend a base path if it exists
		if ($path) {
			$src = JPath::clean($path.DS.$src);
			$dest = JPath::clean($path.DS.$dest);
		}

		// Check src path
		if (!is_readable($src)) {
=======
	 * @param   string   $src          The path to the source file
	 * @param   string   $dest         The path to the destination file
	 * @param   string   $path         An optional base path to prefix to the file names
	 * @param   boolean  $use_streams  True to use streams
	 *
	 * @return  boolean  True on success
	 *
	 * @since   11.1
	 */
	public static function copy($src, $dest, $path = null, $use_streams = false)
	{
		// Prepend a base path if it exists
		if ($path)
		{
			$src = JPath::clean($path . '/' . $src);
			$dest = JPath::clean($path . '/' . $dest);
		}

		// Check src path
		if (!is_readable($src))
		{
>>>>>>> upstream/master
			JError::raiseWarning(21, JText::sprintf('JLIB_FILESYSTEM_ERROR_JFILE_FIND_COPY', $src));

			return false;
		}

<<<<<<< HEAD
		if ($use_streams) {
			$stream = JFactory::getStream();

			if (!$stream->copy($src, $dest)) {
=======
		if ($use_streams)
		{
			$stream = JFactory::getStream();

			if (!$stream->copy($src, $dest))
			{
>>>>>>> upstream/master
				JError::raiseWarning(21, JText::sprintf('JLIB_FILESYSTEM_ERROR_JFILE_STREAMS', $src, $dest, $stream->getError()));

				return false;
			}

			return true;
<<<<<<< HEAD
		} else {
=======
		}
		else
		{
>>>>>>> upstream/master
			// Initialise variables.
			jimport('joomla.client.helper');
			$FTPOptions = JClientHelper::getCredentials('ftp');

<<<<<<< HEAD
			if ($FTPOptions['enabled'] == 1) {
=======
			if ($FTPOptions['enabled'] == 1)
			{
>>>>>>> upstream/master
				// Connect the FTP client
				jimport('joomla.client.ftp');
				$ftp = JFTP::getInstance($FTPOptions['host'], $FTPOptions['port'], null, $FTPOptions['user'], $FTPOptions['pass']);

				// If the parent folder doesn't exist we must create it
<<<<<<< HEAD
				if (!file_exists(dirname($dest))) {
=======
				if (!file_exists(dirname($dest)))
				{
>>>>>>> upstream/master
					jimport('joomla.filesystem.folder');
					JFolder::create(dirname($dest));
				}

				// Translate the destination path for the FTP account
				$dest = JPath::clean(str_replace(JPATH_ROOT, $FTPOptions['root'], $dest), '/');
<<<<<<< HEAD
				if (!$ftp->store($src, $dest)) {
=======
				if (!$ftp->store($src, $dest))
				{
>>>>>>> upstream/master

					// FTP connector throws an error
					return false;
				}
				$ret = true;
<<<<<<< HEAD
			} else {
				if (!@ copy($src, $dest)) {
=======
			}
			else
			{
				if (!@ copy($src, $dest))
				{
>>>>>>> upstream/master
					JError::raiseWarning(21, JText::_('JLIB_FILESYSTEM_ERROR_COPY_FAILED'));

					return false;
				}
				$ret = true;
			}

			return $ret;
		}
	}

	/**
	 * Delete a file or array of files
	 *
	 * @param   mixed  $file  The file name or an array of file names
	 *
	 * @return  boolean  True on success
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function delete($file)
	{
		// Initialise variables.
		jimport('joomla.client.helper');
		$FTPOptions = JClientHelper::getCredentials('ftp');

<<<<<<< HEAD
		if (is_array($file)) {
			$files = $file;
		} else {
=======
		if (is_array($file))
		{
			$files = $file;
		}
		else
		{
>>>>>>> upstream/master
			$files[] = $file;
		}

		// Do NOT use ftp if it is not enabled
<<<<<<< HEAD
		if ($FTPOptions['enabled'] == 1) {
=======
		if ($FTPOptions['enabled'] == 1)
		{
>>>>>>> upstream/master
			// Connect the FTP client
			jimport('joomla.client.ftp');
			$ftp = JFTP::getInstance($FTPOptions['host'], $FTPOptions['port'], null, $FTPOptions['user'], $FTPOptions['pass']);
		}

<<<<<<< HEAD
		foreach ($files as $file) {
=======
		foreach ($files as $file)
		{
>>>>>>> upstream/master
			$file = JPath::clean($file);

			// Try making the file writeable first. If it's read-only, it can't be deleted
			// on Windows, even if the parent folder is writeable
			@chmod($file, 0777);

			// In case of restricted permissions we zap it one way or the other
			// as long as the owner is either the webserver or the ftp
<<<<<<< HEAD
			if (@unlink($file)) {
				// Do nothing
			} elseif ($FTPOptions['enabled'] == 1) {
				$file = JPath::clean(str_replace(JPATH_ROOT, $FTPOptions['root'], $file), '/');
				if (!$ftp->delete($file)) {
=======
			if (@unlink($file))
			{
				// Do nothing
			}
			elseif ($FTPOptions['enabled'] == 1)
			{
				$file = JPath::clean(str_replace(JPATH_ROOT, $FTPOptions['root'], $file), '/');
				if (!$ftp->delete($file))
				{
>>>>>>> upstream/master
					// FTP connector throws an error

					return false;
				}
<<<<<<< HEAD
			} else {
				$filename	= basename($file);
=======
			}
			else
			{
				$filename = basename($file);
>>>>>>> upstream/master
				JError::raiseWarning('SOME_ERROR_CODE', JText::sprintf('JLIB_FILESYSTEM_DELETE_FAILED', $filename));

				return false;
			}
		}

		return true;
	}

	/**
	 * Moves a file
	 *
<<<<<<< HEAD
	 * @param   string  $src   The path to the source file
	 * @param   string  $dest  The path to the destination file
	 * @param   string  $path  An optional base path to prefix to the file names
	 *
	 * @return  boolean  True on success
	 * @since   11.1
	 */
	public static function move($src, $dest, $path = '', $use_streams=false)
	{
		if ($path) {
			$src = JPath::clean($path.DS.$src);
			$dest = JPath::clean($path.DS.$dest);
		}

		// Check src path
		if (!is_readable($src)) {
=======
	 * @param   string   $src          The path to the source file
	 * @param   string   $dest         The path to the destination file
	 * @param   string   $path         An optional base path to prefix to the file names
	 * @param   boolean  $use_streams  True to use streams
	 *
	 * @return  boolean  True on success
	 *
	 * @since   11.1
	 */
	public static function move($src, $dest, $path = '', $use_streams = false)
	{
		if ($path)
		{
			$src = JPath::clean($path . '/' . $src);
			$dest = JPath::clean($path . '/' . $dest);
		}

		// Check src path
		if (!is_readable($src))
		{
>>>>>>> upstream/master

			return JText::_('JLIB_FILESYSTEM_CANNOT_FIND_SOURCE_FILE');
		}

<<<<<<< HEAD
		if($use_streams) {
			$stream = JFactory::getStream();

			if (!$stream->move($src, $dest)) {
=======
		if ($use_streams)
		{
			$stream = JFactory::getStream();

			if (!$stream->move($src, $dest))
			{
>>>>>>> upstream/master
				JError::raiseWarning(21, JText::sprintf('JLIB_FILESYSTEM_ERROR_JFILE_MOVE_STREAMS', $stream->getError()));

				return false;
			}

			return true;
<<<<<<< HEAD
		} else {
=======
		}
		else
		{
>>>>>>> upstream/master
			// Initialise variables.
			jimport('joomla.client.helper');
			$FTPOptions = JClientHelper::getCredentials('ftp');

<<<<<<< HEAD
			if ($FTPOptions['enabled'] == 1) {
=======
			if ($FTPOptions['enabled'] == 1)
			{
>>>>>>> upstream/master
				// Connect the FTP client
				jimport('joomla.client.ftp');
				$ftp = JFTP::getInstance($FTPOptions['host'], $FTPOptions['port'], null, $FTPOptions['user'], $FTPOptions['pass']);

				// Translate path for the FTP account
<<<<<<< HEAD
				$src	= JPath::clean(str_replace(JPATH_ROOT, $FTPOptions['root'], $src), '/');
				$dest	= JPath::clean(str_replace(JPATH_ROOT, $FTPOptions['root'], $dest), '/');

				// Use FTP rename to simulate move
				if (!$ftp->rename($src, $dest)) {
=======
				$src = JPath::clean(str_replace(JPATH_ROOT, $FTPOptions['root'], $src), '/');
				$dest = JPath::clean(str_replace(JPATH_ROOT, $FTPOptions['root'], $dest), '/');

				// Use FTP rename to simulate move
				if (!$ftp->rename($src, $dest))
				{
>>>>>>> upstream/master
					JError::raiseWarning(21, JText::_('JLIB_FILESYSTEM_ERROR_RENAME_FILE'));

					return false;
				}
<<<<<<< HEAD
			} else {
				if (!@ rename($src, $dest)) {
=======
			}
			else
			{
				if (!@ rename($src, $dest))
				{
>>>>>>> upstream/master
					JError::raiseWarning(21, JText::_('JLIB_FILESYSTEM_ERROR_RENAME_FILE'));

					return false;
				}
			}

			return true;
		}
	}

	/**
	 * Read the contents of a file
	 *
	 * @param   string   $filename   The full file path
	 * @param   boolean  $incpath    Use include path
	 * @param   integer  $amount     Amount of file to read
	 * @param   integer  $chunksize  Size of chunks to read
	 * @param   integer  $offset     Offset of the file
	 *
	 * @return  mixed  Returns file contents or boolean False if failed
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function read($filename, $incpath = false, $amount = 0, $chunksize = 8192, $offset = 0)
	{
		// Initialise variables.
		$data = null;
<<<<<<< HEAD
		if ($amount && $chunksize > $amount) {
			$chunksize = $amount;
		}

		if (false === $fh = fopen($filename, 'rb', $incpath)) {
=======
		if ($amount && $chunksize > $amount)
		{
			$chunksize = $amount;
		}

		if (false === $fh = fopen($filename, 'rb', $incpath))
		{
>>>>>>> upstream/master
			JError::raiseWarning(21, JText::sprintf('JLIB_FILESYSTEM_ERROR_READ_UNABLE_TO_OPEN_FILE', $filename));

			return false;
		}

		clearstatcache();

<<<<<<< HEAD
		if ($offset) {
			fseek($fh, $offset);
		}

		if ($fsize = @ filesize($filename)) {
			if ($amount && $fsize > $amount) {
				$data = fread($fh, $amount);
			} else {
				$data = fread($fh, $fsize);
			}
		} else {
=======
		if ($offset)
		{
			fseek($fh, $offset);
		}

		if ($fsize = @ filesize($filename))
		{
			if ($amount && $fsize > $amount)
			{
				$data = fread($fh, $amount);
			}
			else
			{
				$data = fread($fh, $fsize);
			}
		}
		else
		{
>>>>>>> upstream/master
			$data = '';
			$x = 0;
			// While it's:
			// 1: Not the end of the file AND
			// 2a: No Max Amount set OR
			// 2b: The length of the data is less than the max amount we want
<<<<<<< HEAD
			while (!feof($fh) && (!$amount || strlen($data) < $amount)) {
=======
			while (!feof($fh) && (!$amount || strlen($data) < $amount))
			{
>>>>>>> upstream/master
				$data .= fread($fh, $chunksize);
			}
		}
		fclose($fh);

		return $data;
	}

	/**
	 * Write contents to a file
	 *
<<<<<<< HEAD
	 * @param   string  $file The full file path
	 * @param   string  $buffer The buffer to write
	 *
	 * @return  boolean  True on success
	 * @since   11.1
	 */
	public static function write($file, &$buffer, $use_streams=false)
	{

		// If the destination directory doesn't exist we need to create it
		if (!file_exists(dirname($file))) {
=======
	 * @param   string   $file         The full file path
	 * @param   string   &$buffer      The buffer to write
	 * @param   boolean  $use_streams  Use streams
	 *
	 * @return  boolean  True on success
	 *
	 * @since   11.1
	 */
	public static function write($file, &$buffer, $use_streams = false)
	{
		@set_time_limit(ini_get('max_execution_time'));

		// If the destination directory doesn't exist we need to create it
		if (!file_exists(dirname($file)))
		{
>>>>>>> upstream/master
			jimport('joomla.filesystem.folder');
			JFolder::create(dirname($file));
		}

<<<<<<< HEAD
		if ($use_streams) {
=======
		if ($use_streams)
		{
>>>>>>> upstream/master
			$stream = JFactory::getStream();
			// Beef up the chunk size to a meg
			$stream->set('chunksize', (1024 * 1024 * 1024));

<<<<<<< HEAD
			if (!$stream->writeFile($file, $buffer)) {
=======
			if (!$stream->writeFile($file, $buffer))
			{
>>>>>>> upstream/master
				JError::raiseWarning(21, JText::sprintf('JLIB_FILESYSTEM_ERROR_WRITE_STREAMS', $file, $stream->getError()));
				return false;
			}

			return true;
<<<<<<< HEAD
		} else {
=======
		}
		else
		{
>>>>>>> upstream/master
			// Initialise variables.
			jimport('joomla.client.helper');
			$FTPOptions = JClientHelper::getCredentials('ftp');

<<<<<<< HEAD
			if ($FTPOptions['enabled'] == 1) {
=======
			if ($FTPOptions['enabled'] == 1)
			{
>>>>>>> upstream/master
				// Connect the FTP client
				jimport('joomla.client.ftp');
				$ftp = JFTP::getInstance($FTPOptions['host'], $FTPOptions['port'], null, $FTPOptions['user'], $FTPOptions['pass']);

				// Translate path for the FTP account and use FTP write buffer to file
				$file = JPath::clean(str_replace(JPATH_ROOT, $FTPOptions['root'], $file), '/');
				$ret = $ftp->write($file, $buffer);
<<<<<<< HEAD
			} else {
=======
			}
			else
			{
>>>>>>> upstream/master
				$file = JPath::clean($file);
				$ret = is_int(file_put_contents($file, $buffer)) ? true : false;
			}

			return $ret;
		}
	}

	/**
	 * Moves an uploaded file to a destination folder
	 *
<<<<<<< HEAD
	 * @param   string  $src   The name of the php (temporary) uploaded file
	 * @param   string  $dest  The path (including filename) to move the uploaded file to
	 *
	 * @return  boolean  True on success
	 * @since   11.1
	 */
	public static function upload($src, $dest, $use_streams=false)
=======
	 * @param   string   $src          The name of the php (temporary) uploaded file
	 * @param   string   $dest         The path (including filename) to move the uploaded file to
	 * @param   boolean  $use_streams  True to use streams
	 *
	 * @return  boolean  True on success
	 *
	 * @since   11.1
	 */
	public static function upload($src, $dest, $use_streams = false)
>>>>>>> upstream/master
	{
		// Ensure that the path is valid and clean
		$dest = JPath::clean($dest);

		// Create the destination directory if it does not exist
		$baseDir = dirname($dest);

<<<<<<< HEAD
		if (!file_exists($baseDir)) {
=======
		if (!file_exists($baseDir))
		{
>>>>>>> upstream/master
			jimport('joomla.filesystem.folder');
			JFolder::create($baseDir);
		}

<<<<<<< HEAD
		if($use_streams) {
			$stream = JFactory::getStream();

			if (!$stream->upload($src, $dest)) {
=======
		if ($use_streams)
		{
			$stream = JFactory::getStream();

			if (!$stream->upload($src, $dest))
			{
>>>>>>> upstream/master
				JError::raiseWarning(21, JText::sprintf('JLIB_FILESYSTEM_ERROR_UPLOAD', $stream->getError()));
				return false;
			}

			return true;
<<<<<<< HEAD
		} else {
			// Initialise variables.
			jimport('joomla.client.helper');
			$FTPOptions = JClientHelper::getCredentials('ftp');
			$ret		= false;

			if ($FTPOptions['enabled'] == 1) {
=======
		}
		else
		{
			// Initialise variables.
			jimport('joomla.client.helper');
			$FTPOptions = JClientHelper::getCredentials('ftp');
			$ret = false;

			if ($FTPOptions['enabled'] == 1)
			{
>>>>>>> upstream/master
				// Connect the FTP client
				jimport('joomla.client.ftp');
				$ftp = JFTP::getInstance($FTPOptions['host'], $FTPOptions['port'], null, $FTPOptions['user'], $FTPOptions['pass']);

				// Translate path for the FTP account
				$dest = JPath::clean(str_replace(JPATH_ROOT, $FTPOptions['root'], $dest), '/');

				// Copy the file to the destination directory
<<<<<<< HEAD
				if ($ftp->store($src, $dest)) {
					$ftp->chmod($dest, 0777);
					$ret = true;
				} else {
					JError::raiseWarning(21, JText::_('JLIB_FILESYSTEM_ERROR_WARNFS_ERR02'));
				}
			} else {
				if (is_writeable($baseDir) && move_uploaded_file($src, $dest)) { // Short circuit to prevent file permission errors
					if (JPath::setPermissions($dest)) {
						$ret = true;
					} else {
						JError::raiseWarning(21, JText::_('JLIB_FILESYSTEM_ERROR_WARNFS_ERR01'));
					}
				} else {
=======
				if (is_uploaded_file($src) && $ftp->store($src, $dest))
				{
					unlink($src);
					$ret = true;
				}
				else
				{
					JError::raiseWarning(21, JText::_('JLIB_FILESYSTEM_ERROR_WARNFS_ERR02'));
				}
			}
			else
			{
				if (is_writeable($baseDir) && move_uploaded_file($src, $dest))
				{ // Short circuit to prevent file permission errors
					if (JPath::setPermissions($dest))
					{
						$ret = true;
					}
					else
					{
						JError::raiseWarning(21, JText::_('JLIB_FILESYSTEM_ERROR_WARNFS_ERR01'));
					}
				}
				else
				{
>>>>>>> upstream/master
					JError::raiseWarning(21, JText::_('JLIB_FILESYSTEM_ERROR_WARNFS_ERR02'));
				}
			}

			return $ret;
		}
	}

	/**
	 * Wrapper for the standard file_exists function
	 *
	 * @param   string  $file  File path
	 *
	 * @return  boolean  True if path is a file
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function exists($file)
	{
		return is_file(JPath::clean($file));
	}

	/**
	 * Returns the name, without any path.
	 *
	 * @param   string  $file  File path
	 *
	 * @return  string  filename
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function getName($file)
	{
<<<<<<< HEAD
		$slash = strrpos($file, DS);
		if ($slash !== false) {

			return substr($file, $slash + 1);
		} else {
=======
		// Convert back slashes to forward slashes
		$file = str_replace('\\', '/', $file);
		$slash = strrpos($file, '/');
		if ($slash !== false)
		{

			return substr($file, $slash + 1);
		}
		else
		{
>>>>>>> upstream/master

			return $file;
		}
	}
<<<<<<< HEAD
}
=======
}
>>>>>>> upstream/master
