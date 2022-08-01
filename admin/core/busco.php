<?php
$_SERVER['DOCUMENT_ROOT'] = dirname(dirname(__DIR__));
 $path1=$_SERVER["DOCUMENT_ROOT"].'/results.json';
$json = file_get_contents($path1);
 $data = json_decode($json,true);
 $path=$_SERVER["DOCUMENT_ROOT"].'/admin/core';
 $response = array();
	$posts = array();
 	$output = $data["posts"][0]["output"];
 	
  if ($output=='Running') {


	$ID=$data["posts"][0]['ID']; 
	  $name=$data["posts"][0]['name']; 
	  $lineage=$data["posts"][0]['lineage']; 
	  $mode=$data["posts"][0]['mode']; 
	  $input=$data["posts"][0]['input']; 
	  $output=$data["posts"][0]['output'];
	  $type=$data["posts"][0]['type'];
	  $email=$data["posts"][0]['email'];

	  $posts[] = array('ID'=> $ID, 'name'=> $name, 'lineage'=> $lineage, 'mode'=> $mode, 'input'=> $input, 'output'=> 'Progress', 'type'=> $type, 'email'=> $email);


$response['posts'] = $posts;

$fp = fopen($_SERVER["DOCUMENT_ROOT"].'/results.json', 'w');
fwrite($fp, json_encode($response));
fclose($fp);

if(!file_exists($path.'/'.$data["posts"][0]['input'].'busco.log')){

$output = shell_exec('cd '.$path.'/'.$data["posts"][0]['input']);
	
$output = shell_exec('mkdir '.$path.'/'.$data["posts"][0]['input'].'outBusco');

$output = shell_exec('source ~/.bashrc ; for file in '.$path.'/'.$data["posts"][0]['input'].'*.'.$data["posts"][0]['type'].' ; do output=$(basename ${file%%.'.$data["posts"][0]['type'].'*}) ; busco -i $file -l '.$data["posts"][0]['lineage'].' -o $output -m '.$data["posts"][0]['mode'].' --out_path  '.$path.'/'.$data["posts"][0]['input'].'outBusco >> '.$path.'/'.$data["posts"][0]['input'].'busco.log ; done ');



$output = shell_exec('mkdir '.$path.'/'.$data["posts"][0]['input'].'busco');

$output = shell_exec('cd '.$path.'/'.$data["posts"][0]['input'].'outBusco; for i in *; do mkdir '.$path.'/'.$data["posts"][0]['input'].'busco/$i; cp -r $i/run_*/* '.$path.'/'.$data["posts"][0]['input'].'busco/$i ; done');

$output = shell_exec('cd '.$path.'/'.$data["posts"][0]['input'].'busco; for i in *; do mv $i '.$path.'/'.$data["posts"][0]['input'].'busco/run_$i; done');


$output = shell_exec('cd '.$path.'/'.$data["posts"][0]['input']);

if(isset($data["posts"][0]['outgroup']) && ($data["posts"][0]['outgroup']=="" || is_numeric($data["posts"][0]['outgroup']))){
     $output = shell_exec('cd '.$path.'/'.$data["posts"][0]['input'].'; python3 '.$path.'/BUSCO_phylogenomics/BUSCO_phylogenomics.py -d busco -o out -t 20 > '.$path.'/'.$data["posts"][0]['input'].'phylo.log');
     shell_exec('sudo touch '.$path.'/'.$data["posts"][0]['input'].'out/s.sh');
        $myfile = fopen($_SERVER["DOCUMENT_ROOT"]."/admin/core/".$data["posts"][0]['input']."out/s.sh", "w") or die("Unable to open file!");
        $txt = "#!/bin/bash\n";
        fwrite($myfile, $txt);
        $txt = "exec su root --command 'export QT_QPA_PLATFORM=offscreen && export XDG_RUNTIME_DIR=/tmp/runtime-runner && python3 ".$path."/BUSCO_phylogenomics/tree.py' \n";
        fwrite($myfile, $txt);
        fclose($myfile);
   $output = shell_exec('cd '.$path.'/'.$data["posts"][0]['input'].'out; bash '.$path.'/'.$data["posts"][0]['input'].'out/s.sh  >> '.$path.'/'.$data["posts"][0]['input'].'tree.log 2>&1');
} else {
   $output = shell_exec('cd '.$path.'/'.$data["posts"][0]['input'].'; python3 '.$path.'/BUSCO_phylogenomics/BUSCO_phylogenomics.py -og '.$data["posts"][0]['outgroup'].' -d busco -o out -t 20 >> '.$path.'/'.$data["posts"][0]['input'].'phylo.log');
   shell_exec('sudo touch '.$path.'/'.$data["posts"][0]['input'].'out/s.sh');
        $myfile = fopen($_SERVER["DOCUMENT_ROOT"]."/admin/core/".$data["posts"][0]['input']."out/s.sh", "w") or die("Unable to open file!");
        $txt = "#!/bin/bash\n";
        fwrite($myfile, $txt);
        $txt = "exec su root --command 'export QT_QPA_PLATFORM=offscreen && export XDG_RUNTIME_DIR=/tmp/runtime-runner && python3 ".$path."/BUSCO_phylogenomics/tree.py ".$data["posts"][0]['outgroup']." ' \n";
        fwrite($myfile, $txt);
        fclose($myfile);
   $output = shell_exec('cd '.$path.'/'.$data["posts"][0]['input'].'out; bash '.$path.'/'.$data["posts"][0]['input'].'out/s.sh  >> '.$path.'/'.$data["posts"][0]['input'].'tree.log 2>&1');
}


$output = shell_exec('cat '.$path.'/'.$data["posts"][0]['input'].'busco.log '.$path.'/'.$data["posts"][0]['input'].'phylo.log '.$path.'/'.$data["posts"][0]['input'].'tree.log > '.$path.'/'.$data["posts"][0]['input'].'BBPA.log');


$output = shell_exec('cd '.$path.'/'.$data["posts"][0]['input'].' ; zip -r Result.zip *');

}
$response = array();
	$posts = array();
$ID=$data["posts"][0]['ID']; 
	  $name=$data["posts"][0]['name']; 
	  $lineage=$data["posts"][0]['lineage']; 
	  $mode=$data["posts"][0]['mode']; 
	  $input=$data["posts"][0]['input']; 
	  $output=$data["posts"][0]['output'];
	  $type=$data["posts"][0]['type'];
	  $email=$data["posts"][0]['email'];
	  
 $posts[] = array('ID'=> $ID, 'name'=> $name, 'lineage'=> $lineage, 'mode'=> $mode, 'input'=> $input, 'output'=> 'Done', 'type'=> $type, 'email'=> $email);


$response['posts'] = $posts;

$fp = fopen($_SERVER["DOCUMENT_ROOT"].'/results.json', 'w');
fwrite($fp, json_encode($response));
fclose($fp);

}


?>