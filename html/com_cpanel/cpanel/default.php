<?php

/**
 * @package     Joomla.Administrator
 * @subpackage  com_cpanel
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\Registry\Registry;

$user = JFactory::getUser();
?>
<div>
		
	<div class="cpanel-links p-6">
		<h3>Quicklinks</h3>
		<?php echo JModuleHelper::renderModule('quicklinks'); ?>
		<jdoc:include type="modules" name="quicklinks" />
	</div>

	<?php if ($user->authorise('core.manage', 'com_postinstall') && $this->postinstall_message_count) : ?>
		<div class="row-fluid">
			<div class="alert alert-info">
				<h3>
					<?php echo JText::_('COM_CPANEL_MESSAGES_TITLE'); ?>
				</h3>
				<p>
					<?php echo JText::_('COM_CPANEL_MESSAGES_BODY_NOCLOSE'); ?>
				</p>
				<p>
					<?php echo JText::_('COM_CPANEL_MESSAGES_BODYMORE_NOCLOSE'); ?>
				</p>
				<p>
					<a href="index.php?option=com_postinstall&amp;eid=700" class="btn btn-primary">
						<?php echo JText::_('COM_CPANEL_MESSAGES_REVIEW'); ?>
					</a>
				</p>
			</div>
		</div>
	<?php endif; ?>

	<div class="flex flex-row flex-wrap cpanel">
		<?php foreach ($this->modules as $module) :?>
			<?php $params = new Registry($module->params); ?>
				<?php echo JModuleHelper::renderModule($module, array('style' => 'cpanel')); ?>
		<?php endforeach ;?>
	</div>
</div>