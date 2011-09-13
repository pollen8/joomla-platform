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

/**
 * Abstract Form Field class for the Joomla Framework.
=======
defined('JPATH_PLATFORM') or die();

/**
 * Abstract Form Field class for the Joomla Platform.
>>>>>>> upstream/master
 *
 * @package     Joomla.Platform
 * @subpackage  Form
 * @since       11.1
 */
abstract class JFormField
{
	/**
	 * The description text for the form field.  Usually used in tooltips.
	 *
	 * @var    string
	 * @since  11.1
	 */
	protected $description;

	/**
	 * The JXMLElement object of the <field /> XML element that describes the form field.
	 *
	 * @var    object
	 * @since  11.1
	 */
	protected $element;

	/**
	 * The JForm object of the form attached to the form field.
	 *
	 * @var    object
	 * @since  11.1
	 */
	protected $form;

	/**
	 * The form control prefix for field names from the JForm object attached to the form field.
	 *
	 * @var    string
	 * @since  11.1
	 */
	protected $formControl;

	/**
	 * The hidden state for the form field.
	 *
	 * @var    boolean
	 * @since  11.1
	 */
	protected $hidden = false;

	/**
	 * True to translate the field label string.
	 *
	 * @var    boolean
	 * @since  11.1
	 */
	protected $translateLabel = true;

	/**
	 * True to translate the field description string.
	 *
	 * @var    boolean
	 * @since  11.1
	 */
	protected $translateDescription = true;

	/**
	 * The document id for the form field.
	 *
	 * @var    string
	 * @since  11.1
	 */
	protected $id;

	/**
	 * The input for the form field.
	 *
	 * @var    string
	 * @since  11.1
	 */
	protected $input;

	/**
	 * The label for the form field.
	 *
	 * @var    string
	 * @since  11.1
	 */
	protected $label;

	/**
	 * The multiple state for the form field.  If true then multiple values are allowed for the
	 * field.  Most often used for list field types.
	 *
	 * @var    boolean
	 * @since  11.1
	 */
	protected $multiple = false;

	/**
	 * The name of the form field.
	 *
	 * @var    string
	 * @since  11.1
	 */
	protected $name;

	/**
	 * The name of the field.
	 *
	 * @var    string
	 * @since  11.1
	 */
	protected $fieldname;

	/**
	 * The group of the field.
	 *
	 * @var    string
	 * @since  11.1
	 */
	protected $group;

	/**
	 * The required state for the form field.  If true then there must be a value for the field to
	 * be considered valid.
	 *
	 * @var    boolean
	 * @since  11.1
	 */
	protected $required = false;

	/**
	 * The form field type.
	 *
	 * @var    string
	 * @since  11.1
	 */
	protected $type;

	/**
	 * The validation method for the form field.  This value will determine which method is used
	 * to validate the value for a field.
	 *
	 * @var    string
	 * @since  11.1
	 */
	protected $validate;

	/**
	 * The value of the form field.
	 *
	 * @var    mixed
	 * @since  11.1
	 */
	protected $value;

	/**
	 * The count value for generated name field
	 *
<<<<<<< HEAD
	 * @var    int
	 * @since  11.1
	 */
	static protected $count = 0;
=======
	 * @var    integer
	 * @since  11.1
	 */
	protected static $count = 0;
>>>>>>> upstream/master

	/**
	 * The string used for generated fields names
	 *
<<<<<<< HEAD
	 * @var    int
	 * @since  11.1
	 */
	static protected $generated_fieldname = '__field';
=======
	 * @var    integer
	 * @since  11.1
	 */
	protected static $generated_fieldname = '__field';
>>>>>>> upstream/master

