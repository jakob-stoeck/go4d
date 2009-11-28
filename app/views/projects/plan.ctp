
<div id="projectsimagecontainer">
<?=$html->link(
	$html->image('projects_start_small.png'),
	'/img/projects_start_big.png',
	array('id'=>'zoomProject'),false,false
)?>
</div>
<?=$form->create(null, array('url' => '/projects/anaylze')); ?>
<table>
<?=$html->tableHeaders(array('Projekt','Name','Kosten','Erledigt','Gewünscht'));?>
<?
$tCells = array();
foreach ($puProjects as $pu) {
	$tCells[] = array(
		'WP'. substr('000'.$pu['Project']['id'],-3),
		$pu['Project']['name'],
		$pu['Project']['costs']/1000 . 'k',
		$form->checkbox('ProjectsUsers.'.$pu['Project']['id'].'.done',array('checked'=>$pu['ProjectsUsers']['done']?true:false)),
		$form->checkbox('ProjectsUsers.'.$pu['Project']['id'].'.wanted',array('checked'=>$pu['ProjectsUsers']['wanted']?true:false))
	);
}
?>
<?=$html->tableCells($tCells,array('class'=>'darker'));?>
</table>
<?=$form->submit('Speichern/Analysieren')?>
<?=$form->end();?>

<script type="text/javascript">
	new Zoomer('zoomProject');
</script>