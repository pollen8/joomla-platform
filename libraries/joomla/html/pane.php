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
 * JPane abstract class
 *
 * @package     Joomla.Platform
 * @subpackage  HTML
 * @since       11.1
<<<<<<< HEAD
 * @deprecated	in favour of JHtml::_ static helpers
 */
abstract class JPane extends JObject
{

=======
 * @deprecated  12.1    Use JHtml::_ static helpers
 */
abstract class JPane extends JObject
{
>>>>>>> upstream/master
	public $useCookies = false;

	/**
	 * Returns a JPanel object.
	 *
<<<<<<< HEAD
	 * @param   string   $behavior	The behavior to use.
	 * @param   boolean  $useCookies Use cookies to remember the state of the panel.
	 * @param   array    $params		Associative array of values.
	 *
	 * @return  object
	 */
	public static function getInstance($behavior = 'Tabs', $params = array())
	{
		$classname = 'JPane'.$behavior;
=======
	 * @param   string  $behavior  The behavior to use.
	 * @param   array   $params    Associative array of values.
	 *
	 * @return  object
	 *
	 * @deprecated    12.1
	 * @since   11.1
	 *
	 */
	public static function getInstance($behavior = 'Tabs', $params = array())
	{
		// Deprecation warning.
		JLog::add('JPane::getInstance is deprecated.', JLog::WARNING, 'deprecated');

		$classname = 'JPane' . $behavior;
>>>>>>> upstream/master
		$instance = new $classname($params);

		return $instance;
	}

	/**
	 * Creates a pane and creates the javascript object for it.
	 *
<<<<<<< HEAD
	 * @param   string   The pane identifier.
=======
	 * @param   string  $id  The pane identifier.
	 *
	 * @return  string
	 *
	 * @since   11.1
	 *
	 * @deprecated    12.1
>>>>>>> upstream/master
	 */
	abstract public function startPane($id);

	/**
	 * Ends the pane.
<<<<<<< HEAD
=======
	 *
	 * @since   11.1
	 *
	 * @return  string
	 *
	 * @deprecated    12.1
>>>>>>> upstream/master
	 */
	abstract public function endPane();

	/**
	 * Creates a panel with title text and starts that panel.
	 *
<<<<<<< HEAD
	 * @param   string   $text	The panel name and/or title.
	 * @param   string   $id		The panel identifer.
=======
	 * @param   string  $text  The panel name and/or title.
	 * @param   string  $id    The panel identifer.
	 *
	 * @return  string
	 *
	 * @deprecated  12.1
	 * @since   11.1
>>>>>>> upstream/master
	 */
	abstract public function startPanel($text, $id);

	/**
	 * Ends a panel.
	 *
<<<<<<< HEAD
=======
	 * @return  string
	 *
	 * @since   11.1
	 * @deprecated    12.1
>>>>>>> upstream/master
	 */
	abstract public function endPanel();

	/**
	 * Load the javascript behavior and attach it to the document.
	 *
<<<<<<< HEAD
=======
	 * @return  void
	 *
	 * @deprecated    12.1
	 * @since   11.1
>>>>>>> upstream/master
	 */
	abstract protected function _loadBehavior();
}

/**
 * JPanelTabs class to to draw parameter panes.
 *
 * @package     Joomla.Platform
 * @subpackage  HTML
 * @since       11.1
<<<<<<< HEAD
=======
 * @deprecated  Use JHtml::_ static helpers
>>>>>>> upstream/master
 */
class JPaneTabs extends JPane
{
	/**
	 * Constructor.
	 *
<<<<<<< HEAD
	 * @param   array  $params		Associative array of values.
	 */
	function __construct($params = array())
	{
=======
	 * @param   array  $params  Associative array of values
	 *
	 * @return  void
	 *
	 * @since   11.1
	 */
	function __construct($params = array())
	{
		// Deprecation warning.
		JLog::add('JPaneTabs is deprecated.', JLog::WARNING, 'deprecated');

>>>>>>> upstream/master
		static $loaded = false;

		parent::__construct($params);

<<<<<<< HEAD
		if (!$loaded) {
=======
		if (!$loaded)
		{
>>>>>>> upstream/master
			$this->_loadBehavior($params);
			$loaded = true;
		}
	}

	/**
	 * Creates a pane and creates the javascript object for it.
	 *
<<<<<<< HEAD
	 * @param   string The pane identifier.
	 */
	public function startPane($id)
	{
		return '<dl class="tabs" id="'.$id.'">';
=======
	 * @param   string  $id  The pane identifier.
	 *
	 * @return  string  HTML to start the pane dl
	 *
	 * @since   11.1
	 *
	 * @deprecated    12.1
	 */
	public function startPane($id)
	{

		// Deprecation warning.
		JLog::add('JPane::startPane is deprecated.', JLog::WARNING, 'deprecated');

		return '<dl class="tabs" id="' . $id . '">';
>>>>>>> upstream/master
	}

	/**
	 * Ends the pane.
<<<<<<< HEAD
	 */
	public function endPane()
	{
=======
	 *
	 * @return  string  HTML to end the pane dl
	 *
	 * @since   11.1
	 *
	 * @deprecated    12.1
	 */
	public function endPane()
	{
		// Deprecation warning.
		JLog::add('JPaneTabs::endPane is deprecated.', JLog::WARNING, 'deprecated');

>>>>>>> upstream/master
		return "</dl>";
	}

	/**
	 * Creates a tab panel with title text and starts that panel.
	 *
<<<<<<< HEAD
	 * @param   string   $text	The name of the tab
	 * @param   string   $id		The tab identifier
	 */
	public function startPanel($text, $id)
	{
		return '<dt class="'.$id.'"><span>'.$text.'</span></dt><dd>';
=======
	 * @param   string  $text  The name of the tab
	 * @param   string  $id    The tab identifier
	 *
	 * @return  string  HTML for the dt tag.
	 *
	 * @since   11.1
	 *
	 * @deprecated    12.1
	 */
	public function startPanel($text, $id)
	{
		// Deprecation warning.
		JLog::add('JPaneTabs::startPanel is deprecated.', JLog::WARNING, 'deprecated');

		return '<dt class="' . $id . '"><span>' . $text . '</span></dt><dd>';
>>>>>>> upstream/master
	}

	/**
	 * Ends a tab page.
<<<<<<< HEAD
	 */
	public function endPanel()
	{
=======
	 *
	 * @return  string   HTML for the dd tag.
	 *
	 * @since   11.1
	 *
	 * @deprecated    12.1
	 */
	public function endPanel()
	{
		// Deprecation warning.
		JLog::add('JPaneTabs::endPanel is deprecated.', JLog::WARNING, 'deprecated');

>>>>>>> upstream/master
		return "</dd>";
	}

	/**
	 * Load the javascript behavior and attach it to the document.
	 *
<<<<<<< HEAD
	 * @param   array    $params		Associative array of values
	 */
	protected function _loadBehavior($params = array())
	{
=======
	 * @param   array  $params  Associative array of values
	 *
	 * @return  void
	 *
	 * @since   11.1
	 * @deprecated    12.1
	 */
	protected function _loadBehavior($params = array())
	{
		// Deprecation warning.
		JLog::add('JPaneTabs::_loadBehavior is deprecated.', JLog::WARNING, 'deprecated');

>>>>>>> upstream/master
		// Include mootools framework
		JHtml::_('behavior.framework', true);

		$document = JFactory::getDocument();

		$options = '{';
<<<<<<< HEAD
		$opt['onActive']	= (isset($params['onActive'])) ? $params['onActive'] : null ;
		$opt['onBackground'] = (isset($params['onBackground'])) ? $params['onBackground'] : null ;
		$opt['display']		= (isset($params['startOffset'])) ? (int)$params['startOffset'] : null ;
		foreach ($opt as $k => $v)
		{
			if ($v) {
				$options .= $k.': '.$v.',';
			}
		}
		if (substr($options, -1) == ',') {
=======
		$opt['onActive'] = (isset($params['onActive'])) ? $params['onActive'] : null;
		$opt['onBackground'] = (isset($params['onBackground'])) ? $params['onBackground'] : null;
		$opt['display'] = (isset($params['startOffset'])) ? (int) $params['startOffset'] : null;
		foreach ($opt as $k => $v)
		{
			if ($v)
			{
				$options .= $k . ': ' . $v . ',';
			}
		}
		if (substr($options, -1) == ',')
		{
>>>>>>> upstream/master
			$options = substr($options, 0, -1);
		}
		$options .= '}';

<<<<<<< HEAD
		$js = '	window.addEvent(\'domready\', function(){ $$(\'dl.tabs\').each(function(tabs){ new JTabs(tabs, '.$options.'); }); });';

		$document->addScriptDeclaration($js);
		JHtml::_('script','system/tabs.js', false, true);
=======
		$js = '	window.addEvent(\'domready\', function(){ $$(\'dl.tabs\').each(function(tabs){ new JTabs(tabs, ' . $options . '); }); });';

		$document->addScriptDeclaration($js);
		JHtml::_('script', 'system/tabs.js', false, true);
>>>>>>> upstream/master
	}
}

/**
 * JPanelSliders class to to draw parameter panes.
 *
 * @package     Joomla.Platform
 * @subpackage  HTML
 * @since       11.1
<<<<<<< HEAD
=======
 *
 * @deprecated  Use JHtml::_ static helpers
>>>>>>> upstream/master
 */
class JPaneSliders extends JPane
{
	/**
	 * Constructor.
	 *
<<<<<<< HEAD
	 * @param   array    $params	Associative array of values.
	 */
	function __construct($params = array())
	{
=======
	 * @param   array  $params  Associative array of values.
	 *
	 * @since   11.1
	 *
	 * @deprecated    12.1
	 */
	function __construct($params = array())
	{
		// Deprecation warning.
		JLog::add('JPanelSliders::__construct is deprecated.', JLog::WARNING, 'deprecated');

>>>>>>> upstream/master
		static $loaded = false;

		parent::__construct($params);

<<<<<<< HEAD
		if (!$loaded) {
=======
		if (!$loaded)
		{
>>>>>>> upstream/master
			$this->_loadBehavior($params);
			$loaded = true;
		}
	}

	/**
	 * Creates a pane and creates the javascript object for it.
	 *
<<<<<<< HEAD
	 * @param   string The pane identifier.
	 */
	public function startPane($id)
	{
		return '<div id="'.$id.'" class="pane-sliders">';
=======
	 * @param   string  $id  The pane identifier.
	 *
	 * @return  string  HTML to start the slider div.
	 *
	 * @since   11.1
	 *
	 * @deprecated    12.1
	 */
	public function startPane($id)
	{
		// Deprecation warning.
		JLog::add('JPaneSliders::startPane is deprecated.', JLog::WARNING, 'deprecated');

		return '<div id="' . $id . '" class="pane-sliders">';
>>>>>>> upstream/master
	}

	/**
	 * Ends the pane.
<<<<<<< HEAD
	 */
	public function endPane()
	{
=======
	 *
	 * @return  string  HTML to end the slider div.
	 *
	 * @since   11.1
	 *
	 * @deprecated    12.1
	 */
	public function endPane()
	{
		// Deprecation warning.
		JLog::add('JPaneSliders::endPane is deprecated.', JLog::WARNING, 'deprecated');

>>>>>>> upstream/master
		return '</div>';
	}

	/**
	 * Creates a tab panel with title text and starts that panel.
	 *
<<<<<<< HEAD
	 * @param   string   $text	The name of the tab.
	 * @param   string   $id		The tab identifier.
	 */
	public function startPanel($text, $id)
	{
		return '<div class="panel">'
			.'<h3 class="pane-toggler title" id="'.$id.'"><a href="javascript:void(0);"><span>'.$text.'</span></a></h3>'
			.'<div class="pane-slider content">';
=======
	 * @param   string  $text  The name of the tab.
	 * @param   string  $id    The tab identifier.
	 *
	 * @return  string  HTML to start the tab panel div.
	 *
	 * @since   11.1
	 *
	 * @deprecated    12.1
	 */
	public function startPanel($text, $id)
	{
		// Deprecation warning.
		JLog::add('JPaneSliders::startPanel is deprecated.', JLog::WARNING, 'deprecated');

		return '<div class="panel">' . '<h3 class="pane-toggler title" id="' . $id . '"><a href="javascript:void(0);"><span>' . $text
			. '</span></a></h3>' . '<div class="pane-slider content">';
>>>>>>> upstream/master
	}

	/**
	 * Ends a tab page.
<<<<<<< HEAD
	 */
	public function endPanel()
	{
=======
	 *
	 * @return  string  HTML to end the tab divs.
	 *
	 * @since   11.1
	 *
	 * @deprecated    12.1
	 */
	public function endPanel()
	{
		// Deprecation warning.
		JLog::add('JPaneSliders::endPanel is deprecated.', JLog::WARNING, 'deprecated');

>>>>>>> upstream/master
		return '</div></div>';
	}

	/**
	 * Load the javascript behavior and attach it to the document.
	 *
<<<<<<< HEAD
	 * @param   array    $params		Associative array of values.
	 */
	protected function _loadBehavior($params = array())
	{
=======
	 * @param   array  $params  Associative array of values.
	 *
	 * @return  void
	 *
	 * @since 11.1
	 *
	 * @deprecated    12.1
	 */
	protected function _loadBehavior($params = array())
	{
		// Deprecation warning.
		JLog::add('JPaneSliders::_loadBehavior is deprecated.', JLog::WARNING, 'deprecated');

>>>>>>> upstream/master
		// Include mootools framework.
		JHtml::_('behavior.framework', true);

		$document = JFactory::getDocument();

		$options = '{';
<<<<<<< HEAD
		$opt['onActive']	= 'function(toggler, i) { toggler.addClass(\'pane-toggler-down\'); toggler.removeClass(\'pane-toggler\');i.addClass(\'pane-down\');i.removeClass(\'pane-hide\'); }';
		$opt['onBackground'] = 'function(toggler, i) { toggler.addClass(\'pane-toggler\'); toggler.removeClass(\'pane-toggler-down\');i.addClass(\'pane-hide\');i.removeClass(\'pane-down\'); }';
		$opt['duration']	= (isset($params['duration'])) ? (int)$params['duration'] : 300;
		$opt['display']		= (isset($params['startOffset']) && ($params['startTransition'])) ? (int)$params['startOffset'] : null ;
		$opt['show']		= (isset($params['startOffset']) && (!$params['startTransition'])) ? (int)$params['startOffset'] : null ;
		$opt['opacity']		= (isset($params['opacityTransition']) && ($params['opacityTransition'])) ? 'true' : 'false' ;
		$opt['alwaysHide']	= (isset($params['allowAllClose']) && (!$params['allowAllClose'])) ? 'false' : 'true';
		foreach ($opt as $k => $v)
		{
			if ($v) {
				$options .= $k.': '.$v.',';
			}
		}
		if (substr($options, -1) == ',') {
=======
		$opt['onActive'] = 'function(toggler, i) { toggler.addClass(\'pane-toggler-down\');' .
			' toggler.removeClass(\'pane-toggler\');i.addClass(\'pane-down\');i.removeClass(\'pane-hide\'); }';
		$opt['onBackground'] = 'function(toggler, i) { toggler.addClass(\'pane-toggler\');' .
			' toggler.removeClass(\'pane-toggler-down\');i.addClass(\'pane-hide\');i.removeClass(\'pane-down\'); }';
		$opt['duration'] = (isset($params['duration'])) ? (int) $params['duration'] : 300;
		$opt['display'] = (isset($params['startOffset']) && ($params['startTransition'])) ? (int) $params['startOffset'] : null;
		$opt['show'] = (isset($params['startOffset']) && (!$params['startTransition'])) ? (int) $params['startOffset'] : null;
		$opt['opacity'] = (isset($params['opacityTransition']) && ($params['opacityTransition'])) ? 'true' : 'false';
		$opt['alwaysHide'] = (isset($params['allowAllClose']) && (!$params['allowAllClose'])) ? 'false' : 'true';
		foreach ($opt as $k => $v)
		{
			if ($v)
			{
				$options .= $k . ': ' . $v . ',';
			}
		}
		if (substr($options, -1) == ',')
		{
>>>>>>> upstream/master
			$options = substr($options, 0, -1);
		}
		$options .= '}';

<<<<<<< HEAD
		$js = '	window.addEvent(\'domready\', function(){ new Fx.Accordion($$(\'.panel h3.pane-toggler\'), $$(\'.panel div.pane-slider\'), '.$options.'); });';
=======
		$js = '	window.addEvent(\'domready\', function(){ new Fx.Accordion($$(\'.panel h3.pane-toggler\'), $$(\'.panel div.pane-slider\'), '
			. $options . '); });';
>>>>>>> upstream/master

		$document->addScriptDeclaration($js);
	}
}
