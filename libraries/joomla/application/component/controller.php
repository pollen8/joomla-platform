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
 * Base class for a Joomla Controller
 *
 * Controller (Controllers are where you put all the actual code.) Provides basic
 * functionality, such as rendering views (aka displaying templates).
 *
 * @package     Joomla.Platform
 * @subpackage  Application
 * @since       11.1
 */
class JController extends JObject
{
	/**
	 * ACO Section for the controller.
	 *
	 * @var    string
	 * @since  11.1
<<<<<<< HEAD
	 * @deprecated
=======
	 * @deprecated    12.1
>>>>>>> upstream/master
	 */
	protected $_acoSection;

	/**
	 * Default ACO Section value for the controller.
	 *
	 * @var    string
	 * @since  11.1
<<<<<<< HEAD
	 * @deprecated
=======
	 * @deprecated    12.1
>>>>>>> upstream/master
	 */
	protected $_acoSectionValue;

	/**
	 * The base path of the controller
	 *
	 * @var    string
	 * @since  11.1
	 * @note   Replaces _basePath.
	 */
	protected $basePath;

	/**
<<<<<<< HEAD
	 * @var    string  The default view for the display method.
=======
	 * The default view for the display method.
	 *
	 * @var    string
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $default_view;

	/**
	 * The mapped task that was performed.
	 *
	 * @var    string
	 * @since  11.1
	 * @note   Replaces _doTask.
	 */
	protected $doTask;

	/**
	 * Redirect message.
	 *
	 * @var    string
	 * @since  11.1
	 * @note   Replaces _message.
	 */
	protected $message;

	/**
	 * Redirect message type.
	 *
	 * @var    string
	 * @since  11.1
	 * @note   Replaces _messageType.
	 */
	protected $messageType;

	/**
	 * Array of class methods
	 *
	 * @var    array
	 * @since  11.1
	 * @note   Replaces _methods.
	 */
	protected $methods;

	/**
	 * The name of the controller
	 *
	 * @var    array
	 * @since  11.1
	 * @note   Replaces _name.
	 */
	protected $name;

	/**
	 * The prefix of the models
	 *
	 * @var    string
	 * @since  11.1
	 */
	protected $model_prefix;

	/**
	 * The set of search directories for resources (views).
	 *
	 * @var    array
	 * @since  11.1
	 * @note   Replaces _path.
	 */
	protected $paths;

	/**
	 * URL for redirection.
	 *
	 * @var    string
	 * @since  11.1
	 * @note   Replaces _redirect.
	 */
	protected $redirect;

	/**
	 * Current or most recently performed task.
	 *
	 * @var    string
	 * @since  11.1
	 * @note   Replaces _task.
	 */
	protected $task;

	/**
	 * Array of class methods to call for a given task.
	 *
	 * @var    array
	 * @since  11.1
	 * @note   Replaces _taskMap.
	 */
	protected $taskMap;

	/**
	 * Adds to the stack of model paths in LIFO order.
	 *
	 * @param   mixed   $path    The directory (string), or list of directories (array) to add.
	 * @param   string  $prefix  A prefix for models
	 *
	 * @return  void
	 */
<<<<<<< HEAD
	public static function addModelPath($path, $prefix='')
=======
	public static function addModelPath($path, $prefix = '')
>>>>>>> upstream/master
	{
		jimport('joomla.application.component.model');
		JModel::addIncludePath($path, $prefix);
	}

