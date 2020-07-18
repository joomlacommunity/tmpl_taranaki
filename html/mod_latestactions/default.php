<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  mod_latestactions
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;

HTMLHelper::_('bootstrap.tooltip');
?>
<div class="latest-actions">
	<?php if (count($list)) : ?>
		<?php foreach ($list as $i => $item) : ?>
			<div class="flex py-1">
				<div class="w-3/4">
					<?php echo $item->message; ?>
				</div>
				<div class="w-1/4">
					<div class="text-xs pull-right hasTooltip" title="<?php echo HTMLHelper::_('tooltipText', 'JGLOBAL_FIELD_CREATED_LABEL'); ?>">
						<span class="icon-calendar" aria-hidden="true"></span> <?php echo HTMLHelper::_('date', $item->log_date, JText::_('DATE_FORMAT_LC5')); ?>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	<?php else : ?>
		<div class="w-full">
			<div class="w-full">
				<div class="alert"><?php echo Text::_('MOD_LATEST_ACTIONS_NO_MATCHING_RESULTS'); ?></div>
			</div>
		</div>
	<?php endif; ?>
</div>
