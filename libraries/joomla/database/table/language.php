<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Database
 *
 * @copyright   Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

<<<<<<< HEAD
defined('JPATH_PLATFORM') or die;
=======
defined('JPATH_PLATFORM') or die();
>>>>>>> upstream/master

jimport('joomla.database.table');

/**
 * Languages table.
 *
<<<<<<< HEAD
 * @package		Joomla.Administrator
 * @subpackage  com_languages
=======
 * @package     Joomla.Platform
 * @subpackage  Database
>>>>>>> upstream/master
 * @since       11.1
 */
class JTableLanguage extends JTable
{
	/**
	 * Constructor
	 *
<<<<<<< HEAD
	 * @param   JDatabase
=======
	 * @param   JDatabase  &$db  A database connector object
>>>>>>> upstream/master
	 *
	 * @return  JTableLanguage
	 *
	 * @since   11.1
	 */
	public function __construct(&$db)
	{
		parent::__construct('#__languages', 'lang_id', $db);
	}

	/**
	 * Overloaded check method to ensure data integrity
	 *
	 * @return  boolean  True on success
	 *
	 * @since   11.1
	 */
	public function check()
	{
<<<<<<< HEAD
		if (trim($this->title) == '') {
=======
		if (trim($this->title) == '')
		{
>>>>>>> upstream/master
			$this->setError(JText::_('JLIB_DATABASE_ERROR_LANGUAGE_NO_TITLE'));
			return false;
		}

		return true;
	}
}
