<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Installer
 *
 * @copyright   Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

<<<<<<< HEAD
defined('JPATH_PLATFORM') or die;
=======
defined('JPATH_PLATFORM') or die();
>>>>>>> upstream/master

jimport('joomla.filesystem.file');

/**
 * Joomla! Library Manifest File
 *
 * @package     Joomla.Platform
 * @subpackage  Installer
 * @since       11.1
 */
class JLibraryManifest extends JObject
{
	/**
	 * @var string name Name of Library
	 */
	var $name = '';
<<<<<<< HEAD
=======

>>>>>>> upstream/master
	/**
	 * @var string libraryname File system name of the library
	 */
	var $libraryname = '';
<<<<<<< HEAD
	/**
	 *  @var string version Version of the library
	 */
	var $version = '';
=======

	/**
	 * @var string version Version of the library
	 */
	var $version = '';

>>>>>>> upstream/master
	/**
	 * @var string description Description of the library
	 */
	var $description = '';
<<<<<<< HEAD
=======

>>>>>>> upstream/master
	/**
	 * @var date creationDate Creation Date of the extension
	 */
	var $creationDate = '';
<<<<<<< HEAD
=======

>>>>>>> upstream/master
	/**
	 * @var string copyright Copyright notice for the extension
	 */
	var $copyright = '';
<<<<<<< HEAD
=======

>>>>>>> upstream/master
	/**
	 * @var string license License for the extension
	 */
	var $license = '';
<<<<<<< HEAD
=======

>>>>>>> upstream/master
	/**
	 * @var string author Author for the extension
	 */
	var $author = '';
<<<<<<< HEAD
=======

>>>>>>> upstream/master
	/**
	 * @var string authoremail Author email for the extension
	 */
	var $authoremail = '';
<<<<<<< HEAD
=======

>>>>>>> upstream/master
	/**
	 * @var string authorurl Author url for the extension
	 */
	var $authorurl = '';
<<<<<<< HEAD
=======

>>>>>>> upstream/master
	/**
	 * @var string packager Name of the packager for the library (may also be porter)
	 */
	var $packager = '';
<<<<<<< HEAD
=======

>>>>>>> upstream/master
	/**
	 * @var string packagerurl URL of the packager for the library (may also be porter)
	 */
	var $packagerurl = '';
<<<<<<< HEAD
=======

>>>>>>> upstream/master
	/**
	 * @var string update URL of the update site
	 */
	var $update = '';
<<<<<<< HEAD
=======

>>>>>>> upstream/master
	/**
	 * @var string[] filelist List of files in the library
	 */
	var $filelist = Array();
<<<<<<< HEAD
=======

>>>>>>> upstream/master
	/**
	 * @var string manifest_file Path to manifest file
	 */
	var $manifest_file = '';

	/**
	 * Constructor
<<<<<<< HEAD
	 * @param   string  $xmlpath Path to an XML file to load the manifest from
	 */
	function __construct($xmlpath='')
	{
		if (strlen($xmlpath)) $this->loadManifestFromXML($xmlpath);
=======
	 *
	 * @param   string  $xmlpath  Path to an XML file to load the manifest from.
	 *
	 * @return  JLibraryManifest
	 *
	 * @since   11.1
	 */
	function __construct($xmlpath = '')
	{
		if (strlen($xmlpath))
		{
			$this->loadManifestFromXML($xmlpath);
		}
>>>>>>> upstream/master
	}

	/**
	 * Load a manifest from a file
<<<<<<< HEAD
	 * @param   string  $xmlfile Path to file to load
=======
	 *
	 * @param   string  $xmlfile  Path to file to load
	 *
	 * @return  boolean
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	function loadManifestFromXML($xmlfile)
	{
		$this->manifest_file = JFile::stripExt(basename($xmlfile));

<<<<<<< HEAD
		$xml =JFactory::getXML($xmlfile);
		if( ! $xml)
=======
		$xml = JFactory::getXML($xmlfile);
		if (!$xml)
>>>>>>> upstream/master
		{
			$this->_errors[] = JText::sprintf('JLIB_INSTALLER_ERROR_LOAD_XML', $xmlfile);
			return false;
		}
		else
		{
<<<<<<< HEAD
			$this->name = (string)$xml->name;
			$this->libraryname = (string)$xml->libraryname;
			$this->version = (string)$xml->version;
			$this->description = (string)$xml->description;
			$this->creationdate = (string)$xml->creationdate;
			$this->author = (string)$xml->author;
			$this->authoremail = (string)$xml->authorEmail;
			$this->authorurl = (string)$xml->authorUrl;
			$this->packager = (string)$xml->packager;
			$this->packagerurl = (string)$xml->packagerurl;
			$this->update = (string)$xml->update;

			if(isset($xml->files) && isset($xml->files->file) && count($xml->files->file))
			{
				foreach ($xml->files->file as $file) {
					$this->filelist[] = (string)$file;
=======
			$this->name = (string) $xml->name;
			$this->libraryname = (string) $xml->libraryname;
			$this->version = (string) $xml->version;
			$this->description = (string) $xml->description;
			$this->creationdate = (string) $xml->creationdate;
			$this->author = (string) $xml->author;
			$this->authoremail = (string) $xml->authorEmail;
			$this->authorurl = (string) $xml->authorUrl;
			$this->packager = (string) $xml->packager;
			$this->packagerurl = (string) $xml->packagerurl;
			$this->update = (string) $xml->update;

			if (isset($xml->files) && isset($xml->files->file) && count($xml->files->file))
			{
				foreach ($xml->files->file as $file)
				{
					$this->filelist[] = (string) $file;
>>>>>>> upstream/master
				}
			}
			return true;
		}
	}
}
