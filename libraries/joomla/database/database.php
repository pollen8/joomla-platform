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

JLoader::register('DatabaseException', JPATH_PLATFORM.'/joomla/database/databaseexception.php');
jimport('joomla.filesystem.folder');

/**
=======
defined('JPATH_PLATFORM') or die();

JLoader::register('JDatabaseException', JPATH_PLATFORM . '/joomla/database/databaseexception.php');
jimport('joomla.filesystem.folder');

/**
 * Database interface class.
 *
 * @package     Joomla.Platform
 * @subpackage  Database
 * @since       11.2
 */
interface JDatabaseInterface
{
	/**
	 * Test to see if the connector is available.
	 *
	 * @return  boolean  True on success, false otherwise.
	 *
	 * @since   11.2
	 */
	static function test();
}

/**
>>>>>>> upstream/master
 * Database connector class.
 *
 * @package     Joomla.Platform
 * @subpackage  Database
 * @since       11.1
 */
<<<<<<< HEAD
abstract class JDatabase
{
	/**
	 * @var    string  The name of the database driver.
=======
abstract class JDatabase implements JDatabaseInterface
{
	/**
	 * The name of the database driver.
	 *
	 * @var    string
>>>>>>> upstream/master
	 * @since  11.1
	 */
	public $name;

	/**
	 * @var    resource  The database connection resource.
	 * @since  11.1
	 */
	protected $connection;

	/**
	 * @var    integer  The number of SQL statements executed by the database driver.
	 * @since  11.1
	 */
	protected $count = 0;

	/**
	 * @var    resource  The database connection cursor from the last query.
	 * @since  11.1
	 */
	protected $cursor;

	/**
	 * @var    bool  The database driver debugging state.
	 * @since  11.1
	 */
	protected $debug = false;

	/**
	 * @var    integer  The affected row limit for the current SQL statement.
	 * @since  11.1
	 */
	protected $limit = 0;

	/**
	 * @var    array  The log of executed SQL statements by the database driver.
	 * @since  11.1
	 */
	protected $log = array();

	/**
	 * @var    string  The character(s) used to quote SQL statement names such as table names or field names,
<<<<<<< HEAD
	 *                 etc.  The child classes should define this as necessary.  If a single character string the
	 *                 same character is used for both sides of the quoted name, else the first character will be
	 *                 used for the opening quote and the second for the closing quote.
=======
	 * etc.  The child classes should define this as necessary.  If a single character string the
	 * same character is used for both sides of the quoted name, else the first character will be
	 * used for the opening quote and the second for the closing quote.
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $nameQuote;

	/**
	 * @var    string  The null or zero representation of a timestamp for the database driver.  This should be
<<<<<<< HEAD
	 *                 defined in child classes to hold the appropriate value for the engine.
=======
	 * defined in child classes to hold the appropriate value for the engine.
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $nullDate;

	/**
	 * @var    integer  The affected row offset to apply for the current SQL statement.
	 * @since  11.1
	 */
	protected $offset = 0;

	/**
	 * @var    mixed  The current SQL statement to execute.
	 * @since  11.1
	 */
	protected $sql;

	/**
	 * @var    string  The common database table prefix.
	 * @since  11.1
	 */
	protected $tablePrefix;

	/**
	 * @var    bool  True if the database engine supports UTF-8 character encoding.
	 * @since  11.1
	 */
	protected $utf = false;

	/**
	 * @var         integer  The database error number
	 * @since       11.1
<<<<<<< HEAD
	 * @deprecated  11.2
=======
	 * @deprecated  12.1
>>>>>>> upstream/master
	 */
	protected $errorNum = 0;

	/**
	 * @var         string  The database error message
	 * @since       11.1
<<<<<<< HEAD
	 * @deprecated  11.2
=======
	 * @deprecated  12.1
>>>>>>> upstream/master
	 */
	protected $errorMsg;

	/**
	 * @var         bool  If true then there are fields to be quoted for the query.
	 * @since       11.1
<<<<<<< HEAD
	 * @deprecated  11.2
=======
	 * @deprecated  12.1
>>>>>>> upstream/master
	 */
	protected $hasQuoted = false;

	/**
	 * @var         array  The fields that are to be quoted.
	 * @since       11.1
<<<<<<< HEAD
	 * @deprecated  11.2
=======
	 * @deprecated  12.1
>>>>>>> upstream/master
	 */
	protected $quoted = array();

	/**
	 * @var    array  JDatabase instances container.
	 * @since  11.1
	 */
	protected static $instances = array();

