<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Updater
 *
 * @copyright   Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('JPATH_PLATFORM') or die;

jimport('joomla.updater.updateadapter');

/**
 * Collection Update Adapter Class
<<<<<<< HEAD
 * @since   11.1
 */
class JUpdaterCollection extends JUpdateAdapter {
	/**
	 * @var object Root of the tree
=======
 *
 * @package     Joomla.Platform
 * @subpackage  Updater
 * @since       11.1
 * */

class JUpdaterCollection extends JUpdateAdapter
{
	/**
	 * Root of the tree
	 *
	 * @var    object
	 * @since  11.1
>>>>>>> upstream/master
	 */
	protected $base;

	/**
<<<<<<< HEAD
	 * @var array Tree of objects
=======
	 * Tree of objects
	 *
	 * @var    array
	 * @since  11.1
>>>>>>> upstream/master
	 */
	protected $parent = Array(0);

	/**
<<<<<<< HEAD
	 * @var boolean Used to control if an item has a child or not
=======
	 * Used to control if an item has a child or not
	 *
	 * @var    boolean
	 * @since  11.1
>>>>>>> upstream/master
	 */
	protected $pop_parent = 0;

	/**
	 * @var array A list of discovered update sites
	 */
	protected $update_sites;

	/**
<<<<<<< HEAD
	 * @var array A list of discovered updates
=======
	 * A list of discovered updates
	 *
	 * @var array
>>>>>>> upstream/master
	 */
	protected $updates;

