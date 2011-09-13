<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Error
 *
 * @copyright   Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

<<<<<<< HEAD
defined('JPATH_PLATFORM') or die;

// TODO: Wack this into a language file when this gets merged
if(JDEBUG)
=======
defined('JPATH_PLATFORM') or die();

// TODO: Wack this into a language file when this gets merged
if (JDEBUG)
>>>>>>> upstream/master
{
	JError::raiseWarning(100, "JLog has moved to jimport('joomla.log.log'), please update your code.");
	JError::raiseWarning(100, "JLog has changed its behaviour; please update your code.");
}
<<<<<<< HEAD
require_once(JPATH_LIBRARIES.'/joomla/log/log.php');


=======
require_once JPATH_LIBRARIES . '/joomla/log/log.php';
>>>>>>> upstream/master
