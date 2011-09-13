<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Application
 *
 * @copyright   Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

<<<<<<< HEAD
defined('JPATH_PLATFORM') or die;
=======
defined('JPATH_PLATFORM') or die();
>>>>>>> upstream/master

jimport('joomla.application.cli');
jimport('joomla.application.applicationexception');
jimport('joomla.filesystem.folder');

/**
 * Class to turn JCli applications into daemons.  It requires CLI and PCNTL support built into PHP.
 *
 * @package     Joomla.Platform
 * @subpackage  Application
<<<<<<< HEAD
=======
 * @see         http://www.php.net/manual/en/book.pcntl.php
 * @see         http://php.net/manual/en/features.commandline.php
>>>>>>> upstream/master
 * @since       11.1
 */
class JDaemon extends JCli
{
	/**
	 * @var    array  The available POSIX signals to be caught by default.
<<<<<<< HEAD
	 * @since  11.1
	 * @see    http://php.net/manual/pcntl.constants.php
	 */
	protected static $signals = array(
		SIGHUP, SIGINT, SIGQUIT, SIGILL, SIGTRAP, SIGABRT, SIGIOT, SIGBUS, SIGFPE, SIGUSR1,
		SIGSEGV, SIGUSR2, SIGPIPE, SIGALRM, SIGTERM, SIGSTKFLT, SIGCLD, SIGCHLD, SIGCONT,
		SIGTSTP, SIGTTIN, SIGTTOU, SIGURG, SIGXCPU, SIGXFSZ, SIGVTALRM, SIGPROF, SIGWINCH,
		SIGPOLL, SIGIO, SIGPWR, SIGSYS, SIGBABY, SIG_BLOCK, SIG_UNBLOCK, SIG_SETMASK
	);

	/**
	 * @var    bool  True if the daemon is in the process of exiting.
=======
	 * @see    http://php.net/manual/pcntl.constants.php
	 * @since  11.1
	 */
	protected static $signals = array(
		SIGHUP,
		SIGINT,
		SIGQUIT,
		SIGILL,
		SIGTRAP,
		SIGABRT,
		SIGIOT,
		SIGBUS,
		SIGFPE,
		SIGUSR1,
		SIGSEGV,
		SIGUSR2,
		SIGPIPE,
		SIGALRM,
		SIGTERM,
		SIGSTKFLT,
		SIGCLD,
		SIGCHLD,
		SIGCONT,
		SIGTSTP,
		SIGTTIN,
		SIGTTOU,
		SIGURG,
		SIGXCPU,
		SIGXFSZ,
		SIGVTALRM,
		SIGPROF,
		SIGWINCH,
		SIGPOLL,
		SIGIO,
		SIGPWR,
		SIGSYS,
		SIGBABY,
		SIG_BLOCK,
		SIG_UNBLOCK,
		SIG_SETMASK);

