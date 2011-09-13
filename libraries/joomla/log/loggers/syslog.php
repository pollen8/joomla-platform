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
jimport('joomla.log.logger');

/**
 * Joomla! SysLog Log class
 *
 * This class is designed to call the PHP SysLog function call which is then sent to the
 * system wide log system. For Linux/Unix based systems this is the syslog subsystem, for
 * the Windows based implementations this can be found in the Event Log. For Windows,
 * permissions may prevent PHP from properly outputting messages.
 *
 * @package     Joomla.Platform
 * @subpackage  Log
 * @since       11.1
 */
class JLoggerSysLog extends JLogger
{
	/**
	 * @var    array  Translation array for JLogEntry priorities to SysLog priority names.
	 * @since  11.1
	 */
	protected $priorities = array(
		JLog::EMERGENCY => 'EMERG',
		JLog::ALERT => 'ALERT',
		JLog::CRITICAL => 'CRIT',
		JLog::ERROR => 'ERR',
		JLog::WARNING => 'WARNING',
		JLog::NOTICE => 'NOTICE',
		JLog::INFO => 'INFO',
<<<<<<< HEAD
		JLog::DEBUG => 'DEBUG'
	);
=======
		JLog::DEBUG => 'DEBUG');
>>>>>>> upstream/master

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
		// Call the parent constructor.
		parent::__construct($options);

		// Ensure that we have an identity string for the SysLog entries.
<<<<<<< HEAD
		if (empty($this->options['sys_ident'])) {
=======
		if (empty($this->options['sys_ident']))
		{
>>>>>>> upstream/master
			$this->options['sys_ident'] = 'Joomla Platform';
		}

		// If the option to add the process id to SysLog entries is set use it, otherwise default to true.
<<<<<<< HEAD
		if (isset($this->options['sys_add_pid'])) {
			$this->options['sys_add_pid'] = (bool) $this->options['sys_add_pid'];
		}
		else {
=======
		if (isset($this->options['sys_add_pid']))
		{
			$this->options['sys_add_pid'] = (bool) $this->options['sys_add_pid'];
		}
		else
		{
>>>>>>> upstream/master
			$this->options['sys_add_pid'] = true;
		}

		// If the option to also send SysLog entries to STDERR is set use it, otherwise default to false.
<<<<<<< HEAD
		if (isset($this->options['sys_use_stderr'])) {
			$this->options['sys_use_stderr'] = (bool) $this->options['sys_use_stderr'];
		}
		else {
=======
		if (isset($this->options['sys_use_stderr']))
		{
			$this->options['sys_use_stderr'] = (bool) $this->options['sys_use_stderr'];
		}
		else
		{
>>>>>>> upstream/master
			$this->options['sys_use_stderr'] = false;
		}

		// Build the SysLog options from our log object options.
		$sysOptions = 0;
<<<<<<< HEAD
		if ($this->options['sys_add_pid']) {
			$sysOptions = $sysOptions | LOG_PID;
		}
		if ($this->options['sys_use_stderr']) {
=======
		if ($this->options['sys_add_pid'])
		{
			$sysOptions = $sysOptions | LOG_PID;
		}
		if ($this->options['sys_use_stderr'])
		{
>>>>>>> upstream/master
			$sysOptions = $sysOptions | LOG_PERROR;
		}

		// Open the SysLog connection.
		openlog((string) $this->options['sys_ident'], $sysOptions, LOG_USER);
	}

	/**
	 * Destructor.
	 *
	 * @return  void
	 *
	 * @since   11.1
	 */
	public function __destruct()
	{
		closelog();
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
	public function addEntry(JLogEntry $entry)
	{
		// Generate the value for the priority based on predefined constants.
<<<<<<< HEAD
		$priority = constant(strtoupper('LOG_'.$this->priorities[$entry->priority]));

		// Send the entry to SysLog.
		syslog($priority, '['.$entry->category.'] '.$entry->message);
=======
		$priority = constant(strtoupper('LOG_' . $this->priorities[$entry->priority]));

		// Send the entry to SysLog.
		syslog($priority, '[' . $entry->category . '] ' . $entry->message);
>>>>>>> upstream/master
	}
}
