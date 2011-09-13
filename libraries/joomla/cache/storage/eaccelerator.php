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
 * eAccelerator cache storage handler
 *
 * @package     Joomla.Platform
 * @subpackage  Cache
<<<<<<< HEAD
=======
 * @link        http://eaccelerator.net/
>>>>>>> upstream/master
 * @since       11.1
 */
class JCacheStorageEaccelerator extends JCacheStorage
{
	/**
	 * Constructor
	 *
<<<<<<< HEAD
	 * @param   array    $options optional parameters
=======
	 * @param   array  $options  Optional parameters.
	 *
	 * @return  JCacheStorageEaccelerator
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function __construct($options = array())
	{
		parent::__construct($options);
	}

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
		$cache_content = eaccelerator_get($cache_id);
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

<<<<<<< HEAD
	 /**
	 * Get all cached data
	 *
	 * @return  array    data
=======
	/**
	 * Get all cached data
	 *
	 * @return  array    data
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function getAll()
	{
		parent::getAll();

		$keys = eaccelerator_list_keys();

		$secret = $this->_hash;
<<<<<<< HEAD
		$data 	= array();

		foreach ($keys as $key) {
			/* Trim leading ":" to work around list_keys namespace bug in eAcc. This will still work when bug is fixed */
			$name 		= ltrim($key['name'], ':');
			$namearr 	= explode('-',$name);

			if ($namearr !== false && $namearr[0]==$secret &&  $namearr[1]=='cache') {
				$group = $namearr[2];

				if (!isset($data[$group])) {
					$item = new JCacheStorageHelper($group);
				} else {
					$item = $data[$group];
				}

				$item->updateSize($key['size']/1024);
=======
		$data = array();

		foreach ($keys as $key)
		{
			/* Trim leading ":" to work around list_keys namespace bug in eAcc. This will still work when bug is fixed */
			// http://eaccelerator.net/ticket/287
			$name = ltrim($key['name'], ':');
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

				$item->updateSize($key['size'] / 1024);
>>>>>>> upstream/master

				$data[$group] = $item;
			}
		}

<<<<<<< HEAD

=======
>>>>>>> upstream/master
		return $data;
	}

	/**
	 * Store the data to by id and group
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
		return eaccelerator_put($cache_id, $data, $this->_lifetime);
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
	function remove($id, $group)
	{
		$cache_id = $this->_getCacheId($id, $group);
		return eaccelerator_rm($cache_id);
	}

	/**
	 * Clean cache for a group given a mode.
	 *
<<<<<<< HEAD
	 * group mode		: cleans all cache in the group
	 * notgroup mode	: cleans all cache not in the group
	 *
	 * @param   string   $group	The cache data group
	 * @param   string   $mode	The mode for cleaning cache [group|notgroup]
	 * @return  boolean  True on success, false otherwise
=======
	 * @param   string  $group  The cache data group
	 * @param   string  $mode   The mode for cleaning cache [group|notgroup]
	 * group mode    : cleans all cache in the group
	 * notgroup mode : cleans all cache not in the group
	 *
	 * @return  boolean  True on success, false otherwise
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function clean($group, $mode = null)
	{
		$keys = eaccelerator_list_keys();

<<<<<<< HEAD
        $secret = $this->_hash;

        if (is_array($keys)) {
        	foreach ($keys as $key) {
        		/* Trim leading ":" to work around list_keys namespace bug in eAcc. This will still work when bug is fixed */
				$key['name'] = ltrim($key['name'], ':');

        		if (strpos($key['name'], $secret.'-cache-'.$group.'-')===0 xor $mode != 'group') {
					eaccelerator_rm($key['name']);
        		}
        	}
        }
=======
		$secret = $this->_hash;

		if (is_array($keys))
		{
			foreach ($keys as $key)
			{
				/* Trim leading ":" to work around list_keys namespace bug in eAcc. This will still work when bug is fixed */
				$key['name'] = ltrim($key['name'], ':');

				if (strpos($key['name'], $secret . '-cache-' . $group . '-') === 0 xor $mode != 'group')
				{
					eaccelerator_rm($key['name']);
				}
			}
		}
>>>>>>> upstream/master
		return true;
	}

	/**
	 * Garbage collect expired cache data
	 *
<<<<<<< HEAD
	 * @return boolean  True on success, false otherwise.
=======
	 * @return  boolean  True on success, false otherwise.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function gc()
	{
		return eaccelerator_gc();
	}

	/**
	 * Test to see if the cache storage is available.
	 *
	 * @return boolean  True on success, false otherwise.
<<<<<<< HEAD
=======
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public static function test()
	{
		return (extension_loaded('eaccelerator') && function_exists('eaccelerator_get'));
	}

	/**
	 * Lock cached item
	 *
<<<<<<< HEAD
	 * @param   string   $id		The cache data id
	 * @param   string   $group	The cache data group
	 * @param   integer  $locktime Cached item max lock time
	 * @return  boolean  True on success, false otherwise.
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
	 * @return  boolean  True on success, false otherwise.
	 *
	 * @since   11.1
	 */
	public function lock($id, $group, $locktime)
	{
		$returning = new stdClass;
>>>>>>> upstream/master
		$returning->locklooped = false;

		$looptime = $locktime * 10;

		$cache_id = $this->_getCacheId($id, $group);

		$data_lock = eaccelerator_lock($cache_id);

<<<<<<< HEAD
		if ($data_lock === false) {

			$lock_counter = 0;

			// loop until you find that the lock has been released.  that implies that data get from other thread has finished
			while ($data_lock === false) {

				if ($lock_counter > $looptime) {
=======
		if ($data_lock === false)
		{

			$lock_counter = 0;

			// Loop until you find that the lock has been released.
			// That implies that data get from other thread has finished
			while ($data_lock === false)
			{

				if ($lock_counter > $looptime)
				{
>>>>>>> upstream/master
					$returning->locked = false;
					$returning->locklooped = true;
					break;
				}

				usleep(100);
				$data_lock = eaccelerator_lock($cache_id);
				$lock_counter++;
			}

		}
		$returning->locked = $data_lock;

		return $returning;
	}

	/**
	 * Unlock cached item
	 *
<<<<<<< HEAD
	 * @param   string   $id		The cache data id
	 * @param   string   $group	The cache data group
	 * @return  boolean  True on success, false otherwise.
=======
	 * @param   string  $id     The cache data id
	 * @param   string  $group  The cache data group
	 *
	 * @return  boolean  True on success, false otherwise.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function unlock($id, $group = null)
	{
		$cache_id = $this->_getCacheId($id, $group);
		return eaccelerator_unlock($cache_id);
	}
}