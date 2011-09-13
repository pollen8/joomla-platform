<?php
/**
 * @package     Joomla.Platform
 * @subpackage  HTML
 *
 * @copyright   Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('JPATH_PLATFORM') or die;

//Register the session storage class with the loader
<<<<<<< HEAD
JLoader::register('JButton', dirname(__FILE__).DS.'toolbar'.DS.'button.php');
=======
JLoader::register('JButton', dirname(__FILE__) . '/toolbar/button.php');
>>>>>>> upstream/master

/**
 * ToolBar handler
 *
 * @package     Joomla.Platform
 * @subpackage  HTML
 * @since       11.1
 */
class JToolBar extends JObject
{
	/**
	 * Toolbar name
	 *
	 * @var    string
	 */
<<<<<<< HEAD
	protected $_name = array ();
=======
	protected $_name = array();
>>>>>>> upstream/master

	/**
	 * Toolbar array
	 *
	 * @var    array
	 */
<<<<<<< HEAD
	protected $_bar = array ();
=======
	protected $_bar = array();
>>>>>>> upstream/master

	/**
	 * Loaded buttons
	 *
	 * @var    array
	 */
<<<<<<< HEAD
	protected $_buttons = array ();
=======
	protected $_buttons = array();
>>>>>>> upstream/master

	/**
	 * Directories, where button types can be stored.
	 *
	 * @var    array
	 */
<<<<<<< HEAD
	protected $_buttonPath = array ();
=======
	protected $_buttonPath = array();
>>>>>>> upstream/master

