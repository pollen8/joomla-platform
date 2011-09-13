<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Application
 *
 * @copyright   Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

<<<<<<< HEAD
defined('JPATH_PLATFORM') or die;

JLoader::discover('JInput', dirname(__FILE__).'/input');
=======
defined('JPATH_PLATFORM') or die();

JLoader::discover('JInput', dirname(__FILE__) . '/input');
>>>>>>> upstream/master

jimport('joomla.filter.filterinput');

/**
 * Joomla! Input Base Class
 *
 * This is an abstracted input class used to manage retrieving data from the application environment.
 *
 * @package     Joomla.Platform
 * @subpackage  Application
 * @since       11.1
 */
class JInput
{
	/**
<<<<<<< HEAD
	 * @var    array  Options array for the JInput instance.
=======
	 * Options array for the JInput instance.
	 *
	 * @var    array
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $options = array();

	/**
<<<<<<< HEAD
	 * @var    JFilterInput  Filter object to use.
=======
	 * Filter object to use.
	 *
	 * @var    JFilterInput
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $filter = null;

	/**
<<<<<<< HEAD
	 * @var    array  Input data.
=======
	 * Input data.
	 *
	 * @var    array
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $data = array();

	/**
<<<<<<< HEAD
	 * @var    array  Input objects.
=======
	 * Input objects
	 *
	 * @var    array
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $inputs = array();

	/**
	 * Constructor.
	 *
	 * @param   array  $source   Source data (Optional, default is $_REQUEST)
	 * @param   array  $options  Array of configuration parameters (Optional)
	 *
	 * @return  JInput
	 *
	 * @since   11.1
	 */
	public function __construct($source = null, $options = array())
	{
<<<<<<< HEAD
		if (isset ($options['filter'])) {
			$this->filter = $options['filter'];
		} else {
			$this->filter = JFilterInput::getInstance();
		}

		if (is_null($source)) {
			$this->data = & $_REQUEST;
		} else {
=======
		if (isset($options['filter']))
		{
			$this->filter = $options['filter'];
		}
		else
		{
			$this->filter = JFilterInput::getInstance();
		}

		if (is_null($source))
		{
			$this->data = & $_REQUEST;
		}
		else
		{
>>>>>>> upstream/master
			$this->data = & $source;
		}

		// Set the options for the class.
		$this->options = $options;
	}

	/**
	 * Magic method to get an input object
	 *
<<<<<<< HEAD
	 * @param   mixed   $name  Name of the input object to retrieve.
=======
	 * @param   mixed  $name  Name of the input object to retrieve.
>>>>>>> upstream/master
	 *
	 * @return  JInput  The request input object
	 *
	 * @since   11.1
	 */
	public function __get($name)
	{
<<<<<<< HEAD
		if (isset ($this->inputs[$name])) {
			return $this->inputs[$name];
		}

		$className = 'JInput'.$name;
		if (class_exists($className)) {
			$this->inputs[$name] = new $className (null, $this->options);
			return $this->inputs[$name];
		}

		$superGlobal = '_'.strtoupper($name);
		if (isset ($GLOBALS[$superGlobal])) {
=======
		if (isset($this->inputs[$name]))
		{
			return $this->inputs[$name];
		}

		$className = 'JInput' . $name;
		if (class_exists($className))
		{
			$this->inputs[$name] = new $className(null, $this->options);
			return $this->inputs[$name];
		}

		$superGlobal = '_' . strtoupper($name);
		if (isset($GLOBALS[$superGlobal]))
		{
>>>>>>> upstream/master
			$this->inputs[$name] = new JInput($GLOBALS[$superGlobal], $this->options);
			return $this->inputs[$name];
		}

		// TODO throw an exception
	}

	/**
	 * Gets a value from the input data.
	 *
	 * @param   string  $name     Name of the value to get.
	 * @param   mixed   $default  Default value to return if variable does not exist.
	 * @param   string  $filter   Filter to apply to the value.
	 *
	 * @return  mixed  The filtered input value.
	 *
	 * @since   11.1
	 */
	public function get($name, $default = null, $filter = 'cmd')
	{
<<<<<<< HEAD
		if (isset ($this->data[$name])) {
=======
		if (isset($this->data[$name]))
		{
>>>>>>> upstream/master
			return $this->filter->clean($this->data[$name], $filter);
		}

		return $default;
	}

	/**
	 * Gets an array of values from the request.
	 *
<<<<<<< HEAD
	 * @param   array   $vars        Associative array of keys and filter types to apply.
	 * @param   mixed	$datasource  Array to retrieve data from, or null
=======
	 * @param   array  $vars        Associative array of keys and filter types to apply.
	 * @param   mixed  $datasource  Array to retrieve data from, or null
>>>>>>> upstream/master
	 *
	 * @return  mixed  The filtered input data.
	 *
	 * @since   11.1
	 */
	public function getArray($vars, $datasource = null)
	{
		$results = array();

<<<<<<< HEAD
		foreach ($vars AS $k => $v)
		{
			if (is_array($v)) {
				if (is_null($datasource)) {
					$results[$k] = $this->getArray($v, $this->get($k, null, 'array'));
				} else {
					$results[$k] = $this->getArray($v, $datasource[$k]);
				}
			} else {
				if (is_null($datasource)) {
					$results[$k] = $this->get($k, null, $v);
				} else {
=======
		foreach ($vars as $k => $v)
		{
			if (is_array($v))
			{
				if (is_null($datasource))
				{
					$results[$k] = $this->getArray($v, $this->get($k, null, 'array'));
				}
				else
				{
					$results[$k] = $this->getArray($v, $datasource[$k]);
				}
			}
			else
			{
				if (is_null($datasource))
				{
					$results[$k] = $this->get($k, null, $v);
				}
				else
				{
>>>>>>> upstream/master
					$results[$k] = $this->filter->clean($datasource[$k], $v);
				}
			}
		}
		return $results;
	}

	/**
	 * Sets a value
	 *
	 * @param   string  $name   Name of the value to set.
	 * @param   mixed   $value  Value to assign to the input.
	 *
	 * @return  void
	 *
	 * @since   11.1
	 */
	public function set($name, $value)
	{
		$this->data[$name] = $value;
	}

	/**
	 * Magic method to get filtered input data.
	 *
<<<<<<< HEAD
	 * @param   mixed    $name     Name of the value to get.
	 * @param   string   $default  Default value to return if variable does not exist.
	 *
	 * @return  bool     The filtered boolean input value.
=======
	 * @param   mixed   $name       Name of the value to get.
	 * @param   string  $arguments  Default value to return if variable does not exist.
	 *
	 * @return  boolean  The filtered boolean input value.
>>>>>>> upstream/master
	 *
	 * @since   11.1
	 */
	public function __call($name, $arguments)
	{
<<<<<<< HEAD
		if (substr($name, 0, 3) == 'get') {
=======
		if (substr($name, 0, 3) == 'get')
		{
>>>>>>> upstream/master

			$filter = substr($name, 3);

			$default = null;
<<<<<<< HEAD
			if (isset ($arguments[1])) {
=======
			if (isset($arguments[1]))
			{
>>>>>>> upstream/master
				$default = $arguments[1];
			}

			return $this->get($arguments[0], $default, $filter);
		}
	}

	/**
	 * Gets the request method.
	 *
<<<<<<< HEAD
	 * @return  string     The request method.
=======
	 * @param   mixed   $name       Name of the value to get.
	 * @param   string  $arguments  Default value to return if variable does not exist.
	 *
	 * @return  string   The request method.
>>>>>>> upstream/master
	 *
	 * @since   11.1
	 */
	public function getMethod($name, $arguments)
	{
		$method = strtoupper($_SERVER['REQUEST_METHOD']);
		return $method;
	}
<<<<<<< HEAD
}
=======
}
>>>>>>> upstream/master
