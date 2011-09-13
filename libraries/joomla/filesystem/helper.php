<?php
/**
 * @package     Joomla.Platform
 * @subpackage  FileSystem
 *
 * @copyright   Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

<<<<<<< HEAD
defined('JPATH_PLATFORM') or die;
=======
defined('JPATH_PLATFORM') or die();
>>>>>>> upstream/master

jimport('joomla.filesystem.file');
jimport('joomla.filesystem.folder');

/**
 * File system helper
 *
 * Holds support functions for the filesystem, particularly the stream
 *
 * @package     Joomla.Platform
 * @subpackage  FileSystem
 * @since       11.1
 */
class JFilesystemHelper
{
	/**
<<<<<<< HEAD
	 * Support Functions; should probably live in a helper?
	 */

	/**
=======
>>>>>>> upstream/master
	 * Remote file size function for streams that don't support it
	 *
	 * @param   string  $url  TODO Add text
	 *
	 * @return  mixed
	 *
<<<<<<< HEAD
	 * @see		http://www.php.net/manual/en/function.filesize.php#71098
=======
	 * @see     http://www.php.net/manual/en/function.filesize.php#71098
>>>>>>> upstream/master
	 * @since   11.1
	 */
	function remotefsize($url)
	{
		$sch = parse_url($url, PHP_URL_SCHEME);

<<<<<<< HEAD
		if (($sch != 'http') && ($sch != 'https') && ($sch != 'ftp') && ($sch != 'ftps')) {
			return false;
		}

		if (($sch == 'http') || ($sch == 'https')) {
			$headers = get_headers($url, 1);

			if ((!array_key_exists('Content-Length', $headers))) {
=======
		if (($sch != 'http') && ($sch != 'https') && ($sch != 'ftp') && ($sch != 'ftps'))
		{
			return false;
		}

		if (($sch == 'http') || ($sch == 'https'))
		{
			$headers = get_headers($url, 1);

			if ((!array_key_exists('Content-Length', $headers)))
			{
>>>>>>> upstream/master
				return false;
			}

			return $headers['Content-Length'];
		}

<<<<<<< HEAD
		if (($sch == 'ftp') || ($sch == 'ftps')) {
=======
		if (($sch == 'ftp') || ($sch == 'ftps'))
		{
>>>>>>> upstream/master
			$server = parse_url($url, PHP_URL_HOST);
			$port = parse_url($url, PHP_URL_PORT);
			$path = parse_url($url, PHP_URL_PATH);
			$user = parse_url($url, PHP_URL_USER);
			$pass = parse_url($url, PHP_URL_PASS);

<<<<<<< HEAD
			if ((!$server) || (!$path)) {
				return false;
			}

			if (!$port) {
				$port = 21;
			}

			if (!$user) {
				$user = 'anonymous';
			}

			if (!$pass) {
=======
			if ((!$server) || (!$path))
			{
				return false;
			}

			if (!$port)
			{
				$port = 21;
			}

			if (!$user)
			{
				$user = 'anonymous';
			}

			if (!$pass)
			{
>>>>>>> upstream/master
				$pass = '';
			}

			switch ($sch)
			{
				case 'ftp':
					$ftpid = ftp_connect($server, $port);
					break;

				case 'ftps':
					$ftpid = ftp_ssl_connect($server, $port);
					break;
			}

<<<<<<< HEAD
			if (!$ftpid) {
=======
			if (!$ftpid)
			{
>>>>>>> upstream/master
				return false;
			}

			$login = ftp_login($ftpid, $user, $pass);

<<<<<<< HEAD
			if (!$login) {
=======
			if (!$login)
			{
>>>>>>> upstream/master
				return false;
			}

			$ftpsize = ftp_size($ftpid, $path);
			ftp_close($ftpid);

<<<<<<< HEAD
			if ($ftpsize == -1) {
=======
			if ($ftpsize == -1)
			{
>>>>>>> upstream/master
				return false;
			}

			return $ftpsize;
		}
	}

	/**
	 * Quick FTP chmod
	 *
<<<<<<< HEAD
	 * @param   string   $url	TODO Add text
	 * @param   integer  $mode	The new permissions, given as an octal value.
	 *
	 * @return  mixed
	 *
	 * @see		http://www.php.net/manual/en/function.ftp-chmod.php
=======
	 * @param   string   $url   Link identifier
	 * @param   integer  $mode  The new permissions, given as an octal value.
	 *
	 * @return  mixed
	 *
	 * @see     http://www.php.net/manual/en/function.ftp-chmod.php
>>>>>>> upstream/master
	 * @since   11.1
	 */
	function ftpChmod($url, $mode)
	{
		$sch = parse_url($url, PHP_URL_SCHEME);

<<<<<<< HEAD
		if (($sch != 'ftp') && ($sch != 'ftps')) {
=======
		if (($sch != 'ftp') && ($sch != 'ftps'))
		{
>>>>>>> upstream/master
			return false;
		}

		$server = parse_url($url, PHP_URL_HOST);
		$port = parse_url($url, PHP_URL_PORT);
		$path = parse_url($url, PHP_URL_PATH);
		$user = parse_url($url, PHP_URL_USER);
		$pass = parse_url($url, PHP_URL_PASS);

<<<<<<< HEAD
		if ((!$server) || (!$path)) {
			return false;
		}

		if (!$port) {
			$port = 21;
		}

		if (!$user) {
			$user = 'anonymous';
		}

		if (!$pass) {
=======
		if ((!$server) || (!$path))
		{
			return false;
		}

		if (!$port)
		{
			$port = 21;
		}

		if (!$user)
		{
			$user = 'anonymous';
		}

		if (!$pass)
		{
>>>>>>> upstream/master
			$pass = '';
		}

		switch ($sch)
		{
			case 'ftp':
				$ftpid = ftp_connect($server, $port);
				break;

			case 'ftps':
				$ftpid = ftp_ssl_connect($server, $port);
				break;
		}

<<<<<<< HEAD
		if (!$ftpid) {
=======
		if (!$ftpid)
		{
>>>>>>> upstream/master
			return false;
		}

		$login = ftp_login($ftpid, $user, $pass);

<<<<<<< HEAD
		if (!$login) {
=======
		if (!$login)
		{
>>>>>>> upstream/master
			return false;
		}

		$res = ftp_chmod($ftpid, $mode, $path);
		ftp_close($ftpid);

		return $res;
	}

	/**
	 * Modes that require a write operation
	 *
	 * @return  array
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	static function getWriteModes()
	{
<<<<<<< HEAD
		return array('w','w+','a','a+','r+','x','x+');
=======
		return array('w', 'w+', 'a', 'a+', 'r+', 'x', 'x+');
>>>>>>> upstream/master
	}

	/**
	 * Stream and Filter Support Operations
	 *
	 * Returns the supported streams, in addition to direct file access
	 * Also includes Joomla! streams as well as PHP streams
	 *
	 * @return  array  Streams
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	function getSupported()
	{
		// Really quite cool what php can do with arrays when you let it...
		static $streams;

<<<<<<< HEAD
		if (!$streams) {
			$streams = array_merge(
				stream_get_wrappers(),
				JFilesystemHelper::getJStreams()
			);
=======
		if (!$streams)
		{
			$streams = array_merge(stream_get_wrappers(), JFilesystemHelper::getJStreams());
>>>>>>> upstream/master
		}

		return $streams;
	}

	/**
	 * Returns a list of transports
	 *
	 * @return  array
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	function getTransports()
	{
		// Is this overkill?
		return stream_get_transports();
	}

	/**
	 * Returns a list of filters
	 *
	 * @return  array
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	function getFilters()
	{
		// Note: This will look like the getSupported() function with J! filters.
		// TODO: add user space filter loading like user space stream loading
		return stream_get_filters();
	}

	/**
	 * Returns a list of J! streams
	 *
	 * @return  array
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	function getJStreams()
	{
		static $streams;

<<<<<<< HEAD
		if (!$streams) {
			$streams = array_map(
				array('JFile', 'stripExt'),
				JFolder::files(dirname(__FILE__).DS.'streams', '.php')
			);
=======
		if (!$streams)
		{
			$streams = array_map(array('JFile', 'stripExt'), JFolder::files(dirname(__FILE__) . '/streams', '.php'));
>>>>>>> upstream/master
		}

		return $streams;
	}

	/**
	 * Determine if a stream is a Joomla stream.
	 *
	 * @param   string  $streamname  The name of a stream
	 *
	 * @return  boolean  True for a Joomla Stream
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	function isJoomlaStream($streamname)
	{
<<<<<<< HEAD
		return in_array(
			$streamname,
			JFilesystemHelper::getJStreams()
		);
=======
		return in_array($streamname, JFilesystemHelper::getJStreams());
>>>>>>> upstream/master
	}
}