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

jimport('joomla.application.component.controller');

use \Joomla\CMS\Factory;

/**
 * Class Dt_whatsapp_integrationController
 *
 * @since  1.6
 */
class Dt_whatsapp_integrationController extends \Joomla\CMS\MVC\Controller\BaseController
{
	/**
	 * Method to display a view.
	 *
	 * @param   boolean $cachable  If true, the view output will be cached
	 * @param   mixed   $urlparams An array of safe url parameters and their variable types, for valid values see {@link JFilterInput::clean()}.
	 *
	 * @return  JController   This object to support chaining.
	 *
	 * @since    1.5
	 * @throws Exception
	 */
	public function display($cachable = false, $urlparams = false)
	{
		$app  = Factory::getApplication();
		$view = $app->input->getCmd('view', 'whatsappintegrationphonenumbers');
		$app->input->set('view', $view);
		

		parent::display($cachable, $urlparams);

		return $this;
	}
}
