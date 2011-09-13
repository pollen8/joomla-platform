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
 * Table class supporting modified pre-order tree traversal behavior.
 *
 * @package     Joomla.Platform
 * @subpackage  Database
<<<<<<< HEAD
 * @since       11.1
 * @link		http://docs.joomla.org/JTableNested
=======
 * @link        http://docs.joomla.org/JTableNested
 * @since       11.1
>>>>>>> upstream/master
 */
class JTableNested extends JTable
{
	/**
	 * Object property holding the primary key of the parent node.  Provides
	 * adjacency list data for nodes.
	 *
<<<<<<< HEAD
	 * @var integer
=======
	 * @var    integer
	 * @since  11.1
>>>>>>> upstream/master
	 */
	public $parent_id;

	/**
	 * Object property holding the depth level of the node in the tree.
	 *
<<<<<<< HEAD
	 * @var integer
=======
	 * @var    integer
	 * @since  11.1
>>>>>>> upstream/master
	 */
	public $level;

	/**
	 * Object property holding the left value of the node for managing its
	 * placement in the nested sets tree.
	 *
<<<<<<< HEAD
	 * @var integer
=======
	 * @var    integer
	 * @since  11.1
>>>>>>> upstream/master
	 */
	public $lft;

	/**
	 * Object property holding the right value of the node for managing its
	 * placement in the nested sets tree.
	 *
<<<<<<< HEAD
	 * @var integer
=======
	 * @var    integer
	 * @since  11.1
>>>>>>> upstream/master
	 */
	public $rgt;

	/**
	 * Object property holding the alias of this node used to constuct the
	 * full text path, forward-slash delimited.
	 *
<<<<<<< HEAD
	 * @var string
=======
	 * @var    string
	 * @since  11.1
>>>>>>> upstream/master
	 */
	public $alias;

	/**
	 * Object property to hold the location type to use when storing the row.
	 * Possible values are: ['before', 'after', 'first-child', 'last-child'].
	 *
<<<<<<< HEAD
	 * @var string
=======
	 * @var    string
	 * @since  11.1
>>>>>>> upstream/master
	 */
	protected $_location;

	/**
	 * Object property to hold the primary key of the location reference node to
	 * use when storing the row.  A combination of location type and reference
	 * node describes where to store the current node in the tree.
	 *
	 * @var integer
<<<<<<< HEAD
=======
	 * @since  11.1
>>>>>>> upstream/master
	 */
	protected $_location_id;

	/**
<<<<<<< HEAD
	 * @var   array  An array to cache values in recursive processes.
	 */
	protected $_cache = array();

=======
	 * An array to cache values in recursive processes.
	 *
	 * @var   array
	 * @since  11.1
	 */
	protected $_cache = array();

	/**
	 * Debug level
	 *
	 * @var    integer
	 * @since  11.1
	 */
>>>>>>> upstream/master
	protected $_debug = 0;

	/**
	 * Sets the debug level on or off
	 *
<<<<<<< HEAD
	 * @param   integer  0 = off, 1 = on
=======
	 * @param   integer  $level  0 = off, 1 = on
	 *
	 * @return  void
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function debug($level)
	{
		$this->_debug = intval($level);
	}

	/**
	 * Method to get an array of nodes from a given node to its root.
	 *
<<<<<<< HEAD
	 * @param   integer  Primary key of the node for which to get the path.
	 * @param   boolean  Only select diagnostic data for the nested sets.
	 * @return  mixed    Boolean false on failure or array of node objects on success.
	 * @since   11.1
	 * @link	http://docs.joomla.org/JTableNested/getPath
=======
	 * @param   integer  $pk          Primary key of the node for which to get the path.
	 * @param   boolean  $diagnostic  Only select diagnostic data for the nested sets.
	 *
	 * @return  mixed    Boolean false on failure or array of node objects on success.
	 *
	 * @link    http://docs.joomla.org/JTableNested/getPath
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function getPath($pk = null, $diagnostic = false)
	{
		// Initialise variables.
		$k = $this->_tbl_key;
		$pk = (is_null($pk)) ? $this->$k : $pk;

		// Get the path from the node to the root.
		$query = $this->_db->getQuery(true);
<<<<<<< HEAD
		$select = ($diagnostic) ? 'p.'.$k.', p.parent_id, p.level, p.lft, p.rgt' : 'p.*';
		$query->select($select);
		$query->from($this->_tbl.' AS n, '.$this->_tbl.' AS p');
		$query->where('n.lft BETWEEN p.lft AND p.rgt');
		$query->where('n.'.$k.' = '.(int) $pk);
=======
		$select = ($diagnostic) ? 'p.' . $k . ', p.parent_id, p.level, p.lft, p.rgt' : 'p.*';
		$query->select($select);
		$query->from($this->_tbl . ' AS n, ' . $this->_tbl . ' AS p');
		$query->where('n.lft BETWEEN p.lft AND p.rgt');
		$query->where('n.' . $k . ' = ' . (int) $pk);
>>>>>>> upstream/master
		$query->order('p.lft');

		$this->_db->setQuery($query);
		$path = $this->_db->loadObjectList();

		// Check for a database error.
		if ($this->_db->getErrorNum())
		{
			$e = new JException(JText::sprintf('JLIB_DATABASE_ERROR_GET_PATH_FAILED', get_class($this), $this->_db->getErrorMsg()));
			$this->setError($e);
			return false;
		}

		return $path;
	}

	/**
	 * Method to get a node and all its child nodes.
	 *
<<<<<<< HEAD
	 * @param   integer  Primary key of the node for which to get the tree.
	 * @param   boolean  Only select diagnostic data for the nested sets.
	 * @return  mixed    Boolean false on failure or array of node objects on success.
	 * @since   11.1
	 * @link	http://docs.joomla.org/JTableNested/getTree
=======
	 * @param   integer  $pk          Primary key of the node for which to get the tree.
	 * @param   boolean  $diagnostic  Only select diagnostic data for the nested sets.
	 *
	 * @return  mixed    Boolean false on failure or array of node objects on success.
	 *
	 * @link    http://docs.joomla.org/JTableNested/getTree
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function getTree($pk = null, $diagnostic = false)
	{
		// Initialise variables.
		$k = $this->_tbl_key;
		$pk = (is_null($pk)) ? $this->$k : $pk;

		// Get the node and children as a tree.
		$query = $this->_db->getQuery(true);
<<<<<<< HEAD
		$select = ($diagnostic) ? 'n.'.$k.', n.parent_id, n.level, n.lft, n.rgt' : 'n.*';
		$query->select($select);
		$query->from($this->_tbl.' AS n, '.$this->_tbl.' AS p');
		$query->where('n.lft BETWEEN p.lft AND p.rgt');
		$query->where('p.'.$k.' = '.(int) $pk);
=======
		$select = ($diagnostic) ? 'n.' . $k . ', n.parent_id, n.level, n.lft, n.rgt' : 'n.*';
		$query->select($select);
		$query->from($this->_tbl . ' AS n, ' . $this->_tbl . ' AS p');
		$query->where('n.lft BETWEEN p.lft AND p.rgt');
		$query->where('p.' . $k . ' = ' . (int) $pk);
>>>>>>> upstream/master
		$query->order('n.lft');
		$this->_db->setQuery($query);
		$tree = $this->_db->loadObjectList();

		// Check for a database error.
		if ($this->_db->getErrorNum())
		{
			$e = new JException(JText::sprintf('JLIB_DATABASE_ERROR_GET_TREE_FAILED', get_class($this), $this->_db->getErrorMsg()));
			$this->setError($e);
			return false;
		}

		return $tree;
	}

	/**
	 * Method to determine if a node is a leaf node in the tree (has no children).
	 *
<<<<<<< HEAD
	 * @param   integer  Primary key of the node to check.
	 * @return  boolean  True if a leaf node.
	 * @since   11.1
	 * @link	http://docs.joomla.org/JTableNested/isLeaf
=======
	 * @param   integer  $pk  Primary key of the node to check.
	 *
	 * @return  boolean  True if a leaf node.
	 *
	 * @link    http://docs.joomla.org/JTableNested/isLeaf
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function isLeaf($pk = null)
	{
		// Initialise variables.
		$k = $this->_tbl_key;
		$pk = (is_null($pk)) ? $this->$k : $pk;

		// Get the node by primary key.
<<<<<<< HEAD
		if (!$node = $this->_getNode($pk)) {
=======
		if (!$node = $this->_getNode($pk))
		{
>>>>>>> upstream/master
			// Error message set in getNode method.
			return false;
		}

		// The node is a leaf node.
		return (($node->rgt - $node->lft) == 1);
	}

	/**
	 * Method to set the location of a node in the tree object.  This method does not
	 * save the new location to the database, but will set it in the object so
	 * that when the node is stored it will be stored in the new location.
	 *
<<<<<<< HEAD
	 * @param   integer  The primary key of the node to reference new location by.
	 * @param   string   Location type string. ['before', 'after', 'first-child', 'last-child']
	 * @return  boolean  True on success.
	 * @since   11.1
	 * @link	http://docs.joomla.org/JTableNested/setLocation
=======
	 * @param   integer  $referenceId  The primary key of the node to reference new location by.
	 * @param   string   $position     Location type string. ['before', 'after', 'first-child', 'last-child']
	 *
	 * @return  boolean  True on success.
	 *
	 * @link    http://docs.joomla.org/JTableNested/setLocation
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function setLocation($referenceId, $position = 'after')
	{
		// Make sure the location is valid.
<<<<<<< HEAD
		if (($position != 'before') && ($position != 'after') &&
			($position != 'first-child') && ($position != 'last-child')) {
=======
		if (($position != 'before') && ($position != 'after') && ($position != 'first-child') && ($position != 'last-child'))
		{
>>>>>>> upstream/master
			$e = new JException(JText::sprintf('JLIB_DATABASE_ERROR_INVALID_LOCATION', get_class($this)));
			$this->setError($e);
			return false;
		}

		// Set the location properties.
		$this->_location = $position;
		$this->_location_id = $referenceId;

		return true;
	}

	/**
	 * Method to move a row in the ordering sequence of a group of rows defined by an SQL WHERE clause.
	 * Negative numbers move the row up in the sequence and positive numbers move it down.
	 *
<<<<<<< HEAD
	 * @param   integer  The direction and magnitude to move the row in the ordering sequence.
	 * @param   string   WHERE clause to use for limiting the selection of rows to compact the
	 *					ordering values.
	 * @return  mixed    Boolean true on success.
	 * @since   11.1
	 * @link	http://docs.joomla.org/JTable/move
=======
	 * @param   integer  $delta  The direction and magnitude to move the row in the ordering sequence.
	 * @param   string   $where  WHERE clause to use for limiting the selection of rows to compact the
	 * ordering values.
	 *
	 * @return  mixed    Boolean true on success.
	 *
	 * @link    http://docs.joomla.org/JTable/move
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function move($delta, $where = '')
	{
		// Initialise variables.
		$k = $this->_tbl_key;
		$pk = $this->$k;

		$query = $this->_db->getQuery(true);
		$query->select($k);
		$query->from($this->_tbl);
<<<<<<< HEAD
		$query->where('parent_id = '.$this->parent_id);
		if ($where) {
			$query->where($where);
		}
		$position = 'after';
		if($delta > 0)
		{
			$query->where('rgt > '.$this->rgt);
			$query->order('rgt ASC');
			$position = 'after';
		} else {
			$query->where('lft < '.$this->lft);
=======
		$query->where('parent_id = ' . $this->parent_id);
		if ($where)
		{
			$query->where($where);
		}
		$position = 'after';
		if ($delta > 0)
		{
			$query->where('rgt > ' . $this->rgt);
			$query->order('rgt ASC');
			$position = 'after';
		}
		else
		{
			$query->where('lft < ' . $this->lft);
>>>>>>> upstream/master
			$query->order('lft DESC');
			$position = 'before';
		}

		$this->_db->setQuery($query);
		$referenceId = $this->_db->loadResult();

<<<<<<< HEAD
		if ($referenceId) {
			return $this->moveByReference($referenceId, $position, $pk);
		}
		else {
=======
		if ($referenceId)
		{
			return $this->moveByReference($referenceId, $position, $pk);
		}
		else
		{
>>>>>>> upstream/master
			return false;
		}
	}

	/**
	 * Method to move a node and its children to a new location in the tree.
	 *
<<<<<<< HEAD
	 * @param   integer  The primary key of the node to reference new location by.
	 * @param   string   Location type string. ['before', 'after', 'first-child', 'last-child']
	 * @param   integer  The primary key of the node to move.
	 * @return  boolean  True on success.
	 * @since   11.1
	 * @link	http://docs.joomla.org/JTableNested/moveByReference
=======
	 * @param   integer  $referenceId  The primary key of the node to reference new location by.
	 * @param   string   $position     Location type string. ['before', 'after', 'first-child', 'last-child']
	 * @param   integer  $pk           The primary key of the node to move.
	 *
	 * @return  boolean  True on success.
	 *
	 * @link    http://docs.joomla.org/JTableNested/moveByReference
	 * @since   11.1
>>>>>>> upstream/master
	 */