	/**
	 * Gets the reference to the current direct parent
	 *
	 * @return  object
<<<<<<< HEAD
=======
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	protected function _getStackLocation()
	{

		return implode('->', $this->_stack);
	}

	/**
	 * Get the parent tag
<<<<<<< HEAD
	 * @return  string   parent
=======
	 *
	 * @return  string   parent
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	protected function _getParent()
	{
		return end($this->parent);
	}

	/**
	 * Opening an XML element
<<<<<<< HEAD
	 * @param   object parser object
	 * @param   string name of element that is opened
	 * @param   array array of attributes for the element
	 *
=======
	 *
	 * @param   object  $parser  Parser object
	 * @param   string  $name    Name of element that is opened
	 * @param   array   $attrs   Array of attributes for the element
	 *
	 * @return  void
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function _startElement($parser, $name, $attrs = Array())
	{
		array_push($this->_stack, $name);
		$tag = $this->_getStackLocation();
		// Reset the data
<<<<<<< HEAD
		eval('$this->'. $tag .'->_data = "";');
		switch($name)
		{
			case 'CATEGORY':
				if(isset($attrs['REF']))
				{
					$this->update_sites[] = Array('type'=>'collection','location'=>$attrs['REF'],'update_site_id'=>$this->_update_site_id);
				} else
=======
		eval('$this->' . $tag . '->_data = "";');
		switch ($name)
		{
			case 'CATEGORY':
				if (isset($attrs['REF']))
				{
					$this->update_sites[] = Array('type' => 'collection', 'location' => $attrs['REF'], 'update_site_id' => $this->_update_site_id);
				}
				else
>>>>>>> upstream/master
				{
					// This item will have children, so prepare to attach them
					$this->pop_parent = 1;
				}
				break;
			case 'EXTENSION':
				$update = JTable::getInstance('update');
				$update->set('update_site_id', $this->_update_site_id);
<<<<<<< HEAD
				foreach($this->_updatecols AS $col)
				{
					// Reset the values if it doesn't exist
					if(!array_key_exists($col, $attrs))
					{
						$attrs[$col] = '';
						if($col == 'CLIENT')
=======
				foreach ($this->_updatecols AS $col)
				{
					// Reset the values if it doesn't exist
					if (!array_key_exists($col, $attrs))
					{
						$attrs[$col] = '';
						if ($col == 'CLIENT_ID')
>>>>>>> upstream/master
						{
							$attrs[$col] = 'site';
						}
					}
				}
<<<<<<< HEAD
				$client = JApplicationHelper::getClientInfo($attrs['CLIENT'],1);
				$attrs['CLIENT_ID'] = $client->id;
				// Lower case all of the fields
				foreach($attrs as $key=>$attr)
=======
				$client = JApplicationHelper::getClientInfo($attrs['CLIENT_ID'], 1);
				$attrs['CLIENT_ID'] = $client->id;
				// Lower case all of the fields
				foreach ($attrs as $key => $attr)
>>>>>>> upstream/master
				{
					$values[strtolower($key)] = $attr;
				}

				// Only add the update if it is on the same platform and release as we are
<<<<<<< HEAD
				$ver = new JVersion();
=======
				$ver = new JVersion;
>>>>>>> upstream/master
				$product = strtolower(JFilterInput::getInstance()->clean($ver->PRODUCT, 'cmd')); // lower case and remove the exclamation mark
				// Set defaults, the extension file should clarify in case but it may be only available in one version
				// This allows an update site to specify a targetplatform
				// targetplatformversion can be a regexp, so 1.[56] would be valid for an extension that supports 1.5 and 1.6
				// Note: Whilst the version is a regexp here, the targetplatform is not (new extension per platform)
				//		Additionally, the version is a regexp here and it may also be in an extension file if the extension is
				//		compatible against multiple versions of the same platform (e.g. a library)
<<<<<<< HEAD
				if(!isset($values['targetplatform'])) $values['targetplatform'] = $product; // set this to ourself as a default
				if(!isset($values['targetplatformversion'])) $values['targetplatformversion'] = $ver->RELEASE; // set this to ourself as a default
				// validate that we can install the extension
				if($product == $values['targetplatform'] && preg_match('/'.$values['targetplatformversion'].'/',$ver->RELEASE))
=======
				if (!isset($values['targetplatform']))
				{
					$values['targetplatform'] = $product;
				}
				// set this to ourself as a default
				if (!isset($values['targetplatformversion']))
				{
					$values['targetplatformversion'] = $ver->RELEASE;
				}
				// set this to ourself as a default
				// validate that we can install the extension
				if ($product == $values['targetplatform'] && preg_match('/' . $values['targetplatformversion'] . '/', $ver->RELEASE))
>>>>>>> upstream/master
				{
					$update->bind($values);
					$this->updates[] = $update;
				}
				break;
		}
	}

	/**
	 * Closing an XML element
	 * Note: This is a protected function though has to be exposed externally as a callback
<<<<<<< HEAD
	 * @param   object parser object
	 * @param   string name of the element closing
=======
	 *
	 * @param   object  $parser  Parser object
	 * @param   string  $name    Name of the element closing
	 *
	 * @return  void
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	protected function _endElement($parser, $name)
	{
		$lastcell = array_pop($this->_stack);
<<<<<<< HEAD
		switch($name)
		{
			case 'CATEGORY':
				if($this->pop_parent)
=======
		switch ($name)
		{
			case 'CATEGORY':
				if ($this->pop_parent)
>>>>>>> upstream/master
				{
					$this->pop_parent = 0;
					array_pop($this->parent);
				}
				break;
		}
	}

	// Note: we don't care about char data in collection because there should be none

<<<<<<< HEAD

	/*
	 * Find an update
	 * @param   array options to use; update_site_id: the unique ID of the update site to look at
	 *
	 * @return  array    update_sites and updates discovered
=======
	/**
	 * Finds an update
	 *
	 * @param   array  $options  Options to use: update_site_id: the unique ID of the update site to look at
	 *
	 * @return  array  Update_sites and updates discovered
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function findUpdate($options)
	{
		$url = $options['location'];
		$this->_update_site_id = $options['update_site_id'];
<<<<<<< HEAD
		if(substr($url, -4) != '.xml')
		{
			if(substr($url, -1) != '/') {
=======
		if (substr($url, -4) != '.xml')
		{
			if (substr($url, -1) != '/')
			{
>>>>>>> upstream/master
				$url .= '/';
			}
			$url .= 'update.xml';
		}

<<<<<<< HEAD
		$this->base = new stdClass();
=======
		$this->base = new stdClass;
>>>>>>> upstream/master
		$this->update_sites = Array();
		$this->updates = Array();
		$dbo = $this->parent->getDBO();

		if (!($fp = @fopen($url, "r")))
		{
			$query = $dbo->getQuery(true);
			$query->update('#__update_sites');
			$query->set('enabled = 0');
<<<<<<< HEAD
			$query->where('update_site_id = '. $this->_update_site_id);
			$dbo->setQuery($query);
			$dbo->Query();
			JError::raiseWarning('101', JText::sprintf('JLIB_UPDATER_ERROR_COLLECTION_OPEN_URL', $url));
=======
			$query->where('update_site_id = ' . $this->_update_site_id);
			$dbo->setQuery($query);
			$dbo->Query();

			JLog::add("Error parsing url: ".$url, JLog::WARNING, 'updater');
			$app = JFactory::getApplication();
			$app->enqueueMessage(JText::sprintf('JLIB_UPDATER_ERROR_COLLECTION_OPEN_URL', $url), 'warning');
>>>>>>> upstream/master
			return false;
		}

		$this->xml_parser = xml_parser_create('');
		xml_set_object($this->xml_parser, $this);
		xml_set_element_handler($this->xml_parser, '_startElement', '_endElement');

		while ($data = fread($fp, 8192))
		{
			if (!xml_parse($this->xml_parser, $data, feof($fp)))
			{
<<<<<<< HEAD
				die(sprintf("XML error: %s at line %d",
							xml_error_string(xml_get_error_code($this->xml_parser)),
							xml_get_current_line_number($this->xml_parser)));
			}
		}
		// TODO: Decrement the bad counter if non-zero
		return Array('update_sites'=>$this->update_sites,'updates'=>$this->updates);
=======
				JLog::add("Error parsing url: ".$url, JLog::WARNING, 'updater');
				$app = JFactory::getApplication();
				$app->enqueueMessage(JText::sprintf('JLIB_UPDATER_ERROR_COLLECTION_PARSE_URL', $url), 'warning');
				return false;
			}
		}
		// TODO: Decrement the bad counter if non-zero
		return Array('update_sites' => $this->update_sites, 'updates' => $this->updates);
>>>>>>> upstream/master
	}
}
