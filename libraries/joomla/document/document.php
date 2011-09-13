<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Document
 *
 * @copyright   Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

<<<<<<< HEAD
defined('JPATH_PLATFORM') or die;

//Register the renderer class with the loader
JLoader::register('JDocumentRenderer', dirname(__FILE__).DS.'renderer.php');
=======
defined('JPATH_PLATFORM') or die();

JLoader::register('JDocumentRenderer', dirname(__FILE__) . '/renderer.php');
>>>>>>> upstream/master
jimport('joomla.filter.filteroutput');

/**
 * Document class, provides an easy interface to parse and display a document
 *
 * @package     Joomla.Platform
 * @subpackage  Document
 * @since       11.1
 */
class JDocument extends JObject
{
	/**
	 * Document title
	 *
	 * @var    string
	 * @since  11.1
	 */
	public $title = '';

	/**
	 * Document description
	 *
	 * @var    string
	 * @since  11.1
	 */
	public $description = '';

	/**
	 * Document full URL
	 *
	 * @var    string
<<<<<<< HEAD
	 * @since   11.1
=======
	 * @since  11.1
>>>>>>> upstream/master
	 */
	public $link = '';

	/**
	 * Document base URL
	 *
	 * @var    string
	 * @since  11.1
	 */
	public $base = '';

	/**
	 * Contains the document language setting
	 *
	 * @var    string
<<<<<<< HEAD
	 * @since   11.1
=======
	 * @since  11.1
>>>>>>> upstream/master
	 */
	public $language = 'en-gb';

	/**
	 * Contains the document direction setting
	 *
	 * @var    string
	 * @since  11.1
	 */
	public $direction = 'ltr';

	/**
	 * Document generator
	 *
	 * @var    string
	 */
<<<<<<< HEAD
	public $_generator = 'Joomla! 1.6 - Open Source Content Management';
=======
	public $_generator = 'Joomla! 1.7 - Open Source Content Management';
>>>>>>> upstream/master

	/**
	 * Document modified date
	 *
	 * @var    string
	 * @since  11.1
	 */
	public $_mdate = '';

	/**
	 * Tab string
	 *
<<<<<<< HEAD
	 * @var		string
=======
	 * @var    string
	 * @since  11.1
>>>>>>> upstream/master
	 */
	public $_tab = "\11";

	/**
	 * Contains the line end string
	 *
<<<<<<< HEAD
	 * @var		string
=======
	 * @var    string
	 * @since  11.1
>>>>>>> upstream/master
	 */
	public $_lineEnd = "\12";

	/**
	 * Contains the character encoding string
	 *
<<<<<<< HEAD
	 * @var	string
=======
	 * @var    string
	 * @since  11.1
>>>>>>> upstream/master
	 */
	public $_charset = 'utf-8';

	/**
	 * Document mime type
	 *
<<<<<<< HEAD
	 * @var		string
=======
	 * @var    string
	 * @since  11.1
>>>>>>> upstream/master
	 */
	public $_mime = '';

	/**
	 * Document namespace
	 *
<<<<<<< HEAD
	 * @var		string
=======
	 * @var    string
	 * @since  11.1
>>>>>>> upstream/master
	 */
	public $_namespace = '';

	/**
	 * Document profile
	 *
<<<<<<< HEAD
	 * @var		string
=======
	 * @var    string
	 * @since  11.1
>>>>>>> upstream/master
	 */
	public $_profile = '';

	/**
	 * Array of linked scripts
	 *
<<<<<<< HEAD
	 * @var		array
=======
	 * @var    array
	 * @since  11.1
>>>>>>> upstream/master
	 */
	public $_scripts = array();

	/**
	 * Array of scripts placed in the header
	 *
<<<<<<< HEAD
	 * @var  array
=======
	 * @var    array
	 * @since  11.1
>>>>>>> upstream/master
	 */
	public $_script = array();

	/**
	 * Array of linked style sheets
	 *
<<<<<<< HEAD
	 * @var	array
=======
	 * @var    array
	 * @since  11.1
>>>>>>> upstream/master
	 */
	public $_styleSheets = array();

	/**
	 * Array of included style declarations
	 *
<<<<<<< HEAD
	 * @var	array
=======
	 * @var    array
	 * @since  11.1
>>>>>>> upstream/master
	 */
	public $_style = array();

