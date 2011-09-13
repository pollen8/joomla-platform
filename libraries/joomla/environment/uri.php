<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Environment
 *
 * @copyright   Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

<<<<<<< HEAD
defined('JPATH_PLATFORM') or die;

jimport('joomla.utilities.string');
=======
defined('JPATH_PLATFORM') or die();

jimport('joomla.string.string');
>>>>>>> upstream/master

/**
 * JURI Class
 *
 * This class serves two purposes. First it parses a URI and provides a common interface
<<<<<<< HEAD
 * for the Joomla Framework to access and manipulate a URI.  Second it obtains the URI of
=======
 * for the Joomla Platform to access and manipulate a URI.  Second it obtains the URI of
>>>>>>> upstream/master
 * the current executing script from the server regardless of server.
 *
 * @package     Joomla.Platform
 * @subpackage  Environment
 * @since       11.1
 */
class JURI extends JObject
{
	/**
	 * @var    string Original URI
	 * @since  11.1
	 */
	protected $_uri = null;

	/**
	 * @var    string  Protocol
	 * @since  11.1
	 */
	protected $_scheme = null;

	/**
	 * @var    string  Host
	 * @since  11.1
	 */
	protected $_host = null;

	/**
	 * @var    integer  Port
	 * @since  11.1
	 */
	protected $_port = null;

	/**
	 * @var    string  Username
	 * @since  11.1
	 */
	protected $_user = null;

	/**
	 * @var    string  Password
	 * @since  11.1
	 */
	protected $_pass = null;

	/**
	 * @var    string  Path
	 * @since  11.1
	 */
	protected $_path = null;

	/**
	 * @var    string  Query
	 * @since  11.1
	 */
	protected $_query = null;

	/**
	 * @var    string  Anchor
	 * @since  11.1
	 */
	protected $_fragment = null;

	/**
	 * @var    array  Query variable hash
	 * @since  11.1
	 */
<<<<<<< HEAD
	protected $_vars = array ();
=======
	protected $_vars = array();

	/**
	 * @var    array  An array of JURI instances.
	 * @since  11.1
	 */
	protected static $instances = array();

	/**
	 * @var    array  The current calculated base url segments.
	 * @since  11.1
	 */
	protected static $base = array();

	/**
	 * @var    array  The current calculated root url segments.
	 * @since  11.1
	 */
	protected static $root = array();

	/**
	 * @var    string  The current url.
	 * @since  11.1
	 */
	protected static $current;
>>>>>>> upstream/master

