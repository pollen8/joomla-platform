<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Utilities
 *
 * @copyright   Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('JPATH_PLATFORM') or die;

/**
 * SimpleXML implementation.
 *
 * The XML Parser extension (expat) is required to use JSimpleXML.
 *
 * The class provides a pure PHP4 implementation of the PHP5
 * interface SimpleXML. As with PHP5's SimpleXML it is what it says:
 * simple. Nevertheless, it is an easy way to deal with XML data,
 * especially for read only access.
 *
 * Because it's not possible to use the PHP5 ArrayIterator interface
 * with PHP4 there are some differences between this implementation
 * and that of PHP5:
 *
 * 		The access to the root node has to be explicit in
 * 		JSimpleXML, not implicit as with PHP5. Write
 * 		$xml->document->node instead of $xml->node
 * 		You cannot acces CDATA using array syntax. Use the method data() instead
<<<<<<< HEAD
 * 		You cannot access attributes directly with array syntax. use attributes()
=======
 * 		You cannot access attributes directly with array syntax. Use attributes()
>>>>>>> upstream/master
 * 		to read them.
 * 		Comments are ignored.
 * 		Last and least, this is not as fast as PHP5 SimpleXML--it is pure PHP4.
 *
 * Example:
 * <code>
 * :simple.xml:
 * <?xml version="1.0" encoding="utf-8" standalone="yes"?>
 * <document>
 *   <node>
 *	<child gender="m">Tom Foo</child>
 *	<child gender="f">Tamara Bar</child>
 *   <node>
 * </document>
 *
 * ---
 *
 * // read and write a document
 * $xml = new JSimpleXML;
 * $xml->loadFile('simple.xml');
 * print $xml->document->toString();
 *
 * // access a given node's CDATA
 * print $xml->root->node->child[0]->data(); // Tom Foo
 *
 * // access attributes
 * $attr = $xml->root->node->child[1]->attributes();
 * print $attr['gender']; // f
 *
 * // access children
 * foreach($xml->root->node->children() as $child) {
 *   print $child->data();
 * }
 * </code>
 *
 * Note: JSimpleXML cannot be used to access sophisticated XML doctypes
 * using datatype ANY (e.g. XHTML). With a DOM implementation you can
 * handle this.
 *
 * @package     Joomla.Platform
 * @subpackage  Utilities
<<<<<<< HEAD
 * @since   11.1
 * @deprecated
=======
 * @see         http://www.php.net/manual/en/book.simplexml.php
 * @since       11.1
 * @deprecated  12.1  Use SimpleXML instead
>>>>>>> upstream/master
 */
class JSimpleXML extends JObject
{
	/**
	 * The XML parser
	 *
<<<<<<< HEAD
	 * @var resource
=======
	 * @var     resource
	 * @since   11.1
>>>>>>> upstream/master
	 */
	var $_parser = null;

	/**
<<<<<<< HEAD
	* The XML document
	*
	* @var string
	*/
	var $_xml = '';

	/**
	* Document element
	*
	* @var object
	*/
	var $document = null;

	/**
	* Current object depth
	*
	* @var array
	*/
	var $_stack = array();


