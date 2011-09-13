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
 * Utility class for Tabs elements.
 *
 * @package     Joomla.Platform
 * @subpackage  HTML
<<<<<<< HEAD
 * @version		1.6
=======
 * @since       11.2
>>>>>>> upstream/master
 */
abstract class JHtmlTabs
{
	/**
	 * Creates a panes and creates the JavaScript object for it.
	 *
<<<<<<< HEAD
	 * @param   string  The pane identifier
	 * @param   array   An array of option.
	 * @return  string
	 * @since   11.1
	 */
	public static function start($group='tabs', $params=array())
	{
		JHtmlTabs::_loadBehavior($group,$params);

		return '<dl class="tabs" id="'.$group.'"><dt style="display:none;"></dt><dd style="display:none;">';
=======
	 * @param   string  $group   The pane identifier.
	 * @param   array   $params  An array of option.
	 *
	 * @return  string
	 *
	 * @since   11.1
	 */
	public static function start($group = 'tabs', $params = array())
	{
		JHtmlTabs::_loadBehavior($group, $params);

		return '<dl class="tabs" id="' . $group . '"><dt style="display:none;"></dt><dd style="display:none;">';
>>>>>>> upstream/master
	}

	/**
	 * Close the current pane
	 *
<<<<<<< HEAD
	 * @return  string
=======
	 * @return  string  HTML to close the pane
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function end()
	{
		return '</dd></dl>';
	}

	/**
	 * Begins the display of a new panel.
	 *
<<<<<<< HEAD
	 * @param   string  Text to display.
	 * @param   string  Identifier of the panel.
	 * @return  string
=======
	 * @param   string  $text  Text to display.
	 * @param   string  $id    Identifier of the panel.
	 *
	 * @return  string  HTML to start a new panel
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public static function panel($text, $id)
	{
<<<<<<< HEAD
		return '</dd><dt class="tabs '.$id.'"><span><h3><a href="javascript:void(0);">'.$text.'</a></h3></span></dt><dd class="tabs">';
=======
		return '</dd><dt class="tabs ' . $id . '"><span><h3><a href="javascript:void(0);">' . $text . '</a></h3></span></dt><dd class="tabs">';
>>>>>>> upstream/master
	}

	/**
	 * Load the JavaScript behavior.
	 *
<<<<<<< HEAD
	 * @param   string  The pane identifier.
	 * @param   array  Array of options.
	 * @return  void
=======
	 * @param   string  $group   The pane identifier.
	 * @param   array   $params  Array of options.
	 *
	 * @return  void
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected static function _loadBehavior($group, $params = array())
	{
		static $loaded = array();

<<<<<<< HEAD
		if (!array_key_exists($group,$loaded))
=======
		if (!array_key_exists($group, $loaded))
>>>>>>> upstream/master
		{
			// Include MooTools framework
			JHtml::_('behavior.framework', true);

<<<<<<< HEAD
			$display = (isset($params['startOffset'])) ? (int)$params['startOffset'] : null ;
			$options = '{';
			$opt['onActive']			= (isset($params['onActive'])) ? $params['onActive'] : null ;
			$opt['onBackground']		= (isset($params['onBackground'])) ? $params['onBackground'] : null ;
			$opt['display']				= (isset($params['useCookie']) && $params['useCookie']) ? JRequest::getInt('jpanetabs_' . $group, $display, 'cookie') : $display ;
			$opt['titleSelector']		= "'dt.tabs'";
			$opt['descriptionSelector']	= "'dd.tabs'";
			foreach ($opt as $k => $v)
			{
				if ($v) {
					$options .= $k.': '.$v.',';
				}
			}
			if (substr($options, -1) == ',') {
				$options = substr($options, 0, -1);
			}
			$options .= '}';

			$js = '	window.addEvent(\'domready\', function(){ $$(\'dl#'.$group.'.tabs\').each(function(tabs){ new JTabs(tabs, '.$options.'); }); });';

			$document = JFactory::getDocument();
			$document->addScriptDeclaration($js);
			JHtml::_('script','system/tabs.js', false, true);
=======
			$options = '{';
			$opt['onActive'] = (isset($params['onActive'])) ? $params['onActive'] : null;
			$opt['onBackground'] = (isset($params['onBackground'])) ? $params['onBackground'] : null;
			$opt['display'] = (isset($params['startOffset'])) ? (int) $params['startOffset'] : null;
			$opt['useStorage'] = (isset($params['useCookie']) && $params['useCookie']) ? 'true' : null;
			$opt['titleSelector'] = "'dt.tabs'";
			$opt['descriptionSelector'] = "'dd.tabs'";

			foreach ($opt as $k => $v)
			{
				if ($v)
				{
					$options .= $k . ': ' . $v . ',';
				}
			}

			if (substr($options, -1) == ',')
			{
				$options = substr($options, 0, -1);
			}

			$options .= '}';

			$js = '	window.addEvent(\'domready\', function(){
						$$(\'dl#' . $group . '.tabs\').each(function(tabs){
							new JTabs(tabs, ' . $options . ');
						});
					});';

			$document = JFactory::getDocument();
			$document->addScriptDeclaration($js);
			JHtml::_('script', 'system/tabs.js', false, true);
>>>>>>> upstream/master

			$loaded[$group] = true;
		}
	}
}
