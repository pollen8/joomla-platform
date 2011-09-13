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

jimport('joomla.base.adapterinstance');

/**
 * Plugin installer
 *
 * @package     Joomla.Platform
 * @subpackage  Installer
 * @since       11.1
 */
class JInstallerPlugin extends JAdapterInstance
{
	/**
<<<<<<< HEAD
	 * @var string install function routing
	 * */
	var $route = 'install';

	protected $manifest = null;
	protected $manifest_script = null;
	protected $name = null;
	protected $scriptElement = null;
=======
	 * Install function routing
	 *
	 * @var    string
	 * @since  11.1
	 * */
	var $route = 'install';

	/**
	 * The installation manifest XML object
	 *
	 * @var
	 * @since  11.1
	 * */
	protected $manifest = null;

	/**
	 *
	 *
	 * @var
	 * @since  11.1
	 * */

	protected $manifest_script = null;

	/**
	 *
	 *
	 * @var
	 * @since  11.1
	 * */
	protected $name = null;

	/**
	 *
	 *
	 * @var
	 * @since  11.1
	 * */
	protected $scriptElement = null;

	/**
	 * @var
	 * @since  11.1
	 */
>>>>>>> upstream/master
	protected $oldFiles = null;

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
			$this->parent->setPath('source', JPATH_PLUGINS . '/'.$this->parent->extension->folder.'/'.$this->parent->extension->element);
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
			$this->parent->setPath('source', JPATH_PLUGINS . '/' . $this->parent->extension->folder . '/' . $this->parent->extension->element);
>>>>>>> upstream/master
		}
		$this->manifest = $this->parent->getManifest();
		$element = $this->manifest->files;
		if ($element)
		{
<<<<<<< HEAD
			$group = strtolower((string)$this->manifest->attributes()->group);
=======
			$group = strtolower((string) $this->manifest->attributes()->group);
>>>>>>> upstream/master
			$name = '';
			if (count($element->children()))
			{
				foreach ($element->children() as $file)
				{
<<<<<<< HEAD
					if ((string)$file->attributes()->plugin)
					{
						$name = strtolower((string)$file->attributes()->plugin);
=======
					if ((string) $file->attributes()->plugin)
					{
						$name = strtolower((string) $file->attributes()->plugin);
>>>>>>> upstream/master
						break;
					}
				}
			}
			if ($name)
			{
				$extension = "plg_${group}_${name}";
				$lang = JFactory::getLanguage();
				$source = $path ? $path : JPATH_PLUGINS . "/$group/$name";
<<<<<<< HEAD
				$folder = (string)$element->attributes()->folder;
=======
				$folder = (string) $element->attributes()->folder;
>>>>>>> upstream/master
				if ($folder && file_exists("$path/$folder"))
				{
					$source = "$path/$folder";
				}
				$lang->load($extension . '.sys', $source, null, false, false)
<<<<<<< HEAD
				||	$lang->load($extension . '.sys', JPATH_ADMINISTRATOR, null, false, false)
				||	$lang->load($extension . '.sys', $source, $lang->getDefault(), false, false)
				||	$lang->load($extension . '.sys', JPATH_ADMINISTRATOR, $lang->getDefault(), false, false);
			}
		}
	}
=======
					|| $lang->load($extension . '.sys', JPATH_ADMINISTRATOR, null, false, false)
					|| $lang->load($extension . '.sys', $source, $lang->getDefault(), false, false)
					|| $lang->load($extension . '.sys', JPATH_ADMINISTRATOR, $lang->getDefault(), false, false);
			}
		}
	}

>>>>>>> upstream/master
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
		// Get a database connector object
		$db = $this->parent->getDbo();

		// Get the extension manifest object
		$this->manifest = $this->parent->getManifest();

		$xml = $this->manifest;

		// Manifest Document Setup Section

		// Set the extension name
<<<<<<< HEAD
		$name = (string)$xml->name;
=======
		$name = (string) $xml->name;
>>>>>>> upstream/master
		$name = JFilterInput::getInstance()->clean($name, 'string');
		$this->set('name', $name);

		// Get the component description