	/**
	 * Method to instantiate the form field object.
	 *
	 * @param   object  $form  The form to attach to the form field object.
	 *
	 * @return  JFormField
	 *
	 * @since   11.1
	 */
	public function __construct($form = null)
	{
		// If there is a form passed into the constructor set the form and form control properties.
<<<<<<< HEAD
		if ($form instanceof JForm) {
=======
		if ($form instanceof JForm)
		{
>>>>>>> upstream/master
			$this->form = $form;
			$this->formControl = $form->getFormControl();
		}
	}

	/**
	 * Method to get certain otherwise inaccessible properties from the form field object.
	 *
	 * @param   string  $name  The property name for which to the the value.
	 *
	 * @return  mixed  The property value or null.
	 *
	 * @since   11.1
	 */
	public function __get($name)
	{
<<<<<<< HEAD
		switch ($name) {
=======
		switch ($name)
		{
>>>>>>> upstream/master
			case 'class':
			case 'description':
			case 'formControl':
			case 'hidden':
			case 'id':
			case 'multiple':
			case 'name':
			case 'required':
			case 'type':
			case 'validate':
			case 'value':
			case 'fieldname':
			case 'group':
				return $this->$name;
				break;

			case 'input':
<<<<<<< HEAD
				// If the input hasn't yet been generated, generate it.
				if (empty($this->input)) {
=======
			// If the input hasn't yet been generated, generate it.
				if (empty($this->input))
				{
>>>>>>> upstream/master
					$this->input = $this->getInput();
				}

				return $this->input;
				break;

			case 'label':
<<<<<<< HEAD
				// If the label hasn't yet been generated, generate it.
				if (empty($this->label)) {
=======
			// If the label hasn't yet been generated, generate it.
				if (empty($this->label))
				{
>>>>>>> upstream/master
					$this->label = $this->getLabel();
				}

				return $this->label;
				break;
			case 'title':
				return $this->getTitle();
				break;
		}

		return null;
<<<<<<< HEAD
    }
=======
	}
>>>>>>> upstream/master

	/**
	 * Method to attach a JForm object to the field.
	 *
	 * @param   object  $form  The JForm object to attach to the form field.
	 *
	 * @return  object  The form field object so that the method can be used in a chain.
	 *
	 * @since   11.1
	 */
	public function setForm(JForm $form)
	{
		$this->form = $form;
		$this->formControl = $form->getFormControl();

		return $this;
	}

	/**
	 * Method to attach a JForm object to the field.
	 *
<<<<<<< HEAD
	 * @param   object  $element  The JXMLElement object representing the <field /> tag for the
	 *                            form field object.
	 * @param   mixed   $value    The form field default value for display.
	 * @param   string  $group    The field name group control value. This acts as as an array
	 *                            container for the field. For example if the field has name="foo"
	 *                            and the group value is set to "bar" then the full field name
	 *                            would end up being "bar[foo]".
=======
	 * @param   object  &$element  The JXmlElement object representing the <field /> tag for the form field object.
	 * @param   mixed   $value     The form field value to validate.
	 * @param   string  $group     The field name group control value. This acts as as an array container for the field.
	 *                             For example if the field has name="foo" and the group value is set to "bar" then the
	 *                             full field name would end up being "bar[foo]".
>>>>>>> upstream/master
	 *
	 * @return  boolean  True on success.
	 *
	 * @since   11.1
	 */
<<<<<<< HEAD
	public function setup(& $element, $value, $group = null)
	{
		// Make sure there is a valid JFormField XML element.
		if (!($element instanceof JXMLElement) || (string) $element->getName() != 'field') {
=======
	public function setup(&$element, $value, $group = null)
	{
		// Make sure there is a valid JFormField XML element.
		if (!($element instanceof JXMLElement) || (string) $element->getName() != 'field')
		{
>>>>>>> upstream/master
			return false;
		}

		// Reset the input and label values.
		$this->input = null;
		$this->label = null;

		// Set the XML element object.
		$this->element = $element;

		// Get some important attributes from the form field element.
<<<<<<< HEAD
		$class		= (string) $element['class'];
		$id			= (string) $element['id'];
		$multiple	= (string) $element['multiple'];
		$name		= (string) $element['name'];
		$required	= (string) $element['required'];

		// Set the required and validation options.
		$this->required	= ($required == 'true' || $required == 'required' || $required == '1');
		$this->validate	= (string) $element['validate'];

		// Add the required class if the field is required.
		if ($this->required) {
			if ($class) {
				if (strpos($class, 'required') === false) {
					$this->element['class'] = $class.' required';
				}
			} else {
=======
		$class = (string) $element['class'];
		$id = (string) $element['id'];
		$multiple = (string) $element['multiple'];
		$name = (string) $element['name'];
		$required = (string) $element['required'];

		// Set the required and validation options.
		$this->required = ($required == 'true' || $required == 'required' || $required == '1');
		$this->validate = (string) $element['validate'];

		// Add the required class if the field is required.
		if ($this->required)
		{
			if ($class)
			{
				if (strpos($class, 'required') === false)
				{
					$this->element['class'] = $class . ' required';
				}
			}
			else
			{
>>>>>>> upstream/master
				$this->element->addAttribute('class', 'required');
			}
		}

		// Set the multiple values option.
		$this->multiple = ($multiple == 'true' || $multiple == 'multiple');

		// Allow for field classes to force the multiple values option.
<<<<<<< HEAD
		if (isset($this->forceMultiple)) {
=======
		if (isset($this->forceMultiple))
		{
>>>>>>> upstream/master
			$this->multiple = (bool) $this->forceMultiple;
		}

		// Set the field description text.
<<<<<<< HEAD
		$this->description	= (string) $element['description'];
=======
		$this->description = (string) $element['description'];
>>>>>>> upstream/master

		// Set the visibility.
		$this->hidden = ((string) $element['type'] == 'hidden' || (string) $element['hidden'] == 'true');

		// Determine whether to translate the field label and/or description.
		$this->translateLabel = !((string) $this->element['translate_label'] == 'false' || (string) $this->element['translate_label'] == '0');
<<<<<<< HEAD
		$this->translateDescription = !((string) $this->element['translate_description'] == 'false' || (string) $this->element['translate_description'] == '0');
=======
		$this->translateDescription = !((string) $this->element['translate_description'] == 'false'
			|| (string) $this->element['translate_description'] == '0');
>>>>>>> upstream/master

		// Set the group of the field.
		$this->group = $group;

		// Set the field name and id.
<<<<<<< HEAD
		$this->fieldname 	= $this->getFieldName($name);
		$this->name			= $this->getName($this->fieldname);
		$this->id			= $this->getId($id, $this->fieldname);
=======
		$this->fieldname = $this->getFieldName($name);
		$this->name = $this->getName($this->fieldname);
		$this->id = $this->getId($id, $this->fieldname);
>>>>>>> upstream/master

		// Set the field default value.
		$this->value = $value;

		return true;
	}

	/**
	 * Method to get the id used for the field input tag.
	 *
	 * @param   string  $fieldId    The field element id.
	 * @param   string  $fieldName  The field element name.
	 *
	 * @return  string  The id to be used for the field input tag.
	 *
	 * @since   11.1
	 */
	protected function getId($fieldId, $fieldName)
	{
		// Initialise variables.
		$id = '';

		// If there is a form control set for the attached form add it first.
<<<<<<< HEAD
		if ($this->formControl) {
=======
		if ($this->formControl)
		{
>>>>>>> upstream/master
			$id .= $this->formControl;
		}

		// If the field is in a group add the group control to the field id.
<<<<<<< HEAD
		if ($this->group) {
			// If we already have an id segment add the group control as another level.
			if ($id) {
				$id .= '_'.str_replace('.', '_', $this->group);
			}
			else {
=======
		if ($this->group)
		{
			// If we already have an id segment add the group control as another level.
			if ($id)
			{
				$id .= '_' . str_replace('.', '_', $this->group);
			}
			else
			{
>>>>>>> upstream/master
				$id .= str_replace('.', '_', $this->group);
			}
		}

		// If we already have an id segment add the field id/name as another level.
<<<<<<< HEAD
		if ($id) {
			$id .= '_'.($fieldId ? $fieldId : $fieldName);
		}
		else {
=======
		if ($id)
		{
			$id .= '_' . ($fieldId ? $fieldId : $fieldName);
		}
		else
		{
>>>>>>> upstream/master
			$id .= ($fieldId ? $fieldId : $fieldName);
		}

		// Clean up any invalid characters.
		$id = preg_replace('#\W#', '_', $id);

		return $id;
	}

	/**
	 * Method to get the field input markup.
	 *
	 * @return  string  The field input markup.
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	abstract protected function getInput();

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
		// Initialise variables.
		$title = '';

<<<<<<< HEAD
		if ($this->hidden) {
=======
		if ($this->hidden)
		{
>>>>>>> upstream/master

			return $title;
		}

		// Get the label text from the XML element, defaulting to the element name.
		$title = $this->element['label'] ? (string) $this->element['label'] : (string) $this->element['name'];
		$title = $this->translateLabel ? JText::_($title) : $title;

		return $title;
	}

	/**
	 * Method to get the field label markup.
	 *
	 * @return  string  The field label markup.
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function getLabel()
	{
		// Initialise variables.
		$label = '';

<<<<<<< HEAD
		if ($this->hidden) {
=======
		if ($this->hidden)
		{
>>>>>>> upstream/master
			return $label;
		}

		// Get the label text from the XML element, defaulting to the element name.
		$text = $this->element['label'] ? (string) $this->element['label'] : (string) $this->element['name'];
		$text = $this->translateLabel ? JText::_($text) : $text;

		// Build the class for the label.
		$class = !empty($this->description) ? 'hasTip' : '';
<<<<<<< HEAD
		$class = $this->required == true ? $class.' required' : $class;

		// Add the opening label tag and main attributes attributes.
		$label .= '<label id="'.$this->id.'-lbl" for="'.$this->id.'" class="'.$class.'"';

		// If a description is specified, use it to build a tooltip.
		if (!empty($this->description)) {
			$label .= ' title="'.htmlspecialchars(trim($text, ':').'::' .
						($this->translateDescription ? JText::_($this->description) : $this->description), ENT_COMPAT, 'UTF-8').'"';
		}

		// Add the label text and closing tag.
		if ($this->required) {
			$label .= '>'.$text.'<span class="star">&#160;*</span></label>';
		} else {
			$label .= '>'.$text.'</label>';
=======
		$class = $this->required == true ? $class . ' required' : $class;

		// Add the opening label tag and main attributes attributes.
		$label .= '<label id="' . $this->id . '-lbl" for="' . $this->id . '" class="' . $class . '"';

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
		if ($this->required)
		{
			$label .= '>' . $text . '<span class="star">&#160;*</span></label>';
		}
		else
		{
			$label .= '>' . $text . '</label>';
>>>>>>> upstream/master
		}

		return $label;
	}

	/**
	 * Method to get the name used for the field input tag.
	 *
	 * @param   string  $fieldName  The field element name.
	 *
	 * @return  string  The name to be used for the field input tag.
	 *
	 * @since   11.1
	 */
	protected function getName($fieldName)
	{
		// Initialise variables.
		$name = '';

		// If there is a form control set for the attached form add it first.
<<<<<<< HEAD
		if ($this->formControl) {
=======
		if ($this->formControl)
		{
>>>>>>> upstream/master
			$name .= $this->formControl;
		}

		// If the field is in a group add the group control to the field name.
<<<<<<< HEAD
		if ($this->group) {
			// If we already have a name segment add the group control as another level.
			$groups = explode('.', $this->group);
			if ($name) {
				foreach ($groups as $group) {
					$name .= '['.$group.']';
				}
			}
			else {
				$name .= array_shift($groups);
				foreach ($groups as $group) {
					$name .= '['.$group.']';
=======
		if ($this->group)
		{
			// If we already have a name segment add the group control as another level.
			$groups = explode('.', $this->group);
			if ($name)
			{
				foreach ($groups as $group)
				{
					$name .= '[' . $group . ']';
				}
			}
			else
			{
				$name .= array_shift($groups);
				foreach ($groups as $group)
				{
					$name .= '[' . $group . ']';
>>>>>>> upstream/master
				}
			}
		}

		// If we already have a name segment add the field name as another level.
<<<<<<< HEAD
		if ($name) {
			$name .= '['.$fieldName.']';
		}
		else {
=======
		if ($name)
		{
			$name .= '[' . $fieldName . ']';
		}
		else
		{
>>>>>>> upstream/master
			$name .= $fieldName;
		}

		// If the field should support multiple values add the final array segment.
<<<<<<< HEAD
		if ($this->multiple) {
=======
		if ($this->multiple)
		{
>>>>>>> upstream/master
			$name .= '[]';
		}

		return $name;
	}
<<<<<<< HEAD
	/**
	 * Method to get the field name used.
	 *
	 * @param   string  $name  The field element name.
=======

	/**
	 * Method to get the field name used.
	 *
	 * @param   string  $fieldName  The field element name.
>>>>>>> upstream/master
	 *
	 * @return  string  The field name
	 *
	 * @since   11.1
	 */
	protected function getFieldName($fieldName)
	{
<<<<<<< HEAD
		if ($fieldName) {
			return $fieldName;
		}
		else {
=======
		if ($fieldName)
		{
			return $fieldName;
		}
		else
		{
>>>>>>> upstream/master
			self::$count = self::$count + 1;
			return self::$generated_fieldname . self::$count;
		}
	}
}
