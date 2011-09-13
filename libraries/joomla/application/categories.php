<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Application
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
 * JCategories Class.
 *
 * @package     Joomla.Platform
 * @subpackage  Application
 * @since       11.1
 */
class JCategories
{
	/**
	 * Array to hold the object instances
	 *
	 * @var    array
	 * @since  11.1
	 */
	static $instances = array();

	/**
	 * Array of category nodes
	 *
	 * @var    mixed
	 * @since  11.1
	 */
	protected $_nodes;

	/**
	 * Array of checked categories -- used to save values when _nodes are null
	 *
	 * @var    array
	 * @since  11.1
	 */
	protected $_checkedCategories;

	/**
	 * Name of the extension the categories belong to
	 *
	 * @var    string
	 * @since  11.1
	 */
	protected $_extension = null;

	/**
	 * Name of the linked content table to get category content count
	 *
	 * @var    string
	 * @since  11.1
	 */
	protected $_table = null;

	/**
	 * Name of the category field
	 *
<<<<<<< HEAD
	 * @var string
=======
	 * @var    string
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $_field = null;

	/**
	 * Name of the key field
	 *
<<<<<<< HEAD
	 * @var string
=======
	 * @var    string
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $_key = null;

	/**
	 * Name of the items state field
	 *
<<<<<<< HEAD
	 * @var string
=======
	 * @var    string
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $_statefield = null;

	/**
	 * Array of options
	 *
<<<<<<< HEAD
	 * @var array
=======
	 * @var    array
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $_options = null;

	/**
	 * Class constructor
	 *
	 * @param   array  $options  Array of options
	 *
<<<<<<< HEAD
	 * @return  JCategories  JCategories object
=======
	 * @return  JCategories object
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function __construct($options)
	{
<<<<<<< HEAD
		$this->_extension	= $options['extension'];
		$this->_table		= $options['table'];
		$this->_field		= (isset($options['field'])&&$options['field'])?$options['field']:'catid';
		$this->_key			= (isset($options['key'])&&$options['key'])?$options['key']:'id';
		$this->_statefield 	= (isset($options['statefield'])) ? $options['statefield'] : 'state';
		$options['access']	= (isset($options['access'])) ? $options['access'] : 'true';
		$options['published']	= (isset($options['published'])) ? $options['published'] : 1;
		$this->_options		= $options;
=======
		$this->_extension = $options['extension'];
		$this->_table = $options['table'];
		$this->_field = (isset($options['field']) && $options['field']) ? $options['field'] : 'catid';
		$this->_key = (isset($options['key']) && $options['key']) ? $options['key'] : 'id';
		$this->_statefield = (isset($options['statefield'])) ? $options['statefield'] : 'state';
		$options['access'] = (isset($options['access'])) ? $options['access'] : 'true';
		$options['published'] = (isset($options['published'])) ? $options['published'] : 1;
		$this->_options = $options;
>>>>>>> upstream/master

		return true;
	}

	/**
	 * Returns a reference to a JCategories object
	 *
	 * @param   string  $extension  Name of the categories extension
	 * @param   array   $options    An array of options
	 *
<<<<<<< HEAD
	 * @return  Jcategories  Jcategories object
=======
	 * @return  Jcategories         Jcategories object
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function getInstance($extension, $options = array())
	{
<<<<<<< HEAD
		$hash = md5($extension.serialize($options));

		if (isset(self::$instances[$hash])) {
			return self::$instances[$hash];
		}

		$parts = explode('.',$extension);
		$component = 'com_'.strtolower($parts[0]);
		$section = count($parts) > 1 ? $parts[1] : '';
		$classname = ucfirst(substr($component,4)).ucfirst($section).'Categories';

		if (!class_exists($classname)) {
			$path = JPATH_SITE.DS.'components'.DS.$component.DS.'helpers'.DS.'category.php';
			if (is_file($path)) {
				require_once $path;
			}
			else {
=======
		$hash = md5($extension . serialize($options));

		if (isset(self::$instances[$hash]))
		{
			return self::$instances[$hash];
		}

		$parts = explode('.', $extension);
		$component = 'com_' . strtolower($parts[0]);
		$section = count($parts) > 1 ? $parts[1] : '';
		$classname = ucfirst(substr($component, 4)) . ucfirst($section) . 'Categories';

		if (!class_exists($classname))
		{
			$path = JPATH_SITE . '/components/' . $component . '/helpers/category.php';
			if (is_file($path))
			{
				include_once $path;
			}
			else
			{
>>>>>>> upstream/master
				return false;
			}
		}

		self::$instances[$hash] = new $classname($options);

		return self::$instances[$hash];
	}

	/**
	 * Loads a specific category and all its children in a JCategoryNode object
	 *
	 * @param   mixed    $id         an optional id integer or equal to 'root'
<<<<<<< HEAD
	 * @param   boolean  $forceload
	 *
	 * @return  JCategoryNode|null
=======
	 * @param   boolean  $forceload  True to force  the _load method to execute
	 *
	 * @return  mixed    JCategoryNode object or null if $id is not valid
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function get($id = 'root', $forceload = false)
	{
<<<<<<< HEAD
		if ($id !== 'root') {
			$id = (int) $id;

			if ($id == 0) {
=======
		if ($id !== 'root')
		{
			$id = (int) $id;

			if ($id == 0)
			{
>>>>>>> upstream/master
				$id = 'root';
			}
		}

		// If this $id has not been processed yet, execute the _load method
<<<<<<< HEAD
		if ((!isset($this->_nodes[$id]) && !isset($this->_checkedCategories[$id])) || $forceload) {
=======
		if ((!isset($this->_nodes[$id]) && !isset($this->_checkedCategories[$id])) || $forceload)
		{
>>>>>>> upstream/master
			$this->_load($id);
		}

		// If we already have a value in _nodes for this $id, then use it.
<<<<<<< HEAD
		if (isset($this->_nodes[$id])) {
			return $this->_nodes[$id];
		}
		// If we processed this $id already and it was not valid, then return null.
		else if (isset($this->_checkedCategories[$id])) {
=======
		if (isset($this->_nodes[$id]))
		{
			return $this->_nodes[$id];
		}
		// If we processed this $id already and it was not valid, then return null.
		else if (isset($this->_checkedCategories[$id]))
		{
>>>>>>> upstream/master
			return null;
		}

		return false;
	}
<<<<<<< HEAD
	/**
	 * Load
	 *
	 * @param   integer    $id
	 *
	 * @return  void
=======

	/**
	 * Load method
	 *
	 * @param   integer  $id  Id of category to load
	 *
	 * @return  void
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function _load($id)
	{
<<<<<<< HEAD
		$db	= JFactory::getDbo();
=======
		$db = JFactory::getDbo();
>>>>>>> upstream/master
		$app = JFactory::getApplication();
		$user = JFactory::getUser();
		$extension = $this->_extension;
		// Record that has this $id has been checked
		$this->_checkedCategories[$id] = true;

		$query = $db->getQuery(true);

		// Right join with c for category
		$query->select('c.*');
		$query->select('CASE WHEN CHAR_LENGTH(c.alias) THEN CONCAT_WS(":", c.id, c.alias) ELSE c.id END as slug');
		$query->from('#__categories as c');
<<<<<<< HEAD
		$query->where('(c.extension='.$db->Quote($extension).' OR c.extension='.$db->Quote('system').')');

		if ($this->_options['access']) {
			$query->where('c.access IN ('.implode(',', $user->getAuthorisedViewLevels()).')');
		}

		if ($this->_options['published'] == 1) {
=======
		$query->where('(c.extension=' . $db->Quote($extension) . ' OR c.extension=' . $db->Quote('system') . ')');

		if ($this->_options['access'])
		{
			$query->where('c.access IN (' . implode(',', $user->getAuthorisedViewLevels()) . ')');
		}

		if ($this->_options['published'] == 1)
		{
>>>>>>> upstream/master
			$query->where('c.published = 1');
		}

		$query->order('c.lft');

<<<<<<< HEAD

		// s for selected id
		if ($id!='root') {
			// Get the selected category
			$query->leftJoin('#__categories AS s ON (s.lft <= c.lft AND s.rgt >= c.rgt) OR (s.lft > c.lft AND s.rgt < c.rgt)');
			$query->where('s.id='.(int)$id);
		}

		$subQuery = ' (SELECT cat.id as id FROM #__categories AS cat JOIN #__categories AS parent ' .
					'ON cat.lft BETWEEN parent.lft AND parent.rgt WHERE parent.extension = ' . $db->quote($extension) .
					' AND parent.published != 1 GROUP BY cat.id) ';
=======
		// s for selected id
		if ($id != 'root')
		{
			// Get the selected category
			$query->leftJoin('#__categories AS s ON (s.lft <= c.lft AND s.rgt >= c.rgt) OR (s.lft > c.lft AND s.rgt < c.rgt)');
			$query->where('s.id=' . (int) $id);
		}

		$subQuery = ' (SELECT cat.id as id FROM #__categories AS cat JOIN #__categories AS parent ' .
			'ON cat.lft BETWEEN parent.lft AND parent.rgt WHERE parent.extension = ' . $db->quote($extension) .
			' AND parent.published != 1 GROUP BY cat.id) ';
>>>>>>> upstream/master
		$query->leftJoin($subQuery . 'AS badcats ON badcats.id = c.id');
		$query->where('badcats.id is null');

		// i for item
<<<<<<< HEAD
		if (isset($this->_options['countItems']) && $this->_options['countItems'] == 1) {
			if ($this->_options['published'] == 1) {
				$query->leftJoin($db->quoteName($this->_table).' AS i ON i.'.$db->quoteName($this->_field).' = c.id AND i.'.$this->_statefield.' = 1');
			}
			else {
				$query->leftJoin($db->quoteName($this->_table).' AS i ON i.'.$db->quoteName($this->_field).' = c.id');
			}

			$query->select('COUNT(i.'.$db->quoteName($this->_key).') AS numitems');
=======
		if (isset($this->_options['countItems']) && $this->_options['countItems'] == 1)
		{
			if ($this->_options['published'] == 1)
			{
				$query->leftJoin(
					$db->quoteName($this->_table) . ' AS i ON i.' . $db->quoteName($this->_field) . ' = c.id AND i.' . $this->_statefield . ' = 1'
				);
			}
			else
			{
				$query->leftJoin($db->quoteName($this->_table) . ' AS i ON i.' . $db->quoteName($this->_field) . ' = c.id');
			}

			$query->select('COUNT(i.' . $db->quoteName($this->_key) . ') AS numitems');
>>>>>>> upstream/master
		}

		// Group by
		$query->group('c.id');

		// Filter by language
<<<<<<< HEAD
		if ($app->isSite() && $app->getLanguageFilter()) {
			$query->where('(' . ($id!='root' ? 'c.id=s.id OR ':'') .'c.language in (' . $db->Quote(JFactory::getLanguage()->getTag()) . ',' . $db->Quote('*') . '))');
=======
		if ($app->isSite() && $app->getLanguageFilter())
		{
			$query->where(
				'(' . ($id != 'root' ? 'c.id=s.id OR ' : '') . 'c.language in (' . $db->Quote(JFactory::getLanguage()->getTag()) . ',' .
					$db->Quote('*') . '))'
			);
>>>>>>> upstream/master
		}

		// Get the results
		$db->setQuery($query);
		$results = $db->loadObjectList('id');
		$childrenLoaded = false;

<<<<<<< HEAD
		if (count($results)) {
			// Foreach categories
			foreach($results as $result)
			{
				// Deal with root category
				if ($result->id == 1) {
=======
		if (count($results))
		{
			// Foreach categories
			foreach ($results as $result)
			{
				// Deal with root category
				if ($result->id == 1)
				{
>>>>>>> upstream/master
					$result->id = 'root';
				}

				// Deal with parent_id
<<<<<<< HEAD
				if ($result->parent_id == 1) {
=======
				if ($result->parent_id == 1)
				{
>>>>>>> upstream/master
					$result->parent_id = 'root';
				}

				// Create the node
<<<<<<< HEAD
				if (!isset($this->_nodes[$result->id])) {
=======
				if (!isset($this->_nodes[$result->id]))
				{
>>>>>>> upstream/master
					// Create the JCategoryNode and add to _nodes
					$this->_nodes[$result->id] = new JCategoryNode($result, $this);

					// If this is not root and if the current node's parent is in the list or the current node parent is 0
<<<<<<< HEAD
					if ($result->id != 'root' && (isset($this->_nodes[$result->parent_id]) || $result->parent_id == 0)) {
=======
					if ($result->id != 'root' && (isset($this->_nodes[$result->parent_id]) || $result->parent_id == 1))
					{
>>>>>>> upstream/master
						// Compute relationship between node and its parent - set the parent in the _nodes field
						$this->_nodes[$result->id]->setParent($this->_nodes[$result->parent_id]);
					}

					// If the node's parent id is not in the _nodes list and the node is not root (doesn't have parent_id == 0),
					// then remove the node from the list
<<<<<<< HEAD
					if (!(isset($this->_nodes[$result->parent_id]) || $result->parent_id == 0)) {
=======
					if (!(isset($this->_nodes[$result->parent_id]) || $result->parent_id == 0))
					{
>>>>>>> upstream/master
						unset($this->_nodes[$result->id]);
						continue;
					}

<<<<<<< HEAD
					if ($result->id == $id || $childrenLoaded) {
=======
					if ($result->id == $id || $childrenLoaded)
					{
>>>>>>> upstream/master
						$this->_nodes[$result->id]->setAllLoaded();
						$childrenLoaded = true;
					}
				}
<<<<<<< HEAD
				else if ($result->id == $id || $childrenLoaded) {
					// Create the JCategoryNode
					$this->_nodes[$result->id] = new JCategoryNode($result, $this);

					if ($result->id != 'root' && (isset($this->_nodes[$result->parent_id]) || $result->parent_id)) {
=======
				else if ($result->id == $id || $childrenLoaded)
				{
					// Create the JCategoryNode
					$this->_nodes[$result->id] = new JCategoryNode($result, $this);

					if ($result->id != 'root' && (isset($this->_nodes[$result->parent_id]) || $result->parent_id))
					{
>>>>>>> upstream/master
						// Compute relationship between node and its parent
						$this->_nodes[$result->id]->setParent($this->_nodes[$result->parent_id]);
					}

<<<<<<< HEAD
					if (!isset($this->_nodes[$result->parent_id])) {
=======
					if (!isset($this->_nodes[$result->parent_id]))
					{
>>>>>>> upstream/master
						unset($this->_nodes[$result->id]);
						continue;
					}

<<<<<<< HEAD
					if ($result->id == $id || $childrenLoaded) {
=======
					if ($result->id == $id || $childrenLoaded)
					{
>>>>>>> upstream/master
						$this->_nodes[$result->id]->setAllLoaded();
						$childrenLoaded = true;
					}

				}
			}
		}
<<<<<<< HEAD
		else {
=======
		else
		{
>>>>>>> upstream/master
			$this->_nodes[$id] = null;
		}
	}
}

/**
 * Helper class to load Categorytree
 *
 * @package     Joomla.Platform
 * @subpackage  Application
 * @since       11.1
 */
class JCategoryNode extends JObject
{
<<<<<<< HEAD
	/**
	 *  @var int Primary key
	 *  @since  11.1
	 */
	public $id					= null;

