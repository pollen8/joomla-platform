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
 * Renders a button separator
 *
 * @package     Joomla.Platform
 * @subpackage  HTML
 * @since       11.1
 */
class JButtonSeparator extends JButton
{
	/**
	 * Button type
	 *
	 * @var   string
	 */
	protected $_name = 'Separator';

<<<<<<< HEAD
	public function render(&$definition)
	{
		// Initialise variables.
		$class	= null;
		$style	= null;
=======
	/**
	 * Get the HTML for a separator in the toolbar
	 *
	 * @param   array  &$definition  Class name and custom width
	 *
	 * @return  The HTML for the separator
	 *
	 * @since  11.1
	 *
	 * @see    JButton::render()
	 */
	public function render(&$definition)
	{
		// Initialise variables.
		$class = null;
		$style = null;
>>>>>>> upstream/master

		// Separator class name
		$class = (empty($definition[1])) ? 'spacer' : $definition[1];
		// Custom width
<<<<<<< HEAD
		$style = (empty($definition[2])) ? null : ' style="width:' .  intval($definition[2]) . 'px;"';
=======
		$style = (empty($definition[2])) ? null : ' style="width:' . intval($definition[2]) . 'px;"';
>>>>>>> upstream/master

		return '<li class="' . $class . '"' . $style . ">\n</li>\n";
	}

	/**
<<<<<<< HEAD
	 * Empty implementation (not required)
=======
	 * Empty implementation (not required for separator)
	 *
	 * @return  void
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function fetchButton()
	{
	}
}
