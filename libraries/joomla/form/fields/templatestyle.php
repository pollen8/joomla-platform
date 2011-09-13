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
JFormHelper::loadFieldClass('groupedlist');

/**
<<<<<<< HEAD
 * Form Field class for the Joomla Framework.
=======
 * Form Field class for the Joomla Platform.
 * Supports a select grouped list of template styles
>>>>>>> upstream/master
 *
 * @package     Joomla.Platform
 * @subpackage  Form
 * @since       11.1
 */
class JFormFieldTemplateStyle extends JFormFieldGroupedList
{
<<<<<<< HEAD
=======

>>>>>>> upstream/master
	/**
	 * The form field type.
	 *
	 * @var    string
	 * @since  11.1
	 */
	public $type = 'TemplateStyle';

	/**
<<<<<<< HEAD
	 * Method to get the field option groups.
	 *
	 * @return  array  The field option objects as a nested array in groups.
=======
	 * Method to get the list of template style options
	 * grouped by template.
	 * Use the client attribute to specify a specific client.
	 * Use the template attribute to specify a specific template
	 *
	 * @return  array  The field option objects as a nested array in groups.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function getGroups()
	{
		// Initialize variables.
		$groups = array();
		$lang = JFactory::getLanguage();

		// Get the client and client_id.
		$clientName = $this->element['client'] ? (string) $this->element['client'] : 'site';
		$client = JApplicationHelper::getClientInfo($clientName, true);

		// Get the template.
		$template = (string) $this->element['template'];

		// Get the database object and a new query object.
<<<<<<< HEAD
		$db		= JFactory::getDBO();
		$query	= $db->getQuery(true);
=======
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
>>>>>>> upstream/master

		// Build the query.
		$query->select('s.id, s.title, e.name as name, s.template');
		$query->from('#__template_styles as s');
<<<<<<< HEAD
		$query->where('s.client_id = '.(int) $client->id);
		$query->order('template');
		$query->order('title');
		if ($template) {
			$query->where('s.template = '.$db->quote($template));
		}
		$query->join('LEFT', '#__extensions as e on e.element=s.template');
=======
		$query->where('s.client_id = ' . (int) $client->id);
		$query->order('template');
		$query->order('title');
		if ($template)
		{
			$query->where('s.template = ' . $db->quote($template));
		}
		$query->join('LEFT', '#__extensions as e on e.element=s.template');
		$query->where('e.enabled=1');
>>>>>>> upstream/master

		// Set the query and load the styles.
		$db->setQuery($query);
		$styles = $db->loadObjectList();

		// Build the grouped list array.
		if ($styles)
		{
<<<<<<< HEAD
			foreach($styles as $style) {
				$template = $style->template;
				$lang->load('tpl_'.$template.'.sys', $client->path, null, false, false)
			||	$lang->load('tpl_'.$template.'.sys', $client->path.'/templates/'.$template, null, false, false)
			||	$lang->load('tpl_'.$template.'.sys', $client->path, $lang->getDefault(), false, false)
			||	$lang->load('tpl_'.$template.'.sys', $client->path.'/templates/'.$template, $lang->getDefault(), false,false);
				$name = JText::_($style->name);
				// Initialize the group if necessary.
				if (!isset($groups[$name])) {
=======
			foreach ($styles as $style)
			{
				$template = $style->template;
				$lang->load('tpl_' . $template . '.sys', $client->path, null, false, false)
					|| $lang->load('tpl_' . $template . '.sys', $client->path . '/templates/' . $template, null, false, false)
					|| $lang->load('tpl_' . $template . '.sys', $client->path, $lang->getDefault(), false, false)
					|| $lang->load('tpl_' . $template . '.sys', $client->path . '/templates/' . $template, $lang->getDefault(), false, false);
				$name = JText::_($style->name);
				// Initialize the group if necessary.
				if (!isset($groups[$name]))
				{
>>>>>>> upstream/master
					$groups[$name] = array();
				}

				$groups[$name][] = JHtml::_('select.option', $style->id, $style->title);
			}
		}

		// Merge any additional groups in the XML definition.
		$groups = array_merge(parent::getGroups(), $groups);

		return $groups;
	}
<<<<<<< HEAD
}
=======
}
>>>>>>> upstream/master
