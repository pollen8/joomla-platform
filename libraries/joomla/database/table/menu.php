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
 * Menu table
 *
 * @package     Joomla.Platform
 * @subpackage  Table
 * @since       11.1
 */
class JTableMenu extends JTableNested
{
	/**
	 * Constructor
	 *
<<<<<<< HEAD
	 * @param database A database connector object
=======
	 * @param   database  &$db  A database connector object
	 *
	 * @return  JTableMenu
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function __construct(&$db)
	{
		parent::__construct('#__menu', 'id', $db);

		// Set the default access level.
		$this->access = (int) JFactory::getConfig()->get('access');
	}

	/**
	 * Overloaded bind function
	 *
<<<<<<< HEAD
	 * @param   array  $hash  named array
	 *
	 * @return  mixed  null is operation was satisfactory, otherwise returns an error
	 *
	 * @see		JTable:bind
=======
	 * @param   array  $array   Named array
	 * @param   mixed  $ignore  An optional array or space separated list of properties to ignore while binding.
	 *
	 * @return  mixed  Null if operation was satisfactory, otherwise returns an error
	 *
	 * @see     JTable:bind
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function bind($array, $ignore = '')
	{
		// Verify that the default home menu is not unset
<<<<<<< HEAD
		if ($this->home == '1' && $this->language == '*' && ($array['home'] == '0')) {
=======
		if ($this->home == '1' && $this->language == '*' && ($array['home'] == '0'))
		{
>>>>>>> upstream/master
			$this->setError(JText::_('JLIB_DATABASE_ERROR_MENU_CANNOT_UNSET_DEFAULT_DEFAULT'));
			return false;
		}
		//Verify that the default home menu set to "all" languages" is not unset
<<<<<<< HEAD
		if ($this->home == '1' && $this->language == '*' && ($array['language'] != '*')) {
=======
		if ($this->home == '1' && $this->language == '*' && ($array['language'] != '*'))
		{
>>>>>>> upstream/master
			$this->setError(JText::_('JLIB_DATABASE_ERROR_MENU_CANNOT_UNSET_DEFAULT'));
			return false;
		}

		// Verify that the default home menu is not unpublished
<<<<<<< HEAD
		if ($this->home == '1' && $this->language == '*' && $array['published'] != '1') {
=======
		if ($this->home == '1' && $this->language == '*' && $array['published'] != '1')
		{
>>>>>>> upstream/master
			$this->setError(JText::_('JLIB_DATABASE_ERROR_MENU_UNPUBLISH_DEFAULT_HOME'));
			return false;
		}

		if (isset($array['params']) && is_array($array['params']))
		{
<<<<<<< HEAD
			$registry = new JRegistry();
			$registry->loadArray($array['params']);
			$array['params'] = (string)$registry;
=======
			$registry = new JRegistry;
			$registry->loadArray($array['params']);
			$array['params'] = (string) $registry;
>>>>>>> upstream/master
		}

		return parent::bind($array, $ignore);
	}

	/**
	 * Overloaded check function
	 *
<<<<<<< HEAD
	 * @return  boolean
	 * @see		JTable::check
=======
	 * @return  boolean  True on success
	 *
	 * @see     JTable::check
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function check()
	{
		// If the alias field is empty, set it to the title.
		$this->alias = trim($this->alias);
<<<<<<< HEAD
		if ((empty($this->alias)) && ($this->type != 'alias' && $this->type !='url')) {
=======
		if ((empty($this->alias)) && ($this->type != 'alias' && $this->type != 'url'))
		{
>>>>>>> upstream/master
			$this->alias = $this->title;
		}

		// Make the alias URL safe.
		$this->alias = JApplication::stringURLSafe($this->alias);
<<<<<<< HEAD
		if (trim(str_replace('-', '', $this->alias)) == '') {
=======
		if (trim(str_replace('-', '', $this->alias)) == '')
		{
>>>>>>> upstream/master
			$this->alias = JFactory::getDate()->format('Y-m-d-H-i-s');
		}

		// Cast the home property to an int for checking.
		$this->home = (int) $this->home;

		// Verify that a first level menu item alias is not 'component'.
<<<<<<< HEAD
		if ($this->parent_id==1 && $this->alias == 'component') {
=======
		if ($this->parent_id == 1 && $this->alias == 'component')
		{
>>>>>>> upstream/master
			$this->setError(JText::_('JLIB_DATABASE_ERROR_MENU_ROOT_ALIAS_COMPONENT'));
			return false;
		}

		// Verify that a first level menu item alias is not the name of a folder.
		jimport('joomla.filesystem.folders');
<<<<<<< HEAD
		if ($this->parent_id==1 && in_array($this->alias, JFolder::folders(JPATH_ROOT))) {
=======
		if ($this->parent_id == 1 && in_array($this->alias, JFolder::folders(JPATH_ROOT)))
		{
>>>>>>> upstream/master
			$this->setError(JText::sprintf('JLIB_DATABASE_ERROR_MENU_ROOT_ALIAS_FOLDER', $this->alias, $this->alias));
			return false;
		}

		// Verify that the home item a component.
<<<<<<< HEAD
		if ($this->home && $this->type != 'component') {
=======
		if ($this->home && $this->type != 'component')
		{
>>>>>>> upstream/master
			$this->setError(JText::_('JLIB_DATABASE_ERROR_MENU_HOME_NOT_COMPONENT'));
			return false;
		}

		return true;
	}
<<<<<<< HEAD
	/**
	 * Overloaded store function
	 *
	 * @return  boolean
	 * @see		JTable::store
=======

	/**
	 * Overloaded store function
	 *
	 * @param   boolean  $updateNulls  True to update fields even if they are null.
	 *
	 * @return  mixed    False on failure, positive integer on success.
	 *
	 * @see     JTable::store
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function store($updateNulls = false)
	{
		$db = JFactory::getDBO();
		// Verify that the alias is unique
<<<<<<< HEAD
		$table = JTable::getInstance('Menu','JTable');
		if ($table->load(array('alias'=>$this->alias,'parent_id'=>$this->parent_id,'client_id'=>$this->client_id)) && ($table->id != $this->id || $this->id==0)) {
			if ($this->menutype==$table->menutype) {
				$this->setError(JText::_('JLIB_DATABASE_ERROR_MENU_UNIQUE_ALIAS'));
			}
			else {
=======
		$table = JTable::getInstance('Menu', 'JTable');
		if ($table->load(array('alias' => $this->alias, 'parent_id' => $this->parent_id, 'client_id' => $this->client_id))
			&& ($table->id != $this->id || $this->id == 0)
		)
		{
			if ($this->menutype == $table->menutype)
			{
				$this->setError(JText::_('JLIB_DATABASE_ERROR_MENU_UNIQUE_ALIAS'));
			}
			else
			{
>>>>>>> upstream/master
				$this->setError(JText::_('JLIB_DATABASE_ERROR_MENU_UNIQUE_ALIAS_ROOT'));
			}
			return false;
		}
		// Verify that the home page for this language is unique
<<<<<<< HEAD
		if ($this->home=='1') {
			$table = JTable::getInstance('Menu','JTable');
			if ($table->load(array('home'=>'1','language'=>$this->language))) {
				if ($table->checked_out && $table->checked_out!=$this->checked_out) {
=======
		if ($this->home == '1')
		{
			$table = JTable::getInstance('Menu', 'JTable');
			if ($table->load(array('home' => '1', 'language' => $this->language)))
			{
				if ($table->checked_out && $table->checked_out != $this->checked_out)
				{
>>>>>>> upstream/master
					$this->setError(JText::_('JLIB_DATABASE_ERROR_MENU_DEFAULT_CHECKIN_USER_MISMATCH'));
					return false;
				}
				$table->home = 0;
				$table->checked_out = 0;
				$table->checked_out_time = $db->getNullDate();
				$table->store();
			}
<<<<<<< HEAD
		}
		if(!parent::store($updateNulls)) {
=======
			// Verify that the home page for this menu is unique.
			if ($table->load(array('home' => '1', 'menutype' => $this->menutype)) && ($table->id != $this->id || $this->id == 0))
			{
				$this->setError(JText::_('JLIB_DATABASE_ERROR_MENU_HOME_NOT_UNIQUE_IN_MENU'));
				return false;
			}
		}
		if (!parent::store($updateNulls))
		{
>>>>>>> upstream/master
			return false;
		}
		// Get the new path in case the node was moved
		$pathNodes = $this->getPath();
		$segments = array();
<<<<<<< HEAD
		foreach ($pathNodes as $node) {
			// Don't include root in path
			if ($node->alias != 'root') {
=======
		foreach ($pathNodes as $node)
		{
			// Don't include root in path
			if ($node->alias != 'root')
			{
>>>>>>> upstream/master
				$segments[] = $node->alias;
			}
		}
		$newPath = trim(implode('/', $segments), ' /\\');
		// Use new path for partial rebuild of table
<<<<<<< HEAD
		// rebuild will return positive integer on success, false on failure
=======
		// Rebuild will return positive integer on success, false on failure
>>>>>>> upstream/master
		return ($this->rebuild($this->{$this->_tbl_key}, $this->lft, $this->level, $newPath) > 0);
	}
}
