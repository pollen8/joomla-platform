<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Base
 *
 * @copyright   Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

<<<<<<< HEAD
defined('JPATH_PLATFORM') or die;
=======
defined('JPATH_PLATFORM') or die();
>>>>>>> upstream/master

/**
 * Abstract observer class to implement the observer design pattern
 *
 * @package     Joomla.Platform
 * @subpackage  Base
 * @since       11.1
 */
abstract class JObserver extends JObject
{
	/**
	 * Event object to observe.
	 *
	 * @var    object
	 * @since  11.1
	 */
	protected $_subject = null;

	/**
	 * Constructor
	 *
<<<<<<< HEAD
	 * @param   object  $subject  The object to observe.
=======
	 * @param   object  &$subject  The object to observe.
>>>>>>> upstream/master
	 *
	 * @return  JObserver
	 *
	 * @since   11.1
	 */
	public function __construct(&$subject)
	{
		// Register the observer ($this) so we can be notified
		$subject->attach($this);

		// Set the subject to observe
		$this->_subject = &$subject;
	}

	/**
	 * Method to update the state of observable objects
	 *
<<<<<<< HEAD
	 * @param   array  $args  An array of arguments to pass to the listener.
	 *
	 * @return  mixed
=======
	 * @param   array  &$args  An array of arguments to pass to the listener.
	 *
	 * @return  mixed
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public abstract function update(&$args);
}