	public $asset_id			= null;

	public $parent_id			= null;

	public $lft					= null;

	public $rgt					= null;

	public $level				= null;

	public $extension			= null;

	/**
	 * @var string The menu title for the category (a short name)
	 * @since  11.1
	 */
	public $title				= null;

	/**
	 * @var string The the alias for the category
	 * @since  11.1
	 */
	public $alias				= null;

	/**
	 *  @var string
	 */
	public $description			= null;

	/**
	 * @var boolean
	 * @since  11.1
	 */
	public $published			= null;

	/**
	 * @var boolean
	 * @since  11.1
	 */
	public $checked_out			= 0;

	/**
	 * @var time
	 * @since  11.1
	 */
	public $checked_out_time	= 0;

	/**
	 * @var int
	 * @since  11.1
	 */
	public $access				= null;

	/**
=======

	/**
	 * Primary key
	 *
	 * @var    integer
	 * @since  11.1
	 */
	public $id = null;

	/**
	 * The id of the category in the asset table
	 *
	 * @var    integer
	 * @since  11.1
	 */
	public $asset_id = null;

	/**
	 * The id of the parent of category in the asset table, 0 for category root
	 *
	 * @var    integer
	 * @since  11.1
	 */

	public $parent_id = null;

	/**
	 * The lft value for this category in the category tree
	 *
	 * @var    integer
	 * @since  11.1
	 */

