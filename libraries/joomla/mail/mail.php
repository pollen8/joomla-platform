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

jimport('phpmailer.phpmailer');
jimport('joomla.mail.helper');

/**
<<<<<<< HEAD
 * Email Class.  Provides a common interface to send email from the Joomla! Framework
=======
 * Email Class.  Provides a common interface to send email from the Joomla! Platform
>>>>>>> upstream/master
 *
 * @package     Joomla.Platform
 * @subpackage  Mail
 * @since       11.1
 */
class JMail extends PHPMailer
{
	/**
	 * Constructor
	 */
	public function __construct()
	{
<<<<<<< HEAD
		// PHPMailer has an issue using the relative path for it's language files
		$this->SetLanguage('joomla', JPATH_PLATFORM.'/phpmailer/language/');
=======
		// PHPMailer has an issue using the relative path for its language files
		$this->SetLanguage('joomla', JPATH_PLATFORM . '/phpmailer/language/');
>>>>>>> upstream/master
	}

	/**
	 * Returns the global email object, only creating it
	 * if it doesn't already exist.
	 *
	 * NOTE: If you need an instance to use that does not have the global configuration
	 * values, use an id string that is not 'Joomla'.
	 *
	 * @param   string  $id  The id string for the JMail instance [optional]
	 *
<<<<<<< HEAD
	 * @return  object  The global JMail object
=======
	 * @return  JMail  The global JMail object
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function getInstance($id = 'Joomla')
	{
		static $instances;

<<<<<<< HEAD
		if (!isset ($instances)) {
			$instances = array ();
		}

		if (empty($instances[$id])) {
			$instances[$id] = new JMail();
=======
		if (!isset($instances))
		{
			$instances = array();
		}

		if (empty($instances[$id]))
		{
			$instances[$id] = new JMail;
>>>>>>> upstream/master
		}

		return $instances[$id];
	}

	/**
	 * Send the mail
	 *
	 * @return  mixed  True if successful, a JError object otherwise
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function Send()
	{
<<<<<<< HEAD
		if (($this->Mailer == 'mail') && ! function_exists('mail')) {
=======
		if (($this->Mailer == 'mail') && !function_exists('mail'))
		{
>>>>>>> upstream/master
			return JError::raiseNotice(500, JText::_('JLIB_MAIL_FUNCTION_DISABLED'));
		}

		@$result = parent::Send();

<<<<<<< HEAD
		if ($result == false) {
=======
		if ($result == false)
		{
>>>>>>> upstream/master
			// TODO: Set an appropriate error number
			$result = JError::raiseNotice(500, JText::_($this->ErrorInfo));
		}

		return $result;
	}

	/**
	 * Set the email sender
	 *
<<<<<<< HEAD
	 * @param   array  email address and Name of sender
	 *		<pre>
	 *			array([0] => email Address [1] => Name)
	 *		</pre>
	 *
	 * @return  object  JMail	Returns this object for chaining.
=======
	 * @param   array  $from  email address and Name of sender
	 *                        <code>array([0] => email Address [1] => Name)</code>
	 *
	 * @return  JMail  Returns this object for chaining.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function setSender($from)
	{
<<<<<<< HEAD
		if (is_array($from)) {
			// If $from is an array we assume it has an address and a name
			$this->From	= JMailHelper::cleanLine($from[0]);
			$this->FromName = JMailHelper::cleanLine($from[1]);

		}
		elseif (is_string($from)) {
			// If it is a string we assume it is just the address
			$this->From = JMailHelper::cleanLine($from);

		}
		else {
=======
		if (is_array($from))
		{
			// If $from is an array we assume it has an address and a name
			$this->SetFrom(JMailHelper::cleanLine($from[0]), JMailHelper::cleanLine($from[1]));
		}
		elseif (is_string($from))
		{
			// If it is a string we assume it is just the address
			$this->SetFrom(JMailHelper::cleanLine($from));
		}
		else
		{
>>>>>>> upstream/master
			// If it is neither, we throw a warning
			JError::raiseWarning(0, JText::sprintf('JLIB_MAIL_INVALID_EMAIL_SENDER', $from));
		}

		return $this;
	}

	/**
	 * Set the email subject
	 *
<<<<<<< HEAD
	 * @param   string   $subject	Subject of the email
	 *
	 * @return  object   JMail	Returns this object for chaining.
=======
	 * @param   string  $subject  Subject of the email
	 *
	 * @return  JMail  Returns this object for chaining.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function setSubject($subject)
	{
		$this->Subject = JMailHelper::cleanLine($subject);

		return $this;
	}

	/**
	 * Set the email body
	 *
<<<<<<< HEAD
	 * @param   string  $content	Body of the email
	 *
	 * @return  object  JMail	Returns this object for chaining.
=======
	 * @param   string  $content  Body of the email
	 *
	 * @return  JMail  Returns this object for chaining.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function setBody($content)
	{
		/*
		 * Filter the Body
		 * TODO: Check for XSS
		 */
		$this->Body = JMailHelper::cleanText($content);

