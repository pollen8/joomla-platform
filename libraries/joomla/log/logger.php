<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Log
 *
 * @copyright   Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

<<<<<<< HEAD
defined('JPATH_PLATFORM') or die;
=======
defined('JPATH_PLATFORM') or die();
>>>>>>> upstream/master

jimport('joomla.log.logentry');

/**
 * Joomla! Logger Base Class
 *
 * This class is used to be the basis of logger classes to allow for defined functions
 * to exist regardless of the child class.
 *
 * @package     Joomla.Platform
 * @subpackage  Log
 * @since       11.1
 */
abstract class JLogger
{
	/**
<<<<<<< HEAD
	 * @var    array  Options array for the JLog instance.
=======
	 * Options array for the JLog instance.
	 * @var    array
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $options = array();

	/**
	 * Constructor.
	 *
<<<<<<< HEAD
	 * @param   array  $options  Log object options.
=======
	 * @param   array  &$options  Log object options.
>>>>>>> upstream/master
	 *
	 * @return  void
	 *
	 * @since   11.1
	 */
<<<<<<< HEAD
	public function __construct(array & $options)
=======
	public function __construct(array &$options)
>>>>>>> upstream/master
	{
		// Set the options for the class.
		$this->options = & $options;
	}

	/**
	 * Method to add an entry to the log.
	 *
<<<<<<< HEAD
	 * @param   JLogEntry  The log entry object to add to the log.
=======
	 * @param   JLogEntry  $entry  The log entry object to add to the log.
>>>>>>> upstream/master
	 *
	 * @return  void
	 *
	 * @since   11.1
	 */
	abstract public function addEntry(JLogEntry $entry);
}