	/**
	 * Array of meta tags
	 *
<<<<<<< HEAD
	 * @var	array
=======
	 * @var    array
	 * @since  11.1
>>>>>>> upstream/master
	 */
	public $_metaTags = array();

	/**
	 * The rendering engine
	 *
<<<<<<< HEAD
	 * @var	object
=======
	 * @var    object
	 * @since  11.1
>>>>>>> upstream/master
	 */
	public $_engine = null;

	/**
	 * The document type
	 *
	 * @var    string
	 * @since  11.1
	 */
	public $_type = null;

	/**
	 * Array of buffered output
	 *
	 * @var    mixed (depends on the renderer)
<<<<<<< HEAD
=======
	 * @since  11.1
>>>>>>> upstream/master
	 */
	public static $_buffer = null;

	/**
	 * Class constructor.
	 *
	 * @param   array  $options  Associative array of options
	 *
	 * @return  JDocument
	 *
	 * @since   11.1
	 */
	public function __construct($options = array())
	{
		parent::__construct();

<<<<<<< HEAD
		if (array_key_exists('lineend', $options)) {
			$this->setLineEnd($options['lineend']);
		}

		if (array_key_exists('charset', $options)) {
			$this->setCharset($options['charset']);
		}

		if (array_key_exists('language', $options)) {
			$this->setLanguage($options['language']);
		}

		if (array_key_exists('direction', $options)) {
			$this->setDirection($options['direction']);
		}

		if (array_key_exists('tab', $options)) {
			$this->setTab($options['tab']);
		}

		if (array_key_exists('link', $options)) {
			$this->setLink($options['link']);
		}

		if (array_key_exists('base', $options)) {
=======
		if (array_key_exists('lineend', $options))
		{
			$this->setLineEnd($options['lineend']);
		}

		if (array_key_exists('charset', $options))
		{
			$this->setCharset($options['charset']);
		}

		if (array_key_exists('language', $options))
		{
			$this->setLanguage($options['language']);
		}

		if (array_key_exists('direction', $options))
		{
			$this->setDirection($options['direction']);
		}

		if (array_key_exists('tab', $options))
		{
			$this->setTab($options['tab']);
		}

		if (array_key_exists('link', $options))
		{
			$this->setLink($options['link']);
		}

		if (array_key_exists('base', $options))
		{
>>>>>>> upstream/master
			$this->setBase($options['base']);
		}
	}

	/**
	 * Returns the global JDocument object, only creating it
	 * if it doesn't already exist.
	 *
<<<<<<< HEAD
	 * @param   string  $type       The document type to instantiate
	 * @param   array   $attribues  Array of attributes
	 *
	 * @return  object  The document object.
=======
	 * @param   string  $type        The document type to instantiate
	 * @param   array   $attributes  Array of attributes
	 *
	 * @return  object  The document object.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function getInstance($type = 'html', $attributes = array())
	{
		static $instances;

<<<<<<< HEAD
		if (!isset($instances)) {
=======
		if (!isset($instances))
		{
>>>>>>> upstream/master
			$instances = array();
		}

		$signature = serialize(array($type, $attributes));

<<<<<<< HEAD
		if (empty($instances[$signature])) {
			$type	= preg_replace('/[^A-Z0-9_\.-]/i', '', $type);
			$path	= dirname(__FILE__).DS.$type.DS.$type.'.php';
			$ntype	= null;

			// Check if the document type exists
			if (!file_exists($path)) {
				// Default to the raw format
				$ntype	= $type;
				$type	= 'raw';
			}

			// Determine the path and class
			$class = 'JDocument'.$type;
			if (!class_exists($class)) {
				$path	= dirname(__FILE__).DS.$type.DS.$type.'.php';
				if (file_exists($path)) {
					require_once $path;
				}
				else {
					JError::raiseError(500,JText::_('JLIB_DOCUMENT_ERROR_UNABLE_LOAD_DOC_CLASS'));
				}
			}

			$instance	= new $class($attributes);
			$instances[$signature] = &$instance;

			if (!is_null($ntype)) {
=======
		if (empty($instances[$signature]))
		{
			$type = preg_replace('/[^A-Z0-9_\.-]/i', '', $type);
			$path = dirname(__FILE__) . '/' . $type . '/' . $type . '.php';
			$ntype = null;

			// Check if the document type exists
			if (!file_exists($path))
			{
				// Default to the raw format
				$ntype = $type;
				$type = 'raw';
			}

			// Determine the path and class
			$class = 'JDocument' . $type;
			if (!class_exists($class))
			{
				$path = dirname(__FILE__) . '/' . $type . '/' . $type . '.php';
				if (file_exists($path))
				{
					require_once $path;
				}
				else
				{
					JError::raiseError(500, JText::_('JLIB_DOCUMENT_ERROR_UNABLE_LOAD_DOC_CLASS'));
				}
			}

			$instance = new $class($attributes);
			$instances[$signature] = &$instance;

			if (!is_null($ntype))
			{
>>>>>>> upstream/master
				// Set the type to the Document type originally requested
				$instance->setType($ntype);
			}
		}

		return $instances[$signature];
	}

	/**
	 * Set the document type
	 *
<<<<<<< HEAD
	 * @param   string  $type
	 *
	 * @return
=======
	 * @param   string  $type  Type document is to set to
	 *
	 * @return  JDocument instance of $this to allow chaining
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function setType($type)
	{
		$this->_type = $type;
<<<<<<< HEAD
=======

		return $this;
>>>>>>> upstream/master
	}

	/**
	 * Returns the document type
	 *
	 * @return  string
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function getType()
	{
		return $this->_type;
	}

	/**
	 * Get the contents of the document buffer
	 *
	 * @return  The contents of the document buffer
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function getBuffer()
	{
		return self::$_buffer;
	}

	/**
	 * Set the contents of the document buffer
	 *
	 * @param   string  $content  The content to be set in the buffer.
	 * @param   array   $options  Array of optional elements.
	 *
<<<<<<< HEAD
	 * @return  void
=======
	 * @return  JDocument instance of $this to allow chaining
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function setBuffer($content, $options = array())
	{
		self::$_buffer = $content;
<<<<<<< HEAD
=======

		return $this;
>>>>>>> upstream/master
	}

	/**
	 * Gets a meta tag.
	 *
<<<<<<< HEAD
	 * @param   string  $name        Value of name or http-equiv tag
	 * @param   bool    $http_equiv  META type "http-equiv" defaults to null
	 *
	 * @return  string
	 * @since   11.1
	 */
	public function getMetaData($name, $http_equiv = false)
	{
		$result = '';
		$name = strtolower($name);
		if ($name == 'generator') {
			$result = $this->getGenerator();
		}
		else if ($name == 'description') {
			$result = $this->getDescription();
		}
		else {
			if ($http_equiv == true) {
				$result = @$this->_metaTags['http-equiv'][$name];
			}
			else {
=======
	 * @param   string   $name       Value of name or http-equiv tag
	 * @param   boolean  $httpEquiv  META type "http-equiv" defaults to null
	 *
	 * @return  string
	 *
	 * @since   11.1
	 */
	public function getMetaData($name, $httpEquiv = false)
	{
		$result = '';
		$name = strtolower($name);
		if ($name == 'generator')
		{
			$result = $this->getGenerator();
		}
		else if ($name == 'description')
		{
			$result = $this->getDescription();
		}
		else
		{
			if ($httpEquiv == true)
			{
				$result = @$this->_metaTags['http-equiv'][$name];
			}
			else
			{
>>>>>>> upstream/master
				$result = @$this->_metaTags['standard'][$name];
			}
		}

		return $result;
	}

	/**
	 * Sets or alters a meta tag.
	 *
	 * @param   string   $name        Value of name or http-equiv tag
	 * @param   string   $content     Value of the content tag
<<<<<<< HEAD
	 * @param   bool     $http_equiv  META type "http-equiv" defaults to null
	 * @param   bool     $sync        Should http-equiv="content-type" by synced with HTTP-header?
	 *
	 * @return  void
=======
	 * @param   boolean  $http_equiv  META type "http-equiv" defaults to null
	 * @param   boolean  $sync        Should http-equiv="content-type" by synced with HTTP-header?
	 *
	 * @return  JDocument instance of $this to allow chaining
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function setMetaData($name, $content, $http_equiv = false, $sync = true)
	{
		$name = strtolower($name);

<<<<<<< HEAD
		if ($name == 'generator') {
			$this->setGenerator($content);
		}
		else if ($name == 'description') {
			$this->setDescription($content);
		}
		else {
			if ($http_equiv == true) {
				$this->_metaTags['http-equiv'][$name] = $content;

				// Syncing with HTTP-header
				if($sync && strtolower($name) == 'content-type') {
					$this->setMimeEncoding($content, false);
				}
			}
			else {
				$this->_metaTags['standard'][$name] = $content;
			}
		}
=======
		if ($name == 'generator')
		{
			$this->setGenerator($content);
		}
		else if ($name == 'description')
		{
			$this->setDescription($content);
		}
		else
		{
			if ($http_equiv == true)
			{
				$this->_metaTags['http-equiv'][$name] = $content;

				// Syncing with HTTP-header
				if ($sync && strtolower($name) == 'content-type')
				{
					$this->setMimeEncoding($content, false);
				}
			}
			else
			{
				$this->_metaTags['standard'][$name] = $content;
			}
		}

		return $this;
>>>>>>> upstream/master
	}

	/**
	 * Adds a linked script to the page
	 *
<<<<<<< HEAD
	 * @param   string  $url		URL to the linked script
	 * @param   string  $type		Type of script. Defaults to 'text/javascript'
	 * @param   bool    $defer		Adds the defer attribute.
	 * @param   bool    $async		Adds the async attribute.
	 * @return
	 * @since    11.1
=======
	 * @param   string   $url    URL to the linked script
	 * @param   string   $type   Type of script. Defaults to 'text/javascript'
	 * @param   boolean  $defer  Adds the defer attribute.
	 * @param   boolean  $async  Adds the async attribute.
	 *
	 * @return  JDocument instance of $this to allow chaining
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function addScript($url, $type = "text/javascript", $defer = false, $async = false)
	{
		$this->_scripts[$url]['mime'] = $type;
		$this->_scripts[$url]['defer'] = $defer;
		$this->_scripts[$url]['async'] = $async;
<<<<<<< HEAD
=======

		return $this;
>>>>>>> upstream/master
	}

	/**
	 * Adds a script to the page
	 *
<<<<<<< HEAD
	 * @param   string  $content	Script
	 * @param   string  $type	Scripting mime (defaults to 'text/javascript')
	 *
	 * @return  void
	 * @since    11.1
	 */
	public function addScriptDeclaration($content, $type = 'text/javascript')
	{
		if (!isset($this->_script[strtolower($type)])) {
			$this->_script[strtolower($type)] = $content;
		}
		else {
			$this->_script[strtolower($type)] .= chr(13).$content;
		}
=======
	 * @param   string  $content  Script
	 * @param   string  $type     Scripting mime (defaults to 'text/javascript')
	 *
	 * @return  JDocument instance of $this to allow chaining
	 *
	 * @since   11.1
	 */
	public function addScriptDeclaration($content, $type = 'text/javascript')
	{
		if (!isset($this->_script[strtolower($type)]))
		{
			$this->_script[strtolower($type)] = $content;
		}
		else
		{
			$this->_script[strtolower($type)] .= chr(13) . $content;
		}

		return $this;
>>>>>>> upstream/master
	}

	/**
	 * Adds a linked stylesheet to the page
	 *
	 * @param   string  $url      URL to the linked style sheet
	 * @param   string  $type     Mime encoding type
	 * @param   string  $media    Media type that this stylesheet applies to
	 * @param   array   $attribs  Array of attributes
	 *
<<<<<<< HEAD
	 * @return  void
	 * @since    11.1
	 */
	public function addStyleSheet($url, $type = 'text/css', $media = null, $attribs = array())
	{
		$this->_styleSheets[$url]['mime']		= $type;
		$this->_styleSheets[$url]['media']		= $media;
		$this->_styleSheets[$url]['attribs']	= $attribs;
=======
	 * @return  JDocument instance of $this to allow chaining
	 *
	 * @since   11.1
	 */
	public function addStyleSheet($url, $type = 'text/css', $media = null, $attribs = array())
	{
		$this->_styleSheets[$url]['mime'] = $type;
		$this->_styleSheets[$url]['media'] = $media;
		$this->_styleSheets[$url]['attribs'] = $attribs;

		return $this;
>>>>>>> upstream/master
	}

	/**
	 * Adds a stylesheet declaration to the page
	 *
<<<<<<< HEAD
	 * @param	string  $content  Style declarations
	 * @param	string  $type     Type of stylesheet (defaults to 'text/css')
	 *
	 * @return	void
	 */
	public function addStyleDeclaration($content, $type = 'text/css')
	{
		if (!isset($this->_style[strtolower($type)])) {
			$this->_style[strtolower($type)] = $content;
		}
		else {
			$this->_style[strtolower($type)] .= chr(13).$content;
		}
=======
	 * @param   string  $content  Style declarations
	 * @param   string  $type     Type of stylesheet (defaults to 'text/css')
	 *
	 * @return  JDocument instance of $this to allow chaining
	 *
	 * @since   11.1
	 */
	public function addStyleDeclaration($content, $type = 'text/css')
	{
		if (!isset($this->_style[strtolower($type)]))
		{
			$this->_style[strtolower($type)] = $content;
		}
		else
		{
			$this->_style[strtolower($type)] .= chr(13) . $content;
		}

		return $this;
>>>>>>> upstream/master
	}

	/**
	 * Sets the document charset
	 *
<<<<<<< HEAD
	 * @param	string  $type  Charset encoding string
	 *
	 * @return  void
=======
	 * @param   string  $type  Charset encoding string
	 *
	 * @return  JDocument instance of $this to allow chaining
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function setCharset($type = 'utf-8')
	{
		$this->_charset = $type;
<<<<<<< HEAD
=======

		return $this;
>>>>>>> upstream/master
	}

	/**
	 * Returns the document charset encoding.
	 *
<<<<<<< HEAD
	 * @return string
=======
	 * @return  string
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function getCharset()
	{
		return $this->_charset;
	}

	/**
	 * Sets the global document language declaration. Default is English (en-gb).
	 *
<<<<<<< HEAD
	 * @param	string	$lang
=======
	 * @param   string  $lang  The language to be set
	 *
	 * @return  JDocument instance of $this to allow chaining
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function setLanguage($lang = "en-gb")
	{
		$this->language = strtolower($lang);
<<<<<<< HEAD
=======

		return $this;
>>>>>>> upstream/master
	}

	/**
	 * Returns the document language.
	 *
<<<<<<< HEAD
	 * @return string
=======
	 * @return  string
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function getLanguage()
	{
		return $this->language;
	}

	/**
	 * Sets the global document direction declaration. Default is left-to-right (ltr).
	 *
<<<<<<< HEAD
	 * @param	string	$lang
=======
	 * @param   string  $dir  The language direction to be set
	 *
	 * @return  JDocument instance of $this to allow chaining
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function setDirection($dir = "ltr")
	{
		$this->direction = strtolower($dir);
<<<<<<< HEAD
=======

		return $this;
>>>>>>> upstream/master
	}

	/**
	 * Returns the document direction declaration.
	 *
<<<<<<< HEAD
	 * @return string
	 *
=======
	 * @return  string
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function getDirection()
	{
		return $this->direction;
	}

	/**
	 * Sets the title of the document
	 *
<<<<<<< HEAD
	 * @param	string	$title
	 *
=======
	 * @param   string  $title  The title to be set
	 *
	 * @return  JDocument instance of $this to allow chaining
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function setTitle($title)
	{
		$this->title = $title;
<<<<<<< HEAD
=======

		return $this;
>>>>>>> upstream/master
	}

	/**
	 * Return the title of the document.
	 *
<<<<<<< HEAD
	 * @return	string
=======
	 * @return  string
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * Sets the base URI of the document
	 *
<<<<<<< HEAD
	 * @param	string	$base
	 *
=======
	 * @param   string  $base  The base URI to be set
	 *
	 * @return  JDocument instance of $this to allow chaining
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function setBase($base)
	{
		$this->base = $base;
<<<<<<< HEAD
=======

		return $this;
>>>>>>> upstream/master
	}

	/**
	 * Return the base URI of the document.
	 *
<<<<<<< HEAD
	 * @return	string
	 *
=======
	 * @return  string
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function getBase()
	{
		return $this->base;
	}

	/**
	 * Sets the description of the document
	 *
<<<<<<< HEAD
	 * @param	string	$title
	 *
=======
	 * @param   string  $description  The description to set
	 *
	 * @return  JDocument instance of $this to allow chaining
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function setDescription($description)
	{
		$this->description = $description;
<<<<<<< HEAD
=======

		return $this;
>>>>>>> upstream/master
	}

	/**
	 * Return the title of the page.
	 *
<<<<<<< HEAD
	 * @return	string
	 *
=======
	 * @return  string
	 *
	 * @since    11.1
>>>>>>> upstream/master
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * Sets the document link
	 *
<<<<<<< HEAD
	 * @param	string	$url  A url
	 *
	 * @return  void
=======
	 * @param   string  $url  A url
	 *
	 * @return  JDocument instance of $this to allow chaining
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function setLink($url)
	{
		$this->link = $url;
<<<<<<< HEAD
=======

		return $this;
>>>>>>> upstream/master
	}

	/**
	 * Returns the document base url
	 *
	 * @return string
<<<<<<< HEAD
=======
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function getLink()
	{
		return $this->link;
	}

	/**
	 * Sets the document generator
	 *
<<<<<<< HEAD
	 * @param	string
	 * @return  void
=======
	 * @param   string  $generator  The generator to be set
	 *
	 * @return  JDocument instance of $this to allow chaining
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function setGenerator($generator)
	{
		$this->_generator = $generator;
<<<<<<< HEAD
=======

		return $this;
>>>>>>> upstream/master
	}

	/**
	 * Returns the document generator
	 *
<<<<<<< HEAD
	 * @return string
=======
	 * @return  string
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function getGenerator()
	{
		return $this->_generator;
	}

	/**
	 * Sets the document modified date
	 *
<<<<<<< HEAD
	 * @param	string
	 *
	 * @return  void
=======
	 * @param   string  $date  The date to be set
	 *
	 * @return  JDocument instance of $this to allow chaining
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function setModifiedDate($date)
	{
		$this->_mdate = $date;
<<<<<<< HEAD
=======

		return $this;
>>>>>>> upstream/master
	}

	/**
	 * Returns the document modified date
	 *
<<<<<<< HEAD
	 * @return string
=======
	 * @return  string
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function getModifiedDate()
	{
		return $this->_mdate;
	}

	/**
	 * Sets the document MIME encoding that is sent to the browser.
	 *
	 * This usually will be text/html because most browsers cannot yet
	 * accept the proper mime settings for XHTML: application/xhtml+xml
	 * and to a lesser extent application/xml and text/xml. See the W3C note
	 * ({@link http://www.w3.org/TR/xhtml-media-types/
	 * http://www.w3.org/TR/xhtml-media-types/}) for more details.
	 *
<<<<<<< HEAD
	 * @param	string  $type
	 * @param	bool    $sync  Should the type be synced with HTML?
	 *
	 * @return	void
=======
	 * @param   string   $type  The document type to be sent
	 * @param   boolean  $sync  Should the type be synced with HTML?
	 *
	 * @return  JDocument instance of $this to allow chaining
	 *
	 * @since   11.1
	 *
	 * @link    http://www.w3.org/TR/xhtml-media-types
>>>>>>> upstream/master
	 */
	public function setMimeEncoding($type = 'text/html', $sync = true)
	{
		$this->_mime = strtolower($type);

		// Syncing with meta-data
<<<<<<< HEAD
		if ($sync) {
			$this->setMetaData('content-type', $type, true, false);
		}
=======
		if ($sync)
		{
			$this->setMetaData('content-type', $type, true, false);
		}

		return $this;
>>>>>>> upstream/master
	}

	/**
	 * Return the document MIME encoding that is sent to the browser.
	 *
<<<<<<< HEAD
	 * @return	string
=======
	 * @return  string
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function getMimeEncoding()
	{
		return $this->_mime;
	}

	/**
	 * Sets the line end style to Windows, Mac, Unix or a custom string.
	 *
<<<<<<< HEAD
	 * @param	string  $style  "win", "mac", "unix" or custom string.
	 * @return  void
=======
	 * @param   string  $style  "win", "mac", "unix" or custom string.
	 *
	 * @return  JDocument instance of $this to allow chaining
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function setLineEnd($style)
	{
		switch ($style)
		{
			case 'win':
				$this->_lineEnd = "\15\12";
				break;
			case 'unix':
				$this->_lineEnd = "\12";
				break;
			case 'mac':
				$this->_lineEnd = "\15";
				break;
			default:
				$this->_lineEnd = $style;
		}
<<<<<<< HEAD
=======

		return $this;
>>>>>>> upstream/master
	}

	/**
	 * Returns the lineEnd
	 *
<<<<<<< HEAD
	 * @return	string
=======
	 * @return  string
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function _getLineEnd()
	{
		return $this->_lineEnd;
	}

	/**
	 * Sets the string used to indent HTML
	 *
<<<<<<< HEAD
	 * @param	string  $string  String used to indent ("\11", "\t", '  ', etc.).
	 *
	 * @return	void
=======
	 * @param   string  $string  String used to indent ("\11", "\t", '  ', etc.).
	 *
	 * @return  JDocument instance of $this to allow chaining
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function setTab($string)
	{
		$this->_tab = $string;
<<<<<<< HEAD
=======

		return $this;
>>>>>>> upstream/master
	}

	/**
	 * Returns a string containing the unit for indenting HTML
	 *
<<<<<<< HEAD
	 * @return	string
=======
	 * @return  string
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function _getTab()
	{
		return $this->_tab;
	}

	/**
<<<<<<< HEAD
	* Load a renderer
	*
	* @param   string  $type  The renderer type
	*
	* @return  mixed  Object or null if class does not exist
	* @since   11.1
	*/
	public function loadRenderer($type)
	{
		$class	= 'JDocumentRenderer'.$type;

		if (!class_exists($class)) {
			$path = dirname(__FILE__).DS.$this->_type.DS.'renderer'.DS.$type.'.php';

			if (file_exists($path)) {
				require_once $path;
			}
			else {
				JError::raiseError(500,JText::_('Unable to load renderer class'));
			}
		}

		if (!class_exists($class)) {
=======
	 * Load a renderer
	 *
	 * @param   string  $type  The renderer type
	 *
	 * @return  mixed   Object or null if class does not exist
	 *
	 * @since   11.1
	 */
	public function loadRenderer($type)
	{
		$class = 'JDocumentRenderer' . $type;

		if (!class_exists($class))
		{
			$path = dirname(__FILE__) . '/' . $this->_type . '/renderer/' . $type . '.php';

			if (file_exists($path))
			{
				require_once $path;
			}
			else
			{
				JError::raiseError(500, JText::_('Unable to load renderer class'));
			}
		}

		if (!class_exists($class))
		{
>>>>>>> upstream/master
			return null;
		}

		$instance = new $class($this);

		return $instance;
	}

	/**
	 * Parses the document and prepares the buffers
	 *
<<<<<<< HEAD
	 * @return null
	 */
	public function parse($params = array())
	{
		return null;
=======
	 * @param   array  $params  The array of parameters
	 *
	 * @return  JDocument instance of $this to allow chaining
	 *
	 * @since   11.1
	 */
	public function parse($params = array())
	{
		return $this;
>>>>>>> upstream/master
	}

	/**
	 * Outputs the document
	 *
<<<<<<< HEAD
	 * @param boolean	$cache		If true, cache the output
	 * @param boolean	$compress	If true, compress the output
	 * @param array		$params		Associative array of attributes
	 *
	 * @return	The rendered data
	 */
	public function render($cache = false, $params = array())
	{
		if ($mdate = $this->getModifiedDate()) {
			JResponse::setHeader('Last-Modified', $mdate /* gmdate('D, d M Y H:i:s', time() + 900) . ' GMT' */);
		}

		JResponse::setHeader('Content-Type', $this->_mime .  '; charset=' . $this->_charset);
	}
}
=======
	 * @param   boolean  $cache   If true, cache the output
	 * @param   array    $params  Associative array of attributes
	 *
	 * @return  The rendered data
	 *
	 * @since   11.1
	 */
	public function render($cache = false, $params = array())
	{
		if ($mdate = $this->getModifiedDate())
		{
			JResponse::setHeader('Last-Modified', $mdate /* gmdate('D, d M Y H:i:s', time() + 900) . ' GMT' */);
		}

		JResponse::setHeader('Content-Type', $this->_mime . '; charset=' . $this->_charset);
	}
}
>>>>>>> upstream/master
