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
 * Provides a list of installed editors.
 *
 * @package     Joomla.Platform
 * @subpackage  Form
 * @see         JFormFieldEditor
>>>>>>> upstream/master
 * @since       11.1
 */
class JFormFieldEditors extends JFormFieldList
{
	/**
	 * The form field type.
	 *
	 * @var    string
	 * @since  11.1
	 */
	public $type = 'Editors';

	/**
<<<<<<< HEAD
	 * Method to get the field options.
	 *
	 * @return  array  The field option objects.
=======
	 * Method to get the field options for the list of installed editors.
	 *
	 * @return  array  The field option objects.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function getOptions()
	{
		// Get the database object and a new query object.
<<<<<<< HEAD
		$db		= JFactory::getDBO();
		$query	= $db->getQuery(true);
=======
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
>>>>>>> upstream/master

		// Build the query.
		$query->select('element AS value, name AS text');
		$query->from('#__extensions');
<<<<<<< HEAD
		$query->where('folder = '.$db->quote('editors'));
=======
		$query->where('folder = ' . $db->quote('editors'));
>>>>>>> upstream/master
		$query->where('enabled = 1');
		$query->order('ordering, name');

		// Set the query and load the options.
		$db->setQuery($query);
		$options = $db->loadObjectList();
		$lang = JFactory::getLanguage();
<<<<<<< HEAD
		foreach ($options as $i=>$option) {
				$lang->load('plg_editors_'.$option->value, JPATH_ADMINISTRATOR, null, false, false)
			||	$lang->load('plg_editors_'.$option->value, JPATH_PLUGINS .'/editors/'.$option->value, null, false, false)
			||	$lang->load('plg_editors_'.$option->value, JPATH_ADMINISTRATOR, $lang->getDefault(), false, false)
			||	$lang->load('plg_editors_'.$option->value, JPATH_PLUGINS .'/editors/'.$option->value, $lang->getDefault(), false, false);
=======
		foreach ($options as $i => $option)
		{
			$lang->load('plg_editors_' . $option->value, JPATH_ADMINISTRATOR, null, false, false)
				|| $lang->load('plg_editors_' . $option->value, JPATH_PLUGINS . '/editors/' . $option->value, null, false, false)
				|| $lang->load('plg_editors_' . $option->value, JPATH_ADMINISTRATOR, $lang->getDefault(), false, false)
				|| $lang->load('plg_editors_' . $option->value, JPATH_PLUGINS . '/editors/' . $option->value, $lang->getDefault(), false, false);
>>>>>>> upstream/master
			$options[$i]->text = JText::_($option->text);
		}

		// Check for a database error.
<<<<<<< HEAD
		if ($db->getErrorNum()) {
=======
		if ($db->getErrorNum())
		{
>>>>>>> upstream/master
			JError::raiseWarning(500, $db->getErrorMsg());
		}

		// Merge any additional options in the XML definition.
		$options = array_merge(parent::getOptions(), $options);

		return $options;
	}
}
