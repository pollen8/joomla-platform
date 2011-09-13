<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Document
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
 * JDocument Module renderer
 *
 * @package     Joomla.Platform
 * @subpackage  Document
 * @since       11.1
 */
class JDocumentRendererModule extends JDocumentRenderer
{
	/**
	 * Renders a module script and returns the results as a string
	 *
<<<<<<< HEAD
	 * @param   string  $name	The name of the module to render
	 * @param   array   $attribs	Associative array of values
	 *
	 * @return  string  The output of the script
=======
	 * @param   string  $module   The name of the module to render
	 * @param   array   $attribs  Associative array of values
	 * @param   string  $content  If present, module information from the buffer will be used
	 *
	 * @return  string  The output of the script
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function render($module, $attribs = array(), $content = null)
	{
		if (!is_object($module))
		{
<<<<<<< HEAD
			$title	= isset($attribs['title']) ? $attribs['title'] : null;
=======
			$title = isset($attribs['title']) ? $attribs['title'] : null;
>>>>>>> upstream/master

			$module = JModuleHelper::getModule($module, $title);

			if (!is_object($module))
			{
<<<<<<< HEAD
				if (is_null($content)) {
					return '';
				}
				else {
=======
				if (is_null($content))
				{
					return '';
				}
				else
				{
>>>>>>> upstream/master
					/**
					 * If module isn't found in the database but data has been pushed in the buffer
					 * we want to render it
					 */
					$tmp = $module;
<<<<<<< HEAD
					$module = new stdClass();
=======
					$module = new stdClass;
>>>>>>> upstream/master
					$module->params = null;
					$module->module = $tmp;
					$module->id = 0;
					$module->user = 0;
				}
			}
		}

		// Get the user and configuration object
		// $user = JFactory::getUser();
		$conf = JFactory::getConfig();

		// Set the module content
<<<<<<< HEAD
		if (!is_null($content)) {
=======
		if (!is_null($content))
		{
>>>>>>> upstream/master
			$module->content = $content;
		}

		// Get module parameters
		$params = new JRegistry;
<<<<<<< HEAD
		$params->loadJSON($module->params);

		// Use parameters from template
		if (isset($attribs['params'])) {
			$template_params = new JRegistry;
			$template_params->loadJSON(html_entity_decode($attribs['params'], ENT_COMPAT, 'UTF-8'));
=======
		$params->loadString($module->params);

		// Use parameters from template
		if (isset($attribs['params']))
		{
			$template_params = new JRegistry;
			$template_params->loadString(html_entity_decode($attribs['params'], ENT_COMPAT, 'UTF-8'));
>>>>>>> upstream/master
			$params->merge($template_params);
			$module = clone $module;
			$module->params = (string) $params;
		}

		$contents = '';
		// Default for compatibility purposes. Set cachemode parameter or use JModuleHelper::moduleCache from within the
		// module instead
		$cachemode = $params->get('cachemode', 'oldstatic');

<<<<<<< HEAD
		if ($params->get('cache', 0) == 1  && $conf->get('caching') >= 1 && $cachemode != 'id' && $cachemode != 'safeuri')
=======
		if ($params->get('cache', 0) == 1 && $conf->get('caching') >= 1 && $cachemode != 'id' && $cachemode != 'safeuri')
>>>>>>> upstream/master
		{

			// Default to itemid creating method and workarounds on
			$cacheparams = new stdClass;
			$cacheparams->cachemode = $cachemode;
			$cacheparams->class = 'JModuleHelper';
			$cacheparams->method = 'renderModule';
			$cacheparams->methodparams = array($module, $attribs);

			$contents = JModuleHelper::ModuleCache($module, $params, $cacheparams);

		}
<<<<<<< HEAD
		else {
=======
		else
		{
>>>>>>> upstream/master
			$contents = JModuleHelper::renderModule($module, $attribs);
		}

		return $contents;
	}
<<<<<<< HEAD
}
=======
}
>>>>>>> upstream/master
