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

jimport('joomla.filesystem.support.stringcontroller');

/**
 * String Stream Wrapper
 *
<<<<<<< HEAD
 * This class allows you to use a PHP string like
=======
 * This class allows you to use a PHP string in the same way that
>>>>>>> upstream/master
 * you would normally use a regular stream wrapper
 *
 * @package     Joomla.Platform
 * @subpackage  FileSystem
 * @since       11.1
 */
class JStreamString
{
<<<<<<< HEAD
	protected $_currentstring;

	protected $_path;

	protected $_mode;

	protected $_options;

	protected $_opened_path;

	protected $_pos;

	protected $_len;

	protected $_stat;

	/**
	 * @param   $path
	 * @param   $mode
	 * @param   $options
	 * @param   $opened_path
	 *
	 * @return  boolean
=======
	/**
	 * The current string
	 *
	 * @var   string
	 * @since  11.1
	 */
	protected $_currentstring;

	/**
	 *
	 * The path
	 *
	 * @var   string
	 * @since  11.1
	 */
	protected $_path;

	/**
	 *
	 * The mode
	 *
	 * @var   string
	 * @since  11.1
	 */
	protected $_mode;

	/**
	 *
	 * Enter description here ...
	 * @var   string
	 *
	 * @since  11.1
	 */
	protected $_options;

	/**
	 *
	 * Enter description here ...
	 * @var   string
	 *
	 * @since  11.1
	 */
	protected $_opened_path;

	/**
	 * Current position
	 *
	 * @var   integer
	 * @since  11.1
	 */
	protected $_pos;

	/**
	 * Length of the string
	 *
	 * @var   string
	 *
	 * @since  11.1
	 */
	protected $_len;

	/**
	 * Statistics for a file
	 *
	 * @var    array
	 * @since  11.1
	 *
	 * @see    http://us.php.net/manual/en/function.stat.php
	 */
	protected $_stat;

	/**
	 * Method to open a file or URL.
	 *
	 * @param   string   $path          The stream path.
	 * @param   string   $mode          Not used.
	 * @param   integer  $options       Not used.
	 * @param   string   &$opened_path  Not used.
	 *
	 * @return  boolean
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	function stream_open($path, $mode, $options, &$opened_path)
	{
<<<<<<< HEAD
		$this->_currentstring = &JStringController::getRef(str_replace('string://','',$path));

		if($this->_currentstring) {
=======
		$this->_currentstring = &JStringController::getRef(str_replace('string://', '', $path));

		if ($this->_currentstring)
		{
>>>>>>> upstream/master
			$this->_len = strlen($this->_currentstring);
			$this->_pos = 0;
			$this->_stat = $this->url_stat($path, 0);

			return true;
		}
<<<<<<< HEAD
		else {
=======
		else
		{
>>>>>>> upstream/master
			return false;
		}
	}

	/**
<<<<<<< HEAD
	 * @return
	 * @since   11.1
=======
	 * Method to retrieve informaion from a file resource
	 *
	 * @return  array
	 *
	 * @since   11.1
	 *
	 * @see     http://www.php.net/manual/en/streamwrapper.stream-stat.php
>>>>>>> upstream/master
	 */
	function stream_stat()
	{
		return $this->_stat;
	}

	/**
<<<<<<< HEAD
	 * @param   $path
	 * @param   $flags
	 *
	 * @return
	 * @since   11.1
=======
	 * Method to rerieve information about a file.
	 *
	 * @param   string   $path   File path or URL to stat
	 * @param   integer  $flags  Additional flags set by the streams API
	 *
	 * @return  array
	 *
	 * @since   11.1
	 *
	 * @see     http://php.net/manual/en/streamwrapper.url-stat.php
>>>>>>> upstream/master
	 */
	function url_stat($path, $flags = 0)
	{
		$now = time();
<<<<<<< HEAD
		$string = &JStringController::getRef(str_replace('string://','',$path));
		$stat = array(
			'dev'		=> 0,
			'ino'		=> 0,
			'mode'		=> 0,
			'nlink'		=> 1,
			'uid'		=> 0,
			'gid'		=> 0,
			'rdev'		=> 0,
			'size'		=> strlen($string),
			'atime'		=> $now,
			'mtime'		=> $now,
			'ctime'		=> $now,
			'blksize'	=> '512',
			'blocks'	=> ceil(strlen($string) / 512)
		);
=======
		$string = &JStringController::getRef(str_replace('string://', '', $path));
		$stat = array(
			'dev' => 0,
			'ino' => 0,
			'mode' => 0,
			'nlink' => 1,
			'uid' => 0,
			'gid' => 0,
			'rdev' => 0,
			'size' => strlen($string),
			'atime' => $now,
			'mtime' => $now,
			'ctime' => $now,
			'blksize' => '512',
			'blocks' => ceil(strlen($string) / 512));
>>>>>>> upstream/master

		return $stat;
	}

