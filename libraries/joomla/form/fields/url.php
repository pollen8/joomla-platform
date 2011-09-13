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

jimport('joomla.form.formfield');
JFormHelper::loadFieldClass('text');

/**
<<<<<<< HEAD
 * Form Field class for the Joomla Framework.
 *
 * @package     Joomla.Platform
 * @subpackage  Form
=======
 * Form Field class for the Joomla Platform.
 * Supports a URL text field
 *
 * @package     Joomla.Platform
 * @subpackage  Form
 * @link        http://www.w3.org/TR/html-markup/input.url.html#input.url
 * @see         JFormRuleUrl for validation of full urls
>>>>>>> upstream/master
 * @since       11.1
 */
class JFormFieldUrl extends JFormFieldText
{
	/**
	 * The form field type.
	 *
	 * @var    string
	 * @since  11.1
	 */
	protected $type = 'Url';
}
