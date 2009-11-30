<?php
class Project extends AppModel {

	var $name = 'Project';

    function dot($projects, $relations, $userId, $calculatedProjectIds,$filtertype = "none") {
        // TODO secure $graphname!
		
    	App::import('Model','ProjectsUsers'); $projectsUsersClass = new ProjectsUsers();
    	$projectAssocs = $projectsUsersClass->find('list',array(
    		'conditions' => array(
    			'ProjectsUsers.user_id'=>$userId,
    			'OR' => array('ProjectsUsers.done'=>1,'ProjectsUsers.wanted'=>1)
    		),
    		'fields' => array('ProjectsUsers.project_id','ProjectsUsers.wanted')
    	));
        $data = 'digraph go4d {'."\n";

        foreach($projects as $id => $name) {
        	$dotProjectArr = array('label = "WP0'.$id.': '.$name.'"');
        	$dotProjectArr[] = 'href="project_'.$id.'_imap"';
        	if ((in_array($id,array_keys($projectAssocs))) && ($projectAssocs[$id]['wanted']==1)) {
        		$dotProjectArr[] = 'color="red"';
        	}
        	elseif (in_array($id,array_keys($projectAssocs))) {
        		$dotProjectArr[] = 'color="green"';
        	}
        	elseif (in_array($id,$calculatedProjectIds)) {
        		$dotProjectArr[] = 'color="black"';
        	}
        	else {
        		if ($filtertype == "focus") {
	        		$dotProjectArr[] = 'color="#aaaaaa"';
	        		$dotProjectArr[] = 'fontcolor="#aaaaaa"';
        		}
        		elseif ($filtertype == "hide") {
        			$dotProjectArr = null;
        		}
        	}
        	
        	if ($dotProjectArr) $data .= $id.' ['.implode(', ',$dotProjectArr).']'.";\n";
        	
        }

        foreach($relations as $r) {
            $relStart = $r['Relation']['project_preceding_id'] . ' -> ' . $r['Relation']['project_id'];
            
            
            $relData = array('color'=> 'color="#000044"');
            if ($r['Relation']['type']=='constraint') {
            	$relData['color'] = 'color="green"';
            }
            
            if (!(
            	(in_array($r['Relation']['project_preceding_id'],$calculatedProjectIds)) && 
            	(in_array($r['Relation']['project_id'],$calculatedProjectIds))
            )) {
	            if ($filtertype=="focus") {
	            	$relData = array('color'=> 'color="#aaaaaa"');	
	            }
	            elseif ($filtertype=="hide") {
	            	$relData = null;
	            }
            }
            if ($relData) $data .= $relStart.' ['.implode(', ',$relData)."];\n";
        }
		$data .= '}';

        $file = new File(TMP.'graphs'.DS.$userId.'.dot', true);
        $file->write($data);
        $file->close();
        
        $cmd = 'dot -v -Tpng -o"'.IMAGES.'graphs'.DS.$userId.'.png" -Timap_np -o"'.TMP.'graphs'.DS.$userId.'.map" '.TMP.'graphs'.DS.$userId.'.dot';
        $graphOutput = shell_exec($cmd);
		$fn = IMAGES.'graphs'.DS.$userId.'.png';
//        header('Content-Length: '.filesize($fn));
		
		Configure::write('debug', 0);		
        header('Last-Modified: '.gmdate('D, d M Y H:i:s', time()).' GMT', true, 200);
        header('Content-Type: image/png');
        print file_get_contents($fn);
        exit();        
//      return $graphOutput;
    }

