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
<<<<<<< HEAD
 * Form Field class for the Joomla Framework.
=======
 * Form Field class for the Joomla Platform.
 * Provides spacer markup to be used in form layouts.
>>>>>>> upstream/master
 *
 * @package     Joomla.Platform
 * @subpackage  Form
 * @since       11.1
 */
class JFormFieldSpacer extends JFormField
{
	/**
	 * The form field type.
	 *
	 * @var    string
	 * @since  11.1
	 */
	protected $type = 'Spacer';

	/**
<<<<<<< HEAD
	 * Method to get the field input markup.
	 *
	 * @return  string  The field input markup.
=======
	 * Method to get the field input markup for a spacer.
	 * The spacer does not have accept input.
	 *
	 * @return  string  The field input markup.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function getInput()
	{
		return ' ';
	}

	/**
<<<<<<< HEAD
	 * Method to get the field label markup.
	 *
	 * @return  string  The field label markup.
=======
	 * Method to get the field label markup for a spacer.
	 * Use the label text or name from the XML element as the spacer or
	 * Use a hr="true" to automatically generate plain hr markup
	 *
	 * @return  string  The field label markup.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function getLabel()
	{
		$html = array();
		$class = $this->element['class'] ? (string) $this->element['class'] : '';

		$html[] = '<span class="spacer">';
		$html[] = '<span class="before"></span>';
<<<<<<< HEAD
		$html[] = '<span class="'.$class.'">';
		if ((string) $this->element['hr'] == 'true') {
			$html[] = '<hr class="'.$class.'" />';
		}
		else {
=======
		$html[] = '<span class="' . $class . '">';
		if ((string) $this->element['hr'] == 'true')
		{
			$html[] = '<hr class="' . $class . '" />';
		}
		else
		{
>>>>>>> upstream/master
			$label = '';
			// Get the label text from the XML element, defaulting to the element name.
			$text = $this->element['label'] ? (string) $this->element['label'] : (string) $this->element['name'];
			$text = $this->translateLabel ? JText::_($text) : $text;

			// Build the class for the label.
			$class = !empty($this->description) ? 'hasTip' : '';
<<<<<<< HEAD
			$class = $this->required == true ? $class.' required' : $class;

			// Add the opening label tag and main attributes attributes.
			$label .= '<label id="'.$this->id.'-lbl" class="'.$class.'"';

			// If a description is specified, use it to build a tooltip.
			if (!empty($this->description)) {
				$label .= ' title="'.htmlspecialchars(trim($text, ':').'::' .
							($this->translateDescription ? JText::_($this->description) : $this->description), ENT_COMPAT, 'UTF-8').'"';
			}

			// Add the label text and closing tag.
			$label .= '>'.$text.'</label>';
=======
			$class = $this->required == true ? $class . ' required' : $class;

			// Add the opening label tag and main attributes attributes.
			$label .= '<label id="' . $this->id . '-lbl" class="' . $class . '"';

			// If a description is specified, use it to build a tooltip.
			if (!empty($this->description))
			{
				$label .= ' title="'
					. htmlspecialchars(
						trim($text, ':') . '::' . ($this->translateDescription ? JText::_($this->description) : $this->description),
						ENT_COMPAT, 'UTF-8'
					) . '"';
			}

			// Add the label text and closing tag.
			$label .= '>' . $text . '</label>';
>>>>>>> upstream/master
			$html[] = $label;
		}
		$html[] = '</span>';
		$html[] = '<span class="after"></span>';
		$html[] = '</span>';
<<<<<<< HEAD
		return implode('',$html);
=======

		return implode('', $html);
>>>>>>> upstream/master
	}

	/**
	 * Method to get the field title.
	 *
	 * @return  string  The field title.
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function getTitle()
	{
		return $this->getLabel();
	}
}
