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

/**
 * Extension object
 *
 * @package     Joomla.Platform
 * @subpackage  Installer
 * @since       11.1
 */
class JExtension extends JObject
{
	/**
<<<<<<< HEAD
	 * @var string $filename Filename of the extension
	 */
	var $filename = '';
	/**
	 * @var string $type Type of the extension
	 */
	var $type = '';
	/**
	 * @var string $id Unique Identifier for the extension
	 * */
	var $id = '';
	/**
	 *  @var boolean $published The status of the extension
	 *  */
	var $published = false;
	/**
	 * @var string $client String representation of client. Valid for modules, templates and languages.
	 * 					set by default to site
	 */
	var $client = 'site';
	/**
	 * @var string $group The group name of the plugin. Not used for other known extension types (only plugins)
	 */
	var $group =  '';
	/**
	 *  @var Object $manifest_cache An object representation of the manifest file
	 *  							Stored metadata
	 */
	var $manifest_cache = null;
	/**
	 * @var Object $params An object representation of the extension params
=======
	 * Filename of the extension
	 *
	 * @var    string
	 * @since  11.1
	 */
	var $filename = '';

	/**
	 * Type of the extension
	 *
	 * @var    string
	 * @since  11.1
	 */
	var $type = '';

	/**
	 * Unique Identifier for the extension
	 *
	 * @var    string
	 * @since  11.1
	 */
	var $id = '';

	/**
	 * The status of the extension
	 *
	 * @var    boolean
	 * @since  11.1
	 */
	var $published = false;

	/**
	 * String representation of client. Valid for modules, templates and languages.
	 * Set by default to site.
	 *
	 * @var    string
	 * @since  11.1
	 */
	var $client = 'site';

	/**
	 * The group name of the plugin. Not used for other known extension types (only plugins)
	 *
	 * @var string
	 * @since  11.1
	 */
	var $group = '';

	/**
	 * An object representation of the manifest file stored metadata
	 *
	 * @var object
	 * @since  11.1
	 */
	var $manifest_cache = null;

	/**
	 * An object representation of the extension params
	 *
	 * @var    object
	 * @since  11.1
>>>>>>> upstream/master
	 */
	var $params = null;

	/**
	 * Constructor
<<<<<<< HEAD
	 * @param JXMLElement $element a JXMLElement from which to load data from
=======
	 *
	 * @param   JXMLElement  $element  A JXMLElement from which to load data from
	 *
	 * @return  JExtension
	 *
	 * @since  11.1
>>>>>>> upstream/master
	 */
	function __construct(JXMLElement $element = null)
	{
		if ($element && is_a($element, 'JXMLElement'))
		{
<<<<<<< HEAD
			$this->type = (string)$element->attributes()->type;
			$this->id = (string)$element->attributes()->id;

			switch($this->type)
=======
			$this->type = (string) $element->attributes()->type;
			$this->id = (string) $element->attributes()->id;

			switch ($this->type)
>>>>>>> upstream/master
			{
				case 'component':
					// By default a component doesn't have anything
					break;

				case 'module':
				case 'template':
				case 'language':
<<<<<<< HEAD
					$this->client = (string)$element->attributes()->client;
					$tmp_client_id = JApplicationHelper::getClientInfo($this->client, 1);
					if($tmp_client_id == null) {
						JError::raiseWarning(100, JText::_('JLIB_INSTALLER_ERROR_EXTENSION_INVALID_CLIENT_IDENTIFIER'));
					} else {
=======
					$this->client = (string) $element->attributes()->client;
					$tmp_client_id = JApplicationHelper::getClientInfo($this->client, 1);
					if ($tmp_client_id == null)
					{
						JError::raiseWarning(100, JText::_('JLIB_INSTALLER_ERROR_EXTENSION_INVALID_CLIENT_IDENTIFIER'));
					}
					else
					{
>>>>>>> upstream/master
						$this->client_id = $tmp_client_id->id;
					}
					break;

				case 'plugin':
<<<<<<< HEAD
					$this->group = (string)$element->attributes()->group;
=======
					$this->group = (string) $element->attributes()->group;
>>>>>>> upstream/master
					break;

				default:
					// Catch all
					// Get and set client and group if we don't recognise the extension
<<<<<<< HEAD
					if ($client = (string)$element->attributes()->client)
=======
					if ($client = (string) $element->attributes()->client)
>>>>>>> upstream/master
					{
						$this->client_id = JApplicationHelper::getClientInfo($this->client, 1);
						$this->client_id = $this->client_id->id;
					}
<<<<<<< HEAD
					if ($group = (string)$element->attributes()->group) {
						$this->group = (string)$element->attributes()->group;
					}
					break;
			}
			$this->filename = (string)$element;
=======
					if ($group = (string) $element->attributes()->group)
					{
						$this->group = (string) $element->attributes()->group;
					}
					break;
			}
			$this->filename = (string) $element;
>>>>>>> upstream/master
		}
	}
}