	function getBestPath($userId) {
		App::import('Vendor', 'phplpsolve/lp_maker');
		App::import('Model','ProjectsUsers'); App::import('Model','Relation');

		$projectsUsersClass = new ProjectsUsers();
		$relationClass = new Relation();
		$this->bindModel(array('hasOne'=>array('ProjectsUsers'=>array('conditions'=>array('ProjectsUsers.user_id'=>$userId)))));
		$projects = $this->find('all');
		$projectIds = Set::extract($projects,'{n}.Project.id');
		$relations = $relationClass->find('all',array(
			'conditions'=>array(
				'Relation.project_id' => $projectIds,
				'Relation.project_preceding_id' => $projectIds
			)
		));

//		create target function
		$targetFunctionVector = array();
		foreach ($projects as $project) {
			$targetFunctionVector[] =  $project['ProjectsUsers']['done'] ? 0.0 : $this->linearizeProject($project['Project']);
		}

//		create restrictions
		$restrictionsMatrix = array();
		foreach($relations as $relation) {
			$specificRestrArr = array();
			foreach($projects as $project) {
				if ($relation['Relation']['project_preceding_id']==$project['Project']['id']) {
					$specificRestrArr[] = 1;
				}
				elseif ($relation['Relation']['project_id']==$project['Project']['id']) {
					$specificRestrArr[] = -1;
				}
				else {
					$specificRestrArr[] = 0;
				}
			}
			$restrictionsMatrix[] = $specificRestrArr;
		}
		$inequalityArray = array();
		$restrictionTargetArray = array();
		for ($i = 0; $i < count($restrictionsMatrix); $i++) {
			$inequalityArray[] = 1;
			$restrictionTargetArray[] = 0;
		}

		//add now all things we want and we have.. XXX extend all 3 arrays!
		foreach ($projects as $vectorId => $project) {
			if ($project['ProjectsUsers']['done'] || $project['ProjectsUsers']['wanted']) {
				$specificRestrArr = array();
				for ($i = 0; $i< count($projects); $i++) {
					$specificRestrArr[] = ($i == $vectorId) ? 1 : 0;
				}
				$restrictionsMatrix[] = $specificRestrArr;
				$inequalityArray[] = 0;
				$restrictionTargetArray[] = 1;
			}
		}

//		debug($targetFunctionVector);
//		debug($restrictionsMatrix);
//		debug($restrictionTargetArray);
//		debug($inequalityArray);
		//generate lp...

		$lp = lp_maker($targetFunctionVector,$restrictionsMatrix,$restrictionTargetArray,$inequalityArray);
		lpsolve('set_minim', $lp); //helper sets to maximize

		//recycle inequalityArray for setting the binary vars..
	    for ($i = 0; $i < count($restrictionsMatrix[0]); $i++) {
		    lpsolve('set_binary', $lp, 1, 1);
	    }

	    lpsolve('solve',$lp);
	    $lpObjective = lpsolve('get_objective',$lp);
	    $lpVariables = lpsolve('get_variables',$lp);
	    lpsolve('delete_lp',$lp);


	    $neededProjectIds = array();
	    foreach ($lpVariables[0] as $lpVar=>$needed) {
	    	if ($needed) $neededProjectIds[] = $projects[$lpVar]['Project']['id'];
	    }

//		debug($lpObjective);
//		debug($lpVariables);
		$savedCalculus = array(
			'costs' => $lpObjective,
			'projectIds' =>$neededProjectIds
		);

		App::import('Model','User'); $userClass = new User();
		$userClass->save(array(
			'id' => $userId,
			'saved_calculus' => serialize($savedCalculus)
		));
		return $savedCalculus;
	}

