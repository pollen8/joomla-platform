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
 * JDocumentJSON class, provides an easy interface to parse and display JSON output
 *
 * @package     Joomla.Platform
 * @subpackage  Document
<<<<<<< HEAD
 * @since       11.1
 */

jimport('joomla.document.document');

=======
 * @see         http://www.json.org/
 * @since       11.1
 */
>>>>>>> upstream/master
class JDocumentJSON extends JDocument
{
	/**
	 * Document name
	 *
	 * @var    string
<<<<<<< HEAD
=======
	 * @since  11.1
>>>>>>> upstream/master
	 */
	protected $_name = 'joomla';

	/**
	 * Class constructor
	 *
	 * @param   array  $options  Associative array of options
<<<<<<< HEAD
=======
	 *
	 * @return  JDocumentJson
	 *
	 * @since  11.1
>>>>>>> upstream/master
	 */
	public function __construct($options = array())
	{
		parent::__construct($options);

		//set mime type
		$this->_mime = 'application/json';

		//set document type
		$this->_type = 'json';
	}

	/**
	 * Render the document.
	 *
	 * @param   boolean  $cache   If true, cache the output
	 * @param   array    $params  Associative array of attributes
	 *
	 * @return  The rendered data
<<<<<<< HEAD
=======
	 *
	 * @since  11.1
>>>>>>> upstream/master
	 */
	public function render($cache = false, $params = array())
	{
		JResponse::allowCache(false);
<<<<<<< HEAD
		JResponse::setHeader('Content-disposition', 'attachment; filename="'.$this->getName().'.json"', true);
=======
		JResponse::setHeader('Content-disposition', 'attachment; filename="' . $this->getName() . '.json"', true);
>>>>>>> upstream/master

		parent::render();

		return $this->getBuffer();
	}

	/**
	 * Returns the document name
	 *
	 * @return  string
<<<<<<< HEAD
	 */
	public function getName() {
=======
	 *
	 * @since  11.1
	 */
	public function getName()
	{
>>>>>>> upstream/master
		return $this->_name;
	}

	/**
	 * Sets the document name
	 *
	 * @param   string  $name  Document name
<<<<<<< HEAD
	 * @return  void
	 */
	public function setName($name = 'joomla') {
		$this->_name = $name;
=======
	 *
	 * @return  JDocumentJSON instance of $this to allow chaining
	 *
	 * @since   11.1
	 */
	public function setName($name = 'joomla')
	{
		$this->_name = $name;

		return $this;
>>>>>>> upstream/master
	}
}
