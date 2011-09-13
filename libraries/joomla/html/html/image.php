<?php
/**
 * @package     Joomla.Platform
 * @subpackage  HTML
 *
 * @copyright   Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('JPATH_PLATFORM') or die;

/**
 * Utility class working with images.
 *
 * @package     Joomla.Platform
<<<<<<< HEAD
 * @subpackage  Html
=======
 * @subpackage  HTML
>>>>>>> upstream/master
 * @since       11.1
 */
abstract class JHtmlImage
{
	/**
	 * Checks to see if an image exists in the current templates image directory.
<<<<<<< HEAD
	 * If it does it loads this image.  Otherwise the default image is loaded.
	 * Also can be used in conjunction with the menulist param to create the chosen image
	 * load the default or use no image.
	 *
	 * @param   string   $file		The file name, eg foobar.png.
	 * @param   string   $folder		The path to the image.
	 * @param   integer  $altFile	Empty: use $file and $folder, -1: show no image, not-empty: use $altFile and $altFolder.
	 * @param   string   $altFolder	Another path.  Only used for the contact us form based on the value of the imagelist param.
	 * @param   string   $alt		Alternative text.
	 * @param   array    $attribs	An associative array of attributes to add.
	 * @param   bool	$asTag		True (default) to display full tag, false to return just the path.
	 * @deprecated since 1.6
	 */
	public static function site($file, $folder = '/images/system/', $altFile = null, $altFolder = '/images/system/', $alt = null, $attribs = null, $asTag = true)
	{
		static $paths;
		$app = JFactory::getApplication();

		if (!$paths) {
			$paths = array();
		}

		if (is_array($attribs)) {
=======
	 * If it does it loads this image. Otherwise the default image is loaded.
	 * Also can be used in conjunction with the menulist param to create the chosen image
	 * load the default or use no image.
	 *
	 * @param   string   $file       The file name, eg foobar.png.
	 * @param   string   $folder     The path to the image.
	 * @param   integer  $altFile    Empty: use $file and $folder, -1: show no image, not-empty: use $altFile and $altFolder.
	 * @param   string   $altFolder  Another path.  Only used for the contact us form based on the value of the imagelist param.
	 * @param   string   $alt        Alternative text.
	 * @param   array    $attribs    An associative array of attributes to add.
	 * @param   boolean  $asTag      True (default) to display full tag, false to return just the path.
	 *
	 * @return  string   The value for the src or if $asTag is true, the full img html.
	 *
	 * @since    11.1
	 *
	 * @deprecated    12.1
	 */
	public static function site($file, $folder = '/images/system/', $altFile = null, $altFolder = '/images/system/', $alt = null, $attribs = null,
		$asTag = true)
	{
		// Deprecation warning.
		JLog::add('JImage::site is deprecated.', JLog::WARNING, 'deprecated');

		static $paths;
		$app = JFactory::getApplication();

		if (!$paths)
		{
			$paths = array();
		}

		if (is_array($attribs))
		{
>>>>>>> upstream/master
			$attribs = JArrayHelper::toString($attribs);
		}

		$cur_template = $app->getTemplate();

		// Strip HTML.
		$alt = html_entity_decode($alt, ENT_COMPAT, 'UTF-8');

<<<<<<< HEAD
		if ($altFile) {
			$src = $altFolder . $altFile;
		}
		else if ($altFile == -1) {
=======
		if ($altFile)
		{
			$src = $altFolder . $altFile;
		}
		else if ($altFile == -1)
		{
>>>>>>> upstream/master
			return '';
		}
		else
		{
<<<<<<< HEAD
			$path = JPATH_SITE .'/templates/'. $cur_template .'/images/'. $file;
			if (!isset($paths[$path]))
			{
				if (file_exists(JPATH_SITE .'/templates/'. $cur_template .'/images/'. $file)) {
					$paths[$path] = 'templates/'. $cur_template .'/images/'. $file;
=======
			$path = JPATH_SITE . '/templates/' . $cur_template . '/images/' . $file;
			if (!isset($paths[$path]))
			{
				if (file_exists(JPATH_SITE . '/templates/' . $cur_template . '/images/' . $file))
				{
					$paths[$path] = 'templates/' . $cur_template . '/images/' . $file;
>>>>>>> upstream/master
				}
				else
				{
					// Outputs only path to image.
					$paths[$path] = $folder . $file;
				}
			}
			$src = $paths[$path];
		}

<<<<<<< HEAD
		if (substr($src, 0, 1) == "/") {
=======
		if (substr($src, 0, 1) == "/")
		{
>>>>>>> upstream/master
			$src = substr_replace($src, '', 0, 1);
		}

		// Prepend the base path.
<<<<<<< HEAD
		$src = JURI::base(true).'/'.$src;

		// Outputs actual HTML <img> tag.
		if ($asTag) {
			return '<img src="'. $src .'" alt="'. html_entity_decode($alt, ENT_COMPAT, 'UTF-8') .'" '.$attribs.' />';
=======
		$src = JURI::base(true) . '/' . $src;

		// Outputs actual HTML <img> tag.
		if ($asTag)
		{
			return '<img src="' . $src . '" alt="' . $alt . '" ' . $attribs . ' />';
>>>>>>> upstream/master
		}

		return $src;
	}

	/**
	 * Checks to see if an image exists in the current templates image directory
	 * if it does it loads this image.  Otherwise the default image is loaded.
	 * Also can be used in conjunction with the menulist param to create the chosen image
	 * load the default or use no image
	 *
<<<<<<< HEAD
	 * @param   string   $file		The file name, eg foobar.png.
	 * @param   string   $folder		The path to the image.
	 * @param   integer  $altFile	Empty: use $file and $folder, -1: show no image, not-empty: use $altFile and $altFolder.
	 * @param   string   $altFolder	Another path.  Only used for the contact us form based on the value of the imagelist param.
	 * @param   string   $alt		Alternative text.
	 * @param   array    $attribs	An associative array of attributes to add.
	 * @param   bool	$asTag		True (default) to display full tag, false to return just the path.
	 * @deprecated since 1.6
	 */
	public static function administrator($file, $folder = '/images/', $altFile = null, $altFolder = '/images/', $alt = null, $attribs = null, $asTag = true)
	{
		$app = JFactory::getApplication();

		if (is_array($attribs)) {
=======
	 * @param   string   $file       The file name, eg foobar.png.
	 * @param   string   $folder     The path to the image.
	 * @param   integer  $altFile    Empty: use $file and $folder, -1: show no image, not-empty: use $altFile and $altFolder.
	 * @param   string   $altFolder  Another path.  Only used for the contact us form based on the value of the imagelist param.
	 * @param   string   $alt        Alternative text.
	 * @param   array    $attribs    An associative array of attributes to add.
	 * @param   boolean  $asTag      True (default) to display full tag, false to return just the path.
	 *
	 * @return  string   The src or the full img tag if $asTag is true.
	 *
	 * @since   11.1
	 *
	 * @deprecated  12.1
	 */
	public static function administrator($file, $folder = '/images/', $altFile = null, $altFolder = '/images/', $alt = null, $attribs = null,
		$asTag = true)
	{
		// Deprecation warning.
		JLog::add('JImage::administrator is deprecated.', JLog::WARNING, 'deprecated');

		$app = JFactory::getApplication();

		if (is_array($attribs))
		{
>>>>>>> upstream/master
			$attribs = JArrayHelper::toString($attribs);
		}

		$cur_template = $app->getTemplate();

		// Strip HTML.
		$alt = html_entity_decode($alt, ENT_COMPAT, 'UTF-8');

<<<<<<< HEAD
		if ($altFile) {
			$image = $altFolder . $altFile;
		}
		else if ($altFile == -1) {
=======
		if ($altFile)
		{
			$image = $altFolder . $altFile;
		}
		else if ($altFile == -1)
		{
>>>>>>> upstream/master
			$image = '';
		}
		else
		{
<<<<<<< HEAD
			if (file_exists(JPATH_ADMINISTRATOR .'/templates/'. $cur_template .'/images/'. $file)) {
				$image = 'templates/'. $cur_template .'/images/'. $file;
=======
			if (file_exists(JPATH_ADMINISTRATOR . '/templates/' . $cur_template . '/images/' . $file))
			{
				$image = 'templates/' . $cur_template . '/images/' . $file;
>>>>>>> upstream/master
			}
			else
			{
				// Compability with previous versions.
<<<<<<< HEAD
				if (substr($folder, 0, 14) == "/administrator") {
					$image = substr($folder, 15) . $file;
				} else {
=======
				if (substr($folder, 0, 14) == "/administrator")
				{
					$image = substr($folder, 15) . $file;
				}
				else
				{
>>>>>>> upstream/master
					$image = $folder . $file;
				}
			}
		}

<<<<<<< HEAD
		if (substr($image, 0, 1) == "/") {
=======
		if (substr($image, 0, 1) == "/")
		{
>>>>>>> upstream/master
			$image = substr_replace($image, '', 0, 1);
		}

		// Prepend the base path.
<<<<<<< HEAD
		$image = JURI::base(true).'/'.$image;

		// Outputs actual HTML <img> tag.
		if ($asTag) {
			$image = '<img src="'. $image .'" alt="'. $alt .'" '.$attribs.' />';
=======
		$image = JURI::base(true) . '/' . $image;

		// Outputs actual HTML <img> tag.
		if ($asTag)
		{
			$image = '<img src="' . $image . '" alt="' . $alt . '" ' . $attribs . ' />';
>>>>>>> upstream/master
		}

		return $image;
	}
<<<<<<< HEAD
}
=======
}
>>>>>>> upstream/master
