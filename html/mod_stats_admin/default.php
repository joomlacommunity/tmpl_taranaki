<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  mod_stats_admin
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('jquery.framework');
JFactory::getDocument()->addScriptDeclaration('
	jQuery(document).ready(function($) {
		$("a.js-revert").on("click", function(e) {
			e.preventDefault();
			e.stopPropagation();

			var activeTab = [];
			activeTab.push("#" + e.target.href.split("#")[1]);
			var path = window.location.pathname;
			localStorage.removeItem(e.target.href.replace(/&return=[a-zA-Z0-9%]+/, "").replace(/&[a-zA-Z-_]+=[0-9]+/, ""));
			localStorage.setItem(path + e.target.href.split("index.php")[1].split("#")[0], JSON.stringify(activeTab));
			return window.location.href = e.target.href.split("#")[0];
		});
	});
');
?>
<div class="site-info">
	<?php foreach ($list as $item) : ?>
		<div class="flex py-1">
			<div class="w-1/4">
				<span class=" text-green-500 mr-2 icon-<?php echo $item->icon; ?>" aria-hidden="true"></span> <?php echo $item->title; ?>
			</div>
			<div class="w-3/4">
				<?php if (isset($item->link)) : ?>
					<a class="btn btn-info btn-small js-revert" href="<?php echo $item->link; ?>"><?php echo $item->data; ?></a>
				<?php else : ?>
					<?php echo $item->data; ?>
				<?php endif; ?>
			</div>
		</div>
	<?php endforeach; ?>
</div>
