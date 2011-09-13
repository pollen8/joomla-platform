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

/**
 * ZIP format adapter for the JArchive class
 *
 * The ZIP compression code is partially based on code from:
<<<<<<< HEAD
 *	Eric Mueller <eric@themepark.com>
 *	http://www.zend.com/codex.php?id=535&single=1
 *
 *	Deins125 <webmaster@atlant.ru>
 *	http://www.zend.com/codex.php?id=470&single=1
 *
 * The ZIP compression date code is partially based on code from
 *	Peter Listiak <mlady@users.sourceforge.net>
=======
 * Eric Mueller <eric@themepark.com>
 * http://www.zend.com/codex.php?id=535&single=1
 *
 * Deins125 <webmaster@atlant.ru>
 * http://www.zend.com/codex.php?id=470&single=1
 *
 * The ZIP compression date code is partially based on code from
 * Peter Listiak <mlady@users.sourceforge.net>
>>>>>>> upstream/master
 *
 * This class is inspired from and draws heavily in code and concept from the Compress package of
 * The Horde Project <http://www.horde.org>
 *
 * @contributor  Chuck Hagenbuch <chuck@horde.org>
 * @contributor  Michael Slusarz <slusarz@horde.org>
 * @contributor  Michael Cochrane <mike@graftonhall.co.nz>
 *
 * @package     Joomla.Platform
 * @subpackage  FileSystem
 * @since       11.1
 */
class JArchiveZip extends JObject
{
	/**
	 * ZIP compression methods.
<<<<<<< HEAD
	 * @var array
	 */
	var $_methods = array (
		0x0 => 'None',
		0x1 => 'Shrunk',
		0x2 => 'Super Fast',
		0x3 => 'Fast',
		0x4 => 'Normal',
		0x5 => 'Maximum',
		0x6 => 'Imploded',
		0x8 => 'Deflated'
	);

	/**
	 * Beginning of central directory record.
	 * @var string
=======
	 *
	 * @var    array
	 * @since  11.1
	 */
	var $_methods = array(0x0 => 'None', 0x1 => 'Shrunk', 0x2 => 'Super Fast', 0x3 => 'Fast', 0x4 => 'Normal', 0x5 => 'Maximum', 0x6 => 'Imploded',
		0x8 => 'Deflated');

	/**
	 * Beginning of central directory record.
	 *
	 * @var    string
	 * @since  11.1
>>>>>>> upstream/master
	 */
	var $_ctrlDirHeader = "\x50\x4b\x01\x02";

	/**
	 * End of central directory record.
<<<<<<< HEAD
	 * @var string
=======
	 *
	 * @var    string
	 * @since  11.1
>>>>>>> upstream/master
	 */
	var $_ctrlDirEnd = "\x50\x4b\x05\x06\x00\x00\x00\x00";

	/**
	 * Beginning of file contents.
<<<<<<< HEAD
	 * @var string
=======
	 *
	 * @var    string
	 * @since  11.1
>>>>>>> upstream/master
	 */
	var $_fileHeader = "\x50\x4b\x03\x04";

	/**
	 * ZIP file data buffer
<<<<<<< HEAD
	 * @var string
=======
	 *
	 * @var    string
	 * @since  11.1
>>>>>>> upstream/master
	 */
	var $_data = null;

	/**
	 * ZIP file metadata array
<<<<<<< HEAD
	 * @var array
=======
	 *
	 * @var    array
	 * @since  11.1
>>>>>>> upstream/master
	 */
	var $_metadata = null;

