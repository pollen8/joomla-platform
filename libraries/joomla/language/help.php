<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Language
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
 * Help system class
 *
 * @package     Joomla.Platform
 * @subpackage  Language
 * @since       11.1
 */
class JHelp
{
	/**
	 * Create a URL for a given help key reference
	 *
<<<<<<< HEAD
	 * @param   string   $ref			The name of the help screen (its key reference)
	 * @param   boolean  $useComponent	Use the help file in the component directory
	 * @param   string   $override		Use this URL instead of any other
	 * @param   string   $component		Name of component (or null for current component)
	 *
	 * @return  string
	 * @sicne	1.5
	 */
	static function createURL($ref, $useComponent = false, $override = null, $component = null)
	{
		$local	= false;
		$app	= JFactory::getApplication();

		if (is_null($component)) {
			$component = JApplicationHelper::getComponentName();
		}


		//  Determine the location of the help file.  At this stage the URL
		//  can contain substitution codes that will be replaced later.

		if ($override) {
			$url = $override;
		}
		else {
			// Get the user help URL.
			$user		= JFactory::getUser();
			$url		= $user->getParam('helpsite');

			// If user hasn't specified a help URL, then get the global one.
			if ($url == '') {
				$url	= $app->getCfg('helpurl');
			}

			// Component help URL overrides user and global.
			if ($useComponent) {
				// Look for help URL in component parameters.
				$params = JComponentHelper::getParams( $component );
				$url = $params->get('helpURL');

				if ($url == '') {
=======
	 * @param   string   $ref           The name of the help screen (its key reference)
	 * @param   boolean  $useComponent  Use the help file in the component directory
	 * @param   string   $override      Use this URL instead of any other
	 * @param   string   $component     Name of component (or null for current component)
	 *
	 * @return  string
	 *
	 * @since   11.1
	 */
	static function createURL($ref, $useComponent = false, $override = null, $component = null)
	{
		$local = false;
		$app = JFactory::getApplication();

		if (is_null($component))
		{
			$component = JApplicationHelper::getComponentName();
		}

		//  Determine the location of the help file.  At this stage the URL
		//  can contain substitution codes that will be replaced later.

		if ($override)
		{
			$url = $override;
		}
		else
		{
			// Get the user help URL.
			$user = JFactory::getUser();
			$url = $user->getParam('helpsite');

			// If user hasn't specified a help URL, then get the global one.
			if ($url == '')
			{
				$url = $app->getCfg('helpurl');
			}

			// Component help URL overrides user and global.
			if ($useComponent)
			{
				// Look for help URL in component parameters.
				$params = JComponentHelper::getParams($component);
				$url = $params->get('helpURL');

				if ($url == '')
				{
>>>>>>> upstream/master
					$local = true;
					$url = 'components/{component}/help/{language}/{keyref}';
				}
			}

			// Set up a local help URL.
<<<<<<< HEAD
			if (!$url) {
=======
			if (!$url)
			{
>>>>>>> upstream/master
				$local = true;
				$url = 'help/{language}/{keyref}';
			}
		}

		// If the URL is local then make sure we have a valid file extension on the URL.
<<<<<<< HEAD
		if ($local) {
			if (!preg_match('#\.html$|\.xml$#i', $ref)) {
					$url .= '.html';
=======
		if ($local)
		{
			if (!preg_match('#\.html$|\.xml$#i', $ref))
			{
				$url .= '.html';
>>>>>>> upstream/master
			}
		}

		/*
		 *  Replace substitution codes in the URL.
		 */
<<<<<<< HEAD
		$lang		= JFactory::getLanguage();
		$version 	= new JVersion();
		$jver		= explode( '.', $version->getShortVersion() );
		$jlang		= explode( '-', $lang->getTag() );

		$debug		= $lang->setDebug(false);
		$keyref     = JText::_($ref);
		$lang->setDebug($debug);

		// Replace substitution codes in help URL.
		$search = array(
			'{app}',			// Application name (eg. 'Administrator')
			'{component}',		// Component name (eg. 'com_content')
			'{keyref}',			// Help screen key reference
			'{language}',		// Full language code (eg. 'en-GB')
			'{langcode}',		// Short language code (eg. 'en')
			'{langregion}',		// Region code (eg. 'GB')
			'{major}',			// Joomla major version number
			'{minor}',			// Joomla minor version number
			'{maintenance}'		// Joomla maintenance version number
		);

		$replace = array(
			$app->getName(),	// {app}
			$component,			// {component}
			$keyref,			// {keyref}
			$lang->getTag(),	// {language}
			$jlang[0],			// {langcode}
			$jlang[1],			// {langregion}
			$jver[0],			// {major}
			$jver[1],			// {minor}
			$jver[2]			// {maintenance}
=======
		$lang = JFactory::getLanguage();
		$version = new JVersion;
		$jver = explode('.', $version->getShortVersion());
		$jlang = explode('-', $lang->getTag());

		$debug = $lang->setDebug(false);
		$keyref = JText::_($ref);
		$lang->setDebug($debug);

		// Replace substitution codes in help URL.
		$search = array('{app}', // Application name (eg. 'Administrator')
			'{component}', // Component name (eg. 'com_content')
			'{keyref}', // Help screen key reference
			'{language}', // Full language code (eg. 'en-GB')
			'{langcode}', // Short language code (eg. 'en')
			'{langregion}', // Region code (eg. 'GB')
			'{major}', // Joomla major version number
			'{minor}', // Joomla minor version number
			'{maintenance}'// Joomla maintenance version number
		);

		$replace = array($app->getName(), // {app}
			$component, // {component}
			$keyref, // {keyref}
			$lang->getTag(), // {language}
			$jlang[0], // {langcode}
			$jlang[1], // {langregion}
			$jver[0], // {major}
			$jver[1], // {minor}
			$jver[2]// {maintenance}
>>>>>>> upstream/master
		);

		// If the help file is local then check it exists.
		// If it doesn't then fallback to English.
<<<<<<< HEAD
		if ($local) {
			$try = str_replace($search, $replace, $url);
			jimport('joomla.filesystem.file');

			if (!JFile::exists(JPATH_BASE.'/'.$try)) {
=======
		if ($local)
		{
			$try = str_replace($search, $replace, $url);
			jimport('joomla.filesystem.file');

			if (!JFile::exists(JPATH_BASE . '/' . $try))
			{
>>>>>>> upstream/master
				$replace[3] = 'en-GB';
				$replace[4] = 'en';
				$replace[5] = 'GB';
			}
		}

		$url = str_replace($search, $replace, $url);

		return $url;
	}

	/**
	 * Builds a list of the help sites which can be used in a select option.
	 *
<<<<<<< HEAD
	 * @param   string   $pathToXml	Path to an XML file.
	 * @param   string   $selected	Language tag to select (if exists).
	 *
	 * @return  array  An array of arrays (text, value, selected).
=======
	 * @param   string  $pathToXml  Path to an XML file.
	 * @param   string  $selected   Language tag to select (if exists).
	 *
	 * @return  array  An array of arrays (text, value, selected).
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	static function createSiteList($pathToXml, $selected = null)
	{
<<<<<<< HEAD
		$list	= array ();
		$data	= null;
		$xml = false;

		if (!empty($pathToXml)) {
			$xml = JFactory::getXML($pathToXml);
		}

		if (!$xml) {
=======
		$list = array();
		$data = null;
		$xml = false;

		if (!empty($pathToXml))
		{
			$xml = JFactory::getXML($pathToXml);
		}

		if (!$xml)
		{
>>>>>>> upstream/master
			$option['text'] = 'English (GB) help.joomla.org';
			$option['value'] = 'http://help.joomla.org';
			$list[] = $option;
		}
<<<<<<< HEAD
		else {
			$option = array ();

			foreach ($xml->sites->site as $site)
			{
				$option['text'] = (string)$site;
				$option['value'] = (string)$site->attributes()->url;
=======
		else
		{
			$option = array();

			foreach ($xml->sites->site as $site)
			{
				$option['text'] = (string) $site;
				$option['value'] = (string) $site->attributes()->url;
>>>>>>> upstream/master

				$list[] = $option;
			}
		}

		return $list;
	}
}