	function orderProjects($projectIds,$userId = null) {
		App::import('Model','Relation'); $relationClass = new Relation();
		App::import('Model','ProjectsUsers'); $projectsUsersClass = new ProjectsUsers();

		$projects = $this->find('all',array('conditions'=> array('Project.id'=>$projectIds)));
		$relations = $relationClass->find('all',array(
			'conditions'=>array(
				'Relation.project_id' =>$projectIds,
				'Relation.project_preceding_id' =>$projectIds
			)
		));
		$rounds = array();
		$relationsList = Set::combine($relations,'{n}.Relation.id','{n}.Relation','{n}.Relation.project_id');

		$usedProjects = array();
		$projectsOfCurrentRound = array();
		$antiCrash = 0;

		//get data for round 0
		if ($userId) {
			$doneProjects = $projectsUsersClass->find('list',array(
				'conditions' => array(
					'ProjectsUsers.user_id'=>$userId,
					'ProjectsUsers.done' => 1
				),
				'fields' => array('ProjectsUsers.project_id')
			));
			foreach ($projects as $project) {
				if (in_array($project['Project']['id'],$doneProjects)) {
					$projectsOfCurrentRound[] = $project;
				}
			}
			if ($projectsOfCurrentRound) {
				$rounds[] = $projectsOfCurrentRound;
				$usedProjects = $this->_removeDuplicates(array_merge($usedProjects,$projectsOfCurrentRound));
				$projectsOfCurrentRound = array();
			}
		}
		//calculate other rounds
		while ((count($usedProjects) < count($projectIds)) && ($antiCrash++ < 100)) {

			$diffProjects = array_udiff(
				$projects,array_merge($usedProjects,$projectsOfCurrentRound),
				array('Project','_compareProjects'));

			$projectIdsForReqs = Set::extract($usedProjects,'{n}.Project.id');
			$projectIdsForConstraints = array_merge(
				Set::extract($usedProjects,'{n}.Project.id'),
				Set::extract($projectsOfCurrentRound,'{n}.Project.id')
			);

			$oldProjectsOfCurrentRoundCounter = count($projectsOfCurrentRound);
//			debug(Set::extract($diffProjects,'{n}.Project.id'));
            // debug(array(
            //     'u'=>Set::extract($usedProjects,'{n}.Project.id'),
            //     'cr' => Set::extract($projectsOfCurrentRound,'{n}.Project.id'),
            //     'merge' => Set::extract(array_merge($usedProjects,$projectsOfCurrentRound),'{n}.Project.id'),
            //     'diff' => Set::extract($diffProjects,'{n}.Project.id')
            // ));

			foreach ($diffProjects as $project) {
				$addToList = true;
				if (in_array($project['Project']['id'],array_keys($relationsList))) {
					foreach ($relationsList[$project['Project']['id']] as $relation) {
						if (!(
							($relation['type']=='req' && in_array($relation['project_preceding_id'],$projectIdsForReqs)) ||
							($relation['type']=='constraint' && in_array($relation['project_preceding_id'],$projectIdsForConstraints))
						)) {
							$addToList = false;
							break;
						}
					}
				}

				if ($addToList) {
					$projectsOfCurrentRound[] = $project;
				}
			}

			//nichts zum hinzufügen gefunden?
			if ($oldProjectsOfCurrentRoundCounter == count($projectsOfCurrentRound)) {
				$rounds[] = $projectsOfCurrentRound;
				$usedProjects = $this->_removeDuplicates(array_merge($usedProjects,$projectsOfCurrentRound));
				$projectsOfCurrentRound = array();
			}
		}
        // foreach ($rounds as $rn => $round) {
        //     debug('Round '.$rn);
        //     debug(Set::combine($round,'{n}.Project.id','{n}.Project.name'));
        // }
		return $rounds;
	}

    /**
     * SQL helper: Takes an array and returns a string in the form of "SUM(column_name1) column_name1, SUM(column_name2) column_name2, …"
     */
	function sumColumns($columns) {
	    $sql = array();
	    foreach($columns as $c) {
	        $sql[] = 'SUM(' . $c . ') ' . $c;
	    }

	    return implode(',', $sql);
	}

	function linearizeProject($project) {
		return (double) $project['costs'];
	}

	function _removeDuplicates($projects) {
		$revArr = array();
		foreach ($projects as $k=>$project) $revArr[$project['Project']['id']] = $k;

		$newArr = array();
		foreach ($revArr as $k) {
			$newArr[] = $projects[$k];
		}
		return $newArr;
	}

	function getMatrixNames() {
    	$matrixNames = array(
            "entire_bank_process",
            "entire_bank_knowledge",
            "entire_bank_risk",
            "entire_bank_information",
            "marketing_process",
            "marketing_knowledge",
            "marketing_risk",
            "marketing_information",
            "production_process",
            "production_knowledge",
            "production_risk",
            "production_information",
            "it_process",
            "it_knowledge",
            "it_risk",
            "it_information"
        );
        return $matrixNames;		
	}
	static function _compareProjects($p1,$p2) {
		if ($p1['Project']['id']==$p2['Project']['id']) return 0;
		else return ($p1['Project']['id'] < $p2['Project']['id']) ? -1 : 1;
	}
	
}
?>