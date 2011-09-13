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

jimport('joomla.document.document');
>>>>>>> upstream/master

/**
 * DocumentRAW class, provides an easy interface to parse and display raw output
 *
 * @package     Joomla.Platform
 * @subpackage  Document
 * @since       11.1
 */
<<<<<<< HEAD

jimport('joomla.document.document');

class JDocumentRAW extends JDocument
{

=======
class JDocumentRaw extends JDocument
{
>>>>>>> upstream/master
	/**
	 * Class constructor
	 *
	 * @param   array  $options  Associative array of options
<<<<<<< HEAD
=======
	 *
	 * @return  JDocumentRaw
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
		$this->_type = 'raw';
	}

	/**
	 * Render the document.
	 *
<<<<<<< HEAD
	 * @param   bool   $cache   If true, cache the output
	 * @param   array  $params  Associative array of attributes
	 *
	 * @return	The rendered data
=======
	 * @param   boolean  $cache   If true, cache the output
	 * @param   array    $params  Associative array of attributes
	 *
	 * @return  The rendered data
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function render($cache = false, $params = array())
	{
		parent::render();
		return $this->getBuffer();
	}
<<<<<<< HEAD
}
=======
}
>>>>>>> upstream/master
