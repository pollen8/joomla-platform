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

jimport('joomla.filesystem.helper');
jimport('joomla.utilities.utility');

/**
 * Joomla! Stream Interface
 *
 * The Joomla! stream interface is designed to handle files as streams
 * where as the legacy JFile static class treated files in a rather
 * atomic manner.
 *
<<<<<<< HEAD
 * This class adheres to the stream wrapper operations:
 * http://php.net/manual/en/function.stream-get-wrappers.php
 *
 * @see http://php.net/manual/en/intro.stream.php PHP Stream Manual
 * @see http://php.net/manual/en/wrappers.php Stream Wrappers
 * @see http://php.net/manual/en/filters.php Stream Filters
 * @see http://php.net/manual/en/transports.php Socket Transports (used by some options, particularly HTTP proxy)
=======
 * @package     Joomla.Platform
 * @subpackage  FileSystem
 *
 * This class adheres to the stream wrapper operations:
 *
 * @see         http://php.net/manual/en/function.stream-get-wrappers.php
 * @see         http://php.net/manual/en/intro.stream.php PHP Stream Manual
 * @see         http://php.net/manual/en/wrappers.php Stream Wrappers
 * @see         http://php.net/manual/en/filters.php Stream Filters
 * @see         http://php.net/manual/en/transports.php Socket Transports (used by some options, particularly HTTP proxy)
 * @since       11.1
>>>>>>> upstream/master
 */
class JStream extends JObject
{
	// Publicly settable vars (protected to let our parent read them)
	/**
<<<<<<< HEAD
	 * @var    integer  File Mode
=======
	 * File Mode
	 * @var    integer
>>>>>>> upstream/master
	 * @since  11.1
	 * */
	protected $filemode = 0644;

	/**
<<<<<<< HEAD
	 * @var   integer  Directory Mode
=======
	 * Directory Mode
	 * @var   integer
>>>>>>> upstream/master
	 * @since  11.1
	 * */
	protected $dirmode = 0755;

	/**
<<<<<<< HEAD
	 * @var    integer  Default Chunk Size
=======
	 * Default Chunk Size
	 * @var    integer
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $chunksize = 8192;

	/**
<<<<<<< HEAD
	 * @var    string  Filename
=======
	 * Filename
	 * @var    string
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $filename;

	/**
<<<<<<< HEAD
	 * @var    string  Prefix of the connection for writing
=======
	 * Prefix of the connection for writing
	 * @var    string
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $writeprefix;

	/**
<<<<<<< HEAD
	 * @var    string  Prefix of the connection for reading
=======
	 * Prefix of the connection for reading
	 * @var    string
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $readprefix;

	/**
<<<<<<< HEAD
	/** @var   string  Read Processing method: gz, bz, f
	 *                 If a scheme is detected, fopen will be defaulted
	 *                 To use compression with a network stream use a filter
=======
	 *
	 *Read Processing method
	 * @var   string  gz, bz, f
	 * If a scheme is detected, fopen will be defaulted
	 * To use compression with a network stream use a filter
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $processingmethod = 'f';

	/**
<<<<<<< HEAD
	 * @var    array  Filters applied to the current stream
=======
	 * Filters applied to the current stream
	 * @var    array
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $filters = Array();

	/**
<<<<<<< HEAD
	 * @var    array  File Handle
=======
	 * File Handle
	 * @var    array
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $_fh;

	/**
<<<<<<< HEAD
	 * @var    integer  File size
=======
	 * File size
	 * @var    integer
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $_filesize;

	/**
<<<<<<< HEAD
	 *
	 * @var    Context to use when opening the connection
=======
	 *Context to use when opening the connection
	 * @var
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $_context = null;

	/**
<<<<<<< HEAD
	 * @var Context options; used to rebuild the context
=======
	 * Context options; used to rebuild the context
	 * @var
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $_contextOptions;

	/**
<<<<<<< HEAD
	 * @var The mode under which the file was opened
=======
	 * The mode under which the file was opened
	 * @var
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $_openmode;

	/**
	 * Constructor
	 *
<<<<<<< HEAD
	 * @param   string  $writeprefix	Prefix of the stream; Note: unlike the JPATH_*, this has a final path seperator!
	 * @param   string  $readprefix
	 * @param   string  $context
=======
	 * @param   string  $writeprefix  Prefix of the stream (optional). Unlike the JPATH_*, this has a final path seperator!
	 * @param   string  $readprefix   The read prefix (optional).
	 * @param   array   $context      The context options (optional).
>>>>>>> upstream/master
	 *
	 * @return  JStream
	 *
	 * @since   11.1
	 */
	function __construct($writeprefix = '', $readprefix = '', $context = array())
	{
		$this->writeprefix = $writeprefix;
		$this->readprefix = $readprefix;
		$this->_contextOptions = $context;
		$this->_buildContext();
	}

