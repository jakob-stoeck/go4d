<table>
	<?=$html->tableHeaders($orderedTableData['tableHeader']);?>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<? foreach($matrix as $m): ?>
			<td>
			<?= $diagram->matrix($m); ?>
			</td>
		<? endforeach; ?>
	</tr>
	<?=$html->tableCells($orderedTableData['tableCells'],array('class'=>'darker'));?>
</table>