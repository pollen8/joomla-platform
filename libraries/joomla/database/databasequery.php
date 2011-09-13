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

/**
 * Query Element Class.
 *
 * @package     Joomla.Platform
 * @subpackage  Database
 * @since       11.1
 */
class JDatabaseQueryElement
{
	/**
	 * @var    string  The name of the element.
	 * @since  11.1
	 */
	protected $name = null;

	/**
	 * @var    array  An array of elements.
	 * @since  11.1
	 */
	protected $elements = null;

	/**
	 * @var    string  Glue piece.
	 * @since  11.1
	 */
	protected $glue = null;

	/**
	 * Constructor.
	 *
<<<<<<< HEAD
	 * @param   string	$name      The name of the element.
	 * @param   mixed	$elements  String or array.
	 * @param   string	$glue      The glue for elements.
=======
	 * @param   string  $name      The name of the element.
	 * @param   mixed   $elements  String or array.
	 * @param   string  $glue      The glue for elements.
>>>>>>> upstream/master
	 *
	 * @return  JDatabaseQueryElement
	 *
	 * @since   11.1
	 */
	public function __construct($name, $elements, $glue = ',')
	{
<<<<<<< HEAD
		$this->elements	= array();
		$this->name		= $name;
		$this->glue		= $glue;
=======
		$this->elements = array();
		$this->name = $name;
		$this->glue = $glue;
>>>>>>> upstream/master

		$this->append($elements);
	}

