<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  mod_logged
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('bootstrap.tooltip');
?>
<div class="logged">
	<?php foreach ($users as $user) : ?>
		<div class="flex py-1">
			<div class="w-3/4">
				<?php if ($user->client_id == 0) : ?>
					<a title="<?php echo JHtml::_('tooltipText', 'MOD_LOGGED_LOGOUT'); ?>" href="<?php echo $user->logoutLink; ?>" class="btn btn-danger btn-mini hasTooltip">
						<span class="icon-remove icon-white" aria-hidden="true"><span class="element-invisible"><?php echo JText::_('JLOGOUT'); ?></span></span>
					</a>
				<?php endif; ?>

				<strong class="row-title">
					<?php if (isset($user->editLink)) : ?>
						<a href="<?php echo $user->editLink; ?>" class="hasTooltip" title="<?php echo JHtml::_('tooltipText', 'JGRID_HEADING_ID'); ?> : <?php echo $user->id; ?>">
							<?php echo $user->name; ?></a>
					<?php else : ?>
						<?php echo $user->name; ?>
					<?php endif; ?>
				</strong>

				<small class="small hasTooltip" title="<?php echo JHtml::_('tooltipText', 'JCLIENT'); ?>">
					<?php if ($user->client_id === null) : ?>
						<?php // Don't display a client ?>
					<?php elseif ($user->client_id) : ?>
						<?php echo JText::_('JADMINISTRATION'); ?>
					<?php else : ?>
						<?php echo JText::_('JSITE'); ?>
					<?php endif; ?>
				</small>
			</div>
			<div class="w-1/4">
				<div class="text-xs pull-right hasTooltip" title="<?php echo JHtml::_('tooltipText', 'MOD_LOGGED_LAST_ACTIVITY'); ?>">
					<span class="icon-calendar" aria-hidden="true"></span> <?php echo JHtml::_('date', $user->time, JText::_('DATE_FORMAT_LC5')); ?>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>
