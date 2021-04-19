<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


if($part == "limited"){
    $data = Array();
    foreach ($projectHearts as $project){
        $data[] = array(
            'id' => $project->id,
            'ipAddress' => $project->ip_address,
            'projectId' => $project->project_id
        );
    }
    print_r(json_encode($data));
}else{
    print_r(json_encode($projectHearts));
}

