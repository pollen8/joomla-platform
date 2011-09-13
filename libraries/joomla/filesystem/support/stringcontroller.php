<?php
/**
 * @package     Joomla.Platform
 * @subpackage  FileSystem
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
 * String Controller
 *
 * @package     Joomla.Platform
 * @subpackage  FileSystem
 * @since       11.1
 */
<<<<<<< HEAD

class JStringController {

	/**
	 *
	 * @return  array
	 * @since   11.1
	 */
	function _getArray() {
=======
class JStringController
{
	/**
	 * Defines a variable as an array
	 *
	 * @return  array
	 *
	 * @since   11.1
	 */
	function _getArray()
	{
>>>>>>> upstream/master
		static $strings = Array();
		return $strings;
	}

<<<<<<< HEAD
	function createRef($reference, &$string) {
		$ref = &JStringController::_getArray();
		$ref[$reference] =& $string;
	}


	function getRef($reference) {
		$ref = &JStringController::_getArray();
		if(isset($ref[$reference])) {
			return $ref[$reference];
		} else {
=======
	/**
	 * Create a reference
	 *
	 * @param   string  $reference  The key
	 * @param   string  &$string    The value
	 *
	 * @return  void
	 *
	 * @since   11.1
	 */
	function createRef($reference, &$string)
	{
		$ref = &JStringController::_getArray();
		$ref[$reference] = & $string;
	}

	/**
	 * Get reference
	 *
	 * @param   string  $reference  The key for the reference.
	 *
	 * @return  mixed  False if not set, reference if it it exists
	 *
	 * @since   11.1
	 */
	function getRef($reference)
	{
		$ref = &JStringController::_getArray();
		if (isset($ref[$reference]))
		{
			return $ref[$reference];
		}
		else
		{
>>>>>>> upstream/master
			return false;
		}
	}
}