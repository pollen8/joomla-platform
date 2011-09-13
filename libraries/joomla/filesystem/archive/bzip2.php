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

jimport('joomla.filesystem.stream');

/**
 * Bzip2 format adapter for the JArchive class
 *
 * @package     Joomla.Platform
 * @subpackage  FileSystem
 * @since       11.1
 */
class JArchiveBzip2 extends JObject
{
	/**
	 * Bzip2 file data buffer
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
	 * Constructor tries to load the bz2 extension if not loaded
	 *
	 * @return  void
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function __construct()
	{
		// Is bz2 extension loaded?  If not try to load it
<<<<<<< HEAD
		if (!extension_loaded('bz2')) {
			if (JPATH_ISWIN) {
				@ dl('php_bz2.dll');
			}
			else {
=======
		if (!extension_loaded('bz2'))
		{
			if (JPATH_ISWIN)
			{
				@ dl('php_bz2.dll');
			}
			else
			{
>>>>>>> upstream/master
				@ dl('bz2.so');
			}
		}
	}

	/**
<<<<<<< HEAD
	* Extract a Bzip2 compressed file to a given path
	*
	* @param   string   $archive		Path to Bzip2 archive to extract
	* @param   string   $destination	Path to extract archive to
	* @param   array    $options		Extraction options [unused]
	*
	* @return  boolean  True if successful
	* @since   11.1
	*/
=======
	 * Extract a Bzip2 compressed file to a given path
	 *
	 * @param   string  $archive      Path to Bzip2 archive to extract
	 * @param   string  $destination  Path to extract archive to
	 * @param   array   $options      Extraction options [unused]
	 *
	 * @return  boolean  True if successful
	 *
	 * @since   11.1
	 */
>>>>>>> upstream/master
	public function extract($archive, $destination, $options = array ())
	{
		// Initialise variables.
		$this->_data = null;

<<<<<<< HEAD
		if (!extension_loaded('bz2')) {
=======
		if (!extension_loaded('bz2'))
		{
>>>>>>> upstream/master
			$this->set('error.message', JText::_('JLIB_FILESYSTEM_BZIP_NOT_SUPPORTED'));

			return JError::raiseWarning(100, $this->get('error.message'));
		}

<<<<<<< HEAD
		if(!isset($options['use_streams']) || $options['use_streams'] == false)
		{
			// old style: read the whole file and then parse it
			if (!$this->_data = JFile::read($archive)) {
=======
		if (!isset($options['use_streams']) || $options['use_streams'] == false)
		{
			// Old style: read the whole file and then parse it
			if (!$this->_data = JFile::read($archive))
			{
>>>>>>> upstream/master
				$this->set('error.message', 'Unable to read archive');
				return JError::raiseWarning(100, $this->get('error.message'));
			}

			$buffer = bzdecompress($this->_data);
			unset($this->_data);
<<<<<<< HEAD
			if (empty ($buffer)) {
=======
			if (empty($buffer))
			{
>>>>>>> upstream/master
				$this->set('error.message', 'Unable to decompress data');
				return JError::raiseWarning(100, $this->get('error.message'));
			}

<<<<<<< HEAD
			if (JFile::write($destination, $buffer) === false) {
=======
			if (JFile::write($destination, $buffer) === false)
			{
>>>>>>> upstream/master
				$this->set('error.message', 'Unable to write archive');
				return JError::raiseWarning(100, $this->get('error.message'));
			}

		}
		else
		{
			// New style! streams!
			$input = JFactory::getStream();
<<<<<<< HEAD
			$input->set('processingmethod','bz'); // use bzip

			if (!$input->open($archive)) {
=======
			$input->set('processingmethod', 'bz'); // use bzip

			if (!$input->open($archive))
			{
>>>>>>> upstream/master
				$this->set('error.message', JText::_('JLIB_FILESYSTEM_BZIP_UNABLE_TO_READ'));

				return JError::raiseWarning(100, $this->get('error.message'));
			}

			$output = JFactory::getStream();

<<<<<<< HEAD
			if (!$output->open($destination, 'w')) {
=======
			if (!$output->open($destination, 'w'))
			{
>>>>>>> upstream/master
				$this->set('error.message', JText::_('JLIB_FILESYSTEM_BZIP_UNABLE_TO_WRITE'));
				$input->close(); // close the previous file

				return JError::raiseWarning(100, $this->get('error.message'));
			}

			$written = 0;
			do
			{
				$this->_data = $input->read($input->get('chunksize', 8196));
<<<<<<< HEAD
				if ($this->_data) {
					if (!$output->write($this->_data)) {
=======
				if ($this->_data)
				{
					if (!$output->write($this->_data))
					{
>>>>>>> upstream/master
						$this->set('error.message', JText::_('JLIB_FILESYSTEM_BZIP_UNABLE_TO_WRITE_FILE'));

						return JError::raiseWarning(100, $this->get('error.message'));
					}
				}
			}
			while ($this->_data);

			$output->close();
			$input->close();
		}

		return true;
	}
}