	/**
	 * Constructor
	 *
<<<<<<< HEAD
	 * @param   string  The toolbar name.
=======
	 * @param   string  $name  The toolbar name.
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function __construct($name = 'toolbar')
	{
		$this->_name = $name;

		// Set base path to find buttons.
<<<<<<< HEAD
		$this->_buttonPath[] = dirname(__FILE__).DS.'toolbar'.DS.'button';
=======
		$this->_buttonPath[] = dirname(__FILE__) . '/toolbar/button';
>>>>>>> upstream/master

	}

	/**
	 * Returns the global JToolBar object, only creating it if it
	 * doesn't already exist.
	 *
	 * @param   string  $name  The name of the toolbar.
	 *
<<<<<<< HEAD
	 * @return  JToolBar	The JToolBar object.
=======
	 * @return  JToolBar  The JToolBar object.
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public static function getInstance($name = 'toolbar')
	{
		static $instances;

<<<<<<< HEAD
		if (!isset($instances)) {
			$instances = array ();
		}

		if (empty($instances[$name])) {
=======
		if (!isset($instances))
		{
			$instances = array();
		}

		if (empty($instances[$name]))
		{
>>>>>>> upstream/master
			$instances[$name] = new JToolBar($name);
		}

		return $instances[$name];
	}

	/**
	 * Set a value
	 *
<<<<<<< HEAD
	 * @param   string  The name of the parameter.
	 * @param   string  The value of the parameter.
	 *
	 * @return  string  The set value.
=======
	 * @return  string  The set value.
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function appendButton()
	{
		// Push button onto the end of the toolbar array.
		$btn = func_get_args();
		array_push($this->_bar, $btn);
		return true;
	}

	/**
	 * Get the list of toolbar links.
	 *
	 * @return  array
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function getItems()
	{
		return $this->_bar;
	}

	/**
	 * Get the name of the toolbar.
	 *
	 * @return  string
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function getName()
	{
		return $this->_name;
	}

	/**
	 * Get a value.
	 *
<<<<<<< HEAD
	 * @param   string  The name of the parameter.
	 * @param   mixed   The default value if not found.
	 *
	 * @return  string
=======
	 * @return  string
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function prependButton()
	{
		// Insert button into the front of the toolbar array.
		$btn = func_get_args();
		array_unshift($this->_bar, $btn);
		return true;
	}

	/**
<<<<<<< HEAD
	 * Render.
	 *
	 * @param   string  The name of the control, or the default text area if a setup file is not found.
	 *
	 * @return  string  HTML
	 */
	public function render()
	{
		$html = array ();

		// Start toolbar div.
		$html[] = '<div class="toolbar-list" id="'.$this->_name.'">';
		$html[] = '<ul>';

		// Render each button in the toolbar.
		foreach ($this->_bar as $button) {
=======
	 * Render a tool bar.
	 *
	 * @return  string  HTML for the toolbar.
	 *
	 * @since   11.1
	 */
	public function render()
	{
		$html = array();

		// Start toolbar div.
		$html[] = '<div class="toolbar-list" id="' . $this->_name . '">';
		$html[] = '<ul>';

		// Render each button in the toolbar.
		foreach ($this->_bar as $button)
		{
>>>>>>> upstream/master
			$html[] = $this->renderButton($button);
		}

		// End toolbar div.
		$html[] = '</ul>';
		$html[] = '<div class="clr"></div>';
		$html[] = '</div>';

		return implode("\n", $html);
	}

	/**
<<<<<<< HEAD
	 * Render a parameter type.
	 *
	 * @param   object  A param tag node.
	 * @param   string  The control name.
	 *
	 * @return  array  Any array of the label, the form element and the tooltip.
=======
	 * Render a button.
	 *
	 * @param   object  &$node  A toolbar node.
	 *
	 * @return  string
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function renderButton(&$node)
	{
		// Get the button type.
		$type = $node[0];

		$button = $this->loadButtonType($type);

		// Check for error.
<<<<<<< HEAD
		if ($button === false) {
=======
		if ($button === false)
		{
>>>>>>> upstream/master
			return JText::sprintf('JLIB_HTML_BUTTON_NOT_DEFINED', $type);
		}
		return $button->render($node);
	}

	/**
	 * Loads a button type.
	 *
<<<<<<< HEAD
	 * @param   string  buttonType
	 *
	 * @return  object
=======
	 * @param   string   $type  Button Type
	 * @param   boolean  $new   False by default
	 *
	 * @return  object
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function loadButtonType($type, $new = false)
	{
		$signature = md5($type);
<<<<<<< HEAD
		if (isset ($this->_buttons[$signature]) && $new === false) {
=======
		if (isset($this->_buttons[$signature]) && $new === false)
		{
>>>>>>> upstream/master
			return $this->_buttons[$signature];
		}

		if (!class_exists('JButton'))
		{
			JError::raiseWarning('SOME_ERROR_CODE', JText::_('JLIB_HTML_BUTTON_BASE_CLASS'));
			return false;
		}

<<<<<<< HEAD
		$buttonClass = 'JButton'.$type;
		if (!class_exists($buttonClass))
		{
			if (isset ($this->_buttonPath)) {
				$dirs = $this->_buttonPath;
			} else {
				$dirs = array ();
			}

			$file = JFilterInput::getInstance()->clean(str_replace('_', DS, strtolower($type)).'.php', 'path');

			jimport('joomla.filesystem.path');
			if ($buttonFile = JPath::find($dirs, $file)) {
				include_once $buttonFile;
			} else {
=======
		$buttonClass = 'JButton' . $type;
		if (!class_exists($buttonClass))
		{
			if (isset($this->_buttonPath))
			{
				$dirs = $this->_buttonPath;
			}
			else
			{
				$dirs = array();
			}

			$file = JFilterInput::getInstance()->clean(str_replace('_', DS, strtolower($type)) . '.php', 'path');

			jimport('joomla.filesystem.path');
			if ($buttonFile = JPath::find($dirs, $file))
			{
				include_once $buttonFile;
			}
			else
			{
>>>>>>> upstream/master
				JError::raiseWarning('SOME_ERROR_CODE', JText::sprintf('JLIB_HTML_BUTTON_NO_LOAD', $buttonClass, $buttonFile));
				return false;
			}
		}

		if (!class_exists($buttonClass))
		{
			//return	JError::raiseError('SOME_ERROR_CODE', "Module file $buttonFile does not contain class $buttonClass.");
			return false;
		}
		$this->_buttons[$signature] = new $buttonClass($this);

		return $this->_buttons[$signature];
	}

	/**
	 * Add a directory where JToolBar should search for button types in LIFO order.
	 *
	 * You may either pass a string or an array of directories.
	 *
<<<<<<< HEAD
	 * {@link JToolbar} will be searching for an element type in the same order you
	 * added them. If the parameter type cannot be found in the custom folders,
	 * it will look in libraries/joomla/html/toolbar/button.
	 *
	 * @param   string|array	directory or directories to search.
	 * @since   11.1
=======
	 * JToolbar will be searching for an element type in the same order you
	 * added them. If the parameter type cannot be found in the custom folders,
	 * it will look in libraries/joomla/html/toolbar/button.
	 *
	 * @param   mixed  $path  Directory or directories to search.
	 *
	 * @return  void
	 *
	 * @since   11.1
	 * @see JToolbar
>>>>>>> upstream/master
	 */
	public function addButtonPath($path)
	{
		// Just force path to array.
		settype($path, 'array');

		// Loop through the path directories.
<<<<<<< HEAD
		foreach ($path as $dir) {
=======
		foreach ($path as $dir)
		{
>>>>>>> upstream/master
			// No surrounding spaces allowed!
			$dir = trim($dir);

			// Add trailing separators as needed.
<<<<<<< HEAD
			if (substr($dir, -1) != DIRECTORY_SEPARATOR) {
=======
			if (substr($dir, -1) != DIRECTORY_SEPARATOR)
			{
>>>>>>> upstream/master
				// Directory
				$dir .= DIRECTORY_SEPARATOR;
			}

			// Add to the top of the search dirs.
			array_unshift($this->_buttonPath, $dir);
		}

	}
}
