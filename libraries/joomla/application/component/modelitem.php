<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Application
 *
 * @copyright   Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

<<<<<<< HEAD
defined('JPATH_PLATFORM') or die;
=======
defined('JPATH_PLATFORM') or die();
>>>>>>> upstream/master

jimport('joomla.application.component.model');

/**
 * Prototype item model.
 *
 * @package     Joomla.Platform
 * @subpackage  Application
 * @since       11.1
 */
abstract class JModelItem extends JModel
{
	/**
	 * An item.
	 *
	 * @var    array
<<<<<<< HEAD
=======
	 * @since  11.1
>>>>>>> upstream/master
	 */
	protected $_item = null;

	/**
	 * Model context string.
	 *
	 * @var    string
<<<<<<< HEAD
=======
	 * @since  11.1
>>>>>>> upstream/master
	 */
	protected $_context = 'group.type';

	/**
	 * Method to get a store id based on model configuration state.
	 *
	 * This is necessary because the model is used by the component and
	 * different modules that might need different sets of data or different
	 * ordering requirements.
	 *
<<<<<<< HEAD
	 * @param   string   $context	A prefix for the store id.
	 * @return  string   	A store id.
=======
	 * @param   string  $id  A prefix for the store id.
	 *
	 * @return  string  A store id.
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	protected function getStoreId($id = '')
	{
		// Compile the store id.
<<<<<<< HEAD

=======
>>>>>>> upstream/master
		return md5($id);
	}
}