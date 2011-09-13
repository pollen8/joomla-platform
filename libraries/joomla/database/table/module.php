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
jimport('joomla.database.tableasset');

/**
 * Module table
 *
 * @package     Joomla.Platform
 * @subpackage  Table
 * @since       11.1
 */
class JTableModule extends JTable
{
	/**
	 * Contructor.
	 *
<<<<<<< HEAD
	 * @param database A database connector object
=======
	 * @param   database  &$db  A database connector object
	 *
	 * @return  JTableModule
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function __construct(&$db)
	{
		parent::__construct('#__modules', 'id', $db);

		$this->access = (int) JFactory::getConfig()->get('access');
	}

	/**
	 * Overloaded check function.
	 *
<<<<<<< HEAD
	 * @return  boolean  True if the object is ok
=======
	 * @return  boolean  True if the instance is sane and able to be stored in the database.
	 *
	 * @see     JTable::check()
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function check()
	{
		// check for valid name
<<<<<<< HEAD
		if (trim($this->title) == '') {
=======
		if (trim($this->title) == '')
		{
>>>>>>> upstream/master
			$this->setError(JText::_('JLIB_DATABASE_ERROR_MUSTCONTAIN_A_TITLE_MODULE'));
			return false;
		}

		// Check the publish down date is not earlier than publish up.
<<<<<<< HEAD
		if (intval($this->publish_down) > 0 && $this->publish_down < $this->publish_up) {
=======
		if (intval($this->publish_down) > 0 && $this->publish_down < $this->publish_up)
		{
>>>>>>> upstream/master
			// Swap the dates.
			$temp = $this->publish_up;
			$this->publish_up = $this->publish_down;
			$this->publish_down = $temp;
		}

		return true;
	}

	/**
	 * Overloaded bind function.
	 *
<<<<<<< HEAD
	 * @param   array  named array
	 *
	 * @return  null|string	null is operation was satisfactory, otherwise returns an error
	 *
	 * @see		JTable:bind
=======
	 * @param   array  $array   Named array.
	 * @param   mixed  $ignore  An optional array or space separated list of properties to ignore while binding.
	 *
	 * @return  mixed  Null if operation was satisfactory, otherwise returns an error
	 *
	 * @see     JTable:bind
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function bind($array, $ignore = '')
	{
<<<<<<< HEAD
		if (isset($array['params']) && is_array($array['params'])) {
			$registry = new JRegistry();
			$registry->loadArray($array['params']);
			$array['params'] = (string)$registry;
=======
		if (isset($array['params']) && is_array($array['params']))
		{
			$registry = new JRegistry;
			$registry->loadArray($array['params']);
			$array['params'] = (string) $registry;
>>>>>>> upstream/master
		}

		return parent::bind($array, $ignore);
	}
<<<<<<< HEAD
}
=======
}
>>>>>>> upstream/master
