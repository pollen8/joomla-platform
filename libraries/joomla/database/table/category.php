<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Database
 *
 * @copyright   Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

<<<<<<< HEAD
defined('JPATH_PLATFORM') or die;
=======
defined('JPATH_PLATFORM') or die();
>>>>>>> upstream/master

jimport('joomla.database.tablenested');

/**
 * Category table
 *
 * @package     Joomla.Platform
 * @subpackage  Table
 * @since       11.1
 */
class JTableCategory extends JTableNested
{
	/**
<<<<<<< HEAD
	 * @param database A database connector object
=======
	 * Constructor
	 *
	 * @param   database  &$db  A database connector object
	 *
	 * @return  JTableCategory
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function __construct(&$db)
	{
		parent::__construct('#__categories', 'id', $db);

<<<<<<< HEAD
		$this->access	= (int) JFactory::getConfig()->get('access');
=======
		$this->access = (int) JFactory::getConfig()->get('access');
>>>>>>> upstream/master
	}

	/**
	 * Method to compute the default name of the asset.
<<<<<<< HEAD
	 * The default name is in the form `table_name.id`
	 * where id is the value of the primary key of the table.
	 *
	 * @return  string
=======
	 * The default name is in the form table_name.id
	 * where id is the value of the primary key of the table.
	 *
	 * @return  string
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	protected function _getAssetName()
	{
		$k = $this->_tbl_key;
<<<<<<< HEAD
		return $this->extension.'.category.'.(int) $this->$k;
=======
		return $this->extension . '.category.' . (int) $this->$k;
>>>>>>> upstream/master
	}

	/**
	 * Method to return the title to use for the asset table.
	 *
	 * @return  string
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function _getAssetTitle()
	{
		return $this->title;
	}

	/**
	 * Get the parent asset id for the record
	 *
<<<<<<< HEAD
	 * @return  integer
=======
	 * @param   JTable   $table  A JTable object for the asset parent.
	 * @param   integer  $id     The id for the asset
	 *
	 * @return  integer  The id of the asset's parent
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	protected function _getAssetParentId($table = null, $id = null)
	{
		// Initialise variables.
		$assetId = null;
<<<<<<< HEAD
		$db		= $this->getDbo();

		// This is a category under a category.
		if ($this->parent_id > 1) {
			// Build the query to get the asset id for the parent category.
			$query	= $db->getQuery(true);
			$query->select('asset_id');
			$query->from('#__categories');
			$query->where('id = '.(int) $this->parent_id);

			// Get the asset id from the database.
			$db->setQuery($query);
			if ($result = $db->loadResult()) {
=======
		$db = $this->getDbo();

		// This is a category under a category.
		if ($this->parent_id > 1)
		{
			// Build the query to get the asset id for the parent category.
			$query = $db->getQuery(true);
			$query->select('asset_id');
			$query->from('#__categories');
			$query->where('id = ' . (int) $this->parent_id);

			// Get the asset id from the database.
			$db->setQuery($query);
			if ($result = $db->loadResult())
			{
>>>>>>> upstream/master
				$assetId = (int) $result;
			}
		}
		// This is a category that needs to parent with the extension.
<<<<<<< HEAD
		elseif ($assetId === null) {
			// Build the query to get the asset id for the parent category.
			$query	= $db->getQuery(true);
			$query->select('id');
			$query->from('#__assets');
			$query->where('name = '.$db->quote($this->extension));

			// Get the asset id from the database.
			$db->setQuery($query);
			if ($result = $db->loadResult()) {
=======
		elseif ($assetId === null)
		{
			// Build the query to get the asset id for the parent category.
			$query = $db->getQuery(true);
			$query->select('id');
			$query->from('#__assets');
			$query->where('name = ' . $db->quote($this->extension));

			// Get the asset id from the database.
			$db->setQuery($query);
			if ($result = $db->loadResult())
			{
>>>>>>> upstream/master
				$assetId = (int) $result;
			}
		}

		// Return the asset id.
<<<<<<< HEAD
		if ($assetId) {
			return $assetId;
		} else {
=======
		if ($assetId)
		{
			return $assetId;
		}
		else
		{
>>>>>>> upstream/master
			return parent::_getAssetParentId($table, $id);
		}
	}

	/**
	 * Override check function
	 *
<<<<<<< HEAD
	 * @return  bool
	 *
	 * @see		JTable::check
=======
	 * @return  boolean
	 *
	 * @see     JTable::check
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function check()
	{
		// Check for a title.
<<<<<<< HEAD
		if (trim($this->title) == '') {
=======
		if (trim($this->title) == '')
		{
>>>>>>> upstream/master
			$this->setError(JText::_('JLIB_DATABASE_ERROR_MUSTCONTAIN_A_TITLE_CATEGORY'));
			return false;
		}
		$this->alias = trim($this->alias);
<<<<<<< HEAD
		if (empty($this->alias)) {
=======
		if (empty($this->alias))
		{
>>>>>>> upstream/master
			$this->alias = $this->title;
		}

		$this->alias = JApplication::stringURLSafe($this->alias);
<<<<<<< HEAD
		if (trim(str_replace('-','',$this->alias)) == '') {
=======
		if (trim(str_replace('-', '', $this->alias)) == '')
		{
>>>>>>> upstream/master
			$this->alias = JFactory::getDate()->format('Y-m-d-H-i-s');
		}

		return true;
	}
<<<<<<< HEAD
	/**
	 * Overloaded bind function.
	 *
	 * @param   array  named array
	 *
	 * @return  null|string	null is operation was satisfactory, otherwise returns an error
	 *
	 * @see		JTable:bind
=======

	/**
	 * Overloaded bind function.
	 *
	 * @param   array   $array   named array
	 * @param   string  $ignore  An optional array or space separated list of properties
	 * to ignore while binding.
	 *
	 * @return  mixed   Null if operation was satisfactory, otherwise returns an error
	 *
	 * @see     JTable:bind
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function bind($array, $ignore = '')
	{
<<<<<<< HEAD
		if (isset($array['params']) && is_array($array['params'])) {
			$registry = new JRegistry();
			$registry->loadArray($array['params']);
			$array['params'] = (string)$registry;
		}

		if (isset($array['metadata']) && is_array($array['metadata'])) {
			$registry = new JRegistry();
			$registry->loadArray($array['metadata']);
			$array['metadata'] = (string)$registry;
		}

		// Bind the rules.
		if (isset($array['rules']) && is_array($array['rules'])) {
=======
		if (isset($array['params']) && is_array($array['params']))
		{
			$registry = new JRegistry;
			$registry->loadArray($array['params']);
			$array['params'] = (string) $registry;
		}

		if (isset($array['metadata']) && is_array($array['metadata']))
		{
			$registry = new JRegistry;
			$registry->loadArray($array['metadata']);
			$array['metadata'] = (string) $registry;
		}

		// Bind the rules.
		if (isset($array['rules']) && is_array($array['rules']))
		{
>>>>>>> upstream/master
			$rules = new JRules($array['rules']);
			$this->setRules($rules);
		}

		return parent::bind($array, $ignore);
	}

	/**
	 * Overriden JTable::store to set created/modified and user id.
	 *
<<<<<<< HEAD
	 * @param   boolean  True to update fields even if they are null.
=======
	 * @param   boolean  $updateNulls  True to update fields even if they are null.
>>>>>>> upstream/master
	 *
	 * @return  boolean  True on success.
	 *
	 * @since   11.1
	 */
	public function store($updateNulls = false)
	{
<<<<<<< HEAD
		$date	= JFactory::getDate();
		$user	= JFactory::getUser();

		if ($this->id) {
			// Existing category
			$this->modified_time	= $date->toMySQL();
			$this->modified_user_id	= $user->get('id');
		} else {
			// New category
			$this->created_time		= $date->toMySQL();
			$this->created_user_id	= $user->get('id');
		}
	// Verify that the alias is unique
		$table = JTable::getInstance('Category','JTable');
		if ($table->load(array('alias'=>$this->alias,'parent_id'=>$this->parent_id,'extension'=>$this->extension)) && ($table->id != $this->id || $this->id==0)) {
=======
		$date = JFactory::getDate();
		$user = JFactory::getUser();

		if ($this->id)
		{
			// Existing category
			$this->modified_time = $date->toMySQL();
			$this->modified_user_id = $user->get('id');
		}
		else
		{
			// New category
			$this->created_time = $date->toMySQL();
			$this->created_user_id = $user->get('id');
		}
		// Verify that the alias is unique
		$table = JTable::getInstance('Category', 'JTable');
		if ($table->load(array('alias' => $this->alias, 'parent_id' => $this->parent_id, 'extension' => $this->extension))
			&& ($table->id != $this->id || $this->id == 0)
		)
		{
>>>>>>> upstream/master

			$this->setError(JText::_('JLIB_DATABASE_ERROR_CATEGORY_UNIQUE_ALIAS'));
			return false;
		}
		return parent::store($updateNulls);
	}
}