	/**
	 * Exiting status
	 * True if the daemon is in the process of exiting.
	 *
	 * @var    boolean
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $exiting = false;

	/**
<<<<<<< HEAD
	 * @var    integer  The process id of the daemon.
=======
	 * The process id of the daemon.
	 *
	 * @var    integer
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $processId = 0;

	/**
<<<<<<< HEAD
	 * @var    bool  True if the daemon is currently running.
=======
	 * Running status
	 * True if the daemon is currently running.
	 *
	 * @var    boolean
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $running = false;

	/**
	 * Class constructor.
	 *
	 * @return  void
	 *
	 * @since   11.1
	 */
	protected function __construct()
	{
		// Verify that the process control extension for PHP is available.
<<<<<<< HEAD
		if (!defined('SIGHUP')) {
			JLog::add('The PCNTL extension for PHP is not available.', JLog::ERROR);
			throw new ApplicationException();
		}

		// Verify that POSIX support for PHP is available.
		if (!function_exists('posix_getpid')) {
			JLog::add('The POSIX extension for PHP is not available.', JLog::ERROR);
			throw new ApplicationException();
=======
		if (!defined('SIGHUP'))
		{
			JLog::add('The PCNTL extension for PHP is not available.', JLog::ERROR);
			throw new ApplicationException;
		}

		// Verify that POSIX support for PHP is available.
		if (!function_exists('posix_getpid'))
		{
			JLog::add('The POSIX extension for PHP is not available.', JLog::ERROR);
			throw new ApplicationException;
>>>>>>> upstream/master
		}

		// Call the parent constructor.
		parent::__construct();

		// Set some system limits.
<<<<<<< HEAD
		set_time_limit($this->config->get('max_execution_time', 0));
		ini_set('memory_limit',isset($config['max_memory_limit']) ? $config['max_memory_limit'] : $this->config->get('max_memory_limit', '256M'));
=======
		@set_time_limit($this->config->get('max_execution_time', 0));
		if ($this->config->get('max_memory_limit') !== null)
		{
			ini_set('memory_limit', $this->config->get('max_memory_limit', '256M'));
		}
>>>>>>> upstream/master

		// Flush content immediatly.
		ob_implicit_flush();
	}

	/**
	 * Method to handle POSIX signals.
	 *
	 * @param   integer  $signal  The recieved POSIX signal.
	 *
	 * @return  void
	 *
	 * @since   11.1
	 * @see     pcntl_signal()
	 */
	public static function signal($signal)
	{
		$app = JFactory::getApplication();

		// Log all signals sent to the daemon.
<<<<<<< HEAD
		JLog::add('Received signal: '.$signal, JLog::DEBUG);
=======
		JLog::add('Received signal: ' . $signal, JLog::DEBUG);
>>>>>>> upstream/master

		// Fire the onRecieveSignal event.
		$app->triggerEvent('onRecieveSignal', array($signal));

		switch ($signal)
		{
<<<<<<< HEAD
			case SIGTERM :
				// Handle shutdown tasks
				if ($app->running && $app->isActive()) {
					$app->shutdown();
				} else {
					$app->close();
				}
				break;
			case SIGHUP :
				// Handle restart tasks
				if ($app->running && $app->isActive()) {
					$app->shutdown(true);
				} else {
					$app->close();
				}
				break;
			case SIGCHLD :
				// A child process has died
				while (pcntl_wait($signal, WNOHANG OR WUNTRACED) > 0)
=======
			case SIGTERM:
				// Handle shutdown tasks
				if ($app->running && $app->isActive())
				{
					$app->shutdown();
				}
				else
				{
					$app->close();
				}
				break;
			case SIGHUP:
				// Handle restart tasks
				if ($app->running && $app->isActive())
				{
					$app->shutdown(true);
				}
				else
				{
					$app->close();
				}
				break;
			case SIGCHLD:
				// A child process has died
				while (pcntl_wait($signal, WNOHANG or WUNTRACED) > 0)
>>>>>>> upstream/master
				{
					usleep(1000);
				}
				break;
			case SIGCLD:
				while (($pid = pcntl_wait($signal, WNOHANG)) > 0)
				{
					$signal = pcntl_wexitstatus($signal);
				}
				break;
<<<<<<< HEAD
			default :
=======
			default:
>>>>>>> upstream/master
				break;
		}
	}

	/**
	 * Check to see if the daemon is active.  This does not assume that $this daemon is active, but
	 * only if an instance of the application is active as a daemon.
	 *
<<<<<<< HEAD
	 * @return  bool  True if daemon is active.
=======
	 * @return  boolean  True if daemon is active.
>>>>>>> upstream/master
	 *
	 * @since   11.1
	 */
	public function isActive()
	{
		// Get the process id file location for the application.
		$pidFile = $this->config->get('application_pid_file');

		// If the process id file doesn't exist then the daemon is obviously not running.
<<<<<<< HEAD
		if (!is_file($pidFile)) {
=======
		if (!is_file($pidFile))
		{
>>>>>>> upstream/master
			return false;
		}

		// Read the contents of the process id file as an integer.
		$fp = fopen($pidFile, 'r');
		$pid = fread($fp, filesize($pidFile));
		$pid = intval($pid);
		fclose($fp);

		// Check to make sure that the process id exists as a positive integer.
<<<<<<< HEAD
		if (!$pid) {
=======
		if (!$pid)
		{
>>>>>>> upstream/master
			return false;
		}

		// Check to make sure the process is active by pinging it and ensure it responds.
<<<<<<< HEAD
		if (!posix_kill($pid, 0)) {
=======
		if (!posix_kill($pid, 0))
		{
>>>>>>> upstream/master

			// No response so remove the process id file and log the situation.
			@ unlink($pidFile);
			JLog::add('The process found based on PID file was unresponsive.', JLog::WARNING);

			return false;
		}

		return true;
	}

	/**
	 * Load an object or array into the application configuration object.
	 *
	 * @param   mixed  $data  Either an array or object to be loaded into the configuration object.
	 *
	 * @return  void
	 *
	 * @since   11.1
	 */
	public function loadConfiguration($data)
	{
		// Execute the parent load method.
		parent::loadConfiguration($data);

		/*
		 * Setup some application metadata options.  This is useful if we ever want to write out startup scripts
		 * or just have some sort of information available to share about things.
		 */

		// The application author name.  This string is used in generating startup scripts and has
		// a maximum of 50 characters.
		$tmp = (string) $this->config->get('author_name', 'Joomla Platform');
		$this->config->set('author_name', (strlen($tmp) > 50) ? substr($tmp, 0, 50) : $tmp);

		// The application author email.  This string is used in generating startup scripts.
		$tmp = (string) $this->config->get('author_email', 'admin@joomla.org');
		$this->config->set('author_email', filter_var($tmp, FILTER_VALIDATE_EMAIL));

		// The application name.  This string is used in generating startup scripts.
		$tmp = (string) $this->config->get('application_name', 'JDaemon');
		$this->config->set('application_name', (string) preg_replace('/[^A-Z0-9_-]/i', '', $tmp));

		// The application description.  This string is used in generating startup scripts.
		$tmp = (string) $this->config->get('application_description', 'A generic Joomla Platform application.');
		$this->config->set('application_description', filter_var($tmp, FILTER_SANITIZE_STRING));

		/*
		 * Setup the application path options.  This defines the default executable name, executable directory,
		 * and also the path to the daemon process id file.
		 */

		// The application executable daemon.  This string is used in generating startup scripts.
		$tmp = (string) $this->config->get('application_executable', basename($this->input->executable));
		$this->config->set('application_executable', $tmp);

		// The home directory of the daemon.
		$tmp = (string) $this->config->get('application_directory', dirname($this->input->executable));
		$this->config->set('application_directory', $tmp);

		// The pid file location.  This defaults to a path inside the /tmp directory.
		$name = $this->config->get('application_name');
<<<<<<< HEAD
		$tmp = (string) $this->config->get('application_pid_file', strtolower('/tmp/'.$name.'/'.$name.'.pid'));
=======
		$tmp = (string) $this->config->get('application_pid_file', strtolower('/tmp/' . $name . '/' . $name . '.pid'));
>>>>>>> upstream/master
		$this->config->set('application_pid_file', $tmp);

		/*
		 * Setup the application identity options.  It is important to remember if the default of 0 is set for
		 * either UID or GID then changing that setting will not be attempted as there is no real way to "change"
		 * the identity of a process from some user to root.
		 */

		// The user id under which to run the daemon.
		$tmp = (int) $this->config->get('application_uid', 0);
		$options = array('options' => array('min_range' => 0, 'max_range' => 65000));
		$this->config->set('application_uid', filter_var($tmp, FILTER_VALIDATE_INT, $options));

		// The group id under which to run the daemon.
		$tmp = (int) $this->config->get('application_gid', 0);
		$options = array('options' => array('min_range' => 0, 'max_range' => 65000));
		$this->config->set('application_gid', filter_var($tmp, FILTER_VALIDATE_INT, $options));

		// Option to kill the daemon if it cannot switch to the chosen identity.
		$tmp = (bool) $this->config->get('application_require_identity', 1);
		$this->config->set('application_require_identity', $tmp);

		/*
		 * Setup the application runtime options.  By default our execution time limit is infinite obviously
		 * because a daemon should be constantly running unless told otherwise.  The default limit for memory
		 * usage is 128M, which admittedly is a little high, but remember it is a "limit" and PHP's memory
		 * management leaves a bit to be desired :-)
		 */

		// The maximum execution time of the application in seconds.  Zero is infinite.
		$tmp = $this->config->get('max_execution_time');
<<<<<<< HEAD
		if ($tmp !== null) {
=======
		if ($tmp !== null)
		{
>>>>>>> upstream/master
			$this->config->set('max_execution_time', (int) $tmp);
		}

		// The maximum amount of memory the application can use.
		$tmp = $this->config->get('max_memory_limit', '256M');
<<<<<<< HEAD
		if ($tmp !== null) {
=======
		if ($tmp !== null)
		{
>>>>>>> upstream/master
			$this->config->set('max_memory_limit', (string) $tmp);
		}
	}

	/**
	 * Restart daemon process.
	 *
	 * @return  void
	 *
	 * @since   11.1
	 */
	public function restart()
	{
<<<<<<< HEAD
		JLog::add('Stopping '.$this->name, JLog::INFO);
=======
		JLog::add('Stopping ' . $this->name, JLog::INFO);
>>>>>>> upstream/master
		$this->shutdown(true);
	}

	/**
	 * Spawn daemon process.
	 *
<<<<<<< HEAD
	 * @return  bool  True if successfully spawned
=======
	 * @return  boolean  True if successfully spawned
>>>>>>> upstream/master
	 *
	 * @since   11.1
	 */
	public function start()
	{
		// Enable basic garbage collection.  Only available in PHP 5.3+
<<<<<<< HEAD
		if (function_exists('gc_enable')) {
			gc_enable();
		}

		JLog::add('Starting '.$this->name, JLog::INFO);

		// Set off the process for becoming a daemon.
		if ($this->daemonize()) {
=======
		if (function_exists('gc_enable'))
		{
			gc_enable();
		}

		JLog::add('Starting ' . $this->name, JLog::INFO);

		// Set off the process for becoming a daemon.
		if ($this->daemonize())
		{
>>>>>>> upstream/master

			// Daemonization succeeded (is that a word?), so now we start our main execution loop.
			while (true)
			{
				// Perform basic garbage collection.
				$this->gc();

				// Don't completely overload the CPU.
				usleep(1000);

				// Execute the main daemon logic.
				$this->execute();
			}
		}
		// We were not able to daemonize the application so log the failure and die gracefully.
<<<<<<< HEAD
		else {
			JLog::add('Starting '.$this->name.' failed', JLog::INFO);
=======
		else
		{
			JLog::add('Starting ' . $this->name . ' failed', JLog::INFO);
>>>>>>> upstream/master
		}
	}

	/**
	 * Stop daemon process.
	 *
	 * @return  void
	 *
	 * @since   11.1
	 */
	public function stop()
	{
<<<<<<< HEAD
		JLog::add('Stopping '.$this->name, JLog::INFO);
=======
		JLog::add('Stopping ' . $this->name, JLog::INFO);
>>>>>>> upstream/master
		$this->shutdown();
	}

	/**
	 * Method to change the identity of the daemon process and resources.
	 *
<<<<<<< HEAD
	 * @return  bool  True if identitye successfully changed
	 *
	 * @since   11.1
	 * @see     posix_setuid()
	 * @see     posix_setgid()
=======
	 * @return  boolean  True if identity successfully changed
	 *
	 * @since   11.1
	 * @see     posix_setuid()
>>>>>>> upstream/master
	 */
	protected function changeIdentity()
	{
		// Get the group and user ids to set for the daemon.
		$uid = (int) $this->config->get('application_uid', 0);
		$gid = (int) $this->config->get('application_gid', 0);

		// Get the application process id file path.
		$file = $this->config->get('application_pid_file');

		// Change the user id for the process id file if necessary.
<<<<<<< HEAD
		if ($uid && (fileowner($file) != $uid) && (!@ chown($file, $uid))) {
=======
		if ($uid && (fileowner($file) != $uid) && (!@ chown($file, $uid)))
		{
>>>>>>> upstream/master
			JLog::add('Unable to change user ownership of the proccess id file.', JLog::ERROR);
			return false;
		}

		// Change the group id for the process id file if necessary.
<<<<<<< HEAD
		if ($gid && (filegroup($file) != $gid) && (!@ chgrp($file, $gid))) {
=======
		if ($gid && (filegroup($file) != $gid) && (!@ chgrp($file, $gid)))
		{
>>>>>>> upstream/master
			JLog::add('Unable to change group ownership of the proccess id file.', JLog::ERROR);
			return false;
		}

		// Set the correct home directory for the process.
<<<<<<< HEAD
		if ($uid && ($info = posix_getpwuid($uid)) && is_dir($info['dir'])) {
			system('export HOME="'.$info['dir'].'"');
		}

		// Change the user id for the process necessary.
		if ($uid && (posix_getuid($file) != $uid) && (!@ posix_setuid($uid))) {
=======
		if ($uid && ($info = posix_getpwuid($uid)) && is_dir($info['dir']))
		{
			system('export HOME="' . $info['dir'] . '"');
		}

		// Change the user id for the process necessary.
		if ($uid && (posix_getuid($file) != $uid) && (!@ posix_setuid($uid)))
		{
>>>>>>> upstream/master
			JLog::add('Unable to change user ownership of the proccess.', JLog::ERROR);
			return false;
		}

		// Change the group id for the process necessary.
<<<<<<< HEAD
		if ($gid && (posix_getgid($file) != $gid) && (!@ posix_setgid($gid))) {
=======
		if ($gid && (posix_getgid($file) != $gid) && (!@ posix_setgid($gid)))
		{
>>>>>>> upstream/master
			JLog::add('Unable to change group ownership of the proccess.', JLog::ERROR);
			return false;
		}

		// Get the user and group information based on uid and gid.
<<<<<<< HEAD
		$user  = posix_getpwuid($uid);
		$group = posix_getgrgid($gid);

		JLog::add('Changed daemon identity to '.$user['name'].':'.$group['name'], JLog::INFO);
=======
		$user = posix_getpwuid($uid);
		$group = posix_getgrgid($gid);

		JLog::add('Changed daemon identity to ' . $user['name'] . ':' . $group['name'], JLog::INFO);
>>>>>>> upstream/master

		return true;
	}

	/**
	 * Method to put the application into the background.
	 *
<<<<<<< HEAD
	 * @return  bool
=======
	 * @return  boolean
>>>>>>> upstream/master
	 *
	 * @since   11.1
	 * @throws  ApplicationException
	 */
	protected function daemonize()
	{
		// Is there already an active daemon running?
<<<<<<< HEAD
		if ($this->isActive()) {
			JLog::add($this->name.' daemon is still running. Exiting the application.', JLog::EMERGENCY);
=======
		if ($this->isActive())
		{
			JLog::add($this->name . ' daemon is still running. Exiting the application.', JLog::EMERGENCY);
>>>>>>> upstream/master
			return false;
		}

		// Reset Process Information
		$this->safeMode = !!@ ini_get('safe_mode');
		$this->processId = 0;
		$this->running = false;

		// Fork process!
<<<<<<< HEAD
		try {
			$this->fork();
		}
		catch (ApplicationException $e) {
=======
		try
		{
			$this->fork();
		}
		catch (ApplicationException $e)
		{
>>>>>>> upstream/master
			JLog::add('Unable to fork.', JLog::EMERGENCY);
			return false;
		}

		// Verify the process id is valid.
<<<<<<< HEAD
		if ($this->processId < 1) {
=======
		if ($this->processId < 1)
		{
>>>>>>> upstream/master
			JLog::add('The process id is invalid; the fork failed.', JLog::EMERGENCY);
			return false;
		}

		// Clear the umask.
		@ umask(0);

		// Write out the process id file for concurrency management.
<<<<<<< HEAD
		if (!$this->writeProcessIdFile()) {
			JLog::add('Unable to write the pid file at: '.$this->config->get('application_pid_file'), JLog::EMERGENCY);
=======
		if (!$this->writeProcessIdFile())
		{
			JLog::add('Unable to write the pid file at: ' . $this->config->get('application_pid_file'), JLog::EMERGENCY);
>>>>>>> upstream/master
			return false;
		}

		// Attempt to change the identity of user running the process.
<<<<<<< HEAD
		if (!$this->changeIdentity()) {

			// If the identity change was required then we need to return false.
			if ($this->config->get('application_require_identity')) {
				JLog::add('Unable to change process owner.', JLog::CRITICAL);
				return false;
			}
			else {
=======
		if (!$this->changeIdentity())
		{

			// If the identity change was required then we need to return false.
			if ($this->config->get('application_require_identity'))
			{
				JLog::add('Unable to change process owner.', JLog::CRITICAL);
				return false;
			}
			else
			{
>>>>>>> upstream/master
				JLog::add('Unable to change process owner.', JLog::WARNING);
			}
		}

		// Setup the signal handlers for the daemon.
<<<<<<< HEAD
		if (!$this->setupSignalHandlers()) {
=======
		if (!$this->setupSignalHandlers())
		{
>>>>>>> upstream/master
			return false;
		}

		// Change the current working directory to the application working directory.
		@ chdir($this->config->get('application_directory'));

		return true;
	}

	/**
	 * This is truly where the magic happens.  This is where we fork the process and kill the parent
	 * process, which is essentially what turns the application into a daemon.
	 *
	 * @return  void
	 *
	 * @since   11.1
	 * @throws  ApplicationException
	 */
	protected function fork()
	{
<<<<<<< HEAD
		JLog::add('Forking the '.$this->name.' daemon.', JLog::DEBUG);
=======
		JLog::add('Forking the ' . $this->name . ' daemon.', JLog::DEBUG);
>>>>>>> upstream/master

		// Attempt to fork the process.
		$pid = pcntl_fork();

		// If we could not fork the process log the error and throw an exception.
<<<<<<< HEAD
		if ($pid === -1) {
			// Error
			JLog::add('Process could not be forked.', JLog::WARNING);
			throw new ApplicationException();
		}
		// If the pid is positive then we successfully forked, and can close this application.
		elseif ($pid) {

			// Add the log entry for debugging purposes and exit gracefully.
			JLog::add('Ending '.$this->name.' parent process', JLog::DEBUG);
			$this->close();
		}
		// We are in the forked child process.
		else {
=======
		if ($pid === -1)
		{
			// Error
			JLog::add('Process could not be forked.', JLog::WARNING);
			throw new ApplicationException;
		}
		// If the pid is positive then we successfully forked, and can close this application.
		elseif ($pid)
		{

			// Add the log entry for debugging purposes and exit gracefully.
			JLog::add('Ending ' . $this->name . ' parent process', JLog::DEBUG);
			$this->close();
		}
		// We are in the forked child process.
		else
		{
>>>>>>> upstream/master

			// Setup some protected values.
			$this->exiting = false;
			$this->running = true;
			$this->processId = (int) posix_getpid();
		}
	}

	/**
	 * Method to perform basic garbage collection and memory management in the sense of clearing the
	 * stat cache.  We will probably call this method pretty regularly in our main loop.
	 *
	 * @return  void
	 *
	 * @since   11.1
	 */
	protected function gc()
	{
		// Perform generic garbage collection.  Only available in PHP 5.3+
<<<<<<< HEAD
		if (function_exists('gc_collect_cycles')) {
=======
		if (function_exists('gc_collect_cycles'))
		{
>>>>>>> upstream/master
			gc_collect_cycles();
		}

		// Clear the stat cache so it doesn't blow up memory.
		clearstatcache();
	}

	/**
	 * Method to attach the JDaemon signal handler to the known signals.  Applications can override
	 * these handlers by using the pcntl_signal() function and attaching a different callback method.
	 *
<<<<<<< HEAD
	 * @return  void
=======
	 * @return  boolean
>>>>>>> upstream/master
	 *
	 * @since   11.1
	 * @see     pcntl_signal()
	 */
	protected function setupSignalHandlers()
	{
		// We add the error suppression for the loop because on some platforms some constants are not defined.
		foreach (@ self::$signals as $signal)
		{
			// Ignore signals that are not defined.
<<<<<<< HEAD
			if (!is_int($signal)) {
=======
			if (!is_int($signal) || ($signal === 0))
			{
>>>>>>> upstream/master
				continue;
			}

			// Attach the signal handler for the signal.
<<<<<<< HEAD
			if (!pcntl_signal($signal, array('JDaemon', 'signal'))) {
=======
			if (!pcntl_signal($signal, array('JDaemon', 'signal')))
			{
>>>>>>> upstream/master
				JLog::add(sprintf('Unable to reroute signal handler: %s', $signal), JLog::EMERGENCY);
				return false;
			}
		}

		return true;
	}

	/**
	 * Method to shut down the daemon and optionally restart it.
	 *
<<<<<<< HEAD
	 * @param   bool  $restart  True to restart the daemon on exit.
=======
	 * @param   boolean  $restart  True to restart the daemon on exit.
>>>>>>> upstream/master
	 *
	 * @return  void
	 *
	 * @since   11.1
	 */
	protected function shutdown($restart = false)
	{
		// If we are already exiting, chill.
<<<<<<< HEAD
		if ($this->exiting) {
			return;
		}
		// If not, now we are.
		else {
=======
		if ($this->exiting)
		{
			return;
		}
		// If not, now we are.
		else
		{
>>>>>>> upstream/master
			$this->exiting = true;
		}

		// If we aren't already daemonized then just kill the application.
<<<<<<< HEAD
		if ($this->running && $this->isActive()) {
=======
		if ($this->running && $this->isActive())
		{
>>>>>>> upstream/master
			JLog::add('Process was not daemonized yet, just halting current process', JLog::INFO);
			$this->close();
		}

		// Read the contents of the process id file as an integer.
		$fp = fopen($this->config->get('application_pid_file'), 'r');
		$pid = fread($fp, filesize($this->config->get('application_pid_file')));
		$pid = intval($pid);
		fclose($fp);

		// Remove the process id file.
		@ unlink($this->config->get('application_pid_file'));

		// If we are supposed to restart the daemon we need to execute the same command.
<<<<<<< HEAD
		if ($restart) {
			$this->close(exec(implode(' ', $GLOBALS['argv']).' > /dev/null &'));
		}
		// If we are not supposed to restart the daemon let's just kill -9.
		else {
			passthru('kill -9 '.$pid);
=======
		if ($restart)
		{
			$this->close(exec(implode(' ', $GLOBALS['argv']) . ' > /dev/null &'));
		}
		// If we are not supposed to restart the daemon let's just kill -9.
		else
		{
			passthru('kill -9 ' . $pid);
>>>>>>> upstream/master
			$this->close();
		}
	}

	/**
	 * Method to write the process id file out to disk.
	 *
<<<<<<< HEAD
	 * @return  bool
=======
	 * @return  boolean
>>>>>>> upstream/master
	 *
	 * @since   11.1
	 */
	protected function writeProcessIdFile()
	{
		// Verify the process id is valid.
<<<<<<< HEAD
		if ($this->processId < 1) {
=======
		if ($this->processId < 1)
		{
>>>>>>> upstream/master
			JLog::add('The process id is invalid.', JLog::EMERGENCY);
			return false;
		}

		// Get the application process id file path.
		$file = $this->config->get('application_pid_file');
<<<<<<< HEAD
		if (empty($file)) {
=======
		if (empty($file))
		{
>>>>>>> upstream/master
			JLog::add('The process id file path is empty.', JLog::ERROR);
			return false;
		}

		// Make sure that the folder where we are writing the process id file exists.
		$folder = dirname($file);
<<<<<<< HEAD
		if (!is_dir($folder) && !JFolder::create($folder)) {
			JLog::add('Unable to create directory: '.$folder, JLog::ERROR);
=======
		if (!is_dir($folder) && !JFolder::create($folder))
		{
			JLog::add('Unable to create directory: ' . $folder, JLog::ERROR);
>>>>>>> upstream/master
			return false;
		}

		// Write the process id file out to disk.
<<<<<<< HEAD
		if (!file_put_contents($file, $this->processId)) {
			JLog::add('Unable to write proccess id file: '.$file, JLog::ERROR);
=======
		if (!file_put_contents($file, $this->processId))
		{
			JLog::add('Unable to write proccess id file: ' . $file, JLog::ERROR);
>>>>>>> upstream/master
			return false;
		}

		// Make sure the permissions for the proccess id file are accurate.
<<<<<<< HEAD
		if (!chmod($file, 0644)) {
			JLog::add('Unable to adjust permissions for the proccess id file: '.$file, JLog::ERROR);
=======
		if (!chmod($file, 0644))
		{
			JLog::add('Unable to adjust permissions for the proccess id file: ' . $file, JLog::ERROR);
>>>>>>> upstream/master
			return false;
		}

		return true;
	}
}
