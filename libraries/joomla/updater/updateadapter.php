<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Updater
 *
 * @copyright   Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('JPATH_PLATFORM') or die;

jimport('joomla.base.adapterinstance');

/**
 * UpdateAdapter class.
 *
 * @package     Joomla.Platform
<<<<<<< HEAD
 * @subpackage  Update
 * @since       11.1
 */

class JUpdateAdapter extends JAdapterInstance {
	protected $xml_parser;
	protected $_stack = Array('base');
	protected $_update_site_id = 0;
	protected $_updatecols = Array('NAME', 'ELEMENT', 'TYPE', 'FOLDER', 'CLIENT', 'VERSION', 'DESCRIPTION');
=======
 * @subpackage  Updater
 * @since       11.1
 */
class JUpdateAdapter extends JAdapterInstance
{
	/**
	 * @var    string
	 * @since  11.1
	 */
	protected $xml_parser;

	/**
	 * @var    array
	 * @since 11.1
	 */
	protected $_stack = Array('base');

	/**
	 * ID of update site
	 *
	 * @var    string
	 * @since  11.1
	 */
	protected $_update_site_id = 0;

	/**
	 * Columns in the extensions table to be updated
	 *
	 * @var    array
	 * @since  11.1
	 */
	protected $_updatecols = array('NAME', 'ELEMENT', 'TYPE', 'FOLDER', 'CLIENT_ID', 'VERSION', 'DESCRIPTION');
>>>>>>> upstream/master

	/**
	 * Gets the reference to the current direct parent
	 *
	 * @return  object
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function _getStackLocation()
	{
<<<<<<< HEAD
			return implode('->', $this->_stack);
=======
		return implode('->', $this->_stack);
>>>>>>> upstream/master
	}

	/**
	 * Gets the reference to the last tag
	 *
	 * @return  object
<<<<<<< HEAD
	 * @since   11.1
	 */
	protected function _getLastTag() {
=======
	 *
	 * @since   11.1
	 */
	protected function _getLastTag()
	{
>>>>>>> upstream/master
		return $this->_stack[count($this->_stack) - 1];
	}
}
