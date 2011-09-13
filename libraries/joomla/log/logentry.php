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

jimport('joomla.log.log');
jimport('joomla.utilities.date');

/**
 * Joomla! Log Entry class
 *
 * This class is designed to hold log entries for either writing to an engine, or for
 * supported engines, retrieving lists and building in memory (PHP based) search operations.
 *
 * @package     Joomla.Platform
 * @subpackage  Log
 * @since       11.1
 */
class JLogEntry
{
	/**
<<<<<<< HEAD
	 * @var    string  Application responsible for log entry.
=======
	 * Application responsible for log entry.
	 * @var    string
>>>>>>> upstream/master
	 * @since  11.1
	 */
	public $category;

	/**
<<<<<<< HEAD
	 * @var    JDate  The date the message was logged.
=======
	 * The date the message was logged.
	 * @var    JDate
>>>>>>> upstream/master
	 * @since  11.1
	 */
	public $date;

	/**
<<<<<<< HEAD
	 * @var    string  Message to be logged.
=======
	 * Message to be logged.
	 * @var    string
>>>>>>> upstream/master
	 * @since  11.1
	 */
	public $message;

	/**
<<<<<<< HEAD
	 * @var    string  The priority of the message to be logged.
	 * @since  11.1
	 * @see    $_priorities
=======
	 * The priority of the message to be logged.
	 * @var    string
	 * @since  11.1
	 * @see    $priorities
>>>>>>> upstream/master
	 */
	public $priority = JLog::INFO;

	/**
<<<<<<< HEAD
	 * @var    array  List of available log priority levels [Based on the SysLog default levels].
	 * @since  11.1
	 */
	protected $_priorities = array(
		JLog::EMERGENCY,
		JLog::ALERT,
		JLog::CRITICAL,
		JLog::ERROR,
		JLog::WARNING,
		JLog::NOTICE,
		JLog::INFO,
		JLog::DEBUG
	);
=======
	 * List of available log priority levels [Based on the SysLog default levels].
	 * @var    array
	 * @since  11.1
	 */
	protected $priorities = array(JLog::EMERGENCY, JLog::ALERT, JLog::CRITICAL, JLog::ERROR, JLog::WARNING, JLog::NOTICE, JLog::INFO, JLog::DEBUG);
>>>>>>> upstream/master

	/**
	 * Constructor
	 *
	 * @param   string  $message   The message to log.
<<<<<<< HEAD
	 * @param   string  $priority  Message priority based on {$this->_priorities}.
=======
	 * @param   string  $priority  Message priority based on {$this->priorities}.
>>>>>>> upstream/master
	 * @param   string  $category  Type of entry
	 * @param   string  $date      Date of entry (defaults to now if not specified or blank)
	 *
	 * @return  void
	 *
	 * @since   11.1
	 */
	public function __construct($message, $priority = JLog::INFO, $category = '', $date = null)
	{
		$this->message = (string) $message;

		// Sanitize the priority.
<<<<<<< HEAD
		if (!in_array($priority, $this->_priorities, true)) {
=======
		if (!in_array($priority, $this->priorities, true))
		{
>>>>>>> upstream/master
			$priority = JLog::INFO;
		}
		$this->priority = $priority;

		// Sanitize category if it exists.
<<<<<<< HEAD
		if (!empty($category)) {
=======
		if (!empty($category))
		{
>>>>>>> upstream/master
			$this->category = (string) strtolower(preg_replace('/[^A-Z0-9_\.-]/i', '', $category));
		}

		// Get the date as a JDate object.
		$this->date = new JDate($date ? $date : 'now');
	}
}
