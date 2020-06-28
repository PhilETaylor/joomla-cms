<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_finder
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\Component\Finder\Site\Controller;

\defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\MVC\Controller\BaseController;
use Joomla\Component\Finder\Administrator\Helper\LanguageHelper;

/**
 * Finder Component Controller.
 *
 * @since  2.5
 */
class DisplayController extends BaseController
{
	/**
	 * Method to display a view.
	 *
	 * @param   boolean  $cacheable   If true, the view output will be cached. [optional]
	 * @param   array    $urlparams  An array of safe URL parameters and their variable types,
	 *                               for valid values see {@link \JFilterInput::clean()}. [optional]
	 *
	 * @return  static  This object is to support chaining.
	 *
	 * @since   2.5
	 */
	public function display($cacheable = false, $urlparams = array())
	{
		$input = Factory::getApplication()->input;
		$cacheable = true;

		// Load plugin language files.
		LanguageHelper::loadPluginLanguage();

		// Set the default view name and format from the Request.
		$viewName = $input->get('view', 'search', 'word');
		$input->set('view', $viewName);

		// Don't cache view for search queries
		if ($input->get('q', null, 'string') || $input->get('f', null, 'int') || $input->get('t', null, 'array'))
		{
			$cacheable = false;
		}

		$safeurlparams = array(
			'f'    => 'INT',
			'lang' => 'CMD'
		);

		return parent::display($cacheable, $safeurlparams);
	}
}
