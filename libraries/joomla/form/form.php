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

jimport('joomla.filesystem.path');
jimport('joomla.form.formfield');
jimport('joomla.registry.registry');
jimport('joomla.form.helper');
jimport('joomla.utilities.arrayhelper');

/**
<<<<<<< HEAD
 * Form Class for the Joomla Framework.
=======
 * Form Class for the Joomla Platform.
>>>>>>> upstream/master
 *
 * This class implements a robust API for constructing, populating, filtering, and validating forms.
 * It uses XML definitions to construct form fields and a variety of field and rule classes to
 * render and validate the form.
 *
 * @package     Joomla.Platform
 * @subpackage  Form
<<<<<<< HEAD
=======
 * @link        http://www.w3.org/TR/html4/interact/forms.html
 * @link        http://www.w3.org/TR/html5/forms.html
>>>>>>> upstream/master
 * @since       11.1
 */
class JForm
{
	/**
<<<<<<< HEAD
	 * @var    object  The JRegistry data store for form fields during display.
=======
	 * The JRegistry data store for form fields during display.
	 * @var    object
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $data;

	/**
<<<<<<< HEAD
	 * @var    array  The form object errors array.
=======
	 * The form object errors array.
	 * @var    array
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $errors = array();

	/**
<<<<<<< HEAD
	 * @var    string  The name of the form instance.
=======
	 * The name of the form instance.
	 * @var    string
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $name;

	/**
<<<<<<< HEAD
	 * @var    array  The form object options for use in rendering and validation.
=======
	 * The form object options for use in rendering and validation.
	 * @var    array
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $options = array();

	/**
<<<<<<< HEAD
	 * @var    object  The form XML definition.
=======
	 * The form XML definition.
	 * @var    object
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $xml;

	/**
<<<<<<< HEAD
	 * @var    array  Form instances.
=======
	 * Form instances.
	 * @var    array
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected static $forms = array();

	/**
	 * Method to instantiate the form object.
	 *
<<<<<<< HEAD
	 * @param   string  $name		The name of the form.
	 * @param   array   $options	An array of form options.
=======
	 * @param   string  $name     The name of the form.
	 * @param   array   $options  An array of form options.
>>>>>>> upstream/master
	 *
	 * @return  void
	 *
	 * @since   11.1
	 */
	public function __construct($name, array $options = array())
	{
		// Set the name for the form.
		$this->name = $name;

		// Initialise the JRegistry data.
<<<<<<< HEAD
		$this->data = new JRegistry();

		// Set the options if specified.
		$this->options['control']  = isset($options['control']) ? $options['control'] : false;
=======
		$this->data = new JRegistry;

		// Set the options if specified.
		$this->options['control'] = isset($options['control']) ? $options['control'] : false;
>>>>>>> upstream/master
	}

