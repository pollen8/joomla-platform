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
 * Tree Node Class.
 *
 * @package     Joomla.Platform
 * @subpackage  Base
 * @since       11.1
 */
class JNode extends JObject
{
<<<<<<< HEAD

	/**
	 * @var    object  Parent node.
=======
	/**
	 * Parent node
	 * @var    object
	 *
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $_parent = null;

	/**
<<<<<<< HEAD
	 * @var    array  Array of Children
=======
	 * Array of Children
	 *
	 * @var    array
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $_children = array();

	/**
	 * Constructor
	 *
	 * @since  11.1
	 */
	function __construct()
	{
		return true;
	}

	/**
	 * Add child to this node
	 *
	 * If the child already has a parent, the link is unset
	 *
<<<<<<< HEAD
	 * @param JNode the child to be added
	 *
	 * @return
	 * @since       11.1
=======
	 * @param   JNode  &$child  The child to be added
	 *
	 * @return  void
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	function addChild(&$child)
	{
		if ($child instanceof Jnode)
		{
			$child->setParent($this);
		}
	}

	/**
	 * Set the parent of a this node
	 *
	 * If the node already has a parent, the link is unset
	 *
<<<<<<< HEAD
	 * @param    JNode|null  The parent to be set
	 *
	 * @return
=======
	 * @param   mixed  &$parent  The JNode for parent to be set or null
	 *
	 * @return  void
	 *
>>>>>>> upstream/master
	 * @since    11.1
	 */
	function setParent(&$parent)
	{
		if ($parent instanceof JNode || is_null($parent))
		{
			$hash = spl_object_hash($this);
			if (!is_null($this->_parent))
			{
				unset($this->_parent->children[$hash]);
			}
			if (!is_null($parent))
			{
				$parent->_children[$hash] = & $this;
			}
			$this->_parent = & $parent;
		}
	}

	/**
	 * Get the children of this node
	 *
	 * @return  array    The children
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	function &getChildren()
	{
		return $this->_children;
	}

	/**
	 * Get the parent of this node
	 *
	 * @return  mixed   JNode object with the parent or null for no parent
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	function &getParent()
	{
		return $this->_parent;
	}

	/**
	 * Test if this node has children
	 *
<<<<<<< HEAD
	 * @return   bool
=======
	 * @return   boolean  True if there are chilren
	 *
>>>>>>> upstream/master
	 * @since    11.1
	 */
	function hasChildren()
	{
<<<<<<< HEAD
		return (bool)count($this->_children);
=======
		return (bool) count($this->_children);
>>>>>>> upstream/master
	}

	/**
	 * Test if this node has a parent
	 *
<<<<<<< HEAD
	 * @return  bool
=======
	 * @return  boolean  True if there is a parent
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	function hasParent()
	{
		return $this->getParent() != null;
	}
}