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

/**
 * Field to select a user id from a modal list.
 *
 * @package     Joomla.Platform
<<<<<<< HEAD
 * @subpackage  com_users
=======
 * @subpackage  Form
>>>>>>> upstream/master
 * @since       11.1
 */
class JFormFieldUser extends JFormField
{
	/**
	 * The form field type.
	 *
	 * @var    string
	 * @since  11.1
	 */
	public $type = 'User';

	/**
<<<<<<< HEAD
	 * Method to get the field input markup.
	 *
	 * @return  string  The field input markup.
=======
	 * Method to get the user field input markup.
	 *
	 * @return  string  The field input markup.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function getInput()
	{
		// Initialize variables.
		$html = array();
		$groups = $this->getGroups();
		$excluded = $this->getExcluded();
<<<<<<< HEAD
		$link = 'index.php?option=com_users&amp;view=users&amp;layout=modal&amp;tmpl=component&amp;field='.$this->id.(isset($groups) ? ('&amp;groups='.base64_encode(json_encode($groups))) : '').(isset($excluded) ? ('&amp;excluded='.base64_encode(json_encode($excluded))) : '');

		// Initialize some field attributes.
		$attr = $this->element['class'] ? ' class="'.(string) $this->element['class'].'"' : '';
		$attr .= $this->element['size'] ? ' size="'.(int) $this->element['size'].'"' : '';
=======
		$link = 'index.php?option=com_users&amp;view=users&amp;layout=modal&amp;tmpl=component&amp;field=' . $this->id
			. (isset($groups) ? ('&amp;groups=' . base64_encode(json_encode($groups))) : '')
			. (isset($excluded) ? ('&amp;excluded=' . base64_encode(json_encode($excluded))) : '');

		// Initialize some field attributes.
		$attr = $this->element['class'] ? ' class="' . (string) $this->element['class'] . '"' : '';
		$attr .= $this->element['size'] ? ' size="' . (int) $this->element['size'] . '"' : '';
>>>>>>> upstream/master

		// Initialize JavaScript field attributes.
		$onchange = (string) $this->element['onchange'];

		// Load the modal behavior script.
<<<<<<< HEAD
		JHtml::_('behavior.modal', 'a.modal_'.$this->id);

		// Build the script.
		$script = array();
		$script[] = '	function jSelectUser_'.$this->id.'(id, title) {';
		$script[] = '		var old_id = document.getElementById("'.$this->id.'_id").value;';
		$script[] = '		if (old_id != id) {';
		$script[] = '			document.getElementById("'.$this->id.'_id").value = id;';
		$script[] = '			document.getElementById("'.$this->id.'_name").value = title;';
		$script[] = '			'.$onchange;
=======
		JHtml::_('behavior.modal', 'a.modal_' . $this->id);

		// Build the script.
		$script = array();
		$script[] = '	function jSelectUser_' . $this->id . '(id, title) {';
		$script[] = '		var old_id = document.getElementById("' . $this->id . '_id").value;';
		$script[] = '		if (old_id != id) {';
		$script[] = '			document.getElementById("' . $this->id . '_id").value = id;';
		$script[] = '			document.getElementById("' . $this->id . '_name").value = title;';
		$script[] = '			' . $onchange;
>>>>>>> upstream/master
		$script[] = '		}';
		$script[] = '		SqueezeBox.close();';
		$script[] = '	}';

		// Add the script to the document head.
		JFactory::getDocument()->addScriptDeclaration(implode("\n", $script));

		// Load the current username if available.
		$table = JTable::getInstance('user');
<<<<<<< HEAD
		if ($this->value) {
			$table->load($this->value);
		} else {
=======
		if ($this->value)
		{
			$table->load($this->value);
		}
		else
		{
>>>>>>> upstream/master
			$table->username = JText::_('JLIB_FORM_SELECT_USER');
		}

		// Create a dummy text field with the user name.
		$html[] = '<div class="fltlft">';
<<<<<<< HEAD
		$html[] = '	<input type="text" id="'.$this->id.'_name"' .
					' value="'.htmlspecialchars($table->username, ENT_COMPAT, 'UTF-8').'"' .
					' disabled="disabled"'.$attr.' />';
=======
		$html[] = '	<input type="text" id="' . $this->id . '_name"' . ' value="' . htmlspecialchars($table->username, ENT_COMPAT, 'UTF-8') . '"'
			. ' disabled="disabled"' . $attr . ' />';
>>>>>>> upstream/master
		$html[] = '</div>';

		// Create the user select button.
		$html[] = '<div class="button2-left">';
		$html[] = '  <div class="blank">';
<<<<<<< HEAD
		if ($this->element['readonly'] != 'true') {
			$html[] = '		<a class="modal_'.$this->id.'" title="'.JText::_('JLIB_FORM_CHANGE_USER').'"' .
							' href="'.$link.'"' .
							' rel="{handler: \'iframe\', size: {x: 800, y: 500}}">';
			$html[] = '			'.JText::_('JLIB_FORM_CHANGE_USER').'</a>';
=======
		if ($this->element['readonly'] != 'true')
		{
			$html[] = '		<a class="modal_' . $this->id . '" title="' . JText::_('JLIB_FORM_CHANGE_USER') . '"' . ' href="' . $link . '"'
				. ' rel="{handler: \'iframe\', size: {x: 800, y: 500}}">';
			$html[] = '			' . JText::_('JLIB_FORM_CHANGE_USER') . '</a>';
>>>>>>> upstream/master
		}
		$html[] = '  </div>';
		$html[] = '</div>';

		// Create the real field, hidden, that stored the user id.
<<<<<<< HEAD
		$html[] = '<input type="hidden" id="'.$this->id.'_id" name="'.$this->name.'" value="'.(int) $this->value.'" />';
=======
		$html[] = '<input type="hidden" id="' . $this->id . '_id" name="' . $this->name . '" value="' . (int) $this->value . '" />';
>>>>>>> upstream/master

		return implode("\n", $html);
	}

	/**
	 * Method to get the filtering groups (null means no filtering)
	 *
	 * @return  mixed  array of filtering groups or null.
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function getGroups()
	{
		return null;
	}

	/**
	 * Method to get the users to exclude from the list of users
	 *
<<<<<<< HEAD
	 * @return  mixed  array of users to exclude or null to to not exclude them
=======
	 * @return  mixed  Array of users to exclude or null to to not exclude them
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function getExcluded()
	{
		return null;
	}
}
