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

JLoader::register('JDatabaseQueryMySQL', dirname(__FILE__).'/mysqlquery.php');
JLoader::register('JDatabaseExporterMySQL', dirname(__FILE__).'/mysqlexporter.php');
JLoader::register('JDatabaseImporterMySQL', dirname(__FILE__).'/mysqlimporter.php');
=======
defined('JPATH_PLATFORM') or die();

JLoader::register('JDatabaseQueryMySQL', dirname(__FILE__) . '/mysqlquery.php');
JLoader::register('JDatabaseExporterMySQL', dirname(__FILE__) . '/mysqlexporter.php');
JLoader::register('JDatabaseImporterMySQL', dirname(__FILE__) . '/mysqlimporter.php');
>>>>>>> upstream/master

/**
 * MySQL database driver
 *
 * @package     Joomla.Platform
 * @subpackage  Database
<<<<<<< HEAD
=======
 * @see         http://dev.mysql.com/doc/
>>>>>>> upstream/master
 * @since       11.1
 */
class JDatabaseMySQL extends JDatabase
{
	/**
<<<<<<< HEAD
	 * @var    string  The name of the database driver.
=======
	 * The name of the database driver.
	 *
	 * @var    string
>>>>>>> upstream/master
	 * @since  11.1
	 */
	public $name = 'mysql';

