<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Client
 *
 * @copyright   Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

<<<<<<< HEAD
defined('JPATH_PLATFORM') or die;
=======
defined('JPATH_PLATFORM') or die();
>>>>>>> upstream/master

/**
 * Client helper class
 *
 * @package     Joomla.Platform
 * @subpackage  Client
 * @since       11.1
 */
class JClientHelper
{
	/**
	 * Method to return the array of client layer configuration options
	 *
	 * @param   string   $client  Client name, currently only 'ftp' is supported
	 * @param   boolean  $force   Forces re-creation of the login credentials. Set this to
<<<<<<< HEAD
	 *                              true if login credentials in the session storage have changed
	 *
	 * @return  array    Client layer configuration options, consisting of at least
	 *                     these fields: enabled, host, port, user, pass, root
	 * @since   11.1
	 */
	public static function getCredentials($client, $force=false)
=======
	 * true if login credentials in the session storage have changed
	 *
	 * @return  array    Client layer configuration options, consisting of at least
	 * these fields: enabled, host, port, user, pass, root
	 *
	 * @since   11.1
	 */
	public static function getCredentials($client, $force = false)
>>>>>>> upstream/master
	{
		static $credentials = array();

		$client = strtolower($client);

<<<<<<< HEAD
		if (!isset($credentials[$client]) || $force) {
=======
		if (!isset($credentials[$client]) || $force)
		{
>>>>>>> upstream/master
			// Initialise variables.
			$config = JFactory::getConfig();

			// Fetch the client layer configuration options for the specific client
<<<<<<< HEAD
			switch ($client) {
				case 'ftp':
					$options = array(
						'enabled'	=> $config->get('ftp_enable'),
						'host'		=> $config->get('ftp_host'),
						'port'		=> $config->get('ftp_port'),
						'user'		=> $config->get('ftp_user'),
						'pass'		=> $config->get('ftp_pass'),
						'root'		=> $config->get('ftp_root')
					);
					break;

				default:
					$options = array(
						'enabled'	=> false,
						'host'		=> '',
						'port'		=> '',
						'user'		=> '',
						'pass'		=> '',
						'root'		=> ''
					);
=======
			switch ($client)
			{
				case 'ftp':
					$options = array(
						'enabled' => $config->get('ftp_enable'),
						'host' => $config->get('ftp_host'),
						'port' => $config->get('ftp_port'),
						'user' => $config->get('ftp_user'),
						'pass' => $config->get('ftp_pass'),
						'root' => $config->get('ftp_root'));
					break;

				default:
					$options = array('enabled' => false, 'host' => '', 'port' => '', 'user' => '', 'pass' => '', 'root' => '');
>>>>>>> upstream/master
					break;
			}

			// If user and pass are not set in global config lets see if they are in the session
<<<<<<< HEAD
			if ($options['enabled'] == true && ($options['user'] == '' || $options['pass'] == '')) {
				$session = JFactory::getSession();
				$options['user'] = $session->get($client.'.user', null, 'JClientHelper');
				$options['pass'] = $session->get($client.'.pass', null, 'JClientHelper');
			}

			// If user or pass are missing, disable this client
			if ($options['user'] == '' || $options['pass'] == '') {
=======
			if ($options['enabled'] == true && ($options['user'] == '' || $options['pass'] == ''))
			{
				$session = JFactory::getSession();
				$options['user'] = $session->get($client . '.user', null, 'JClientHelper');
				$options['pass'] = $session->get($client . '.pass', null, 'JClientHelper');
			}

			// If user or pass are missing, disable this client
			if ($options['user'] == '' || $options['pass'] == '')
			{
>>>>>>> upstream/master
				$options['enabled'] = false;
			}

			// Save the credentials for later use
			$credentials[$client] = $options;
		}

		return $credentials[$client];
	}

	/**
	 * Method to set client login credentials
	 *
<<<<<<< HEAD
	 * @param   string   $client   Client name, currently only 'ftp' is supported
	 * @param   string   $user     Username
	 * @param   string   $pass     Password
	 *
	 * @return  boolean  True if the given login credentials have been set and are valid
=======
	 * @param   string  $client  Client name, currently only 'ftp' is supported
	 * @param   string  $user    Username
	 * @param   string  $pass    Password
	 *
	 * @return  boolean  True if the given login credentials have been set and are valid
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function setCredentials($client, $user, $pass)
	{
		$return = false;
		$client = strtolower($client);

		// Test if the given credentials are valid
<<<<<<< HEAD
		switch ($client) {
			case 'ftp':
				$config = JFactory::getConfig();
				$options = array(
					'enabled'	=> $config->get('ftp_enable'),
					'host'		=> $config->get('ftp_host'),
					'port'		=> $config->get('ftp_port'),
				);

				if ($options['enabled']) {
=======
		switch ($client)
		{
			case 'ftp':
				$config = JFactory::getConfig();
				$options = array('enabled' => $config->get('ftp_enable'), 'host' => $config->get('ftp_host'), 'port' => $config->get('ftp_port'));

				if ($options['enabled'])
				{
>>>>>>> upstream/master
					jimport('joomla.client.ftp');
					$ftp = JFTP::getInstance($options['host'], $options['port']);

					// Test the conection and try to log in
<<<<<<< HEAD
					if ($ftp->isConnected()) {
						if ($ftp->login($user, $pass)) {
=======
					if ($ftp->isConnected())
					{
						if ($ftp->login($user, $pass))
						{
>>>>>>> upstream/master
							$return = true;
						}
						$ftp->quit();
					}
				}
				break;

			default:
				break;
		}

<<<<<<< HEAD
		if ($return) {
			// Save valid credentials to the session
			$session = JFactory::getSession();
			$session->set($client.'.user', $user, 'JClientHelper');
			$session->set($client.'.pass', $pass, 'JClientHelper');
=======
		if ($return)
		{
			// Save valid credentials to the session
			$session = JFactory::getSession();
			$session->set($client . '.user', $user, 'JClientHelper');
			$session->set($client . '.pass', $pass, 'JClientHelper');
>>>>>>> upstream/master

			// Force re-creation of the data saved within JClientHelper::getCredentials()
			JClientHelper::getCredentials($client, true);
		}

		return $return;
	}

	/**
	 * Method to determine if client login credentials are present
	 *
<<<<<<< HEAD
	 * @param   string   Client name, currently only 'ftp' is supported
	 *
	 * @return  boolean  True if login credentials are available
=======
	 * @param   string  $client  Client name, currently only 'ftp' is supported
	 *
	 * @return  boolean  True if login credentials are available
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function hasCredentials($client)
	{
		$return = false;
		$client = strtolower($client);

		// Get (unmodified) credentials for this client
<<<<<<< HEAD
		switch ($client) {
			case 'ftp':
				$config = JFactory::getConfig();
				$options = array(
					'enabled'	=> $config->get('ftp_enable'),
					'user'		=> $config->get('ftp_user'),
					'pass'		=> $config->get('ftp_pass')
				);
				break;

			default:
				$options = array(
					'enabled'	=> false,
					'user'		=> '',
					'pass'		=> ''
				);
				break;
		}

		if ($options['enabled'] == false) {
			// The client is disabled in global config, so let's pretend we are OK
			$return = true;
		} else if ($options['user'] != '' && $options['pass'] != '') {
			// Login credentials are available in global config
			$return = true;
		} else {
			// Check if login credentials are available in the session
			$session = JFactory::getSession();
			$user = $session->get($client.'.user', null, 'JClientHelper');
			$pass = $session->get($client.'.pass', null, 'JClientHelper');
			if ($user != '' && $pass != '') {
=======
		switch ($client)
		{
			case 'ftp':
				$config = JFactory::getConfig();
				$options = array('enabled' => $config->get('ftp_enable'), 'user' => $config->get('ftp_user'), 'pass' => $config->get('ftp_pass'));
				break;

			default:
				$options = array('enabled' => false, 'user' => '', 'pass' => '');
				break;
		}

		if ($options['enabled'] == false)
		{
			// The client is disabled in global config, so let's pretend we are OK
			$return = true;
		}
		else if ($options['user'] != '' && $options['pass'] != '')
		{
			// Login credentials are available in global config
			$return = true;
		}
		else
		{
			// Check if login credentials are available in the session
			$session = JFactory::getSession();
			$user = $session->get($client . '.user', null, 'JClientHelper');
			$pass = $session->get($client . '.pass', null, 'JClientHelper');
			if ($user != '' && $pass != '')
			{
>>>>>>> upstream/master
				$return = true;
			}
		}

		return $return;
	}

	/**
	 * Determine whether input fields for client settings need to be shown
	 *
	 * If valid credentials were passed along with the request, they are saved to the session.
	 * This functions returns an exception if invalid credentials have been given or if the
	 * connection to the server failed for some other reason.
	 *
<<<<<<< HEAD
	 * @param    string    $client
	 *
	 * @return   mixed     True, if FTP settings should be shown or an exception
=======
	 * @param   string  $client  The name of the client.
	 *
	 * @return  mixed  True, if FTP settings should be shown or an exception
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function setCredentialsFromRequest($client)
	{
		// Determine wether FTP credentials have been passed along with the current request
		$user = JRequest::getString('username', null, 'POST', JREQUEST_ALLOWRAW);
		$pass = JRequest::getString('password', null, 'POST', JREQUEST_ALLOWRAW);
		if ($user != '' && $pass != '')
		{
			// Add credentials to the session
<<<<<<< HEAD
			if (JClientHelper::setCredentials($client, $user, $pass)) {
				$return = false;
			} else {
=======
			if (JClientHelper::setCredentials($client, $user, $pass))
			{
				$return = false;
			}
			else
			{
>>>>>>> upstream/master
				$return = JError::raiseWarning('SOME_ERROR_CODE', JText::_('JLIB_CLIENT_ERROR_HELPER_SETCREDENTIALSFROMREQUEST_FAILED'));
			}
		}
		else
		{
			// Just determine if the FTP input fields need to be shown
			$return = !JClientHelper::hasCredentials('ftp');
		}

		return $return;
	}
}