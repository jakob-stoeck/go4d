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
		echo $form->input('Emp. Ext. IT required');
		echo $form->input('Emp. Ext. Man. required');
		echo $form->input('Emp. Ext. Org. required');
		echo $form->input('Emp. IT Dev. required');
		echo $form->input('Emp. Man. required');
		echo $form->input('Emp. Serv. Sav. required');
		echo $form->input('Emp. Org. required');
		echo $form->input('Emp. Mark. required');
		echo $form->input('Emp. S&M Loans required');
		echo $form->input('Emp. Orig. Loans required');
		echo $form->input('Emp. Serv. Loans required');
		echo $form->input('Emp. S&M Sav. required');
		echo $form->input('Emp. Orig. Sav. required');
		echo $form->input('Comm. required');
		echo $form->input('Server required');
		echo $form->input('Storage required');
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
