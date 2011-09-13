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
 * Provides a list of content languages
 *
 * @package     Joomla.Platform
 * @subpackage  Form
 * @see         JFormFieldLanguage for a select list of application languages.
>>>>>>> upstream/master
 * @since       11.1
 */
class JFormFieldContentLanguage extends JFormFieldList
{
	/**
	 * The form field type.
	 *
	 * @var    string
	 * @since  11.1
	 */
	public $type = 'ContentLanguage';

	/**
<<<<<<< HEAD
	 * Method to get the field options.
	 *
	 * @return  array  The field option objects.
=======
	 * Method to get the field options for content languages.
	 *
	 * @return  array  The field option objects.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function getOptions()
	{
		// Merge any additional options in the XML definition.
		return array_merge(parent::getOptions(), JHtml::_('contentlanguage.existing'));
	}
}
