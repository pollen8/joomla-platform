<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Client
 *
 * @copyright   Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('JPATH_PLATFORM') or die;

jimport('joomla.environment.uri');

/**
 * HTTP client class.
 *
 * @package     Joomla.Platform
<<<<<<< HEAD
 * @since       11.1
 * @subpackage  Client
=======
 * @subpackage  Client
 * @since       11.1
>>>>>>> upstream/master
 */
class JHttp
{
	/**
	 * Server connection resources array.
	 *
	 * @var    array
	 * @since  11.1
	 */
<<<<<<< HEAD
	protected $_connections = array();
=======
	protected $connections = array();
>>>>>>> upstream/master

	/**
	 * Timeout limit in seconds for the server connection.
	 *
	 * @var    int
	 * @since  11.1
	 */
<<<<<<< HEAD
	protected $_timeout = 5;
=======
	protected $timeout = 5;
>>>>>>> upstream/master

	/**
	 * Server response string.
	 *
	 * @var    string
	 * @since  11.1
	 */
<<<<<<< HEAD
	protected $_response;
=======
	protected $response;
>>>>>>> upstream/master

	/**
	 * Constructor.
	 *
	 * @param   array  $options  Array of configuration options for the client.
	 *
	 * @return  void
	 *
	 * @since   11.1
	 */
	public function __construct($options = array())
	{
		// If a connection timeout is set, use it.
<<<<<<< HEAD
		if (isset($options['timeout'])) {
			$this->_timeout = $options['timeout'];
=======
		if (isset($options['timeout']))
		{
			$this->timeout = $options['timeout'];
>>>>>>> upstream/master
		}
	}

	/**
	 * Destructor.
	 *
	 * @return  void
	 *
	 * @since   11.1
	 */
	public function __destruct()
	{
		// Close all the connections.
<<<<<<< HEAD
		foreach ($this->_connections as $connection)
=======
		foreach ($this->connections as $connection)
>>>>>>> upstream/master
		{
			fclose($connection);
		}
	}

	/**
	 * Method to send the HEAD command to the server.
	 *
<<<<<<< HEAD
	 * @param   string  $url  Path to the resource.
	 *
	 * @return  bool    True on success.
	 *
	 * @since   11.1
	 * @throws  JException
	 */
	public function head($url)
=======
	 * @param   string  $url      Path to the resource.
	 * @param   array   $headers  An array of name-value pairs to include in the header of the request.
	 *
	 * @return  boolean  True on success.
	 *
	 * @since   11.1
	 * @throws  Exception
	 */
	public function head($url, $headers = null)
>>>>>>> upstream/master
	{
		// Parse the request url.
		$uri = JUri::getInstance($url);

<<<<<<< HEAD
		try {
			$connection = $this->_connect($uri);
		}
		catch (JException $e) {
=======
		try
		{
			$connection = $this->connect($uri);
		}
		catch (Exception $e)
		{
>>>>>>> upstream/master
			return false;
		}

		// Send the command to the server.
<<<<<<< HEAD
		if (!$this->_sendRequest($connection, 'HEAD', $uri)) {
			return false;
		}

		return $this->_getResponseObject();
=======
		if (!$this->sendRequest($connection, 'HEAD', $uri, null, $headers))
		{
			return false;
		}

		return $this->getResponseObject();
>>>>>>> upstream/master
	}

	/**
	 * Method to send the GET command to the server.
	 *
<<<<<<< HEAD
	 * @param   string  $url  Path to the resource.
	 *
	 * @return  bool    True on success.
	 *
	 * @since   11.1
	 * @throws  JException
	 */
	public function get($url)
=======
	 * @param   string  $url      Path to the resource.
	 * @param   array   $headers  An array of name-value pairs to include in the header of the request.
	 *
	 * @return  boolean  True on success.
	 *
	 * @since   11.1
	 * @throws  Exception
	 */
	public function get($url, $headers = null)
>>>>>>> upstream/master
	{
		// Parse the request url.
		$uri = JUri::getInstance($url);

<<<<<<< HEAD
		try {
			$connection = $this->_connect($uri);
		}
		catch (JException $e) {
=======
		try
		{
			$connection = $this->connect($uri);
		}
		catch (Exception $e)
		{
>>>>>>> upstream/master
			return false;
		}

		// Send the command to the server.
<<<<<<< HEAD
		if (!$this->_sendRequest($connection, 'GET', $uri)) {
			return false;
		}

		return $this->_getResponseObject();
=======
		if (!$this->sendRequest($connection, 'GET', $uri, null, $headers))
		{
			return false;
		}

		return $this->getResponseObject();
>>>>>>> upstream/master
	}

	/**
	 * Method to send the POST command to the server.
	 *
<<<<<<< HEAD
	 * @param   string  $url   Path to the resource.
	 * @param   array   $data  Associative array of key/value pairs to send as post values.
	 *
	 * @return  bool    True on success.
	 *
	 * @since   11.1
	 * @throws  JException
	 */
	public function post($url, $data)
=======
	 * @param   string  $url      Path to the resource.
	 * @param   array   $data     Associative array of key/value pairs to send as post values.
	 * @param   array   $headers  An array of name-value pairs to include in the header of the request.
	 *
	 * @return  boolean  True on success.
	 *
	 * @since   11.1
	 * @throws  Exception
	 */
	public function post($url, $data, $headers = null)
>>>>>>> upstream/master
	{
		// Parse the request url.
		$uri = JUri::getInstance($url);

<<<<<<< HEAD
		try {
			$connection = $this->_connect($uri);
		}
		catch (JException $e) {
=======
		try
		{
			$connection = $this->connect($uri);
		}
		catch (Exception $e)
		{
>>>>>>> upstream/master
			return false;
		}

		// Send the command to the server.
<<<<<<< HEAD
		if (!$this->_sendRequest($connection, 'POST', $uri, $data)) {
			return false;
		}

		return $this->_getResponseObject();
=======
		if (!$this->sendRequest($connection, 'POST', $uri, $data, $headers))
		{
			return false;
		}

		return $this->getResponseObject();
>>>>>>> upstream/master
	}

	/**
	 * Send a command to the server and validate an expected response.
	 *
<<<<<<< HEAD
	 * @param   string  Command to send to the server.
	 * @param   mixed   Valid response code or array of response codes.
	 *
	 * @return  bool  True on success.
	 *
	 * @since   11.1
	 * @throws  JException
	 */
	protected function _sendRequest($connection, $method, JUri $uri, $data = null, $headers = null)
=======
	 * @param   resource  $connection  The HTTP connection resource.
	 * @param   string    $method      The HTTP method for sending the request.
	 * @param   string    $uri         The URI to the resource to request.
	 * @param   array     $data        An array of key => value pairs to send with the request.
	 * @param   array     $headers     An array of request headers to send with the request.
	 *
	 * @return  boolean  True on success.
	 *
	 * @since   11.1
	 * @throws  Exception
	 */
	protected function sendRequest($connection, $method, JUri $uri, $data = null, $headers = null)
>>>>>>> upstream/master
	{
		// Make sure the connection is a valid resource.
		if (is_resource($connection))
		{
			// Make sure the connection has not timed out.
			$meta = stream_get_meta_data($connection);
<<<<<<< HEAD
			if ($meta['timed_out']) {
				throw new JException('Server connection timed out.', 0, E_WARNING);
			}
		}
		else {
			throw new JException('Not connected to server.', 0, E_WARNING);
=======
			if ($meta['timed_out'])
			{
				throw new Exception('Server connection timed out.', 0);
			}
		}
		else
		{
			throw new Exception('Not connected to server.', 0);
>>>>>>> upstream/master
		}

		// Get the request path from the URI object.
		$path = $uri->toString(array('path', 'query'));

		// Build the request payload.
		$request = array();
<<<<<<< HEAD
		$request[] = strtoupper($method).' '.((empty($path)) ? '/' : $path).' HTTP/1.0';
		$request[] = 'Host: '.$uri->getHost();
		$request[] = 'User-Agent: JHttp | Joomla/2.0';
=======
		$request[] = strtoupper($method) . ' ' . ((empty($path)) ? '/' : $path) . ' HTTP/1.0';
		$request[] = 'Host: ' . $uri->getHost();

		// If no user agent is set use the base one.
		if (empty($headers) || !isset($headers['User-Agent']))
		{
			$request[] = 'User-Agent: JHttp | JoomlaPlatform/11.3';
		}
>>>>>>> upstream/master

		// If there are custom headers to send add them to the request payload.
		if (is_array($headers))
		{
			foreach ($headers as $k => $v)
			{
<<<<<<< HEAD
				$request[] = $k.': '.$v;
=======
				$request[] = $k . ': ' . $v;
>>>>>>> upstream/master
			}
		}

		// If we have data to send add it to the request payload.
		if (!empty($data))
		{
			// If the data is an array, build the request query string.
<<<<<<< HEAD
			if (is_array($data)) {
=======
			if (is_array($data))
			{
>>>>>>> upstream/master
				$data = http_build_query($data);
			}

			$request[] = 'Content-Type: application/x-www-form-urlencoded; charset=utf-8';
<<<<<<< HEAD
			$request[] = 'Content-Length: '.strlen($data);
=======
			$request[] = 'Content-Length: ' . strlen($data);
>>>>>>> upstream/master
			$request[] = null;
			$request[] = $data;
		}

		// Send the request to the server.
<<<<<<< HEAD
		fwrite($connection, implode("\r\n", $request)."\r\n\r\n");

		// Get the response data from the server.
		$this->_response = null;
		while (!feof($connection))
		{
		    $this->_response .= fgets($connection, 4096);
=======
		fwrite($connection, implode("\r\n", $request) . "\r\n\r\n");

		// Get the response data from the server.
		$this->response = null;
		while (!feof($connection))
		{
			$this->response .= fgets($connection, 4096);
>>>>>>> upstream/master
		}

		return true;
	}

	/**
	 * Method to get a response object from a server response.
	 *
	 * @return  JHttpResponse
	 *
	 * @since   11.1
<<<<<<< HEAD
	 * @throws  JException
	 */
	protected function _getResponseObject()
	{
		// Create the response object.
		$return = new JHttpResponse();

		// Split the response into headers and body.
		$response = explode("\r\n\r\n", $this->_response, 2);
=======
	 * @throws  Exception
	 */
	protected function getResponseObject()
	{
		// Create the response object.
		$return = new JHttpResponse;

		// Split the response into headers and body.
		$response = explode("\r\n\r\n", $this->response, 2);
>>>>>>> upstream/master

		// Get the response headers as an array.
		$headers = explode("\r\n", $response[0]);

		// Get the response code from the first offset of the response headers.
		preg_match('/[0-9]{3}/', array_shift($headers), $matches);
		$code = $matches[0];
<<<<<<< HEAD
		if (is_numeric($code)) {
			$return->code = (int) $code;
		}
		// No valid response code was detected.
		else {
			throw new JException('Invalid server response.', 0, E_WARNING, $this->_response);
=======
		if (is_numeric($code))
		{
			$return->code = (int) $code;
		}
		// No valid response code was detected.
		else
		{
			throw new Exception('Invalid server response.', 0);
>>>>>>> upstream/master
		}

		// Add the response headers to the response object.
		foreach ($headers as $header)
		{
			$pos = strpos($header, ':');
			$return->headers[trim(substr($header, 0, $pos))] = trim(substr($header, ($pos + 1)));
		}

		// Set the response body if it exists.
<<<<<<< HEAD
		if (!empty($response[1])) {
=======
		if (!empty($response[1]))
		{
>>>>>>> upstream/master
			$return->body = $response[1];
		}

		return $return;
	}

	/**
	 * Method to connect to a server and get the resource.
	 *
<<<<<<< HEAD
	 * @param   JUri   $uri  The URI to connect with.
=======
	 * @param   JUri  $uri  The URI to connect with.
>>>>>>> upstream/master
	 *
	 * @return  mixed  Connection resource on success or boolean false on failure.
	 *
	 * @since   11.1
	 */
<<<<<<< HEAD
	protected function _connect(JUri $uri)
=======
	protected function connect(JUri $uri)
>>>>>>> upstream/master
	{
		// Initialize variables.
		$errno = null;
		$err = null;

		// Get the host from the uri.
<<<<<<< HEAD
		$host = ($uri->isSSL()) ? 'ssl://'.$uri->getHost() : $uri->getHost();
=======
		$host = ($uri->isSSL()) ? 'ssl://' . $uri->getHost() : $uri->getHost();
>>>>>>> upstream/master

		// If the port is not explicitly set in the URI detect it.
		if (!$uri->getPort())
		{
			$port = ($uri->getScheme() == 'https') ? 443 : 80;
		}
		// Use the set port.
<<<<<<< HEAD
		else {
=======
		else
		{
>>>>>>> upstream/master
			$port = $uri->getPort();
		}

		// Build the connection key for resource memory caching.
<<<<<<< HEAD
		$key = md5($host.$port);

		// If the connection already exists, use it.
		if (!empty($this->_connections[$key]) && is_resource($this->_connections[$key]))
		{
			// Make sure the connection has not timed out.
			$meta = stream_get_meta_data($this->_connections[$key]);
			if (!$meta['timed_out']) {
				return $this->_connections[$key];
=======
		$key = md5($host . $port);

		// If the connection already exists, use it.
		if (!empty($this->connections[$key]) && is_resource($this->connections[$key]))
		{
			// Make sure the connection has not timed out.
			$meta = stream_get_meta_data($this->connections[$key]);
			if (!$meta['timed_out'])
			{
				return $this->connections[$key];
>>>>>>> upstream/master
			}
		}

		// Attempt to connect to the server.
<<<<<<< HEAD
		if ($this->_connections[$key] = fsockopen($host, $port, $errno, $err, $this->_timeout)) {
			stream_set_timeout($this->_connections[$key], $this->_timeout);
		}

		return $this->_connections[$key];
=======
		$this->connections[$key] = fsockopen($host, $port, $errno, $err, $this->timeout);
		if ($this->connections[$key])
		{
			stream_set_timeout($this->connections[$key], $this->timeout);
		}

		return $this->connections[$key];
>>>>>>> upstream/master
	}
}

/**
 * HTTP response data object class.
 *
 * @package     Joomla.Platform
<<<<<<< HEAD
 * @since       11.1
 * @subpackage  Client
=======
 * @subpackage  Client
 * @since       11.1
>>>>>>> upstream/master
 */
class JHttpResponse
{
	/**
<<<<<<< HEAD
	 * The server response code.
	 *
	 * @var    int
=======
	 * @var    int  The server response code.
>>>>>>> upstream/master
	 * @since  11.1
	 */
	public $code;

	/**
<<<<<<< HEAD
	 * Response headers.
	 *
	 * @var    array
=======
	 * @var    array  Response headers.
>>>>>>> upstream/master
	 * @since  11.1
	 */
	public $headers = array();

	/**
<<<<<<< HEAD
	 * Server response body.
	 *
	 * @var    string
=======
	 * @var    string  Server response body.
>>>>>>> upstream/master
	 * @since  11.1
	 */
	public $body;
}