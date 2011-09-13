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

/**
 * Plugin helper class
 *
 * @package     Joomla.Platform
 * @subpackage  Plugin
 * @since       11.1
 */
abstract class JPluginHelper
{
	/**
	 * Get the plugin data of a specific type if no specific plugin is specified
	 * otherwise only the specific plugin data is returned.
	 *
<<<<<<< HEAD
	 * @param   string   $type	The plugin type, relates to the sub-directory in the plugins directory.
	 * @param   string   $plugin	The plugin name.
	 *
	 * @return  mixed    An array of plugin data objects, or a plugin data object.
=======
	 * @param   string  $type    The plugin type, relates to the sub-directory in the plugins directory.
	 * @param   string  $plugin  The plugin name.
	 *
	 * @return  mixed  An array of plugin data objects, or a plugin data object.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function getPlugin($type, $plugin = null)
	{
<<<<<<< HEAD
		$result		= array();
		$plugins	= self::_load();

		// Find the correct plugin(s) to return.
		if (!$plugin) {
			foreach($plugins as $p) {
				// Is this the right plugin?
				if ($p->type == $type) {
					$result[] = $p;
				}
			}
		} else {
			foreach($plugins as $p) {
				// Is this plugin in the right group?
				if ($p->type == $type && $p->name == $plugin) {
=======
		$result = array();
		$plugins = self::_load();

		// Find the correct plugin(s) to return.
		if (!$plugin)
		{
			foreach ($plugins as $p)
			{
				// Is this the right plugin?
				if ($p->type == $type)
				{
					$result[] = $p;
				}
			}
		}
		else
		{
			foreach ($plugins as $p)
			{
				// Is this plugin in the right group?
				if ($p->type == $type && $p->name == $plugin)
				{
>>>>>>> upstream/master
					$result = $p;
					break;
				}
			}
		}

		return $result;
	}

	/**
	 * Checks if a plugin is enabled.
	 *
<<<<<<< HEAD
	 * @param   string   $type	The plugin type, relates to the sub-directory in the plugins directory.
	 * @param   string   $plugin	The plugin name.
	 *
	 * @return  boolean
=======
	 * @param   string  $type    The plugin type, relates to the sub-directory in the plugins directory.
	 * @param   string  $plugin  The plugin name.
	 *
	 * @return  boolean
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function isEnabled($type, $plugin = null)
	{
		$result = self::getPlugin($type, $plugin);
		return (!empty($result));
	}

	/**
	 * Loads all the plugin files for a particular type if no specific plugin is specified
	 * otherwise only the specific pugin is loaded.
	 *
<<<<<<< HEAD
	 * @param   string   $type	The plugin type, relates to the sub-directory in the plugins directory.
	 * @param   string   $plugin	The plugin name.
	 * @param   bool     $autocreate
	 * @param   JDispatcher	$dispatcher	Optionally allows the plugin to use a different dispatcher.
	 *
	 * @return  boolean		True on success.
=======
	 * @param   string       $type        The plugin type, relates to the sub-directory in the plugins directory.
	 * @param   string       $plugin      The plugin name.
	 * @param   boolean      $autocreate  Autocreate the plugin.
	 * @param   JDispatcher  $dispatcher  Optionally allows the plugin to use a different dispatcher.
	 *
	 * @return  boolean  True on success.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function importPlugin($type, $plugin = null, $autocreate = true, $dispatcher = null)
	{
		static $loaded = Array();

		// check for the default args, if so we can optimise cheaply
		$defaults = false;
<<<<<<< HEAD
		if (is_null($plugin) && $autocreate == true && is_null($dispatcher)) {
			$defaults = true;
		}

		if (!isset($loaded[$type]) || !$defaults) {
=======
		if (is_null($plugin) && $autocreate == true && is_null($dispatcher))
		{
			$defaults = true;
		}

		if (!isset($loaded[$type]) || !$defaults)
		{
>>>>>>> upstream/master
			$results = null;

			// Load the plugins from the database.
			$plugins = self::_load();

			// Get the specified plugin(s).
<<<<<<< HEAD
			for ($i = 0, $t = count($plugins); $i < $t; $i++) {
				if ($plugins[$i]->type == $type && ($plugins[$i]->name == $plugin ||  $plugin === null)) {
					self::_import($plugins[$i], $autocreate, $dispatcher);
					$results = true;
				}
 			}

			// Bail out early if we're not using default args
			if(!$defaults) {
=======
			for ($i = 0, $t = count($plugins); $i < $t; $i++)
			{
				if ($plugins[$i]->type == $type && ($plugin === null || $plugins[$i]->name == $plugin))
				{
					self::_import($plugins[$i], $autocreate, $dispatcher);
					$results = true;
				}
			}

			// Bail out early if we're not using default args
			if (!$defaults)
			{
>>>>>>> upstream/master
				return $results;
			}
			$loaded[$type] = $results;
		}

		return $loaded[$type];
	}

	/**
	 * Loads the plugin file.
	 *
<<<<<<< HEAD
	 * @param   JPlugin		$plugin		The plugin.
	 * @param   boolean  	$autocreate
	 * @param   JDispatcher	$dispatcher	Optionally allows the plugin to use a different dispatcher.
	 *
	 * @return  boolean		True on success.
=======
	 * @param   JPlugin      &$plugin     The plugin.
	 * @param   boolean      $autocreate  True to autocreate.
	 * @param   JDispatcher  $dispatcher  Optionally allows the plugin to use a different dispatcher.
	 *
	 * @return  boolean  True on success.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected static function _import(&$plugin, $autocreate = true, $dispatcher = null)
	{
		static $paths = array();

		$plugin->type = preg_replace('/[^A-Z0-9_\.-]/i', '', $plugin->type);
		$plugin->name = preg_replace('/[^A-Z0-9_\.-]/i', '', $plugin->name);

<<<<<<< HEAD
		$legacypath	= JPATH_PLUGINS.DS.$plugin->type.DS.$plugin->name.'.php';
		$path = JPATH_PLUGINS.DS.$plugin->type.DS.$plugin->name.DS.$plugin->name.'.php';

		if (!isset( $paths[$path] ) || !isset($paths[$legacypath])) {
			$pathExists = file_exists($path);
			if ($pathExists || file_exists($legacypath)) {
				$path = $pathExists ? $path : $legacypath;

				jimport('joomla.plugin.plugin');
				if (!isset($paths[$path])) {
=======
		$legacypath = JPATH_PLUGINS . '/' . $plugin->type . '/' . $plugin->name . '.php';
		$path = JPATH_PLUGINS . '/' . $plugin->type . '/' . $plugin->name . '/' . $plugin->name . '.php';

		if (!isset($paths[$path]) || !isset($paths[$legacypath]))
		{
			$pathExists = file_exists($path);
			if ($pathExists || file_exists($legacypath))
			{
				$path = $pathExists ? $path : $legacypath;

				jimport('joomla.plugin.plugin');
				if (!isset($paths[$path]))
				{
>>>>>>> upstream/master
					require_once $path;
				}
				$paths[$path] = true;

<<<<<<< HEAD
				if ($autocreate) {
					// Makes sure we have an event dispatcher
					if (!is_object($dispatcher)) {
						$dispatcher = JDispatcher::getInstance();
					}

					$className = 'plg'.$plugin->type.$plugin->name;
					if (class_exists($className)) {
						// Load the plugin from the database.
						$plugin = self::getPlugin($plugin->type, $plugin->name);

						// Instantiate and register the plugin.
						new $className($dispatcher, (array)($plugin));
					}
				}
			} else {
=======
				if ($autocreate)
				{
					// Makes sure we have an event dispatcher
					if (!is_object($dispatcher))
					{
						$dispatcher = JDispatcher::getInstance();
					}

					$className = 'plg' . $plugin->type . $plugin->name;
					if (class_exists($className))
					{
						// Load the plugin from the database.
						if (!isset($plugin->params))
						{
							// Seems like this could just go bye bye completely
							$plugin = self::getPlugin($plugin->type, $plugin->name);
						}

						// Instantiate and register the plugin.
						new $className($dispatcher, (array) ($plugin));
					}
				}
			}
			else
			{
>>>>>>> upstream/master
				$paths[$path] = false;
			}
		}
	}

	/**
	 * Loads the published plugins.
	 *
	 * @return  void
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected static function _load()
	{
		static $plugins;

<<<<<<< HEAD
		if (isset($plugins)) {
			return $plugins;
		}

		$user	= JFactory::getUser();
		$cache 	= JFactory::getCache('com_plugins', '');

		$levels = implode(',', $user->getAuthorisedViewLevels());

		if (!$plugins = $cache->get($levels)) {
			$db		= JFactory::getDbo();
			$query	= $db->getQuery(true);
=======
		if (isset($plugins))
		{
			return $plugins;
		}

		$user = JFactory::getUser();
		$cache = JFactory::getCache('com_plugins', '');

		$levels = implode(',', $user->getAuthorisedViewLevels());

		if (!$plugins = $cache->get($levels))
		{
			$db = JFactory::getDbo();
			$query = $db->getQuery(true);
>>>>>>> upstream/master

			$query->select('folder AS type, element AS name, params')
				->from('#__extensions')
				->where('enabled >= 1')
<<<<<<< HEAD
				->where('type ='.$db->Quote('plugin'))
				->where('state >= 0')
				->where('access IN ('.$levels.')')
				->order('ordering');

			$plugins = $db->setQuery($query)
				->loadObjectList();

			if ($error = $db->getErrorMsg()) {
=======
				->where('type =' . $db->Quote('plugin'))
				->where('state >= 0')
				->where('access IN (' . $levels . ')')
				->order('ordering');

			$plugins = $db->setQuery($query)->loadObjectList();

			if ($error = $db->getErrorMsg())
			{
>>>>>>> upstream/master
				JError::raiseWarning(500, $error);
				return false;
			}

			$cache->store($plugins, $levels);
		}

		return $plugins;
	}
}