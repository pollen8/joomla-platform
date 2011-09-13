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

jimport('joomla.database.table');

/**
 * Usergroup table class.
 *
 * @package     Joomla.Platform
 * @subpackage  Database
<<<<<<< HEAD
 * @version		1.0
=======
 * @since       11.1
>>>>>>> upstream/master
 */
class JTableUsergroup extends JTable
{
	/**
	 * Constructor
	 *
<<<<<<< HEAD
	 * @param   object  Database object
=======
	 * @param   database  &$db  A database connector object
>>>>>>> upstream/master
	 *
	 * @return  JTableUsergroup
	 *
	 * @since   11.1
	 */
	public function __construct(&$db)
	{
		parent::__construct('#__usergroups', 'id', $db);
	}

	/**
	 * Method to check the current record to save
	 *
	 * @return  boolean  True on success
	 *
	 * @since   11.1
	 */
	public function check()
	{
		// Validate the title.
<<<<<<< HEAD
		if ((trim($this->title)) == '') {
=======
		if ((trim($this->title)) == '')
		{
>>>>>>> upstream/master
			$this->setError(JText::_('JLIB_DATABASE_ERROR_USERGROUP_TITLE'));
			return false;
		}

		// Check for a duplicate parent_id, title.
		// There is a unique index on the (parend_id, title) field in the table.
		$db = $this->getDbo();
		$query = $db->getQuery(true)
			->select('COUNT(title)')
			->from($this->_tbl)
<<<<<<< HEAD
			->where('title = '.$db->quote(trim($this->title)))
			->where('parent_id = '.(int) $this->parent_id)
			->where('id <> '.(int) $this->id);
		$db->setQuery($query);

		if ($db->loadResult() > 0) {
=======
			->where('title = ' . $db->quote(trim($this->title)))
			->where('parent_id = ' . (int) $this->parent_id)
			->where('id <> ' . (int) $this->id);
		$db->setQuery($query);

		if ($db->loadResult() > 0)
		{
>>>>>>> upstream/master
			$this->setError(JText::_('JLIB_DATABASE_ERROR_USERGROUP_TITLE_EXISTS'));
			return false;
		}

		return true;
	}

	/**
	 * Method to recursively rebuild the nested set tree.
	 *
<<<<<<< HEAD
	 * @param   integer  The root of the tree to rebuild.
	 * @param   integer  The left id to start with in building the tree.
=======
	 * @param   integer  $parent_id  The root of the tree to rebuild.
	 * @param   integer  $left       The left id to start with in building the tree.
>>>>>>> upstream/master
	 *
	 * @return  boolean  True on success
	 *
	 * @since   11.1
	 */
	public function rebuild($parent_id = 0, $left = 0)
	{
		// get the database object
		$db = &$this->_db;

		// get all children of this node
<<<<<<< HEAD
		$db->setQuery(
			'SELECT id FROM '. $this->_tbl .
			' WHERE parent_id='. (int)$parent_id .
			' ORDER BY parent_id, title'
		);
=======
		$db->setQuery('SELECT id FROM ' . $this->_tbl . ' WHERE parent_id=' . (int) $parent_id . ' ORDER BY parent_id, title');
>>>>>>> upstream/master
		$children = $db->loadColumn();

		// the right value of this node is the left value + 1
		$right = $left + 1;

		// execute this function recursively over all children
<<<<<<< HEAD
		for ($i=0,$n=count($children); $i < $n; $i++)
=======
		for ($i = 0, $n = count($children); $i < $n; $i++)
>>>>>>> upstream/master
		{
			// $right is the current right value, which is incremented on recursion return
			$right = $this->rebuild($children[$i], $right);

			// if there is an update failure, return false to break out of the recursion
<<<<<<< HEAD
			if ($right === false) {
=======
			if ($right === false)
			{
>>>>>>> upstream/master
				return false;
			}
		}

		// we've got the left value, and now that we've processed
		// the children of this node we also know the right value
<<<<<<< HEAD
		$db->setQuery(
			'UPDATE '. $this->_tbl .
			' SET lft='. (int)$left .', rgt='. (int)$right .
			' WHERE id='. (int)$parent_id
		);
		// if there is an update failure, return false to break out of the recursion
		if (!$db->query()) {
=======
		$db->setQuery('UPDATE ' . $this->_tbl . ' SET lft=' . (int) $left . ', rgt=' . (int) $right . ' WHERE id=' . (int) $parent_id);
		// if there is an update failure, return false to break out of the recursion
		if (!$db->query())
		{
>>>>>>> upstream/master
			return false;
		}

		// return the right value of this node + 1
		return $right + 1;
	}

	/**
	 * Inserts a new row if id is zero or updates an existing row in the database table
	 *
<<<<<<< HEAD
	 * @param   bool  $updateNulls	If false, null object variables are not updated
	 *
	 * @return  bool  True successful, false otherwise and an internal error message is set
=======
	 * @param   boolean  $updateNulls  If false, null object variables are not updated
	 *
	 * @return  boolean  True if successful, false otherwise and an internal error message is set
>>>>>>> upstream/master
	 *
	 * @since   11.1
	 */
	function store($updateNulls = false)
	{
<<<<<<< HEAD
		if ($result = parent::store($updateNulls)) {
=======
		if ($result = parent::store($updateNulls))
		{
>>>>>>> upstream/master
			// Rebuild the nested set tree.
			$this->rebuild();
		}

		return $result;
	}

	/**
<<<<<<< HEAD
	 * Delete this object and it's dependancies
	 *
	 * @param   integer  $oid	The primary key of the user group to delete.
=======
	 * Delete this object and its dependancies
	 *
	 * @param   integer  $oid  The primary key of the user group to delete.
>>>>>>> upstream/master
	 *
	 * @return  mixed  Boolean or Exception.
	 *
	 * @since   11.1
	 */
	function delete($oid = null)
	{
		$k = $this->_tbl_key;

<<<<<<< HEAD
		if ($oid) {
			$this->load($oid);
		}
		if ($this->id == 0) {
			return new JException(JText::_('JGLOBAL_CATEGORY_NOT_FOUND'));
		}
		if ($this->parent_id == 0) {
			return new JException(JText::_('JLIB_DATABASE_ERROR_DELETE_ROOT_CATEGORIES'));
		}
		if ($this->lft == 0 or $this->rgt == 0) {
=======
		if ($oid)
		{
			$this->load($oid);
		}
		if ($this->id == 0)
		{
			return new JException(JText::_('JGLOBAL_CATEGORY_NOT_FOUND'));
		}
		if ($this->parent_id == 0)
		{
			return new JException(JText::_('JLIB_DATABASE_ERROR_DELETE_ROOT_CATEGORIES'));
		}
		if ($this->lft == 0 or $this->rgt == 0)
		{
>>>>>>> upstream/master
			return new JException(JText::_('JLIB_DATABASE_ERROR_DELETE_CATEGORY'));
		}

		$db = $this->getDbo();

		// Select the category ID and it's children
		$db->setQuery(
<<<<<<< HEAD
			'SELECT c.id' .
			' FROM '.$db->quoteName($this->_tbl).' AS c' .
			' WHERE c.lft >= '.(int) $this->lft.' AND c.rgt <= '.$this->rgt
		);
		$ids = $db->loadColumn();
		if (empty($ids)) {
			return new JException(JText::_('JLIB_DATABASE_ERROR_DELETE_CATEGORY'));
		}

		// Delete the category dependancies
		// @todo Remove all related threads, posts and subscriptions

		// Delete the category and it's children
		$db->setQuery(
			'DELETE FROM '.$db->quoteName($this->_tbl).
			' WHERE id IN ('.implode(',', $ids).')'
		);
		if (!$db->query()) {
=======
			'SELECT c.id' . ' FROM ' . $db->quoteName($this->_tbl) . ' AS c' .
			' WHERE c.lft >= ' . (int) $this->lft . ' AND c.rgt <= ' . $this->rgt
		);
		$ids = $db->loadColumn();
		if (empty($ids))
		{
			return new JException(JText::_('JLIB_DATABASE_ERROR_DELETE_CATEGORY'));
		}

		// Delete the category dependencies
		// @todo Remove all related threads, posts and subscriptions

		// Delete the category and its children
		$db->setQuery('DELETE FROM ' . $db->quoteName($this->_tbl) . ' WHERE id IN (' . implode(',', $ids) . ')');
		if (!$db->query())
		{
>>>>>>> upstream/master
			$this->setError($db->getErrorMsg());
			return false;
		}

		// Delete the usergroup in view levels
		$replace = array();
		foreach ($ids as $id)
		{
<<<<<<< HEAD
			$replace []= ','.$db->quote("[$id,").','.$db->quote("[").')';
			$replace []= ','.$db->quote(",$id,").','.$db->quote(",").')';
			$replace []= ','.$db->quote(",$id]").','.$db->quote("]").')';
			$replace []= ','.$db->quote("[$id]").','.$db->quote("[]").')';
		}

		$query = $db->getQuery(true);
		$query->set('rules='.str_repeat('replace(',4*count($ids)).'rules'.implode('',$replace));
		$query->update('#__viewlevels');
		$query->where('rules REGEXP "(,|\\\\[)('.implode('|', $ids).')(,|\\\\])"');
		$db->setQuery($query);
		if (!$db->query()) {
=======
			$replace[] = ',' . $db->quote("[$id,") . ',' . $db->quote("[") . ')';
			$replace[] = ',' . $db->quote(",$id,") . ',' . $db->quote(",") . ')';
			$replace[] = ',' . $db->quote(",$id]") . ',' . $db->quote("]") . ')';
			$replace[] = ',' . $db->quote("[$id]") . ',' . $db->quote("[]") . ')';
		}

		$query = $db->getQuery(true);
		$query->set('rules=' . str_repeat('replace(', 4 * count($ids)) . 'rules' . implode('', $replace));
		$query->update('#__viewlevels');
		$query->where('rules REGEXP "(,|\\\\[)(' . implode('|', $ids) . ')(,|\\\\])"');
		$db->setQuery($query);
		if (!$db->query())
		{
>>>>>>> upstream/master
			$this->setError($db->getErrorMsg());
			return false;
		}

		// Delete the user to usergroup mappings for the group(s) from the database.
		$db->setQuery(
<<<<<<< HEAD
			'DELETE FROM `#__user_usergroup_map`' .
			' WHERE `group_id` IN ('.implode(',', $ids).')'
=======
			'DELETE FROM ' . $query->qn('#__user_usergroup_map') .
			' WHERE ' . $query->qn('group_id') . ' IN (' . implode(',', $ids) . ')'
>>>>>>> upstream/master
		);
		$db->query();

		// Check for a database error.
<<<<<<< HEAD
		if ($db->getErrorNum()) {
=======
		if ($db->getErrorNum())
		{
>>>>>>> upstream/master
			$this->setError($db->getErrorMsg());
			return false;
		}

		return true;
	}
<<<<<<< HEAD
}
=======
}
>>>>>>> upstream/master
