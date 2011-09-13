<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Form
 *
 * @copyright   Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

<<<<<<< HEAD
defined('JPATH_PLATFORM') or die;
=======
defined('JPATH_PLATFORM') or die();
>>>>>>> upstream/master

jimport('joomla.cache.cache');
jimport('joomla.html.html');
jimport('joomla.form.formfield');
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');

/**
<<<<<<< HEAD
 * Form Field class for the Joomla Framework.
 *
 * @package     Joomla.Platform
 * @subpackage  Form
=======
 * Form Field class for the Joomla Platform.
 * Provides a list of available cache handlers
 *
 * @package     Joomla.Platform
 * @subpackage  Form
 * @see         JCache
>>>>>>> upstream/master
 * @since       11.1
 */
class JFormFieldCacheHandler extends JFormFieldList
{
	/**
	 * The form field type.
	 *
	 * @var    string
	 * @since  11.1
	 */
	public $type = 'CacheHandler';

	/**
	 * Method to get the field options.
	 *
	 * @return  array    The field option objects.
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function getOptions()
	{
		// Initialize variables.
		$options = array();

		// Convert to name => name array.
<<<<<<< HEAD
		foreach (JCache::getStores() as $store) {
			$options[] = JHtml::_('select.option', $store, JText::_('JLIB_FORM_VALUE_CACHE_'.$store), 'value', 'text');
=======
		foreach (JCache::getStores() as $store)
		{
			$options[] = JHtml::_('select.option', $store, JText::_('JLIB_FORM_VALUE_CACHE_' . $store), 'value', 'text');
>>>>>>> upstream/master
		}

		$options = array_merge(parent::getOptions(), $options);

		return $options;
	}
<<<<<<< HEAD
}
=======
}
>>>>>>> upstream/master
