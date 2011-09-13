<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Access
 *
 * @copyright   Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

<<<<<<< HEAD
defined('JPATH_PLATFORM') or die;
=======
defined('JPATH_PLATFORM') or die();
>>>>>>> upstream/master

jimport('joomla.access.rule');

/**
<<<<<<< HEAD
=======
 * JRules class.
 *
>>>>>>> upstream/master
 * @package     Joomla.Platform
 * @subpackage  Access
 * @since       11.1
 */
class JRules
{
	/**
<<<<<<< HEAD
	 * @var    array  A named array.
	 * @since  11.1
	 */
	protected $_data = array();
=======
	 * A named array.
	 *
	 * @var    array
	 * @since  11.1
	 */
	protected $data = array();
>>>>>>> upstream/master

	/**
	 * Constructor.
	 *
	 * The input array must be in the form: array('action' => array(-42 => true, 3 => true, 4 => false))
	 * or an equivalent JSON encoded string, or an object where properties are arrays.
	 *
<<<<<<< HEAD
	 * @param   mixed  A JSON format string (probably from the database) or a nested array.
=======
	 * @param   mixed  $input  A JSON format string (probably from the database) or a nested array.
>>>>>>> upstream/master
	 *
	 * @return  JRules
	 *
	 * @since   11.1
	 */
	public function __construct($input = '')
	{
		// Convert in input to an array.
<<<<<<< HEAD
		if (is_string($input)) {
			$input = json_decode($input, true);
		}
		else if (is_object($input)) {
=======
		if (is_string($input))
		{
			$input = json_decode($input, true);
		}
		else if (is_object($input))
		{
>>>>>>> upstream/master
			$input = (array) $input;
		}

		if (is_array($input))
		{
			// Top level keys represent the actions.
<<<<<<< HEAD
			foreach ($input as $action => $identities) {
=======
			foreach ($input as $action => $identities)
			{
>>>>>>> upstream/master
				$this->mergeAction($action, $identities);
			}
		}
	}

	/**
	 * Get the data for the action.
	 *
	 * @return  array  A named array of JRule objects.
	 *
	 * @since   11.1
	 */
	public function getData()
	{
<<<<<<< HEAD
		return $this->_data;
=======
		return $this->data;
>>>>>>> upstream/master
	}

	/**
	 * Method to merge a collection of JRules.
	 *
<<<<<<< HEAD
	 * @param   mixed
	 */
	public function mergeCollection($input)
	{
		// Check if the input is a
		if (is_array($input))
		{
			foreach ($input as $actions) {
=======
	 * @param   mixed  $input  JRule or array of JRules
	 *
	 * @return  void
	 *
	 * @since   11.1
	 */
	public function mergeCollection($input)
	{
		// Check if the input is an array.
		if (is_array($input))
		{
			foreach ($input as $actions)
			{
>>>>>>> upstream/master
				$this->merge($actions);
			}
		}
	}

	/**
	 * Method to merge actions with this object.
	 *
<<<<<<< HEAD
	 * @param   mixed
	 */
	public function merge($actions)
	{
		if (is_string($actions)) {
=======
	 * @param   mixed  $actions  JRule object, an array of actions or a JSON string array of actions.
	 *
	 * @return  void
	 *
	 * @since   11.1
	 */
	public function merge($actions)
	{
		if (is_string($actions))
		{
>>>>>>> upstream/master
			$actions = json_decode($actions, true);
		}

		if (is_array($actions))
		{
<<<<<<< HEAD
			foreach ($actions as $action => $identities) {
=======
			foreach ($actions as $action => $identities)
			{
>>>>>>> upstream/master
				$this->mergeAction($action, $identities);
			}
		}
		else if ($actions instanceof JRules)
		{
			$data = $actions->getData();

<<<<<<< HEAD
			foreach ($data as $name => $identities) {
=======
			foreach ($data as $name => $identities)
			{
>>>>>>> upstream/master
				$this->mergeAction($name, $identities);
			}
		}
	}

	/**
<<<<<<< HEAD
=======
	 * Merges an array of identities for an action.
	 *
>>>>>>> upstream/master
	 * @param   string  $action      The name of the action.
	 * @param   array   $identities  An array of identities
	 *
	 * @return  void
	 *
	 * @since   11.1
	 */
	public function mergeAction($action, $identities)
	{
<<<<<<< HEAD
		if (isset($this->_data[$action]))
		{
			// If exists, merge the action.
			$this->_data[$action]->mergeIdentities($identities);
=======
		if (isset($this->data[$action]))
		{
			// If exists, merge the action.
			$this->data[$action]->mergeIdentities($identities);
>>>>>>> upstream/master
		}
		else
		{
			// If new, add the action.
<<<<<<< HEAD
			$this->_data[$action] = new JRule($identities);
=======
			$this->data[$action] = new JRule($identities);
>>>>>>> upstream/master
		}
	}

	/**
	 * Checks that an action can be performed by an identity.
	 *
	 * The identity is an integer where +ve represents a user group,
	 * and -ve represents a user.
	 *
	 * @param   string  $action    The name of the action.
	 * @param   mixed   $identity  An integer representing the identity, or an array of identities
	 *
<<<<<<< HEAD
	 * @return  mixed
=======
	 * @return  mixed   Object or null if there is no information about the action.
>>>>>>> upstream/master
	 *
	 * @since   11.1
	 */
	public function allow($action, $identity)
	{
		// Check we have information about this action.
<<<<<<< HEAD
		if (isset($this->_data[$action])) {
			return $this->_data[$action]->allow($identity);
=======
		if (isset($this->data[$action]))
		{
			return $this->data[$action]->allow($identity);
>>>>>>> upstream/master
		}

		return null;
	}

	/**
	 * Get the allowed actions for an identity.
	 *
<<<<<<< HEAD
	 * @param   mixed  $identity  An integer representing the identity, or an array of identities
	 *
	 * @return  object Allowed actions for the identity or identities
=======
	 * @param   mixed  $identity  An integer representing the identity or an array of identities
	 *
	 * @return  object  Allowed actions for the identity or identities
>>>>>>> upstream/master
	 *
	 * @since   11.1
	 */
	function getAllowed($identity)
	{
		// Sweep for the allowed actions.
		$allowed = new JObject;
<<<<<<< HEAD
		foreach ($this->_data as $name => &$action)
		{
			if ($action->allow($identity)) {
=======
		foreach ($this->data as $name => &$action)
		{
			if ($action->allow($identity))
			{
>>>>>>> upstream/master
				$allowed->set($name, true);
			}
		}
		return $allowed;
	}

	/**
	 * Magic method to convert the object to JSON string representation.
	 *
	 * @return  string  JSON representation of the actions array
	 *
	 * @since   11.1
	 */
	public function __toString()
	{
		$temp = array();
<<<<<<< HEAD
		foreach ($this->_data as $name => $rule)
=======

		foreach ($this->data as $name => $rule)
>>>>>>> upstream/master
		{
			// Convert the action to JSON, then back into an array otherwise
			// re-encoding will quote the JSON for the identities in the action.
			$temp[$name] = json_decode((string) $rule);
		}
<<<<<<< HEAD
=======

>>>>>>> upstream/master
		return json_encode($temp);
	}
}
