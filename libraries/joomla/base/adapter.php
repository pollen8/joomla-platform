<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Base
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
jimport('joomla.filesystem.folder');

/**
 * Adapter Class
 * Retains common adapter pattern functions
 * Class harvested from joomla.installer.installer
 *
 * @package     Joomla.Platform
 * @subpackage  Base
 * @since       11.1
 */
class JAdapter extends JObject
{
	/**
<<<<<<< HEAD
	 * @var    array	Associative array of adapters
=======
	 * Associative array of adapters
	 *
	 * @var    array
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $_adapters = array();

	/**
<<<<<<< HEAD
	 * @var    string	Adapter Folder
=======
	 * Adapter Folder
	 * @var    string
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $_adapterfolder = 'adapters';

	/**
	 * @var    string	Adapter Class Prefix
	 * @since  11.1
	 */
	protected $_classprefix = 'J';

	/**
<<<<<<< HEAD
	 * @var    string	Base Path for the adapter instance
=======
	 * Base Path for the adapter instance
	 *
	 * @var    string
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $_basepath = null;

	/**
<<<<<<< HEAD
	 * @var    object	Database Connector Object
=======
	 * Database Connector Object
	 *
	 * @var    object
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $_db;

	/**
	 * Constructor
	 *
<<<<<<< HEAD
	 * @param   string   $basepath      Base Path of the adapters
	 * @param   string   $classprefix   Class prefix of adapters
	 * @param   string   $adapterfolder Name of folder to append to base path
	 *
	 * @return  JAdapter  JAdapter object
=======
	 * @param   string  $basepath       Base Path of the adapters
	 * @param   string  $classprefix    Class prefix of adapters
	 * @param   string  $adapterfolder  Name of folder to append to base path
	 *
	 * @return  JAdapter  JAdapter object
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function __construct($basepath, $classprefix = null, $adapterfolder = null)
	{
<<<<<<< HEAD
		$this->_basepath		= $basepath;
		$this->_classprefix		= $classprefix ? $classprefix : 'J';
		$this->_adapterfolder	= $adapterfolder ? $adapterfolder : 'adapters';
=======
		$this->_basepath = $basepath;
		$this->_classprefix = $classprefix ? $classprefix : 'J';
		$this->_adapterfolder = $adapterfolder ? $adapterfolder : 'adapters';
>>>>>>> upstream/master

		$this->_db = JFactory::getDBO();
	}

	/**
	 * Get the database connector object
	 *
	 * @return  object  Database connector object
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function getDBO()
	{
		return $this->_db;
	}

	/**
	 * Set an adapter by name
	 *
<<<<<<< HEAD
	 * @param   string  $name		Adapter name
	 * @param   object  $adapter	Adapter object
	 * @param   array   $options	Adapter options
	 *
	 * @return  boolean  True if successful
=======
	 * @param   string  $name      Adapter name
	 * @param   object  &$adapter  Adapter object
	 * @param   array   $options   Adapter options
	 *
	 * @return  boolean  True if successful
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function setAdapter($name, &$adapter = null, $options = Array())
	{
<<<<<<< HEAD
		if (!is_object($adapter)) {
			$fullpath = $this->_basepath.DS.$this->_adapterfolder.DS.strtolower($name).'.php';

			if (!file_exists($fullpath)) {
=======
		if (!is_object($adapter))
		{
			$fullpath = $this->_basepath . '/' . $this->_adapterfolder . '/' . strtolower($name) . '.php';

			if (!file_exists($fullpath))
			{
>>>>>>> upstream/master
				return false;
			}

			// Try to load the adapter object
			require_once $fullpath;

<<<<<<< HEAD
			$class = $this->_classprefix.ucfirst($name);
			if (!class_exists($class)) {
=======
			$class = $this->_classprefix . ucfirst($name);
			if (!class_exists($class))
			{
>>>>>>> upstream/master
				return false;
			}

			$adapter = new $class($this, $this->_db, $options);
		}

		$this->_adapters[$name] = &$adapter;

		return true;
	}

	/**
	 * Return an adapter.
	 *
	 * @param   string  $name     Name of adapter to return
	 * @param   array   $options  Adapter options
	 *
	 * @return  object  Adapter of type 'name' or false
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function getAdapter($name, $options = Array())
	{
<<<<<<< HEAD
		if (!array_key_exists($name, $this->_adapters)) {
			if (!$this->setAdapter($name, $options)) {
=======
		if (!array_key_exists($name, $this->_adapters))
		{
			if (!$this->setAdapter($name, $options))
			{
>>>>>>> upstream/master
				$false = false;

				return $false;
			}
		}

		return $this->_adapters[$name];
	}

	/**
	 * Loads all adapters.
	 *
	 * @param   array  $options  Adapter options
	 *
	 * @return  void
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function loadAllAdapters($options = array())
	{
<<<<<<< HEAD
		$list = JFolder::files($this->_basepath.DS.$this->_adapterfolder);

		foreach ($list as $filename)
		{
			if (JFile::getExt($filename) == 'php') {
				// Try to load the adapter object
				require_once $this->_basepath.DS.$this->_adapterfolder.DS.$filename;

				$name = JFile::stripExt($filename);
				$class = $this->_classprefix.ucfirst($name);

				if (!class_exists($class)) {
=======
		$list = JFolder::files($this->_basepath . '/' . $this->_adapterfolder);

		foreach ($list as $filename)
		{
			if (JFile::getExt($filename) == 'php')
			{
				// Try to load the adapter object
				require_once $this->_basepath . '/' . $this->_adapterfolder . '/' . $filename;

				$name = JFile::stripExt($filename);
				$class = $this->_classprefix . ucfirst($name);

				if (!class_exists($class))
				{
>>>>>>> upstream/master
					continue; // skip to next one
				}

				$adapter = new $class($this, $this->_db, $options);
				$this->_adapters[$name] = clone $adapter;
			}
		}
	}
<<<<<<< HEAD
}
=======
}
>>>>>>> upstream/master
