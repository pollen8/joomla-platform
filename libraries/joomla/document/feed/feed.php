<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Document
 *
 * @copyright   Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

<<<<<<< HEAD
defined('JPATH_PLATFORM') or die;
=======
defined('JPATH_PLATFORM') or die();

jimport('joomla.document.document');
>>>>>>> upstream/master

/**
 * DocumentFeed class, provides an easy interface to parse and display any feed document
 *
 * @package     Joomla.Platform
 * @subpackage  Document
 * @since       11.1
 */
<<<<<<< HEAD

jimport('joomla.document.document');

=======
>>>>>>> upstream/master
class JDocumentFeed extends JDocument
{
	/**
	 * Syndication URL feed element
	 *
	 * optional
	 *
	 * @var    string
<<<<<<< HEAD
=======
	 * @since  11.1
>>>>>>> upstream/master
	 */
	public $syndicationURL = "";

	/**
	 * Image feed element
	 *
	 * optional
	 *
	 * @var    object
<<<<<<< HEAD
=======
	 * @since  11.1
>>>>>>> upstream/master
	 */
	public $image = null;

	/**
	 * Copyright feed elememnt
	 *
	 * optional
	 *
	 * @var    string
<<<<<<< HEAD
=======
	 * @since  11.1
>>>>>>> upstream/master
	 */
	public $copyright = "";

	/**
	 * Published date feed element
	 *
<<<<<<< HEAD
	 *  optional
	 *
	 * @var    string
=======
	 * optional
	 *
	 * @var    string
	 * @since  11.1
>>>>>>> upstream/master
	 */
	public $pubDate = "";

	/**
	 * Lastbuild date feed element
	 *
	 * optional
	 *
	 * @var    string
<<<<<<< HEAD
=======
	 * @since  11.1
>>>>>>> upstream/master
	 */
	public $lastBuildDate = "";

	/**
	 * Editor feed element
	 *
	 * optional
	 *
	 * @var    string
<<<<<<< HEAD
=======
	 * @since  11.1
>>>>>>> upstream/master
	 */
	public $editor = "";

	/**
	 * Docs feed element
	 *
	 * @var    string
<<<<<<< HEAD
=======
	 * @since  11.1
>>>>>>> upstream/master
	 */
	public $docs = "";

	/**
	 * Editor email feed element
	 *
	 * optional
	 *
	 * @var    string
<<<<<<< HEAD
=======
	 * @since  11.1
>>>>>>> upstream/master
	 */
	public $editorEmail = "";

	/**
	 * Webmaster email feed element
	 *
	 * optional
	 *
	 * @var    string
<<<<<<< HEAD
=======
	 * @since  11.1
>>>>>>> upstream/master
	 */
	public $webmaster = "";

	/**
	 * Category feed element
	 *
	 * optional
	 *
	 * @var    string
<<<<<<< HEAD
=======
	 * @since  11.1
>>>>>>> upstream/master
	 */
	public $category = "";

	/**
	 * TTL feed attribute
	 *
	 * optional
	 *
	 * @var    string
<<<<<<< HEAD
=======
	 * @since  11.1
>>>>>>> upstream/master
	 */
	public $ttl = "";

	/**
	 * Rating feed element
	 *
	 * optional
	 *
	 * @var    string
<<<<<<< HEAD
=======
	 * @since  11.1
>>>>>>> upstream/master
	 */
	public $rating = "";

	/**
	 * Skiphours feed element
	 *
	 * optional
	 *
	 * @var    string
<<<<<<< HEAD
=======
	 * @since  11.1
>>>>>>> upstream/master
	 */
	public $skipHours = "";

	/**
	 * Skipdays feed element
	 *
	 * optional
	 *
	 * @var    string
<<<<<<< HEAD
=======
	 * @since  11.1
>>>>>>> upstream/master
	 */
	public $skipDays = "";

	/**
	 * The feed items collection
	 *
<<<<<<< HEAD
	 * @var array
=======
	 * @var    array
	 * @since  11.1
>>>>>>> upstream/master
	 */
	public $items = array();

	/**
	 * Class constructor
	 *
<<<<<<< HEAD
	 * @param   array  $options Associative array of options
=======
	 * @param   array  $options  Associative array of options
	 *
	 * @return  JDocumentFeed
	 *
	 * @since  11.1
>>>>>>> upstream/master
	 */
	public function __construct($options = array())
	{
		parent::__construct($options);

		//set document type
		$this->_type = 'feed';
	}