	/**
	 * Create the filename for a resource.
	 *
<<<<<<< HEAD
	 * @param   string  $type    The resource type to create the filename for.
	 * @param   array   $parts   An associative array of filename information. Optional.
	 *
	 * @return  string  The filename.
	 * @since   11.1
	 * @note    Replaced _createFileName.
=======
	 * @param   string  $type   The resource type to create the filename for.
	 * @param   array   $parts  An associative array of filename information. Optional.
	 *
	 * @return  string  The filename.
	 *
	 * @note    Replaced _createFileName.
	 * @since   11.1
>>>>>>> upstream/master
	 */
	protected static function createFileName($type, $parts = array())
	{
		$filename = '';

<<<<<<< HEAD
		switch ($type) {
			case 'controller':
				if (!empty($parts['format'])) {
					if ($parts['format'] == 'html') {
						$parts['format'] = '';
					} else {
						$parts['format'] = '.'.$parts['format'];
					}
				} else {
					$parts['format'] = '';
				}

				$filename = strtolower($parts['name']).$parts['format'].'.php';
				break;

			case 'view':
				if (!empty($parts['type'])) {
					$parts['type'] = '.'.$parts['type'];
				}

				$filename = strtolower($parts['name']).'/view'.$parts['type'].'.php';
=======
		switch ($type)
		{
			case 'controller':
				if (!empty($parts['format']))
				{
					if ($parts['format'] == 'html')
					{
						$parts['format'] = '';
					}
					else
					{
						$parts['format'] = '.' . $parts['format'];
					}
				}
				else
				{
					$parts['format'] = '';
				}

				$filename = strtolower($parts['name']) . $parts['format'] . '.php';
				break;

			case 'view':
				if (!empty($parts['type']))
				{
					$parts['type'] = '.' . $parts['type'];
				}

				$filename = strtolower($parts['name']) . '/view' . $parts['type'] . '.php';
>>>>>>> upstream/master
				break;
		}

		return $filename;
	}

	/**
	 * Method to get a singleton controller instance.
	 *
	 * @param   string  $prefix  The prefix for the controller.
	 * @param   array   $config  An array of optional constructor options.
	 *
	 * @return  mixed   JController derivative class or JException on error.
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function getInstance($prefix, $config = array())
	{
		static $instance;

<<<<<<< HEAD
		if (!empty($instance)) {
=======
		if (!empty($instance))
		{
>>>>>>> upstream/master
			return $instance;
		}

		// Get the environment configuration.
<<<<<<< HEAD
		$basePath	= array_key_exists('base_path', $config) ? $config['base_path'] : JPATH_COMPONENT;
		$format		= JRequest::getWord('format');
		$command	= JRequest::getVar('task', 'display');
=======
		$basePath = array_key_exists('base_path', $config) ? $config['base_path'] : JPATH_COMPONENT;
		$format = JRequest::getWord('format');
		$command = JRequest::getVar('task', 'display');
>>>>>>> upstream/master

		// Check for array format.
		$filter = JFilterInput::getInstance();

<<<<<<< HEAD
		if (is_array($command)) {
			$command = $filter->clean(array_pop(array_keys($command)), 'cmd');
		}
		else {
=======
		if (is_array($command))
		{
			$command = $filter->clean(array_pop(array_keys($command)), 'cmd');
		}
		else
		{
>>>>>>> upstream/master
			$command = $filter->clean($command, 'cmd');
		}

		// Check for a controller.task command.
<<<<<<< HEAD
		if (strpos($command, '.') !== false) {
			// Explode the controller.task command.
			list($type, $task) = explode('.', $command);

			// Define the controller filename and path.
			$file	= self::createFileName('controller', array('name' => $type, 'format' => $format));
			$path	= $basePath.'/controllers/'.$file;
=======
		if (strpos($command, '.') !== false)
		{
			// Explode the controller.task command.
			list ($type, $task) = explode('.', $command);

			// Define the controller filename and path.
			$file = self::createFileName('controller', array('name' => $type, 'format' => $format));
			$path = $basePath . '/controllers/' . $file;
>>>>>>> upstream/master

			// Reset the task without the contoller context.
			JRequest::setVar('task', $task);
		}
<<<<<<< HEAD
		else {
			// Base controller.
			$type	= null;
			$task	= $command;

			// Define the controller filename and path.
			$file	= self::createFileName('controller', array('name' => 'controller'));
			$path	= $basePath.'/'.$file;
		}

		// Get the controller class name.
		$class = ucfirst($prefix).'Controller'.ucfirst($type);

		// Include the class if not present.
		if (!class_exists($class)) {
			// If the controller file path exists, include it.
			if (file_exists($path)) {
				require_once $path;
			}
			else {
=======
		else
		{
			// Base controller.
			$type = null;
			$task = $command;

			// Define the controller filename and path.
			$file = self::createFileName('controller', array('name' => 'controller', 'format' => $format));
			$path = $basePath . '/' . $file;
		}

		// Get the controller class name.
		$class = ucfirst($prefix) . 'Controller' . ucfirst($type);

		// Include the class if not present.
		if (!class_exists($class))
		{
			// If the controller file path exists, include it.
			if (file_exists($path))
			{
				require_once $path;
			}
			else
			{
>>>>>>> upstream/master
				throw new JException(JText::sprintf('JLIB_APPLICATION_ERROR_INVALID_CONTROLLER', $type, $format), 1056, E_ERROR, $type, true);
			}
		}

		// Instantiate the class.
<<<<<<< HEAD
		if (class_exists($class)) {
			$instance = new $class($config);
		}
		else {
=======
		if (class_exists($class))
		{
			$instance = new $class($config);
		}
		else
		{
>>>>>>> upstream/master
			throw new JException(JText::sprintf('JLIB_APPLICATION_ERROR_INVALID_CONTROLLER_CLASS', $class), 1057, E_ERROR, $class, true);
		}

		return $instance;
	}

	/**
	 * Constructor.
	 *
	 * @param   array  $config  An optional associative array of configuration settings.
<<<<<<< HEAD
	 *                     Recognized key values include 'name', 'default_task', 'model_path', and
	 *                     'view_path' (this list is not meant to be comprehensive).
	 *
	 * @return  JController
=======
	 * Recognized key values include 'name', 'default_task', 'model_path', and
	 * 'view_path' (this list is not meant to be comprehensive).
	 *
	 * @return  JController
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function __construct($config = array())
	{
		// Initialise variables.
<<<<<<< HEAD
		$this->methods		= array();
		$this->message		= null;
		$this->messageType = 'message';
		$this->paths		= array();
		$this->redirect		= null;
		$this->taskMap		= array();
=======
		$this->methods = array();
		$this->message = null;
		$this->messageType = 'message';
		$this->paths = array();
		$this->redirect = null;
		$this->taskMap = array();
>>>>>>> upstream/master

		// Determine the methods to exclude from the base class.
		$xMethods = get_class_methods('JController');

		// Get the public methods in this class using reflection.
<<<<<<< HEAD
		$r			= new ReflectionClass($this);
		$rName		= $r->getName();
		$rMethods	= $r->getMethods(ReflectionMethod::IS_PUBLIC);
		$methods	= array();
=======
		$r = new ReflectionClass($this);
		$rName = $r->getName();
		$rMethods = $r->getMethods(ReflectionMethod::IS_PUBLIC);
		$methods = array();
>>>>>>> upstream/master

		foreach ($rMethods as $rMethod)
		{
			$mName = $rMethod->getName();

			// Add default display method if not explicitly declared.
<<<<<<< HEAD
			if (!in_array($mName, $xMethods) || $mName == 'display') {
=======
			if (!in_array($mName, $xMethods) || $mName == 'display')
			{
>>>>>>> upstream/master
				$this->methods[] = strtolower($mName);
				// Auto register the methods as tasks.
				$this->taskMap[strtolower($mName)] = $mName;
			}
		}

		//set the view name
<<<<<<< HEAD
		if (empty($this->name)) {
			if (array_key_exists('name', $config)) {
				$this->name = $config['name'];
			}
			else {
=======
		if (empty($this->name))
		{
			if (array_key_exists('name', $config))
			{
				$this->name = $config['name'];
			}
			else
			{
>>>>>>> upstream/master
				$this->name = $this->getName();
			}
		}

		// Set a base path for use by the controller
<<<<<<< HEAD
		if (array_key_exists('base_path', $config)) {
			$this->basePath	= $config['base_path'];
		}
		else {
			$this->basePath	= JPATH_COMPONENT;
		}

		// If the default task is set, register it as such
		if (array_key_exists('default_task', $config)) {
			$this->registerDefaultTask($config['default_task']);
		}
		else {
=======
		if (array_key_exists('base_path', $config))
		{
			$this->basePath = $config['base_path'];
		}
		else
		{
			$this->basePath = JPATH_COMPONENT;
		}

		// If the default task is set, register it as such
		if (array_key_exists('default_task', $config))
		{
			$this->registerDefaultTask($config['default_task']);
		}
		else
		{
>>>>>>> upstream/master
			$this->registerDefaultTask('display');
		}

		// Set the models prefix
<<<<<<< HEAD
		if (empty($this->model_prefix)) {
			if (array_key_exists('model_prefix', $config)) {
				// User-defined prefix
				$this->model_prefix = $config['model_prefix'];
			}
			else {
=======
		if (empty($this->model_prefix))
		{
			if (array_key_exists('model_prefix', $config))
			{
				// User-defined prefix
				$this->model_prefix = $config['model_prefix'];
			}
			else
			{
>>>>>>> upstream/master
				$this->model_prefix = $this->name . 'Model';
			}
		}

		// Set the default model search path
<<<<<<< HEAD
		if (array_key_exists('model_path', $config)) {
			// user-defined dirs
			$this->addModelPath($config['model_path'], $this->model_prefix);
		}
		else {
			$this->addModelPath($this->basePath.'/models', $this->model_prefix);
		}

		// Set the default view search path
		if (array_key_exists('view_path', $config)) {
			// User-defined dirs
			$this->setPath('view', $config['view_path']);
		}
		else {
			$this->setPath('view', $this->basePath.'/views');
		}

		// Set the default view.
		if (array_key_exists('default_view', $config)) {
			$this->default_view	= $config['default_view'];
		}
		else if (empty($this->default_view)) {
=======
		if (array_key_exists('model_path', $config))
		{
			// user-defined dirs
			$this->addModelPath($config['model_path'], $this->model_prefix);
		}
		else
		{
			$this->addModelPath($this->basePath . '/models', $this->model_prefix);
		}

		// Set the default view search path
		if (array_key_exists('view_path', $config))
		{
			// User-defined dirs
			$this->setPath('view', $config['view_path']);
		}
		else
		{
			$this->setPath('view', $this->basePath . '/views');
		}

		// Set the default view.
		if (array_key_exists('default_view', $config))
		{
			$this->default_view = $config['default_view'];
		}
		else if (empty($this->default_view))
		{
>>>>>>> upstream/master
			$this->default_view = $this->getName();
		}

	}

	/**
	 * Adds to the search path for templates and resources.
	 *
	 * @param   string  $type  The path type (e.g. 'model', 'view').
	 * @param   mixed   $path  The directory string  or stream array to search.
	 *
	 * @return  JController  A JController object to support chaining.
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 * @note    Replaces _addPath.
	 */
	protected function addPath($type, $path)
	{
		// Just force path to array
		settype($path, 'array');

<<<<<<< HEAD
		if (!isset($this->paths[$type])) {
=======
		if (!isset($this->paths[$type]))
		{
>>>>>>> upstream/master
			$this->paths[$type] = array();
		}

		// Loop through the path directories
		foreach ($path as $dir)
		{
			// No surrounding spaces allowed!
<<<<<<< HEAD
			$dir = rtrim(JPath::check($dir, '/'), '/').'/';
=======
			$dir = rtrim(JPath::check($dir, '/'), '/') . '/';
>>>>>>> upstream/master

			// Add to the top of the search dirs
			array_unshift($this->paths[$type], $dir);
		}

		return $this;
	}

	/**
	 * Add one or more view paths to the controller's stack, in LIFO order.
	 *
<<<<<<< HEAD
	 * @param   string|array  $path  The directory (string) or list of directories (array) to add.
=======
	 * @param   mixed  $path  The directory (string) or list of directories (array) to add.
>>>>>>> upstream/master
	 *
	 * @return  JController  This object to support chaining.
	 */
	public function addViewPath($path)
	{
		$this->addPath('view', $path);

		return $this;
	}

	/**
	 * Authorisation check
	 *
	 * @param   string  $task  The ACO Section Value to check access on
	 *
<<<<<<< HEAD
	 * @return  bool  True if authorised
	 * @since   11.1
	 * @deprecated
	 */
	public function authorize($task)
	{
=======
	 * @return  boolean  True if authorised
	 *
	 * @since   11.1
	 *
	 * @deprecated  12.1   Use JAuthorise
	 */
	public function authorize($task)
	{
		// Deprecation warning.
		JLog::add('JController::authorize() is deprecated.', JLog::WARNING, 'deprecated');

>>>>>>> upstream/master
		$this->authorise($task);
	}

	/**
	 * Authorisation check
	 *
	 * @param   string  $task  The ACO Section Value to check access on.
	 *
<<<<<<< HEAD
	 * @return  bool  True if authorised
=======
	 * @return  boolean  True if authorised
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function authorise($task)
	{
		// Only do access check if the aco section is set
<<<<<<< HEAD
		if ($this->_acoSection) {
			// If we have a section value set that trumps the passed task ???
			if ($this->_acoSectionValue) {
=======
		if ($this->_acoSection)
		{
			// If we have a section value set that trumps the passed task.
			if ($this->_acoSectionValue)
			{
>>>>>>> upstream/master
				// We have one, so set it and lets do the check
				$task = $this->_acoSectionValue;
			}
			// Get the JUser object for the current user and return the authorization boolean
			$user = JFactory::getUser();

			return $user->authorise($this->_acoSection, $task);
		}
<<<<<<< HEAD
		else {
			// Nothing set, nothing to check... so obviously its ok :)
=======
		else
		{
			// Nothing set, nothing to check... so obviously it's ok :)
>>>>>>> upstream/master
			return true;
		}
	}

	/**
	 * Method to check whether an ID is in the edit list.
	 *
<<<<<<< HEAD
	 * @param   string    $context  The context for the session storage.
	 * @param    integer  $id       The ID of the record to add to the edit list.
	 *
	 * @return  boolean  True if the ID is in the edit list.
=======
	 * @param   string   $context  The context for the session storage.
	 * @param   integer  $id       The ID of the record to add to the edit list.
	 *
	 * @return  boolean  True if the ID is in the edit list.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function checkEditId($context, $id)
	{
<<<<<<< HEAD
		if ($id) {
			$app	= JFactory::getApplication();
			$values = (array) $app->getUserState($context.'.id');

			$result	= in_array((int) $id, $values);

			if (JDEBUG) {
				jimport('joomla.error.log');
				$log = JLog::getInstance('jcontroller.log.php')->addEntry(
					array('comment' => sprintf('Checking edit ID %s.%s: %d %s', $context, $id, (int) $result, str_replace("\n", ' ', print_r($values, 1))))
=======
		if ($id)
		{
			$app = JFactory::getApplication();
			$values = (array) $app->getUserState($context . '.id');

			$result = in_array((int) $id, $values);

			if (JDEBUG)
			{
				jimport('joomla.error.log');
				$log = JLog::getInstance('jcontroller.log.php')->addEntry(
					array(
						'comment' => sprintf(
							'Checking edit ID %s.%s: %d %s',
							$context,
							$id,
							(int) $result,
							str_replace("\n", ' ', print_r($values, 1))
						)
					)
>>>>>>> upstream/master
				);
			}

			return $result;
		}
<<<<<<< HEAD
		else {
=======
		else
		{
>>>>>>> upstream/master
			// No id for a new item.
			return true;
		}
	}

	/**
	 * Method to load and return a model object.
	 *
<<<<<<< HEAD
	 * @param   string  $name	The name of the model.
	 * @param   string  $prefix	Optional model prefix.
	 * @param   array   $config	Configuration array for the model. Optional.
	 *
	 * @return  mixed   Model object on success; otherwise null failure.
=======
	 * @param   string  $name    The name of the model.
	 * @param   string  $prefix  Optional model prefix.
	 * @param   array   $config  Configuration array for the model. Optional.
	 *
	 * @return  mixed   Model object on success; otherwise null failure.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 * @note    Replaces _createModel.
	 */
	protected function createModel($name, $prefix = '', $config = array())
	{
		// Clean the model name
<<<<<<< HEAD
		$modelName		= preg_replace('/[^A-Z0-9_]/i', '', $name);
		$classPrefix	= preg_replace('/[^A-Z0-9_]/i', '', $prefix);
=======
		$modelName = preg_replace('/[^A-Z0-9_]/i', '', $name);
		$classPrefix = preg_replace('/[^A-Z0-9_]/i', '', $prefix);
>>>>>>> upstream/master

		$result = JModel::getInstance($modelName, $classPrefix, $config);

		return $result;
	}

	/**
	 * Method to load and return a view object. This method first looks in the
	 * current template directory for a match and, failing that, uses a default
	 * set path to load the view class file.
	 *
	 * Note the "name, prefix, type" order of parameters, which differs from the
	 * "name, type, prefix" order used in related public methods.
	 *
	 * @param   string  $name    The name of the view.
	 * @param   string  $prefix  Optional prefix for the view class name.
	 * @param   string  $type    The type of view.
	 * @param   array   $config  Configuration array for the view. Optional.
	 *
	 * @return  mixed  View object on success; null or error result on failure.
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 * @note    Replaces _createView.
	 */
	protected function createView($name, $prefix = '', $type = '', $config = array())
	{
		// Clean the view name
<<<<<<< HEAD
		$viewName		= preg_replace('/[^A-Z0-9_]/i', '', $name);
		$classPrefix	= preg_replace('/[^A-Z0-9_]/i', '', $prefix);
		$viewType		= preg_replace('/[^A-Z0-9_]/i', '', $type);
=======
		$viewName = preg_replace('/[^A-Z0-9_]/i', '', $name);
		$classPrefix = preg_replace('/[^A-Z0-9_]/i', '', $prefix);
		$viewType = preg_replace('/[^A-Z0-9_]/i', '', $type);
>>>>>>> upstream/master

		// Build the view class name
		$viewClass = $classPrefix . $viewName;

<<<<<<< HEAD
		if (!class_exists($viewClass)) {
			jimport('joomla.filesystem.path');
			$path = JPath::find(
				$this->paths['view'],
				$this->createFileName('view', array('name' => $viewName, 'type' => $viewType))
			);

			if ($path) {
				require_once $path;

				if (!class_exists($viewClass)) {
					$result = JError::raiseError(
						500,
						JText::sprintf('JLIB_APPLICATION_ERROR_VIEW_CLASS_NOT_FOUND', $viewClass, $path)
					);
=======
		if (!class_exists($viewClass))
		{
			jimport('joomla.filesystem.path');
			$path = JPath::find($this->paths['view'], $this->createFileName('view', array('name' => $viewName, 'type' => $viewType)));

			if ($path)
			{
				require_once $path;

				if (!class_exists($viewClass))
				{
					$result = JError::raiseError(500, JText::sprintf('JLIB_APPLICATION_ERROR_VIEW_CLASS_NOT_FOUND', $viewClass, $path));
>>>>>>> upstream/master

					return null;
				}
			}
<<<<<<< HEAD
			else {
=======
			else
			{
>>>>>>> upstream/master
				return null;
			}
		}

		return new $viewClass($config);
	}

	/**
	 * Typical view method for MVC based architecture
	 *
	 * This function is provide as a default implementation, in most cases
	 * you will need to override it in your own controllers.
	 *
<<<<<<< HEAD
	 * @param   bool   $cachable   If true, the view output will be cached
	 * @param   array  $urlparams  An array of safe url parameters and their variable types, for valid values see {@link JFilterInput::clean()}.
	 *
	 * @return  JController  A JController object to support chaining.
=======
	 * @param   boolean  $cachable   If true, the view output will be cached
	 * @param   array    $urlparams  An array of safe url parameters and their variable types, for valid values see {@link JFilterInput::clean()}.
	 *
	 * @return  JController  A JController object to support chaining.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function display($cachable = false, $urlparams = false)
	{
<<<<<<< HEAD
		$document	= JFactory::getDocument();
		$viewType	= $document->getType();
		$viewName	= JRequest::getCmd('view', $this->default_view);
		$viewLayout	= JRequest::getCmd('layout', 'default');
=======
		$document = JFactory::getDocument();
		$viewType = $document->getType();
		$viewName = JRequest::getCmd('view', $this->default_view);
		$viewLayout = JRequest::getCmd('layout', 'default');
>>>>>>> upstream/master

		$view = $this->getView($viewName, $viewType, '', array('base_path' => $this->basePath));

		// Get/Create the model
<<<<<<< HEAD
		if ($model = $this->getModel($viewName)) {
=======
		if ($model = $this->getModel($viewName))
		{
>>>>>>> upstream/master
			// Push the model into the view (as default)
			$view->setModel($model, true);
		}

		// Set the layout
		$view->setLayout($viewLayout);

		$view->assignRef('document', $document);

		$conf = JFactory::getConfig();

		// Display the view
<<<<<<< HEAD
		if ($cachable && $viewType != 'feed' && $conf->get('caching') >= 1) {
			$option	= JRequest::getCmd('option');
			$cache	= JFactory::getCache($option, 'view');

			if (is_array($urlparams)) {
=======
		if ($cachable && $viewType != 'feed' && $conf->get('caching') >= 1)
		{
			$option = JRequest::getCmd('option');
			$cache = JFactory::getCache($option, 'view');

			if (is_array($urlparams))
			{
>>>>>>> upstream/master
				$app = JFactory::getApplication();

				$registeredurlparams = $app->get('registeredurlparams');

<<<<<<< HEAD
				if (empty($registeredurlparams)) {
					$registeredurlparams = new stdClass();
				}

				foreach ($urlparams AS $key => $value)
=======
				if (empty($registeredurlparams))
				{
					$registeredurlparams = new stdClass;
				}

				foreach ($urlparams as $key => $value)
>>>>>>> upstream/master
				{
					// Add your safe url parameters with variable type as value {@see JFilterInput::clean()}.
					$registeredurlparams->$key = $value;
				}

				$app->set('registeredurlparams', $registeredurlparams);
			}

			$cache->get($view, 'display');

		}
<<<<<<< HEAD
		else {
=======
		else
		{
>>>>>>> upstream/master
			$view->display();
		}

		return $this;
	}

	/**
	 * Execute a task by triggering a method in the derived class.
	 *
	 * @param   string  $task  The task to perform. If no matching task is found, the '__default' task is executed, if defined.
	 *
	 * @return  mixed   The value returned by the called method, false in error case.
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function execute($task)
	{
		$this->task = $task;

		$task = strtolower($task);
<<<<<<< HEAD
		if (isset($this->taskMap[$task])) {
			$doTask = $this->taskMap[$task];
		}
		elseif (isset($this->taskMap['__default'])) {
			$doTask = $this->taskMap['__default'];
		}
		else {
=======
		if (isset($this->taskMap[$task]))
		{
			$doTask = $this->taskMap[$task];
		}
		elseif (isset($this->taskMap['__default']))
		{
			$doTask = $this->taskMap['__default'];
		}
		else
		{
>>>>>>> upstream/master
			return JError::raiseError(404, JText::sprintf('JLIB_APPLICATION_ERROR_TASK_NOT_FOUND', $task));
		}

		// Record the actual task being fired
		$this->doTask = $doTask;

		// Make sure we have access
<<<<<<< HEAD
		if ($this->authorise($doTask)) {
			$retval = $this->$doTask();
			return $retval;
		}
		else {
=======
		if ($this->authorise($doTask))
		{
			$retval = $this->$doTask();
			return $retval;
		}
		else
		{
>>>>>>> upstream/master
			return JError::raiseError(403, JText::_('JLIB_APPLICATION_ERROR_ACCESS_FORBIDDEN'));
		}
	}

	/**
	 * Method to get a model object, loading it if required.
	 *
<<<<<<< HEAD
	 * @param   string   $name    The model name. Optional.
	 * @param   string   $prefix  The class prefix. Optional.
	 * @param   array    $config  Configuration array for model. Optional.
	 *
	 * @return  object   The model.
=======
	 * @param   string  $name    The model name. Optional.
	 * @param   string  $prefix  The class prefix. Optional.
	 * @param   array   $config  Configuration array for model. Optional.
	 *
	 * @return  object  The model.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function getModel($name = '', $prefix = '', $config = array())
	{
<<<<<<< HEAD
		if (empty($name)) {
			$name = $this->getName();
		}

		if (empty($prefix)) {
			$prefix = $this->model_prefix;
		}

		if ($model = $this->createModel($name, $prefix, $config)) {
=======
		if (empty($name))
		{
			$name = $this->getName();
		}

		if (empty($prefix))
		{
			$prefix = $this->model_prefix;
		}

		if ($model = $this->createModel($name, $prefix, $config))
		{
>>>>>>> upstream/master
			// Task is a reserved state
			$model->setState('task', $this->task);

			// Let's get the application object and set menu information if it's available
<<<<<<< HEAD
			$app	= JFactory::getApplication();
			$menu	= $app->getMenu();

			if (is_object($menu)) {
				if ($item = $menu->getActive()) {
					$params	= $menu->getParams($item->id);
=======
			$app = JFactory::getApplication();
			$menu = $app->getMenu();

			if (is_object($menu))
			{
				if ($item = $menu->getActive())
				{
					$params = $menu->getParams($item->id);
>>>>>>> upstream/master
					// Set default state data
					$model->setState('parameters.menu', $params);
				}
			}
		}
		return $model;
	}

	/**
	 * Method to get the controller name
	 *
	 * The dispatcher name is set by default parsed using the classname, or it can be set
	 * by passing a $config['name'] in the class constructor
	 *
	 * @return  string  The name of the dispatcher
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function getName()
	{
		$name = $this->name;

<<<<<<< HEAD
		if (empty($name)) {
			$r = null;
			if (!preg_match('/(.*)Controller/i', get_class($this), $r)) {
=======
		if (empty($name))
		{
			$r = null;
			if (!preg_match('/(.*)Controller/i', get_class($this), $r))
			{
>>>>>>> upstream/master
				JError::raiseError(500, JText::_('JLIB_APPLICATION_ERROR_CONTROLLER_GET_NAME'));
			}
			$name = strtolower($r[1]);
		}

		return $name;
	}

	/**
	 * Get the last task that is being performed or was most recently performed.
	 *
	 * @return  string  The task that is being performed or was most recently performed.
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function getTask()
	{
		return $this->task;
	}

	/**
	 * Gets the available tasks in the controller.
	 *
	 * @return  array  Array[i] of task names.
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function getTasks()
	{
		return $this->methods;
	}

	/**
	 * Method to get a reference to the current view and load it if necessary.
	 *
<<<<<<< HEAD
	 * @param   string  $name	The view name. Optional, defaults to the controller name.
	 * @param   string  $type	The view type. Optional.
	 * @param   string  $prefix	The class prefix. Optional.
	 * @param   array   $config	Configuration array for view. Optional.
	 *
	 * @return  object  Reference to the view or an error.
=======
	 * @param   string  $name    The view name. Optional, defaults to the controller name.
	 * @param   string  $type    The view type. Optional.
	 * @param   string  $prefix  The class prefix. Optional.
	 * @param   array   $config  Configuration array for view. Optional.
	 *
	 * @return  object  Reference to the view or an error.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function getView($name = '', $type = '', $prefix = '', $config = array())
	{
		static $views;

<<<<<<< HEAD
		if (!isset($views)) {
			$views = array();
		}

		if (empty($name)) {
			$name = $this->getName();
		}

		if (empty($prefix)) {
			$prefix = $this->getName() . 'View';
		}

		if (empty($views[$name])) {
			if ($view = $this->createView($name, $prefix, $type, $config)) {
				$views[$name] = & $view;
			}
			else {
				$result = JError::raiseError(
					500,
					JText::sprintf('JLIB_APPLICATION_ERROR_VIEW_NOT_FOUND', $name, $type, $prefix)
				);
=======
		if (!isset($views))
		{
			$views = array();
		}

		if (empty($name))
		{
			$name = $this->getName();
		}

		if (empty($prefix))
		{
			$prefix = $this->getName() . 'View';
		}

		if (empty($views[$name]))
		{
			if ($view = $this->createView($name, $prefix, $type, $config))
			{
				$views[$name] = & $view;
			}
			else
			{
				$result = JError::raiseError(500, JText::sprintf('JLIB_APPLICATION_ERROR_VIEW_NOT_FOUND', $name, $type, $prefix));
>>>>>>> upstream/master

				return $result;
			}
		}

		return $views[$name];
	}

	/**
	 * Method to add a record ID to the edit list.
	 *
<<<<<<< HEAD
	 * @param    string   $context  The context for the session storage.
	 * @param    integer  $id       The ID of the record to add to the edit list.
	 *
	 * @return  void
=======
	 * @param   string   $context  The context for the session storage.
	 * @param   integer  $id       The ID of the record to add to the edit list.
	 *
	 * @return  void
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function holdEditId($context, $id)
	{
		// Initialise variables.
<<<<<<< HEAD
		$app	= JFactory::getApplication();
		$values	= (array) $app->getUserState($context.'.id');

		// Add the id to the list if non-zero.
		if (!empty($id)) {
			array_push($values, (int) $id);
			$values = array_unique($values);
			$app->setUserState($context.'.id', $values);

			if (JDEBUG) {
				jimport('joomla.error.log');
				$log = JLog::getInstance('jcontroller.log.php')->addEntry(
					array('comment' => sprintf('Holding edit ID %s.%s %s', $context, $id, str_replace("\n", ' ', print_r($values, 1))))
=======
		$app = JFactory::getApplication();
		$values = (array) $app->getUserState($context . '.id');

		// Add the id to the list if non-zero.
		if (!empty($id))
		{
			array_push($values, (int) $id);
			$values = array_unique($values);
			$app->setUserState($context . '.id', $values);

			if (JDEBUG)
			{
				jimport('joomla.error.log');
				$log = JLog::getInstance('jcontroller.log.php')->addEntry(
					array(
						'comment' => sprintf('Holding edit ID %s.%s %s', $context, $id, str_replace("\n", ' ', print_r($values, 1)))
					)
>>>>>>> upstream/master
				);
			}
		}
	}

	/**
	 * Redirects the browser or returns false if no redirect is set.
	 *
	 * @return  boolean  False if no redirect exists.
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function redirect()
	{
<<<<<<< HEAD
		if ($this->redirect) {
=======
		if ($this->redirect)
		{
>>>>>>> upstream/master
			$app = JFactory::getApplication();
			$app->redirect($this->redirect, $this->message, $this->messageType);
		}

		return false;
	}

	/**
	 * Register the default task to perform if a mapping is not found.
	 *
<<<<<<< HEAD
	 * @param   string   $method  The name of the method in the derived class to perform if a named task is not found.
	 *
	 * @return  JController  A JController object to support chaining.
=======
	 * @param   string  $method  The name of the method in the derived class to perform if a named task is not found.
	 *
	 * @return  JController  A JController object to support chaining.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function registerDefaultTask($method)
	{
		$this->registerTask('__default', $method);

		return $this;
	}

	/**
	 * Register (map) a task to a method in the class.
	 *
<<<<<<< HEAD
	 * @param   string   $task    The task.
	 * @param   string   $method  The name of the method in the derived class to perform for this task.
	 *
	 * @return  JController  A JController object to support chaining.
=======
	 * @param   string  $task    The task.
	 * @param   string  $method  The name of the method in the derived class to perform for this task.
	 *
	 * @return  JController  A JController object to support chaining.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function registerTask($task, $method)
	{
<<<<<<< HEAD
		if (in_array(strtolower($method), $this->methods)) {
=======
		if (in_array(strtolower($method), $this->methods))
		{
>>>>>>> upstream/master
			$this->taskMap[strtolower($task)] = $method;
		}

		return $this;
	}

	/**
	 * Unregister (unmap) a task in the class.
	 *
<<<<<<< HEAD
	 * @param	string  $task  The task.
	 *
	 * @return	JController  This object to support chaining.
	 * @since	11.1
=======
	 * @param   string  $task  The task.
	 *
	 * @return  JController  This object to support chaining.
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function unregisterTask($task)
	{
		unset($this->taskMap[strtolower($task)]);

		return $this;
	}

	/**
	 * Method to check whether an ID is in the edit list.
	 *
	 * @param   string   $context  The context for the session storage.
	 * @param   integer  $id       The ID of the record to add to the edit list.
	 *
	 * @return  void
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function releaseEditId($context, $id)
	{
<<<<<<< HEAD
		$app	= JFactory::getApplication();
		$values = (array) $app->getUserState($context.'.id');
=======
		$app = JFactory::getApplication();
		$values = (array) $app->getUserState($context . '.id');
>>>>>>> upstream/master

		// Do a strict search of the edit list values.
		$index = array_search((int) $id, $values, true);

<<<<<<< HEAD
		if (is_int($index)) {
			unset($values[$index]);
			$app->setUserState($context.'.id', $values);

			if (JDEBUG) {
				jimport('joomla.error.log');
				$log = JLog::getInstance('jcontroller.log.php')->addEntry(
					array('comment' => sprintf('Releasing edit ID %s.%s %s', $context, $id, str_replace("\n", ' ', print_r($values, 1))))
=======
		if (is_int($index))
		{
			unset($values[$index]);
			$app->setUserState($context . '.id', $values);

			if (JDEBUG)
			{
				jimport('joomla.error.log');
				$log = JLog::getInstance('jcontroller.log.php')->addEntry(
					array(
						'comment' => sprintf('Releasing edit ID %s.%s %s', $context, $id, str_replace("\n", ' ', print_r($values, 1)))
					)
>>>>>>> upstream/master
				);
			}
		}
	}

	/**
	 * Sets the access control levels.
	 *
<<<<<<< HEAD
	 * @param   string   $section  The ACO section (eg, the component).
	 * @param   string   $value    The ACO section value (if using a constant value).
	 *
	 * @return  void
	 *
	 * @deprecated
=======
	 * @param   string  $section  The ACO section (eg, the component).
	 * @param   string  $value    The ACO section value (if using a constant value).
	 *
	 * @return  void
	 *
	 * @deprecated  12.1  Use JAccess
>>>>>>> upstream/master
	 * @see     Jaccess
	 * @since   11.1
	 */
	public function setAccessControl($section, $value = null)
	{
<<<<<<< HEAD
=======
		// Deprecation warning.
		JLog::add('JController::setAccessControl() is deprecated.', JLog::WARNING, 'deprecated');
>>>>>>> upstream/master
		$this->_acoSection = $section;
		$this->_acoSectionValue = $value;
	}

	/**
	 * Sets the internal message that is passed with a redirect
	 *
	 * @param   string  $text  Message to display on redirect.
	 * @param   string  $type  Message type (since 11.1). Optional, defaults to 'message'.
	 *
	 * @return  string  Previous message
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function setMessage($text, $type = 'message')
	{
<<<<<<< HEAD
		$previous			= $this->message;
		$this->message		= $text;
		$this->messageType	= $type;
=======
		$previous = $this->message;
		$this->message = $text;
		$this->messageType = $type;
>>>>>>> upstream/master

		return $previous;
	}

	/**
	 * Sets an entire array of search paths for resources.
	 *
	 * @param   string  $type  The type of path to set, typically 'view' or 'model'.
	 * @param   string  $path  The new set of search paths. If null or false, resets to the current directory only.
	 *
	 * @return  void
	 *
	 * @note    Replaces _setPath.
	 * @since   11.1
	 */
	protected function setPath($type, $path)
	{
		// clear out the prior search dirs
		$this->paths[$type] = array();

		// actually add the user-specified directories
		$this->addPath($type, $path);
	}

	/**
	 * Set a URL for browser redirection.
	 *
	 * @param   string  $url   URL to redirect to.
	 * @param   string  $msg   Message to display on redirect. Optional, defaults to value set internally by controller, if any.
	 * @param   string  $type  Message type. Optional, defaults to 'message' or the type set by a previous call to setMessage.
	 *
	 * @return  JController  This object to support chaining.
	 *
	 * @since   11.1
	 */
	public function setRedirect($url, $msg = null, $type = null)
	{
		$this->redirect = $url;
<<<<<<< HEAD
		if ($msg !== null) {
			// Controller may have set this directly
			$this->message	= $msg;
		}

		// Ensure the type is not overwritten by a previous call to setMessage.
		if (empty($type)) {
			if (empty($this->messageType)) {
=======
		if ($msg !== null)
		{
			// Controller may have set this directly
			$this->message = $msg;
		}

		// Ensure the type is not overwritten by a previous call to setMessage.
		if (empty($type))
		{
			if (empty($this->messageType))
			{
>>>>>>> upstream/master
				$this->messageType = 'message';
			}
		}
		// If the type is explicitly set, set it.
<<<<<<< HEAD
		else {
=======
		else
		{
>>>>>>> upstream/master
			$this->messageType = $type;
		}

		return $this;
	}
}
