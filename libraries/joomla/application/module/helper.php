<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Application
 *
 * @copyright   Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

<<<<<<< HEAD
defined('JPATH_PLATFORM') or die;

// Import library dependencies
=======
defined('JPATH_PLATFORM') or die();

>>>>>>> upstream/master
jimport('joomla.application.component.helper');

/**
 * Module helper class
 *
 * @package     Joomla.Platform
 * @subpackage  Application
 * @since       11.1
 */
abstract class JModuleHelper
{
	/**
	 * Get module by name (real, eg 'Breadcrumbs' or folder, eg 'mod_breadcrumbs')
	 *
<<<<<<< HEAD
	 * @param   string  The name of the module
	 * @param   string  The title of the module, optional
	 *
	 * @return  object  The Module object
	 */
	public static function &getModule($name, $title = null)
	{
		$result		= null;
		$modules	= JModuleHelper::_load();
		$total		= count($modules);
		for ($i = 0; $i < $total; $i++)
		{
			// Match the name of the module
			if ($modules[$i]->name == $name)
=======
	 * @param   string  $name   The name of the module
	 * @param   string  $title  The title of the module, optional
	 *
	 * @return  object  The Module object
	 *
	 * @since   11.1
	 */
	public static function &getModule($name, $title = null)
	{
		$result = null;
		$modules = JModuleHelper::_load();
		$total = count($modules);

		for ($i = 0; $i < $total; $i++)
		{
			// Match the name of the module
			if ($modules[$i]->name == $name || $modules[$i]->module == $name)
>>>>>>> upstream/master
			{
				// Match the title if we're looking for a specific instance of the module
				if (!$title || $modules[$i]->title == $title)
				{
<<<<<<< HEAD
					$result = &$modules[$i];
					break;	// Found it
=======
					// Found it
					$result = &$modules[$i];
					break; // Found it
>>>>>>> upstream/master
				}
			}
		}

		// If we didn't find it, and the name is mod_something, create a dummy object
		if (is_null($result) && substr($name, 0, 4) == 'mod_')
		{
<<<<<<< HEAD
			$result				= new stdClass;
			$result->id			= 0;
			$result->title		= '';
			$result->module		= $name;
			$result->position	= '';
			$result->content	= '';
			$result->showtitle	= 0;
			$result->control	= '';
			$result->params		= '';
			$result->user		= 0;
=======
			$result = new stdClass;
			$result->id = 0;
			$result->title = '';
			$result->module = $name;
			$result->position = '';
			$result->content = '';
			$result->showtitle = 0;
			$result->control = '';
			$result->params = '';
			$result->user = 0;
>>>>>>> upstream/master
		}

		return $result;
	}

	/**
	 * Get modules by position
	 *
<<<<<<< HEAD
	 * @param   string  $position	The position of the module
	 *
	 * @return  array  An array of module objects
	 */
	public static function &getModules($position)
	{
		$app		= JFactory::getApplication();
		$position	= strtolower($position);
		$result		= array();
=======
	 * @param   string  $position  The position of the module
	 *
	 * @return  array  An array of module objects
	 *
	 * @since   11.1
	 */
	public static function &getModules($position)
	{
		$app = JFactory::getApplication();
		$position = strtolower($position);
		$result = array();
>>>>>>> upstream/master

		$modules = JModuleHelper::_load();

		$total = count($modules);
		for ($i = 0; $i < $total; $i++)
		{
<<<<<<< HEAD
			if ($modules[$i]->position == $position) {
				$result[] = &$modules[$i];
			}
		}
=======
			if ($modules[$i]->position == $position)
			{
				$result[] = &$modules[$i];
			}
		}

>>>>>>> upstream/master
		if (count($result) == 0)
		{
			if (JRequest::getBool('tp') && JComponentHelper::getParams('com_templates')->get('template_positions_display'))
			{
<<<<<<< HEAD
				$result[0] = JModuleHelper::getModule('mod_'.$position);
=======
				$result[0] = JModuleHelper::getModule('mod_' . $position);
>>>>>>> upstream/master
				$result[0]->title = $position;
				$result[0]->content = $position;
				$result[0]->position = $position;
			}
		}

		return $result;
	}

	/**
	 * Checks if a module is enabled
	 *
<<<<<<< HEAD
	 * @param   string  The module name
	 *
	 * @return  boolean
=======
	 * @param   string  $module  The module name
	 *
	 * @return  boolean
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public static function isEnabled($module)
	{
		$result = JModuleHelper::getModule($module);
<<<<<<< HEAD
		return (!is_null($result));
=======

		return !is_null($result);
>>>>>>> upstream/master
	}

	/**
	 * Render the module.
	 *
<<<<<<< HEAD
	 * @param   object  A module object.
	 * @param   array   An array of attributes for the module (probably from the XML).
	 *
	 * @return  string  The HTML content of the module output.
=======
	 * @param   object  $module   A module object.
	 * @param   array   $attribs  An array of attributes for the module (probably from the XML).
	 *
	 * @return  string  The HTML content of the module output.
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public static function renderModule($module, $attribs = array())
	{
		static $chrome;

<<<<<<< HEAD
		$option = JRequest::getCmd('option');
		$app	= JFactory::getApplication();

		// Record the scope.
		$scope	= $app->scope;
=======
		if (constant('JDEBUG'))
		{
			JProfiler::getInstance('Application')->mark('beforeRenderModule ' . $module->module . ' (' . $module->title . ')');
		}

		$option = JRequest::getCmd('option');
		$app = JFactory::getApplication();

		// Record the scope.
		$scope = $app->scope;
>>>>>>> upstream/master

		// Set scope to component name
		$app->scope = $module->module;

		// Get module parameters
		$params = new JRegistry;
<<<<<<< HEAD
		$params->loadJSON($module->params);

		// Get module path
		$module->module = preg_replace('/[^A-Z0-9_\.-]/i', '', $module->module);
		$path = JPATH_BASE.'/modules/'.$module->module.'/'.$module->module.'.php';

		// Load the module
		if (!$module->user && file_exists($path))
		{
			$lang = JFactory::getLanguage();
			// 1.5 or Core then 1.6 3PD
				$lang->load($module->module, JPATH_BASE, null, false, false)
			||	$lang->load($module->module, dirname($path), null, false, false)
			||	$lang->load($module->module, JPATH_BASE, $lang->getDefault(), false, false)
			||	$lang->load($module->module, dirname($path), $lang->getDefault(), false, false);



			$content = '';
			ob_start();
			require $path;
			$module->content = ob_get_contents().$content;
			ob_end_clean();

		}

		// Load the module chrome functions
		if (!$chrome) {
			$chrome = array();
		}

		require_once JPATH_THEMES.'/system/html/modules.php';
		$chromePath = JPATH_THEMES.'/'.$app->getTemplate().'/html/modules.php';
		if (!isset($chrome[$chromePath]))
		{
			if (file_exists($chromePath)) {
				require_once $chromePath;
			}
=======
		$params->loadString($module->params);

		// Get module path
		$module->module = preg_replace('/[^A-Z0-9_\.-]/i', '', $module->module);
		$path = JPATH_BASE . '/modules/' . $module->module . '/' . $module->module . '.php';

		// Load the module
		// $module->user is a check for 1.0 custom modules and is deprecated refactoring
		if (empty($module->user) && file_exists($path))
		{
			$lang = JFactory::getLanguage();
			// 1.5 or Core then 1.6 3PD
			$lang->load($module->module, JPATH_BASE, null, false, false) ||
				$lang->load($module->module, dirname($path), null, false, false) ||
				$lang->load($module->module, JPATH_BASE, $lang->getDefault(), false, false) ||
				$lang->load($module->module, dirname($path), $lang->getDefault(), false, false);

			$content = '';
			ob_start();
			include $path;
			$module->content = ob_get_contents() . $content;
			ob_end_clean();
		}

		// Load the module chrome functions
		if (!$chrome)
		{
			$chrome = array();
		}

		include_once JPATH_THEMES . '/system/html/modules.php';
		$chromePath = JPATH_THEMES . '/' . $app->getTemplate() . '/html/modules.php';

		if (!isset($chrome[$chromePath]))
		{
			if (file_exists($chromePath))
			{
				include_once $chromePath;
			}

>>>>>>> upstream/master
			$chrome[$chromePath] = true;
		}

		// Make sure a style is set
<<<<<<< HEAD
		if (!isset($attribs['style'])) {
=======
		if (!isset($attribs['style']))
		{
>>>>>>> upstream/master
			$attribs['style'] = 'none';
		}

		// Dynamically add outline style
<<<<<<< HEAD
		if (JRequest::getBool('tp') && JComponentHelper::getParams('com_templates')->get('template_positions_display')) {
			$attribs['style'] .= ' outline';
		}

		foreach(explode(' ', $attribs['style']) as $style)
		{
			$chromeMethod = 'modChrome_'.$style;
=======
		if (JRequest::getBool('tp') && JComponentHelper::getParams('com_templates')->get('template_positions_display'))
		{
			$attribs['style'] .= ' outline';
		}

		foreach (explode(' ', $attribs['style']) as $style)
		{
			$chromeMethod = 'modChrome_' . $style;
>>>>>>> upstream/master

			// Apply chrome and render module
			if (function_exists($chromeMethod))
			{
				$module->style = $attribs['style'];

				ob_start();
				$chromeMethod($module, $params, $attribs);
				$module->content = ob_get_contents();
				ob_end_clean();
			}
		}

<<<<<<< HEAD
		$app->scope = $scope; //revert the scope
=======
		//revert the scope
		$app->scope = $scope;

		if (constant('JDEBUG'))
		{
			JProfiler::getInstance('Application')->mark('afterRenderModule ' . $module->module . ' (' . $module->title . ')');
		}
>>>>>>> upstream/master

		return $module->content;
	}

	/**
	 * Get the path to a layout for a module
	 *
<<<<<<< HEAD
	 * @param   string  $module	The name of the module
	 * @param   string  $layout	The name of the module layout. If alternative layout, in the form template:filename.
	 * @return  string  The path to the module layout
=======
	 * @param   string  $module  The name of the module
	 * @param   string  $layout  The name of the module layout. If alternative layout, in the form template:filename.
	 *
	 * @return  string  The path to the module layout
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function getLayoutPath($module, $layout = 'default')
	{
		$template = JFactory::getApplication()->getTemplate();
		$defaultLayout = $layout;
<<<<<<< HEAD
		if (strpos($layout, ':') !== false )
=======

		if (strpos($layout, ':') !== false)
>>>>>>> upstream/master
		{
			// Get the template and file name from the string
			$temp = explode(':', $layout);
			$template = ($temp[0] == '_') ? $template : $temp[0];
			$layout = $temp[1];
			$defaultLayout = ($temp[1]) ? $temp[1] : 'default';
		}

		// Build the template and base path for the layout
<<<<<<< HEAD
		$tPath = JPATH_THEMES.'/'.$template.'/html/'.$module.'/'.$layout.'.php';
		$bPath = JPATH_BASE.'/modules/'.$module.'/tmpl/'.$defaultLayout.'.php';

		// If the template has a layout override use it
		if (file_exists($tPath)) {
			return $tPath;
		}
		else {
=======
		$tPath = JPATH_THEMES . '/' . $template . '/html/' . $module . '/' . $layout . '.php';
		$bPath = JPATH_BASE . '/modules/' . $module . '/tmpl/' . $defaultLayout . '.php';

		// If the template has a layout override use it
		if (file_exists($tPath))
		{
			return $tPath;
		}
		else
		{
>>>>>>> upstream/master
			return $bPath;
		}
	}

	/**
<<<<<<< HEAD
	 * Load published modules
	 *
	 * @return  array
=======
	 * Load published modules.
	 *
	 * @return  array
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	protected static function &_load()
	{
		static $clean;

<<<<<<< HEAD
		if (isset($clean)) {
			return $clean;
		}

		$Itemid 	= JRequest::getInt('Itemid');
		$app		= JFactory::getApplication();
		$user		= JFactory::getUser();
		$groups		= implode(',', $user->getAuthorisedViewLevels());
		$lang 		= JFactory::getLanguage()->getTag();
		$clientId 	= (int) $app->getClientId();

		$cache 		= JFactory::getCache ('com_modules', '');
		$cacheid 	= md5(serialize(array($Itemid, $groups, $clientId, $lang)));

		if (!($clean = $cache->get($cacheid))) {
			$db	= JFactory::getDbo();

			$query = $db->getQuery(true);
			$query->select('id, title, module, position, content, showtitle, params, mm.menuid');
			$query->from('#__modules AS m');
			$query->join('LEFT','#__modules_menu AS mm ON mm.moduleid = m.id');
			$query->where('m.published = 1');

			$date = JFactory::getDate();
			$now = $date->toMySQL();
			$nullDate = $db->getNullDate();
			$query->where('(m.publish_up = '.$db->Quote($nullDate).' OR m.publish_up <= '.$db->Quote($now).')');
			$query->where('(m.publish_down = '.$db->Quote($nullDate).' OR m.publish_down >= '.$db->Quote($now).')');

			$query->where('m.access IN ('.$groups.')');
			$query->where('m.client_id = '. $clientId);
			$query->where('(mm.menuid = '. (int) $Itemid .' OR mm.menuid <= 0)');

			// Filter by language
			if ($app->isSite() && $app->getLanguageFilter()) {
				$query->where('m.language IN (' . $db->Quote($lang) . ',' . $db->Quote('*') . ')');
			}

			$query->order('position, ordering');
=======
		if (isset($clean))
		{
			return $clean;
		}

		$Itemid = JRequest::getInt('Itemid');
		$app = JFactory::getApplication();
		$user = JFactory::getUser();
		$groups = implode(',', $user->getAuthorisedViewLevels());
		$lang = JFactory::getLanguage()->getTag();
		$clientId = (int) $app->getClientId();

		$cache = JFactory::getCache('com_modules', '');
		$cacheid = md5(serialize(array($Itemid, $groups, $clientId, $lang)));

		if (!($clean = $cache->get($cacheid)))
		{
			$db = JFactory::getDbo();

			$query = $db->getQuery(true);
			$query->select('m.id, m.title, m.module, m.position, m.content, m.showtitle, m.params, mm.menuid');
			$query->from('#__modules AS m');
			$query->join('LEFT', '#__modules_menu AS mm ON mm.moduleid = m.id');
			$query->where('m.published = 1');

			$query->join('LEFT', '#__extensions AS e ON e.element = m.module AND e.client_id = m.client_id');
			$query->where('e.enabled = 1');

			$date = JFactory::getDate();
			$now = $date->toMySQL();
			$nullDate = $db->getNullDate();
			$query->where('(m.publish_up = ' . $db->Quote($nullDate) . ' OR m.publish_up <= ' . $db->Quote($now) . ')');
			$query->where('(m.publish_down = ' . $db->Quote($nullDate) . ' OR m.publish_down >= ' . $db->Quote($now) . ')');

			$query->where('m.access IN (' . $groups . ')');
			$query->where('m.client_id = ' . $clientId);
			$query->where('(mm.menuid = ' . (int) $Itemid . ' OR mm.menuid <= 0)');

			// Filter by language
			if ($app->isSite() && $app->getLanguageFilter())
			{
				$query->where('m.language IN (' . $db->Quote($lang) . ',' . $db->Quote('*') . ')');
			}

			$query->order('m.position, m.ordering');
>>>>>>> upstream/master

			// Set the query
			$db->setQuery($query);
			$modules = $db->loadObjectList();
<<<<<<< HEAD
			$clean	= array();

			if($db->getErrorNum()){
=======
			$clean = array();

			if ($db->getErrorNum())
			{
>>>>>>> upstream/master
				JError::raiseWarning(500, JText::sprintf('JLIB_APPLICATION_ERROR_MODULE_LOAD', $db->getErrorMsg()));
				return $clean;
			}

			// Apply negative selections and eliminate duplicates
<<<<<<< HEAD
			$negId	= $Itemid ? -(int)$Itemid : false;
			$dupes	= array();
=======
			$negId = $Itemid ? -(int) $Itemid : false;
			$dupes = array();
>>>>>>> upstream/master
			for ($i = 0, $n = count($modules); $i < $n; $i++)
			{
				$module = &$modules[$i];

				// The module is excluded if there is an explicit prohibition or if
				// the Itemid is missing or zero and the module is in exclude mode.
<<<<<<< HEAD
				$negHit	= ($negId === (int) $module->menuid)
						|| (!$negId && (int)$module->menuid < 0);
=======
				$negHit = ($negId === (int) $module->menuid) || (!$negId && (int) $module->menuid < 0);
>>>>>>> upstream/master

				if (isset($dupes[$module->id]))
				{
					// If this item has been excluded, keep the duplicate flag set,
					// but remove any item from the cleaned array.
<<<<<<< HEAD
					if ($negHit) {
=======
					if ($negHit)
					{
>>>>>>> upstream/master
						unset($clean[$module->id]);
					}
					continue;
				}
<<<<<<< HEAD
=======

>>>>>>> upstream/master
				$dupes[$module->id] = true;

				// Only accept modules without explicit exclusions.
				if (!$negHit)
				{
<<<<<<< HEAD
					//determine if this is a custom module
					$file				= $module->module;
					$custom				= substr($file, 0, 4) == 'mod_' ?  0 : 1;
					$module->user		= $custom;
					// Custom module name is given by the title field, otherwise strip off "mod_"
					$module->name		= $custom ? $module->title : substr($file, 4);
					$module->style		= null;
					$module->position	= strtolower($module->position);
					$clean[$module->id]	= $module;
				}
			}
			unset($dupes);
=======
					// Determine if this is a 1.0 style custom module (no mod_ prefix)
					// This should be eliminated when the class is refactored.
					// $module->user is deprecated.
					$file = $module->module;
					$custom = substr($file, 0, 4) == 'mod_' ?  0 : 1;
					$module->user = $custom;
					// 1.0 style custom module name is given by the title field, otherwise strip off "mod_"
					$module->name = $custom ? $module->module : substr($file, 4);
					$module->style = null;
					$module->position = strtolower($module->position);
					$clean[$module->id] = $module;
				}
			}

			unset($dupes);

>>>>>>> upstream/master
			// Return to simple indexing that matches the query order.
			$clean = array_values($clean);

			$cache->store($clean, $cacheid);
		}

		return $clean;
	}

	/**
<<<<<<< HEAD
	* Module cache helper
	*
	* Caching modes:
	* To be set in XML:
	* 'static'		one cache file for all pages with the same module parameters
	* 'oldstatic'	1.5. definition of module caching, one cache file for all pages with the same module id and user aid,
	* 'itemid'		changes on itemid change,
	* To be called from inside the module:
	* 'safeuri'		id created from $cacheparams->modeparams array,
	* 'id'			module sets own cache id's
	*
	* @param   object  $module	Module object
	* @param   object  $moduleparams module parameters
	* @param   object  $cacheparams module cache parameters - id or url parameters, depending on the module cache mode
	* @param   array   $params - parameters for given mode - calculated id or an array of safe url parameters and their
	* 					variable types, for valid values see {@link JFilterInput::clean()}.
	*
	* @since   11.1
	*/
	public static function moduleCache($module, $moduleparams, $cacheparams)
	{
		if(!isset ($cacheparams->modeparams)) {
			$cacheparams->modeparams=null;
		}

		if(!isset ($cacheparams->cachegroup)) {
=======
	 * Module cache helper
	 *
	 * Caching modes:
	 * To be set in XML:
	 * 'static'      One cache file for all pages with the same module parameters
	 * 'oldstatic'   1.5 definition of module caching, one cache file for all pages
	 * with the same module id and user aid,
	 * 'itemid'      Changes on itemid change, to be called from inside the module:
	 * 'safeuri'     Id created from $cacheparams->modeparams array,
	 * 'id'          Module sets own cache id's
	 *
	 * @param   object  $module        Module object
	 * @param   object  $moduleparams  Module parameters
	 * @param   object  $cacheparams   Module cache parameters - id or url parameters, depending on the module cache mode
	 *
	 * @return  string
	 *
	 * @since   11.1
	 *
	 * @link JFilterInput::clean()
	 */
	public static function moduleCache($module, $moduleparams, $cacheparams)
	{
		if (!isset($cacheparams->modeparams))
		{
			$cacheparams->modeparams = null;
		}

		if (!isset($cacheparams->cachegroup))
		{
>>>>>>> upstream/master
			$cacheparams->cachegroup = $module->module;
		}

		$user = JFactory::getUser();
		$cache = JFactory::getCache($cacheparams->cachegroup, 'callback');
		$conf = JFactory::getConfig();

		// Turn cache off for internal callers if parameters are set to off and for all logged in users
<<<<<<< HEAD
		if($moduleparams->get('owncache', null) === 0  || $conf->get('caching') == 0 || $user->get('id')) {
			$cache->setCaching(false);
		}

		$cache->setLifeTime($moduleparams->get('cache_time', $conf->get('cachetime') * 60));

		$wrkaroundoptions = array (
			'nopathway' 	=> 1,
			'nohead' 		=> 0,
			'nomodules' 	=> 1,
			'modulemode' 	=> 1,
			'mergehead' 	=> 1
		);

		$wrkarounds = true;

		switch ($cacheparams->cachemode) {

			case 'id':
				$ret = $cache->get(array($cacheparams->class, $cacheparams->method), $cacheparams->methodparams, $cacheparams->modeparams, $wrkarounds, $wrkaroundoptions);
				break;

			case 'safeuri':
				$secureid=null;
				if (is_array($cacheparams->modeparams)) {
					$uri = JRequest::get();
					$safeuri = new stdClass();
					foreach ($cacheparams->modeparams AS $key => $value) {
						// Use int filter for id/catid to clean out spamy slugs
						if (isset($uri[$key])) {
							$safeuri->$key = JRequest::_cleanVar($uri[$key], 0,$value);
						}
					} }
				$secureid = md5(serialize(array($safeuri, $cacheparams->method, $moduleparams)));
				$ret = $cache->get(array($cacheparams->class, $cacheparams->method), $cacheparams->methodparams, $module->id. $user->get('aid', 0).$secureid, $wrkarounds, $wrkaroundoptions);
				break;

			case 'static':
				$ret = $cache->get(array($cacheparams->class, $cacheparams->method), $cacheparams->methodparams, $module->module.md5(serialize($cacheparams->methodparams)), $wrkarounds, $wrkaroundoptions);
				break;

			case 'oldstatic':  // provided for backward compatibility, not really usefull
				$ret = $cache->get(array($cacheparams->class, $cacheparams->method), $cacheparams->methodparams, $module->id. $user->get('aid', 0), $wrkarounds, $wrkaroundoptions);
=======
		if ($moduleparams->get('owncache', null) === '0' || $conf->get('caching') == 0 || $user->get('id'))
		{
			$cache->setCaching(false);
		}

		// module cache is set in seconds, global cache in minutes, setLifeTime works in minutes
		$cache->setLifeTime($moduleparams->get('cache_time', $conf->get('cachetime') * 60) / 60);

		$wrkaroundoptions = array('nopathway' => 1, 'nohead' => 0, 'nomodules' => 1, 'modulemode' => 1, 'mergehead' => 1);

		$wrkarounds = true;
		$view_levels = md5(serialize($user->getAuthorisedViewLevels()));

		switch ($cacheparams->cachemode)
		{
			case 'id':
				$ret = $cache->get(
					array($cacheparams->class, $cacheparams->method),
					$cacheparams->methodparams,
					$cacheparams->modeparams,
					$wrkarounds,
					$wrkaroundoptions
				);
				break;

			case 'safeuri':
				$secureid = null;
				if (is_array($cacheparams->modeparams))
				{
					$uri = JRequest::get();
					$safeuri = new stdClass;
					foreach ($cacheparams->modeparams as $key => $value)
					{
						// Use int filter for id/catid to clean out spamy slugs
						if (isset($uri[$key]))
						{
							$safeuri->$key = JRequest::_cleanVar($uri[$key], 0, $value);
						}
					}
				}
				$secureid = md5(serialize(array($safeuri, $cacheparams->method, $moduleparams)));
				$ret = $cache->get(
					array($cacheparams->class, $cacheparams->method),
					$cacheparams->methodparams,
					$module->id . $view_levels . $secureid,
					$wrkarounds,
					$wrkaroundoptions
				);
				break;

			case 'static':
				$ret = $cache->get(
					array($cacheparams->class,
					$cacheparams->method),
					$cacheparams->methodparams,
					$module->module . md5(serialize($cacheparams->methodparams)),
					$wrkarounds,
					$wrkaroundoptions
				);
				break;

			case 'oldstatic': // provided for backward compatibility, not really usefull
				$ret = $cache->get(
					array($cacheparams->class, $cacheparams->method),
					$cacheparams->methodparams,
					$module->id . $view_levels,
					$wrkarounds,
					$wrkaroundoptions
				);
>>>>>>> upstream/master
				break;

			case 'itemid':
			default:
<<<<<<< HEAD
				$ret = $cache->get(array($cacheparams->class, $cacheparams->method), $cacheparams->methodparams, $module->id. $user->get('aid', 0).JRequest::getVar('Itemid',null,'default','INT'), $wrkarounds, $wrkaroundoptions);
=======
				$ret = $cache->get(
					array($cacheparams->class, $cacheparams->method),
					$cacheparams->methodparams,
					$module->id . $view_levels . JRequest::getVar('Itemid', null, 'default', 'INT'),
					$wrkarounds,
					$wrkaroundoptions
				);
>>>>>>> upstream/master
				break;
		}

		return $ret;
	}
}
