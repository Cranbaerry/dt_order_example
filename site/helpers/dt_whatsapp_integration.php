<?php

/**
 * @version    CVS: 1.0.0
 * @package    Com_Dt_whatsapp_integration
 * @author     dreamztech <support@dreamztech.com.my>
 * @copyright  2024 dreamztech
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

JLoader::register('Dt_whatsapp_integrationHelper', JPATH_ADMINISTRATOR . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'com_dt_whatsapp_integration' . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'dt_whatsapp_integration.php');

use \Joomla\CMS\Factory;
use \Joomla\CMS\MVC\Model\BaseDatabaseModel;

/**
 * Class Dt_whatsapp_integrationFrontendHelper
 *
 * @since  1.6
 */
class Dt_whatsapp_integrationHelpersDt_whatsapp_integration
{
	/**
	 * Get an instance of the named model
	 *
	 * @param   string  $name  Model name
	 *
	 * @return null|object
	 */
	public static function getModel($name)
	{
		$model = null;

		// If the file exists, let's
		if (file_exists(JPATH_SITE . '/components/com_dt_whatsapp_integration/models/' . strtolower($name) . '.php'))
		{
			require_once JPATH_SITE . '/components/com_dt_whatsapp_integration/models/' . strtolower($name) . '.php';
			$model = BaseDatabaseModel::getInstance($name, 'Dt_whatsapp_integrationModel');
		}

		return $model;
	}

	/**
	 * Gets the files attached to an item
	 *
	 * @param   int     $pk     The item's id
	 *
	 * @param   string  $table  The table's name
	 *
	 * @param   string  $field  The field's name
	 *
	 * @return  array  The files
	 */
	public static function getFiles($pk, $table, $field)
	{
		$db = Factory::getDbo();
		$query = $db->getQuery(true);

		$query
			->select($field)
			->from($table)
			->where('id = ' . (int) $pk);

		$db->setQuery($query);

		return explode(',', $db->loadResult());
	}

    /**
     * Gets the edit permission for an user
     *
     * @param   mixed  $item  The item
     *
     * @return  bool
     */
    public static function canUserEdit($item)
    {
        $permission = false;
        $user       = Factory::getUser();

        if ($user->authorise('core.edit', 'com_dt_whatsapp_integration') || (isset($item->created_by) && $user->authorise('core.edit.own', 'com_dt_whatsapp_integration') && $item->created_by == $user->id))
        {
            $permission = true;
        }

        return $permission;
    }
}
