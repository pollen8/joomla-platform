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

/**
<<<<<<< HEAD
 * Form Field class for the Joomla Framework.
=======
 * Form Field class for the Joomla Platform.
 * Provides a grouped list select field.
>>>>>>> upstream/master
 *
 * @package     Joomla.Platform
 * @subpackage  Form
 * @since       11.1
 */
class JFormFieldGroupedList extends JFormField
{
	/**
	 * The form field type.
	 *
	 * @var    string
	 * @since  11.1
	 */
	protected $type = 'GroupedList';

	/**
	 * Method to get the field option groups.
	 *
	 * @return  array  The field option objects as a nested array in groups.
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function getGroups()
	{
		// Initialize variables.
		$groups = array();
		$label = 0;

		foreach ($this->element->children() as $element)
		{
			switch ($element->getName())
			{
				// The element is an <option />
				case 'option':
<<<<<<< HEAD

					// Initialize the group if necessary.
					if (!isset($groups[$label])) {
=======
				// Initialize the group if necessary.
					if (!isset($groups[$label]))
					{
>>>>>>> upstream/master
						$groups[$label] = array();
					}

					// Create a new option object based on the <option /> element.
<<<<<<< HEAD
					$tmp = JHtml::_('select.option',
						($element['value']) ? (string) $element['value'] : trim((string) $element),
						JText::alt(trim((string) $element), preg_replace('/[^a-zA-Z0-9_\-]/', '_', $this->fieldname)), 'value', 'text',
						((string) $element['disabled']=='true'));
=======
					$tmp = JHtml::_(
						'select.option', ($element['value']) ? (string) $element['value'] : trim((string) $element),
						JText::alt(trim((string) $element), preg_replace('/[^a-zA-Z0-9_\-]/', '_', $this->fieldname)), 'value', 'text',
						((string) $element['disabled'] == 'true')
					);
>>>>>>> upstream/master

					// Set some option attributes.
					$tmp->class = (string) $element['class'];

					// Set some JavaScript option attributes.
					$tmp->onclick = (string) $element['onclick'];

					// Add the option.
					$groups[$label][] = $tmp;
					break;

				// The element is a <group />
				case 'group':
<<<<<<< HEAD

					// Get the group label.
					if ($groupLabel = (string) $element['label']) {
=======
				// Get the group label.
					if ($groupLabel = (string) $element['label'])
					{
>>>>>>> upstream/master
						$label = JText::_($groupLabel);
					}

					// Initialize the group if necessary.
<<<<<<< HEAD
					if (!isset($groups[$label])) {
=======
					if (!isset($groups[$label]))
					{
>>>>>>> upstream/master
						$groups[$label] = array();
					}

					// Iterate through the children and build an array of options.
					foreach ($element->children() as $option)
					{
						// Only add <option /> elements.
<<<<<<< HEAD
						if ($option->getName() != 'option') {
=======
						if ($option->getName() != 'option')
						{
>>>>>>> upstream/master
							continue;
						}

						// Create a new option object based on the <option /> element.
<<<<<<< HEAD
						$tmp = JHtml::_('select.option',
							($option['value']) ? (string) $option['value'] : JText::_(trim((string) $option)),
							JText::_(trim((string) $option)), 'value', 'text',
							((string) $option['disabled']=='true'));
=======
						$tmp = JHtml::_(
							'select.option', ($option['value']) ? (string) $option['value'] : JText::_(trim((string) $option)),
							JText::_(trim((string) $option)), 'value', 'text', ((string) $option['disabled'] == 'true')
						);
>>>>>>> upstream/master

						// Set some option attributes.
						$tmp->class = (string) $option['class'];

						// Set some JavaScript option attributes.
						$tmp->onclick = (string) $option['onclick'];

						// Add the option.
						$groups[$label][] = $tmp;
					}

<<<<<<< HEAD
					if ($groupLabel) {
=======
					if ($groupLabel)
					{
>>>>>>> upstream/master
						$label = count($groups);
					}
					break;

				// Unknown element type.
				default:
					JError::raiseError(500, JText::sprintf('JLIB_FORM_ERROR_FIELDS_GROUPEDLIST_ELEMENT_NAME', $element->getName()));
					break;
			}
		}

		reset($groups);

		return $groups;
	}

	/**
<<<<<<< HEAD
	 * Method to get the field input markup.
	 *
	 * @return  string  The field input markup.
=======
	 * Method to get the field input markup fora grouped list.
	 * Multiselect is enabled by using the multiple attribute.
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

		// Get the field groups.
		$groups = (array) $this->getGroups();

		// Create a read-only list (no name) with a hidden input to store the value.
<<<<<<< HEAD
		if ((string) $this->element['readonly'] == 'true') {
			$html[] = JHtml::_('select.groupedlist', $groups, null, array('list.attr' => $attr, 'id' => $this->id, 'list.select' => $this->value, 'group.items' => null, 'option.key.toHtml' => false, 'option.text.toHtml' => false));
			$html[] = '<input type="hidden" name="'.$this->name.'" value="'.$this->value.'"/>';
		}
		// Create a regular list.
		else {
			$html[] = JHtml::_('select.groupedlist', $groups, $this->name, array('list.attr' => $attr, 'id' => $this->id, 'list.select' => $this->value, 'group.items' => null, 'option.key.toHtml' => false, 'option.text.toHtml' => false));
=======
		if ((string) $this->element['readonly'] == 'true')
		{
			$html[] = JHtml::_(
				'select.groupedlist', $groups, null,
				array(
					'list.attr' => $attr, 'id' => $this->id, 'list.select' => $this->value, 'group.items' => null, 'option.key.toHtml' => false,
					'option.text.toHtml' => false
				)
			);
			$html[] = '<input type="hidden" name="' . $this->name . '" value="' . $this->value . '"/>';
		}
		// Create a regular list.
		else
		{
			$html[] = JHtml::_(
				'select.groupedlist', $groups, $this->name,
				array(
					'list.attr' => $attr, 'id' => $this->id, 'list.select' => $this->value, 'group.items' => null, 'option.key.toHtml' => false,
					'option.text.toHtml' => false
				)
			);
>>>>>>> upstream/master
		}

		return implode($html);
	}
}
