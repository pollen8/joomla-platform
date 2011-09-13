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
 * JMenu class
 *
 * @package     Joomla.Platform
 * @subpackage  Application
 * @since       11.1
 */
class JMenu extends JObject
{
	/**
	 * Array to hold the menu items
	 *
	 * @var    array
	 * @since   11.1
	 */
<<<<<<< HEAD
	protected $_items = array ();
=======
	protected $_items = array();
>>>>>>> upstream/master

	/**
	 * Identifier of the default menu item
	 *
	 * @var    integer
	 * @since   11.1
	 */
	protected $_default = array();

	/**
	 * Identifier of the active menu item
	 *
	 * @var    integer
<<<<<<< HEAD
	 * @since   11.1
=======
	 * @since  11.1
>>>>>>> upstream/master
	 */
	protected $_active = 0;

	/**
	 * Class constructor
	 *
<<<<<<< HEAD
	 * @param   array    $options  An array of configuration options.
	 *
	 * @return  JMenu  A JMenu object
=======
	 * @param   array  $options  An array of configuration options.
	 *
	 * @return  JMenu  A JMenu object
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function __construct($options = array())
	{
		// Load the menu items
		$this->load();

		foreach ($this->_items as $k => $item)
		{
<<<<<<< HEAD
			if ($item->home) {
=======
			if ($item->home)
			{
>>>>>>> upstream/master
				$this->_default[$item->language] = $item->id;
			}

			// Decode the item params
			$result = new JRegistry;
<<<<<<< HEAD
			$result->loadJSON($item->params);
=======
			$result->loadString($item->params);
>>>>>>> upstream/master
			$item->params = $result;
		}
	}

	/**
	 * Returns a JMenu object
	 *
	 * @param   string  $client   The name of the client
	 * @param   array   $options  An associative array of options
	 *
	 * @return  JMenu  A menu object.
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function getInstance($client, $options = array())
	{
		static $instances;

<<<<<<< HEAD
		if (!isset($instances)) {
			$instances = array();
		}

		if (empty($instances[$client])) {
			//Load the router object
			$info = JApplicationHelper::getClientInfo($client, true);

			$path = $info->path.'/includes/menu.php';
			if (file_exists($path)) {
				require_once $path;

				// Create a JPathway object
				$classname = 'JMenu'.ucfirst($client);
				$instance = new $classname($options);
			}
			else {
=======
		if (!isset($instances))
		{
			$instances = array();
		}

		if (empty($instances[$client]))
		{
			//Load the router object
			$info = JApplicationHelper::getClientInfo($client, true);

			$path = $info->path . '/includes/menu.php';
			if (file_exists($path))
			{
				include_once $path;

				// Create a JPathway object
				$classname = 'JMenu' . ucfirst($client);
				$instance = new $classname($options);
			}
			else
			{
>>>>>>> upstream/master
				//$error = JError::raiseError(500, 'Unable to load menu: '.$client);
				//TODO: Solve this
				$error = null;
				return $error;
			}

			$instances[$client] = & $instance;
		}

		return $instances[$client];
	}

	/**
	 * Get menu item by id
	 *
	 * @param   integer  $id  The item id
	 *
<<<<<<< HEAD
	 * @return  mixed  The item object, or null if not found
=======
	 * @return  mixed    The item object, or null if not found
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function getItem($id)
	{
		$result = null;
<<<<<<< HEAD
		if (isset($this->_items[$id])) {
=======
		if (isset($this->_items[$id]))
		{
>>>>>>> upstream/master
			$result = &$this->_items[$id];
		}

		return $result;
	}

	/**
	 * Set the default item by id and language code.
	 *
<<<<<<< HEAD
	 * @param   integer  $id			The menu item id.
	 * @param   string   $language	The language cod (since 1.6).
	 *
	 * @return  boolean  True, if succesfull
	 * @since   11.1
	 */
	public function setDefault($id, $language='')
	{
		if (isset($this->_items[$id])) {
=======
	 * @param   integer  $id        The menu item id.
	 * @param   string   $language  The language cod (since 1.6).
	 *
	 * @return  boolean  True, if succesful
	 *
	 * @since   11.1
	 */
	public function setDefault($id, $language = '')
	{
		if (isset($this->_items[$id]))
		{
>>>>>>> upstream/master
			$this->_default[$language] = $id;
			return true;
		}

		return false;
	}

	/**
	 * Get the default item by language code.
	 *
<<<<<<< HEAD
	 * @param   string   $language   The language code, default * meaning all.
	 *
	 * @return  object   The item object
	 * @since   11.1
	 */
	function getDefault($language='*')
	{
		if (array_key_exists($language, $this->_default)) {
			return $this->_items[$this->_default[$language]];
		}
		else if (array_key_exists('*', $this->_default)) {
			return $this->_items[$this->_default['*']];
		}
		else {
=======
	 * @param   string  $language  The language code, default value of * means all.
	 *
	 * @return  object  The item object
	 *
	 * @since   11.1
	 */
	function getDefault($language = '*')
	{
		if (array_key_exists($language, $this->_default))
		{
			return $this->_items[$this->_default[$language]];
		}
		else if (array_key_exists('*', $this->_default))
		{
			return $this->_items[$this->_default['*']];
		}
		else
		{
>>>>>>> upstream/master
			return 0;
		}
	}

	/**
	 * Set the default item by id
	 *
<<<<<<< HEAD
	 * @param   integer  $id	The item id
	 *
	 * @return  mixed  If successfull the active item, otherwise null
	 */
	public function setActive($id)
	{
		if (isset($this->_items[$id])) {
=======
	 * @param   integer  $id  The item id
	 *
	 * @return  mixed  If successfull the active item, otherwise null
	 *
	 * @since   11.1
	 */
	public function setActive($id)
	{
		if (isset($this->_items[$id]))
		{
>>>>>>> upstream/master
			$this->_active = $id;
			$result = &$this->_items[$id];
			return $result;
		}

		return null;
	}

	/**
	 * Get menu item by id.
	 *
	 * @return  object  The item object.
<<<<<<< HEAD
	 */
	public function getActive()
	{
		if ($this->_active) {
=======
	 *
	 * @since   11.1
	 */
	public function getActive()
	{
		if ($this->_active)
		{
>>>>>>> upstream/master
			$item = &$this->_items[$this->_active];
			return $item;
		}

		return null;
	}

	/**
	 * Gets menu items by attribute
	 *
	 * @param   string   $attributes  The field name
	 * @param   string   $values      The value of the field
	 * @param   boolean  $firstonly   If true, only returns the first item found
	 *
	 * @return  array
<<<<<<< HEAD
=======
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function getItems($attributes, $values, $firstonly = false)
	{
		$items = null;
		$attributes = (array) $attributes;
		$values = (array) $values;

		foreach ($this->_items as $item)
		{
<<<<<<< HEAD
			if (!is_object($item)) {
=======
			if (!is_object($item))
			{
>>>>>>> upstream/master
				continue;
			}

			$test = true;
<<<<<<< HEAD
			for ($i=0, $count = count($attributes); $i < $count; $i++)
			{
				if (is_array($values[$i])) {
					if (!in_array($item->$attributes[$i], $values[$i])) {
=======
			for ($i = 0, $count = count($attributes); $i < $count; $i++)
			{
				if (is_array($values[$i]))
				{
					if (!in_array($item->$attributes[$i], $values[$i]))
					{
>>>>>>> upstream/master
						$test = false;
						break;
					}
				}
<<<<<<< HEAD
				else {
					if ($item->$attributes[$i] != $values[$i]) {
=======
				else
				{
					if ($item->$attributes[$i] != $values[$i])
					{
>>>>>>> upstream/master
						$test = false;
						break;
					}
				}
			}

<<<<<<< HEAD
			if ($test) {
				if ($firstonly) {
=======
			if ($test)
			{
				if ($firstonly)
				{
>>>>>>> upstream/master
					return $item;
				}

				$items[] = $item;
			}
		}

		return $items;
	}

	/**
	 * Gets the parameter object for a certain menu item
	 *
	 * @param   integer  $id  The item id
	 *
	 * @return  JRegistry  A JRegistry object
<<<<<<< HEAD
	 */
	public function getParams($id)
	{
		if ($menu = $this->getItem($id)) {
			return $menu->params;
		}
		else {
=======
	 *
	 * @since   11.1
	 */
	public function getParams($id)
	{
		if ($menu = $this->getItem($id))
		{
			return $menu->params;
		}
		else
		{
>>>>>>> upstream/master
			return new JRegistry;
		}
	}

	/**
	 * Getter for the menu array
	 *
	 * @return  array
<<<<<<< HEAD
=======
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function getMenu()
	{
		return $this->_items;
	}

	/**
	 * Method to check JMenu object authorization against an access control
	 * object and optionally an access extension object
	 *
<<<<<<< HEAD
	 * @param   integer  $id	The menu id
	 *
	 * @return  boolean  True if authorised
=======
	 * @param   integer  $id  The menu id
	 *
	 * @return  boolean  True if authorised
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function authorise($id)
	{
<<<<<<< HEAD
		$menu	= $this->getItem($id);
		$user	= JFactory::getUser();

		if ($menu) {
			return in_array((int) $menu->access, $user->getAuthorisedViewLevels());
		}
		else {
=======
		$menu = $this->getItem($id);
		$user = JFactory::getUser();

		if ($menu)
		{
			return in_array((int) $menu->access, $user->getAuthorisedViewLevels());
		}
		else
		{
>>>>>>> upstream/master
			return true;
		}
	}

	/**
	 * Loads the menu items
	 *
	 * @return  array
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function load()
	{
		return array();
	}
}