	/**
	 * Constructor.
	 *
	 */
	public function __construct($options = null)
	{
		if (! function_exists('xml_parser_create')) {
=======
	 * The XML document
	 *
	 * @var    string
	 * @since  11.1
	 */
	var $_xml = '';

	/**
	 * Document element
	 *
	 * @var     object
	 * @since   11.1
	 */
	var $document = null;

	/**
	 * Current object depth
	 *
	 * @var      array
	 * @since   11.1
	 */
	var $_stack = array();

	/**
	 * Constructor.
	 *
	 * @param   array  $options  Options
	 *
	 * @return  mixed  Boolean false if xml_parser_create is not defined.
	 *
	 * @deprecated    12.1   Use SimpleXML instead.
	 * @see           http://www.php.net/manual/en/book.simplexml.php
	 * @since    11.1
	 */
	public function __construct($options = null)
	{
		// Deprecation warning.
		JLog::add('JSimpleXML::__construct() is deprecated.', JLog::WARNING, 'deprecated');

		if (! function_exists('xml_parser_create'))
		{
>>>>>>> upstream/master
			// TODO throw warning
			return false;
		}

		// Create the parser resource and make sure both versions of PHP autodetect the format.
		$this->_parser = xml_parser_create('');

		// Check parser resource
		xml_set_object($this->_parser, $this);
		xml_parser_set_option($this->_parser, XML_OPTION_CASE_FOLDING, 0);
		if (is_array($options))
		{
<<<<<<< HEAD
			foreach($options as $option => $value) {
=======
			foreach ($options as $option => $value)
			{
>>>>>>> upstream/master
				xml_parser_set_option($this->_parser, $option, $value);
			}
		}

		// Set the handlers
		xml_set_element_handler($this->_parser, '_startElement', '_endElement');
		xml_set_character_data_handler($this->_parser, '_characterData');
	}

	/**
	 * Interprets a string of XML into an object
	 *
	 * This function will take the well-formed XML string data and return an object of class
	 * JSimpleXMLElement with properties containing the data held within the XML document.
	 * If any errors occur, it returns FALSE.
	 *
<<<<<<< HEAD
	 * @param   string  Well-formed XML string data
	 * @param   string  currently ignored
	 *
	 * @return  object  JSimpleXMLElement
	 */
	function loadString($string, $classname = null) {
		$this->_parse($string);
=======
	 * @param   string  $string     Well-formed XML string data
	 * @param   string  $classname  currently ignored
	 *
	 * @return  object  JSimpleXMLElement
	 *
	 * @since   11.1
	 *
	 * @deprecated    12.1  Use simpleXML_load_string
	 * @see           http://www.php.net/manual/en/function.simplexml-load-string.php
	 */
	function loadString($string, $classname = null)
	{
		// Deprecation warning.
		JLog::add('JSimpleXML::loadString() is deprecated.', JLog::WARNING, 'deprecated');

		$this->_parse($string);

>>>>>>> upstream/master
		return true;
	}

	/**
	 * Interprets an XML file into an object
	 *
	 * This function will convert the well-formed XML document in the file specified by filename
	 * to an object  of class JSimpleXMLElement. If any errors occur during file access or
	 * interpretation, the function returns FALSE.
	 *
<<<<<<< HEAD
	 * @param   string  Path to XML file containing a well-formed XML document
	 * @param   string  currently ignored
	 * @return  boolean  True if successful, false if file empty
	 */
	function loadFile($path, $classname = null)
	{
		//Check to see of the path exists
		if (!file_exists($path))  {
=======
	 * @param   string  $path       Path to XML file containing a well-formed XML document
	 * @param   string  $classname  currently ignored
	 *
	 * @return  boolean  True if successful, false if file empty
	 *
	 * @deprecated     12.1  Use simplexml_load_file instead
	 * @see            http://www.php.net/manual/en/function.simplexml-load-file.php
	 * @since   11.1
	 */
	function loadFile($path, $classname = null)
	{
		// Deprecation warning.
		JLog::add('JSimpleXML::loadfile() is deprecated.', JLog::WARNING, 'deprecated');

		//Check to see of the path exists
		if (!file_exists($path))
		{

>>>>>>> upstream/master
			return false;
		}

		//Get the XML document loaded into a variable
		$xml = trim(file_get_contents($path));
		if ($xml == '')
		{
			return false;
		}
		else
		{
			$this->_parse($xml);
<<<<<<< HEAD
=======

>>>>>>> upstream/master
			return true;
		}
	}

	/**
	 * Get a JSimpleXMLElement object from a DOM node.
	 *
	 * This function takes a node of a DOM  document and makes it into a JSimpleXML node.
	 * This new object can then be used as a native JSimpleXML element. If any errors occur,
	 * it returns FALSE.
	 *
<<<<<<< HEAD
	 * @param   string  DOM  document
	 * @param   string  currently ignored
	 * @return  object  JSimpleXMLElement
	 */
	function importDOM($node, $classname = null) {
=======
	 * @param   string  $node       DOM  document
	 * @param   string  $classname  currently ignored
	 *
	 * @return  mixed  JSimpleXMLElement or false if any errors occur
	 *
	 * @deprecated    12.1    use simplexml_import_dom instead.
	 * @see           http://www.php.net/manual/en/function.simplexml-import-dom.php
	 * @since   11.1
	 */
	function importDOM($node, $classname = null)
	{
		// Deprecation warning.
		JLog::add('JSimpleXML::importDOM() is deprecated.', JLog::WARNING, 'deprecated');

>>>>>>> upstream/master
		return false;
	}

	/**
	 * Get the parser
	 *
<<<<<<< HEAD
	 * @return resource XML parser resource handle
	 */
	public function getParser() {
=======
	 * @return  resource  XML parser resource handle
	 *
	 * @deprecated    12.1   Use SimpleXMLElement
	 * @see           http://www.php.net/manual/en/class.simplexmlelement.php
	 * @since   11.1
	 */
	public function getParser()
	{
		// Deprecation warning.
		JLog::add('JSimpleXML::getParser() is deprecated.', JLog::WARNING, 'deprecated');

>>>>>>> upstream/master
		return $this->_parser;
	}

	/**
	 * Set the parser
	 *
<<<<<<< HEAD
	 * @param resource	XML parser resource handle
	 */
	public function setParser($parser) {
=======
	 * @param   resource  $parser  XML parser resource handle.
	 *
	 * @return  void
	 *
	 * @deprecated    12.1  Use SimpleXML
	 * @see     http://www.php.net/manual/en/class.simplexml.php
	 * @since   11.1
	 */
	public function setParser($parser)
	{
		// Deprecation warning.
		JLog::add('JSimpleXML::setParser() is deprecated.', JLog::WARNING, 'deprecated');

>>>>>>> upstream/master
		$this->_parser = $parser;
	}

	/**
	 * Start parsing an XML document
	 *
	 * Parses an XML document. The handlers for the configured events are called as many times as necessary.
	 *
<<<<<<< HEAD
	 * @param $xml	string	data to parse
	 */
	protected function _parse($data = '')
	{
		//Error handling
		if (!xml_parse($this->_parser, $data)) {
			$this->_handleError(
				xml_get_error_code($this->_parser),
				xml_get_current_line_number($this->_parser),
=======
	 * @param   string  $data  data to parse
	 *
	 * @return  void
	 *
	 * @deprecated    12.1
	 * @see     http://www.php.net/manual/en/class.simplexml.php
	 * @since   11.1
	 */
	protected function _parse($data = '')
	{
		// Deprecation warning.
		JLog::add('JSimpleXML::_parse() is deprecated.', JLog::WARNING, 'deprecated');

		//Error handling
		if (!xml_parse($this->_parser, $data))
		{
			$this->_handleError(
				xml_get_error_code($this->_parser), xml_get_current_line_number($this->_parser),
>>>>>>> upstream/master
				xml_get_current_column_number($this->_parser)
			);
		}

		//Free the parser
		xml_parser_free($this->_parser);
	}

	/**
	 * Handles an XML parsing error
	 *
<<<<<<< HEAD
	 * @param   integer  $code XML Error Code
	 * @param   integer  $line Line on which the error happened
	 * @param   integer  $col Column on which the error happened
	 */
	protected function _handleError($code, $line, $col)
	{
		JError::raiseWarning('SOME_ERROR_CODE' , 'XML Parsing Error at '.$line.':'.$col.'. Error '.$code.': '.xml_error_string($code));
=======
	 * @param   integer  $code  XML Error Code.
	 * @param   integer  $line  Line on which the error happened.
	 * @param   integer  $col   Column on which the error happened.
	 *
	 * @return  void
	 *
	 * @deprecated  12.1
	 * @since   11.1
	 *
	 * @deprecated   12.1   Use PHP Exception
	 */
	protected function _handleError($code, $line, $col)
	{
		// Deprecation warning.
		JLog::add('JSimpleXML::_handleError() is deprecated.', JLog::WARNING, 'deprecated');

		JError::raiseWarning('SOME_ERROR_CODE', 'XML Parsing Error at '.$line.':'.$col.'. Error '.$code.': '.xml_error_string($code));

>>>>>>> upstream/master
	}

	/**
	 * Gets the reference to the current direct parent
	 *
	 * @return  object
<<<<<<< HEAD
	 * @since   11.1
	 */
	protected function _getStackLocation()
	{
		$return = '';
		foreach($this->_stack as $stack) {
			$return .= $stack.'->';
=======
	 *
	 * @since   11.1
	 *
	 * @deprecated   12.1
	 */
	protected function _getStackLocation()
	{
		// Deprecation warning.
		JLog::add('JSimpleXML::_getStackLocation() is deprecated.', JLog::WARNING, 'deprecated');

		$return = '';
		foreach ($this->_stack as $stack)
		{
			$return .= $stack . '->';
>>>>>>> upstream/master
		}

		return rtrim($return, '->');
	}

	/**
	 * Handler function for the start of a tag
	 *
<<<<<<< HEAD
	 * @param resource $parser
	 * @param   string  $name
	 * @param   array   $attrs
	 */
	protected function _startElement($parser, $name, $attrs = array())
	{
=======
	 * @param   resource  $parser  The XML parser.
	 * @param   string    $name    The name of the element.
	 * @param   array     $attrs   A key-value array (optional) of the attributes for the element.
	 *
	 * @return  void
	 *
	 * @since   11.1
	 *
	 * @deprecated  12.1
	 */
	protected function _startElement($parser, $name, $attrs = array())
	{
		// Deprecation warning.
		JLog::add('JSimpleXML::startElement() is deprecated.', JLog::WARNING, 'deprecated');

>>>>>>> upstream/master
		//  Check to see if tag is root-level
		$count = count($this->_stack);
		if ($count == 0)
		{
			// If so, set the document as the current tag
			$classname = get_class($this) . 'Element';
			$this->document = new $classname($name, $attrs);

			// And start out the stack with the document tag
			$this->_stack = array('document');
		}
		// If it isn't root level, use the stack to find the parent
		else
		{
			// Get the name which points to the current direct parent, relative to $this
			$parent = $this->_getStackLocation();

			// Add the child
<<<<<<< HEAD
			eval('$this->'.$parent.'->addChild($name, $attrs, '.$count.');');

			// Update the stack
			eval('$this->_stack[] = $name.\'[\'.(count($this->'.$parent.'->'.$name.') - 1).\']\';');
=======
			eval('$this->' . $parent . '->addChild($name, $attrs, ' . $count . ');');

			// Update the stack
			eval('$this->_stack[] = $name.\'[\'.(count($this->' . $parent . '->' . $name . ') - 1).\']\';');
>>>>>>> upstream/master
		}
	}

	/**
	 * Handler function for the end of a tag
	 *
<<<<<<< HEAD
	 * @param   resource  $parser
	 * @param   string    $name
	 */
	protected function _endElement($parser, $name)
	{
=======
	 * @param   resource  $parser  The XML parser.
	 * @param   string    $name    The name of the element.
	 *
	 * @return  void
	 *
	 * @deprecated  12.1
	 * @since   11.1
	 */
	protected function _endElement($parser, $name)
	{
		// Deprecation warning.
		JLog::add('JSimpleXML::endElement() is deprecated.', JLog::WARNING, 'deprecated');

>>>>>>> upstream/master
		//Update stack by removing the end value from it as the parent
		array_pop($this->_stack);
	}

	/**
	 * Handler function for the character data within a tag
	 *
<<<<<<< HEAD
	 * @param   resource  $parser
	 * @param   string    $data
	 */
	protected function _characterData($parser, $data)
	{
=======
	 * @param   resource  $parser  The XML parser.
	 * @param   string    $data    The CDATA for the element.
	 *
	 * @return  void
	 *
	 * @deprecated  12.1
	 * @since   11.1
	 */
	protected function _characterData($parser, $data)
	{
		// Deprecation warning.
		JLog::add('JSimpleXML::_characterData() is deprecated.', JLog::WARNING, 'deprecated');

>>>>>>> upstream/master
		// Get the reference to the current parent object
		$tag = $this->_getStackLocation();

		// Assign data to it
<<<<<<< HEAD
		eval('$this->'.$tag.'->_data .= $data;');
=======
		eval('$this->' . $tag . '->_data .= $data;');
>>>>>>> upstream/master
	}
}

/**
 * SimpleXML Element
 *
 * This object stores all of the direct children of itself in the $children array.
 * They are also stored by type as arrays. So, if, for example, this tag had 2 <font>
 * tags as children, there would be a class member called $font created as an array.
 * $font[0] would be the first font tag, and $font[1] would be the second.
 *
 * To loop through all of the direct children of this object, the $children member
 *  should be used.
 *
 * To loop through all of the direct children of a specific tag for this object, it
 * is probably easier to use the arrays of the specific tag names, as explained above.
 *
 * @package     Joomla.Platform
 * @subpackage  Utilities
<<<<<<< HEAD
 * @since   11.1
 * @deprecated
=======
 * @see         http://www.php.net/manual/en/class.simplexmlelement.php
 * @since       11.1
 * @deprecated  12.1   Use SimpleXMLElement instead
>>>>>>> upstream/master
 */
class JSimpleXMLElement extends JObject
{
	/**
	 * Array with the attributes of this XML element
	 *
	 * @var array
<<<<<<< HEAD
=======
	 * @since   11.1
>>>>>>> upstream/master
	 */
	var $_attributes = array();

	/**
	 * The name of the element
	 *
<<<<<<< HEAD
	 * @var string
=======
	 * @var     string
	 * @since   11.1
>>>>>>> upstream/master
	 */
	var $_name = '';

	/**
	 * The data the element contains
	 *
<<<<<<< HEAD
	 * @var string
=======
	 * @var     string
	 * @since   11.1
>>>>>>> upstream/master
	 */
	var $_data = '';

	/**
	 * Array of references to the objects of all direct children of this XML object
	 *
<<<<<<< HEAD
	 * @var array
=======
	 * @var     array
	 * @since   11.1
>>>>>>> upstream/master
	 */
	var $_children = array();

	/**
	 * The level of this XML element
	 *
<<<<<<< HEAD
	 * @var int
=======
	 * @var     int
	 * @since   11.1
>>>>>>> upstream/master
	 */
	var $_level = 0;

	/**
	 * Constructor, sets up all the default values
	 *
<<<<<<< HEAD
	 * @param   string   $name
	 * @param   array    $attrs
	 * @param   integer  $parents
	 *
	 * @return JSimpleXMLElement
	 */
	function __construct($name, $attrs = array(), $level = 0)
	{
=======
	 * @param   string   $name   The name of the element.
	 * @param   array    $attrs  A key-value array (optional) of the attributes for the element.
	 * @param   integer  $level  The level (optional) of the element.
	 *
	 * @return  JSimpleXMLElement
	 *
	 * @deprecated  12.1 Use SimpleXMLElement
	 * @since   11.1
	 */
	function __construct($name, $attrs = array(), $level = 0)
	{
		// Deprecation warning.
		JLog::add('JSimpleXMLElement::__construct() is deprecated.', JLog::WARNING, 'deprecated');

>>>>>>> upstream/master
		//Make the keys of the attr array lower case, and store the value
		$this->_attributes = array_change_key_case($attrs, CASE_LOWER);

		//Make the name lower case and store the value
		$this->_name = strtolower($name);

		//Set the level
		$this->_level = $level;
	}

	/**
	 * Get the name of the element
	 *
	 * @return  string
<<<<<<< HEAD
	 */
	public function name() {
=======
	 *
	 * @deprecated   12.1
	 * @since   11.1
	 */

	public function name()
	{
		// Deprecation warning.
		JLog::add('JSimpleXMLElement::name() is deprecated.', JLog::WARNING, 'deprecated');

>>>>>>> upstream/master
		return $this->_name;
	}

	/**
	 * Get the an attribute of the element
	 *
<<<<<<< HEAD
	 * @param   string  $attribute	The name of the attribute
	 *
	 * @return  mixed  If an attribute is given will return the attribute if it exist.
	 *				If no attribute is given will return the complete attributes array
	 */
	public function attributes($attribute = null)
	{
		if (!isset($attribute)) {
=======
	 * @param   string  $attribute  The name of the attribute
	 *
	 * @return  mixed   If an attribute is given will return the attribute if it exist.
	 *                  If no attribute is given will return the complete attributes array
	 *
	 * @deprecated  12.1
	 * @since   11.1
	 */
	public function attributes($attribute = null)
	{
		// Deprecation warning.
		JLog::add('JSimpleXMLElement::attributes() is deprecated.', JLog::WARNING, 'deprecated');

		if (!isset($attribute))
		{
>>>>>>> upstream/master
			return $this->_attributes;
		}

		return isset($this->_attributes[$attribute]) ? $this->_attributes[$attribute] : null;
	}

	/**
	 * Get the data of the element
	 *
	 * @return  string
<<<<<<< HEAD
	 */
	public function data() {
=======
	 *
	 * @deprecated   12.1  Use SimpleXMLElement
	 * @since   11.1
	 */

	public function data()
	{
		// Deprecation warning.
		JLog::add('JSimpleXMLElement::data() is deprecated.', JLog::WARNING, 'deprecated');

>>>>>>> upstream/master
		return $this->_data;
	}

	/**
	 * Set the data of the element
	 *
<<<<<<< HEAD
	 * @param   string  $data
	 * @return  string
	 */
	public function setData($data) {
=======
	 * @param   string  $data  The CDATA for the element.
	 *
	 * @return  string
	 *
	 * @deprecated  12.1  Use SimpleXMLElement
	 * @since   11.1
	 */

	public function setData($data)
	{
		// Deprecation warning.
		JLog::add('JSimpleXMLElement::data() is deprecated.', JLog::WARNING, 'deprecated');

>>>>>>> upstream/master
		$this->_data = $data;
	}

	/**
	 * Get the children of the element
	 *
	 * @return  array
<<<<<<< HEAD
	 */
	public function children() {
=======
	 *
	 * @deprecated   12.1
	 * @since   11.1
	 */

	public function children()
	{
		// Deprecation warning.
		JLog::add('JSimpleXMLElement::children() is deprecated.', JLog::WARNING, 'deprecated');

>>>>>>> upstream/master
		return $this->_children;
	}

	/**
	 * Get the level of the element
	 *
<<<<<<< HEAD
	 * @return int
	 */
	public function level() {
=======
	 * @return       integer
	 *
	 * @since   11.1
	 * @deprecated   12.1
	 */
	public function level()
	{
		// Deprecation warning.
		JLog::add('JSimpleXMLElement::level() is deprecated.', JLog::WARNING, 'deprecated');

>>>>>>> upstream/master
		return $this->_level;
	}

	/**
	 * Adds an attribute to the element
	 *
<<<<<<< HEAD
	 * @param   string  $name
	 * @param   array   $attrs
	 */
	function addAttribute($name, $value)
	{
=======
	 * @param   string  $name   The key
	 * @param   array   $value  The value for the key
	 *
	 * @return  void
	 *
	 * @deprecated  12.1
	 * @since   11.1
	 */
	function addAttribute($name, $value)
	{
		// Deprecation warning.
		JLog::add('JSimpleXMLElement::addAttribute() is deprecated.', JLog::WARNING, 'deprecated');

>>>>>>> upstream/master
		// Add the attribute to the element, override if it already exists
		$this->_attributes[$name] = $value;
	}

	/**
	 * Removes an attribute from the element
	 *
<<<<<<< HEAD
	 * @param   string  $name
	 */
	function removeAttribute($name)
	{
=======
	 * @param   string  $name  The name of the attribute.
	 *
	 * @return  void
	 *
	 * @deprecated  12.1
	 * @since   11.1
	 */
	function removeAttribute($name)
	{
		// Deprecation warning.
		JLog::add('JSimpleXMLElement::removeAttribute() is deprecated.', JLog::WARNING, 'deprecated');

>>>>>>> upstream/master
		unset($this->_attributes[$name]);
	}

	/**
	 * Adds a direct child to the element
	 *
<<<<<<< HEAD
	 * @param   string   $name
	 * @param   array    $attrs
	 * @param   integer  $level
	 *
	 * @return JSimpleXMLElement	The added child object
	 */
	function addChild($name, $attrs = array(), $level = null)
	{
		//If there is no array already set for the tag name being added,
		//create an empty array for it
		if (!isset($this->$name)) {
=======
	 * @param   string   $name   The name of the element.
	 * @param   array    $attrs  An key-value array of the element attributes.
	 * @param   integer  $level  The level of the element (optional).
	 *
	 * @return  JSimpleXMLElement  The added child object
	 *
	 * @deprecated   12.1
	 * @since   11.1
	 */
	function addChild($name, $attrs = array(), $level = null)
	{
		// Deprecation warning.
		JLog::add('JSimpleXMLElement::addChild() is deprecated.', JLog::WARNING, 'deprecated');

		//If there is no array already set for the tag name being added,
		//create an empty array for it
		if (!isset($this->$name))
		{
>>>>>>> upstream/master
			$this->$name = array();
		}

		// set the level if not already specified
<<<<<<< HEAD
		if ($level == null)	{
=======
		if ($level == null)
		{
>>>>>>> upstream/master
			$level = ($this->_level + 1);
		}

		//Create the child object itself
		$classname = get_class($this);
		$child = new $classname($name, $attrs, $level);

		//Add the reference of it to the end of an array member named for the elements name
		$this->{$name}[] = &$child;

		//Add the reference to the children array member
		$this->_children[] = &$child;

		//return the new child
		return $child;
	}

<<<<<<< HEAD
	function removeChild(&$child)
	{
		$name = $child->name();
		for ($i=0,$n=count($this->_children);$i<$n;$i++)
		{
			if ($this->_children[$i] == $child) {
				unset($this->_children[$i]);
			}
		}
		for ($i=0,$n=count($this->{$name});$i<$n;$i++)
		{
			if ($this->{$name}[$i] == $child) {
=======
	/**
	 * Remove the child node.
	 *
	 * @param   JSimpleXmlElement  &$child  The child element to remove.
	 *
	 * @return  void
	 *
	 * @since   11.1
	 * @deprecated  12.1
	 */
	function removeChild(&$child)
	{
		// Deprecation warning.
		JLog::add('JSimpleXMLElement::removeChild() is deprecated.', JLog::WARNING, 'deprecated');

		$name = $child->name();
		for ($i = 0, $n = count($this->_children); $i < $n; $i++)
		{
			if ($this->_children[$i] == $child)
			{
				unset($this->_children[$i]);
			}
		}
		for ($i = 0, $n = count($this->{$name}); $i < $n; $i++)
		{
			if ($this->{$name}[$i] == $child)
			{
>>>>>>> upstream/master
				unset($this->{$name}[$i]);
			}
		}
		$this->_children = array_values($this->_children);
		$this->{$name} = array_values($this->{$name});
		unset($child);
	}

	/**
	 * Get an element in the document by / separated path
	 *
<<<<<<< HEAD
	 * @param   string   $path	The / separated path to the element
	 * @return  object   JSimpleXMLElement
	 */
	function getElementByPath($path)
	{
=======
	 * @param   string  $path  The / separated path to the element
	 *
	 * @return  object  JSimpleXMLElement
	 *
	 * @deprecated   12.1
	 * @since   11.1
	 */
	function getElementByPath($path)
	{
		// Deprecation warning.
		JLog::add('JSimpleXMLElement::getElementByPath() is deprecated.', JLog::WARNING, 'deprecated');

>>>>>>> upstream/master
		$tmp	= &$this;
		$parts	= explode('/', trim($path, '/'));

		foreach ($parts as $node)
		{
			$found = false;
			foreach ($tmp->_children as $child)
			{
				if (strtoupper($child->_name) == strtoupper($node))
				{
					$tmp = &$child;
					$found = true;
					break;
				}
			}
<<<<<<< HEAD
			if (!$found) {
=======
			if (!$found)
			{
>>>>>>> upstream/master
				break;
			}
		}

<<<<<<< HEAD
		if ($found) {
=======
		if ($found)
		{
>>>>>>> upstream/master
			return $tmp;
		}

		return false;
	}

	/**
	 * Traverses the tree calling the $callback(JSimpleXMLElement
	 * $this, mixed $args=array()) function with each JSimpleXMLElement.
	 *
<<<<<<< HEAD
	 * @param   string  $callback function name
	 * @param   array   $args
	 */
	function map($callback, $args=array())
	{
		$callback($this, $args);
		// Map to all children
		if ($n = count($this->_children)) {
			for ($i=0;$i<$n;$i++)
=======
	 * @param   string  $callback  Function name
	 * @param   array   $args      The arguments (optional) for the function callback.
	 *
	 * @return  void
	 *
	 * @deprecated  12.1
	 * @since   11.1
	 */
	function map($callback, $args = array())
	{
		// Deprecation warning.
		JLog::add('JSimpleXMLElement::map) is deprecated.', JLog::WARNING, 'deprecated');

		$callback($this, $args);
		// Map to all children
		if ($n = count($this->_children))
		{
			for ($i = 0; $i < $n; $i++)
>>>>>>> upstream/master
			{
				$this->_children[$i]->map($callback, $args);
			}
		}
	}

	/**
	 * Return a well-formed XML string based on SimpleXML element
	 *
<<<<<<< HEAD
	 * @return  string
	 */
	function toString($whitespace=true)
	{
		// Start a new line, indent by the number indicated in $this->level, add a <, and add the name of the tag
		if ($whitespace) {
			$out = "\n".str_repeat("\t", $this->_level).'<'.$this->_name;
		} else {
			$out = '<'.$this->_name;
		}

		// For each attribute, add attr="value"
		foreach($this->_attributes as $attr => $value) {
			$out .= ' '.$attr.'="'.htmlspecialchars($value, ENT_COMPAT, 'UTF-8').'"';
		}

		// If there are no children and it contains no data, end it off with a />
		if (empty($this->_children) && empty($this->_data)) {
=======
	 * @param   boolean  $whitespace  True if whitespace should be prepended to the string
	 *
	 * @return  string
	 *
	 * @deprecated   12.1
	 * @since   11.1
	 */
	function toString($whitespace = true)
	{
		// Deprecation warning.
		JLog::add('JSimpleXMLElement::toString() is deprecated.', JLog::WARNING, 'deprecated');

		// Start a new line, indent by the number indicated in $this->level, add a <, and add the name of the tag
		if ($whitespace)
		{
			$out = "\n" . str_repeat("\t", $this->_level) . '<' . $this->_name;
		}
		else
		{
			$out = '<' . $this->_name;
		}

		// For each attribute, add attr="value"
		foreach ($this->_attributes as $attr => $value)
		{
			$out .= ' ' . $attr . '="' . htmlspecialchars($value, ENT_COMPAT, 'UTF-8') . '"';
		}

		// If there are no children and it contains no data, end it off with a />
		if (empty($this->_children) && empty($this->_data))
		{
>>>>>>> upstream/master
			$out .= " />";
		}
		// Otherwise...
		else
		{
			// If there are children
			if (!empty($this->_children))
			{
				// Close off the start tag
				$out .= '>';

				// For each child, call the asXML function (this will ensure that all children are added recursively)
<<<<<<< HEAD
				foreach($this->_children as $child)
					$out .= $child->toString($whitespace);

				// Add the newline and indentation to go along with the close tag
				if ($whitespace) {
					$out .= "\n".str_repeat("\t", $this->_level);
				}
			}

			// If there is data, close off the start tag and add the data
			elseif (!empty($this->_data))
				$out .= '>'.htmlspecialchars($this->_data, ENT_COMPAT, 'UTF-8');

			// Add the end tag
			$out .= '</'.$this->_name.'>';
=======
				foreach ($this->_children as $child)
				{
					$out .= $child->toString($whitespace);
				}

				// Add the newline and indentation to go along with the close tag
				if ($whitespace)
				{
					$out .= "\n" . str_repeat("\t", $this->_level);
				}
			}
			// If there is data, close off the start tag and add the data
			elseif (!empty($this->_data))
				$out .= '>' . htmlspecialchars($this->_data, ENT_COMPAT, 'UTF-8');

			// Add the end tag
			$out .= '</' . $this->_name . '>';
>>>>>>> upstream/master
		}

		//Return the final output
		return $out;
	}
<<<<<<< HEAD
}
=======
}
>>>>>>> upstream/master
