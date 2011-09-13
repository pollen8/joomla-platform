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
 * An Archive handling class
 *
 * @package     Joomla.Platform
 * @subpackage  FileSystem
 * @since       11.1
 */
class JArchive
{
	/**
	 * Extract an archive file to a directory.
	 *
	 * @param   string  $archivename  The name of the archive file
	 * @param   string  $extractdir   Directory to unpack into
	 *
	 * @return  boolean  True for success
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function extract($archivename, $extractdir)
	{
		jimport('joomla.filesystem.file');
		jimport('joomla.filesystem.folder');

		$untar = false;
		$result = false;
		$ext = JFile::getExt(strtolower($archivename));

		// Check if a tar is embedded...gzip/bzip2 can just be plain files!
<<<<<<< HEAD
		if (JFile::getExt(JFile::stripExt(strtolower($archivename))) == 'tar') {
=======
		if (JFile::getExt(JFile::stripExt(strtolower($archivename))) == 'tar')
		{
>>>>>>> upstream/master
			$untar = true;
		}

		switch ($ext)
		{
			case 'zip':
				$adapter = JArchive::getAdapter('zip');

<<<<<<< HEAD
				if ($adapter) {
=======
				if ($adapter)
				{
>>>>>>> upstream/master
					$result = $adapter->extract($archivename, $extractdir);
				}
				break;

			case 'tar':
				$adapter = JArchive::getAdapter('tar');

<<<<<<< HEAD
				if ($adapter) {
=======
				if ($adapter)
				{
>>>>>>> upstream/master
					$result = $adapter->extract($archivename, $extractdir);
				}
				break;

			case 'tgz':
				// This format is a tarball gzip'd
				$untar = true;

			case 'gz':
			case 'gzip':
				// This may just be an individual file (e.g. sql script)
				$adapter = JArchive::getAdapter('gzip');

<<<<<<< HEAD
				if ($adapter) {
					$config		= JFactory::getConfig();
					$tmpfname	= $config->get('tmp_path').DS.uniqid('gzip');
					$gzresult	= $adapter->extract($archivename, $tmpfname);

					if (JError::isError($gzresult)) {
=======
				if ($adapter)
				{
					$config = JFactory::getConfig();
					$tmpfname = $config->get('tmp_path') . '/' . uniqid('gzip');
					$gzresult = $adapter->extract($archivename, $tmpfname);

					if (JError::isError($gzresult))
					{
>>>>>>> upstream/master
						@unlink($tmpfname);

						return false;
					}

<<<<<<< HEAD
					if ($untar) {
						// Try to untar the file
						$tadapter = JArchive::getAdapter('tar');

						if ($tadapter) {
							$result = $tadapter->extract($tmpfname, $extractdir);
						}
					}
					else {
						$path = JPath::clean($extractdir);
						JFolder::create($path);
						$result = JFile::copy(
							$tmpfname,
							$path.DS.JFile::stripExt(JFile::getName(strtolower($archivename))), null, 1
						);
=======
					if ($untar)
					{
						// Try to untar the file
						$tadapter = JArchive::getAdapter('tar');

						if ($tadapter)
						{
							$result = $tadapter->extract($tmpfname, $extractdir);
						}
					}
					else
					{
						$path = JPath::clean($extractdir);
						JFolder::create($path);
						$result = JFile::copy($tmpfname, $path . '/' . JFile::stripExt(JFile::getName(strtolower($archivename))), null, 1);
>>>>>>> upstream/master
					}

					@unlink($tmpfname);
				}
				break;

<<<<<<< HEAD
			case 'tbz2' :
				// This format is a tarball bzip2'd
				$untar = true;


			case 'bz2'  :
=======
			case 'tbz2':
				// This format is a tarball bzip2'd
				$untar = true;

			case 'bz2':
>>>>>>> upstream/master
			case 'bzip2':
				// This may just be an individual file (e.g. sql script)
				$adapter = JArchive::getAdapter('bzip2');

<<<<<<< HEAD
				if ($adapter) {
					$config		= JFactory::getConfig();
					$tmpfname	= $config->get('tmp_path').DS.uniqid('bzip2');
					$bzresult	= $adapter->extract($archivename, $tmpfname);

					if (JError::isError($bzresult)) {
=======
				if ($adapter)
				{
					$config = JFactory::getConfig();
					$tmpfname = $config->get('tmp_path') . '/' . uniqid('bzip2');
					$bzresult = $adapter->extract($archivename, $tmpfname);

					if (JError::isError($bzresult))
					{
>>>>>>> upstream/master
						@unlink($tmpfname);
						return false;
					}

<<<<<<< HEAD
					if ($untar) {
						// Try to untar the file
						$tadapter = JArchive::getAdapter('tar');

						if ($tadapter) {
							$result = $tadapter->extract($tmpfname, $extractdir);
						}
					}
					else {
						$path = JPath::clean($extractdir);
						JFolder::create($path);
						$result = JFile::copy(
							$tmpfname,
							$path.DS.JFile::stripExt(JFile::getName(strtolower($archivename))), null, 1
						);
=======
					if ($untar)
					{
						// Try to untar the file
						$tadapter = JArchive::getAdapter('tar');

						if ($tadapter)
						{
							$result = $tadapter->extract($tmpfname, $extractdir);
						}
					}
					else
					{
						$path = JPath::clean($extractdir);
						JFolder::create($path);
						$result = JFile::copy($tmpfname, $path . '/' . JFile::stripExt(JFile::getName(strtolower($archivename))), null, 1);
>>>>>>> upstream/master
					}

					@unlink($tmpfname);
				}
				break;

			default:
				JError::raiseWarning(10, JText::_('JLIB_FILESYSTEM_UNKNOWNARCHIVETYPE'));
				return false;
				break;
		}

<<<<<<< HEAD
		if (! $result || JError::isError($result)) {
=======
		if (!$result || JError::isError($result))
		{
>>>>>>> upstream/master
			return false;
		}

		return true;
	}

	/**
	 * Get a file compression adapter.
	 *
<<<<<<< HEAD
	 * @param   string   $type	The type of adapter (bzip2|gzip|tar|zip).
	 *
	 * @return  object  JObject
=======
	 * @param   string  $type  The type of adapter (bzip2|gzip|tar|zip).
	 *
	 * @return  object   JObject
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function getAdapter($type)
	{
		static $adapters;

<<<<<<< HEAD
		if (!isset($adapters)) {
			$adapters = array();
		}

		if (!isset($adapters[$type])) {
			// Try to load the adapter object
			$class = 'JArchive'.ucfirst($type);

			if (!class_exists($class)) {
				$path = dirname(__FILE__).DS.'archive'.DS.strtolower($type).'.php';
				if (file_exists($path)) {
					require_once $path;
				}
				else {
					JError::raiseError(500,JText::_('JLIB_FILESYSTEM_UNABLE_TO_LOAD_ARCHIVE'));
				}
			}

			$adapters[$type] = new $class();
=======
		if (!isset($adapters))
		{
			$adapters = array();
		}

		if (!isset($adapters[$type]))
		{
			// Try to load the adapter object
			$class = 'JArchive' . ucfirst($type);

			if (!class_exists($class))
			{
				$path = dirname(__FILE__) . '/archive/' . strtolower($type) . '.php';
				if (file_exists($path))
				{
					require_once $path;
				}
				else
				{
					JError::raiseError(500, JText::_('JLIB_FILESYSTEM_UNABLE_TO_LOAD_ARCHIVE'));
				}
			}

			$adapters[$type] = new $class;
>>>>>>> upstream/master
		}

		return $adapters[$type];
	}
}