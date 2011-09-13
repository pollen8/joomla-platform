<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Cache
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
 * Cache storage helper functions.
 *
 * @package     Joomla.Platform
 * @subpackage  Cache
 * @since       11.1
 */
class JCacheStorageHelper
{
	/**
<<<<<<< HEAD
	 * @since   11.1
=======
	 * Cache data group
	 *
	 * @var    string
	 * @since  11.1
>>>>>>> upstream/master
	 */
	public $group = '';

	/**
<<<<<<< HEAD
	 * @since   11.1
=======
	 * Cached item size
	 *
	 * @var    string
	 * @since  11.1
>>>>>>> upstream/master
	 */
	public $size = 0;

	/**
<<<<<<< HEAD
	 * @since   11.1
=======
	 * Counter
	 *
	 * @var    integer
	 * @since  11.1
>>>>>>> upstream/master
	 */
	public $count = 0;

	/**
	 * Constructor
	 *
<<<<<<< HEAD
	 * @param   array  $options	options
=======
	 * @param   string  $group  The cache data group
	 *
	 * @return  JCacheStorageHelper
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function __construct($group)
	{
		$this->group = $group;
	}

	/**
	 * Increase cache items count.
	 *
<<<<<<< HEAD
	 * @param   string  $size	Cached item size
	 * @param   string  $group	The cache data group
=======
	 * @param   string  $size  Cached item size
	 *
	 * @return  void
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function updateSize($size)
	{
		$this->size = number_format($this->size + $size, 2);
		$this->count++;
	}
}