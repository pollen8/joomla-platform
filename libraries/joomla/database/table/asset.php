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

jimport('joomla.database.tablenested');

/**
 * Table class supporting modified pre-order tree traversal behavior.
 *
 * @package     Joomla.Platform
 * @subpackage  Database
<<<<<<< HEAD
 * @since       11.1
 * @link		http://docs.joomla.org/JTableAsset
=======
 * @link        http://docs.joomla.org/JTableAsset
 * @since       11.1
>>>>>>> upstream/master
 */
class JTableAsset extends JTableNested
{
	/**
	 * The primary key of the asset.
	 *
<<<<<<< HEAD
	 * @var int
=======
	 * @var     integer
	 * @since  11.1
>>>>>>> upstream/master
	 */
	public $id = null;

	/**
	 * The unique name of the asset.
	 *
<<<<<<< HEAD
	 * @var string
=======
	 * @var    string
	 * @since  11.1
>>>>>>> upstream/master
	 */
	public $name = null;

	/**
	 * The human readable title of the asset.
	 *
	 * @var string
	 */
	public $title = null;

	/**
<<<<<<< HEAD
	 * @var	string
=======
	 * The rules for the asset stored in a JSON string
	 *
	 * @var    string
	 * @since  11.1
>>>>>>> upstream/master
	 */
	public $rules = null;

	/**
<<<<<<< HEAD
	 * @param database A database connector object
=======
	 * Constructor
	 *
	 * @param   database  &$db  A database connector object
	 *
	 * @return  JTableAsset
	 *
	 * @since  11.1
>>>>>>> upstream/master
	 */
	public function __construct(&$db)
	{
		parent::__construct('#__assets', 'id', $db);
	}

	/**
	 * Method to load an asset by it's name.
	 *
<<<<<<< HEAD
	 * @param   string  The name of the asset.
	 *
	 * @return  integer
=======
	 * @param   string  $name  The name of the asset.
	 *
	 * @return  integer
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function loadByName($name)
	{
		// Get the asset id for the asset.
		$this->_db->setQuery(
<<<<<<< HEAD
			'SELECT '.$this->_db->quoteName('id') .
			' FROM '.$this->_db->quoteName('#__assets') .
			' WHERE '.$this->_db->quoteName('name').' = '.$this->_db->Quote($name)
		);
		$assetId = (int) $this->_db->loadResult();
		if (empty($assetId)) {
=======
			'SELECT ' . $this->_db->quoteName('id') .
			' FROM ' . $this->_db->quoteName('#__assets') .
			' WHERE ' . $this->_db->quoteName('name') . ' = ' . $this->_db->Quote($name)
		);
		$assetId = (int) $this->_db->loadResult();
		if (empty($assetId))
		{
>>>>>>> upstream/master
			return false;
		}
		// Check for a database error.
		if ($error = $this->_db->getErrorMsg())
		{
			$this->setError($error);
			return false;
		}
		return $this->load($assetId);
	}

	/**
	 * Asset that the nested set data is valid.
	 *
<<<<<<< HEAD
	 * @return  bool  True if the instance is sane and able to be stored in the database.
=======
	 * @return  boolean  True if the instance is sane and able to be stored in the database.
>>>>>>> upstream/master
	 *
	 * @link	http://docs.joomla.org/JTable/check
	 * @since   11.1
	 */
	public function check()
	{
		$this->parent_id = (int) $this->parent_id;

		// JTableNested does not allow parent_id = 0, override this.
		if ($this->parent_id > 0)
		{
			$this->_db->setQuery(
<<<<<<< HEAD
				'SELECT COUNT(id)' .
				' FROM '.$this->_db->quoteName($this->_tbl).
				' WHERE '.$this->_db->quoteName('id').' = '.$this->parent_id
			);
			if ($this->_db->loadResult()) {
=======
				'SELECT COUNT(id)' . ' FROM ' . $this->_db->quoteName($this->_tbl) .
				' WHERE ' . $this->_db->quoteName('id') . ' = ' . $this->parent_id
			);
			if ($this->_db->loadResult())
			{
>>>>>>> upstream/master
				return true;
			}
			else
			{
<<<<<<< HEAD
				if ($error = $this->_db->getErrorMsg()) {
					$this->setError($error);
				}
				else {
=======
				if ($error = $this->_db->getErrorMsg())
				{
					$this->setError($error);
				}
				else
				{
>>>>>>> upstream/master
					$this->setError(JText::_('JLIB_DATABASE_ERROR_INVALID_PARENT_ID'));
				}
				return false;
			}
		}

		return true;
	}
<<<<<<< HEAD
}
=======
}
>>>>>>> upstream/master
