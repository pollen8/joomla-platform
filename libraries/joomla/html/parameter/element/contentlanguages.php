<?php
/**
 * @package     Joomla.Platform
 * @subpackage  HTML
 *
 * @copyright   Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('JPATH_PLATFORM') or die;

<<<<<<< HEAD
require_once dirname(__FILE__).'/list.php';
=======
require_once dirname(__FILE__) . '/list.php';
>>>>>>> upstream/master

/**
 * Renders a select list of Asset Groups
 *
 * @package     Joomla.Platform
 * @subpackage  Parameter
 * @since       11.1
<<<<<<< HEAD
 * @deprecated .Use JForm instead
=======
 * @deprecated  Use JFormFieldContentLanguage instead.
 * @note        Be careful in replacing to note that JFormFieldConentLanguage does not end in s.
>>>>>>> upstream/master
 */
class JElementContentLanguages extends JElementList
{
	/**
<<<<<<< HEAD
	* Element name
	*
	* @var    string
	*/
=======
	 * Element name
	 *
	 * @var    string
	 */
>>>>>>> upstream/master
	protected $_name = 'ContentLanguages';

	/**
	 * Get the options for the element
	 *
<<<<<<< HEAD
	 * @param   object   $node
	 * @return  array
	 */
	protected function _getOptions(&$node)
	{
		$db		= JFactory::getDbo();
		$query	= $db->getQuery(true);
=======
	 * @param   JSimpleXMLElement  &$node  Node object containing the settings for the element
	 *
	 * @return  array
	 *
	 * @since   11.1
	 *
	 * @deprecated    12.1  Use JFormFieldContentLanguage::getOptions instead
	 */
	protected function _getOptions(&$node)
	{
		// Deprecation warning.
		JLog::add('JElementContentLanguages::_getOptions() is deprecated.', JLog::WARNING, 'deprecated');

		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
>>>>>>> upstream/master

		$query->select('a.lang_code AS value, a.title AS text, a.title_native');
		$query->from('#__languages AS a');
		$query->where('a.published >= 0');
		$query->order('a.title');

		// Get the options.
		$db->setQuery($query);
		$options = $db->loadObjectList();

		// Check for a database error.
<<<<<<< HEAD
		if ($db->getErrorNum()) {
=======
		if ($db->getErrorNum())
		{
>>>>>>> upstream/master
			JError::raiseWarning(500, $db->getErrorMsg());
		}

		// Merge any additional options in the XML definition.
		$options = array_merge(parent::_getOptions($node), $options);

		return $options;
	}
}
