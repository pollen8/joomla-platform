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
=======
defined('JPATH_PLATFORM') or die();
>>>>>>> upstream/master

/**
 * Application helper functions
 *
 * @package     Joomla.Platform
 * @subpackage  Application
 * @since       11.1
 */
class JApplicationHelper
{
	/**
	 * Client information array
<<<<<<< HEAD
=======
	 *
	 * @var    array
	 * @since  11.1
>>>>>>> upstream/master
	 */
	protected static $_clients = null;

	/**
	 * Return the name of the request component [main component]
	 *
<<<<<<< HEAD
	 * @param   string  $default The default option
	 * @return  string  Option
	 * @since   11.1
	 */
	public static function getComponentName($default = NULL)
	{
		static $option;

		if ($option) {
=======
	 * @param   string  $default  The default option
	 *
	 * @return  string  Option (e.g. com_something)
	 *
	 * @since   11.1
	 */
	public static function getComponentName($default = null)
	{
		static $option;

		if ($option)
		{
>>>>>>> upstream/master
			return $option;
		}

		$option = strtolower(JRequest::getCmd('option'));

<<<<<<< HEAD
		if (empty($option)) {
=======
		if (empty($option))
		{
>>>>>>> upstream/master
			$option = $default;
		}

		JRequest::setVar('option', $option);
		return $option;
	}

	/**
	 * Gets information on a specific client id.  This method will be useful in
	 * future versions when we start mapping applications in the database.
	 *
	 * This method will return a client information array if called
	 * with no arguments which can be used to add custom application information.
	 *
<<<<<<< HEAD
	 * @param   integer  $id		A client identifier
	 * @param   boolean  $byName	If True, find the client by its name
	 *
	 * @return  mixed  Object describing the client or false if not known
=======
	 * @param   integer  $id      A client identifier
	 * @param   boolean  $byName  If True, find the client by its name
	 *
	 * @return  mixed  Object describing the client or false if not known
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function getClientInfo($id = null, $byName = false)
	{
		// Only create the array if it does not exist
		if (self::$_clients === null)
		{
<<<<<<< HEAD
			$obj = new stdClass();

			// Site Client
			$obj->id	= 0;
			$obj->name	= 'site';
			$obj->path	= JPATH_SITE;
			self::$_clients[0] = clone $obj;

			// Administrator Client
			$obj->id	= 1;
			$obj->name	= 'administrator';
			$obj->path	= JPATH_ADMINISTRATOR;
			self::$_clients[1] = clone $obj;

			// Installation Client
			$obj->id	= 2;
			$obj->name	= 'installation';
			$obj->path	= JPATH_INSTALLATION;
=======
			$obj = new stdClass;

			// Site Client
			$obj->id = 0;
			$obj->name = 'site';
			$obj->path = JPATH_SITE;
			self::$_clients[0] = clone $obj;

			// Administrator Client
			$obj->id = 1;
			$obj->name = 'administrator';
			$obj->path = JPATH_ADMINISTRATOR;
			self::$_clients[1] = clone $obj;

			// Installation Client
			$obj->id = 2;
			$obj->name = 'installation';
			$obj->path = JPATH_INSTALLATION;
>>>>>>> upstream/master
			self::$_clients[2] = clone $obj;
		}

		// If no client id has been passed return the whole array
<<<<<<< HEAD
		if (is_null($id)) {
=======
		if (is_null($id))
		{
>>>>>>> upstream/master
			return self::$_clients;
		}

		// Are we looking for client information by id or by name?
		if (!$byName)
		{
<<<<<<< HEAD
			if (isset(self::$_clients[$id])){
=======
			if (isset(self::$_clients[$id]))
			{
>>>>>>> upstream/master
				return self::$_clients[$id];
			}
		}
		else
		{
			foreach (self::$_clients as $client)
			{
<<<<<<< HEAD
				if ($client->name == strtolower($id)) {
=======
				if ($client->name == strtolower($id))
				{
>>>>>>> upstream/master
					return $client;
				}
			}
		}

		return null;
	}

	/**
	 * Adds information for a client.
	 *
<<<<<<< HEAD
	 * @param   mixed  A client identifier either an array or object
	 *
	 * @return  boolean  True if the information is added. False on error
=======
	 * @param   mixed  $client  A client identifier either an array or object
	 *
	 * @return  boolean  True if the information is added. False on error
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function addClientInfo($client)
	{
<<<<<<< HEAD
		if (is_array($client)) {
			$client = (object) $client;
		}

		if (!is_object($client)) {
=======
		if (is_array($client))
		{
			$client = (object) $client;
		}

		if (!is_object($client))
		{
>>>>>>> upstream/master
			return false;
		}

		$info = self::getClientInfo();

<<<<<<< HEAD
		if (!isset($client->id)) {
=======
		if (!isset($client->id))
		{
>>>>>>> upstream/master
			$client->id = count($info);
		}

		self::$_clients[$client->id] = clone $client;

		return true;
	}

	/**
<<<<<<< HEAD
	* Get a path
	*
	* @param   string  $varname
	* @param   string  $user_option
	*
	* @return  string  The requested path
	* @since   11.1
	*/
	public static function getPath($varname, $user_option=null)
=======
	 * Get a path
	 *
	 * @param   string  $varname      Identify location or type of xml
	 * @param   string  $user_option  Option (e.g. com_something) used to find path.
	 *
	 * @return  string  The requested path
	 *
	 * @since   11.1
	 */
	public static function getPath($varname, $user_option = null)
>>>>>>> upstream/master
	{
		// Check needed for handling of custom/new module XML file loading
		$check = (($varname == 'mod0_xml') || ($varname == 'mod1_xml'));

<<<<<<< HEAD
		if (!$user_option && !$check) {
			$user_option = JRequest::getCmd('option');
		} else {
=======
		if (!$user_option && !$check)
		{
			$user_option = JRequest::getCmd('option');
		}
		else
		{
>>>>>>> upstream/master
			$user_option = JFilterInput::getInstance()->clean($user_option, 'path');
		}

		$result = null;
<<<<<<< HEAD
		$name	= substr($user_option, 4);

		switch ($varname) {
			case 'front':
				$result = self::_checkPath(DS.'components'.DS. $user_option .DS. $name .'.php', 0);
=======
		$name = substr($user_option, 4);

		switch ($varname)
		{
			case 'front':
				$result = self::_checkPath('/components/' . $user_option . '/' . $name . '.php', 0);
>>>>>>> upstream/master
				break;

			case 'html':
			case 'front_html':
<<<<<<< HEAD
				if (!($result = self::_checkPath(DS.'templates'.DS. JApplication::getTemplate() .DS.'components'.DS. $name .'.html.php', 0))) {
					$result = self::_checkPath(DS.'components'.DS. $user_option .DS. $name .'.html.php', 0);
=======
				if (!($result = self::_checkPath('/templates/' . JApplication::getTemplate() . '/components/' . $name . '.html.php', 0)))
				{
					$result = self::_checkPath('/components/' . $user_option . '/' . $name . '.html.php', 0);
>>>>>>> upstream/master
				}
				break;

			case 'toolbar':
<<<<<<< HEAD
				$result = self::_checkPath(DS.'components'.DS. $user_option .DS.'toolbar.'. $name .'.php', -1);
				break;

			case 'toolbar_html':
				$result = self::_checkPath(DS.'components'.DS. $user_option .DS.'toolbar.'. $name .'.html.php', -1);
=======
				$result = self::_checkPath('/components/' . $user_option . '/toolbar.' . $name . '.php', -1);
				break;

			case 'toolbar_html':
				$result = self::_checkPath('/components/' . $user_option . '/toolbar.' . $name . '.html.php', -1);
>>>>>>> upstream/master
				break;

			case 'toolbar_default':
			case 'toolbar_front':
<<<<<<< HEAD
				$result = self::_checkPath(DS.'includes'.DS.'HTML_toolbar.php', 0);
				break;

			case 'admin':
				$path	= DS.'components'.DS. $user_option .DS.'admin.'. $name .'.php';
				$result = self::_checkPath($path, -1);
				if ($result == null) {
					$path = DS.'components'.DS. $user_option .DS. $name .'.php';
=======
				$result = self::_checkPath('/includes/HTML_toolbar.php', 0);
				break;

			case 'admin':
				$path = '/components/' . $user_option . '/admin.' . $name . '.php';
				$result = self::_checkPath($path, -1);
				if ($result == null)
				{
					$path = '/components/' . $user_option . '/' . $name . '.php';
>>>>>>> upstream/master
					$result = self::_checkPath($path, -1);
				}
				break;

			case 'admin_html':
<<<<<<< HEAD
				$path	= DS.'components'.DS. $user_option .DS.'admin.'. $name .'.html.php';
=======
				$path = '/components/' . $user_option . '/admin.' . $name . '.html.php';
>>>>>>> upstream/master
				$result = self::_checkPath($path, -1);
				break;

			case 'admin_functions':
<<<<<<< HEAD
				$path	= DS.'components'.DS. $user_option .DS. $name .'.functions.php';
=======
				$path = '/components/' . $user_option . '/' . $name . '.functions.php';
>>>>>>> upstream/master
				$result = self::_checkPath($path, -1);
				break;

			case 'class':
<<<<<<< HEAD
				if (!($result = self::_checkPath(DS.'components'.DS. $user_option .DS. $name .'.class.php'))) {
					$result = self::_checkPath(DS.'includes'.DS. $name .'.php');
=======
				if (!($result = self::_checkPath('/components/' . $user_option . '/' . $name . '.class.php')))
				{
					$result = self::_checkPath('/includes/' . $name . '.php');
>>>>>>> upstream/master
				}
				break;

			case 'helper':
<<<<<<< HEAD
				$path	= DS.'components'.DS. $user_option .DS. $name .'.helper.php';
=======
				$path = '/components/' . $user_option . '/' . $name . '.helper.php';
>>>>>>> upstream/master
				$result = self::_checkPath($path);
				break;

			case 'com_xml':
<<<<<<< HEAD
				$path	= DS.'components'.DS. $user_option .DS. $name .'.xml';
=======
				$path = '/components/' . $user_option . '/' . $name . '.xml';
>>>>>>> upstream/master
				$result = self::_checkPath($path, 1);
				break;

			case 'mod0_xml':
<<<<<<< HEAD
				$path = DS.'modules'.DS. $user_option .DS. $user_option. '.xml';
=======
				$path = '/modules/' . $user_option . '/' . $user_option . '.xml';
>>>>>>> upstream/master
				$result = self::_checkPath($path);
				break;

			case 'mod1_xml':
				// Admin modules
<<<<<<< HEAD
				$path = DS.'modules'.DS. $user_option .DS. $user_option. '.xml';
=======
				$path = '/modules/' . $user_option . '/' . $user_option . '.xml';
>>>>>>> upstream/master
				$result = self::_checkPath($path, -1);
				break;

			case 'plg_xml':
				// Site plugins
<<<<<<< HEAD
				$j15path	= DS.'plugins'.DS. $user_option .'.xml';
				$parts = explode(DS, $user_option);
				$j16path = DS.'plugins'.DS. $user_option.DS.$parts[1].'.xml';
				$j15 = self::_checkPath($j15path, 0);
				$j16 = self::_checkPath( $j16path, 0);
=======
				$j15path = '/plugins/' . $user_option . '.xml';
				$parts = explode(DS, $user_option);
				$j16path = '/plugins/' . $user_option . '/' . $parts[1] . '.xml';
				$j15 = self::_checkPath($j15path, 0);
				$j16 = self::_checkPath($j16path, 0);
>>>>>>> upstream/master
				// Return 1.6 if working otherwise default to whatever 1.5 gives us
				$result = $j16 ? $j16 : $j15;
				break;

			case 'menu_xml':
<<<<<<< HEAD
				$path	= DS.'components'.DS.'com_menus'.DS. $user_option .DS. $user_option .'.xml';
=======
				$path = '/components/com_menus/' . $user_option . '/' . $user_option . '.xml';
>>>>>>> upstream/master
				$result = self::_checkPath($path, -1);
				break;
		}

		return $result;
	}

	/**
	 * Parse a XML install manifest file.
	 *
	 * XML Root tag should be 'install' except for languages which use meta file.
	 *
<<<<<<< HEAD
	 * @param   string  $path Full path to XML file.
	 *
	 * @return  array  XML metadata.
=======
	 * @param   string  $path  Full path to XML file.
	 *
	 * @return  array  XML metadata.
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public static function parseXMLInstallFile($path)
	{
		// Read the file to see if it's a valid component XML file
<<<<<<< HEAD
		if( ! $xml = JFactory::getXML($path))
=======
		if (!$xml = JFactory::getXML($path))
>>>>>>> upstream/master
		{
			return false;
		}

		// Check for a valid XML root tag.

		// Should be 'install', but for backward compatability we will accept 'extension'.
		// Languages use 'metafile' instead

<<<<<<< HEAD
		if($xml->getName() != 'install'
		&& $xml->getName() != 'extension'
		&& $xml->getName() != 'metafile')
=======
		if ($xml->getName() != 'install' && $xml->getName() != 'extension' && $xml->getName() != 'metafile')
>>>>>>> upstream/master
		{
			unset($xml);
			return false;
		}

		$data = array();

		$data['legacy'] = ($xml->getName() == 'mosinstall' || $xml->getName() == 'install');

<<<<<<< HEAD
		$data['name'] = (string)$xml->name;

		// Check if we're a language. If so use metafile.
		$data['type'] = $xml->getName() == 'metafile' ? 'language' : (string)$xml->attributes()->type;

		$data['creationDate'] =((string)$xml->creationDate) ? (string)$xml->creationDate : JText::_('Unknown');
		$data['author'] =((string)$xml->author) ? (string)$xml->author : JText::_('Unknown');

		$data['copyright'] = (string)$xml->copyright;
		$data['authorEmail'] = (string)$xml->authorEmail;
		$data['authorUrl'] = (string)$xml->authorUrl;
		$data['version'] = (string)$xml->version;
		$data['description'] = (string)$xml->description;
		$data['group'] = (string)$xml->group;
=======
		$data['name'] = (string) $xml->name;

		// Check if we're a language. If so use metafile.
		$data['type'] = $xml->getName() == 'metafile' ? 'language' : (string) $xml->attributes()->type;

		$data['creationDate'] = ((string) $xml->creationDate) ? (string) $xml->creationDate : JText::_('Unknown');
		$data['author'] = ((string) $xml->author) ? (string) $xml->author : JText::_('Unknown');

		$data['copyright'] = (string) $xml->copyright;
		$data['authorEmail'] = (string) $xml->authorEmail;
		$data['authorUrl'] = (string) $xml->authorUrl;
		$data['version'] = (string) $xml->version;
		$data['description'] = (string) $xml->description;
		$data['group'] = (string) $xml->group;
>>>>>>> upstream/master

		return $data;
	}

	/**
	 * Parse a XML language meta file.
	 *
	 * XML Root tag  for languages which is meta file.
	 *
<<<<<<< HEAD
	 * @param   string   $path Full path to XML file.
	 *
	 * @return  array    XML metadata.
=======
	 * @param   string  $path  Full path to XML file.
	 *
	 * @return  array  XML metadata.
>>>>>>> upstream/master
	 */
	public static function parseXMLLangMetaFile($path)
	{
		// Read the file to see if it's a valid component XML file
		$xml = JFactory::getXML($path);

<<<<<<< HEAD
		if( ! $xml)
=======
		if (!$xml)
>>>>>>> upstream/master
		{
			return false;
		}

		/*
		 * Check for a valid XML root tag.
		 *
		 * Should be 'langMetaData'.
		 */
<<<<<<< HEAD
		if ($xml->getName() != 'metafile') {
=======
		if ($xml->getName() != 'metafile')
		{
>>>>>>> upstream/master
			unset($xml);
			return false;
		}

		$data = array();

<<<<<<< HEAD
		$data['name'] = (string)$xml->name;
		$data['type'] = $xml->attributes()->type;

		$data['creationDate'] =((string)$xml->creationDate) ? (string)$xml->creationDate : JText::_('JLIB_UNKNOWN');
		$data['author'] =((string)$xml->author) ? (string)$xml->author : JText::_('JLIB_UNKNOWN');

		$data['copyright'] = (string)$xml->copyright;
		$data['authorEmail'] = (string)$xml->authorEmail;
		$data['authorUrl'] = (string)$xml->authorUrl;
		$data['version'] = (string)$xml->version;
		$data['description'] = (string)$xml->description;
		$data['group'] = (string)$xml->group;
=======
		$data['name'] = (string) $xml->name;
		$data['type'] = $xml->attributes()->type;

		$data['creationDate'] = ((string) $xml->creationDate) ? (string) $xml->creationDate : JText::_('JLIB_UNKNOWN');
		$data['author'] = ((string) $xml->author) ? (string) $xml->author : JText::_('JLIB_UNKNOWN');

		$data['copyright'] = (string) $xml->copyright;
		$data['authorEmail'] = (string) $xml->authorEmail;
		$data['authorUrl'] = (string) $xml->authorUrl;
		$data['version'] = (string) $xml->version;
		$data['description'] = (string) $xml->description;
		$data['group'] = (string) $xml->group;
>>>>>>> upstream/master

		return $data;
	}

	/**
	 * Tries to find a file in the administrator or site areas
	 *
<<<<<<< HEAD
	 * @param   string   A file name
	 * @param   integer  0 to check site only, 1 to check site and admin, -1 to check admin only
	 *
	 * @return  string   File name or null
	 * @since   11.1
	 */
	protected static function _checkPath($path, $checkAdmin=1)
	{
		$file = JPATH_SITE . $path;
		if ($checkAdmin > -1 && file_exists($file)) {
=======
	 * @param   string   $path        A file name
	 * @param   integer  $checkAdmin  0 to check site only, 1 to check site and admin, -1 to check admin only
	 *
	 * @return  string   File name or null
	 *
	 * @since   11.1
	 */
	protected static function _checkPath($path, $checkAdmin = 1)
	{
		$file = JPATH_SITE . $path;
		if ($checkAdmin > -1 && file_exists($file))
		{
>>>>>>> upstream/master
			return $file;
		}
		else if ($checkAdmin != 0)
		{
			$file = JPATH_ADMINISTRATOR . $path;
<<<<<<< HEAD
			if (file_exists($file)) {
=======
			if (file_exists($file))
			{
>>>>>>> upstream/master
				return $file;
			}
		}

		return null;
	}
}