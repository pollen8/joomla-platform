<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Utilities
 *
 * @copyright   Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('JPATH_PLATFORM') or die;

/**
 * JUtility is a utility functions class
 *
 * @package     Joomla.Platform
 * @subpackage  Utilities
 * @since       11.1
 */
class JUtility
{
	/**
	 * Mail function (uses phpMailer)
	 *
<<<<<<< HEAD
	 * @param   string   $from		From email address
	 * @param   string   $fromname	From name
	 * @param   mixed    $recipient	Recipient email address(es)
	 * @param   string   $subject	Email subject
	 * @param   string   $body		Message body
	 * @param   boolean  $mode		false = plain text, true = HTML
	 * @param   mixed    $cc			CC email address(es)
	 * @param   mixed    $bcc		BCC email address(es)
	 * @param   mixed    $attachment	Attachment file name(s)
	 * @param   mixed    $replyto	Reply to email address(es)
	 * @param   mixed    $replytoname Reply to name(s)
	 *
	 * @return  boolean  True on success
	 *
	 * @since       11.1
	 * @deprecated  1.6
	 * @see			JMail::sendMail()
	 */
	public static function sendMail($from, $fromname, $recipient, $subject, $body, $mode=0, $cc=null, $bcc=null, $attachment=null, $replyto=null, $replytoname=null)
	{
		// Get a JMail instance
		$mail = JFactory::getMailer();

		return $mail->sendMail(
			$from, $fromname, $recipient, $subject, $body, $mode, $cc,
			$bcc, $attachment, $replyto, $replytoname
		);
=======
	 * @param   string   $from         From email address
	 * @param   string   $fromname     From name
	 * @param   mixed    $recipient    Recipient email address(es)
	 * @param   string   $subject      Email subject
	 * @param   string   $body         Message body
	 * @param   boolean  $mode         False = plain text, true = HTML
	 * @param   mixed    $cc           CC email address(es)
	 * @param   mixed    $bcc          BCC email address(es)
	 * @param   mixed    $attachment   Attachment file name(s)
	 * @param   mixed    $replyto      Reply to email address(es)
	 * @param   mixed    $replytoname  Reply to name(s)
	 *
	 * @return  boolean  True on success
	 *
	 * @deprecated  12.1
	 * @see     JMail::sendMail()
	 * @since   11.1
	 */
	public static function sendMail($from, $fromname, $recipient, $subject, $body, $mode = 0, $cc = null, $bcc = null, $attachment = null,
		$replyto = null, $replytoname = null)
	{
		// Deprecation warning.
		JLog::add('JUtility::sendmail() is deprecated.', JLog::WARNING, 'deprecated');

		// Get a JMail instance
		$mail = JFactory::getMailer();

		return $mail->sendMail($from, $fromname, $recipient, $subject, $body, $mode, $cc, $bcc, $attachment, $replyto, $replytoname);
>>>>>>> upstream/master
	}

	/**
	 * Sends mail to administrator for approval of a user submission
	 *
<<<<<<< HEAD
	 * @param   string  $adminName	Name of administrator
	 * @param   string  $adminEmail	Email address of administrator
	 * @param   string  $email		[NOT USED TODO: Deprecate?]
	 * @param   string  $type		Type of item to approve
	 * @param   string  $title		Title of item to approve
	 * @param   string  $author		Author of item to approve
	 *
	 * @return  boolean  True on success
	 *
	 * @deprecated  1.6
	 * @see			JMail::sendAdminMail()
	 */
	public static function sendAdminMail($adminName, $adminEmail, $email, $type, $title, $author, $url = null)
	{
		// Get a JMail instance
		$mail = JFactory::getMailer();

		return $mail->sendAdminMail(
			$adminName, $adminEmail, $email, $type, $title, $author, $url
		);
=======
	 * @param   string  $adminName   Name of administrator
	 * @param   string  $adminEmail  Email address of administrator
	 * @param   string  $email       [NOT USED]
	 * @param   string  $type        Type of item to approve
	 * @param   string  $title       Title of item to approve
	 * @param   string  $author      Author of item to approve
	 * @param   string  $url         url
	 *
	 * @return  boolean  True on success
	 *
	 * @deprecated  12.1
	 * @see     JMail::sendAdminMail()
	 * @since   11.1
	 */
	public static function sendAdminMail($adminName, $adminEmail, $email, $type, $title, $author, $url = null)
	{
		// Deprecation warning.
		JLog::add('JUtility::sendAdminMail() is deprecated.', JLog::WARNING, 'deprecated');

		// Get a JMail instance
		$mail = JFactory::getMailer();

		return $mail->sendAdminMail($adminName, $adminEmail, $email, $type, $title, $author, $url);
>>>>>>> upstream/master
	}

	/**
	 * Provides a secure hash based on a seed
	 *
	 * @param   string  $seed  Seed string.
	 *
	 * @return  string
	 *
<<<<<<< HEAD
	 * @deprecated  1.6
	 * @see			JApplication:getHash()
	 */
	public static function getHash($seed)
	{
		$conf = JFactory::getConfig();

		return md5($conf->get('secret').$seed);
=======
	 * @deprecated  12.1
	 * @see     JApplication:getHash()
	 * @since   11.1
	 */
	public static function getHash($seed)
	{
		// Deprecation warning.
		JLog::add('JUtility::getHash() is deprecated.', JLog::WARNING, 'deprecated');

		$conf = JFactory::getConfig();

		return md5($conf->get('secret') . $seed);
>>>>>>> upstream/master
	}

	/**
	 * Method to determine a hash for anti-spoofing variable names
	 *
<<<<<<< HEAD
	 * @return  string  Hashed var name
	 *
	 * @since       11.1
	 * @deprecated  1.6
	 * @see			JApplication:getHash()
	 */
	public static function getToken($forceNew = false)
	{
=======
	 * @param   boolean  $forceNew  Force creation of a new token.
	 *
	 * @return  string   Hashed var name
	 *
	 * @deprecated  12.1
	 * @see     JApplication:getHash()
	 * @since   11.1
	 */
	public static function getToken($forceNew = false)
	{
		// Deprecation warning.
		JLog::add('JUtility::getToken() is deprecated.', JLog::WARNING, 'deprecated');

>>>>>>> upstream/master
		$session = JFactory::getSession();

		return $session->getFormToken($forceNew);
	}

	/**
	 * Method to extract key/value pairs out of a string with XML style attributes
	 *
	 * @param   string  $string  String containing XML style attributes
	 *
	 * @return  array  Key/Value pairs for the attributes
	 *
<<<<<<< HEAD
	 * @since       11.1
=======
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public static function parseAttributes($string)
	{
		// Initialise variables.
<<<<<<< HEAD
		$attr		= array();
		$retarray	= array();
=======
		$attr = array();
		$retarray = array();
>>>>>>> upstream/master

		// Let's grab all the key/value pairs using a regular expression
		preg_match_all('/([\w:-]+)[\s]?=[\s]?"([^"]*)"/i', $string, $attr);

<<<<<<< HEAD
		if (is_array($attr)) {
=======
		if (is_array($attr))
		{
>>>>>>> upstream/master
			$numPairs = count($attr[1]);
			for ($i = 0; $i < $numPairs; $i++)
			{
				$retarray[$attr[1][$i]] = $attr[2][$i];
			}
		}

		return $retarray;
	}

	/**
<<<<<<< HEAD
	 * Method to determine if the host OS is  Windows
	 *
	 * @return  boolean  True if Windows OS.
	 *
	 * @since       11.1
	 * @deprecated  1.6
	 * @see			JApplication::isWinOS()
	 */
	public static function isWinOS()
	{
=======
	 * Method to determine if the host OS is Windows.
	 *
	 * @return  boolean  True if Windows OS.
	 *
	 * @deprecated  12.1
	 * @see     JApplication::isWinOS()
	 * @since   11.1
	 */
	public static function isWinOS()
	{
		// Deprecation warning.
		JLog::add('JUtility::isWinOS() is deprecated.', JLog::WARNING, 'deprecated');

>>>>>>> upstream/master
		$application = JFactory::getApplication();

		return $application->isWinOS();
	}

	/**
	 * Method to dump the structure of a variable for debugging purposes
	 *
<<<<<<< HEAD
	 * @param   mixed    $var		A variable
	 * @param   boolean  $htmlSafe	True to ensure all characters are htmlsafe
	 *
	 * @return  string
	 *
	 * @since       11.1
	 * @deprecated  1.6
	 */
	public static function dump(&$var, $htmlSafe = true)
	{
		$result = var_export($var, true);

		return '<pre>'.($htmlSafe ? htmlspecialchars($result, ENT_COMPAT, 'UTF-8') : $result).'</pre>';
=======
	 * @param   mixed    &$var      A variable
	 * @param   boolean  $htmlSafe  True to ensure all characters are htmlsafe
	 *
	 * @return  string
	 *
	 * @deprecated  12.1
	 * @since   11.1
	 */
	public static function dump(&$var, $htmlSafe = true)
	{
		// Deprecation warning.
		JLog::add('JUtility::dump() is deprecated.', JLog::WARNING, 'deprecated');

		$result = var_export($var, true);

		return '<pre>' . ($htmlSafe ? htmlspecialchars($result, ENT_COMPAT, 'UTF-8') : $result) . '</pre>';
>>>>>>> upstream/master
	}

	/**
	 * Prepend a reference to an element to the beginning of an array.
	 * Renumbers numeric keys, so $value is always inserted to $array[0]
	 *
<<<<<<< HEAD
	 * @param   $array array
	 * @param   $value mixed
	 *
	 * @return  integer
	 *
	 * @since       11.1
	 * @deprecated  1.6
	 * @see			http://www.php.net/manual/en/function.array-unshift.php#40270
	 */
	function array_unshift_ref(&$array, &$value)
	{
		$return = array_unshift($array,'');
=======
	 * @param   array  &$array  Array to be modified
	 * @param   mixed  &$value  Value to add
	 *
	 * @return  integer
	 *
	 * @deprecated  12.1
	 * @see     http://www.php.net/manual/en/function.array-unshift.php#40270
	 * @note     PHP no longer supports array_unshift of references.
	 * @since   11.1
	 */
	function array_unshift_ref(&$array, &$value)
	{

		// Deprecation warning.
		JLog::add('JUtility::array_unshift_ref() is deprecated.', JLog::WARNING, 'deprecated');

		$return = array_unshift($array, '');
>>>>>>> upstream/master
		$array[0] = &$value;

		return $return;
	}

	/**
	 * Return the byte value of a particular string
	 *
	 * @param   string  $val  String optionally with G, M or K suffix
	 *
<<<<<<< HEAD
	 * @return  integer  size in bytes
	 *
	 * @since       11.1
	 * @deprecated  1.6
	 * @see			JHtmlNumber::bytes
	 */
	function return_bytes($val)
	{
		$val = trim($val);
		$last = strtolower($val{strlen($val)-1});

		switch($last)
=======
	 * @return  integer  Size in bytes
	 *
	 * @deprecated  12.1
	 * @see     JHtmlNumber::bytes
	 * @since   11.1
	 */
	function return_bytes($val)
	{
		// Deprecation warning.
		JLog::add('JUtility::return_bytes() is deprecated.', JLog::WARNING, 'deprecated');

		$val = trim($val);
		$last = strtolower($val{strlen($val) - 1});

		switch ($last)
>>>>>>> upstream/master
		{
			// The 'G' modifier is available since PHP 5.1.0
			case 'g':
				$val *= 1024;
			case 'm':
				$val *= 1024;
			case 'k':
				$val *= 1024;
		}

		return $val;
	}
}
