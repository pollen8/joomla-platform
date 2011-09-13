<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Cache
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
 * Joomla Cache output type object
 *
 * @package     Joomla.Platform
 * @subpackage  Cache
 * @since       11.1
 */
class JCacheControllerOutput extends JCacheController
{
	/**
	 * @since   11.1
	 */
	protected $_id;

	/**
	 * @since   11.1
	 */
	protected $_group;

	/**
	 * @since   11.1
	 */
	protected $_locktest = null;

	/**
	 * Start the cache
	 *
<<<<<<< HEAD
	 * @param   string   $id		The cache data id
	 * @param   string   $group	The cache data group
	 *
	 * @return  boolean  True if the cache is hit (false else)
	 * @since   11.1
	 */
	public function start($id, $group=null)
=======
	 * @param   string  $id     The cache data id
	 * @param   string  $group  The cache data group
	 *
	 * @return  boolean  True if the cache is hit (false else)
	 *
	 * @since   11.1
	 */
	public function start($id, $group = null)
>>>>>>> upstream/master
	{
		// If we have data in cache use that.
		$data = $this->cache->get($id, $group);

		$this->_locktest = new stdClass;
		$this->_locktest->locked = null;
		$this->_locktest->locklooped = null;

<<<<<<< HEAD
		if ($data === false) {
			$this->_locktest = $this->cache->lock($id, $group);
			if ($this->_locktest->locked == true && $this->_locktest->locklooped == true) {
=======
		if ($data === false)
		{
			$this->_locktest = $this->cache->lock($id, $group);
			if ($this->_locktest->locked == true && $this->_locktest->locklooped == true)
			{
>>>>>>> upstream/master
				$data = $this->cache->get($id, $group);
			}
		}

<<<<<<< HEAD
		if ($data !== false) {
			$data = unserialize(trim($data));
			echo $data;
			if ($this->_locktest->locked == true) {
				$this->cache->unlock($id, $group);
			}
			return true;
		} else {
			// Nothing in cache... let's start the output buffer and start collecting data for next time.
			if ($this->_locktest->locked == false) {
=======
		if ($data !== false)
		{
			$data = unserialize(trim($data));
			echo $data;
			if ($this->_locktest->locked == true)
			{
				$this->cache->unlock($id, $group);
			}
			return true;
		}
		else
		{
			// Nothing in cache... let's start the output buffer and start collecting data for next time.
			if ($this->_locktest->locked == false)
			{
>>>>>>> upstream/master
				$this->_locktest = $this->cache->lock($id, $group);
			}
			ob_start();
			ob_implicit_flush(false);

			// Set id and group placeholders
<<<<<<< HEAD
			$this->_id		= $id;
			$this->_group	= $group;
=======
			$this->_id = $id;
			$this->_group = $group;
>>>>>>> upstream/master

			return false;
		}
	}

	/**
	 * Stop the cache buffer and store the cached data
	 *
	 * @return  boolean  True if cache stored
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function end()
	{
		// Get data from output buffer and echo it
		$data = ob_get_contents();
		ob_end_clean();
		echo $data;

		// Get id and group and reset them placeholders
<<<<<<< HEAD
		$id		= $this->_id;
		$group	= $this->_group;
		$this->_id		= null;
		$this->_group	= null;
=======
		$id = $this->_id;
		$group = $this->_group;
		$this->_id = null;
		$this->_group = null;
>>>>>>> upstream/master

		// Get the storage handler and store the cached data
		$ret = $this->cache->store(serialize($data), $id, $group);

<<<<<<< HEAD
		if ($this->_locktest->locked == true) {
=======
		if ($this->_locktest->locked == true)
		{
>>>>>>> upstream/master
			$this->cache->unlock($id, $group);
		}

		return $ret;
	}
}
