<? foreach($matrix as $round => $m): ?>
<h2>Round <?=$round?></h2>
<?= $diagram->matrix($m); ?>
<? endforeach; ?>
<table>
<?=$html->tableHeaders($orderedTableData['tableHeader']);?>
<?=$html->tableCells($orderedTableData['tableCells'],array('class'=>'darker'));?>
</table>