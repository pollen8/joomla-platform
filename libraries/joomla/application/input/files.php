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
=======
defined('JPATH_PLATFORM') or die();
>>>>>>> upstream/master

jimport('joomla.application.input');

/**
 * Joomla! Input Files Class
 *
 * @package     Joomla.Platform
 * @subpackage  Application
 * @since       11.1
 */
class JInputFiles extends JInput
{
<<<<<<< HEAD

	protected $_decodedData = array();
=======
	protected $decodedData = array();
>>>>>>> upstream/master

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
			$results = $this->decodeData(
				array(
					$this->data[$name]['name'],
					$this->data[$name]['type'],
					$this->data[$name]['tmp_name'],
					$this->data[$name]['error'],
					$this->data[$name]['size']
				)
			);
			return $results;
		}

		return $default;

	}

<<<<<<< HEAD
=======
	/**
	 * Method to decode a data array.
	 *
	 * @param   array  $data  The data array to decode.
	 *
	 * @return  array
	 *
	 * @since   11.1
	 */
>>>>>>> upstream/master
	protected function decodeData($data)
	{
		$result = array();

<<<<<<< HEAD
		if (is_array($data[0])) {
			foreach ($data[0] AS $k => $v) {
=======
		if (is_array($data[0]))
		{
			foreach ($data[0] as $k => $v)
			{
>>>>>>> upstream/master
				$result[$k] = $this->decodeData(array($data[0][$k], $data[1][$k], $data[2][$k], $data[3][$k], $data[4][$k]));
			}
			return $result;
		}

<<<<<<< HEAD
		return array(
				'name' => $data[0], 'type' => $data[1], 'tmp_name' => $data[2], 'error' => $data[3], 'size' => $data[4]
		);
=======
		return array('name' => $data[0], 'type' => $data[1], 'tmp_name' => $data[2], 'error' => $data[3], 'size' => $data[4]);
>>>>>>> upstream/master
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

	}
}
