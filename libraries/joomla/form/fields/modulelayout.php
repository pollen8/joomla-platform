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
jimport('joomla.filesystem.file');
jimport('joomla.filesystem.folder');
jimport('joomla.form.formfield');
jimport('joomla.form.helper');

/**
<<<<<<< HEAD
 * Form Field to display a list of the layouts for a module view from the module or template overrides.
=======
 * Form Field to display a list of the layouts for module display from the module or template overrides.
>>>>>>> upstream/master
 *
 * @package     Joomla.Platform
 * @subpackage  Form
 * @since       11.1
 */
class JFormFieldModuleLayout extends JFormField
{
	/**
	 * The form field type.
	 *
	 * @var    string
	 * @since  11.1
	 */
	protected $type = 'ModuleLayout';

	/**
<<<<<<< HEAD
	 * Method to get the field input.
	 *
	 * @return  string  The field input.
=======
	 * Method to get the field input for module layouts.
	 *
	 * @return  string  The field input.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function getInput()
	{
		// Initialize variables.

		// Get the client id.
		$clientName = $this->element['client_id'];

		// Get the client id.
		$clientId = $this->element['client_id'];

<<<<<<< HEAD
		if (is_null($clientId) && $this->form instanceof JForm) {
=======
		if (is_null($clientId) && $this->form instanceof JForm)
		{
>>>>>>> upstream/master
			$clientId = $this->form->getValue('client_id');
		}
		$clientId = (int) $clientId;

<<<<<<< HEAD
		$client	= JApplicationHelper::getClientInfo($clientId);
=======
		$client = JApplicationHelper::getClientInfo($clientId);
>>>>>>> upstream/master

		// Get the module.
		$module = (string) $this->element['module'];

<<<<<<< HEAD
		if (empty($module) && ($this->form instanceof JForm)) {
=======
		if (empty($module) && ($this->form instanceof JForm))
		{
>>>>>>> upstream/master
			$module = $this->form->getValue('module');
		}

		$module = preg_replace('#\W#', '', $module);

		// Get the template.
		$template = (string) $this->element['template'];
		$template = preg_replace('#\W#', '', $template);

		// Get the style.
<<<<<<< HEAD
		if ($this->form instanceof JForm) {
=======
		if ($this->form instanceof JForm)
		{
>>>>>>> upstream/master
			$template_style_id = $this->form->getValue('template_style_id');
		}

		$template_style_id = preg_replace('#\W#', '', $template_style_id);

		// If an extension and view are present build the options.
<<<<<<< HEAD
		if ($module && $client) {

			// Load language file
			$lang = JFactory::getLanguage();
				$lang->load($module.'.sys', $client->path, null, false, false)
			||	$lang->load($module.'.sys', $client->path.'/modules/'.$module, null, false, false)
			||	$lang->load($module.'.sys', $client->path, $lang->getDefault(), false, false)
			||	$lang->load($module.'.sys', $client->path.'/modules/'.$module, $lang->getDefault(), false, false);

			// Get the database object and a new query object.
			$db		= JFactory::getDBO();
			$query	= $db->getQuery(true);
=======
		if ($module && $client)
		{

			// Load language file
			$lang = JFactory::getLanguage();
			$lang->load($module . '.sys', $client->path, null, false, false)
				|| $lang->load($module . '.sys', $client->path . '/modules/' . $module, null, false, false)
				|| $lang->load($module . '.sys', $client->path, $lang->getDefault(), false, false)
				|| $lang->load($module . '.sys', $client->path . '/modules/' . $module, $lang->getDefault(), false, false);

			// Get the database object and a new query object.
			$db = JFactory::getDBO();
			$query = $db->getQuery(true);
>>>>>>> upstream/master

			// Build the query.
			$query->select('element, name');
			$query->from('#__extensions as e');
<<<<<<< HEAD
			$query->where('e.client_id = '.(int) $clientId);
			$query->where('e.type = '.$db->quote('template'));
			$query->where('e.enabled = 1');

			if ($template) {
				$query->where('e.element = '.$db->quote($template));
			}

			if ($template_style_id) {
				$query->join('LEFT', '#__template_styles as s on s.template=e.element');
				$query->where('s.id='.(int)$template_style_id);
=======
			$query->where('e.client_id = ' . (int) $clientId);
			$query->where('e.type = ' . $db->quote('template'));
			$query->where('e.enabled = 1');

			if ($template)
			{
				$query->where('e.element = ' . $db->quote($template));
			}

			if ($template_style_id)
			{
				$query->join('LEFT', '#__template_styles as s on s.template=e.element');
				$query->where('s.id=' . (int) $template_style_id);
>>>>>>> upstream/master
			}

			// Set the query and load the templates.
			$db->setQuery($query);
			$templates = $db->loadObjectList('element');

			// Check for a database error.
<<<<<<< HEAD
			if ($db->getErrorNum()) {
=======
			if ($db->getErrorNum())
			{
>>>>>>> upstream/master
				JError::raiseWarning(500, $db->getErrorMsg());
			}

			// Build the search paths for module layouts.
<<<<<<< HEAD
			$module_path = JPath::clean($client->path.'/modules/'.$module.'/tmpl');
=======
			$module_path = JPath::clean($client->path . '/modules/' . $module . '/tmpl');
>>>>>>> upstream/master

			// Prepare array of component layouts
			$module_layouts = array();

			// Prepare the grouped list
<<<<<<< HEAD
			$groups=array();

			// Add the layout options from the module path.
			if (is_dir($module_path) && ($module_layouts = JFolder::files($module_path, '^[^_]*\.php$'))) {
				// Create the group for the module
				$groups['_']=array();
				$groups['_']['id']=$this->id.'__';
				$groups['_']['text']=JText::sprintf('JOPTION_FROM_MODULE');
				$groups['_']['items']=array();
=======
			$groups = array();

			// Add the layout options from the module path.
			if (is_dir($module_path) && ($module_layouts = JFolder::files($module_path, '^[^_]*\.php$')))
			{
				// Create the group for the module
				$groups['_'] = array();
				$groups['_']['id'] = $this->id . '__';
				$groups['_']['text'] = JText::sprintf('JOPTION_FROM_MODULE');
				$groups['_']['items'] = array();
>>>>>>> upstream/master

				foreach ($module_layouts as $file)
				{
					// Add an option to the module group
					$value = JFile::stripExt($file);
<<<<<<< HEAD
					$text = $lang->hasKey($key = strtoupper($module.'_LAYOUT_'.$value)) ? JText::_($key) : $value;
					$groups['_']['items'][]	= JHtml::_('select.option', '_:'.$value, $text);
=======
					$text = $lang->hasKey($key = strtoupper($module . '_LAYOUT_' . $value)) ? JText::_($key) : $value;
					$groups['_']['items'][] = JHtml::_('select.option', '_:' . $value, $text);
>>>>>>> upstream/master
				}
			}

			// Loop on all templates
<<<<<<< HEAD
			if ($templates) {
				foreach ($templates as $template)
				{
					// Load language file
						$lang->load('tpl_'.$template->element.'.sys', $client->path, null, false, false)
					||	$lang->load('tpl_'.$template->element.'.sys', $client->path.'/templates/'.$template->element, null, false, false)
					||	$lang->load('tpl_'.$template->element.'.sys', $client->path, $lang->getDefault(), false, false)
					||	$lang->load('tpl_'.$template->element.'.sys', $client->path.'/templates/'.$template->element, $lang->getDefault(), false, false);

					$template_path = JPath::clean($client->path.'/templates/'.$template->element.'/html/'.$module);

					// Add the layout options from the template path.
					if (is_dir($template_path) && ($files = JFolder::files($template_path, '^[^_]*\.php$'))) {
						foreach ($files as $i=>$file)
						{
							// Remove layout that already exist in component ones
							if (in_array($file, $module_layouts)) {
=======
			if ($templates)
			{
				foreach ($templates as $template)
				{
					// Load language file
					$lang->load('tpl_' . $template->element . '.sys', $client->path, null, false, false)
						|| $lang->load('tpl_' . $template->element . '.sys', $client->path . '/templates/' . $template->element, null, false, false)
						|| $lang->load('tpl_' . $template->element . '.sys', $client->path, $lang->getDefault(), false, false)
						|| $lang->load(
							'tpl_' . $template->element . '.sys', $client->path . '/templates/' . $template->element, $lang->getDefault(),
							false, false
						);

					$template_path = JPath::clean($client->path . '/templates/' . $template->element . '/html/' . $module);

					// Add the layout options from the template path.
					if (is_dir($template_path) && ($files = JFolder::files($template_path, '^[^_]*\.php$')))
					{
						foreach ($files as $i => $file)
						{
							// Remove layout that already exist in component ones
							if (in_array($file, $module_layouts))
							{
>>>>>>> upstream/master
								unset($files[$i]);
							}
						}

<<<<<<< HEAD
						if (count($files)) {
							// Create the group for the template
							$groups[$template->element]=array();
							$groups[$template->element]['id']=$this->id.'_'.$template->element;
							$groups[$template->element]['text']=JText::sprintf('JOPTION_FROM_TEMPLATE', $template->name);
							$groups[$template->element]['items']=array();
=======
						if (count($files))
						{
							// Create the group for the template
							$groups[$template->element] = array();
							$groups[$template->element]['id'] = $this->id . '_' . $template->element;
							$groups[$template->element]['text'] = JText::sprintf('JOPTION_FROM_TEMPLATE', $template->name);
							$groups[$template->element]['items'] = array();
>>>>>>> upstream/master

							foreach ($files as $file)
							{
								// Add an option to the template group
								$value = JFile::stripExt($file);
<<<<<<< HEAD
								$text = $lang->hasKey($key = strtoupper('TPL_'.$template->element.'_'.$module.'_LAYOUT_'.$value)) ? JText::_($key) : $value;
								$groups[$template->element]['items'][]	= JHtml::_('select.option', $template->element.':'.$value, $text);
=======
								$text = $lang->hasKey($key = strtoupper('TPL_' . $template->element . '_' . $module . '_LAYOUT_' . $value))
									? JText::_($key) : $value;
								$groups[$template->element]['items'][] = JHtml::_('select.option', $template->element . ':' . $value, $text);
>>>>>>> upstream/master
							}
						}
					}
				}
			}
			// Compute attributes for the grouped list
<<<<<<< HEAD
			$attr = $this->element['size'] ? ' size="'.(int) $this->element['size'].'"' : '';
=======
			$attr = $this->element['size'] ? ' size="' . (int) $this->element['size'] . '"' : '';
>>>>>>> upstream/master

			// Prepare HTML code
			$html = array();

			// Compute the current selected values
			$selected = array($this->value);

			// Add a grouped list
<<<<<<< HEAD
			$html[] = JHtml::_('select.groupedlist', $groups, $this->name, array('id'=>$this->id, 'group.id'=>'id', 'list.attr'=>$attr, 'list.select'=>$selected));

			return implode($html);
		}
		else {
=======
			$html[] = JHtml::_(
				'select.groupedlist', $groups, $this->name,
				array('id' => $this->id, 'group.id' => 'id', 'list.attr' => $attr, 'list.select' => $selected)
			);

			return implode($html);
		}
		else
		{
>>>>>>> upstream/master

			return '';
		}
	}
}
