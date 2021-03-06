<?php
/**
<<<<<<< HEAD
 * @package     Joomla.UnitTest
 *
 * @copyright   Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
=======
 * @package    Joomla.UnitTest
 *
 * @copyright  Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
>>>>>>> upstream/master
 */

/**
 * Test case class for Joomla Unit Testing
 *
<<<<<<< HEAD
 * @package	Joomla.UnitTest
 *
=======
 * @package  Joomla.UnitTest
 * @since    11.1
>>>>>>> upstream/master
 */
abstract class JoomlaTestCase extends PHPUnit_Framework_TestCase
{
	/**
<<<<<<< HEAD
	 * @var factoryState
	 */
	protected $factoryState = array();

	/**
	 * @var errorState
=======
	 * The saved factory state.
	 *
	 * @var    array
	 * @since  11.1
	 */
	protected $savedFactoryState = array(
		'application' => null,
		'config' => null,
		'dates' => null,
		'session' => null,
		'language' => null,
		'document' => null,
		'acl' => null,
		'database' => null,
		'mailer' => null,
	);

	/**
	 * @var    errorState
	 * @since  11.1
>>>>>>> upstream/master
	 */
	protected $savedErrorState;

	/**
<<<<<<< HEAD
	 * @var actualError
=======
	 * @var    actualError
	 * @since  11.1
>>>>>>> upstream/master
	 */
	protected static $actualError;

	/**
<<<<<<< HEAD
	 * @var errors
=======
	 * @var    errors
	 * @since  11.1
>>>>>>> upstream/master
	 */
	protected $expectedErrors = null;

	/**
<<<<<<< HEAD
	 * Saves the current state of the JError error handlers.
	 *
	 * @return  void
=======
	 * Assigns mock values to methods.
	 *
	 * @param   object  $mockObject  The mock object.
	 * @param   array   $array       An associative array of methods to mock with return values:<br />
	 *                               string (method name) => mixed (return value)
	 *
	 * @return  void
	 *
	 * @since   11.3
	 */
	public function assignMockReturns($mockObject, $array)
	{
		foreach ($array as $method => $return)
		{
			$mockObject
				->expects($this->any())
				->method($method)
				->will(
					$this->returnValue($return)
				);
		}
	}

	/**
	 * Assigns mock callbacks to methods.
	 *
	 * @param   object  $mockObject  The mock object that the callbacks are being assigned to.
	 * @param   array   $array       An array of methods names to mock with callbacks.
	 *                               This method assumes that the mock callback is named {mock}{method name}.
	 *
	 * @return  void
	 *
	 * @since   11.3
	 */
	public function assignMockCallbacks($mockObject, $array)
	{
		foreach ($array as $index => $method)
		{
			if (is_array($method))
			{
				$methodName = $index;
				$callback = $method;
			}
			else
			{
				$methodName = $method;
				$callback = array(get_called_class(), 'mock'.$method);
			}

			$mockObject
				->expects($this->any())
				->method($methodName)
				->will($this->returnCallback($callback));
		}
	}

	/**
	 * Saves the current state of the JError error handlers.
	 *
	 * @return  void
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	protected function saveErrorHandlers()
	{
		$this->savedErrorState = array();
		$this->savedErrorState[E_NOTICE] = JError::getErrorHandling(E_NOTICE);
		$this->savedErrorState[E_WARNING] = JError::getErrorHandling(E_WARNING);
		$this->savedErrorState[E_ERROR] = JError::getErrorHandling(E_ERROR);
	}

	/**
	 * Sets the JError error handlers.
	 *
<<<<<<< HEAD
	 * @param   array	araay of values and options to set the handlers
	 *
	 * @return  void
	 */
	protected function setErrorHandlers( $errorHandlers )
=======
	 * @param   array	array of values and options to set the handlers
	 *
	 * @return  void
	 *
	 * @since   11.1
	 */
	protected function setErrorHandlers($errorHandlers)
>>>>>>> upstream/master
	{
		$mode = null;
		$options = null;

		foreach ($errorHandlers as $type => $params)
		{
			$mode = $params['mode'];
			if (isset($params['options']))
			{
				JError::setErrorHandling($type, $mode, $params['options']);
			}
			else
			{
				JError::setErrorHandling($type, $mode);
			}
		}
	}

