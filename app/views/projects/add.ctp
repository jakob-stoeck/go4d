<div class="projects form">
<?php echo $form->create('Project');?>
	<fieldset>
 		<legend><?php __('Add Project');?></legend>
	<?php
		echo $form->input('name');
		echo $form->input('entire_bank_process');
		echo $form->input('entire_bank_knowledge');
		echo $form->input('entire_bank_risk');
		echo $form->input('entire_bank_information');
		echo $form->input('marketing_process');
		echo $form->input('marketing_knowledge');
		echo $form->input('marketing_risk');
		echo $form->input('marketing_information');
		echo $form->input('production_process');
		echo $form->input('production_knowledge');
		echo $form->input('production_risk');
		echo $form->input('production_information');
		echo $form->input('it_process');
		echo $form->input('it_knowledge');
		echo $form->input('it_risk');
		echo $form->input('it_information');
		echo $form->input('costs');
		echo $form->input('emp_ext_it required');
		echo $form->input('emp_ext_man_required');
		echo $form->input('emp_ext_org_required');
		echo $form->input('emp_it dev_required');
		echo $form->input('emp_man_required');
		echo $form->input('emp_serv_sav_required');
		echo $form->input('emp_org_required');
		echo $form->input('emp_mark_required');
		echo $form->input('emp_sm loans_required');
		echo $form->input('emp_orig_loans_required');
		echo $form->input('emp_serv_loans_required');
		echo $form->input('emp_sm sav_required');
		echo $form->input('emp_orig_sav_required');
		echo $form->input('comm_required');
		echo $form->input('server_required');
		echo $form->input('storage_required');
		echo $form->input('User');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Projects', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('List Relations', true), array('controller' => 'relations', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Relation', true), array('controller' => 'relations', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
