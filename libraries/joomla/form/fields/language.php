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

jimport('joomla.html.html');
jimport('joomla.language.helper');
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
 * Supports a list of installed application languages
 *
 * @package     Joomla.Platform
 * @subpackage  Form
 * @see         JFormFieldContentLanguage for a select list of content languages.
>>>>>>> upstream/master
 * @since       11.1
 */
class JFormFieldLanguage extends JFormFieldList
{
	/**
	 * The form field type.
	 *
	 * @var    string
	 * @since  11.1
	 */
	protected $type = 'Language';

	/**
	 * Method to get the field options.
	 *
	 * @return  array  The field option objects.
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function getOptions()
	{
		// Initialize some field attributes.
<<<<<<< HEAD
		$client	= (string) $this->element['client'];
		if ($client != 'site' && $client != 'administrator') {
=======
		$client = (string) $this->element['client'];
		if ($client != 'site' && $client != 'administrator')
		{
>>>>>>> upstream/master
			$client = 'site';
		}

		// Merge any additional options in the XML definition.
		$options = array_merge(
			parent::getOptions(),
<<<<<<< HEAD
			JLanguageHelper::createLanguageList($this->value, constant('JPATH_'.strtoupper($client)), true, true)
=======
			JLanguageHelper::createLanguageList($this->value, constant('JPATH_' . strtoupper($client)), true, true)
>>>>>>> upstream/master
		);

		return $options;
	}
}
