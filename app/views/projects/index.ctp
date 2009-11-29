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
	<th><?php echo $paginator->sort('emp_ext_it_required');?></th>
	<th><?php echo $paginator->sort('emp_ext_man_required');?></th>
	<th><?php echo $paginator->sort('emp_ext_org_required');?></th>
	<th><?php echo $paginator->sort('emp_it_dev_required');?></th>
	<th><?php echo $paginator->sort('emp_man_required');?></th>
	<th><?php echo $paginator->sort('emp_serv_sav_required');?></th>
	<th><?php echo $paginator->sort('emp_org_required');?></th>
	<th><?php echo $paginator->sort('emp_mark_required');?></th>
	<th><?php echo $paginator->sort('emp_sm_loans_required');?></th>
	<th><?php echo $paginator->sort('emp_orig_loans_required');?></th>
	<th><?php echo $paginator->sort('emp_serv_loans_required');?></th>
	<th><?php echo $paginator->sort('emp_sm_sav_required');?></th>
	<th><?php echo $paginator->sort('emp_orig_sav_required');?></th>
	<th><?php echo $paginator->sort('comm_required');?></th>
	<th><?php echo $paginator->sort('server_required');?></th>
	<th><?php echo $paginator->sort('storage_required');?></th>
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
			<?php echo $project['Project']['emp_ext_it_required']; ?>
		</td>
		<td>
			<?php echo $project['Project']['emp_ext_man_required']; ?>
		</td>
		<td>
			<?php echo $project['Project']['emp_ext_org_required']; ?>
		</td>
		<td>
			<?php echo $project['Project']['emp_it_dev_required']; ?>
		</td>
		<td>
			<?php echo $project['Project']['emp_man_required']; ?>
		</td>
		<td>
			<?php echo $project['Project']['emp_serv_sav_required']; ?>
		</td>
		<td>
			<?php echo $project['Project']['emp_org_required']; ?>
		</td>
		<td>
			<?php echo $project['Project']['emp_mark_required']; ?>
		</td>
		<td>
			<?php echo $project['Project']['emp_sm_loans_required']; ?>
		</td>
		<td>
			<?php echo $project['Project']['emp_orig_loans_required']; ?>
		</td>
		<td>
			<?php echo $project['Project']['emp_serv_loans_required']; ?>
		</td>
		<td>
			<?php echo $project['Project']['emp_sm_sav_required']; ?>
		</td>
		<td>
			<?php echo $project['Project']['emp_orig_sav_required']; ?>
		</td>
		<td>
			<?php echo $project['Project']['comm_required']; ?>
		</td>
		<td>
			<?php echo $project['Project']['server_required']; ?>
		</td>
		<td>
			<?php echo $project['Project']['storage_required']; ?>
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
	</ul>
</div>
