<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Mail
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
 * Email helper class, provides static methods to perform various tasks relevant
 * to the Joomla email routines.
 *
 * TODO: Test these methods as the regex work is first run and not tested thoroughly
 *
 * @package     Joomla.Platform
 * @subpackage  Mail
 * @since       11.1
 */
abstract class JMailHelper
{
	/**
	 * Cleans single line inputs.
	 *
<<<<<<< HEAD
	 * @param   string  $value	String to be cleaned.
	 * @return  string  Cleaned string.
=======
	 * @param   string  $value  String to be cleaned.
	 *
	 * @return  string  Cleaned string.
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public static function cleanLine($value)
	{
		return trim(preg_replace('/(%0A|%0D|\n+|\r+)/i', '', $value));
	}

	/**
	 * Cleans multi-line inputs.
	 *
<<<<<<< HEAD
	 * @param   string  $value	Multi-line string to be cleaned.
	 * @return  string  Cleaned multi-line string.
=======
	 * @param   string  $value  Multi-line string to be cleaned.
	 *
	 * @return  string  Cleaned multi-line string.
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public static function cleanText($value)
	{
		return trim(preg_replace('/(%0A|%0D|\n+|\r+)(content-type:|to:|cc:|bcc:)/i', '', $value));
	}

	/**
	 * Cleans any injected headers from the email body.
	 *
<<<<<<< HEAD
	 * @param   string  $body	email body string.
	 * @return  string  Cleaned email body string.
=======
	 * @param   string  $body  email body string.
	 *
	 * @return  string  Cleaned email body string.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function cleanBody($body)
	{
		// Strip all email headers from a string
		return preg_replace("/((From:|To:|Cc:|Bcc:|Subject:|Content-type:) ([\S]+))/", "", $body);
	}

	/**
	 * Cleans any injected headers from the subject string.
	 *
<<<<<<< HEAD
	 * @param   string  $subject	email subject string.
	 * @return  string  Cleaned email subject string.
=======
	 * @param   string  $subject  email subject string.
	 *
	 * @return  string  Cleaned email subject string.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function cleanSubject($subject)
	{
		return preg_replace("/((From:|To:|Cc:|Bcc:|Content-type:) ([\S]+))/", "", $subject);
	}

	/**
	 * Verifies that an email address does not have any extra headers injected into it.
	 *
<<<<<<< HEAD
	 * @param   string  $address	email address.
	 * @return  string  false	email address string or boolean false if injected headers are present.
=======
	 * @param   string  $address  email address.
	 *
	 * @return  mixed   email address string or boolean false if injected headers are present.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function cleanAddress($address)
	{
<<<<<<< HEAD
		if (preg_match("[\s;,]", $address)) {
=======
		if (preg_match("[\s;,]", $address))
		{
>>>>>>> upstream/master
			return false;
		}
		return $address;
	}

	/**
	 * Verifies that the string is in a proper email address format.
	 *
<<<<<<< HEAD
	 * @param   string   $email	String to be verified.
	 * @return  boolean  True if string has the correct format; false otherwise.
=======
	 * @param   string  $email  String to be verified.
	 *
	 * @return  boolean  True if string has the correct format; false otherwise.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function isEmailAddress($email)
	{
		// Split the email into a local and domain
<<<<<<< HEAD
		$atIndex	= strrpos($email, "@");
		$domain		= substr($email, $atIndex+1);
		$local		= substr($email, 0, $atIndex);

		// Check Length of domain
		$domainLen	= strlen($domain);
		if ($domainLen < 1 || $domainLen > 255) {
=======
		$atIndex = strrpos($email, "@");
		$domain = substr($email, $atIndex + 1);
		$local = substr($email, 0, $atIndex);

		// Check Length of domain
		$domainLen = strlen($domain);
		if ($domainLen < 1 || $domainLen > 255)
		{
>>>>>>> upstream/master
			return false;
		}

		// Check the local address
		// We're a bit more conservative about what constitutes a "legal" address, that is, A-Za-z0-9!#$%&\'*+/=?^_`{|}~-
		// Also, the last character in local cannot be a period ('.')
<<<<<<< HEAD
		$allowed	= 'A-Za-z0-9!#&*+=?_-';
		$regex		= "/^[$allowed][\.$allowed]{0,63}$/";
		if (!preg_match($regex, $local) || substr($local, -1) == '.') {
=======
		$allowed = 'A-Za-z0-9!#&*+=?_-';
		$regex = "/^[$allowed][\.$allowed]{0,63}$/";
		if (!preg_match($regex, $local) || substr($local, -1) == '.')
		{
>>>>>>> upstream/master
			return false;
		}

		// No problem if the domain looks like an IP address, ish
<<<<<<< HEAD
		$regex		= '/^[0-9\.]+$/';
		if (preg_match($regex, $domain)) {
=======
		$regex = '/^[0-9\.]+$/';
		if (preg_match($regex, $domain))
		{
>>>>>>> upstream/master
			return true;
		}

		// Check Lengths
<<<<<<< HEAD
		$localLen	= strlen($local);
		if ($localLen < 1 || $localLen > 64) {
=======
		$localLen = strlen($local);
		if ($localLen < 1 || $localLen > 64)
		{
>>>>>>> upstream/master
			return false;
		}

		// Check the domain
<<<<<<< HEAD
		$domain_array	= explode(".", rtrim($domain, '.'));
		$regex		= '/^[A-Za-z0-9-]{0,63}$/';
		foreach ($domain_array as $domain) {

			// Must be something
			if (!$domain) {
=======
		$domain_array = explode(".", rtrim($domain, '.'));
		$regex = '/^[A-Za-z0-9-]{0,63}$/';
		foreach ($domain_array as $domain)
		{

			// Must be something
			if (!$domain)
			{
>>>>>>> upstream/master
				return false;
			}

			// Check for invalid characters
<<<<<<< HEAD
			if (!preg_match($regex, $domain)) {
=======
			if (!preg_match($regex, $domain))
			{
>>>>>>> upstream/master
				return false;
			}

			// Check for a dash at the beginning of the domain
<<<<<<< HEAD
			if (strpos($domain, '-') === 0) {
=======
			if (strpos($domain, '-') === 0)
			{
>>>>>>> upstream/master
				return false;
			}

			// Check for a dash at the end of the domain
<<<<<<< HEAD
			$length = strlen($domain) -1;
			if (strpos($domain, '-', $length) === $length) {
=======
			$length = strlen($domain) - 1;
			if (strpos($domain, '-', $length) === $length)
			{
>>>>>>> upstream/master
				return false;
			}
		}

		return true;
	}
}