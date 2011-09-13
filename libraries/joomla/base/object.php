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
 * Base object class.
 *
 * This class allows for simple but smart objects with get and set methods
 * and an internal error handler.
 *
 * @package     Joomla.Platform
 * @subpackage  Base
 * @since       11.1
 */
class JObject
{
	/**
<<<<<<< HEAD
	 * An array of errors
	 *
	 * @var    array of error messages or JExceptions objects.
=======
	 * An array of error messages or JExceptions objects.
	 *
	 * @var    array
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $_errors = array();

	/**
	 * Class constructor, overridden in descendant classes.
	 *
<<<<<<< HEAD
	 * @param   mixed  $properties	Either and associative array or another
	 *                 object to set the initial properties of the object.
=======
	 * @param   mixed  $properties  Either and associative array or another
	 *                              object to set the initial properties of the object.
>>>>>>> upstream/master
	 *
	 * @return  JObject
	 *
	 * @since   11.1
	 */
	public function __construct($properties = null)
	{
<<<<<<< HEAD
		if ($properties !== null) {
=======
		if ($properties !== null)
		{
>>>>>>> upstream/master
			$this->setProperties($properties);
		}
	}

	/**
	 * Magic method to convert the object to a string gracefully.
	 *
	 * @return  string  The classname.
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function __toString()
	{
		return get_class($this);
	}

	/**
	 * Sets a default value if not alreay assigned
	 *
	 * @param   string  $property  The name of the property.
	 * @param   mixed   $default   The default value.
	 *
	 * @return  mixed
<<<<<<< HEAD
	 * @since   11.1
	 */
	public function def($property, $default=null)
=======
	 *
	 * @since   11.1
	 */
	public function def($property, $default = null)
>>>>>>> upstream/master
	{
		$value = $this->get($property, $default);
		return $this->set($property, $value);
	}

	/**
	 * Returns a property of the object or the default value if the property is not set.
	 *
	 * @param   string  $property  The name of the property.
	 * @param   mixed   $default   The default value.
	 *
	 * @return  mixed    The value of the property.
	 *
<<<<<<< HEAD
	 * @see     getProperties()
	 * @since   11.1
	 */
	public function get($property, $default=null)
	{
		if (isset($this->$property)) {
=======
	 * @since   11.1
	 *
	 * @see     getProperties()
	 */
	public function get($property, $default = null)
	{
		if (isset($this->$property))
		{
>>>>>>> upstream/master
			return $this->$property;
		}
		return $default;
	}

	/**
	 * Returns an associative array of object properties.
	 *
	 * @param   boolean  $public  If true, returns only the public properties.
	 *
	 * @return  array
	 *
<<<<<<< HEAD
	 * @see		get()
	 * @since   11.1
	 */
	public function getProperties($public = true)
	{
		$vars  = get_object_vars($this);
=======
	 * @since   11.1
	 *
	 * @see     get()
	 */
	public function getProperties($public = true)
	{
		$vars = get_object_vars($this);
>>>>>>> upstream/master
		if ($public)
		{
			foreach ($vars as $key => $value)
			{
<<<<<<< HEAD
				if ('_' == substr($key, 0, 1)) {
=======
				if ('_' == substr($key, 0, 1))
				{
>>>>>>> upstream/master
					unset($vars[$key]);
				}
			}
		}

		return $vars;
	}

	/**
	 * Get the most recent error message.
	 *
	 * @param   integer  $i         Option error index.
	 * @param   boolean  $toString  Indicates if JError objects should return their error message.
	 *
	 * @return  string   Error message
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function getError($i = null, $toString = true)
	{
		// Find the error
		if ($i === null)
		{
			// Default, return the last message
			$error = end($this->_errors);
		}
		else if (!array_key_exists($i, $this->_errors))
		{
			// If $i has been specified but does not exist, return false
			return false;
		}
<<<<<<< HEAD
		else {
			$error	= $this->_errors[$i];
		}

		// Check if only the string is requested
		if (JError::isError($error) && $toString) {
			return (string)$error;
=======
		else
		{
			$error = $this->_errors[$i];
		}

		// Check if only the string is requested
		if (JError::isError($error) && $toString)
		{
			return (string) $error;
>>>>>>> upstream/master
		}

		return $error;
	}

	/**
	 * Return all errors, if any.
	 *
	 * @return  array  Array of error messages or JErrors.
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function getErrors()
	{
		return $this->_errors;
	}

	/**
	 * Modifies a property of the object, creating it if it does not already exist.
	 *
	 * @param   string  $property  The name of the property.
	 * @param   mixed   $value     The value of the property to set.
	 *
	 * @return  mixed  Previous value of the property.
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function set($property, $value = null)
	{
		$previous = isset($this->$property) ? $this->$property : null;
		$this->$property = $value;
		return $previous;
	}

	/**
	 * Set the object properties based on a named array/hash.
	 *
	 * @param   mixed  $properties  Either an associative array or another object.
	 *
	 * @return  boolean
	 *
<<<<<<< HEAD
	 * @see     set()
	 * @since   11.1
=======
	 * @since   11.1
	 *
	 * @see     set()
>>>>>>> upstream/master
	 */
	public function setProperties($properties)
	{
		if (is_array($properties) || is_object($properties))
		{
			foreach ((array) $properties as $k => $v)
			{
				// Use the set function which might be overriden.
				$this->set($k, $v);
			}
			return true;
		}

		return false;
	}

	/**
	 * Add an error message.
	 *
	 * @param   string  $error  Error message.
	 *
<<<<<<< HEAD
	 * @return  array  updated array or errors
=======
	 * @return  void
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function setError($error)
	{
		array_push($this->_errors, $error);
	}

	/**
<<<<<<< HEAD
	 * @return  string
	 *
	 * @deprecated
	 * @note   Use magic method __toString()
	 * @see    __toString()
	 * @since  11.1
	 */
	function toString()
	{
		return $this->__toString();
	}
}
=======
	 * Converts the object to a string (the class name).
	 *
	 * @return  string
	 *
	 * @since   11.1
	 * @deprecated  12.1    Use magic method __toString()
	 * @see         __toString()
	 */
	function toString()
	{
		// Deprecation warning.
		JLog::add('JObject::toString() is deprecated.', JLog::WARNING, 'deprecated');

		return $this->__toString();
	}
}
>>>>>>> upstream/master
