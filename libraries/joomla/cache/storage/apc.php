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
 * APC cache storage handler
 *
 * @package     Joomla.Platform
 * @subpackage  Cache
<<<<<<< HEAD
=======
 * @see         http://php.net/manual/en/book.apc.php
>>>>>>> upstream/master
 * @since       11.1
 */
class JCacheStorageApc extends JCacheStorage
{
	/**
	 * Get cached data from APC by id and group
	 *
<<<<<<< HEAD
	 * @param   string   $id			The cache data id
	 * @param   string   $group		The cache data group
	 * @param   boolean  $checkTime	True to verify cache time expiration threshold
	 *
	 * @return  mixed    Boolean false on failure or a cached data string
=======
	 * @param   string   $id         The cache data id
	 * @param   string   $group      The cache data group
	 * @param   boolean  $checkTime  True to verify cache time expiration threshold
	 *
	 * @return  mixed    Boolean     False on failure or a cached data string
>>>>>>> upstream/master
	 *
	 * @since   11.1
	 */
	public function get($id, $group, $checkTime = true)
	{
		$cache_id = $this->_getCacheId($id, $group);
		return apc_fetch($cache_id);
	}

	/**
	 * Get all cached data
	 *
	 * @return  array  data
	 *
	 * @since   11.1
	 */
	public function getAll()
	{
		parent::getAll();

<<<<<<< HEAD
		$allinfo 	= apc_cache_info('user');
		$keys 		= $allinfo['cache_list'];
		$secret 	= $this->_hash;

		$data = array();

		foreach ($keys as $key) {

			$name 		= $key['info'];
			$namearr 	= explode('-', $name);

			if ($namearr !== false && $namearr[0] == $secret &&  $namearr[1] == 'cache') {
				$group = $namearr[2];

				if (!isset($data[$group])) {
					$item = new JCacheStorageHelper($group);
				} else {
					$item = $data[$group];
				}

				$item->updateSize($key['mem_size']/1024);
=======
		$allinfo = apc_cache_info('user');
		$keys = $allinfo['cache_list'];
		$secret = $this->_hash;

		$data = array();

		foreach ($keys as $key)
		{

			$name = $key['info'];
			$namearr = explode('-', $name);

			if ($namearr !== false && $namearr[0] == $secret && $namearr[1] == 'cache')
			{
				$group = $namearr[2];

				if (!isset($data[$group]))
				{
					$item = new JCacheStorageHelper($group);
				}
				else
				{
					$item = $data[$group];
				}

				$item->updateSize($key['mem_size'] / 1024);
>>>>>>> upstream/master

				$data[$group] = $item;
			}
		}

		return $data;
	}

	/**
	 * Store the data to APC by id and group
	 *
<<<<<<< HEAD
	 * @param   string  $id		The cache data id
	 * @param   string  $group	The cache data group
	 * @param   string  $data	The data to store in cache
=======
	 * @param   string  $id     The cache data id
	 * @param   string  $group  The cache data group
	 * @param   string  $data   The data to store in cache
>>>>>>> upstream/master
	 *
	 * @return  boolean  True on success, false otherwise
	 *
	 * @since   11.1
	 */
	public function store($id, $group, $data)
	{
		$cache_id = $this->_getCacheId($id, $group);
		return apc_store($cache_id, $data, $this->_lifetime);
	}

	/**
	 * Remove a cached data entry by id and group
	 *
<<<<<<< HEAD
	 * @param   string  $id		The cache data id
	 * @param   string  $group	The cache data group
=======
	 * @param   string  $id     The cache data id
	 * @param   string  $group  The cache data group
>>>>>>> upstream/master
	 *
	 * @return  boolean  True on success, false otherwise
	 *
	 * @since   11.1
	 */
	public function remove($id, $group)
	{
		$cache_id = $this->_getCacheId($id, $group);
		return apc_delete($cache_id);
	}

	/**
	 * Clean cache for a group given a mode.
	 *
<<<<<<< HEAD
	 * group mode		: cleans all cache in the group
	 * notgroup mode	: cleans all cache not in the group
	 *
	 * @param   string  $group	The cache data group
	 * @param   string  $mode	The mode for cleaning cache [group|notgroup]
=======
	 * group mode    : cleans all cache in the group
	 * notgroup mode : cleans all cache not in the group
	 *
	 * @param   string  $group  The cache data group
	 * @param   string  $mode   The mode for cleaning cache [group|notgroup]
>>>>>>> upstream/master
	 *
	 * @return  boolean  True on success, false otherwise
	 *
	 * @since   11.1
	 */
	public function clean($group, $mode = null)
	{
<<<<<<< HEAD
		$allinfo 	= apc_cache_info('user');
		$keys 		= $allinfo['cache_list'];
		$secret 	= $this->_hash;

		foreach ($keys as $key) {

			if (strpos($key['info'], $secret.'-cache-'.$group.'-') === 0 xor $mode != 'group') {
=======
		$allinfo = apc_cache_info('user');
		$keys = $allinfo['cache_list'];
		$secret = $this->_hash;

		foreach ($keys as $key)
		{

			if (strpos($key['info'], $secret . '-cache-' . $group . '-') === 0 xor $mode != 'group')
			{
>>>>>>> upstream/master
				apc_delete($key['info']);
			}
		}
		return true;
	}

	/**
	 * Force garbage collect expired cache data as items are removed only on fetch!
	 *
	 * @return  boolean  True on success, false otherwise.
	 *
	 * @since   11.1
	 */
	public function gc()
	{
<<<<<<< HEAD
		$lifetime 	= $this->_lifetime;
		$allinfo 	= apc_cache_info('user');
		$keys 		= $allinfo['cache_list'];
		$secret 	= $this->_hash;

		foreach ($keys as $key) {
			if (strpos($key['info'], $secret.'-cache-')) {
=======
		$lifetime = $this->_lifetime;
		$allinfo = apc_cache_info('user');
		$keys = $allinfo['cache_list'];
		$secret = $this->_hash;

		foreach ($keys as $key)
		{
			if (strpos($key['info'], $secret . '-cache-'))
			{
>>>>>>> upstream/master
				apc_fetch($key['info']);
			}
		}
	}

	/**
	 * Test to see if the cache storage is available.
	 *
<<<<<<< HEAD
	 * @return boolean  True on success, false otherwise.
=======
	 * @return  boolean  True on success, false otherwise.
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public static function test()
	{
		return extension_loaded('apc');
	}

	/**
	 * Lock cached item - override parent as this is more efficient
	 *
<<<<<<< HEAD
	 * @param   string   $id		The cache data id
	 * @param   string   $group	The cache data group
	 * @param   integer  $locktime Cached item max lock time
	 *
	 * @return  boolean  True on success, false otherwise.
	 *
	 * @since   11.1
	 */
	public function lock($id,$group,$locktime)
	{
		$returning = new stdClass();
=======
	 * @param   string   $id        The cache data id
	 * @param   string   $group     The cache data group
	 * @param   integer  $locktime  Cached item max lock time
	 *
	 * @return  object   Properties are lock and locklooped
	 *
	 * @since   11.1
	 */
	public function lock($id, $group, $locktime)
	{
		$returning = new stdClass;
>>>>>>> upstream/master
		$returning->locklooped = false;

		$looptime = $locktime * 10;

<<<<<<< HEAD
		$cache_id = $this->_getCacheId($id, $group).'_lock';

		$data_lock = apc_add( $cache_id, 1, $locktime );

		if ( $data_lock === FALSE ) {
=======
		$cache_id = $this->_getCacheId($id, $group) . '_lock';

		$data_lock = apc_add($cache_id, 1, $locktime);

		if ($data_lock === false)
		{
>>>>>>> upstream/master

			$lock_counter = 0;

			// loop until you find that the lock has been released.  that implies that data get from other thread has finished
<<<<<<< HEAD
			while ( $data_lock === FALSE ) {

				if ( $lock_counter > $looptime ) {
					$returning->locked 		= false;
					$returning->locklooped 	= true;
=======
			while ($data_lock === false)
			{

				if ($lock_counter > $looptime)
				{
					$returning->locked = false;
					$returning->locklooped = true;
>>>>>>> upstream/master
					break;
				}

				usleep(100);
<<<<<<< HEAD
				$data_lock = apc_add( $cache_id, 1, $locktime );
=======
				$data_lock = apc_add($cache_id, 1, $locktime);
>>>>>>> upstream/master
				$lock_counter++;
			}

		}
		$returning->locked = $data_lock;

		return $returning;
	}

	/**
	 * Unlock cached item - override parent for cacheid compatibility with lock
	 *
<<<<<<< HEAD
	 * @param   string   $id		The cache data id
	 * @param   string   $group	The cache data group
	 * @param   integer  $locktime Cached item max lock time
=======
	 * @param   string  $id     The cache data id
	 * @param   string  $group  The cache data group
>>>>>>> upstream/master
	 *
	 * @return  boolean  True on success, false otherwise.
	 *
	 * @since   11.1
	 */
<<<<<<< HEAD
	public function unlock($id,$group=null)
	{
		$unlock = false;

		$cache_id = $this->_getCacheId($id, $group).'_lock';
=======
	public function unlock($id, $group = null)
	{
		$unlock = false;

		$cache_id = $this->_getCacheId($id, $group) . '_lock';
>>>>>>> upstream/master

		$unlock = apc_delete($cache_id);
		return $unlock;
	}
}