	/**
	 * Method to bind data to the form.
	 *
<<<<<<< HEAD
	 * @param   mixed  $data	An array or object of data to bind to the form.
=======
	 * @param   mixed  $data  An array or object of data to bind to the form.
>>>>>>> upstream/master
	 *
	 * @return  boolean  True on success.
	 *
	 * @since   11.1
	 */
	public function bind($data)
	{
		// Make sure there is a valid JForm XML document.
<<<<<<< HEAD
		if (!($this->xml instanceof JXMLElement)) {
=======
		if (!($this->xml instanceof JXMLElement))
		{
>>>>>>> upstream/master
			return false;
		}

		// The data must be an object or array.
<<<<<<< HEAD
		if (!is_object($data) && !is_array($data)) {
=======
		if (!is_object($data) && !is_array($data))
		{
>>>>>>> upstream/master
			return false;
		}

		// Convert the input to an array.
<<<<<<< HEAD
		if (is_object($data)) {
			if ($data instanceof JRegistry) {
				// Handle a JRegistry.
				$data = $data->toArray();
			}
			else if ($data instanceof JObject) {
				// Handle a JObject.
				$data = $data->getProperties();
			}
			else {
=======
		if (is_object($data))
		{
			if ($data instanceof JRegistry)
			{
				// Handle a JRegistry.
				$data = $data->toArray();
			}
			else if ($data instanceof JObject)
			{
				// Handle a JObject.
				$data = $data->getProperties();
			}
			else
			{
>>>>>>> upstream/master
				// Handle other types of objects.
				$data = (array) $data;
			}
		}

		// Process the input data.
<<<<<<< HEAD
		foreach ($data as $k => $v) {

			if ($this->findField($k)) {
				// If the field exists set the value.
				$this->data->set($k, $v);
			}
			else if (is_object($v) || JArrayHelper::isAssociative($v)) {
=======
		foreach ($data as $k => $v)
		{

			if ($this->findField($k))
			{
				// If the field exists set the value.
				$this->data->set($k, $v);
			}
			else if (is_object($v) || JArrayHelper::isAssociative($v))
			{
>>>>>>> upstream/master
				// If the value is an object or an associative array hand it off to the recursive bind level method.
				$this->bindLevel($k, $v);
			}
		}

		return true;
	}

	/**
	 * Method to bind data to the form for the group level.
	 *
	 * @param   string  $group  The dot-separated form group path on which to bind the data.
	 * @param   mixed   $data   An array or object of data to bind to the form for the group level.
	 *
	 * @return  void
	 *
	 * @since   11.1
	 */
	protected function bindLevel($group, $data)
	{
		// Ensure the input data is an array.
		settype($data, 'array');

		// Process the input data.
<<<<<<< HEAD
		foreach ($data as $k => $v) {

			if ($this->findField($k, $group)) {
				// If the field exists set the value.
				$this->data->set($group.'.'.$k, $v);
			}
			else if (is_object($v) || JArrayHelper::isAssociative($v)) {
				// If the value is an object or an associative array, hand it off to the recursive bind level method
				$this->bindLevel($group.'.'.$k, $v);
=======
		foreach ($data as $k => $v)
		{

			if ($this->findField($k, $group))
			{
				// If the field exists set the value.
				$this->data->set($group . '.' . $k, $v);
			}
			else if (is_object($v) || JArrayHelper::isAssociative($v))
			{
				// If the value is an object or an associative array, hand it off to the recursive bind level method
				$this->bindLevel($group . '.' . $k, $v);
>>>>>>> upstream/master
			}
		}
	}

	/**
	 * Method to filter the form data.
	 *
<<<<<<< HEAD
	 * @param   array   $data	An array of field values to filter.
	 * @param   string  $group	The dot-separated form group path on which to filter the fields.
=======
	 * @param   array   $data   An array of field values to filter.
	 * @param   string  $group  The dot-separated form group path on which to filter the fields.
>>>>>>> upstream/master
	 *
	 * @return  mixed  Array or false.
	 *
	 * @since   11.1
	 */
	public function filter($data, $group = null)
	{
		// Make sure there is a valid JForm XML document.
<<<<<<< HEAD
		if (!($this->xml instanceof JXMLElement)) {
=======
		if (!($this->xml instanceof JXMLElement))
		{
>>>>>>> upstream/master
			return false;
		}

		// Initialise variables.
<<<<<<< HEAD
		$input	= new JRegistry($data);
		$output	= new JRegistry();

		// Get the fields for which to filter the data.
		$fields = $this->findFieldsByGroup($group);
		if (!$fields) {
=======
		$input = new JRegistry($data);
		$output = new JRegistry;

		// Get the fields for which to filter the data.
		$fields = $this->findFieldsByGroup($group);
		if (!$fields)
		{
>>>>>>> upstream/master
			// PANIC!
			return false;
		}

		// Filter the fields.
		foreach ($fields as $field)
		{
			// Initialise variables.
			$name = (string) $field['name'];

			// Get the field groups for the element.
<<<<<<< HEAD
			$attrs	= $field->xpath('ancestor::fields[@name]/@name');
			$groups	= array_map('strval', $attrs ? $attrs : array());
			$group	= implode('.', $groups);

			// Get the field value from the data input.
			if ($group) {
				// Filter the value if it exists.
				if ($input->exists($group.'.'.$name)) {
					$output->set($group.'.'.$name, $this->filterField($field, $input->get($group.'.'.$name, (string) $field['default'])));
				}
			}
			else {
				// Filter the value if it exists.
				if ($input->exists($name)) {
=======
			$attrs = $field->xpath('ancestor::fields[@name]/@name');
			$groups = array_map('strval', $attrs ? $attrs : array());
			$group = implode('.', $groups);

			// Get the field value from the data input.
			if ($group)
			{
				// Filter the value if it exists.
				if ($input->exists($group . '.' . $name))
				{
					$output->set($group . '.' . $name, $this->filterField($field, $input->get($group . '.' . $name, (string) $field['default'])));
				}
			}
			else
			{
				// Filter the value if it exists.
				if ($input->exists($name))
				{
>>>>>>> upstream/master
					$output->set($name, $this->filterField($field, $input->get($name, (string) $field['default'])));
				}
			}
		}

		return $output->toArray();
	}

	/**
	 * Return all errors, if any.
	 *
	 * @return  array  Array of error messages or JException objects.
	 *
	 * @since   11.1
	 */
	public function getErrors()
	{
		return $this->errors;
	}

	/**
	 * Method to get a form field represented as a JFormField object.
	 *
<<<<<<< HEAD
	 * @param   string  $name	The name of the form field.
	 * @param   string  $group	The optional dot-separated form group path on which to find the field.
	 * @param   mixed   $value	The optional value to use as the default for the field.
=======
	 * @param   string  $name   The name of the form field.
	 * @param   string  $group  The optional dot-separated form group path on which to find the field.
	 * @param   mixed   $value  The optional value to use as the default for the field.
>>>>>>> upstream/master
	 *
	 * @return  mixed  The JFormField object for the field or boolean false on error.
	 *
	 * @since   11.1
	 */
	public function getField($name, $group = null, $value = null)
	{
		// Make sure there is a valid JForm XML document.
<<<<<<< HEAD
		if (!($this->xml instanceof JXMLElement)) {
=======
		if (!($this->xml instanceof JXMLElement))
		{
>>>>>>> upstream/master
			return false;
		}

		// Attempt to find the field by name and group.
		$element = $this->findField($name, $group);

		// If the field element was not found return false.
<<<<<<< HEAD
		if (!$element) {
=======
		if (!$element)
		{
>>>>>>> upstream/master
			return false;
		}

		return $this->loadField($element, $group, $value);
	}

	/**
	 * Method to get an attribute value from a field XML element.  If the attribute doesn't exist or
	 * is null then the optional default value will be used.
	 *
	 * @param   string  $name       The name of the form field for which to get the attribute value.
	 * @param   string  $attribute  The name of the attribute for which to get a value.
	 * @param   mixed   $default    The optional default value to use if no attribute value exists.
	 * @param   string  $group      The optional dot-separated form group path on which to find the field.
	 *
	 * @return  mixed  The attribute value for the field.
	 *
	 * @since   11.1
	 */
	public function getFieldAttribute($name, $attribute, $default = null, $group = null)
	{
		// Make sure there is a valid JForm XML document.
<<<<<<< HEAD
		if (!($this->xml instanceof JXMLElement)) {
=======
		if (!($this->xml instanceof JXMLElement))
		{
>>>>>>> upstream/master
			// TODO: throw exception.

			return $default;
		}

		// Find the form field element from the definition.
		$element = $this->findField($name, $group);

		// If the element exists and the attribute exists for the field return the attribute value.
<<<<<<< HEAD
		if (($element instanceof JXMLElement) && ((string) $element[$attribute])) {
			return (string) $element[$attribute];
		}
		// Otherwise return the given default value.
		else {
=======
		if (($element instanceof JXMLElement) && ((string) $element[$attribute]))
		{
			return (string) $element[$attribute];
		}
		// Otherwise return the given default value.
		else
		{
>>>>>>> upstream/master
			return $default;
		}
	}

	/**
	 * Method to get an array of JFormField objects in a given fieldset by name.  If no name is
	 * given then all fields are returned.
	 *
	 * @param   string  $set  The optional name of the fieldset.
	 *
	 * @return  array  The array of JFormField objects in the fieldset.
	 *
	 * @since   11.1
	 */
	public function getFieldset($set = null)
	{
		// Initialise variables.
		$fields = array();

		// Get all of the field elements in the fieldset.
<<<<<<< HEAD
		if ($set) {
			$elements = $this->findFieldsByFieldset($set);
		}
		// Get all fields.
		else {
=======
		if ($set)
		{
			$elements = $this->findFieldsByFieldset($set);
		}
		// Get all fields.
		else
		{
>>>>>>> upstream/master
			$elements = $this->findFieldsByGroup();
		}

		// If no field elements were found return empty.
<<<<<<< HEAD
		if (empty($elements)) {
=======
		if (empty($elements))
		{
>>>>>>> upstream/master
			return $fields;
		}

		// Build the result array from the found field elements.
		foreach ($elements as $element)
		{
			// Get the field groups for the element.
<<<<<<< HEAD
			$attrs	= $element->xpath('ancestor::fields[@name]/@name');
			$groups	= array_map('strval', $attrs ? $attrs : array());
			$group	= implode('.', $groups);

			// If the field is successfully loaded add it to the result array.
			if ($field = $this->loadField($element, $group)) {
=======
			$attrs = $element->xpath('ancestor::fields[@name]/@name');
			$groups = array_map('strval', $attrs ? $attrs : array());
			$group = implode('.', $groups);

			// If the field is successfully loaded add it to the result array.
			if ($field = $this->loadField($element, $group))
			{
>>>>>>> upstream/master
				$fields[$field->id] = $field;
			}
		}

		return $fields;
	}

	/**
	 * Method to get an array of fieldset objects optionally filtered over a given field group.
	 *
	 * @param   string  $group  The dot-separated form group path on which to filter the fieldsets.
	 *
	 * @return  array  The array of fieldset objects.
	 *
	 * @since   11.1
	 */
	public function getFieldsets($group = null)
	{
		// Initialise variables.
		$fieldsets = array();
		$sets = array();

		// Make sure there is a valid JForm XML document.
<<<<<<< HEAD
		if (!($this->xml instanceof JXMLElement)) {
			return $fieldsets;
		}

		if ($group) {
			// Get the fields elements for a given group.
			$elements = & $this->findGroup($group);

			foreach ($elements as & $element)
			{
				// Get an array of <fieldset /> elements and fieldset attributes within the fields element.
				if ($tmp = $element->xpath('descendant::fieldset[@name] | descendant::field[@fieldset]/@fieldset')) {
=======
		if (!($this->xml instanceof JXMLElement))
		{
			return $fieldsets;
		}

		if ($group)
		{
			// Get the fields elements for a given group.
			$elements = &$this->findGroup($group);

			foreach ($elements as &$element)
			{
				// Get an array of <fieldset /> elements and fieldset attributes within the fields element.
				if ($tmp = $element->xpath('descendant::fieldset[@name] | descendant::field[@fieldset]/@fieldset'))
				{
>>>>>>> upstream/master
					$sets = array_merge($sets, (array) $tmp);
				}
			}
		}
<<<<<<< HEAD
		else {
=======
		else
		{
>>>>>>> upstream/master
			// Get an array of <fieldset /> elements and fieldset attributes.
			$sets = $this->xml->xpath('//fieldset[@name] | //field[@fieldset]/@fieldset');
		}

		// If no fieldsets are found return empty.
<<<<<<< HEAD
		if (empty($sets)) {
=======
		if (empty($sets))
		{
>>>>>>> upstream/master

			return $fieldsets;
		}

		// Process each found fieldset.
		foreach ($sets as $set)
		{
			// Are we dealing with a fieldset element?
<<<<<<< HEAD
			if ((string) $set['name']) {

				// Only create it if it doesn't already exist.
				if (empty($fieldsets[(string) $set['name']])) {
=======
			if ((string) $set['name'])
			{

				// Only create it if it doesn't already exist.
				if (empty($fieldsets[(string) $set['name']]))
				{
>>>>>>> upstream/master

					// Build the fieldset object.
					$fieldset = (object) array('name' => '', 'label' => '', 'description' => '');
					foreach ($set->attributes() as $name => $value)
					{
						$fieldset->$name = (string) $value;
					}

					// Add the fieldset object to the list.
					$fieldsets[$fieldset->name] = $fieldset;
				}
			}
			// Must be dealing with a fieldset attribute.
<<<<<<< HEAD
			else {

				// Only create it if it doesn't already exist.
				if (empty($fieldsets[(string) $set])) {

					// Attempt to get the fieldset element for data (throughout the entire form document).
					$tmp = $this->xml->xpath('//fieldset[@name="'.(string) $set.'"]');

					// If no element was found, build a very simple fieldset object.
					if (empty($tmp)) {
						$fieldset = (object) array('name' => (string) $set, 'label' => '', 'description' => '');
					}
					// Build the fieldset object from the element.
					else {
=======
			else
			{

				// Only create it if it doesn't already exist.
				if (empty($fieldsets[(string) $set]))
				{

					// Attempt to get the fieldset element for data (throughout the entire form document).
					$tmp = $this->xml->xpath('//fieldset[@name="' . (string) $set . '"]');

					// If no element was found, build a very simple fieldset object.
					if (empty($tmp))
					{
						$fieldset = (object) array('name' => (string) $set, 'label' => '', 'description' => '');
					}
					// Build the fieldset object from the element.
					else
					{
>>>>>>> upstream/master
						$fieldset = (object) array('name' => '', 'label' => '', 'description' => '');
						foreach ($tmp[0]->attributes() as $name => $value)
						{
							$fieldset->$name = (string) $value;
						}
					}

					// Add the fieldset object to the list.
					$fieldsets[$fieldset->name] = $fieldset;
				}
			}
		}

		return $fieldsets;
	}

	/**
	 * Method to get the form control. This string serves as a container for all form fields. For
	 * example, if there is a field named 'foo' and a field named 'bar' and the form control is
	 * empty the fields will be rendered like: <input name="foo" /> and <input name="bar" />.  If
	 * the form control is set to 'joomla' however, the fields would be rendered like:
	 * <input name="joomla[foo]" /> and <input name="joomla[bar]" />.
	 *
	 * @return  string  The form control string.
	 *
	 * @since   11.1
	 */
	public function getFormControl()
	{
		return (string) $this->options['control'];
	}

	/**
	 * Method to get an array of JFormField objects in a given field group by name.
	 *
	 * @param   string   $group   The dot-separated form group path for which to get the form fields.
	 * @param   boolean  $nested  True to also include fields in nested groups that are inside of the
<<<<<<< HEAD
	 *                            group for which to find fields.
=======
	 * group for which to find fields.
>>>>>>> upstream/master
	 *
	 * @return  array    The array of JFormField objects in the field group.
	 *
	 * @since   11.1
	 */
	public function getGroup($group, $nested = false)
	{
		// Initialise variables.
		$fields = array();

		// Get all of the field elements in the field group.
		$elements = $this->findFieldsByGroup($group, $nested);

		// If no field elements were found return empty.
<<<<<<< HEAD
		if (empty($elements)) {
=======
		if (empty($elements))
		{
>>>>>>> upstream/master
			return $fields;
		}

		// Build the result array from the found field elements.
		foreach ($elements as $element)
		{
			// If the field is successfully loaded add it to the result array.
<<<<<<< HEAD
			if ($field = $this->loadField($element, $group)) {
=======
			if ($field = $this->loadField($element, $group))
			{
>>>>>>> upstream/master
				$fields[$field->id] = $field;
			}
		}

		return $fields;
	}

	/**
	 * Method to get a form field markup for the field input.
	 *
	 * @param   string  $name   The name of the form field.
	 * @param   string  $group  The optional dot-separated form group path on which to find the field.
	 * @param   mixed   $value  The optional value to use as the default for the field.
	 *
	 * @return  string  The form field markup.
	 *
	 * @since   11.1
	 */
	public function getInput($name, $group = null, $value = null)
	{
		// Attempt to get the form field.
<<<<<<< HEAD
		if ($field = $this->getField($name, $group, $value)) {
=======
		if ($field = $this->getField($name, $group, $value))
		{
>>>>>>> upstream/master
			return $field->input;
		}

		return '';
	}

	/**
	 * Method to get a form field markup for the field input.
	 *
	 * @param   string  $name   The name of the form field.
	 * @param   string  $group  The optional dot-separated form group path on which to find the field.
	 *
	 * @return  string  The form field markup.
	 *
	 * @since   11.1
	 */
	public function getLabel($name, $group = null)
	{
		// Attempt to get the form field.
<<<<<<< HEAD
		if ($field = $this->getField($name, $group)) {
=======
		if ($field = $this->getField($name, $group))
		{
>>>>>>> upstream/master
			return $field->label;
		}

		return '';
	}

	/**
	 * Method to get the form name.
	 *
	 * @return  string  The name of the form.
	 *
	 * @since   11.1
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Method to get the value of a field.
	 *
	 * @param   string  $name     The name of the field for which to get the value.
	 * @param   string  $group    The optional dot-separated form group path on which to get the value.
	 * @param   mixed   $default  The optional default value of the field value is empty.
	 *
	 * @return  mixed  The value of the field or the default value if empty.
	 *
	 * @since   11.1
	 */
	public function getValue($name, $group = null, $default = null)
	{
		// If a group is set use it.
<<<<<<< HEAD
		if ($group) {
			$return = $this->data->get($group.'.'.$name, $default);
		}
		else {
=======
		if ($group)
		{
			$return = $this->data->get($group . '.' . $name, $default);
		}
		else
		{
>>>>>>> upstream/master
			$return = $this->data->get($name, $default);
		}

		return $return;
	}

	/**
	 * Method to load the form description from an XML string or object.
	 *
	 * The replace option works per field.  If a field being loaded already exists in the current
	 * form definition then the behavior or load will vary depending upon the replace flag.  If it
	 * is set to true, then the existing field will be replaced in its exact location by the new
	 * field being loaded.  If it is false, then the new field being loaded will be ignored and the
	 * method will move on to the next field to load.
	 *
	 * @param   string  $data     The name of an XML string or object.
	 * @param   string  $replace  Flag to toggle whether form fields should be replaced if a field
<<<<<<< HEAD
	 *                            already exists with the same group/name.
=======
	 * already exists with the same group/name.
>>>>>>> upstream/master
	 * @param   string  $xpath    An optional xpath to search for the fields.
	 *
	 * @return  boolean  True on success, false otherwise.
	 *
	 * @since   11.1
	 */
	public function load($data, $replace = true, $xpath = false)
	{
		// If the data to load isn't already an XML element or string return false.
<<<<<<< HEAD
		if ((!($data instanceof JXMLElement)) && (!is_string($data))) {
=======
		if ((!($data instanceof JXMLElement)) && (!is_string($data)))
		{
>>>>>>> upstream/master
			return false;
		}

		// Attempt to load the XML if a string.
<<<<<<< HEAD
		if (is_string($data)) {
			$data = JFactory::getXML($data, false);

			// Make sure the XML loaded correctly.
			if (!$data) {
=======
		if (is_string($data))
		{
			$data = JFactory::getXML($data, false);

			// Make sure the XML loaded correctly.
			if (!$data)
			{
>>>>>>> upstream/master
				return false;
			}
		}

		// If we have no XML definition at this point let's make sure we get one.
<<<<<<< HEAD
		if (empty($this->xml)) {
			// If no XPath query is set to search for fields, and we have a <form />, set it and return.
			if (!$xpath && ($data->getName() == 'form')) {
=======
		if (empty($this->xml))
		{
			// If no XPath query is set to search for fields, and we have a <form />, set it and return.
			if (!$xpath && ($data->getName() == 'form'))
			{
>>>>>>> upstream/master
				$this->xml = $data;

				// Synchronize any paths found in the load.
				$this->syncPaths();

				return true;
			}
<<<<<<< HEAD

			// Create a root element for the form.
			else {
=======
			// Create a root element for the form.
			else
			{
>>>>>>> upstream/master
				$this->xml = new JXMLElement('<form></form>');
			}
		}

		// Get the XML elements to load.
		$elements = array();
<<<<<<< HEAD
		if ($xpath) {
			$elements = $data->xpath($xpath);
		}
		elseif ($data->getName() == 'form') {
=======
		if ($xpath)
		{
			$elements = $data->xpath($xpath);
		}
		elseif ($data->getName() == 'form')
		{
>>>>>>> upstream/master
			$elements = $data->children();
		}

		// If there is nothing to load return true.
<<<<<<< HEAD
		if (empty($elements)) {
=======
		if (empty($elements))
		{
>>>>>>> upstream/master
			return true;
		}

		// Load the found form elements.
		foreach ($elements as $element)
		{
			// Get an array of fields with the correct name.
			$fields = $element->xpath('descendant-or-self::field');
			foreach ($fields as $field)
			{
				// Get the group names as strings for ancestor fields elements.
<<<<<<< HEAD
				$attrs	= $field->xpath('ancestor::fields[@name]/@name');
				$groups	= array_map('strval', $attrs ? $attrs : array());

				// Check to see if the field exists in the current form.
				if ($current = $this->findField((string) $field['name'], implode('.', $groups))) {

					// If set to replace found fields remove it from the current definition.
					if ($replace) {
=======
				$attrs = $field->xpath('ancestor::fields[@name]/@name');
				$groups = array_map('strval', $attrs ? $attrs : array());

				// Check to see if the field exists in the current form.
				if ($current = $this->findField((string) $field['name'], implode('.', $groups)))
				{

					// If set to replace found fields remove it from the current definition.
					if ($replace)
					{
>>>>>>> upstream/master
						$dom = dom_import_simplexml($current);
						$dom->parentNode->removeChild($dom);
					}

<<<<<<< HEAD
					// Else remove it from the incoming definition so it isn't replaced.
					else {
=======
					// 					else
					{
>>>>>>> upstream/master
						unset($field);
					}
				}
			}

			// Merge the new field data into the existing XML document.
			self::addNode($this->xml, $element);
		}

		// Synchronize any paths found in the load.
		$this->syncPaths();

		return true;
	}

	/**
	 * Method to load the form description from an XML file.
	 *
	 * The reset option works on a group basis. If the XML file references
	 * groups that have already been created they will be replaced with the
	 * fields in the new XML file unless the $reset parameter has been set
	 * to false.
	 *
<<<<<<< HEAD
	 * @param   string  $file		The filesystem path of an XML file.
	 * @param   string  $replace	Flag to toggle whether form fields should be replaced if a field
	 *								already exists with the same group/name.
	 * @param   string  $xpath		An optional xpath to search for the fields.
=======
	 * @param   string  $file   The filesystem path of an XML file.
	 * @param   string  $reset  Flag to toggle whether form fields should be replaced if a field
	 *                          already exists with the same group/name.
	 * @param   string  $xpath  An optional xpath to search for the fields.
>>>>>>> upstream/master
	 *
	 * @return  boolean  True on success, false otherwise.
	 *
	 * @since   11.1
	 */
	public function loadFile($file, $reset = true, $xpath = false)
	{
		// Check to see if the path is an absolute path.
<<<<<<< HEAD
		if (!is_file($file)) {

			// Not an absolute path so let's attempt to find one using JPath.
			$file = JPath::find(self::addFormPath(), strtolower($file).'.xml');

			// If unable to find the file return false.
			if (!$file) {
=======
		if (!is_file($file))
		{

			// Not an absolute path so let's attempt to find one using JPath.
			$file = JPath::find(self::addFormPath(), strtolower($file) . '.xml');

			// If unable to find the file return false.
			if (!$file)
			{
>>>>>>> upstream/master
				return false;
			}
		}
		// Attempt to load the XML file.
		$xml = JFactory::getXML($file, true);

		return $this->load($xml, $reset, $xpath);
	}

	/**
	 * Method to remove a field from the form definition.
	 *
	 * @param   string  $name   The name of the form field for which remove.
	 * @param   string  $group  The optional dot-separated form group path on which to find the field.
	 *
	 * @return  boolean  True on success.
	 *
	 * @since   11.1
	 */
	public function removeField($name, $group = null)
	{
		// Make sure there is a valid JForm XML document.
<<<<<<< HEAD
		if (!($this->xml instanceof JXMLElement)) {
=======
		if (!($this->xml instanceof JXMLElement))
		{
>>>>>>> upstream/master
			// TODO: throw exception.
			return false;
		}

		// Find the form field element from the definition.
		$element = $this->findField($name, $group);

		// If the element exists remove it from the form definition.
<<<<<<< HEAD
		if ($element instanceof JXMLElement) {
=======
		if ($element instanceof JXMLElement)
		{
>>>>>>> upstream/master
			$dom = dom_import_simplexml($element);
			$dom->parentNode->removeChild($dom);
		}

		return true;
	}

	/**
	 * Method to remove a group from the form definition.
	 *
<<<<<<< HEAD
	 * @param   string  $group	The dot-separated form group path for the group to remove.
=======
	 * @param   string  $group  The dot-separated form group path for the group to remove.
>>>>>>> upstream/master
	 *
	 * @return  boolean  True on success.
	 *
	 * @since   11.1
	 */
	public function removeGroup($group)
	{
		// Make sure there is a valid JForm XML document.
<<<<<<< HEAD
		if (!($this->xml instanceof JXMLElement)) {
=======
		if (!($this->xml instanceof JXMLElement))
		{
>>>>>>> upstream/master
			// TODO: throw exception.
			return false;
		}

		// Get the fields elements for a given group.
<<<<<<< HEAD
		$elements = & $this->findGroup($group);
		foreach ($elements as & $element)
=======
		$elements = &$this->findGroup($group);
		foreach ($elements as &$element)
>>>>>>> upstream/master
		{
			$dom = dom_import_simplexml($element);
			$dom->parentNode->removeChild($dom);
		}

		return true;
	}

	/**
	 * Method to reset the form data store and optionally the form XML definition.
	 *
	 * @param   boolean  $xml  True to also reset the XML form definition.
	 *
	 * @return  boolean  True on success.
	 *
	 * @since   11.1
	 */
	public function reset($xml = false)
	{
		unset($this->data);
<<<<<<< HEAD
		$this->data = new JRegistry();

		if ($xml) {
=======
		$this->data = new JRegistry;

		if ($xml)
		{
>>>>>>> upstream/master
			unset($this->xml);
			$this->xml = new JXMLElement('<form></form>');
		}

		return true;
	}

	/**
	 * Method to set a field XML element to the form definition.  If the replace flag is set then
	 * the field will be set whether it already exists or not.  If it isn't set, then the field
	 * will not be replaced if it already exists.
	 *
<<<<<<< HEAD
	 * @param   object   $element  The XML element object representation of the form field.
	 * @param   string   $group    The optional dot-separated form group path on which to set the field.
	 * @param   boolean  $replace  True to replace an existing field if one already exists.
=======
	 * @param   object   &$element  The XML element object representation of the form field.
	 * @param   string   $group     The optional dot-separated form group path on which to set the field.
	 * @param   boolean  $replace   True to replace an existing field if one already exists.
>>>>>>> upstream/master
	 *
	 * @return  boolean  True on success.
	 *
	 * @since   11.1
	 */
<<<<<<< HEAD
	public function setField(& $element, $group = null, $replace = true)
	{
		// Make sure there is a valid JForm XML document.
		if (!($this->xml instanceof JXMLElement)) {
=======
	public function setField(&$element, $group = null, $replace = true)
	{
		// Make sure there is a valid JForm XML document.
		if (!($this->xml instanceof JXMLElement))
		{
>>>>>>> upstream/master
			// TODO: throw exception.

			return false;
		}

		// Make sure the element to set is valid.
<<<<<<< HEAD
		if (!($element instanceof JXMLElement)) {
=======
		if (!($element instanceof JXMLElement))
		{
>>>>>>> upstream/master
			// TODO: throw exception.

			return false;
		}

		// Find the form field element from the definition.
<<<<<<< HEAD
		$old = & $this->findField((string) $element['name'], $group);

		// If an existing field is found and replace flag is false do nothing and return true.
		if (!$replace && !empty($old)) {
=======
		$old = &$this->findField((string) $element['name'], $group);

		// If an existing field is found and replace flag is false do nothing and return true.
		if (!$replace && !empty($old))
		{
>>>>>>> upstream/master

			return true;
		}

		// If an existing field is found and replace flag is true remove the old field.
<<<<<<< HEAD
		if ($replace && !empty($old) && ($old instanceof JXMLElement)) {
=======
		if ($replace && !empty($old) && ($old instanceof JXMLElement))
		{
>>>>>>> upstream/master
			$dom = dom_import_simplexml($old);
			$dom->parentNode->removeChild($dom);
		}

<<<<<<< HEAD

		// If no existing field is found find a group element and add the field as a child of it.
		if ($group) {

			// Get the fields elements for a given group.
			$fields = & $this->findGroup($group);

			// If an appropriate fields element was found for the group, add the element.
			if (isset($fields[0]) && ($fields[0] instanceof JXMLElement)) {
				self::addNode($fields[0], $element);
			}
		}
		else {
=======
		// If no existing field is found find a group element and add the field as a child of it.
		if ($group)
		{

			// Get the fields elements for a given group.
			$fields = &$this->findGroup($group);

			// If an appropriate fields element was found for the group, add the element.
			if (isset($fields[0]) && ($fields[0] instanceof JXMLElement))
			{
				self::addNode($fields[0], $element);
			}
		}
		else
		{
>>>>>>> upstream/master
			// Set the new field to the form.
			self::addNode($this->xml, $element);
		}

		// Synchronize any paths found in the load.
		$this->syncPaths();

		return true;
	}

	/**
	 * Method to set an attribute value for a field XML element.
	 *
	 * @param   string  $name       The name of the form field for which to set the attribute value.
	 * @param   string  $attribute  The name of the attribute for which to set a value.
	 * @param   mixed   $value      The value to set for the attribute.
	 * @param   string  $group      The optional dot-separated form group path on which to find the field.
	 *
	 * @return  boolean  True on success.
	 *
	 * @since   11.1
	 */
	public function setFieldAttribute($name, $attribute, $value, $group = null)
	{
		// Make sure there is a valid JForm XML document.
<<<<<<< HEAD
		if (!($this->xml instanceof JXMLElement)) {
=======
		if (!($this->xml instanceof JXMLElement))
		{
>>>>>>> upstream/master
			// TODO: throw exception.

			return false;
		}

		// Find the form field element from the definition.
<<<<<<< HEAD
		$element = & $this->findField($name, $group);

		// If the element doesn't exist return false.
		if (!($element instanceof JXMLElement)) {
=======
		$element = &$this->findField($name, $group);

		// If the element doesn't exist return false.
		if (!($element instanceof JXMLElement))
		{
>>>>>>> upstream/master

			return false;
		}
		// Otherwise set the attribute and return true.
<<<<<<< HEAD
		else {
=======
		else
		{
>>>>>>> upstream/master
			$element[$attribute] = $value;

			// Synchronize any paths found in the load.
			$this->syncPaths();

			return true;
		}
	}

	/**
	 * Method to set some field XML elements to the form definition.  If the replace flag is set then
	 * the fields will be set whether they already exists or not.  If it isn't set, then the fields
	 * will not be replaced if they already exist.
	 *
<<<<<<< HEAD
	 * @param   object   $elements  The array of XML element object representations of the form fields.
	 * @param   string   $group     The optional dot-separated form group path on which to set the fields.
	 * @param   boolean  $replace   True to replace existing fields if they already exist.
=======
	 * @param   object   &$elements  The array of XML element object representations of the form fields.
	 * @param   string   $group      The optional dot-separated form group path on which to set the fields.
	 * @param   boolean  $replace    True to replace existing fields if they already exist.
>>>>>>> upstream/master
	 *
	 * @return  boolean  True on success.
	 *
	 * @since   11.1
	 */
<<<<<<< HEAD
	public function setFields(& $elements, $group = null, $replace = true)
	{
		// Make sure there is a valid JForm XML document.
		if (!($this->xml instanceof JXMLElement)) {
=======
	public function setFields(&$elements, $group = null, $replace = true)
	{
		// Make sure there is a valid JForm XML document.
		if (!($this->xml instanceof JXMLElement))
		{
>>>>>>> upstream/master
			// TODO: throw exception.

			return false;
		}

		// Make sure the elements to set are valid.
		foreach ($elements as $element)
		{
<<<<<<< HEAD
			if (!($element instanceof JXMLElement)) {
=======
			if (!($element instanceof JXMLElement))
			{
>>>>>>> upstream/master
				// TODO: throw exception.

				return false;
			}
		}

		// Set the fields.
		$return = true;
		foreach ($elements as $element)
		{
<<<<<<< HEAD
			if (!$this->setField($element, $group, $replace)) {
=======
			if (!$this->setField($element, $group, $replace))
			{
>>>>>>> upstream/master

				$return = false;
			}
		}

		// Synchronize any paths found in the load.
		$this->syncPaths();

		return $return;
	}

	/**
	 * Method to set the value of a field. If the field does not exist in the form then the method
	 * will return false.
	 *
	 * @param   string  $name   The name of the field for which to set the value.
	 * @param   string  $group  The optional dot-separated form group path on which to find the field.
	 * @param   mixed   $value  The value to set for the field.
	 *
	 * @return  boolean  True on success.
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function setValue($name, $group = null, $value = null)
	{
		// If the field does not exist return false.
<<<<<<< HEAD
		if (!$this->findField($name, $group)) {
=======
		if (!$this->findField($name, $group))
		{
>>>>>>> upstream/master
			return false;
		}

		// If a group is set use it.
<<<<<<< HEAD
		if ($group) {
			$this->data->set($group.'.'.$name, $value);
		}
		else {
=======
		if ($group)
		{
			$this->data->set($group . '.' . $name, $value);
		}
		else
		{
>>>>>>> upstream/master
			$this->data->set($name, $value);
		}

		return true;
	}

	/**
	 * Method to validate form data.
	 *
	 * Validation warnings will be pushed into JForm::errors and should be
	 * retrieved with JForm::getErrors() when validate returns boolean false.
	 *
	 * @param   array   $data   An array of field values to validate.
	 * @param   string  $group  The optional dot-separated form group path on which to filter the
<<<<<<< HEAD
	 * 							fields to be validated.
=======
	 * fields to be validated.
>>>>>>> upstream/master
	 *
	 * @return  mixed  True on sucess.
	 *
	 * @since   11.1
	 */
	public function validate($data, $group = null)
	{
		// Make sure there is a valid JForm XML document.
<<<<<<< HEAD
		if (!($this->xml instanceof JXMLElement)) {
=======
		if (!($this->xml instanceof JXMLElement))
		{
>>>>>>> upstream/master
			return false;
		}

		// Initialise variables.
<<<<<<< HEAD
		$return	= true;
=======
		$return = true;
>>>>>>> upstream/master

		// Create an input registry object from the data to validate.
		$input = new JRegistry($data);

		// Get the fields for which to validate the data.
		$fields = $this->findFieldsByGroup($group);
<<<<<<< HEAD
		if (!$fields) {
=======
		if (!$fields)
		{
>>>>>>> upstream/master
			// PANIC!
			return false;
		}

		// Validate the fields.
		foreach ($fields as $field)
		{
			// Initialise variables.
<<<<<<< HEAD
			$value	= null;
			$name	= (string) $field['name'];

			// Get the group names as strings for ancestor fields elements.
			$attrs	= $field->xpath('ancestor::fields[@name]/@name');
			$groups	= array_map('strval', $attrs ? $attrs : array());
			$group	= implode('.', $groups);

			// Get the value from the input data.
			if ($group) {
				$value = $input->get($group.'.'.$name);
			}
			else {
=======
			$value = null;
			$name = (string) $field['name'];

			// Get the group names as strings for ancestor fields elements.
			$attrs = $field->xpath('ancestor::fields[@name]/@name');
			$groups = array_map('strval', $attrs ? $attrs : array());
			$group = implode('.', $groups);

			// Get the value from the input data.
			if ($group)
			{
				$value = $input->get($group . '.' . $name);
			}
			else
			{
>>>>>>> upstream/master
				$value = $input->get($name);
			}

			// Validate the field.
			$valid = $this->validateField($field, $group, $value, $input);

			// Check for an error.
<<<<<<< HEAD
			if (JError::isError($valid)) {
=======
			if (JError::isError($valid))
			{
>>>>>>> upstream/master
				switch ($valid->get('level'))
				{
					case E_ERROR:
						JError::raiseWarning(0, $valid->getMessage());
						return false;
						break;

					default:
						array_push($this->errors, $valid);
						$return = false;
						break;
				}
			}
		}

		return $return;
	}

	/**
	 * Method to apply an input filter to a value based on field data.
	 *
	 * @param   string  $element  The XML element object representation of the form field.
	 * @param   mixed   $value    The value to filter for the field.
	 *
	 * @return  mixed   The filtered value.
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function filterField($element, $value)
	{
		// Make sure there is a valid JXMLElement.
<<<<<<< HEAD
		if (!($element instanceof JXMLElement)) {
=======
		if (!($element instanceof JXMLElement))
		{
>>>>>>> upstream/master
			return false;
		}

		// Get the field filter type.
		$filter = (string) $element['filter'];

		// Process the input value based on the filter.
		$return = null;

		switch (strtoupper($filter))
		{
			// Access Control Rules.
			case 'RULES':
				$return = array();
				foreach ((array) $value as $action => $ids)
				{
					// Build the rules array.
					$return[$action] = array();
					foreach ($ids as $id => $p)
					{
<<<<<<< HEAD
						if ($p !== '') {
=======
						if ($p !== '')
						{
>>>>>>> upstream/master
							$return[$action][$id] = ($p == '1' || $p == 'true') ? true : false;
						}
					}
				}
				break;

			// Do nothing, thus leaving the return value as null.
			case 'UNSET':
				break;

			// No Filter.
			case 'RAW':
				$return = $value;
				break;

			// Filter the input as an array of integers.
			case 'INT_ARRAY':
<<<<<<< HEAD
				// Make sure the input is an array.
				if (is_object($value)) {
=======
			// Make sure the input is an array.
				if (is_object($value))
				{
>>>>>>> upstream/master
					$value = get_object_vars($value);
				}
				$value = is_array($value) ? $value : array($value);

				JArrayHelper::toInteger($value);
				$return = $value;
				break;

			// Filter safe HTML.
			case 'SAFEHTML':
				$return = JFilterInput::getInstance(null, null, 1, 1)->clean($value, 'string');
				break;

			// Convert a date to UTC based on the server timezone offset.
			case 'SERVER_UTC':
<<<<<<< HEAD
				if (intval($value) > 0) {
					// Get the server timezone setting.
					$offset	= JFactory::getConfig()->get('offset');
=======
				if (intval($value) > 0)
				{
					// Get the server timezone setting.
					$offset = JFactory::getConfig()->get('offset');
>>>>>>> upstream/master

					// Return a MySQL formatted datetime string in UTC.
					$return = JFactory::getDate($value, $offset)->toMySQL();
				}
<<<<<<< HEAD
				else {
=======
				else
				{
>>>>>>> upstream/master
					$return = '';
				}
				break;

			// Convert a date to UTC based on the user timezone offset.
			case 'USER_UTC':
<<<<<<< HEAD
				if (intval($value) > 0) {
					// Get the user timezone setting defaulting to the server timezone setting.
					$offset	= JFactory::getUser()->getParam('timezone', JFactory::getConfig()->get('offset'));
=======
				if (intval($value) > 0)
				{
					// Get the user timezone setting defaulting to the server timezone setting.
					$offset = JFactory::getUser()->getParam('timezone', JFactory::getConfig()->get('offset'));
>>>>>>> upstream/master

					// Return a MySQL formatted datetime string in UTC.
					$return = JFactory::getDate($value, $offset)->toMySQL();
				}
<<<<<<< HEAD
				else {
					$return = '';
				}
				break;
				
			case 'TEL' :	
				$value = trim($value);
				// Does it match the NANP pattern?
				if (preg_match('/^(?:\+?1[-. ]?)?\(?([2-9][0-8][0-9])\)?[-. ]?([2-9][0-9]{2})[-. ]?([0-9]{4})$/',$value) == 1) {
					$number = (string) preg_replace('/[^\d]/', '', $value);
					if (substr($number,0,1) == 1) {
						$number = substr($number,1);
					}
					if (substr($number,0,2) == '+1') {
						$number = substr($number,2);
					}					
					$result = '1.'.$number;
				} 
				// If not, does it match ITU-T?
				elseif (preg_match('/^\+(?:[0-9] ?){6,14}[0-9]$/',$value) == 1) {
					$countrycode =  substr($value,0,strpos($value,' '));
					$countrycode = (string) preg_replace('/[^\d]/', '', $countrycode);
					$number = strstr($value,' ');
					$number = (string) preg_replace('/[^\d]/', '', $number);
					$result = $countrycode.'.'.$number;
				} 
				// If not, does it match EPP?
				elseif (preg_match('/^\+[0-9]{1,3}\.[0-9]{4,14}(?:x.+)?$/',$value)  == 1){
				 	if (strstr($value,'x')) {
				 		$xpos = strpos($value,'x');
				 		$value = substr($value,0,$xpos); 		
				 	}
				 		$result = str_replace('+','',$value); 
	 		
				}
				// Maybe it is already ccc.nnnnnnn?
				elseif (preg_match('/[0-9]{1,3}\.[0-9]{4,14}$/',$value) == 1 ){
					$result = $value;
				}
				// If not, can we make it a string of digits?
				else { 
				 $value = (string) preg_replace('/[^\d]/', '', $value);
					if ($value != null && strlen($value) <= 15) { 
						$length = strlen($value);
						// if it is fewer than 13 digits assume it is a local number
						if ($length <= 12) {
							$result='.'.$value;
							
						} else {
						// If it has 13 or more digits let's make a country code.	
							$cclen = $length - 12;
							$result = substr($value,0,$cclen).'.'.substr($value,$cclen);
						}
					}	
					// If not let's not save anything.	
					 else {
						$result = '';
					}						
				}
				$return = $result;
				
				break;
			default:
				// Check for a callback filter.
				if (strpos($filter, '::') !== false && is_callable(explode('::', $filter))) {
					$return = call_user_func(explode('::', $filter), $value);
				}
				// Filter using a callback function if specified.
				else if (function_exists($filter)) {
					$return = call_user_func($filter, $value);
				}
				// Filter using JFilterInput. All HTML code is filtered by default.
				else {
=======
				else
				{
					$return = '';
				}
				break;

			case 'TEL':
				$value = trim($value);
				// Does it match the NANP pattern?
				if (preg_match('/^(?:\+?1[-. ]?)?\(?([2-9][0-8][0-9])\)?[-. ]?([2-9][0-9]{2})[-. ]?([0-9]{4})$/', $value) == 1)
				{
					$number = (string) preg_replace('/[^\d]/', '', $value);
					if (substr($number, 0, 1) == 1)
					{
						$number = substr($number, 1);
					}
					if (substr($number, 0, 2) == '+1')
					{
						$number = substr($number, 2);
					}
					$result = '1.' . $number;
				}
				// If not, does it match ITU-T?
				elseif (preg_match('/^\+(?:[0-9] ?){6,14}[0-9]$/', $value) == 1)
				{
					$countrycode = substr($value, 0, strpos($value, ' '));
					$countrycode = (string) preg_replace('/[^\d]/', '', $countrycode);
					$number = strstr($value, ' ');
					$number = (string) preg_replace('/[^\d]/', '', $number);
					$result = $countrycode . '.' . $number;
				}
				// If not, does it match EPP?
				elseif (preg_match('/^\+[0-9]{1,3}\.[0-9]{4,14}(?:x.+)?$/', $value) == 1)
				{
					if (strstr($value, 'x'))
					{
						$xpos = strpos($value, 'x');
						$value = substr($value, 0, $xpos);
					}
					$result = str_replace('+', '', $value);

				}
				// Maybe it is already ccc.nnnnnnn?
				elseif (preg_match('/[0-9]{1,3}\.[0-9]{4,14}$/', $value) == 1)
				{
					$result = $value;
				}
				// If not, can we make it a string of digits?
				else
				{
					$value = (string) preg_replace('/[^\d]/', '', $value);
					if ($value != null && strlen($value) <= 15)
					{
						$length = strlen($value);
						// if it is fewer than 13 digits assume it is a local number
						if ($length <= 12)
						{
							$result = '.' . $value;

						}
						else
						{
							// If it has 13 or more digits let's make a country code.
							$cclen = $length - 12;
							$result = substr($value, 0, $cclen) . '.' . substr($value, $cclen);
						}
					}
					// If not let's not save anything.
					else
					{
						$result = '';
					}
				}
				$return = $result;

				break;
			default:
			// Check for a callback filter.
				if (strpos($filter, '::') !== false && is_callable(explode('::', $filter)))
				{
					$return = call_user_func(explode('::', $filter), $value);
				}
				// Filter using a callback function if specified.
				else if (function_exists($filter))
				{
					$return = call_user_func($filter, $value);
				}
				// Filter using JFilterInput. All HTML code is filtered by default.
				else
				{
>>>>>>> upstream/master
					$return = JFilterInput::getInstance()->clean($value, $filter);
				}
				break;
		}

		return $return;
	}

	/**
	 * Method to get a form field represented as an XML element object.
	 *
	 * @param   string  $name   The name of the form field.
	 * @param   string  $group  The optional dot-separated form group path on which to find the field.
	 *
	 * @return  mixed  The XML element object for the field or boolean false on error.
	 *
	 * @since   11.1
	 */
	protected function findField($name, $group = null)
	{
		// Initialise variables.
<<<<<<< HEAD
		$element	= false;
		$fields		= array();

		// Make sure there is a valid JForm XML document.
		if (!($this->xml instanceof JXMLElement)) {
=======
		$element = false;
		$fields = array();

		// Make sure there is a valid JForm XML document.
		if (!($this->xml instanceof JXMLElement))
		{
>>>>>>> upstream/master
			return false;
		}

		// Let's get the appropriate field element based on the method arguments.
<<<<<<< HEAD
		if ($group) {

			// Get the fields elements for a given group.
			$elements = & $this->findGroup($group);
=======
		if ($group)
		{

			// Get the fields elements for a given group.
			$elements = &$this->findGroup($group);
>>>>>>> upstream/master

			// Get all of the field elements with the correct name for the fields elements.
			foreach ($elements as $element)
			{
				// If there are matching field elements add them to the fields array.
<<<<<<< HEAD
				if ($tmp = $element->xpath('descendant::field[@name="'.$name.'"]')) {
=======
				if ($tmp = $element->xpath('descendant::field[@name="' . $name . '"]'))
				{
>>>>>>> upstream/master
					$fields = array_merge($fields, $tmp);
				}
			}

			// Make sure something was found.
<<<<<<< HEAD
			if (!$fields) {
=======
			if (!$fields)
			{
>>>>>>> upstream/master
				return false;
			}

			// Use the first correct match in the given group.
			$groupNames = explode('.', $group);
<<<<<<< HEAD
			foreach ($fields as & $field)
			{
				// Get the group names as strings for ancestor fields elements.
				$attrs = $field->xpath('ancestor::fields[@name]/@name');
				$names	= array_map('strval', $attrs ? $attrs : array());

				// If the field is in the exact group use it and break out of the loop.
				if ($names == (array) $groupNames) {
					$element = & $field;
=======
			foreach ($fields as &$field)
			{
				// Get the group names as strings for ancestor fields elements.
				$attrs = $field->xpath('ancestor::fields[@name]/@name');
				$names = array_map('strval', $attrs ? $attrs : array());

				// If the field is in the exact group use it and break out of the loop.
				if ($names == (array) $groupNames)
				{
					$element = &$field;
>>>>>>> upstream/master
					break;
				}
			}
		}
<<<<<<< HEAD
		else {
			// Get an array of fields with the correct name.
			$fields = $this->xml->xpath('//field[@name="'.$name.'"]');

			// Make sure something was found.
			if (!$fields) {
=======
		else
		{
			// Get an array of fields with the correct name.
			$fields = $this->xml->xpath('//field[@name="' . $name . '"]');

			// Make sure something was found.
			if (!$fields)
			{
>>>>>>> upstream/master
				return false;
			}

			// Search through the fields for the right one.
<<<<<<< HEAD
			foreach ($fields as & $field)
			{
				// If we find an ancestor fields element with a group name then it isn't what we want.
				if ($field->xpath('ancestor::fields[@name]')) {
					continue;
				}
				// Found it!
				else {
					$element = & $field;
=======
			foreach ($fields as &$field)
			{
				// If we find an ancestor fields element with a group name then it isn't what we want.
				if ($field->xpath('ancestor::fields[@name]'))
				{
					continue;
				}
				// Found it!
				else
				{
					$element = &$field;
>>>>>>> upstream/master
					break;
				}
			}
		}

		return $element;
	}

	/**
	 * Method to get an array of <field /> elements from the form XML document which are
	 * in a specified fieldset by name.
	 *
	 * @param   string  $name  The name of the fieldset.
	 *
	 * @return  mixed  Boolean false on error or array of JXMLElement objects.
<<<<<<< HEAD
	 * @since   11.1
	 */
	protected function & findFieldsByFieldset($name)
=======
	 *
	 * @since   11.1
	 */
	protected function &findFieldsByFieldset($name)
>>>>>>> upstream/master
	{
		// Initialise variables.
		$false = false;

		// Make sure there is a valid JForm XML document.
<<<<<<< HEAD
		if (!($this->xml instanceof JXMLElement)) {
=======
		if (!($this->xml instanceof JXMLElement))
		{
>>>>>>> upstream/master
			return $false;
		}

		/*
		 * Get an array of <field /> elements that are underneath a <fieldset /> element
		 * with the appropriate name attribute, and also any <field /> elements with
		 * the appropriate fieldset attribute.
		 */
<<<<<<< HEAD
		$fields = $this->xml->xpath('//fieldset[@name="'.$name.'"]//field | //field[@fieldset="'.$name.'"]');
=======
		$fields = $this->xml->xpath('//fieldset[@name="' . $name . '"]//field | //field[@fieldset="' . $name . '"]');
>>>>>>> upstream/master

		return $fields;
	}

	/**
	 * Method to get an array of <field /> elements from the form XML document which are
	 * in a control group by name.
	 *
	 * @param   mixed    $group   The optional dot-separated form group path on which to find the fields.
<<<<<<< HEAD
	 *                            Null will return all fields. False will return fields not in a group.
	 * @param   boolean  $nested  True to also include fields in nested groups that are inside of the
	 *                            group for which to find fields.
=======
	 * Null will return all fields. False will return fields not in a group.
	 * @param   boolean  $nested  True to also include fields in nested groups that are inside of the
	 * group for which to find fields.
>>>>>>> upstream/master
	 *
	 * @return  mixed  Boolean false on error or array of JXMLElement objects.
	 *
	 * @since   11.1
	 */
<<<<<<< HEAD
	protected function & findFieldsByGroup($group = null, $nested = false)
=======
	protected function &findFieldsByGroup($group = null, $nested = false)
>>>>>>> upstream/master
	{
		// Initialise variables.
		$false = false;
		$fields = array();

		// Make sure there is a valid JForm XML document.
<<<<<<< HEAD
		if (!($this->xml instanceof JXMLElement)) {
=======
		if (!($this->xml instanceof JXMLElement))
		{
>>>>>>> upstream/master
			return $false;
		}

		// Get only fields in a specific group?
<<<<<<< HEAD
		if ($group) {

			// Get the fields elements for a given group.
			$elements = & $this->findGroup($group);
=======
		if ($group)
		{

			// Get the fields elements for a given group.
			$elements = &$this->findGroup($group);
>>>>>>> upstream/master

			// Get all of the field elements for the fields elements.
			foreach ($elements as $element)
			{

				// If there are field elements add them to the return result.
<<<<<<< HEAD
				if ($tmp = $element->xpath('descendant::field')) {

					// If we also want fields in nested groups then just merge the arrays.
					if ($nested) {
						$fields = array_merge($fields, $tmp);
					}
					// If we want to exclude nested groups then we need to check each field.
					else {
=======
				if ($tmp = $element->xpath('descendant::field'))
				{

					// If we also want fields in nested groups then just merge the arrays.
					if ($nested)
					{
						$fields = array_merge($fields, $tmp);
					}
					// If we want to exclude nested groups then we need to check each field.
					else
					{
>>>>>>> upstream/master
						$groupNames = explode('.', $group);
						foreach ($tmp as $field)
						{
							// Get the names of the groups that the field is in.
							$attrs = $field->xpath('ancestor::fields[@name]/@name');
							$names = array_map('strval', $attrs ? $attrs : array());

							// If the field is in the specific group then add it to the return list.
<<<<<<< HEAD
							if ($names == (array) $groupNames) {
=======
							if ($names == (array) $groupNames)
							{
>>>>>>> upstream/master
								$fields = array_merge($fields, array($field));
							}
						}
					}
				}
			}
		}
<<<<<<< HEAD
		else if ($group === false) {
			// Get only field elements not in a group.
			$fields = $this->xml->xpath('descendant::fields[not(@name)]/field | descendant::fields[not(@name)]/fieldset/field ');
		}
		else {
=======
		else if ($group === false)
		{
			// Get only field elements not in a group.
			$fields = $this->xml->xpath('descendant::fields[not(@name)]/field | descendant::fields[not(@name)]/fieldset/field ');
		}
		else
		{
>>>>>>> upstream/master
			// Get an array of all the <field /> elements.
			$fields = $this->xml->xpath('//field');
		}

		return $fields;
	}

	/**
	 * Method to get a form field group represented as an XML element object.
	 *
<<<<<<< HEAD
	 * @param   string   $group  The dot-separated form group path on which to find the group.
=======
	 * @param   string  $group  The dot-separated form group path on which to find the group.
>>>>>>> upstream/master
	 *
	 * @return  mixed  An array of XML element objects for the group or boolean false on error.
	 *
	 * @since   11.1
	 */
	protected function &findGroup($group)
	{
		// Initialise variables.
		$false = false;
		$groups = array();
		$tmp = array();

		// Make sure there is a valid JForm XML document.
<<<<<<< HEAD
		if (!($this->xml instanceof JXMLElement)) {
=======
		if (!($this->xml instanceof JXMLElement))
		{
>>>>>>> upstream/master
			return $false;
		}

		// Make sure there is actually a group to find.
		$group = explode('.', $group);
<<<<<<< HEAD
		if (!empty($group)) {

			// Get any fields elements with the correct group name.
			$elements = $this->xml->xpath('//fields[@name="'.(string) $group[0].'"]');
=======
		if (!empty($group))
		{

			// Get any fields elements with the correct group name.
			$elements = $this->xml->xpath('//fields[@name="' . (string) $group[0] . '"]');
>>>>>>> upstream/master

			// Check to make sure that there are no parent groups for each element.
			foreach ($elements as $element)
			{
<<<<<<< HEAD
				if (!$element->xpath('ancestor::fields[@name]')) {
=======
				if (!$element->xpath('ancestor::fields[@name]'))
				{
>>>>>>> upstream/master
					$tmp[] = $element;
				}
			}

			// Iterate through the nested groups to find any matching form field groups.
			for ($i = 1, $n = count($group); $i < $n; $i++)
			{
				// Initialise some loop variables.
<<<<<<< HEAD
				$validNames = array_slice($group, 0, $i+1);
=======
				$validNames = array_slice($group, 0, $i + 1);
>>>>>>> upstream/master
				$current = $tmp;
				$tmp = array();

				// Check to make sure that there are no parent groups for each element.
				foreach ($current as $element)
				{
					// Get any fields elements with the correct group name.
<<<<<<< HEAD
					$children = $element->xpath('descendant::fields[@name="'.(string) $group[$i].'"]');
=======
					$children = $element->xpath('descendant::fields[@name="' . (string) $group[$i] . '"]');
>>>>>>> upstream/master

					// For the found fields elements validate that they are in the correct groups.
					foreach ($children as $fields)
					{
						// Get the group names as strings for ancestor fields elements.
						$attrs = $fields->xpath('ancestor-or-self::fields[@name]/@name');
						$names = array_map('strval', $attrs ? $attrs : array());

						// If the group names for the fields element match the valid names at this
						// level add the fields element.
<<<<<<< HEAD
						if ($validNames == $names) {
=======
						if ($validNames == $names)
						{
>>>>>>> upstream/master
							$tmp[] = $fields;
						}
					}
				}
			}

			// Only include valid XML objects.
			foreach ($tmp as $element)
			{
<<<<<<< HEAD
				if ($element instanceof JXMLElement) {
=======
				if ($element instanceof JXMLElement)
				{
>>>>>>> upstream/master
					$groups[] = $element;
				}
			}
		}

		return $groups;
	}

	/**
	 * Method to load, setup and return a JFormField object based on field data.
	 *
	 * @param   string  $element  The XML element object representation of the form field.
<<<<<<< HEAD
	 * @param   string  $group   The optional dot-separated form group path on which to find the field.
	 * @param   mixed   $value   The optional value to use as the default for the field.
=======
	 * @param   string  $group    The optional dot-separated form group path on which to find the field.
	 * @param   mixed   $value    The optional value to use as the default for the field.
>>>>>>> upstream/master
	 *
	 * @return  mixed  The JFormField object for the field or boolean false on error.
	 *
	 * @since   11.1
	 */
	protected function loadField($element, $group = null, $value = null)
	{
		// Make sure there is a valid JXMLElement.
<<<<<<< HEAD
		if (!($element instanceof JXMLElement)) {
=======
		if (!($element instanceof JXMLElement))
		{
>>>>>>> upstream/master
			return false;
		}

		// Get the field type.
		$type = $element['type'] ? (string) $element['type'] : 'text';

		// Load the JFormField object for the field.
		$field = $this->loadFieldType($type);

		// If the object could not be loaded, get a text field object.
<<<<<<< HEAD
		if ($field === false) {
=======
		if ($field === false)
		{
>>>>>>> upstream/master
			$field = $this->loadFieldType('text');
		}

		// Get the value for the form field if not set.
		// Default to the translated version of the 'default' attribute
		// if 'translate_default' attribute if set to 'true' or '1'
		// else the value of the 'default' attribute for the field.
<<<<<<< HEAD
		if ($value === null) {
			$default = (string) $element['default'];
			if (($translate = $element['translate_default']) && ((string)$translate=='true' || (string)$translate=='1' ))
=======
		if ($value === null)
		{
			$default = (string) $element['default'];
			if (($translate = $element['translate_default']) && ((string) $translate == 'true' || (string) $translate == '1'))
>>>>>>> upstream/master
			{
				$lang = JFactory::getLanguage();
				if ($lang->hasKey($default))
				{
					$debug = $lang->setDebug(false);
					$default = JText::_($default);
					$lang->setDebug($debug);
				}
				else
				{
					$default = JText::_($default);
				}
			}
			$value = $this->getValue((string) $element['name'], $group, $default);
		}

		// Setup the JFormField object.
		$field->setForm($this);

<<<<<<< HEAD
		if ($field->setup($element, $value, $group)) {
			return $field;
		}
		else {
=======
		if ($field->setup($element, $value, $group))
		{
			return $field;
		}
		else
		{
>>>>>>> upstream/master
			return false;
		}
	}

	/**
	 * Proxy for {@link JFormHelper::loadFieldType()}.
	 *
	 * @param   string   $type  The field type.
	 * @param   boolean  $new   Flag to toggle whether we should get a new instance of the object.
	 *
	 * @return  mixed  JFormField object on success, false otherwise.
	 *
	 * @since   11.1
	 */
	protected function loadFieldType($type, $new = true)
	{
		return JFormHelper::loadFieldType($type, $new);
	}

	/**
<<<<<<< HEAD
	 * Proxy for {@link JFormHelper::loadRuleType()}.
=======
	 * Proxy for JFormHelper::loadRuleType().
>>>>>>> upstream/master
	 *
	 * @param   string   $type  The rule type.
	 * @param   boolean  $new   Flag to toggle whether we should get a new instance of the object.
	 *
	 * @return  mixed  JFormRule object on success, false otherwise.
	 *
<<<<<<< HEAD
=======
	 * @see     JFormHelper::loadRuleType()
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function loadRuleType($type, $new = true)
	{
		return JFormHelper::loadRuleType($type, $new);
	}

	/**
	 * Method to synchronize any field, form or rule paths contained in the XML document.
	 *
<<<<<<< HEAD
	 * TODO:	Maybe we should receive all addXXXpaths attributes at once?
	 *
	 * @return  boolean  True on success.
	 *
	 * @since   11.1
=======
	 * @return  boolean  True on success.
	 *
	 * @since   11.1
	 * @todo    Maybe we should receive all addXXXpaths attributes at once?
>>>>>>> upstream/master
	 */
	protected function syncPaths()
	{
		// Make sure there is a valid JForm XML document.
<<<<<<< HEAD
		if (!($this->xml instanceof JXMLElement)) {
=======
		if (!($this->xml instanceof JXMLElement))
		{
>>>>>>> upstream/master
			return false;
		}

		// Get any addfieldpath attributes from the form definition.
		$paths = $this->xml->xpath('//*[@addfieldpath]/@addfieldpath');
		$paths = array_map('strval', $paths ? $paths : array());

		// Add the field paths.
		foreach ($paths as $path)
		{
<<<<<<< HEAD
			$path = JPATH_ROOT.'/'.ltrim($path, '/\\');
=======
			$path = JPATH_ROOT . '/' . ltrim($path, '/\\');
>>>>>>> upstream/master
			self::addFieldPath($path);
		}

		// Get any addformpath attributes from the form definition.
		$paths = $this->xml->xpath('//*[@addformpath]/@addformpath');
		$paths = array_map('strval', $paths ? $paths : array());

		// Add the form paths.
		foreach ($paths as $path)
		{
<<<<<<< HEAD
			$path = JPATH_ROOT.'/'.ltrim($path, '/\\');
=======
			$path = JPATH_ROOT . '/' . ltrim($path, '/\\');
>>>>>>> upstream/master
			self::addFormPath($path);
		}

		// Get any addrulepath attributes from the form definition.
		$paths = $this->xml->xpath('//*[@addrulepath]/@addrulepath');
		$paths = array_map('strval', $paths ? $paths : array());

		// Add the rule paths.
		foreach ($paths as $path)
		{
<<<<<<< HEAD
			$path = JPATH_ROOT.'/'.ltrim($path, '/\\');
=======
			$path = JPATH_ROOT . '/' . ltrim($path, '/\\');
>>>>>>> upstream/master
			self::addRulePath($path);
		}

		return true;
	}

	/**
	 * Method to validate a JFormField object based on field data.
	 *
	 * @param   string  $element  The XML element object representation of the form field.
	 * @param   string  $group    The optional dot-separated form group path on which to find the field.
	 * @param   mixed   $value    The optional value to use as the default for the field.
	 * @param   object  $input    An optional JRegistry object with the entire data set to validate
<<<<<<< HEAD
	 *                            against the entire form.
=======
	 * against the entire form.
>>>>>>> upstream/master
	 *
	 * @return  mixed  Boolean true if field value is valid, JException on failure.
	 *
	 * @since   11.1
	 */
	protected function validateField($element, $group = null, $value = null, $input = null)
	{
		// Make sure there is a valid JXMLElement.
<<<<<<< HEAD
		if (!$element instanceof JXMLElement) {
=======
		if (!$element instanceof JXMLElement)
		{
>>>>>>> upstream/master
			return new JException(JText::_('JLIB_FORM_ERROR_VALIDATE_FIELD'), -1, E_ERROR);
		}

		// Initialise variables.
		$valid = true;

		// Check if the field is required.
		$required = ((string) $element['required'] == 'true' || (string) $element['required'] == 'required');

<<<<<<< HEAD
		if ($required) {
			// If the field is required and the value is empty return an error message.
			if (($value === '') || ($value === null)) {

				// Does the field have a defined error message?
				if($element['message']) {
					$message = $element['message'];
				}
				else {
					if ($element['label']) {
						$message = JText::_($element['label']);
					}
					else {
=======
		if ($required)
		{
			// If the field is required and the value is empty return an error message.
			if (($value === '') || ($value === null))
			{

				// Does the field have a defined error message?
				if ($element['message'])
				{
					$message = $element['message'];
				}
				else
				{
					if ($element['label'])
					{
						$message = JText::_($element['label']);
					}
					else
					{
>>>>>>> upstream/master
						$message = JText::_($element['name']);
					}
					$message = JText::sprintf('JLIB_FORM_VALIDATE_FIELD_REQUIRED', $message);
				}
				return new JException($message, 2, E_WARNING);
			}
		}

		// Get the field validation rule.
<<<<<<< HEAD
		if ($type = (string) $element['validate']) {
=======
		if ($type = (string) $element['validate'])
		{
>>>>>>> upstream/master
			// Load the JFormRule object for the field.
			$rule = $this->loadRuleType($type);

			// If the object could not be loaded return an error message.
<<<<<<< HEAD
			if ($rule === false) {
=======
			if ($rule === false)
			{
>>>>>>> upstream/master
				return new JException(JText::sprintf('JLIB_FORM_VALIDATE_FIELD_RULE_MISSING', $rule), -2, E_ERROR);
			}

			// Run the field validation rule test.
			$valid = $rule->test($element, $value, $group, $input, $this);

			// Check for an error in the validation test.
<<<<<<< HEAD
			if (JError::isError($valid)) {
=======
			if (JError::isError($valid))
			{
>>>>>>> upstream/master
				return $valid;
			}
		}

		// Check if the field is valid.
<<<<<<< HEAD
		if ($valid === false) {
=======
		if ($valid === false)
		{
>>>>>>> upstream/master

			// Does the field have a defined error message?
			$message = (string) $element['message'];

<<<<<<< HEAD
			if ($message) {
				return new JException(JText::_($message), 1, E_WARNING);
			}
			else {
=======
			if ($message)
			{
				return new JException(JText::_($message), 1, E_WARNING);
			}
			else
			{
>>>>>>> upstream/master
				return new JException(JText::sprintf('JLIB_FORM_VALIDATE_FIELD_INVALID', JText::_((string) $element['label'])), 1, E_WARNING);
			}
		}

		return true;
	}

	/**
	 * Proxy for {@link JFormHelper::addFieldPath()}.
	 *
	 * @param   mixed  $new  A path or array of paths to add.
	 *
	 * @return  array  The list of paths that have been added.
	 *
	 * @since   11.1
	 */
	public static function addFieldPath($new = null)
	{
		return JFormHelper::addFieldPath($new);
	}

	/**
<<<<<<< HEAD
	 * Proxy for {@link JFormHelper::addFormPath()}.
=======
	 * Proxy for JFormHelper::addFormPath().
>>>>>>> upstream/master
	 *
	 * @param   mixed  $new  A path or array of paths to add.
	 *
	 * @return  array  The list of paths that have been added.
	 *
<<<<<<< HEAD
=======
	 * @see     JFormHelper::addFormPath()
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function addFormPath($new = null)
	{
		return JFormHelper::addFormPath($new);
	}

	/**
<<<<<<< HEAD
	 * Proxy for {@link JFormHelper::addRulePath()}.
=======
	 * Proxy for JFormHelper::addRulePath().
>>>>>>> upstream/master
	 *
	 * @param   mixed  $new  A path or array of paths to add.
	 *
	 * @return  array  The list of paths that have been added.
	 *
<<<<<<< HEAD
=======
	 * @see JFormHelper::addRulePath()
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function addRulePath($new = null)
	{
		return JFormHelper::addRulePath($new);
	}

	/**
	 * Method to get an instance of a form.
	 *
	 * @param   string  $name     The name of the form.
	 * @param   string  $data     The name of an XML file or string to load as the form definition.
	 * @param   array   $options  An array of form options.
	 * @param   string  $replace  Flag to toggle whether form fields should be replaced if a field
<<<<<<< HEAD
	 *                            already exists with the same group/name.
	 * @param   string   $xpath   An optional xpath to search for the fields.
=======
	 * already exists with the same group/name.
	 * @param   string  $xpath    An optional xpath to search for the fields.
>>>>>>> upstream/master
	 *
	 * @return  object  JForm instance.
	 *
	 * @since   11.1
<<<<<<< HEAD
	 * @throws	Exception if an error occurs.
=======
	 * @throws  Exception if an error occurs.
>>>>>>> upstream/master
	 */
	public static function getInstance($name, $data = null, $options = array(), $replace = true, $xpath = false)
	{
		// Reference to array with form instances
		$forms = &self::$forms;

		// Only instantiate the form if it does not already exist.
<<<<<<< HEAD
		if (!isset($forms[$name])) {

			$data = trim($data);

			if (empty($data)) {
=======
		if (!isset($forms[$name]))
		{

			$data = trim($data);

			if (empty($data))
			{
>>>>>>> upstream/master
				throw new Exception(JText::_('JLIB_FORM_ERROR_NO_DATA'));
			}

			// Instantiate the form.
			$forms[$name] = new JForm($name, $options);

			// Load the data.
<<<<<<< HEAD
			if (substr(trim($data), 0, 1) == '<') {
				if ($forms[$name]->load($data, $replace, $xpath) == false) {
=======
			if (substr(trim($data), 0, 1) == '<')
			{
				if ($forms[$name]->load($data, $replace, $xpath) == false)
				{
>>>>>>> upstream/master
					throw new Exception(JText::_('JLIB_FORM_ERROR_XML_FILE_DID_NOT_LOAD'));

					return false;
				}
			}
<<<<<<< HEAD
			else {
				if ($forms[$name]->loadFile($data, $replace, $xpath) == false) {
=======
			else
			{
				if ($forms[$name]->loadFile($data, $replace, $xpath) == false)
				{
>>>>>>> upstream/master
					throw new Exception(JText::_('JLIB_FORM_ERROR_XML_FILE_DID_NOT_LOAD'));

					return false;
				}
			}
		}

		return $forms[$name];
	}

	/**
	 * Adds a new child SimpleXMLElement node to the source.
	 *
<<<<<<< HEAD
	 * @param   SimpleXMLElement	The source element on which to append.
	 * @param   SimpleXMLElement	The new element to append.
=======
	 * @param   SimpleXMLElement  $source  The source element on which to append.
	 * @param   SimpleXMLElement  $new     The new element to append.
	 *
	 * @return  void
	 *
	 * @since   11.1
	 * @throws  Exception if an error occurs.
>>>>>>> upstream/master
	 */
	protected static function addNode(SimpleXMLElement $source, SimpleXMLElement $new)
	{
		// Add the new child node.
		$node = $source->addChild($new->getName(), trim($new));

		// Add the attributes of the child node.
		foreach ($new->attributes() as $name => $value)
		{
			$node->addAttribute($name, $value);
		}

		// Add any children of the new node.
		foreach ($new->children() as $child)
		{
			self::addNode($node, $child);
		}
	}

<<<<<<< HEAD
=======
	/**
	 * Adds a new child SimpleXMLElement node to the source.
	 *
	 * @param   SimpleXMLElement  $source  The source element on which to append.
	 * @param   SimpleXMLElement  $new     The new element to append.
	 *
	 * @return  void
	 *
	 * @since   11.1
	 */
>>>>>>> upstream/master
	protected static function mergeNode(SimpleXMLElement $source, SimpleXMLElement $new)
	{
		// Update the attributes of the child node.
		foreach ($new->attributes() as $name => $value)
		{
<<<<<<< HEAD
			if (isset($source[$name])) {
				$source[$name] = (string) $value;
			}
			else {
=======
			if (isset($source[$name]))
			{
				$source[$name] = (string) $value;
			}
			else
			{
>>>>>>> upstream/master
				$source->addAttribute($name, $value);
			}
		}

		// What to do with child elements?
	}

	/**
	 * Merges new elements into a source <fields> element.
	 *
<<<<<<< HEAD
	 * @param   SimpleXMLElement	The source element.
	 * @param   SimpleXMLElement	The new element to merge.
	 *
	 * @return  void
=======
	 * @param   SimpleXMLElement  $source  The source element.
	 * @param   SimpleXMLElement  $new     The new element to merge.
	 *
	 * @return  void
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected static function mergeNodes(SimpleXMLElement $source, SimpleXMLElement $new)
	{
		// The assumption is that the inputs are at the same relative level.
		// So we just have to scan the children and deal with them.

		// Update the attributes of the child node.
		foreach ($new->attributes() as $name => $value)
		{
<<<<<<< HEAD
			if (isset($source[$name])) {
				$source[$name] = (string) $value;
			} else {
=======
			if (isset($source[$name]))
			{
				$source[$name] = (string) $value;
			}
			else
			{
>>>>>>> upstream/master
				$source->addAttribute($name, $value);
			}
		}

		foreach ($new->children() as $child)
		{
			$type = $child->getName();
			$name = $child['name'];

			// Does this node exist?
<<<<<<< HEAD
			$fields = $source->xpath($type.'[@name="'.$name.'"]');

			if (empty($fields)) {
				// This node does not exist, so add it.
				self::addNode($source, $child);
			}
			else {
				// This node does exist.
				switch ($type) {
=======
			$fields = $source->xpath($type . '[@name="' . $name . '"]');

			if (empty($fields))
			{
				// This node does not exist, so add it.
				self::addNode($source, $child);
			}
			else
			{
				// This node does exist.
				switch ($type)
				{
>>>>>>> upstream/master
					case 'field':
						self::mergeNode($fields[0], $child);
						break;

					default:
						self::mergeNodes($fields[0], $child);
						break;
				}
			}
		}
	}
}
