<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Access
 *
 * @copyright   Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

<<<<<<< HEAD
defined('JPATH_PLATFORM') or die;
=======
defined('JPATH_PLATFORM') or die();
>>>>>>> upstream/master

jimport('joomla.access.rules');
jimport('joomla.utilities.arrayhelper');

/**
 * Class that handles all access authorisation routines.
 *
 * @package     Joomla.Platform
 * @subpackage  Access
 * @since       11.1
 */
class JAccess
{
	/**
<<<<<<< HEAD
	 * @var    array  Array of view levels
=======
	 * Array of view levels
	 *
	 * @var    array
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected static $viewLevels = array();

	/**
<<<<<<< HEAD
	 * @var    array  Array of rules for the asset
=======
	 * Array of rules for the asset
	 *
	 * @var    array
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected static $assetRules = array();

	/**
	 * Method to check if a user is authorised to perform an action, optionally on an asset.
	 *
	 * @param   integer  $userId  Id of the user for which to check authorisation.
	 * @param   string   $action  The name of the action to authorise.
	 * @param   mixed    $asset   Integer asset id or the name of the asset as a string.  Defaults to the global asset node.
	 *
	 * @return  boolean  True if authorised.
	 *
	 * @since   11.1
	 */
	public static function check($userId, $action, $asset = null)
	{
		// Sanitise inputs.
		$userId = (int) $userId;

		$action = strtolower(preg_replace('#[\s\-]+#', '.', trim($action)));
<<<<<<< HEAD
		$asset  = strtolower(preg_replace('#[\s\-]+#', '.', trim($asset)));

		// Default to the root asset node.
		if (empty($asset)) {
=======
		$asset = strtolower(preg_replace('#[\s\-]+#', '.', trim($asset)));

		// Default to the root asset node.
		if (empty($asset))
		{
>>>>>>> upstream/master
			$asset = 1;
		}

		// Get the rules for the asset recursively to root if not already retrieved.
<<<<<<< HEAD
		if (empty(self::$assetRules[$asset])) {
=======
		if (empty(self::$assetRules[$asset]))
		{
>>>>>>> upstream/master
			self::$assetRules[$asset] = self::getAssetRules($asset, true);
		}

		// Get all groups against which the user is mapped.
		$identities = self::getGroupsByUser($userId);
		array_unshift($identities, $userId * -1);

		return self::$assetRules[$asset]->allow($action, $identities);
	}

	/**
	 * Method to check if a group is authorised to perform an action, optionally on an asset.
	 *
	 * @param   integer  $groupId  The path to the group for which to check authorisation.
	 * @param   string   $action   The name of the action to authorise.
	 * @param   mixed    $asset    Integer asset id or the name of the asset as a string.  Defaults to the global asset node.
	 *
	 * @return  boolean  True if authorised.
	 *
	 * @since   11.1
	 */
	public static function checkGroup($groupId, $action, $asset = null)
	{
		// Sanitize inputs.
		$groupId = (int) $groupId;
		$action = strtolower(preg_replace('#[\s\-]+#', '.', trim($action)));
<<<<<<< HEAD
		$asset  = strtolower(preg_replace('#[\s\-]+#', '.', trim($asset)));
=======
		$asset = strtolower(preg_replace('#[\s\-]+#', '.', trim($asset)));
>>>>>>> upstream/master

		// Get group path for group
		$groupPath = self::getGroupPath($groupId);

		// Default to the root asset node.
<<<<<<< HEAD
		if (empty($asset)) {
=======
		if (empty($asset))
		{
>>>>>>> upstream/master
			$asset = 1;
		}

		// Get the rules for the asset recursively to root if not already retrieved.
<<<<<<< HEAD
		if (empty(self::$assetRules[$asset])) {
=======
		if (empty(self::$assetRules[$asset]))
		{
>>>>>>> upstream/master
			self::$assetRules[$asset] = self::getAssetRules($asset, true);
		}

		return self::$assetRules[$asset]->allow($action, $groupPath);
	}

	/**
	 * Gets the parent groups that a leaf group belongs to in its branch back to the root of the tree
	 * (including the leaf group id).
	 *
	 * @param   mixed  $groupId  An integer or array of integers representing the identities to check.
	 *
	 * @return  mixed  True if allowed, false for an explicit deny, null for an implicit deny.
	 *
	 * @since   11.1
	 */
	protected static function getGroupPath($groupId)
	{
		static $groups, $paths;

		// Preload all groups
<<<<<<< HEAD
		if (empty($groups)) {
			$db		= JFactory::getDbo();
			$query	= $db->getQuery(true)
=======
		if (empty($groups))
		{
			$db = JFactory::getDbo();
			$query = $db->getQuery(true)
>>>>>>> upstream/master
				->select('parent.id, parent.lft, parent.rgt')
				->from('#__usergroups AS parent')
				->order('parent.lft');
			$db->setQuery($query);
			$groups = $db->loadObjectList('id');
		}

		// Make sure groupId is valid
<<<<<<< HEAD
		if (!array_key_exists($groupId, $groups)) {
=======
		if (!array_key_exists($groupId, $groups))
		{
>>>>>>> upstream/master
			return array();
		}

		// Get parent groups and leaf group
<<<<<<< HEAD
		if (!isset($paths[$groupId])) {
			$paths[$groupId] = array();
			foreach($groups as $group) {
				if ($group->lft <= $groups[$groupId]->lft && $group->rgt >= $groups[$groupId]->rgt) {
=======
		if (!isset($paths[$groupId]))
		{
			$paths[$groupId] = array();

			foreach ($groups as $group)
			{
				if ($group->lft <= $groups[$groupId]->lft && $group->rgt >= $groups[$groupId]->rgt)
				{
>>>>>>> upstream/master
					$paths[$groupId][] = $group->id;
				}
			}
		}

		return $paths[$groupId];
	}

	/**
	 * Method to return the JRules object for an asset.  The returned object can optionally hold
	 * only the rules explicitly set for the asset or the summation of all inherited rules from
	 * parent assets and explicit rules.
	 *
	 * @param   mixed    $asset      Integer asset id or the name of the asset as a string.
	 * @param   boolean  $recursive  True to return the rules object with inherited rules.
	 *
	 * @return  JRules   JRules object for the asset.
	 *
	 * @since   11.1
	 */
	public static function getAssetRules($asset, $recursive = false)
	{
		// Get the database connection object.
		$db = JFactory::getDbo();

		// Build the database query to get the rules for the asset.
<<<<<<< HEAD
		$query	= $db->getQuery(true);
=======
		$query = $db->getQuery(true);
>>>>>>> upstream/master
		$query->select($recursive ? 'b.rules' : 'a.rules');
		$query->from('#__assets AS a');

		// If the asset identifier is numeric assume it is a primary key, else lookup by name.
<<<<<<< HEAD
		if (is_numeric($asset)) {
			$query->where('a.id = '.(int) $asset);
		}
		else {
			$query->where('a.name = '.$db->quote($asset));
		}

		// If we want the rules cascading up to the global asset node we need a self-join.
		if ($recursive) {
=======
		if (is_numeric($asset))
		{
			$query->where('a.id = ' . (int) $asset);
		}
		else
		{
			$query->where('a.name = ' . $db->quote($asset));
		}

		// If we want the rules cascading up to the global asset node we need a self-join.
		if ($recursive)
		{
>>>>>>> upstream/master
			$query->leftJoin('#__assets AS b ON b.lft <= a.lft AND b.rgt >= a.rgt');
			$query->order('b.lft');
		}

		// Execute the query and load the rules from the result.
		$db->setQuery($query);
<<<<<<< HEAD
		$result	= $db->loadColumn();

		// Get the root even if the asset is not found and in recursive mode
		if ($recursive && empty($result)) {
=======
		$result = $db->loadColumn();

		// Get the root even if the asset is not found and in recursive mode
		if ($recursive && empty($result))
		{
>>>>>>> upstream/master
			$query = $db->getQuery(true);
			$query->select('rules');
			$query->from('#__assets');
			$query->where('parent_id = 0');
			$db->setQuery($query);
<<<<<<< HEAD
			$result	= $db->loadColumn();
		}

		// Instantiate and return the JRules object for the asset rules.
		$rules	= new JRules;
=======
			$result = $db->loadColumn();
		}

		// Instantiate and return the JRules object for the asset rules.
		$rules = new JRules;
>>>>>>> upstream/master
		$rules->mergeCollection($result);

		return $rules;
	}

	/**
	 * Method to return a list of user groups mapped to a user. The returned list can optionally hold
	 * only the groups explicitly mapped to the user or all groups both explicitly mapped and inherited
	 * by the user.
	 *
	 * @param   integer  $userId     Id of the user for which to get the list of groups.
	 * @param   boolean  $recursive  True to include inherited user groups.
	 *
	 * @return  array    List of user group ids to which the user is mapped.
	 *
	 * @since   11.1
	 */
	public static function getGroupsByUser($userId, $recursive = true)
	{
		static $results = array();

		// Creates a simple unique string for each parameter combination:
<<<<<<< HEAD
		$storeId = $userId.':'.(int) $recursive;

		if (!isset($results[$storeId])) {
			// Guest user
			if (empty($userId)) {
				$result = array(JComponentHelper::getParams('com_users')->get('guest_usergroup', 1));
 			}
 			// Registered user
 			else {
				$db = JFactory::getDbo();

				// Build the database query to get the rules for the asset.
				$query	= $db->getQuery(true);
				$query->select($recursive ? 'b.id' : 'a.id');
				$query->from('#__user_usergroup_map AS map');
				$query->where('map.user_id = '.(int) $userId);
				$query->leftJoin('#__usergroups AS a ON a.id = map.group_id');

				// If we want the rules cascading up to the global asset node we need a self-join.
				if ($recursive) {
=======
		$storeId = $userId . ':' . (int) $recursive;

		if (!isset($results[$storeId]))
		{
			// Guest user
			if (empty($userId))
			{
				$result = array(JComponentHelper::getParams('com_users')->get('guest_usergroup', 1));
			}
			// Registered user
			else
			{
				$db = JFactory::getDbo();

				// Build the database query to get the rules for the asset.
				$query = $db->getQuery(true);
				$query->select($recursive ? 'b.id' : 'a.id');
				$query->from('#__user_usergroup_map AS map');
				$query->where('map.user_id = ' . (int) $userId);
				$query->leftJoin('#__usergroups AS a ON a.id = map.group_id');

				// If we want the rules cascading up to the global asset node we need a self-join.
				if ($recursive)
				{
>>>>>>> upstream/master
					$query->leftJoin('#__usergroups AS b ON b.lft <= a.lft AND b.rgt >= a.rgt');
				}

				// Execute the query and load the rules from the result.
				$db->setQuery($query);
<<<<<<< HEAD
				$result	= $db->loadColumn();
=======
				$result = $db->loadColumn();
>>>>>>> upstream/master

				// Clean up any NULL or duplicate values, just in case
				JArrayHelper::toInteger($result);

<<<<<<< HEAD
				if (empty($result)) {
					$result = array('1');
				}
				else {
					$result = array_unique($result);
				}
 			}
=======
				if (empty($result))
				{
					$result = array('1');
				}
				else
				{
					$result = array_unique($result);
				}
			}
>>>>>>> upstream/master

			$results[$storeId] = $result;
		}

		return $results[$storeId];
	}

	/**
	 * Method to return a list of user Ids contained in a Group
	 *
<<<<<<< HEAD
	 * @param   integer   $groupId    The group Id
	 * @param   boolean   $recursive  Recursively include all child groups (optional)
=======
	 * @param   integer  $groupId    The group Id
	 * @param   boolean  $recursive  Recursively include all child groups (optional)
>>>>>>> upstream/master
	 *
	 * @return  array
	 *
	 * @since   11.1
<<<<<<< HEAD
	 *
	 * @todo      This method should move somewhere else?
=======
	 * @todo    This method should move somewhere else
>>>>>>> upstream/master
	 */
	public static function getUsersByGroup($groupId, $recursive = false)
	{
		// Get a database object.
		$db = JFactory::getDbo();

		$test = $recursive ? '>=' : '=';

		// First find the users contained in the group
<<<<<<< HEAD
		$query	= $db->getQuery(true);
		$query->select('DISTINCT(user_id)');
		$query->from('#__usergroups as ug1');
		$query->join('INNER','#__usergroups AS ug2 ON ug2.lft'.$test.'ug1.lft AND ug1.rgt'.$test.'ug2.rgt');
		$query->join('INNER','#__user_usergroup_map AS m ON ug2.id=m.group_id');
		$query->where('ug1.id='.$db->Quote($groupId));
=======
		$query = $db->getQuery(true);
		$query->select('DISTINCT(user_id)');
		$query->from('#__usergroups as ug1');
		$query->join('INNER', '#__usergroups AS ug2 ON ug2.lft' . $test . 'ug1.lft AND ug1.rgt' . $test . 'ug2.rgt');
		$query->join('INNER', '#__user_usergroup_map AS m ON ug2.id=m.group_id');
		$query->where('ug1.id=' . $db->Quote($groupId));
>>>>>>> upstream/master

		$db->setQuery($query);

		$result = $db->loadColumn();

		// Clean up any NULL values, just in case
		JArrayHelper::toInteger($result);

		return $result;
	}

	/**
	 * Method to return a list of view levels for which the user is authorised.
	 *
	 * @param   integer  $userId  Id of the user for which to get the list of authorised view levels.
	 *
<<<<<<< HEAD
	 * @return  array  List of view levels for which the user is authorised.
=======
	 * @return  array    List of view levels for which the user is authorised.
>>>>>>> upstream/master
	 *
	 * @since   11.1
	 */
	public static function getAuthorisedViewLevels($userId)
	{
		// Get all groups that the user is mapped to recursively.
		$groups = self::getGroupsByUser($userId);

		// Only load the view levels once.
<<<<<<< HEAD
		if (empty(self::$viewLevels)) {
			// Get a database object.
			$db	= JFactory::getDBO();

			// Build the base query.
			$query	= $db->getQuery(true);
			$query->select('id, rules');
			$query->from('`#__viewlevels`');
=======
		if (empty(self::$viewLevels))
		{
			// Get a database object.
			$db = JFactory::getDBO();

			// Build the base query.
			$query = $db->getQuery(true);
			$query->select('id, rules');
			$query->from($query->qn('#__viewlevels'));
>>>>>>> upstream/master

			// Set the query for execution.
			$db->setQuery((string) $query);

			// Build the view levels array.
<<<<<<< HEAD
			foreach ($db->loadAssocList() as $level) {
=======
			foreach ($db->loadAssocList() as $level)
			{
>>>>>>> upstream/master
				self::$viewLevels[$level['id']] = (array) json_decode($level['rules']);
			}
		}

		// Initialise the authorised array.
		$authorised = array(1);

		// Find the authorised levels.
		foreach (self::$viewLevels as $level => $rule)
		{
			foreach ($rule as $id)
			{
<<<<<<< HEAD
				if (($id < 0) && (($id * -1) == $userId)) {
=======
				if (($id < 0) && (($id * -1) == $userId))
				{
>>>>>>> upstream/master
					$authorised[] = $level;
					break;
				}
				// Check to see if the group is mapped to the level.
<<<<<<< HEAD
				elseif (($id >= 0) && in_array($id, $groups)) {
=======
				elseif (($id >= 0) && in_array($id, $groups))
				{
>>>>>>> upstream/master
					$authorised[] = $level;
					break;
				}
			}
		}

		return $authorised;
	}

	/**
	 * Method to return a list of actions for which permissions can be set given a component and section.
	 *
<<<<<<< HEAD
	 * @param   string   $component  The component from which to retrieve the actions.
	 * @param   string   $section    The name of the section within the component from which to retrieve the actions.
	 *
	 * @return  array    List of actions available for the given component and section.
	 *
	 * @since   11.1
	 * @todo    Need to decouple this method from the CMS. Maybe check if $component is a valid file (or create a getActionsFromFile method).
=======
	 * @param   string  $component  The component from which to retrieve the actions.
	 * @param   string  $section    The name of the section within the component from which to retrieve the actions.
	 *
	 * @return  array  List of actions available for the given component and section.
	 *
	 * @since   11.1
	 *
	 * @todo    Need to decouple this method from the CMS. Maybe check if $component is a
	 *          valid file (or create a getActionsFromFile method).
>>>>>>> upstream/master
	 */
	public static function getActions($component, $section = 'component')
	{
		$actions = array();

<<<<<<< HEAD
		if (defined('JPATH_ADMINISTRATOR') && is_file(JPATH_ADMINISTRATOR.'/components/'.$component.'/access.xml')) {
			$xml = simplexml_load_file(JPATH_ADMINISTRATOR.'/components/'.$component.'/access.xml');

			foreach ($xml->children() as $child)
			{
				if ($section == (string) $child['name']) {
					foreach ($child->children() as $action) {
						$actions[] = (object) array('name' => (string) $action['name'], 'title' => (string) $action['title'], 'description' => (string) $action['description']);
=======
		if (defined('JPATH_ADMINISTRATOR') && is_file(JPATH_ADMINISTRATOR . '/components/' . $component . '/access.xml'))
		{
			$xml = simplexml_load_file(JPATH_ADMINISTRATOR . '/components/' . $component . '/access.xml');

			foreach ($xml->children() as $child)
			{
				if ($section == (string) $child['name'])
				{
					foreach ($child->children() as $action)
					{
						$actions[] = (object) array(
							'name' => (string) $action['name'],
							'title' => (string) $action['title'],
							'description' => (string) $action['description']);
>>>>>>> upstream/master
					}

					break;
				}
			}
		}

		return $actions;
	}
<<<<<<< HEAD
}
=======
}
>>>>>>> upstream/master
