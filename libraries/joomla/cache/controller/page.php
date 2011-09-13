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
 * Joomla! Cache page type object
 *
 * @package     Joomla.Platform
 * @subpackage  Cache
 * @since       11.1
 */
class JCacheControllerPage extends JCacheController
{
	/**
<<<<<<< HEAD
	 * ID property for the cache page object.
	 *
	 * @var    integer
=======
	 * @var    integer  ID property for the cache page object.
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $_id;

	/**
<<<<<<< HEAD
	 * Cache group
	 *
	 * @var    string
=======
	 * @var    string  Cache group
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $_group;

	/**
<<<<<<< HEAD
	 * Cache lock test
	 *
	 * @var    object
=======
	 * @var    object  Cache lock test
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $_locktest = null;

	/**
	 * Get the cached page data
	 *
<<<<<<< HEAD
	 * @param   string  $id     The cache data id
	 * @param   string  $group  The cache data group
=======
	 * @param   string   $id          The cache data id
	 * @param   string   $group       The cache data group
	 * @param   boolean  $wrkarounds  True to use wrkarounds
>>>>>>> upstream/master
	 *
	 * @return  boolean  True if the cache is hit (false else)
	 *
	 * @since   11.1
	 */
<<<<<<< HEAD
	public function get($id=false, $group='page', $wrkarounds=true)
=======
	public function get($id = false, $group = 'page', $wrkarounds = true)
>>>>>>> upstream/master
	{
		// Initialise variables.
		$data = false;

<<<<<<< HEAD
		// If an id is not given generate it from the request
		if ($id == false) {
=======
		// If an id is not given, generate it from the request
		if ($id == false)
		{
>>>>>>> upstream/master
			$id = $this->_makeId();
		}

		// If the etag matches the page id ... set a no change header and exit : utilize browser cache
<<<<<<< HEAD
		if (!headers_sent() && isset($_SERVER['HTTP_IF_NONE_MATCH'])){
			$etag = stripslashes($_SERVER['HTTP_IF_NONE_MATCH']);
			if ($etag == $id) {
				$browserCache = isset($this->options['browsercache']) ? $this->options['browsercache'] : false;
				if ($browserCache) {
=======
		if (!headers_sent() && isset($_SERVER['HTTP_IF_NONE_MATCH']))
		{
			$etag = stripslashes($_SERVER['HTTP_IF_NONE_MATCH']);
			if ($etag == $id)
			{
				$browserCache = isset($this->options['browsercache']) ? $this->options['browsercache'] : false;
				if ($browserCache)
				{
>>>>>>> upstream/master
					$this->_noChange();
				}
			}
		}

		// We got a cache hit... set the etag header and echo the page data
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
			if ($wrkarounds === true) {
=======
		if ($data !== false)
		{
			$data = unserialize(trim($data));
			if ($wrkarounds === true)
			{
>>>>>>> upstream/master
				$data = JCache::getWorkarounds($data);
			}

			$this->_setEtag($id);
<<<<<<< HEAD
			if ($this->_locktest->locked == true) {
=======
			if ($this->_locktest->locked == true)
			{
>>>>>>> upstream/master
				$this->cache->unlock($id, $group);
			}
			return $data;
		}

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

	/**
	 * Stop the cache buffer and store the cached data
	 *
<<<<<<< HEAD
=======
	 * @param   boolean  $wrkarounds  True to use wrkarounds
	 *
>>>>>>> upstream/master
	 * @return  boolean  True if cache stored
	 *
	 * @since   11.1
	 */
<<<<<<< HEAD
	public function store($wrkarounds=true)
=======
	public function store($wrkarounds = true)
>>>>>>> upstream/master
	{
		// Get page data from JResponse body
		$data = JResponse::getBody();

		// Get id and group and reset the placeholders
<<<<<<< HEAD
		$id		= $this->_id;
		$group	= $this->_group;
		$this->_id		= null;
		$this->_group	= null;

		// Only attempt to store if page data exists
		if ($data) {
			$data = $wrkarounds==false ? $data : JCache::setWorkarounds($data);

			if ($this->_locktest->locked == false) {
=======
		$id = $this->_id;
		$group = $this->_group;
		$this->_id = null;
		$this->_group = null;

		// Only attempt to store if page data exists
		if ($data)
		{
			$data = $wrkarounds == false ? $data : JCache::setWorkarounds($data);

			if ($this->_locktest->locked == false)
			{
>>>>>>> upstream/master
				$this->_locktest = $this->cache->lock($id, $group);
			}

			$sucess = $this->cache->store(serialize($data), $id, $group);

<<<<<<< HEAD
			if ($this->_locktest->locked == true) {
=======
			if ($this->_locktest->locked == true)
			{
>>>>>>> upstream/master
				$this->cache->unlock($id, $group);
			}

			return $sucess;
		}
		return false;
	}

	/**
	 * Generate a page cache id
	 *
<<<<<<< HEAD
	 * @todo	TODO: Discuss whether this should be coupled to a data hash or a request
	 * 			hash ... perhaps hashed with a serialized request
	 *
	 * @return  string   MD5 Hash : page cache id
	 *
	 * @since   11.1
=======
	 * @return  string  MD5 Hash : page cache id
	 *
	 * @since   11.1
	 * @todo    Discuss whether this should be coupled to a data hash or a request
	 * hash ... perhaps hashed with a serialized request
>>>>>>> upstream/master
	 */
	protected function _makeId()
	{
		//return md5(JRequest::getURI());
		return JCache::makeId();
	}

	/**
<<<<<<< HEAD
	 * There is no change in page data so send a not modified header and die gracefully
=======
	 * There is no change in page data so send an
	 * unmodified header and die gracefully
>>>>>>> upstream/master
	 *
	 * @return  void
	 *
	 * @since   11.1
	 */
	protected function _noChange()
	{
		$app = JFactory::getApplication();

		// Send not modified header and exit gracefully
		header('HTTP/1.x 304 Not Modified', true);
		$app->close();
	}

	/**
	 * Set the ETag header in the response
	 *
<<<<<<< HEAD
	 * @return  void
	 *
	 * @since	11.1
=======
	 * @param   string  $etag  The entity tag (etag) to set
	 *
	 * @return  void
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	protected function _setEtag($etag)
	{
		JResponse::setHeader('ETag', $etag, true);
	}
}