	/**
<<<<<<< HEAD
	 * @var    string  The character(s) used to quote SQL statement names such as table names or field names,
	 *                 etc.  The child classes should define this as necessary.  If a single character string the
	 *                 same character is used for both sides of the quoted name, else the first character will be
	 *                 used for the opening quote and the second for the closing quote.
=======
	 * The character(s) used to quote SQL statement names such as table names or field names,
	 * etc. The child classes should define this as necessary.  If a single character string the
	 * same character is used for both sides of the quoted name, else the first character will be
	 * used for the opening quote and the second for the closing quote.
	 *
	 * @var    string
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $nameQuote = '`';

	/**
<<<<<<< HEAD
	 * @var    string  The null or zero representation of a timestamp for the database driver.  This should be
	 *                 defined in child classes to hold the appropriate value for the engine.
=======
	 * The null or zero representation of a timestamp for the database driver.  This should be
	 * defined in child classes to hold the appropriate value for the engine.
	 *
	 * @var    string
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $nullDate = '0000-00-00 00:00:00';

	/**
	 * Constructor.
	 *
<<<<<<< HEAD
	 * @param   array  $options  List of options used to configure the connection
=======
	 * @param   array  $options  Array of database options with keys: host, user, password, database, select.
>>>>>>> upstream/master
	 *
	 * @return  void
	 *
	 * @since   11.1
	 */
	protected function __construct($options)
	{
		// Get some basic values from the options.
<<<<<<< HEAD
		$options['host']     = (isset($options['host'])) ? $options['host'] : 'localhost';
		$options['user']     = (isset($options['user'])) ? $options['user'] : 'root';
		$options['password'] = (isset($options['password'])) ? $options['password'] : '';
		$options['database'] = (isset($options['database'])) ? $options['database'] : '';
		$options['select']   = (isset($options['select'])) ? (bool) $options['select'] : true;

		// Make sure the MySQL extension for PHP is installed and enabled.
		if (!function_exists('mysql_connect')) {

			// Legacy error handling switch based on the JError::$legacy switch.
			// @deprecated  11.3
			if (JError::$legacy) {
=======
		$options['host'] = (isset($options['host'])) ? $options['host'] : 'localhost';
		$options['user'] = (isset($options['user'])) ? $options['user'] : 'root';
		$options['password'] = (isset($options['password'])) ? $options['password'] : '';
		$options['database'] = (isset($options['database'])) ? $options['database'] : '';
		$options['select'] = (isset($options['select'])) ? (bool) $options['select'] : true;

		// Make sure the MySQL extension for PHP is installed and enabled.
		if (!function_exists('mysql_connect'))
		{

			// Legacy error handling switch based on the JError::$legacy switch.
			// @deprecated  12.1
			if (JError::$legacy)
			{
>>>>>>> upstream/master
				$this->errorNum = 1;
				$this->errorMsg = JText::_('JLIB_DATABASE_ERROR_ADAPTER_MYSQL');
				return;
			}
<<<<<<< HEAD
			else {
				throw new DatabaseException(JText::_('JLIB_DATABASE_ERROR_ADAPTER_MYSQL'));
=======
			else
			{
				throw new JDatabaseException(JText::_('JLIB_DATABASE_ERROR_ADAPTER_MYSQL'));
>>>>>>> upstream/master
			}
		}

		// Attempt to connect to the server.
<<<<<<< HEAD
		if (!($this->connection = @ mysql_connect($options['host'], $options['user'], $options['password'], true))) {

			// Legacy error handling switch based on the JError::$legacy switch.
			// @deprecated  11.3
			if (JError::$legacy) {
=======
		if (!($this->connection = @ mysql_connect($options['host'], $options['user'], $options['password'], true)))
		{

			// Legacy error handling switch based on the JError::$legacy switch.
			// @deprecated  12.1
			if (JError::$legacy)
			{
>>>>>>> upstream/master
				$this->errorNum = 2;
				$this->errorMsg = JText::_('JLIB_DATABASE_ERROR_CONNECT_MYSQL');
				return;
			}
<<<<<<< HEAD
			else {
				throw new DatabaseException(JText::_('JLIB_DATABASE_ERROR_CONNECT_MYSQL'));
=======
			else
			{
				throw new JDatabaseException(JText::_('JLIB_DATABASE_ERROR_CONNECT_MYSQL'));
>>>>>>> upstream/master
			}
		}

		// Finalize initialisation
		parent::__construct($options);

		// Set sql_mode to non_strict mode
		mysql_query("SET @@SESSION.sql_mode = '';", $this->connection);

		// If auto-select is enabled select the given database.
<<<<<<< HEAD
		if ($options['select'] && !empty($options['database'])) {
=======
		if ($options['select'] && !empty($options['database']))
		{
>>>>>>> upstream/master
			$this->select($options['database']);
		}
	}

	/**
	 * Destructor.
	 *
	 * @return  void
	 *
	 * @since   11.1
	 */
	public function __destruct()
	{
<<<<<<< HEAD
		if (is_resource($this->connection)) {
=======
		if (is_resource($this->connection))
		{
>>>>>>> upstream/master
			mysql_close($this->connection);
		}
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
	 */
	public function escape($text, $extra = false)
	{
		$result = mysql_real_escape_string($text, $this->getConnection());

<<<<<<< HEAD
		if ($extra) {
=======
		if ($extra)
		{
>>>>>>> upstream/master
			$result = addcslashes($result, '%_');
		}

		return $result;
	}

	/**
	 * Test to see if the MySQL connector is available.
	 *
<<<<<<< HEAD
	 * @return  bool  True on success, false otherwise.
=======
	 * @return  boolean  True on success, false otherwise.
>>>>>>> upstream/master
	 *
	 * @since   11.1
	 */
	public static function test()
	{
		return (function_exists('mysql_connect'));
	}

	/**
	 * Determines if the connection to the server is active.
	 *
<<<<<<< HEAD
	 * @return  bool  True if connected to the database engine.
=======
	 * @return  boolean  True if connected to the database engine.
>>>>>>> upstream/master
	 *
	 * @since   11.1
	 */
	public function connected()
	{
<<<<<<< HEAD
		if (is_resource($this->connection)) {
=======
		if (is_resource($this->connection))
		{
>>>>>>> upstream/master
			return mysql_ping($this->connection);
		}

		return false;
	}

	/**
	 * Drops a table from the database.
	 *
<<<<<<< HEAD
	 * @param   string  $tableName  The name of the database table to drop.
	 * @param   bool    $ifExists   Optionally specify that the table must exist before it is dropped.
	 *
	 * @return  JDatabaseSQLSrv  Returns this object to support chaining.
=======
	 * @param   string   $tableName  The name of the database table to drop.
	 * @param   boolean  $ifExists   Optionally specify that the table must exist before it is dropped.
	 *
	 * @return  JDatabaseSQLSrv  Returns this object to support chaining.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	function dropTable($tableName, $ifExists = true)
	{
		$query = $this->getQuery(true);

<<<<<<< HEAD
		$this->setQuery(
			'DROP TABLE '.
			($ifExists ? 'IF EXISTS ' : '').
			$query->quoteName($tableName)
		);
=======
		$this->setQuery('DROP TABLE ' . ($ifExists ? 'IF EXISTS ' : '') . $query->quoteName($tableName));
>>>>>>> upstream/master

		$this->query();

		return $this;
	}

	/**
	 * Get the number of affected rows for the previous executed SQL statement.
	 *
	 * @return  integer  The number of affected rows.
	 *
	 * @since   11.1
	 */
	public function getAffectedRows()
	{
		return mysql_affected_rows($this->connection);
	}

	/**
	 * Method to get the database collation in use by sampling a text field of a table in the database.
	 *
<<<<<<< HEAD
	 * @return  mixed  The collation in use by the database or boolean false if not supported.
=======
	 * @return  mixed  The collation in use by the database (string) or boolean false if not supported.
>>>>>>> upstream/master
	 *
	 * @since   11.1
	 */
	public function getCollation()
	{
<<<<<<< HEAD
		if ($this->hasUTF()) {
			$this->setQuery('SHOW FULL COLUMNS FROM #__users');
			$array = $this->loadAssocList();
			return $array['2']['Collation'];
		} else {
			return 'N/A (Not Able to Detect)';
		}
=======
		$this->setQuery('SHOW FULL COLUMNS FROM #__users');
		$array = $this->loadAssocList();
		return $array['2']['Collation'];
>>>>>>> upstream/master
	}

	/**
	 * Gets an exporter class object.
	 *
	 * @return  JDatabaseExporterMySQL  An exporter object.
	 *
	 * @since   11.1
	 */
	public function getExporter()
	{
		// Make sure we have an exporter class for this driver.
<<<<<<< HEAD
		if (!class_exists('JDatabaseExporterMySQL')) {
			throw new DatabaseException(JText::_('JLIB_DATABASE_ERROR_MISSING_EXPORTER'));
=======
		if (!class_exists('JDatabaseExporterMySQL'))
		{
			throw new JDatabaseException(JText::_('JLIB_DATABASE_ERROR_MISSING_EXPORTER'));
>>>>>>> upstream/master
		}

		$o = new JDatabaseExporterMySQL;
		$o->setDbo($this);

		return $o;
	}

	/**
	 * Gets an importer class object.
	 *
	 * @return  JDatabaseImporterMySQL  An importer object.
	 *
	 * @since   11.1
	 */
	public function getImporter()
	{
		// Make sure we have an importer class for this driver.
<<<<<<< HEAD
		if (!class_exists('JDatabaseImporterMySQL')) {
			throw new DatabaseException(JText::_('JLIB_DATABASE_ERROR_MISSING_IMPORTER'));
=======
		if (!class_exists('JDatabaseImporterMySQL'))
		{
			throw new JDatabaseException(JText::_('JLIB_DATABASE_ERROR_MISSING_IMPORTER'));
>>>>>>> upstream/master
		}

		$o = new JDatabaseImporterMySQL;
		$o->setDbo($this);

		return $o;
	}

	/**
	 * Get the number of returned rows for the previous executed SQL statement.
	 *
	 * @param   resource  $cursor  An optional database cursor resource to extract the row count from.
	 *
	 * @return  integer   The number of returned rows.
	 *
	 * @since   11.1
	 */
	public function getNumRows($cursor = null)
	{
		return mysql_num_rows($cursor ? $cursor : $this->cursor);
	}

	/**
	 * Get the current or query, or new JDatabaseQuery object.
	 *
<<<<<<< HEAD
	 * @param   bool   $new  False to return the last query set, True to return a new JDatabaseQuery object.
=======
	 * @param   boolean  $new  False to return the last query set, True to return a new JDatabaseQuery object.
>>>>>>> upstream/master
	 *
	 * @return  mixed  The current value of the internal SQL variable or a new JDatabaseQuery object.
	 *
	 * @since   11.1
<<<<<<< HEAD
	 * @throws  DatabaseException
	 */
	function getQuery($new = false)
	{
		if ($new) {
			// Make sure we have a query class for this driver.
			if (!class_exists('JDatabaseQueryMySQL')) {
				throw new DatabaseException(JText::_('JLIB_DATABASE_ERROR_MISSING_QUERY'));
			}
			return new JDatabaseQueryMySQL($this);
		}
		else {
=======
	 * @throws  JDatabaseException
	 */
	function getQuery($new = false)
	{
		if ($new)
		{
			// Make sure we have a query class for this driver.
			if (!class_exists('JDatabaseQueryMySQL'))
			{
				throw new JDatabaseException(JText::_('JLIB_DATABASE_ERROR_MISSING_QUERY'));
			}
			return new JDatabaseQueryMySQL($this);
		}
		else
		{
>>>>>>> upstream/master
			return $this->sql;
		}
	}

	/**
	 * Shows the table CREATE statement that creates the given tables.
	 *
	 * @param   mixed  $tables  A table name or a list of table names.
	 *
	 * @return  array  A list of the create SQL for the tables.
	 *
	 * @since   11.1
<<<<<<< HEAD
	 * @throws  DatabaseException
=======
	 * @throws  JDatabaseException
>>>>>>> upstream/master
	 */
	public function getTableCreate($tables)
	{
		// Initialise variables.
		$result = array();

		// Sanitize input to an array and iterate over the list.
		settype($tables, 'array');
		foreach ($tables as $table)
		{
			// Set the query to get the table CREATE statement.
<<<<<<< HEAD
			$this->setQuery('SHOW CREATE table '.$this->quoteName($this->escape($table)));
=======
			$this->setQuery('SHOW CREATE table ' . $this->quoteName($this->escape($table)));
>>>>>>> upstream/master
			$row = $this->loadRow();

			// Populate the result array based on the create statements.
			$result[$table] = $row[1];
		}

		return $result;
	}

	/**
	 * Retrieves field information about a given table.
	 *
<<<<<<< HEAD
	 * @param   string  $table     The name of the database table.
	 * @param   bool    $typeOnly  True to only return field types.
=======
	 * @param   string   $table     The name of the database table.
	 * @param   boolean  $typeOnly  True to only return field types.
>>>>>>> upstream/master
	 *
	 * @return  array  An array of fields for the database table.
	 *
	 * @since   11.1
<<<<<<< HEAD
	 * @throws  DatabaseException
=======
	 * @throws  JDatabaseException
>>>>>>> upstream/master
	 */
	public function getTableColumns($table, $typeOnly = true)
	{
		$result = array();
		$query = $this->getQuery(true);

		// Set the query to get the table fields statement.
<<<<<<< HEAD
		$this->setQuery('SHOW FULL COLUMNS FROM '.$this->quoteName($this->escape($table)));
		$fields = $this->loadObjectList();

		// If we only want the type as the value add just that to the list.
		if ($typeOnly) {
			foreach ($fields as $field)
			{
				$result[$field->Field] = preg_replace("/[(0-9)]/",'', $field->Type);
			}
		}
		// If we want the whole field data object add that to the list.
		else {
=======
		$this->setQuery('SHOW FULL COLUMNS FROM ' . $this->quoteName($this->escape($table)));
		$fields = $this->loadObjectList();

		// If we only want the type as the value add just that to the list.
		if ($typeOnly)
		{
			foreach ($fields as $field)
			{
				$result[$field->Field] = preg_replace("/[(0-9)]/", '', $field->Type);
			}
		}
		// If we want the whole field data object add that to the list.
		else
		{
>>>>>>> upstream/master
			foreach ($fields as $field)
			{
				$result[$field->Field] = $field;
			}
		}

		return $result;
	}

	/**
	 * Get the details list of keys for a table.
	 *
	 * @param   string  $table  The name of the table.
	 *
	 * @return  array  An arry of the column specification for the table.
	 *
	 * @since   11.1
<<<<<<< HEAD
	 * @throws  DatabaseException
=======
	 * @throws  JDatabaseException
>>>>>>> upstream/master
	 */
	public function getTableKeys($table)
	{
		// Get the details columns information.
<<<<<<< HEAD
		$this->setQuery(
			'SHOW KEYS FROM '.$this->db->quoteName($table)
		);
=======
		$this->setQuery('SHOW KEYS FROM ' . $this->db->quoteName($table));
>>>>>>> upstream/master
		$keys = $this->loadObjectList();

		return $keys;
	}

	/**
	 * Method to get an array of all tables in the database.
	 *
	 * @return  array  An array of all the tables in the database.
	 *
	 * @since   11.1
<<<<<<< HEAD
	 * @throws  DatabaseException
=======
	 * @throws  JDatabaseException
>>>>>>> upstream/master
	 */
	public function getTableList()
	{
		// Set the query to get the tables statement.
		$this->setQuery('SHOW TABLES');
		$tables = $this->loadColumn();

		return $tables;
	}

	/**
	 * Get the version of the database connector.
	 *
	 * @return  string  The database connector version.
	 *
	 * @since   11.1
	 */
	public function getVersion()
	{
		return mysql_get_server_info($this->connection);
	}

	/**
	 * Determines if the database engine supports UTF-8 character encoding.
	 *
	 * @return  boolean  True if supported.
	 *
	 * @since   11.1
<<<<<<< HEAD
	 */
	public function hasUTF()
	{
		$verParts = explode('.', $this->getVersion());
		return ($verParts[0] == 5 || ($verParts[0] == 4 && $verParts[1] == 1 && (int)$verParts[2] >= 2));
=======
	 * @deprecated 12.1
	 */
	public function hasUTF()
	{
		jimport('joomla.log.log');
		JLog::add('JDatabaseMySQL::hasUTF() is deprecated.', JLog::WARNING, 'deprecated');
		return true;
>>>>>>> upstream/master
	}

	/**
	 * Method to get the auto-incremented value from the last INSERT statement.
	 *
	 * @return  integer  The value of the auto-increment field from the last inserted row.
	 *
	 * @since   11.1
	 */
	public function insertid()
	{
		return mysql_insert_id($this->connection);
	}

	/**
	 * Execute the SQL statement.
	 *
	 * @return  mixed  A database cursor resource on success, boolean false on failure.
	 *
	 * @since   11.1
<<<<<<< HEAD
	 * @throws  DatabaseException
	 */
	public function query()
	{
		if (!is_resource($this->connection)) {

			// Legacy error handling switch based on the JError::$legacy switch.
			// @deprecated  11.3
			if (JError::$legacy) {

				if ($this->debug) {
					JError::raiseError(500, 'JDatabaseMySQL::query: '.$this->errorNum.' - '.$this->errorMsg);
				}
				return false;
			}
			else {
				JLog::add(JText::sprintf('JLIB_DATABASE_QUERY_FAILED', $this->errorNum, $this->errorMsg), JLog::ERROR, 'database');
				throw new DatabaseException();
=======
	 * @throws  JDatabaseException
	 */
	public function query()
	{
		if (!is_resource($this->connection))
		{

			// Legacy error handling switch based on the JError::$legacy switch.
			// @deprecated  12.1
			if (JError::$legacy)
			{

				if ($this->debug)
				{
					JError::raiseError(500, 'JDatabaseMySQL::query: ' . $this->errorNum . ' - ' . $this->errorMsg);
				}
				return false;
			}
			else
			{
				JLog::add(JText::sprintf('JLIB_DATABASE_QUERY_FAILED', $this->errorNum, $this->errorMsg), JLog::ERROR, 'database');
				throw new JDatabaseException($this->errorMsg, $this->errorNum);
>>>>>>> upstream/master
			}
		}

		// Take a local copy so that we don't modify the original query and cause issues later
		$sql = $this->replacePrefix((string) $this->sql);
<<<<<<< HEAD
		if ($this->limit > 0 || $this->offset > 0) {
			$sql .= ' LIMIT '.$this->offset.', '.$this->limit;
		}

		// If debugging is enabled then let's log the query.
		if ($this->debug) {
=======
		if ($this->limit > 0 || $this->offset > 0)
		{
			$sql .= ' LIMIT ' . $this->offset . ', ' . $this->limit;
		}

		// If debugging is enabled then let's log the query.
		if ($this->debug)
		{
>>>>>>> upstream/master

			// Increment the query counter and add the query to the object queue.
			$this->count++;
			$this->log[] = $sql;

			JLog::add($sql, JLog::DEBUG, 'databasequery');
		}

		// Reset the error values.
		$this->errorNum = 0;
		$this->errorMsg = '';

		// Execute the query.
		$this->cursor = mysql_query($sql, $this->connection);

		// If an error occurred handle it.
<<<<<<< HEAD
		if (!$this->cursor) {
			$this->errorNum = (int) mysql_errno($this->connection);
			$this->errorMsg = (string) mysql_error($this->connection).' SQL='.$sql;

			// Legacy error handling switch based on the JError::$legacy switch.
			// @deprecated  11.3
			if (JError::$legacy) {

				if ($this->debug) {
					JError::raiseError(500, 'JDatabaseMySQL::query: '.$this->errorNum.' - '.$this->errorMsg);
				}
				return false;
			}
			else {
				JLog::add(JText::sprintf('JLIB_DATABASE_QUERY_FAILED', $this->errorNum, $this->errorMsg), JLog::ERROR, 'databasequery');
				throw new DatabaseException();
=======
		if (!$this->cursor)
		{
			$this->errorNum = (int) mysql_errno($this->connection);
			$this->errorMsg = (string) mysql_error($this->connection) . ' SQL=' . $sql;

			// Legacy error handling switch based on the JError::$legacy switch.
			// @deprecated  12.1
			if (JError::$legacy)
			{

				if ($this->debug)
				{
					JError::raiseError(500, 'JDatabaseMySQL::query: ' . $this->errorNum . ' - ' . $this->errorMsg);
				}
				return false;
			}
			else
			{
				JLog::add(JText::sprintf('JLIB_DATABASE_QUERY_FAILED', $this->errorNum, $this->errorMsg), JLog::ERROR, 'databasequery');
				throw new JDatabaseException($this->errorMsg, $this->errorNum);
>>>>>>> upstream/master
			}
		}

		return $this->cursor;
	}

	/**
	 * Select a database for use.
	 *
	 * @param   string  $database  The name of the database to select for use.
	 *
<<<<<<< HEAD
	 * @return  bool  True if the database was successfully selected.
	 *
	 * @since   11.1
	 * @throws  DatabaseException
	 */
	public function select($database)
	{
		if (!$database) {
			return false;
		}

		if (!mysql_select_db($database, $this->connection)) {

			// Legacy error handling switch based on the JError::$legacy switch.
			// @deprecated  11.3
			if (JError::$legacy) {
=======
	 * @return  boolean  True if the database was successfully selected.
	 *
	 * @since   11.1
	 * @throws  JDatabaseException
	 */
	public function select($database)
	{
		if (!$database)
		{
			return false;
		}

		if (!mysql_select_db($database, $this->connection))
		{

			// Legacy error handling switch based on the JError::$legacy switch.
			// @deprecated  12.1
			if (JError::$legacy)
			{
>>>>>>> upstream/master
				$this->errorNum = 3;
				$this->errorMsg = JText::_('JLIB_DATABASE_ERROR_DATABASE_CONNECT');
				return false;
			}
<<<<<<< HEAD
			else {
				throw new DatabaseException(JText::_('JLIB_DATABASE_ERROR_DATABASE_CONNECT'));
=======
			else
			{
				throw new JDatabaseException(JText::_('JLIB_DATABASE_ERROR_DATABASE_CONNECT'));
>>>>>>> upstream/master
			}
		}

		return true;
	}

	/**
	 * Set the connection to use UTF-8 character encoding.
	 *
<<<<<<< HEAD
	 * @return  bool  True on success.
=======
	 * @return  boolean  True on success.
>>>>>>> upstream/master
	 *
	 * @since   11.1
	 */
	public function setUTF()
	{
		return mysql_query("SET NAMES 'utf8'", $this->connection);
	}

	/**
	 * Method to commit a transaction.
	 *
	 * @return  void
	 *
	 * @since   11.1
<<<<<<< HEAD
	 * @throws  DatabaseException
=======
	 * @throws  JDatabaseException
>>>>>>> upstream/master
	 */
	public function transactionCommit()
	{
		$this->setQuery('COMMIT');
		$this->query();
	}

	/**
	 * Method to roll back a transaction.
	 *
	 * @return  void
	 *
	 * @since   11.1
<<<<<<< HEAD
	 * @throws  DatabaseException
=======
	 * @throws  JDatabaseException
>>>>>>> upstream/master
	 */
	public function transactionRollback()
	{
		$this->setQuery('ROLLBACK');
		$this->query();
	}

	/**
	 * Method to initialize a transaction.
	 *
	 * @return  void
	 *
	 * @since   11.1
<<<<<<< HEAD
	 * @throws  DatabaseException
=======
	 * @throws  JDatabaseException
>>>>>>> upstream/master
	 */
	public function transactionStart()
	{
		$this->setQuery('START TRANSACTION');
		$this->query();
	}

	/**
	 * Method to fetch a row from the result set cursor as an array.
	 *
	 * @param   mixed  $cursor  The optional result set cursor from which to fetch the row.
	 *
	 * @return  mixed  Either the next row from the result set or false if there are no more rows.
	 *
	 * @since   11.1
	 */
	protected function fetchArray($cursor = null)
	{
		return mysql_fetch_row($cursor ? $cursor : $this->cursor);
	}

	/**
	 * Method to fetch a row from the result set cursor as an associative array.
	 *
	 * @param   mixed  $cursor  The optional result set cursor from which to fetch the row.
	 *
	 * @return  mixed  Either the next row from the result set or false if there are no more rows.
	 *
	 * @since   11.1
	 */
	protected function fetchAssoc($cursor = null)
	{
		return mysql_fetch_assoc($cursor ? $cursor : $this->cursor);
	}

	/**
	 * Method to fetch a row from the result set cursor as an object.
	 *
	 * @param   mixed   $cursor  The optional result set cursor from which to fetch the row.
	 * @param   string  $class   The class name to use for the returned row object.
	 *
	 * @return  mixed   Either the next row from the result set or false if there are no more rows.
	 *
	 * @since   11.1
	 */
	protected function fetchObject($cursor = null, $class = 'stdClass')
	{
		return mysql_fetch_object($cursor ? $cursor : $this->cursor, $class);
	}

	/**
	 * Method to free up the memory used for the result set.
	 *
	 * @param   mixed  $cursor  The optional result set cursor from which to fetch the row.
	 *
	 * @return  void
	 *
	 * @since   11.1
	 */
	protected function freeResult($cursor = null)
	{
		mysql_free_result($cursor ? $cursor : $this->cursor);
	}

	/**
	 * Diagnostic method to return explain information for a query.
	 *
	 * @return      string  The explain output.
	 *
	 * @since       11.1
<<<<<<< HEAD
	 * @deprecated  11.2
=======
	 * @deprecated  12.1
>>>>>>> upstream/master
	 */
	public function explain()
	{
		// Deprecation warning.
		JLog::add('JDatabase::explain() is deprecated.', JLog::WARNING, 'deprecated');

		// Backup the current query so we can reset it later.
		$backup = $this->sql;

		// Prepend the current query with EXPLAIN so we get the diagnostic data.
<<<<<<< HEAD
		$this->sql = 'EXPLAIN '.$this->sql;

		// Execute the query and get the result set cursor.
		if (!($cursor = $this->query())) {
=======
		$this->sql = 'EXPLAIN ' . $this->sql;

		// Execute the query and get the result set cursor.
		if (!($cursor = $this->query()))
		{
>>>>>>> upstream/master
			return null;
		}

		// Build the HTML table.
		$first = true;
		$buffer = '<table id="explain-sql">';
<<<<<<< HEAD
		$buffer .= '<thead><tr><td colspan="99">'.$this->getQuery().'</td></tr>';
		while ($row = $this->fetchAssoc($cursor))
		{
			if ($first) {
				$buffer .= '<tr>';
				foreach ($row as $k=>$v)
				{
					$buffer .= '<th>'.$k.'</th>';
=======
		$buffer .= '<thead><tr><td colspan="99">' . $this->getQuery() . '</td></tr>';
		while ($row = $this->fetchAssoc($cursor))
		{
			if ($first)
			{
				$buffer .= '<tr>';
				foreach ($row as $k => $v)
				{
					$buffer .= '<th>' . $k . '</th>';
>>>>>>> upstream/master
				}
				$buffer .= '</tr></thead><tbody>';
				$first = false;
			}
			$buffer .= '<tr>';
<<<<<<< HEAD
			foreach ($row as $k=>$v)
			{
				$buffer .= '<td>'.$v.'</td>';
=======
			foreach ($row as $k => $v)
			{
				$buffer .= '<td>' . $v . '</td>';
>>>>>>> upstream/master
			}
			$buffer .= '</tr>';
		}
		$buffer .= '</tbody></table>';

<<<<<<< HEAD
		// Restore the original query to it's state before we ran the explain.
=======
		// Restore the original query to its state before we ran the explain.
>>>>>>> upstream/master
		$this->sql = $backup;

		// Free up system resources and return.
		$this->freeResult($cursor);

		return $buffer;
	}

	/**
	 * Execute a query batch.
	 *
<<<<<<< HEAD
	 * @return      mixed  A database resource if successful, false if not.
	 *
	 * @since       11.1
	 * @deprecated  11.2
	 */
	public function queryBatch($abortOnError=true, $transactionSafe = false)
=======
	 * @param   boolean  $abortOnError     Abort on error.
	 * @param   boolean  $transactionSafe  Transaction safe queries.
	 *
	 * @return  mixed  A database resource if successful, false if not.
	 *
	 * @deprecated  12.1
	 * @since   11.1
	 */
	public function queryBatch($abortOnError = true, $transactionSafe = false)
>>>>>>> upstream/master
	{
		// Deprecation warning.
		JLog::add('JDatabase::queryBatch() is deprecated.', JLog::WARNING, 'deprecated');

		$sql = $this->replacePrefix((string) $this->sql);
		$this->errorNum = 0;
		$this->errorMsg = '';

		// If the batch is meant to be transaction safe then we need to wrap it in a transaction.
<<<<<<< HEAD
		if ($transactionSafe) {
			$sql = 'START TRANSACTION;'.rtrim($sql, "; \t\r\n\0").'; COMMIT;';
=======
		if ($transactionSafe)
		{
			$sql = 'START TRANSACTION;' . rtrim($sql, "; \t\r\n\0") . '; COMMIT;';
>>>>>>> upstream/master
		}
		$queries = $this->splitSql($sql);
		$error = 0;
		foreach ($queries as $query)
		{
			$query = trim($query);
<<<<<<< HEAD
			if ($query != '') {
				$this->cursor = mysql_query($query, $this->connection);
				if ($this->debug) {
					$this->count++;
					$this->log[] = $query;
				}
				if (!$this->cursor) {
					$error = 1;
					$this->errorNum .= mysql_errno($this->connection) . ' ';
					$this->errorMsg .= mysql_error($this->connection)." SQL=$query <br />";
					if ($abortOnError) {
=======
			if ($query != '')
			{
				$this->cursor = mysql_query($query, $this->connection);
				if ($this->debug)
				{
					$this->count++;
					$this->log[] = $query;
				}
				if (!$this->cursor)
				{
					$error = 1;
					$this->errorNum .= mysql_errno($this->connection) . ' ';
					$this->errorMsg .= mysql_error($this->connection) . " SQL=$query <br />";
					if ($abortOnError)
					{
>>>>>>> upstream/master
						return $this->cursor;
					}
				}
			}
		}
		return $error ? false : true;
	}
<<<<<<< HEAD
}
=======
}
>>>>>>> upstream/master
