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
 * Component installer
 *
 * @package     Joomla.Platform
 * @subpackage  Installer
 * @since       11.1
 */
class JInstallerComponent extends JAdapterInstance
{
<<<<<<< HEAD
	protected $manifest = null;
	protected $name = null;
	protected $element = null;
	protected $oldAdminFiles = null;
	protected $oldFiles = null;
	protected $manifest_script = null;
=======
	/**
	 * Copy of the XML manifest file
	 *
	 * @var    string
	 * @since  11.1
	 */
	protected $manifest = null;

	/**
	 * Name of the extension
	 *
	 * @var    string
	 * @since  11.1
	 * */
	protected $name = null;

	/**
	 * The unique identifier for the extension (e.g. mod_login)
	 *
	 * @var    string
	 * @since  11.1
	 * */
	protected $element = null;

	/**
	 *
	 * The list of current files fo the Joomla! CMS adminisrator that are installed and is read
	 * from the manifest on disk in the update area to handle doing a diff
	 * and deleting files that are in the old files list and not in the new
	 * files list.
	 *
	 * @var    array
	 * @since  11.1
	 * */
	protected $oldAdminFiles = null;

	/**
	 * The list of current files that are installed and is read
	 * from the manifest on disk in the update area to handle doing a diff
	 * and deleting files that are in the old files list and not in the new
	 * files list.
	 *
	 * @var    array
	 * @since  11.1
	 * */
	protected $oldFiles = null;

	/**
	 * A path to the PHP file that the scriptfile declaration in
	 * the manifest refers to.
	 *
	 * @var    string
	 * @since  11.1
	 * */
	protected $manifest_script = null;

	/**
	 * For legacy installations this is a path to the PHP file that the scriptfile declaration in the
	 * manifest refers to.
	 *
	 * @var    string
	 * @since  11.1
	 * */
>>>>>>> upstream/master
	protected $install_script = null;

	/**
	 * Custom loadLanguage method
	 *
<<<<<<< HEAD
	 * @param   string  $path the path where to find language files
	 *
	 * @return  void
	 * @since   11.1
	 */
	public function loadLanguage($path=null)
	{
		$source = $this->parent->getPath('source');

		if (!$source) {
			$this->parent->setPath('source', ($this->parent->extension->client_id ? JPATH_ADMINISTRATOR : JPATH_SITE).'/components/'.$this->parent->extension->element);
		}

		$this->manifest = $this->parent->getManifest();
		$name = strtolower(JFilterInput::getInstance()->clean((string)$this->manifest->name, 'cmd'));

		if (substr($name, 0, 4)=="com_") {
			$extension = $name;
		}
		else {
			$extension = "com_$name";
		}

		$lang	= JFactory::getLanguage();
		$source = $path ? $path : ($this->parent->extension->client_id ? JPATH_ADMINISTRATOR : JPATH_SITE).'/components/'.$extension;

		if ($this->manifest->administration->files) {
			$element = $this->manifest->administration->files;
		}
		else if ($this->manifest->files) {
			$element = $this->manifest->files;
		}
		else {
			$element = null;
		}

		if ($element) {
			$folder = (string)$element->attributes()->folder;

			if ($folder && file_exists("$path/$folder")) {
				$source = "$path/$folder";
			}
		}
			$lang->load($extension.'.sys', $source, null, false, false)
		||	$lang->load($extension.'.sys', JPATH_ADMINISTRATOR, null, false, false)
		||	$lang->load($extension.'.sys', $source, $lang->getDefault(), false, false)
		||	$lang->load($extension.'.sys', JPATH_ADMINISTRATOR, $lang->getDefault(), false, false);
	}
=======
	 * @param   string  $path  The path language files are on.
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
			$this->parent
				->setPath(
					'source',
					($this->parent->extension->client_id ? JPATH_ADMINISTRATOR : JPATH_SITE) .
						'/components/' . $this->parent->extension->element
				);
		}

		$this->manifest = $this->parent->getManifest();
		$name = strtolower(JFilterInput::getInstance()->clean((string) $this->manifest->name, 'cmd'));

		if (substr($name, 0, 4) == "com_")
		{
			$extension = $name;
		}
		else
		{
			$extension = "com_$name";
		}

		$lang = JFactory::getLanguage();
		$source = $path ? $path : ($this->parent->extension->client_id ? JPATH_ADMINISTRATOR : JPATH_SITE) . '/components/' . $extension;

		if ($this->manifest->administration->files)
		{
			$element = $this->manifest->administration->files;
		}
		else if ($this->manifest->files)
		{
			$element = $this->manifest->files;
		}
		else
		{
			$element = null;
		}

		if ($element)
		{
			$folder = (string) $element->attributes()->folder;

			if ($folder && file_exists("$path/$folder"))
			{
				$source = "$path/$folder";
			}
		}
		$lang->load($extension . '.sys', $source, null, false, false) || $lang->load($extension . '.sys', JPATH_ADMINISTRATOR, null, false, false)
			|| $lang->load($extension . '.sys', $source, $lang->getDefault(), false, false)
			|| $lang->load($extension . '.sys', JPATH_ADMINISTRATOR, $lang->getDefault(), false, false);
	}