	/**
	 * Constructor.
	 * You can pass a URI string to the constructor to initialise a specific URI.
	 *
<<<<<<< HEAD
	 * @param   string  $uri The optional URI string
=======
	 * @param   string  $uri  The optional URI string
>>>>>>> upstream/master
	 *
	 * @since   11.1
	 */
	public function __construct($uri = null)
	{
<<<<<<< HEAD
		if (!is_null($uri)) {
=======
		if (!is_null($uri))
		{
>>>>>>> upstream/master
			$this->parse($uri);
		}
	}

	/**
	 * Magic method to get the string representation of the URI object.
	 *
	 * @return  string
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function __toString()
	{
		return $this->toString();
	}

	/**
	 * Returns the global JURI object, only creating it
	 * if it doesn't already exist.
	 *
<<<<<<< HEAD
	 * @param   string   $uri  The URI to parse.  [optional: if null uses script URI]
	 *
	 * @return  JURI  The URI object.
=======
	 * @param   string  $uri  The URI to parse.  [optional: if null uses script URI]
	 *
	 * @return  JURI  The URI object.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function getInstance($uri = 'SERVER')
	{
<<<<<<< HEAD
		static $instances = array();

		if (!isset($instances[$uri])) {
			// Are we obtaining the URI from the server?
			if ($uri == 'SERVER') {
				// Determine if the request was over SSL (HTTPS).
				if (isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) && (strtolower($_SERVER['HTTPS']) != 'off')) {
					$https = 's://';
				} else {
=======

		if (empty(self::$instances[$uri]))
		{
			// Are we obtaining the URI from the server?
			if ($uri == 'SERVER')
			{
				// Determine if the request was over SSL (HTTPS).
				if (isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) && (strtolower($_SERVER['HTTPS']) != 'off'))
				{
					$https = 's://';
				}
				else
				{
>>>>>>> upstream/master
					$https = '://';
				}

				// Since we are assigning the URI from the server variables, we first need
				// to determine if we are running on apache or IIS.  If PHP_SELF and REQUEST_URI
				// are present, we will assume we are running on apache.

<<<<<<< HEAD
				if (!empty($_SERVER['PHP_SELF']) && !empty ($_SERVER['REQUEST_URI'])) {
					// To build the entire URI we need to prepend the protocol, and the http host
					// to the URI string.
					$theURI = 'http' . $https . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
				} else {
=======
				if (!empty($_SERVER['PHP_SELF']) && !empty($_SERVER['REQUEST_URI']))
				{
					// To build the entire URI we need to prepend the protocol, and the http host
					// to the URI string.
					$theURI = 'http' . $https . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
				}
				else
				{
>>>>>>> upstream/master
					// Since we do not have REQUEST_URI to work with, we will assume we are
					// running on IIS and will therefore need to work some magic with the SCRIPT_NAME and
					// QUERY_STRING environment variables.

					// IIS uses the SCRIPT_NAME variable instead of a REQUEST_URI variable... thanks, MS
					$theURI = 'http' . $https . $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'];

					// If the query string exists append it to the URI string
<<<<<<< HEAD
					if (isset($_SERVER['QUERY_STRING']) && !empty($_SERVER['QUERY_STRING'])) {
						$theURI .= '?' . $_SERVER['QUERY_STRING'];
					}
				}
			} else {
=======
					if (isset($_SERVER['QUERY_STRING']) && !empty($_SERVER['QUERY_STRING']))
					{
						$theURI .= '?' . $_SERVER['QUERY_STRING'];
					}
				}
			}
			else
			{
>>>>>>> upstream/master
				// We were given a URI
				$theURI = $uri;
			}

			// Create the new JURI instance
<<<<<<< HEAD
			$instances[$uri] = new JURI($theURI);
		}
		return $instances[$uri];
=======
			self::$instances[$uri] = new JURI($theURI);
		}
		return self::$instances[$uri];
>>>>>>> upstream/master
	}

	/**
	 * Returns the base URI for the request.
	 *
<<<<<<< HEAD
	 * @param   boolean  $pathonly If false, prepend the scheme, host and port information. Default is false.
	 *
	 * @return  string  The base URI string
=======
	 * @param   boolean  $pathonly  If false, prepend the scheme, host and port information. Default is false.
	 *
	 * @return  string  The base URI string
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function base($pathonly = false)
	{
<<<<<<< HEAD
		static $base;

		// Get the base request path.
		if (!isset($base)) {
			$config = JFactory::getConfig();
			$live_site = $config->get('live_site');
			if (trim($live_site) != '') {
				$uri = self::getInstance($live_site);
				$base['prefix'] = $uri->toString(array('scheme', 'host', 'port'));
				$base['path'] = rtrim($uri->toString(array('path')), '/\\');

				if (JPATH_BASE == JPATH_ADMINISTRATOR) {
					$base['path'] .= '/administrator';
				}
			} else {
				$uri			= self::getInstance();
				$base['prefix'] = $uri->toString(array('scheme', 'host', 'port'));

				if (strpos(php_sapi_name(), 'cgi') !== false && !ini_get('cgi.fix_pathinfo') && !empty($_SERVER['REQUEST_URI'])) {
=======
		// Get the base request path.
		if (empty(self::$base))
		{
			$config = JFactory::getConfig();
			$live_site = $config->get('live_site');
			if (trim($live_site) != '')
			{
				$uri = self::getInstance($live_site);
				self::$base['prefix'] = $uri->toString(array('scheme', 'host', 'port'));
				self::$base['path'] = rtrim($uri->toString(array('path')), '/\\');

				if (JPATH_BASE == JPATH_ADMINISTRATOR)
				{
					self::$base['path'] .= '/administrator';
				}
			}
			else
			{
				$uri = self::getInstance();
				self::$base['prefix'] = $uri->toString(array('scheme', 'host', 'port'));

				if (strpos(php_sapi_name(), 'cgi') !== false && !ini_get('cgi.fix_pathinfo') && !empty($_SERVER['REQUEST_URI']))
				{
>>>>>>> upstream/master
					// PHP-CGI on Apache with "cgi.fix_pathinfo = 0"

					// We shouldn't have user-supplied PATH_INFO in PHP_SELF in this case
					// because PHP will not work with PATH_INFO at all.
<<<<<<< HEAD
					$script_name =  $_SERVER['PHP_SELF'];
				} else {
					// Others
					$script_name =  $_SERVER['SCRIPT_NAME'];
				}

				$base['path'] =  rtrim(dirname($script_name), '/\\');
			}
		}

		return $pathonly === false ? $base['prefix'].$base['path'].'/' : $base['path'];
=======
					$script_name = $_SERVER['PHP_SELF'];
				}
				else
				{
					// Others
					$script_name = $_SERVER['SCRIPT_NAME'];
				}

				self::$base['path'] = rtrim(dirname($script_name), '/\\');
			}
		}

		return $pathonly === false ? self::$base['prefix'] . self::$base['path'] . '/' : self::$base['path'];
>>>>>>> upstream/master
	}

	/**
	 * Returns the root URI for the request.
	 *
<<<<<<< HEAD
	 * @param   boolean  $pathonly If false, prepend the scheme, host and port information. Default is false..
	 *
	 * @return  string  The root URI string.
=======
	 * @param   boolean  $pathonly  If false, prepend the scheme, host and port information. Default is false.
	 * @param   string   $path      The path
	 *
	 * @return  string  The root URI string.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function root($pathonly = false, $path = null)
	{
<<<<<<< HEAD
		static $root;

		// Get the scheme
		if (!isset($root)) {
			$uri			= self::getInstance(self::base());
			$root['prefix'] = $uri->toString(array('scheme', 'host', 'port'));
			$root['path']	= rtrim($uri->toString(array('path')), '/\\');
		}

		// Get the scheme
		if (isset($path)) {
			$root['path']	= $path;
		}

		return $pathonly === false ? $root['prefix'].$root['path'].'/' : $root['path'];
=======
		// Get the scheme
		if (empty(self::$root))
		{
			$uri = self::getInstance(self::base());
			self::$root['prefix'] = $uri->toString(array('scheme', 'host', 'port'));
			self::$root['path'] = rtrim($uri->toString(array('path')), '/\\');
		}

		// Get the scheme
		if (isset($path))
		{
			self::$root['path'] = $path;
		}

		return $pathonly === false ? self::$root['prefix'] . self::$root['path'] . '/' : self::$root['path'];
>>>>>>> upstream/master
	}

	/**
	 * Returns the URL for the request, minus the query.
	 *
	 * @return  string
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function current()
	{
<<<<<<< HEAD
		static $current;

		// Get the current URL.
		if (!isset($current)) {
			$uri	= self::getInstance();
			$current = $uri->toString(array('scheme', 'host', 'port', 'path'));
		}

		return $current;
=======
		// Get the current URL.
		if (empty(self::$current))
		{
			$uri = self::getInstance();
			self::$current = $uri->toString(array('scheme', 'host', 'port', 'path'));
		}

		return self::$current;
	}

	/**
	 * Method to reset class static members for testing and other various issues.
	 *
	 * @return  void
	 *
	 * @since   11.1
	 */
	public static function reset()
	{
		self::$instances = array();
		self::$base = array();
		self::$root = array();
		self::$current = '';
>>>>>>> upstream/master
	}

	/**
	 * Parse a given URI and populate the class fields.
	 *
<<<<<<< HEAD
	 * @param   string  $uri The URI string to parse.
	 *
	 * @return  boolean  True on success.
=======
	 * @param   string  $uri  The URI string to parse.
	 *
	 * @return  boolean  True on success.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function parse($uri)
	{
		// Initialise variables
		$retval = false;

		// Set the original URI to fall back on
		$this->_uri = $uri;

		// Parse the URI and populate the object fields.  If URI is parsed properly,
		// set method return value to true.

<<<<<<< HEAD
		if ($_parts = JString::parse_url($uri)) {
=======
		if ($_parts = JString::parse_url($uri))
		{
>>>>>>> upstream/master
			$retval = true;
		}

		// We need to replace &amp; with & for parse_str to work right...
<<<<<<< HEAD
		if (isset ($_parts['query']) && strpos($_parts['query'], '&amp;')) {
			$_parts['query'] = str_replace('&amp;', '&', $_parts['query']);
		}

		$this->_scheme = isset ($_parts['scheme']) ? $_parts['scheme'] : null;
		$this->_user = isset ($_parts['user']) ? $_parts['user'] : null;
		$this->_pass = isset ($_parts['pass']) ? $_parts['pass'] : null;
		$this->_host = isset ($_parts['host']) ? $_parts['host'] : null;
		$this->_port = isset ($_parts['port']) ? $_parts['port'] : null;
		$this->_path = isset ($_parts['path']) ? $_parts['path'] : null;
		$this->_query = isset ($_parts['query'])? $_parts['query'] : null;
		$this->_fragment = isset ($_parts['fragment']) ? $_parts['fragment'] : null;

		// Parse the query

		if (isset($_parts['query'])) {
=======
		if (isset($_parts['query']) && strpos($_parts['query'], '&amp;'))
		{
			$_parts['query'] = str_replace('&amp;', '&', $_parts['query']);
		}

		$this->_scheme = isset($_parts['scheme']) ? $_parts['scheme'] : null;
		$this->_user = isset($_parts['user']) ? $_parts['user'] : null;
		$this->_pass = isset($_parts['pass']) ? $_parts['pass'] : null;
		$this->_host = isset($_parts['host']) ? $_parts['host'] : null;
		$this->_port = isset($_parts['port']) ? $_parts['port'] : null;
		$this->_path = isset($_parts['path']) ? $_parts['path'] : null;
		$this->_query = isset($_parts['query']) ? $_parts['query'] : null;
		$this->_fragment = isset($_parts['fragment']) ? $_parts['fragment'] : null;

		// Parse the query

		if (isset($_parts['query']))
		{
>>>>>>> upstream/master
			parse_str($_parts['query'], $this->_vars);
		}
		return $retval;
	}

	/**
	 * Returns full uri string.
	 *
<<<<<<< HEAD
	 * @param   array  $parts An array specifying the parts to render.
	 *
	 * @return  string  The rendered URI string.
=======
	 * @param   array  $parts  An array specifying the parts to render.
	 *
	 * @return  string  The rendered URI string.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function toString($parts = array('scheme', 'user', 'pass', 'host', 'port', 'path', 'query', 'fragment'))
	{
		// Make sure the query is created
		$query = $this->getQuery();

		$uri = '';
<<<<<<< HEAD
		$uri .= in_array('scheme', $parts)  ? (!empty($this->_scheme) ? $this->_scheme.'://' : '') : '';
		$uri .= in_array('user', $parts)	? $this->_user : '';
		$uri .= in_array('pass', $parts)	? (!empty ($this->_pass) ? ':' : '') .$this->_pass. (!empty ($this->_user) ? '@' : '') : '';
		$uri .= in_array('host', $parts)	? $this->_host : '';
		$uri .= in_array('port', $parts)	? (!empty ($this->_port) ? ':' : '').$this->_port : '';
		$uri .= in_array('path', $parts)	? $this->_path : '';
		$uri .= in_array('query', $parts)	? (!empty ($query) ? '?'.$query : '') : '';
		$uri .= in_array('fragment', $parts)? (!empty ($this->_fragment) ? '#'.$this->_fragment : '') : '';
=======
		$uri .= in_array('scheme', $parts) ? (!empty($this->_scheme) ? $this->_scheme . '://' : '') : '';
		$uri .= in_array('user', $parts) ? $this->_user : '';
		$uri .= in_array('pass', $parts) ? (!empty($this->_pass) ? ':' : '') . $this->_pass . (!empty($this->_user) ? '@' : '') : '';
		$uri .= in_array('host', $parts) ? $this->_host : '';
		$uri .= in_array('port', $parts) ? (!empty($this->_port) ? ':' : '') . $this->_port : '';
		$uri .= in_array('path', $parts) ? $this->_path : '';
		$uri .= in_array('query', $parts) ? (!empty($query) ? '?' . $query : '') : '';
		$uri .= in_array('fragment', $parts) ? (!empty($this->_fragment) ? '#' . $this->_fragment : '') : '';
>>>>>>> upstream/master

		return $uri;
	}

	/**
	 * Adds a query variable and value, replacing the value if it
	 * already exists and returning the old value.
	 *
<<<<<<< HEAD
	 * @param   string  $name Name of the query variable to set.
	 * @param   string  $value Value of the query variable.
	 *
	 * @return  string  Previous value for the query variable.
=======
	 * @param   string  $name   Name of the query variable to set.
	 * @param   string  $value  Value of the query variable.
	 *
	 * @return  string  Previous value for the query variable.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function setVar($name, $value)
	{
		$tmp = @$this->_vars[$name];
		$this->_vars[$name] = $value;

		// Empty the query
		$this->_query = null;

		return $tmp;
	}

	/**
	 * Checks if variable exists.
	 *
<<<<<<< HEAD
	 * @param   string $name Name of the query variable to check.
	 *
	 * @return  bool exists.
=======
	 * @param   string  $name  Name of the query variable to check.
	 *
	 * @return  boolean  True if the variable exists.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function hasVar($name)
	{
		return array_key_exists($name, $this->_vars);
	}

	/**
	 * Returns a query variable by name.
	 *
<<<<<<< HEAD
	 * @param   string $name     Name of the query variable to get.
	 * @param   string $default  Default value to return if the variable is not set.
	 *
	 * @return  array Query variables.
	 *
	 * @since   11.1
	 */
	public function getVar($name, $default=null)
	{
		if (array_key_exists($name, $this->_vars)) {
=======
	 * @param   string  $name     Name of the query variable to get.
	 * @param   string  $default  Default value to return if the variable is not set.
	 *
	 * @return  array   Query variables.
	 *
	 * @since   11.1
	 */
	public function getVar($name, $default = null)
	{
		if (array_key_exists($name, $this->_vars))
		{
>>>>>>> upstream/master
			return $this->_vars[$name];
		}
		return $default;
	}

	/**
	 * Removes an item from the query string variables if it exists.
	 *
<<<<<<< HEAD
	 * @param   string  $name Name of variable to remove.
	 *
	 * @return	void
=======
	 * @param   string  $name  Name of variable to remove.
	 *
	 * @return  void
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function delVar($name)
	{
<<<<<<< HEAD
		if (array_key_exists($name, $this->_vars)) {
=======
		if (array_key_exists($name, $this->_vars))
		{
>>>>>>> upstream/master
			unset($this->_vars[$name]);

			//empty the query
			$this->_query = null;
		}
	}

	/**
	 * Sets the query to a supplied string in format:
<<<<<<< HEAD
	 *		foo=bar&x=y
	 *
	 * @param   mixed(array|string) $query The query string.
	 *
	 * @return	void
=======
	 * foo=bar&x=y
	 *
	 * @param   mixed  $query  The query string or array.
	 *
	 * @return  void
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function setQuery($query)
	{
<<<<<<< HEAD
		if (is_array($query)) {
			$this->_vars = $query;
		} else {
			if (strpos($query, '&amp;') !== false) {
=======
		if (is_array($query))
		{
			$this->_vars = $query;
		}
		else
		{
			if (strpos($query, '&amp;') !== false)
			{
>>>>>>> upstream/master
				$query = str_replace('&amp;', '&', $query);
			}
			parse_str($query, $this->_vars);
		}

		// Empty the query
		$this->_query = null;
	}

	/**
	 * Returns flat query string.
	 *
<<<<<<< HEAD
	 * @param	boolean	$toArray
	 *
	 * @return  string  Query string.
=======
	 * @param   boolean  $toArray  True to return the query as a key => value pair array.
	 *
	 * @return  string   Query string.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function getQuery($toArray = false)
	{
<<<<<<< HEAD
		if ($toArray) {
=======
		if ($toArray)
		{
>>>>>>> upstream/master
			return $this->_vars;
		}

		// If the query is empty build it first
<<<<<<< HEAD
		if (is_null($this->_query)) {
=======
		if (is_null($this->_query))
		{
>>>>>>> upstream/master
			$this->_query = self::buildQuery($this->_vars);
		}

		return $this->_query;
	}

	/**
	 * Build a query from a array (reverse of the PHP parse_str()).
	 *
<<<<<<< HEAD
	 * @return  string  The resulting query string.
	 * @since   11.1
	 * @see	parse_str()
	 */
	public static function buildQuery($params)
	{
		if (!is_array($params) || count($params) == 0) {
=======
	 * @param   array  $params  The array of key => value pairs to return as a query string.
	 *
	 * @return  string  The resulting query string.
	 *
	 * @see     parse_str()
	 * @since   11.1
	 */
	public static function buildQuery($params)
	{
		if (!is_array($params) || count($params) == 0)
		{
>>>>>>> upstream/master
			return false;
		}

		return urldecode(http_build_query($params, '', '&'));
	}

	/**
	 * Get URI scheme (protocol)
<<<<<<< HEAD
	 *		ie. http, https, ftp, etc...
	 *
	 * @return  string  The URI scheme.
=======
	 * ie. http, https, ftp, etc...
	 *
	 * @return  string  The URI scheme.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function getScheme()
	{
		return $this->_scheme;
	}

	/**
	 * Set URI scheme (protocol)
<<<<<<< HEAD
	 *		ie. http, https, ftp, etc...
	 *
	 * @param   string  $scheme The URI scheme.
	 *
	 * @return	void
=======
	 * ie. http, https, ftp, etc...
	 *
	 * @param   string  $scheme  The URI scheme.
	 *
	 * @return  void
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function setScheme($scheme)
	{
		$this->_scheme = $scheme;
	}

	/**
	 * Get URI username
<<<<<<< HEAD
	 *		Returns the username, or null if no username was specified.
	 *
	 * @return  string  The URI username.
=======
	 * Returns the username, or null if no username was specified.
	 *
	 * @return  string  The URI username.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function getUser()
	{
		return $this->_user;
	}

	/**
	 * Set URI username.
	 *
<<<<<<< HEAD
	 * @param   string  $user The URI username.
	 *
	 * @return	void
=======
	 * @param   string  $user  The URI username.
	 *
	 * @return  void
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function setUser($user)
	{
		$this->_user = $user;
	}

	/**
	 * Get URI password
<<<<<<< HEAD
	 *		Returns the password, or null if no password was specified.
	 *
	 * @return  string  The URI password.
=======
	 * Returns the password, or null if no password was specified.
	 *
	 * @return  string  The URI password.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function getPass()
	{
		return $this->_pass;
	}

	/**
	 * Set URI password.
	 *
<<<<<<< HEAD
	 * @param   string  $pass The URI password.
	 *
	 * @return	void
=======
	 * @param   string  $pass  The URI password.
	 *
	 * @return  void
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function setPass($pass)
	{
		$this->_pass = $pass;
	}

	/**
	 * Get URI host
<<<<<<< HEAD
	 *		Returns the hostname/ip or null if no hostname/ip was specified.
	 *
	 * @return  string  The URI host.
=======
	 * Returns the hostname/ip or null if no hostname/ip was specified.
	 *
	 * @return  string  The URI host.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function getHost()
	{
		return $this->_host;
	}

	/**
	 * Set URI host.
	 *
<<<<<<< HEAD
	 * @param   string  $host The URI host.
	 *
	 * @return	void
=======
	 * @param   string  $host  The URI host.
	 *
	 * @return  void
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function setHost($host)
	{
		$this->_host = $host;
	}

	/**
	 * Get URI port
<<<<<<< HEAD
	 *		Returns the port number, or null if no port was specified.
	 *
	 * @return  integer  The URI port number.
	 */
	public function getPort()
	{
		return (isset ($this->_port)) ? $this->_port : null;
=======
	 * Returns the port number, or null if no port was specified.
	 *
	 * @return  integer  The URI port number.
	 *
	 * @since   11.1
	 */
	public function getPort()
	{
		return (isset($this->_port)) ? $this->_port : null;
>>>>>>> upstream/master
	}

	/**
	 * Set URI port.
	 *
<<<<<<< HEAD
	 * @param   integer  $port The URI port number.
	 *
	 * @return	void
=======
	 * @param   integer  $port  The URI port number.
	 *
	 * @return  void
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function setPort($port)
	{
		$this->_port = $port;
	}

	/**
	 * Gets the URI path string.
	 *
	 * @return  string  The URI path string.
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function getPath()
	{
		return $this->_path;
	}

	/**
	 * Set the URI path string.
	 *
<<<<<<< HEAD
	 * @param   string  $path The URI path string.
	 *
	 * @return	void
=======
	 * @param   string  $path  The URI path string.
	 *
	 * @return  void
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function setPath($path)
	{
		$this->_path = $this->_cleanPath($path);
	}

	/**
	 * Get the URI archor string
<<<<<<< HEAD
	 *		Everything after the "#".
	 *
	 * @return  string  The URI anchor string.
=======
	 * Everything after the "#".
	 *
	 * @return  string  The URI anchor string.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function getFragment()
	{
		return $this->_fragment;
	}

	/**
	 * Set the URI anchor string
<<<<<<< HEAD
	 *		everything after the "#".
	 *
	 * @param   string  $anchor The URI anchor string.
	 *
	 * @return	void
=======
	 * everything after the "#".
	 *
	 * @param   string  $anchor  The URI anchor string.
	 *
	 * @return  void
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function setFragment($anchor)
	{
		$this->_fragment = $anchor;
	}

	/**
	 * Checks whether the current URI is using HTTPS.
	 *
	 * @return  boolean  True if using SSL via HTTPS.
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function isSSL()
	{
		return $this->getScheme() == 'https' ? true : false;
	}

	/**
	 * Checks if the supplied URL is internal
	 *
<<<<<<< HEAD
	 * @param   string   $url The URL to check.
	 *
	 * @return  boolean  True if Internal.
=======
	 * @param   string  $url  The URL to check.
	 *
	 * @return  boolean  True if Internal.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function isInternal($url)
	{
		$uri = self::getInstance($url);
		$base = $uri->toString(array('scheme', 'host', 'port', 'path'));
		$host = $uri->toString(array('scheme', 'host', 'port'));
<<<<<<< HEAD
		if (stripos($base, self::base()) !== 0 && !empty($host)) {
=======
		if (stripos($base, self::base()) !== 0 && !empty($host))
		{
>>>>>>> upstream/master
			return false;
		}
		return true;
	}

	/**
	 * Resolves //, ../ and ./ from a path and returns
	 * the result. Eg:
	 *
	 * /foo/bar/../boo.php	=> /foo/boo.php
	 * /foo/bar/../../boo.php => /boo.php
	 * /foo/bar/.././/boo.php => /foo/boo.php
	 *
<<<<<<< HEAD
	 * @param	string $path The URI path to clean.
	 *
	 * @return	string Cleaned and resolved URI path.
	 * @since	11.1
=======
	 * @param   string  $path  The URI path to clean.
	 *
	 * @return  string  Cleaned and resolved URI path.
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	protected function _cleanPath($path)
	{
		$path = explode('/', preg_replace('#(/+)#', '/', $path));

<<<<<<< HEAD
		for ($i = 0, $n = count($path); $i < $n; $i ++)
		{
			if ($path[$i] == '.' OR $path[$i] == '..') {
				if (($path[$i] == '.') OR ($path[$i] == '..' AND $i == 1 AND $path[0] == '')) {
					unset ($path[$i]);
					$path = array_values($path);
					$i --;
					$n --;
				} elseif ($path[$i] == '..' AND ($i > 1 OR ($i == 1 AND $path[0] != ''))) {
					unset ($path[$i]);
					unset ($path[$i -1]);
=======
		for ($i = 0, $n = count($path); $i < $n; $i++)
		{
			if ($path[$i] == '.' or $path[$i] == '..')
			{
				if (($path[$i] == '.') or ($path[$i] == '..' and $i == 1 and $path[0] == ''))
				{
					unset($path[$i]);
					$path = array_values($path);
					$i--;
					$n--;
				}
				else if ($path[$i] == '..' and ($i > 1 or ($i == 1 and $path[0] != '')))
				{
					unset($path[$i]);
					unset($path[$i - 1]);
>>>>>>> upstream/master
					$path = array_values($path);
					$i -= 2;
					$n -= 2;
				}
			}
		}

		return implode('/', $path);
	}
<<<<<<< HEAD
}
=======
}
>>>>>>> upstream/master
