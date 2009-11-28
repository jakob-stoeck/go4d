<?php
class Project extends AppModel {

	var $name = 'Project';

	
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
		'Relation' => array(
			'className' => 'Relation',
			'foreignKey' => 'project_id'
		)
	);

	var $hasAndBelongsToMany = array(
		'User' => array(
			'className' => 'User',
			'joinTable' => 'projects_users',
			'foreignKey' => 'project_id',
			'associationForeignKey' => 'user_id',
			'unique' => true
		)
	);

    function dot($projects, $relations, $graphname = 'workpackages') {
        // TODO secure $graphname!

        $data = 'digraph ' . $graphname . ' {'."\n";

        foreach($projects as $id => $name) {
            $data .= $id . ' [label="' . $name . '"]'."\n";
        }

        foreach($relations as $r) {
            $data .= $r['Relation']['project_preceding_id'] . ' -> ' . $r['Relation']['project_id'].($r['Relation']['type']=='constraint'?' [color=green]':'')."\n";
        }


        $file = new File(WWW_ROOT . '/graph/' . $graphname . '.dot', true);
        $file->write($data);
        $file->close();

        $graph = shell_exec('dot -Tpng -o"img/' . $graphname . '.png" graph/' . $graphname . '.dot');

        return $graph;
    }


}
?>