>>>>>>> upstream/master
	/**
	 * Custom install method for components
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

		// Manifest Document Setup Section

<<<<<<< HEAD
		// Set the extensions name
		$name = strtolower(JFilterInput::getInstance()->clean((string)$this->manifest->name, 'cmd'));
		if (substr($name, 0, 4)=="com_") {
			$element = $name;
		}
		else {
=======
		// Set the extension's name
		$name = strtolower(JFilterInput::getInstance()->clean((string) $this->manifest->name, 'cmd'));
		if (substr($name, 0, 4) == "com_")
		{
			$element = $name;
		}
		else
		{
>>>>>>> upstream/master
			$element = "com_$name";
		}

		$this->set('name', $name);
		$this->set('element', $element);

		// Get the component description
<<<<<<< HEAD
		$this->parent->set('message', JText::_((string)$this->manifest->description));

		// Set the installation target paths
		$this->parent->setPath('extension_site', JPath::clean(JPATH_SITE.DS.'components'.DS.$this->get('element')));
		$this->parent->setPath('extension_administrator', JPath::clean(JPATH_ADMINISTRATOR.DS.'components'.DS.$this->get('element')));
		$this->parent->setPath('extension_root', $this->parent->getPath('extension_administrator')); // copy this as its used as a common base

		// Basic Checks Section


		// Make sure that we have an admin element
		if (!$this->manifest->administration) {
=======
		$this->parent->set('message', JText::_((string) $this->manifest->description));

		// Set the installation target paths
		$this->parent->setPath('extension_site', JPath::clean(JPATH_SITE . '/components/' . $this->get('element')));
		$this->parent->setPath('extension_administrator', JPath::clean(JPATH_ADMINISTRATOR . '/components/' . $this->get('element')));

		// copy this as its used as a common base
		$this->parent->setPath('extension_root', $this->parent->getPath('extension_administrator'));

		// Basic Checks Section

		// Make sure that we have an admin element
		if (!$this->manifest->administration)
		{
>>>>>>> upstream/master
			JError::raiseWarning(1, JText::_('JLIB_INSTALLER_ERROR_COMP_INSTALL_ADMIN_ELEMENT'));
			return false;
		}

		// Filesystem Processing Section

<<<<<<< HEAD

		// If the component site or admin directory already exists, then we will assume that the component is already
		// installed or another component is using that directory.

		if (file_exists($this->parent->getPath('extension_site')) || file_exists($this->parent->getPath('extension_administrator'))) {
			// Look for an update function or update tag
			$updateElement = $this->manifest->update;
			// Upgrade manually set
			// Update function available
			// Update tag detected

			if ($this->parent->getUpgrade() || ($this->parent->manifestClass && method_exists($this->parent->manifestClass,'update')) || $updateElement) {
				return $this->update(); // transfer control to the update function
			}
			else if (!$this->parent->getOverwrite()) {
				// Overwrite is set
				// We didn't have overwrite set, find an update function or find an update tag so lets call it safe
				if (file_exists($this->parent->getPath('extension_site'))) {
					// If the site exists say so
					JError::raiseWarning(1, JText::sprintf('JLIB_INSTALLER_ERROR_COMP_INSTALL_DIR_SITE', $this->parent->getPath('extension_site')));
				}
				else {
					// If the admin exists say so
					JError::raiseWarning(1, JText::sprintf('JLIB_INSTALLER_ERROR_COMP_INSTALL_DIR_ADMIN', $this->parent->getPath('extension_administrator')));
=======
		// If the component site or admin directory already exists, then we will assume that the component is already
		// installed or another component is using that directory.

		if (file_exists($this->parent->getPath('extension_site')) || file_exists($this->parent->getPath('extension_administrator')))
		{
			// Look for an update function or update tag
			$updateElement = $this->manifest->update;
			// Upgrade manually set or
			// Update function available or
			// Update tag detected

			if ($this->parent->getUpgrade() || ($this->parent->manifestClass && method_exists($this->parent->manifestClass, 'update'))
				|| $updateElement
			)
			{
				return $this->update(); // transfer control to the update function
			}
			else if (!$this->parent->getOverwrite())
			{
				// Overwrite is set.
				// We didn't have overwrite set, find an update function or find an update tag so lets call it safe
				if (file_exists($this->parent->getPath('extension_site')))
				{
					// If the site exists say so.
					JError::raiseWarning(1, JText::sprintf('JLIB_INSTALLER_ERROR_COMP_INSTALL_DIR_SITE', $this->parent->getPath('extension_site')));
				}
				else
				{
					// If the admin exists say so
					JError::raiseWarning(
						1,
						JText::sprintf('JLIB_INSTALLER_ERROR_COMP_INSTALL_DIR_ADMIN', $this->parent->getPath('extension_administrator'))
					);
>>>>>>> upstream/master
				}
				return false;
			}
		}

		// Installer Trigger Loading

		// If there is an manifest class file, lets load it; we'll copy it later (don't have dest yet)
<<<<<<< HEAD
		$manifestScript = (string)$this->manifest->scriptfile;

		if ($manifestScript) {
			$manifestScriptFile = $this->parent->getPath('source').DS.$manifestScript;

			if (is_file($manifestScriptFile)) {
=======
		$manifestScript = (string) $this->manifest->scriptfile;

		if ($manifestScript)
		{
			$manifestScriptFile = $this->parent->getPath('source') . '/' . $manifestScript;

			if (is_file($manifestScriptFile))
			{
>>>>>>> upstream/master
				// Load the file
				include_once $manifestScriptFile;
			}

			// Set the class name
<<<<<<< HEAD
			$classname = $this->get('element').'InstallerScript';

			if (class_exists($classname)) {
=======
			$classname = $this->get('element') . 'InstallerScript';

			if (class_exists($classname))
			{
>>>>>>> upstream/master
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
		if ($this->parent->manifestClass && method_exists($this->parent->manifestClass,'preflight')) {
			if ($this->parent->manifestClass->preflight('install', $this) === false) {
=======
		if ($this->parent->manifestClass && method_exists($this->parent->manifestClass, 'preflight'))
		{
			if ($this->parent->manifestClass->preflight('install', $this) === false)
			{
>>>>>>> upstream/master
				// Install failed, rollback changes
				$this->parent->abort(JText::_('JLIB_INSTALLER_ABORT_COMP_INSTALL_CUSTOM_INSTALL_FAILURE'));
				return false;
			}
		}

		// Create msg object; first use here
		$msg = ob_get_contents();
		ob_end_clean();

		// If the component directory does not exist, let's create it
		$created = false;

<<<<<<< HEAD
		if (!file_exists($this->parent->getPath('extension_site'))) {
			if (!$created = JFolder::create($this->parent->getPath('extension_site'))) {
				JError::raiseWarning(1, JText::sprintf('JLIB_INSTALLER_ERROR_COMP_INSTALL_FAILED_TO_CREATE_DIRECTORY_SITE', $this->parent->getPath('extension_site')));
=======
		if (!file_exists($this->parent->getPath('extension_site')))
		{
			if (!$created = JFolder::create($this->parent->getPath('extension_site')))
			{
				JError::raiseWarning(
					1,
					JText::sprintf('JLIB_INSTALLER_ERROR_COMP_INSTALL_FAILED_TO_CREATE_DIRECTORY_SITE', $this->parent->getPath('extension_site'))
				);
>>>>>>> upstream/master
				return false;
			}
		}

		// Since we created the component directory and will want to remove it if we have to roll back
		// the installation, let's add it to the installation step stack

<<<<<<< HEAD
		if ($created) {
			$this->parent->pushStep(array ('type' => 'folder', 'path' => $this->parent->getPath('extension_site')));
=======
		if ($created)
		{
			$this->parent->pushStep(array('type' => 'folder', 'path' => $this->parent->getPath('extension_site')));
>>>>>>> upstream/master
		}

		// If the component admin directory does not exist, let's create it
		$created = false;

<<<<<<< HEAD
		if (!file_exists($this->parent->getPath('extension_administrator'))) {
			if (!$created = JFolder::create($this->parent->getPath('extension_administrator'))) {
				JError::raiseWarning(1, JText::sprintf('JLIB_INSTALLER_ERROR_COMP_INSTALL_FAILED_TO_CREATE_DIRECTORY_ADMIN', $this->parent->getPath('extension_administrator')));
=======
		if (!file_exists($this->parent->getPath('extension_administrator')))
		{
			if (!$created = JFolder::create($this->parent->getPath('extension_administrator')))
			{
				JError::raiseWarning(
					1,
					JText::sprintf(
						'JLIB_INSTALLER_ERROR_COMP_INSTALL_FAILED_TO_CREATE_DIRECTORY_ADMIN',
						$this->parent->getPath('extension_administrator')
					)
				);
>>>>>>> upstream/master
				// Install failed, rollback any changes
				$this->parent->abort();

				return false;
			}
		}

		/*
		 * Since we created the component admin directory and we will want to remove it if we have to roll
<<<<<<< HEAD
		 * back the installation, lets add it to the installation step stack
		 */
		if ($created) {
			$this->parent->pushStep(array ('type' => 'folder', 'path' => $this->parent->getPath('extension_administrator')));
		}

		// Copy site files
		if ($this->manifest->files) {
			if ($this->parent->parseFiles($this->manifest->files) === false) {
=======
		 * back the installation, let's add it to the installation step stack
		 */
		if ($created)
		{
			$this->parent->pushStep(array('type' => 'folder', 'path' => $this->parent->getPath('extension_administrator')));
		}

		// Copy site files
		if ($this->manifest->files)
		{
			if ($this->parent->parseFiles($this->manifest->files) === false)
			{
>>>>>>> upstream/master
				// Install failed, rollback any changes
				$this->parent->abort();

				return false;
			}
		}

		// Copy admin files
<<<<<<< HEAD
		if ($this->manifest->administration->files) {
			if ($this->parent->parseFiles($this->manifest->administration->files, 1) === false) {
=======
		if ($this->manifest->administration->files)
		{
			if ($this->parent->parseFiles($this->manifest->administration->files, 1) === false)
			{
>>>>>>> upstream/master
				// Install failed, rollback any changes
				$this->parent->abort();

				return false;
			}
		}

		// Parse optional tags
		$this->parent->parseMedia($this->manifest->media);
		$this->parent->parseLanguages($this->manifest->languages);
		$this->parent->parseLanguages($this->manifest->administration->languages, 1);

		// Deprecated install, remove after 1.6
		// If there is an install file, lets copy it.
<<<<<<< HEAD
		$installFile = (string)$this->manifest->installfile;

		if ($installFile) {
			// Make sure it hasn't already been copied (this would be an error in the XML install file)
			if (!file_exists($this->parent->getPath('extension_administrator').DS.$installFile) || $this->parent->getOverwrite()) {
				$path['src']	= $this->parent->getPath('source').DS.$installFile;
				$path['dest']	= $this->parent->getPath('extension_administrator').DS.$installFile;

				if (!$this->parent->copyFiles(array ($path))) {
=======
		$installFile = (string) $this->manifest->installfile;

		if ($installFile)
		{
			// Make sure it hasn't already been copied (this would be an error in the XML install file)
			if (!file_exists($this->parent->getPath('extension_administrator') . '/' . $installFile) || $this->parent->getOverwrite())
			{
				$path['src'] = $this->parent->getPath('source') . '/' . $installFile;
				$path['dest'] = $this->parent->getPath('extension_administrator') . '/' . $installFile;

				if (!$this->parent->copyFiles(array($path)))
				{
>>>>>>> upstream/master
					// Install failed, rollback changes
					$this->parent->abort(JText::_('JLIB_INSTALLER_ABORT_COMP_INSTALL_PHP_INSTALL'));

					return false;
				}
			}

			$this->set('install_script', $installFile);
		}

		// Deprecated uninstall, remove after 1.6
<<<<<<< HEAD
		// If there is an uninstall file, lets copy it.
		$uninstallFile = (string)$this->manifest->uninstallfile;

		if ($uninstallFile) {
			// Make sure it hasn't already been copied (this would be an error in the XML install file)
			if (!file_exists($this->parent->getPath('extension_administrator').DS.$uninstallFile) || $this->parent->getOverwrite()) {
				$path['src'] = $this->parent->getPath('source').DS.$uninstallFile;
				$path['dest'] = $this->parent->getPath('extension_administrator').DS.$uninstallFile;

				if (!$this->parent->copyFiles(array ($path))) {
=======
		// If there is an uninstall file, let's copy it.
		$uninstallFile = (string) $this->manifest->uninstallfile;

		if ($uninstallFile)
		{
			// Make sure it hasn't already been copied (this would be an error in the XML install file)
			if (!file_exists($this->parent->getPath('extension_administrator') . '/' . $uninstallFile) || $this->parent->getOverwrite())
			{
				$path['src'] = $this->parent->getPath('source') . '/' . $uninstallFile;
				$path['dest'] = $this->parent->getPath('extension_administrator') . '/' . $uninstallFile;

				if (!$this->parent->copyFiles(array($path)))
				{
>>>>>>> upstream/master
					// Install failed, rollback changes
					$this->parent->abort(JText::_('JLIB_INSTALLER_ABORT_COMP_INSTALL_PHP_UNINSTALL'));
					return false;
				}
			}
		}

<<<<<<< HEAD
		// If there is a manifest script, lets copy it.
		if ($this->get('manifest_script')) {
			$path['src'] = $this->parent->getPath('source').DS.$this->get('manifest_script');
			$path['dest'] = $this->parent->getPath('extension_administrator').DS.$this->get('manifest_script');

			if (!file_exists($path['dest']) || $this->parent->getOverwrite()) {
				if (!$this->parent->copyFiles(array ($path))) {
=======
		// If there is a manifest script, let's copy it.
		if ($this->get('manifest_script'))
		{
			$path['src'] = $this->parent->getPath('source') . '/' . $this->get('manifest_script');
			$path['dest'] = $this->parent->getPath('extension_administrator') . '/' . $this->get('manifest_script');

			if (!file_exists($path['dest']) || $this->parent->getOverwrite())
			{
				if (!$this->parent->copyFiles(array($path)))
				{
>>>>>>> upstream/master
					// Install failed, rollback changes
					$this->parent->abort(JText::_('JLIB_INSTALLER_ABORT_COMP_INSTALL_MANIFEST'));

					return false;
				}
			}
		}

		/**
		 * ---------------------------------------------------------------------------------------------
		 * Database Processing Section
		 * ---------------------------------------------------------------------------------------------
		 */

		/*
		 * Let's run the install queries for the component
<<<<<<< HEAD
		 *	If Joomla 1.5 compatible, with discreet sql files - execute appropriate
		 *	file for utf-8 support or non-utf-8 support
		 */
		// try for Joomla 1.5 type queries
		// second argument is the utf compatible version attribute
		if (isset($this->manifest->install->sql)) {
			$utfresult = $this->parent->parseSQLFiles($this->manifest->install->sql);

			if ($utfresult === false) {
=======
		 * If Joomla 1.5 compatible, with discreet sql files - execute appropriate
		 * file for utf-8 support or non-utf-8 support
		 */
		// Try for Joomla 1.5 type queries
		// Second argument is the utf compatible version attribute
		if (isset($this->manifest->install->sql))
		{
			$utfresult = $this->parent->parseSQLFiles($this->manifest->install->sql);

			if ($utfresult === false)
			{
>>>>>>> upstream/master
				// Install failed, rollback changes
				$this->parent->abort(JText::sprintf('JLIB_INSTALLER_ABORT_COMP_INSTALL_SQL_ERROR', $db->stderr(true)));

				return false;
			}
		}

		/**
		 * ---------------------------------------------------------------------------------------------
		 * Custom Installation Script Section
		 * ---------------------------------------------------------------------------------------------
		 */

		/*
<<<<<<< HEAD
		 * If we have an install script, lets include it, execute the custom
		 * install method, and append the return value from the custom install
		 * method to the installation message.
		 */
		// start legacy support
		if ($this->get('install_script')) {
			if (is_file($this->parent->getPath('extension_administrator').DS.$this->get('install_script')) || $this->parent->getOverwrite()) {
=======
		 * If we have an install script, let's include it, execute the custom
		 * install method, and append the return value from the custom install
		 * method to the installation message.
		 */
		// Start legacy support
		if ($this->get('install_script'))
		{
			if (is_file($this->parent->getPath('extension_administrator') . '/' . $this->get('install_script')) || $this->parent->getOverwrite())
			{
>>>>>>> upstream/master
				$notdef = false;
				$ranwell = false;
				ob_start();
				ob_implicit_flush(false);

<<<<<<< HEAD
				require_once $this->parent->getPath('extension_administrator').DS.$this->get('install_script');

				if (function_exists('com_install')) {
					if (com_install() === false) {
=======
				require_once $this->parent->getPath('extension_administrator') . '/' . $this->get('install_script');

				if (function_exists('com_install'))
				{
					if (com_install() === false)
					{
>>>>>>> upstream/master
						$this->parent->abort(JText::_('JLIB_INSTALLER_ABORT_COMP_INSTALL_CUSTOM_INSTALL_FAILURE'));

						return false;
					}
				}

				$msg .= ob_get_contents(); // append messages
				ob_end_clean();
			}
		}

<<<<<<< HEAD
		// end legacy support
=======
		// End legacy support
>>>>>>> upstream/master
		// Start Joomla! 1.6
		ob_start();
		ob_implicit_flush(false);

<<<<<<< HEAD
		if ($this->parent->manifestClass && method_exists($this->parent->manifestClass,'install')) {
			if ($this->parent->manifestClass->install($this) === false) {
=======
		if ($this->parent->manifestClass && method_exists($this->parent->manifestClass, 'install'))
		{
			if ($this->parent->manifestClass->install($this) === false)
			{
>>>>>>> upstream/master
				// Install failed, rollback changes
				$this->parent->abort(JText::_('JLIB_INSTALLER_ABORT_COMP_INSTALL_CUSTOM_INSTALL_FAILURE'));

				return false;
			}
		}

<<<<<<< HEAD
		$msg .= ob_get_contents(); // append messages
=======
		// Append messages
		$msg .= ob_get_contents();
>>>>>>> upstream/master
		ob_end_clean();

		/**
		 * ---------------------------------------------------------------------------------------------
		 * Finalization and Cleanup Section
		 * ---------------------------------------------------------------------------------------------
		 */

		// Add an entry to the extension table with a whole heap of defaults
		$row = JTable::getInstance('extension');
		$row->set('name', $this->get('name'));
		$row->set('type', 'component');
		$row->set('element', $this->get('element'));
		$row->set('folder', ''); // There is no folder for components
		$row->set('enabled', 1);
		$row->set('protected', 0);
		$row->set('access', 0);
		$row->set('client_id', 1);
		$row->set('params', $this->parent->getParams());
		$row->set('manifest_cache', $this->parent->generateManifestCache());

<<<<<<< HEAD
		if (!$row->store()) {
=======
		if (!$row->store())
		{
>>>>>>> upstream/master
			// Install failed, roll back changes
			$this->parent->abort(JText::sprintf('JLIB_INSTALLER_ABORT_COMP_INSTALL_ROLLBACK', $db->stderr(true)));
			return false;
		}

		$eid = $db->insertid();

		// Clobber any possible pending updates
		$update = JTable::getInstance('update');
<<<<<<< HEAD
		$uid = $update->find(
			array(
				'element'	=> $this->get('element'),
				'type'		=> 'component',
				'client_id'	=> '',
				'folder'	=> ''
			)
		);

		if ($uid) {
=======
		$uid = $update->find(array('element' => $this->get('element'), 'type' => 'component', 'client_id' => '', 'folder' => ''));

		if ($uid)
		{
>>>>>>> upstream/master
			$update->delete($uid);
		}

		// We will copy the manifest file to its appropriate place.
<<<<<<< HEAD
		if (!$this->parent->copyManifest()) {
=======
		if (!$this->parent->copyManifest())
		{
>>>>>>> upstream/master
			// Install failed, rollback changes
			$this->parent->abort(JText::_('JLIB_INSTALLER_ABORT_COMP_INSTALL_COPY_SETUP'));
			return false;
		}

		// Time to build the admin menus
<<<<<<< HEAD
		if (!$this->_buildAdminMenus($row->extension_id)) {
			JError::raiseWarning(100, JText::_('JLIB_INSTALLER_ABORT_COMP_BUILDADMINMENUS_FAILED'));
=======
		if (!$this->_buildAdminMenus($row->extension_id))
		{
			JError::raiseWarning(100, JText::_('JLIB_INSTALLER_ABORT_COMP_BUILDADMINMENUS_FAILED'));

>>>>>>> upstream/master
			//$this->parent->abort(JText::sprintf('JLIB_INSTALLER_ABORT_COMP_INSTALL_ROLLBACK', $db->stderr(true)));
			//return false;
		}

		// Set the schema version to be the latest update version
<<<<<<< HEAD
		if ($this->manifest->update) {
=======
		if ($this->manifest->update)
		{
>>>>>>> upstream/master
			$this->parent->setSchemaVersion($this->manifest->update->schemas, $eid);
		}

		// Register the component container just under root in the assets table.
<<<<<<< HEAD
		$asset	= JTable::getInstance('Asset');
		$asset->name  = $row->element;
=======
		$asset = JTable::getInstance('Asset');
		$asset->name = $row->element;
>>>>>>> upstream/master
		$asset->parent_id = 1;
		$asset->rules = '{}';
		$asset->title = $row->name;
		$asset->setLocation(1, 'last-child');
<<<<<<< HEAD
		if (!$asset->store()) {
=======
		if (!$asset->store())
		{
>>>>>>> upstream/master
			// Install failed, roll back changes
			$this->parent->abort(JText::sprintf('JLIB_INSTALLER_ABORT_COMP_INSTALL_ROLLBACK', $db->stderr(true)));
			return false;
		}

		// And now we run the postflight
		ob_start();
		ob_implicit_flush(false);

<<<<<<< HEAD
		if ($this->parent->manifestClass && method_exists($this->parent->manifestClass,'postflight')) {
			$this->parent->manifestClass->postflight('install', $this);
		}

		$msg .= ob_get_contents(); // append messages
		ob_end_clean();

		if ($msg != '') {
=======
		if ($this->parent->manifestClass && method_exists($this->parent->manifestClass, 'postflight'))
		{
			$this->parent->manifestClass->postflight('install', $this);
		}

		// Append messages
		$msg .= ob_get_contents();
		ob_end_clean();

		if ($msg != '')
		{
>>>>>>> upstream/master
			$this->parent->set('extension_message', $msg);
		}

		return $row->extension_id;
	}

	/**
	 * Custom update method for components
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
		// Get a database connector object
		$db = $this->parent->getDbo();

<<<<<<< HEAD
		// set the overwrite setting
=======
		// Set the overwrite setting
>>>>>>> upstream/master
		$this->parent->setOverwrite(true);

		// Get the extension manifest object
		$this->manifest = $this->parent->getManifest();

		/**
		 * ---------------------------------------------------------------------------------------------
		 * Manifest Document Setup Section
		 * ---------------------------------------------------------------------------------------------
		 */

<<<<<<< HEAD
		// Set the extensions name
		$name = strtolower(JFilterInput::getInstance()->clean((string)$this->manifest->name, 'cmd'));
		if (substr($name, 0, 4)=="com_") {
			$element = $name;
		}
		else {
=======
		// Set the extension's name
		$name = strtolower(JFilterInput::getInstance()->clean((string) $this->manifest->name, 'cmd'));
		if (substr($name, 0, 4) == "com_")
		{
			$element = $name;
		}
		else
		{
>>>>>>> upstream/master
			$element = "com_$name";
		}

		$this->set('name', $name);
		$this->set('element', $element);

		// Get the component description
		$description = (string) $this->manifest->description;

<<<<<<< HEAD
		if ($description) {
			$this->parent->set('message', JText::_($description));
		} else {
=======
		if ($description)
		{
			$this->parent->set('message', JText::_($description));
		}
		else
		{
>>>>>>> upstream/master
			$this->parent->set('message', '');
		}

		// Set the installation target paths
<<<<<<< HEAD
		$this->parent->setPath('extension_site', JPath::clean(JPATH_SITE.DS."components".DS.$this->get('element')));
		$this->parent->setPath('extension_administrator', JPath::clean(JPATH_ADMINISTRATOR.DS."components".DS.$this->get('element')));
=======
		$this->parent->setPath('extension_site', JPath::clean(JPATH_SITE . '/components/' . $this->get('element')));
		$this->parent->setPath('extension_administrator', JPath::clean(JPATH_ADMINISTRATOR . '/components/' . $this->get('element')));
>>>>>>> upstream/master
		$this->parent->setPath('extension_root', $this->parent->getPath('extension_administrator')); // copy this as its used as a common base

		/**
		 * Hunt for the original XML file
		 */
		$old_manifest = null;
<<<<<<< HEAD
		$tmpInstaller = new JInstaller(); // create a new installer because findManifest sets stuff
		// look in the administrator first
		$tmpInstaller->setPath('source', $this->parent->getPath('extension_administrator'));

		if (!$tmpInstaller->findManifest()) {
			// then the site
			$tmpInstaller->setPath('source', $this->parent->getPath('extension_site'));
			if ($tmpInstaller->findManifest()) {
				$old_manifest = $tmpInstaller->getManifest();
			}
		}
		else {
			$old_manifest = $tmpInstaller->getManifest();
		}

		// should do this above perhaps?
		if ($old_manifest) {
			$this->oldAdminFiles = $old_manifest->administration->files;
			$this->oldFiles = $old_manifest->files;
		}
		else {
=======
		// Create a new installer because findManifest sets stuff
		// Look in the administrator first
		$tmpInstaller = new JInstaller;
		$tmpInstaller->setPath('source', $this->parent->getPath('extension_administrator'));

		if (!$tmpInstaller->findManifest())
		{
			// Then the site
			$tmpInstaller->setPath('source', $this->parent->getPath('extension_site'));
			if ($tmpInstaller->findManifest())
			{
				$old_manifest = $tmpInstaller->getManifest();
			}
		}
		else
		{
			$old_manifest = $tmpInstaller->getManifest();
		}

		// Should do this above perhaps?
		if ($old_manifest)
		{
			$this->oldAdminFiles = $old_manifest->administration->files;
			$this->oldFiles = $old_manifest->files;
		}
		else
		{
>>>>>>> upstream/master
			$this->oldAdminFiles = null;
			$this->oldFiles = null;
		}

		/**
		 * ---------------------------------------------------------------------------------------------
		 * Basic Checks Section
		 * ---------------------------------------------------------------------------------------------
		 */

		// Make sure that we have an admin element
<<<<<<< HEAD
		if (!$this->manifest->administration) {
=======
		if (!$this->manifest->administration)
		{
>>>>>>> upstream/master
			JError::raiseWarning(1, JText::_('JLIB_INSTALLER_ABORT_COMP_UPDATE_ADMIN_ELEMENT'));
			return false;
		}

		/**
		 * ---------------------------------------------------------------------------------------------
		 * Installer Trigger Loading
		 * ---------------------------------------------------------------------------------------------
		 */
		// If there is an manifest class file, lets load it; we'll copy it later (don't have dest yet)
<<<<<<< HEAD
		$manifestScript = (string)$this->manifest->scriptfile;

		if ($manifestScript) {
			$manifestScriptFile = $this->parent->getPath('source').DS.$manifestScript;

			if (is_file($manifestScriptFile)) {
				// load the file
=======
		$manifestScript = (string) $this->manifest->scriptfile;

		if ($manifestScript)
		{
			$manifestScriptFile = $this->parent->getPath('source') . '/' . $manifestScript;

			if (is_file($manifestScriptFile))
			{
				// Load the file
>>>>>>> upstream/master
				include_once $manifestScriptFile;
			}

			// Set the class name
<<<<<<< HEAD
			$classname = $element.'InstallerScript';

			if (class_exists($classname)) {
				// create a new instance
				$this->parent->manifestClass = new $classname($this);
				// and set this so we can copy it later
				$this->set('manifest_script', $manifestScript);
=======
			$classname = $element . 'InstallerScript';

			if (class_exists($classname))
			{
				// Create a new instance
				$this->parent->manifestClass = new $classname($this);
				// And set this so we can copy it later
				$this->set('manifest_script', $manifestScript);

>>>>>>> upstream/master
				// Note: if we don't find the class, don't bother to copy the file
			}
		}

<<<<<<< HEAD
		// run preflight if possible (since we know we're not an update)
		ob_start();
		ob_implicit_flush(false);

		if ($this->parent->manifestClass && method_exists($this->parent->manifestClass,'preflight')) {
			if ($this->parent->manifestClass->preflight('update', $this) === false) {
=======
		// Run preflight if possible (since we know we're not an update)
		ob_start();
		ob_implicit_flush(false);

		if ($this->parent->manifestClass && method_exists($this->parent->manifestClass, 'preflight'))
		{
			if ($this->parent->manifestClass->preflight('update', $this) === false)
			{
>>>>>>> upstream/master
				// Install failed, rollback changes
				$this->parent->abort(JText::_('JLIB_INSTALLER_ABORT_COMP_INSTALL_CUSTOM_INSTALL_FAILURE'));

				return false;
			}
		}

<<<<<<< HEAD
		$msg = ob_get_contents(); // create msg object; first use here
=======
		// Create msg object; first use here
		$msg = ob_get_contents();
>>>>>>> upstream/master
		ob_end_clean();

		/**
		 * ---------------------------------------------------------------------------------------------
		 * Filesystem Processing Section
		 * ---------------------------------------------------------------------------------------------
		 */

<<<<<<< HEAD
		// If the component directory does not exist, lets create it
		$created = false;

		if (!file_exists($this->parent->getPath('extension_site'))) {
			if (!$created = JFolder::create($this->parent->getPath('extension_site'))) {
				JError::raiseWarning(1, JText::sprintf('JLIB_INSTALLER_ERROR_COMP_UPDATE_FAILED_TO_CREATE_DIRECTORY_SITE', $this->parent->getPath('extension_site')));
=======
		// If the component directory does not exist, let's create it
		$created = false;

		if (!file_exists($this->parent->getPath('extension_site')))
		{
			if (!$created = JFolder::create($this->parent->getPath('extension_site')))
			{
				JError::raiseWarning(
					1,
					JText::sprintf('JLIB_INSTALLER_ERROR_COMP_UPDATE_FAILED_TO_CREATE_DIRECTORY_SITE', $this->parent->getPath('extension_site'))
				);
>>>>>>> upstream/master

				return false;
			}
		}

		/*
		 * Since we created the component directory and will want to remove it if we have to roll back
		 * the installation, lets add it to the installation step stack
		 */
<<<<<<< HEAD
		if ($created) {
			$this->parent->pushStep(array ('type' => 'folder', 'path' => $this->parent->getPath('extension_site')));
		}

		// If the component admin directory does not exist, lets create it
		$created = false;

		if (!file_exists($this->parent->getPath('extension_administrator'))) {
			if (!$created = JFolder::create($this->parent->getPath('extension_administrator'))) {
				JError::raiseWarning(1, JText::sprintf('JLIB_INSTALLER_ERROR_COMP_UPDATE_FAILED_TO_CREATE_DIRECTORY_ADMIN', $this->parent->getPath('extension_administrator')));
=======
		if ($created)
		{
			$this->parent->pushStep(array('type' => 'folder', 'path' => $this->parent->getPath('extension_site')));
		}

		// If the component admin directory does not exist, let's create it
		$created = false;

		if (!file_exists($this->parent->getPath('extension_administrator')))
		{
			if (!$created = JFolder::create($this->parent->getPath('extension_administrator')))
			{
				JError::raiseWarning(
					1,
					JText::sprintf(
						'JLIB_INSTALLER_ERROR_COMP_UPDATE_FAILED_TO_CREATE_DIRECTORY_ADMIN',
						$this->parent->getPath('extension_administrator')
					)
				);
>>>>>>> upstream/master
				// Install failed, rollback any changes
				$this->parent->abort();

				return false;
			}
		}

		/*
		 * Since we created the component admin directory and we will want to remove it if we have to roll
<<<<<<< HEAD
		 * back the installation, lets add it to the installation step stack
		 */
		if ($created) {
			$this->parent->pushStep(array ('type' => 'folder', 'path' => $this->parent->getPath('extension_administrator')));
		}

		// Find files to copy
		if ($this->manifest->files) {
			if ($this->parent->parseFiles($this->manifest->files, 0, $this->oldFiles) === false) {
=======
		 * back the installation, let's add it to the installation step stack
		 */
		if ($created)
		{
			$this->parent->pushStep(array('type' => 'folder', 'path' => $this->parent->getPath('extension_administrator')));
		}

		// Find files to copy
		if ($this->manifest->files)
		{
			if ($this->parent->parseFiles($this->manifest->files, 0, $this->oldFiles) === false)
			{
>>>>>>> upstream/master
				// Install failed, rollback any changes
				$this->parent->abort();

				return false;
			}
		}

<<<<<<< HEAD
		if ($this->manifest->administration->files) {
			if ($this->parent->parseFiles($this->manifest->administration->files, 1, $this->oldAdminFiles) === false) {
=======
		if ($this->manifest->administration->files)
		{
			if ($this->parent->parseFiles($this->manifest->administration->files, 1, $this->oldAdminFiles) === false)
			{
>>>>>>> upstream/master
				// Install failed, rollback any changes
				$this->parent->abort();

				return false;
			}
		}

		// Parse optional tags
		$this->parent->parseMedia($this->manifest->media);
		$this->parent->parseLanguages($this->manifest->languages);
		$this->parent->parseLanguages($this->manifest->administration->languages, 1);

		// Deprecated install, remove after 1.6
		// If there is an install file, lets copy it.
<<<<<<< HEAD
		$installFile = (string)$this->manifest->installfile;

		if ($installFile) {
			// Make sure it hasn't already been copied (this would be an error in the XML install file)
			if (!file_exists($this->parent->getPath('extension_administrator').DS.$installFile) || $this->parent->getOverwrite()) {
				$path['src']	= $this->parent->getPath('source').DS.$installFile;
				$path['dest']	= $this->parent->getPath('extension_administrator').DS.$installFile;

				if (!$this->parent->copyFiles(array ($path))) {
=======
		$installFile = (string) $this->manifest->installfile;

		if ($installFile)
		{
			// Make sure it hasn't already been copied (this would be an error in the XML install file)
			if (!file_exists($this->parent->getPath('extension_administrator') . '/' . $installFile) || $this->parent->getOverwrite())
			{
				$path['src'] = $this->parent->getPath('source') . '/' . $installFile;
				$path['dest'] = $this->parent->getPath('extension_administrator') . '/' . $installFile;

				if (!$this->parent->copyFiles(array($path)))
				{
>>>>>>> upstream/master
					// Install failed, rollback changes
					$this->parent->abort(JText::_('JLIB_INSTALLER_ABORT_COMP_UPDATE_PHP_INSTALL'));
					return false;
				}
			}

			$this->set('install_script', $installFile);
		}

		// Deprecated uninstall, remove after 1.6
		// If there is an uninstall file, lets copy it.
<<<<<<< HEAD
		$uninstallFile = (string)$this->manifest->uninstallfile;

		if ($uninstallFile) {
			// Make sure it hasn't already been copied (this would be an error in the XML install file)
			if (!file_exists($this->parent->getPath('extension_administrator').DS.$uninstallFile) || $this->parent->getOverwrite()) {
				$path['src']	= $this->parent->getPath('source').DS.$uninstallFile;
				$path['dest']	= $this->parent->getPath('extension_administrator').DS.$uninstallFile;

				if (!$this->parent->copyFiles(array ($path))) {
=======
		$uninstallFile = (string) $this->manifest->uninstallfile;

		if ($uninstallFile)
		{
			// Make sure it hasn't already been copied (this would be an error in the XML install file)
			if (!file_exists($this->parent->getPath('extension_administrator') . '/' . $uninstallFile) || $this->parent->getOverwrite())
			{
				$path['src'] = $this->parent->getPath('source') . '/' . $uninstallFile;
				$path['dest'] = $this->parent->getPath('extension_administrator') . '/' . $uninstallFile;

				if (!$this->parent->copyFiles(array($path)))
				{
>>>>>>> upstream/master
					// Install failed, rollback changes
					$this->parent->abort(JText::_('JLIB_INSTALLER_ABORT_COMP_UPDATE_PHP_UNINSTALL'));

					return false;
				}
			}
		}

<<<<<<< HEAD
		// If there is a manifest script, lets copy it.
		if ($this->get('manifest_script')) {
			$path['src'] = $this->parent->getPath('source').DS.$this->get('manifest_script');
			$path['dest'] = $this->parent->getPath('extension_administrator').DS.$this->get('manifest_script');

			if (!file_exists($path['dest']) || $this->parent->getOverwrite()) {
				if (!$this->parent->copyFiles(array ($path))) {
=======
		// If there is a manifest script, let's copy it.
		if ($this->get('manifest_script'))
		{
			$path['src'] = $this->parent->getPath('source') . '/' . $this->get('manifest_script');
			$path['dest'] = $this->parent->getPath('extension_administrator') . '/' . $this->get('manifest_script');

			if (!file_exists($path['dest']) || $this->parent->getOverwrite())
			{
				if (!$this->parent->copyFiles(array($path)))
				{
>>>>>>> upstream/master
					// Install failed, rollback changes
					$this->parent->abort(JText::_('JLIB_INSTALLER_ABORT_COMP_UPDATE_MANIFEST'));

					return false;
				}
			}
		}

		/**
		 * ---------------------------------------------------------------------------------------------
		 * Database Processing Section
		 * ---------------------------------------------------------------------------------------------
		 */

		/*
		 * Let's run the update queries for the component
		 */
<<<<<<< HEAD
		$row	= JTable::getInstance('extension');
		$eid	= $row->find(
			array(
				'element'	=> strtolower($this->get('element')),
				'type'		=>'component'
			)
		);

		if ($this->manifest->update) {
			$result = $this->parent->parseSchemaUpdates($this->manifest->update->schemas, $eid);

			if ($result === false) {
=======
		$row = JTable::getInstance('extension');
		$eid = $row->find(array('element' => strtolower($this->get('element')), 'type' => 'component'));

		if ($this->manifest->update)
		{
			$result = $this->parent->parseSchemaUpdates($this->manifest->update->schemas, $eid);

			if ($result === false)
			{
>>>>>>> upstream/master
				// Install failed, rollback changes
				$this->parent->abort(JText::sprintf('JLIB_INSTALLER_ABORT_COMP_UPDATE_SQL_ERROR', $db->stderr(true)));

				return false;
			}
		}

		// Time to build the admin menus
<<<<<<< HEAD
		if (!$this->_buildAdminMenus($eid)) {
			JError::raiseWarning(100, JText::_('JLIB_INSTALLER_ABORT_COMP_BUILDADMINMENUS_FAILED'));
			//$this->parent->abort(JText::sprintf('JLIB_INSTALLER_ABORT_COMP_INSTALL_ROLLBACK', $db->stderr(true)));

			//return false;
=======
		if (!$this->_buildAdminMenus($eid))
		{
			JError::raiseWarning(100, JText::_('JLIB_INSTALLER_ABORT_COMP_BUILDADMINMENUS_FAILED'));

			// $this->parent->abort(JText::sprintf('JLIB_INSTALLER_ABORT_COMP_INSTALL_ROLLBACK', $db->stderr(true)));

			// Return false;
>>>>>>> upstream/master
		}

		/**
		 * ---------------------------------------------------------------------------------------------
		 * Custom Installation Script Section
		 * ---------------------------------------------------------------------------------------------
		 */

		/*
<<<<<<< HEAD
		 * If we have an install script, lets include it, execute the custom
		 * install method, and append the return value from the custom install
		 * method to the installation message.
		 */
		// start legacy support
		if ($this->get('install_script')) {
			if (is_file($this->parent->getPath('extension_administrator').DS.$this->get('install_script')) || $this->parent->getOverwrite()) {
=======
		 * If we have an install script, let's include it, execute the custom
		 * install method, and append the return value from the custom install
		 * method to the installation message.
		 */
		// Start legacy support
		if ($this->get('install_script'))
		{
			if (is_file($this->parent->getPath('extension_administrator') . '/' . $this->get('install_script')) || $this->parent->getOverwrite())
			{
>>>>>>> upstream/master
				$notdef = false;
				$ranwell = false;
				ob_start();
				ob_implicit_flush(false);

<<<<<<< HEAD
				require_once $this->parent->getPath('extension_administrator').DS.$this->get('install_script');

				if (function_exists('com_install')) {
					if (com_install() === false) {
=======
				require_once $this->parent->getPath('extension_administrator') . '/' . $this->get('install_script');

				if (function_exists('com_install'))
				{
					if (com_install() === false)
					{
>>>>>>> upstream/master
						$this->parent->abort(JText::_('JLIB_INSTALLER_ABORT_COMP_INSTALL_CUSTOM_INSTALL_FAILURE'));

						return false;
					}
				}

				$msg .= ob_get_contents(); // append messages
				ob_end_clean();
			}
		}

		/*
<<<<<<< HEAD
		 * If we have an update script, lets include it, execute the custom
=======
		 * If we have an update script, let's include it, execute the custom
>>>>>>> upstream/master
		 * update method, and append the return value from the custom update
		 * method to the installation message.
		 */
		// Start Joomla! 1.6
		ob_start();
		ob_implicit_flush(false);

<<<<<<< HEAD
		if ($this->parent->manifestClass && method_exists($this->parent->manifestClass,'update')) {
			if ($this->parent->manifestClass->update($this) === false) {
=======
		if ($this->parent->manifestClass && method_exists($this->parent->manifestClass, 'update'))
		{
			if ($this->parent->manifestClass->update($this) === false)
			{
>>>>>>> upstream/master
				// Install failed, rollback changes
				$this->parent->abort(JText::_('JLIB_INSTALLER_ABORT_COMP_INSTALL_CUSTOM_INSTALL_FAILURE'));

				return false;
			}
		}

<<<<<<< HEAD
		$msg .= ob_get_contents(); // append messages
=======
		// Append messages
		$msg .= ob_get_contents();
>>>>>>> upstream/master
		ob_end_clean();

		/**
		 * ---------------------------------------------------------------------------------------------
		 * Finalization and Cleanup Section
		 * ---------------------------------------------------------------------------------------------
		 */

		// Clobber any possible pending updates
		$update = JTable::getInstance('update');
<<<<<<< HEAD
		$uid = $update->find(
			array(
				'element'	=> $this->get('element'),
				'type'		=> 'component',
				'client_id'	=> '',
				'folder'	=> ''
			)
		);

		if ($uid) {
=======
		$uid = $update->find(array('element' => $this->get('element'), 'type' => 'component', 'client_id' => '', 'folder' => ''));

		if ($uid)
		{
>>>>>>> upstream/master
			$update->delete($uid);
		}

		// Update an entry to the extension table
<<<<<<< HEAD
		if ($eid) {
			$row->load($eid);
		} else {
			// set the defaults
			$row->folder = ''; // There is no folder for components
=======
		if ($eid)
		{
			$row->load($eid);
		}
		else
		{
			// Set the defaults
			// There is no folder for components
			$row->folder = '';
>>>>>>> upstream/master
			$row->enabled = 1;
			$row->protected = 0;
			$row->access = 1;
			$row->client_id = 1;
			$row->params = $this->parent->getParams();
		}

<<<<<<< HEAD
		$row->name		= $this->get('name');
		$row->type		= 'component';
		$row->element	= $this->get('element');
		$row->manifest_cache = $this->parent->generateManifestCache();

		if (!$row->store()) {
=======
		$row->name = $this->get('name');
		$row->type = 'component';
		$row->element = $this->get('element');
		$row->manifest_cache = $this->parent->generateManifestCache();

		if (!$row->store())
		{
>>>>>>> upstream/master
			// Install failed, roll back changes
			$this->parent->abort(JText::sprintf('JLIB_INSTALLER_ABORT_COMP_UPDATE_ROLLBACK', $db->stderr(true)));

			return false;
		}

		// We will copy the manifest file to its appropriate place.
<<<<<<< HEAD
		if (!$this->parent->copyManifest()) {
=======
		if (!$this->parent->copyManifest())
		{
>>>>>>> upstream/master
			// Install failed, rollback changes
			$this->parent->abort(JText::_('JLIB_INSTALLER_ABORT_COMP_UPDATE_COPY_SETUP'));

			return false;
		}

		// And now we run the postflight
		ob_start();
		ob_implicit_flush(false);

<<<<<<< HEAD
		if ($this->parent->manifestClass && method_exists($this->parent->manifestClass,'postflight')) {
			$this->parent->manifestClass->postflight('update', $this);
		}

		$msg .= ob_get_contents(); // append messages
		ob_end_clean();

		if ($msg != '') {
=======
		if ($this->parent->manifestClass && method_exists($this->parent->manifestClass, 'postflight'))
		{
			$this->parent->manifestClass->postflight('update', $this);
		}
		// Append messages
		$msg .= ob_get_contents();
		ob_end_clean();

		if ($msg != '')
		{
>>>>>>> upstream/master
			$this->parent->set('extension_message', $msg);
		}

		return $row->extension_id;
	}

	/**
	 * Custom uninstall method for components
	 *
<<<<<<< HEAD
	 * @param   integer  $id	The unique extension id of the component to uninstall
	 *
	 * @return  mixed  Return value for uninstall method in component uninstall file
	 * @since	1.0
=======
	 * @param   integer  $id  The unique extension id of the component to uninstall
	 *
	 * @return  mixed  Return value for uninstall method in component uninstall file
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function uninstall($id)
	{
		// Initialise variables.
<<<<<<< HEAD
		$db		= $this->parent->getDbo();
		$row	= null;
		$retval	= true;
=======
		$db = $this->parent->getDbo();
		$row = null;
		$retval = true;
>>>>>>> upstream/master

		// First order of business will be to load the component object table from the database.
		// This should give us the necessary information to proceed.
		$row = JTable::getInstance('extension');
<<<<<<< HEAD
		if (!$row->load((int) $id)) {
=======
		if (!$row->load((int) $id))
		{
>>>>>>> upstream/master
			JError::raiseWarning(100, JText::_('JLIB_INSTALLER_ERROR_COMP_UNINSTALL_ERRORUNKOWNEXTENSION'));
			return false;
		}

		// Is the component we are trying to uninstall a core one?
		// Because that is not a good idea...
<<<<<<< HEAD
		if ($row->protected) {
=======
		if ($row->protected)
		{
>>>>>>> upstream/master
			JError::raiseWarning(100, JText::_('JLIB_INSTALLER_ERROR_COMP_UNINSTALL_WARNCORECOMPONENT'));
			return false;
		}

		// Get the admin and site paths for the component
<<<<<<< HEAD
		$this->parent->setPath('extension_administrator', JPath::clean(JPATH_ADMINISTRATOR.DS.'components'.DS.$row->element));
		$this->parent->setPath('extension_site', JPath::clean(JPATH_SITE.DS.'components'.DS.$row->element));
=======
		$this->parent->setPath('extension_administrator', JPath::clean(JPATH_ADMINISTRATOR . '/components/' . $row->element));
		$this->parent->setPath('extension_site', JPath::clean(JPATH_SITE . '/components/' . $row->element));
>>>>>>> upstream/master
		$this->parent->setPath('extension_root', $this->parent->getPath('extension_administrator')); // copy this as its used as a common base

		/**
		 * ---------------------------------------------------------------------------------------------
		 * Manifest Document Setup Section
		 * ---------------------------------------------------------------------------------------------
		 */

		// Find and load the XML install file for the component
		$this->parent->setPath('source', $this->parent->getPath('extension_administrator'));

		// Get the package manifest object
		// We do findManifest to avoid problem when uninstalling a list of extension: getManifest cache its manifest file
		$this->parent->findManifest();
		$this->manifest = $this->parent->getManifest();

<<<<<<< HEAD
		if (!$this->manifest) {
=======
		if (!$this->manifest)
		{
>>>>>>> upstream/master
			// Make sure we delete the folders if no manifest exists
			JFolder::delete($this->parent->getPath('extension_administrator'));
			JFolder::delete($this->parent->getPath('extension_site'));

			// Remove the menu
			$this->_removeAdminMenus($row);

			// Raise a warning
			JError::raiseWarning(100, JText::_('JLIB_INSTALLER_ERROR_COMP_UNINSTALL_ERRORREMOVEMANUALLY'));

			// Return
			return false;
		}

		// Set the extensions name
<<<<<<< HEAD
		$name = strtolower(JFilterInput::getInstance()->clean((string)$this->manifest->name, 'cmd'));
		if (substr($name, 0, 4)=="com_") {
			$element = $name;
		}
		else {
=======
		$name = strtolower(JFilterInput::getInstance()->clean((string) $this->manifest->name, 'cmd'));
		if (substr($name, 0, 4) == "com_")
		{
			$element = $name;
		}
		else
		{
>>>>>>> upstream/master
			$element = "com_$name";
		}

		$this->set('name', $name);
		$this->set('element', $element);

		// Attempt to load the admin language file; might have uninstall strings
<<<<<<< HEAD
		$this->loadLanguage(JPATH_ADMINISTRATOR.'/components/'.$element);
=======
		$this->loadLanguage(JPATH_ADMINISTRATOR . '/components/' . $element);
>>>>>>> upstream/master

		/**
		 * ---------------------------------------------------------------------------------------------
		 * Installer Trigger Loading and Uninstall
		 * ---------------------------------------------------------------------------------------------
		 */
		// If there is an manifest class file, lets load it; we'll copy it later (don't have dest yet)
<<<<<<< HEAD
		$scriptFile = (string)$this->manifest->scriptfile;

		if ($scriptFile) {
			$manifestScriptFile = $this->parent->getPath('source').DS.$scriptFile;

			if (is_file($manifestScriptFile)) {
=======
		$scriptFile = (string) $this->manifest->scriptfile;

		if ($scriptFile)
		{
			$manifestScriptFile = $this->parent->getPath('source') . '/' . $scriptFile;

			if (is_file($manifestScriptFile))
			{
>>>>>>> upstream/master
				// load the file
				include_once $manifestScriptFile;
			}

			// Set the class name
<<<<<<< HEAD
			$classname = $row->element.'InstallerScript';

			if (class_exists($classname)) {
=======
			$classname = $row->element . 'InstallerScript';

			if (class_exists($classname))
			{
>>>>>>> upstream/master
				// create a new instance
				$this->parent->manifestClass = new $classname($this);
				// and set this so we can copy it later
				$this->set('manifest_script', $scriptFile);
<<<<<<< HEAD
=======

>>>>>>> upstream/master
				// Note: if we don't find the class, don't bother to copy the file
			}
		}

		ob_start();
		ob_implicit_flush(false);

		// run uninstall if possible
<<<<<<< HEAD
		if ($this->parent->manifestClass && method_exists($this->parent->manifestClass,'uninstall')) {
=======
		if ($this->parent->manifestClass && method_exists($this->parent->manifestClass, 'uninstall'))
		{
>>>>>>> upstream/master
			$this->parent->manifestClass->uninstall($this);
		}

		$msg = ob_get_contents();
		ob_end_clean();

		/**
		 * ---------------------------------------------------------------------------------------------
<<<<<<< HEAD
		 * Custom Uninstallation Script Section; Legacy 1.5 Support
		 * ---------------------------------------------------------------------------------------------
		 */

		// Now lets load the uninstall file if there is one and execute the uninstall function if it exists.
		$uninstallFile = (string)$this->manifest->uninstallfile;

		if ($uninstallFile) {
			// Element exists, does the file exist?
			if (is_file($this->parent->getPath('extension_administrator').DS.$uninstallFile)) {
				ob_start();
				ob_implicit_flush(false);

				require_once $this->parent->getPath('extension_administrator').DS.$uninstallFile;

				if (function_exists('com_uninstall')) {
					if (com_uninstall() === false) {
=======
		 * Custom Uninstallation Script Section; Legacy CMS 1.5 Support
		 * ---------------------------------------------------------------------------------------------
		 */

		// Now let's load the uninstall file if there is one and execute the uninstall function if it exists.
		$uninstallFile = (string) $this->manifest->uninstallfile;

		if ($uninstallFile)
		{
			// Element exists, does the file exist?
			if (is_file($this->parent->getPath('extension_administrator') . '/' . $uninstallFile))
			{
				ob_start();
				ob_implicit_flush(false);

				require_once $this->parent->getPath('extension_administrator') . '/' . $uninstallFile;

				if (function_exists('com_uninstall'))
				{
					if (com_uninstall() === false)
					{
>>>>>>> upstream/master
						JError::raiseWarning(100, JText::_('JLIB_INSTALLER_ERROR_COMP_UNINSTALL_CUSTOM'));
						$retval = false;
					}
				}

<<<<<<< HEAD
				$msg .= ob_get_contents(); // append this in case there was something else
=======
				// append this in case there was something else
				$msg .= ob_get_contents();
>>>>>>> upstream/master
				ob_end_clean();
			}
		}

<<<<<<< HEAD
		if ($msg != '') {
=======
		if ($msg != '')
		{
>>>>>>> upstream/master
			$this->parent->set('extension_message', $msg);
		}

		/**
		 * ---------------------------------------------------------------------------------------------
		 * Database Processing Section
		 * ---------------------------------------------------------------------------------------------
		 */

		/*
		 * Let's run the uninstall queries for the component
<<<<<<< HEAD
		 *	If Joomla 1.5 compatible, with discreet sql files - execute appropriate
		 *	file for utf-8 support or non-utf support
		 */
		// try for Joomla 1.5 type queries
		// second argument is the utf compatible version attribute
		if (isset($this->manifest->uninstall->sql)) {
			$utfresult = $this->parent->parseSQLFiles($this->manifest->uninstall->sql);

			if ($utfresult === false) {
=======
		 * If Joomla CMS 1.5 compatible, with discrete sql files - execute appropriate
		 * file for utf-8 support or non-utf support
		 */
		// Try for Joomla 1.5 type queries
		// Second argument is the utf compatible version attribute
		if (isset($this->manifest->uninstall->sql))
		{
			$utfresult = $this->parent->parseSQLFiles($this->manifest->uninstall->sql);

			if ($utfresult === false)
			{
>>>>>>> upstream/master
				// Install failed, rollback changes
				JError::raiseWarning(100, JText::sprintf('JLIB_INSTALLER_ERROR_COMP_UNINSTALL_SQL_ERROR', $db->stderr(true)));
				$retval = false;
			}
		}

		$this->_removeAdminMenus($row);

		/**
		 * ---------------------------------------------------------------------------------------------
		 * Filesystem Processing Section
		 * ---------------------------------------------------------------------------------------------
		 */

<<<<<<< HEAD
		// Let's remove language files and media in the JROOT/images/ folder that are
=======
		// Let's remove those language files and media in the JROOT/images/ folder that are
>>>>>>> upstream/master
		// associated with the component we are uninstalling
		$this->parent->removeFiles($this->manifest->media);
		$this->parent->removeFiles($this->manifest->languages);
		$this->parent->removeFiles($this->manifest->administration->languages, 1);

		// Remove the schema version
		$query = $db->getQuery(true);
<<<<<<< HEAD
		$query->delete()->from('#__schemas')->where('extension_id = '. $id);
		$db->setQuery($query);
		$db->query();


		// Remove the component container in the assets table.
		$asset	= JTable::getInstance('Asset');
		if ($asset->loadByName($element)) {
			$asset->delete();
		}

		// Clobber any possible pending updates
		$update	= JTable::getInstance('update');
		$uid	= $update->find(
			array(
				'element'	=> $row->element,
				'type'		=> 'component',
				'client_id'	=> '',
				'folder'	=> ''
			)
		);

		if ($uid) {
			$update->delete($uid);
		}

		// Now we need to delete the installation directories.  This is the final step in uninstalling the component.
		if (trim($row->element)) {
			// Delete the component site directory
			if (is_dir($this->parent->getPath('extension_site'))) {
				if (!JFolder::delete($this->parent->getPath('extension_site'))) {
=======
		$query->delete()->from('#__schemas')->where('extension_id = ' . $id);
		$db->setQuery($query);
		$db->query();

		// Remove the component container in the assets table.
		$asset = JTable::getInstance('Asset');
		if ($asset->loadByName($element))
		{
			$asset->delete();
		}

		// Remove categories for this component
		$query = $db->getQuery(true);
		$query->delete()->from('#__categories')->where('extension=' . $db->quote($element), 'OR')
			->where('extension LIKE ' . $db->quote($element . '.%'));
		$db->setQuery($query);
		$db->query();
		// Check for errors.
		if ($db->getErrorNum())
		{
			JError::raiseWarning(100, JText::_('JLIB_INSTALLER_ERROR_COMP_UNINSTALL_FAILED_DELETE_CATEGORIES'));
			$this->setError($db->getErrorMsg());
			$retval = false;
		}

		// Clobber any possible pending updates
		$update = JTable::getInstance('update');
		$uid = $update->find(array('element' => $row->element, 'type' => 'component', 'client_id' => '', 'folder' => ''));

		if ($uid)
		{
			$update->delete($uid);
		}

		// Now we need to delete the installation directories. This is the final step in uninstalling the component.
		if (trim($row->element))
		{
			// Delete the component site directory
			if (is_dir($this->parent->getPath('extension_site')))
			{
				if (!JFolder::delete($this->parent->getPath('extension_site')))
				{
>>>>>>> upstream/master
					JError::raiseWarning(100, JText::_('JLIB_INSTALLER_ERROR_COMP_UNINSTALL_FAILED_REMOVE_DIRECTORY_SITE'));
					$retval = false;
				}
			}

			// Delete the component admin directory
<<<<<<< HEAD
			if (is_dir($this->parent->getPath('extension_administrator'))) {
				if (!JFolder::delete($this->parent->getPath('extension_administrator'))) {
=======
			if (is_dir($this->parent->getPath('extension_administrator')))
			{
				if (!JFolder::delete($this->parent->getPath('extension_administrator')))
				{
>>>>>>> upstream/master
					JError::raiseWarning(100, JText::_('JLIB_INSTALLER_ERROR_COMP_UNINSTALL_FAILED_REMOVE_DIRECTORY_ADMIN'));
					$retval = false;
				}
			}

<<<<<<< HEAD
			// Now we will no longer need the extension object, so lets delete it and free up memory
			$row->delete($row->extension_id);
			unset ($row);

			return $retval;
		}
		else {
=======
			// Now we will no longer need the extension object, so let's delete it and free up memory
			$row->delete($row->extension_id);
			unset($row);

			return $retval;
		}
		else
		{
>>>>>>> upstream/master
			// No component option defined... cannot delete what we don't know about
			JError::raiseWarning(100, 'JLIB_INSTALLER_ERROR_COMP_UNINSTALL_NO_OPTION');
			return false;
		}
	}

	/**
	 * Method to build menu database entries for a component
	 *
	 * @return  boolean  True if successful
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function _buildAdminMenus()
	{
		// Initialise variables.
<<<<<<< HEAD
		$db		= $this->parent->getDbo();
		$table	= JTable::getInstance('menu');
		$option	= $this->get('element');

		// If a component exists with this option in the table then we don't need to add menus
		$query	= $db->getQuery(true);
=======
		$db = $this->parent->getDbo();
		$table = JTable::getInstance('menu');
		$option = $this->get('element');

		// If a component exists with this option in the table then we don't need to add menus
		$query = $db->getQuery(true);
>>>>>>> upstream/master
		$query->select('m.id, e.extension_id');
		$query->from('#__menu AS m');
		$query->leftJoin('#__extensions AS e ON m.component_id = e.extension_id');
		$query->where('m.parent_id = 1');
		$query->where("m.client_id = 1");
<<<<<<< HEAD
		$query->where('e.element = '.$db->quote($option));
=======
		$query->where('e.element = ' . $db->quote($option));
>>>>>>> upstream/master

		$db->setQuery($query);

		$componentrow = $db->loadObject();

		// Check if menu items exist
<<<<<<< HEAD
		if ($componentrow) {

			// Don't do anything if overwrite has not been enabled
			if (! $this->parent->getOverwrite()) {
=======
		if ($componentrow)
		{

			// Don't do anything if overwrite has not been enabled
			if (!$this->parent->getOverwrite())
			{
>>>>>>> upstream/master
				return true;
			}

			// Remove existing menu items if overwrite has been enabled
<<<<<<< HEAD
			if ($option) {
				$this->_removeAdminMenus($componentrow);// If something goes wrong, theres no way to rollback TODO: Search for better solution
=======
			if ($option)
			{
				$this->_removeAdminMenus($componentrow); // If something goes wrong, theres no way to rollback TODO: Search for better solution
>>>>>>> upstream/master
			}

			$component_id = $componentrow->extension_id;
		}
<<<<<<< HEAD
		else {
=======
		else
		{
>>>>>>> upstream/master
			// Lets Find the extension id
			$query->clear();
			$query->select('e.extension_id');
			$query->from('#__extensions AS e');
<<<<<<< HEAD
			$query->where('e.element = '.$db->quote($option));
=======
			$query->where('e.element = ' . $db->quote($option));
>>>>>>> upstream/master

			$db->setQuery($query);

			$component_id = $db->loadResult(); // TODO Find Some better way to discover the component_id
		}

		// Ok, now its time to handle the menus.  Start with the component root menu, then handle submenus.
		$menuElement = $this->manifest->administration->menu;

<<<<<<< HEAD
		if ($menuElement) {
			$data = array();
			$data['menutype'] = 'main';
			$data['client_id'] = 1;
			$data['title'] = (string)$menuElement;
			$data['alias'] = (string)$menuElement;
			$data['link'] = 'index.php?option='.$option;
=======
		if ($menuElement)
		{
			$data = array();
			$data['menutype'] = 'main';
			$data['client_id'] = 1;
			$data['title'] = (string) $menuElement;
			$data['alias'] = (string) $menuElement;
			$data['link'] = 'index.php?option=' . $option;
>>>>>>> upstream/master
			$data['type'] = 'component';
			$data['published'] = 0;
			$data['parent_id'] = 1;
			$data['component_id'] = $component_id;
<<<<<<< HEAD
			$data['img'] = ((string)$menuElement->attributes()->img) ? (string)$menuElement->attributes()->img : 'class:component';
			$data['home'] = 0;

			if (!$table->setLocation(1, 'last-child') || !$table->bind($data) || !$table->check() || !$table->store()) {
				// Install failed, rollback changes
=======
			$data['img'] = ((string) $menuElement->attributes()->img) ? (string) $menuElement->attributes()->img : 'class:component';
			$data['home'] = 0;

			if (!$table->setLocation(1, 'last-child') || !$table->bind($data) || !$table->check() || !$table->store())
			{
				// Install failed, warn user and rollback changes
				JError::raiseWarning(1, $table->getError());
>>>>>>> upstream/master
				return false;
			}

			/*
			 * Since we have created a menu item, we add it to the installation step stack
			 * so that if we have to rollback the changes we can undo it.
			 */
<<<<<<< HEAD
			$this->parent->pushStep(array ('type' => 'menu'));
		}
		// No menu element was specified, Let's make a generic menu item
		else {
=======
			$this->parent->pushStep(array('type' => 'menu', 'id' => $component_id));
		}
		// No menu element was specified, Let's make a generic menu item
		else
		{
>>>>>>> upstream/master
			$data = array();
			$data['menutype'] = 'main';
			$data['client_id'] = 1;
			$data['title'] = $option;
			$data['alias'] = $option;
<<<<<<< HEAD
			$data['link'] = 'index.php?option='.$option;
=======
			$data['link'] = 'index.php?option=' . $option;
>>>>>>> upstream/master
			$data['type'] = 'component';
			$data['published'] = 0;
			$data['parent_id'] = 1;
			$data['component_id'] = $component_id;
			$data['img'] = 'class:component';
			$data['home'] = 0;

<<<<<<< HEAD
			if (!$table->setLocation(1, 'last-child') || !$table->bind($data) || !$table->check() || !$table->store()) {
				// Install failed, rollback changes
=======
			if (!$table->setLocation(1, 'last-child') || !$table->bind($data) || !$table->check() || !$table->store())
			{
				// Install failed, warn user and rollback changes
				JError::raiseWarning(1, $table->getError());
>>>>>>> upstream/master
				return false;
			}

			/*
			 * Since we have created a menu item, we add it to the installation step stack
			 * so that if we have to rollback the changes we can undo it.
			 */
<<<<<<< HEAD
			$this->parent->pushStep(array ('type' => 'menu'));
=======
			$this->parent->pushStep(array('type' => 'menu', 'id' => $component_id));
>>>>>>> upstream/master
		}

		$parent_id = $table->id;

		/*
		 * Process SubMenus
		 */

<<<<<<< HEAD
		if (!$this->manifest->administration->submenu) {
=======
		if (!$this->manifest->administration->submenu)
		{
>>>>>>> upstream/master
			return true;
		}

		$parent_id = $table->id;

<<<<<<< HEAD
		foreach ($this->manifest->administration->submenu->menu as $child) {
			$data = array();
			$data['menutype'] = 'main';
			$data['client_id'] = 1;
			$data['title'] = (string)$child;
			$data['alias'] = (string)$child;
=======
		foreach ($this->manifest->administration->submenu->menu as $child)
		{
			$data = array();
			$data['menutype'] = 'main';
			$data['client_id'] = 1;
			$data['title'] = (string) $child;
			$data['alias'] = (string) $child;
>>>>>>> upstream/master
			$data['type'] = 'component';
			$data['published'] = 0;
			$data['parent_id'] = $parent_id;
			$data['component_id'] = $component_id;
<<<<<<< HEAD
			$data['img'] = ((string)$child->attributes()->img) ? (string)$child->attributes()->img : 'class:component';
			$data['home'] = 0;

			// Set the sub menu link
			if ((string)$child->attributes()->link) {
				$data['link'] = 'index.php?'.$child->attributes()->link;
			}
			else {
				$request = array();

				if ((string)$child->attributes()->act) {
					$request[] = 'act='.$child->attributes()->act;
				}

				if ((string)$child->attributes()->task) {
					$request[] = 'task='.$child->attributes()->task;
				}

				if ((string)$child->attributes()->controller) {
					$request[] = 'controller='.$child->attributes()->controller;
				}

				if ((string)$child->attributes()->view) {
					$request[] = 'view='.$child->attributes()->view;
				}

				if ((string)$child->attributes()->layout) {
					$request[] = 'layout='.$child->attributes()->layout;
				}

				if ((string)$child->attributes()->sub) {
					$request[] = 'sub='.$child->attributes()->sub;
				}

				$qstring = (count($request)) ? '&'.implode('&',$request) : '';
				$data['link'] = 'index.php?option='.$option.$qstring;
=======
			$data['img'] = ((string) $child->attributes()->img) ? (string) $child->attributes()->img : 'class:component';
			$data['home'] = 0;

			// Set the sub menu link
			if ((string) $child->attributes()->link)
			{
				$data['link'] = 'index.php?' . $child->attributes()->link;
			}
			else
			{
				$request = array();

				if ((string) $child->attributes()->act)
				{
					$request[] = 'act=' . $child->attributes()->act;
				}

				if ((string) $child->attributes()->task)
				{
					$request[] = 'task=' . $child->attributes()->task;
				}

				if ((string) $child->attributes()->controller)
				{
					$request[] = 'controller=' . $child->attributes()->controller;
				}

				if ((string) $child->attributes()->view)
				{
					$request[] = 'view=' . $child->attributes()->view;
				}

				if ((string) $child->attributes()->layout)
				{
					$request[] = 'layout=' . $child->attributes()->layout;
				}

				if ((string) $child->attributes()->sub)
				{
					$request[] = 'sub=' . $child->attributes()->sub;
				}

				$qstring = (count($request)) ? '&' . implode('&', $request) : '';
				$data['link'] = 'index.php?option=' . $option . $qstring;
>>>>>>> upstream/master
			}

			$table = JTable::getInstance('menu');

<<<<<<< HEAD
			if (!$table->setLocation($parent_id, 'last-child') || !$table->bind($data) || !$table->check() || !$table->store()) {
=======
			if (!$table->setLocation($parent_id, 'last-child') || !$table->bind($data) || !$table->check() || !$table->store())
			{
>>>>>>> upstream/master
				// Install failed, rollback changes
				return false;
			}

			/*
			 * Since we have created a menu item, we add it to the installation step stack
			 * so that if we have to rollback the changes we can undo it.
			 */
<<<<<<< HEAD
			$this->parent->pushStep(array ('type' => 'menu'));
=======
			$this->parent->pushStep(array('type' => 'menu', 'id' => $component_id));
>>>>>>> upstream/master
		}

		return true;
	}

	/**
	 * Method to remove admin menu references to a component
	 *
<<<<<<< HEAD
	 * @param   object  $component	Component table object
	 *
	 * @return  boolean  True if successful
=======
	 * @param   object  &$row  Component table object.
	 *
	 * @return  boolean  True if successful.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function _removeAdminMenus(&$row)
	{
		// Initialise Variables
<<<<<<< HEAD
		$db		= $this->parent->getDbo();
		$table	= JTable::getInstance('menu');
		$id		= $row->extension_id;

		// Get the ids of the menu items
		$query	= $db->getQuery(true);
		$query->select('id');
		$query->from('#__menu');
		$query->where('`client_id` = 1');
		$query->where('`component_id` = '.(int) $id);
=======
		$db = $this->parent->getDbo();
		$table = JTable::getInstance('menu');
		$id = $row->extension_id;

		// Get the ids of the menu items
		$query = $db->getQuery(true);
		$query->select('id');
		$query->from('#__menu');
		$query->where($query->qn('client_id') . ' = 1');
		$query->where($query->qn('component_id') . ' = ' . (int) $id);
>>>>>>> upstream/master

		$db->setQuery($query);

		$ids = $db->loadColumn();

		// Check for error
<<<<<<< HEAD
		if ($error = $db->getErrorMsg() || empty($ids)){
			JError::raiseWarning('', JText::_('JLIB_INSTALLER_ERROR_COMP_REMOVING_ADMIN_MENUS_FAILED'));

			if ($error && $error != 1) {
=======
		if ($error = $db->getErrorMsg())
		{
			JError::raiseWarning('', JText::_('JLIB_INSTALLER_ERROR_COMP_REMOVING_ADMIN_MENUS_FAILED'));

			if ($error && $error != 1)
			{
>>>>>>> upstream/master
				JError::raiseWarning(100, $error);
			}

			return false;
		}
<<<<<<< HEAD
		else {
			// Iterate the items to delete each one.
			foreach($ids as $menuid){
				if (!$table->delete((int) $menuid)) {
=======
		else if (!empty($ids))
		{
			// Iterate the items to delete each one.
			foreach ($ids as $menuid)
			{
				if (!$table->delete((int) $menuid))
				{
>>>>>>> upstream/master
					$this->setError($table->getError());
					return false;
				}
			}
			// Rebuild the whole tree
			$table->rebuild();

		}
		return true;
	}

	/**
	 * Custom rollback method
	 * - Roll back the component menu item
	 *
<<<<<<< HEAD
	 * @param   array  $arg	Installation step to rollback
	 *
	 * @return  boolean  True on success
	 * @since   11.1
	 */
	protected function _rollback_menu()
	{
		return true;
=======
	 * @param   array  $step  Installation step to rollback.
	 *
	 * @return  boolean  True on success
	 *
	 * @since   11.1
	 */
	protected function _rollback_menu($step)
	{
		return $this->_removeAdminMenus((object) array('extension_id' => $step['id']));
>>>>>>> upstream/master
	}

	/**
	 * Discover unregistered extensions.
	 *
	 * @return  array  A list of extensions.
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function discover()
	{
		$results = array();
<<<<<<< HEAD
		$site_components = JFolder::folders(JPATH_SITE.DS.'components');
		$admin_components = JFolder::folders(JPATH_ADMINISTRATOR.DS.'components');

		foreach ($site_components as $component) {
			if (file_exists(JPATH_SITE.DS.'components'.DS.$component.DS.str_replace('com_','', $component).'.xml')) {
				$manifest_details = JApplicationHelper::parseXMLInstallFile(JPATH_SITE.DS.'components'.DS.$component.DS.str_replace('com_','', $component).'.xml');
=======
		$site_components = JFolder::folders(JPATH_SITE . '/components');
		$admin_components = JFolder::folders(JPATH_ADMINISTRATOR . '/components');

		foreach ($site_components as $component)
		{
			if (file_exists(JPATH_SITE . '/components/' . $component . '/' . str_replace('com_', '', $component) . '.xml'))
			{
				$manifest_details = JApplicationHelper::parseXMLInstallFile(
					JPATH_SITE . '/components/' . $component . '/' . str_replace('com_', '', $component) . '.xml'
				);
>>>>>>> upstream/master
				$extension = JTable::getInstance('extension');
				$extension->set('type', 'component');
				$extension->set('client_id', 0);
				$extension->set('element', $component);
				$extension->set('name', $component);
				$extension->set('state', -1);
				$extension->set('manifest_cache', json_encode($manifest_details));
				$results[] = $extension;
			}
		}

<<<<<<< HEAD
		foreach ($admin_components as $component) {
			if (file_exists(JPATH_ADMINISTRATOR.DS.'components'.DS.$component.DS.str_replace('com_','', $component).'.xml')) {
				$manifest_details = JApplicationHelper::parseXMLInstallFile(JPATH_ADMINISTRATOR.DS.'components'.DS.$component.DS.str_replace('com_','', $component).'.xml');
=======
		foreach ($admin_components as $component)
		{
			if (file_exists(JPATH_ADMINISTRATOR . '/components/' . $component . '/' . str_replace('com_', '', $component) . '.xml'))
			{
				$manifest_details = JApplicationHelper::parseXMLInstallFile(
					JPATH_ADMINISTRATOR . '/components/' . $component . '/' . str_replace('com_', '', $component) . '.xml'
				);
>>>>>>> upstream/master
				$extension = JTable::getInstance('extension');
				$extension->set('type', 'component');
				$extension->set('client_id', 1);
				$extension->set('element', $component);
				$extension->set('name', $component);
				$extension->set('state', -1);
				$extension->set('manifest_cache', json_encode($manifest_details));
				$results[] = $extension;
			}
		}
		return $results;
	}

	/**
	 * Install unregistered extensions that have been discovered.
	 *
	 * @return  mixed
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function discover_install()
	{
		// Need to find to find where the XML file is since we don't store this normally
		$client = JApplicationHelper::getClientInfo($this->parent->extension->client_id);
		$short_element = str_replace('com_', '', $this->parent->extension->element);
<<<<<<< HEAD
		$manifestPath = $client->path.DS.'components'. DS.$this->parent->extension->element.DS.$short_element.'.xml';
		$this->parent->manifest = $this->parent->isManifest($manifestPath);
		$this->parent->setPath('manifest', $manifestPath);
		$this->parent->setPath('source', $client->path.DS.'components'. DS.$this->parent->extension->element);
=======
		$manifestPath = $client->path . '/components/' . $this->parent->extension->element . '/' . $short_element . '.xml';
		$this->parent->manifest = $this->parent->isManifest($manifestPath);
		$this->parent->setPath('manifest', $manifestPath);
		$this->parent->setPath('source', $client->path . '/components/' . $this->parent->extension->element);
>>>>>>> upstream/master
		$this->parent->setPath('extension_root', $this->parent->getPath('source'));

		$manifest_details = JApplicationHelper::parseXMLInstallFile($this->parent->getPath('manifest'));
		$this->parent->extension->manifest_cache = json_encode($manifest_details);
		$this->parent->extension->state = 0;
		$this->parent->extension->name = $manifest_details['name'];
		$this->parent->extension->enabled = 1;
		$this->parent->extension->params = $this->parent->getParams();

<<<<<<< HEAD
		try {
			$this->parent->extension->store();
		}
		catch (JException $e) {
=======
		try
		{
			$this->parent->extension->store();
		}
		catch (JException $e)
		{
>>>>>>> upstream/master
			JError::raiseWarning(101, JText::_('JLIB_INSTALLER_ERROR_COMP_DISCOVER_STORE_DETAILS'));
			return false;
		}

		// now we need to run any SQL it has, languages, media or menu stuff

		// Get a database connector object
		$db = $this->parent->getDbo();

		// Get the extension manifest object
		$this->manifest = $this->parent->getManifest();

		/**
		 * ---------------------------------------------------------------------------------------------
		 * Manifest Document Setup Section
		 * ---------------------------------------------------------------------------------------------
		 */

		// Set the extensions name
<<<<<<< HEAD
		$name = strtolower(JFilterInput::getInstance()->clean((string)$this->manifest->name, 'cmd'));
		if (substr($name, 0, 4)=="com_") {
			$element = $name;
		}
		else {
=======
		$name = strtolower(JFilterInput::getInstance()->clean((string) $this->manifest->name, 'cmd'));
		if (substr($name, 0, 4) == "com_")
		{
			$element = $name;
		}
		else
		{
>>>>>>> upstream/master
			$element = "com_$name";
		}

		$this->set('name', $name);
		$this->set('element', $element);

		// Get the component description
<<<<<<< HEAD
		$description = (string)$this->manifest->description;

		if ($description) {
			$this->parent->set('message', JText::_((string)$description));
		}
		else {
=======
		$description = (string) $this->manifest->description;

		if ($description)
		{
			$this->parent->set('message', JText::_((string) $description));
		}
		else
		{
>>>>>>> upstream/master
			$this->parent->set('message', '');
		}

		// Set the installation target paths
<<<<<<< HEAD
		$this->parent->setPath('extension_site', JPath::clean(JPATH_SITE.DS."components".DS.$this->get('element')));
		$this->parent->setPath('extension_administrator', JPath::clean(JPATH_ADMINISTRATOR.DS."components".DS.$this->get('element')));
=======
		$this->parent->setPath('extension_site', JPath::clean(JPATH_SITE . '/components/' . $this->get('element')));
		$this->parent->setPath('extension_administrator', JPath::clean(JPATH_ADMINISTRATOR . '/components/' . $this->get('element')));
>>>>>>> upstream/master
		$this->parent->setPath('extension_root', $this->parent->getPath('extension_administrator')); // copy this as its used as a common base

		/**
		 * ---------------------------------------------------------------------------------------------
		 * Basic Checks Section
		 * ---------------------------------------------------------------------------------------------
		 */

		// Make sure that we have an admin element
<<<<<<< HEAD
		if (!$this->manifest->administration) {
=======
		if (!$this->manifest->administration)
		{
>>>>>>> upstream/master
			JError::raiseWarning(1, JText::_('JLIB_INSTALLER_ERROR_COMP_INSTALL_ADMIN_ELEMENT'));
			return false;
		}

		/**
		 * ---------------------------------------------------------------------------------------------
		 * Installer Trigger Loading
		 * ---------------------------------------------------------------------------------------------
		 */
		// If there is an manifest class file, lets load it; we'll copy it later (don't have dest yet)
<<<<<<< HEAD
		$manifestScript = (string)$this->manifest->scriptfile;

		if ($manifestScript) {
			$manifestScriptFile = $this->parent->getPath('source').DS.$manifestScript;

			if (is_file($manifestScriptFile)) {
=======
		$manifestScript = (string) $this->manifest->scriptfile;

		if ($manifestScript)
		{
			$manifestScriptFile = $this->parent->getPath('source') . '/' . $manifestScript;

			if (is_file($manifestScriptFile))
			{
>>>>>>> upstream/master
				// load the file
				include_once $manifestScriptFile;
			}

			// Set the class name
<<<<<<< HEAD
			$classname = $element.'InstallerScript';

			if (class_exists($classname)) {
=======
			$classname = $element . 'InstallerScript';

			if (class_exists($classname))
			{
>>>>>>> upstream/master
				// create a new instance
				$this->parent->manifestClass = new $classname($this);
				// and set this so we can copy it later
				$this->set('manifest_script', $manifestScript);
<<<<<<< HEAD
=======

>>>>>>> upstream/master
				// Note: if we don't find the class, don't bother to copy the file
			}
		}

<<<<<<< HEAD
		// run preflight if possible (since we know we're not an update)
		ob_start();
		ob_implicit_flush(false);

		if ($this->parent->manifestClass && method_exists($this->parent->manifestClass,'preflight')) {

			if ($this->parent->manifestClass->preflight('discover_install', $this) === false) {
=======
		// Run preflight if possible (since we know we're not an update)
		ob_start();
		ob_implicit_flush(false);

		if ($this->parent->manifestClass && method_exists($this->parent->manifestClass, 'preflight'))
		{

			if ($this->parent->manifestClass->preflight('discover_install', $this) === false)
			{
>>>>>>> upstream/master
				// Install failed, rollback changes
				$this->parent->abort(JText::_('JLIB_INSTALLER_ABORT_COMP_INSTALL_CUSTOM_INSTALL_FAILURE'));
				return false;
			}
		}

		$msg = ob_get_contents(); // create msg object; first use here
		ob_end_clean();

		// Normally we would copy files and create directories, lets skip to the optional files
		// Note: need to dereference things!
		// Parse optional tags
		//$this->parent->parseMedia($this->manifest->media);

		// We don't do language because 1.6 suggests moving to extension based languages
		//$this->parent->parseLanguages($this->manifest->languages);
		//$this->parent->parseLanguages($this->manifest->administration->languages, 1);

		/**
		 * ---------------------------------------------------------------------------------------------
		 * Database Processing Section
		 * ---------------------------------------------------------------------------------------------
		 */

		/*
		 * Let's run the install queries for the component
		 *	If Joomla 1.5 compatible, with discreet sql files - execute appropriate
		 *	file for utf-8 support or non-utf-8 support
		 */
<<<<<<< HEAD
		// try for Joomla 1.5 type queries
		// second argument is the utf compatible version attribute
		if (isset($this->manifest->install->sql)) {
			$utfresult = $this->parent->parseSQLFiles($this->manifest->install->sql);

			if ($utfresult === false) {
=======
		// Try for Joomla 1.5 type queries
		// second argument is the utf compatible version attribute
		if (isset($this->manifest->install->sql))
		{
			$utfresult = $this->parent->parseSQLFiles($this->manifest->install->sql);

			if ($utfresult === false)
			{
>>>>>>> upstream/master
				// Install failed, rollback changes
				$this->parent->abort(JText::sprintf('JLIB_INSTALLER_ABORT_COMP_INSTALL_SQL_ERROR', $db->stderr(true)));

				return false;
			}
		}

		// Time to build the admin menus
<<<<<<< HEAD
		if (!$this->_buildAdminMenus($this->parent->extension->extension_id)) {
			JError::raiseWarning(100, JText::_('JLIB_INSTALLER_ABORT_COMP_BUILDADMINMENUS_FAILED'));
=======
		if (!$this->_buildAdminMenus($this->parent->extension->extension_id))
		{
			JError::raiseWarning(100, JText::_('JLIB_INSTALLER_ABORT_COMP_BUILDADMINMENUS_FAILED'));

>>>>>>> upstream/master
			//$this->parent->abort(JText::sprintf('JLIB_INSTALLER_ABORT_COMP_INSTALL_ROLLBACK', $db->stderr(true)));

			//return false;
		}

		/**
		 * ---------------------------------------------------------------------------------------------
		 * Custom Installation Script Section
		 * ---------------------------------------------------------------------------------------------
		 */

		/*
		 * If we have an install script, lets include it, execute the custom
		 * install method, and append the return value from the custom install
		 * method to the installation message.
		 */
		// start legacy support
<<<<<<< HEAD
		if ($this->get('install_script')) {

			if (is_file($this->parent->getPath('extension_administrator').DS.$this->get('install_script'))) {
				ob_start();
				ob_implicit_flush(false);

				require_once $this->parent->getPath('extension_administrator').DS.$this->get('install_script');

				if (function_exists('com_install')) {

					if (com_install() === false) {
=======
		if ($this->get('install_script'))
		{

			if (is_file($this->parent->getPath('extension_administrator') . '/' . $this->get('install_script')))
			{
				ob_start();
				ob_implicit_flush(false);

				require_once $this->parent->getPath('extension_administrator') . '/' . $this->get('install_script');

				if (function_exists('com_install'))
				{

					if (com_install() === false)
					{
>>>>>>> upstream/master
						$this->parent->abort(JText::_('JLIB_INSTALLER_ABORT_COMP_INSTALL_CUSTOM_INSTALL_FAILURE'));
						return false;
					}
				}
<<<<<<< HEAD

				$msg .= ob_get_contents(); // append messages
				ob_end_clean();
			}
		}
		// end legacy support
=======
				// Append messages
				$msg .= ob_get_contents();
				ob_end_clean();
			}
		}
		// End legacy support
>>>>>>> upstream/master

		// Start Joomla! 1.6
		ob_start();
		ob_implicit_flush(false);

<<<<<<< HEAD
		if ($this->parent->manifestClass && method_exists($this->parent->manifestClass,'discover_install')) {

			if ($this->parent->manifestClass->install($this) === false) {
=======
		if ($this->parent->manifestClass && method_exists($this->parent->manifestClass, 'discover_install'))
		{

			if ($this->parent->manifestClass->install($this) === false)
			{
>>>>>>> upstream/master
				// Install failed, rollback changes
				$this->parent->abort(JText::_('JLIB_INSTALLER_ABORT_COMP_INSTALL_CUSTOM_INSTALL_FAILURE'));

				return false;
			}
		}

		$msg .= ob_get_contents(); // append messages
		ob_end_clean();

		/**
		 * ---------------------------------------------------------------------------------------------
		 * Finalization and Cleanup Section
		 * ---------------------------------------------------------------------------------------------
		 */

		// Clobber any possible pending updates
		$update = JTable::getInstance('update');
<<<<<<< HEAD
		$uid = $update->find(
			array(
				'element'	=> $this->get('element'),
				'type'		=> 'component',
				'client_id'	=> '',
				'folder'	=> ''
			)
		);

		if ($uid) {
=======
		$uid = $update->find(array('element' => $this->get('element'), 'type' => 'component', 'client_id' => '', 'folder' => ''));

		if ($uid)
		{
>>>>>>> upstream/master
			$update->delete($uid);
		}

		// And now we run the postflight
		ob_start();
		ob_implicit_flush(false);

<<<<<<< HEAD
		if ($this->parent->manifestClass && method_exists($this->parent->manifestClass,'postflight')) {
=======
		if ($this->parent->manifestClass && method_exists($this->parent->manifestClass, 'postflight'))
		{
>>>>>>> upstream/master
			$this->parent->manifestClass->postflight('discover_install', $this);
		}

		$msg .= ob_get_contents(); // append messages
		ob_end_clean();

<<<<<<< HEAD
		if ($msg != '') {
=======
		if ($msg != '')
		{
>>>>>>> upstream/master
			$this->parent->set('extension_message', $msg);
		}

		return $this->parent->extension->extension_id;
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
		$client = JApplicationHelper::getClientInfo($this->parent->extension->client_id);
		$short_element = str_replace('com_', '', $this->parent->extension->element);
<<<<<<< HEAD
		$manifestPath = $client->path.DS.'components'. DS.$this->parent->extension->element.DS.$short_element.'.xml';
=======
		$manifestPath = $client->path . '/components/' . $this->parent->extension->element . '/' . $short_element . '.xml';
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
			JError::raiseWarning(101, JText::_('JLIB_INSTALLER_ERROR_COMP_REFRESH_MANIFEST_CACHE'));
			return false;
		}
	}
}
