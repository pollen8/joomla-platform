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
 * Viewlevels table class.
 *
 * @package     Joomla.Platform
 * @subpackage  Database
<<<<<<< HEAD
 * @version		1.0
=======
 * @since       11.1
>>>>>>> upstream/master
 */
class JTableViewlevel extends JTable
{
	/**
	 * Constructor
	 *
<<<<<<< HEAD
	 * @param   object  Database object
=======
	 * @param   object  &$db  Database object.
>>>>>>> upstream/master
	 *
	 * @return  JTableViewlevel
	 *
	 * @since   11.1
	 */
	public function __construct(&$db)
	{
		parent::__construct('#__viewlevels', 'id', $db);
	}

	/**
	 * Method to bind the data.
	 *
	 * @param   array  $array   The data to bind.
	 * @param   mixed  $ignore  An array or space separated list of fields to ignore.
	 *
<<<<<<< HEAD
	 * @return  bool  True on success, false on failure.
=======
	 * @return  boolean  True on success, false on failure.
>>>>>>> upstream/master
	 *
	 * @since   11.1
	 */
	public function bind($array, $ignore = '')
	{
		// Bind the rules as appropriate.
<<<<<<< HEAD
		if (isset($array['rules'])) {
			if (is_array($array['rules'])) {
=======
		if (isset($array['rules']))
		{
			if (is_array($array['rules']))
			{
>>>>>>> upstream/master
				$array['rules'] = json_encode($array['rules']);
			}
		}

		return parent::bind($array, $ignore);
	}

	/**
	 * Method to check the current record to save
	 *
	 * @return  boolean  True on success
	 *
	 * @since   11.1
	 */
	public function check()
	{
		// Validate the title.
<<<<<<< HEAD
		if ((trim($this->title)) == '') {
=======
		if ((trim($this->title)) == '')
		{
>>>>>>> upstream/master
			$this->setError(JText::_('JLIB_DATABASE_ERROR_VIEWLEVEL'));
			return false;
		}

		return true;
	}
<<<<<<< HEAD
}
=======
}
>>>>>>> upstream/master
