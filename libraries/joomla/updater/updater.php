<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Updater
 *
 * @copyright   Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('JPATH_PLATFORM') or die;

jimport('joomla.filesystem.file');
jimport('joomla.filesystem.folder');
jimport('joomla.filesystem.archive');
jimport('joomla.filesystem.path');
jimport('joomla.base.adapter');
<<<<<<< HEAD

/**
 * Updater Class
 * @package     Joomla.Platform
 * @subpackage  Update
 * @since       11.1
 */
class JUpdater extends JAdapter {

	/**
	 * Constructor
	 */
	public function __construct() {
		// Adapter base path, class prefix
		parent::__construct(dirname(__FILE__),'JUpdater');
=======
jimport('joomla.utilities.arrayhelper');
jimport('joomla.log.log');

/**
 * Updater Class
 *
 * @package     Joomla.Platform
 * @subpackage  Updater
 * @since       11.1
 */
class JUpdater extends JAdapter
{
	/**
	 * Constructor
	 *
	 * @return  JUpdater
	 *
	 * @since   11.1
	 */
	public function __construct()
	{
		// Adapter base path, class prefix
		parent::__construct(dirname(__FILE__), 'JUpdater');
>>>>>>> upstream/master
	}

	/**
	 * Returns a reference to the global Installer object, only creating it
	 * if it doesn't already exist.
	 *
	 * @return  object  An installer object
<<<<<<< HEAD
=======
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public static function &getInstance()
	{
		static $instance;

<<<<<<< HEAD
		if (!isset ($instance)) {
=======
		if (!isset($instance))
		{
>>>>>>> upstream/master
			$instance = new JUpdater;
		}
		return $instance;
	}

	/**
	 * Finds an update for an extension
	 *
<<<<<<< HEAD
	 * @param int Extension Identifier; if zero use all sites
	 *
	 * @return boolean If there are updates or not
	 */
	public function findUpdates($eid=0) {
		$dbo = $this->getDBO();
		$retval = false;
		// Push it into an array
		if(!is_array($eid)) {
			$query = 'SELECT DISTINCT update_site_id, type, location FROM #__update_sites WHERE enabled = 1';
		} else {
			$query = 'SELECT DISTINCT update_site_id, type, location FROM #__update_sites WHERE update_site_id IN (SELECT update_site_id FROM #__update_sites_extensions WHERE extension_id IN ('. implode(',', $eid) .'))';
=======
	 * @param   integer  $eid  Extension Identifier; if zero use all sites
	 *
	 * @return  boolean True if there are updates
	 *
	 * @since   11.1
	 */
	public function findUpdates($eid = 0)
	{
		// Check if fopen is allowed
		$result = ini_get('allow_url_fopen');
		if (empty($result))
		{
			JError::raiseWarning('101', JText::_('JLIB_UPDATER_ERROR_COLLECTION_FOPEN'));
			return false;
		}

		$dbo = $this->getDBO();
		$retval = false;
		// Push it into an array
		if (!is_array($eid))
		{
			$query = 'SELECT DISTINCT update_site_id, type, location FROM #__update_sites WHERE enabled = 1';
		}
		else
		{
			$query = 'SELECT DISTINCT update_site_id, type, location FROM #__update_sites' .
				' WHERE update_site_id IN' .
				'  (SELECT update_site_id FROM #__update_sites_extensions WHERE extension_id IN ('. implode(',', $eid) . '))';
>>>>>>> upstream/master
		}
		$dbo->setQuery($query);
		$results = $dbo->loadAssocList();
		$result_count = count($results);
<<<<<<< HEAD
		for($i = 0; $i < $result_count; $i++)
		{
			$result = &$results[$i];
			$this->setAdapter($result['type']);
			if(!isset($this->_adapters[$result['type']])) {
=======
		for ($i = 0; $i < $result_count; $i++)
		{
			$result = &$results[$i];
			$this->setAdapter($result['type']);
			if (!isset($this->_adapters[$result['type']]))
			{
>>>>>>> upstream/master
				// Ignore update sites requiring adapters we don't have installed
				continue;
			}
			$update_result = $this->_adapters[$result['type']]->findUpdate($result);
<<<<<<< HEAD
			if(is_array($update_result))
			{
				if(array_key_exists('update_sites',$update_result) && count($update_result['update_sites']))
				{
					$results = $this->arrayUnique(array_merge($results, $update_result['update_sites']));
					$result_count = count($results);
				}
				if(array_key_exists('updates', $update_result) && count($update_result['updates']))
				{
					for($k = 0, $count = count($update_result['updates']); $k < $count; $k++)
=======
			if (is_array($update_result))
			{
				if (array_key_exists('update_sites', $update_result) && count($update_result['update_sites']))
				{
					$results = JArrayHelper::arrayUnique(array_merge($results, $update_result['update_sites']));
					$result_count = count($results);
				}
				if (array_key_exists('updates', $update_result) && count($update_result['updates']))
				{
					for ($k = 0, $count = count($update_result['updates']); $k < $count; $k++)
>>>>>>> upstream/master
					{
						$current_update = &$update_result['updates'][$k];
						$update = JTable::getInstance('update');
						$extension = JTable::getInstance('extension');
<<<<<<< HEAD
						$uid = $update->find(Array('element'=>strtolower($current_update->get('element')),
								'type'=>strtolower($current_update->get('type')),
								'client_id'=>strtolower($current_update->get('client_id')),
								'folder'=>strtolower($current_update->get('folder'))));

						$eid = $extension->find(Array('element'=>strtolower($current_update->get('element')),
								'type'=>strtolower($current_update->get('type')),
								'client_id'=>strtolower($current_update->get('client_id')),
								'folder'=>strtolower($current_update->get('folder'))));
						if(!$uid)
						{
							// Set the extension id
							if($eid)
=======
						$uid = $update
							->find(
								array(
									'element' => strtolower($current_update->get('element')), 'type' => strtolower($current_update->get('type')),
									'client_id' => strtolower($current_update->get('client_id')),
									'folder' => strtolower($current_update->get('folder'))
								)
							);

						$eid = $extension
							->find(
								array(
									'element' => strtolower($current_update->get('element')), 'type' => strtolower($current_update->get('type')),
									'client_id' => strtolower($current_update->get('client_id')),
									'folder' => strtolower($current_update->get('folder'))
								)
							);
						if (!$uid)
						{
							// Set the extension id
							if ($eid)
>>>>>>> upstream/master
							{
								// We have an installed extension, check the update is actually newer
								$extension->load($eid);
								$data = json_decode($extension->manifest_cache, true);
<<<<<<< HEAD
								if(version_compare($current_update->version, $data['version'], '>') == 1)
=======
								if (version_compare($current_update->version, $data['version'], '>') == 1)
>>>>>>> upstream/master
								{
									$current_update->extension_id = $eid;
									$current_update->store();
								}
<<<<<<< HEAD
							} else
=======
							}
							else
>>>>>>> upstream/master
							{
								// A potentially new extension to be installed
								$current_update->store();
							}
<<<<<<< HEAD
						} else
						{
							$update->load($uid);
							// if there is an update, check that the version is newer then replaces
							if(version_compare($current_update->version, $update->version, '>') == 1)
=======
						}
						else
						{
							$update->load($uid);
							// if there is an update, check that the version is newer then replaces
							if (version_compare($current_update->version, $update->version, '>') == 1)
>>>>>>> upstream/master
							{
								$current_update->store();
							}
						}
					}
				}
				$update_result = true;
<<<<<<< HEAD
			} else if ($retval) {
=======
			}
			else if ($retval)
			{
>>>>>>> upstream/master
				$update_result = true;
			}
		}
		return $retval;
	}

	/**
	 * Multidimensional array safe unique test
<<<<<<< HEAD
	 * Borrowed from PHP.net
	 * @see http://au2.php.net/manual/en/function.array-unique.php
	 */
	public function arrayUnique($myArray)
	{
		if (!is_array($myArray)) {
			return $myArray;
		}

		foreach ($myArray as &$myvalue){
			$myvalue=serialize($myvalue);
		}

		$myArray=array_unique($myArray);

		foreach ($myArray as &$myvalue){
			$myvalue=unserialize($myvalue);
		}

		return $myArray;
	}

=======
	 *
	 * @param   array  $myArray  The source array.
	 *
	 * @return  array
	 *
	 * @deprecated    12.1
	 * @note    Use JArrayHelper::arrayUnique() instead.
	 * @note    Borrowed from PHP.net
	 * @see     http://au2.php.net/manual/en/function.array-unique.php
	 * @since   11.1
	 *
	 */
	public function arrayUnique($myArray)
	{
		JLog::add('JUpdater::arrayUnique() is deprecated. See JArrayHelper::arrayUnique().', JLog::WARNING, 'deprecated');
		return JArrayHelper::arrayUnique($myArray);
	}

	/**
	 * Finds an update for an extension
	 *
	 * @param   integer  $id  Id of the extension
	 *
	 * @return  mixed
	 *
	 * @since   11.1
	 */
>>>>>>> upstream/master
	public function update($id)
	{
		$updaterow = JTable::getInstance('update');
		$updaterow->load($id);
<<<<<<< HEAD
		$update = new JUpdate();
		if($update->loadFromXML($updaterow->detailsurl)) {
=======
		$update = new JUpdate;
		if ($update->loadFromXML($updaterow->detailsurl))
		{
>>>>>>> upstream/master
			return $update->install();
		}
		return false;
	}
}
