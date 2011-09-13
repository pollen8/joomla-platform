<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Plugin
 *
 * @copyright   Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

<<<<<<< HEAD
defined('JPATH_PLATFORM') or die;
=======
defined('JPATH_PLATFORM') or die();
>>>>>>> upstream/master

jimport('joomla.event.event');

/**
 * JPlugin Class
 *
 * @package     Joomla.Platform
 * @subpackage  Plugin
 * @since       11.1
 */
abstract class JPlugin extends JEvent
{
	/**
	 * A JRegistry object holding the parameters for the plugin
	 *
	 * @var    A JRegistry object
	 * @since  11.1
	 */
	public $params = null;

	/**
	 * The name of the plugin
	 *
<<<<<<< HEAD
	 * @var    sring
=======
	 * @var    string
>>>>>>> upstream/master
	 */
	protected $_name = null;

	/**
	 * The plugin type
	 *
	 * @var    string
	 */
	protected $_type = null;

	/**
	 * Constructor
	 *
<<<<<<< HEAD
	 * @param   object  $subject  The object to observe
	 * @param   array  $config  An optional associative array of configuration settings.
	 * Recognized key values include 'name', 'group', 'params', 'language'
	 * (this list is not meant to be comprehensive).
=======
	 * @param   object  &$subject  The object to observe
	 * @param   array   $config    An optional associative array of configuration settings.
	 *                             Recognized key values include 'name', 'group', 'params', 'language'
	 *                             (this list is not meant to be comprehensive).
	 *
	 * @return  JPlugin
>>>>>>> upstream/master
	 *
	 * @since   11.1
	 */
	public function __construct(&$subject, $config = array())
	{
		// Get the parameters.
		if (isset($config['params']))
		{
<<<<<<< HEAD
			if ($config['params'] instanceof JRegistry) {
				$this->params = $config['params'];
			} else {
				$this->params = new JRegistry;
				$this->params->loadJSON($config['params']);
=======
			if ($config['params'] instanceof JRegistry)
			{
				$this->params = $config['params'];
			}
			else
			{
				$this->params = new JRegistry;
				$this->params->loadString($config['params']);
>>>>>>> upstream/master
			}
		}

		// Get the plugin name.
<<<<<<< HEAD
		if (isset($config['name'])) {
=======
		if (isset($config['name']))
		{
>>>>>>> upstream/master
			$this->_name = $config['name'];
		}

		// Get the plugin type.
<<<<<<< HEAD
		if (isset($config['type'])) {
=======
		if (isset($config['type']))
		{
>>>>>>> upstream/master
			$this->_type = $config['type'];
		}

		parent::__construct($subject);
	}

	/**
	 * Loads the plugin language file
	 *
<<<<<<< HEAD
	 * @param   string   $extension	The extension for which a language file should be loaded
	 * @param   string   $basePath	The basepath to use
	 *
	 * @return  boolean  True, if the file has successfully loaded.
=======
	 * @param   string  $extension  The extension for which a language file should be loaded
	 * @param   string  $basePath   The basepath to use
	 *
	 * @return  boolean  True, if the file has successfully loaded.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function loadLanguage($extension = '', $basePath = JPATH_ADMINISTRATOR)
	{
<<<<<<< HEAD
		if (empty($extension)) {
			$extension = 'plg_'.$this->_type.'_'.$this->_name;
		}

		$lang = JFactory::getLanguage();
		return
			$lang->load(strtolower($extension), $basePath, null, false, false)
		||	$lang->load(strtolower($extension), JPATH_PLUGINS .DS.$this->_type.DS.$this->_name, null, false, false)
		||	$lang->load(strtolower($extension), $basePath, $lang->getDefault(), false, false)
		||	$lang->load(strtolower($extension), JPATH_PLUGINS .DS.$this->_type.DS.$this->_name, $lang->getDefault(), false, false);
=======
		if (empty($extension))
		{
			$extension = 'plg_' . $this->_type . '_' . $this->_name;
		}

		$lang = JFactory::getLanguage();
		return $lang->load(strtolower($extension), $basePath, null, false, false)
			|| $lang->load(strtolower($extension), JPATH_PLUGINS . '/' . $this->_type . '/' . $this->_name, null, false, false)
			|| $lang->load(strtolower($extension), $basePath, $lang->getDefault(), false, false)
			|| $lang->load(strtolower($extension), JPATH_PLUGINS . '/' . $this->_type . '/' . $this->_name, $lang->getDefault(), false, false
		);
>>>>>>> upstream/master
	}
}