	/**
	 * Create a ZIP compressed file from an array of file data.
	 *
<<<<<<< HEAD
	 * @param   string   $archive	Path to save archive.
	 * @param   array    $files		Array of files to add to archive.
	 * @param   array    $options	Compression options (unused).
	 *
	 * @return  boolean  True if successful.
	 * @since   11.1
	 * @todo	Finish Implementation
	 */
	public function create($archive, $files, $options = array ())
	{
		// Initialise variables.
		$contents = array();
		$ctrldir  = array();
=======
	 * @param   string  $archive  Path to save archive.
	 * @param   array   $files    Array of files to add to archive.
	 * @param   array   $options  Compression options (unused).
	 *
	 * @return  boolean  True if successful.
	 *
	 * @since   11.1
	 *
	 * @todo    Finish Implementation
	 */
	public function create($archive, $files, $options = array())
	{
		// Initialise variables.
		$contents = array();
		$ctrldir = array();
>>>>>>> upstream/master

		foreach ($files as $file)
		{
			$this->_addToZIPFile($file, $contents, $ctrldir);
		}

		return $this->_createZIPFile($contents, $ctrldir, $archive);
	}

	/**
	 * Extract a ZIP compressed file to a given path
	 *
<<<<<<< HEAD
	 * @param   string   $archive		Path to ZIP archive to extract
	 * @param   string   $destination	Path to extract archive into
	 * @param   array    $options		Extraction options [unused]
	 *
	 * @return  boolean  True if successful
	 * @since   11.1
	 */
	public function extract($archive, $destination, $options = array ())
	{
		if (! is_file($archive)) {
=======
	 * @param   string  $archive      Path to ZIP archive to extract
	 * @param   string  $destination  Path to extract archive into
	 * @param   array   $options      Extraction options [unused]
	 *
	 * @return  boolean  True if successful
	 *
	 * @since   11.1
	 */
	public function extract($archive, $destination, $options = array())
	{
		if (!is_file($archive))
		{
>>>>>>> upstream/master
			$this->set('error.message', 'Archive does not exist');

			return false;
		}

<<<<<<< HEAD
		if ($this->hasNativeSupport()) {
			return ($this->_extractNative($archive, $destination, $options))? true : JError::raiseWarning(100, $this->get('error.message'));
		}
		else {
			return ($this->_extract($archive, $destination, $options))? true : JError::raiseWarning(100, $this->get('error.message'));
=======
		if ($this->hasNativeSupport())
		{
			return ($this->_extractNative($archive, $destination, $options)) ? true : JError::raiseWarning(100, $this->get('error.message'));
		}
		else
		{
			return ($this->_extract($archive, $destination, $options)) ? true : JError::raiseWarning(100, $this->get('error.message'));
>>>>>>> upstream/master
		}
	}

	/**
	 * Method to determine if the server has native zip support for faster handling
	 *
	 * @return  boolean  True if php has native ZIP support
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function hasNativeSupport()
	{
		return (function_exists('zip_open') && function_exists('zip_read'));
	}

	/**
	 * Checks to see if the data is a valid ZIP file.
	 *
<<<<<<< HEAD
	 * @param   string  &$data	ZIP archive data buffer.
	 *
	 * @return  boolean  True if valid, false if invalid.
=======
	 * @param   string  &$data  ZIP archive data buffer.
	 *
	 * @return  boolean  True if valid, false if invalid.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function checkZipData(&$data)
	{
<<<<<<< HEAD
		if (strpos($data, $this->_fileHeader) === false) {
			return false;
		}
		else {
=======
		if (strpos($data, $this->_fileHeader) === false)
		{
			return false;
		}
		else
		{
>>>>>>> upstream/master
			return true;
		}
	}

	/**
	 * Extract a ZIP compressed file to a given path using a php based algorithm that only requires zlib support
	 *
<<<<<<< HEAD
	 * @param   string   $archive		Path to ZIP archive to extract.
	 * @param   string   $destination	Path to extract archive into.
	 * @param   array    $options		Extraction options [unused].
	 *
	 * @return  boolean  True if successful
=======
	 * @param   string  $archive      Path to ZIP archive to extract.
	 * @param   string  $destination  Path to extract archive into.
	 * @param   array   $options      Extraction options [unused].
	 *
	 * @return  boolean  True if successful
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function _extract($archive, $destination, $options)
	{
		// Initialise variables.
		$this->_data = null;
		$this->_metadata = null;

<<<<<<< HEAD
		if (!extension_loaded('zlib')) {
=======
		if (!extension_loaded('zlib'))
		{
>>>>>>> upstream/master
			$this->set('error.message', JText::_('JLIB_FILESYSTEM_ZIP_NOT_SUPPORTED'));

			return false;
		}

<<<<<<< HEAD
		if (!$this->_data = JFile::read($archive)) {
=======
		if (!$this->_data = JFile::read($archive))
		{
>>>>>>> upstream/master
			$this->set('error.message', JText::_('JLIB_FILESYSTEM_ZIP_UNABLE_TO_READ'));

			return false;
		}

<<<<<<< HEAD
		if (!$this->_getZipInfo($this->_data)) {
=======
		if (!$this->_getZipInfo($this->_data))
		{
>>>>>>> upstream/master
			$this->set('error.message', JText::_('JLIB_FILESYSTEM_ZIP_INFO_FAILED'));

			return false;
		}

<<<<<<< HEAD
		for ($i = 0, $n = count($this->_metadata); $i < $n;$i++)
		{
			$lastPathCharacter = substr($this->_metadata[$i]['name'], -1, 1);

			if ($lastPathCharacter !== '/' && $lastPathCharacter !== '\\') {
				$buffer = $this->_getFileData($i);
				$path = JPath::clean($destination.DS.$this->_metadata[$i]['name']);

				// Make sure the destination folder exists
				if (!JFolder::create(dirname($path))) {
=======
		for ($i = 0, $n = count($this->_metadata); $i < $n; $i++)
		{
			$lastPathCharacter = substr($this->_metadata[$i]['name'], -1, 1);

			if ($lastPathCharacter !== '/' && $lastPathCharacter !== '\\')
			{
				$buffer = $this->_getFileData($i);
				$path = JPath::clean($destination . '/' . $this->_metadata[$i]['name']);

				// Make sure the destination folder exists
				if (!JFolder::create(dirname($path)))
				{
>>>>>>> upstream/master
					$this->set('error.message', JText::_('JLIB_FILESYSTEM_ZIP_UNABLE_TO_CREATE_DESTINATION'));

					return false;
				}

<<<<<<< HEAD
				if (JFile::write($path, $buffer) === false) {
=======
				if (JFile::write($path, $buffer) === false)
				{
>>>>>>> upstream/master
					$this->set('error.message', JText::_('JLIB_FILESYSTEM_ZIP_UNABLE_TO_WRITE_ENTRY'));

					return false;
				}
			}
		}

		return true;
	}

	/**
	 * Extract a ZIP compressed file to a given path using native php api calls for speed
	 *
<<<<<<< HEAD
	 * @param   string   $archive		Path to ZIP archive to extract
	 * @param   string   $destination	Path to extract archive into
	 * @param   array    $options		Extraction options [unused]
	 *
	 * @return  boolean  True if successful
=======
	 * @param   string  $archive      Path to ZIP archive to extract
	 * @param   string  $destination  Path to extract archive into
	 * @param   array   $options      Extraction options [unused]
	 *
	 * @return  boolean  True if successful
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function _extractNative($archive, $destination, $options)
	{
<<<<<<< HEAD
		if ($zip = zip_open($archive)) {
			if (is_resource($zip)) {
				// Make sure the destination folder exists
				if (!JFolder::create($destination)) {
=======
		if ($zip = zip_open($archive))
		{
			if (is_resource($zip))
			{
				// Make sure the destination folder exists
				if (!JFolder::create($destination))
				{
>>>>>>> upstream/master
					$this->set('error.message', 'Unable to create destination');
					return false;
				}

				// Read files in the archive
				while ($file = @zip_read($zip))
				{
<<<<<<< HEAD
					if (zip_entry_open($zip, $file, "r")) {
						if (substr(zip_entry_name($file), strlen(zip_entry_name($file)) - 1) != "/") {
							$buffer = zip_entry_read($file, zip_entry_filesize($file));

							if (JFile::write($destination.DS.zip_entry_name($file), $buffer) === false) {
=======
					if (zip_entry_open($zip, $file, "r"))
					{
						if (substr(zip_entry_name($file), strlen(zip_entry_name($file)) - 1) != "/")
						{
							$buffer = zip_entry_read($file, zip_entry_filesize($file));

							if (JFile::write($destination . '/' . zip_entry_name($file), $buffer) === false)
							{
>>>>>>> upstream/master
								$this->set('error.message', 'Unable to write entry');
								return false;
							}

							zip_entry_close($file);
						}
					}
<<<<<<< HEAD
					else {
=======
					else
					{
>>>>>>> upstream/master
						$this->set('error.message', JText::_('JLIB_FILESYSTEM_ZIP_UNABLE_TO_READ_ENTRY'));

						return false;
					}
				}

				@zip_close($zip);
			}
		}
<<<<<<< HEAD
		else {
=======
		else
		{
>>>>>>> upstream/master
			$this->set('error.message', JText::_('JLIB_FILESYSTEM_ZIP_UNABLE_TO_OPEN_ARCHIVE'));

			return false;
		}

		return true;
	}

	/**
	 * Get the list of files/data from a ZIP archive buffer.
	 *
	 * <pre>
	 * KEY: Position in zipfile
<<<<<<< HEAD
	 * VALUES: 'attr'	--  File attributes
	 *		'crc'	--  CRC checksum
	 *		'csize'	--  Compressed file size
	 *		'date'	--  File modification time
	 *		'name'	--  Filename
	 *		'method'  --  Compression method
	 *		'size'	--  Original file size
	 *		'type'	--  File type
	 * </pre>
	 *
	 * @param   string  &$data	The ZIP archive buffer.
	 *
	 * @return  array  Archive metadata array.
=======
	 * VALUES: 'attr'  --  File attributes
	 * 'crc'   --  CRC checksum
	 * 'csize' --  Compressed file size
	 * 'date'  --  File modification time
	 * 'name'  --  Filename
	 * 'method'--  Compression method
	 * 'size'  --  Original file size
	 * 'type'  --  File type
	 * </pre>
	 *
	 * @param   string  &$data  The ZIP archive buffer.
	 *
	 * @return  boolean  True on success.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function _getZipInfo(&$data)
	{
		// Initialise variables.
<<<<<<< HEAD
		$entries = array ();
=======
		$entries = array();
>>>>>>> upstream/master

		// Find the last central directory header entry
		$fhLast = strpos($data, $this->_ctrlDirEnd);

		do
		{
			$last = $fhLast;
		}
<<<<<<< HEAD
		while (($fhLast = strpos($data, $this->_ctrlDirEnd, $fhLast+1)) !== false);
=======
		while (($fhLast = strpos($data, $this->_ctrlDirEnd, $fhLast + 1)) !== false);
>>>>>>> upstream/master

		// Find the central directory offset
		$offset = 0;

<<<<<<< HEAD
		if ($last) {
			$endOfCentralDirectory = unpack('vNumberOfDisk/vNoOfDiskWithStartOfCentralDirectory/vNoOfCentralDirectoryEntriesOnDisk/vTotalCentralDirectoryEntries/VSizeOfCentralDirectory/VCentralDirectoryOffset/vCommentLength', substr($data, $last+4));
			$offset	= $endOfCentralDirectory['CentralDirectoryOffset'];
		}

		// Get details from Central directory structure.
=======
		if ($last)
		{
			$endOfCentralDirectory = unpack(
				'vNumberOfDisk/vNoOfDiskWithStartOfCentralDirectory/vNoOfCentralDirectoryEntriesOnDisk/' .
				'vTotalCentralDirectoryEntries/VSizeOfCentralDirectory/VCentralDirectoryOffset/vCommentLength',
				substr($data, $last + 4)
			);
			$offset = $endOfCentralDirectory['CentralDirectoryOffset'];
		}

		// Get details from central directory structure.
>>>>>>> upstream/master
		$fhStart = strpos($data, $this->_ctrlDirHeader, $offset);
		$dataLength = strlen($data);

		do
		{
<<<<<<< HEAD
			if ($dataLength < $fhStart +31) {
=======
			if ($dataLength < $fhStart + 31)
			{
>>>>>>> upstream/master
				$this->set('error.message', JText::_('JLIB_FILESYSTEM_ZIP_INVALID_ZIP_DATA'));

				return false;
			}

<<<<<<< HEAD
			$info = unpack('vMethod/VTime/VCRC32/VCompressed/VUncompressed/vLength', substr($data, $fhStart +10, 20));
			$name = substr($data, $fhStart +46, $info['Length']);

			$entries[$name] = array('attr' => null, 'crc' => sprintf("%08s", dechex($info['CRC32'])), 'csize' => $info['Compressed'], 'date' => null, '_dataStart' => null, 'name' => $name, 'method' => $this->_methods[$info['Method']], '_method' => $info['Method'], 'size' => $info['Uncompressed'], 'type' => null);
			$entries[$name]['date'] = mktime((($info['Time'] >> 11) & 0x1f), (($info['Time'] >> 5) & 0x3f), (($info['Time'] << 1) & 0x3e), (($info['Time'] >> 21) & 0x07), (($info['Time'] >> 16) & 0x1f), ((($info['Time'] >> 25) & 0x7f) + 1980));

			if ($dataLength < $fhStart +43) {
=======
			$info = unpack('vMethod/VTime/VCRC32/VCompressed/VUncompressed/vLength', substr($data, $fhStart + 10, 20));
			$name = substr($data, $fhStart + 46, $info['Length']);

			$entries[$name] = array(
				'attr' => null,
				'crc' => sprintf("%08s", dechex($info['CRC32'])),
				'csize' => $info['Compressed'],
				'date' => null,
				'_dataStart' => null,
				'name' => $name,
				'method' => $this->_methods[$info['Method']],
				'_method' => $info['Method'],
				'size' => $info['Uncompressed'],
				'type' => null
			);

			$entries[$name]['date'] = mktime(
				(($info['Time'] >> 11) & 0x1f),
				(($info['Time'] >> 5) & 0x3f),
				(($info['Time'] << 1) & 0x3e),
				(($info['Time'] >> 21) & 0x07),
				(($info['Time'] >> 16) & 0x1f),
				((($info['Time'] >> 25) & 0x7f) + 1980)
			);

			if ($dataLength < $fhStart + 43)
			{
>>>>>>> upstream/master
				$this->set('error.message', 'Invalid ZIP data');
				return false;
			}

<<<<<<< HEAD
			$info = unpack('vInternal/VExternal/VOffset', substr($data, $fhStart +36, 10));

			$entries[$name]['type'] = ($info['Internal'] & 0x01) ? 'text' : 'binary';
			$entries[$name]['attr'] = (($info['External'] & 0x10) ? 'D' : '-') .
									(($info['External'] & 0x20) ? 'A' : '-') .
									(($info['External'] & 0x03) ? 'S' : '-') .
									(($info['External'] & 0x02) ? 'H' : '-') .
									(($info['External'] & 0x01) ? 'R' : '-');
=======
			$info = unpack('vInternal/VExternal/VOffset', substr($data, $fhStart + 36, 10));

			$entries[$name]['type'] = ($info['Internal'] & 0x01) ? 'text' : 'binary';
			$entries[$name]['attr'] = (($info['External'] & 0x10) ? 'D' : '-') . (($info['External'] & 0x20) ? 'A' : '-')
				. (($info['External'] & 0x03) ? 'S' : '-') . (($info['External'] & 0x02) ? 'H' : '-') . (($info['External'] & 0x01) ? 'R' : '-');
>>>>>>> upstream/master
			$entries[$name]['offset'] = $info['Offset'];

			// Get details from local file header since we have the offset
			$lfhStart = strpos($data, $this->_fileHeader, $entries[$name]['offset']);

<<<<<<< HEAD
			if ($dataLength < $lfhStart +34) {
=======
			if ($dataLength < $lfhStart + 34)
			{
>>>>>>> upstream/master
				$this->set('error.message', 'Invalid ZIP data');

				return false;
			}

<<<<<<< HEAD
			$info = unpack('vMethod/VTime/VCRC32/VCompressed/VUncompressed/vLength/vExtraLength', substr($data, $lfhStart +8, 25));
			$name = substr($data, $lfhStart +30, $info['Length']);
			$entries[$name]['_dataStart'] = $lfhStart +30 + $info['Length'] + $info['ExtraLength'];
		}
		while ((($fhStart = strpos($data, $this->_ctrlDirHeader, $fhStart +46)) !== false));
=======
			$info = unpack('vMethod/VTime/VCRC32/VCompressed/VUncompressed/vLength/vExtraLength', substr($data, $lfhStart + 8, 25));
			$name = substr($data, $lfhStart + 30, $info['Length']);
			$entries[$name]['_dataStart'] = $lfhStart + 30 + $info['Length'] + $info['ExtraLength'];

			// Bump the max execution time because not using the built in php zip libs makes this process slow.
			@set_time_limit(ini_get('max_execution_time'));
		}
		while ((($fhStart = strpos($data, $this->_ctrlDirHeader, $fhStart + 46)) !== false));
>>>>>>> upstream/master

		$this->_metadata = array_values($entries);

		return true;
	}

	/**
	 * Returns the file data for a file by offsest in the ZIP archive
	 *
<<<<<<< HEAD
	 * @param   integer  $key	The position of the file in the archive.
	 *
	 * @return  string  Uncompressed file data buffer.
=======
	 * @param   integer  $key  The position of the file in the archive.
	 *
	 * @return  string  Uncompressed file data buffer.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function _getFileData($key)
	{
<<<<<<< HEAD
		if ($this->_metadata[$key]['_method'] == 0x8) {
			return gzinflate(substr($this->_data, $this->_metadata[$key]['_dataStart'], $this->_metadata[$key]['csize']));
		}
		elseif ($this->_metadata[$key]['_method'] == 0x0) {
			/* Files that aren't compressed. */
			return substr($this->_data, $this->_metadata[$key]['_dataStart'], $this->_metadata[$key]['csize']);
		}
		elseif ($this->_metadata[$key]['_method'] == 0x12) {
			// Is bz2 extension loaded?  If not try to load it
			if (!extension_loaded('bz2')) {
				if (JPATH_ISWIN) {
					@ dl('php_bz2.dll');
				}
				else {
					@ dl('bz2.so');
=======
		if ($this->_metadata[$key]['_method'] == 0x8)
		{
			return gzinflate(substr($this->_data, $this->_metadata[$key]['_dataStart'], $this->_metadata[$key]['csize']));
		}
		elseif ($this->_metadata[$key]['_method'] == 0x0)
		{
			/* Files that aren't compressed. */
			return substr($this->_data, $this->_metadata[$key]['_dataStart'], $this->_metadata[$key]['csize']);
		}
		elseif ($this->_metadata[$key]['_method'] == 0x12)
		{
			// Is bz2 extension loaded?  If not try to load it
			if (!extension_loaded('bz2'))
			{
				if (JPATH_ISWIN)
				{
					@dl('php_bz2.dll');
				}
				else
				{
					@dl('bz2.so');
>>>>>>> upstream/master
				}
			}

			// If bz2 extention is sucessfully loaded use it
<<<<<<< HEAD
			if (extension_loaded('bz2')) {
=======
			if (extension_loaded('bz2'))
			{
>>>>>>> upstream/master
				return bzdecompress(substr($this->_data, $this->_metadata[$key]['_dataStart'], $this->_metadata[$key]['csize']));
			}
		}

		return '';
	}

	/**
	 * Converts a UNIX timestamp to a 4-byte DOS date and time format
	 * (date in high 2-bytes, time in low 2-bytes allowing magnitude
	 * comparison).
	 *
<<<<<<< HEAD
	 * @param    integer  $unixtime	The current UNIX timestamp.
	 *
	 * @return  integer  The current date in a 4-byte DOS format.
=======
	 * @param   integer  $unixtime  The current UNIX timestamp.
	 *
	 * @return  integer  The current date in a 4-byte DOS format.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function _unix2DOSTime($unixtime = null)
	{
		$timearray = (is_null($unixtime)) ? getdate() : getdate($unixtime);

<<<<<<< HEAD
		if ($timearray['year'] < 1980) {
=======
		if ($timearray['year'] < 1980)
		{
>>>>>>> upstream/master
			$timearray['year'] = 1980;
			$timearray['mon'] = 1;
			$timearray['mday'] = 1;
			$timearray['hours'] = 0;
			$timearray['minutes'] = 0;
			$timearray['seconds'] = 0;
		}

<<<<<<< HEAD
		return (($timearray['year'] - 1980) << 25) | ($timearray['mon'] << 21) | ($timearray['mday'] << 16) | ($timearray['hours'] << 11) | ($timearray['minutes'] << 5) | ($timearray['seconds'] >> 1);
=======
		return (($timearray['year'] - 1980) << 25) | ($timearray['mon'] << 21) | ($timearray['mday'] << 16) | ($timearray['hours'] << 11)
			| ($timearray['minutes'] << 5) | ($timearray['seconds'] >> 1);
>>>>>>> upstream/master
	}

	/**
	 * Adds a "file" to the ZIP archive.
	 *
<<<<<<< HEAD
	 * @param   array  &$file		File data array to add
	 * @param   array  &$contents	An array of existing zipped files.
	 * @param   array  &$ctrldir	An array of central directory information.
	 *
	 * @return  void
	 * @since   11.1
	 * @todo	Review and finish implementation
	 */
	protected function _addToZIPFile(&$file, &$contents, &$ctrldir)
	{
		$data = & $file['data'];
=======
	 * @param   array  &$file      File data array to add
	 * @param   array  &$contents  An array of existing zipped files.
	 * @param   array  &$ctrldir   An array of central directory information.
	 *
	 * @return  void
	 *
	 * @since   11.1
	 *
	 * @todo    Review and finish implementation
	 */
	protected function _addToZIPFile(&$file, &$contents, &$ctrldir)
	{
		$data = &$file['data'];
>>>>>>> upstream/master
		$name = str_replace('\\', '/', $file['name']);

		/* See if time/date information has been provided. */
		$ftime = null;
<<<<<<< HEAD
		if (isset ($file['time'])) {
			$ftime = $file['time'];
		}

		/* Get the hex time. */
		$dtime = dechex($this->_unix2DosTime($ftime));
		$hexdtime = chr(hexdec($dtime[6] . $dtime[7])) .
		chr(hexdec($dtime[4] . $dtime[5])) .
		chr(hexdec($dtime[2] . $dtime[3])) .
		chr(hexdec($dtime[0] . $dtime[1]));
=======
		if (isset($file['time']))
		{
			$ftime = $file['time'];
		}

		// Get the hex time.
		$dtime = dechex($this->_unix2DosTime($ftime));
		$hexdtime = chr(hexdec($dtime[6] . $dtime[7])) . chr(hexdec($dtime[4] . $dtime[5])) . chr(hexdec($dtime[2] . $dtime[3]))
			. chr(hexdec($dtime[0] . $dtime[1]));
>>>>>>> upstream/master

		/* Begin creating the ZIP data. */
		$fr = $this->_fileHeader;
		/* Version needed to extract. */
		$fr .= "\x14\x00";
		/* General purpose bit flag. */
		$fr .= "\x00\x00";
		/* Compression method. */
		$fr .= "\x08\x00";
		/* Last modification time/date. */
		$fr .= $hexdtime;

		/* "Local file header" segment. */
		$unc_len = strlen($data);
		$crc = crc32($data);
		$zdata = gzcompress($data);
		$zdata = substr(substr($zdata, 0, strlen($zdata) - 4), 2);
		$c_len = strlen($zdata);

		/* CRC 32 information. */
		$fr .= pack('V', $crc);
		/* Compressed filesize. */
		$fr .= pack('V', $c_len);
		/* Uncompressed filesize. */
		$fr .= pack('V', $unc_len);
		/* Length of filename. */
		$fr .= pack('v', strlen($name));
		/* Extra field length. */
		$fr .= pack('v', 0);
		/* File name. */
		$fr .= $name;

		/* "File data" segment. */
		$fr .= $zdata;

		/* Add this entry to array. */
		$old_offset = strlen(implode('', $contents));
<<<<<<< HEAD
		$contents[] = & $fr;
=======
		$contents[] = &$fr;
>>>>>>> upstream/master

		/* Add to central directory record. */
		$cdrec = $this->_ctrlDirHeader;
		/* Version made by. */
		$cdrec .= "\x00\x00";
		/* Version needed to extract */
		$cdrec .= "\x14\x00";
		/* General purpose bit flag */
		$cdrec .= "\x00\x00";
		/* Compression method */
		$cdrec .= "\x08\x00";
		/* Last mod time/date. */
		$cdrec .= $hexdtime;
		/* CRC 32 information. */
		$cdrec .= pack('V', $crc);
		/* Compressed filesize. */
		$cdrec .= pack('V', $c_len);
		/* Uncompressed filesize. */
		$cdrec .= pack('V', $unc_len);
		/* Length of filename. */
		$cdrec .= pack('v', strlen($name));
		/* Extra field length. */
		$cdrec .= pack('v', 0);
		/* File comment length. */
		$cdrec .= pack('v', 0);
		/* Disk number start. */
		$cdrec .= pack('v', 0);
		/* Internal file attributes. */
		$cdrec .= pack('v', 0);
<<<<<<< HEAD
		 /* External file attributes -'archive' bit set. */
=======
		/* External file attributes -'archive' bit set. */
>>>>>>> upstream/master
		$cdrec .= pack('V', 32);
		/* Relative offset of local header. */
		$cdrec .= pack('V', $old_offset);
		/* File name. */
		$cdrec .= $name;
		/* Optional extra field, file comment goes here. */

		/* Save to central directory array. */
<<<<<<< HEAD
		$ctrldir[] = & $cdrec;
=======
		$ctrldir[] = &$cdrec;
>>>>>>> upstream/master
	}

	/**
	 * Creates the ZIP file.
	 *
	 * Official ZIP file format: http://www.pkware.com/appnote.txt
	 *
<<<<<<< HEAD
	 * @param   array   &$contents	An array of existing zipped files.
	 * @param   array   &$ctrlDir	An array of central directory information.
	 * @param   string  $path		The path to store the archive.
	 *
	 * @return  boolean  True if successful
	 * @since   11.1
=======
	 * @param   array   &$contents  An array of existing zipped files.
	 * @param   array   &$ctrlDir   An array of central directory information.
	 * @param   string  $path       The path to store the archive.
	 *
	 * @return  boolean  True if successful
	 *
	 * @since   11.1
	 *
>>>>>>> upstream/master
	 * @todo	Review and finish implementation
	 */
	protected function _createZIPFile(&$contents, &$ctrlDir, $path)
	{
		$data = implode('', $contents);
		$dir = implode('', $ctrlDir);

<<<<<<< HEAD
		$buffer = $data . $dir . $this->_ctrlDirEnd .
		/* Total # of entries "on this disk". */
		pack('v', count($ctrlDir)) .
		/* Total # of entries overall. */
		pack('v', count($ctrlDir)) .
		/* Size of central directory. */
		pack('V', strlen($dir)) .
		/* Offset to start of central dir. */
		pack('V', strlen($data)) .
		/* ZIP file comment length. */
		"\x00\x00";

		if (JFile::write($path, $buffer) === false) {
			return false;
		}
		else {
			return true;
		}
	}
}
=======
		$buffer = $data . $dir . $this->_ctrlDirEnd . /* Total # of entries "on this disk". */
			pack('v', count($ctrlDir)) . /* Total # of entries overall. */
			pack('v', count($ctrlDir)) . /* Size of central directory. */
			pack('V', strlen($dir)) . /* Offset to start of central dir. */
			pack('V', strlen($data)) . /* ZIP file comment length. */
			"\x00\x00";

		if (JFile::write($path, $buffer) === false)
		{
			return false;
		}
		else
		{
			return true;
		}
	}
}
>>>>>>> upstream/master
