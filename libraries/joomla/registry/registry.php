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

JLoader::register('JRegistryFormat', dirname(__FILE__).'/format.php');
=======
defined('JPATH_PLATFORM') or die();

JLoader::register('JRegistryFormat', dirname(__FILE__) . '/format.php');
>>>>>>> upstream/master

/**
 * JRegistry class
 *
 * @package     Joomla.Platform
 * @subpackage  Registry
 * @since       11.1
 */
class JRegistry
{
	/**
	 * Registry Object
	 *
<<<<<<< HEAD
	 * @var object
=======
	 * @var    object
	 * @since  11.1
>>>>>>> upstream/master
	 */
	protected $data;

	/**
	 * Constructor
	 *
<<<<<<< HEAD
	 * @return  void
=======
	 * @param   mixed  $data  The data to bind to the new JRegistry object.
	 *
	 * @return  void
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function __construct($data = null)
	{
		// Instantiate the internal data object.
<<<<<<< HEAD
		$this->data = new stdClass();

		// Optionally load supplied data.
		if (is_array($data) || is_object($data)) {
			$this->bindData($this->data, $data);
		}
		elseif (!empty($data) && is_string($data)) {
=======
		$this->data = new stdClass;

		// Optionally load supplied data.
		if (is_array($data) || is_object($data))
		{
			$this->bindData($this->data, $data);
		}
		elseif (!empty($data) && is_string($data))
		{
>>>>>>> upstream/master
			$this->loadString($data);
		}
	}

	/**
	 * Magic function to clone the registry object.
<<<<<<< HEAD
=======
	 *
	 * @return  JRegistry
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function __clone()
	{
		$this->data = unserialize(serialize($this->data));
	}

	/**
	 * Magic function to render this object as a string using default args of toString method.
<<<<<<< HEAD
=======
	 *
	 * @return  string
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function __toString()
	{
		return $this->toString();
	}

	/**
<<<<<<< HEAD
	 * Sets a default value if not alreay assigned.
	 *
	 * @param   string   The name of the parameter.
	 * @param   string   An optional value for the parameter.
	 * @param   string   An optional group for the parameter.
	 * @return  string   The value set, or the default if the value was not previously set (or null).
=======
	 * Sets a default value if not already assigned.
	 *
	 * @param   string  $key      The name of the parameter.
	 * @param   string  $default  An optional value for the parameter.
	 *
	 * @return  string  The value set, or the default if the value was not previously set (or null).
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function def($key, $default = '')
	{
		$value = $this->get($key, (string) $default);
		$this->set($key, $value);
		return $value;
	}

	/**
	 * Check if a registry path exists.
	 *
<<<<<<< HEAD
	 * @param   string  Registry path (e.g. joomla.content.showauthor)
	 * @return  boolean
=======
	 * @param   string  $path  Registry path (e.g. joomla.content.showauthor)
	 *
	 * @return  boolean
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function exists($path)
	{
		// Explode the registry path into an array
<<<<<<< HEAD
		if ($nodes = explode('.', $path)) {
=======
		if ($nodes = explode('.', $path))
		{
>>>>>>> upstream/master
			// Initialize the current node to be the registry root.
			$node = $this->data;

			// Traverse the registry to find the correct node for the result.
<<<<<<< HEAD
			for ($i = 0,$n = count($nodes); $i < $n; $i++) {
				if (isset($node->$nodes[$i])) {
					$node = $node->$nodes[$i];
				} else {
					break;
				}

				if ($i+1 == $n) {
=======
			for ($i = 0, $n = count($nodes); $i < $n; $i++)
			{
				if (isset($node->$nodes[$i]))
				{
					$node = $node->$nodes[$i];
				}
				else
				{
					break;
				}

				if ($i + 1 == $n)
				{
>>>>>>> upstream/master
					return true;
				}
			}
		}

		return false;
	}

	/**
	 * Get a registry value.
	 *
<<<<<<< HEAD
	 * @param   string   Registry path (e.g. joomla.content.showauthor)
	 * @param   mixed    Optional default value, returned if the internal value is null.
	 * @return  mixed    Value of entry or null
=======
	 * @param   string  $path     Registry path (e.g. joomla.content.showauthor)
	 * @param   mixed   $default  Optional default value, returned if the internal value is null.
	 *
	 * @return  mixed  Value of entry or null
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function get($path, $default = null)
	{
		// Initialise variables.
		$result = $default;

<<<<<<< HEAD
		if(!strpos($path, '.'))
=======
		if (!strpos($path, '.'))
>>>>>>> upstream/master
		{
			return (isset($this->data->$path) && $this->data->$path !== null && $this->data->$path !== '') ? $this->data->$path : $default;
		}
		// Explode the registry path into an array
		$nodes = explode('.', $path);

		// Initialize the current node to be the registry root.
		$node = $this->data;
		$found = false;
		// Traverse the registry to find the correct node for the result.
<<<<<<< HEAD
		foreach ($nodes as $n) {
			if (isset($node->$n)) {
				$node = $node->$n;
				$found = true;
			} else {
=======
		foreach ($nodes as $n)
		{
			if (isset($node->$n))
			{
				$node = $node->$n;
				$found = true;
			}
			else
			{
>>>>>>> upstream/master
				$found = false;
				break;
			}
		}
<<<<<<< HEAD
		if ($found && $node !== null && $node !== '') {
=======
		if ($found && $node !== null && $node !== '')
		{
>>>>>>> upstream/master
			$result = $node;
		}

		return $result;
	}

	/**
	 * Returns a reference to a global JRegistry object, only creating it
	 * if it doesn't already exist.
	 *
	 * This method must be invoked as:
<<<<<<< HEAD
	 *		<pre>$registry = JRegistry::getInstance($id);</pre>
	 *
	 * @param   string   An ID for the registry instance
	 * @return  object   The JRegistry object.
=======
	 * <pre>$registry = JRegistry::getInstance($id);</pre>
	 *
	 * @param   string  $id  An ID for the registry instance
	 *
	 * @return  object  The JRegistry object.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function getInstance($id)
	{
		static $instances;

<<<<<<< HEAD
		if (!isset ($instances)) {
			$instances = array ();
		}

		if (empty ($instances[$id])) {
			$instances[$id] = new JRegistry();
=======
		if (!isset($instances))
		{
			$instances = array();
		}

		if (empty($instances[$id]))
		{
			$instances[$id] = new JRegistry;
>>>>>>> upstream/master
		}

		return $instances[$id];
	}

	/**
	 * Load a associative array of values into the default namespace
	 *
<<<<<<< HEAD
	 * @param   array    Associative array of value to load
	 * @param   string   The name of the namespace
	 * @return  boolean  True on success
=======
	 * @param   array  $array  Associative array of value to load
	 *
	 * @return  boolean  True on success
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function loadArray($array)
	{
		$this->bindData($this->data, $array);

		return true;
	}

	/**
	 * Load the public variables of the object into the default namespace.
	 *
<<<<<<< HEAD
	 * @param   object   The object holding the publics to load
	 * @param   string   Namespace to load the INI string into [optional]
	 * @return  boolean  True on success
=======
	 * @param   object  $object  The object holding the publics to load
	 *
	 * @return  boolean  True on success
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function loadObject($object)
	{
		$this->bindData($this->data, $object);

		return true;
	}

	/**
	 * Load the contents of a file into the registry
	 *
<<<<<<< HEAD
	 * @param   string   Path to file to load
	 * @param   string   Format of the file [optional: defaults to JSON]
	 * @param   mixed    Options used by the formatter
	 * @return  boolean  True on success
=======
	 * @param   string  $file     Path to file to load
	 * @param   string  $format   Format of the file [optional: defaults to JSON]
	 * @param   mixed   $options  Options used by the formatter
	 *
	 * @return  boolean  True on success
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function loadFile($file, $format = 'JSON', $options = array())
	{
		// Get the contents of the file
		jimport('joomla.filesystem.file');
		$data = JFile::read($file);

		return $this->loadString($data, $format, $options);
	}

	/**
	 * Load a string into the registry
	 *
<<<<<<< HEAD
	 * @param   string   string to load into the registry
	 * @param   string   format of the string
	 * @param   mixed    Options used by the formatter
	 * @return  boolean  True on success
=======
	 * @param   string  $data     String to load into the registry
	 * @param   string  $format   Format of the string
	 * @param   mixed   $options  Options used by the formatter
	 *
	 * @return  boolean  True on success
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function loadString($data, $format = 'JSON', $options = array())
	{
		// Load a string into the given namespace [or default namespace if not given]
		$handler = JRegistryFormat::getInstance($format);

		$obj = $handler->stringToObject($data, $options);
		$this->loadObject($obj);

		return true;
	}

	/**
	 * Merge a JRegistry object into this one
	 *
<<<<<<< HEAD
	 * @param   object   Source JRegistry object ot merge
	 * @return  boolean  True on success
=======
	 * @param   object  &$source  Source JRegistry object to merge.
	 *
	 * @return  boolean  True on success
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function merge(&$source)
	{
<<<<<<< HEAD
		if ($source instanceof JRegistry) {
			// Load the variables into the registry's default namespace.
			foreach ($source->toArray() as $k => $v) {
				if (($v !== null) && ($v !== '')){
=======
		if ($source instanceof JRegistry)
		{
			// Load the variables into the registry's default namespace.
			foreach ($source->toArray() as $k => $v)
			{
				if (($v !== null) && ($v !== ''))
				{
>>>>>>> upstream/master
					$this->data->$k = $v;
				}
			}
			return true;
		}
		return false;
	}

	/**
	 * Set a registry value.
	 *
<<<<<<< HEAD
	 * @param   string   Registry Path (e.g. joomla.content.showauthor)
	 * @param   mixed	Value of entry
	 * @return  mixed	The value of the that has been set.
=======
	 * @param   string  $path   Registry Path (e.g. joomla.content.showauthor)
	 * @param   mixed   $value  Value of entry
	 *
	 * @return  mixed  The value of the that has been set.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function set($path, $value)
	{
		$result = null;

		// Explode the registry path into an array
<<<<<<< HEAD
		if ($nodes = explode('.', $path)) {
=======
		if ($nodes = explode('.', $path))
		{
>>>>>>> upstream/master
			// Initialize the current node to be the registry root.
			$node = $this->data;

			// Traverse the registry to find the correct node for the result.
<<<<<<< HEAD
			for ($i = 0, $n = count($nodes) - 1; $i < $n; $i++) {
				if (!isset($node->$nodes[$i]) && ($i != $n)) {
					$node->$nodes[$i] = new stdClass();
=======
			for ($i = 0, $n = count($nodes) - 1; $i < $n; $i++)
			{
				if (!isset($node->$nodes[$i]) && ($i != $n))
				{
					$node->$nodes[$i] = new stdClass;
>>>>>>> upstream/master
				}
				$node = $node->$nodes[$i];
			}

			// Get the old value if exists so we can return it
			$result = $node->$nodes[$i] = $value;
		}

		return $result;
	}

	/**
	 * Transforms a namespace to an array
	 *
<<<<<<< HEAD
	 * @param   string   Namespace to return [optional: null returns the default namespace]
	 * @return  array    An associative array holding the namespace data
=======
	 * @return  array  An associative array holding the namespace data
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function toArray()
	{
		return (array) $this->asArray($this->data);
	}

	/**
	 * Transforms a namespace to an object
	 *
<<<<<<< HEAD
	 * @param   string   Namespace to return [optional: null returns the default namespace]
	 * @return  object   An an object holding the namespace data
=======
	 * @return  object   An an object holding the namespace data
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function toObject()
	{
		return $this->data;
	}

	/**
	 * Get a namespace in a given string format
	 *
<<<<<<< HEAD
	 * @param   string   Format to return the string in
	 * @param   mixed    Parameters used by the formatter, see formatters for more info
	 * @return  string   Namespace in string format
=======
	 * @param   string  $format   Format to return the string in
	 * @param   mixed   $options  Parameters used by the formatter, see formatters for more info
	 *
	 * @return  string   Namespace in string format
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function toString($format = 'JSON', $options = array())
	{
		// Return a namespace in a given format
		$handler = JRegistryFormat::getInstance($format);

		return $handler->objectToString($this->data, $options);
	}

	/**
	 * Method to recursively bind data to a parent object.
	 *
<<<<<<< HEAD
	 * @param   object   $parent	The parent object on which to attach the data values.
	 * @param   mixed    $data	An array or object of data to bind to the parent object.
	 *
	 * @return  void
	 * @since   11.1
	 */
	protected function bindData(& $parent, $data)
	{
		// Ensure the input data is an array.
		if(is_object($data)) {
			$data = get_object_vars($data);
		} else {
			$data = (array) $data;
		}

		foreach ($data as $k => $v) {
			if ((is_array($v) && JArrayHelper::isAssociative($v)) || is_object($v)) {
				$parent->$k = new stdClass();
				$this->bindData($parent->$k, $v);
			} else {
=======
	 * @param   object  &$parent  The parent object on which to attach the data values.
	 * @param   mixed   $data     An array or object of data to bind to the parent object.
	 *
	 * @return  void
	 *
	 * @since   11.1
	 */
	protected function bindData(&$parent, $data)
	{
		// Ensure the input data is an array.
		if (is_object($data))
		{
			$data = get_object_vars($data);
		}
		else
		{
			$data = (array) $data;
		}

		foreach ($data as $k => $v)
		{
			if ((is_array($v) && JArrayHelper::isAssociative($v)) || is_object($v))
			{
				$parent->$k = new stdClass;
				$this->bindData($parent->$k, $v);
			}
			else
			{
>>>>>>> upstream/master
				$parent->$k = $v;
			}
		}
	}

	/**
	 * Method to recursively convert an object of data to an array.
	 *
<<<<<<< HEAD
	 * @param   object   $data	An object of data to return as an array.
	 *
	 * @return  array    Array representation of the input object.
=======
	 * @param   object  $data  An object of data to return as an array.
	 *
	 * @return  array  Array representation of the input object.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function asArray($data)
	{
		$array = array();

<<<<<<< HEAD
		foreach (get_object_vars((object) $data) as $k => $v) {
			if (is_object($v)) {
				$array[$k] = $this->asArray($v);
			} else {
=======
		foreach (get_object_vars((object) $data) as $k => $v)
		{
			if (is_object($v))
			{
				$array[$k] = $this->asArray($v);
			}
			else
			{
>>>>>>> upstream/master
				$array[$k] = $v;
			}
		}

		return $array;
	}

	//
	// Following methods are deprecated
	//

	/**
	 * Load an XML string into the registry into the given namespace [or default if a namespace is not given]
	 *
<<<<<<< HEAD
	 * @param   string   XML formatted string to load into the registry
	 * @param   string   Namespace to load the XML string into [optional]
	 * @return  boolean  True on success
	 * @since   11.1
	 * @deprecated 1.6 - Oct 25, 2010
	 */
	public function loadXML($data, $namespace = null)
	{
=======
	 * @param   string  $data       XML formatted string to load into the registry
	 * @param   string  $namespace  Namespace to load the XML string into [optional]
	 *
	 * @return  boolean  True on success
	 *
	 * @since   11.1
	 *
	 * @deprecated  12.1   Use loadString passing XML as the format instead.
	 * @note
	 */
	public function loadXML($data, $namespace = null)
	{
		// Deprecation warning.
		JLog::add('JRegistry::loadXML() is deprecated.', JLog::WARNING, 'deprecated');

>>>>>>> upstream/master
		return $this->loadString($data, 'XML');
	}

	/**
	 * Load an INI string into the registry into the given namespace [or default if a namespace is not given]
	 *
<<<<<<< HEAD
	 * @param   string   INI formatted string to load into the registry
	 * @param   string   Namespace to load the INI string into [optional]
	 * @param   mixed    An array of options for the formatter, or boolean to process sections.
	 * @return  boolean  True on success
	 * @since   11.1
	 * @deprecated 1.6 - Oct 25, 2010
	 */
	public function loadINI($data, $namespace = null, $options = array())
	{
=======
	 * @param   string  $data       INI formatted string to load into the registry
	 * @param   string  $namespace  Namespace to load the INI string into [optional]
	 * @param   mixed   $options    An array of options for the formatter, or boolean to process sections.
	 *
	 * @return  boolean  True on success
	 *
	 * @since   11.1
	 *
	 * @deprecated  12.1  Use loadString passing INI as the format instead.
	 */
	public function loadINI($data, $namespace = null, $options = array())
	{
		// Deprecation warning.
		JLog::add('JRegistry::loadINI() is deprecated.', JLog::WARNING, 'deprecated');

>>>>>>> upstream/master
		return $this->loadString($data, 'INI', $options);
	}

	/**
	 * Load an JSON string into the registry into the given namespace [or default if a namespace is not given]
	 *
<<<<<<< HEAD
	 * @param   string   JSON formatted string to load into the registry
	 * @return  boolean  True on success
	 * @since   11.1
	 * @deprecated 1.6 - Oct 25, 2010
	 */
	public function loadJSON($data)
	{
=======
	 * @param   string  $data  JSON formatted string to load into the registry
	 *
	 * @return  boolean  True on success
	 *
	 * @deprecated    12.1  Use loadString passing JSON as the format instead.
	 * @note    Use loadString instead.
	 * @since   11.1
	 */
	public function loadJSON($data)
	{
		// Deprecation warning.
		JLog::add('JRegistry::loadJSON() is deprecated.', JLog::WARNING, 'deprecated');

>>>>>>> upstream/master
		return $this->loadString($data, 'JSON');
	}

	/**
	 * Create a namespace
	 *
<<<<<<< HEAD
	 * @param   string   Name of the namespace to create
	 * @return  boolean  True on success
	 * @since   11.1
	 * @deprecated 1.6 - Jan 19, 2010
	 */
	public function makeNameSpace($namespace)
	{
=======
	 * @param   string  $namespace  Name of the namespace to create
	 *
	 * @return  boolean  True on success
	 *
	 * @deprecated    12.1
	 * @note    Namespaces are no longer supported.
	 * @since   11.1
	 */
	public function makeNameSpace($namespace)
	{
		// Deprecation warning.
		JLog::add('JRegistry::makeNameSpace() is deprecated.', JLog::WARNING, 'deprecated');

>>>>>>> upstream/master
		//$this->_registry[$namespace] = array('data' => new stdClass());
		return true;
	}

	/**
	 * Get the list of namespaces
	 *
	 * @return  array    List of namespaces
<<<<<<< HEAD
	 * @deprecated 1.6 - Jan 19, 2010
	 */
	public function getNameSpaces()
	{
=======
	 *
	 * @deprecated    12.1
	 * @note    Namespaces are no longer supported.
	 * @since   11.1
	 */
	public function getNameSpaces()
	{
		// Deprecation warning.
		JLog::add('JRegistry::getNameSpaces() is deprecated.', JLog::WARNING, 'deprecated');

>>>>>>> upstream/master
		//return array_keys($this->_registry);
		return array();
	}

	/**
	 * Get a registry value
	 *
<<<<<<< HEAD
	 * @param   string   Registry path (e.g. joomla.content.showauthor)
	 * @param   mixed    Optional default value
	 * @return  mixed    Value of entry or null
	 * @deprecated 1.6 - Jan 19, 2010
	 */
	public function getValue($path, $default=null)
	{
		$parts = explode('.', $path);
		if (count($parts) > 1) {
=======
	 * @param   string  $path     Registry path (e.g. joomla.content.showauthor)
	 * @param   mixed   $default  Optional default value
	 *
	 * @return  mixed    Value of entry or null
	 *
	 * @deprecated    12.1
	 * @note    Use get instead.
	 * @since   11.1
	 */
	public function getValue($path, $default = null)
	{
		// Deprecation warning.
		JLog::add('JRegistry::getValue() is deprecated.', JLog::WARNING, 'deprecated');

		$parts = explode('.', $path);
		if (count($parts) > 1)
		{
>>>>>>> upstream/master
			unset($parts[0]);
			$path = implode('.', $parts);
		}
		return $this->get($path, $default);
	}

	/**
	 * Set a registry value
	 *
<<<<<<< HEAD
	 * @param   string   Registry Path (e.g. joomla.content.showauthor)
	 * @param   mixed    Value of entry
	 * @return  mixed    The value after setting.
	 * @deprecated 1.6 - Jan 19, 2010
	 */
	public function setValue($path, $value)
	{
		$parts = explode('.', $path);
		if (count($parts) > 1) {
=======
	 * @param   string  $path   Registry Path (e.g. joomla.content.showauthor)
	 * @param   mixed   $value  Value of entry
	 *
	 * @return  mixed    The value after setting.
	 *
	 * @deprecated    12.1
	 * @note    Use set instead.
	 * @since   11.1
	 */
	public function setValue($path, $value)
	{
		// Deprecation warning.
		JLog::add('JRegistry::setValue() is deprecated.', JLog::WARNING, 'deprecated');

		$parts = explode('.', $path);
		if (count($parts) > 1)
		{
>>>>>>> upstream/master
			unset($parts[0]);
			$path = implode('.', $parts);
		}
		return $this->set($path, $value);
	}

	/**
<<<<<<< HEAD
	 * This method is added as an interim solution for API references in Joomla! 1.6 to the JRegistry
	 * object where in 1.5 a JParameter object existed.  Because many extensions may call this method
	 * we add it here as a means of "pain relief" until the 1.7 release.
	 *
	 * @return  boolean  True.
	 *
	 * @deprecated  1.6 - Jun 17, 2010
	 * @todo        Remove this method for the 1.7 release.
	 */
	public function loadSetupFile()
	{
=======
	 * This method is added as an interim solution for API references in the Joomla! CMS 1.6 to the JRegistry
	 * object where in 1.5 a JParameter object existed.  Because many extensions may call this method
	 * we add it here as a means of "pain relief" until the 1.8 release.
	 *
	 * @return  boolean  True.
	 *
	 * @deprecated    12.1
	 * @note    Load no longer supported.
	 * @since   11.1
	 */
	public function loadSetupFile()
	{
		// Deprecation warning.
		JLog::add('JRegistry::loadXML() is deprecated.', JLog::WARNING, 'deprecated');

>>>>>>> upstream/master
		return true;
	}
}
