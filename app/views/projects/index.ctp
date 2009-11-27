<div class="projects index">
<h2><?php __('Projects');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('name');?></th>
	<th><?php echo $paginator->sort('entire_bank_process');?></th>
	<th><?php echo $paginator->sort('entire_bank_knowledge');?></th>
	<th><?php echo $paginator->sort('entire_bank_risk');?></th>
	<th><?php echo $paginator->sort('entire_bank_information');?></th>
	<th><?php echo $paginator->sort('marketing_process');?></th>
	<th><?php echo $paginator->sort('marketing_knowledge');?></th>
	<th><?php echo $paginator->sort('marketing_risk');?></th>
	<th><?php echo $paginator->sort('marketing_information');?></th>
	<th><?php echo $paginator->sort('production_process');?></th>
	<th><?php echo $paginator->sort('production_knowledge');?></th>
	<th><?php echo $paginator->sort('production_risk');?></th>
	<th><?php echo $paginator->sort('production_information');?></th>
	<th><?php echo $paginator->sort('it_process');?></th>
	<th><?php echo $paginator->sort('it_knowledge');?></th>
	<th><?php echo $paginator->sort('it_risk');?></th>
	<th><?php echo $paginator->sort('it_information');?></th>
	<th><?php echo $paginator->sort('costs');?></th>
	<th><?php echo $paginator->sort('Emp. Ext. IT required');?></th>
	<th><?php echo $paginator->sort('Emp. Ext. Man. required');?></th>
	<th><?php echo $paginator->sort('Emp. Ext. Org. required');?></th>
	<th><?php echo $paginator->sort('Emp. IT Dev. required');?></th>
	<th><?php echo $paginator->sort('Emp. Man. required');?></th>
	<th><?php echo $paginator->sort('Emp. Serv. Sav. required');?></th>
	<th><?php echo $paginator->sort('Emp. Org. required');?></th>
	<th><?php echo $paginator->sort('Emp. Mark. required');?></th>
	<th><?php echo $paginator->sort('Emp. S&M Loans required');?></th>
	<th><?php echo $paginator->sort('Emp. Orig. Loans required');?></th>
	<th><?php echo $paginator->sort('Emp. Serv. Loans required');?></th>
	<th><?php echo $paginator->sort('Emp. S&M Sav. required');?></th>
	<th><?php echo $paginator->sort('Emp. Orig. Sav. required');?></th>
	<th><?php echo $paginator->sort('Comm. required');?></th>
	<th><?php echo $paginator->sort('Server required');?></th>
	<th><?php echo $paginator->sort('Storage required');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($projects as $project):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $project['Project']['id']; ?>
		</td>
		<td>
			<?php echo $project['Project']['name']; ?>
		</td>
		<td>
			<?php echo $project['Project']['entire_bank_process']; ?>
		</td>
		<td>
			<?php echo $project['Project']['entire_bank_knowledge']; ?>
		</td>
		<td>
			<?php echo $project['Project']['entire_bank_risk']; ?>
		</td>
		<td>
			<?php echo $project['Project']['entire_bank_information']; ?>
		</td>
		<td>
			<?php echo $project['Project']['marketing_process']; ?>
		</td>
		<td>
			<?php echo $project['Project']['marketing_knowledge']; ?>
		</td>
		<td>
			<?php echo $project['Project']['marketing_risk']; ?>
		</td>
		<td>
			<?php echo $project['Project']['marketing_information']; ?>
		</td>
		<td>
			<?php echo $project['Project']['production_process']; ?>
		</td>
		<td>
			<?php echo $project['Project']['production_knowledge']; ?>
		</td>
		<td>
			<?php echo $project['Project']['production_risk']; ?>
		</td>
		<td>
			<?php echo $project['Project']['production_information']; ?>
		</td>
		<td>
			<?php echo $project['Project']['it_process']; ?>
		</td>
		<td>
			<?php echo $project['Project']['it_knowledge']; ?>
		</td>
		<td>
			<?php echo $project['Project']['it_risk']; ?>
		</td>
		<td>
			<?php echo $project['Project']['it_information']; ?>
		</td>
		<td>
			<?php echo $project['Project']['costs']; ?>
		</td>
		<td>
			<?php echo $project['Project']['Emp. Ext. IT required']; ?>
		</td>
		<td>
			<?php echo $project['Project']['Emp. Ext. Man. required']; ?>
		</td>
		<td>
			<?php echo $project['Project']['Emp. Ext. Org. required']; ?>
		</td>
		<td>
			<?php echo $project['Project']['Emp. IT Dev. required']; ?>
		</td>
		<td>
			<?php echo $project['Project']['Emp. Man. required']; ?>
		</td>
		<td>
			<?php echo $project['Project']['Emp. Serv. Sav. required']; ?>
		</td>
		<td>
			<?php echo $project['Project']['Emp. Org. required']; ?>
		</td>
		<td>
			<?php echo $project['Project']['Emp. Mark. required']; ?>
		</td>
		<td>
			<?php echo $project['Project']['Emp. S&M Loans required']; ?>
		</td>
		<td>
			<?php echo $project['Project']['Emp. Orig. Loans required']; ?>
		</td>
		<td>
			<?php echo $project['Project']['Emp. Serv. Loans required']; ?>
		</td>
		<td>
			<?php echo $project['Project']['Emp. S&M Sav. required']; ?>
		</td>
		<td>
			<?php echo $project['Project']['Emp. Orig. Sav. required']; ?>
		</td>
		<td>
			<?php echo $project['Project']['Comm. required']; ?>
		</td>
		<td>
			<?php echo $project['Project']['Server required']; ?>
		</td>
		<td>
			<?php echo $project['Project']['Storage required']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $project['Project']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $project['Project']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $project['Project']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $project['Project']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New Project', true), array('action' => 'add')); ?></li>
		<li><?php echo $html->link(__('List Relations', true), array('controller' => 'relations', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Relation', true), array('controller' => 'relations', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