	public $lft = null;

	/**
	 * The rgt value for this category in the category tree
	 *
	 * @var    integer
	 * @since  11.1
	 */
	public $rgt = null;

	/**
	 * The depth of this category's position in the category tree
	 *
	 * @var    integer
	 * @since  11.1
	 */
	public $level = null;

	/**
	 * The extension this category is associated with
	 *
	 * @var    integer
	 * @since  11.1
	 */
	public $extension = null;

	/**
	 * The menu title for the category (a short name)
	 *
	 * @var string
	 * @since  11.1
	 */
	public $title = null;

	/**
	 * The the alias for the category
	 *
	 * @var    string
	 * @since  11.1
	 */
	public $alias = null;

	/**
	 * Description of the category.
	 *
	 * @var string
	 * @since  11.1
	 */
	public $description = null;

	/**
	 * The publication status of the category
	 *
	 * @var    boolean
	 * @since  11.1
	 */
	public $published = null;

	/**
	 * Whether the category is or is not checked out
	 *
	 * @var boolean
	 * @since  11.1
	 */
	public $checked_out = 0;

	/**
	 * The time at which the category was checked out
	 *
	 * @var    time
	 * @since  11.1
	 */
	public $checked_out_time = 0;

	/**
	 * Access level for the category
	 *
	 * @var integer
	 * @since  11.1
	 */
	public $access = null;