		return $this;
	}

	/**
	 * Add recipients to the email
	 *
<<<<<<< HEAD
	 * @param   mixed  $recipient	Either a string or array of strings [email address(es)]
	 *
	 * @return  object  JMail	Returns this object for chaining.
	 * @since   11.1
	 */
	public function addRecipient($recipient)
	{
		// If the recipient is an array, add each recipient... otherwise just add the one
		if (is_array($recipient)) {
=======
	 * @param   mixed  $recipient  Either a string or array of strings [email address(es)]
	 * @param   mixed  $name       Either a string or array of strings [name(s)]
	 *
	 * @return  JMail  Returns this object for chaining.
	 *
	 * @since   11.1
	 */
	public function addRecipient($recipient, $name = '')
	{
		// If the recipient is an array, add each recipient... otherwise just add the one
		if (is_array($recipient))
		{
>>>>>>> upstream/master
			foreach ($recipient as $to)
			{
				$to = JMailHelper::cleanLine($to);
				$this->AddAddress($to);
			}
		}
<<<<<<< HEAD
		else {
=======
		else
		{
>>>>>>> upstream/master
			$recipient = JMailHelper::cleanLine($recipient);
			$this->AddAddress($recipient);
		}

		return $this;
	}

	/**
	 * Add carbon copy recipients to the email
	 *
<<<<<<< HEAD
	 * @param   mixed  $cc  Either a string or array of strings [email address(es)]
	 *
	 * @return  object  JMail	Returns this object for chaining.
	 * @since   11.1
	 */
	public function addCC($cc)
	{
		// If the carbon copy recipient is an array, add each recipient... otherwise just add the one
		if (isset ($cc)) {
			if (is_array($cc)) {
=======
	 * @param   mixed  $cc    Either a string or array of strings [email address(es)]
	 * @param   mixed  $name  Either a string or array of strings [name(s)]
	 *
	 * @return  JMail  Returns this object for chaining.
	 *
	 * @since   11.1
	 */
	public function addCC($cc, $name = '')
	{
		// If the carbon copy recipient is an array, add each recipient... otherwise just add the one
		if (isset($cc))
		{
			if (is_array($cc))
			{
>>>>>>> upstream/master
				foreach ($cc as $to)
				{
					$to = JMailHelper::cleanLine($to);
					parent::AddCC($to);
				}
			}
<<<<<<< HEAD
			else {
=======
			else
			{
>>>>>>> upstream/master
				$cc = JMailHelper::cleanLine($cc);
				parent::AddCC($cc);
			}
		}

		return $this;
	}

	/**
	 * Add blind carbon copy recipients to the email
	 *
<<<<<<< HEAD
	 * @param   mixed  $bcc	Either a string or array of strings [email address(es)]
	 *
	 * @return  object  JMail	Returns this object for chaining.
	 * @since   11.1
	 */
	public function addBCC($bcc)
	{
		// If the blind carbon copy recipient is an array, add each recipient... otherwise just add the one
		if (isset($bcc)) {
			if (is_array($bcc)) {
=======
	 * @param   mixed  $bcc   Either a string or array of strings [email address(es)]
	 * @param   mixed  $name  Either a string or array of strings [name(s)]
	 *
	 * @return  JMail  Returns this object for chaining.
	 *
	 * @since   11.1
	 */
	public function addBCC($bcc, $name = '')
	{
		// If the blind carbon copy recipient is an array, add each recipient... otherwise just add the one
		if (isset($bcc))
		{
			if (is_array($bcc))
			{
>>>>>>> upstream/master
				foreach ($bcc as $to)
				{
					$to = JMailHelper::cleanLine($to);
					parent::AddBCC($to);
				}
			}
<<<<<<< HEAD
			else {
=======
			else
			{
>>>>>>> upstream/master
				$bcc = JMailHelper::cleanLine($bcc);
				parent::AddBCC($bcc);
			}
		}

		return $this;
	}

	/**
	 * Add file attachments to the email
	 *
<<<<<<< HEAD
	 * @param   mixed  $attachment	Either a string or array of strings [filenames]
	 *
	 * @return  object  JMail	Returns this object for chaining.
	 * @since   11.1
	 */
	public function addAttachment($attachment)
	{
		// If the file attachments is an array, add each file... otherwise just add the one
		if (isset($attachment)) {
			if (is_array($attachment)) {
=======
	 * @param   mixed  $attachment  Either a string or array of strings [filenames]
	 * @param   mixed  $name        Either a string or array of strings [names]
	 * @param   mixed  $encoding    The encoding of the attachment
	 * @param   mixed  $type        The mime type
	 *
	 * @return  JMail  Returns this object for chaining.
	 *
	 * @since   11.1
	 */
	public function addAttachment($attachment, $name = '', $encoding = 'base64', $type = 'application/octet-stream')
	{
		// If the file attachments is an array, add each file... otherwise just add the one
		if (isset($attachment))
		{
			if (is_array($attachment))
			{
>>>>>>> upstream/master
				foreach ($attachment as $file)
				{
					parent::AddAttachment($file);
				}
			}
<<<<<<< HEAD
			else {
=======
			else
			{
>>>>>>> upstream/master
				parent::AddAttachment($attachment);
			}
		}

		return $this;
	}

	/**
	 * Add Reply to email address(es) to the email
	 *
<<<<<<< HEAD
	 * @param   array  $replyto	Either an array or multi-array of form
	 *		<pre>
	 *			array([0] => email Address [1] => Name)
	 *		</pre>
	 *
	 * @return  object  JMail	Returns this object for chaining.
	 * @since   11.1
	 */
	public function addReplyTo($replyto)
	{
		// Take care of reply email addresses
		if (is_array($replyto[0])) {
=======
	 * @param   array  $replyto  Either an array or multi-array of form
	 *                           <code>array([0] => email Address [1] => Name)</code>
	 * @param   array  $name     Either an array or single string
	 *
	 * @return  JMail  Returns this object for chaining.
	 *
	 * @since   11.1
	 */
	public function addReplyTo($replyto, $name = '')
	{
		// Take care of reply email addresses
		if (is_array($replyto[0]))
		{
>>>>>>> upstream/master
			foreach ($replyto as $to)
			{
				$to0 = JMailHelper::cleanLine($to[0]);
				$to1 = JMailHelper::cleanLine($to[1]);
				parent::AddReplyTo($to0, $to1);
			}
		}
<<<<<<< HEAD
		else {
=======
		else
		{
>>>>>>> upstream/master
			$replyto0 = JMailHelper::cleanLine($replyto[0]);
			$replyto1 = JMailHelper::cleanLine($replyto[1]);
			parent::AddReplyTo($replyto0, $replyto1);
		}

		return $this;
	}

	/**
	 * Use sendmail for sending the email
	 *
<<<<<<< HEAD
	 * @param   string   $sendmail	Path to sendmail [optional]
	 * @return  boolean  True on success
=======
	 * @param   string  $sendmail  Path to sendmail [optional]
	 *
	 * @return  boolean  True on success
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function useSendmail($sendmail = null)
	{
		$this->Sendmail = $sendmail;

<<<<<<< HEAD
		if (!empty ($this->Sendmail)) {
=======
		if (!empty($this->Sendmail))
		{
>>>>>>> upstream/master
			$this->IsSendmail();

			return true;
		}
<<<<<<< HEAD
		else {
=======
		else
		{
>>>>>>> upstream/master
			$this->IsMail();

			return false;
		}
	}

	/**
	 * Use SMTP for sending the email
	 *
<<<<<<< HEAD
	 * @param   string   $auth	SMTP Authentication [optional]
	 * @param   string   $host	SMTP Host [optional]
	 * @param   string   $user	SMTP Username [optional]
	 * @param   string   $pass	SMTP Password [optional]
	 * @param   string   $secure
	 * @param   integer  $port
	 *
	 * @return  boolean  True on success
=======
	 * @param   string   $auth    SMTP Authentication [optional]
	 * @param   string   $host    SMTP Host [optional]
	 * @param   string   $user    SMTP Username [optional]
	 * @param   string   $pass    SMTP Password [optional]
	 * @param   string   $secure  Use secure methods
	 * @param   integer  $port    The SMTP port
	 *
	 * @return  boolean  True on success
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function useSMTP($auth = null, $host = null, $user = null, $pass = null, $secure = null, $port = 25)
	{
		$this->SMTPAuth = $auth;
<<<<<<< HEAD
		$this->Host		= $host;
		$this->Username = $user;
		$this->Password = $pass;
		$this->Port		= $port;

		if ($secure == 'ssl' || $secure == 'tls') {
=======
		$this->Host = $host;
		$this->Username = $user;
		$this->Password = $pass;
		$this->Port = $port;

		if ($secure == 'ssl' || $secure == 'tls')
		{
>>>>>>> upstream/master
			$this->SMTPSecure = $secure;
		}

		if (($this->SMTPAuth !== null && $this->Host !== null && $this->Username !== null && $this->Password !== null)
<<<<<<< HEAD
			|| ($this->SMTPAuth === null && $this->Host !== null)) {
=======
			|| ($this->SMTPAuth === null && $this->Host !== null))
		{
>>>>>>> upstream/master
			$this->IsSMTP();

			return true;
		}
<<<<<<< HEAD
		else {
=======
		else
		{
>>>>>>> upstream/master
			$this->IsMail();

			return false;
		}
	}

	/**
	 * Function to send an email
	 *
<<<<<<< HEAD
	 * @param   string   $from			From email address
	 * @param   string   $fromName		From name
	 * @param   mixed    $recipient		Recipient email address(es)
	 * @param   string   $subject		email subject
	 * @param   string   $body			Message body
	 * @param   boolean  $mode			false = plain text, true = HTML
	 * @param   mixed    $cc				CC email address(es)
	 * @param   mixed    $bcc			BCC email address(es)
	 * @param   mixed    $attachment		Attachment file name(s)
	 * @param   mixed    $replyTo		Reply to email address(es)
	 * @param   mixed    $replyToName	Reply to name(s)
	 *
	 * @return  boolean  True on success
	 * @since   11.1
	 */
	public function sendMail($from, $fromName, $recipient, $subject, $body, $mode=0,
		$cc=null, $bcc=null, $attachment=null, $replyTo=null, $replyToName=null)
=======
	 * @param   string   $from         From email address
	 * @param   string   $fromName     From name
	 * @param   mixed    $recipient    Recipient email address(es)
	 * @param   string   $subject      email subject
	 * @param   string   $body         Message body
	 * @param   boolean  $mode         false = plain text, true = HTML
	 * @param   mixed    $cc           CC email address(es)
	 * @param   mixed    $bcc          BCC email address(es)
	 * @param   mixed    $attachment   Attachment file name(s)
	 * @param   mixed    $replyTo      Reply to email address(es)
	 * @param   mixed    $replyToName  Reply to name(s)
	 *
	 * @return  boolean  True on success
	 *
	 * @since   11.1
	 */
	public function sendMail($from, $fromName, $recipient, $subject, $body, $mode = 0, $cc = null, $bcc = null, $attachment = null, $replyTo = null,
		$replyToName = null)
>>>>>>> upstream/master
	{
		$this->setSender(array($from, $fromName));
		$this->setSubject($subject);
		$this->setBody($body);

		// Are we sending the email as HTML?
<<<<<<< HEAD
		if ($mode) {
=======
		if ($mode)
		{
>>>>>>> upstream/master
			$this->IsHTML(true);
		}

		$this->addRecipient($recipient);
		$this->addCC($cc);
		$this->addBCC($bcc);
		$this->addAttachment($attachment);

		// Take care of reply email addresses
<<<<<<< HEAD
		if (is_array($replyTo)) {
=======
		if (is_array($replyTo))
		{
>>>>>>> upstream/master
			$numReplyTo = count($replyTo);

			for ($i = 0; $i < $numReplyTo; $i++)
			{
				$this->addReplyTo(array($replyTo[$i], $replyToName[$i]));
			}
		}
<<<<<<< HEAD
		else if (isset($replyTo)) {
			$this->addReplyTo(array($replyTo, $replyToName));
		}

		return  $this->Send();
=======
		else if (isset($replyTo))
		{
			$this->addReplyTo(array($replyTo, $replyToName));
		}

		return $this->Send();
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
	 * @param   string  $url
	 *
	 * @return  boolean  True on success
=======
	 * @param   string  $adminName   Name of administrator
	 * @param   string  $adminEmail  Email address of administrator
	 * @param   string  $email       [NOT USED TODO: Deprecate?]
	 * @param   string  $type        Type of item to approve
	 * @param   string  $title       Title of item to approve
	 * @param   string  $author      Author of item to approve
	 * @param   string  $url         A URL to inclued in the mail
	 *
	 * @return  boolean  True on success
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function sendAdminMail($adminName, $adminEmail, $email, $type, $title, $author, $url = null)
	{
		$subject = JText::sprintf('JLIB_MAIL_USER_SUBMITTED', $type);

<<<<<<< HEAD
		$message = sprintf (JText::_('JLIB_MAIL_MSG_ADMIN'), $adminName, $type, $title, $author, $url, $url, 'administrator', $type);
		$message .= JText::_('JLIB_MAIL_MSG') ."\n";
=======
		$message = sprintf(JText::_('JLIB_MAIL_MSG_ADMIN'), $adminName, $type, $title, $author, $url, $url, 'administrator', $type);
		$message .= JText::_('JLIB_MAIL_MSG') . "\n";
>>>>>>> upstream/master

		$this->addRecipient($adminEmail);
		$this->setSubject($subject);
		$this->setBody($message);

		return $this->Send();
	}
}