	public function moveByReference($referenceId, $position = 'after', $pk = null)
	{
<<<<<<< HEAD
		if ($this->_debug) {
=======
		if ($this->_debug)
		{
>>>>>>> upstream/master
			echo "\nMoving ReferenceId:$referenceId, Position:$position, PK:$pk";
		}

		// Initialise variables.
		$k = $this->_tbl_key;
		$pk = (is_null($pk)) ? $this->$k : $pk;

		// Get the node by id.
<<<<<<< HEAD
		if (!$node = $this->_getNode($pk)) {
=======
		if (!$node = $this->_getNode($pk))
		{
>>>>>>> upstream/master
			// Error message set in getNode method.
			return false;
		}

		// Get the ids of child nodes.
		$query = $this->_db->getQuery(true);
		$query->select($k);
		$query->from($this->_tbl);
<<<<<<< HEAD
		$query->where('lft BETWEEN '.(int) $node->lft.' AND '.(int) $node->rgt);
=======
		$query->where('lft BETWEEN ' . (int) $node->lft . ' AND ' . (int) $node->rgt);
>>>>>>> upstream/master
		$this->_db->setQuery($query);
		$children = $this->_db->loadColumn();

		// Check for a database error.
		if ($this->_db->getErrorNum())
		{
			$e = new JException(JText::sprintf('JLIB_DATABASE_ERROR_MOVE_FAILED', get_class($this), $this->_db->getErrorMsg()));
			$this->setError($e);
			return false;
		}
<<<<<<< HEAD
		if ($this->_debug) {
=======
		if ($this->_debug)
		{
>>>>>>> upstream/master
			$this->_logtable(false);
		}

		// Cannot move the node to be a child of itself.
		if (in_array($referenceId, $children))
		{
			$e = new JException(JText::sprintf('JLIB_DATABASE_ERROR_INVALID_NODE_RECURSION', get_class($this)));
			$this->setError($e);
			return false;
		}

		// Lock the table for writing.
<<<<<<< HEAD
		if (!$this->_lock()) {
=======
		if (!$this->_lock())
		{
>>>>>>> upstream/master
			return false;
		}

		/*
		 * Move the sub-tree out of the nested sets by negating its left and right values.
<<<<<<< HEAD
		*/
		$query = $this->_db->getQuery(true);
		$query->update($this->_tbl);
		$query->set('lft = lft * (-1), rgt = rgt * (-1)');
		$query->where('lft BETWEEN '.(int) $node->lft.' AND '.(int) $node->rgt);
=======
		 */
		$query = $this->_db->getQuery(true);
		$query->update($this->_tbl);
		$query->set('lft = lft * (-1), rgt = rgt * (-1)');
		$query->where('lft BETWEEN ' . (int) $node->lft . ' AND ' . (int) $node->rgt);
>>>>>>> upstream/master
		$this->_db->setQuery($query);

		$this->_runQuery($query, 'JLIB_DATABASE_ERROR_MOVE_FAILED');

		/*
		 * Close the hole in the tree that was opened by removing the sub-tree from the nested sets.
		 */
		// Compress the left values.
		$query = $this->_db->getQuery(true);
		$query->update($this->_tbl);
<<<<<<< HEAD
		$query->set('lft = lft - '.(int) $node->width);
		$query->where('lft > '.(int) $node->rgt);
=======
		$query->set('lft = lft - ' . (int) $node->width);
		$query->where('lft > ' . (int) $node->rgt);
>>>>>>> upstream/master
		$this->_db->setQuery($query);

		$this->_runQuery($query, 'JLIB_DATABASE_ERROR_MOVE_FAILED');

		// Compress the right values.
		$query = $this->_db->getQuery(true);
		$query->update($this->_tbl);
<<<<<<< HEAD
		$query->set('rgt = rgt - '.(int) $node->width);
		$query->where('rgt > '.(int) $node->rgt);
=======
		$query->set('rgt = rgt - ' . (int) $node->width);
		$query->where('rgt > ' . (int) $node->rgt);
>>>>>>> upstream/master
		$this->_db->setQuery($query);

		$this->_runQuery($query, 'JLIB_DATABASE_ERROR_MOVE_FAILED');

		// We are moving the tree relative to a reference node.
		if ($referenceId)
		{
			// Get the reference node by primary key.
			if (!$reference = $this->_getNode($referenceId))
			{
				// Error message set in getNode method.
				$this->_unlock();
				return false;
			}

			// Get the reposition data for shifting the tree and re-inserting the node.
			if (!$repositionData = $this->_getTreeRepositionData($reference, $node->width, $position))
			{
				// Error message set in getNode method.
				$this->_unlock();
				return false;
			}
		}
<<<<<<< HEAD

=======
>>>>>>> upstream/master
		// We are moving the tree to be the last child of the root node
		else
		{
			// Get the last root node as the reference node.
			$query = $this->_db->getQuery(true);
<<<<<<< HEAD
			$query->select($this->_tbl_key.', parent_id, level, lft, rgt');
=======
			$query->select($this->_tbl_key . ', parent_id, level, lft, rgt');
>>>>>>> upstream/master
			$query->from($this->_tbl);
			$query->where('parent_id = 0');
			$query->order('lft DESC');
			$this->_db->setQuery($query, 0, 1);
			$reference = $this->_db->loadObject();

			// Check for a database error.
			if ($this->_db->getErrorNum())
			{
				$e = new JException(JText::sprintf('JLIB_DATABASE_ERROR_MOVE_FAILED', get_class($this), $this->_db->getErrorMsg()));
				$this->setError($e);
				$this->_unlock();
				return false;
			}
<<<<<<< HEAD
			if ($this->_debug) {
=======
			if ($this->_debug)
			{
>>>>>>> upstream/master
				$this->_logtable(false);
			}

			// Get the reposition data for re-inserting the node after the found root.
			if (!$repositionData = $this->_getTreeRepositionData($reference, $node->width, 'last-child'))
			{
				// Error message set in getNode method.
				$this->_unlock();
				return false;
			}
		}

		/*
		 * Create space in the nested sets at the new location for the moved sub-tree.
		 */
		// Shift left values.
		$query = $this->_db->getQuery(true);
		$query->update($this->_tbl);
<<<<<<< HEAD
		$query->set('lft = lft + '.(int) $node->width);
=======
		$query->set('lft = lft + ' . (int) $node->width);
>>>>>>> upstream/master
		$query->where($repositionData->left_where);
		$this->_db->setQuery($query);

		$this->_runQuery($query, 'JLIB_DATABASE_ERROR_MOVE_FAILED');

		// Shift right values.
		$query = $this->_db->getQuery(true);
		$query->update($this->_tbl);
<<<<<<< HEAD
		$query->set('rgt = rgt + '.(int) $node->width);
=======
		$query->set('rgt = rgt + ' . (int) $node->width);
>>>>>>> upstream/master
		$query->where($repositionData->right_where);
		$this->_db->setQuery($query);

		$this->_runQuery($query, 'JLIB_DATABASE_ERROR_MOVE_FAILED');

		/*
		 * Calculate the offset between where the node used to be in the tree and
		 * where it needs to be in the tree for left ids (also works for right ids).
		 */
		$offset = $repositionData->new_lft - $node->lft;
		$levelOffset = $repositionData->new_level - $node->level;

		// Move the nodes back into position in the tree using the calculated offsets.
		$query = $this->_db->getQuery(true);
		$query->update($this->_tbl);
<<<<<<< HEAD
		$query->set('rgt = '.(int) $offset.' - rgt');
		$query->set('lft = '.(int) $offset.' - lft');
		$query->set('level = level + '.(int) $levelOffset);
=======
		$query->set('rgt = ' . (int) $offset . ' - rgt');
		$query->set('lft = ' . (int) $offset . ' - lft');
		$query->set('level = level + ' . (int) $levelOffset);
>>>>>>> upstream/master
		$query->where('lft < 0');
		$this->_db->setQuery($query);

		$this->_runQuery($query, 'JLIB_DATABASE_ERROR_MOVE_FAILED');

		// Set the correct parent id for the moved node if required.
		if ($node->parent_id != $repositionData->new_parent_id)
		{
			$query = $this->_db->getQuery(true);
			$query->update($this->_tbl);

			// Update the title and alias fields if they exist for the table.
<<<<<<< HEAD
			if (property_exists($this, 'title') && $this->title !== null) {
	            $query->set('title = '.$this->_db->Quote($this->title));
			}
			if (property_exists($this, 'alias') && $this->alias !== null) {
	            $query->set('alias = '.$this->_db->Quote($this->alias));
			}

			$query->set('parent_id = '.(int) $repositionData->new_parent_id);
			$query->where($this->_tbl_key.' = '.(int) $node->$k);
=======
			if (property_exists($this, 'title') && $this->title !== null)
			{
				$query->set('title = ' . $this->_db->Quote($this->title));
			}
			if (property_exists($this, 'alias') && $this->alias !== null)
			{
				$query->set('alias = ' . $this->_db->Quote($this->alias));
			}

			$query->set('parent_id = ' . (int) $repositionData->new_parent_id);
			$query->where($this->_tbl_key . ' = ' . (int) $node->$k);
>>>>>>> upstream/master
			$this->_db->setQuery($query);

			$this->_runQuery($query, 'JLIB_DATABASE_ERROR_MOVE_FAILED');
		}

		// Unlock the table for writing.
		$this->_unlock();

		// Set the object values.
		$this->parent_id = $repositionData->new_parent_id;
		$this->level = $repositionData->new_level;
		$this->lft = $repositionData->new_lft;
		$this->rgt = $repositionData->new_rgt;

		return true;
	}

	/**
<<<<<<< HEAD
	 * Method to delete a node, and optionally its child nodes, from the table.
	 *
	 * @param   integer  The primary key of the node to delete.
	 * @param   boolean  True to delete child nodes, false to move them up a level.
	 * @return  boolean  True on success.
	 * @since   11.1
	 * @link	http://docs.joomla.org/JTableNested/delete
=======
	 * Method to delete a node and, optionally, its child nodes from the table.
	 *
	 * @param   integer  $pk        The primary key of the node to delete.
	 * @param   boolean  $children  True to delete child nodes, false to move them up a level.
	 *
	 * @return  boolean  True on success.
	 *
	 * @link    http://docs.joomla.org/JTableNested/delete
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function delete($pk = null, $children = true)
	{
		// Initialise variables.
		$k = $this->_tbl_key;
		$pk = (is_null($pk)) ? $this->$k : $pk;

		// Lock the table for writing.
<<<<<<< HEAD
		if (!$this->_lock()) {
=======
		if (!$this->_lock())
		{
>>>>>>> upstream/master
			// Error message set in lock method.
			return false;
		}

		// If tracking assets, remove the asset first.
		if ($this->_trackAssets)
		{
<<<<<<< HEAD
			$name		= $this->_getAssetName();
			$asset		= JTable::getInstance('Asset');

			// Lock the table for writing.
			if (!$asset->_lock()) {
=======
			$name = $this->_getAssetName();
			$asset = JTable::getInstance('Asset');

			// Lock the table for writing.
			if (!$asset->_lock())
			{
>>>>>>> upstream/master
				// Error message set in lock method.
				return false;
			}

<<<<<<< HEAD
			if ($asset->loadByName($name)) {
				// Delete the node in assets table.
				if (!$asset->delete(null, $children)) {
=======
			if ($asset->loadByName($name))
			{
				// Delete the node in assets table.
				if (!$asset->delete(null, $children))
				{
>>>>>>> upstream/master
					$this->setError($asset->getError());
					$asset->_unlock();
					return false;
				}
				$asset->_unlock();
			}
<<<<<<< HEAD
			else {
=======
			else
			{
>>>>>>> upstream/master
				$this->setError($asset->getError());
				$asset->_unlock();
				return false;
			}
		}

		// Get the node by id.
		if (!$node = $this->_getNode($pk))
		{
			// Error message set in getNode method.
			$this->_unlock();
			return false;
		}

		// Should we delete all children along with the node?
		if ($children)
		{
			// Delete the node and all of its children.
			$query = $this->_db->getQuery(true);
			$query->delete();
			$query->from($this->_tbl);
<<<<<<< HEAD
			$query->where('lft BETWEEN '.(int) $node->lft.' AND '.(int) $node->rgt);
=======
			$query->where('lft BETWEEN ' . (int) $node->lft . ' AND ' . (int) $node->rgt);
>>>>>>> upstream/master
			$this->_runQuery($query, 'JLIB_DATABASE_ERROR_DELETE_FAILED');

			// Compress the left values.
			$query = $this->_db->getQuery(true);
			$query->update($this->_tbl);
<<<<<<< HEAD
			$query->set('lft = lft - '.(int) $node->width);
			$query->where('lft > '.(int) $node->rgt);
=======
			$query->set('lft = lft - ' . (int) $node->width);
			$query->where('lft > ' . (int) $node->rgt);
>>>>>>> upstream/master
			$this->_runQuery($query, 'JLIB_DATABASE_ERROR_DELETE_FAILED');

			// Compress the right values.
			$query = $this->_db->getQuery(true);
			$query->update($this->_tbl);
<<<<<<< HEAD
			$query->set('rgt = rgt - '.(int) $node->width);
			$query->where('rgt > '.(int) $node->rgt);
			$this->_runQuery($query, 'JLIB_DATABASE_ERROR_DELETE_FAILED');
		}

=======
			$query->set('rgt = rgt - ' . (int) $node->width);
			$query->where('rgt > ' . (int) $node->rgt);
			$this->_runQuery($query, 'JLIB_DATABASE_ERROR_DELETE_FAILED');
		}
>>>>>>> upstream/master
		// Leave the children and move them up a level.
		else
		{
			// Delete the node.
			$query = $this->_db->getQuery(true);
			$query->delete();
			$query->from($this->_tbl);
<<<<<<< HEAD
			$query->where('lft = '.(int) $node->lft);
=======
			$query->where('lft = ' . (int) $node->lft);
>>>>>>> upstream/master
			$this->_runQuery($query, 'JLIB_DATABASE_ERROR_DELETE_FAILED');

			// Shift all node's children up a level.
			$query = $this->_db->getQuery(true);
			$query->update($this->_tbl);
			$query->set('lft = lft - 1');
			$query->set('rgt = rgt - 1');
			$query->set('level = level - 1');
<<<<<<< HEAD
			$query->where('lft BETWEEN '.(int) $node->lft.' AND '.(int) $node->rgt);
=======
			$query->where('lft BETWEEN ' . (int) $node->lft . ' AND ' . (int) $node->rgt);
>>>>>>> upstream/master
			$this->_runQuery($query, 'JLIB_DATABASE_ERROR_DELETE_FAILED');

			// Adjust all the parent values for direct children of the deleted node.
			$query = $this->_db->getQuery(true);
			$query->update($this->_tbl);
<<<<<<< HEAD
			$query->set('parent_id = '.(int) $node->parent_id);
			$query->where('parent_id = '.(int) $node->$k);
=======
			$query->set('parent_id = ' . (int) $node->parent_id);
			$query->where('parent_id = ' . (int) $node->$k);
>>>>>>> upstream/master
			$this->_runQuery($query, 'JLIB_DATABASE_ERROR_DELETE_FAILED');

			// Shift all of the left values that are right of the node.
			$query = $this->_db->getQuery(true);
			$query->update($this->_tbl);
			$query->set('lft = lft - 2');
<<<<<<< HEAD
			$query->where('lft > '.(int) $node->rgt);
=======
			$query->where('lft > ' . (int) $node->rgt);
>>>>>>> upstream/master
			$this->_runQuery($query, 'JLIB_DATABASE_ERROR_DELETE_FAILED');

			// Shift all of the right values that are right of the node.
			$query = $this->_db->getQuery(true);
			$query->update($this->_tbl);
			$query->set('rgt = rgt - 2');
<<<<<<< HEAD
			$query->where('rgt > '.(int) $node->rgt);
=======
			$query->where('rgt > ' . (int) $node->rgt);
>>>>>>> upstream/master
			$this->_runQuery($query, 'JLIB_DATABASE_ERROR_DELETE_FAILED');
		}

		// Unlock the table for writing.
		$this->_unlock();

		return true;
	}

	/**
	 * Asset that the nested set data is valid.
	 *
	 * @return  boolean  True if the instance is sane and able to be stored in the database.
<<<<<<< HEAD
	 * @since   11.1
	 * @link	http://docs.joomla.org/JTable/check
=======
	 *
	 * @link    http://docs.joomla.org/JTable/check
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function check()
	{
		$this->parent_id = (int) $this->parent_id;
		if ($this->parent_id > 0)
		{
			$query = $this->_db->getQuery(true);
<<<<<<< HEAD
			$query->select('COUNT('.$this->_tbl_key.')');
			$query->from($this->_tbl);
			$query->where($this->_tbl_key.' = '.$this->parent_id);
			$this->_db->setQuery($query);

			if ($this->_db->loadResult()) {
=======
			$query->select('COUNT(' . $this->_tbl_key . ')');
			$query->from($this->_tbl);
			$query->where($this->_tbl_key . ' = ' . $this->parent_id);
			$this->_db->setQuery($query);

			if ($this->_db->loadResult())
			{
>>>>>>> upstream/master
				return true;
			}
			else
			{
				if ($this->_db->getErrorNum())
				{
					$e = new JException(JText::sprintf('JLIB_DATABASE_ERROR_CHECK_FAILED', get_class($this), $this->_db->getErrorMsg()));
					$this->setError($e);
				}
				else
				{
					$e = new JException(JText::sprintf('JLIB_DATABASE_ERROR_INVALID_PARENT_ID', get_class($this)));
					$this->setError($e);
				}
			}
		}
		else
		{
			$e = new JException(JText::sprintf('JLIB_DATABASE_ERROR_INVALID_PARENT_ID', get_class($this)));
			$this->setError($e);
		}

		return false;
	}

	/**
	 * Method to store a node in the database table.
	 *
<<<<<<< HEAD
	 * @param   boolean  True to update null values as well.
	 * @return  boolean  True on success.
	 * @since   11.1
	 * @link	http://docs.joomla.org/JTableNested/store
=======
	 * @param   boolean  $updateNulls  True to update null values as well.
	 *
	 * @return  boolean  True on success.
	 *
	 * @link    http://docs.joomla.org/JTableNested/store
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function store($updateNulls = false)
	{
		// Initialise variables.
		$k = $this->_tbl_key;

<<<<<<< HEAD
		if ($this->_debug) {
			echo "\n".get_class($this)."::store\n";
=======
		if ($this->_debug)
		{
			echo "\n" . get_class($this) . "::store\n";
>>>>>>> upstream/master
			$this->_logtable(true, false);
		}
		/*
		 * If the primary key is empty, then we assume we are inserting a new node into the
		 * tree.  From this point we would need to determine where in the tree to insert it.
		 */
		if (empty($this->$k))
		{
			/*
			 * We are inserting a node somewhere in the tree with a known reference
			 * node.  We have to make room for the new node and set the left and right
			 * values before we insert the row.
			 */
			if ($this->_location_id >= 0)
			{
				// Lock the table for writing.
<<<<<<< HEAD
				if (!$this->_lock()) {
=======
				if (!$this->_lock())
				{
>>>>>>> upstream/master
					// Error message set in lock method.
					return false;
				}

				// We are inserting a node relative to the last root node.
				if ($this->_location_id == 0)
				{
					// Get the last root node as the reference node.
					$query = $this->_db->getQuery(true);
<<<<<<< HEAD
					$query->select($this->_tbl_key.', parent_id, level, lft, rgt');
=======
					$query->select($this->_tbl_key . ', parent_id, level, lft, rgt');
>>>>>>> upstream/master
					$query->from($this->_tbl);
					$query->where('parent_id = 0');
					$query->order('lft DESC');
					$this->_db->setQuery($query, 0, 1);
					$reference = $this->_db->loadObject();

					// Check for a database error.
					if ($this->_db->getErrorNum())
					{
						$e = new JException(JText::sprintf('JLIB_DATABASE_ERROR_STORE_FAILED', get_class($this), $this->_db->getErrorMsg()));
						$this->setError($e);
						$this->_unlock();
						return false;
					}
<<<<<<< HEAD
					if ($this->_debug) {
						$this->_logtable(false);
					}
				}

=======
					if ($this->_debug)
					{
						$this->_logtable(false);
					}
				}
>>>>>>> upstream/master
				// We have a real node set as a location reference.
				else
				{
					// Get the reference node by primary key.
					if (!$reference = $this->_getNode($this->_location_id))
					{
						// Error message set in getNode method.
						$this->_unlock();
						return false;
					}
				}

				// Get the reposition data for shifting the tree and re-inserting the node.
				if (!($repositionData = $this->_getTreeRepositionData($reference, 2, $this->_location)))
				{
					// Error message set in getNode method.
					$this->_unlock();
					return false;
				}

				// Create space in the tree at the new location for the new node in left ids.
				$query = $this->_db->getQuery(true);
				$query->update($this->_tbl);
				$query->set('lft = lft + 2');
				$query->where($repositionData->left_where);
				$this->_runQuery($query, 'JLIB_DATABASE_ERROR_STORE_FAILED');

				// Create space in the tree at the new location for the new node in right ids.
				$query = $this->_db->getQuery(true);
				$query->update($this->_tbl);
				$query->set('rgt = rgt + 2');
				$query->where($repositionData->right_where);
				$this->_runQuery($query, 'JLIB_DATABASE_ERROR_STORE_FAILED');

				// Set the object values.
<<<<<<< HEAD
				$this->parent_id	= $repositionData->new_parent_id;
				$this->level		= $repositionData->new_level;
				$this->lft			= $repositionData->new_lft;
				$this->rgt			= $repositionData->new_rgt;
=======
				$this->parent_id = $repositionData->new_parent_id;
				$this->level = $repositionData->new_level;
				$this->lft = $repositionData->new_lft;
				$this->rgt = $repositionData->new_rgt;
>>>>>>> upstream/master
			}
			else
			{
				// Negative parent ids are invalid
				$e = new JException(JText::_('JLIB_DATABASE_ERROR_INVALID_PARENT_ID'));
				$this->setError($e);
				return false;
			}
		}
<<<<<<< HEAD

=======
>>>>>>> upstream/master
		/*
		 * If we have a given primary key then we assume we are simply updating this
		 * node in the tree.  We should assess whether or not we are moving the node
		 * or just updating its data fields.
		 */
		else
		{
			// If the location has been set, move the node to its new location.
			if ($this->_location_id > 0)
			{
<<<<<<< HEAD
				if (!$this->moveByReference($this->_location_id, $this->_location, $this->$k)) {
=======
				if (!$this->moveByReference($this->_location_id, $this->_location, $this->$k))
				{
>>>>>>> upstream/master
					// Error message set in move method.
					return false;
				}
			}

			// Lock the table for writing.
<<<<<<< HEAD
			if (!$this->_lock()) {
=======
			if (!$this->_lock())
			{
>>>>>>> upstream/master
				// Error message set in lock method.
				return false;
			}
		}

		// Store the row to the database.
		if (!parent::store($updateNulls))
		{
			$this->_unlock();
			return false;
		}
<<<<<<< HEAD
		if ($this->_debug) {
=======
		if ($this->_debug)
		{
>>>>>>> upstream/master
			$this->_logtable();
		}

		// Unlock the table for writing.
		$this->_unlock();

		return true;
	}

	/**
	 * Method to set the publishing state for a node or list of nodes in the database
	 * table.  The method respects rows checked out by other users and will attempt
<<<<<<< HEAD
	 * to checkin rows that it can after adjustments are made.  The method will now
	 * allow you to set a publishing state higher than any ancestor node and will
	 * not allow you to set a publishing state on a node with a checked out child.
	 *
	 * @param   mixed    An optional array of primary key values to update.  If not
	 *					set the instance property value is used.
	 * @param   integer The publishing state. eg. [0 = unpublished, 1 = published]
	 * @param   integer The user id of the user performing the operation.
	 * @return  boolean  True on success.
	 * @since   11.1
	 * @link	http://docs.joomla.org/JTableNested/publish
=======
	 * to checkin rows that it can after adjustments are made. The method will not
	 * allow you to set a publishing state higher than any ancestor node and will
	 * not allow you to set a publishing state on a node with a checked out child.
	 *
	 * @param   mixed    $pks     An optional array of primary key values to update.  If not
	 * set the instance property value is used.
	 * @param   integer  $state   The publishing state. eg. [0 = unpublished, 1 = published]
	 * @param   integer  $userId  The user id of the user performing the operation.
	 *
	 * @return  boolean  True on success.
	 *
	 * @link    http://docs.joomla.org/JTableNested/publish
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function publish($pks = null, $state = 1, $userId = 0)
	{
		// Initialise variables.
		$k = $this->_tbl_key;

		// Sanitize input.
		JArrayHelper::toInteger($pks);
		$userId = (int) $userId;
<<<<<<< HEAD
		$state  = (int) $state;
=======
		$state = (int) $state;
>>>>>>> upstream/master
		// If $state > 1, then we allow state changes even if an ancestor has lower state
		// (for example, can change a child state to Archived (2) if an ancestor is Published (1)
		$compareState = ($state > 1) ? 1 : $state;

		// If there are no primary keys set check to see if the instance key is set.
		if (empty($pks))
		{
<<<<<<< HEAD
			if ($this->$k) {
=======
			if ($this->$k)
			{
>>>>>>> upstream/master
				$pks = explode(',', $this->$k);
			}
			// Nothing to set publishing state on, return false.
			else
			{
				$e = new JException(JText::sprintf('JLIB_DATABASE_ERROR_NO_ROWS_SELECTED', get_class($this)));
				$this->setError($e);
				return false;
			}
		}

		// Determine if there is checkout support for the table.
		$checkoutSupport = (property_exists($this, 'checked_out') || property_exists($this, 'checked_out_time'));

		// Iterate over the primary keys to execute the publish action if possible.
		foreach ($pks as $pk)
		{
			// Get the node by primary key.
<<<<<<< HEAD
			if (!$node = $this->_getNode($pk)) {
=======
			if (!$node = $this->_getNode($pk))
			{
>>>>>>> upstream/master
				// Error message set in getNode method.
				return false;
			}

			// If the table has checkout support, verify no children are checked out.
			if ($checkoutSupport)
			{
				// Ensure that children are not checked out.
				$query = $this->_db->getQuery(true);
<<<<<<< HEAD
				$query->select('COUNT('.$k.')');
				$query->from($this->_tbl);
				$query->where('lft BETWEEN '.(int) $node->lft.' AND '.(int) $node->rgt);
				$query->where('(checked_out <> 0 AND checked_out <> '.(int) $userId.')');
=======
				$query->select('COUNT(' . $k . ')');
				$query->from($this->_tbl);
				$query->where('lft BETWEEN ' . (int) $node->lft . ' AND ' . (int) $node->rgt);
				$query->where('(checked_out <> 0 AND checked_out <> ' . (int) $userId . ')');
>>>>>>> upstream/master
				$this->_db->setQuery($query);

				// Check for checked out children.
				if ($this->_db->loadResult())
				{
					$e = new JException(JText::sprintf('JLIB_DATABASE_ERROR_CHILD_ROWS_CHECKED_OUT', get_class($this)));
					$this->setError($e);
					return false;
				}
			}

			// If any parent nodes have lower published state values, we cannot continue.
<<<<<<< HEAD
			if ($node->parent_id) {
				// Get any ancestor nodes that have a lower publishing state.
				$query = $this->_db->getQuery(true)
					->select('n.'.$k)
					->from($this->_db->quoteName($this->_tbl).' AS n')
					->where('n.lft < '.(int) $node->lft)
					->where('n.rgt > '.(int) $node->rgt)
					->where('n.parent_id > 0')
					->where('n.published < '.(int) $compareState);
=======
			if ($node->parent_id)
			{
				// Get any ancestor nodes that have a lower publishing state.
				$query = $this->_db->getQuery(true)->select('n.' . $k)->from($this->_db->quoteName($this->_tbl) . ' AS n')
					->where('n.lft < ' . (int) $node->lft)->where('n.rgt > ' . (int) $node->rgt)->where('n.parent_id > 0')
					->where('n.published < ' . (int) $compareState);
>>>>>>> upstream/master

				// Just fetch one row (one is one too many).
				$this->_db->setQuery($query, 0, 1);

				$rows = $this->_db->loadColumn();

				// Check for a database error.
<<<<<<< HEAD
				if ($this->_db->getErrorNum()) {
=======
				if ($this->_db->getErrorNum())
				{
>>>>>>> upstream/master
					$e = new JException(JText::sprintf('JLIB_DATABASE_ERROR_PUBLISH_FAILED', get_class($this), $this->_db->getErrorMsg()));
					$this->setError($e);
					return false;
				}

<<<<<<< HEAD
				if (!empty($rows)) {
					$e = new JException(
						JText::_('JLIB_DATABASE_ERROR_ANCESTOR_NODES_LOWER_STATE')
					);
=======
				if (!empty($rows))
				{
					$e = new JException(JText::_('JLIB_DATABASE_ERROR_ANCESTOR_NODES_LOWER_STATE'));
>>>>>>> upstream/master
					$this->setError($e);
					return false;
				}
			}

			// Update and cascade the publishing state.
<<<<<<< HEAD
			$query = $this->_db->getQuery(true)
				->update($this->_db->quoteName($this->_tbl).' AS n')
				->set('n.published = '.(int) $state)
				->where(
					'(n.lft > '.(int) $this->lft.' AND n.rgt < '.(int) $this->rgt.')' .
					' OR n.'.$k.' = '.(int) $pk
				);
			$this->_db->setQuery($query);

			// Check for a database error.
			if (!$this->_db->query()) {
=======
			$query = $this->_db->getQuery(true)->update($this->_db->quoteName($this->_tbl) . ' AS n')->set('n.published = ' . (int) $state)
				->where('(n.lft > ' . (int) $this->lft . ' AND n.rgt < ' . (int) $this->rgt . ')' . ' OR n.' . $k . ' = ' . (int) $pk);
			$this->_db->setQuery($query);

			// Check for a database error.
			if (!$this->_db->query())
			{
>>>>>>> upstream/master
				$e = new JException(JText::sprintf('JLIB_DATABASE_ERROR_PUBLISH_FAILED', get_class($this), $this->_db->getErrorMsg()));
				$this->setError($e);
				return false;
			}

			// If checkout support exists for the object, check the row in.
<<<<<<< HEAD
			if ($checkoutSupport) {
=======
			if ($checkoutSupport)
			{
>>>>>>> upstream/master
				$this->checkin($pk);
			}
		}

		// If the JTable instance value is in the list of primary keys that were set, set the instance.
<<<<<<< HEAD
		if (in_array($this->$k, $pks)) {
=======
		if (in_array($this->$k, $pks))
		{
>>>>>>> upstream/master
			$this->published = $state;
		}

		$this->setError('');
		return true;
	}

	/**
	 * Method to move a node one position to the left in the same level.
	 *
<<<<<<< HEAD
	 * @param   integer  Primary key of the node to move.
	 * @return  boolean  True on success.
	 * @since   11.1
	 * @link	http://docs.joomla.org/JTableNested/orderUp
=======
	 * @param   integer  $pk  Primary key of the node to move.
	 *
	 * @return  boolean  True on success.
	 *
	 * @link    http://docs.joomla.org/JTableNested/orderUp
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function orderUp($pk)
	{
		// Initialise variables.
		$k = $this->_tbl_key;
		$pk = (is_null($pk)) ? $this->$k : $pk;

		// Lock the table for writing.
<<<<<<< HEAD
		if (!$this->_lock()) {
=======
		if (!$this->_lock())
		{
>>>>>>> upstream/master
			// Error message set in lock method.
			return false;
		}

		// Get the node by primary key.
		if (!$node = $this->_getNode($pk))
		{
			// Error message set in getNode method.
			$this->_unlock();
			return false;
		}

		// Get the left sibling node.
		if (!$sibling = $this->_getNode($node->lft - 1, 'right'))
		{
			// Error message set in getNode method.
			$this->_unlock();
			return false;
		}

		// Get the primary keys of child nodes.
		$query = $this->_db->getQuery(true);
		$query->select($this->_tbl_key);
		$query->from($this->_tbl);
<<<<<<< HEAD
		$query->where('lft BETWEEN '.(int) $node->lft.' AND '.(int) $node->rgt);
=======
		$query->where('lft BETWEEN ' . (int) $node->lft . ' AND ' . (int) $node->rgt);
>>>>>>> upstream/master
		$this->_db->setQuery($query);
		$children = $this->_db->loadColumn();

		// Check for a database error.
		if ($this->_db->getErrorNum())
		{
			$e = new JException(JText::sprintf('JLIB_DATABASE_ERROR_ORDERUP_FAILED', get_class($this), $this->_db->getErrorMsg()));
			$this->setError($e);
			$this->_unlock();
			return false;
		}

		// Shift left and right values for the node and it's children.
		$query = $this->_db->getQuery(true);
		$query->update($this->_tbl);
<<<<<<< HEAD
		$query->set('lft = lft - '.(int) $sibling->width);
		$query->set('rgt = rgt - '.(int) $sibling->width);
		$query->where('lft BETWEEN '.(int) $node->lft.' AND '.(int) $node->rgt);
=======
		$query->set('lft = lft - ' . (int) $sibling->width);
		$query->set('rgt = rgt - ' . (int) $sibling->width);
		$query->where('lft BETWEEN ' . (int) $node->lft . ' AND ' . (int) $node->rgt);
>>>>>>> upstream/master
		$this->_db->setQuery($query);

		// Check for a database error.
		if (!$this->_db->query())
		{
			$e = new JException(JText::sprintf('JLIB_DATABASE_ERROR_ORDERUP_FAILED', get_class($this), $this->_db->getErrorMsg()));
			$this->setError($e);
			$this->_unlock();
			return false;
		}

		// Shift left and right values for the sibling and it's children.
		$query = $this->_db->getQuery(true);
		$query->update($this->_tbl);
<<<<<<< HEAD
		$query->set('lft = lft + '.(int) $node->width);
		$query->set('rgt = rgt + '.(int) $node->width);
		$query->where('lft BETWEEN '.(int) $sibling->lft.' AND '.(int) $sibling->rgt);
		$query->where($this->_tbl_key.' NOT IN ('.implode(',', $children).')');
=======
		$query->set('lft = lft + ' . (int) $node->width);
		$query->set('rgt = rgt + ' . (int) $node->width);
		$query->where('lft BETWEEN ' . (int) $sibling->lft . ' AND ' . (int) $sibling->rgt);
		$query->where($this->_tbl_key . ' NOT IN (' . implode(',', $children) . ')');
>>>>>>> upstream/master
		$this->_db->setQuery($query);

		// Check for a database error.
		if (!$this->_db->query())
		{
			$e = new JException(JText::sprintf('JLIB_DATABASE_ERROR_ORDERUP_FAILED', get_class($this), $this->_db->getErrorMsg()));
			$this->setError($e);
			$this->_unlock();
			return false;
		}

		// Unlock the table for writing.
		$this->_unlock();

		return true;
	}

	/**
	 * Method to move a node one position to the right in the same level.
	 *
<<<<<<< HEAD
	 * @param   integer  Primary key of the node to move.
	 * @return  boolean  True on success.
	 * @since   11.1
	 * @link	http://docs.joomla.org/JTableNested/orderDown
=======
	 * @param   integer  $pk  Primary key of the node to move.
	 *
	 * @return  boolean  True on success.
	 *
	 * @link    http://docs.joomla.org/JTableNested/orderDown
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function orderDown($pk)
	{
		// Initialise variables.
		$k = $this->_tbl_key;
		$pk = (is_null($pk)) ? $this->$k : $pk;

		// Lock the table for writing.
<<<<<<< HEAD
		if (!$this->_lock()) {
=======
		if (!$this->_lock())
		{
>>>>>>> upstream/master
			// Error message set in lock method.
			return false;
		}

		// Get the node by primary key.
		if (!$node = $this->_getNode($pk))
		{
			// Error message set in getNode method.
			$this->_unlock();
			return false;
		}

		// Get the right sibling node.
		if (!$sibling = $this->_getNode($node->rgt + 1, 'left'))
		{
			// Error message set in getNode method.
			$query->unlock($this->_db);
<<<<<<< HEAD
			$this->_locked=false;
=======
			$this->_locked = false;
>>>>>>> upstream/master
			return false;
		}

		// Get the primary keys of child nodes.
		$query = $this->_db->getQuery(true);
		$query->select($this->_tbl_key);
		$query->from($this->_tbl);
<<<<<<< HEAD
		$query->where('lft BETWEEN '.(int) $node->lft.' AND '.(int) $node->rgt);
=======
		$query->where('lft BETWEEN ' . (int) $node->lft . ' AND ' . (int) $node->rgt);
>>>>>>> upstream/master
		$this->_db->setQuery($query);
		$children = $this->_db->loadColumn();

		// Check for a database error.
		if ($this->_db->getErrorNum())
		{
			$e = new JException(JText::sprintf('JLIB_DATABASE_ERROR_ORDERDOWN_FAILED', get_class($this), $this->_db->getErrorMsg()));
			$this->setError($e);
			$this->_unlock();
			return false;
		}

		// Shift left and right values for the node and it's children.
		$query = $this->_db->getQuery(true);
		$query->update($this->_tbl);
<<<<<<< HEAD
		$query->set('lft = lft + '.(int) $sibling->width);
		$query->set('rgt = rgt + '.(int) $sibling->width);
		$query->where('lft BETWEEN '.(int) $node->lft.' AND '.(int) $node->rgt);
=======
		$query->set('lft = lft + ' . (int) $sibling->width);
		$query->set('rgt = rgt + ' . (int) $sibling->width);
		$query->where('lft BETWEEN ' . (int) $node->lft . ' AND ' . (int) $node->rgt);
>>>>>>> upstream/master
		$this->_db->setQuery($query);

		// Check for a database error.
		if (!$this->_db->query())
		{
			$e = new JException(JText::sprintf('JLIB_DATABASE_ERROR_ORDERDOWN_FAILED', get_class($this), $this->_db->getErrorMsg()));
			$this->setError($e);
			$this->_unlock();
			return false;
		}

		// Shift left and right values for the sibling and it's children.
		$query = $this->_db->getQuery(true);
		$query->update($this->_tbl);
<<<<<<< HEAD
		$query->set('lft = lft - '.(int) $node->width);
		$query->set('rgt = rgt - '.(int) $node->width);
		$query->where('lft BETWEEN '.(int) $sibling->lft.' AND '.(int) $sibling->rgt);
		$query->where($this->_tbl_key.' NOT IN ('.implode(',', $children).')');
=======
		$query->set('lft = lft - ' . (int) $node->width);
		$query->set('rgt = rgt - ' . (int) $node->width);
		$query->where('lft BETWEEN ' . (int) $sibling->lft . ' AND ' . (int) $sibling->rgt);
		$query->where($this->_tbl_key . ' NOT IN (' . implode(',', $children) . ')');
>>>>>>> upstream/master
		$this->_db->setQuery($query);

		// Check for a database error.
		if (!$this->_db->query())
		{
			$e = new JException(JText::sprintf('JLIB_DATABASE_ERROR_ORDERDOWN_FAILED', get_class($this), $this->_db->getErrorMsg()));
			$this->setError($e);
			$this->_unlock();
			return false;
		}

		// Unlock the table for writing.
		$this->_unlock();

		return true;
	}

	/**
	 * Gets the ID of the root item in the tree
	 *
	 * @return  mixed    The ID of the root row, or false and the internal error is set.
<<<<<<< HEAD
=======
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function getRootId()
	{
		// Get the root item.
		$k = $this->_tbl_key;

		// Test for a unique record with parent_id = 0
		$query = $this->_db->getQuery(true);
		$query->select($k);
		$query->from($this->_tbl);
		$query->where('parent_id = 0');
		$this->_db->setQuery($query);

		$result = $this->_db->loadColumn();

		if ($this->_db->getErrorNum())
		{
			$e = new JException(JText::sprintf('JLIB_DATABASE_ERROR_GETROOTID_FAILED', get_class($this), $this->_db->getErrorMsg()));
			$this->setError($e);
			return false;
		}

<<<<<<< HEAD
		if (count($result) == 1) {
=======
		if (count($result) == 1)
		{
>>>>>>> upstream/master
			$parentId = $result[0];
		}
		else
		{
			// Test for a unique record with lft = 0
			$query = $this->_db->getQuery(true);
			$query->select($k);
			$query->from($this->_tbl);
			$query->where('lft = 0');
			$this->_db->setQuery($query);

			$result = $this->_db->loadColumn();
			if ($this->_db->getErrorNum())
			{
				$e = new JException(JText::sprintf('JLIB_DATABASE_ERROR_GETROOTID_FAILED', get_class($this), $this->_db->getErrorMsg()));
				$this->setError($e);
				return false;
			}

<<<<<<< HEAD
			if (count($result) == 1) {
=======
			if (count($result) == 1)
			{
>>>>>>> upstream/master
				$parentId = $result[0];
			}
			elseif (property_exists($this, 'alias'))
			{
				// Test for a unique record alias = root
				$query = $this->_db->getQuery(true);
				$query->select($k);
				$query->from($this->_tbl);
<<<<<<< HEAD
				$query->where('alias = '.$this->_db->quote('root'));
=======
				$query->where('alias = ' . $this->_db->quote('root'));
>>>>>>> upstream/master
				$this->_db->setQuery($query);

				$result = $this->_db->loadColumn();
				if ($this->_db->getErrorNum())
				{
					$e = new JException(JText::sprintf('JLIB_DATABASE_ERROR_GETROOTID_FAILED', get_class($this), $this->_db->getErrorMsg()));
					$this->setError($e);
					return false;
				}

<<<<<<< HEAD
				if (count($result) == 1) {
=======
				if (count($result) == 1)
				{
>>>>>>> upstream/master
					$parentId = $result[0];
				}
				else
				{
					$e = new JException(JText::_('JLIB_DATABASE_ERROR_ROOT_NODE_NOT_FOUND'));
					$this->setError($e);
					return false;
				}
			}
			else
			{
				$e = new JException(JText::_('JLIB_DATABASE_ERROR_ROOT_NODE_NOT_FOUND'));
				$this->setError($e);
				return false;
			}
		}

		return $parentId;
	}

	/**
	 * Method to recursively rebuild the whole nested set tree.
	 *
<<<<<<< HEAD
	 * @param   integer  The root of the tree to rebuild.
	 * @param   integer  The left id to start with in building the tree.
	 * @param   integer  The level to assign to the current nodes.
	 * @param   string   The path to the current nodes.
	 * @return  integer  1 + value of root rgt on success, false on failure
	 * @since   11.1
	 * @link	http://docs.joomla.org/JTableNested/rebuild
=======
	 * @param   integer  $parentId  The root of the tree to rebuild.
	 * @param   integer  $leftId    The left id to start with in building the tree.
	 * @param   integer  $level     The level to assign to the current nodes.
	 * @param   string   $path      The path to the current nodes.
	 *
	 * @return  integer  1 + value of root rgt on success, false on failure
	 *
	 * @link    http://docs.joomla.org/JTableNested/rebuild
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function rebuild($parentId = null, $leftId = 0, $level = 0, $path = '')
	{
		// If no parent is provided, try to find it.
		if ($parentId === null)
		{
			// Get the root item.
			$parentId = $this->getRootId();
<<<<<<< HEAD
			if ($parentId === false) return false;
=======
			if ($parentId === false)
			{
				return false;
			}
>>>>>>> upstream/master

		}

		// Build the structure of the recursive query.
		if (!isset($this->_cache['rebuild.sql']))
		{
<<<<<<< HEAD
			$query	= $this->_db->getQuery(true);
			$query->select($this->_tbl_key.', alias');
			$query->from($this->_tbl);
			$query->where('parent_id = %d');

			// If the table has an `ordering` field, use that for ordering.
			if (property_exists($this, 'ordering')) {
				$query->order('parent_id, ordering, lft');
			} else {
=======
			$query = $this->_db->getQuery(true);
			$query->select($this->_tbl_key . ', alias');
			$query->from($this->_tbl);
			$query->where('parent_id = %d');

			// If the table has an ordering field, use that for ordering.
			if (property_exists($this, 'ordering'))
			{
				$query->order('parent_id, ordering, lft');
			}
			else
			{
>>>>>>> upstream/master
				$query->order('parent_id, lft');
			}
			$this->_cache['rebuild.sql'] = (string) $query;
		}

		// Make a shortcut to database object.

		// Assemble the query to find all children of this node.
		$this->_db->setQuery(sprintf($this->_cache['rebuild.sql'], (int) $parentId));
		$children = $this->_db->loadObjectList();

		// The right value of this node is the left value + 1
		$rightId = $leftId + 1;

		// execute this function recursively over all children
		foreach ($children as $node)
		{
			// $rightId is the current right value, which is incremented on recursion return.
			// Increment the level for the children.
			// Add this item's alias to the path (but avoid a leading /)
<<<<<<< HEAD
			$rightId = $this->rebuild($node->{$this->_tbl_key}, $rightId, $level + 1, $path.(empty($path) ? '' : '/').$node->alias);

			// If there is an update failure, return false to break out of the recursion.
			if ($rightId === false) return false;
=======
			$rightId = $this->rebuild($node->{$this->_tbl_key}, $rightId, $level + 1, $path . (empty($path) ? '' : '/') . $node->alias);

			// If there is an update failure, return false to break out of the recursion.
			if ($rightId === false)
			{
				return false;
			}
>>>>>>> upstream/master
		}

		// We've got the left value, and now that we've processed
		// the children of this node we also know the right value.
		$query = $this->_db->getQuery(true);
		$query->update($this->_tbl);
<<<<<<< HEAD
		$query->set('lft = '. (int) $leftId);
		$query->set('rgt = '. (int) $rightId);
		$query->set('level = '.(int) $level);
		$query->set('path = '.$this->_db->quote($path));
		$query->where($this->_tbl_key.' = '. (int)$parentId);
=======
		$query->set('lft = ' . (int) $leftId);
		$query->set('rgt = ' . (int) $rightId);
		$query->set('level = ' . (int) $level);
		$query->set('path = ' . $this->_db->quote($path));
		$query->where($this->_tbl_key . ' = ' . (int) $parentId);
>>>>>>> upstream/master
		$this->_db->setQuery($query);

		// If there is an update failure, return false to break out of the recursion.
		if (!$this->_db->query())
		{
			$e = new JException(JText::sprintf('JLIB_DATABASE_ERROR_REBUILD_FAILED', get_class($this), $this->_db->getErrorMsg()));
			$this->setError($e);
			return false;
		}

		// Return the right value of this node + 1.
		return $rightId + 1;
	}

	/**
	 * Method to rebuild the node's path field from the alias values of the
	 * nodes from the current node to the root node of the tree.
	 *
<<<<<<< HEAD
	 * @param   integer  Primary key of the node for which to get the path.
	 * @return  boolean  True on success.
	 * @since   11.1
	 * @link	http://docs.joomla.org/JTableNested/rebuildPath
=======
	 * @param   integer  $pk  Primary key of the node for which to get the path.
	 *
	 * @return  boolean  True on success.
	 *
	 * @link    http://docs.joomla.org/JTableNested/rebuildPath
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function rebuildPath($pk = null)
	{
		// If there is no alias or path field, just return true.
<<<<<<< HEAD
		if (!property_exists($this, 'alias') || !property_exists($this, 'path')) {
=======
		if (!property_exists($this, 'alias') || !property_exists($this, 'path'))
		{
>>>>>>> upstream/master
			return true;
		}

		// Initialise variables.
		$k = $this->_tbl_key;
		$pk = (is_null($pk)) ? $this->$k : $pk;

		// Get the aliases for the path from the node to the root node.
		$query = $this->_db->getQuery(true);
		$query->select('p.alias');
<<<<<<< HEAD
		$query->from($this->_tbl.' AS n, '.$this->_tbl.' AS p');
		$query->where('n.lft BETWEEN p.lft AND p.rgt');
		$query->where('n.'.$this->_tbl_key.' = '. (int) $pk);
=======
		$query->from($this->_tbl . ' AS n, ' . $this->_tbl . ' AS p');
		$query->where('n.lft BETWEEN p.lft AND p.rgt');
		$query->where('n.' . $this->_tbl_key . ' = ' . (int) $pk);
>>>>>>> upstream/master
		$query->order('p.lft');
		$this->_db->setQuery($query);

		$segments = $this->_db->loadColumn();

		// Make sure to remove the root path if it exists in the list.
<<<<<<< HEAD
		if ($segments[0] == 'root') {
=======
		if ($segments[0] == 'root')
		{
>>>>>>> upstream/master
			array_shift($segments);
		}

		// Build the path.
		$path = trim(implode('/', $segments), ' /\\');

		// Update the path field for the node.
		$query = $this->_db->getQuery(true);
		$query->update($this->_tbl);
<<<<<<< HEAD
		$query->set('path = '.$this->_db->quote($path));
		$query->where($this->_tbl_key.' = '.(int) $pk);
=======
		$query->set('path = ' . $this->_db->quote($path));
		$query->where($this->_tbl_key . ' = ' . (int) $pk);
>>>>>>> upstream/master
		$this->_db->setQuery($query);

		// Check for a database error.
		if (!$this->_db->query())
		{
			$e = new JException(JText::sprintf('JLIB_DATABASE_ERROR_REBUILDPATH_FAILED', get_class($this), $this->_db->getErrorMsg()));
			$this->setError($e);
			return false;
		}

		// Update the current record's path to the new one:
		$this->path = $path;

		return true;
	}

	/**
	 * Method to update order of table rows
	 *
<<<<<<< HEAD
	 * @param   array    id's of rows to be reordered
	 * @param   array    lft values of rows to be reordered
	 *
	 * @return  integer  1 + value of root rgt on success, false on failure
=======
	 * @param   array  $idArray    id numbers of rows to be reordered.
	 * @param   array  $lft_array  lft values of rows to be reordered.
	 *
	 * @return  integer  1 + value of root rgt on success, false on failure.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function saveorder($idArray = null, $lft_array = null)
	{
		// Validate arguments
		if (is_array($idArray) && is_array($lft_array) && count($idArray) == count($lft_array))
		{
			for ($i = 0, $count = count($idArray); $i < $count; $i++)
			{
				// Do an update to change the lft values in the table for each id
				$query = $this->_db->getQuery(true);
				$query->update($this->_tbl);
				$query->where($this->_tbl_key . ' = ' . (int) $idArray[$i]);
				$query->set('lft = ' . (int) $lft_array[$i]);
				$this->_db->setQuery($query);

				// Check for a database error.
				if (!$this->_db->query())
				{
					$e = new JException(JText::sprintf('JLIB_DATABASE_ERROR_REORDER_FAILED', get_class($this), $this->_db->getErrorMsg()));
					$this->setError($e);
					$this->_unlock();
					return false;
				}

<<<<<<< HEAD
				if ($this->_debug) {
=======
				if ($this->_debug)
				{
>>>>>>> upstream/master
					$this->_logtable();
				}

			}

			return $this->rebuild();
		}
<<<<<<< HEAD
		else {
=======
		else
		{
>>>>>>> upstream/master
			return false;
		}
	}

	/**
	 * Method to get nested set properties for a node in the tree.
	 *
<<<<<<< HEAD
	 * @param   integer  Value to look up the node by.
	 * @param   string   Key to look up the node by.
	 * @return  mixed    Boolean false on failure or node object on success.
=======
	 * @param   integer  $id   Value to look up the node by.
	 * @param   string   $key  Key to look up the node by.
	 *
	 * @return  mixed    Boolean false on failure or node object on success.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function _getNode($id, $key = null)
	{
		// Determine which key to get the node base on.
		switch ($key)
		{
			case 'parent':
				$k = 'parent_id';
				break;
			case 'left':
				$k = 'lft';
				break;
			case 'right':
				$k = 'rgt';
				break;
			default:
				$k = $this->_tbl_key;
				break;
		}

		// Get the node data.
		$query = $this->_db->getQuery(true);
<<<<<<< HEAD
		$query->select($this->_tbl_key.', parent_id, level, lft, rgt');
		$query->from($this->_tbl);
		$query->where($k.' = '.(int) $id);
=======
		$query->select($this->_tbl_key . ', parent_id, level, lft, rgt');
		$query->from($this->_tbl);
		$query->where($k . ' = ' . (int) $id);
>>>>>>> upstream/master
		$this->_db->setQuery($query, 0, 1);

		$row = $this->_db->loadObject();

		// Check for a database error or no $row returned
		if ((!$row) || ($this->_db->getErrorNum()))
		{
			$e = new JException(JText::sprintf('JLIB_DATABASE_ERROR_GETNODE_FAILED', get_class($this), $this->_db->getErrorMsg()));
			$this->setError($e);
			return false;
		}

		// Do some simple calculations.
		$row->numChildren = (int) ($row->rgt - $row->lft - 1) / 2;
		$row->width = (int) $row->rgt - $row->lft + 1;

		return $row;
	}

	/**
	 * Method to get various data necessary to make room in the tree at a location
	 * for a node and its children.  The returned data object includes conditions
	 * for SQL WHERE clauses for updating left and right id values to make room for
	 * the node as well as the new left and right ids for the node.
	 *
<<<<<<< HEAD
	 * @param   object   A node object with at least a 'lft' and 'rgt' with
	 *					which to make room in the tree around for a new node.
	 * @param   integer  The width of the node for which to make room in the tree.
	 * @param   string   The position relative to the reference node where the room
	 *					should be made.
	 * @return  mixed    Boolean false on failure or data object on success.
=======
	 * @param   object   $referenceNode  A node object with at least a 'lft' and 'rgt' with
	 * which to make room in the tree around for a new node.
	 * @param   integer  $nodeWidth      The width of the node for which to make room in the tree.
	 * @param   string   $position       The position relative to the reference node where the room
	 * should be made.
	 *
	 * @return  mixed    Boolean false on failure or data object on success.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function _getTreeRepositionData($referenceNode, $nodeWidth, $position = 'before')
	{
		// Make sure the reference an object with a left and right id.
<<<<<<< HEAD
		if (!is_object($referenceNode) && isset($referenceNode->lft) && isset($referenceNode->rgt)) {
=======
		if (!is_object($referenceNode) && isset($referenceNode->lft) && isset($referenceNode->rgt))
		{
>>>>>>> upstream/master
			return false;
		}

		// A valid node cannot have a width less than 2.
<<<<<<< HEAD
		if ($nodeWidth < 2) return false;
=======
		if ($nodeWidth < 2)
		{
			return false;
		}
>>>>>>> upstream/master

		// Initialise variables.
		$k = $this->_tbl_key;
		$data = new stdClass;

		// Run the calculations and build the data object by reference position.
		switch ($position)
		{
			case 'first-child':
<<<<<<< HEAD
				$data->left_where		= 'lft > '.$referenceNode->lft;
				$data->right_where		= 'rgt >= '.$referenceNode->lft;

				$data->new_lft			= $referenceNode->lft + 1;
				$data->new_rgt			= $referenceNode->lft + $nodeWidth;
				$data->new_parent_id	= $referenceNode->$k;
				$data->new_level		= $referenceNode->level + 1;
				break;

			case 'last-child':
				$data->left_where		= 'lft > '.($referenceNode->rgt);
				$data->right_where		= 'rgt >= '.($referenceNode->rgt);

				$data->new_lft			= $referenceNode->rgt;
				$data->new_rgt			= $referenceNode->rgt + $nodeWidth - 1;
				$data->new_parent_id	= $referenceNode->$k;
				$data->new_level		= $referenceNode->level + 1;
				break;

			case 'before':
				$data->left_where		= 'lft >= '.$referenceNode->lft;
				$data->right_where		= 'rgt >= '.$referenceNode->lft;

				$data->new_lft			= $referenceNode->lft;
				$data->new_rgt			= $referenceNode->lft + $nodeWidth - 1;
				$data->new_parent_id	= $referenceNode->parent_id;
				$data->new_level		= $referenceNode->level;
=======
				$data->left_where = 'lft > ' . $referenceNode->lft;
				$data->right_where = 'rgt >= ' . $referenceNode->lft;

				$data->new_lft = $referenceNode->lft + 1;
				$data->new_rgt = $referenceNode->lft + $nodeWidth;
				$data->new_parent_id = $referenceNode->$k;
				$data->new_level = $referenceNode->level + 1;
				break;

			case 'last-child':
				$data->left_where = 'lft > ' . ($referenceNode->rgt);
				$data->right_where = 'rgt >= ' . ($referenceNode->rgt);

				$data->new_lft = $referenceNode->rgt;
				$data->new_rgt = $referenceNode->rgt + $nodeWidth - 1;
				$data->new_parent_id = $referenceNode->$k;
				$data->new_level = $referenceNode->level + 1;
				break;

			case 'before':
				$data->left_where = 'lft >= ' . $referenceNode->lft;
				$data->right_where = 'rgt >= ' . $referenceNode->lft;

				$data->new_lft = $referenceNode->lft;
				$data->new_rgt = $referenceNode->lft + $nodeWidth - 1;
				$data->new_parent_id = $referenceNode->parent_id;
				$data->new_level = $referenceNode->level;
>>>>>>> upstream/master
				break;

			default:
			case 'after':
<<<<<<< HEAD
				$data->left_where		= 'lft > '.$referenceNode->rgt;
				$data->right_where		= 'rgt > '.$referenceNode->rgt;

				$data->new_lft			= $referenceNode->rgt + 1;
				$data->new_rgt			= $referenceNode->rgt + $nodeWidth;
				$data->new_parent_id	= $referenceNode->parent_id;
				$data->new_level		= $referenceNode->level;
=======
				$data->left_where = 'lft > ' . $referenceNode->rgt;
				$data->right_where = 'rgt > ' . $referenceNode->rgt;

				$data->new_lft = $referenceNode->rgt + 1;
				$data->new_rgt = $referenceNode->rgt + $nodeWidth;
				$data->new_parent_id = $referenceNode->parent_id;
				$data->new_level = $referenceNode->level;
>>>>>>> upstream/master
				break;
		}

		if ($this->_debug)
		{
<<<<<<< HEAD
			echo "\nRepositioning Data for $position" .
					"\n-----------------------------------" .
					"\nLeft Where:    $data->left_where" .
					"\nRight Where:   $data->right_where" .
					"\nNew Lft:       $data->new_lft" .
					"\nNew Rgt:       $data->new_rgt".
					"\nNew Parent ID: $data->new_parent_id".
					"\nNew Level:     $data->new_level" .
					"\n";
=======
			echo "\nRepositioning Data for $position" . "\n-----------------------------------" . "\nLeft Where:    $data->left_where"
				. "\nRight Where:   $data->right_where" . "\nNew Lft:       $data->new_lft" . "\nNew Rgt:       $data->new_rgt"
				. "\nNew Parent ID: $data->new_parent_id" . "\nNew Level:     $data->new_level" . "\n";
>>>>>>> upstream/master
		}

		return $data;
	}

<<<<<<< HEAD
	protected function _logtable($showData = true, $showQuery = true)
	{
		$sep	= "\n".str_pad('', 40, '-');
		$buffer	= '';
		if ($showQuery) {
			$buffer .= "\n".$this->_db->getQuery().$sep;
=======
	/**
	 * Method to create a log table in the buffer optionally showing the query and/or data.
	 *
	 * @param   boolean  $showData   True to show data
	 * @param   boolean  $showQuery  True to show query
	 *
	 * @return  void
	 *
	 * @since   11.1
	 */
	protected function _logtable($showData = true, $showQuery = true)
	{
		$sep = "\n" . str_pad('', 40, '-');
		$buffer = '';
		if ($showQuery)
		{
			$buffer .= "\n" . $this->_db->getQuery() . $sep;
>>>>>>> upstream/master
		}

		if ($showData)
		{
			$query = $this->_db->getQuery(true);
<<<<<<< HEAD
			$query->select($this->_tbl_key.', parent_id, lft, rgt, level');
=======
			$query->select($this->_tbl_key . ', parent_id, lft, rgt, level');
>>>>>>> upstream/master
			$query->from($this->_tbl);
			$query->order($this->_tbl_key);
			$this->_db->setQuery($query);

			$rows = $this->_db->loadRowList();
			$buffer .= sprintf("\n| %4s | %4s | %4s | %4s |", $this->_tbl_key, 'par', 'lft', 'rgt');
			$buffer .= $sep;

<<<<<<< HEAD
			foreach ($rows as $row) {
=======
			foreach ($rows as $row)
			{
>>>>>>> upstream/master
				$buffer .= sprintf("\n| %4s | %4s | %4s | %4s |", $row[0], $row[1], $row[2], $row[3]);
			}
			$buffer .= $sep;
		}
		echo $buffer;
	}

<<<<<<< HEAD
	// Run an update query and check for a database error
=======
	/**
	 * Method to run an update query and check for a database error
	 *
	 * @param   string  $query         The query.
	 * @param   string  $errorMessage  Unused.
	 *
	 * @return  boolean  False on exception
	 *
	 * @since   11.1
	 */
>>>>>>> upstream/master
	protected function _runQuery($query, $errorMessage)
	{
		$this->_db->setQuery($query);

		// Check for a database error.
		if (!$this->_db->query())
		{
			$e = new JException(JText::sprintf('$errorMessage', get_class($this), $this->_db->getErrorMsg()));
			$this->setError($e);
			$this->_unlock();
			return false;
		}
<<<<<<< HEAD
		if ($this->_debug) {
=======
		if ($this->_debug)
		{
>>>>>>> upstream/master
			$this->_logtable();
		}
	}

}