	/**
	 * JSON string of parameters
	 *
	 * @var string
	 * @since  11.1
	 */
	public $params = null;

	/**
	 * Metadata description
	 *
>>>>>>> upstream/master
	 * @var string
	 * @since  11.1
	 */

<<<<<<< HEAD
	public $params				= null;

	public $metadesc			= null;

	public $metakey				= null;

	public $metadata			= null;

	public $created_user_id		= null;

	public $created_time		= null;

	public $modified_user_id	= null;

	public $modified_time		= null;

	public $hits				= null;

	public $language			= null;

	public $numitems			= null;

	public $childrennumitems	= null;

	public $slug				= null;

	public $assets				= null;

	/**
	 * @var Parent Category
=======
	public $metadesc = null;

	/**
	 * Key words for meta data
	 *
	 * @var string
	 * @since  11.1
	 */
	public $metakey = null;

	/**
	 * JSON string of other meta data
	 *
	 * @var string
	 * @since  11.1
	 */
	public $metadata = null;

	public $created_user_id = null;

	/**
	 * The time at which the category was created
	 *
	 * @var    time
	 * @since  11.1
	 */
	public $created_time = null;

	public $modified_user_id = null;

	/**
	 * The time at which the category was modified
	 *
	 * @var    time
	 * @since  11.1
	 */
	public $modified_time = null;

