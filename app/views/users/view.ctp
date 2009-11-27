<div class="users view">
<h2><?php  __('User');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['id']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit User', true), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete User', true), array('action' => 'delete', $user['User']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $user['User']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Users', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New User', true), array('action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Projects', true), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Project', true), array('controller' => 'projects', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Projects');?></h3>
	<?php if (!empty($user['Project'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Entire Bank Process'); ?></th>
		<th><?php __('Entire Bank Knowledge'); ?></th>
		<th><?php __('Entire Bank Risk'); ?></th>
		<th><?php __('Entire Bank Information'); ?></th>
		<th><?php __('Marketing Process'); ?></th>
		<th><?php __('Marketing Knowledge'); ?></th>
		<th><?php __('Marketing Risk'); ?></th>
		<th><?php __('Marketing Information'); ?></th>
		<th><?php __('Production Process'); ?></th>
		<th><?php __('Production Knowledge'); ?></th>
		<th><?php __('Production Risk'); ?></th>
		<th><?php __('Production Information'); ?></th>
		<th><?php __('It Process'); ?></th>
		<th><?php __('It Knowledge'); ?></th>
		<th><?php __('It Risk'); ?></th>
		<th><?php __('It Information'); ?></th>
		<th><?php __('Costs'); ?></th>
		<th><?php __('Emp. Ext. IT Required'); ?></th>
		<th><?php __('Emp. Ext. Man. Required'); ?></th>
		<th><?php __('Emp. Ext. Org. Required'); ?></th>
		<th><?php __('Emp. IT Dev. Required'); ?></th>
		<th><?php __('Emp. Man. Required'); ?></th>
		<th><?php __('Emp. Serv. Sav. Required'); ?></th>
		<th><?php __('Emp. Org. Required'); ?></th>
		<th><?php __('Emp. Mark. Required'); ?></th>
		<th><?php __('Emp. S&M Loans Required'); ?></th>
		<th><?php __('Emp. Orig. Loans Required'); ?></th>
		<th><?php __('Emp. Serv. Loans Required'); ?></th>
		<th><?php __('Emp. S&M Sav. Required'); ?></th>
		<th><?php __('Emp. Orig. Sav. Required'); ?></th>
		<th><?php __('Comm. Required'); ?></th>
		<th><?php __('Server Required'); ?></th>
		<th><?php __('Storage Required'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Project'] as $project):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $project['id'];?></td>
			<td><?php echo $project['name'];?></td>
			<td><?php echo $project['entire_bank_process'];?></td>
			<td><?php echo $project['entire_bank_knowledge'];?></td>
			<td><?php echo $project['entire_bank_risk'];?></td>
			<td><?php echo $project['entire_bank_information'];?></td>
			<td><?php echo $project['marketing_process'];?></td>
			<td><?php echo $project['marketing_knowledge'];?></td>
			<td><?php echo $project['marketing_risk'];?></td>
			<td><?php echo $project['marketing_information'];?></td>
			<td><?php echo $project['production_process'];?></td>
			<td><?php echo $project['production_knowledge'];?></td>
			<td><?php echo $project['production_risk'];?></td>
			<td><?php echo $project['production_information'];?></td>
			<td><?php echo $project['it_process'];?></td>
			<td><?php echo $project['it_knowledge'];?></td>
			<td><?php echo $project['it_risk'];?></td>
			<td><?php echo $project['it_information'];?></td>
			<td><?php echo $project['costs'];?></td>
			<td><?php echo $project['Emp. Ext. IT required'];?></td>
			<td><?php echo $project['Emp. Ext. Man. required'];?></td>
			<td><?php echo $project['Emp. Ext. Org. required'];?></td>
			<td><?php echo $project['Emp. IT Dev. required'];?></td>
			<td><?php echo $project['Emp. Man. required'];?></td>
			<td><?php echo $project['Emp. Serv. Sav. required'];?></td>
			<td><?php echo $project['Emp. Org. required'];?></td>
			<td><?php echo $project['Emp. Mark. required'];?></td>
			<td><?php echo $project['Emp. S&M Loans required'];?></td>
			<td><?php echo $project['Emp. Orig. Loans required'];?></td>
			<td><?php echo $project['Emp. Serv. Loans required'];?></td>
			<td><?php echo $project['Emp. S&M Sav. required'];?></td>
			<td><?php echo $project['Emp. Orig. Sav. required'];?></td>
			<td><?php echo $project['Comm. required'];?></td>
			<td><?php echo $project['Server required'];?></td>
			<td><?php echo $project['Storage required'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller' => 'projects', 'action' => 'view', $project['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller' => 'projects', 'action' => 'edit', $project['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller' => 'projects', 'action' => 'delete', $project['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $project['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Project', true), array('controller' => 'projects', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
