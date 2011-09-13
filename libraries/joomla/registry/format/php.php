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
 * PHP class format handler for JRegistry
 *
 * @package     Joomla.Platform
 * @subpackage  Registry
 * @since       11.1
 */
<<<<<<< HEAD
class JRegistryFormatPHP extends JRegistryFormat {

	/**
	 * Converts an object into a php class string.
	 *	- NOTE: Only one depth level is supported.
	 *
	 * @param   object   Data Source Object
	 * @param   array    Parameters used by the formatter
	 * @return  string   Config class formatted string
=======
class JRegistryFormatPHP extends JRegistryFormat
{
	/**
	 * Converts an object into a php class string.
	 * - NOTE: Only one depth level is supported.
	 *
	 * @param   object  $object  Data Source Object
	 * @param   array   $params  Parameters used by the formatter
	 *
	 * @return  string  Config class formatted string
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function objectToString($object, $params = array())
	{
		// Build the object variables string
		$vars = '';
<<<<<<< HEAD
		foreach (get_object_vars($object) as $k => $v) {
			if (is_scalar($v)) {
				$vars .= "\tpublic $". $k . " = '" . addcslashes($v, '\\\'') . "';\n";
			} else if (is_array($v)) {
				$vars .= "\tpublic $". $k . " = " . $this->_getArrayString($v) . ";\n";
			}
		}

		$str = "<?php\nclass ".$params['class']." {\n";
=======
		foreach (get_object_vars($object) as $k => $v)
		{
			if (is_scalar($v))
			{
				$vars .= "\tpublic $" . $k . " = '" . addcslashes($v, '\\\'') . "';\n";
			}
			else if (is_array($v))
			{
				$vars .= "\tpublic $" . $k . " = " . $this->getArrayString($v) . ";\n";
			}
		}

		$str = "<?php\nclass " . $params['class'] . " {\n";
>>>>>>> upstream/master
		$str .= $vars;
		$str .= "}";

		// Use the closing tag if it not set to false in parameters.
<<<<<<< HEAD
		if (!isset($params['closingtag']) || $params['closingtag'] !== false) {
=======
		if (!isset($params['closingtag']) || $params['closingtag'] !== false)
		{
>>>>>>> upstream/master
			$str .= "\n?>";
		}

		return $str;
	}

	/**
<<<<<<< HEAD
	 * Placeholder method
	 *
	 * @return  boolean  True
	 */
	function stringToObject($data, $namespace='')
=======
	 * Parse a PHP class formatted string and convert it into an object.
	 *
	 * @param   string  $data     PHP Class formatted string to convert.
	 * @param   array   $options  Options used by the formatter.
	 *
	 * @return  object   Data object.
	 *
	 * @since   11.1
	 */
	function stringToObject($data, $options = array())
>>>>>>> upstream/master
	{
		return true;
	}

<<<<<<< HEAD
	protected function _getArrayString($a)
	{
		$s = 'array(';
		$i = 0;
		foreach ($a as $k => $v) {
			$s .= ($i) ? ', ' : '';
			$s .= '"'.$k.'" => ';
			if (is_array($v)) {
				$s .= $this->_getArrayString($v);
			} else {
				$s .= '"'.addslashes($v).'"';
=======
	/**
	 * Method to get an array as an exported string.
	 *
	 * @param   array  $a  The array to get as a string.
	 *
	 * @return  array
	 *
	 * @since   11.1
	 */
	protected function getArrayString($a)
	{
		$s = 'array(';
		$i = 0;
		foreach ($a as $k => $v)
		{
			$s .= ($i) ? ', ' : '';
			$s .= '"' . $k . '" => ';
			if (is_array($v))
			{
				$s .= $this->getArrayString($v);
			}
			else
			{
				$s .= '"' . addslashes($v) . '"';
>>>>>>> upstream/master
			}
			$i++;
		}
		$s .= ')';
		return $s;
	}
}