	/**
	 * Nmber of times the category has been viewed
	 *
	 * @var    integer
	 * @since  11.1
	 */
	public $hits = null;

	/**
	 * The language for the category in xx-XX format
	 *
	 * @var    time
	 * @since  11.1
	 */
	public $language = null;

	/**
	 * Number of items in this category or descendants of this category
	 *
	 * @var    integer
	 * @since  11.1
	 */
	public $numitems = null;

	/**
	 * Number of children items
	 *
	 * @var
	 * @since  11.1
	 */

	public $childrennumitems = null;

	/**
	 * Slug fo the category (used in URL)
	 *
	 * @var    string
	 * @since  11.1
	 */
	public $slug = null;

	/**
	 * Array of  assets
	 *
	 * @var    array
	 * @since  11.1
	 */
	public $assets = null;

	/**
	 * Parent Category object
	 *
	 * @var    object
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $_parent = null;

	/**
	 * @var Array of Children
	 * @since  11.1
	 */
	protected $_children = array();

	/**
<<<<<<< HEAD
	 * @var Path from root to this category
=======
	 * Path from root to this category
	 *
	 * @var    array
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $_path = array();

	/**
<<<<<<< HEAD
	 * @var Category left of this one
=======
	 * Category left of this one
	 *
	 * @var    integer
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $_leftSibling = null;

	/**
<<<<<<< HEAD
	 * @var Category right of this one
=======
	 * Category right of this one
	 *
	 * @var
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $_rightSibling = null;

	/**
<<<<<<< HEAD
	 * @var boolean true if all children have been loaded
=======
	 * true if all children have been loaded
	 *
	 * @var boolean
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $_allChildrenloaded = false;

	/**
<<<<<<< HEAD
	 * @var Constructor of this tree
=======
	 * Constructor of this tree
	 *
	 * @var
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $_constructor = null;

	/**
	 * Class constructor
	 *
<<<<<<< HEAD
	 * @param   $category
	 *
	 * @return  JCategoryNode
=======
	 * @param   array          $category      The category data.
	 * @param   JCategoryNode  &$constructor  The tree constructor.
	 *
	 * @return  JCategoryNode
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function __construct($category = null, &$constructor = null)
	{
<<<<<<< HEAD
		if ($category) {
			$this->setProperties($category);
			if ($constructor) {
=======
		if ($category)
		{
			$this->setProperties($category);
			if ($constructor)
			{
>>>>>>> upstream/master
				$this->_constructor = &$constructor;
			}

			return true;
		}

		return false;
	}

	/**
	 * Set the parent of this category
	 *
	 * If the category already has a parent, the link is unset
	 *
<<<<<<< HEAD
	 * @param   JCategoryNode|null	$parent	The parent to be setted
	 *
	 * @return  void
=======
	 * @param   mixed  &$parent  JCategoryNode for the parent to be set or null
	 *
	 * @return  void
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	function setParent(&$parent)
	{
<<<<<<< HEAD
		if ($parent instanceof JCategoryNode || is_null($parent)) {
			if (!is_null($this->_parent)) {
=======
		if ($parent instanceof JCategoryNode || is_null($parent))
		{
			if (!is_null($this->_parent))
			{
>>>>>>> upstream/master
				$key = array_search($this, $this->_parent->_children);
				unset($this->_parent->_children[$key]);
			}

<<<<<<< HEAD
			if (!is_null($parent)) {
=======
			if (!is_null($parent))
			{
>>>>>>> upstream/master
				$parent->_children[] = & $this;
			}

			$this->_parent = & $parent;

<<<<<<< HEAD
			if ($this->id != 'root') {
				$this->_path = $parent->getPath();
				$this->_path[] = $this->id.':'.$this->alias;
			}

			if (count($parent->_children) > 1) {
=======
			if ($this->id != 'root')
			{
				if ($this->parent_id != 1)
				{
					$this->_path = $parent->getPath();
				}
				$this->_path[] = $this->id . ':' . $this->alias;
			}

			if (count($parent->_children) > 1)
			{
>>>>>>> upstream/master
				end($parent->_children);
				$this->_leftSibling = prev($parent->_children);
				$this->_leftSibling->_rightsibling = &$this;
			}
		}
	}

	/**
	 * Add child to this node
	 *
	 * If the child already has a parent, the link is unset
	 *
<<<<<<< HEAD
	 * @param   JNode	$child	The child to be added.
	 *
	 * @return  void
=======
	 * @param   JNode  &$child  The child to be added.
	 *
	 * @return  void
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	function addChild(&$child)
	{
<<<<<<< HEAD
		if ($child instanceof JCategoryNode) {
=======
		if ($child instanceof JCategoryNode)
		{
>>>>>>> upstream/master
			$child->setParent($this);
		}
	}

	/**
	 * Remove a specific child
	 *
<<<<<<< HEAD
	 * @param   integer  $id	ID of a category
	 *
	 * @return  void
=======
	 * @param   integer  $id  ID of a category
	 *
	 * @return  void
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	function removeChild($id)
	{
		$key = array_search($this, $this->_parent->_children);
		unset($this->_parent->_children[$key]);
	}

	/**
	 * Get the children of this node
	 *
<<<<<<< HEAD
	 * @param   boolean  $recursive
	 *
	 * @return  array    the children
=======
	 * @param   boolean  $recursive  False by default
	 *
	 * @return  array  The children
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	function &getChildren($recursive = false)
	{
<<<<<<< HEAD
		if (!$this->_allChildrenloaded) {
			$temp = $this->_constructor->get($this->id, true);
			$this->_children = $temp->getChildren();
			$this->_leftSibling = $temp->getSibling(false);
			$this->_rightSibling = $temp->getSibling(true);
			$this->setAllLoaded();
		}

		if ($recursive) {
			$items = array();
			foreach($this->_children as $child)
=======
		if (!$this->_allChildrenloaded)
		{
			$temp = $this->_constructor->get($this->id, true);
			if ($temp)
			{
				$this->_children = $temp->getChildren();
				$this->_leftSibling = $temp->getSibling(false);
				$this->_rightSibling = $temp->getSibling(true);
				$this->setAllLoaded();
			}
		}

		if ($recursive)
		{
			$items = array();
			foreach ($this->_children as $child)
>>>>>>> upstream/master
			{
				$items[] = $child;
				$items = array_merge($items, $child->getChildren(true));
			}
			return $items;
		}

		return $this->_children;
	}

	/**
	 * Get the parent of this node
	 *
<<<<<<< HEAD
	 * @return  JNode|null the parent
=======
	 * @return  mixed  JNode or null
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	function &getParent()
	{
		return $this->_parent;
	}

	/**
	 * Test if this node has children
	 *
<<<<<<< HEAD
	 * @return  bool
=======
	 * @return  boolean  True if there is a child
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	function hasChildren()
	{
		return count($this->_children);
	}

	/**
	 * Test if this node has a parent
	 *
	 * @return  boolean    True if there is a parent
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	function hasParent()
	{
		return $this->getParent() != null;
	}

	/**
	 * Function to set the left or right sibling of a category
	 *
	 * @param   object   $sibling  JCategoryNode object for the sibling
<<<<<<< HEAD
	 * @param   boolean  $right if set to false, the sibling is the left one
	 * @return void
	 */
	function setSibling($sibling, $right = true)
	{
		if ($right) {
			$this->_rightSibling = $sibling;
		}
		else {
=======
	 * @param   boolean  $right    If set to false, the sibling is the left one
	 *
	 * @return  void
	 *
	 * @since   11.1
	 */
	function setSibling($sibling, $right = true)
	{
		if ($right)
		{
			$this->_rightSibling = $sibling;
		}
		else
		{
>>>>>>> upstream/master
			$this->_leftSibling = $sibling;
		}
	}

	/**
	 * Returns the right or left sibling of a category
	 *
<<<<<<< HEAD
	 * @param   boolean  $right        If set to false, returns the left sibling
	 *
	 * @return  JCategoryNode or null  JCategoryNode object with the sibling information or
	 *                                   null if there is no sibling on that side.
	 */
	function getSibling($right = true)
	{
		if (!$this->_allChildrenloaded) {
=======
	 * @param   boolean  $right  If set to false, returns the left sibling
	 *
	 * @return  mixed  JCategoryNode object with the sibling information or
	 *                 NULL if there is no sibling on that side.
	 *
	 * @since   11.1
	 */
	function getSibling($right = true)
	{
		if (!$this->_allChildrenloaded)
		{
>>>>>>> upstream/master
			$temp = $this->_constructor->get($this->id, true);
			$this->_children = $temp->getChildren();
			$this->_leftSibling = $temp->getSibling(false);
			$this->_rightSibling = $temp->getSibling(true);
			$this->setAllLoaded();
		}

<<<<<<< HEAD
		if ($right) {
			return $this->_rightSibling;
		}
		else {
=======
		if ($right)
		{
			return $this->_rightSibling;
		}
		else
		{
>>>>>>> upstream/master
			return $this->_leftSibling;
		}
	}

	/**
	 * Returns the category parameters
	 *
	 * @return  JRegistry
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	function getParams()
	{
<<<<<<< HEAD
		if (!($this->params instanceof JRegistry)) {
			$temp = new JRegistry();
			$temp->loadJSON($this->params);
=======
		if (!($this->params instanceof JRegistry))
		{
			$temp = new JRegistry;
			$temp->loadString($this->params);
>>>>>>> upstream/master
			$this->params = $temp;
		}

		return $this->params;
	}

	/**
	 * Returns the category metadata
	 *
	 * @return  JRegistry  A JRegistry object containing the metadata
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	function getMetadata()
	{
<<<<<<< HEAD
		if (!($this->metadata instanceof JRegistry)) {
			$temp = new JRegistry();
			$temp->loadJSON($this->metadata);
=======
		if (!($this->metadata instanceof JRegistry))
		{
			$temp = new JRegistry;
			$temp->loadString($this->metadata);
>>>>>>> upstream/master
			$this->metadata = $temp;
		}

		return $this->metadata;
	}

	/**
	 * Returns the category path to the root category
	 *
	 * @return  array
<<<<<<< HEAD
=======
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	function getPath()
	{
		return $this->_path;
	}

	/**
<<<<<<< HEAD
	 * Returns the user that authored the category
	 *
	 * @param   boolean  $modified_user	Returns the modified_user when set to true
	 *
	 * @return  JUser    A JUser object containing a userid
	 */
	function getAuthor($modified_user = false)
	{
		if ($modified_user) {
=======
	 * Returns the user that created the category
	 *
	 * @param   boolean  $modified_user  Returns the modified_user when set to true
	 *
	 * @return  JUser  A JUser object containing a userid
	 *
	 * @since   11.1
	 */
	function getAuthor($modified_user = false)
	{
		if ($modified_user)
		{
>>>>>>> upstream/master
			return JFactory::getUser($this->modified_user_id);
		}

		return JFactory::getUser($this->created_user_id);
	}

<<<<<<< HEAD
=======
	/**
	 * Set to load all children
	 *
	 * @return  void
	 *
	 * @since 11.1
	 */
>>>>>>> upstream/master
	function setAllLoaded()
	{
		$this->_allChildrenloaded = true;
		foreach ($this->_children as $child)
		{
			$child->setAllLoaded();
		}
	}

<<<<<<< HEAD
	function getNumItems($recursive = false)
	{
		if ($recursive) {
=======
	/**
	 * Returns the number of items.
	 *
	 * @param   boolean  $recursive  If false number of children, if true number of descendants
	 *
	 * @return  integer  Number of children or descendants
	 *
	 * @since 11.1
	 */
	function getNumItems($recursive = false)
	{
		if ($recursive)
		{
>>>>>>> upstream/master
			$count = $this->numitems;

			foreach ($this->getChildren() as $child)
			{
				$count = $count + $child->getNumItems(true);
			}

			return $count;
		}

		return $this->numitems;
	}
<<<<<<< HEAD
}
=======
}
>>>>>>> upstream/master
