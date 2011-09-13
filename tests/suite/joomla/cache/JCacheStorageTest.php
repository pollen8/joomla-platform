<?php
/**
 * @package     Joomla.UnitTest
 * @subpackage  Cache
 *
 * @copyright   Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

/**
 * Test class for JCacheStorage.
 *
 * @package     Joomla.UnitTest
 * @subpackage  Cache
 *
 */
<<<<<<< HEAD
class JCacheStorageTest extends PHPUnit_Framework_TestCase
=======
class JCacheStorageTest extends JoomlaTestCase
>>>>>>> upstream/master
{
	/**
	 * @var	JCacheStorage
	 * @access protected
	 */
	protected $object;

	/**
<<<<<<< HEAD
	 * @var errorState
	 */
=======
	 * @var errors
	 * @access protected
	 */
	protected static $errors;
>>>>>>> upstream/master
	protected $savedErrorState;

		/**
	 * @var actualError
	 */
	protected static $actualError;

	/**
	 * @var  bool
	 */
	protected $apcAvailable;

	/**
	 * @var  bool
	 */
	protected $eacceleratorAvailable;

	/**
	 * @var  bool
	 */
	protected $memcacheAvailable;

	/**
	 * @var  bool
	 */
	protected $xcacheAvailable;

	/**
	 * Receives the callback from JError and logs the required error information for the test.
	 *
	 * @param	JException	The JException object from JError
	 *
	 * @return	bool	To not continue with JError processing
	 */
<<<<<<< HEAD
	static function errorCallback( $error )
=======
	static function errorCallback( &$error )
>>>>>>> upstream/master
	{
		JCacheStorageTest::$actualError['code'] = $error->get('code');
		JCacheStorageTest::$actualError['msg'] = $error->get('message');
		JCacheStorageTest::$actualError['info'] = $error->get('info');
		return false;
	}

<<<<<<< HEAD
	/**
	 * Sets the JError error handlers.
	 *
	 * @param	array	araay of values and options to set the handlers
	 *
	 * @return	void
	 */
	protected function setErrorHandlers($errorHandlers)
	{
		$mode = null;
		$options = null;

		foreach ($errorHandlers as $type => $params) {
			$mode = $params['mode'];
			if (isset ($params['options'])) {
				JError :: setErrorHandling($type, $mode, $params['options']);
			} else {
				JError :: setErrorHandling($type, $mode);
			}
		}
	}

	/**
	 * Sets the JError error handlers to callback mode and points them at the test
	 * logging method.
	 *
	 * @return	void
	 */
	protected function setErrorCallback($testName)
	{
		$callbackHandlers = array (
			E_NOTICE => array (
				'mode' => 'callback',
				'options' => array (
					$testName,
					'errorCallback'
				)
			),
			E_WARNING => array (
				'mode' => 'callback',
				'options' => array (
					$testName,
					'errorCallback'
				)
			),
			E_ERROR => array (
				'mode' => 'callback',
				'options' => array (
					$testName,
					'errorCallback'
				)
			),

		);
		$this->setErrorHandlers($callbackHandlers);
	}


=======
>>>>>>> upstream/master
	protected function setUp()
	{
		include_once JPATH_PLATFORM.'/joomla/cache/cache.php';
		include_once JPATH_PLATFORM.'/joomla/cache/storage.php';

		$this->saveErrorHandlers();
		$this->setErrorCallback('JCacheStorageTest');
		JCacheStorageTest::$actualError = array();

		$this->object = new JCacheStorage;

		$this->apcAvailable = extension_loaded('apc');
		$this->eacceleratorAvailable = extension_loaded('eaccelerator') && function_exists('eaccelerator_get');
		$this->memcacheAvailable = (extension_loaded('memcache') && class_exists('Memcache')) != true;
		$this->xcacheAvailable = extension_loaded('xcache');
	}

	/**
<<<<<<< HEAD
	 * Saves the current state of the JError error handlers.
	 *
	 * @return	void
	 */
	protected function saveErrorHandlers()
	{
		$this->savedErrorState = array ();
		$this->savedErrorState[E_NOTICE] = JError :: getErrorHandling(E_NOTICE);
		$this->savedErrorState[E_WARNING] = JError :: getErrorHandling(E_WARNING);
		$this->savedErrorState[E_ERROR] = JError :: getErrorHandling(E_ERROR);
	}

	/**
=======
>>>>>>> upstream/master
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 *
	 * @return void
	 * @access protected
	 */
	protected function tearDown()
	{
		$this->setErrorhandlers($this->savedErrorState);
	}

	/**
	 * Test Cases for getInstance
	 *
	 * @return array
	 */
	function casesGetInstance()
	{
		return array(
			'defaultfile' => array(
				'file',
				array(
					'application'	=> null,
					'language'		=> 'en-GB',
					'locking'		=> true,
					'lifetime'		=> null,
					'cachebase'		=> JPATH_BASE.'/cache',
					'now'		=> time(),
				),
				'JCacheStorageFile',
			),
			'defaultapc' => array(
				'apc',
				array(
					'application'	=> null,
					'language'		=> 'en-GB',
					'locking'		=> true,
					'lifetime'		=> null,
					'now'		=> time(),
				),
				$this->apcAvailable ? 'JCacheStorageApc' : false,
			),
			'defaulteaccelerator' => array(
				'eaccelerator',
				array(
					'application'	=> null,
					'language'		=> 'en-GB',
					'locking'		=> true,
					'lifetime'		=> null,
					'now'		=> time(),
				),
				$this->eacceleratorAvailable ? 'JCacheStorageEaccelerator' : false,
			),
			'defaultmemcache' => array(
				'memcache',
				array(
					'application'	=> null,
					'language'		=> 'en-GB',
					'locking'		=> true,
					'lifetime'		=> null,
					'now'		=> time(),
				),
				$this->memcacheAvailable ? 'JCacheStorageMemcache' : false,
			),
			'defaultxcache' => array(
				'xcache',
				array(
					'application'	=> null,
					'language'		=> 'en-GB',
					'locking'		=> true,
					'lifetime'		=> null,
					'now'		=> time(),
				),
				$this->xcacheAvailable ? 'JCacheStorageXcache' : false,
			),
		);
	}

	/**
	 * Testing getInstance
	 *
	 * @param	string	cache storage
	 * @param	array	options for cache storage
	 * @param	string	name of expected cache storage class
	 *
	 * @return void
	 * @dataProvider casesGetInstance
	 */
	public function testGetInstance($handler, $options, $expClass)
	{
		if (is_bool($expClass)) {
			$this->markTestSkipped('The caching method '.$handler.' is not supported on this system.');
		}

		$this->object = JCacheStorage::getInstance($handler, $options);
<<<<<<< HEAD
		$config = JFactory::getConfig();
=======
		if (class_exists('JTestConfig')) {
			$config = new JTestConfig;
		}
>>>>>>> upstream/master

		$this->assertThat(
			$this->object,
			$this->isInstanceOf($expClass),
			'The wrong class was received.'
		);

		$this->assertThat(
			$this->object->_application,
			$this->equalTo($options['application']),
			'Unexpected value for _application.'
		);

		$this->assertThat(
			$this->object->_language,
			$this->equalTo($options['language']),
			'Unexpected value for _language.'
		);

		$this->assertThat(
			$this->object->_locking,
			$this->equalTo($options['locking']),
			'Unexpected value for _locking.'
		);

		$this->assertThat(
			$this->object->_lifetime,
<<<<<<< HEAD
			$this->equalTo(empty($options['lifetime']) ? $config->get('cachetime')*60 : $options['lifetime']*60),
=======
//			$this->equalTo(empty($options['lifetime']) ? $config->get('cachetime')*60 : $options['lifetime']*60),
			$this->equalTo(60),
>>>>>>> upstream/master
			'Unexpected value for _lifetime.'
		);

		$this->assertLessThan(
<<<<<<< HEAD
			$config->get('lifetime'),
=======
			isset($config->cachetime) ? $config->cachetime : 900,
>>>>>>> upstream/master
			abs($this->object->_now - time()),
			'Unexpected value for configuration lifetime.'
		);
	}

	/**
	 * Testing get().
	 *
	 * @return void
	 */
	public function testGet()
	{
		$this->assertThat(
			$this->object->get(1, '', time()),
			$this->equalTo(false)
		);
	}

	/**
	 * Testing store().
	 *
	 * @return void
	 */
	public function testStore()
	{
		$this->assertThat(
			$this->object->store(1, '', 'Cached'),
			$this->isTrue()
		);
	}

	/**
	 * Testing remove().
	 *
	 * @return void
	 */
	public function testRemove()
	{
		$this->assertThat(
			$this->object->remove(1, ''),
			$this->isTrue()
		);
	}

	/**
	 * Testing clean().
	 *
	 * @return void
	 */
	public function testClean()
	{
		$this->assertThat(
			$this->object->clean('', 'group'),
			$this->isTrue()
		);
	}

	/**
	 * Testing gc().
	 *
	 * @return void
	 */
	public function testGc()
	{
		$this->assertThat(
			$this->object->gc(),
			$this->isTrue()
		);
	}

	/**
	 * Testing test().
	 *
	 * @return void
	 */
	public function testTest()
	{
		$this->assertThat(
			$this->object->test(),
			$this->isTrue()
		);
	}
}
?>
