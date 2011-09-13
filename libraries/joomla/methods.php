<?php
/**
<<<<<<< HEAD
 * @package     Joomla.Platform
 *
 * @copyright   Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
=======
 * @package    Joomla.Platform
 *
 * @copyright  Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
>>>>>>> upstream/master
 */

defined('JPATH_PLATFORM') or die;

/**
 * Route handling class
 *
<<<<<<< HEAD
 * @package     Joomla.Platform
 * @since       11.1
=======
 * @package  Joomla.Platform
 * @since    11.1
>>>>>>> upstream/master
 */
class JRoute
{
	/**
	 * Translates an internal Joomla URL to a humanly readible URL.
	 *
<<<<<<< HEAD
	 * @param   string   Absolute or Relative URI to Joomla resource.
	 * @param   boolean  Replace & by &amp; for XML compilance.
	 * @param   integer  Secure state for the resolved URI.
	 *		1: Make URI secure using global secure site URI.
	 *		0: Leave URI in the same secure state as it was passed to the function.
	 *		-1: Make URI unsecure using the global unsecure site URI.
	 * @return  The translated humanly readible URL.
=======
	 * @param   string   $url    Absolute or Relative URI to Joomla resource.
	 * @param   boolean  $xhtml  Replace & by &amp; for XML compilance.
	 * @param   integer  $ssl    Secure state for the resolved URI.
	 *                             1: Make URI secure using global secure site URI.
	 *                             0: Leave URI in the same secure state as it was passed to the function.
	 *                            -1: Make URI unsecure using the global unsecure site URI.
	 *
	 * @return  The translated humanly readible URL.
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public static function _($url, $xhtml = true, $ssl = null)
	{
		// Get the router.
<<<<<<< HEAD
		$app	= JFactory::getApplication();
		$router	= $app->getRouter();

		// Make sure that we have our router
		if (!$router) {
			return null;
		}

		if ((strpos($url, '&') !== 0) && (strpos($url, 'index.php') !== 0)) {
=======
		$app = JFactory::getApplication();
		$router = $app->getRouter();

		// Make sure that we have our router
		if (!$router)
		{
			return null;
		}

		if ((strpos($url, '&') !== 0) && (strpos($url, 'index.php') !== 0))
		{
>>>>>>> upstream/master
			return $url;
		}

		// Build route.
		$uri = $router->build($url);
		$url = $uri->toString(array('path', 'query', 'fragment'));

		// Replace spaces.
		$url = preg_replace('/\s/u', '%20', $url);

		/*
		 * Get the secure/unsecure URLs.
		 *
		 * If the first 5 characters of the BASE are 'https', then we are on an ssl connection over
		 * https and need to set our secure URL to the current request URL, if not, and the scheme is
		 * 'http', then we need to do a quick string manipulation to switch schemes.
		 */
<<<<<<< HEAD
		if ((int) $ssl) {
=======
		if ((int) $ssl)
		{
>>>>>>> upstream/master
			$uri = JURI::getInstance();

			// Get additional parts.
			static $prefix;
<<<<<<< HEAD
			if (!$prefix) {
=======
			if (!$prefix)
			{
>>>>>>> upstream/master
				$prefix = $uri->toString(array('host', 'port'));
			}

			// Determine which scheme we want.
<<<<<<< HEAD
			$scheme	= ((int)$ssl === 1) ? 'https' : 'http';

			// Make sure our URL path begins with a slash.
			if (!preg_match('#^/#', $url)) {
				$url = '/'.$url;
			}

			// Build the URL.
			$url = $scheme.'://'.$prefix.$url;
		}

		if ($xhtml) {
			$url = str_replace('&', '&amp;', $url);
=======
			$scheme = ((int) $ssl === 1) ? 'https' : 'http';

			// Make sure our URL path begins with a slash.
			if (!preg_match('#^/#', $url))
			{
				$url = '/' . $url;
			}

			// Build the URL.
			$url = $scheme . '://' . $prefix . $url;
		}

		if ($xhtml)
		{
			$url = htmlspecialchars($url);
>>>>>>> upstream/master
		}

		return $url;
	}
}

/**
 * Text  handling class.
 *
 * @package     Joomla.Platform
 * @subpackage  Language
 * @since       11.1
 */
class JText
{
	/**
	 * javascript strings
<<<<<<< HEAD
	 */
	protected static $strings=array();
=======
	 *
	 * @var    array
	 * @since  11.1
	 */
	protected static $strings = array();
>>>>>>> upstream/master

