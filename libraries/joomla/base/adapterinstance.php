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

/**
 * Adapter Instance Class
 *
 * @package     Joomla.Platform
 * @subpackage  Base
 * @since       11.1
 */
<<<<<<< HEAD
class JAdapterInstance extends JObject {

	/**
	 * @var   object  Parent
=======
class JAdapterInstance extends JObject
{
	/**
	 * Parent
	 *
	 * @var   object
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $parent = null;

	/**
<<<<<<< HEAD
	 * @var    object  Database
=======
	 * Database
	 *
	 * @var    object
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $db = null;

	/**
	 * Constructor
	 *
<<<<<<< HEAD
	 * @param   object  $parent   Parent object [JAdapter instance]
	 * @param   object  $db       Database object [JDatabase instance]
=======
	 * @param   object  &$parent  Parent object [JAdapter instance]
	 * @param   object  &$db      Database object [JDatabase instance]
>>>>>>> upstream/master
	 * @param   array   $options  Configuration Options
	 *
	 * @return  JAdapterInstance
	 *
	 * @since   11.1
	 */
	public function __construct(&$parent, &$db, $options = Array())
	{
		// Set the properties from the options array that is passed in
		$this->setProperties($options);

		// Set the parent and db in case $options for some reason overrides it.
		$this->parent = &$parent;
		// Pull in the global dbo in case something happened to it.
		$this->db = &$db ? $db : JFactory::getDBO();
	}

	/**
	 * Retrieves the parent object
	 *
	 * @return  object parent
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function getParent()
	{
		return $this->parent;
	}
}