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

jimport('joomla.application.input');
>>>>>>> upstream/master
jimport('joomla.event.dispatcher');
jimport('joomla.environment.response');
jimport('joomla.log.log');

/**
 * Base class for a Joomla! application.
 *
 * Acts as a Factory class for application specific objects and provides many
 * supporting API functions. Derived clases should supply the route(), dispatch()
 * and render() functions.
 *
 * @package     Joomla.Platform
 * @subpackage  Application
 * @since       11.1
 */

class JApplication extends JObject
{
	/**
	 * The client identifier.
	 *
	 * @var    integer
	 * @since  11.1
	 */
	protected $_clientId = null;

	/**
	 * The application message queue.
	 *
	 * @var    array
	 * @since  11.1
	 */
	protected $_messageQueue = array();

	/**
	 * The name of the application.
	 *
	 * @var    array
	 * @since  11.1
	 */
	protected $_name = null;

	/**
	 * The scope of the application.
	 *
	 * @var    string
	 * @since  11.1
	 */
	public $scope = null;

	/**
	 * The time the request was made.
	 *
	 * @var    date
	 * @since  11.1
	 */
	public $requestTime = null;

	/**
	 * The time the request was made as Unix timestamp.
	 *
	 * @var    integer
	 * @since  11.1
	 */
	public $startTime = null;

	/**
<<<<<<< HEAD
	 * Class constructor.
	 *
	 * @param   array  $config  A configuration array including optional elements such as session
	 *                   session_name, clientId and others. This is not exhaustive.
=======
	 * The application input object.
	 *
	 * @var    JInput
	 * @since  11.2
	 */
	public $input = null;

