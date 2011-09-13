<?php
/**
 * @package     Joomla.Platform
 * @subpackage  HTML
 *
 * @copyright   Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('JPATH_PLATFORM') or die;

jimport('joomla.event.dispatcher');

/**
 * JEditor class to handle WYSIWYG editors
 *
 * @package     Joomla.Platform
 * @subpackage  HTML
 * @since       11.1
 */
class JEditor extends JObservable
{
	/**
	 * Editor Plugin object
	 *
<<<<<<< HEAD
	 * @var	object
=======
	 * @var  object
>>>>>>> upstream/master
	 */
	protected $_editor = null;

	/**
	 * Editor Plugin name
	 *
<<<<<<< HEAD
	 * @var string
=======
	 * @var  string
>>>>>>> upstream/master
	 */
	protected $_name = null;

	/**
	 * Object asset
	 *
<<<<<<< HEAD
	 * @var string
=======
	 * @var  string
>>>>>>> upstream/master
	 */
	protected $asset = null;

	/**
	 * Object author
	 *
<<<<<<< HEAD
	 * @var string
=======
	 * @var  string
>>>>>>> upstream/master
	 */
	protected $author = null;

	/**
	 * Constructor
	 *
<<<<<<< HEAD
	 * @param   string  The editor name
=======
	 * @param   string  $editor  The editor name
>>>>>>> upstream/master
	 */
	public function __construct($editor = 'none')
	{
		$this->_name = $editor;
	}

