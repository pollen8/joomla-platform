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
 * Memcache cache storage handler
 *
 * @package     Joomla.Platform
 * @subpackage  Cache
<<<<<<< HEAD
=======
 * @see         http://php.net/manual/en/book.memcache.php
>>>>>>> upstream/master
 * @since       11.1
 */
class JCacheStorageMemcache extends JCacheStorage
{
	/**
<<<<<<< HEAD
	 * @since   11.1
=======
	 * @var    Memcache
	 * @since  11.1
>>>>>>> upstream/master
	 */
	protected static $_db = null;

	/**
<<<<<<< HEAD
	 * @since   11.1
=======
	 * @var    boolean
	 * @since  11.1
>>>>>>> upstream/master
	 */
	protected $_persistent = false;

	/**
<<<<<<< HEAD
=======
	 * @var
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected $_compress = 0;

	/**
	 * Constructor
	 *
<<<<<<< HEAD
	 * @param   array    $options optional parameters
=======
	 * @param   array  $options  Optional parameters.
	 *
	 * @return  JCacheStorageMemcache
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function __construct($options = array())
	{
		parent::__construct($options);
<<<<<<< HEAD
		if (self::$_db === null) {
=======
		if (self::$_db === null)
		{
>>>>>>> upstream/master
			$this->getConnection();
		}
	}

	/**
<<<<<<< HEAD
	 * return memcache connection object
	 *
	 * @return  object   memcache connection object
=======
	 * Return memcache connection object
	 *
	 * @return  object   memcache connection object
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function getConnection()
	{
<<<<<<< HEAD
		if ((extension_loaded('memcache') && class_exists('Memcache')) != true ) {
=======
		if ((extension_loaded('memcache') && class_exists('Memcache')) != true)
		{
>>>>>>> upstream/master
			return false;
		}

		$config = JFactory::getConfig();
<<<<<<< HEAD
		$this->_persistent	= $config->get('memcache_persist', true);
=======
		$this->_persistent = $config->get('memcache_persist', true);
>>>>>>> upstream/master
		$this->_compress = $config->get('memcache_compress', false) == false ? 0 : MEMCACHE_COMPRESSED;

		// This will be an array of loveliness
		// @todo: multiple servers
		//$servers	= (isset($params['servers'])) ? $params['servers'] : array();
<<<<<<< HEAD
		$server=array();
=======
		$server = array();
>>>>>>> upstream/master
		$server['host'] = $config->get('memcache_server_host', 'localhost');
		$server['port'] = $config->get('memcache_server_port', 11211);
		// Create the memcache connection
		self::$_db = new Memcache;
		self::$_db->addServer($server['host'], $server['port'], $this->_persistent);

		$memcachetest = @self::$_db->connect($server['host'], $server['port']);
<<<<<<< HEAD
		if ($memcachetest == false) {
			return JError::raiseError(404, "Could not connect to memcache server");
		}

		// memcahed has no list keys, we do our own accounting, initalise key index
		if (self::$_db->get($this->_hash.'-index') === false) {
			$empty = array();
			self::$_db->set($this->_hash.'-index', $empty , $this->_compress, 0);
=======
		if ($memcachetest == false)
		{
			return JError::raiseError(404, "Could not connect to memcache server");
		}

		// Memcahed has no list keys, we do our own accounting, initalise key index
		if (self::$_db->get($this->_hash . '-index') === false)
		{
			$empty = array();
			self::$_db->set($this->_hash . '-index', $empty, $this->_compress, 0);
>>>>>>> upstream/master
		}

		return;
	}

	/**
	 * Get cached data from memcache by id and group
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
		$back = self::$_db->get($cache_id);
		return $back;
	}

	/**
	 * Get all cached data
	 *
	 * @return  array    data
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function getAll()
	{
		parent::getAll();

<<<<<<< HEAD
		$keys = self::$_db->get($this->_hash.'-index');
=======
		$keys = self::$_db->get($this->_hash . '-index');
>>>>>>> upstream/master
		$secret = $this->_hash;

		$data = array();

<<<<<<< HEAD
		if (!empty($keys)){
			foreach ($keys as $key) {
				if (empty($key)) {
					continue;
				}
				$namearr=explode('-',$key->name);

				if ($namearr !== false && $namearr[0]==$secret &&  $namearr[1]=='cache') {

					$group = $namearr[2];

					if (!isset($data[$group])) {
						$item = new JCacheStorageHelper($group);
					} else {
						$item = $data[$group];
					}

					$item->updateSize($key->size/1024);
=======
		if (!empty($keys))
		{
			foreach ($keys as $key)
			{
				if (empty($key))
				{
					continue;
				}
				$namearr = explode('-', $key->name);

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

					$item->updateSize($key->size / 1024);
>>>>>>> upstream/master

					$data[$group] = $item;
				}
			}
		}

		return $data;
	}

	/**
	 * Store the data to memcache by id and group
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

<<<<<<< HEAD
		if (!$this->lockindex()) {
			return false;
		}

		$index = self::$_db->get($this->_hash.'-index');
		if ($index === false) {
=======
		if (!$this->lockindex())
		{
			return false;
		}

		$index = self::$_db->get($this->_hash . '-index');
		if ($index === false)
		{
>>>>>>> upstream/master
			$index = array();
		}

		$tmparr = new stdClass;
		$tmparr->name = $cache_id;
		$tmparr->size = strlen($data);
		$index[] = $tmparr;
<<<<<<< HEAD
		self::$_db->replace($this->_hash.'-index', $index , 0, 0);
		$this->unlockindex();

		// prevent double writes, write only if it doesn't exist else replace
		if (!self::$_db->replace($cache_id, $data, $this->_compress, $this->_lifetime)) {
=======
		self::$_db->replace($this->_hash . '-index', $index, 0, 0);
		$this->unlockindex();

		// prevent double writes, write only if it doesn't exist else replace
		if (!self::$_db->replace($cache_id, $data, $this->_compress, $this->_lifetime))
		{
>>>>>>> upstream/master
			self::$_db->set($cache_id, $data, $this->_compress, $this->_lifetime);
		}

		return true;
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
		if (!$this->lockindex()) {
			return false;
		}

		$index = self::$_db->get($this->_hash.'-index');
		if ($index === false) {
			$index = array();
		}

		foreach ($index as $key => $value) {
			if ($value->name == $cache_id) unset ($index[$key]);
			break;
		}
		self::$_db->replace($this->_hash.'-index', $index, 0, 0);
=======
		if (!$this->lockindex())
		{
			return false;
		}

		$index = self::$_db->get($this->_hash . '-index');
		if ($index === false)
		{
			$index = array();
		}

		foreach ($index as $key => $value)
		{
			if ($value->name == $cache_id)
			{
				unset($index[$key]);
			}
			break;
		}
		self::$_db->replace($this->_hash . '-index', $index, 0, 0);
>>>>>>> upstream/master
		$this->unlockindex();

		return self::$_db->delete($cache_id);
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
<<<<<<< HEAD
		if (!$this->lockindex()) {
			return false;
		}

		$index = self::$_db->get($this->_hash.'-index');
		if ($index === false) {
=======
		if (!$this->lockindex())
		{
			return false;
		}

		$index = self::$_db->get($this->_hash . '-index');
		if ($index === false)
		{
>>>>>>> upstream/master
			$index = array();
		}

		$secret = $this->_hash;
<<<<<<< HEAD
		foreach ($index as $key=>$value) {

			if (strpos($value->name, $secret.'-cache-'.$group.'-')===0 xor $mode != 'group') {
				self::$_db->delete($value->name,0);
				unset ($index[$key]);
			}
		}
		self::$_db->replace($this->_hash.'-index', $index , 0, 0);
=======
		foreach ($index as $key => $value)
		{

			if (strpos($value->name, $secret . '-cache-' . $group . '-') === 0 xor $mode != 'group')
			{
				self::$_db->delete($value->name, 0);
				unset($index[$key]);
			}
		}
		self::$_db->replace($this->_hash . '-index', $index, 0, 0);
>>>>>>> upstream/master
		$this->unlockindex();
		return true;
	}

	/**
	 * Test to see if the cache storage is available.
	 *
	 * @return  boolean  True on success, false otherwise.
	 */
	public static function test()
	{
<<<<<<< HEAD
		if ((extension_loaded('memcache') && class_exists('Memcache')) != true ) {
=======
		if ((extension_loaded('memcache') && class_exists('Memcache')) != true)
		{
>>>>>>> upstream/master
			return false;
		}

		$config = JFactory::getConfig();
		$host = $config->get('memcache_server_host', 'localhost');
		$port = $config->get('memcache_server_port', 11211);

		$memcache = new Memcache;
		$memcachetest = @$memcache->connect($host, $port);

<<<<<<< HEAD
		 if (!$memcachetest) {
		 	return false;
		 } else {
		 	return true;
		 }
=======
		if (!$memcachetest)
		{
			return false;
		}
		else
		{
			return true;
		}
>>>>>>> upstream/master
	}

	/**
	 * Lock cached item - override parent as this is more efficient
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

<<<<<<< HEAD
		if (!$this->lockindex()) {
			return false;
		}

		$index = self::$_db->get($this->_hash.'-index');
		if ($index === false) {
=======
		if (!$this->lockindex())
		{
			return false;
		}

		$index = self::$_db->get($this->_hash . '-index');
		if ($index === false)
		{
>>>>>>> upstream/master
			$index = array();
		}

		$tmparr = new stdClass;
		$tmparr->name = $cache_id;
		$tmparr->size = 1;
		$index[] = $tmparr;
<<<<<<< HEAD
		self::$_db->replace($this->_hash.'-index', $index , 0, 0);
		$this->unlockindex();

		$data_lock = self::$_db->add($cache_id.'_lock', 1, false, $locktime);

		if ($data_lock === FALSE) {

			$lock_counter = 0;

			// loop until you find that the lock has been released.  that implies that data get from other thread has finished
			while ($data_lock === FALSE) {

				if ($lock_counter > $looptime) {
						$returning->locked 		= false;
						$returning->locklooped 	= true;
=======
		self::$_db->replace($this->_hash . '-index', $index, 0, 0);
		$this->unlockindex();

		$data_lock = self::$_db->add($cache_id . '_lock', 1, false, $locktime);

		if ($data_lock === false)
		{

			$lock_counter = 0;

			// Loop until you find that the lock has been released.
			// That implies that data get from other thread has finished
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
				$data_lock = self::$_db->add($cache_id.'_lock', 1, false, $locktime);
=======
				$data_lock = self::$_db->add($cache_id . '_lock', 1, false, $locktime);
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
	 * @since   11.1
	 * @return boolean  True on success, false otherwise.
	 */
	public function unlock($id,$group=null)
	{
		$unlock = false;

		$cache_id = $this->_getCacheId($id, $group).'_lock';

		if (!$this->lockindex()) return false;

		$index = self::$_db->get($this->_hash.'-index');
		if ($index === false) {$index = array();}

		foreach ($index as $key=>$value){
		if ($value->name == $cache_id) unset ($index[$key]);
		break;
		}
		self::$_db->replace($this->_hash.'-index', $index, 0, 0);
=======
	 * @param   string  $id     The cache data id
	 * @param   string  $group  The cache data group
	 *
	 * @return  boolean  True on success, false otherwise.
	 *
	 * @since   11.1
	 */
	public function unlock($id, $group = null)
	{
		$unlock = false;

		$cache_id = $this->_getCacheId($id, $group) . '_lock';

		if (!$this->lockindex())
		{
			return false;
		}

		$index = self::$_db->get($this->_hash . '-index');
		if ($index === false)
		{
			$index = array();
		}

		foreach ($index as $key => $value)
		{
			if ($value->name == $cache_id)
			{
				unset($index[$key]);
			}
			break;
		}
		self::$_db->replace($this->_hash . '-index', $index, 0, 0);
>>>>>>> upstream/master
		$this->unlockindex();

		return self::$_db->delete($cache_id);
	}

<<<<<<< HEAD

	/**
	 * Lock cache index
	 *
	 * @since	11.1
	 * @return boolean  True on success, false otherwise.
	 */
	protected function lockindex()
	{
		$looptime 	= 300;
		$data_lock 	= self::$_db->add($this->_hash.'-index_lock', 1, false, 30);

		if ($data_lock === FALSE) {

			$lock_counter = 0;

			// loop until you find that the lock has been released.  that implies that data get from other thread has finished
			while ( $data_lock === FALSE ) {

				if ( $lock_counter > $looptime ) {
=======
	/**
	 * Lock cache index
	 *
	 * @return  boolean  True on success, false otherwise.
	 *
	 * @since   11.1
	 */
	protected function lockindex()
	{
		$looptime = 300;
		$data_lock = self::$_db->add($this->_hash . '-index_lock', 1, false, 30);

		if ($data_lock === false)
		{

			$lock_counter = 0;

			// Loop until you find that the lock has been released.  that implies that data get from other thread has finished
			while ($data_lock === false)
			{
				if ($lock_counter > $looptime)
				{
>>>>>>> upstream/master
					return false;
					break;
				}

				usleep(100);
<<<<<<< HEAD
				$data_lock = self::$_db->add($this->_hash.'-index_lock', 1, false, 30);
=======
				$data_lock = self::$_db->add($this->_hash . '-index_lock', 1, false, 30);
>>>>>>> upstream/master
				$lock_counter++;
			}
		}

		return true;
	}

	/**
	 * Unlock cache index
	 *
	 * @return  boolean  True on success, false otherwise.
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function unlockindex()
	{
<<<<<<< HEAD
		return self::$_db->delete($this->_hash.'-index_lock');
=======
		return self::$_db->delete($this->_hash . '-index_lock');
>>>>>>> upstream/master
	}
}