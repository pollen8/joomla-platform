<?php
/**
 * @package     Joomla.Platform
 * @subpackage  User
 *
 * @copyright   Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('JPATH_PLATFORM') or die;

/**
<<<<<<< HEAD
 * Authorization helper class, provides static methods to perform various tasks relevant
 * to the Joomla user and authorization classes
=======
 * Authorisation helper class, provides static methods to perform various tasks relevant
 * to the Joomla user and authorisation classes
>>>>>>> upstream/master
 *
 * This class has influences and some method logic from the Horde Auth package
 *
 * @package     Joomla.Platform
 * @subpackage  User
 * @since       11.1
 */
abstract class JUserHelper
{
	/**
	 * Method to add a user to a group.
	 *
<<<<<<< HEAD
	 * @param   integer  $userId		The id of the user.
	 * @param   integer  $groupId	The id of the group.
	 *
	 * @return  mixed    	Boolean true on success, JException on error.
=======
	 * @param   integer  $userId   The id of the user.
	 * @param   integer  $groupId  The id of the group.
	 *
	 * @return  mixed  Boolean true on success, Exception on error.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function addUserToGroup($userId, $groupId)
	{
		// Get the user object.
		$user = new JUser((int) $userId);

		// Add the user to the group if necessary.
		if (!in_array($groupId, $user->groups))
		{
			// Get the title of the group.
<<<<<<< HEAD
			$db	= JFactory::getDbo();
			$db->setQuery(
				'SELECT `title`' .
				' FROM `#__usergroups`' .
				' WHERE `id` = '. (int) $groupId
			);
			$title = $db->loadResult();

			// Check for a database error.
			if ($db->getErrorNum()) {
				return new JException($db->getErrorMsg());
			}

			// If the group does not exist, return an exception.
			if (!$title) {
				return new JException(JText::_('JLIB_USER_EXCEPTION_ACCESS_USERGROUP_INVALID'));
=======
			$db = JFactory::getDbo();
			$query = $db->getQuery(true);
			$query->select($db->quoteName('title'));
			$query->from($db->quoteName('#__usergroups'));
			$query->where($db->quoteName('id').' = ' . (int) $groupId);
			$db->setQuery($query);
			$title = $db->loadResult();

			// Check for a database error.
			if ($db->getErrorNum())
			{
				return new Exception($db->getErrorMsg());
			}

			// If the group does not exist, return an exception.
			if (!$title)
			{
				return new Exception(JText::_('JLIB_USER_EXCEPTION_ACCESS_USERGROUP_INVALID'));
>>>>>>> upstream/master
			}

			// Add the group data to the user object.
			$user->groups[$title] = $groupId;

			// Store the user object.
<<<<<<< HEAD
			if (!$user->save()) {
				return new JException($user->getError());
=======
			if (!$user->save())
			{
				return new Exception($user->getError());
>>>>>>> upstream/master
			}
		}

		// Set the group data for any preloaded user objects.
		$temp = JFactory::getUser((int) $userId);
		$temp->groups = $user->groups;

		// Set the group data for the user object in the session.
		$temp = JFactory::getUser();
<<<<<<< HEAD
		if ($temp->id == $userId) {
=======
		if ($temp->id == $userId)
		{
>>>>>>> upstream/master
			$temp->groups = $user->groups;
		}

		return true;
	}

	/**
	 * Method to get a list of groups a user is in.
	 *
<<<<<<< HEAD
	 * @param   integer  $userId		The id of the user.
	 * @return  mixed  Array on success, JException on error.
=======
	 * @param   integer  $userId  The id of the user.
	 *
	 * @return  mixed  Array on success, JException on error.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function getUserGroups($userId)
	{
		// Get the user object.
		$user = JUser::getInstance((int) $userId);

		return isset($user->groups) ? $user->groups : array();
	}

	/**
	 * Method to remove a user from a group.
	 *
<<<<<<< HEAD
	 * @param   integer  $userId		The id of the user.
	 * @param   integer  $groupId	The id of the group.
	 * @return  mixed  Boolean true on success, JException on error.
=======
	 * @param   integer  $userId   The id of the user.
	 * @param   integer  $groupId  The id of the group.
	 *
	 * @return  mixed  Boolean true on success, JException on error.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function removeUserFromGroup($userId, $groupId)
	{
		// Get the user object.
		$user = JUser::getInstance((int) $userId);

		// Remove the user from the group if necessary.
<<<<<<< HEAD
		if (in_array($groupId, $user->groups))
		{
			// Remove the user from the group.
			unset($user->groups[$groupId]);

			// Store the user object.
			if (!$user->save()) {
=======
		$key = array_search($groupId, $user->groups);
		if ($key !== false)
		{
			// Remove the user from the group.
			unset($user->groups[$key]);

			// Store the user object.
			if (!$user->save())
			{
>>>>>>> upstream/master
				return new JException($user->getError());
			}
		}

		// Set the group data for any preloaded user objects.
		$temp = JFactory::getUser((int) $userId);
		$temp->groups = $user->groups;

		// Set the group data for the user object in the session.
		$temp = JFactory::getUser();
<<<<<<< HEAD
		if ($temp->id == $userId) {
=======
		if ($temp->id == $userId)
		{
>>>>>>> upstream/master
			$temp->groups = $user->groups;
		}

		return true;
	}

	/**
	 * Method to set the groups for a user.
	 *
<<<<<<< HEAD
	 * @param   integer  $userId		The id of the user.
	 * @param   array    $groups		An array of group ids to put the user in.
	 *
	 * @return  mixed  Boolean true on success, JException on error.
=======
	 * @param   integer  $userId  The id of the user.
	 * @param   array    $groups  An array of group ids to put the user in.
	 *
	 * @return  mixed  Boolean true on success, Exception on error.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function setUserGroups($userId, $groups)
	{
		// Get the user object.
		$user = JUser::getInstance((int) $userId);

		// Set the group ids.
		JArrayHelper::toInteger($groups);
		$user->groups = $groups;

		// Get the titles for the user groups.
		$db = JFactory::getDbo();
<<<<<<< HEAD
		$db->setQuery(
			'SELECT `id`, `title`' .
			' FROM `#__usergroups`' .
			' WHERE `id` = '.implode(' OR `id` = ', $user->groups)
		);
		$results = $db->loadObjectList();

		// Check for a database error.
		if ($db->getErrorNum()) {
			return new JException($db->getErrorMsg());
		}

		// Set the titles for the user groups.
		for ($i = 0, $n = count($results); $i < $n; $i++) {
=======
		$query = $db->getQuery(true);
		$query->select($db->quoteName('id').', '.$db->quoteName('title'));
		$query->from($db->quoteName('#__usergroups'));
		$query->where($db->quoteName('id').' = ' . implode(' OR `id` = ', $user->groups));
		$db->setQuery($query);
		$results = $db->loadObjectList();

		// Check for a database error.
		if ($db->getErrorNum())
		{
			return new Exception($db->getErrorMsg());
		}

		// Set the titles for the user groups.
		for ($i = 0, $n = count($results); $i < $n; $i++)
		{
>>>>>>> upstream/master
			$user->groups[$results[$i]->id] = $results[$i]->title;
		}

		// Store the user object.
<<<<<<< HEAD
		if (!$user->save()) {
			return new JException($user->getError());
=======
		if (!$user->save())
		{
			return new Exception($user->getError());
>>>>>>> upstream/master
		}

		// Set the group data for any preloaded user objects.
		$temp = JFactory::getUser((int) $userId);
		$temp->groups = $user->groups;

		// Set the group data for the user object in the session.
		$temp = JFactory::getUser();
<<<<<<< HEAD
		if ($temp->id == $userId) {
=======
		if ($temp->id == $userId)
		{
>>>>>>> upstream/master
			$temp->groups = $user->groups;
		}

		return true;
	}

	/**
	 * Gets the user profile information
<<<<<<< HEAD
	 */
	function getProfile($userId = 0)
	{
		if ($userId == 0) {
			$user	= JFactory::getUser();
			$userId	= $user->id;
		}
		else {
			$user	= JFactory::getUser((int) $userId);
		}

		// Get the dispatcher and load the user's plugins.
		$dispatcher	= JDispatcher::getInstance();
=======
	 *
	 * @param   integer  $userId  The id of the user.
	 *
	 * @return  object
	 *
	 * @since   11.1
	 */
	function getProfile($userId = 0)
	{
		if ($userId == 0)
		{
			$user = JFactory::getUser();
			$userId = $user->id;
		}
		else
		{
			$user = JFactory::getUser((int) $userId);
		}

		// Get the dispatcher and load the user's plugins.
		$dispatcher = JDispatcher::getInstance();
>>>>>>> upstream/master
		JPluginHelper::importPlugin('user');

		$data = new JObject;

		// Trigger the data preparation event.
		$results = $dispatcher->trigger('onPrepareUserProfileData', array($userId, &$data));

		return $data;
	}

	/**
	 * Method to activate a user
	 *
<<<<<<< HEAD
	 * @param   string   $activation	Activation string
	 *
	 * @return  boolean  True on success
=======
	 * @param   string  $activation  Activation string
	 *
	 * @return  boolean  True on success
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function activateUser($activation)
	{
		// Initialize some variables.
		$db = JFactory::getDbo();
<<<<<<< HEAD

		// Let's get the id of the user we want to activate
		$query = 'SELECT id'
		. ' FROM #__users'
		. ' WHERE activation = '.$db->Quote($activation)
		. ' AND block = 1'
		. ' AND lastvisitDate = '.$db->Quote('0000-00-00 00:00:00');
		;
=======
		$query = $db->getQuery(true);

		// Let's get the id of the user we want to activate
		$query->select($db->quoteName('id'));
		$query->from($db->quoteName('#__users'));
		$query->where($db->quoteName('activation').' = ' . $db->quote($activation));
		$query->where($db->quoteName('block').' = 1');
		$query->where($db->quoteName('lastvisitDate').' = ' . $db->quote('0000-00-00 00:00:00'));
>>>>>>> upstream/master
		$db->setQuery($query);
		$id = intval($db->loadResult());

		// Is it a valid user to activate?
		if ($id)
		{
			$user = JUser::getInstance((int) $id);

			$user->set('block', '0');
			$user->set('activation', '');

			// Time to take care of business.... store the user.
			if (!$user->save())
			{
				JError::raiseWarning("SOME_ERROR_CODE", $user->getError());
				return false;
			}
		}
		else
		{
			JError::raiseWarning("SOME_ERROR_CODE", JText::_('JLIB_USER_ERROR_UNABLE_TO_FIND_USER'));
			return false;
		}

		return true;
	}

	/**
	 * Returns userid if a user exists
	 *
<<<<<<< HEAD
	 * @param   string The username to search on
	 *
	 * @return  integer  The user id or 0 if not found
=======
	 * @param   string  $username  The username to search on.
	 *
	 * @return  integer  The user id or 0 if not found.
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public static function getUserId($username)
	{
		// Initialise some variables
		$db = JFactory::getDbo();
<<<<<<< HEAD

		$query = 'SELECT id FROM #__users WHERE username = ' . $db->Quote($username);
=======
		$query = $db->getQuery(true);
		$query->select($db->quoteName('id'));
		$query->from($db->quoteName('#__users'));
		$query->where($db->quoteName('username').' = ' . $db->quote($username));
>>>>>>> upstream/master
		$db->setQuery($query, 0, 1);
		return $db->loadResult();
	}

	/**
	 * Formats a password using the current encryption.
	 *
<<<<<<< HEAD
	 * @param   string   $plaintext	The plaintext password to encrypt.
	 * @param   string   $salt		The salt to use to encrypt the password. []
	 *								If not present, a new salt will be
	 *								generated.
	 * @param   string   $encryption	The kind of pasword encryption to use.
	 *								Defaults to md5-hex.
	 * @param   boolean  $show_encrypt  Some password systems prepend the kind of
	 *								encryption to the crypted password ({SHA},
	 *								etc). Defaults to false.
	 *
	 * @return  string  The encrypted password.
=======
	 * @param   string   $plaintext     The plaintext password to encrypt.
	 * @param   string   $salt          The salt to use to encrypt the password. []
	 *                                  If not present, a new salt will be
	 *                                  generated.
	 * @param   string   $encryption    The kind of pasword encryption to use.
	 *                                  Defaults to md5-hex.
	 * @param   boolean  $show_encrypt  Some password systems prepend the kind of
	 *                                  encryption to the crypted password ({SHA},
	 *                                  etc). Defaults to false.
	 *
	 * @return  string  The encrypted password.
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public static function getCryptedPassword($plaintext, $salt = '', $encryption = 'md5-hex', $show_encrypt = false)
	{
		// Get the salt to use.
		$salt = JUserHelper::getSalt($encryption, $salt, $plaintext);

		// Encrypt the password.
		switch ($encryption)
		{
<<<<<<< HEAD
			case 'plain' :
				return $plaintext;

			case 'sha' :
				$encrypted = base64_encode(mhash(MHASH_SHA1, $plaintext));
				return ($show_encrypt) ? '{SHA}'.$encrypted : $encrypted;

			case 'crypt' :
			case 'crypt-des' :
			case 'crypt-md5' :
			case 'crypt-blowfish' :
				return ($show_encrypt ? '{crypt}' : '').crypt($plaintext, $salt);

			case 'md5-base64' :
				$encrypted = base64_encode(mhash(MHASH_MD5, $plaintext));
				return ($show_encrypt) ? '{MD5}'.$encrypted : $encrypted;

			case 'ssha' :
				$encrypted = base64_encode(mhash(MHASH_SHA1, $plaintext.$salt).$salt);
				return ($show_encrypt) ? '{SSHA}'.$encrypted : $encrypted;

			case 'smd5' :
				$encrypted = base64_encode(mhash(MHASH_MD5, $plaintext.$salt).$salt);
				return ($show_encrypt) ? '{SMD5}'.$encrypted : $encrypted;

			case 'aprmd5' :
				$length = strlen($plaintext);
				$context = $plaintext.'$apr1$'.$salt;
				$binary = JUserHelper::_bin(md5($plaintext.$salt.$plaintext));

				for ($i = $length; $i > 0; $i -= 16) {
					$context .= substr($binary, 0, ($i > 16 ? 16 : $i));
				}
				for ($i = $length; $i > 0; $i >>= 1) {
=======
			case 'plain':
				return $plaintext;

			case 'sha':
				$encrypted = base64_encode(mhash(MHASH_SHA1, $plaintext));
				return ($show_encrypt) ? '{SHA}' . $encrypted : $encrypted;

			case 'crypt':
			case 'crypt-des':
			case 'crypt-md5':
			case 'crypt-blowfish':
				return ($show_encrypt ? '{crypt}' : '') . crypt($plaintext, $salt);

			case 'md5-base64':
				$encrypted = base64_encode(mhash(MHASH_MD5, $plaintext));
				return ($show_encrypt) ? '{MD5}' . $encrypted : $encrypted;

			case 'ssha':
				$encrypted = base64_encode(mhash(MHASH_SHA1, $plaintext . $salt) . $salt);
				return ($show_encrypt) ? '{SSHA}' . $encrypted : $encrypted;

			case 'smd5':
				$encrypted = base64_encode(mhash(MHASH_MD5, $plaintext . $salt) . $salt);
				return ($show_encrypt) ? '{SMD5}' . $encrypted : $encrypted;

			case 'aprmd5':
				$length = strlen($plaintext);
				$context = $plaintext . '$apr1$' . $salt;
				$binary = JUserHelper::_bin(md5($plaintext . $salt . $plaintext));

				for ($i = $length; $i > 0; $i -= 16)
				{
					$context .= substr($binary, 0, ($i > 16 ? 16 : $i));
				}
				for ($i = $length; $i > 0; $i >>= 1)
				{
>>>>>>> upstream/master
					$context .= ($i & 1) ? chr(0) : $plaintext[0];
				}

				$binary = JUserHelper::_bin(md5($context));

<<<<<<< HEAD
				for ($i = 0; $i < 1000; $i ++) {
					$new = ($i & 1) ? $plaintext : substr($binary, 0, 16);
					if ($i % 3) {
						$new .= $salt;
					}
					if ($i % 7) {
=======
				for ($i = 0; $i < 1000; $i++)
				{
					$new = ($i & 1) ? $plaintext : substr($binary, 0, 16);
					if ($i % 3)
					{
						$new .= $salt;
					}
					if ($i % 7)
					{
>>>>>>> upstream/master
						$new .= $plaintext;
					}
					$new .= ($i & 1) ? substr($binary, 0, 16) : $plaintext;
					$binary = JUserHelper::_bin(md5($new));
				}

<<<<<<< HEAD
				$p = array ();
				for ($i = 0; $i < 5; $i ++) {
					$k = $i +6;
					$j = $i +12;
					if ($j == 16) {
=======
				$p = array();
				for ($i = 0; $i < 5; $i++)
				{
					$k = $i + 6;
					$j = $i + 12;
					if ($j == 16)
					{
>>>>>>> upstream/master
						$j = 5;
					}
					$p[] = JUserHelper::_toAPRMD5((ord($binary[$i]) << 16) | (ord($binary[$k]) << 8) | (ord($binary[$j])), 5);
				}

<<<<<<< HEAD
				return '$apr1$'.$salt.'$'.implode('', $p).JUserHelper::_toAPRMD5(ord($binary[11]), 3);

			case 'md5-hex' :
			default :
				$encrypted = ($salt) ? md5($plaintext.$salt) : md5($plaintext);
				return ($show_encrypt) ? '{MD5}'.$encrypted : $encrypted;
=======
				return '$apr1$' . $salt . '$' . implode('', $p) . JUserHelper::_toAPRMD5(ord($binary[11]), 3);

			case 'md5-hex':
			default:
				$encrypted = ($salt) ? md5($plaintext . $salt) : md5($plaintext);
				return ($show_encrypt) ? '{MD5}' . $encrypted : $encrypted;
>>>>>>> upstream/master
		}
	}

	/**
	 * Returns a salt for the appropriate kind of password encryption.
	 * Optionally takes a seed and a plaintext password, to extract the seed
	 * of an existing password, or for encryption types that use the plaintext
	 * in the generation of the salt.
	 *
<<<<<<< HEAD
	 * @param   string   $encryption  The kind of pasword encryption to use.
	 *							Defaults to md5-hex.
	 * @param   string   $seed		The seed to get the salt from (probably a
	 *							previously generated password). Defaults to
	 *							generating a new seed.
	 * @param   string   $plaintext	The plaintext password that we're generating
	 *							a salt for. Defaults to none.
	 *
	 * @return  string  The generated or extracted salt.
=======
	 * @param   string  $encryption  The kind of pasword encryption to use.
	 *                               Defaults to md5-hex.
	 * @param   string  $seed        The seed to get the salt from (probably a
	 *                               previously generated password). Defaults to
	 *                               generating a new seed.
	 * @param   string  $plaintext   The plaintext password that we're generating
	 *                               a salt for. Defaults to none.
	 *
	 * @return  string  The generated or extracted salt.
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public static function getSalt($encryption = 'md5-hex', $seed = '', $plaintext = '')
	{
		// Encrypt the password.
		switch ($encryption)
		{
<<<<<<< HEAD
			case 'crypt' :
			case 'crypt-des' :
				if ($seed) {
					return substr(preg_replace('|^{crypt}|i', '', $seed), 0, 2);
				} else {
=======
			case 'crypt':
			case 'crypt-des':
				if ($seed)
				{
					return substr(preg_replace('|^{crypt}|i', '', $seed), 0, 2);
				}
				else
				{
>>>>>>> upstream/master
					return substr(md5(mt_rand()), 0, 2);
				}
				break;

<<<<<<< HEAD
			case 'crypt-md5' :
				if ($seed) {
					return substr(preg_replace('|^{crypt}|i', '', $seed), 0, 12);
				} else {
					return '$1$'.substr(md5(mt_rand()), 0, 8).'$';
				}
				break;

			case 'crypt-blowfish' :
				if ($seed) {
					return substr(preg_replace('|^{crypt}|i', '', $seed), 0, 16);
				} else {
					return '$2$'.substr(md5(mt_rand()), 0, 12).'$';
				}
				break;

			case 'ssha' :
				if ($seed) {
					return substr(preg_replace('|^{SSHA}|', '', $seed), -20);
				} else {
=======
			case 'crypt-md5':
				if ($seed)
				{
					return substr(preg_replace('|^{crypt}|i', '', $seed), 0, 12);
				}
				else
				{
					return '$1$' . substr(md5(mt_rand()), 0, 8) . '$';
				}
				break;

			case 'crypt-blowfish':
				if ($seed)
				{
					return substr(preg_replace('|^{crypt}|i', '', $seed), 0, 16);
				}
				else
				{
					return '$2$' . substr(md5(mt_rand()), 0, 12) . '$';
				}
				break;

			case 'ssha':
				if ($seed)
				{
					return substr(preg_replace('|^{SSHA}|', '', $seed), -20);
				}
				else
				{
>>>>>>> upstream/master
					return mhash_keygen_s2k(MHASH_SHA1, $plaintext, substr(pack('h*', md5(mt_rand())), 0, 8), 4);
				}
				break;

<<<<<<< HEAD
			case 'smd5' :
				if ($seed) {
					return substr(preg_replace('|^{SMD5}|', '', $seed), -16);
				} else {
=======
			case 'smd5':
				if ($seed)
				{
					return substr(preg_replace('|^{SMD5}|', '', $seed), -16);
				}
				else
				{
>>>>>>> upstream/master
					return mhash_keygen_s2k(MHASH_MD5, $plaintext, substr(pack('h*', md5(mt_rand())), 0, 8), 4);
				}
				break;

<<<<<<< HEAD
			case 'aprmd5' :
				/* 64 characters that are valid for APRMD5 passwords. */
				$APRMD5 = './0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

				if ($seed) {
					return substr(preg_replace('/^\$apr1\$(.{8}).*/', '\\1', $seed), 0, 8);
				} else {
					$salt = '';
					for ($i = 0; $i < 8; $i ++) {
						$salt .= $APRMD5 {
							rand(0, 63)
							};
=======
			case 'aprmd5': /* 64 characters that are valid for APRMD5 passwords. */
				$APRMD5 = './0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

				if ($seed)
				{
					return substr(preg_replace('/^\$apr1\$(.{8}).*/', '\\1', $seed), 0, 8);
				}
				else
				{
					$salt = '';
					for ($i = 0; $i < 8; $i++)
					{
						$salt .= $APRMD5{rand(0, 63)};
>>>>>>> upstream/master
					}
					return $salt;
				}
				break;

<<<<<<< HEAD
			default :
				$salt = '';
				if ($seed) {
=======
			default:
				$salt = '';
				if ($seed)
				{
>>>>>>> upstream/master
					$salt = $seed;
				}
				return $salt;
				break;
		}
	}

	/**
	 * Generate a random password
	 *
<<<<<<< HEAD
	 * @param   integer  $length	Length of the password to generate
	 * @return  string  Random Password
=======
	 * @param   integer  $length  Length of the password to generate
	 *
	 * @return  string  Random Password
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function genRandomPassword($length = 8)
	{
		$salt = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$len = strlen($salt);
		$makepass = '';

		$stat = @stat(__FILE__);
<<<<<<< HEAD
		if (empty($stat) || !is_array($stat)) $stat = array(php_uname());

		mt_srand(crc32(microtime() . implode('|', $stat)));

		for ($i = 0; $i < $length; $i ++) {
			$makepass .= $salt[mt_rand(0, $len -1)];
=======
		if (empty($stat) || !is_array($stat))
		{
			$stat = array(php_uname());
		}

		mt_srand(crc32(microtime() . implode('|', $stat)));

		for ($i = 0; $i < $length; $i++)
		{
			$makepass .= $salt[mt_rand(0, $len - 1)];
>>>>>>> upstream/master
		}

		return $makepass;
	}

	/**
	 * Converts to allowed 64 characters for APRMD5 passwords.
	 *
<<<<<<< HEAD
	 * @param   string  $value
	 * @param   integer  $count
	 *
	 * @return  string  $value converted to the 64 MD5 characters.
=======
	 * @param   string   $value  The value to convert.
	 * @param   integer  $count  The number of characters to convert.
	 *
	 * @return  string  $value converted to the 64 MD5 characters.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected static function _toAPRMD5($value, $count)
	{
		/* 64 characters that are valid for APRMD5 passwords. */
		$APRMD5 = './0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

		$aprmd5 = '';
		$count = abs($count);
<<<<<<< HEAD
		while (-- $count) {
=======
		while (--$count)
		{
>>>>>>> upstream/master
			$aprmd5 .= $APRMD5[$value & 0x3f];
			$value >>= 6;
		}
		return $aprmd5;
	}

	/**
	 * Converts hexadecimal string to binary data.
	 *
<<<<<<< HEAD
	 * @param   string   $hex  Hex data.
	 *
	 * @return  string  Binary data.
=======
	 * @param   string  $hex  Hex data.
	 *
	 * @return  string  Binary data.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	private static function _bin($hex)
	{
		$bin = '';
		$length = strlen($hex);
<<<<<<< HEAD
		for ($i = 0; $i < $length; $i += 2) {
=======
		for ($i = 0; $i < $length; $i += 2)
		{
>>>>>>> upstream/master
			$tmp = sscanf(substr($hex, $i, 2), '%x');
			$bin .= chr(array_shift($tmp));
		}
		return $bin;
	}
}
