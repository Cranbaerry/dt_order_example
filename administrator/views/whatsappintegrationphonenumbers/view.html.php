<?php

/**
 * @version    CVS: 1.0.0
 * @package    Com_Dt_whatsapp_integration
 * @author     dreamztech <support@dreamztech.com.my>
 * @copyright  2024 dreamztech
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */
// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.view');

use \Joomla\CMS\Language\Text;

/**
 * View class for a list of Dt_whatsapp_integration.
 *
 * @since  1.6
 */
class Dt_whatsapp_integrationViewWhatsappintegrationphonenumbers extends \Joomla\CMS\MVC\View\HtmlView
{
	protected $items;

	protected $pagination;

	protected $state;

	/**
	 * Display the view
	 *
	 * @param   string  $tpl  Template name
	 *
	 * @return void
	 *
	 * @throws Exception
	 */
	public function display($tpl = null)
	{
		$this->state = $this->get('State');
		$this->items = $this->get('Items');
		$this->pagination = $this->get('Pagination');
        $this->filterForm = $this->get('FilterForm');
        $this->activeFilters = $this->get('ActiveFilters');

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			throw new Exception(implode("\n", $errors));
		}

		Dt_whatsapp_integrationHelper::addSubmenu('whatsappintegrationphonenumbers');

		$this->addToolbar();

		$this->sidebar = JHtmlSidebar::render();
		parent::display($tpl);
	}

	/**
	 * Add the page title and toolbar.
	 *
	 * @return void
	 *
	 * @since    1.6
	 */
	protected function addToolbar()
	{
		$state = $this->get('State');
		$canDo = Dt_whatsapp_integrationHelper::getActions();

		JToolBarHelper::title(Text::_('COM_DT_WHATSAPP_INTEGRATION_TITLE_WHATSAPPINTEGRATIONPHONENUMBERS'), 'whatsappintegrationphonenumbers.png');

		// Check if the form exists before showing the add/edit buttons
		$formPath = JPATH_COMPONENT_ADMINISTRATOR . '/views/whatsappintegrationphonenumber';

		if (file_exists($formPath))
		{
			if ($canDo->get('core.create'))
			{
				JToolBarHelper::addNew('whatsappintegrationphonenumber.add', 'JTOOLBAR_NEW');

				if (isset($this->items[0]))
				{
					JToolbarHelper::custom('whatsappintegrationphonenumbers.duplicate', 'copy.png', 'copy_f2.png', 'JTOOLBAR_DUPLICATE', true);
				}
			}

			if ($canDo->get('core.edit') && isset($this->items[0]))
			{
				JToolBarHelper::editList('whatsappintegrationphonenumber.edit', 'JTOOLBAR_EDIT');
			}
		}

		if ($canDo->get('core.edit.state'))
		{
			if (isset($this->items[0]->state))
			{
				JToolBarHelper::divider();
				JToolBarHelper::custom('whatsappintegrationphonenumbers.publish', 'publish.png', 'publish_f2.png', 'JTOOLBAR_PUBLISH', true);
				JToolBarHelper::custom('whatsappintegrationphonenumbers.unpublish', 'unpublish.png', 'unpublish_f2.png', 'JTOOLBAR_UNPUBLISH', true);
			}
			elseif (isset($this->items[0]))
			{
				// If this component does not use state then show a direct delete button as we can not trash
				JToolBarHelper::deleteList('', 'whatsappintegrationphonenumbers.delete', 'JTOOLBAR_DELETE');
			}

			if (isset($this->items[0]->state))
			{
				JToolBarHelper::divider();
				JToolBarHelper::archiveList('whatsappintegrationphonenumbers.archive', 'JTOOLBAR_ARCHIVE');
			}

			if (isset($this->items[0]->checked_out))
			{
				JToolBarHelper::custom('whatsappintegrationphonenumbers.checkin', 'checkin.png', 'checkin_f2.png', 'JTOOLBAR_CHECKIN', true);
			}
		}

		// Show trash and delete for components that uses the state field
		if (isset($this->items[0]->state))
		{
			if ($state->get('filter.state') == -2 && $canDo->get('core.delete'))
			{
				JToolBarHelper::deleteList('', 'whatsappintegrationphonenumbers.delete', 'JTOOLBAR_EMPTY_TRASH');
				JToolBarHelper::divider();
			}
			elseif ($canDo->get('core.edit.state'))
			{
				JToolBarHelper::trash('whatsappintegrationphonenumbers.trash', 'JTOOLBAR_TRASH');
				JToolBarHelper::divider();
			}
		}

		

		if ($canDo->get('core.admin'))
		{
			JToolBarHelper::preferences('com_dt_whatsapp_integration');
		}

		// Set sidebar action - New in 3.0
		JHtmlSidebar::setAction('index.php?option=com_dt_whatsapp_integration&view=whatsappintegrationphonenumbers');
	}

	/**
	 * Method to order fields 
	 *
	 * @return void 
	 */
	protected function getSortFields()
	{
		return array(
			'a.`state`' => JText::_('JSTATUS'),
			'a.`ordering`' => JText::_('JGRID_HEADING_ORDERING'),
			'a.`user_id`' => JText::_('COM_DT_WHATSAPP_INTEGRATION_WHATSAPPINTEGRATIONPHONENUMBERS_USER_ID'),
			'a.`phone_number`' => JText::_('COM_DT_WHATSAPP_INTEGRATION_WHATSAPPINTEGRATIONPHONENUMBERS_PHONE_NUMBER'),
		);
	}

    /**
     * Check if state is set
     *
     * @param   mixed  $state  State
     *
     * @return bool
     */
    public function getState($state)
    {
        return isset($this->state->{$state}) ? $this->state->{$state} : false;
    }
}