<<<<<<< HEAD
		$description = (string)$xml->description;
		if ($description) {
			$this->parent->set('message', JText::_($description));
		}
		else {
=======
		$description = (string) $xml->description;
		if ($description)
		{
			$this->parent->set('message', JText::_($description));
		}
		else
		{
>>>>>>> upstream/master
			$this->parent->set('message', '');
		}

		/*
		 * Backward Compatability
		 * @todo Deprecate in future version
		 */
<<<<<<< HEAD
		$type = (string)$xml->attributes()->type;
=======
		$type = (string) $xml->attributes()->type;
>>>>>>> upstream/master

		// Set the installation path
		if (count($xml->files->children()))
		{
			foreach ($xml->files->children() as $file)
			{
<<<<<<< HEAD
				if ((string)$file->attributes()->$type)
				{
					$element = (string)$file->attributes()->$type;
=======
				if ((string) $file->attributes()->$type)
				{
					$element = (string) $file->attributes()->$type;
>>>>>>> upstream/master
					break;
				}
			}
		}
<<<<<<< HEAD
		$group = (string)$xml->attributes()->group;
		if (!empty ($element) && !empty($group)) {
			$this->parent->setPath('extension_root', JPATH_PLUGINS.DS.$group.DS.$element);
		}
		else
		{
			$this->parent->abort(JText::sprintf('JLIB_INSTALLER_ABORT_PLG_INSTALL_NO_FILE', JText::_('JLIB_INSTALLER_'.$this->route)));
			return false;
		}


		// Check if we should enable overwrite settings

		// Check to see if a plugin by the same name is already installed
		$query = 'SELECT `extension_id`' .
				' FROM `#__extensions`' .
				' WHERE folder = '.$db->Quote($group) .
				' AND element = '.$db->Quote($element);
		$db->setQuery($query);
		try {
			$db->Query();
		}
		catch(JException $e)
		{
			// Install failed, roll back changes
			$this->parent->abort(JText::sprintf('JLIB_INSTALLER_ABORT_PLG_INSTALL_ROLLBACK', JText::_('JLIB_INSTALLER_'.$this->route), $db->stderr(true)));
=======
		$group = (string) $xml->attributes()->group;
		if (!empty($element) && !empty($group))
		{
			$this->parent->setPath('extension_root', JPATH_PLUGINS . '/' . $group . '/' . $element);
		}
		else
		{
			$this->parent->abort(JText::sprintf('JLIB_INSTALLER_ABORT_PLG_INSTALL_NO_FILE', JText::_('JLIB_INSTALLER_' . $this->route)));
			return false;
		}

		// Check if we should enable overwrite settings

		// Check to see if a plugin by the same name is already installed.
		$query = $db->getQuery(true);
		$query->select($query->qn('extension_id'))->from($query->qn('#__extensions'));
		$query->where($query->qn('folder') . ' = ' . $query->q($group));
		$query->where($query->qn('element') . ' = ' . $query->q($element));
		$db->setQuery($query);
		try
		{
			$db->Query();
		}
		catch (JException $e)
		{
			// Install failed, roll back changes
			$this->parent
				->abort(JText::sprintf('JLIB_INSTALLER_ABORT_PLG_INSTALL_ROLLBACK', JText::_('JLIB_INSTALLER_' . $this->route), $db->stderr(true)));
>>>>>>> upstream/master
			return false;
		}
		$id = $db->loadResult();

		// If it's on the fs...
		if (file_exists($this->parent->getPath('extension_root')) && (!$this->parent->getOverwrite() || $this->parent->getUpgrade()))
		{
			$updateElement = $xml->update;
			// Upgrade manually set or
			// Update function available or
			// Update tag detected
<<<<<<< HEAD
			if ($this->parent->getUpgrade() || ($this->parent->manifestClass && method_exists($this->parent->manifestClass,'update')) || is_a($updateElement, 'JXMLElement'))
=======
			if ($this->parent->getUpgrade() || ($this->parent->manifestClass && method_exists($this->parent->manifestClass, 'update'))
				|| is_a($updateElement, 'JXMLElement')
			)
>>>>>>> upstream/master
			{
				// Force this one
				$this->parent->setOverwrite(true);
				$this->parent->setUpgrade(true);
<<<<<<< HEAD
				if ($id) {
=======
				if ($id)
				{
>>>>>>> upstream/master
					// If there is a matching extension mark this as an update; semantics really
					$this->route = 'update';
				}
			}
			else if (!$this->parent->getOverwrite())
			{
				// Overwrite is set
				// We didn't have overwrite set, find an udpate function or find an update tag so lets call it safe
<<<<<<< HEAD
				$this->parent->abort(JText::sprintf('JLIB_INSTALLER_ABORT_PLG_INSTALL_DIRECTORY', JText::_('JLIB_INSTALLER_'.$this->route), $this->parent->getPath('extension_root')));
=======
				$this->parent
					->abort(
						JText::sprintf(
							'JLIB_INSTALLER_ABORT_PLG_INSTALL_DIRECTORY', JText::_('JLIB_INSTALLER_' . $this->route),
							$this->parent->getPath('extension_root')
						)
					);
>>>>>>> upstream/master
				return false;
			}
		}

<<<<<<< HEAD
		 // Installer Trigger Loading

		// If there is an manifest class file, let's load it; we'll copy it later (don't have destination yet).

		if ((string)$xml->scriptfile)
		{
			$manifestScript = (string)$xml->scriptfile;
			$manifestScriptFile = $this->parent->getPath('source').DS.$manifestScript;
=======
		// Installer Trigger Loading

		// If there is an manifest class file, let's load it; we'll copy it later (don't have destination yet).

		if ((string) $xml->scriptfile)
		{
			$manifestScript = (string) $xml->scriptfile;
			$manifestScriptFile = $this->parent->getPath('source') . '/' . $manifestScript;
>>>>>>> upstream/master
			if (is_file($manifestScriptFile))
			{
				// Load the file
				include_once $manifestScriptFile;
			}
<<<<<<< HEAD
			// Set the class name
			$classname = 'plg'.$group.$element.'InstallerScript';
=======
			// If a dash is present in the group name, remove it
			$groupClass = str_replace('-', '', $group);
			// Set the class name
			$classname = 'plg' . $groupClass . $element . 'InstallerScript';
>>>>>>> upstream/master
			if (class_exists($classname))
			{
				// Create a new instance
				$this->parent->manifestClass = new $classname($this);
				// And set this so we can copy it later
				$this->set('manifest_script', $manifestScript);
<<<<<<< HEAD
=======

>>>>>>> upstream/master
				// Note: if we don't find the class, don't bother to copy the file
			}
		}

		// Run preflight if possible (since we know we're not an update)
		ob_start();
		ob_implicit_flush(false);
<<<<<<< HEAD
		if ($this->parent->manifestClass && method_exists($this->parent->manifestClass,'preflight'))
		{
			if($this->parent->manifestClass->preflight($this->route, $this) === false)
=======
		if ($this->parent->manifestClass && method_exists($this->parent->manifestClass, 'preflight'))
		{
			if ($this->parent->manifestClass->preflight($this->route, $this) === false)
>>>>>>> upstream/master
			{
				// Install failed, rollback changes
				$this->parent->abort(JText::_('JLIB_INSTALLER_ABORT_PLG_INSTALL_CUSTOM_INSTALL_FAILURE'));
				return false;
			}
		}
		$msg = ob_get_contents(); // create msg object; first use here
		ob_end_clean();

<<<<<<< HEAD
		 // Filesystem Processing Section
=======
		// Filesystem Processing Section
>>>>>>> upstream/master

		// If the plugin directory does not exist, lets create it
		$created = false;
		if (!file_exists($this->parent->getPath('extension_root')))
		{
			if (!$created = JFolder::create($this->parent->getPath('extension_root')))
			{
<<<<<<< HEAD
				$this->parent->abort(JText::sprintf('JLIB_INSTALLER_ABORT_PLG_INSTALL_CREATE_DIRECTORY', JText::_('JLIB_INSTALLER_'.$this->route), $this->parent->getPath('extension_root')));
=======
				$this->parent
					->abort(
						JText::sprintf(
							'JLIB_INSTALLER_ABORT_PLG_INSTALL_CREATE_DIRECTORY', JText::_('JLIB_INSTALLER_' . $this->route),
							$this->parent->getPath('extension_root')
						)
					);
>>>>>>> upstream/master
				return false;
			}
		}

		// If we're updating at this point when there is always going to be an extension_root find the old XML files
<<<<<<< HEAD
		if($this->route == 'update')
		{
			// Hunt for the original XML file
			$old_manifest = null;
			$tmpInstaller = new JInstaller(); // create a new installer because findManifest sets stuff; side effects!
=======
		if ($this->route == 'update')
		{
			// Hunt for the original XML file
			$old_manifest = null;
			$tmpInstaller = new JInstaller; // create a new installer because findManifest sets stuff; side effects!
>>>>>>> upstream/master
			// Look in the extension root
			$tmpInstaller->setPath('source', $this->parent->getPath('extension_root'));
			if ($tmpInstaller->findManifest())
			{
				$old_manifest = $tmpInstaller->getManifest();
				$this->oldFiles = $old_manifest->files;
			}
		}

<<<<<<< HEAD
		 // If we created the plugin directory and will want to remove it if we
		 // have to roll back the installation, let's add it to the installation
		 // step stack

		if ($created) {
			$this->parent->pushStep(array ('type' => 'folder', 'path' => $this->parent->getPath('extension_root')));
=======
		// If we created the plugin directory and will want to remove it if we
		// have to roll back the installation, let's add it to the installation
		// step stack

		if ($created)
		{
			$this->parent->pushStep(array('type' => 'folder', 'path' => $this->parent->getPath('extension_root')));
>>>>>>> upstream/master
		}

		// Copy all necessary files
		if ($this->parent->parseFiles($xml->files, -1, $this->oldFiles) === false)
		{
			// Install failed, roll back changes
			$this->parent->abort();
			return false;
		}

		// Parse optional tags -- media and language files for plugins go in admin app
		$this->parent->parseMedia($xml->media, 1);
		$this->parent->parseLanguages($xml->languages, 1);

		// If there is a manifest script, lets copy it.
		if ($this->get('manifest_script'))
		{
<<<<<<< HEAD
			$path['src'] = $this->parent->getPath('source').DS.$this->get('manifest_script');
			$path['dest'] = $this->parent->getPath('extension_root').DS.$this->get('manifest_script');

			if (!file_exists($path['dest']))
			{
				if (!$this->parent->copyFiles(array ($path)))
				{
					// Install failed, rollback changes
					$this->parent->abort(JText::sprintf('JLIB_INSTALLER_ABORT_PLG_INSTALL_MANIFEST', JText::_('JLIB_INSTALLER_'.$this->route)));
=======
			$path['src'] = $this->parent->getPath('source') . '/' . $this->get('manifest_script');
			$path['dest'] = $this->parent->getPath('extension_root') . '/' . $this->get('manifest_script');

			if (!file_exists($path['dest']))
			{
				if (!$this->parent->copyFiles(array($path)))
				{
					// Install failed, rollback changes
					$this->parent
						->abort(JText::sprintf('JLIB_INSTALLER_ABORT_PLG_INSTALL_MANIFEST', JText::_('JLIB_INSTALLER_' . $this->route)));
>>>>>>> upstream/master
					return false;
				}
			}
		}

<<<<<<< HEAD
		 // Database Processing Section
=======
		// Database Processing Section
>>>>>>> upstream/master

		$row = JTable::getInstance('extension');
		// Was there a plugin with the same name already installed?
		if ($id)
		{
			if (!$this->parent->getOverwrite())
			{
				// Install failed, roll back changes
<<<<<<< HEAD
				$this->parent->abort(JText::sprintf('JLIB_INSTALLER_ABORT_PLG_INSTALL_ALLREADY_EXISTS', JText::_('JLIB_INSTALLER_'.$this->route), $this->get('name')));
=======
				$this->parent
					->abort(
						JText::sprintf(
							'JLIB_INSTALLER_ABORT_PLG_INSTALL_ALLREADY_EXISTS', JText::_('JLIB_INSTALLER_' . $this->route),
							$this->get('name')
						)
					);
>>>>>>> upstream/master
				return false;
			}
			$row->load($id);
			$row->name = $this->get('name');
			$row->manifest_cache = $this->parent->generateManifestCache();
			$row->store(); // update the manifest cache and name
		}
		else
		{
			// Store in the extensions table (1.6)
			$row->name = $this->get('name');
			$row->type = 'plugin';
			$row->ordering = 0;
			$row->element = $element;
			$row->folder = $group;
			$row->enabled = 0;
			$row->protected = 0;
			$row->access = 1;
			$row->client_id = 0;
			$row->params = $this->parent->getParams();
			// Custom data
			$row->custom_data = '';
			// System data
			$row->system_data = '';
			$row->manifest_cache = $this->parent->generateManifestCache();

			// Editor plugins are published by default
<<<<<<< HEAD
			if ($group == 'editors') {
=======
			if ($group == 'editors')
			{
>>>>>>> upstream/master
				$row->enabled = 1;
			}

			if (!$row->store())
			{
				// Install failed, roll back changes
<<<<<<< HEAD
				$this->parent->abort(JText::sprintf('JLIB_INSTALLER_ABORT_PLG_INSTALL_ROLLBACK', JText::_('JLIB_INSTALLER_'.$this->route), $db->stderr(true)));
=======
				$this->parent
					->abort(
						JText::sprintf('JLIB_INSTALLER_ABORT_PLG_INSTALL_ROLLBACK', JText::_('JLIB_INSTALLER_' . $this->route), $db->stderr(true))
					);
>>>>>>> upstream/master
				return false;
			}

			// Since we have created a plugin item, we add it to the installation step stack
			// so that if we have to rollback the changes we can undo it.
<<<<<<< HEAD
			$this->parent->pushStep(array ('type' => 'extension', 'id' => $row->extension_id));
			$id = $row->extension_id;
		}

		 // Let's run the queries for the module
		 //	If Joomla 1.5 compatible, with discreet sql files - execute appropriate
		 //	file for utf-8 support or non-utf-8 support

		// Try for Joomla 1.5 type queries
		// Second argument is the utf compatible version attribute
		if(strtolower($this->route) == 'install') {
=======
			$this->parent->pushStep(array('type' => 'extension', 'id' => $row->extension_id));
			$id = $row->extension_id;
		}

		// Let's run the queries for the module
		//	If Joomla 1.5 compatible, with discreet sql files - execute appropriate
		//	file for utf-8 support or non-utf-8 support

		// Try for Joomla 1.5 type queries
		// Second argument is the utf compatible version attribute
		if (strtolower($this->route) == 'install')
		{
>>>>>>> upstream/master
			$utfresult = $this->parent->parseSQLFiles($this->manifest->install->sql);
			if ($utfresult === false)
			{
				// Install failed, rollback changes
<<<<<<< HEAD
				$this->parent->abort(JText::sprintf('JLIB_INSTALLER_ABORT_PLG_INSTALL_SQL_ERROR', JText::_('JLIB_INSTALLER_'.$this->route), $db->stderr(true)));
=======
				$this->parent
					->abort(
						JText::sprintf('JLIB_INSTALLER_ABORT_PLG_INSTALL_SQL_ERROR', JText::_('JLIB_INSTALLER_' . $this->route), $db->stderr(true))
					);
>>>>>>> upstream/master
				return false;
			}

			// Set the schema version to be the latest update version
<<<<<<< HEAD
			if($this->manifest->update) {
				$this->parent->setSchemaVersion($this->manifest->update->schemas, $row->extension_id);
			}
		} else if(strtolower($this->route) == 'update') {
			if($this->manifest->update)
=======
			if ($this->manifest->update)
			{
				$this->parent->setSchemaVersion($this->manifest->update->schemas, $row->extension_id);
			}
		}
		else if (strtolower($this->route) == 'update')
		{
			if ($this->manifest->update)
>>>>>>> upstream/master
			{
				$result = $this->parent->parseSchemaUpdates($this->manifest->update->schemas, $row->extension_id);
				if ($result === false)
				{
					// Install failed, rollback changes
					$this->parent->abort(JText::sprintf('JLIB_INSTALLER_ABORT_PLG_UPDATE_SQL_ERROR', $db->stderr(true)));
					return false;
				}
			}
		}

		// Start Joomla! 1.6
		ob_start();
		ob_implicit_flush(false);
<<<<<<< HEAD
		if ($this->parent->manifestClass && method_exists($this->parent->manifestClass,$this->route))
		{
			if($this->parent->manifestClass->{$this->route}($this) === false)
=======
		if ($this->parent->manifestClass && method_exists($this->parent->manifestClass, $this->route))
		{
			if ($this->parent->manifestClass->{$this->route}($this) === false)
>>>>>>> upstream/master
			{
				// Install failed, rollback changes
				$this->parent->abort(JText::_('JLIB_INSTALLER_ABORT_PLG_INSTALL_CUSTOM_INSTALL_FAILURE'));
				return false;
			}
		}
		// Append messages
		$msg .= ob_get_contents();
		ob_end_clean();

		// Finalization and Cleanup Section

		// Lastly, we will copy the manifest file to its appropriate place.
		if (!$this->parent->copyManifest(-1))
		{
			// Install failed, rollback changes
<<<<<<< HEAD
			$this->parent->abort(JText::sprintf('JLIB_INSTALLER_ABORT_PLG_INSTALL_COPY_SETUP', JText::_('JLIB_INSTALLER_'.$this->route)));
=======
			$this->parent->abort(JText::sprintf('JLIB_INSTALLER_ABORT_PLG_INSTALL_COPY_SETUP', JText::_('JLIB_INSTALLER_' . $this->route)));
>>>>>>> upstream/master
			return false;
		}
		// And now we run the postflight
		ob_start();
		ob_implicit_flush(false);
<<<<<<< HEAD
		if ($this->parent->manifestClass && method_exists($this->parent->manifestClass,'postflight'))
=======
		if ($this->parent->manifestClass && method_exists($this->parent->manifestClass, 'postflight'))
>>>>>>> upstream/master
		{
			$this->parent->manifestClass->postflight($this->route, $this);
		}
		// Append messages
		$msg .= ob_get_contents();
		ob_end_clean();
<<<<<<< HEAD
		if ($msg != '') {
=======
		if ($msg != '')
		{
>>>>>>> upstream/master
			$this->parent->set('extension_message', $msg);
		}
		return $id;
	}

	/**
	 * Custom update method
	 *
<<<<<<< HEAD
	 * @return	boolean	True on success
	 * @since	11.1
=======
	 * @return   boolean  True on success
	 *
	 * @since    11.1
>>>>>>> upstream/master
	 */
	function update()
	{
		// Set the overwrite setting
		$this->parent->setOverwrite(true);
		$this->parent->setUpgrade(true);
		// Set the route for the install
		$this->route = 'update';
		// Go to install which handles updates properly
		return $this->install();
	}

	/**
	 * Custom uninstall method
<<<<<<< HEAD
	 * @param   integer  $id	The id of the plugin to uninstall

	 * @return  boolean  True on success
=======
	 *
	 * @param   integer  $id  The id of the plugin to uninstall
	 *
	 * @return  boolean  True on success
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function uninstall($id)
	{
<<<<<<< HEAD
		// Initialise variables.
		$row	= null;
		$retval = true;
		$db		= $this->parent->getDbo();
=======
		$this->route = 'uninstall';

		// Initialise variables.
		$row = null;
		$retval = true;
		$db = $this->parent->getDbo();
>>>>>>> upstream/master

		// First order of business will be to load the plugin object table from the database.
		// This should give us the necessary information to proceed.
		$row = JTable::getInstance('extension');
		if (!$row->load((int) $id))
		{
			JError::raiseWarning(100, JText::_('JLIB_INSTALLER_ERROR_PLG_UNINSTALL_ERRORUNKOWNEXTENSION'));
			return false;
		}

		// Is the plugin we are trying to uninstall a core one?
		// Because that is not a good idea...
		if ($row->protected)
		{
			JError::raiseWarning(100, JText::sprintf('JLIB_INSTALLER_ERROR_PLG_UNINSTALL_WARNCOREPLUGIN', $row->name));
			return false;
		}

		// Get the plugin folder so we can properly build the plugin path
		if (trim($row->folder) == '')
		{
			JError::raiseWarning(100, JText::_('JLIB_INSTALLER_ERROR_PLG_UNINSTALL_FOLDER_FIELD_EMPTY'));
			return false;
		}

		// Set the plugin root path
<<<<<<< HEAD
		if (is_dir(JPATH_PLUGINS.DS.$row->folder.DS.$row->element)) {
			// Use 1.6 plugins
			$this->parent->setPath('extension_root', JPATH_PLUGINS.DS.$row->folder.DS.$row->element);
		}
		else {
			// Use Legacy 1.5 plugins
			$this->parent->setPath('extension_root', JPATH_PLUGINS.DS.$row->folder);
=======
		if (is_dir(JPATH_PLUGINS . '/' . $row->folder . '/' . $row->element))
		{
			// Use 1.6 plugins
			$this->parent->setPath('extension_root', JPATH_PLUGINS . '/' . $row->folder . '/' . $row->element);
		}
		else
		{
			// Use Legacy 1.5 plugins
			$this->parent->setPath('extension_root', JPATH_PLUGINS . '/' . $row->folder);
>>>>>>> upstream/master
		}

		// Because 1.5 plugins don't have their own folders we cannot use the standard method of finding an installation manifest
		// Since 1.6 they do, however until we move to 1.7 and remove 1.6 legacy we still need to use this method.
		// When we get there it'll be something like "$this->parent->findManifest();$manifest = $this->parent->getManifest();"
<<<<<<< HEAD
		$manifestFile = $this->parent->getPath('extension_root').DS.$row->element.'.xml';

		if ( ! file_exists($manifestFile))
=======
		$manifestFile = $this->parent->getPath('extension_root') . '/' . $row->element . '.xml';

		if (!file_exists($manifestFile))
>>>>>>> upstream/master
		{
			JError::raiseWarning(100, JText::_('JLIB_INSTALLER_ERROR_PLG_UNINSTALL_INVALID_NOTFOUND_MANIFEST'));
			return false;
		}

		$xml = JFactory::getXML($manifestFile);

		$this->manifest = $xml;

		// If we cannot load the XML file return null
		if (!$xml)
		{
			JError::raiseWarning(100, JText::_('JLIB_INSTALLER_ERROR_PLG_UNINSTALL_LOAD_MANIFEST'));
			return false;
		}

		/*
		 * Check for a valid XML root tag.
		 * @todo: Remove backwards compatability in a future version
		 * Should be 'extension', but for backward compatability we will accept 'install'.
		 */
		if ($xml->getName() != 'install' && $xml->getName() != 'extension')
		{
			JError::raiseWarning(100, JText::_('JLIB_INSTALLER_ERROR_PLG_UNINSTALL_INVALID_MANIFEST'));
			return false;
		}

		// Attempt to load the language file; might have uninstall strings
<<<<<<< HEAD
		$this->parent->setPath('source', JPATH_PLUGINS .'/'.$row->folder.'/'.$row->element);
		$this->loadLanguage(JPATH_PLUGINS .'/'.$row->folder.'/'.$row->element);
=======
		$this->parent->setPath('source', JPATH_PLUGINS . '/' . $row->folder . '/' . $row->element);
		$this->loadLanguage(JPATH_PLUGINS . '/' . $row->folder . '/' . $row->element);
>>>>>>> upstream/master

		// Installer Trigger Loading

		// If there is an manifest class file, let's load it; we'll copy it later (don't have dest yet)
<<<<<<< HEAD
		$manifestScript = (string)$xml->scriptfile;
		if ($manifestScript)
		{
			$manifestScriptFile = $this->parent->getPath('source').DS.$manifestScript;
			if (is_file($manifestScriptFile)) {
				// Load the file
				include_once $manifestScriptFile;
			}
			// Set the class name
			$classname = 'plg'.$row->folder.$row->element.'InstallerScript';
=======
		$manifestScript = (string) $xml->scriptfile;
		if ($manifestScript)
		{
			$manifestScriptFile = $this->parent->getPath('source') . '/' . $manifestScript;
			if (is_file($manifestScriptFile))
			{
				// Load the file
				include_once $manifestScriptFile;
			}
			// If a dash is present in the folder, remove it
			$folderClass = str_replace('-', '', $row->folder);
			// Set the class name
			$classname = 'plg' . $folderClass . $row->element . 'InstallerScript';
>>>>>>> upstream/master
			if (class_exists($classname))
			{
				// Create a new instance
				$this->parent->manifestClass = new $classname($this);
				// And set this so we can copy it later
				$this->set('manifest_script', $manifestScript);
<<<<<<< HEAD
=======

>>>>>>> upstream/master
				// Note: if we don't find the class, don't bother to copy the file
			}
		}

		// Run preflight if possible (since we know we're not an update)
		ob_start();
		ob_implicit_flush(false);
<<<<<<< HEAD
		if ($this->parent->manifestClass && method_exists($this->parent->manifestClass,'preflight'))
		{
			if($this->parent->manifestClass->preflight($this->route, $this) === false)
=======
		if ($this->parent->manifestClass && method_exists($this->parent->manifestClass, 'preflight'))
		{
			if ($this->parent->manifestClass->preflight($this->route, $this) === false)
>>>>>>> upstream/master
			{
				// Install failed, rollback changes
				$this->parent->abort(JText::_('JLIB_INSTALLER_ABORT_PLG_INSTALL_CUSTOM_INSTALL_FAILURE'));
				return false;
			}
		}
		// Create msg object; first use here
		$msg = ob_get_contents();
		ob_end_clean();

		// Let's run the queries for the module
		// If Joomla 1.5 compatible, with discreet sql files - execute appropriate
		// file for utf-8 support or non-utf-8 support

		// Try for Joomla 1.5 type queries
		// Second argument is the utf compatible version attribute
		$utfresult = $this->parent->parseSQLFiles($xml->{strtolower($this->route)}->sql);
		if ($utfresult === false)
		{
			// Install failed, rollback changes
			$this->parent->abort(JText::sprintf('JLIB_INSTALLER_ABORT_PLG_UNINSTALL_SQL_ERROR', $db->stderr(true)));
			return false;
		}

		// Start Joomla! 1.6
		ob_start();
		ob_implicit_flush(false);
<<<<<<< HEAD
		if ($this->parent->manifestClass && method_exists($this->parent->manifestClass,'uninstall'))
=======
		if ($this->parent->manifestClass && method_exists($this->parent->manifestClass, 'uninstall'))
>>>>>>> upstream/master
		{
			$this->parent->manifestClass->uninstall($this);
		}
		// Append messages
		$msg = ob_get_contents();
		ob_end_clean();

<<<<<<< HEAD

=======
>>>>>>> upstream/master
		// Remove the plugin files
		$this->parent->removeFiles($xml->images, -1);
		$this->parent->removeFiles($xml->files, -1);
		JFile::delete($manifestFile);

		// Remove all media and languages as well
		$this->parent->removeFiles($xml->media);
		$this->parent->removeFiles($xml->languages, 1);

		// Remove the schema version
		$query = $db->getQuery(true);
<<<<<<< HEAD
		$query->delete()->from('#__schemas')->where('extension_id = '. $row->extension_id);
=======
		$query->delete()->from('#__schemas')->where('extension_id = ' . $row->extension_id);
>>>>>>> upstream/master
		$db->setQuery($query);
		$db->Query();

		// Now we will no longer need the plugin object, so let's delete it
		$row->delete($row->extension_id);
<<<<<<< HEAD
		unset ($row);
=======
		unset($row);
>>>>>>> upstream/master

		// If the folder is empty, let's delete it
		$files = JFolder::files($this->parent->getPath('extension_root'));

		JFolder::delete($this->parent->getPath('extension_root'));

<<<<<<< HEAD
		if ($msg) {
			$this->parent->set('extension_message',$msg);
=======
		if ($msg)
		{
			$this->parent->set('extension_message', $msg);
>>>>>>> upstream/master
		}

		return $retval;
	}

	/**
	 * Custom discover method
	 *
	 * @return  array  JExtension) list of extensions available
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	function discover()
	{
		$results = Array();
<<<<<<< HEAD
		$folder_list = JFolder::folders(JPATH_SITE.DS.'plugins');

		foreach ($folder_list as $folder)
		{
			$file_list = JFolder::files(JPATH_SITE.DS.'plugins'.DS.$folder,'\.xml$');
			foreach ($file_list as $file)
			{
				$manifest_details = JApplicationHelper::parseXMLInstallFile(JPATH_SITE.'/plugins/'.$folder.'/'.$file);
				$file = JFile::stripExt($file);
				// Ignore example plugins
				if ($file == 'example') continue;
=======
		$folder_list = JFolder::folders(JPATH_SITE . '/plugins');

		foreach ($folder_list as $folder)
		{
			$file_list = JFolder::files(JPATH_SITE . '/plugins/' . $folder, '\.xml$');
			foreach ($file_list as $file)
			{
				$manifest_details = JApplicationHelper::parseXMLInstallFile(JPATH_SITE . '/plugins/' . $folder . '/' . $file);
				$file = JFile::stripExt($file);
				// Ignore example plugins
				if ($file == 'example')
				{
					continue;
				}

>>>>>>> upstream/master
				$extension = JTable::getInstance('extension');
				$extension->set('type', 'plugin');
				$extension->set('client_id', 0);
				$extension->set('element', $file);
				$extension->set('folder', $folder);
				$extension->set('name', $file);
				$extension->set('state', -1);
				$extension->set('manifest_cache', json_encode($manifest_details));
				$results[] = $extension;
			}
<<<<<<< HEAD
			$folder_list = JFolder::folders(JPATH_SITE.DS.'plugins'.DS.$folder);
			foreach ($folder_list as $plugin_folder)
			{
				$file_list = JFolder::files(JPATH_SITE.DS.'plugins'.DS.$folder.DS.$plugin_folder,'\.xml$');
				foreach ($file_list as $file)
				{
					$manifest_details = JApplicationHelper::parseXMLInstallFile(JPATH_SITE.'/plugins/'.$folder.'/'.$plugin_folder.'/'.$file);
					$file = JFile::stripExt($file);
					if ($file == 'example') continue; // ignore example plugins
=======
			$folder_list = JFolder::folders(JPATH_SITE . '/plugins/' . $folder);
			foreach ($folder_list as $plugin_folder)
			{
				$file_list = JFolder::files(JPATH_SITE . '/plugins/' . $folder . '/' . $plugin_folder, '\.xml$');
				foreach ($file_list as $file)
				{
					$manifest_details = JApplicationHelper::parseXMLInstallFile(
						JPATH_SITE . '/plugins/' . $folder . '/' . $plugin_folder . '/' . $file
					);
					$file = JFile::stripExt($file);

					if ($file == 'example')
					{
						continue;
					}

					// ignore example plugins
>>>>>>> upstream/master
					$extension = JTable::getInstance('extension');
					$extension->set('type', 'plugin');
					$extension->set('client_id', 0);
					$extension->set('element', $file);
					$extension->set('folder', $folder);
					$extension->set('name', $file);
					$extension->set('state', -1);
					$extension->set('manifest_cache', json_encode($manifest_details));
					$results[] = $extension;
				}
			}
		}
		return $results;
	}

	/**
<<<<<<< HEAD
	 * Custom discover_install method
	 *
	 * @param   integer  $id The id of the extension to install
	 *
	 * @return  mixed
=======
	 * Custom discover_install method.
	 *
	 * @return  mixed
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function discover_install()
	{
		// Plugins use the extensions table as their primary store
		// Similar to modules and templates, rather easy
		// If it's not in the extensions table we just add it
		$client = JApplicationHelper::getClientInfo($this->parent->extension->client_id);
<<<<<<< HEAD
		if (is_dir($client->path . DS . 'plugins'. DS . $this->parent->extension->folder . DS . $this->parent->extension->element)) {
			$manifestPath = $client->path . DS . 'plugins'. DS . $this->parent->extension->folder . DS . $this->parent->extension->element . DS . $this->parent->extension->element . '.xml';
		}
		else {
			$manifestPath = $client->path . DS . 'plugins'. DS . $this->parent->extension->folder . DS . $this->parent->extension->element . '.xml';
		}
		$this->parent->manifest = $this->parent->isManifest($manifestPath);
		$description = (string)$this->parent->manifest->description;
		if ($description) {
			$this->parent->set('message', JText::_($description));
		}
		else {
=======
		if (is_dir($client->path . '/plugins/' . $this->parent->extension->folder . '/' . $this->parent->extension->element))
		{
			$manifestPath = $client->path . '/plugins/' . $this->parent->extension->folder . '/' . $this->parent->extension->element . '/'
				. $this->parent->extension->element . '.xml';
		}
		else
		{
			$manifestPath = $client->path . '/plugins/' . $this->parent->extension->folder . '/' . $this->parent->extension->element . '.xml';
		}
		$this->parent->manifest = $this->parent->isManifest($manifestPath);
		$description = (string) $this->parent->manifest->description;
		if ($description)
		{
			$this->parent->set('message', JText::_($description));
		}
		else
		{
>>>>>>> upstream/master
			$this->parent->set('message', '');
		}
		$this->parent->setPath('manifest', $manifestPath);
		$manifest_details = JApplicationHelper::parseXMLInstallFile($manifestPath);
		$this->parent->extension->manifest_cache = json_encode($manifest_details);
		$this->parent->extension->state = 0;
		$this->parent->extension->name = $manifest_details['name'];
		$this->parent->extension->enabled = ('editors' == $this->parent->extension->folder) ? 1 : 0;
		$this->parent->extension->params = $this->parent->getParams();
<<<<<<< HEAD
		if ($this->parent->extension->store()) {
=======
		if ($this->parent->extension->store())
		{
>>>>>>> upstream/master
			return $this->parent->extension->get('extension_id');
		}
		else
		{
			JError::raiseWarning(101, JText::_('JLIB_INSTALLER_ERROR_PLG_DISCOVER_STORE_DETAILS'));
			return false;
		}
	}

	/**
<<<<<<< HEAD
	 * Refreshes the extension table cache
	 * @return  boolean result of operation, true if updated, false on failure
=======
	 * Refreshes the extension table cache.
	 *
	 * @return  boolean  Result of operation, true if updated, false on failure.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function refreshManifestCache()
	{
		// Plugins use the extensions table as their primary store
		// Similar to modules and templates, rather easy
		// If it's not in the extensions table we just add it
		$client = JApplicationHelper::getClientInfo($this->parent->extension->client_id);
<<<<<<< HEAD
		$manifestPath = $client->path . '/plugins/'. $this->parent->extension->folder . '/' . $this->parent->extension->element . '/' . $this->parent->extension->element . '.xml';
=======
		$manifestPath = $client->path . '/plugins/' . $this->parent->extension->folder . '/' . $this->parent->extension->element . '/'
			. $this->parent->extension->element . '.xml';
>>>>>>> upstream/master
		$this->parent->manifest = $this->parent->isManifest($manifestPath);
		$this->parent->setPath('manifest', $manifestPath);
		$manifest_details = JApplicationHelper::parseXMLInstallFile($this->parent->getPath('manifest'));
		$this->parent->extension->manifest_cache = json_encode($manifest_details);

		$this->parent->extension->name = $manifest_details['name'];
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
			JError::raiseWarning(101, JText::_('JLIB_INSTALLER_ERROR_PLG_REFRESH_MANIFEST_CACHE'));
			return false;
		}
	}
}
