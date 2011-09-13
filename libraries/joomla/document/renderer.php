<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Document
 *
 * @copyright   Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('JPATH_PLATFORM') or die;

/**
 * Abstract class for a renderer
 *
 * @package     Joomla.Platform
 * @subpackage  Document
 * @since       11.1
 */
class JDocumentRenderer extends JObject
{
	/**
	* Reference to the JDocument object that instantiated the renderer
	*
	* @var    object
	* @since  11.1
	*/
	protected	$_doc = null;

	/**
	 * Renderer mime type
	 *
	 * @var    string
	 * @since  11.1
	 */
	protected $_mime = "text/html";

	/**
	* Class constructor
	*
<<<<<<< HEAD
	* @param   object   $doc  A reference to the JDocument object that instantiated the renderer
=======
	* @param   object  &$doc  A reference to the JDocument object that instantiated the renderer
	*
	* @return  JDocumentRenderer
>>>>>>> upstream/master
	*
	* @since   11.1
	*/
	public function __construct(&$doc)
	{
		$this->_doc = &$doc;
	}

	/**
	 * Renders a script and returns the results as a string
	 *
<<<<<<< HEAD
	 * @param   string   $name     The name of the element to render
	 * @param   array    $array    Array of values
	 * @param   string   $content  Override the output of the renderer
	 *
	 * @return  string   The output of the script
=======
	 * @param   string  $name     The name of the element to render
	 * @param   array   $params   Array of values
	 * @param   string  $content  Override the output of the renderer
	 *
	 * @return  string  The output of the script
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function render($name, $params = null, $content = null)
	{
	}

	/**
	 * Return the content type of the renderer
	 *
	 * @return  string  The contentType
<<<<<<< HEAD
	 * @since   11.1
	 */
	function getContentType() {
=======
	 *
	 * @since   11.1
	 */
	function getContentType()
	{
>>>>>>> upstream/master
		return $this->_mime;
	}
}
