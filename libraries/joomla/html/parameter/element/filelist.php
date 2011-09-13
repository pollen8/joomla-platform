<?php
/**
 * @package     Joomla.Platform
 * @subpackage  HTML
 *
 * @copyright   Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('JPATH_PLATFORM') or die;

/**
 * Renders a filelist element
 *
 * @package     Joomla.Platform
 * @subpackage  Parameter
 * @since       11.1
<<<<<<< HEAD
 * @deprecated  use JForm instead
 */

class JElementFilelist extends JElement
{
	/**
	* Element name
	*
	* @var    string
	*/
	protected $_name = 'Filelist';

	public function fetchElement($name, $value, &$node, $control_name)
	{
=======
 * @deprecated  use JFormFieldFileList instead
 */
class JElementFilelist extends JElement
{
	/**
	 * Element name
	 *
	 * @var    string
	 */
	protected $_name = 'Filelist';

	/**
	 * Fetch a filelist element
	 *
	 * @param   string  $name          Element name
	 * @param   string  $value         Element value
	 * @param   object  &$node         Element object
	 * @param   string  $control_name  Control name
	 *
	 * @return  string
	 *
	 * @deprecated    12.1   Use JFormFieldFileList::getOptions instead
	 * @since   11.1
	 */
	public function fetchElement($name, $value, &$node, $control_name)
	{
		// Deprecation warning.
		JLog::add('JElementFileList::fetchElement() is deprecated.', JLog::WARNING, 'deprecated');

>>>>>>> upstream/master
		jimport('joomla.filesystem.folder');
		jimport('joomla.filesystem.file');

		// path to images directory
<<<<<<< HEAD
		$path		= JPATH_ROOT.DS.$node->attributes('directory');
		$filter		= $node->attributes('filter');
		$exclude	= $node->attributes('exclude');
		$stripExt	= $node->attributes('stripext');
		$files		= JFolder::files($path, $filter);

		$options = array ();
=======
		$path = JPATH_ROOT . '/' . $node->attributes('directory');
		$filter = $node->attributes('filter');
		$exclude = $node->attributes('exclude');
		$stripExt = $node->attributes('stripext');
		$files = JFolder::files($path, $filter);

		$options = array();
>>>>>>> upstream/master

		if (!$node->attributes('hide_none'))
		{
			$options[] = JHtml::_('select.option', '-1', JText::_('JOPTION_DO_NOT_USE'));
		}

		if (!$node->attributes('hide_default'))
		{
			$options[] = JHtml::_('select.option', '', JText::_('JOPTION_USE_DEFAULT'));
		}

		if (is_array($files))
		{
			foreach ($files as $file)
			{
				if ($exclude)
				{
					if (preg_match(chr(1) . $exclude . chr(1), $file))
					{
						continue;
					}
				}
				if ($stripExt)
				{
					$file = JFile::stripExt($file);
				}
				$options[] = JHtml::_('select.option', $file, $file);
			}
		}

<<<<<<< HEAD
		return JHtml::_('select.genericlist', $options, $control_name .'['. $name .']',
			array(
				'id' => 'param'.$name,
				'list.attr' => 'class="inputbox"',
				'list.select' => $value
			)
=======
		return JHtml::_(
			'select.genericlist',
			$options,
			$control_name . '[' . $name . ']',
			array('id' => 'param' . $name, 'list.attr' => 'class="inputbox"', 'list.select' => $value)
>>>>>>> upstream/master
		);
	}
}
