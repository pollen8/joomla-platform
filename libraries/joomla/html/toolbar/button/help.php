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
 * Renders a help popup window button
 *
 * @package     Joomla.Platform
 * @subpackage  HTML
 * @since       11.1
 */
class JButtonHelp extends JButton
{
	/**
	 * @var    string	Button type
	 */
	protected $_name = 'Help';

	/**
<<<<<<< HEAD
	 * @param   string   $type		Unused string.
	 * @param   string   $ref		The name of the help screen (its key reference).
	 * @param   boolean  $com		Use the help file in the component directory.
	 * @param   string   $override	Use this URL instead of any other.
	 * @param   string   $component	Name of component to get Help (null for current component)
	 *
	 * @return  string
=======
	 * Fetches the button HTML code.
	 *
	 * @param   string   $type       Unused string.
	 * @param   string   $ref        The name of the help screen (its key reference).
	 * @param   boolean  $com        Use the help file in the component directory.
	 * @param   string   $override   Use this URL instead of any other.
	 * @param   string   $component  Name of component to get Help (null for current component)
	 *
	 * @return  string
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function fetchButton($type = 'Help', $ref = '', $com = false, $override = null, $component = null)
	{
<<<<<<< HEAD
		$text	= JText::_('JTOOLBAR_HELP');
		$class	= $this->fetchIconClass('help');
		$doTask	= $this->_getCommand($ref, $com, $override, $component);
=======
		$text = JText::_('JTOOLBAR_HELP');
		$class = $this->fetchIconClass('help');
		$doTask = $this->_getCommand($ref, $com, $override, $component);
>>>>>>> upstream/master

		$html = "<a href=\"#\" onclick=\"$doTask\" rel=\"help\" class=\"toolbar\">\n";
		$html .= "<span class=\"$class\">\n";
		$html .= "</span>\n";
		$html .= "$text\n";
		$html .= "</a>\n";

		return $html;
	}

	/**
	 * Get the button id
	 *
	 * Redefined from JButton class
	 *
	 * @return  string	Button CSS Id
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since       11.1
	 */
	public function fetchId()
	{
<<<<<<< HEAD
		return $this->_parent->getName().'-'."help";
=======
		return $this->_parent->getName() . '-' . "help";
>>>>>>> upstream/master
	}

	/**
	 * Get the JavaScript command for the button
	 *
<<<<<<< HEAD
	 * @param   string   $ref		The name of the help screen (its key reference).
	 * @param   boolean  $com		Use the help file in the component directory.
	 * @param   string   $override	Use this URL instead of any other.
	 * @param   string   $component	Name of component to get Help (null for current component)
	 *
	 * @return  string   JavaScript command string
=======
	 * @param   string   $ref        The name of the help screen (its key reference).
	 * @param   boolean  $com        Use the help file in the component directory.
	 * @param   string   $override   Use this URL instead of any other.
	 * @param   string   $component  Name of component to get Help (null for current component)
	 *
	 * @return  string   JavaScript command string
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function _getCommand($ref, $com, $override, $component)
	{
		// Get Help URL
		jimport('joomla.language.help');
		$url = JHelp::createURL($ref, $com, $override, $component);
		$url = htmlspecialchars($url, ENT_QUOTES);
<<<<<<< HEAD
		$cmd = "popupWindow('$url', '".JText::_('JHELP', true)."', 700, 500, 1)";
=======
		$cmd = "popupWindow('$url', '" . JText::_('JHELP', true) . "', 700, 500, 1)";
>>>>>>> upstream/master

		return $cmd;
	}
}
