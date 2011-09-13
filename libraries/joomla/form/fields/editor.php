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

jimport('joomla.html.editor');
jimport('joomla.form.formfield');

/**
<<<<<<< HEAD
 * Form Field class for the Joomla Framework.
 *
 * @package     Joomla.Platform
 * @subpackage  Form
=======
 * Form Field class for the Joomla Platform.
 * An editarea field for content creation
 *
 * @package     Joomla.Platform
 * @subpackage  Form
 * @see         JFormfieldEditors
 * @see         JEditor
>>>>>>> upstream/master
 * @since       11.1
 */
class JFormFieldEditor extends JFormField
{
	/**
	 * The form field type.
	 *
	 * @var    string
	 * @since  11.1
	 */
	public $type = 'Editor';

	/**
	 * The JEditor object.
	 *
	 * @var    object
	 * @since  11.1
	 */
	protected $editor;

	/**
<<<<<<< HEAD
	 * Method to get the field input markup.
	 *
	 * @return  string  The field input markup.
=======
	 * Method to get the field input markup for the editor area
	 *
	 * @return  string  The field input markup.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function getInput()
	{
		// Initialize some field attributes.
<<<<<<< HEAD
		$rows		= (int) $this->element['rows'];
		$cols		= (int) $this->element['cols'];
		$height		= ((string) $this->element['height']) ? (string) $this->element['height'] : '250';
		$width		= ((string) $this->element['width']) ? (string) $this->element['width'] : '100%';
		$assetField	= $this->element['asset_field'] ? (string) $this->element['asset_field'] : 'asset_id';
		$authorField= $this->element['created_by_field'] ? (string) $this->element['created_by_field'] : 'created_by';
		$asset		= $this->form->getValue($assetField) ? $this->form->getValue($assetField) : (string) $this->element['asset_id'] ;
=======
		$rows = (int) $this->element['rows'];
		$cols = (int) $this->element['cols'];
		$height = ((string) $this->element['height']) ? (string) $this->element['height'] : '250';
		$width = ((string) $this->element['width']) ? (string) $this->element['width'] : '100%';
		$assetField = $this->element['asset_field'] ? (string) $this->element['asset_field'] : 'asset_id';
		$authorField = $this->element['created_by_field'] ? (string) $this->element['created_by_field'] : 'created_by';
		$asset = $this->form->getValue($assetField) ? $this->form->getValue($assetField) : (string) $this->element['asset_id'];
>>>>>>> upstream/master

		// Build the buttons array.
		$buttons = (string) $this->element['buttons'];

<<<<<<< HEAD
		if ($buttons == 'true' || $buttons == 'yes' || $buttons == '1') {
			$buttons = true;
		}
		else if ($buttons == 'false' || $buttons == 'no' || $buttons == '0') {
			$buttons = false;
		}
		else {
			$buttons = explode(',', $buttons);
		}

		$hide = ((string) $this->element['hide']) ? explode(',',(string) $this->element['hide']) : array();
=======
		if ($buttons == 'true' || $buttons == 'yes' || $buttons == '1')
		{
			$buttons = true;
		}
		else if ($buttons == 'false' || $buttons == 'no' || $buttons == '0')
		{
			$buttons = false;
		}
		else
		{
			$buttons = explode(',', $buttons);
		}

		$hide = ((string) $this->element['hide']) ? explode(',', (string) $this->element['hide']) : array();
>>>>>>> upstream/master

		// Get an editor object.
		$editor = $this->getEditor();

<<<<<<< HEAD
		return $editor->display($this->name, htmlspecialchars($this->value, ENT_COMPAT, 'UTF-8'), $width, $height, $cols, $rows, $buttons ? (is_array($buttons) ? array_merge($buttons,$hide) : $hide) : false, $this->id, $asset, $this->form->getValue($authorField));
=======
		return $editor
			->display(
				$this->name, htmlspecialchars($this->value, ENT_COMPAT, 'UTF-8'), $width, $height, $cols, $rows,
				$buttons ? (is_array($buttons) ? array_merge($buttons, $hide) : $hide) : false, $this->id, $asset,
				$this->form->getValue($authorField)
			);
>>>>>>> upstream/master
	}

	/**
	 * Method to get a JEditor object based on the form field.
	 *
	 * @return  object  The JEditor object.
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function &getEditor()
	{
		// Only create the editor if it is not already created.
<<<<<<< HEAD
		if (empty($this->editor)) {
=======
		if (empty($this->editor))
		{
>>>>>>> upstream/master
			// Initialize variables.
			$editor = null;

			// Get the editor type attribute. Can be in the form of: editor="desired|alternative".
			$type = trim((string) $this->element['editor']);

<<<<<<< HEAD
			if ($type) {
=======
			if ($type)
			{
>>>>>>> upstream/master
				// Get the list of editor types.
				$types = explode('|', $type);

				// Get the database object.
				$db = JFactory::getDBO();

				// Iterate over teh types looking for an existing editor.
				foreach ($types as $element)
				{
					// Build the query.
<<<<<<< HEAD
					$query	= $db->getQuery(true);
					$query->select('element');
					$query->from('#__extensions');
					$query->where('element = '.$db->quote($element));
					$query->where('folder = '.$db->quote('editors'));
=======
					$query = $db->getQuery(true);
					$query->select('element');
					$query->from('#__extensions');
					$query->where('element = ' . $db->quote($element));
					$query->where('folder = ' . $db->quote('editors'));
>>>>>>> upstream/master
					$query->where('enabled = 1');

					// Check of the editor exists.
					$db->setQuery($query, 0, 1);
					$editor = $db->loadResult();

					// If an editor was found stop looking.
<<<<<<< HEAD
					if ($editor) {
=======
					if ($editor)
					{
>>>>>>> upstream/master
						break;
					}
				}
			}

			// Create the JEditor intance based on the given editor.
			$this->editor = JFactory::getEditor($editor ? $editor : null);
		}

		return $this->editor;
	}

	/**
	 * Method to get the JEditor output for an onSave event.
	 *
	 * @return  string  The JEditor object output.
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function save()
	{
		return $this->getEditor()->save($this->id);
	}
}