	/**
	 * Magic function to convert the query element to a string.
	 *
	 * @return  string
	 *
	 * @since   11.1
	 */
	public function __toString()
	{
<<<<<<< HEAD
		if (substr($this->name, -2) == '()') {
			return PHP_EOL.substr($this->name, 0, -2).'('.implode($this->glue, $this->elements).')';
		}
		else {
			return PHP_EOL.$this->name.' '.implode($this->glue, $this->elements);
=======
		if (substr($this->name, -2) == '()')
		{
			return PHP_EOL . substr($this->name, 0, -2) . '(' . implode($this->glue, $this->elements) . ')';
		}
		else
		{
			return PHP_EOL . $this->name . ' ' . implode($this->glue, $this->elements);
>>>>>>> upstream/master
		}
	}

	/**
	 * Appends element parts to the internal list.
	 *
<<<<<<< HEAD
	 * @param   mixed  String or array.
=======
	 * @param   mixed  $elements  String or array.
>>>>>>> upstream/master
	 *
	 * @return  void
	 *
	 * @since   11.1
	 */
	public function append($elements)
	{
<<<<<<< HEAD
		if (is_array($elements)) {
			$this->elements = array_merge($this->elements, $elements);
		}
		else {
=======
		if (is_array($elements))
		{
			$this->elements = array_merge($this->elements, $elements);
		}
		else
		{
>>>>>>> upstream/master
			$this->elements = array_merge($this->elements, array($elements));
		}
	}

	/**
	 * Gets the elements of this element.
	 *
	 * @return  string
	 *
	 * @since   11.1
	 */
	public function getElements()
	{
		return $this->elements;
	}
}

/**
 * Query Building Class.
 *
 * @package     Joomla.Platform
 * @subpackage  Database
 * @since       11.1
 */
abstract class JDatabaseQuery
{
	/**
	 * @var    resource  The database connection resource.
	 * @since  11.1
	 */
	protected $db = null;

	/**
	 * @var    string  The query type.
	 * @since  11.1
	 */
	protected $type = '';

	/**
	 * @var    string  The query element for a generic query (type = null).
	 * @since  11.1
	 */
	protected $element = null;

	/**
	 * @var    object  The select element.
	 * @since  11.1
	 */
	protected $select = null;

	/**
	 * @var    object  The delete element.
	 * @since  11.1
	 */
	protected $delete = null;

	/**
	 * @var    object  The update element.
	 * @since  11.1
	 */
	protected $update = null;

	/**
	 * @var    object  The insert element.
	 * @since  11.1
	 */
	protected $insert = null;

	/**
	 * @var    object  The from element.
	 * @since  11.1
	 */
	protected $from = null;

	/**
	 * @var    object  The join element.
	 * @since  11.1
	 */
	protected $join = null;

	/**
	 * @var    object  The set element.
	 * @since  11.1
	 */
	protected $set = null;

	/**
	 * @var    object  The where element.
	 * @since  11.1
	 */
	protected $where = null;

	/**
	 * @var    object  The group by element.
	 * @since  11.1
	 */
	protected $group = null;

	/**
	 * @var    object  The having element.
	 * @since  11.1
	 */
	protected $having = null;

	/**
	 * @var    object  The column list for an INSERT statement.
	 * @since  11.1
	 */
	protected $columns = null;

	/**
	 * @var    object  The values list for an INSERT statement.
	 * @since  11.1
	 */
	protected $values = null;

	/**
	 * @var    object  The order element.
	 * @since  11.1
	 */
	protected $order = null;

	/**
	 * Magic method to provide method alias support for quote() and quoteName().
	 *
	 * @param   string  $method  The called method.
	 * @param   array   $args    The array of arguments passed to the method.
	 *
	 * @return  string  The aliased method's return value or null.
	 *
	 * @since   11.1
	 */
	public function __call($method, $args)
	{
<<<<<<< HEAD
		if (empty($args)) {
=======
		if (empty($args))
		{
>>>>>>> upstream/master
			return;
		}

		switch ($method)
		{
			case 'q':
				return $this->quote($args[0], isset($args[1]) ? $args[1] : true);
				break;

			case 'qn':
				return $this->quoteName($args[0]);
				break;

			case 'e':
				return $this->escape($args[0], isset($args[1]) ? $args[1] : false);
				break;
		}
	}

	/**
	 * Class constructor.
	 *
	 * @param   JDatabase  $db  The database connector resource.
	 *
	 * @return  JDatabaseQuery
	 * @since   11.1
	 */
	public function __construct(JDatabase $db = null)
	{
		$this->db = $db;
	}

	/**
	 * Magic function to convert the query to a string.
	 *
	 * @return  string	The completed query.
	 *
	 * @since   11.1
	 */
	public function __toString()
	{
		$query = '';

		switch ($this->type)
		{
			case 'element':
				$query .= (string) $this->element;
				break;

			case 'select':
				$query .= (string) $this->select;
				$query .= (string) $this->from;
<<<<<<< HEAD
				if ($this->join) {
=======
				if ($this->join)
				{
>>>>>>> upstream/master
					// special case for joins
					foreach ($this->join as $join)
					{
						$query .= (string) $join;
					}
				}

<<<<<<< HEAD
				if ($this->where) {
					$query .= (string) $this->where;
				}

				if ($this->group) {
					$query .= (string) $this->group;
				}

				if ($this->having) {
					$query .= (string) $this->having;
				}

				if ($this->order) {
=======
				if ($this->where)
				{
					$query .= (string) $this->where;
				}

				if ($this->group)
				{
					$query .= (string) $this->group;
				}

				if ($this->having)
				{
					$query .= (string) $this->having;
				}

				if ($this->order)
				{
>>>>>>> upstream/master
					$query .= (string) $this->order;
				}

				break;

			case 'delete':
				$query .= (string) $this->delete;
				$query .= (string) $this->from;

<<<<<<< HEAD
				if ($this->join) {
=======
				if ($this->join)
				{
>>>>>>> upstream/master
					// special case for joins
					foreach ($this->join as $join)
					{
						$query .= (string) $join;
					}
				}

<<<<<<< HEAD
				if ($this->where) {
=======
				if ($this->where)
				{
>>>>>>> upstream/master
					$query .= (string) $this->where;
				}

				break;

			case 'update':
				$query .= (string) $this->update;
				$query .= (string) $this->set;

<<<<<<< HEAD
				if ($this->where) {
=======
				if ($this->where)
				{
>>>>>>> upstream/master
					$query .= (string) $this->where;
				}

				break;

			case 'insert':
				$query .= (string) $this->insert;

				// Set method
<<<<<<< HEAD
				if ($this->set) {
					$query .= (string) $this->set;
				}
				// Columns-Values method
				else if ($this->values) {
					if ($this->columns) {
						$query .= (string) $this->columns;
					}

					$query .= 'VALUES ';
=======
				if ($this->set)
				{
					$query .= (string) $this->set;
				}
				// Columns-Values method
				else if ($this->values)
				{
					if ($this->columns)
					{
						$query .= (string) $this->columns;
					}

					$query .= ' VALUES ';
>>>>>>> upstream/master
					$query .= (string) $this->values;
				}

				break;
		}

		return $query;
	}

	/**
<<<<<<< HEAD
=======
	 * Magic function to get protected variable value
	 *
	 * @param   string  $name  The name of the variable.
	 *
	 * @return  mixed
	 *
	 * @since   11.1
	 */
	public function __get($name)
	{
		return isset($this->$name) ? $this->$name : null;
	}

	/**
>>>>>>> upstream/master
	 * Casts a value to a char.
	 *
	 * Ensure that the value is properly quoted before passing to the method.
	 *
	 * @param   string  $value  The value to cast as a char.
	 *
	 * @return  string  Returns the cast value.
	 *
	 * @since   11.1
	 */
	public function castAsChar($value)
	{
		return $value;
	}

	/**
	 * Gets the number of characters in a string.
	 *
	 * Note, use 'length' to find the number of bytes in a string.
	 *
<<<<<<< HEAD
	 * @param   string  $value  A value.
=======
	 * @param   string  $field  A value.
>>>>>>> upstream/master
	 *
	 * @return  string  The required char lenght call.
	 *
	 * @since 11.1
	 */
	public function charLength($field)
	{
<<<<<<< HEAD
		return 'CHAR_LENGTH('.$field.')';
=======
		return 'CHAR_LENGTH(' . $field . ')';
>>>>>>> upstream/master
	}

	/**
	 * Clear data from the query or a specific clause of the query.
	 *
<<<<<<< HEAD
	 * @param   string  $clear  Optionally, the name of the clause to clear, or nothing to clear the whole query.
=======
	 * @param   string  $clause  Optionally, the name of the clause to clear, or nothing to clear the whole query.
>>>>>>> upstream/master
	 *
	 * @return  void
	 *
	 * @since   11.1
	 */
	public function clear($clause = null)
	{
		switch ($clause)
		{
			case 'select':
				$this->select = null;
				$this->type = null;
				break;

			case 'delete':
				$this->delete = null;
				$this->type = null;
				break;

			case 'update':
				$this->update = null;
				$this->type = null;
				break;

			case 'insert':
				$this->insert = null;
				$this->type = null;
				break;

			case 'from':
				$this->from = null;
				break;

			case 'join':
				$this->join = null;
				break;

			case 'set':
				$this->set = null;
				break;

			case 'where':
				$this->where = null;
				break;

			case 'group':
				$this->group = null;
				break;

			case 'having':
				$this->having = null;
				break;

			case 'order':
				$this->order = null;
				break;

			case 'columns':
				$this->columns = null;
				break;

			case 'values':
				$this->values = null;
				break;

			default:
				$this->type = null;
				$this->select = null;
				$this->delete = null;
				$this->update = null;
				$this->insert = null;
				$this->from = null;
				$this->join = null;
				$this->set = null;
				$this->where = null;
				$this->group = null;
				$this->having = null;
				$this->order = null;
				$this->columns = null;
				$this->values = null;
				break;
		}

		return $this;
	}

	/**
	 * Adds a column, or array of column names that would be used for an INSERT INTO statement.
	 *
	 * @param   mixed  $columns  A column name, or array of column names.
	 *
	 * @return  JDatabaseQuerySQLAzure  Returns this object to allow chaining.
	 *
	 * @since   11.1
	 */
	function columns($columns)
	{
<<<<<<< HEAD
		if (is_null($this->columns)) {
			$this->columns = new JDatabaseQueryElement('()', $columns);
		}
		else {
=======
		if (is_null($this->columns))
		{
			$this->columns = new JDatabaseQueryElement('()', $columns);
		}
		else
		{
>>>>>>> upstream/master
			$this->columns->append($columns);
		}

		return $this;
	}

	/**
	 * Concatenates an array of column names or values.
	 *
	 * @param   array   $values     An array of values to concatenate.
	 * @param   string  $separator  As separator to place between each value.
	 *
	 * @return  string  The concatenated values.
	 *
	 * @since   11.1
	 */
	function concatenate($values, $separator = null)
	{
<<<<<<< HEAD
		if ($separator) {
			return 'CONCATENATE('.implode(' || '.$this->quote($separator).' || ', $values).')';
		}
		else{
			return 'CONCATENATE('.implode(' || ', $values).')';
=======
		if ($separator)
		{
			return 'CONCATENATE(' . implode(' || ' . $this->quote($separator) . ' || ', $values) . ')';
		}
		else
		{
			return 'CONCATENATE(' . implode(' || ', $values) . ')';
>>>>>>> upstream/master
		}
	}

	/**
	 * Gets the current date and time.
	 *
	 * @return  string
	 *
	 * @since   11.1
	 */
	function currentTimestamp()
	{
		return 'CURRENT_TIMESTAMP()';
	}

	/**
	 * Returns a PHP date() function compliant date format for the database driver.
	 *
	 * @return  string  The format string.
	 *
	 * @since   11.1
	 */
	public function dateFormat()
	{
		return 'Y-m-d H:i:s';
	}

	/**
	 * Add a table name to the DELETE clause of the query.
	 *
	 * Note that you must not mix insert, update, delete and select method calls when building a query.
	 *
	 * @param   string  $table  The name of the table to delete from.
	 *
	 * @return  JDatabaseQuery  Returns this object to allow chaining.
	 *
	 * @since   11.1
	 */
	public function delete($table = null)
	{
<<<<<<< HEAD
		$this->type	= 'delete';
		$this->delete	= new JDatabaseQueryElement('DELETE', null);

		if (!empty($table)) {
=======
		$this->type = 'delete';
		$this->delete = new JDatabaseQueryElement('DELETE', null);

		if (!empty($table))
		{
>>>>>>> upstream/master
			$this->from($table);
		}

		return $this;
	}

	/**
	 * Method to escape a string for usage in an SQL statement.
	 *
<<<<<<< HEAD
	 * @param   string  $text   The string to be escaped.
	 * @param   bool    $extra  Optional parameter to provide extra escaping.
=======
	 * @param   string   $text   The string to be escaped.
	 * @param   boolean  $extra  Optional parameter to provide extra escaping.
>>>>>>> upstream/master
	 *
	 * @return  string  The escaped string.
	 *
	 * @since   11.1
	 * @throws  DatabaseError if the internal db property is not a valid object.
	 */
	public function escape($text, $extra = false)
	{
<<<<<<< HEAD
		if (!($this->db instanceof JDatabase)) {
			throw new DatabaseException('JLIB_DATABASE_ERROR_INVALID_DB_OBJECT');
=======
		if (!($this->db instanceof JDatabase))
		{
			throw new JDatabaseException('JLIB_DATABASE_ERROR_INVALID_DB_OBJECT');
>>>>>>> upstream/master
		}

		$this->db->escape($text, $extra);
	}

	/**
	 * Add a table to the FROM clause of the query.
	 *
	 * Note that while an array of tables can be provided, it is recommended you use explicit joins.
	 *
	 * @param   mixed  $tables  A string or array of table names.
	 *
	 * @return  JDatabaseQuery  Returns this object to allow chaining.
	 *
	 * @since   11.1
	 */
	public function from($tables)
	{
<<<<<<< HEAD
		if (is_null($this->from)) {
			$this->from = new JDatabaseQueryElement('FROM', $tables);
		}
		else {
=======
		if (is_null($this->from))
		{
			$this->from = new JDatabaseQueryElement('FROM', $tables);
		}
		else
		{
>>>>>>> upstream/master
			$this->from->append($tables);
		}

		return $this;
	}

	/**
	 * Add a grouping column to the GROUP clause of the query.
	 *
	 * @param   mixed  $columns  A string or array of ordering columns.
	 *
	 * @return  JDatabaseQuery  Returns this object to allow chaining.
	 *
	 * @since   11.1
	 */
	public function group($columns)
	{
<<<<<<< HEAD
		if (is_null($this->group)) {
			$this->group = new JDatabaseQueryElement('GROUP BY', $columns);
		}
		else {
=======
		if (is_null($this->group))
		{
			$this->group = new JDatabaseQueryElement('GROUP BY', $columns);
		}
		else
		{
>>>>>>> upstream/master
			$this->group->append($columns);
		}

		return $this;
	}

	/**
	 * A conditions to the HAVING clause of the query.
	 *
	 * @param   mixed   $conditions  A string or array of columns.
	 * @param   string  $glue        The glue by which to join the conditions. Defaults to AND.
	 *
	 * @return  JDatabaseQuery  Returns this object to allow chaining.
	 *
	 * @since   11.1
	 */
<<<<<<< HEAD
	public function having($conditions, $glue='AND')
	{
		if (is_null($this->having)) {
			$glue = strtoupper($glue);
			$this->having = new JDatabaseQueryElement('HAVING', $conditions, " $glue ");
		}
		else {
=======
	public function having($conditions, $glue = 'AND')
	{
		if (is_null($this->having))
		{
			$glue = strtoupper($glue);
			$this->having = new JDatabaseQueryElement('HAVING', $conditions, " $glue ");
		}
		else
		{
>>>>>>> upstream/master
			$this->having->append($conditions);
		}

		return $this;
	}

	/**
	 * Add an INNER JOIN clause to the query.
	 *
	 * @param   string  $conditions  A string or array of conditions.
	 *
	 * @return  JDatabaseQuery  Returns this object to allow chaining.
	 *
	 * @since   11.1
	 */
	public function innerJoin($conditions)
	{
		$this->join('INNER', $conditions);

		return $this;
	}

	/**
	 * Add a table name to the INSERT clause of the query.
	 *
	 * Note that you must not mix insert, update, delete and select method calls when building a query.
	 *
	 * @param   mixed  $table  The name of the table to insert data into.
	 *
	 * @return  JDatabaseQuery  Returns this object to allow chaining.
	 *
	 * @since   11.1
	 */
	public function insert($table)
	{
<<<<<<< HEAD
		$this->type	= 'insert';
		$this->insert	= new JDatabaseQueryElement('INSERT INTO', $table);
=======
		$this->type = 'insert';
		$this->insert = new JDatabaseQueryElement('INSERT INTO', $table);
>>>>>>> upstream/master

		return $this;
	}

	/**
	 * Add a JOIN clause to the query.
	 *
	 * @param   string  $type        The type of join. This string is prepended to the JOIN keyword.
	 * @param   string  $conditions  A string or array of conditions.
	 *
	 * @return  JDatabaseQuery  Returns this object to allow chaining.
	 *
	 * @since   11.1
	 */
	public function join($type, $conditions)
	{
<<<<<<< HEAD
		if (is_null($this->join)) {
=======
		if (is_null($this->join))
		{
>>>>>>> upstream/master
			$this->join = array();
		}
		$this->join[] = new JDatabaseQueryElement(strtoupper($type) . ' JOIN', $conditions);

		return $this;
	}

	/**
	 * Add a LEFT JOIN clause to the query.
	 *
	 * @param   string  $conditions  A string or array of conditions.
	 *
	 * @return  JDatabaseQuery  Returns this object to allow chaining.
	 *
	 * @since   11.1
	 */
	public function leftJoin($conditions)
	{
		$this->join('LEFT', $conditions);

		return $this;
	}

	/**
	 * Get the length of a string in bytes.
	 *
	 * Note, use 'charLength' to find the number of characters in a string.
	 *
	 * @param   string  $value  The string to measure.
	 *
	 * @return  int
	 *
	 * @since   11.1
	 */
	function length($value)
	{
<<<<<<< HEAD
		return 'LENGTH('.$value.')';
=======
		return 'LENGTH(' . $value . ')';
>>>>>>> upstream/master
	}

	/**
	 * Get the null or zero representation of a timestamp for the database driver.
	 *
	 * @param   boolean  $quoted  Optionally wraps the null date in database quotes (true by default).
	 *
	 * @return  string  Null or zero representation of a timestamp.
	 *
	 * @since   11.1
	 */
	public function nullDate($quoted = true)
	{
<<<<<<< HEAD
		if (!($this->db instanceof JDatabase)) {
			throw new DatabaseException('JLIB_DATABASE_ERROR_INVALID_DB_OBJECT');
=======
		if (!($this->db instanceof JDatabase))
		{
			throw new JDatabaseException('JLIB_DATABASE_ERROR_INVALID_DB_OBJECT');
>>>>>>> upstream/master
		}

		$result = $this->db->getNullDate($quoted);

<<<<<<< HEAD
		if ($quoted) {
=======
		if ($quoted)
		{
>>>>>>> upstream/master
			return $this->db->quote($result);
		}

		return $result;
	}

	/**
	 * Add a ordering column to the ORDER clause of the query.
	 *
	 * @param   mixed  $columns  A string or array of ordering columns.
	 *
	 * @return  JDatabaseQuery  Returns this object to allow chaining.
	 *
	 * @since   11.1
	 */
	public function order($columns)
	{
<<<<<<< HEAD
		if (is_null($this->order)) {
			$this->order = new JDatabaseQueryElement('ORDER BY', $columns);
		}
		else {
=======
		if (is_null($this->order))
		{
			$this->order = new JDatabaseQueryElement('ORDER BY', $columns);
		}
		else
		{
>>>>>>> upstream/master
			$this->order->append($columns);
		}

		return $this;
	}

	/**
	 * Add an OUTER JOIN clause to the query.
	 *
	 * @param   string  $conditions  A string or array of conditions.
	 *
	 * @return  JDatabaseQuery  Returns this object to allow chaining.
	 *
	 * @since   11.1
	 */
	public function outerJoin($conditions)
	{
		$this->join('OUTER', $conditions);

		return $this;
	}

	/**
	 * Method to quote and optionally escape a string to database requirements for insertion into the database.
	 *
<<<<<<< HEAD
	 * @param   string  $text    The string to quote.
	 * @param   bool    $escape  True to escape the string, false to leave it unchanged.
=======
	 * @param   string   $text    The string to quote.
	 * @param   boolean  $escape  True to escape the string, false to leave it unchanged.
>>>>>>> upstream/master
	 *
	 * @return  string  The quoted input string.
	 *
	 * @since   11.1
	 * @throws  DatabaseError if the internal db property is not a valid object.
	 */
	public function quote($text, $escape = true)
	{
<<<<<<< HEAD
		if (!($this->db instanceof JDatabase)) {
			throw new DatabaseException('JLIB_DATABASE_ERROR_INVALID_DB_OBJECT');
=======
		if (!($this->db instanceof JDatabase))
		{
			throw new JDatabaseException('JLIB_DATABASE_ERROR_INVALID_DB_OBJECT');
>>>>>>> upstream/master
		}

		return $this->db->quote(($escape ? $this->db->escape($text) : $text));
	}

	/**
	 * Wrap an SQL statement identifier name such as column, table or database names in quotes to prevent injection
	 * risks and reserved word conflicts.
	 *
	 * @param   string  $name  The identifier name to wrap in quotes.
	 *
	 * @return  string  The quote wrapped name.
	 *
	 * @since   11.1
	 * @throws  DatabaseError if the internal db property is not a valid object.
	 */
	public function quoteName($name)
	{
<<<<<<< HEAD
		if (!($this->db instanceof JDatabase)) {
			throw new DatabaseException('JLIB_DATABASE_ERROR_INVALID_DB_OBJECT');
=======
		if (!($this->db instanceof JDatabase))
		{
			throw new JDatabaseException('JLIB_DATABASE_ERROR_INVALID_DB_OBJECT');
>>>>>>> upstream/master
		}

		return $this->db->quoteName($name);
	}

	/**
	 * Add a RIGHT JOIN clause to the query.
	 *
	 * @param   string  $conditions  A string or array of conditions.
	 *
	 * @return  JDatabaseQuery  Returns this object to allow chaining.
	 *
	 * @since   11.1
	 */
	public function rightJoin($conditions)
	{
		$this->join('RIGHT', $conditions);

		return $this;
	}

	/**
	 * Add a single column, or array of columns to the SELECT clause of the query.
	 *
	 * Note that you must not mix insert, update, delete and select method calls when building a query.
	 * The select method can, however, be called multiple times in the same query.
	 *
	 * @param   mixed  $columns  A string or an array of field names.
	 *
	 * @return  JDatabaseQuery  Returns this object to allow chaining.
	 *
	 * @since   11.1
	 */
	public function select($columns)
	{
		$this->type = 'select';

<<<<<<< HEAD
		if (is_null($this->select)) {
			$this->select = new JDatabaseQueryElement('SELECT', $columns);
		}
		else {
=======
		if (is_null($this->select))
		{
			$this->select = new JDatabaseQueryElement('SELECT', $columns);
		}
		else
		{
>>>>>>> upstream/master
			$this->select->append($columns);
		}

		return $this;
	}

	/**
	 * Add a single condition string, or an array of strings to the SET clause of the query.
	 *
	 * @param   mixed   $conditions  A string or array of conditions.
	 * @param   string  $glue        The glue by which to join the condition strings. Defaults to ,.
	 *
	 * @return  JDatabaseQuery  Returns this object to allow chaining.
	 *
	 * @since   11.1
	 */
<<<<<<< HEAD
	public function set($conditions, $glue=',')
	{
		if (is_null($this->set)) {
			$glue = strtoupper($glue);
			$this->set = new JDatabaseQueryElement('SET', $conditions, "\n\t$glue ");
		}
		else {
=======
	public function set($conditions, $glue = ',')
	{
		if (is_null($this->set))
		{
			$glue = strtoupper($glue);
			$this->set = new JDatabaseQueryElement('SET', $conditions, "\n\t$glue ");
		}
		else
		{
>>>>>>> upstream/master
			$this->set->append($conditions);
		}

		return $this;
	}

	/**
	 * Add a table name to the UPDATE clause of the query.
	 *
	 * Note that you must not mix insert, update, delete and select method calls when building a query.
	 *
	 * @param   mixed  $tables  A string or array of table names.
	 *
	 * @return  JDatabaseQuery  Returns this object to allow chaining.
	 *
	 * @since   11.1
	 */
	public function update($tables)
	{
		$this->type = 'update';
		$this->update = new JDatabaseQueryElement('UPDATE', $tables);

		return $this;
	}

	/**
	 * Adds a tuple, or array of tuples that would be used as values for an INSERT INTO statement.
	 *
<<<<<<< HEAD
	 * @param  string  $values  A single tuple, or array of tuples.
	 *
	 * @return  JDatabaseQuerySQLAzure  Returns this object to allow chaining.
=======
	 * @param   string  $values  A single tuple, or array of tuples.
	 *
	 * @return  JDatabaseQuery  Returns this object to allow chaining.
>>>>>>> upstream/master
	 *
	 * @since   11.1
	 */
	function values($values)
	{
<<<<<<< HEAD
		if (is_null($this->values)) {
			$this->values = new JDatabaseQueryElement('()', $values, '), (');
		}
		else {
=======
		if (is_null($this->values))
		{
			$this->values = new JDatabaseQueryElement('()', $values, '), (');
		}
		else
		{
>>>>>>> upstream/master
			$this->values->append($values);
		}

		return $this;
	}

	/**
	 * Add a single condition, or an array of conditions to the WHERE clause of the query.
	 *
	 * @param   mixed   $conditions  A string or array of where conditions.
	 * @param   string  $glue        The glue by which to join the conditions. Defaults to AND.
	 *
	 * @return  JDatabaseQuery  Returns this object to allow chaining.
	 *
	 * @since   11.1
	 */
	public function where($conditions, $glue = 'AND')
	{
<<<<<<< HEAD
		if (is_null($this->where)) {
			$glue = strtoupper($glue);
			$this->where = new JDatabaseQueryElement('WHERE', $conditions, " $glue ");
		}
		else {
=======
		if (is_null($this->where))
		{
			$glue = strtoupper($glue);
			$this->where = new JDatabaseQueryElement('WHERE', $conditions, " $glue ");
		}
		else
		{
>>>>>>> upstream/master
			$this->where->append($conditions);
		}

		return $this;
	}
}