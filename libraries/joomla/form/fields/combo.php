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
=======
 * Form Field class for the Joomla Platform.
 * Implements a combo box field.
>>>>>>> upstream/master
 *
 * @package     Joomla.Platform
 * @subpackage  Form
 * @since       11.1
 */
class JFormFieldCombo extends JFormFieldList
{
	/**
	 * The form field type.
	 *
	 * @var    string
	 * @since  11.1
	 */
	public $type = 'Combo';

	/**
<<<<<<< HEAD
	 * Method to get the field input markup.
	 *
	 * @return  string   The field input markup.
=======
	 * Method to get the field input markup for a combo box field.
	 *
	 * @return  string   The field input markup.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function getInput()
	{
		// Initialize variables.
		$html = array();
		$attr = '';

		// Initialize some field attributes.
<<<<<<< HEAD
		$attr .= $this->element['class'] ? ' class="combobox '.(string) $this->element['class'].'"' : ' class="combobox"';
		$attr .= ((string) $this->element['readonly'] == 'true') ? ' readonly="readonly"' : '';
		$attr .= ((string) $this->element['disabled'] == 'true') ? ' disabled="disabled"' : '';
		$attr .= $this->element['size'] ? ' size="'.(int) $this->element['size'].'"' : '';

		// Initialize JavaScript field attributes.
		$attr .= $this->element['onchange'] ? ' onchange="'.(string) $this->element['onchange'].'"' : '';
=======
		$attr .= $this->element['class'] ? ' class="combobox ' . (string) $this->element['class'] . '"' : ' class="combobox"';
		$attr .= ((string) $this->element['readonly'] == 'true') ? ' readonly="readonly"' : '';
		$attr .= ((string) $this->element['disabled'] == 'true') ? ' disabled="disabled"' : '';
		$attr .= $this->element['size'] ? ' size="' . (int) $this->element['size'] . '"' : '';

		// Initialize JavaScript field attributes.
		$attr .= $this->element['onchange'] ? ' onchange="' . (string) $this->element['onchange'] . '"' : '';
>>>>>>> upstream/master

		// Get the field options.
		$options = $this->getOptions();

		// Load the combobox behavior.
		JHtml::_('behavior.combobox');

		// Build the input for the combo box.
<<<<<<< HEAD
		$html[] = '<input type="text" name="'.$this->name.'" id="'.$this->id.'"' .
				' value="'.htmlspecialchars($this->value, ENT_COMPAT, 'UTF-8').'"'.$attr.'/>';

		// Build the list for the combo box.
		$html[] = '<ul id="combobox-'.$this->id.'" style="display:none;">';
		foreach ($options as $option) {
			$html[] = '<li>'.$option->text.'</li>';
=======
		$html[] = '<input type="text" name="' . $this->name . '" id="' . $this->id . '"' . ' value="'
			. htmlspecialchars($this->value, ENT_COMPAT, 'UTF-8') . '"' . $attr . '/>';

		// Build the list for the combo box.
		$html[] = '<ul id="combobox-' . $this->id . '" style="display:none;">';
		foreach ($options as $option)
		{
			$html[] = '<li>' . $option->text . '</li>';
>>>>>>> upstream/master
		}
		$html[] = '</ul>';

		return implode($html);
	}
}