	/**
	 * Returns the global Editor object, only creating it
	 * if it doesn't already exist.
	 *
	 * @param   string  $editor  The editor to use.
<<<<<<< HEAD
	 * @return  object  JEditor	The Editor object.
=======
	 *
	 * @return  object  JEditor  The Editor object.
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public static function getInstance($editor = 'none')
	{
		static $instances;

<<<<<<< HEAD
		if (!isset ($instances)) {
			$instances = array ();
=======
		if (!isset($instances))
		{
			$instances = array();
>>>>>>> upstream/master
		}

		$signature = serialize($editor);

<<<<<<< HEAD
		if (empty ($instances[$signature])) {
=======
		if (empty($instances[$signature]))
		{
>>>>>>> upstream/master
			$instances[$signature] = new JEditor($editor);
		}

		return $instances[$signature];
	}

	/**
	 * Initialise the editor
<<<<<<< HEAD
=======
	 *
	 * @return  void
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function initialise()
	{
		//check if editor is already loaded
<<<<<<< HEAD
		if (is_null(($this->_editor))) {
=======
		if (is_null(($this->_editor)))
		{
>>>>>>> upstream/master
			return;
		}

		$args['event'] = 'onInit';

		$return = '';
		$results[] = $this->_editor->update($args);

		foreach ($results as $result)
		{
<<<<<<< HEAD
			if (trim($result)) {
=======
			if (trim($result))
			{
>>>>>>> upstream/master
				//$return .= $result;
				$return = $result;
			}
		}

		$document = JFactory::getDocument();
		$document->addCustomTag($return);
	}

	/**
	 * Display the editor area.
	 *
<<<<<<< HEAD
	 * @param   string   $name		The control name.
	 * @param   string   $html		The contents of the text area.
	 * @param   string   $width		The width of the text area (px or %).
	 * @param   string   $height		The height of the text area (px or %).
	 * @param   integer  $col		The number of columns for the textarea.
	 * @param   integer  $row		The number of rows for the textarea.
	 * @param   boolean  $buttons	True and the editor buttons will be displayed.
	 * @param   string   $id			An optional ID for the textarea (note: since 1.6). If not supplied the name is used.
	 * @param   string   $asset
	 * @param   object   $author
	 * @param   array    $params		Associative array of editor parameters.
	 */
	public function display($name, $html, $width, $height, $col, $row, $buttons = true, $id = null, $asset = null, $author = null, $params = array())
	{
		$this->asset	= $asset;
		$this->author	= $author;
		$this->_loadEditor($params);

		// Check whether editor is already loaded
		if (is_null(($this->_editor))) {
=======
	 * @param   string   $name     The control name.
	 * @param   string   $html     The contents of the text area.
	 * @param   string   $width    The width of the text area (px or %).
	 * @param   string   $height   The height of the text area (px or %).
	 * @param   integer  $col      The number of columns for the textarea.
	 * @param   integer  $row      The number of rows for the textarea.
	 * @param   boolean  $buttons  True and the editor buttons will be displayed.
	 * @param   string   $id       An optional ID for the textarea (note: since 1.6). If not supplied the name is used.
	 * @param   string   $asset    The object asset
	 * @param   object   $author
	 * @param   array    $params   Associative array of editor parameters.
	 *
	 * @return  string
	 *
	 * @since   11.1
	 */
	public function display($name, $html, $width, $height, $col, $row, $buttons = true, $id = null, $asset = null, $author = null, $params = array())
	{
		$this->asset = $asset;
		$this->author = $author;
		$this->_loadEditor($params);

		// Check whether editor is already loaded
		if (is_null(($this->_editor)))
		{
>>>>>>> upstream/master
			return;
		}

		// Backwards compatibility. Width and height should be passed without a semicolon from now on.
		// If editor plugins need a unit like "px" for CSS styling, they need to take care of that
<<<<<<< HEAD
		$width	= str_replace(';', '', $width);
		$height	= str_replace(';', '', $height);
=======
		$width = str_replace(';', '', $width);
		$height = str_replace(';', '', $height);
>>>>>>> upstream/master

		// Initialise variables.
		$return = null;

<<<<<<< HEAD
		$args['name']		= $name;
		$args['content']	= $html;
		$args['width']		= $width;
		$args['height']		= $height;
		$args['col']		= $col;
		$args['row']		= $row;
		$args['buttons']	= $buttons;
		$args['id']			= $id ? $id : $name;
		$args['event']		= 'onDisplay';
=======
		$args['name'] = $name;
		$args['content'] = $html;
		$args['width'] = $width;
		$args['height'] = $height;
		$args['col'] = $col;
		$args['row'] = $row;
		$args['buttons'] = $buttons;
		$args['id'] = $id ? $id : $name;
		$args['event'] = 'onDisplay';
>>>>>>> upstream/master

		$results[] = $this->_editor->update($args);

		foreach ($results as $result)
		{
<<<<<<< HEAD
			if (trim($result)) {
=======
			if (trim($result))
			{
>>>>>>> upstream/master
				$return .= $result;
			}
		}
		return $return;
	}

	/**
	 * Save the editor content
	 *
<<<<<<< HEAD
	 * @param   string  The name of the editor control
=======
	 * @param   string  $editor  The name of the editor control
	 *
	 * @return  string
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function save($editor)
	{
		$this->_loadEditor();

		// Check whether editor is already loaded
<<<<<<< HEAD
		if (is_null(($this->_editor))) {
=======
		if (is_null(($this->_editor)))
		{
>>>>>>> upstream/master
			return;
		}

		$args[] = $editor;
		$args['event'] = 'onSave';

		$return = '';
		$results[] = $this->_editor->update($args);

		foreach ($results as $result)
		{
<<<<<<< HEAD
			if (trim($result)) {
=======
			if (trim($result))
			{
>>>>>>> upstream/master
				$return .= $result;
			}
		}

		return $return;
	}

	/**
	 * Get the editor contents
	 *
<<<<<<< HEAD
	 * @param   string  $editor	The name of the editor control
	 *
	 * @return  string
=======
	 * @param   string  $editor  The name of the editor control
	 *
	 * @return  string
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function getContent($editor)
	{
		$this->_loadEditor();

		$args['name'] = $editor;
		$args['event'] = 'onGetContent';

		$return = '';
		$results[] = $this->_editor->update($args);

		foreach ($results as $result)
		{
<<<<<<< HEAD
			if (trim($result)) {
=======
			if (trim($result))
			{
>>>>>>> upstream/master
				$return .= $result;
			}
		}

		return $return;
	}

	/**
	 * Set the editor contents
	 *
<<<<<<< HEAD
	 * @param   string  $editor	The name of the editor control
	 * @param   string  $html	The contents of the text area
	 *
	 * @return  string
=======
	 * @param   string  $editor  The name of the editor control
	 * @param   string  $html    The contents of the text area
	 *
	 * @return  string
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function setContent($editor, $html)
	{
		$this->_loadEditor();

		$args['name'] = $editor;
		$args['html'] = $html;
		$args['event'] = 'onSetContent';

		$return = '';
		$results[] = $this->_editor->update($args);

		foreach ($results as $result)
		{
<<<<<<< HEAD
			if (trim($result)) {
=======
			if (trim($result))
			{
>>>>>>> upstream/master
				$return .= $result;
			}
		}

		return $return;
	}

	/**
<<<<<<< HEAD
	 * Get the editor buttons
	 *
	 * @param   string  $editor		The name of the editor.
	 * @param   mixed   $buttons	Can be boolean or array, if boolean defines if the buttons are
	 * 								displayed, if array defines a list of buttons not to show.
=======
	 * Get the editor extended buttons (usually from plugins)
	 *
	 * @param   string  $editor   The name of the editor.
	 * @param   mixed   $buttons  Can be boolean or array, if boolean defines if the buttons are
	 *                            displayed, if array defines a list of buttons not to show.
	 *
	 * @return  array
>>>>>>> upstream/master
	 *
	 * @since   11.1
	 */
	public function getButtons($editor, $buttons = true)
	{
		$result = array();

<<<<<<< HEAD
		if (is_bool($buttons) && !$buttons) {
=======
		if (is_bool($buttons) && !$buttons)
		{
>>>>>>> upstream/master
			return $result;
		}

		// Get plugins
		$plugins = JPluginHelper::getPlugin('editors-xtd');

<<<<<<< HEAD
		foreach($plugins as $plugin)
		{
			if (is_array($buttons) &&  in_array($plugin->name, $buttons)) {
=======
		foreach ($plugins as $plugin)
		{
			if (is_array($buttons) && in_array($plugin->name, $buttons))
			{
>>>>>>> upstream/master
				continue;
			}

			$isLoaded = JPluginHelper::importPlugin('editors-xtd', $plugin->name, false);
<<<<<<< HEAD
			$className = 'plgButton'.$plugin->name;

			if (class_exists($className)) {
				$plugin = new $className($this, (array)$plugin);
			}

			// Try to authenticate
			if ($temp = $plugin->onDisplay($editor, $this->asset, $this->author)) {
=======
			$className = 'plgButton' . $plugin->name;

			if (class_exists($className))
			{
				$plugin = new $className($this, (array) $plugin);
			}

			// Try to authenticate
			if ($temp = $plugin->onDisplay($editor, $this->asset, $this->author))
			{
>>>>>>> upstream/master
				$result[] = $temp;
			}
		}

		return $result;
	}

	/**
	 * Load the editor
	 *
<<<<<<< HEAD
	 * @param   array  $config	Associative array of editor config paramaters
	 *
	 * @return  mixed
=======
	 * @param   array  $config  Associative array of editor config paramaters
	 *
	 * @return  mixed
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function _loadEditor($config = array())
	{
		// Check whether editor is already loaded
<<<<<<< HEAD
		if (!is_null(($this->_editor))) {
=======
		if (!is_null(($this->_editor)))
		{
>>>>>>> upstream/master
			return;
		}

		jimport('joomla.filesystem.file');

		// Build the path to the needed editor plugin
		$name = JFilterInput::getInstance()->clean($this->_name, 'cmd');
<<<<<<< HEAD
		$path = JPATH_PLUGINS.'/editors/'.$name.'.php';

		if (!JFile::exists($path)) {
			$path = JPATH_PLUGINS.'/editors/'.$name.'/'.$name.'.php';
			if (!JFile::exists($path)) {
=======
		$path = JPATH_PLUGINS . '/editors/' . $name . '.php';

		if (!JFile::exists($path))
		{
			$path = JPATH_PLUGINS . '/editors/' . $name . '/' . $name . '.php';
			if (!JFile::exists($path))
			{
>>>>>>> upstream/master
				$message = JText::_('JLIB_HTML_EDITOR_CANNOT_LOAD');
				JError::raiseWarning(500, $message);
				return false;
			}
		}

		// Require plugin file
		require_once $path;

		// Get the plugin
<<<<<<< HEAD
		$plugin		= JPluginHelper::getPlugin('editors', $this->_name);
		$params = new JRegistry;
		$params->loadJSON($plugin->params);
=======
		$plugin = JPluginHelper::getPlugin('editors', $this->_name);
		$params = new JRegistry;
		$params->loadString($plugin->params);
>>>>>>> upstream/master
		$params->loadArray($config);
		$plugin->params = $params;

		// Build editor plugin classname
<<<<<<< HEAD
		$name = 'plgEditor'.$this->_name;

		if ($this->_editor = new $name ($this, (array)$plugin)) {
=======
		$name = 'plgEditor' . $this->_name;

		if ($this->_editor = new $name($this, (array) $plugin))
		{
>>>>>>> upstream/master
			// Load plugin parameters
			$this->initialise();
			JPluginHelper::importPlugin('editors-xtd');
		}
	}
}