	/**
	 * Render the document
	 *
<<<<<<< HEAD
	 * @param   boolean  $cache		If true, cache the output
	 * @param   array    $params		Associative array of attributes
	 * @return  The rendered data
=======
	 * @param   boolean  $cache   If true, cache the output
	 * @param   array    $params  Associative array of attributes
	 *
	 * @return  The rendered data
	 *
	 * @since  11.1
>>>>>>> upstream/master
	 */
	public function render($cache = false, $params = array())
	{
		global $option;

		// Get the feed type
		$type = JRequest::getCmd('type', 'rss');

		/*
		 * Cache TODO In later release
		 */
<<<<<<< HEAD
		$cache		= 0;
=======
		$cache = 0;
>>>>>>> upstream/master
		$cache_time = 3600;
		$cache_path = JPATH_CACHE;

		// set filename for rss feeds
		$file = strtolower(str_replace('.', '', $type));
<<<<<<< HEAD
		$file = $cache_path.DS.$file.'_'.$option.'.xml';


		// Instantiate feed renderer and set the mime encoding
		$renderer = $this->loadRenderer(($type) ? $type : 'rss');
		if (!is_a($renderer, 'JDocumentRenderer')) {
=======
		$file = $cache_path . '/' . $file . '_' . $option . '.xml';

		// Instantiate feed renderer and set the mime encoding
		$renderer = $this->loadRenderer(($type) ? $type : 'rss');
		if (!is_a($renderer, 'JDocumentRenderer'))
		{
>>>>>>> upstream/master
			JError::raiseError(404, JText::_('JGLOBAL_RESOURCE_NOT_FOUND'));
		}
		$this->setMimeEncoding($renderer->getContentType());

		// Output
		// Generate prolog
<<<<<<< HEAD
		$data	= "<?xml version=\"1.0\" encoding=\"".$this->_charset."\"?>\n";
		$data	.= "<!-- generator=\"".$this->getGenerator()."\" -->\n";

		 // Generate stylesheet links
		foreach ($this->_styleSheets as $src => $attr) {
			$data .= "<?xml-stylesheet href=\"$src\" type=\"".$attr['mime']."\"?>\n";
=======
		$data = "<?xml version=\"1.0\" encoding=\"" . $this->_charset . "\"?>\n";
		$data .= "<!-- generator=\"" . $this->getGenerator() . "\" -->\n";

		// Generate stylesheet links
		foreach ($this->_styleSheets as $src => $attr)
		{
			$data .= "<?xml-stylesheet href=\"$src\" type=\"" . $attr['mime'] . "\"?>\n";
>>>>>>> upstream/master
		}

		// Render the feed
		$data .= $renderer->render();

		parent::render();
		return $data;
	}

	/**
	 * Adds an JFeedItem to the feed.
	 *
<<<<<<< HEAD
	 * @param   object JFeedItem $item The feeditem to add to the feed.
=======
	 * @param   JFeedItem  &$item  The feeditem to add to the feed.
	 *
	 * @return  JDocumentFeed  instance of $this to allow chaining
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function addItem(&$item)
	{
		$item->source = $this->link;
		$this->items[] = $item;
<<<<<<< HEAD
=======

		return $this;
>>>>>>> upstream/master
	}
}

/**
 * JFeedItem is an internal class that stores feed item information
 *
 * @package     Joomla.Platform
 * @subpackage  Document
 * @since       11.1
 */
class JFeedItem extends JObject
{
<<<<<<< HEAD
=======

>>>>>>> upstream/master
	/**
	 * Title item element
	 *
	 * required
	 *
	 * @var    string
<<<<<<< HEAD
=======
	 * @since  11.1
>>>>>>> upstream/master
	 */
	public $title;

	/**
	 * Link item element
	 *
	 * required
	 *
	 * @var    string
<<<<<<< HEAD
=======
	 * @since  11.1
>>>>>>> upstream/master
	 */
	public $link;

	/**
	 * Description item element
	 *
	 * required
	 *
	 * @var    string
<<<<<<< HEAD
=======
	 * @since  11.1
>>>>>>> upstream/master
	 */
	public $description;

	/**
	 * Author item element
	 *
	 * optional
	 *
	 * @var    string
<<<<<<< HEAD
	 */
	 public $author;

	 /**
=======
	 * @since  11.1
	 */
	public $author;

	/**
>>>>>>> upstream/master
	 * Author email element
	 *
	 * optional
	 *
	 * @var    string
<<<<<<< HEAD
	 */
	 public $authorEmail;

=======
	 * @since  11.1
	 */
	public $authorEmail;
>>>>>>> upstream/master

	/**
	 * Category element
	 *
	 * optional
	 *
	 * @var    array or string
<<<<<<< HEAD
	 */
	 public $category;

	 /**
=======
	 * @since  11.1
	 */
	public $category;

	/**
>>>>>>> upstream/master
	 * Comments element
	 *
	 * optional
	 *
	 * @var    string
<<<<<<< HEAD
	 */
	 public $comments;

	 /**
	 * Enclosure element
	 *
	 * @var    object
	 */
	 public $enclosure =  null;

	 /**
=======
	 * @since  11.1
	 */
	public $comments;

	/**
	 * Enclosure element
	 *
	 * @var    object
	 * @since  11.1
	 */
	public $enclosure = null;

	/**
>>>>>>> upstream/master
	 * Guid element
	 *
	 * optional
	 *
	 * @var    string
<<<<<<< HEAD
	 */
	 var $guid;
=======
	 * @since  11.1
	 */
	var $guid;
>>>>>>> upstream/master

	/**
	 * Published date
	 *
	 * optional
	 *
<<<<<<< HEAD
	 *  May be in one of the following formats:
	 *
	 *	RFC 822:
	 *	"Mon, 20 Jan 03 18:05:41 +0400"
	 *	"20 Jan 03 18:05:41 +0000"
	 *
	 *	ISO 8601:
	 *	"2003-01-20T18:05:41+04:00"
	 *
	 *	Unix:
	 *	1043082341
	 *
	 * @var    string
	 */
	 public $date;

	 /**
=======
	 * May be in one of the following formats:
	 *
	 * RFC 822:
	 * "Mon, 20 Jan 03 18:05:41 +0400"
	 * "20 Jan 03 18:05:41 +0000"
	 *
	 * ISO 8601:
	 * "2003-01-20T18:05:41+04:00"
	 *
	 * Unix:
	 * 1043082341
	 *
	 * @var    string
	 * @since  11.1
	 */
	public $date;

	/**
>>>>>>> upstream/master
	 * Source element
	 *
	 * optional
	 *
	 * @var    string
<<<<<<< HEAD
	 */
	 public $source;


	 /**
	 * Set the JFeedEnclosure for this item
	 *
	 * @param   object  $enclosure  The JFeedItem to add to the feed.
	 */
	 public function setEnclosure($enclosure)	{
		 $this->enclosure = $enclosure;
	 }
=======
	 * @since  11.1
	 */
	public $source;

	/**
	 * Set the JFeedEnclosure for this item
	 *
	 * @param   object  $enclosure  The JFeedItem to add to the feed.
	 *
	 * @return  JFeedItem instance of $this to allow chaining
	 *
	 * @since   11.1
	 */
	public function setEnclosure($enclosure)
	{
		$this->enclosure = $enclosure;

		return $this;
	}
>>>>>>> upstream/master
}

/**
 * JFeedEnclosure is an internal class that stores feed enclosure information
 *
 * @package     Joomla.Platform
 * @subpackage  Document
 * @since       11.1
 */
class JFeedEnclosure extends JObject
{
<<<<<<< HEAD
=======

>>>>>>> upstream/master
	/**
	 * URL enclosure element
	 *
	 * required
	 *
	 * @var    string
<<<<<<< HEAD
	 */
	 public $url = "";
=======
	 * @since  11.1
	 */
	public $url = "";
>>>>>>> upstream/master

	/**
	 * Length enclosure element
	 *
	 * required
	 *
	 * @var    string
<<<<<<< HEAD
	 */
	 public $length = "";

	 /**
=======
	 * @since  11.1
	 */
	public $length = "";

	/**
>>>>>>> upstream/master
	 * Type enclosure element
	 *
	 * required
	 *
	 * @var    string
<<<<<<< HEAD
	 */
	 public $type = "";
=======
	 * @since  11.1
	 */
	public $type = "";
>>>>>>> upstream/master
}

/**
 * JFeedImage is an internal class that stores feed image information
 *
 * @package     Joomla.Platform
 * @subpackage  Document
 * @since       11.1
 */
class JFeedImage extends JObject
{
<<<<<<< HEAD
=======

>>>>>>> upstream/master
	/**
	 * Title image attribute
	 *
	 * required
	 *
	 * @var    string
<<<<<<< HEAD
	 */
	 public $title = "";

	 /**
=======
	 * @since  11.1
	 */
	public $title = "";

	/**
>>>>>>> upstream/master
	 * URL image attribute
	 *
	 * required
	 *
	 * @var    string
<<<<<<< HEAD
=======
	 * @since  11.1
>>>>>>> upstream/master
	 */
	public $url = "";

	/**
	 * Link image attribute
	 *
	 * required
	 *
	 * @var    string
<<<<<<< HEAD
	 */
	 public $link = "";

	 /**
=======
	 * @since  11.1
	 */
	public $link = "";

	/**
>>>>>>> upstream/master
	 * Width image attribute
	 *
	 * optional
	 *
	 * @var    string
<<<<<<< HEAD
	 */
	 public $width;

	 /**
=======
	 * @since  11.1
	 */
	public $width;

	/**
>>>>>>> upstream/master
	 * Title feed attribute
	 *
	 * optional
	 *
	 * @var    string
<<<<<<< HEAD
	 */
	 public $height;

	 /**
=======
	 * @since  11.1
	 */
	public $height;

	/**
>>>>>>> upstream/master
	 * Title feed attribute
	 *
	 * optional
	 *
	 * @var    string
<<<<<<< HEAD
	 */
	 public $description;
=======
	 * @since  11.1
	 */
	public $description;
>>>>>>> upstream/master
}
