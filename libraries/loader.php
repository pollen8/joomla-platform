<?php
/**
 * @package     Joomla.Platform
 *
 * @copyright   Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('JPATH_PLATFORM') or die;

// Register JLoader::load as an autoload class handler.
<<<<<<< HEAD
spl_autoload_register(array('JLoader','load'));
=======
spl_autoload_register(array('JLoader', 'load'));
>>>>>>> upstream/master

/**
 * Static class to handle loading of libraries.
 *
 * @package  Joomla.Platform
 * @since    11.1
 */
abstract class JLoader
{
	/**
	 * Container for already imported library paths.
	 *
	 * @var    array
	 * @since  11.1
	 */
<<<<<<< HEAD
	protected static $_imported = array();
=======
	protected static $imported = array();
>>>>>>> upstream/master

	/**
	 * Container for already imported library paths.
	 *
	 * @var    array
	 * @since  11.1
	 */
<<<<<<< HEAD
	protected static $_classes = array();
=======
	protected static $classes = array();
>>>>>>> upstream/master

	/**
	 * Loads a class from specified directories.
	 *
<<<<<<< HEAD
	 * @param   string  $key   The class name to look for (dot notation).
	 * @param   string  $base  Search this directory for the class.
	 *
	 * @return  bool    True on success.
=======
	 * @param   string   $key   The class name to look for (dot notation).
	 * @param   string   $base  Search this directory for the class.
	 *
	 * @return  boolean  True on success.
>>>>>>> upstream/master
	 *
	 * @since   11.1
	 */
	public static function import($key, $base = null)
	{
		// Only import the library if not already attempted.
<<<<<<< HEAD
		if (!isset(self::$_imported[$key]))
		{
			// Setup some variables.
			$success	= false;
			$parts		= explode('.', $key);
			$class		= array_pop($parts);
			$base		= (!empty($base)) ? $base : dirname(__FILE__);
			$path		= str_replace('.', DS, $key);

			// Handle special case for helper classes.
			if ($class == 'helper') {
				$class = ucfirst(array_pop($parts)).ucfirst($class);
			}
			// Standard class.
			else {
=======
		if (!isset(self::$imported[$key]))
		{
			// Setup some variables.
			$success = false;
			$parts = explode('.', $key);
			$class = array_pop($parts);
			$base = (!empty($base)) ? $base : dirname(__FILE__);
			$path = str_replace('.', DS, $key);

			// Handle special case for helper classes.
			if ($class == 'helper')
			{
				$class = ucfirst(array_pop($parts)) . ucfirst($class);
			}
			// Standard class.
			else
			{
>>>>>>> upstream/master
				$class = ucfirst($class);
			}

			// If we are importing a library from the Joomla namespace set the class to autoload.
<<<<<<< HEAD
			if (strpos($path, 'joomla') === 0) {

				// Since we are in the Joomla namespace prepend the classname with J.
				$class	= 'J'.$class;

				// Only register the class for autoloading if the file exists.
				if (is_file($base.DS.$path.'.php')) {
					self::$_classes[strtolower($class)] = $base.DS.$path.'.php';
					$success = true;
				}
			}

=======
			if (strpos($path, 'joomla') === 0)
			{

				// Since we are in the Joomla namespace prepend the classname with J.
				$class = 'J' . $class;

				// Only register the class for autoloading if the file exists.
				if (is_file($base . '/' . $path . '.php'))
				{
					self::$classes[strtolower($class)] = $base . '/' . $path . '.php';
					$success = true;
				}
			}
>>>>>>> upstream/master
			/*
			 * If we are not importing a library from the Joomla namespace directly include the
			 * file since we cannot assert the file/folder naming conventions.
			 */
<<<<<<< HEAD
			else {

				// If the file exists attempt to include it.
				if (is_file($base.DS.$path.'.php')) {
					$success = (bool) include_once $base.DS.$path.'.php' ;
=======
			else
			{

				// If the file exists attempt to include it.
				if (is_file($base . '/' . $path . '.php'))
				{
					$success = (bool) include_once $base . '/' . $path . '.php';
>>>>>>> upstream/master
				}
			}

			// Add the import key to the memory cache container.
<<<<<<< HEAD
			self::$_imported[$key] = $success;
		}

		return self::$_imported[$key];
=======
			self::$imported[$key] = $success;
		}

		return self::$imported[$key];
>>>>>>> upstream/master
	}

	/**
	 * Method to discover classes of a given type in a given path.
	 *
<<<<<<< HEAD
	 * @param   string  $classPrefix  The class name prefix to use for discovery.
	 * @param   string  $parentPath   Full path to the parent folder for the classes to discover.
	 * @param   bool    $force        True to overwrite the autoload path value for the class if it already exists.
=======
	 * @param   string   $classPrefix  The class name prefix to use for discovery.
	 * @param   string   $parentPath   Full path to the parent folder for the classes to discover.
	 * @param   boolean  $force        True to overwrite the autoload path value for the class if it already exists.
	 * @param   boolean  $recurse      Recurse through all child directories as well as the parent path.
>>>>>>> upstream/master
	 *
	 * @return  void
	 *
	 * @since   11.1
	 */
<<<<<<< HEAD
	public static function discover($classPrefix, $parentPath, $force = true)
	{
		// Ignore the operation if the folder doesn't exist.
		if (is_dir($parentPath)) {

			// Open the folder.
			$d = dir($parentPath);

			// Iterate through the folder contents to search for input classes.
			while (false !== ($entry = $d->read()))
			{
				// Only load for php files.
				if (file_exists($parentPath.'/'.$entry) && (substr($entry, strrpos($entry, '.') + 1) == 'php')) {

					// Get the class name and full path for each file.
					$class = strtolower($classPrefix.preg_replace('#\.[^.]*$#', '', $entry));
					$path  = $parentPath.'/'.$entry;

					// Register the class with the autoloader if not already registered or the force flag is set.
					if (empty(self::$_classes[$class]) || $force) {
						JLoader::register($class, $path);
					}
				}
			}

			// Close the folder.
			$d->close();
=======
	public static function discover($classPrefix, $parentPath, $force = true, $recurse = false)
	{
		try
		{
			if ($recurse)
			{
				$iterator = new RecursiveIteratorIterator(
					new RecursiveDirectoryIterator($parentPath),
					RecursiveIteratorIterator::SELF_FIRST
				);
			}
			else
			{
				$iterator = new DirectoryIterator($parentPath);
			}

			foreach ($iterator as $file)
			{
				$fileName = $file->getFilename();

				// Only load for php files.
				// Note: DirectoryIterator::getExtension only available PHP >= 5.3.6
				if ($file->isFile() && substr($fileName, strrpos($fileName, '.') + 1) == 'php')
				{
					// Get the class name and full path for each file.
					$class = strtolower($classPrefix . preg_replace('#\.php$#', '', $fileName));

					// Register the class with the autoloader if not already registered or the force flag is set.
					if (empty(self::$classes[$class]) || $force)
					{
						JLoader::register($class, $file->getPath().'/'.$fileName);
					}
				}
			}
		}
		catch (UnexpectedValueException $e)
		{
			// Exception will be thrown if the path is not a directory. Ignore it.
>>>>>>> upstream/master
		}
	}

	/**
	 * Method to get the list of registered classes and their respective file paths for the autoloader.
	 *
	 * @return  array  The array of class => path values for the autoloader.
	 *
	 * @since   11.1
	 */
	public static function getClassList()
	{
<<<<<<< HEAD
		return self::$_classes;
=======
		return self::$classes;
>>>>>>> upstream/master
	}

	/**
	 * Directly register a class to the autoload list.
	 *
<<<<<<< HEAD
	 * @param   string  $class  The class name to register.
	 * @param   string  $path   Full path to the file that holds the class to register.
	 * @param   bool    $force  True to overwrite the autoload path value for the class if it already exists.
=======
	 * @param   string   $class  The class name to register.
	 * @param   string   $path   Full path to the file that holds the class to register.
	 * @param   boolean  $force  True to overwrite the autoload path value for the class if it already exists.
>>>>>>> upstream/master
	 *
	 * @return  void
	 *
	 * @since   11.1
	 */
	public static function register($class, $path, $force = true)
	{
		// Sanitize class name.
		$class = strtolower($class);

		// Only attempt to register the class if the name and file exist.
<<<<<<< HEAD
		if (!empty($class) && is_file($path)) {

			// Register the class with the autoloader if not already registered or the force flag is set.
			if (empty(self::$_classes[$class]) || $force) {
				self::$_classes[$class] = $path;
=======
		if (!empty($class) && is_file($path))
		{
			// Register the class with the autoloader if not already registered or the force flag is set.
			if (empty(self::$classes[$class]) || $force)
			{
				self::$classes[$class] = $path;
>>>>>>> upstream/master
			}
		}
	}

	/**
	 * Load the file for a class.
	 *
<<<<<<< HEAD
	 * @param   string  $class  The class to be loaded.
	 *
	 * @return  bool    True on success
=======
	 * @param   string   $class  The class to be loaded.
	 *
	 * @return  boolean  True on success
>>>>>>> upstream/master
	 *
	 * @since   11.1
	 */
	public static function load($class)
	{
		// Sanitize class name.
		$class = strtolower($class);

		// If the class already exists do nothing.
<<<<<<< HEAD
		if (class_exists($class)) {
			  return;
		}

		// If the class is registered include the file.
		if (isset(self::$_classes[$class])) {
			include_once self::$_classes[$class] ;
=======
		if (class_exists($class))
		{
			return true;
		}

		// If the class is registered include the file.
		if (isset(self::$classes[$class]))
		{
			include_once self::$classes[$class];
>>>>>>> upstream/master
			return true;
		}

		return false;
	}
}

/**
 * Global application exit.
 *
 * This function provides a single exit point for the platform.
 *
 * @param   mixed  $message  Exit code or string. Defaults to zero.
 *
 * @return  void
 *
 * @since   11.1
 */
function jexit($message = 0)
{
<<<<<<< HEAD
    exit($message);
=======
	exit($message);
>>>>>>> upstream/master
}

/**
 * Intelligent file importer.
 *
<<<<<<< HEAD
 * @param   string  $path  A dot syntax path.
 *
 * @return  bool    True on success.
=======
 * @param   string   $path  A dot syntax path.
 *
 * @return  boolean  True on success.
>>>>>>> upstream/master
 *
 * @since   11.1
 */
function jimport($path)
{
	return JLoader::import($path);
}
