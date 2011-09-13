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

jimport('joomla.application.component.controller');

/**
 * Base class for a Joomla Administrator Controller
 *
 * Controller (controllers are where you put all the actual code) Provides basic
 * functionality, such as rendering views (aka displaying templates).
 *
 * @package     Joomla.Platform
 * @subpackage  Application
 * @since       11.1
 */
class JControllerAdmin extends JController
{
	/**
<<<<<<< HEAD
	 * @var    string	The URL option for the component.
=======
	 * The URL option for the component.
	 *
	 * @var    string
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $option;

	/**
<<<<<<< HEAD
	 * @var    string	The prefix to use with controller messages.
=======
	 * The prefix to use with controller messages.
	 *
	 * @var    string
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $text_prefix;

	/**
<<<<<<< HEAD
	 * @var    string	The URL view list variable.
=======
	 * The URL view list variable.
	 *
	 * @var    string
>>>>>>> upstream/master
	 * @since  11.1
	 */
	protected $view_list;

	/**
	 * Constructor.
	 *
<<<<<<< HEAD
	 * @param   array An optional associative array of configuration settings.
	 * @see		JController
=======
	 * @param   array  $config  An optional associative array of configuration settings.
	 *
	 * @see     JController
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function __construct($config = array())
	{
		parent::__construct($config);

		// Define standard task mappings.
<<<<<<< HEAD
		$this->registerTask('unpublish',	'publish');	// value = 0
		$this->registerTask('archive',		'publish');	// value = 2
		$this->registerTask('trash',		'publish');	// value = -2
		$this->registerTask('report',		'publish');	// value = -3
		$this->registerTask('orderup',		'reorder');
		$this->registerTask('orderdown',	'reorder');

		// Guess the option as com_NameOfController.
		if (empty($this->option)) {
			$this->option = 'com_'.strtolower($this->getName());
		}

		// Guess the JText message prefix. Defaults to the option.
		if (empty($this->text_prefix)) {
=======
		$this->registerTask('unpublish', 'publish'); // value = 0
		$this->registerTask('archive', 'publish'); // value = 2
		$this->registerTask('trash', 'publish'); // value = -2
		$this->registerTask('report', 'publish'); // value = -3
		$this->registerTask('orderup', 'reorder');
		$this->registerTask('orderdown', 'reorder');

		// Guess the option as com_NameOfController.
		if (empty($this->option))
		{
			$this->option = 'com_' . strtolower($this->getName());
		}

		// Guess the JText message prefix. Defaults to the option.
		if (empty($this->text_prefix))
		{
>>>>>>> upstream/master
			$this->text_prefix = strtoupper($this->option);
		}

		// Guess the list view as the suffix, eg: OptionControllerSuffix.
<<<<<<< HEAD
		if (empty($this->view_list)) {
			$r = null;
			if (!preg_match('/(.*)Controller(.*)/i', get_class($this), $r)) {
=======
		if (empty($this->view_list))
		{
			$r = null;
			if (!preg_match('/(.*)Controller(.*)/i', get_class($this), $r))
			{
>>>>>>> upstream/master
				JError::raiseError(500, JText::_('JLIB_APPLICATION_ERROR_CONTROLLER_GET_NAME'));
			}
			$this->view_list = strtolower($r[2]);
		}
	}

	/**
	 * Removes an item.
	 *
	 * @return  void
	 *
	 * @since   11.1
	 */
	function delete()
	{
		// Check for request forgeries
		JRequest::checkToken() or die(JText::_('JINVALID_TOKEN'));

		// Get items to remove from the request.
<<<<<<< HEAD
		$cid	= JRequest::getVar('cid', array(), '', 'array');

		if (!is_array($cid) || count($cid) < 1) {
			JError::raiseWarning(500, JText::_($this->text_prefix.'_NO_ITEM_SELECTED'));
		} else {
=======
		$cid = JRequest::getVar('cid', array(), '', 'array');

		if (!is_array($cid) || count($cid) < 1)
		{
			JError::raiseWarning(500, JText::_($this->text_prefix . '_NO_ITEM_SELECTED'));
		}
		else
		{
>>>>>>> upstream/master
			// Get the model.
			$model = $this->getModel();

			// Make sure the item ids are integers
			jimport('joomla.utilities.arrayhelper');
			JArrayHelper::toInteger($cid);

			// Remove the items.
<<<<<<< HEAD
			if ($model->delete($cid)) {
				$this->setMessage(JText::plural($this->text_prefix.'_N_ITEMS_DELETED', count($cid)));
			} else {
=======
			if ($model->delete($cid))
			{
				$this->setMessage(JText::plural($this->text_prefix . '_N_ITEMS_DELETED', count($cid)));
			}
			else
			{
>>>>>>> upstream/master
				$this->setMessage($model->getError());
			}
		}

<<<<<<< HEAD
		$this->setRedirect(JRoute::_('index.php?option='.$this->option.'&view='.$this->view_list, false));
=======
		$this->setRedirect(JRoute::_('index.php?option=' . $this->option . '&view=' . $this->view_list, false));
>>>>>>> upstream/master
	}

	/**
	 * Display is not supported by this controller.
	 *
<<<<<<< HEAD
	 * @param   bool   $cachable   If true, the view output will be cached
	 * @param   array  $urlparams  An array of safe url parameters and their variable types, for valid values see {@link JFilterInput::clean()}.
	 *
	 * @return  JController  A JController object to support chaining.
=======
	 * @param   boolean  $cachable   If true, the view output will be cached
	 * @param   array    $urlparams  An array of safe url parameters and their variable types, for valid values see {@link JFilterInput::clean()}.
	 *
	 * @return  JController  A JController object to support chaining.
	 *
>>>>>>> upstream/master
	 * @since   11.1
	 */
	public function display($cachable = false, $urlparams = false)
	{
		return $this;
	}

	/**
	 * Method to publish a list of taxa
	 *
	 * @return  void
	 *
	 * @since   11.1
	 */
	function publish()
	{
		// Check for request forgeries
		JRequest::checkToken() or die(JText::_('JINVALID_TOKEN'));

<<<<<<< HEAD
		$session	= JFactory::getSession();
		$registry	= $session->get('registry');

		// Get items to publish from the request.
		$cid	= JRequest::getVar('cid', array(), '', 'array');
		$data	= array('publish' => 1, 'unpublish' => 0, 'archive'=> 2, 'trash' => -2, 'report'=>-3);
		$task 	= $this->getTask();
		$value	= JArrayHelper::getValue($data, $task, 0, 'int');

		if (empty($cid)) {
			JError::raiseWarning(500, JText::_($this->text_prefix.'_NO_ITEM_SELECTED'));
		}
		else {
=======
		$session = JFactory::getSession();
		$registry = $session->get('registry');

		// Get items to publish from the request.
		$cid = JRequest::getVar('cid', array(), '', 'array');
		$data = array('publish' => 1, 'unpublish' => 0, 'archive' => 2, 'trash' => -2, 'report' => -3);
		$task = $this->getTask();
		$value = JArrayHelper::getValue($data, $task, 0, 'int');

		if (empty($cid))
		{
			JError::raiseWarning(500, JText::_($this->text_prefix . '_NO_ITEM_SELECTED'));
		}
		else
		{
>>>>>>> upstream/master
			// Get the model.
			$model = $this->getModel();

			// Make sure the item ids are integers
			JArrayHelper::toInteger($cid);

			// Publish the items.
<<<<<<< HEAD
			if (!$model->publish($cid, $value)) {
				JError::raiseWarning(500, $model->getError());
			}
			else {
				if ($value == 1) {
					$ntext = $this->text_prefix.'_N_ITEMS_PUBLISHED';
				}
				else if ($value == 0) {
					$ntext = $this->text_prefix.'_N_ITEMS_UNPUBLISHED';
				}
				else if ($value == 2) {
					$ntext = $this->text_prefix.'_N_ITEMS_ARCHIVED';
				}
				else {
					$ntext = $this->text_prefix.'_N_ITEMS_TRASHED';
=======
			if (!$model->publish($cid, $value))
			{
				JError::raiseWarning(500, $model->getError());
			}
			else
			{
				if ($value == 1)
				{
					$ntext = $this->text_prefix . '_N_ITEMS_PUBLISHED';
				}
				else if ($value == 0)
				{
					$ntext = $this->text_prefix . '_N_ITEMS_UNPUBLISHED';
				}
				else if ($value == 2)
				{
					$ntext = $this->text_prefix . '_N_ITEMS_ARCHIVED';
				}
				else
				{
					$ntext = $this->text_prefix . '_N_ITEMS_TRASHED';
>>>>>>> upstream/master
				}
				$this->setMessage(JText::plural($ntext, count($cid)));
			}
		}
		$extension = JRequest::getCmd('extension');
		$extensionURL = ($extension) ? '&extension=' . JRequest::getCmd('extension') : '';
<<<<<<< HEAD
		$this->setRedirect(JRoute::_('index.php?option='.$this->option.'&view='.$this->view_list.$extensionURL, false));
=======
		$this->setRedirect(JRoute::_('index.php?option=' . $this->option . '&view=' . $this->view_list . $extensionURL, false));
>>>>>>> upstream/master
	}

	/**
	 * Changes the order of one or more records.
	 *
	 * @return  void
	 *
	 * @since   11.1
	 */
	public function reorder()
	{
		// Check for request forgeries.
		JRequest::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

		// Initialise variables.
<<<<<<< HEAD
		$user	= JFactory::getUser();
		$ids	= JRequest::getVar('cid', null, 'post', 'array');
		$inc	= ($this->getTask() == 'orderup') ? -1 : +1;

		$model = $this->getModel();
		$return = $model->reorder($ids, $inc);
		if ($return === false) {
			// Reorder failed.
			$message = JText::sprintf('JLIB_APPLICATION_ERROR_REORDER_FAILED', $model->getError());
			$this->setRedirect(JRoute::_('index.php?option='.$this->option.'&view='.$this->view_list, false), $message, 'error');
			return false;
		} else {
			// Reorder succeeded.
			$message = JText::_('JLIB_APPLICATION_SUCCESS_ITEM_REORDERED');
			$this->setRedirect(JRoute::_('index.php?option='.$this->option.'&view='.$this->view_list, false), $message);
=======
		$user = JFactory::getUser();
		$ids = JRequest::getVar('cid', null, 'post', 'array');
		$inc = ($this->getTask() == 'orderup') ? -1 : +1;

		$model = $this->getModel();
		$return = $model->reorder($ids, $inc);
		if ($return === false)
		{
			// Reorder failed.
			$message = JText::sprintf('JLIB_APPLICATION_ERROR_REORDER_FAILED', $model->getError());
			$this->setRedirect(JRoute::_('index.php?option=' . $this->option . '&view=' . $this->view_list, false), $message, 'error');
			return false;
		}
		else
		{
			// Reorder succeeded.
			$message = JText::_('JLIB_APPLICATION_SUCCESS_ITEM_REORDERED');
			$this->setRedirect(JRoute::_('index.php?option=' . $this->option . '&view=' . $this->view_list, false), $message);
>>>>>>> upstream/master
			return true;
		}
	}

	/**
	 * Method to save the submitted ordering values for records.
	 *
	 * @return  void
	 *
	 * @since   11.1
	 */
	public function saveorder()
	{
		// Check for request forgeries.
		JRequest::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

		// Get the input
<<<<<<< HEAD
		$pks	= JRequest::getVar('cid',	null,	'post',	'array');
		$order	= JRequest::getVar('order',	null,	'post',	'array');
=======
		$pks = JRequest::getVar('cid', null, 'post', 'array');
		$order = JRequest::getVar('order', null, 'post', 'array');
>>>>>>> upstream/master

		// Sanitize the input
		JArrayHelper::toInteger($pks);
		JArrayHelper::toInteger($order);

		// Get the model
		$model = $this->getModel();

		// Save the ordering
		$return = $model->saveorder($pks, $order);

		if ($return === false)
		{
			// Reorder failed
			$message = JText::sprintf('JLIB_APPLICATION_ERROR_REORDER_FAILED', $model->getError());
<<<<<<< HEAD
			$this->setRedirect(JRoute::_('index.php?option='.$this->option.'&view='.$this->view_list, false), $message, 'error');
			return false;
		} else
		{
			// Reorder succeeded.
			$this->setMessage(JText::_('JLIB_APPLICATION_SUCCESS_ORDERING_SAVED'));
			$this->setRedirect(JRoute::_('index.php?option='.$this->option.'&view='.$this->view_list, false));
=======
			$this->setRedirect(JRoute::_('index.php?option=' . $this->option . '&view=' . $this->view_list, false), $message, 'error');
			return false;
		}
		else
		{
			// Reorder succeeded.
			$this->setMessage(JText::_('JLIB_APPLICATION_SUCCESS_ORDERING_SAVED'));
			$this->setRedirect(JRoute::_('index.php?option=' . $this->option . '&view=' . $this->view_list, false));
>>>>>>> upstream/master
			return true;
		}
	}

	/**
	 * Check in of one or more records.
	 *
	 * @return  void
	 *
	 * @since   11.1
	 */
	public function checkin()
	{
		// Check for request forgeries.
		JRequest::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

		// Initialise variables.
<<<<<<< HEAD
		$user	= JFactory::getUser();
		$ids	= JRequest::getVar('cid', null, 'post', 'array');

		$model = $this->getModel();
		$return = $model->checkin($ids);
		if ($return === false) {
			// Checkin failed.
			$message = JText::sprintf('JLIB_APPLICATION_ERROR_CHECKIN_FAILED', $model->getError());
			$this->setRedirect(JRoute::_('index.php?option='.$this->option.'&view='.$this->view_list, false), $message, 'error');
			return false;
		} else {
			// Checkin succeeded.
			$message =  JText::plural($this->text_prefix.'_N_ITEMS_CHECKED_IN', count($ids));
			$this->setRedirect(JRoute::_('index.php?option='.$this->option.'&view='.$this->view_list, false), $message);
=======
		$user = JFactory::getUser();
		$ids = JRequest::getVar('cid', null, 'post', 'array');

		$model = $this->getModel();
		$return = $model->checkin($ids);
		if ($return === false)
		{
			// Checkin failed.
			$message = JText::sprintf('JLIB_APPLICATION_ERROR_CHECKIN_FAILED', $model->getError());
			$this->setRedirect(JRoute::_('index.php?option=' . $this->option . '&view=' . $this->view_list, false), $message, 'error');
			return false;
		}
		else
		{
			// Checkin succeeded.
			$message = JText::plural($this->text_prefix . '_N_ITEMS_CHECKED_IN', count($ids));
			$this->setRedirect(JRoute::_('index.php?option=' . $this->option . '&view=' . $this->view_list, false), $message);
>>>>>>> upstream/master
			return true;
		}
	}
}
