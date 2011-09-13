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
 * Provides a list of access levels. Access levels control what users in specific
 * groups can see.
 *
 * @package     Joomla.Platform
 * @subpackage  Form
 * @see         JAccess
>>>>>>> upstream/master
 * @since       11.1
 */
class JFormFieldAccessLevel extends JFormFieldList
{
	/**
	 * The form field type.
	 *
	 * @var    string
	 * @since  11.1
	 */
	public $type = 'AccessLevel';

	/**
	 * Method to get the field input markup.
	 *
	 * @return  string   The field input markup.
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function getInput()
	{
		// Initialize variables.
		$attr = '';

		// Initialize some field attributes.
<<<<<<< HEAD
		$attr .= $this->element['class'] ? ' class="'.(string) $this->element['class'].'"' : '';
		$attr .= ((string) $this->element['disabled'] == 'true') ? ' disabled="disabled"' : '';
		$attr .= $this->element['size'] ? ' size="'.(int) $this->element['size'].'"' : '';
		$attr .= $this->multiple ? ' multiple="multiple"' : '';

		// Initialize JavaScript field attributes.
		$attr .= $this->element['onchange'] ? ' onchange="'.(string) $this->element['onchange'].'"' : '';
=======
		$attr .= $this->element['class'] ? ' class="' . (string) $this->element['class'] . '"' : '';
		$attr .= ((string) $this->element['disabled'] == 'true') ? ' disabled="disabled"' : '';
		$attr .= $this->element['size'] ? ' size="' . (int) $this->element['size'] . '"' : '';
		$attr .= $this->multiple ? ' multiple="multiple"' : '';

		// Initialize JavaScript field attributes.
		$attr .= $this->element['onchange'] ? ' onchange="' . (string) $this->element['onchange'] . '"' : '';
>>>>>>> upstream/master

		// Get the field options.
		$options = $this->getOptions();

		return JHtml::_('access.level', $this->name, $this->value, $attr, $options, $this->id);
	}
}
