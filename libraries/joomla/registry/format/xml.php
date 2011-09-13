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
 * XML format handler for JRegistry.
 *
 * @package     Joomla.Platform
 * @subpackage  Registry
 * @since       11.1
 */
class JRegistryFormatXML extends JRegistryFormat
{
	/**
	 * Converts an object into an XML formatted string.
<<<<<<< HEAD
	 *	-	If more than two levels of nested groups are necessary, since INI is not
	 *		useful, XML or another format should be used.
	 *
	 * @param   object   Data source object.
	 * @param   array    Options used by the formatter.
	 * @return  string   XML formatted string.
=======
	 * -	If more than two levels of nested groups are necessary, since INI is not
	 * useful, XML or another format should be used.
	 *
	 * @param   object  $object   Data source object.
	 * @param   array   $options  Options used by the formatter.
	 *
	 * @return  string  XML formatted string.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function objectToString($object, $options = array())
	{
		// Initialise variables.
		$rootName = (isset($options['name'])) ? $options['name'] : 'registry';
		$nodeName = (isset($options['nodeName'])) ? $options['nodeName'] : 'node';

		// Create the root node.
<<<<<<< HEAD
		$root = simplexml_load_string('<'.$rootName.' />');
=======
		$root = simplexml_load_string('<' . $rootName . ' />');
>>>>>>> upstream/master

		// Iterate over the object members.
		foreach ((array) $object as $k => $v)
		{
<<<<<<< HEAD
			if (is_scalar($v)) {
				$n = $root->addChild($nodeName, $v);
				$n->addAttribute('name', $k);
				$n->addAttribute('type', gettype($v));
			} else {
=======
			if (is_scalar($v))
			{
				$n = $root->addChild($nodeName, $v);
				$n->addAttribute('name', $k);
				$n->addAttribute('type', gettype($v));
			}
			else
			{
>>>>>>> upstream/master
				$n = $root->addChild($nodeName);
				$n->addAttribute('name', $k);
				$n->addAttribute('type', gettype($v));

<<<<<<< HEAD
				$this->_getXmlChildren($n, $v, $nodeName);
=======
				$this->getXmlChildren($n, $v, $nodeName);
>>>>>>> upstream/master
			}
		}

		return $root->asXML();
	}

	/**
	 * Parse a XML formatted string and convert it into an object.
	 *
<<<<<<< HEAD
	 * @param   string   XML formatted string to convert.
	 * @param   array    Options used by the formatter.
	 * @return  object   Data object.
=======
	 * @param   string  $data     XML formatted string to convert.
	 * @param   array   $options  Options used by the formatter.
	 *
	 * @return  object   Data object.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function stringToObject($data, $options = array())
	{
		// Initialize variables.
		$obj = new stdClass;

		// Parse the XML string.
		$xml = simplexml_load_string($data);

<<<<<<< HEAD
		foreach ($xml->children() as $node) {
			$obj->$node['name'] = $this->_getValueFromNode($node);
=======
		foreach ($xml->children() as $node)
		{
			$obj->$node['name'] = $this->getValueFromNode($node);
>>>>>>> upstream/master
		}

		return $obj;
	}

	/**
	 * Method to get a PHP native value for a SimpleXMLElement object. -- called recursively
	 *
<<<<<<< HEAD
	 * @param   object   SimpleXMLElement object for which to get the native value.
	 * @return  mixed    Native value of the SimpleXMLElement object.
	 * @since	2.0
	 */
	protected function _getValueFromNode($node)
	{
		switch ($node['type']) {
=======
	 * @param   object  $node  SimpleXMLElement object for which to get the native value.
	 *
	 * @return  mixed  Native value of the SimpleXMLElement object.
	 *
	 * @since   11.1
	 */
	protected function getValueFromNode($node)
	{
		switch ($node['type'])
		{
>>>>>>> upstream/master
			case 'integer':
				$value = (string) $node;
				return (int) $value;
				break;
			case 'string':
				return (string) $node;
				break;
			case 'boolean':
				$value = (string) $node;
				return (bool) $value;
				break;
			case 'double':
				$value = (string) $node;
				return (float) $value;
				break;
			case 'array':
				$value = array();
<<<<<<< HEAD
				foreach ($node->children() as $child) {
					$value[(string) $child['name']] = $this->_getValueFromNode($child);
=======
				foreach ($node->children() as $child)
				{
					$value[(string) $child['name']] = $this->getValueFromNode($child);
>>>>>>> upstream/master
				}
				break;
			default:
				$value = new stdClass;
<<<<<<< HEAD
				foreach ($node->children() as $child) {
					$value->$child['name'] = $this->_getValueFromNode($child);
=======
				foreach ($node->children() as $child)
				{
					$value->$child['name'] = $this->getValueFromNode($child);
>>>>>>> upstream/master
				}
				break;
		}

		return $value;
	}

	/**
	 * Method to build a level of the XML string -- called recursively
	 *
<<<<<<< HEAD
	 * @param   object   SimpleXMLElement object to attach children.
	 * @param   object   Object that represents a node of the XML document.
	 * @param   string   The name to use for node elements.
	 * @return  void
	 * @since	2.0
	 */
	protected function _getXmlChildren(& $node, $var, $nodeName)
=======
	 * @param   object  &$node     SimpleXMLElement object to attach children.
	 * @param   object  $var       Object that represents a node of the XML document.
	 * @param   string  $nodeName  The name to use for node elements.
	 *
	 * @return  void
	 *
	 * @since   11.1
	 */
	protected function getXmlChildren(&$node, $var, $nodeName)
>>>>>>> upstream/master
	{
		// Iterate over the object members.
		foreach ((array) $var as $k => $v)
		{
<<<<<<< HEAD
			if (is_scalar($v)) {
				$n = $node->addChild($nodeName, $v);
				$n->addAttribute('name', $k);
				$n->addAttribute('type', gettype($v));
			} else {
=======
			if (is_scalar($v))
			{
				$n = $node->addChild($nodeName, $v);
				$n->addAttribute('name', $k);
				$n->addAttribute('type', gettype($v));
			}
			else
			{
>>>>>>> upstream/master
				$n = $node->addChild($nodeName);
				$n->addAttribute('name', $k);
				$n->addAttribute('type', gettype($v));

<<<<<<< HEAD
				$this->_getXmlChildren($n, $v, $nodeName);
=======
				$this->getXmlChildren($n, $v, $nodeName);
>>>>>>> upstream/master
			}
		}
	}
}
