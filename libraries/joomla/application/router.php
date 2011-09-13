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

/**
 * Set the available masks for the routing mode
 */
define('JROUTER_MODE_RAW', 0);
define('JROUTER_MODE_SEF', 1);

/**
 * Class to create and parse routes
 *
 * @package     Joomla.Platform
 * @subpackage  Application
 * @since       11.1
 */
class JRouter extends JObject
{
	/**
	 * The rewrite mode
	 *
<<<<<<< HEAD
	 * @var integer
=======
	 * @var    integer
	 * @since  11.1
>>>>>>> upstream/master
	 */
	protected $_mode = null;

	/**
	 * An array of variables
	 *
<<<<<<< HEAD
	 * @var array
=======
	 * @var     array
	 * @since   11.1
>>>>>>> upstream/master
	 */
	protected $_vars = array();

	/**
	 * An array of rules
	 *
<<<<<<< HEAD
	 * @var array
	 */
	protected $_rules = array(
		'build' => array(),
		'parse' => array()
	);

	/**
	 * Class constructor
	 */
	public function __construct($options = array())
	{
		if (array_key_exists('mode', $options)) {
			$this->_mode = $options['mode'];
		} else {
=======
	 * @var    array
	 * @since  11.1
	 */
	protected $_rules = array('build' => array(), 'parse' => array());

	/**
	 * Class constructor
	 *
	 * @param   array  $options  Array of options
	 *
	 * @return  void
	 *
	 * @since 11.1
	 */
	public function __construct($options = array())
	{
		if (array_key_exists('mode', $options))
		{
			$this->_mode = $options['mode'];
		}
		else
		{
>>>>>>> upstream/master
			$this->_mode = JROUTER_MODE_RAW;
		}
	}

	/**
	 * Returns the global JRouter object, only creating it if it
	 * doesn't already exist.
	 *
<<<<<<< HEAD
	 * @param   string  $client  The name of the client
	 * @param   array   $options An associative array of options
	 *
	 * @return  JRouter  A JRouter object.
=======
	 * @param   string  $client   The name of the client
	 * @param   array   $options  An associative array of options
	 *
	 * @return  JRouter A JRouter object.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function getInstance($client, $options = array())
	{
		static $instances;

<<<<<<< HEAD
		if (!isset($instances)) {
			$instances = array();
		}

		if (empty($instances[$client])) {
			// Load the router object
			$info = JApplicationHelper::getClientInfo($client, true);

			$path = $info->path.DS.'includes'.DS.'router.php';
			if (file_exists($path)) {
				require_once $path;

				// Create a JRouter object
				$classname = 'JRouter'.ucfirst($client);
				$instance = new $classname($options);
			} else {
=======
		if (!isset($instances))
		{
			$instances = array();
		}

		if (empty($instances[$client]))
		{
			// Load the router object
			$info = JApplicationHelper::getClientInfo($client, true);

			$path = $info->path . '/includes/router.php';
			if (file_exists($path))
			{
				include_once $path;

				// Create a JRouter object
				$classname = 'JRouter' . ucfirst($client);
				$instance = new $classname($options);
			}
			else
			{
>>>>>>> upstream/master
				$error = JError::raiseError(500, JText::sprintf('JLIB_APPLICATION_ERROR_ROUTER_LOAD', $client));
				return $error;
			}

			$instances[$client] = & $instance;
		}

		return $instances[$client];
	}

	/**
<<<<<<< HEAD
	 *  Function to convert a route to an internal URI
	 *
	 *  @param   string   $uri
	 *
	 *  @return  array
	 *  @since   11.1
=======
	 * Function to convert a route to an internal URI
	 *
	 * @param   JURI  &$uri  The uri.
	 *
	 * @return  array
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function parse(&$uri)
	{
		$vars = array();

		// Process the parsed variables based on custom defined rules
		$vars = $this->_processParseRules($uri);

		// Parse RAW URL
<<<<<<< HEAD
		if ($this->_mode == JROUTER_MODE_RAW) {
=======
		if ($this->_mode == JROUTER_MODE_RAW)
		{
>>>>>>> upstream/master
			$vars += $this->_parseRawRoute($uri);
		}

		// Parse SEF URL
<<<<<<< HEAD
		if ($this->_mode == JROUTER_MODE_SEF) {
			$vars += $vars + $this->_parseSefRoute($uri);
		}

		return  array_merge($this->getVars(), $vars);
=======
		if ($this->_mode == JROUTER_MODE_SEF)
		{
			$vars += $this->_parseSefRoute($uri);
		}

		return array_merge($this->getVars(), $vars);
>>>>>>> upstream/master
	}

	/**
	 * Function to convert an internal URI to a route
	 *
<<<<<<< HEAD
	 * @param   string  The internal URL
	 *
	 * @return  string  The absolute search engine friendly URL
=======
	 * @param   string  $url  The internal URL
	 *
	 * @return  string  The absolute search engine friendly URL
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function build($url)
	{
		// Create the URI object
		$uri = $this->_createURI($url);

		// Process the uri information based on custom defined rules
		$this->_processBuildRules($uri);

		// Build RAW URL
<<<<<<< HEAD
		if ($this->_mode == JROUTER_MODE_RAW) {
=======
		if ($this->_mode == JROUTER_MODE_RAW)
		{
>>>>>>> upstream/master
			$this->_buildRawRoute($uri);
		}

		// Build SEF URL : mysite/route/index.php?var=x
<<<<<<< HEAD
		if ($this->_mode == JROUTER_MODE_SEF) {
=======
		if ($this->_mode == JROUTER_MODE_SEF)
		{
>>>>>>> upstream/master
			$this->_buildSefRoute($uri);
		}

		return $uri;
	}

	/**
	 * Get the router mode
	 *
<<<<<<< HEAD
	 * @return
=======
	 * @return  integer
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function getMode()
	{
		return $this->_mode;
	}

	/**
<<<<<<< HEAD
	 * Get the router mode
	 * @return
=======
	 * Set the router mode
	 *
	 * @param   integer  $mode  The routing mode.
	 *
	 * @return  void
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function setMode($mode)
	{
		$this->_mode = $mode;
	}

	/**
	 * Set a router variable, creating it if it doesn't exist
	 *
	 * @param   string   $key     The name of the variable
	 * @param   mixed    $value   The value of the variable
	 * @param   boolean  $create  If True, the variable will be created if it doesn't exist yet
	 *
<<<<<<< HEAD
	 * @return
=======
	 * @return  void
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function setVar($key, $value, $create = true)
	{
<<<<<<< HEAD
		if (!$create && array_key_exists($key, $this->_vars)) {
			$this->_vars[$key] = $value;
		} else {
=======
		if ($create || array_key_exists($key, $this->_vars))
		{
>>>>>>> upstream/master
			$this->_vars[$key] = $value;
		}
	}

	/**
	 * Set the router variable array
	 *
<<<<<<< HEAD
	 * @param   array    $vars    An associative array with variables
	 * @param   boolean  $merge   If True, the array will be merged instead of overwritten
	 *
	 * @return
=======
	 * @param   array    $vars   An associative array with variables
	 * @param   boolean  $merge  If True, the array will be merged instead of overwritten
	 *
	 * @return  void
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function setVars($vars = array(), $merge = true)
	{
<<<<<<< HEAD
		if ($merge) {
			$this->_vars = array_merge($this->_vars, $vars);
		} else {
=======
		if ($merge)
		{
			$this->_vars = array_merge($this->_vars, $vars);
		}
		else
		{
>>>>>>> upstream/master
			$this->_vars = $vars;
		}
	}

	/**
	 * Get a router variable
	 *
<<<<<<< HEAD
	 * @param   string   The name of the variable
	 *
	 * @return  mixed    Value of the variable
=======
	 * @param   string  $key  The name of the variable
	 *
	 * @return  mixed  Value of the variable
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function getVar($key)
	{
		$result = null;
<<<<<<< HEAD
		if (isset($this->_vars[$key])) {
=======
		if (isset($this->_vars[$key]))
		{
>>>>>>> upstream/master
			$result = $this->_vars[$key];
		}
		return $result;
	}

	/**
	 * Get the router variable array
	 *
<<<<<<< HEAD
	 * @return  array    An associative array of router variables
=======
	 * @return  array  An associative array of router variables
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function getVars()
	{
		return $this->_vars;
	}

	/**
	 * Attach a build rule
	 *
<<<<<<< HEAD
	 * @param  string  callback  The function to be called
	 *
	 * @return
=======
	 * @param   callback  $callback  The function to be called
	 *
	 * @return  void
	 *
>>>>>>> upstream/master
	 * @since   11.1.
	 */
	public function attachBuildRule($callback)
	{
		$this->_rules['build'][] = $callback;
	}

	/**
	 * Attach a parse rule
	 *
<<<<<<< HEAD
	 * @param   string  $callback   The function to be called.
	 *
	 * @return
=======
	 * @param   callback  $callback  The function to be called.
	 *
	 * @return  void
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function attachParseRule($callback)
	{
		$this->_rules['parse'][] = $callback;
	}

	/**
	 * Function to convert a raw route to an internal URI
	 *
<<<<<<< HEAD
	 * @param   string   The raw route
	 *
	 * @return
=======
	 * @param   JURI  &$uri  The raw route
	 *
	 * @return  boolean
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function _parseRawRoute(&$uri)
	{
		return false;
	}

	/**
<<<<<<< HEAD
	 *  Function to convert a sef route to an internal URI
	 *
	 * @param   string   The sef URI
	 *
	 * @return  string   Internal URI
=======
	 * Function to convert a sef route to an internal URI
	 *
	 * @param   JURI  &$uri  The sef URI
	 *
	 * @return  string  Internal URI
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function _parseSefRoute(&$uri)
	{
		return false;
	}

	/**
	 * Function to build a raw route
	 *
<<<<<<< HEAD
	 * @param   string   The internal URL
	 *
	 * @return           Raw Route
=======
	 * @param   JURI  &$uri  The internal URL
	 *
	 * @return  string  Raw Route
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function _buildRawRoute(&$uri)
	{
	}

	/**
	 * Function to build a sef route
	 *
<<<<<<< HEAD
	 * @param   string   The uri
	 *
	 * @return  string   The SEF route
=======
	 * @param   JURI  &$uri  The uri
	 *
	 * @return  string  The SEF route
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function _buildSefRoute(&$uri)
	{
	}

	/**
	 * Process the parsed router variables based on custom defined rules
	 *
<<<<<<< HEAD
	 * @param   string   The URI to parse
	 *
	 * @return  array    The array of processed URI variables
=======
	 * @param   JURI  &$uri  The URI to parse
	 *
	 * @return  array  The array of processed URI variables
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function _processParseRules(&$uri)
	{
		$vars = array();

<<<<<<< HEAD
		foreach($this->_rules['parse'] as $rule) {
			$vars = call_user_func_array($rule, array(&$this, &$uri));
=======
		foreach ($this->_rules['parse'] as $rule)
		{
			$vars += call_user_func_array($rule, array(&$this, &$uri));
>>>>>>> upstream/master
		}

		return $vars;
	}

	/**
	 * Process the build uri query data based on custom defined rules
	 *
<<<<<<< HEAD
	 * @param   string   The URI
	 * @return
=======
	 * @param   JURI  &$uri  The URI
	 *
	 * @return  void
>>>>>>> upstream/master
	 *
	 * @since   11.1
	 */
	protected function _processBuildRules(&$uri)
	{
<<<<<<< HEAD
		foreach($this->_rules['build'] as $rule) {
=======
		foreach ($this->_rules['build'] as $rule)
		{
>>>>>>> upstream/master
			call_user_func_array($rule, array(&$this, &$uri));
		}
	}

	/**
	 * Create a uri based on a full or partial url string
	 *
<<<<<<< HEAD
	 * @param   string   $url  The URI
	 *
	 * @return  JURI           A JURI object
=======
	 * @param   string  $url  The URI
	 *
	 * @return  JURI
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function _createURI($url)
	{
		// Create full URL if we are only appending variables to it
<<<<<<< HEAD
		if (substr($url, 0, 1) == '&') {
			$vars = array();
			if (strpos($url, '&amp;') !== false) {
				$url = str_replace('&amp;','&',$url);
=======
		if (substr($url, 0, 1) == '&')
		{
			$vars = array();
			if (strpos($url, '&amp;') !== false)
			{
				$url = str_replace('&amp;', '&', $url);
>>>>>>> upstream/master
			}

			parse_str($url, $vars);

			$vars = array_merge($this->getVars(), $vars);

<<<<<<< HEAD
			foreach($vars as $key => $var) {
				if ($var == "") {
=======
			foreach ($vars as $key => $var)
			{
				if ($var == "")
				{
>>>>>>> upstream/master
					unset($vars[$key]);
				}
			}

<<<<<<< HEAD
			$url = 'index.php?'.JURI::buildQuery($vars);
=======
			$url = 'index.php?' . JURI::buildQuery($vars);
>>>>>>> upstream/master
		}

		// Decompose link into url component parts
		return new JURI($url);
	}

	/**
	 * Encode route segments
	 *
<<<<<<< HEAD
	 * @param   array    An array of route segments
	 *
	 * @return  array    Array of encoded route segments
=======
	 * @param   array  $segments  An array of route segments
	 *
	 * @return  array  Array of encoded route segments
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function _encodeSegments($segments)
	{
		$total = count($segments);
<<<<<<< HEAD
		for ($i=0; $i<$total; $i++) {
=======
		for ($i = 0; $i < $total; $i++)
		{
>>>>>>> upstream/master
			$segments[$i] = str_replace(':', '-', $segments[$i]);
		}

		return $segments;
	}

	/**
	 * Decode route segments
	 *
<<<<<<< HEAD
	 * @param   array    $segments  An array of route segments
	 *
	 * @return  array    Array of decoded route segments
=======
	 * @param   array  $segments  An array of route segments
	 *
	 * @return  array  Array of decoded route segments
	 *
>>>>>>> upstream/master
	 * @since 11,1
	 */
	protected function _decodeSegments($segments)
	{
		$total = count($segments);
<<<<<<< HEAD
		for ($i=0; $i<$total; $i++)  {
=======
		for ($i = 0; $i < $total; $i++)
		{
>>>>>>> upstream/master
			$segments[$i] = preg_replace('/-/', ':', $segments[$i], 1);
		}

		return $segments;
	}
<<<<<<< HEAD
}
=======
}
>>>>>>> upstream/master
