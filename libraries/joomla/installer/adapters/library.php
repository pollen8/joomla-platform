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

jimport('joomla.installer.librarymanifest');
jimport('joomla.base.adapterinstance');

/**
 * Library installer
 *
 * @package     Joomla.Platform
 * @subpackage  Installer
 * @since       11.1
 */
class JInstallerLibrary extends JAdapterInstance
{
	/**
	 * Custom loadLanguage method
	 *
<<<<<<< HEAD
	 * @param   string  $path the path where to find language files
	 * @since   11.1
	 */
	public function loadLanguage($path=null)
	{
		$source = $this->parent->getPath('source');
		if (!$source) {
			$this->parent->setPath('source', JPATH_PLATFORM . '/'.$this->parent->extension->element);
		}
		$this->manifest = $this->parent->getManifest();
		$extension = 'lib_' . strtolower(JFilterInput::getInstance()->clean((string)$this->manifest->name, 'cmd'));
		$name = strtolower((string)$this->manifest->libraryname);
		$lang = JFactory::getLanguage();
		$source = $path ? $path : JPATH_PLATFORM . "/$name";
			$lang->load($extension . '.sys', $source, null, false, false)
		||	$lang->load($extension . '.sys', JPATH_SITE, null, false, false)
		||	$lang->load($extension . '.sys', $source, $lang->getDefault(), false, false)
		||	$lang->load($extension . '.sys', JPATH_SITE, $lang->getDefault(), false, false);
=======
	 * @param   string  $path  The path where to find language files.
	 *
	 * @return  void
	 *
	 * @since   11.1
	 */
	public function loadLanguage($path = null)
	{
		$source = $this->parent->getPath('source');
		if (!$source)
		{
			$this->parent->setPath('source', JPATH_PLATFORM . '/' . $this->parent->extension->element);
		}
		$this->manifest = $this->parent->getManifest();
		$extension = 'lib_' . strtolower(JFilterInput::getInstance()->clean((string) $this->manifest->name, 'cmd'));
		$name = strtolower((string) $this->manifest->libraryname);
		$lang = JFactory::getLanguage();
		$source = $path ? $path : JPATH_PLATFORM . "/$name";
		$lang->load($extension . '.sys', $source, null, false, false)
			|| $lang->load($extension . '.sys', JPATH_SITE, null, false, false)
			|| $lang->load($extension . '.sys', $source, $lang->getDefault(), false, false)
			|| $lang->load($extension . '.sys', JPATH_SITE, $lang->getDefault(), false, false);
>>>>>>> upstream/master
	}

	/**
	 * Custom install method
	 *
	 * @return  boolean  True on success
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function install()
	{
		// Get the extension manifest object
		$this->manifest = $this->parent->getManifest();

<<<<<<< HEAD
		 // Manifest Document Setup Section

		// Set the extensions name
		$name = JFilterInput::getInstance()->clean((string)$this->manifest->name, 'string');
		$element = str_replace('.xml','',basename($this->parent->getPath('manifest')));
=======
		// Manifest Document Setup Section

		// Set the extensions name
		$name = JFilterInput::getInstance()->clean((string) $this->manifest->name, 'string');
		$element = str_replace('.xml', '', basename($this->parent->getPath('manifest')));
>>>>>>> upstream/master
		$this->set('name', $name);
		$this->set('element', $element);

		$db = $this->parent->getDbo();
<<<<<<< HEAD
		$db->setQuery('SELECT extension_id FROM #__extensions WHERE type="library" AND element = "'. $element .'"');
=======
		$db->setQuery('SELECT extension_id FROM #__extensions WHERE type="library" AND element = "' . $element . '"');
>>>>>>> upstream/master
		$result = $db->loadResult();
		if ($result)
		{
			// Already installed, can we upgrade?
			if ($this->parent->getOverwrite() || $this->parent->getUpgrade())
			{
				// We can upgrade, so uninstall the old one
<<<<<<< HEAD
				$installer = new JInstaller(); // we don't want to compromise this instance!
=======
				$installer = new JInstaller; // we don't want to compromise this instance!
>>>>>>> upstream/master
				$installer->uninstall('library', $result);
			}
			else
			{
				// Abort the install, no upgrade possible
				$this->parent->abort(JText::_('JLIB_INSTALLER_ABORT_LIB_INSTALL_ALREADY_INSTALLED'));
				return false;
			}
		}

<<<<<<< HEAD

		// Get the libraries description
		$description = (string)$this->manifest->description;
		if ($description) {
			$this->parent->set('message', JText::_($description));
		}
		else {
=======
		// Get the libraries description
		$description = (string) $this->manifest->description;
		if ($description)
		{
			$this->parent->set('message', JText::_($description));
		}
		else
		{
>>>>>>> upstream/master
			$this->parent->set('message', '');
		}

		// Set the installation path
<<<<<<< HEAD
		$group = (string)$this->manifest->libraryname;
		if ( ! $group) {
=======
		$group = (string) $this->manifest->libraryname;
		if (!$group)
		{
>>>>>>> upstream/master
			$this->parent->abort(JText::_('JLIB_INSTALLER_ABORT_LIB_INSTALL_NOFILE'));
			return false;
		}
		else
		{
<<<<<<< HEAD
			$this->parent->setPath('extension_root', JPATH_PLATFORM.DS.implode(DS,explode('/',$group)));
		}

		 // Filesystem Processing Section
=======
			$this->parent->setPath('extension_root', JPATH_PLATFORM . '/' . implode(DS, explode('/', $group)));
		}

		// Filesystem Processing Section
>>>>>>> upstream/master

		// If the plugin directory does not exist, let's create it
		$created = false;
		if (!file_exists($this->parent->getPath('extension_root')))
		{
			if (!$created = JFolder::create($this->parent->getPath('extension_root')))
			{
<<<<<<< HEAD
				$this->parent->abort(JText::sprintf('JLIB_INSTALLER_ABORT_LIB_INSTALL_FAILED_TO_CREATE_DIRECTORY', $this->parent->getPath('extension_root')));
=======
				$this->parent->abort(
					JText::sprintf('JLIB_INSTALLER_ABORT_LIB_INSTALL_FAILED_TO_CREATE_DIRECTORY', $this->parent->getPath('extension_root'))
				);
>>>>>>> upstream/master
				return false;
			}
		}

		// If we created the plugin directory and will want to remove it if we
<<<<<<< HEAD
		// have to roll back the installation, lets add it to the installation
		// step stack

		if ($created) {
			$this->parent->pushStep(array ('type' => 'folder', 'path' => $this->parent->getPath('extension_root')));
=======
		// have to roll back the installation, let's add it to the installation
		// step stack

		if ($created)
		{
			$this->parent->pushStep(array('type' => 'folder', 'path' => $this->parent->getPath('extension_root')));
>>>>>>> upstream/master
		}

		// Copy all necessary files
		if ($this->parent->parseFiles($this->manifest->files, -1) === false)
		{
			// Install failed, roll back changes
			$this->parent->abort();
			return false;
		}

		// Parse optional tags
		$this->parent->parseLanguages($this->manifest->languages);
		$this->parent->parseMedia($this->manifest->media);

		// Extension Registration
		$row = JTable::getInstance('extension');
		$row->name = $this->get('name');
		$row->type = 'library';
		$row->element = $this->get('element');
		$row->folder = ''; // There is no folder for modules
		$row->enabled = 1;
		$row->protected = 0;
		$row->access = 1;
		$row->client_id = 0;
		$row->params = $this->parent->getParams();
		$row->custom_data = ''; // custom data
		$row->manifest_cache = $this->parent->generateManifestCache();
		if (!$row->store())
		{
			// Install failed, roll back changes
			$this->parent->abort(JText::sprintf('JLIB_INSTALLER_ABORT_LIB_INSTALL_ROLLBACK', $db->stderr(true)));
			return false;
		}

		// Finalization and Cleanup Section

		// Lastly, we will copy the manifest file to its appropriate place.
		$manifest = Array();
		$manifest['src'] = $this->parent->getPath('manifest');
<<<<<<< HEAD
		$manifest['dest'] = JPATH_MANIFESTS.DS.'libraries'.DS.basename($this->parent->getPath('manifest'));
=======
		$manifest['dest'] = JPATH_MANIFESTS . '/libraries/' . basename($this->parent->getPath('manifest'));
>>>>>>> upstream/master
		if (!$this->parent->copyFiles(array($manifest), true))
		{
			// Install failed, rollback changes
			$this->parent->abort(JText::_('JLIB_INSTALLER_ABORT_LIB_INSTALL_COPY_SETUP'));
			return false;
		}
		return $row->get('extension_id');
	}

	/**
	 * Custom update method
	 *
	 * @return  boolean  True on success
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function update()
	{
		// Since this is just files, an update removes old files
		// Get the extension manifest object
		$this->manifest = $this->parent->getManifest();

		// Manifest Document Setup Section

		// Set the extensions name
<<<<<<< HEAD
		$name = (string)$this->manifest->name;
		$name = JFilterInput::getInstance()->clean($name, 'string');
		$element = str_replace('.xml','',basename($this->parent->getPath('manifest')));
		$this->set('name', $name);
		$this->set('element', $element);
		$installer = new JInstaller(); // we don't want to compromise this instance!
		$db = $this->parent->getDbo();
		$db->setQuery('SELECT extension_id FROM #__extensions WHERE type="library" AND element = "'. $element .'"');
		$result = $db->loadResult();
		if ($result) {
=======
		$name = (string) $this->manifest->name;
		$name = JFilterInput::getInstance()->clean($name, 'string');
		$element = str_replace('.xml', '', basename($this->parent->getPath('manifest')));
		$this->set('name', $name);
		$this->set('element', $element);
		$installer = new JInstaller; // we don't want to compromise this instance!
		$db = $this->parent->getDbo();
		$db->setQuery('SELECT extension_id FROM #__extensions WHERE type="library" AND element = "' . $element . '"');
		$result = $db->loadResult();
		if ($result)
		{
>>>>>>> upstream/master
			// Already installed, which would make sense
			$installer->uninstall('library', $result);
		}
		// Now create the new files
		return $this->install();
	}

	/**
	 * Custom uninstall method
	 *
<<<<<<< HEAD
	 * @param   string   $id	The id of the library to uninstall
	 *
	 * @return  boolean  True on success
=======
	 * @param   string  $id  The id of the library to uninstall.
	 *
	 * @return  boolean  True on success
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function uninstall($id)
	{
		// Initialise variables.
		$retval = true;

		// First order of business will be to load the module object table from the database.
		// This should give us the necessary information to proceed.
		$row = JTable::getInstance('extension');
		if (!$row->load((int) $id) || !strlen($row->element))
		{
			JError::raiseWarning(100, JText::_('ERRORUNKOWNEXTENSION'));
			return false;
		}

		// Is the library we are trying to uninstall a core one?
		// Because that is not a good idea...
		if ($row->protected)
		{
			JError::raiseWarning(100, JText::_('JLIB_INSTALLER_ERROR_LIB_UNINSTALL_WARNCORELIBRARY'));
			return false;
		}

<<<<<<< HEAD
		$manifestFile = JPATH_MANIFESTS.DS.'libraries' . DS . $row->element .'.xml';
=======
		$manifestFile = JPATH_MANIFESTS . '/libraries/' . $row->element . '.xml';
>>>>>>> upstream/master

		// Because libraries may not have their own folders we cannot use the standard method of finding an installation manifest
		if (file_exists($manifestFile))
		{
			$manifest = new JLibraryManifest($manifestFile);
			// Set the plugin root path
<<<<<<< HEAD
			$this->parent->setPath('extension_root', JPATH_PLATFORM.DS.$manifest->libraryname);
=======
			$this->parent->setPath('extension_root', JPATH_PLATFORM . '/' . $manifest->libraryname);
>>>>>>> upstream/master

			$xml = JFactory::getXML($manifestFile);

			// If we cannot load the XML file return null
<<<<<<< HEAD
			if ( ! $xml)
=======
			if (!$xml)
>>>>>>> upstream/master
			{
				JError::raiseWarning(100, JText::_('JLIB_INSTALLER_ERROR_LIB_UNINSTALL_LOAD_MANIFEST'));
				return false;
			}

			// Check for a valid XML root tag.
			// TODO: Remove backwards compatability in a future version
			// Should be 'extension', but for backward compatability we will accept 'install'.

			if ($xml->getName() != 'install' && $xml->getName() != 'extension')
			{
				JError::raiseWarning(100, JText::_('JLIB_INSTALLER_ERROR_LIB_UNINSTALL_INVALID_MANIFEST'));
				return false;
			}

			$this->parent->removeFiles($xml->files, -1);
			JFile::delete($manifestFile);

		}
		else
		{
			// Remove this row entry since its invalid
			$row->delete($row->extension_id);
			unset($row);
			JError::raiseWarning(100, JText::_('JLIB_INSTALLER_ERROR_LIB_UNINSTALL_INVALID_NOTFOUND_MANIFEST'));
			return false;
		}

		// TODO: Change this so it walked up the path backwards so we clobber multiple empties
		// If the folder is empty, let's delete it
		if (JFolder::exists($this->parent->getPath('extension_root')))
		{
			if (is_dir($this->parent->getPath('extension_root')))
			{
				$files = JFolder::files($this->parent->getPath('extension_root'));
<<<<<<< HEAD
				if (!count($files)) {
=======
				if (!count($files))
				{
>>>>>>> upstream/master
					JFolder::delete($this->parent->getPath('extension_root'));
				}
			}
		}

		$this->parent->removeFiles($xml->languages);

		$row->delete($row->extension_id);
		unset($row);

		return $retval;
	}

	/**
	 * Custom discover method
	 *
<<<<<<< HEAD
	 * @return  array  JExtension) list of extensions available
=======
	 * @return  array  JExtension  list of extensions available
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function discover()
	{
		$results = Array();
<<<<<<< HEAD
		$file_list = JFolder::files(JPATH_MANIFESTS.DS.'libraries','\.xml$');
		foreach ($file_list as $file)
		{
			$manifest_details = JApplicationHelper::parseXMLInstallFile(JPATH_MANIFESTS.'/libraries/'.$file);
=======
		$file_list = JFolder::files(JPATH_MANIFESTS . '/libraries', '\.xml$');
		foreach ($file_list as $file)
		{
			$manifest_details = JApplicationHelper::parseXMLInstallFile(JPATH_MANIFESTS . '/libraries/' . $file);
>>>>>>> upstream/master
			$file = JFile::stripExt($file);
			$extension = JTable::getInstance('extension');
			$extension->set('type', 'library');
			$extension->set('client_id', 0);
			$extension->set('element', $file);
			$extension->set('name', $file);
			$extension->set('state', -1);
			$extension->set('manifest_cache', json_encode($manifest_details));
			$results[] = $extension;
		}
		return $results;
	}

	/**
	 * Custom discover_install method
	 *
<<<<<<< HEAD
	 * @param   integer  $id The id of the extension to install
	 *
	 * @return void
=======
	 * @return  void
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function discover_install()
	{
<<<<<<< HEAD
		/* Libraries are a strange beast, they are actually references to files
=======
		/* Libraries are a strange beast; they are actually references to files
>>>>>>> upstream/master
		 * There are two parts to a library which are disjunct in their locations
		 * 1) The manifest file (stored in /JPATH_MANIFESTS/libraries)
		 * 2) The actual files (stored in /JPATH_PLATFORM/libraryname)
		 * Thus installation of a library is the process of dumping files
		 * in two different places. As such it is impossible to perform
		 * any operation beyond mere registration of a library under the presumption
		 * that the files exist in the appropriate location so that come uninstall
		 * time they can be adequately removed.
		 */

<<<<<<< HEAD
		$manifestPath = JPATH_MANIFESTS . DS . 'libraries' . DS . $this->parent->extension->element . '.xml';
=======
		$manifestPath = JPATH_MANIFESTS . '/libraries/' . $this->parent->extension->element . '.xml';
>>>>>>> upstream/master
		$this->parent->manifest = $this->parent->isManifest($manifestPath);
		$this->parent->setPath('manifest', $manifestPath);
		$manifest_details = JApplicationHelper::parseXMLInstallFile($this->parent->getPath('manifest'));
		$this->parent->extension->manifest_cache = json_encode($manifest_details);
		$this->parent->extension->state = 0;
		$this->parent->extension->name = $manifest_details['name'];
		$this->parent->extension->enabled = 1;
		$this->parent->extension->params = $this->parent->getParams();
<<<<<<< HEAD
		if ($this->parent->extension->store()) {
=======
		if ($this->parent->extension->store())
		{
>>>>>>> upstream/master
			return true;
		}
		else
		{
			JError::raiseWarning(101, JText::_('JLIB_INSTALLER_ERROR_LIB_DISCOVER_STORE_DETAILS'));
			return false;
		}
	}

	/**
	 * Refreshes the extension table cache
<<<<<<< HEAD
	 * @return  boolean result of operation, true if updated, false on failure
=======
	 *
	 * @return  boolean  Result of operation, true if updated, false on failure
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function refreshManifestCache()
	{
		// Need to find to find where the XML file is since we don't store this normally
<<<<<<< HEAD
		$manifestPath = JPATH_MANIFESTS.DS.'libraries'. DS.$this->parent->extension->element.'.xml';
=======
		$manifestPath = JPATH_MANIFESTS . '/libraries/' . $this->parent->extension->element . '.xml';
>>>>>>> upstream/master
		$this->parent->manifest = $this->parent->isManifest($manifestPath);
		$this->parent->setPath('manifest', $manifestPath);

		$manifest_details = JApplicationHelper::parseXMLInstallFile($this->parent->getPath('manifest'));
		$this->parent->extension->manifest_cache = json_encode($manifest_details);
		$this->parent->extension->name = $manifest_details['name'];

<<<<<<< HEAD
		try {
			return $this->parent->extension->store();
		}
		catch(JException $e) {
=======
		try
		{
			return $this->parent->extension->store();
		}
		catch (JException $e)
		{
>>>>>>> upstream/master
			JError::raiseWarning(101, JText::_('JLIB_INSTALLER_ERROR_LIB_REFRESH_MANIFEST_CACHE'));
			return false;
		}
	}
}