	/**
	 * Translates a string into the current language.
	 *
	 * Examples:
<<<<<<< HEAD
	 * <script>alert(Joomla.JText._('<?php echo JText::_("JDEFAULT", array("script"=>true));?>'));</script> will generate an alert message containing 'Default'
	 * <?php echo JText::_("JDEFAULT");?> it will generate a 'Default' string
	 *
	 * @param   string         The string to translate.
	 * @param   boolean|array  boolean: Make the result javascript safe. array an array of option as described in the JText::sprintf function
	 * @param   boolean        To interpret backslashes (\\=\, \n=carriage return, \t=tabulation)
	 * @param   boolean        To indicate that the string will be push in the javascript language store
=======
	 * <script>alert(Joomla.JText._('<?php echo JText::_("JDEFAULT", array("script"=>true));?>'));</script>
	 * will generate an alert message containing 'Default'
	 * <?php echo JText::_("JDEFAULT");?> it will generate a 'Default' string
	 *
	 * @param   string   $string                The string to translate.
	 * @param   mixed    $jsSafe                Boolean: Make the result javascript safe.
	 * @param   boolean  $interpretBackSlashes  To interpret backslashes (\\=\, \n=carriage return, \t=tabulation)
	 * @param   boolean  $script                To indicate that the string will be push in the javascript language store
>>>>>>> upstream/master
	 *
	 * @return  string  The translated string or the key is $script is true
	 *
	 * @since   11.1
<<<<<<< HEAD
	 *
=======
>>>>>>> upstream/master
	 */
	public static function _($string, $jsSafe = false, $interpretBackSlashes = true, $script = false)
	{
		$lang = JFactory::getLanguage();
<<<<<<< HEAD
		if (is_array($jsSafe)) {
			if (array_key_exists('interpretBackSlashes', $jsSafe)) {
				$interpretBackSlashes = (boolean) $jsSafe['interpretBackSlashes'];
			}
			if (array_key_exists('script', $jsSafe)) {
				$script = (boolean) $jsSafe['script'];
			}
			if (array_key_exists('jsSafe', $jsSafe)) {
				$jsSafe = (boolean) $jsSafe['jsSafe'];
			}
			else {
				$jsSafe = false;
			}
		}
		if ($script) {
			self::$strings[$string] = $lang->_($string, $jsSafe, $interpretBackSlashes);
			return $string;
		}
		else {
=======
		if (is_array($jsSafe))
		{
			if (array_key_exists('interpretBackSlashes', $jsSafe))
			{
				$interpretBackSlashes = (boolean) $jsSafe['interpretBackSlashes'];
			}
			if (array_key_exists('script', $jsSafe))
			{
				$script = (boolean) $jsSafe['script'];
			}
			if (array_key_exists('jsSafe', $jsSafe))
			{
				$jsSafe = (boolean) $jsSafe['jsSafe'];
			}
			else
			{
				$jsSafe = false;
			}
		}
		if ($script)
		{
			self::$strings[$string] = $lang->_($string, $jsSafe, $interpretBackSlashes);
			return $string;
		}
		else
		{
>>>>>>> upstream/master
			return $lang->_($string, $jsSafe, $interpretBackSlashes);
		}
	}

	/**
	 * Translates a string into the current language.
	 *
	 * Examples:
	 * <?php echo JText::alt("JALL","language");?> it will generate a 'All' string in English but a "Toutes" string in French
	 * <?php echo JText::alt("JALL","module");?> it will generate a 'All' string in English but a "Tous" string in French
	 *
<<<<<<< HEAD
	 * @param   string         The string to translate.
	 * @param   string         The alternate option for global string
	 * @param   boolean|array  boolean: Make the result javascript safe. array an array of option as described in the JText::sprintf function
	 * @param   boolean        To interpret backslashes (\\=\, \n=carriage return, \t=tabulation)
	 * @param   boolean        To indicate that the string will be pushed in the javascript language store
=======
	 * @param   string   $string                The string to translate.
	 * @param   string   $alt                   The alternate option for global string
	 * @param   mixed    $jsSafe                Boolean: Make the result javascript safe.
	 * @param   boolean  $interpretBackSlashes  To interpret backslashes (\\=\, \n=carriage return, \t=tabulation)
	 * @param   boolean  $script                To indicate that the string will be pushed in the javascript language store
>>>>>>> upstream/master
	 *
	 * @return  string  The translated string or the key if $script is true
	 *
	 * @since   11.1
<<<<<<< HEAD
	 *
=======
>>>>>>> upstream/master
	 */
	public static function alt($string, $alt, $jsSafe = false, $interpretBackSlashes = true, $script = false)
	{
		$lang = JFactory::getLanguage();
<<<<<<< HEAD
		if ($lang->hasKey($string.'_'.$alt)) {
			return self::_($string.'_'.$alt, $jsSafe, $interpretBackSlashes);
		}
		else {
=======
		if ($lang->hasKey($string . '_' . $alt))
		{
			return self::_($string . '_' . $alt, $jsSafe, $interpretBackSlashes);
		}
		else
		{
>>>>>>> upstream/master
			return self::_($string, $jsSafe, $interpretBackSlashes);
		}
	}
	/**
	 * Like JText::sprintf but tries to pluralise the string.
	 *
<<<<<<< HEAD
	 * Examples:
	 * <script>alert(Joomla.JText._('<?php echo JText::plural("COM_PLUGINS_N_ITEMS_UNPUBLISHED", 1, array("script"=>true));?>'));</script> will generate an alert message containing '1 plugin successfully disabled'
	 * <?php echo JText::plural("COM_PLUGINS_N_ITEMS_UNPUBLISHED", 1);?> it will generate a '1 plugin successfully disabled' string
	 *
	 * @param   string   The format string.
	 * @param   integer  The number of items
	 * @param   mixed    Mixed number of arguments for the sprintf function. The first should be an integer.
	 * @param   array    optional Array of option array('jsSafe'=>boolean, 'interpretBackSlashes'=>boolean, 'script'=>boolean) where
	 *					-jsSafe is a boolean to generate a javascript safe string
	 *					-interpretBackSlashes is a boolean to interpret backslashes \\->\, \n->new line, \t->tabulation
	 *					-script is a boolean to indicate that the string will be push in the javascript language store
=======
	 * Note that this method can take a mixed number of arguments as for the sprintf function.
	 *
	 * The last argument can take an array of options:
	 *
	 * array('jsSafe'=>boolean, 'interpretBackSlashes'=>boolean, 'script'=>boolean)
	 *
	 * where:
	 *
	 * jsSafe is a boolean to generate a javascript safe strings.
	 * interpretBackSlashes is a boolean to interpret backslashes \\->\, \n->new line, \t->tabulation.
	 * script is a boolean to indicate that the string will be push in the javascript language store.
	 *
	 * Examples:
	 * <script>alert(Joomla.JText._('<?php echo JText::plural("COM_PLUGINS_N_ITEMS_UNPUBLISHED", 1, array("script"=>true));?>'));</script>
	 * will generate an alert message containing '1 plugin successfully disabled'
	 * <?php echo JText::plural("COM_PLUGINS_N_ITEMS_UNPUBLISHED", 1);?> it will generate a '1 plugin successfully disabled' string
	 *
	 * @param   string   $string  The format string.
	 * @param   integer  $n       The number of items
>>>>>>> upstream/master
	 *
	 * @return  string  The translated strings or the key if 'script' is true in the array of options
	 *
	 * @since   11.1
	 */
<<<<<<< HEAD

=======
>>>>>>> upstream/master
	public static function plural($string, $n)
	{
		$lang = JFactory::getLanguage();
		$args = func_get_args();
		$count = count($args);

<<<<<<< HEAD
		if ($count > 1) {
			// Try the key from the language plural potential suffixes
			$found = false;
			$suffixes = $lang->getPluralSuffixes((int)$n);
			foreach ($suffixes as $suffix) {
				$key = $string.'_'.$suffix;
				if ($lang->hasKey($key)) {
=======
		if ($count > 1)
		{
			// Try the key from the language plural potential suffixes
			$found = false;
			$suffixes = $lang->getPluralSuffixes((int) $n);
			foreach ($suffixes as $suffix)
			{
				$key = $string . '_' . $suffix;
				if ($lang->hasKey($key))
				{
>>>>>>> upstream/master
					$found = true;
					break;
				}
			}
<<<<<<< HEAD
			if (!$found) {
				// Not found so revert to the original.
				$key = $string;
			}
			if (is_array($args[$count-1])) {
				$args[0] = $lang->_($key, array_key_exists('jsSafe', $args[$count-1]) ? $args[$count-1]['jsSafe'] : false, array_key_exists('interpretBackSlashes', $args[$count-1]) ? $args[$count-1]['interpretBackSlashes'] : true);
				if (array_key_exists('script',$args[$count-1]) && $args[$count-1]['script']) {
=======
			if (!$found)
			{
				// Not found so revert to the original.
				$key = $string;
			}
			if (is_array($args[$count - 1]))
			{
				$args[0] = $lang->_(
					$key, array_key_exists('jsSafe', $args[$count - 1]) ? $args[$count - 1]['jsSafe'] : false,
					array_key_exists('interpretBackSlashes', $args[$count - 1]) ? $args[$count - 1]['interpretBackSlashes'] : true
				);
				if (array_key_exists('script', $args[$count - 1]) && $args[$count - 1]['script'])
				{
>>>>>>> upstream/master
					self::$strings[$key] = call_user_func_array('sprintf', $args);
					return $key;
				}
			}
<<<<<<< HEAD
			else {
=======
			else
			{
>>>>>>> upstream/master
				$args[0] = $lang->_($key);
			}
			return call_user_func_array('sprintf', $args);
		}
<<<<<<< HEAD
		elseif ($count > 0) {
=======
		elseif ($count > 0)
		{
>>>>>>> upstream/master

			// Default to the normal sprintf handling.
			$args[0] = $lang->_($string);
			return call_user_func_array('sprintf', $args);
		}

		return '';
	}

	/**
	 * Passes a string thru a sprintf.
	 *
<<<<<<< HEAD
	 * @param   string  The format string.
	 * @param   mixed   Mixed number of arguments for the sprintf function.
	 * @param   array   optional Array of option array('jsSafe'=>boolean, 'interpretBackSlashes'=>boolean, 'script'=>boolean) where
	 *					-jsSafe is a boolean to generate a javascript safe strings
	 *					-interpretBackSlashes is a boolean to interpret backslashes \\->\, \n->new line, \t->tabulation
	 *					-script is a boolean to indicate that the string will be push in the javascript language store
	 *
	 * @return  string  The translated strings or the key if 'script' is true in the array of options
=======
	 * Note that this method can take a mixed number of arguments as for the sprintf function.
	 *
	 * The last argument can take an array of options:
	 *
	 * array('jsSafe'=>boolean, 'interpretBackSlashes'=>boolean, 'script'=>boolean)
	 *
	 * where:
	 *
	 * jsSafe is a boolean to generate a javascript safe strings.
	 * interpretBackSlashes is a boolean to interpret backslashes \\->\, \n->new line, \t->tabulation.
	 * script is a boolean to indicate that the string will be push in the javascript language store.
	 *
	 * @param   string  $string  The format string.
	 *
	 * @return  string  The translated strings or the key if 'script' is true in the array of options.
>>>>>>> upstream/master
	 *
	 * @since   11.1
	 */
	public static function sprintf($string)
	{
		$lang = JFactory::getLanguage();
		$args = func_get_args();
		$count = count($args);
<<<<<<< HEAD
		if ($count > 0) {
			if (is_array($args[$count-1])) {
				$args[0] = $lang->_($string, array_key_exists('jsSafe', $args[$count-1]) ? $args[$count-1]['jsSafe'] : false, array_key_exists('interpretBackSlashes', $args[$count-1]) ? $args[$count-1]['interpretBackSlashes'] : true);
				if (array_key_exists('script', $args[$count-1]) && $args[$count-1]['script']) {
=======
		if ($count > 0)
		{
			if (is_array($args[$count - 1]))
			{
				$args[0] = $lang->_(
					$string, array_key_exists('jsSafe', $args[$count - 1]) ? $args[$count - 1]['jsSafe'] : false,
					array_key_exists('interpretBackSlashes', $args[$count - 1]) ? $args[$count - 1]['interpretBackSlashes'] : true
				);

				if (array_key_exists('script', $args[$count - 1]) && $args[$count - 1]['script'])
				{
>>>>>>> upstream/master
					self::$strings[$string] = call_user_func_array('sprintf', $args);
					return $string;
				}
			}
<<<<<<< HEAD
			else {
=======
			else
			{
>>>>>>> upstream/master
				$args[0] = $lang->_($string);
			}
			return call_user_func_array('sprintf', $args);
		}
		return '';
	}

	/**
	 * Passes a string thru an printf.
	 *
<<<<<<< HEAD
	 * @param   format The format string.
	 * @param   mixed Mixed number of arguments for the sprintf function.
=======
	 * Note that this method can take a mixed number of arguments as for the sprintf function.
	 *
	 * @param   format  $string  The format string.
>>>>>>> upstream/master
	 *
	 * @return  mixed
	 *
	 * @since   11.1
	 */
	public static function printf($string)
	{
<<<<<<< HEAD
		$lang	= JFactory::getLanguage();
		$args	= func_get_args();
		$count	= count($args);
		if ($count > 0) {
			if (is_array($args[$count-1])) {
				$args[0] = $lang->_($string, array_key_exists('jsSafe', $args[$count-1]) ? $args[$count-1]['jsSafe'] : false, array_key_exists('interpretBackSlashes', $args[$count-1]) ? $args[$count-1]['interpretBackSlashes'] : true);
			}
			else {
=======
		$lang = JFactory::getLanguage();
		$args = func_get_args();
		$count = count($args);
		if ($count > 0)
		{
			if (is_array($args[$count - 1]))
			{
				$args[0] = $lang->_(
					$string, array_key_exists('jsSafe', $args[$count - 1]) ? $args[$count - 1]['jsSafe'] : false,
					array_key_exists('interpretBackSlashes', $args[$count - 1]) ? $args[$count - 1]['interpretBackSlashes'] : true
				);
			}
			else
			{
>>>>>>> upstream/master
				$args[0] = $lang->_($string);
			}
			return call_user_func_array('printf', $args);
		}
		return '';
	}

	/**
	 * Translate a string into the current language and stores it in the JavaScript language store.
	 *
<<<<<<< HEAD
	 * @param   string   The JText key.
=======
	 * @param   string   $string                The JText key.
	 * @param   boolean  $jsSafe                Ensure the output is JavaScript safe.
	 * @param   boolean  $interpretBackSlashes  Interpret \t and \n.
	 *
	 * @return  string
>>>>>>> upstream/master
	 *
	 * @since   11.1
	 */
	public static function script($string = null, $jsSafe = false, $interpretBackSlashes = true)
	{
<<<<<<< HEAD
		if (is_array($jsSafe)) {
			if (array_key_exists('interpretBackSlashes', $jsSafe)) {
				$interpretBackSlashes = (boolean) $jsSafe['interpretBackSlashes'];
			}
			if (array_key_exists('jsSafe', $jsSafe)) {
				$jsSafe = (boolean) $jsSafe['jsSafe'];
			}
			else {
=======
		if (is_array($jsSafe))
		{
			if (array_key_exists('interpretBackSlashes', $jsSafe))
			{
				$interpretBackSlashes = (boolean) $jsSafe['interpretBackSlashes'];
			}

			if (array_key_exists('jsSafe', $jsSafe))
			{
				$jsSafe = (boolean) $jsSafe['jsSafe'];
			}
			else
			{
>>>>>>> upstream/master
				$jsSafe = false;
			}
		}

		// Add the string to the array if not null.
<<<<<<< HEAD
		if ($string !== null) {
=======
		if ($string !== null)
		{
>>>>>>> upstream/master
			// Normalize the key and translate the string.
			self::$strings[strtoupper($string)] = JFactory::getLanguage()->_($string, $jsSafe, $interpretBackSlashes);
		}

		return self::$strings;
	}
}