	/**
	 * Destructor
	 *
	 * @return  void
	 *
	 * @since   11.1
	 */
	function __destruct()
	{
		// Attempt to close on destruction if there is a file handle
<<<<<<< HEAD
		if ($this->_fh) {
=======
		if ($this->_fh)
		{
>>>>>>> upstream/master
			@$this->close();
		}
	}

	/**
<<<<<<< HEAD
	 *  Generic File Operations
	 *
	 * Open a stream with some lazy loading smarts
	 * @param   string    $filename				Filename
	 * @param   string    $mode					Mode string to use
	 * @param   bool      $use_include_path		Use the PHP include path
	 * @param   resource  $context				Context to use when opening
	 * @param   bool      $use_prefix				Use a prefix to open the file
	 * @param   bool      $relative				Filename is a relative path (if false, strips JPATH_ROOT to make it relative)
	 * @param   bool      $detectprocessingmode	Detect the processing method for the file and use the appropriate function to handle output automatically
=======
	 * Generic File Operations
	 *
	 * Open a stream with some lazy loading smarts
	 *
	 * @param   string    $filename              Filename
	 * @param   string    $mode                  Mode string to use
	 * @param   boolean   $use_include_path      Use the PHP include path
	 * @param   resource  $context               Context to use when opening
	 * @param   boolean   $use_prefix            Use a prefix to open the file
	 * @param   boolean   $relative              Filename is a relative path (if false, strips JPATH_ROOT to make it relative)
	 * @param   boolean   $detectprocessingmode  Detect the processing method for the file and use the appropriate function
	 *                                           to handle output automatically
>>>>>>> upstream/master
	 *
	 * @return  boolean
	 *
	 * @since   11.1
	 */
<<<<<<< HEAD
	function open($filename, $mode='r', $use_include_path=false, $context=null, $use_prefix=false, $relative=false, $detectprocessingmode=false)
	{
		$filename = $this->_getFilename($filename, $mode, $use_prefix, $relative);

		if (!$filename) {
=======
	function open($filename, $mode = 'r', $use_include_path = false, $context = null,
		$use_prefix = false, $relative = false, $detectprocessingmode = false)
	{
		$filename = $this->_getFilename($filename, $mode, $use_prefix, $relative);

		if (!$filename)
		{
>>>>>>> upstream/master
			$this->setError(JText::_('JLIB_FILESYSTEM_ERROR_STREAMS_FILENAME'));
			return false;
		}

		$this->filename = $filename;
		$this->_openmode = $mode;

		$url = parse_url($filename);
		$retval = false;

<<<<<<< HEAD
		if (isset($url['scheme'])) {
			// If we're dealing with a Joomla! stream, load it
			if (JFilesystemHelper::isJoomlaStream($url['scheme'])) {
				require_once dirname(__FILE__).'/streams/'.$url['scheme'].'.php';
=======
		if (isset($url['scheme']))
		{
			// If we're dealing with a Joomla! stream, load it
			if (JFilesystemHelper::isJoomlaStream($url['scheme']))
			{
				require_once dirname(__FILE__) . '/streams/' . $url['scheme'] . '.php';
>>>>>>> upstream/master
			}

			// We have a scheme! force the method to be f
			$this->processingmethod = 'f';
		}
<<<<<<< HEAD
		else if ($detectprocessingmode) {
=======
		else if ($detectprocessingmode)
		{
>>>>>>> upstream/master
			$ext = strtolower(JFile::getExt($this->filename));

			switch ($ext)
			{
				case 'tgz':
				case 'gz':
				case 'gzip':
					$this->processingmethod = 'gz';
					break;

				case 'tbz2':
				case 'bz2':
				case 'bzip2':
					$this->processingmethod = 'bz';
					break;

				default:
					$this->processingmethod = 'f';
					break;
			}
		}

		// Capture PHP errors
		$php_errormsg = 'Error Unknown whilst opening a file';
		$track_errors = ini_get('track_errors');
		ini_set('track_errors', true);

		// Decide which context to use:
<<<<<<< HEAD
		switch($this->processingmethod)
=======
		switch ($this->processingmethod)
>>>>>>> upstream/master
		{
			// gzip doesn't support contexts or streams
			case 'gz':
				$this->_fh = gzopen($filename, $mode, $use_include_path);
				break;

			// bzip2 is much like gzip except it doesn't use the include path
			case 'bz':
				$this->_fh = bzopen($filename, $mode);
				break;

			// fopen can handle streams
			case 'f':
			default:
				// One supplied at open; overrides everything
<<<<<<< HEAD
				if ($context) {
					$this->_fh = fopen($filename, $mode, $use_include_path, $context);
				}
				// One provided at initialisation
				else if ($this->_context) {
					$this->_fh = fopen($filename, $mode, $use_include_path, $this->_context);
				}
				// No context; all defaults
				else {
=======
				if ($context)
				{
					$this->_fh = fopen($filename, $mode, $use_include_path, $context);
				}
				// One provided at initialisation
				else if ($this->_context)
				{
					$this->_fh = fopen($filename, $mode, $use_include_path, $this->_context);
				}
				// No context; all defaults
				else
				{
>>>>>>> upstream/master
					$this->_fh = fopen($filename, $mode, $use_include_path);
				}
				break;
		}

<<<<<<< HEAD
		if (!$this->_fh) {
			$this->setError($php_errormsg);
		}
		else {
=======
		if (!$this->_fh)
		{
			$this->setError($php_errormsg);
		}
		else
		{
>>>>>>> upstream/master
			$retval = true;
		}

		// Restore error tracking to what it was before
<<<<<<< HEAD
		ini_set('track_errors',$track_errors);
=======
		ini_set('track_errors', $track_errors);
>>>>>>> upstream/master

		// Return the result
		return $retval;
	}

	/**
	 * Attempt to close a file handle
	 *
	 * Will return false if it failed and true on success
<<<<<<< HEAD
	 * @note: If the file is not open the system will return true
	 * @note: this function destroys the file handle as well
=======
	 * If the file is not open the system will return true, this function destroys the file handle as well
>>>>>>> upstream/master
	 *
	 * @return  boolean
	 *
	 * @since   11.1
	 */
	function close()
	{
<<<<<<< HEAD
		if (!$this->_fh) {
=======
		if (!$this->_fh)
		{
>>>>>>> upstream/master
			$this->setError(JText::_('JLIB_FILESYSTEM_ERROR_STREAMS_FILE_NOT_OPEN'));
			return true;
		}

		$retval = false;
		// Capture PHP errors
		$php_errormsg = 'Error Unknown';
		$track_errors = ini_get('track_errors');
		ini_set('track_errors', true);

<<<<<<< HEAD
		switch($this->processingmethod)
=======
		switch ($this->processingmethod)
>>>>>>> upstream/master
		{
			case 'gz':
				$res = gzclose($this->_fh);
				break;

			case 'bz':
				$res = bzclose($this->_fh);
				break;

			case 'f':
			default:
				$res = fclose($this->_fh);
				break;
		}

<<<<<<< HEAD
		if (!$res) {
			$this->setError($php_errormsg);
		}
		else {
=======
		if (!$res)
		{
			$this->setError($php_errormsg);
		}
		else
		{
>>>>>>> upstream/master
			// reset this
			$this->_fh = null;
			$retval = true;
		}

		// If we wrote, chmod the file after it's closed
<<<<<<< HEAD
		if ($this->_openmode[0] == 'w') {
=======
		if ($this->_openmode[0] == 'w')
		{
>>>>>>> upstream/master
			$this->chmod();
		}

		// Restore error tracking to what it was before
<<<<<<< HEAD
		ini_set('track_errors',$track_errors);
=======
		ini_set('track_errors', $track_errors);
>>>>>>> upstream/master

		// Return the result
		return $retval;
	}

	/**
	 * Work out if we're at the end of the file for a stream
	 *
	 * @return  boolean
	 *
	 * @since   11.1
	 */
	function eof()
	{
<<<<<<< HEAD
		if (!$this->_fh) {
=======
		if (!$this->_fh)
		{
>>>>>>> upstream/master
			$this->setError(JText::_('JLIB_FILESYSTEM_ERROR_STREAMS_FILE_NOT_OPEN'));

			return false;
		}

		$retval = false;
		// Capture PHP errors
		$php_errormsg = '';
		$track_errors = ini_get('track_errors');
		ini_set('track_errors', true);

<<<<<<< HEAD
		switch($this->processingmethod)
=======
		switch ($this->processingmethod)
>>>>>>> upstream/master
		{
			case 'gz':
				$res = gzeof($this->_fh);
				break;

			case 'bz':
			case 'f':
			default:
				$res = feof($this->_fh);
				break;
		}

<<<<<<< HEAD
		if ($php_errormsg) {
=======
		if ($php_errormsg)
		{
>>>>>>> upstream/master
			$this->setError($php_errormsg);
		}

		// Restore error tracking to what it was before
		ini_set('track_errors', $track_errors);

		// Return the result
		return $res;
	}

	/**
	 * Retrieve the file size of the path
	 *
	 * @return  mixed
	 *
	 * @since   11.1
	 */
	function filesize()
	{
<<<<<<< HEAD
		if (!$this->filename) {
=======
		if (!$this->filename)
		{
>>>>>>> upstream/master
			$this->setError(JText::_('JLIB_FILESYSTEM_ERROR_STREAMS_FILE_NOT_OPEN'));

			return false;
		}

		$retval = false;
		// Capture PHP errors
		$php_errormsg = '';
		$track_errors = ini_get('track_errors');
		ini_set('track_errors', true);
		$res = @filesize($this->filename);

<<<<<<< HEAD
		if (!$res) {
			$tmp_error = '';

			if ($php_errormsg) {
=======
		if (!$res)
		{
			$tmp_error = '';

			if ($php_errormsg)
			{
>>>>>>> upstream/master
				// Something went wrong.
				// Store the error in case we need it.
				$tmp_error = $php_errormsg;
			}

			$res = JFilesystemHelper::remotefsize($this->filename);

<<<<<<< HEAD
			if (!$res) {
				if ($tmp_error) {
					// Use the php_errormsg from before
					$this->setError($tmp_error);
				}
				else {
=======
			if (!$res)
			{
				if ($tmp_error)
				{
					// Use the php_errormsg from before
					$this->setError($tmp_error);
				}
				else
				{
>>>>>>> upstream/master
					// Error but nothing from php? How strange! Create our own
					$this->setError(JText::_('JLIB_FILESYSTEM_ERROR_STREAMS_FILE_SIZE'));
				}
			}
<<<<<<< HEAD
			else {
=======
			else
			{
>>>>>>> upstream/master
				$this->_filesize = $res;
				$retval = $res;
			}
		}
<<<<<<< HEAD
		else {
=======
		else
		{
>>>>>>> upstream/master
			$this->_filesize = $res;
			$retval = $res;
		}

		// Restore error tracking to what it was before.
<<<<<<< HEAD
		ini_set('track_errors',$track_errors);
=======
		ini_set('track_errors', $track_errors);
>>>>>>> upstream/master

		// return the result
		return $retval;
	}

	/**
<<<<<<< HEAD
	 * @param   integer  $length
=======
	 * Get a line from the stream source.
	 *
	 * @param   integer  $length  The number of bytes (optional) to read.
>>>>>>> upstream/master
	 *
	 * @return  mixed
	 *
	 * @since   11.1
	 */
<<<<<<< HEAD
	function gets($length=0)
	{
		if (!$this->_fh) {
=======
	function gets($length = 0)
	{
		if (!$this->_fh)
		{
>>>>>>> upstream/master
			$this->setError(JText::_('JLIB_FILESYSTEM_ERROR_STREAMS_FILE_NOT_OPEN'));

			return false;
		}

		$retval = false;
		// Capture PHP errors
		$php_errormsg = 'Error Unknown';
		$track_errors = ini_get('track_errors');
		ini_set('track_errors', true);

<<<<<<< HEAD
		switch($this->processingmethod)
=======
		switch ($this->processingmethod)
>>>>>>> upstream/master
		{
			case 'gz':
				$res = $length ? gzgets($this->_fh, $length) : gzgets($this->_fh);
				break;

			case 'bz':
			case 'f':
			default:
				$res = $length ? fgets($this->_fh, $length) : fgets($this->_fh);
				break;
		}

<<<<<<< HEAD
		if (!$res) {
			$this->setError($php_errormsg);
		}
		else {
=======
		if (!$res)
		{
			$this->setError($php_errormsg);
		}
		else
		{
>>>>>>> upstream/master
			$retval = $res;
		}

		// Restore error tracking to what it was before
<<<<<<< HEAD
		ini_set('track_errors',$track_errors);
=======
		ini_set('track_errors', $track_errors);
>>>>>>> upstream/master

		// return the result
		return $retval;
	}

	/**
	 * Read a file
	 *
	 * Handles user space streams appropriately otherwise any read will return 8192
	 *
<<<<<<< HEAD
	 * @param   integer  $length	Length of data to read
	 *
	 * @return  mixed
	 *
	 * @see		http://php.net/manual/en/function.fread.php
	 * @since   11.1
	 */
	function read($length=0)
	{
		if (!$this->_filesize && !$length) {
			// Get the filesize
			$this->filesize();

			if (!$this->_filesize) {
				// Set it to the biggest and then wait until eof
				$length = -1;
			}
			else {
=======
	 * @param   integer  $length  Length of data to read
	 *
	 * @return  mixed
	 *
	 * @see     http://php.net/manual/en/function.fread.php
	 * @since   11.1
	 */
	function read($length = 0)
	{
		if (!$this->_filesize && !$length)
		{
			// Get the filesize
			$this->filesize();

			if (!$this->_filesize)
			{
				// Set it to the biggest and then wait until eof
				$length = -1;
			}
			else
			{
>>>>>>> upstream/master
				$length = $this->_filesize;
			}
		}

<<<<<<< HEAD
		if (!$this->_fh) {
=======
		if (!$this->_fh)
		{
>>>>>>> upstream/master
			$this->setError(JText::_('JLIB_FILESYSTEM_ERROR_STREAMS_FILE_NOT_OPEN'));

			return false;
		}

		$retval = false;
		// Capture PHP errors
		$php_errormsg = 'Error Unknown';
		$track_errors = ini_get('track_errors');
		ini_set('track_errors', true);
		$remaining = $length;

		do
		{
			// Do chunked reads where relevant
<<<<<<< HEAD
			switch($this->processingmethod)
=======
			switch ($this->processingmethod)
>>>>>>> upstream/master
			{
				case 'bz':
					$res = ($remaining > 0) ? bzread($this->_fh, $remaining) : bzread($this->_fh, $this->chunksize);
					break;

				case 'gz':
					$res = ($remaining > 0) ? gzread($this->_fh, $remaining) : gzread($this->_fh, $this->chunksize);
					break;

				case 'f':
				default:
					$res = ($remaining > 0) ? fread($this->_fh, $remaining) : fread($this->_fh, $this->chunksize);
					break;
			}

<<<<<<< HEAD
			if (!$res) {
				$this->setError($php_errormsg);
				$remaining = 0; // jump from the loop
			}
			else {
				if (!$retval) {
=======
			if (!$res)
			{
				$this->setError($php_errormsg);
				$remaining = 0; // jump from the loop
			}
			else
			{
				if (!$retval)
				{
>>>>>>> upstream/master
					$retval = '';
				}

				$retval .= $res;

<<<<<<< HEAD
				if (!$this->eof()) {
					$len = strlen($res);
					$remaining -= $len;
				}
				else {
=======
				if (!$this->eof())
				{
					$len = strlen($res);
					$remaining -= $len;
				}
				else
				{
>>>>>>> upstream/master
					// If it's the end of the file then we've nothing left to read; reset remaining and len
					$remaining = 0;
					$length = strlen($retval);
				}
			}
		}
<<<<<<< HEAD
		while($remaining || !$length);

		// Restore error tracking to what it was before
		ini_set('track_errors',$track_errors);
=======
		while ($remaining || !$length);

		// Restore error tracking to what it was before
		ini_set('track_errors', $track_errors);
>>>>>>> upstream/master

		// Return the result
		return $retval;
	}

	/**
	 * Seek the file
	 *
	 * Note: the return value is different to that of fseek
	 *
<<<<<<< HEAD
	 * @param   integer  $offset	Offset to use when seeking
	 * @param   integer  $whence	Seek mode to use
=======
	 * @param   integer  $offset  Offset to use when seeking.
	 * @param   integer  $whence  Seek mode to use.
>>>>>>> upstream/master
	 *
	 * @return  boolean  True on success, false on failure
	 *
	 * @see http://php.net/manual/en/function.fseek.php
	 * @since   11.1
	 */
<<<<<<< HEAD
	function seek($offset, $whence=SEEK_SET)
	{
		if (!$this->_fh) {
=======
	function seek($offset, $whence = SEEK_SET)
	{
		if (!$this->_fh)
		{
>>>>>>> upstream/master
			$this->setError(JText::_('JLIB_FILESYSTEM_ERROR_STREAMS_FILE_NOT_OPEN'));

			return false;
		}

		$retval = false;
		// Capture PHP errors
		$php_errormsg = '';
		$track_errors = ini_get('track_errors');
		ini_set('track_errors', true);

<<<<<<< HEAD
		switch($this->processingmethod)
=======
		switch ($this->processingmethod)
>>>>>>> upstream/master
		{
			case 'gz':
				$res = gzseek($this->_fh, $offset, $whence);
				break;

			case 'bz':
			case 'f':
			default:
				$res = fseek($this->_fh, $offset, $whence);
				break;
		}

		// Seek, interestingly, returns 0 on success or -1 on failure.
<<<<<<< HEAD
		if ($res == -1) {
			$this->setError($php_errormsg);
		}
		else {
=======
		if ($res == -1)
		{
			$this->setError($php_errormsg);
		}
		else
		{
>>>>>>> upstream/master
			$retval = true;
		}

		// Restore error tracking to what it was before
<<<<<<< HEAD
		ini_set('track_errors',$track_errors);
=======
		ini_set('track_errors', $track_errors);
>>>>>>> upstream/master

		// Return the result
		return $retval;
	}

	/**
<<<<<<< HEAD
=======
	 * Returns the current position of the file read/write pointer.
	 *
>>>>>>> upstream/master
	 * @return  mixed
	 *
	 * @since   11.1
	 */
	function tell()
	{
<<<<<<< HEAD
		if (!$this->_fh) {
=======
		if (!$this->_fh)
		{
>>>>>>> upstream/master
			$this->setError(JText::_('JLIB_FILESYSTEM_ERROR_STREAMS_FILE_NOT_OPEN'));

			return false;
		}

		$res = false;
		// Capture PHP errors
		$php_errormsg = '';
		$track_errors = ini_get('track_errors');
		ini_set('track_errors', true);

<<<<<<< HEAD
		switch($this->processingmethod)
=======
		switch ($this->processingmethod)
>>>>>>> upstream/master
		{
			case 'gz':
				$res = gztell($this->_fh);
				break;

			case 'bz':
			case 'f':
			default:
				$res = ftell($this->_fh);
				break;
		}

		// May return 0 so check if it's really false
<<<<<<< HEAD
		if ($res === FALSE) {
=======
		if ($res === false)
		{
>>>>>>> upstream/master
			$this->setError($php_errormsg);
		}

		// Restore error tracking to what it was before
<<<<<<< HEAD
		ini_set('track_errors',$track_errors);
=======
		ini_set('track_errors', $track_errors);
>>>>>>> upstream/master

		// Return the result
		return $res;
	}

	/**
	 * File write
	 *
	 * Whilst this function accepts a reference, the underlying fwrite
	 * will do a copy! This will roughly double the memory allocation for
	 * any write you do. Specifying chunked will get around this by only
	 * writing in specific chunk sizes. This defaults to 8192 which is a
	 * sane number to use most of the time (change the default with
	 * JStream::set('chunksize', newsize);)
	 * Note: This doesn't support gzip/bzip2 writing like reading does
	 *
<<<<<<< HEAD
	 * @param   string   $string  Reference to the string to write
	 * @param   integer  $length  Length of the string to write
	 * @param   integer  $chunk  Size of chunks to write in
	 *
	 * @return  boolean
	 *
	 * @see       http://php.net/manual/en/function.fwrite.php
	 * @since   11.1
	 */
	function write(&$string, $length=0, $chunk=0)
	{
		if (!$this->_fh) {
=======
	 * @param   string   &$string  Reference to the string to write.
	 * @param   integer  $length   Length of the string to write.
	 * @param   integer  $chunk    Size of chunks to write in.
	 *
	 * @return  boolean
	 *
	 * @see     http://php.net/manual/en/function.fwrite.php
	 * @since   11.1
	 */
	function write(&$string, $length = 0, $chunk = 0)
	{
		if (!$this->_fh)
		{
>>>>>>> upstream/master
			$this->setError(JText::_('JLIB_FILESYSTEM_ERROR_STREAMS_FILE_NOT_OPEN'));

			return false;
		}

		// If the length isn't set, set it to the length of the string.
<<<<<<< HEAD
		if (!$length) {
=======
		if (!$length)
		{
>>>>>>> upstream/master
			$length = strlen($string);
		}

		// If the chunk isn't set, set it to the default.
<<<<<<< HEAD
		if (!$chunk) {
=======
		if (!$chunk)
		{
>>>>>>> upstream/master
			$chunk = $this->chunksize;
		}

		$retval = true;
		// Capture PHP errors
		$php_errormsg = '';
		$track_errors = ini_get('track_errors');
		ini_set('track_errors', true);
		$remaining = $length;

		do
		{
			// If the amount remaining is greater than the chunk size, then use the chunk
			$amount = ($remaining > $chunk) ? $chunk : $remaining;
			$res = fwrite($this->_fh, $string, $amount);

			// Returns false on error or the number of bytes written
<<<<<<< HEAD
			if ($res === false) {
=======
			if ($res === false)
			{
>>>>>>> upstream/master
				// Returned error
				$this->setError($php_errormsg);
				$retval = false;
				$remaining = 0;
			}
<<<<<<< HEAD
			else if ($res === 0) {
=======
			else if ($res === 0)
			{
>>>>>>> upstream/master
				// Wrote nothing?
				$remaining = 0;
				$this->setError(JText::_('JLIB_FILESYSTEM_ERROR_NO_DATA_WRITTEN'));
			}
<<<<<<< HEAD
			else {
=======
			else
			{
>>>>>>> upstream/master
				// Wrote something
				$remaining -= $res;
			}
		}
		while ($remaining);

		// Restore error tracking to what it was before.
<<<<<<< HEAD
		ini_set('track_errors',$track_errors);
=======
		ini_set('track_errors', $track_errors);
>>>>>>> upstream/master

		// Return the result
		return $retval;
	}

	/**
	 * Chmod wrapper
	 *
<<<<<<< HEAD
	 * @param   string   $filename   File name
	 * @param   mixed    $mode       Mode to use
=======
	 * @param   string  $filename  File name.
	 * @param   mixed   $mode      Mode to use.
>>>>>>> upstream/master
	 *
	 * @return  boolean
	 *
	 * @since   11.1
	 */
<<<<<<< HEAD
	function chmod($filename='', $mode=0)
	{
		if (!$filename) {
			if (!isset($this->filename) || !$this->filename) {
=======
	function chmod($filename = '', $mode = 0)
	{
		if (!$filename)
		{
			if (!isset($this->filename) || !$this->filename)
			{
>>>>>>> upstream/master
				$this->setError(JText::_('JLIB_FILESYSTEM_ERROR_STREAMS_FILENAME'));

				return false;
			}

			$filename = $this->filename;
		}

		// If no mode is set use the default
<<<<<<< HEAD
		if (!$mode) {
=======
		if (!$mode)
		{
>>>>>>> upstream/master
			$mode = $this->filemode;
		}

		$retval = false;
		// Capture PHP errors
		$php_errormsg = '';
		$track_errors = ini_get('track_errors');
		ini_set('track_errors', true);
		$sch = parse_url($filename, PHP_URL_SCHEME);

		// Scheme specific options; ftp's chmod support is fun.
<<<<<<< HEAD
		switch($sch)
=======
		switch ($sch)
>>>>>>> upstream/master
		{
			case 'ftp':
			case 'ftps':
				$res = JFilesystemHelper::ftpChmod($filename, $mode);
				break;

			default:
				$res = chmod($filename, $mode);
				break;
		}

		// Seek, interestingly, returns 0 on success or -1 on failure
<<<<<<< HEAD
		if (!$res) {
			$this->setError($php_errormsg);
		}
		else {
=======
		if (!$res)
		{
			$this->setError($php_errormsg);
		}
		else
		{
>>>>>>> upstream/master
			$retval = true;
		}

		// Restore error tracking to what it was before.
<<<<<<< HEAD
		ini_set('track_errors',$track_errors);
=======
		ini_set('track_errors', $track_errors);
>>>>>>> upstream/master

		// Return the result
		return $retval;
	}

	/**
	 * Get the stream metadata
	 *
	 * @return  array  header/metadata
	 *
<<<<<<< HEAD
	 * @see		http://php.net/manual/en/function.stream-get-meta-data.php
=======
	 * @see     http://php.net/manual/en/function.stream-get-meta-data.php
>>>>>>> upstream/master
	 * @since   11.1
	 */
	function get_meta_data()
	{
<<<<<<< HEAD
		if (!$this->_fh) {
=======
		if (!$this->_fh)
		{
>>>>>>> upstream/master
			$this->setError(JText::_('JLIB_FILESYSTEM_ERROR_STREAMS_FILE_NOT_OPEN'));

			return false;
		}

		return stream_get_meta_data($this->_fh);
	}

	/**
	 * Stream contexts
	 * Builds the context from the array
	 *
	 * @return  mixed
	 *
	 * @since   11.1
	 */
	function _buildContext()
	{
		// According to the manual this always works!
<<<<<<< HEAD
		if (count($this->_contextOptions)) {
			$this->_context = @stream_context_create($this->_contextOptions);
		}
		else {
=======
		if (count($this->_contextOptions))
		{
			$this->_context = @stream_context_create($this->_contextOptions);
		}
		else
		{
>>>>>>> upstream/master
			$this->_context = null;
		}
	}

	/**
	 * Updates the context to the array
	 *
	 * Format is the same as the options for stream_context_create
	 *
	 * @param   array  $context  Options to create the context with
	 *
	 * @return  void
	 *
	 * @see       http://php.net/stream_context_create
	 * @since   11.1
	 */
	function setContextOptions($context)
	{
		$this->_contextOptions = $context;
		$this->_buildContext();
	}

	/**
	 * Adds a particular options to the context
	 *
<<<<<<< HEAD
	 * @param   string  $wrapper	The wrapper to use
	 * @param   string  $name		The option to set
	 * @param   string  $value		The value of the option
=======
	 * @param   string  $wrapper  The wrapper to use
	 * @param   string  $name     The option to set
	 * @param   string  $value    The value of the option
>>>>>>> upstream/master
	 *
	 * @return  void
	 *
	 * @see     http://php.net/stream_context_create Stream Context Creation
	 * @see     http://php.net/manual/en/context.php Context Options for various streams
	 * @since   11.1
	 */
	function addContextEntry($wrapper, $name, $value)
	{
		$this->_contextOptions[$wrapper][$name] = $value;
		$this->_buildContext();
	}

	/**
	 * Deletes a particular setting from a context
	 *
	 * @param   string  $wrapper  The wrapper to use
	 * @param   string  $name     The option to unset
	 *
	 * @return  void
	 *
<<<<<<< HEAD
	 * @see		http://php.net/stream_context_create
=======
	 * @see     http://php.net/stream_context_create
>>>>>>> upstream/master
	 * @since   11.1
	 */
	function deleteContextEntry($wrapper, $name)
	{
		// Check whether the wrapper is set
<<<<<<< HEAD
		if (isset($this->_contextOptions[$wrapper])) {
			// Check that entry is set for that wrapper
			if (isset($this->_contextOptions[$wrapper][$name])) {
=======
		if (isset($this->_contextOptions[$wrapper]))
		{
			// Check that entry is set for that wrapper
			if (isset($this->_contextOptions[$wrapper][$name]))
			{
>>>>>>> upstream/master
				// Unset the item
				unset($this->_contextOptions[$wrapper][$name]);

				// Check that there are still items there
<<<<<<< HEAD
				if (!count($this->_contextOptions[$wrapper])) {
=======
				if (!count($this->_contextOptions[$wrapper]))
				{
>>>>>>> upstream/master
					// Clean up an empty wrapper context option
					unset($this->_contextOptions[$wrapper]);
				}
			}
		}

		// Rebuild the context and apply it to the stream
		$this->_buildContext();
	}

	/**
	 * Applies the current context to the stream
	 *
	 * Use this to change the values of the context after you've opened a stream
	 *
	 * @return  mixed
	 *
	 * @since   11.1
	 */
	function applyContextToStream()
	{
		$retval = false;

<<<<<<< HEAD
		if ($this->_fh) {
=======
		if ($this->_fh)
		{
>>>>>>> upstream/master
			// Capture PHP errors
			$php_errormsg = 'Unknown error setting context option';
			$track_errors = ini_get('track_errors');
			ini_set('track_errors', true);
			$retval = @stream_context_set_option($this->_fh, $this->_contextOptions);

<<<<<<< HEAD
			if (!$retval) {
=======
			if (!$retval)
			{
>>>>>>> upstream/master
				$this->setError($php_errormsg);
			}

			// restore error tracking to what it was before
<<<<<<< HEAD
			ini_set('track_errors',$track_errors);
=======
			ini_set('track_errors', $track_errors);
>>>>>>> upstream/master
		}

		return $retval;
	}

	/**
	 * Stream filters
	 * Append a filter to the chain
	 *
<<<<<<< HEAD
	 * @param   $filtername
	 * @param   $read_write
	 * @param   $params
	 *
	 * @return  mixed
	 *
	 * @see		http://php.net/manual/en/function.stream-filter-append.php
	 * @since   11.1
	 */
	function appendFilter($filtername, $read_write = STREAM_FILTER_READ, $params = array() )
	{
		$res = false;

		if ($this->_fh) {
=======
	 * @param   string   $filtername  The key name of the filter.
	 * @param   integer  $read_write  Optional. Defaults to STREAM_FILTER_READ.
	 * @param   array    $params      An array of params for the stream_filter_append call.
	 *
	 * @return  mixed
	 *
	 * @see     http://php.net/manual/en/function.stream-filter-append.php
	 * @since   11.1
	 */
	function appendFilter($filtername, $read_write = STREAM_FILTER_READ, $params = array())
	{
		$res = false;

		if ($this->_fh)
		{
>>>>>>> upstream/master
			// Capture PHP errors
			$php_errormsg = '';
			$track_errors = ini_get('track_errors');
			ini_set('track_errors', true);

			$res = @stream_filter_append($this->_fh, $filtername, $read_write, $params);

<<<<<<< HEAD
			if (!$res && $php_errormsg) {
				$this->setError($php_errormsg);
			}
			else {
=======
			if (!$res && $php_errormsg)
			{
				$this->setError($php_errormsg);
			}
			else
			{
>>>>>>> upstream/master
				$this->filters[] = &$res;
			}

			// Restore error tracking to what it was before.
<<<<<<< HEAD
			ini_set('track_errors',$track_errors);
=======
			ini_set('track_errors', $track_errors);
>>>>>>> upstream/master
		}

		return $res;
	}

	/**
	 * Prepend a filter to the chain
	 *
<<<<<<< HEAD
	 * @param   $filtername
	 * @param   $read_write
	 * @param   $params
	 *
	 * @return  mixed
	 *
	 * @see		http://php.net/manual/en/function.stream-filter-prepend.php
	 * @since   11.1
	 */
	function prependFilter($filtername, $read_write = STREAM_FILTER_READ, $params = array() )
	{
		$res = false;

		if ($this->_fh) {
=======
	 * @param   string   $filtername  The key name of the filter.
	 * @param   integer  $read_write  Optional. Defaults to STREAM_FILTER_READ.
	 * @param   array    $params      An array of params for the stream_filter_prepend call.
	 *
	 * @return  mixed
	 *
	 * @see     http://php.net/manual/en/function.stream-filter-prepend.php
	 * @since   11.1
	 */
	function prependFilter($filtername, $read_write = STREAM_FILTER_READ, $params = array())
	{
		$res = false;

		if ($this->_fh)
		{
>>>>>>> upstream/master
			// Capture PHP errors
			$php_errormsg = '';
			$track_errors = ini_get('track_errors');
			ini_set('track_errors', true);
			$res = @stream_filter_prepend($this->_fh, $filtername, $read_write, $params);

<<<<<<< HEAD
			if (!$res && $php_errormsg) {
				$this->setError($php_errormsg); // set the error msg
			}
			else {
				array_unshift($res,'');
				$res[0] =&$this->filters;
			}

			// Restore error tracking to what it was before.
			ini_set('track_errors',$track_errors);
=======
			if (!$res && $php_errormsg)
			{
				$this->setError($php_errormsg); // set the error msg
			}
			else
			{
				array_unshift($res, '');
				$res[0] = &$this->filters;
			}

			// Restore error tracking to what it was before.
			ini_set('track_errors', $track_errors);
>>>>>>> upstream/master
		}

		return $res;
	}

	/**
<<<<<<< HEAD
	 * Remove a filter, either by resource (handed out from the
	 * append or prepend function) or via getting the
	 * filter list)
	 *
	 * @param   resource  $resource
	 * @param   boolean   $byindex
=======
	 * Remove a filter, either by resource (handed out from the append or prepend function)
	 * or via getting the filter list)
	 *
	 * @param   resource  &$resource  The resource.
	 * @param   boolean   $byindex    The index of the filter.
>>>>>>> upstream/master
	 *
	 * @return  boolean   Result of operation
	 *
	 * @since   11.1
	 */
<<<<<<< HEAD
	function removeFilter(&$resource, $byindex=false)
=======
	function removeFilter(&$resource, $byindex = false)
>>>>>>> upstream/master
	{
		$res = false;
		// Capture PHP errors
		$php_errormsg = '';
		$track_errors = ini_get('track_errors');
		ini_set('track_errors', true);

<<<<<<< HEAD
		if ($byindex) {
			$res = stream_filter_remove($this->filters[$resource]);
		}
		else {
			$res = stream_filter_remove($resource);
		}

		if ($res && $php_errormsg) {
=======
		if ($byindex)
		{
			$res = stream_filter_remove($this->filters[$resource]);
		}
		else
		{
			$res = stream_filter_remove($resource);
		}

		if ($res && $php_errormsg)
		{
>>>>>>> upstream/master
			$this->setError($php_errormsg);
		}

		// Restore error tracking to what it was before.
<<<<<<< HEAD
		ini_set('track_errors',$track_errors);
=======
		ini_set('track_errors', $track_errors);
>>>>>>> upstream/master

		return $res;
	}

	/**
<<<<<<< HEAD
	 * Support operations (copy, move)
	 */

	/**
	 * Copy a file from src to dest
	 *
	 * @param	string	$src
	 * @param	string	$dest
	 * @param			$context
	 * @param	boolean	$user_prefix
	 * @param	boolean	$relative
	 *
	 * @return	mixed
	 *
	 * @since	11.1
	 */
	function copy($src, $dest, $context=null, $use_prefix=true, $relative=false)
=======
	 * Copy a file from src to dest
	 *
	 * @param   string    $src         The file path to copy from.
	 * @param   string    $dest        The file path to copy to.
	 * @param   resource  $context     A valid context resource (optional) created with stream_context_create.
	 * @param   boolean   $use_prefix  Controls the use of a prefix (optional).
	 * @param   boolean   $relative    Determines if the filename given is relative. Relative paths do not have JPATH_ROOT stripped.
	 *
	 * @return  mixed
	 *
	 * @since   11.1
	 */
	function copy($src, $dest, $context = null, $use_prefix = true, $relative = false)
>>>>>>> upstream/master
	{
		$res = false;

		// Capture PHP errors
		$php_errormsg = '';
		$track_errors = ini_get('track_errors');
		ini_set('track_errors', true);

		$chmodDest = $this->_getFilename($dest, 'w', $use_prefix, $relative);
		$exists = file_exists($dest);
		$context_support = version_compare(PHP_VERSION, '5.3', '>='); // 5.3 provides context support

<<<<<<< HEAD
		if ($exists && !$context_support) {
=======
		if ($exists && !$context_support)
		{
>>>>>>> upstream/master
			// The file exists and there is no context support.
			// This could cause a failure as we may need to overwrite the file.
			// So we write our own copy function that will work with a stream
			// context; php 5.3 will fix this for us (yay!).
			// Note: Since open processes the filename for us we won't worry about
			// calling _getFilename
			$res = $this->open($src);

<<<<<<< HEAD
			if ($res) {
				$reader = $this->_fh;
				$res = $this->open($dest, 'w');

				if ($res) {
=======
			if ($res)
			{
				$reader = $this->_fh;
				$res = $this->open($dest, 'w');

				if ($res)
				{
>>>>>>> upstream/master
					$res = stream_copy_to_stream($reader, $this->_fh);
					$tmperror = $php_errormsg; // save this in case fclose throws an error
					@fclose($reader);
					$php_errormsg = $tmperror; // restore after fclose
				}
<<<<<<< HEAD
				else {
=======
				else
				{
>>>>>>> upstream/master
					@fclose($reader); // close the reader off
					$php_errormsg = JText::sprintf('JLIB_FILESYSTEM_ERROR_STREAMS_FAILED_TO_OPEN_WRITER', $this->getError());
				}
			}
<<<<<<< HEAD
			else {
				if (!$php_errormsg) {
=======
			else
			{
				if (!$php_errormsg)
				{
>>>>>>> upstream/master
					$php_errormsg = JText::sprintf('JLIB_FILESYSTEM_ERROR_STREAMS_FAILED_TO_OPEN_READER', $this->getError());
				}
			}
		}
<<<<<<< HEAD
		else {
=======
		else
		{
>>>>>>> upstream/master
			// Since we're going to open the file directly we need to get the filename.
			// We need to use the same prefix so force everything to write.
			$src = $this->_getFilename($src, 'w', $use_prefix, $relative);
			$dest = $this->_getFilename($dest, 'w', $use_prefix, $relative);

<<<<<<< HEAD
			if ($context_support && $context) {
				// Use the provided context
				$res = @copy($src, $dest, $context);
			}
			else if ($context_support && $this->_context) {
				// Use the objects context
				$res = @copy($src, $dest, $this->_context);
			}
			else {
=======
			if ($context_support && $context)
			{
				// Use the provided context
				$res = @copy($src, $dest, $context);
			}
			else if ($context_support && $this->_context)
			{
				// Use the objects context
				$res = @copy($src, $dest, $this->_context);
			}
			else
			{
>>>>>>> upstream/master
				// Don't use any context
				$res = @copy($src, $dest);
			}
		}

<<<<<<< HEAD
		if (!$res && $php_errormsg) {
			$this->setError($php_errormsg);
		}
		else {
=======
		if (!$res && $php_errormsg)
		{
			$this->setError($php_errormsg);
		}
		else
		{
>>>>>>> upstream/master
			$this->chmod($chmodDest);
		}

		// Restore error tracking to what it was before
<<<<<<< HEAD
		ini_set('track_errors',$track_errors);
=======
		ini_set('track_errors', $track_errors);
>>>>>>> upstream/master

		return $res;
	}

	/**
	 * Moves a file
	 *
<<<<<<< HEAD
	 * @param   string   $src
	 * @param   string   $dest
	 * @param            $context
	 * @param   boolean  $user_prefix
	 * @param   boolean  $relative
=======
	 * @param   string    $src         The file path to move from.
	 * @param   string    $dest        The file path to move to.
	 * @param   resource  $context     A valid context resource (optional) created with stream_context_create.
	 * @param   boolean   $use_prefix  Controls the use of a prefix (optional).
	 * @param   boolean   $relative    Determines if the filename given is relative. Relative paths do not have JPATH_ROOT stripped.
>>>>>>> upstream/master
	 *
	 * @return  mixed
	 *
	 * @since   11.1
	 */
<<<<<<< HEAD
	function move($src, $dest, $context=null, $use_prefix=true, $relative=false)
=======
	function move($src, $dest, $context = null, $use_prefix = true, $relative = false)
>>>>>>> upstream/master
	{
		$res = false;

		// Capture PHP errors
		$php_errormsg = '';
		$track_errors = ini_get('track_errors');
		ini_set('track_errors', true);

		$src = $this->_getFilename($src, 'w', $use_prefix, $relative);
		$dest = $this->_getFilename($dest, 'w', $use_prefix, $relative);

<<<<<<< HEAD
		if ($context) {
			// Use the provided context
			$res = @rename($src, $dest, $context);
		}
		else if ($this->_context) {
			// Use the object's context
			$res = @rename($src, $dest, $this->_context);
		}
		else {
=======
		if ($context)
		{
			// Use the provided context
			$res = @rename($src, $dest, $context);
		}
		else if ($this->_context)
		{
			// Use the object's context
			$res = @rename($src, $dest, $this->_context);
		}
		else
		{
>>>>>>> upstream/master
			// Don't use any context
			$res = @rename($src, $dest);
		}

<<<<<<< HEAD
		if (!$res && $php_errormsg) {
=======
		if (!$res && $php_errormsg)
		{
>>>>>>> upstream/master
			$this->setError($php_errormsg());
		}

		$this->chmod($dest);

		// Restore error tracking to what it was before
<<<<<<< HEAD
		ini_set('track_errors',$track_errors);
=======
		ini_set('track_errors', $track_errors);
>>>>>>> upstream/master

		return $res;
	}

	/**
	 * Delete a file
	 *
<<<<<<< HEAD
	 * @param   string   $filename
	 * @param            $context
	 * @param   boolean  $user_prefix
	 * @param   boolean  $relative
=======
	 * @param   string    $filename    The file path to delete.
	 * @param   resource  $context     A valid context resource (optional) created with stream_context_create.
	 * @param   boolean   $use_prefix  Controls the use of a prefix (optional).
	 * @param   boolean   $relative    Determines if the filename given is relative. Relative paths do not have JPATH_ROOT stripped.
>>>>>>> upstream/master
	 *
	 * @return  mixed
	 *
	 * @since   11.1
	 */
<<<<<<< HEAD
	function delete($filename, $context=null, $use_prefix=true, $relative=false)
=======
	function delete($filename, $context = null, $use_prefix = true, $relative = false)
>>>>>>> upstream/master
	{
		$res = false;

		// Capture PHP errors
		$php_errormsg = '';
		$track_errors = ini_get('track_errors');
		ini_set('track_errors', true);

		$filename = $this->_getFilename($filename, 'w', $use_prefix, $relative);

<<<<<<< HEAD
		if ($context) {
			// Use the provided context
			$res = @unlink($filename, $context);
		}
		else if ($this->_context) {
			// Use the object's context
			$res = @unlink($filename, $this->_context);
		}
		else {
=======
		if ($context)
		{
			// Use the provided context
			$res = @unlink($filename, $context);
		}
		else if ($this->_context)
		{
			// Use the object's context
			$res = @unlink($filename, $this->_context);
		}
		else
		{
>>>>>>> upstream/master
			// Don't use any context
			$res = @unlink($filename);
		}

<<<<<<< HEAD
		if (!$res && $php_errormsg) {
=======
		if (!$res && $php_errormsg)
		{
>>>>>>> upstream/master
			$this->setError($php_errormsg());
		}

		// Restore error tracking to what it was before.
<<<<<<< HEAD
		ini_set('track_errors',$track_errors);
=======
		ini_set('track_errors', $track_errors);
>>>>>>> upstream/master

		return $res;
	}

	/**
	 * Upload a file
	 *
<<<<<<< HEAD
	 * @param   string   $src
	 * @param   string   $dest
	 * @param            $context
	 * @param   boolean  $user_prefix
	 * @param   boolean  $relative
=======
	 * @param   string    $src         The file path to copy from (usually a temp folder).
	 * @param   string    $dest        The file path to copy to.
	 * @param   resource  $context     A valid context resource (optional) created with stream_context_create.
	 * @param   boolean   $use_prefix  Controls the use of a prefix (optional).
	 * @param   boolean   $relative    Determines if the filename given is relative. Relative paths do not have JPATH_ROOT stripped.
>>>>>>> upstream/master
	 *
	 * @return  mixed
	 *
	 * @since   11.1
	 */
<<<<<<< HEAD
	function upload($src, $dest, $context=null, $use_prefix=true, $relative=false)
	{
		if (is_uploaded_file($src)) {
			// Make sure it's an uploaded file
			return $this->copy($src, $dest, $context, $use_prefix, $relative);
		}
		else {
=======
	function upload($src, $dest, $context = null, $use_prefix = true, $relative = false)
	{
		if (is_uploaded_file($src))
		{
			// Make sure it's an uploaded file
			return $this->copy($src, $dest, $context, $use_prefix, $relative);
		}
		else
		{
>>>>>>> upstream/master
			$this->setError(JText::_('JLIB_FILESYSTEM_ERROR_STREAMS_NOT_UPLOADED_FILE'));

			return false;
		}
	}
<<<<<<< HEAD
	/**
	 * All in one
	 * Writes a chunk of data to a file
	 *
	 * @param   $filename
	 * @param   $buffer
=======

	/**
	 * Writes a chunk of data to a file.
	 *
	 * @param   string  $filename  The file name.
	 * @param   string  &$buffer   The data to write to the file.
>>>>>>> upstream/master
	 *
	 * @return  boolean
	 *
	 * @since   11.1
	 */
	function writeFile($filename, &$buffer)
	{
<<<<<<< HEAD
		if ($this->open($filename, 'w')) {
=======
		if ($this->open($filename, 'w'))
		{
>>>>>>> upstream/master
			$result = $this->write($buffer);
			$this->chmod();
			$this->close();

			return $result;
		}

		return false;
	}

	/**
	 * Determine the appropriate 'filename' of a file
	 *
	 * @param   string   $filename    Original filename of the file
	 * @param   string   $mode        Mode string to retrieve the filename
	 * @param   boolean  $use_prefix  Controls the use of a prefix
	 * @param   boolean  $relative    Determines if the filename given is relative. Relative paths do not have JPATH_ROOT stripped.
	 *
	 * @return  string
	 *
	 * @since   11.1
	 */
	function _getFilename($filename, $mode, $use_prefix, $relative)
	{
<<<<<<< HEAD
		if ($use_prefix) {
			// Get rid of binary or t, should be at the end of the string
			$tmode = trim($mode,'btf123456789');

			// Check if it's a write mode then add the appropriate prefix
			// Get rid of JPATH_ROOT (legacy compat) along the way
			if (in_array($tmode, JFilesystemHelper::getWriteModes())) {
				if (!$relative && $this->writeprefix) {
=======
		if ($use_prefix)
		{
			// Get rid of binary or t, should be at the end of the string
			$tmode = trim($mode, 'btf123456789');

			// Check if it's a write mode then add the appropriate prefix
			// Get rid of JPATH_ROOT (legacy compat) along the way
			if (in_array($tmode, JFilesystemHelper::getWriteModes()))
			{
				if (!$relative && $this->writeprefix)
				{
>>>>>>> upstream/master
					$filename = str_replace(JPATH_ROOT, '', $filename);
				}

				$filename = $this->writeprefix . $filename;
			}
<<<<<<< HEAD
			else {
				if (!$relative && $this->readprefix) {
=======
			else
			{
				if (!$relative && $this->readprefix)
				{
>>>>>>> upstream/master
					$filename = str_replace(JPATH_ROOT, '', $filename);
				}

				$filename = $this->readprefix . $filename;
			}
		}

		return $filename;
	}

	/**
	 * Return the internal file handle
	 *
	 * @return  File handler
	 *
	 * @since   11.1
	 */
	function getFileHandle()
	{
		return $this->_fh;
	}
}
