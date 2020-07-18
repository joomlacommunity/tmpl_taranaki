<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  Templates.taranaki
 *
 * @copyright   Copyright (C)  2020 Shayne Bartlett. All rights reserved.
 * @license     GNU General Public License version 3 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

function modChrome_cpanel($module, &$params, &$attribs)
{

	
	if ($module->content)
	{
		$moduleTag     = $params->get('module_tag', 'div');

		// Renders Tailwind Equivilent to Bootstrap
		$bootstrapSize = (int) $params->get('bootstrap_size');
		$moduleClass   = $bootstrapSize ? ' w-' . $bootstrapSize . '/12' : 'w-6/12';

		$headerTag     = htmlspecialchars($params->get('header_tag', 'h2'), ENT_COMPAT, 'UTF-8');

		// Temporarily store header class in variable
		$headerClass   = $params->get('header_class');
		$headerClass   = $headerClass ? ' ' . htmlspecialchars($headerClass, ENT_COMPAT, 'UTF-8') : '';

		echo '<' . $moduleTag . ' class="' . $moduleClass . '">';
		echo '	<div class="m-4 p-6 bg-white border">';

		if ($module->showtitle)
		{
			echo '		<' . $headerTag . ' class="module-title nav-header' . $headerClass . '">' . $module->title . '</' . $headerTag . '>';
		}

		echo $module->content;
		
		echo '	</div>';
		echo '</' . $moduleTag . '>';
	}
}
