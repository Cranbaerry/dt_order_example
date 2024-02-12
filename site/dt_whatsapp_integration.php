<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Dt_whatsapp_integration
 * @author     dreamztech <support@dreamztech.com.my>
 * @copyright  2024 dreamztech
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use \Joomla\CMS\Factory;
use \Joomla\CMS\MVC\Controller\BaseController;

// Include dependancies
jimport('joomla.application.component.controller');

JLoader::registerPrefix('Dt_whatsapp_integration', JPATH_COMPONENT);
JLoader::register('Dt_whatsapp_integrationController', JPATH_COMPONENT . '/controller.php');


// Execute the task.
$controller = BaseController::getInstance('Dt_whatsapp_integration');
$controller->execute(Factory::getApplication()->input->get('task'));
$controller->redirect();
