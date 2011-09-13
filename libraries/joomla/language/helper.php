<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Language
 *
 * @copyright   Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

<<<<<<< HEAD
defined('JPATH_PLATFORM') or die;

/**
 * @package     Joomla.Platform
 * @subpackage  Language
 * @since   11.1
=======
defined('JPATH_PLATFORM') or die();

/**
 * Language helper class
 *
 * @package     Joomla.Platform
 * @subpackage  Language
 * @since       11.1
>>>>>>> upstream/master
 */
class JLanguageHelper
{
	/**
	 * Builds a list of the system languages which can be used in a select option
	 *
<<<<<<< HEAD
	 * @param   string   Client key for the area
	 * @param   string   Base path to use
	 * @param   array    An array of arrays (text, value, selected)
	 *
	 * @return  array  List of system languages
=======
	 * @param   string   $actualLanguage  Client key for the area
	 * @param   string   $basePath        Base path to use
	 * @param   boolean  $caching         True if caching is used
	 * @param   array    $installed       An array of arrays (text, value, selected)
	 *
	 * @return  array  List of system languages
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function createLanguageList($actualLanguage, $basePath = JPATH_BASE, $caching = false, $installed = false)
	{
<<<<<<< HEAD
		$list = array ();

		// cache activation
=======
		$list = array();

		// Cache activation
>>>>>>> upstream/master
		$langs = JLanguage::getKnownLanguages($basePath);
		if ($installed)
		{
			$db = JFactory::getDBO();
			$query = $db->getQuery(true);
			$query->select('element');
			$query->from('#__extensions');
<<<<<<< HEAD
			$query->where('type='.$db->quote('language'));
			$query->where('state=0');
			$query->where('enabled=1');
			$query->where('client_id='.($basePath==JPATH_ADMINISTRATOR?1:0));
=======
			$query->where('type=' . $db->quote('language'));
			$query->where('state=0');
			$query->where('enabled=1');
			$query->where('client_id=' . ($basePath == JPATH_ADMINISTRATOR ? 1 : 0));
>>>>>>> upstream/master
			$db->setQuery($query);
			$installed_languages = $db->loadObjectList('element');
		}

		foreach ($langs as $lang => $metadata)
		{
			if (!$installed || array_key_exists($lang, $installed_languages))
			{
<<<<<<< HEAD
				$option = array ();

				$option['text'] = $metadata['name'];
				$option['value'] = $lang;
				if ($lang == $actualLanguage) {
=======
				$option = array();

				$option['text'] = $metadata['name'];
				$option['value'] = $lang;
				if ($lang == $actualLanguage)
				{
>>>>>>> upstream/master
					$option['selected'] = 'selected="selected"';
				}
				$list[] = $option;
			}
		}

		return $list;
	}

	/**
	 * Tries to detect the language.
	 *
	 * @return  string  locale or null if not found
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function detectLanguage()
	{
		if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE']))
		{
<<<<<<< HEAD
			$browserLangs	= explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
			$systemLangs	= self::getLanguages();
=======
			$browserLangs = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
			$systemLangs = self::getLanguages();
>>>>>>> upstream/master
			foreach ($browserLangs as $browserLang)
			{
				// Slice out the part before ; on first step, the part before - on second, place into array
				$browserLang = substr($browserLang, 0, strcspn($browserLang, ';'));
				$primary_browserLang = substr($browserLang, 0, 2);
<<<<<<< HEAD
				foreach($systemLangs as $systemLang)
=======
				foreach ($systemLangs as $systemLang)
>>>>>>> upstream/master
				{
					// Take off 3 letters iso code languages as they can't match browsers' languages and default them to en
					$Jinstall_lang = $systemLang->lang_code;

					if (strlen($Jinstall_lang) < 6)
					{
<<<<<<< HEAD
						if (strtolower($browserLang) == strtolower(substr($systemLang->lang_code, 0, strlen($browserLang)))) {
							return $systemLang->lang_code;
						}
						else if ($primary_browserLang == substr($systemLang->lang_code, 0, 2)) {
=======
						if (strtolower($browserLang) == strtolower(substr($systemLang->lang_code, 0, strlen($browserLang))))
						{
							return $systemLang->lang_code;
						}
						else if ($primary_browserLang == substr($systemLang->lang_code, 0, 2))
						{
>>>>>>> upstream/master
							$primaryDetectedLang = $systemLang->lang_code;
						}
					}
				}

<<<<<<< HEAD
				if (isset($primaryDetectedLang)) {
=======
				if (isset($primaryDetectedLang))
				{
>>>>>>> upstream/master
					return $primaryDetectedLang;
				}
			}
		}

		return null;
	}

	/**
	 * Get available languages
	 *
<<<<<<< HEAD
	 * @param   string array key
	 *
	 * @return  array  of published languages
	 * @since   11.1
	 */
	public static function getLanguages($key='default')
	{
		static $languages;

		if (empty($languages)) {
			// Installation uses available languages
			if (JFactory::getApplication()->getClientId() == 2) {
				$languages[$key] = array();
				$knownLangs = JLanguage::getKnownLanguages(JPATH_BASE);
				foreach($knownLangs as $metadata)
=======
	 * @param   string  $key  Array key
	 *
	 * @return  array  An array of published languages
	 *
	 * @since   11.1
	 */
	public static function getLanguages($key = 'default')
	{
		static $languages;

		if (empty($languages))
		{
			// Installation uses available languages
			if (JFactory::getApplication()->getClientId() == 2)
			{
				$languages[$key] = array();
				$knownLangs = JLanguage::getKnownLanguages(JPATH_BASE);
				foreach ($knownLangs as $metadata)
>>>>>>> upstream/master
				{
					// take off 3 letters iso code languages as they can't match browsers' languages and default them to en
					$languages[$key][] = new JObject(array('lang_code' => $metadata['tag']));
				}
			}
<<<<<<< HEAD
			else {
				$cache = JFactory::getCache('com_languages', '');
				if (!$languages = $cache->get('languages')) {
					$db 	= JFactory::getDBO();
					$query	= $db->getQuery(true);
					// TODO Use an ordering field for 1.7 $query->select('*')->from('#__languages')->where('published=1')->order('ordering ASC');
					$query->select('*')->from('#__languages')->where('published=1')->order('lang_id ASC');
					$db->setQuery($query);

					$languages['default'] 	= $db->loadObjectList();
					$languages['sef']		= array();
					$languages['lang_code']	= array();

					if (isset($languages['default'][0])) {
						foreach($languages['default'] as $lang) {
							$languages['sef'][$lang->sef] 				= $lang;
							$languages['lang_code'][$lang->lang_code] 	= $lang;
=======
			else
			{
				$cache = JFactory::getCache('com_languages', '');
				if (!$languages = $cache->get('languages'))
				{
					$db = JFactory::getDBO();
					$query = $db->getQuery(true);
					$query->select('*')
						->from('#__languages')
						->where('published=1')
						->order('ordering ASC');
					$db->setQuery($query);

					$languages['default'] = $db->loadObjectList();
					$languages['sef'] = array();
					$languages['lang_code'] = array();

					if (isset($languages['default'][0]))
					{
						foreach ($languages['default'] as $lang)
						{
							$languages['sef'][$lang->sef] = $lang;
							$languages['lang_code'][$lang->lang_code] = $lang;
>>>>>>> upstream/master
						}
					}

					$cache->store($languages, 'languages');
				}
			}
		}
		return $languages[$key];
	}
}