	/**
<<<<<<< HEAD
	 * Sets the JError error handlers to callback mode and points them at the test
	 * logging method.
	 *
	 * @return  void
	 */
	protected function setErrorCallback( $testName )
=======
	 * Sets the JError error handlers to callback mode and points them at the test logging method.
	 *
	 * @return  void
	 *
	 * @since   11.1
	 */
	protected function setErrorCallback($testName)
>>>>>>> upstream/master
	{
		$callbackHandlers = array(
			E_NOTICE => array(
				'mode' => 'callback',
<<<<<<< HEAD
				'options' => array($testName, 'errorCallback')
				),
			E_WARNING => array(
				'mode' => 'callback',
				'options' => array($testName, 'errorCallback')
				),
			E_ERROR => array(
				'mode' => 'callback',
				'options' => array($testName, 'errorCallback')
				),
			);
		$this->setErrorHandlers($callbackHandlers);
	}

=======
				'options' => array(
					$testName,
					'errorCallback'
				)
			),
			E_WARNING => array(
				'mode' => 'callback',
				'options' => array(
					$testName,
					'errorCallback'
				)
			),
			E_ERROR => array(
				'mode' => 'callback',
				'options' => array(
					$testName,
					'errorCallback'
				)
			),
		);
		$this->setErrorHandlers($callbackHandlers);
	}

	/**
	 * Overrides the parent setup method.
	 *
	 * @return  void
	 *
	 * @see     PHPUnit_Framework_TestCase::setUp()
	 * @since   11.1
	 */
>>>>>>> upstream/master
	protected function setUp()
	{
		parent::setUp();
		$this->setExpectedError();
	}