	/**
	 * Get a list of available database connectors.  The list will only be populated with connectors that both
	 * the class exists and the static test method returns true.  This gives us the ability to have a multitude
	 * of connector classes that are self-aware as to whether or not they are able to be used on a given system.
	 *
	 * @return  array  An array of available database connectors.
	 *
	 * @since   11.1
	 */
	public static function getConnectors()
	{
		// Instantiate variables.
		$connectors = array();

		// Get a list of types.
		$types = JFolder::folders(dirname(__FILE__));

		// Loop through the types and find the ones that are available.
<<<<<<< HEAD
		foreach($types as $type)
		{
			// Ignore some folders.
			if (($type == 'database') || ($type == 'table') || ($type == '.') || ($type == '..')) {
=======
		foreach ($types as $type)
		{
			// Ignore some folders.
			if (($type == 'database') || ($type == 'table') || ($type == '.') || ($type == '..'))
			{
>>>>>>> upstream/master
				continue;
			}

			// Derive the class name from the type.
<<<<<<< HEAD
			$class = 'JDatabaseDriver'.ucfirst(trim($type));

			// If the class doesn't exist, let's look for it and register it.
			if (!class_exists($class)) {

				// Derive the file path for the driver class.
				$path = dirname(__FILE__).'/'.$type.'/driver.php';

				// If the file exists register the class with our class loader.
				if (file_exists($path)) {
					JLoader::register($class, $path);
				}
				// If it doesn't exist we are at an impasse so move on to the next type.
				else {
=======
			$class = 'JDatabaseDriver' . ucfirst(trim($type));

			// If the class doesn't exist, let's look for it and register it.
			if (!class_exists($class))
			{

				// Derive the file path for the driver class.
				$path = dirname(__FILE__) . '/' . $type . '/driver.php';

				// If the file exists register the class with our class loader.
				if (file_exists($path))
				{
					JLoader::register($class, $path);
				}
				// If it doesn't exist we are at an impasse so move on to the next type.
				else
				{
>>>>>>> upstream/master
					continue;
				}
			}

			// If the class still doesn't exist we have nothing left to do but look at the next type.  We did our best.
<<<<<<< HEAD
			if (!class_exists($class)) {
=======
			if (!class_exists($class))
			{
>>>>>>> upstream/master
				continue;
			}

			// Sweet!  Our class exists, so now we just need to know if it passes it's test method.
<<<<<<< HEAD
			if (call_user_func_array(array($class, 'test'), array())) {
=======
			if (call_user_func_array(array($class, 'test'), array()))
			{
>>>>>>> upstream/master
				$connectors[] = $type;
			}
		}

		return $connectors;
	}

	/**
	 * Method to return a JDatabase instance based on the given options.  There are three global options and then
	 * the rest are specific to the database driver.  The 'driver' option defines which JDatabaseDriver class is
	 * used for the connection -- the default is 'mysql'.  The 'database' option determines which database is to
	 * be used for the connection.  The 'select' option determines whether the connector should automatically select
	 * the chosen database.
	 *
	 * Instances are unique to the given options and new objects are only created when a unique options array is
	 * passed into the method.  This ensures that we don't end up with unnecessary database connection resources.
	 *
	 * @param   array  $options  Parameters to be passed to the database driver.
	 *
	 * @return  JDatabase  A database object.
	 *
	 * @since   11.1
	 */
	public static function getInstance($options = array())
	{
		// Sanitize the database connector options.
		$options['driver'] = (isset($options['driver'])) ? preg_replace('/[^A-Z0-9_\.-]/i', '', $options['driver']) : 'mysql';
		$options['database'] = (isset($options['database'])) ? $options['database'] : null;
		$options['select'] = (isset($options['select'])) ? $options['select'] : true;

		// Get the options signature for the database connector.
		$signature = md5(serialize($options));

		// If we already have a database connector instance for these options then just use that.
<<<<<<< HEAD
		if (empty(self::$instances[$signature])) {

			// Derive the class name from the driver.
			$class = 'JDatabase'.ucfirst($options['driver']);

			// If the class doesn't exist, let's look for it and register it.
			if (!class_exists($class)) {

				// Derive the file path for the driver class.
				$path = dirname(__FILE__).'/database/'.$options['driver'].'.php';

				// If the file exists register the class with our class loader.
				if (file_exists($path)) {
					JLoader::register($class, $path);
				}
				// If it doesn't exist we are at an impasse so throw an exception.
				else {

					// Legacy error handling switch based on the JError::$legacy switch.
					// @deprecated  11.3
					if (JError::$legacy) {
						JError::setErrorHandling(E_ERROR, 'die');
						return JError::raiseError(500, JText::sprintf('JLIB_DATABASE_ERROR_LOAD_DATABASE_DRIVER', $options['driver']));
					}
					else {
						throw new DatabaseException(JText::sprintf('JLIB_DATABASE_ERROR_LOAD_DATABASE_DRIVER', $options['driver']));
=======
		if (empty(self::$instances[$signature]))
		{

			// Derive the class name from the driver.
			$class = 'JDatabase' . ucfirst($options['driver']);

			// If the class doesn't exist, let's look for it and register it.
			if (!class_exists($class))
			{

				// Derive the file path for the driver class.
				$path = dirname(__FILE__) . '/database/' . $options['driver'] . '.php';

				// If the file exists register the class with our class loader.
				if (file_exists($path))
				{
					JLoader::register($class, $path);
				}
				// If it doesn't exist we are at an impasse so throw an exception.
				else
				{

					// Legacy error handling switch based on the JError::$legacy switch.
					// @deprecated  12.1

					if (JError::$legacy)
					{
						// Deprecation warning.
						JLog::add('JError is deprecated.', JLog::WARNING, 'deprecated');
						JError::setErrorHandling(E_ERROR, 'die');
						return JError::raiseError(500, JText::sprintf('JLIB_DATABASE_ERROR_LOAD_DATABASE_DRIVER', $options['driver']));
					}
					else
					{
						throw new JDatabaseException(JText::sprintf('JLIB_DATABASE_ERROR_LOAD_DATABASE_DRIVER', $options['driver']));
>>>>>>> upstream/master
					}
				}
			}

			// If the class still doesn't exist we have nothing left to do but throw an exception.  We did our best.
<<<<<<< HEAD
			if (!class_exists($class)) {

				// Legacy error handling switch based on the JError::$legacy switch.
				// @deprecated  11.3
				if (JError::$legacy) {
					JError::setErrorHandling(E_ERROR, 'die');
					return JError::raiseError(500, JText::sprintf('JLIB_DATABASE_ERROR_LOAD_DATABASE_DRIVER', $options['driver']));
				}
				else {
					throw new DatabaseException(JText::sprintf('JLIB_DATABASE_ERROR_LOAD_DATABASE_DRIVER', $options['driver']));
=======
			if (!class_exists($class))
			{

				// Legacy error handling switch based on the JError::$legacy switch.
				// @deprecated  12.1

				if (JError::$legacy)
				{
					// Deprecation warning.
					JLog::add('JError() is deprecated.', JLog::WARNING, 'deprecated');

					JError::setErrorHandling(E_ERROR, 'die');
					return JError::raiseError(500, JText::sprintf('JLIB_DATABASE_ERROR_LOAD_DATABASE_DRIVER', $options['driver']));
				}
				else
				{
					throw new JDatabaseException(JText::sprintf('JLIB_DATABASE_ERROR_LOAD_DATABASE_DRIVER', $options['driver']));
>>>>>>> upstream/master
				}
			}

			// Create our new JDatabase connector based on the options given.
<<<<<<< HEAD
			try {
				$instance = new $class($options);
			}
			catch (DatabaseException $e) {

				// Legacy error handling switch based on the JError::$legacy switch.
				// @deprecated  11.3
				if (JError::$legacy) {
					JError::setErrorHandling(E_ERROR, 'ignore');
					return JError::raiseError(500, JText::sprintf('JLIB_DATABASE_ERROR_CONNECT_DATABASE', $e->getMessage()));
				}
				else {
					throw new DatabaseException(JText::sprintf('JLIB_DATABASE_ERROR_CONNECT_DATABASE', $e->getMessage()));
=======
			try
			{
				$instance = new $class($options);
			}
			catch (DatabaseException $e)
			{

				// Legacy error handling switch based on the JError::$legacy switch.
				// @deprecated  12.1

				if (JError::$legacy)
				{
					// Deprecation warning.
					JLog::add('JError() is deprecated.', JLog::WARNING, 'deprecated');

					JError::setErrorHandling(E_ERROR, 'ignore');
					return JError::raiseError(500, JText::sprintf('JLIB_DATABASE_ERROR_CONNECT_DATABASE', $e->getMessage()));
				}
				else
				{
					throw new JDatabaseException(JText::sprintf('JLIB_DATABASE_ERROR_CONNECT_DATABASE', $e->getMessage()));
>>>>>>> upstream/master
				}
			}

			// Set the new connector to the global instances based on signature.
			self::$instances[$signature] = $instance;
		}

		return self::$instances[$signature];
	}

	/**
	 * Splits a string of multiple queries into an array of individual queries.
	 *
<<<<<<< HEAD
	 * @param   string  Input SQL string with which to split into individual queries.
	 *
	 * @return  array   The queries from the input string separated into an array.
=======
	 * @param   string  $sql  Input SQL string with which to split into individual queries.
	 *
	 * @return  array  The queries from the input string separated into an array.
>>>>>>> upstream/master
	 *
	 * @since   11.1
	 */
	public static function splitSql($sql)
	{
		$start = 0;
		$open = false;
		$char = '';
		$end = strlen($sql);
		$queries = array();

		for ($i = 0; $i < $end; $i++)
		{
<<<<<<< HEAD
			$current = substr($sql,$i,1);
			if (($current == '"' || $current == '\'')) {
				$n = 2;

				while (substr($sql,$i - $n + 1, 1) == '\\' && $n < $i)
				{
					$n ++;
				}

				if ($n%2==0) {
					if ($open) {
						if ($current == $char) {
							$open = false;
							$char = '';
						}
					} else {
=======
			$current = substr($sql, $i, 1);
			if (($current == '"' || $current == '\''))
			{
				$n = 2;

				while (substr($sql, $i - $n + 1, 1) == '\\' && $n < $i)
				{
					$n++;
				}

				if ($n % 2 == 0)
				{
					if ($open)
					{
						if ($current == $char)
						{
							$open = false;
							$char = '';
						}
					}
					else
					{
>>>>>>> upstream/master
						$open = true;
						$char = $current;
					}
				}
			}

<<<<<<< HEAD
			if (($current == ';' && !$open)|| $i == $end - 1) {
=======
			if (($current == ';' && !$open) || $i == $end - 1)
			{
>>>>>>> upstream/master
				$queries[] = substr($sql, $start, ($i - $start + 1));
				$start = $i + 1;
			}
		}

		return $queries;
	}

	/**
<<<<<<< HEAD
	 * Test to see if the connector is available.
	 *
	 * @return  bool  True on success, false otherwise.
	 *
	 * @since   11.1
	 */
	abstract public static function test();

	/**
=======
>>>>>>> upstream/master
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
			case 'nq':
			case 'qn':
				return $this->quoteName($args[0]);
				break;
		}
	}

	/**
	 * Constructor.
	 *
	 * @param   array  $options  List of options used to configure the connection
	 *
	 * @return  void
	 *
	 * @since   11.1
	 */
	protected function __construct($options)
	{
		// Initialise object variables.
		$this->tablePrefix = (isset($options['prefix'])) ? $options['prefix'] : 'jos_';
<<<<<<< HEAD
		$this->count       = 0;
		$this->errorNum    = 0;
		$this->log         = array();
		$this->quoted      = array();
		$this->hasQuoted   = false;
=======
		$this->count = 0;
		$this->errorNum = 0;
		$this->log = array();
		$this->quoted = array();
		$this->hasQuoted = false;
>>>>>>> upstream/master

		// Determine UTF-8 support.
		$this->utf = $this->hasUTF();

		// Set charactersets (needed for MySQL 4.1.2+).
<<<<<<< HEAD
		if ($this->utf){
=======
		if ($this->utf)
		{
>>>>>>> upstream/master
			$this->setUTF();
		}
	}

	/**
	 * Adds a field or array of field names to the list that are to be quoted.
	 *
<<<<<<< HEAD
	 * @param       mixed  $quoted  Field name or array of names.
	 *
	 * @return      void
	 *
	 * @since       11.1
	 * @deprecated  11.2
=======
	 * @param   mixed  $quoted  Field name or array of names.
	 *
	 * @return  void
	 *
	 * @deprecated  12.1
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function addQuoted($quoted)
	{
		// Deprecation warning.
		JLog::add('JDatabase::addQuoted() is deprecated.', JLog::WARNING, 'deprecated');

<<<<<<< HEAD
		if (is_string($quoted)) {
			$this->quoted[] = $quoted;
		}
		else {
=======
		if (is_string($quoted))
		{
			$this->quoted[] = $quoted;
		}
		else
		{
>>>>>>> upstream/master
			$this->quoted = array_merge($this->quoted, (array) $quoted);
		}

		$this->hasQuoted = true;
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
	abstract public function connected();

	/**
	 * Method to escape a string for usage in an SQL statement.
	 *
<<<<<<< HEAD
	 * @param   string  The string to be escaped.
	 * @param   bool    Optional parameter to provide extra escaping.
	 *
	 * @return  string  The escaped string.
=======
	 * @param   string   $text   The string to be escaped.
	 * @param   boolean  $extra  Optional parameter to provide extra escaping.
	 *
	 * @return  string   The escaped string.
>>>>>>> upstream/master
	 *
	 * @since   11.1
	 */
	abstract public function escape($text, $extra = false);

	/**
	 * Method to fetch a row from the result set cursor as an array.
	 *
	 * @param   mixed  $cursor  The optional result set cursor from which to fetch the row.
	 *
	 * @return  mixed  Either the next row from the result set or false if there are no more rows.
	 *
	 * @since   11.1
	 */
	abstract protected function fetchArray($cursor = null);

	/**
	 * Method to fetch a row from the result set cursor as an associative array.
	 *
	 * @param   mixed  $cursor  The optional result set cursor from which to fetch the row.
	 *
	 * @return  mixed  Either the next row from the result set or false if there are no more rows.
	 *
	 * @since   11.1
	 */
	abstract protected function fetchAssoc($cursor = null);

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
	abstract protected function fetchObject($cursor = null, $class = 'stdClass');

	/**
	 * Method to free up the memory used for the result set.
	 *
	 * @param   mixed  $cursor  The optional result set cursor from which to fetch the row.
	 *
	 * @return  void
	 *
	 * @since   11.1
	 */
	abstract protected function freeResult($cursor = null);

	/**
	 * Get the number of affected rows for the previous executed SQL statement.
	 *
	 * @return  integer  The number of affected rows.
	 *
	 * @since   11.1
	 */
	abstract public function getAffectedRows();

	/**
	 * Method to get the database collation in use by sampling a text field of a table in the database.
	 *
	 * @return  mixed  The collation in use by the database or boolean false if not supported.
	 *
	 * @since   11.1
	 */
	abstract public function getCollation();

	/**
	 * Method that provides access to the underlying database connection. Useful for when you need to call a
	 * proprietary method such as postgresql's lo_* methods.
	 *
	 * @return  resource  The underlying database connection resource.
	 *
	 * @since   11.1
	 */
	public function getConnection()
	{
		return $this->connection;
	}

	/**
	 * Get the total number of SQL statements executed by the database driver.
	 *
	 * @return  integer
	 *
	 * @since   11.1
	 */
	public function getCount()
	{
		return $this->count;
	}

	/**
	 * Returns a PHP date() function compliant date format for the database driver.
	 *
	 * @return  string  The format string.
	 *
	 * @since   11.1
	 */
	public function getDateFormat()
	{
		return 'Y-m-d H:i:s';
	}

	/**
	 * Get the database driver SQL statement log.
	 *
	 * @return  array  SQL statements executed by the database driver.
	 *
	 * @since   11.1
	 */
	public function getLog()
	{
		return $this->log;
	}

	/**
	 * Get the null or zero representation of a timestamp for the database driver.
	 *
	 * @return  string  Null or zero representation of a timestamp.
	 *
	 * @since   11.1
	 */
	public function getNullDate()
	{
		return $this->nullDate;
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
	abstract public function getNumRows($cursor = null);

	/**
	 * Get the common table prefix for the database driver.
	 *
	 * @return  string  The common database table prefix.
	 *
	 * @since   11.1
	 */
	public function getPrefix()
	{
		return $this->tablePrefix;
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
=======
	 * @throws  JDatabaseException
>>>>>>> upstream/master
	 */
	abstract public function getQuery($new = false);

	/**
	 * Retrieves field information about the given tables.
	 *
<<<<<<< HEAD
	 * @param   mixed  $tables    A table name or a list of table names.
	 * @param   bool   $typeOnly  True to only return field types.
=======
	 * @param   string   $table     The name of the database table.
	 * @param   boolean  $typeOnly  True (default) to only return field types.
>>>>>>> upstream/master
	 *
	 * @return  array  An array of fields by table.
	 *
	 * @since   11.1
<<<<<<< HEAD
	 * @throws  DatabaseException
	 */
	abstract public function getTableColumns($tables, $typeOnly = true);
=======
	 * @throws  JDatabaseException
	 */
	abstract public function getTableColumns($table, $typeOnly = true);
>>>>>>> upstream/master

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
	abstract public function getTableCreate($tables);

	/**
	 * Retrieves field information about the given tables.
	 *
<<<<<<< HEAD
	 * @param   mixed  $tables    A table name or a list of table names.
=======
	 * @param   mixed  $tables  A table name or a list of table names.
>>>>>>> upstream/master
	 *
	 * @return  array  An array of keys for the table(s).
	 *
	 * @since   11.1
<<<<<<< HEAD
	 * @throws  DatabaseException
=======
	 * @throws  JDatabaseException
>>>>>>> upstream/master
	 */
	abstract public function getTableKeys($tables);

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
	abstract public function getTableList();

	/**
	 * Determine whether or not the database engine supports UTF-8 character encoding.
	 *
<<<<<<< HEAD
	 * @return  bool  True if the database engine supports UTF-8 character encoding.
=======
	 * @return  boolean  True if the database engine supports UTF-8 character encoding.
>>>>>>> upstream/master
	 *
	 * @since   11.1
	 */
	public function getUTFSupport()
	{
		return $this->utf;
	}

	/**
	 * Get the version of the database connector
	 *
	 * @return  string  The database connector version.
	 *
	 * @since   11.1
	 */
	abstract public function getVersion();

	/**
	 * Determines if the database engine supports UTF-8 character encoding.
	 *
	 * @return  boolean  True if supported.
	 *
	 * @since   11.1
	 */
	abstract public function hasUTF();

	/**
	 * Method to get the auto-incremented value from the last INSERT statement.
	 *
	 * @return  integer  The value of the auto-increment field from the last inserted row.
	 *
	 * @since   11.1
	 */
	abstract public function insertid();

	/**
	 * Inserts a row into a table based on an object's properties.
	 *
<<<<<<< HEAD
	 * @param   string  $table   The name of the database table to insert into.
	 * @param   object  $object  A reference to an object whose public properties match the table fields.
	 * @param   string  $key     The name of the primary key. If provided the object property is updated.
	 *
	 * @return  bool    True on success.
	 *
	 * @since   11.1
	 * @throws  DatabaseException
	 */
	public function insertObject($table, & $object, $key = null)
=======
	 * @param   string  $table    The name of the database table to insert into.
	 * @param   object  &$object  A reference to an object whose public properties match the table fields.
	 * @param   string  $key      The name of the primary key. If provided the object property is updated.
	 *
	 * @return  boolean    True on success.
	 *
	 * @since   11.1
	 * @throws  JDatabaseException
	 */
	public function insertObject($table, &$object, $key = null)
>>>>>>> upstream/master
	{
		// Initialise variables.
		$fields = array();
		$values = array();

		// Create the base insert statement.
<<<<<<< HEAD
		$statement = 'INSERT INTO '.$this->quoteName($table).' (%s) VALUES (%s)';
=======
		$statement = 'INSERT INTO ' . $this->quoteName($table) . ' (%s) VALUES (%s)';
>>>>>>> upstream/master

		// Iterate over the object variables to build the query fields and values.
		foreach (get_object_vars($object) as $k => $v)
		{
			// Only process non-null scalars.
<<<<<<< HEAD
			if (is_array($v) or is_object($v) or $v === null) {
=======
			if (is_array($v) or is_object($v) or $v === null)
			{
>>>>>>> upstream/master
				continue;
			}

			// Ignore any internal fields.
<<<<<<< HEAD
			if ($k[0] == '_') {
=======
			if ($k[0] == '_')
			{
>>>>>>> upstream/master
				continue;
			}

			// Prepare and sanitize the fields and values for the database query.
			$fields[] = $this->quoteName($k);
			$values[] = $this->isQuoted($k) ? $this->quote($v) : (int) $v;
		}

		// Set the query and execute the insert.
<<<<<<< HEAD
		$this->setQuery(sprintf($statement, implode(',', $fields) ,  implode(',', $values)));
		if (!$this->query()) {
=======
		$this->setQuery(sprintf($statement, implode(',', $fields), implode(',', $values)));
		if (!$this->query())
		{
>>>>>>> upstream/master
			return false;
		}

		// Update the primary key if it exists.
		$id = $this->insertid();
<<<<<<< HEAD
		if ($key && $id) {
=======
		if ($key && $id)
		{
>>>>>>> upstream/master
			$object->$key = $id;
		}

		return true;
	}

	/**
	 * Method to get the first row of the result set from the database query as an associative array
	 * of ['field_name' => 'row_value'].
	 *
	 * @return  mixed  The return value or null if the query failed.
	 *
	 * @since   11.1
<<<<<<< HEAD
	 * @throws  DatabaseException
=======
	 * @throws  JDatabaseException
>>>>>>> upstream/master
	 */
	public function loadAssoc()
	{
		// Initialise variables.
		$ret = null;

		// Execute the query and get the result set cursor.
<<<<<<< HEAD
		if (!($cursor = $this->query())) {
=======
		if (!($cursor = $this->query()))
		{
>>>>>>> upstream/master
			return null;
		}

		// Get the first row from the result set as an associative array.
<<<<<<< HEAD
		if ($array = $this->fetchAssoc($cursor)) {
=======
		if ($array = $this->fetchAssoc($cursor))
		{
>>>>>>> upstream/master
			$ret = $array;
		}

		// Free up system resources and return.
		$this->freeResult($cursor);

		return $ret;
	}

	/**
	 * Method to get an array of the result set rows from the database query where each row is an associative array
	 * of ['field_name' => 'row_value'].  The array of rows can optionally be keyed by a field name, but defaults to
	 * a sequential numeric array.
	 *
	 * NOTE: Chosing to key the result array by a non-unique field name can result in unwanted
	 * behavior and should be avoided.
	 *
	 * @param   string  $key     The name of a field on which to key the result array.
	 * @param   string  $column  An optional column name. Instead of the whole row, only this column value will be in
<<<<<<< HEAD
	 *                           the result array.
=======
	 * the result array.
>>>>>>> upstream/master
	 *
	 * @return  mixed   The return value or null if the query failed.
	 *
	 * @since   11.1
<<<<<<< HEAD
	 * @throws  DatabaseException
=======
	 * @throws  JDatabaseException
>>>>>>> upstream/master
	 */
	public function loadAssocList($key = null, $column = null)
	{
		// Initialise variables.
		$array = array();

		// Execute the query and get the result set cursor.
<<<<<<< HEAD
		if (!($cursor = $this->query())) {
=======
		if (!($cursor = $this->query()))
		{
>>>>>>> upstream/master
			return null;
		}

		// Get all of the rows from the result set.
		while ($row = $this->fetchAssoc($cursor))
		{
			$value = ($column) ? (isset($row[$column]) ? $row[$column] : $row) : $row;
<<<<<<< HEAD
			if ($key) {
				$array[$row[$key]] = $value;
			}
			else {
=======
			if ($key)
			{
				$array[$row[$key]] = $value;
			}
			else
			{
>>>>>>> upstream/master
				$array[] = $value;
			}
		}

		// Free up system resources and return.
		$this->freeResult($cursor);

		return $array;
	}

	/**
	 * Method to get an array of values from the <var>$offset</var> field in each row of the result set from
	 * the database query.
	 *
	 * @param   integer  $offset  The row offset to use to build the result array.
	 *
	 * @return  mixed    The return value or null if the query failed.
	 *
	 * @since   11.1
<<<<<<< HEAD
	 * @throws  DatabaseException
=======
	 * @throws  JDatabaseException
>>>>>>> upstream/master
	 */
	public function loadColumn($offset = 0)
	{
		// Initialise variables.
		$array = array();

		// Execute the query and get the result set cursor.
<<<<<<< HEAD
		if (!($cursor = $this->query())) {
=======
		if (!($cursor = $this->query()))
		{
>>>>>>> upstream/master
			return null;
		}

		// Get all of the rows from the result set as arrays.
		while ($row = $this->fetchArray($cursor))
		{
			$array[] = $row[$offset];
		}

		// Free up system resources and return.
		$this->freeResult($cursor);

		return $array;
	}

	/**
	 * Method to get the next row in the result set from the database query as an object.
	 *
	 * @param   string  $class  The class name to use for the returned row object.
	 *
	 * @return  mixed   The result of the query as an array, false if there are no more rows.
	 *
	 * @since   11.1
<<<<<<< HEAD
	 * @throws  DatabaseException
=======
	 * @throws  JDatabaseException
>>>>>>> upstream/master
	 */
	public function loadNextObject($class = 'stdClass')
	{
		static $cursor;

		// Execute the query and get the result set cursor.
<<<<<<< HEAD
		if (!($cursor = $this->query())) {
=======
		if (!($cursor = $this->query()))
		{
>>>>>>> upstream/master
			return $this->errorNum ? null : false;
		}

		// Get the next row from the result set as an object of type $class.
<<<<<<< HEAD
		if ($row = $this->fetchObject($cursor, $class)) {
=======
		if ($row = $this->fetchObject($cursor, $class))
		{
>>>>>>> upstream/master
			return $row;
		}

		// Free up system resources and return.
		$this->freeResult($cursor);
		$cursor = null;

		return false;
	}

	/**
	 * Method to get the next row in the result set from the database query as an array.
	 *
	 * @return  mixed  The result of the query as an array, false if there are no more rows.
	 *
	 * @since   11.1
<<<<<<< HEAD
	 * @throws  DatabaseException
=======
	 * @throws  JDatabaseException
>>>>>>> upstream/master
	 */
	public function loadNextRow()
	{
		static $cursor;

		// Execute the query and get the result set cursor.
<<<<<<< HEAD
		if (!($cursor = $this->query())) {
=======
		if (!($cursor = $this->query()))
		{
>>>>>>> upstream/master
			return $this->errorNum ? null : false;
		}

		// Get the next row from the result set as an object of type $class.
<<<<<<< HEAD
		if ($row = $this->fetchArray($cursor)) {
=======
		if ($row = $this->fetchArray($cursor))
		{
>>>>>>> upstream/master
			return $row;
		}

		// Free up system resources and return.
		$this->freeResult($cursor);
		$cursor = null;

		return false;
	}

	/**
	 * Method to get the first row of the result set from the database query as an object.
	 *
	 * @param   string  $class  The class name to use for the returned row object.
	 *
	 * @return  mixed   The return value or null if the query failed.
	 *
	 * @since   11.1
<<<<<<< HEAD
	 * @throws  DatabaseException
=======
	 * @throws  JDatabaseException
>>>>>>> upstream/master
	 */
	public function loadObject($class = 'stdClass')
	{
		// Initialise variables.
		$ret = null;

		// Execute the query and get the result set cursor.
<<<<<<< HEAD
		if (!($cursor = $this->query())) {
=======
		if (!($cursor = $this->query()))
		{
>>>>>>> upstream/master
			return null;
		}

		// Get the first row from the result set as an object of type $class.
<<<<<<< HEAD
		if ($object = $this->fetchObject($cursor, $class)) {
=======
		if ($object = $this->fetchObject($cursor, $class))
		{
>>>>>>> upstream/master
			$ret = $object;
		}

		// Free up system resources and return.
		$this->freeResult($cursor);

		return $ret;
	}

	/**
	 * Method to get an array of the result set rows from the database query where each row is an object.  The array
	 * of objects can optionally be keyed by a field name, but defaults to a sequential numeric array.
	 *
	 * NOTE: Chosing to key the result array by a non-unique field name can result in unwanted
	 * behavior and should be avoided.
	 *
	 * @param   string  $key    The name of a field on which to key the result array.
	 * @param   string  $class  The class name to use for the returned row objects.
	 *
	 * @return  mixed   The return value or null if the query failed.
	 *
	 * @since   11.1
<<<<<<< HEAD
	 * @throws  DatabaseException
	 */
	public function loadObjectList($key='', $class = 'stdClass')
=======
	 * @throws  JDatabaseException
	 */
	public function loadObjectList($key = '', $class = 'stdClass')
>>>>>>> upstream/master
	{
		// Initialise variables.
		$array = array();

		// Execute the query and get the result set cursor.
<<<<<<< HEAD
		if (!($cursor = $this->query())) {
=======
		if (!($cursor = $this->query()))
		{
>>>>>>> upstream/master
			return null;
		}

		// Get all of the rows from the result set as objects of type $class.
		while ($row = $this->fetchObject($cursor, $class))
		{
<<<<<<< HEAD
			if ($key) {
				$array[$row->$key] = $row;
			}
			else {
=======
			if ($key)
			{
				$array[$row->$key] = $row;
			}
			else
			{
>>>>>>> upstream/master
				$array[] = $row;
			}
		}

		// Free up system resources and return.
		$this->freeResult($cursor);

		return $array;
	}

	/**
	 * Method to get the first field of the first row of the result set from the database query.
	 *
	 * @return  mixed  The return value or null if the query failed.
	 *
	 * @since   11.1
<<<<<<< HEAD
	 * @throws  DatabaseException
=======
	 * @throws  JDatabaseException
>>>>>>> upstream/master
	 */
	public function loadResult()
	{
		// Initialise variables.
		$ret = null;

		// Execute the query and get the result set cursor.
<<<<<<< HEAD
		if (!($cursor = $this->query())) {
=======
		if (!($cursor = $this->query()))
		{
>>>>>>> upstream/master
			return null;
		}

		// Get the first row from the result set as an array.
<<<<<<< HEAD
		if ($row = $this->fetchArray($cursor)) {
=======
		if ($row = $this->fetchArray($cursor))
		{
>>>>>>> upstream/master
			$ret = $row[0];
		}

		// Free up system resources and return.
		$this->freeResult($cursor);

		return $ret;
	}

	/**
	 * Method to get the first row of the result set from the database query as an array.  Columns are indexed
	 * numerically so the first column in the result set would be accessible via <var>$row[0]</var>, etc.
	 *
	 * @return  mixed  The return value or null if the query failed.
	 *
	 * @since   11.1
<<<<<<< HEAD
	 * @throws  DatabaseException
=======
	 * @throws  JDatabaseException
>>>>>>> upstream/master
	 */
	public function loadRow()
	{
		// Initialise variables.
		$ret = null;

		// Execute the query and get the result set cursor.
<<<<<<< HEAD
		if (!($cursor = $this->query())) {
=======
		if (!($cursor = $this->query()))
		{
>>>>>>> upstream/master
			return null;
		}

		// Get the first row from the result set as an array.
<<<<<<< HEAD
		if ($row = $this->fetchArray($cursor)) {
=======
		if ($row = $this->fetchArray($cursor))
		{
>>>>>>> upstream/master
			$ret = $row;
		}

		// Free up system resources and return.
		$this->freeResult($cursor);

		return $ret;
	}

	/**
	 * Method to get an array of the result set rows from the database query where each row is an array.  The array
	 * of objects can optionally be keyed by a field offset, but defaults to a sequential numeric array.
	 *
	 * NOTE: Chosing to key the result array by a non-unique field can result in unwanted
	 * behavior and should be avoided.
	 *
	 * @param   string  $key  The name of a field on which to key the result array.
	 *
	 * @return  mixed   The return value or null if the query failed.
	 *
	 * @since   11.1
<<<<<<< HEAD
	 * @throws  DatabaseException
	 */
	public function loadRowList($key=null)
=======
	 * @throws  JDatabaseException
	 */
	public function loadRowList($key = null)
>>>>>>> upstream/master
	{
		// Initialise variables.
		$array = array();

		// Execute the query and get the result set cursor.
<<<<<<< HEAD
		if (!($cursor = $this->query())) {
=======
		if (!($cursor = $this->query()))
		{
>>>>>>> upstream/master
			return null;
		}

		// Get all of the rows from the result set as arrays.
		while ($row = $this->fetchArray($cursor))
		{
<<<<<<< HEAD
			if ($key !== null) {
				$array[$row[$key]] = $row;
			}
			else {
=======
			if ($key !== null)
			{
				$array[$row[$key]] = $row;
			}
			else
			{
>>>>>>> upstream/master
				$array[] = $row;
			}
		}

		// Free up system resources and return.
		$this->freeResult($cursor);

		return $array;
	}

	/**
	 * Execute the SQL statement.
	 *
	 * @return  mixed  A database cursor resource on success, boolean false on failure.
	 *
	 * @since   11.1
<<<<<<< HEAD
	 * @throws  DatabaseException
=======
	 * @throws  JDatabaseException
>>>>>>> upstream/master
	 */
	abstract public function query();

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
	 */
	public function quote($text, $escape = true)
	{
<<<<<<< HEAD
		return '\''.($escape ? $this->escape($text) : $text).'\'';
=======
		return '\'' . ($escape ? $this->escape($text) : $text) . '\'';
>>>>>>> upstream/master
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
	 */
	public function quoteName($name)
	{
		// Don't quote names with dot-notation.
<<<<<<< HEAD
		if (strpos($name, '.') !== false) {
			return $name;
		}
		else {
			$q = $this->nameQuote;

			if (strlen($q) == 1) {
				return $q.$name.$q;
			}
			else {
				return $q{0}.$name.$q{1};
=======
		if (strpos($name, '.') !== false)
		{
			return $name;
		}
		else
		{
			$q = $this->nameQuote;

			if (strlen($q) == 1)
			{
				return $q . $name . $q;
			}
			else
			{
				return $q{0} . $name . $q{1};
>>>>>>> upstream/master
			}
		}
	}

	/**
	 * This function replaces a string identifier <var>$prefix</var> with the string held is the
	 * <var>tablePrefix</var> class variable.
	 *
	 * @param   string  $sql     The SQL statement to prepare.
	 * @param   string  $prefix  The common table prefix.
	 *
	 * @return  string  The processed SQL statement.
	 *
	 * @since   11.1
	 */
<<<<<<< HEAD
	protected function replacePrefix($sql, $prefix='#__')
=======
	public function replacePrefix($sql, $prefix = '#__')
>>>>>>> upstream/master
	{
		// Initialize variables.
		$escaped = false;
		$startPos = 0;
		$quoteChar = '';
		$literal = '';

		$sql = trim($sql);
		$n = strlen($sql);

		while ($startPos < $n)
		{
			$ip = strpos($sql, $prefix, $startPos);
<<<<<<< HEAD
			if ($ip === false) {
=======
			if ($ip === false)
			{
>>>>>>> upstream/master
				break;
			}

			$j = strpos($sql, "'", $startPos);
			$k = strpos($sql, '"', $startPos);
<<<<<<< HEAD
			if (($k !== false) && (($k < $j) || ($j === false))) {
				$quoteChar	= '"';
				$j			= $k;
			} else {
				$quoteChar	= "'";
			}

			if ($j === false) {
				$j = $n;
			}

			$literal .= str_replace($prefix, $this->tablePrefix,substr($sql, $startPos, $j - $startPos));
=======
			if (($k !== false) && (($k < $j) || ($j === false)))
			{
				$quoteChar = '"';
				$j = $k;
			}
			else
			{
				$quoteChar = "'";
			}

			if ($j === false)
			{
				$j = $n;
			}

			$literal .= str_replace($prefix, $this->tablePrefix, substr($sql, $startPos, $j - $startPos));
>>>>>>> upstream/master
			$startPos = $j;

			$j = $startPos + 1;

<<<<<<< HEAD
			if ($j >= $n) {
=======
			if ($j >= $n)
			{
>>>>>>> upstream/master
				break;
			}

			// quote comes first, find end of quote
			while (true)
			{
				$k = strpos($sql, $quoteChar, $j);
				$escaped = false;
<<<<<<< HEAD
				if ($k === false) {
=======
				if ($k === false)
				{
>>>>>>> upstream/master
					break;
				}
				$l = $k - 1;
				while ($l >= 0 && $sql{$l} == '\\')
				{
					$l--;
					$escaped = !$escaped;
				}
<<<<<<< HEAD
				if ($escaped) {
					$j	= $k+1;
=======
				if ($escaped)
				{
					$j = $k + 1;
>>>>>>> upstream/master
					continue;
				}
				break;
			}
<<<<<<< HEAD
			if ($k === false) {
=======
			if ($k === false)
			{
>>>>>>> upstream/master
				// error in the query - no end quote; ignore it
				break;
			}
			$literal .= substr($sql, $startPos, $k - $startPos + 1);
<<<<<<< HEAD
			$startPos = $k+1;
		}
		if ($startPos < $n) {
=======
			$startPos = $k + 1;
		}
		if ($startPos < $n)
		{
>>>>>>> upstream/master
			$literal .= substr($sql, $startPos, $n - $startPos);
		}

		return $literal;
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
=======
	 * @return  boolean  True if the database was successfully selected.
	 *
	 * @since   11.1
	 * @throws  JDatabaseException
>>>>>>> upstream/master
	 */
	abstract public function select($database);

	/**
	 * Sets the database debugging state for the driver.
	 *
<<<<<<< HEAD
	 * @param   bool  $level  True to enable debugging.
	 *
	 * @return  bool  The old debugging level.
=======
	 * @param   boolean  $level  True to enable debugging.
	 *
	 * @return  boolean  The old debugging level.
>>>>>>> upstream/master
	 *
	 * @since   11.1
	 */
	public function setDebug($level)
	{
		$previous = $this->debug;
		$this->debug = (bool) $level;

		return $previous;
	}

	/**
	 * Sets the SQL statement string for later execution.
	 *
	 * @param   mixed    $query   The SQL statement to set either as a JDatabaseQuery object or a string.
	 * @param   integer  $offset  The affected row offset to set.
	 * @param   integer  $limit   The maximum affected rows to set.
	 *
	 * @return  JDatabase  This object to support method chaining.
	 *
	 * @since   11.1
	 */
	public function setQuery($query, $offset = 0, $limit = 0)
	{
<<<<<<< HEAD
		$this->sql		= $query;
		$this->limit	= (int) $limit;
		$this->offset	= (int) $offset;
=======
		$this->sql = $query;
		$this->limit = (int) $limit;
		$this->offset = (int) $offset;
>>>>>>> upstream/master

		return $this;
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
	abstract public function setUTF();

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
	abstract public function transactionCommit();

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
	abstract public function transactionRollback();

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
	abstract public function transactionStart();

	/**
	 * Updates a row in a table based on an object's properties.
	 *
<<<<<<< HEAD
	 * @param   string  $table   The name of the database table to update.
	 * @param   object  $object  A reference to an object whose public properties match the table fields.
	 * @param   string  $key     The name of the primary key.
	 * @param   bool    $nulls   True to update null fields or false to ignore them.
	 *
	 * @return  bool    True on success.
	 *
	 * @since   11.1
	 * @throws  DatabaseException
	 */
	public function updateObject($table, & $object, $key, $nulls=false)
	{
		// Initialise variables.
		$fields = array();
		$where  = '';

		// Create the base update statement.
		$statement = 'UPDATE '.$this->quoteName($table).' SET %s WHERE %s';
=======
	 * @param   string   $table    The name of the database table to update.
	 * @param   object   &$object  A reference to an object whose public properties match the table fields.
	 * @param   string   $key      The name of the primary key.
	 * @param   boolean  $nulls    True to update null fields or false to ignore them.
	 *
	 * @return  boolean  True on success.
	 *
	 * @since   11.1
	 * @throws  JDatabaseException
	 */
	public function updateObject($table, &$object, $key, $nulls = false)
	{
		// Initialise variables.
		$fields = array();
		$where = '';

		// Create the base update statement.
		$statement = 'UPDATE ' . $this->quoteName($table) . ' SET %s WHERE %s';
>>>>>>> upstream/master

		// Iterate over the object variables to build the query fields/value pairs.
		foreach (get_object_vars($object) as $k => $v)
		{
			// Only process scalars that are not internal fields.
<<<<<<< HEAD
			if (is_array($v) or is_object($v) or $k[0] == '_') {
=======
			if (is_array($v) or is_object($v) or $k[0] == '_')
			{
>>>>>>> upstream/master
				continue;
			}

			// Set the primary key to the WHERE clause instead of a field to update.
<<<<<<< HEAD
			if ($k == $key) {
				$where = $this->quoteName($k).'='.$this->quote($v);
=======
			if ($k == $key)
			{
				$where = $this->quoteName($k) . '=' . $this->quote($v);
>>>>>>> upstream/master
				continue;
			}

			// Prepare and sanitize the fields and values for the database query.
<<<<<<< HEAD
			if ($v === null) {
				// If the value is null and we want to update nulls then set it.
				if ($nulls) {
					$val = 'NULL';
				}
				// If the value is null and we do not want to update nulls then ignore this field.
				else {
=======
			if ($v === null)
			{
				// If the value is null and we want to update nulls then set it.
				if ($nulls)
				{
					$val = 'NULL';
				}
				// If the value is null and we do not want to update nulls then ignore this field.
				else
				{
>>>>>>> upstream/master
					continue;
				}
			}
			// The field is not null so we prep it for update.
<<<<<<< HEAD
			else {
=======
			else
			{
>>>>>>> upstream/master
				$val = $this->isQuoted($k) ? $this->quote($v) : (int) $v;
			}

			// Add the field to be updated.
<<<<<<< HEAD
			$fields[] = $this->quoteName($k).'='.$val;
		}

		// We don't have any fields to update.
		if (empty($fields)) {
=======
			$fields[] = $this->quoteName($k) . '=' . $val;
		}

		// We don't have any fields to update.
		if (empty($fields))
		{
>>>>>>> upstream/master
			return true;
		}

		// Set the query and execute the update.
<<<<<<< HEAD
		$this->setQuery(sprintf($statement, implode(",", $fields) , $where));
=======
		$this->setQuery(sprintf($statement, implode(",", $fields), $where));
>>>>>>> upstream/master
		return $this->query();
	}

	//
	// Deprecated methods.
	//

	/**
	 * Sets the debug level on or off
	 *
<<<<<<< HEAD
	 * @param       integer  $level  0 to disable debugging and 1 to enable it.
	 *
	 * @return      void
	 *
	 * @since       11.1
	 * @deprecated  11.2
=======
	 * @param   integer  $level  0 to disable debugging and 1 to enable it.
	 *
	 * @return  void
	 *
	 * @deprecated  12.1
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function debug($level)
	{
		// Deprecation warning.
		JLog::add('JDatabase::debug() is deprecated, use JDatabase::setDebug() instead.', JLog::NOTICE, 'deprecated');

		$this->setDebug(($level == 0) ? false : true);
	}

	/**
	 * Diagnostic method to return explain information for a query.
	 *
<<<<<<< HEAD
	 * @return      string  The explain output.
	 *
	 * @since       11.1
	 * @deprecated  11.2
=======
	 * @return  string  The explain output.
	 *
	 * @deprecated  12.1
	 * @since   11.1
>>>>>>> upstream/master
	 */
	abstract public function explain();

	/**
	 * Gets the error message from the database connection.
	 *
<<<<<<< HEAD
	 * @param       bool  $escaped  True to escape the message string for use in JavaScript.
	 *
	 * @return      string  The error message for the most recent query.
	 *
	 * @since       11.1
	 * @deprecated  11.2
=======
	 * @param   boolean  $escaped  True to escape the message string for use in JavaScript.
	 *
	 * @return  string  The error message for the most recent query.
	 *
	 * @deprecated  12.1
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function getErrorMsg($escaped = false)
	{
		// Deprecation warning.
		JLog::add('JDatabase::getErrorMsg() is deprecated, use exception handling instead.', JLog::WARNING, 'deprecated');

<<<<<<< HEAD
		if ($escaped) {
			return addslashes($this->errorMsg);
		} else {
=======
		if ($escaped)
		{
			return addslashes($this->errorMsg);
		}
		else
		{
>>>>>>> upstream/master
			return $this->errorMsg;
		}
	}

	/**
	 * Gets the error number from the database connection.
	 *
	 * @return      integer  The error number for the most recent query.
	 *
	 * @since       11.1
<<<<<<< HEAD
	 * @deprecated  11.2
=======
	 * @deprecated  12.1
>>>>>>> upstream/master
	 */
	public function getErrorNum()
	{
		// Deprecation warning.
		JLog::add('JDatabase::getErrorNum() is deprecated, use exception handling instead.', JLog::WARNING, 'deprecated');

		return $this->errorNum;
	}

	/**
	 * Method to escape a string for usage in an SQL statement.
	 *
<<<<<<< HEAD
	 * @param   string  The string to be escaped.
	 * @param   bool    Optional parameter to provide extra escaping.
=======
	 * @param   string   $text   The string to be escaped.
	 * @param   boolean  $extra  Optional parameter to provide extra escaping.
>>>>>>> upstream/master
	 *
	 * @return  string  The escaped string.
	 *
	 * @since   11.1
<<<<<<< HEAD
	 * @deprecated  11.1
=======
	 * @deprecated  12.1
>>>>>>> upstream/master
	 */
	public function getEscaped($text, $extra = false)
	{
		// Deprecation warning.
		JLog::add('JDatabase::getEscaped() is deprecated. Use JDatabase::escape().', JLog::WARNING, 'deprecated');

		return $this->escape($text, $extra);
	}

	/**
	 * Retrieves field information about the given tables.
	 *
<<<<<<< HEAD
	 * @param   mixed  $tables    A table name or a list of table names.
	 * @param   bool   $typeOnly  True to only return field types.
=======
	 * @param   mixed    $tables    A table name or a list of table names.
	 * @param   boolean  $typeOnly  True to only return field types.
>>>>>>> upstream/master
	 *
	 * @return  array  An array of fields by table.
	 *
	 * @since   11.1
<<<<<<< HEAD
	 * @throws  DatabaseException
	 * @deprecated  11.1
=======
	 * @throws  JDatabaseException
	 * @deprecated  12.1
>>>>>>> upstream/master
	 */
	public function getTableFields($tables, $typeOnly = true)
	{
		// Deprecation warning.
		JLog::add('JDatabase::getTableFields() is deprecated. Use JDatabase::getTableColumns().', JLog::WARNING, 'deprecated');

		$results = array();

		settype($tables, 'array');

		foreach ($tables as $table)
		{
			$results[$table] = $this->getTableColumns($table, $typeOnly);
		}

		return $results;
	}

	/**
	 * Get the total number of SQL statements executed by the database driver.
	 *
	 * @return      integer
	 *
	 * @since       11.1
<<<<<<< HEAD
	 * @deprecated  11.2
=======
	 * @deprecated  12.1
>>>>>>> upstream/master
	 */
	public function getTicker()
	{
		// Deprecation warning.
		JLog::add('JDatabase::getTicker() is deprecated, use JDatabase::getCount() instead.', JLog::NOTICE, 'deprecated');

		return $this->count;
	}

	/**
	 * Checks if field name needs to be quoted.
	 *
<<<<<<< HEAD
	 * @param       string  $field  The field name to be checked.
	 *
	 * @return      bool
	 *
	 * @since       11.1
	 * @deprecated  11.2
=======
	 * @param   string  $field  The field name to be checked.
	 *
	 * @return  bool
	 *
	 * @deprecated  12.1
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function isQuoted($field)
	{
		// Deprecation warning.
		JLog::add('JDatabase::isQuoted() is deprecated.', JLog::WARNING, 'deprecated');

<<<<<<< HEAD
		if ($this->hasQuoted) {
			return in_array($field, $this->quoted);
		}
		else {
=======
		if ($this->hasQuoted)
		{
			return in_array($field, $this->quoted);
		}
		else
		{
>>>>>>> upstream/master
			return true;
		}
	}

	/**
	 * Method to get an array of values from the <var>$offset</var> field in each row of the result set from
	 * the database query.
	 *
	 * @param   integer  $offset  The row offset to use to build the result array.
	 *
	 * @return  mixed    The return value or null if the query failed.
	 *
	 * @since   11.1
<<<<<<< HEAD
	 * @throws  DatabaseException
	 * @deprecated  11.1
=======
	 * @throws  JDatabaseException
	 * @deprecated  12.1
>>>>>>> upstream/master
	 */
	public function loadResultArray($offset = 0)
	{
		// Deprecation warning.
<<<<<<< HEAD
		JLog::add('JDatabase::loadResultArray() is deprecated. Use JDatabase::getColumn().', JLog::WARNING, 'deprecated');
=======
		JLog::add('JDatabase::loadResultArray() is deprecated. Use JDatabase::loadColumn().', JLog::WARNING, 'deprecated');
>>>>>>> upstream/master

		return $this->loadColumn($offset);
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
<<<<<<< HEAD
	 * @deprecated  11.1
=======
	 * @deprecated  12.1
>>>>>>> upstream/master
	 */
	public function nameQuote($name)
	{
		// Deprecation warning.
		JLog::add('JDatabase::nameQuote() is deprecated. Use JDatabase::quoteName().', JLog::WARNING, 'deprecated');

		return $this->quoteName($name);
	}

	/**
	 * Execute a query batch.
	 *
<<<<<<< HEAD
	 * @return      mixed  A database resource if successful, false if not.
	 *
	 * @since       11.1
	 * @deprecated  11.2
=======
	 * @param   boolean  $abortOnError     Abort on error.
	 * @param   boolean  $transactionSafe  Transaction safe queries.
	 *
	 * @return  mixed  A database resource if successful, false if not.
	 *
	 * @deprecated  12.1
	 * @since   11.1
>>>>>>> upstream/master
	 */
	abstract public function queryBatch($abortOnError = true, $transactionSafe = false);

	/**
	 * Return the most recent error message for the database connector.
	 *
<<<<<<< HEAD
	 * @param       bool  True to display the SQL statement sent to the database as well as the error.
	 *
	 * @return      string  The error message for the most recent query.
	 *
	 * @since       11.1
	 * @deprecated  11.2
=======
	 * @param   boolean  $showSQL  True to display the SQL statement sent to the database as well as the error.
	 *
	 * @return  string  The error message for the most recent query.
	 *
	 * @deprecated  12.1
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function stderr($showSQL = false)
	{
		// Deprecation warning.
		JLog::add('JDatabase::stderr() is deprecated.', JLog::WARNING, 'deprecated');

<<<<<<< HEAD
		if ($this->errorNum != 0) {
			return JText::sprintf('JLIB_DATABASE_ERROR_FUNCTION_FAILED', $this->errorNum, $this->errorMsg)
			.($showSQL ? "<br />SQL = <pre>$this->sql</pre>" : '');
		}
		else {
			return JText::_('JLIB_DATABASE_FUNCTION_NOERROR');
		}
	}
}
=======
		if ($this->errorNum != 0)
		{
			return JText::sprintf('JLIB_DATABASE_ERROR_FUNCTION_FAILED', $this->errorNum, $this->errorMsg)
				. ($showSQL ? "<br />SQL = <pre>$this->sql</pre>" : '');
		}
		else
		{
			return JText::_('JLIB_DATABASE_FUNCTION_NOERROR');
		}
	}
}
>>>>>>> upstream/master
