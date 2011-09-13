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
 * XCache cache storage handler
 *
 * @package     Joomla.Platform
 * @subpackage  Cache
<<<<<<< HEAD
=======
 * @link        http://xcache.lighttpd.net/
>>>>>>> upstream/master
 * @since       11.1
 */
class JCacheStorageXcache extends JCacheStorage
{
	/**
	 * Get cached data by id and group
	 *
<<<<<<< HEAD
	 * @param   string   $id			The cache data id
	 * @param   string   $group		The cache data group
	 * @param   boolean  $checkTime	True to verify cache time expiration threshold
	 * @return  mixed    Boolean false on failure or a cached data string
=======
	 * @param   string   $id         The cache data id
	 * @param   string   $group      The cache data group
	 * @param   boolean  $checkTime  True to verify cache time expiration threshold
	 *
	 * @return  mixed  Boolean false on failure or a cached data string
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function get($id, $group, $checkTime = true)
	{
		$cache_id = $this->_getCacheId($id, $group);
		$cache_content = xcache_get($cache_id);

<<<<<<< HEAD
		if ($cache_content === null) {
=======
		if ($cache_content === null)
		{
>>>>>>> upstream/master
			return false;
		}

		return $cache_content;
	}

	/**
	 * Get all cached data
	 *
<<<<<<< HEAD
	 *  requires the php.ini setting xcache.admin.enable_auth = Off
	 *
	 * @return  array    data
=======
	 * This requires the php.ini setting xcache.admin.enable_auth = Off.
	 *
	 * @return  array  data
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function getAll()
	{
		parent::getAll();

<<<<<<< HEAD
		$allinfo 	= xcache_list(XC_TYPE_VAR, 0);
		$keys 		= $allinfo['cache_list'];
		$secret 	= $this->_hash;

		$data = array();

		foreach ($keys as $key) {

			$namearr = explode('-',$key['name']);

			if ($namearr !== false && $namearr[0]==$secret &&  $namearr[1]=='cache') {
				$group = $namearr[2];

				if (!isset($data[$group])) {
					$item = new JCacheStorageHelper($group);
				} else {
					$item = $data[$group];
				}

				$item->updateSize($key['size']/1024);
=======
		$allinfo = xcache_list(XC_TYPE_VAR, 0);
		$keys = $allinfo['cache_list'];
		$secret = $this->_hash;

		$data = array();

		foreach ($keys as $key)
		{

			$namearr = explode('-', $key['name']);

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

				$item->updateSize($key['size'] / 1024);
>>>>>>> upstream/master

				$data[$group] = $item;
			}
		}

		return $data;
	}

	/**
	 * Store the data by id and group
	 *
<<<<<<< HEAD
	 * @param   string   $id		The cache data id
	 * @param   string   $group	The cache data group
	 * @param   string   $data	The data to store in cache
	 * @return  boolean  True on success, false otherwise
=======
	 * @param   string  $id     The cache data id
	 * @param   string  $group  The cache data group
	 * @param   string  $data   The data to store in cache
	 *
	 * @return  boolean  True on success, false otherwise
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function store($id, $group, $data)
	{
		$cache_id = $this->_getCacheId($id, $group);
		$store = xcache_set($cache_id, $data, $this->_lifetime);
		return $store;
	}

	/**
	 * Remove a cached data entry by id and group
	 *
<<<<<<< HEAD
	 * @param   string   $id		The cache data id
	 * @param   string   $group	The cache data group
	 * @return  boolean  True on success, false otherwise
=======
	 * @param   string  $id     The cache data id
	 * @param   string  $group  The cache data group
	 *
	 * @return  boolean  True on success, false otherwise
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function remove($id, $group)
	{
		$cache_id = $this->_getCacheId($id, $group);

<<<<<<< HEAD
		if (!xcache_isset($cache_id)){
=======
		if (!xcache_isset($cache_id))
		{
>>>>>>> upstream/master
			return true;
		}

		return xcache_unset($cache_id);
	}

	/**
	 * Clean cache for a group given a mode.
	 *
<<<<<<< HEAD
	 * requires the php.ini setting xcache.admin.enable_auth = Off
	 *
	 * group mode		: cleans all cache in the group
	 * notgroup mode	: cleans all cache not in the group
	 *
	 * @param   string   $group	The cache data group
	 * @param   string   $mode	The mode for cleaning cache [group|notgroup]
	 * @return  boolean  True on success, false otherwise
=======
	 * This requires the php.ini setting xcache.admin.enable_auth = Off.
	 *
	 * @param   string  $group  The cache data group
	 * @param   string  $mode   The mode for cleaning cache [group|notgroup]
	 * group mode  : cleans all cache in the group
	 * notgroup mode  : cleans all cache not in the group
	 *
	 * @return  boolean  True on success, false otherwise
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function clean($group, $mode = null)
	{
		$allinfo = xcache_list(XC_TYPE_VAR, 0);
		$keys = $allinfo['cache_list'];

		$secret = $this->_hash;
<<<<<<< HEAD
		foreach ($keys as $key) {

		if (strpos($key['name'], $secret.'-cache-'.$group.'-')===0 xor $mode != 'group')
			xcache_unset($key['name']);
=======
		foreach ($keys as $key)
		{
			if (strpos($key['name'], $secret . '-cache-' . $group . '-') === 0 xor $mode != 'group')
			{
				xcache_unset($key['name']);
			}
>>>>>>> upstream/master
		}
		return true;
	}

	/**
	 * Garbage collect expired cache data
	 *
<<<<<<< HEAD
	 * @return boolean  True on success, false otherwise.
=======
	 * This is a dummy, since xcache has built in garbage collector, turn it
	 * on in php.ini by changing default xcache.gc_interval setting from
	 * 0 to 3600 (=1 hour)
	 *
	 * @return  boolean  True on success, false otherwise.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function gc()
	{
<<<<<<< HEAD
		// dummy, xcache has builtin garbage collector, turn it on in php.ini by changing default xcache.gc_interval setting from 0 to 3600 (=1 hour)

		/**
=======
		/*
>>>>>>> upstream/master
		$now = time();

		$cachecount = xcache_count(XC_TYPE_VAR);

			for ($i = 0; $i < $cachecount; $i ++) {

				$allinfo  = xcache_list(XC_TYPE_VAR, $i);
				$keys = $allinfo ['cache_list'];

				foreach($keys as $key) {

					if (strstr($key['name'], $this->_hash)) {
						if (($key['ctime'] + $this->_lifetime ) < $this->_now) xcache_unset($key['name']);
					}
				}
			}

		 */

		return true;
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
		return (extension_loaded('xcache'));
	}
}