<<<<<<< HEAD
	protected function tearDown()
	{
		if (is_array($this->expectedErrors) && !empty($this->expectedErrors)) {
=======
	/**
	 * Overrides the parent tearDown method.
	 *
	 * @return  void
	 *
	 * @see     PHPUnit_Framework_TestCase::tearDown()
	 * @since   11.1
	 */
	protected function tearDown()
	{
		if (is_array($this->expectedErrors) && !empty($this->expectedErrors))
		{
>>>>>>> upstream/master
			$this->fail('An expected error was not raised.');
		}

		JError::setErrorHandling(E_NOTICE, 'ignore');
		JError::setErrorHandling(E_WARNING, 'ignore');
		JError::setErrorHandling(E_ERROR, 'ignore');

		parent::tearDown();
	}

	/**
	 * Receives the callback from JError and logs the required error information for the test.
	 *
<<<<<<< HEAD
	 * @param   JException	The JException object from JError
	 *
	 * @return  bool	To not continue with JError processing
	 */
	static function errorCallback( $error )
	{

=======
	 * @param   JException	$error  The JException object from JError
	 *
	 * @return  boolean  To not continue with JError processing
	 *
	 * @since   11.1
	 */
	static function errorCallback($error)
	{
>>>>>>> upstream/master
	}

	/**
	 * Callback receives the error from JError and deals with it appropriately
	 * If a test expects a JError to be raised, it should call this setExpectedError first
<<<<<<< HEAD
	 * If you don't call this method first, the test will fail
	 */
	public function expectedErrorCallback($error)
	{
		foreach($this->expectedErrors AS $key => $err)
=======
	 * If you don't call this method first, the test will fail.
	 *
	 * @param   unsure  $error
	 *
	 * @return  unsure
	 *
	 * @since   11.1
	 */
	public function expectedErrorCallback($error)
	{
		foreach ($this->expectedErrors AS $key => $err)
>>>>>>> upstream/master
		{
			$thisError = true;

			foreach ($err AS $prop => $value)
			{
<<<<<<< HEAD
				if ($error->get($prop) !== $value) {
=======
				if ($error->get($prop) !== $value)
				{
>>>>>>> upstream/master
					$thisError = false;
				}
			}

<<<<<<< HEAD
			if ($thisError) {
=======
			if ($thisError)
			{
>>>>>>> upstream/master
				unset($this->expectedErrors[$key]);
				return $error;
			}

		}
<<<<<<< HEAD
		$this->fail('An unexpected error occurred - '.$error->get('message'));
=======
		$this->fail('An unexpected error occurred - ' . $error->get('message'));

>>>>>>> upstream/master
		return $error;
	}

	/**
	 * Tells the unit tests that a method or action you are about to attempt
	 * is expected to result in JError::raiseSomething being called.
	 *
	 * If you don't call this method first, the test will fail.
	 * If you call this method during your test and the error does not occur, then your test
	 * will also fail because we assume you were testing to see that an error did occur when it was
	 * supposed to.
	 *
	 * If passed without argument, the array is initialized if it hsn't been already
<<<<<<< HEAD
	 */
	public function setExpectedError($error = null) {
		if (!is_array($this->expectedErrors)) {
=======
	 *
	 * @param   unsure  $error
	 *
	 * @return  void
	 *
	 * @since   11.1
	 */
	public function setExpectedError($error = null)
	{
		if (!is_array($this->expectedErrors))
		{
>>>>>>> upstream/master
			$this->expectedErrors = array();
			JError::setErrorHandling(E_NOTICE, 'callback', array($this, 'expectedErrorCallback'));
			JError::setErrorHandling(E_WARNING, 'callback', array($this, 'expectedErrorCallback'));
			JError::setErrorHandling(E_ERROR, 'callback', array($this, 'expectedErrorCallback'));
		}
<<<<<<< HEAD
		if (!is_null($error)) {
=======
		if (!is_null($error))
		{
>>>>>>> upstream/master
			$this->expectedErrors[] = $error;
		}
	}

<<<<<<< HEAD

	/**
	 * Saves the Factory pointers
	 *
	 * @return void
=======
	/**
	 * Saves the Factory pointers
	 *
	 * @return  void
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	protected function saveFactoryState()
	{
		$this->savedFactoryState['application'] = JFactory::$application;
		$this->savedFactoryState['config'] = JFactory::$config;
<<<<<<< HEAD
=======
		$this->savedFactoryState['dates'] = JFactory::$dates;
>>>>>>> upstream/master
		$this->savedFactoryState['session'] = JFactory::$session;
		$this->savedFactoryState['language'] = JFactory::$language;
		$this->savedFactoryState['document'] = JFactory::$document;
		$this->savedFactoryState['acl'] = JFactory::$acl;
		$this->savedFactoryState['database'] = JFactory::$database;
		$this->savedFactoryState['mailer'] = JFactory::$mailer;
	}

	/**
	 * Sets the Factory pointers
	 *
<<<<<<< HEAD
	 * @return void
=======
	 * @return  void
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	protected function restoreFactoryState()
	{
		JFactory::$application = $this->savedFactoryState['application'];
		JFactory::$config = $this->savedFactoryState['config'];
<<<<<<< HEAD
=======
		JFactory::$dates = $this->savedFactoryState['dates'];
>>>>>>> upstream/master
		JFactory::$session = $this->savedFactoryState['session'];
		JFactory::$language = $this->savedFactoryState['language'];
		JFactory::$document = $this->savedFactoryState['document'];
		JFactory::$acl = $this->savedFactoryState['acl'];
		JFactory::$database = $this->savedFactoryState['database'];
		JFactory::$mailer = $this->savedFactoryState['mailer'];
	}
<<<<<<< HEAD
=======

	/**
	 * Gets a mock application object.
	 *
	 * @return  object
	 *
	 * @since   11.3
	 */
	protected function getMockApplication()
	{
		require_once JPATH_TESTS.'/suite/joomla/application/JApplicationMock.php';

		return JApplicationGlobalMock::create($this);
	}

	/**
	 * Gets a mock database object.
	 *
	 * @return  object
	 *
	 * @since   11.3
	 */
	protected function getMockConfig()
	{
		require_once JPATH_TESTS.'/suite/joomla/application/JConfigMock.php';

		return JConfigGlobalMock::create($this);
	}

	/**
	 * Gets a mock database object.
	 *
	 * @return  object
	 *
	 * @since   11.3
	 */
	protected function getMockDatabase()
	{
		require_once JPATH_TESTS.'/suite/joomla/database/JDatabaseMock.php';

		return JDatabaseGlobalMock::create($this);
	}

	/**
	 * Gets a mock language object.
	 *
	 * @return  object
	 *
	 * @since   11.3
	 */
	protected function getMockLanguage()
	{
		require_once JPATH_TESTS.'/suite/joomla/language/JLanguageMock.php';

		return JLanguageGlobalMock::create($this);
	}

	/**
	 * Gets a mock session object.
	 *
	 * @param   array  $options  An array of key-value options for the JSession mock.
	 *                           getId : the value to be returned by the mock getId method
	 *                           get.user.id : the value to assign to the user object id returned by get('user')
	 *                           get.user.name : the value to assign to the user object name returned by get('user')
	 *                           get.user.username : the value to assign to the user object username returned by get('user')
	 *
	 * @return  object
	 *
	 * @since   11.3
	 */
	protected function getMockSession($options = array())
	{
		require_once JPATH_TESTS.'/suite/joomla/session/JSessionMock.php';

		return JSessionGlobalMock::create($this, $options);
	}
>>>>>>> upstream/master
}
