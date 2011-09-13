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

jimport('joomla.database.tableasset');

/**
 * Content table
 *
 * @package     Joomla.Platform
 * @subpackage  Table
 * @since       11.1
 */
class JTableContent extends JTable
{
	/**
<<<<<<< HEAD
	 * @param   database	A database connector object
=======
	 * Constructor
	 *
	 * @param   database  &$db  A database connector object
	 *
	 * @return  JTableContent
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	function __construct(&$db)
	{
		parent::__construct('#__content', 'id', $db);
	}

	/**
	 * Method to compute the default name of the asset.
<<<<<<< HEAD
	 * The default name is in the form `table_name.id`
	 * where id is the value of the primary key of the table.
	 *
	 * @return  string
=======
	 * The default name is in the form table_name.id
	 * where id is the value of the primary key of the table.
	 *
	 * @return  string
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function _getAssetName()
	{
		$k = $this->_tbl_key;
<<<<<<< HEAD
		return 'com_content.article.'.(int) $this->$k;
=======
		return 'com_content.article.' . (int) $this->$k;
>>>>>>> upstream/master
	}

	/**
	 * Method to return the title to use for the asset table.
	 *
	 * @return  string
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function _getAssetTitle()
	{
		return $this->title;
	}

	/**
<<<<<<< HEAD
	 * Get the parent asset id for the record
	 *
	 * @return   integer
=======
	 * Method to get the parent asset id for the record
	 *
	 * @param   JTable   $table  A JTable object (optional) for the asset parent
	 * @param   integer  $id     The id (optional) of the content.
	 *
	 * @return  integer
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function _getAssetParentId($table = null, $id = null)
	{
		// Initialise variables.
		$assetId = null;
		$db = $this->getDbo();

		// This is a article under a category.
<<<<<<< HEAD
		if ($this->catid) {
			// Build the query to get the asset id for the parent category.
			$query	= $db->getQuery(true);
			$query->select('asset_id');
			$query->from('#__categories');
			$query->where('id = '.(int) $this->catid);

			// Get the asset id from the database.
			$this->_db->setQuery($query);
			if ($result = $this->_db->loadResult()) {
=======
		if ($this->catid)
		{
			// Build the query to get the asset id for the parent category.
			$query = $db->getQuery(true);
			$query->select('asset_id');
			$query->from('#__categories');
			$query->where('id = ' . (int) $this->catid);

			// Get the asset id from the database.
			$this->_db->setQuery($query);
			if ($result = $this->_db->loadResult())
			{
>>>>>>> upstream/master
				$assetId = (int) $result;
			}
		}

		// Return the asset id.
<<<<<<< HEAD
		if ($assetId) {
			return $assetId;
		} else {
=======
		if ($assetId)
		{
			return $assetId;
		}
		else
		{
>>>>>>> upstream/master
			return parent::_getAssetParentId($table, $id);
		}
	}

	/**
	 * Overloaded bind function
	 *
<<<<<<< HEAD
	 * @param   array  $hash named array
	 *
	 * @return  null|string	null is operation was satisfactory, otherwise returns an error
	 * @see		JTable:bind
=======
	 * @param   array  $array   Named array
	 * @param   mixed  $ignore  An optional array or space separated list of properties
	 * to ignore while binding.
	 *
	 * @return  mixed  Null if operation was satisfactory, otherwise returns an error string
	 *
	 * @see     JTable:bind
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function bind($array, $ignore = '')
	{
		// Search for the {readmore} tag and split the text up accordingly.
<<<<<<< HEAD
		if (isset($array['articletext'])) {
			$pattern = '#<hr\s+id=("|\')system-readmore("|\')\s*\/*>#i';
			$tagPos	= preg_match($pattern, $array['articletext']);

			if ($tagPos == 0) {
				$this->introtext	= $array['articletext'];
				$this->fulltext         = '';
			} else {
				list($this->introtext, $this->fulltext) = preg_split($pattern, $array['articletext'], 2);
			}
		}

		if (isset($array['attribs']) && is_array($array['attribs'])) {
			$registry = new JRegistry();
			$registry->loadArray($array['attribs']);
			$array['attribs'] = (string)$registry;
		}

		if (isset($array['metadata']) && is_array($array['metadata'])) {
			$registry = new JRegistry();
			$registry->loadArray($array['metadata']);
			$array['metadata'] = (string)$registry;
		}

		// Bind the rules.
		if (isset($array['rules']) && is_array($array['rules'])) {
=======
		if (isset($array['articletext']))
		{
			$pattern = '#<hr\s+id=("|\')system-readmore("|\')\s*\/*>#i';
			$tagPos = preg_match($pattern, $array['articletext']);

			if ($tagPos == 0)
			{
				$this->introtext = $array['articletext'];
				$this->fulltext = '';
			}
			else
			{
				list ($this->introtext, $this->fulltext) = preg_split($pattern, $array['articletext'], 2);
			}
		}

		if (isset($array['attribs']) && is_array($array['attribs']))
		{
			$registry = new JRegistry;
			$registry->loadArray($array['attribs']);
			$array['attribs'] = (string) $registry;
		}

		if (isset($array['metadata']) && is_array($array['metadata']))
		{
			$registry = new JRegistry;
			$registry->loadArray($array['metadata']);
			$array['metadata'] = (string) $registry;
		}

		// Bind the rules.
		if (isset($array['rules']) && is_array($array['rules']))
		{
>>>>>>> upstream/master
			$rules = new JRules($array['rules']);
			$this->setRules($rules);
		}

		return parent::bind($array, $ignore);
	}

	/**
	 * Overloaded check function
	 *
<<<<<<< HEAD
	 * @return  boolean
	 * @see		JTable::check
=======
	 * @return  boolean  True on success, false on failure
	 *
	 * @see     JTable::check
>>>>>>> upstream/master
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
			$this->setError(JText::_('COM_CONTENT_WARNING_PROVIDE_VALID_NAME'));
			return false;
		}

<<<<<<< HEAD
		if (trim($this->alias) == '') {
=======
		if (trim($this->alias) == '')
		{
>>>>>>> upstream/master
			$this->alias = $this->title;
		}

		$this->alias = JApplication::stringURLSafe($this->alias);

<<<<<<< HEAD
		if (trim(str_replace('-','',$this->alias)) == '') {
			$this->alias = JFactory::getDate()->format('Y-m-d-H-i-s');
		}

		if (trim(str_replace('&nbsp;', '', $this->fulltext)) == '') {
			$this->fulltext = '';
		}

		if (trim($this->introtext) == '' && trim($this->fulltext) == '') {
=======
		if (trim(str_replace('-', '', $this->alias)) == '')
		{
			$this->alias = JFactory::getDate()->format('Y-m-d-H-i-s');
		}

		if (trim(str_replace('&nbsp;', '', $this->fulltext)) == '')
		{
			$this->fulltext = '';
		}

		if (trim($this->introtext) == '' && trim($this->fulltext) == '')
		{
>>>>>>> upstream/master
			$this->setError(JText::_('JGLOBAL_ARTICLE_MUST_HAVE_TEXT'));
			return false;
		}

		// Check the publish down date is not earlier than publish up.
<<<<<<< HEAD
		if ($this->publish_down > $this->_db->getNullDate() && $this->publish_down < $this->publish_up) {
=======
		if ($this->publish_down > $this->_db->getNullDate() && $this->publish_down < $this->publish_up)
		{
>>>>>>> upstream/master
			// Swap the dates.
			$temp = $this->publish_up;
			$this->publish_up = $this->publish_down;
			$this->publish_down = $temp;
		}

<<<<<<< HEAD
		// clean up keywords -- eliminate extra spaces between phrases
		// and cr (\r) and lf (\n) characters from string
		if (!empty($this->metakey)) {
			// only process if not empty
=======
		// Clean up keywords -- eliminate extra spaces between phrases
		// and cr (\r) and lf (\n) characters from string
		if (!empty($this->metakey))
		{
			// Only process if not empty
>>>>>>> upstream/master
			$bad_characters = array("\n", "\r", "\"", "<", ">"); // array of characters to remove
			$after_clean = JString::str_ireplace($bad_characters, "", $this->metakey); // remove bad characters
			$keys = explode(',', $after_clean); // create array using commas as delimiter
			$clean_keys = array();

<<<<<<< HEAD
			foreach($keys as $key) {
				if (trim($key)) {  // ignore blank keywords
=======
			foreach ($keys as $key)
			{
				if (trim($key))
				{
					// Ignore blank keywords
>>>>>>> upstream/master
					$clean_keys[] = trim($key);
				}
			}
			$this->metakey = implode(", ", $clean_keys); // put array back together delimited by ", "
		}

<<<<<<< HEAD

=======
>>>>>>> upstream/master
		return true;
	}

	/**
<<<<<<< HEAD
	 * Overriden JTable::store to set modified data and user id.
	 *
	 * @param   boolean  True to update fields even if they are null.
=======
	 * Overrides JTable::store to set modified data and user id.
	 *
	 * @param   boolean  $updateNulls  True to update fields even if they are null.
>>>>>>> upstream/master
	 *
	 * @return  boolean  True on success.
	 *
	 * @since   11.1
	 */
	public function store($updateNulls = false)
	{
<<<<<<< HEAD
		$date	= JFactory::getDate();
		$user	= JFactory::getUser();

		if ($this->id) {
			// Existing item
			$this->modified		= $date->toMySQL();
			$this->modified_by	= $user->get('id');
		} else {
			// New article. An article created and created_by field can be set by the user,
			// so we don't touch either of these if they are set.
			if (!intval($this->created)) {
				$this->created = $date->toMySQL();
			}

			if (empty($this->created_by)) {
				$this->created_by = $user->get('id');
			}
		}
	// Verify that the alias is unique
		$table = JTable::getInstance('Content','JTable');
		if ($table->load(array('alias'=>$this->alias,'catid'=>$this->catid)) && ($table->id != $this->id || $this->id==0)) {
=======
		$date = JFactory::getDate();
		$user = JFactory::getUser();

		if ($this->id)
		{
			// Existing item
			$this->modified = $date->toMySQL();
			$this->modified_by = $user->get('id');
		}
		else
		{
			// New article. An article created and created_by field can be set by the user,
			// so we don't touch either of these if they are set.
			if (!intval($this->created))
			{
				$this->created = $date->toMySQL();
			}

			if (empty($this->created_by))
			{
				$this->created_by = $user->get('id');
			}
		}
		// Verify that the alias is unique
		$table = JTable::getInstance('Content', 'JTable');
		if ($table->load(array('alias' => $this->alias, 'catid' => $this->catid)) && ($table->id != $this->id || $this->id == 0))
		{
>>>>>>> upstream/master
			$this->setError(JText::_('JLIB_DATABASE_ERROR_ARTICLE_UNIQUE_ALIAS'));
			return false;
		}
		return parent::store($updateNulls);
	}

	/**
	 * Method to set the publishing state for a row or list of rows in the database
<<<<<<< HEAD
	 * table.  The method respects checked out rows by other users and will attempt
	 * to checkin rows that it can after adjustments are made.
	 *
	 * @param   mixed    An optional array of primary key values to update.  If not
	 *					 set the instance property value is used.
	 * @param   integer  The publishing state. eg. [0 = unpublished, 1 = published]
	 * @param   integer  The user id of the user performing the operation.
	 *
	 * @return  bool  True on success.
=======
	 * table. The method respects checked out rows by other users and will attempt
	 * to checkin rows that it can after adjustments are made.
	 *
	 * @param   mixed    $pks     An optional array of primary key values to update.  If not set the instance property value is used.
	 * @param   integer  $state   The publishing state. eg. [0 = unpublished, 1 = published]
	 * @param   integer  $userId  The user id of the user performing the operation.
	 *
	 * @return  boolean  True on success.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function publish($pks = null, $state = 1, $userId = 0)
	{
		// Initialise variables.
		$k = $this->_tbl_key;

		// Sanitize input.
		JArrayHelper::toInteger($pks);
		$userId = (int) $userId;
<<<<<<< HEAD
		$state  = (int) $state;

		// If there are no primary keys set check to see if the instance key is set.
		if (empty($pks)) {
			if ($this->$k) {
				$pks = array($this->$k);
			}
			// Nothing to set publishing state on, return false.
			else {
=======
		$state = (int) $state;

		// If there are no primary keys set check to see if the instance key is set.
		if (empty($pks))
		{
			if ($this->$k)
			{
				$pks = array($this->$k);
			}
			// Nothing to set publishing state on, return false.
			else
			{
>>>>>>> upstream/master
				$this->setError(JText::_('JLIB_DATABASE_ERROR_NO_ROWS_SELECTED'));
				return false;
			}
		}

		// Build the WHERE clause for the primary keys.
<<<<<<< HEAD
		$where = $k.'='.implode(' OR '.$k.'=', $pks);

		// Determine if there is checkin support for the table.
		if (!property_exists($this, 'checked_out') || !property_exists($this, 'checked_out_time')) {
			$checkin = '';
		} else {
			$checkin = ' AND (checked_out = 0 OR checked_out = '.(int) $userId.')';
=======
		$where = $k . '=' . implode(' OR ' . $k . '=', $pks);

		// Determine if there is checkin support for the table.
		if (!property_exists($this, 'checked_out') || !property_exists($this, 'checked_out_time'))
		{
			$checkin = '';
		}
		else
		{
			$checkin = ' AND (checked_out = 0 OR checked_out = ' . (int) $userId . ')';
>>>>>>> upstream/master
		}

		// Update the publishing state for rows with the given primary keys.
		$this->_db->setQuery(
<<<<<<< HEAD
			'UPDATE '.$this->_db->quoteName($this->_tbl).
			' SET '.$this->_db->quoteName('state').' = '.(int) $state .
			' WHERE ('.$where.')' .
			$checkin
=======
			'UPDATE ' . $this->_db->quoteName($this->_tbl) .
			' SET ' . $this->_db->quoteName('state') . ' = ' . (int) $state . ' WHERE (' . $where . ')' . $checkin
>>>>>>> upstream/master
		);
		$this->_db->query();

		// Check for a database error.
<<<<<<< HEAD
		if ($this->_db->getErrorNum()) {
=======
		if ($this->_db->getErrorNum())
		{
>>>>>>> upstream/master
			$this->setError($this->_db->getErrorMsg());
			return false;
		}

		// If checkin is supported and all rows were adjusted, check them in.
<<<<<<< HEAD
		if ($checkin && (count($pks) == $this->_db->getAffectedRows())) {
			// Checkin the rows.
			foreach($pks as $pk) {
=======
		if ($checkin && (count($pks) == $this->_db->getAffectedRows()))
		{
			// Checkin the rows.
			foreach ($pks as $pk)
			{
>>>>>>> upstream/master
				$this->checkin($pk);
			}
		}

		// If the JTable instance value is in the list of primary keys that were set, set the instance.
<<<<<<< HEAD
		if (in_array($this->$k, $pks)) {
=======
		if (in_array($this->$k, $pks))
		{
>>>>>>> upstream/master
			$this->state = $state;
		}

		$this->setError('');

		return true;
	}

	/**
	 * Converts record to XML
	 *
<<<<<<< HEAD
	 * @param   bool  Map foreign keys to text values
	 * @since   11.1
	 */
	function toXML($mapKeysToText=false)
	{
		$db = JFactory::getDbo();

		if ($mapKeysToText) {
			$query = 'SELECT name'
			. ' FROM #__categories'
			. ' WHERE id = '. (int) $this->catid
			;
			$db->setQuery($query);
			$this->catid = $db->loadResult();

			$query = 'SELECT name'
			. ' FROM #__users'
			. ' WHERE id = ' . (int) $this->created_by
			;
=======
	 * @param   boolean  $mapKeysToText  Map foreign keys to text values
	 *
	 * @return  string    Record in XML format
	 *
	 * @since   11.1
	 */
	function toXML($mapKeysToText = false)
	{
		$db = JFactory::getDbo();

		if ($mapKeysToText)
		{
			$query = 'SELECT name' . ' FROM #__categories' . ' WHERE id = ' . (int) $this->catid;
			$db->setQuery($query);
			$this->catid = $db->loadResult();

			$query = 'SELECT name' . ' FROM #__users' . ' WHERE id = ' . (int) $this->created_by;
>>>>>>> upstream/master
			$db->setQuery($query);
			$this->created_by = $db->loadResult();
		}

		return parent::toXML($mapKeysToText);
	}
<<<<<<< HEAD
}
=======
}
>>>>>>> upstream/master
