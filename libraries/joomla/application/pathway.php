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
 * Class to maintain a pathway.
 *
 * The user's navigated path within the application.
 *
 * @package     Joomla.Platform
 * @subpackage  Application
 * @since       11.1
 */
class JPathway extends JObject
{
	/**
	 * @var    array  Array to hold the pathway item objects
	 * @since  11.1
	 */
	protected $_pathway = null;

	/**
	 * @var    integer  Integer number of items in the pathway
	 * @since  11.1
	 */
	protected $_count = 0;

	/**
	 * Class constructor
<<<<<<< HEAD
=======
	 *
	 * @param   array  $options  The class options.
	 *
	 * @return  void
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	function __construct($options = array())
	{
		//Initialise the array
		$this->_pathway = array();
	}

	/**
	 * Returns a JPathway object
	 *
<<<<<<< HEAD
	 * @param   string  $client  The name of the client
	 * @param   array   $options An associative array of options
	 *
	 * @return  JPathway  A JPathway object.
=======
	 * @param   string  $client   The name of the client
	 * @param   array   $options  An associative array of options
	 *
	 * @return  JPathway  A JPathway object.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function getInstance($client, $options = array())
	{
		static $instances;

<<<<<<< HEAD
		if (!isset($instances)) {
=======
		if (!isset($instances))
		{
>>>>>>> upstream/master
			$instances = array();
		}

		if (empty($instances[$client]))
		{
			//Load the router object
			$info = JApplicationHelper::getClientInfo($client, true);

<<<<<<< HEAD
			$path = $info->path.DS.'includes'.DS.'pathway.php';
			if (file_exists($path))
			{
				require_once $path;

				// Create a JPathway object
				$classname = 'JPathway'.ucfirst($client);
=======
			$path = $info->path . '/includes/pathway.php';
			if (file_exists($path))
			{
				include_once $path;

				// Create a JPathway object
				$classname = 'JPathway' . ucfirst($client);
>>>>>>> upstream/master
				$instance = new $classname($options);
			}
			else
			{
				$error = JError::raiseError(500, JText::sprintf('JLIB_APPLICATION_ERROR_PATHWAY_LOAD', $client));
				return $error;
			}

			$instances[$client] = & $instance;
		}

		return $instances[$client];
	}

	/**
	 * Return the JPathWay items array
	 *
	 * @return  array  Array of pathway items
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function getPathway()
	{
		$pw = $this->_pathway;

		// Use array_values to reset the array keys numerically
		return array_values($pw);
	}

	/**
	 * Set the JPathway items array.
	 *
<<<<<<< HEAD
	 * @param   array  $pathway	An array of pathway objects.
	 *
	 * @return  array  The previous pathway data.
=======
	 * @param   array  $pathway  An array of pathway objects.
	 *
	 * @return  array  The previous pathway data.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function setPathway($pathway)
	{
<<<<<<< HEAD
		$oldPathway	= $this->_pathway;
		$pathway	= (array) $pathway;
=======
		$oldPathway = $this->_pathway;
		$pathway = (array) $pathway;
>>>>>>> upstream/master

		// Set the new pathway.
		$this->_pathway = array_values($pathway);

		return array_values($oldPathway);
	}

	/**
	 * Create and return an array of the pathway names.
	 *
	 * @return  array  Array of names of pathway items
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function getPathwayNames()
	{
		// Initialise variables.
<<<<<<< HEAD
		$names = array (null);

		// Build the names array using just the names of each pathway item
		foreach ($this->_pathway as $item) {
=======
		$names = array(null);

		// Build the names array using just the names of each pathway item
		foreach ($this->_pathway as $item)
		{
>>>>>>> upstream/master
			$names[] = $item->name;
		}

		//Use array_values to reset the array keys numerically
		return array_values($names);
	}

	/**
	 * Create and add an item to the pathway.
	 *
<<<<<<< HEAD
	 * @param   string  $name
	 * @param   string  $link
	 *
	 * @return  boolean  True on success
	 * @since   11.1
	 */
	public function addItem($name, $link='')
=======
	 * @param   string  $name  The name of the item.
	 * @param   string  $link  The link to the item.
	 *
	 * @return  boolean  True on success
	 *
	 * @since   11.1
	 */
	public function addItem($name, $link = '')
>>>>>>> upstream/master
	{
		// Initalize variables
		$ret = false;

<<<<<<< HEAD
		if ($this->_pathway[] = $this->_makeItem($name, $link)) {
=======
		if ($this->_pathway[] = $this->_makeItem($name, $link))
		{
>>>>>>> upstream/master
			$ret = true;
			$this->_count++;
		}

		return $ret;
	}

	/**
	 * Set item name.
	 *
<<<<<<< HEAD
	 * @param   integer  $id
	 * @param   string   $name
	 *
	 * @return  boolean  True on success
=======
	 * @param   integer  $id    The id of the item on which to set the name.
	 * @param   string   $name  The name to set.
	 *
	 * @return  boolean  True on success
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function setItemName($id, $name)
	{
		// Initalize variables
		$ret = false;

<<<<<<< HEAD
		if (isset($this->_pathway[$id])) {
=======
		if (isset($this->_pathway[$id]))
		{
>>>>>>> upstream/master
			$this->_pathway[$id]->name = $name;
			$ret = true;
		}

		return $ret;
	}

	/**
	 * Create and return a new pathway object.
	 *
<<<<<<< HEAD
	 * @param   string   $name  Name of the item
	 * @param   string   $link  Link to the item
	 *
	 * @return  JPathway  Pathway item object
=======
	 * @param   string  $name  Name of the item
	 * @param   string  $link  Link to the item
	 *
	 * @return  JPathway  Pathway item object
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function _makeItem($name, $link)
	{
<<<<<<< HEAD
		$item = new stdClass();
=======
		$item = new stdClass;
>>>>>>> upstream/master
		$item->name = html_entity_decode($name, ENT_COMPAT, 'UTF-8');
		$item->link = $link;

		return $item;
	}
}