	/**
	 * Class constructor.
	 *
	 * @param   array  $config  A configuration array including optional elements such as session
	 * session_name, clientId and others. This is not exhaustive.
>>>>>>> upstream/master
	 *
	 * @since   11.1
	 */
	public function __construct($config = array())
	{
		jimport('joomla.utilities.utility');
		jimport('joomla.error.profiler');

		// Set the view name.
<<<<<<< HEAD
		$this->_name		= $this->getName();
		$this->_clientId	= $config['clientId'];

		// Enable sessions by default.
		if (!isset($config['session'])) {
			$config['session'] = true;
		}

		// Set the session default name.
		if (!isset($config['session_name'])) {
=======
		$this->_name = $this->getName();

		// Only set the clientId if available.
		if (isset($config['clientId']))
		{
			$this->_clientId = $config['clientId'];
		}

		// Enable sessions by default.
		if (!isset($config['session']))
		{
			$config['session'] = true;
		}

		// Create the input object
		if (class_exists('JInput'))
		{
			$this->input = new JInput;
		}

		// Set the session default name.
		if (!isset($config['session_name']))
		{
>>>>>>> upstream/master
			$config['session_name'] = $this->_name;
		}

		// Set the default configuration file.
<<<<<<< HEAD
		if (!isset($config['config_file'])) {
=======
		if (!isset($config['config_file']))
		{
>>>>>>> upstream/master
			$config['config_file'] = 'configuration.php';
		}

		// Create the configuration object.
<<<<<<< HEAD
		$this->_createConfiguration(JPATH_CONFIGURATION.DS.$config['config_file']);

		// Create the session if a session name is passed.
		if ($config['session'] !== false) {
=======
		if (file_exists(JPATH_CONFIGURATION . '/' . $config['config_file']))
		{
			$this->_createConfiguration(JPATH_CONFIGURATION . '/' . $config['config_file']);
		}

		// Create the session if a session name is passed.
		if ($config['session'] !== false)
		{
>>>>>>> upstream/master
			$this->_createSession(JUtility::getHash($config['session_name']));
		}

		$this->set('requestTime', gmdate('Y-m-d H:i'));

		// Used by task system to ensure that the system doesn't go over time.
		$this->set('startTime', JProfiler::getmicrotime());
	}

	/**
	 * Returns the global JApplication object, only creating it if it
	 * doesn't already exist.
	 *
	 * @param   mixed   $client  A client identifier or name.
	 * @param   array   $config  An optional associative array of configuration settings.
<<<<<<< HEAD
	 * @param   strong  $prefx   A prefix for class names
	 *
	 * @return  JApplication A JApplication object.
=======
	 * @param   strong  $prefix  A prefix for class names
	 *
	 * @return  JApplication A JApplication object.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function getInstance($client, $config = array(), $prefix = 'J')
	{
		static $instances;

<<<<<<< HEAD
		if (!isset($instances)) {
			$instances = array();
		}

		if (empty($instances[$client])) {
=======
		if (!isset($instances))
		{
			$instances = array();
		}

		if (empty($instances[$client]))
		{
>>>>>>> upstream/master
			// Load the router object.
			jimport('joomla.application.helper');
			$info = JApplicationHelper::getClientInfo($client, true);

<<<<<<< HEAD
			$path = $info->path.DS.'includes'.DS.'application.php';
			if (file_exists($path)) {
				require_once $path;

				// Create a JRouter object.
				$classname = $prefix.ucfirst($client);
				$instance = new $classname($config);
			}
			else {
=======
			$path = $info->path . '/includes/application.php';
			if (file_exists($path))
			{
				include_once $path;

				// Create a JRouter object.
				$classname = $prefix . ucfirst($client);
				$instance = new $classname($config);
			}
			else
			{
>>>>>>> upstream/master
				$error = JError::raiseError(500, JText::sprintf('JLIB_APPLICATION_ERROR_APPLICATION_LOAD', $client));
				return $error;
			}

			$instances[$client] = &$instance;
		}

		return $instances[$client];
	}

	/**
	 * Initialise the application.
	 *
	 * @param   array  $options  An optional associative array of configuration settings.
	 *
<<<<<<< HEAD
=======
	 * @return  void
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function initialise($options = array())
	{
		jimport('joomla.plugin.helper');

		// Set the language in the class.
		$config = JFactory::getConfig();

		// Check that we were given a language in the array (since by default may be blank).
<<<<<<< HEAD
		if (isset($options['language'])) {
=======
		if (isset($options['language']))
		{
>>>>>>> upstream/master
			$config->set('language', $options['language']);
		}

		// Set user specific editor.
<<<<<<< HEAD
		$user	= JFactory::getUser();
		$editor	= $user->getParam('editor', $this->getCfg('editor'));
		if (!JPluginHelper::isEnabled('editors', $editor)) {
			$editor	= $this->getCfg('editor');
			if (!JPluginHelper::isEnabled('editors', $editor)) {
				$editor	= 'none';
=======
		$user = JFactory::getUser();
		$editor = $user->getParam('editor', $this->getCfg('editor'));
		if (!JPluginHelper::isEnabled('editors', $editor))
		{
			$editor = $this->getCfg('editor');
			if (!JPluginHelper::isEnabled('editors', $editor))
			{
				$editor = 'none';
>>>>>>> upstream/master
			}
		}

		$config->set('editor', $editor);

		// Trigger the onAfterInitialise event.
		JPluginHelper::importPlugin('system');
		$this->triggerEvent('onAfterInitialise');
	}

	/**
	 * Route the application.
	 *
	 * Routing is the process of examining the request environment to determine which
	 * component should receive the request. The component optional parameters
	 * are then set in the request object to be processed when the application is being
	 * dispatched.
	 *
<<<<<<< HEAD
	 * @return  void;
=======
	 * @return  void
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function route()
	{
		// Get the full request URI.
<<<<<<< HEAD
		$uri	= clone JURI::getInstance();
=======
		$uri = clone JURI::getInstance();
>>>>>>> upstream/master

		$router = $this->getRouter();
		$result = $router->parse($uri);

		JRequest::set($result, 'get', false);

		// Trigger the onAfterRoute event.
		JPluginHelper::importPlugin('system');
		$this->triggerEvent('onAfterRoute');
	}

	/**
<<<<<<< HEAD
	 * Dispatch the applicaiton.
=======
	 * Dispatch the application.
>>>>>>> upstream/master
	 *
	 * Dispatching is the process of pulling the option from the request object and
	 * mapping them to a component. If the component does not exist, it handles
	 * determining a default component to dispatch.
	 *
<<<<<<< HEAD
	 * @param   string  $component	The component to dispatch.
	 *
	 * @return  void
=======
	 * @param   string  $component  The component to dispatch.
	 *
	 * @return  void
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function dispatch($component = null)
	{
		$document = JFactory::getDocument();

<<<<<<< HEAD
		$document->setTitle($this->getCfg('sitename'). ' - ' .JText::_('JADMINISTRATION'));
=======
		$document->setTitle($this->getCfg('sitename') . ' - ' . JText::_('JADMINISTRATION'));
>>>>>>> upstream/master
		$document->setDescription($this->getCfg('MetaDesc'));

		$contents = JComponentHelper::renderComponent($component);
		$document->setBuffer($contents, 'component');

		// Trigger the onAfterDispatch event.
		JPluginHelper::importPlugin('system');
		$this->triggerEvent('onAfterDispatch');
	}

	/**
	 * Render the application.
	 *
	 * Rendering is the process of pushing the document buffers into the template
	 * placeholders, retrieving data from the document and pushing it into
	 * the JResponse buffer.
	 *
<<<<<<< HEAD
	 * @return  void;
=======
	 * @return  void
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function render()
	{
<<<<<<< HEAD
		$params = array(
			'template'	=> $this->getTemplate(),
			'file'		=> 'index.php',
			'directory'	=> JPATH_THEMES,
			'params'	=> $template->params
		);
=======
		$params = array('template' => $this->getTemplate(), 'file' => 'index.php', 'directory' => JPATH_THEMES, 'params' => $template->params);
>>>>>>> upstream/master

		// Parse the document.
		$document = JFactory::getDocument();
		$document->parse($params);

		// Trigger the onBeforeRender event.
		JPluginHelper::importPlugin('system');
		$this->triggerEvent('onBeforeRender');

		// Render the document.
		$caching = ($this->getCfg('caching') >= 2) ? true : false;
		JResponse::setBody($document->render($caching, $params));

		// Trigger the onAfterRender event.
		$this->triggerEvent('onAfterRender');
	}

	/**
	 * Exit the application.
	 *
<<<<<<< HEAD
	 * @param    integer  $code  Exit code
	 *
	 * @return   void  Exits the application.
=======
	 * @param   integer  $code  Exit code
	 *
	 * @return  void     Exits the application.
	 *
>>>>>>> upstream/master
	 * @since    11.1
	 */
	public function close($code = 0)
	{
		exit($code);
	}

	/**
	 * Redirect to another URL.
	 *
	 * Optionally enqueues a message in the system message queue (which will be displayed
	 * the next time a page is loaded) using the enqueueMessage method. If the headers have
	 * not been sent the redirect will be accomplished using a "301 Moved Permanently"
	 * code in the header pointing to the new location. If the headers have already been
	 * sent this will be accomplished using a JavaScript statement.
	 *
	 * @param   string   $url      The URL to redirect to. Can only be http/https URL
	 * @param   string   $msg      An optional message to display on redirect.
	 * @param   string   $msgType  An optional message type. Defaults to message.
	 * @param   boolean  $moved    True if the page is 301 Permanently Moved, otherwise 303 See Other is assumed.
	 *
<<<<<<< HEAD
	 * @see       JApplication::enqueueMessage()
	 *
	 * @return  void  Calls exit().
	 *
	 * @see		JApplication::enqueueMessage()
	 * @since   11.1
	 */
	public function redirect($url, $msg='', $msgType='message', $moved = false)
	{
		// Check for relative internal links.
		if (preg_match('#^index2?\.php#', $url)) {
=======
	 * @return  void  Calls exit().
	 *
	 * @since   11.1
	 *
	 * @see     JApplication::enqueueMessage()
	 */
	public function redirect($url, $msg = '', $msgType = 'message', $moved = false)
	{
		// Check for relative internal links.
		if (preg_match('#^index2?\.php#', $url))
		{
>>>>>>> upstream/master
			$url = JURI::base() . $url;
		}

		// Strip out any line breaks.
		$url = preg_split("/[\r\n]/", $url);
		$url = $url[0];

		// If we don't start with a http we need to fix this before we proceed.
		// We could validly start with something else (e.g. ftp), though this would
		// be unlikely and isn't supported by this API.
<<<<<<< HEAD
		if (!preg_match('#^http#i', $url)) {
			$uri = JURI::getInstance();
			$prefix = $uri->toString(Array('scheme', 'user', 'pass', 'host', 'port'));

			if ($url[0] == '/') {
				// We just need the prefix since we have a path relative to the root.
				$url = $prefix . $url;
			}
			else {
				// It's relative to where we are now, so lets add that.
				$parts = explode('/', $uri->toString(Array('path')));
				array_pop($parts);
				$path = implode('/',$parts).'/';
=======
		if (!preg_match('#^http#i', $url))
		{
			$uri = JURI::getInstance();
			$prefix = $uri->toString(Array('scheme', 'user', 'pass', 'host', 'port'));

			if ($url[0] == '/')
			{
				// We just need the prefix since we have a path relative to the root.
				$url = $prefix . $url;
			}
			else
			{
				// It's relative to where we are now, so lets add that.
				$parts = explode('/', $uri->toString(Array('path')));
				array_pop($parts);
				$path = implode('/', $parts) . '/';
>>>>>>> upstream/master
				$url = $prefix . $path . $url;
			}
		}

<<<<<<< HEAD

		// If the message exists, enqueue it.
		if (trim($msg)) {
=======
		// If the message exists, enqueue it.
		if (trim($msg))
		{
>>>>>>> upstream/master
			$this->enqueueMessage($msg, $msgType);
		}

		// Persist messages if they exist.
<<<<<<< HEAD
		if (count($this->_messageQueue)) {
=======
		if (count($this->_messageQueue))
		{
>>>>>>> upstream/master
			$session = JFactory::getSession();
			$session->set('application.queue', $this->_messageQueue);
		}

		// If the headers have been sent, then we cannot send an additional location header
		// so we will output a javascript redirect statement.
<<<<<<< HEAD
		if (headers_sent()) {
			echo "<script>document.location.href='$url';</script>\n";
		}
		else {
			$document = JFactory::getDocument();
			jimport('joomla.environment.browser');
			$navigator = JBrowser::getInstance();
			if ($navigator->isBrowser('msie')) {
				// MSIE type browser and/or server cause issues when url contains utf8 character,so use a javascript redirect method
 				echo '<html><head><meta http-equiv="content-type" content="text/html; charset='.$document->getCharset().'" /><script>document.location.href=\''.$url.'\';</script></head><body></body></html>';
			}
			elseif (!$moved and $navigator->isBrowser('konqueror')) {
				// WebKit browser (identified as konqueror by Joomla!) - Do not use 303, as it causes subresources reload (https://bugs.webkit.org/show_bug.cgi?id=38690)
				echo '<html><head><meta http-equiv="refresh" content="0; url='. $url .'" /><meta http-equiv="content-type" content="text/html; charset='.$document->getCharset().'" /></head><body></body></html>';
			}
			else {
				// All other browsers, use the more efficient HTTP header method
				header($moved ? 'HTTP/1.1 301 Moved Permanently' : 'HTTP/1.1 303 See other');
				header('Location: '.$url);
				header('Content-Type: text/html; charset='.$document->getCharset());
=======
		if (headers_sent())
		{
			echo "<script>document.location.href='$url';</script>\n";
		}
		else
		{
			$document = JFactory::getDocument();
			jimport('joomla.environment.browser');
			$navigator = JBrowser::getInstance();
			jimport('phputf8.utils.ascii');
			if ($navigator->isBrowser('msie') && !utf8_is_ascii($url))
			{
				// MSIE type browser and/or server cause issues when url contains utf8 character,so use a javascript redirect method
				echo '<html><head><meta http-equiv="content-type" content="text/html; charset=' . $document->getCharset() .
					'" /><script>document.location.href=\'' . $url . '\';</script></head><body></body></html>';
			}
			elseif (!$moved and $navigator->isBrowser('konqueror'))
			{
				// WebKit browser (identified as konqueror by Joomla!) - Do not use 303, as it causes subresources
				// reload (https://bugs.webkit.org/show_bug.cgi?id=38690)
				echo '<html><head><meta http-equiv="refresh" content="0; url=' . $url .
					'" /><meta http-equiv="content-type" content="text/html; charset=' . $document->getCharset() . '" /></head><body></body></html>';
			}
			else
			{
				// All other browsers, use the more efficient HTTP header method
				header($moved ? 'HTTP/1.1 301 Moved Permanently' : 'HTTP/1.1 303 See other');
				header('Location: ' . $url);
				header('Content-Type: text/html; charset=' . $document->getCharset());
>>>>>>> upstream/master
			}
		}
		$this->close();
	}

	/**
	 * Enqueue a system message.
	 *
<<<<<<< HEAD
	 * @param   string   $msg   The message to enqueue.
	 * @param   string   $type  The message type. Default is message.
	 *
	 * @return  void
=======
	 * @param   string  $msg   The message to enqueue.
	 * @param   string  $type  The message type. Default is message.
	 *
	 * @return  void
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function enqueueMessage($msg, $type = 'message')
	{
		// For empty queue, if messages exists in the session, enqueue them first.
<<<<<<< HEAD
		if (!count($this->_messageQueue)) {
			$session = JFactory::getSession();
			$sessionQueue = $session->get('application.queue');

			if (count($sessionQueue)) {
=======
		if (!count($this->_messageQueue))
		{
			$session = JFactory::getSession();
			$sessionQueue = $session->get('application.queue');

			if (count($sessionQueue))
			{
>>>>>>> upstream/master
				$this->_messageQueue = $sessionQueue;
				$session->set('application.queue', null);
			}
		}
<<<<<<< HEAD
=======

>>>>>>> upstream/master
		// Enqueue the message.
		$this->_messageQueue[] = array('message' => $msg, 'type' => strtolower($type));
	}

	/**
	 * Get the system message queue.
	 *
<<<<<<< HEAD
	 * @return  ??    The system message queue.
=======
	 * @return  array  The system message queue.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function getMessageQueue()
	{
		// For empty queue, if messages exists in the session, enqueue them.
<<<<<<< HEAD
		if (!count($this->_messageQueue)) {
			$session = JFactory::getSession();
			$sessionQueue = $session->get('application.queue');

			if (count($sessionQueue)) {
=======
		if (!count($this->_messageQueue))
		{
			$session = JFactory::getSession();
			$sessionQueue = $session->get('application.queue');

			if (count($sessionQueue))
			{
>>>>>>> upstream/master
				$this->_messageQueue = $sessionQueue;
				$session->set('application.queue', null);
			}
		}
<<<<<<< HEAD
=======

>>>>>>> upstream/master
		return $this->_messageQueue;
	}

	/**
	 * Gets a configuration value.
	 *
	 * An example is in application/japplication-getcfg.php Getting a configuration
	 *
<<<<<<< HEAD
	 * @param   string   The name of the value to get.
	 * @param   string   Default value to return
	 *
	 * @return  mixed    The user state.
	 *
	 * @since   11.1
	 */
	public function getCfg($varname, $default=null)
=======
	 * @param   string  $varname  The name of the value to get.
	 * @param   string  $default  Default value to return
	 *
	 * @return  mixed  The user state.
	 *
	 * @since   11.1
	 */
	public function getCfg($varname, $default = null)
>>>>>>> upstream/master
	{
		$config = JFactory::getConfig();
		return $config->get('' . $varname, $default);
	}

	/**
	 * Method to get the application name.
	 *
	 * The dispatcher name is by default parsed using the classname, or it can be set
	 * by passing a $config['name'] in the class constructor.
	 *
	 * @return  string  The name of the dispatcher.
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function getName()
	{
		$name = $this->_name;

<<<<<<< HEAD
		if (empty($name)) {
			$r = null;
			if (!preg_match('/J(.*)/i', get_class($this), $r)) {
=======
		if (empty($name))
		{
			$r = null;
			if (!preg_match('/J(.*)/i', get_class($this), $r))
			{
>>>>>>> upstream/master
				JError::raiseError(500, JText::_('JLIB_APPLICATION_ERROR_APPLICATION_GET_NAME'));
			}
			$name = strtolower($r[1]);
		}

		return $name;
	}

	/**
	 * Gets a user state.
	 *
<<<<<<< HEAD
	 * @param   string  The path of the state.
	 * @param   mixed   Optional default value, returned if the internal value is null.
=======
	 * @param   string  $key      The path of the state.
	 * @param   mixed   $default  Optional default value, returned if the internal value is null.
>>>>>>> upstream/master
	 *
	 * @return  mixed  The user state or null.
	 *
	 * @since   11.1
	 */
	public function getUserState($key, $default = null)
	{
<<<<<<< HEAD
		$session	= JFactory::getSession();
		$registry	= $session->get('registry');

		if (!is_null($registry)) {
=======
		$session = JFactory::getSession();
		$registry = $session->get('registry');

		if (!is_null($registry))
		{
>>>>>>> upstream/master
			return $registry->get($key, $default);
		}

		return $default;
	}

	/**
	 * Sets the value of a user state variable.
	 *
<<<<<<< HEAD
	 * @param   string  The path of the state.
	 * @param   string  The value of the variable.
	 *
	 * @return  mixed   The previous state, if one existed.
=======
	 * @param   string  $key    The path of the state.
	 * @param   string  $value  The value of the variable.
	 *
	 * @return  mixed  The previous state, if one existed.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function setUserState($key, $value)
	{
<<<<<<< HEAD
		$session	= JFactory::getSession();
		$registry	= $session->get('registry');

		if (!is_null($registry)) {
=======
		$session = JFactory::getSession();
		$registry = $session->get('registry');

		if (!is_null($registry))
		{
>>>>>>> upstream/master
			return $registry->set($key, $value);
		}

		return null;
	}

	/**
	 * Gets the value of a user state variable.
	 *
<<<<<<< HEAD
	 * @param   string   $key      The key of the user state variable.
	 * @param   string   $request  The name of the variable passed in a request.
	 * @param   string   $default  The default value for the variable if not found. Optional.
	 * @param   string   $type     Filter for the variable, for valid values see {@link JFilterInput::clean()}. Optional.
	 *
	 * @return  The request user state.
=======
	 * @param   string  $key      The key of the user state variable.
	 * @param   string  $request  The name of the variable passed in a request.
	 * @param   string  $default  The default value for the variable if not found. Optional.
	 * @param   string  $type     Filter for the variable, for valid values see {@link JFilterInput::clean()}. Optional.
	 *
	 * @return  The request user state.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function getUserStateFromRequest($key, $request, $default = null, $type = 'none')
	{
		$cur_state = $this->getUserState($key, $default);
		$new_state = JRequest::getVar($request, null, 'default', $type);

		// Save the new value only if it was set in this request.
<<<<<<< HEAD
		if ($new_state !== null) {
			$this->setUserState($key, $new_state);
		}
		else {
=======
		if ($new_state !== null)
		{
			$this->setUserState($key, $new_state);
		}
		else
		{
>>>>>>> upstream/master
			$new_state = $cur_state;
		}

		return $new_state;
	}

	/**
	 * Registers a handler to a particular event group.
	 *
	 * @param   string  $event    The event name.
	 * @param   mixed   $handler  The handler, a function or an instance of a event object.
	 *
	 * @return  void
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function registerEvent($event, $handler)
	{
		$dispatcher = JDispatcher::getInstance();
		$dispatcher->register($event, $handler);
	}

	/**
	 * Calls all handlers associated with an event group.
	 *
	 * @param   string  $event  The event name.
	 * @param   array   $args   An array of arguments.
	 *
	 * @return  array  An array of results from each function call.
<<<<<<< HEAD
	 * @since   11.1
	 */
	function triggerEvent($event, $args=null)
=======
	 *
	 * @since   11.1
	 */
	function triggerEvent($event, $args = null)
>>>>>>> upstream/master
	{
		$dispatcher = JDispatcher::getInstance();

		return $dispatcher->trigger($event, $args);
	}

	/**
	 * Login authentication function.
	 *
<<<<<<< HEAD
	 * Username and encoded password are passed the the onUserLogin event which
=======
	 * Username and encoded password are passed the onUserLogin event which
>>>>>>> upstream/master
	 * is responsible for the user validation. A successful validation updates
	 * the current session record with the user's details.
	 *
	 * Username and encoded password are sent as credentials (along with other
	 * possibilities) to each observer (authentication plugin) for user
	 * validation.  Successful validation will update the current session with
	 * the user details.
	 *
	 * @param   array  $credentials  Array('username' => string, 'password' => string)
	 * @param   array  $options      Array('remember' => boolean)
	 *
	 * @return  boolean  True on success.
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function login($credentials, $options = array())
	{
		// Get the global JAuthentication object.
		jimport('joomla.user.authentication');

		$authenticate = JAuthentication::getInstance();
<<<<<<< HEAD
		$response	= $authenticate->authenticate($credentials, $options);

		if ($response->status === JAUTHENTICATE_STATUS_SUCCESS) {
			// Import the user plugin group.
			JPluginHelper::importPlugin('user');

			// OK, the credentials are authenticated.  Lets fire the onLogin event.
			$results = $this->triggerEvent('onUserLogin', array((array)$response, $options));
=======
		$response = $authenticate->authenticate($credentials, $options);

		if ($response->status === JAuthentication::STATUS_SUCCESS)
		{
			// validate that the user should be able to login (different to being authenticated)
			// this permits authentication plugins blocking the user
			$authorisations = $authenticate->authorise($response, $options);
			foreach ($authorisations as $authorisation)
			{
				$denied_states = Array(JAuthentication::STATUS_EXPIRED, JAuthentication::STATUS_DENIED);
				if (in_array($authorisation->status, $denied_states))
				{
					// Trigger onUserAuthorisationFailure Event.
					$this->triggerEvent('onUserAuthorisationFailure', array((array) $authorisation));

					// If silent is set, just return false.
					if (isset($options['silent']) && $options['silent'])
					{
						return false;
					}

					// Return the error.
					switch ($authorisation->status)
					{
						case JAuthentication::STATUS_EXPIRED:
							return JError::raiseWarning('102002', JText::_('JLIB_LOGIN_EXPIRED'));
							break;
						case JAuthentication::STATUS_DENIED:
							return JError::raiseWarning('102003', JText::_('JLIB_LOGIN_DENIED'));
							break;
						default:
							return JError::raiseWarning('102004', JText::_('JLIB_LOGIN_AUTHORISATION'));
							break;
					}
				}
			}

			// Import the user plugin group.
			JPluginHelper::importPlugin('user');

			// OK, the credentials are authenticated and user is authorised.  Lets fire the onLogin event.
			$results = $this->triggerEvent('onUserLogin', array((array) $response, $options));
>>>>>>> upstream/master

			/*
			 * If any of the user plugins did not successfully complete the login routine
			 * then the whole method fails.
			 *
			 * Any errors raised should be done in the plugin as this provides the ability
			 * to provide much more information about why the routine may have failed.
			 */

<<<<<<< HEAD
			if (!in_array(false, $results, true)) {
				// Set the remember me cookie if enabled.
				if (isset($options['remember']) && $options['remember']) {
=======
			if (!in_array(false, $results, true))
			{
				// Set the remember me cookie if enabled.
				if (isset($options['remember']) && $options['remember'])
				{
>>>>>>> upstream/master
					jimport('joomla.utilities.simplecrypt');
					jimport('joomla.utilities.utility');

					// Create the encryption key, apply extra hardening using the user agent string.
					$key = JUtility::getHash(@$_SERVER['HTTP_USER_AGENT']);

					$crypt = new JSimpleCrypt($key);
					$rcookie = $crypt->encrypt(serialize($credentials));
<<<<<<< HEAD
					$lifetime = time() + 365*24*60*60;
=======
					$lifetime = time() + 365 * 24 * 60 * 60;
>>>>>>> upstream/master

					// Use domain and path set in config for cookie if it exists.
					$cookie_domain = $this->getCfg('cookie_domain', '');
					$cookie_path = $this->getCfg('cookie_path', '/');
<<<<<<< HEAD
					setcookie( JUtility::getHash('JLOGIN_REMEMBER'), $rcookie, $lifetime, $cookie_path, $cookie_domain );
=======
					setcookie(JUtility::getHash('JLOGIN_REMEMBER'), $rcookie, $lifetime, $cookie_path, $cookie_domain);
>>>>>>> upstream/master
				}

				return true;
			}
		}

		// Trigger onUserLoginFailure Event.
<<<<<<< HEAD
		$this->triggerEvent('onUserLoginFailure', array((array)$response));

		// If silent is set, just return false.
		if (isset($options['silent']) && $options['silent']) {
			return false;
		}

		// Return the error.
		return JError::raiseWarning('SOME_ERROR_CODE', JText::_('JLIB_LOGIN_AUTHENTICATE'));
=======
		$this->triggerEvent('onUserLoginFailure', array((array) $response));

		// If silent is set, just return false.
		if (isset($options['silent']) && $options['silent'])
		{
			return false;
		}

		// If status is success, any error will have been raised by the user plugin
		if ($response->status !== JAuthentication::STATUS_SUCCESS)
		{
			JError::raiseWarning('102001', $response->error_message);
		}

		return false;
>>>>>>> upstream/master
	}

	/**
	 * Logout authentication function.
	 *
	 * Passed the current user information to the onUserLogout event and reverts the current
	 * session record back to 'anonymous' parameters.
	 * If any of the authentication plugins did not successfully complete
<<<<<<< HEAD
	 * the logout routine then the whole method fails.  Any errors raised
=======
	 * the logout routine then the whole method fails. Any errors raised
>>>>>>> upstream/master
	 * should be done in the plugin as this provides the ability to give
	 * much more information about why the routine may have failed.
	 *
	 * @param   integer  $userid   The user to load - Can be an integer or string - If string, it is converted to ID automatically
	 * @param   array    $options  Array('clientid' => array of client id's)
	 *
	 * @return  boolean  True on success
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function logout($userid = null, $options = array())
	{
		// Initialise variables.
		$retval = false;

		// Get a user object from the JApplication.
		$user = JFactory::getUser($userid);

		// Build the credentials array.
<<<<<<< HEAD
		$parameters['username']	= $user->get('username');
		$parameters['id']		= $user->get('id');

		// Set clientid in the options array if it hasn't been set already.
		if (!isset($options['clientid'])) {
			$options['clientid']= $this->getClientId();
=======
		$parameters['username'] = $user->get('username');
		$parameters['id'] = $user->get('id');

		// Set clientid in the options array if it hasn't been set already.
		if (!isset($options['clientid']))
		{
			$options['clientid'] = $this->getClientId();
>>>>>>> upstream/master
		}

		// Import the user plugin group.
		JPluginHelper::importPlugin('user');

		// OK, the credentials are built. Lets fire the onLogout event.
		$results = $this->triggerEvent('onUserLogout', array($parameters, $options));

		// Check if any of the plugins failed. If none did, success.

<<<<<<< HEAD
		if (!in_array(false, $results, true)) {
=======
		if (!in_array(false, $results, true))
		{
>>>>>>> upstream/master
			// Use domain and path set in config for cookie if it exists.
			$cookie_domain = $this->getCfg('cookie_domain', '');
			$cookie_path = $this->getCfg('cookie_path', '/');
			setcookie(JUtility::getHash('JLOGIN_REMEMBER'), false, time() - 86400, $cookie_path, $cookie_domain);

			return true;
		}

		// Trigger onUserLoginFailure Event.
		$this->triggerEvent('onUserLogoutFailure', array($parameters));

		return false;
	}

	/**
	 * Gets the name of the current template.
	 *
<<<<<<< HEAD
	 * @param   array    $params  An optional associative array of configuration settings
	 *
	 * @return  string   System is the fallback.
=======
	 * @param   array  $params  An optional associative array of configuration settings
	 *
	 * @return  string  System is the fallback.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function getTemplate($params = false)
	{
		return 'system';
	}

	/**
	 * Returns the application JRouter object.
	 *
	 * @param   string  $name     The name of the application.
	 * @param   array   $options  An optional associative array of configuration settings.
	 *
	 * @return  JRouter  A JRouter object
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	static public function getRouter($name = null, array $options = array())
	{
<<<<<<< HEAD
		if (!isset($name)) {
=======
		if (!isset($name))
		{
>>>>>>> upstream/master
			$app = JFactory::getApplication();
			$name = $app->getName();
		}

		jimport('joomla.application.router');
		$router = JRouter::getInstance($name, $options);

<<<<<<< HEAD
		if (JError::isError($router)) {
=======
		if (JError::isError($router))
		{
>>>>>>> upstream/master
			return null;
		}

		return $router;
	}

	/**
	 * This method transliterates a string into an URL
	 * safe string or returns a URL safe UTF-8 string
	 * based on the global configuration
	 *
	 * @param   string  $string  String to process
	 *
	 * @return  string  Processed string
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	static public function stringURLSafe($string)
	{
<<<<<<< HEAD
		$app = JFactory::getApplication();

		if (self::getCfg('unicodeslugs') == 1) {
			$output = JFilterOutput::stringURLUnicodeSlug($string);
		}
		else {
=======
		if (JFactory::getConfig()->get('unicodeslugs') == 1)
		{
			$output = JFilterOutput::stringURLUnicodeSlug($string);
		}
		else
		{
>>>>>>> upstream/master
			$output = JFilterOutput::stringURLSafe($string);
		}

		return $output;
	}

	/**
	 * Returns the application JPathway object.
	 *
	 * @param   string  $name     The name of the application.
	 * @param   array   $options  An optional associative array of configuration settings.
	 *
	 * @return  JPathway  A JPathway object
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function getPathway($name = null, $options = array())
	{
<<<<<<< HEAD
		if (!isset($name)) {
=======
		if (!isset($name))
		{
>>>>>>> upstream/master
			$name = $this->_name;
		}

		jimport('joomla.application.pathway');
		$pathway = JPathway::getInstance($name, $options);

<<<<<<< HEAD
		if (JError::isError($pathway)) {
=======
		if (JError::isError($pathway))
		{
>>>>>>> upstream/master
			return null;
		}

		return $pathway;
	}

	/**
	 * Returns the application JPathway object.
	 *
	 * @param   string  $name     The name of the application/client.
	 * @param   array   $options  An optional associative array of configuration settings.
	 *
	 * @return  JMenu  JMenu object.
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function getMenu($name = null, $options = array())
	{
<<<<<<< HEAD
		if (!isset($name)) {
=======
		if (!isset($name))
		{
>>>>>>> upstream/master
			$name = $this->_name;
		}

		jimport('joomla.application.menu');
		$menu = JMenu::getInstance($name, $options);

<<<<<<< HEAD
		if (JError::isError($menu)) {
=======
		if (JError::isError($menu))
		{
>>>>>>> upstream/master
			return null;
		}

		return $menu;
	}

	/**
	 * Provides a secure hash based on a seed
	 *
<<<<<<< HEAD
	 * @param   string   $seed  Seed string.
	 *
	 * @return  string   A secure hash
=======
	 * @param   string  $seed  Seed string.
	 *
	 * @return  string  A secure hash
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function getHash($seed)
	{
		$conf = JFactory::getConfig();

<<<<<<< HEAD
		return md5($conf->get('secret').$seed);
=======
		return md5($conf->get('secret') . $seed);
>>>>>>> upstream/master
	}

	/**
	 * Create the configuration registry.
	 *
	 * @param   string  $file  The path to the configuration file
	 *
<<<<<<< HEAD
	 * return   object  A JConfig object
=======
	 * @return   object  A JConfig object
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function _createConfiguration($file)
	{
		jimport('joomla.registry.registry');

<<<<<<< HEAD
		require_once $file;

		// Create the JConfig object.
		$config = new JConfig();
=======
		include_once $file;

		// Create the JConfig object.
		$config = new JConfig;
>>>>>>> upstream/master

		// Get the global configuration object.
		$registry = JFactory::getConfig();

		// Load the configuration values into the registry.
		$registry->loadObject($config);

		return $config;
	}

	/**
	 * Create the user session.
	 *
	 * Old sessions are flushed based on the configuration value for the cookie
	 * lifetime. If an existing session, then the last access time is updated.
	 * If a new session, a session id is generated and a record is created in
	 * the #__sessions table.
	 *
	 * @param   string  $name  The sessions name.
	 *
	 * @return  JSession  JSession on success. May call exit() on database error.
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function _createSession($name)
	{
		$options = array();
		$options['name'] = $name;

<<<<<<< HEAD
		switch($this->_clientId)
		{
			case 0:
				if ($this->getCfg('force_ssl') == 2) {
=======
		switch ($this->_clientId)
		{
			case 0:
				if ($this->getCfg('force_ssl') == 2)
				{
>>>>>>> upstream/master
					$options['force_ssl'] = true;
				}
				break;

			case 1:
<<<<<<< HEAD
				if ($this->getCfg('force_ssl') >= 1) {
=======
				if ($this->getCfg('force_ssl') >= 1)
				{
>>>>>>> upstream/master
					$options['force_ssl'] = true;
				}
				break;
		}

		$session = JFactory::getSession($options);

		//TODO: At some point we need to get away from having session data always in the db.

		$db = JFactory::getDBO();

		// Remove expired sessions from the database.
		$time = time();
<<<<<<< HEAD
		if ($time % 2) {
			// The modulus introduces a little entropy, making the flushing less accurate
			// but fires the query less than half the time.
			$db->setQuery(
				'DELETE FROM `#__session`' .
				' WHERE `time` < '.(int) ($time - $session->getExpire())
			);
=======
		if ($time % 2)
		{
			// The modulus introduces a little entropy, making the flushing less accurate
			// but fires the query less than half the time.
			$query = $db->getQuery(true);
			$db->setQuery('DELETE FROM ' . $query->qn('#__session') . ' WHERE ' . $query->qn('time') . ' < ' . (int) ($time - $session->getExpire()));
>>>>>>> upstream/master
			$db->query();
		}

		// Check to see the the session already exists.
		if (($this->getCfg('session_handler') != 'database' && ($time % 2 || $session->isNew()))
<<<<<<< HEAD
			||
			($this->getCfg('session_handler') == 'database' && $session->isNew())
		)
		{
			$this->checkSession();
=======
			|| ($this->getCfg('session_handler') == 'database' && $session->isNew())
		)
		{
				$this->checkSession();
>>>>>>> upstream/master
		}

		return $session;
	}

	/**
	 * Checks the user session.
	 *
	 * If the session record doesn't exist, initialise it.
	 * If session is new, create session variables
	 *
	 * @return  void
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function checkSession()
	{
<<<<<<< HEAD
		$db 		= JFactory::getDBO();
		$session 	= JFactory::getSession();
		$user		= JFactory::getUser();

		$db->setQuery(
			'SELECT `session_id`' .
			' FROM `#__session`' .
			' WHERE `session_id` = '.$db->quote($session->getId()), 0, 1
=======
		$db = JFactory::getDBO();
		$session = JFactory::getSession();
		$user = JFactory::getUser();

		$query = $db->getQuery(true);
		$db->setQuery(
			'SELECT ' . $query->qn('session_id') . ' FROM ' . $query->qn('#__session') . ' WHERE ' . $query->qn('session_id') . ' = ' .
				$query->q($session->getId()),
			0, 1
>>>>>>> upstream/master
		);
		$exists = $db->loadResult();

		// If the session record doesn't exist initialise it.
<<<<<<< HEAD
		if (!$exists) {
			if ($session->isNew()) {
				$db->setQuery(
					'INSERT INTO `#__session` (`session_id`, `client_id`, `time`)' .
					' VALUES ('.$db->quote($session->getId()).', '.(int) $this->getClientId().', '.(int) time().')'
				);
			}
			else {
				$db->setQuery(
					'INSERT INTO `#__session` (`session_id`, `client_id`, `guest`, `time`, `userid`, `username`)' .
					' VALUES ('.$db->quote($session->getId()).', '.(int) $this->getClientId().', '.(int) $user->get('guest').', '.(int) $session->get('session.timer.start').', '.(int) $user->get('id').', '.$db->quote($user->get('username')).')'
=======
		if (!$exists)
		{
			if ($session->isNew())
			{
				$db->setQuery(
					'INSERT INTO ' . $query->qn('#__session') . ' (' . $query->qn('session_id') . ', ' . $query->qn('client_id') . ', ' .
						$query->qn('time') . ')' . ' VALUES (' . $query->q($session->getId()) . ', ' . (int) $this->getClientId() . ', ' .
						(int) time() . ')'
				);
			}
			else
			{
				$db->setQuery(
					'INSERT INTO ' . $query->qn('#__session') . ' (' . $query->qn('session_id') . ', ' . $query->qn('client_id') . ', ' .
						$query->qn('guest') . ', ' . $query->qn('time') . ', ' . $query->qn('userid') . ', ' . $query->qn('username') . ')' .
						' VALUES (' . $query->q($session->getId()) . ', ' . (int) $this->getClientId() . ', ' . (int) $user->get('guest') . ', ' .
						(int) $session->get('session.timer.start') . ', ' . (int) $user->get('id') . ', ' . $query->q($user->get('username')) . ')'
>>>>>>> upstream/master
				);
			}

			// If the insert failed, exit the application.
<<<<<<< HEAD
			if (!$db->query()) {
=======
			if (!$db->query())
			{
>>>>>>> upstream/master
				jexit($db->getErrorMSG());
			}

			// Session doesn't exist yet, so create session variables
<<<<<<< HEAD
			if ($session->isNew()) {
				$session->set('registry',	new JRegistry('session'));
				$session->set('user',		new JUser());
=======
			if ($session->isNew())
			{
				$session->set('registry', new JRegistry('session'));
				$session->set('user', new JUser);
>>>>>>> upstream/master
			}
		}
	}

	/**
	 * Gets the client id of the current running application.
	 *
	 * @return  integer  A client identifier.
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function getClientId()
	{
		return $this->_clientId;
	}

	/**
	 * Is admin interface?
	 *
	 * @return  boolean  True if this application is administrator.
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function isAdmin()
	{
		return ($this->_clientId == 1);
	}

	/**
	 * Is site interface?
	 *
	 * @return  boolean  True if this application is site.
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function isSite()
	{
		return ($this->_clientId == 0);
	}

	/**
	 * Method to determine if the host OS is  Windows
	 *
	 * @return  boolean  True if Windows OS
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	static function isWinOS()
	{
		return strtoupper(substr(PHP_OS, 0, 3)) === 'WIN';
	}

	/**
	 * Returns the response as a string.
	 *
	 * @return  string  The response
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function __toString()
	{
		$compress = $this->getCfg('gzip', false);

		return JResponse::toString($compress);
	}
}
