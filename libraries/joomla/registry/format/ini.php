<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Registry
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
 * INI format handler for JRegistry.
 *
 * @package     Joomla.Platform
 * @subpackage  Registry
 * @since       11.1
 */
class JRegistryFormatINI extends JRegistryFormat
{
	protected static $cache = array();

	/**
	 * Converts an object into an INI formatted string
<<<<<<< HEAD
	 *	-	Unfortunately, there is no way to have ini values nested further than two
	 *		levels deep.  Therefore we will only go through the first two levels of
	 *		the object.
	 *
	 * @param   object   Data source object.
	 * @param   array    Options used by the formatter.
	 * @return  string   INI formatted string.
=======
	 * -	Unfortunately, there is no way to have ini values nested further than two
	 * levels deep.  Therefore we will only go through the first two levels of
	 * the object.
	 *
	 * @param   object  $object   Data source object.
	 * @param   array   $options  Options used by the formatter.
	 *
	 * @return  string  INI formatted string.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function objectToString($object, $options = array())
	{
		// Initialize variables.
<<<<<<< HEAD
		$local  = array();
		$global = array();

		// Iterate over the object to set the properties.
		foreach (get_object_vars($object) as $key => $value) {
			// If the value is an object then we need to put it in a local section.
			if (is_object($value)) {
				// Add the section line.
				$local[] = '';
				$local[] = '['.$key.']';

				// Add the properties for this section.
				foreach (get_object_vars($value) as $k => $v) {
					$local[] = $k.'='.$this->_getValueAsINI($v);
				}
			} else {
				// Not in a section so add the property to the global array.
				$global[] = $key.'='.$this->_getValueAsINI($value);
=======
		$local = array();
		$global = array();

		// Iterate over the object to set the properties.
		foreach (get_object_vars($object) as $key => $value)
		{
			// If the value is an object then we need to put it in a local section.
			if (is_object($value))
			{
				// Add the section line.
				$local[] = '';
				$local[] = '[' . $key . ']';

				// Add the properties for this section.
				foreach (get_object_vars($value) as $k => $v)
				{
					$local[] = $k . '=' . $this->getValueAsINI($v);
				}
			}
			else
			{
				// Not in a section so add the property to the global array.
				$global[] = $key . '=' . $this->getValueAsINI($value);
>>>>>>> upstream/master
			}
		}

		return implode("\n", array_merge($global, $local));
	}

	/**
	 * Parse an INI formatted string and convert it into an object.
	 *
<<<<<<< HEAD
	 * @param   string   INI formatted string to convert.
	 * @param   mixed    An array of options used by the formatter, or a boolean setting to process sections.
	 *
	 * @return  object   Data object.
	 * @since   11.1
	 *
=======
	 * @param   string  $data     INI formatted string to convert.
	 * @param   mixed   $options  An array of options used by the formatter, or a boolean setting to process sections.
	 *
	 * @return  object   Data object.
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function stringToObject($data, $options = array())
	{
		// Initialise options.
<<<<<<< HEAD
		if (is_array($options)) {
			$sections = (isset($options['processSections'])) ? $options['processSections'] : false;
		} else {
=======
		if (is_array($options))
		{
			$sections = (isset($options['processSections'])) ? $options['processSections'] : false;
		}
		else
		{
>>>>>>> upstream/master
			// Backward compatibility for 1.5 usage.
			//@deprecated
			$sections = (boolean) $options;
		}

		// Check the memory cache for already processed strings.
<<<<<<< HEAD
		$hash = md5($data.':'.(int) $sections);
		if (isset(self::$cache[$hash])) {
=======
		$hash = md5($data . ':' . (int) $sections);
		if (isset(self::$cache[$hash]))
		{
>>>>>>> upstream/master
			return self::$cache[$hash];
		}

		// If no lines present just return the object.
<<<<<<< HEAD
		if (empty($data)) {
=======
		if (empty($data))
		{
>>>>>>> upstream/master
			return new stdClass;
		}

		// Initialize variables.
<<<<<<< HEAD
		$obj = new stdClass();
=======
		$obj = new stdClass;
>>>>>>> upstream/master
		$section = false;
		$lines = explode("\n", $data);

		// Process the lines.
<<<<<<< HEAD
		foreach ($lines as $line) {
=======
		foreach ($lines as $line)
		{
>>>>>>> upstream/master
			// Trim any unnecessary whitespace.
			$line = trim($line);

			// Ignore empty lines and comments.
<<<<<<< HEAD
			if (empty($line) || ($line{0} == ';')) {
				continue;
			}

			if ($sections) {
				$length = strlen($line);

				// If we are processing sections and the line is a section add the object and continue.
				if (($line[0] == '[') && ($line[$length-1] == ']')) {
					$section = substr($line, 1, $length-2);
					$obj->$section = new stdClass();
					continue;
				}
			} else if ($line{0} == '[') {
=======
			if (empty($line) || ($line{0} == ';'))
			{
				continue;
			}

			if ($sections)
			{
				$length = strlen($line);

				// If we are processing sections and the line is a section add the object and continue.
				if (($line[0] == '[') && ($line[$length - 1] == ']'))
				{
					$section = substr($line, 1, $length - 2);
					$obj->$section = new stdClass;
					continue;
				}
			}
			else if ($line{0} == '[')
			{
>>>>>>> upstream/master
				continue;
			}

			// Check that an equal sign exists and is not the first character of the line.
<<<<<<< HEAD
			if (!strpos($line, '=')) {
=======
			if (!strpos($line, '='))
			{
>>>>>>> upstream/master
				// Maybe throw exception?
				continue;
			}

			// Get the key and value for the line.
<<<<<<< HEAD
			list($key, $value) = explode('=', $line, 2);

			// Validate the key.
			if (preg_match('/[^A-Z0-9_]/i', $key)) {
=======
			list ($key, $value) = explode('=', $line, 2);

			// Validate the key.
			if (preg_match('/[^A-Z0-9_]/i', $key))
			{
>>>>>>> upstream/master
				// Maybe throw exception?
				continue;
			}

			// If the value is quoted then we assume it is a string.
			$length = strlen($value);
<<<<<<< HEAD
			if ($length && ($value[0] == '"') && ($value[$length-1] == '"')) {
				// Strip the quotes and Convert the new line characters.
				$value = stripcslashes(substr($value, 1, ($length-2)));
				$value = str_replace('\n', "\n", $value);
			} else {
				// If the value is not quoted, we assume it is not a string.

				// If the value is 'false' assume boolean false.
				if ($value == 'false') {
					$value = false;
				}
				// If the value is 'true' assume boolean true.
				elseif ($value == 'true') {
					$value = true;
				}
				// If the value is numeric than it is either a float or int.
				elseif (is_numeric($value)) {
					// If there is a period then we assume a float.
					if (strpos($value, '.') !== false) {
						$value = (float) $value;
					}
					else {
=======
			if ($length && ($value[0] == '"') && ($value[$length - 1] == '"'))
			{
				// Strip the quotes and Convert the new line characters.
				$value = stripcslashes(substr($value, 1, ($length - 2)));
				$value = str_replace('\n', "\n", $value);
			}
			else
			{
				// If the value is not quoted, we assume it is not a string.

				// If the value is 'false' assume boolean false.
				if ($value == 'false')
				{
					$value = false;
				}
				// If the value is 'true' assume boolean true.
				elseif ($value == 'true')
				{
					$value = true;
				}
				// If the value is numeric than it is either a float or int.
				elseif (is_numeric($value))
				{
					// If there is a period then we assume a float.
					if (strpos($value, '.') !== false)
					{
						$value = (float) $value;
					}
					else
					{
>>>>>>> upstream/master
						$value = (int) $value;
					}
				}
			}

			// If a section is set add the key/value to the section, otherwise top level.
<<<<<<< HEAD
			if ($section) {
				$obj->$section->$key = $value;
			} else {
=======
			if ($section)
			{
				$obj->$section->$key = $value;
			}
			else
			{
>>>>>>> upstream/master
				$obj->$key = $value;
			}
		}

		// Cache the string to save cpu cycles -- thus the world :)
<<<<<<< HEAD
		self::$cache[$hash] = clone($obj);
=======
		self::$cache[$hash] = clone ($obj);
>>>>>>> upstream/master

		return $obj;
	}

	/**
	 * Method to get a value in an INI format.
	 *
<<<<<<< HEAD
	 * @param   mixed    The value to convert to INI format.
	 * @return  string   The value in INI format.
	 * @since   11.1
	 */
	protected function _getValueAsINI($value)
=======
	 * @param   mixed  $value  The value to convert to INI format.
	 *
	 * @return  string  The value in INI format.
	 *
	 * @since   11.1
	 */
	protected function getValueAsINI($value)
>>>>>>> upstream/master
	{
		// Initialize variables.
		$string = '';

<<<<<<< HEAD
		switch (gettype($value)) {
=======
		switch (gettype($value))
		{
>>>>>>> upstream/master
			case 'integer':
			case 'double':
				$string = $value;
				break;

			case 'boolean':
				$string = $value ? 'true' : 'false';
				break;

			case 'string':
				// Sanitize any CRLF characters..
<<<<<<< HEAD
				$string = '"'.str_replace(array("\r\n", "\n"), '\\n', $value).'"';
=======
				$string = '"' . str_replace(array("\r\n", "\n"), '\\n', $value) . '"';
>>>>>>> upstream/master
				break;
		}

		return $string;
	}
}