	/**
<<<<<<< HEAD
	 * @param   $count
	 *
	 * @return
	 * @since   11.1
	 */
=======
	 * Method to read a given number of bytes starting at the current position
	 * and moving to the end of the string defined by the current position plus the
	 * given number.
	 *
	 * @param   integer  $count  Bytes of data from the current position should be returned.
	 *
	 * @return  void
	 *
	 * @since   11.1
	 *
	 * @see     http://www.php.net/manual/en/streamwrapper.stream-read.php
	 */

>>>>>>> upstream/master
	function stream_read($count)
	{
		$result = substr($this->_currentstring, $this->_pos, $count);
		$this->_pos += $count;

		return $result;
	}

	/**
<<<<<<< HEAD
	 * @return  boolean
	 * @since   11.1
=======
	 * Stream write, always returning false.
	 *
	 * @param   string  $data  The data to write.
	 *
	 * @return  boolean
	 *
	 * @since   11.1
	 *
	 * @note    Updating the string is not supported.
>>>>>>> upstream/master
	 */
	function stream_write($data)
	{
		// We don't support updating the string.
		return false;
	}

	/**
<<<<<<< HEAD
	 * @return
=======
	 * Method to get the current position
	 *
	 * @return  integer  The position
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	function stream_tell()
	{
		return $this->_pos;
	}

	/**
<<<<<<< HEAD
	 * @return  boolean
=======
	 * End of field check
	 *
	 * @return  boolean  True if at end of field.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	function stream_eof()
	{
<<<<<<< HEAD
		if ($this->_pos > $this->_len) {
=======
		if ($this->_pos > $this->_len)
		{
>>>>>>> upstream/master
			return true;
		}

		return false;
	}

	/**
<<<<<<< HEAD
	 * @param   $offset
	 * @param   $whence
	 *
	 * @return
=======
	 * Stream offset
	 *
	 * @param   integer  $offset  The starting offset.
	 * @param   integer  $whence  SEEK_SET, SEEK_CUR, SEEK_END
	 *
	 * @return  boolean  True on success.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	function stream_seek($offset, $whence)
	{
		// $whence: SEEK_SET, SEEK_CUR, SEEK_END
<<<<<<< HEAD
		if ($offset > $this->_len) {
=======
		if ($offset > $this->_len)
		{
>>>>>>> upstream/master
			// We can't seek beyond our len.
			return false;
		}

<<<<<<< HEAD
		switch($whence)
=======
		switch ($whence)
>>>>>>> upstream/master
		{
			case SEEK_SET:
				$this->_pos = $offset;
				break;

			case SEEK_CUR:
<<<<<<< HEAD
				if (($this->_pos + $offset) < $this->_len) {
					$this->_pos += $offset;
				}
				else {
=======
				if (($this->_pos + $offset) < $this->_len)
				{
					$this->_pos += $offset;
				}
				else
				{
>>>>>>> upstream/master
					return false;
				}
				break;

			case SEEK_END:
				$this->_pos = $this->_len - $offset;
				break;
		}

		return true;
	}

	/**
<<<<<<< HEAD
	 * @return  boolean
	 * @since   11.1
=======
	 * Stream flush, always returns true.
	 *
	 * @return  boolean
	 *
	 * @since   11.1
	 *
	 * @note    Data storage is not supported
>>>>>>> upstream/master
	 */
	function stream_flush()
	{
		// We don't store data.
		return true;
	}
}

stream_wrapper_register('string', 'JStreamString') or die(JText::_('JLIB_FILESYSTEM_STREAM_FAILED'));
