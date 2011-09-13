<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Utilities
 *
 * @copyright   Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('JPATH_PLATFORM') or die;

/**
 * Wrapper class for php SimpleXMLElement.
 *
 * @package     Joomla.Platform
 * @subpackage  Utilities
 * @since       11.1
 */
class JXMLElement extends SimpleXMLElement
{
	/**
	 * Get the name of the element.
	 *
	 * @return  string
<<<<<<< HEAD
=======
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function name()
	{
		return (string) $this->getName();
	}

	/**
	 * Legacy method to get the element data.
	 *
	 * @return  string
	 *
<<<<<<< HEAD
	 * @deprecated
	 */
	public function data()
	{
=======
	 * @deprecated  12.1
	 * @since   11.1
	 */
	public function data()
	{
		// Deprecation warning.
		JLog::add('Jxmlelement::data() is deprecated.', JLog::WARNING, 'deprecated');

>>>>>>> upstream/master
		return (string) $this;
	}

	/**
	 * Legacy method gets an elements attribute by name.
	 *
<<<<<<< HEAD
	 * @param   string
	 *
	 * @return  string
	 *
	 * @deprecated
	 */
	public function getAttribute($name)
	{
=======
	 * @param   string  $name  Attribute to get
	 *
	 * @return  string
	 *
	 * @since   11.1
	 *
	 * @deprecated    12.1
	 * @see           SimpleXMLElement::attributes
	 */
	public function getAttribute($name)
	{
		// Deprecation warning.
		JLog::add('JXMLelement::getAttributes() is deprecated.', JLog::WARNING, 'deprecated');

>>>>>>> upstream/master
		return (string) $this->attributes()->$name;
	}

	/**
	 * Return a well-formed XML string based on SimpleXML element
	 *
<<<<<<< HEAD
	 * @param   boolean  Should we use indentation and newlines ?
	 * @param   integer  Indentaion level.
	 *
	 * @return  string
=======
	 * @param   boolean  $compressed  Should we use indentation and newlines ?
	 * @param   integer  $indent      Indentaion level.
	 * @param   integer  $level       The level within the document which informs the indentation.
	 *
	 * @return  string
	 *
	 * @since   11.1
>>>>>>> upstream/master
	 */
	public function asFormattedXML($compressed = false, $indent = "\t", $level = 0)
	{
		$out = '';

		// Start a new line, indent by the number indicated in $level
<<<<<<< HEAD
		$out .= ($compressed) ? '' : "\n".str_repeat($indent, $level);

		// Add a <, and add the name of the tag
		$out .= '<'.$this->getName();

		// For each attribute, add attr="value"
		foreach ($this->attributes() as $attr) {
			$out .= ' '.$attr->getName().'="'.htmlspecialchars((string)$attr, ENT_COMPAT, 'UTF-8').'"';
		}

		// If there are no children and it contains no data, end it off with a />
		if (!count($this->children()) && !(string)$this) {
			$out .= " />";
		} else {
			// If there are children
			if (count($this->children())) {
				// Close off the start tag
				$out .= '>';

				$level ++;

				// For each child, call the asFormattedXML function (this will ensure that all children are added recursively)
				foreach ($this->children() as $child) {
					$out .= $child->asFormattedXML($compressed, $indent, $level);
				}

				$level --;

				// Add the newline and indentation to go along with the close tag
				$out .=($compressed) ? '' : "\n".str_repeat($indent, $level);

			} else if ((string) $this) {
				// If there is data, close off the start tag and add the data
				$out .= '>'.htmlspecialchars((string)$this, ENT_COMPAT, 'UTF-8');
			}

			// Add the end tag
			$out .= '</'.$this->getName().'>';
=======
		$out .= ($compressed) ? '' : "\n" . str_repeat($indent, $level);

		// Add a <, and add the name of the tag
		$out .= '<' . $this->getName();

		// For each attribute, add attr="value"
		foreach ($this->attributes() as $attr)
		{
			$out .= ' ' . $attr->getName() . '="' . htmlspecialchars((string) $attr, ENT_COMPAT, 'UTF-8') . '"';
		}

		// If there are no children and it contains no data, end it off with a />
		if (!count($this->children()) && !(string) $this)
		{
			$out .= " />";
		}
		else
		{
			// If there are children
			if (count($this->children()))
			{
				// Close off the start tag
				$out .= '>';

				$level++;

				// For each child, call the asFormattedXML function (this will ensure that all children are added recursively)
				foreach ($this->children() as $child)
				{
					$out .= $child->asFormattedXML($compressed, $indent, $level);
				}

				$level--;

				// Add the newline and indentation to go along with the close tag
				$out .= ($compressed) ? '' : "\n" . str_repeat($indent, $level);

			}
			else if ((string) $this)
			{
				// If there is data, close off the start tag and add the data
				$out .= '>' . htmlspecialchars((string) $this, ENT_COMPAT, 'UTF-8');
			}

			// Add the end tag
			$out .= '</' . $this->getName() . '>';
>>>>>>> upstream/master
		}

		return $out;
	}
<<<<<<< HEAD
}
=======
}
>>>>>>> upstream/master
