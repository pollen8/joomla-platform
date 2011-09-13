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
=======
defined('JPATH_PLATFORM') or die();

jimport('joomla.document.document');
>>>>>>> upstream/master

/**
 * DocumentError class, provides an easy interface to parse and display an error page
 *
 * @package     Joomla.Platform
 * @subpackage  Document
 * @since       11.1
 */
<<<<<<< HEAD

jimport('joomla.document.document');

=======
>>>>>>> upstream/master
class JDocumentError extends JDocument
{
	/**
	 * Error Object
<<<<<<< HEAD
	 * @var	object
=======
	 *
	 * @var    object
	 * @since  11.1
>>>>>>> upstream/master
	 */
	var $_error;

	/**
	 * Class constructor
	 *
<<<<<<< HEAD
	 * @param   string  $type        (either HTML or text)
	 * @param   array   $attributes  Associative array of attributes
=======
	 * @param   array  $options  Associative array of attributes
	 *
	 * @return  JDocumentError
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function __construct($options = array())
	{
		parent::__construct($options);

		//set mime type
		$this->_mime = 'text/html';

		//set document type
		$this->_type = 'error';
	}

	/**
	 * Set error object
	 *
<<<<<<< HEAD
	 * @param   object  $error	Error object to set
	 *
	 * @return  boolean  True on success
=======
	 * @param   object  $error  Error object to set
	 *
	 * @return  boolean  True on success
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function setError($error)
	{
<<<<<<< HEAD
		if (JError::isError($error)) {
			$this->_error = & $error;
			return true;
		} else {
=======
		if (JError::isError($error))
		{
			$this->_error = & $error;
			return true;
		}
		else
		{
>>>>>>> upstream/master
			return false;
		}
	}

	/**
	 * Render the document
	 *
<<<<<<< HEAD
	 * @param   boolean  $cache		If true, cache the output
	 * @param   array    $params		Associative array of attributes
=======
	 * @param   boolean  $cache   If true, cache the output
	 * @param   array    $params  Associative array of attributes
	 *
	 * @return  string   The rendered data
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function render($cache = false, $params = array())
	{
		// If no error object is set return null
<<<<<<< HEAD
		if (!isset($this->_error)) {
=======
		if (!isset($this->_error))
		{
>>>>>>> upstream/master
			return;
		}

		//Set the status header
<<<<<<< HEAD
		JResponse::setHeader('status', $this->_error->getCode().' '.str_replace("\n", ' ', $this->_error->getMessage()));
		$file = 'error.php';

		// check template
		$directory	= isset($params['directory']) ? $params['directory'] : 'templates';
		$template	= isset($params['template']) ? JFilterInput::getInstance()->clean($params['template'], 'cmd') : 'system';

		if (!file_exists($directory.DS.$template.DS.$file)) {
=======
		JResponse::setHeader('status', $this->_error->getCode() . ' ' . str_replace("\n", ' ', $this->_error->getMessage()));
		$file = 'error.php';

		// check template
		$directory = isset($params['directory']) ? $params['directory'] : 'templates';
		$template = isset($params['template']) ? JFilterInput::getInstance()->clean($params['template'], 'cmd') : 'system';

		if (!file_exists($directory . '/' . $template . '/' . $file))
		{
>>>>>>> upstream/master
			$template = 'system';
		}

		//set variables
<<<<<<< HEAD
		$this->baseurl  = JURI::base(true);
		$this->template = $template;
		$this->debug	= isset($params['debug']) ? $params['debug'] : false;
		$this->error	= $this->_error;

		// load
		$data = $this->_loadTemplate($directory.DS.$template, $file);
=======
		$this->baseurl = JURI::base(true);
		$this->template = $template;
		$this->debug = isset($params['debug']) ? $params['debug'] : false;
		$this->error = $this->_error;

		// load
		$data = $this->_loadTemplate($directory . '/' . $template, $file);
>>>>>>> upstream/master

		parent::render();
		return $data;
	}

	/**
	 * Load a template file
	 *
<<<<<<< HEAD
	 * @param   string  $template	The name of the template
	 * @param   string  $filename	The actual filename
	 *
	 * @return  string  The contents of the template
=======
	 * @param   string  $directory  The name of the template
	 * @param   string  $filename   The actual filename
	 *
	 * @return  string  The contents of the template
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	function _loadTemplate($directory, $filename)
	{
		$contents = '';

		// Check to see if we have a valid template file
<<<<<<< HEAD
		if (file_exists($directory.DS.$filename))
		{
			// Store the file path
			$this->_file = $directory.DS.$filename;

			// Get the file content
			ob_start();
			require_once $directory.DS.$filename;
=======
		if (file_exists($directory . '/' . $filename))
		{
			// Store the file path
			$this->_file = $directory . '/' . $filename;

			// Get the file content
			ob_start();
			require_once $directory . '/' . $filename;
>>>>>>> upstream/master
			$contents = ob_get_contents();
			ob_end_clean();
		}

		return $contents;
	}

<<<<<<< HEAD
	function renderBacktrace()
	{
		$contents	= null;
		$backtrace	= $this->_error->getTrace();
		if (is_array($backtrace))
		{
			ob_start();
			$j	=	1;
			echo	'<table cellpadding="0" cellspacing="0" class="Table">';
			echo	'	<tr>';
			echo	'		<td colspan="3" class="TD"><strong>Call stack</strong></td>';
			echo	'	</tr>';
			echo	'	<tr>';
			echo	'		<td class="TD"><strong>#</strong></td>';
			echo	'		<td class="TD"><strong>Function</strong></td>';
			echo	'		<td class="TD"><strong>Location</strong></td>';
			echo	'	</tr>';
			for ($i = count($backtrace)-1; $i >= 0 ; $i--)
			{
				echo	'	<tr>';
				echo	'		<td class="TD">'.$j.'</td>';
				if (isset($backtrace[$i]['class'])) {
					echo	'	<td class="TD">'.$backtrace[$i]['class'].$backtrace[$i]['type'].$backtrace[$i]['function'].'()</td>';
				} else {
					echo	'	<td class="TD">'.$backtrace[$i]['function'].'()</td>';
				}
				if (isset($backtrace[$i]['file'])) {
					echo	'		<td class="TD">'.$backtrace[$i]['file'].':'.$backtrace[$i]['line'].'</td>';
				} else {
					echo	'		<td class="TD">&#160;</td>';
				}
				echo	'	</tr>';
				$j++;
			}
			echo	'</table>';
=======
	/**
	 * Render the backtrace
	 *
	 * @return  string  The contents of the backtrace
	 *
	 * @since   11.1
	 */
	function renderBacktrace()
	{
		$contents = null;
		$backtrace = $this->_error->getTrace();
		if (is_array($backtrace))
		{
			ob_start();
			$j = 1;
			echo '<table cellpadding="0" cellspacing="0" class="Table">';
			echo '	<tr>';
			echo '		<td colspan="3" class="TD"><strong>Call stack</strong></td>';
			echo '	</tr>';
			echo '	<tr>';
			echo '		<td class="TD"><strong>#</strong></td>';
			echo '		<td class="TD"><strong>Function</strong></td>';
			echo '		<td class="TD"><strong>Location</strong></td>';
			echo '	</tr>';
			for ($i = count($backtrace) - 1; $i >= 0; $i--)
			{
				echo '	<tr>';
				echo '		<td class="TD">' . $j . '</td>';
				if (isset($backtrace[$i]['class']))
				{
					echo '	<td class="TD">' . $backtrace[$i]['class'] . $backtrace[$i]['type'] . $backtrace[$i]['function'] . '()</td>';
				}
				else
				{
					echo '	<td class="TD">' . $backtrace[$i]['function'] . '()</td>';
				}
				if (isset($backtrace[$i]['file']))
				{
					echo '		<td class="TD">' . $backtrace[$i]['file'] . ':' . $backtrace[$i]['line'] . '</td>';
				}
				else
				{
					echo '		<td class="TD">&#160;</td>';
				}
				echo '	</tr>';
				$j++;
			}
			echo '</table>';
>>>>>>> upstream/master
			$contents = ob_get_contents();
			ob_end_clean();
		}
		return $contents;
	}
}
