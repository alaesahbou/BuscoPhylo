<?php
// Set up environment
$_SERVER['DOCUMENT_ROOT'] = dirname(dirname(__DIR__));
date_default_timezone_set('Africa/Casablanca');
$path = $_SERVER["DOCUMENT_ROOT"] . '/admin/core';

// Process the main results file
function processResultsFile($resultsFile) {
    global $path;
    
    // Load and parse JSON data
    $json = file_get_contents($resultsFile);
    $data = json_decode($json, true);
    
    $output = $data["posts"][0]["output"];
    
    // Check if processing should continue
    if ($output == 'Running' || ($output = 'Progress' && !file_exists($path . '/' . $data["posts"][0]['input'] . 'outBusco'))) {
        // Extract data from JSON
        $ID = $data["posts"][0]['ID']; 
        $name = $data["posts"][0]['name']; 
        $lineage = $data["posts"][0]['lineage']; 
        $mode = $data["posts"][0]['mode']; 
        $input = $data["posts"][0]['input']; 
        $output = $data["posts"][0]['output'];
        $type = $data["posts"][0]['type'];
        $email = $data["posts"][0]['email'];
        $outgroup = isset($data["posts"][0]['outgroup']) ? $data["posts"][0]['outgroup'] : "";
        
        // Update status to "Progress"
        $posts = array();
        $posts[] = array(
            'ID' => $ID, 
            'name' => $name, 
            'lineage' => $lineage, 
            'mode' => $mode, 
            'input' => $input, 
            'output' => 'Progress', 
            'type' => $type, 
            'email' => $email, 
            'outgroup' => $outgroup
        );
        
        $response = array('posts' => $posts);
        
        $fp = fopen($resultsFile, 'w');
        fwrite($fp, json_encode($response));
        fclose($fp);
        
        // Process BUSCO if not already done
        if(!file_exists($path . '/' . $input . 'busco.log')){
            processBuscoData($path, $data["posts"][0]);
        }
        
        // Update status to "Done"
        $posts = array();
        $posts[] = array(
            'ID' => $ID, 
            'name' => $name, 
            'lineage' => $lineage, 
            'mode' => $mode, 
            'input' => $input, 
            'output' => 'Done', 
            'type' => $type, 
            'email' => $email, 
            'outgroup' => $outgroup
        );
        
        $response = array('posts' => $posts);
        
        $fp = fopen($resultsFile, 'w');
        fwrite($fp, json_encode($response));
        fclose($fp);
    }
}

// Function to process BUSCO data
function processBuscoData($path, $postData) {
    $input = $postData['input'];
    $lineage = $postData['lineage'];
    $mode = $postData['mode'];
    $type = $postData['type'];
    $outgroup = isset($postData['outgroup']) ? $postData['outgroup'] : "";
    
    // Log start time
    shell_exec(' echo "start : ' . date('d-m-y H:i:s') . '" >> ' . $path . '/' . $input . 'runtime.log');
    
    // Change to input directory
    shell_exec('cd ' . $path . '/' . $input);
    
    // Create output directory
    shell_exec('mkdir ' . $path . '/' . $input . 'outBusco');
    
    // Rename files to replace spaces with underscores
    shell_exec("cd " . $path . "/" . $input . " && rename 's/\s/_/g' ./*.* ");
    
    // Run BUSCO for files with specified type extension
    $buscoCmd = 'cd ' . $path . '/' . $input . ' && for file in ' . $path . '/' . $input . '*.' . $type . 
        ' ; do output=$(basename ${file%%.' . $type . '*}) ; busco -i "$file" -l ' . $lineage . 
        ' -o $output -m ' . $mode . ' --out_path  ' . $path . '/' . $input . 'outBusco -c 36 --metaeuk >> ' . 
        $path . '/' . $input . 'busco.log ; done ';
    shell_exec($buscoCmd);
    echo $buscoCmd; // Debug output
    
    // Run BUSCO for .pep files
    shell_exec('cd ' . $path . '/' . $input . ' && for file in ' . $path . '/' . $input . '*.pep ; do output=$(basename ${file%%.pep*}) ; busco -i "$file" -l ' . $lineage . ' -o $output -m ' . $mode . ' --out_path  ' . $path . '/' . $input . 'outBusco -c 36 --metaeuk >> ' . $path . '/' . $input . 'busco.log ; done ');
    
    // Create BUSCO directory and organize files
    shell_exec('mkdir ' . $path . '/' . $input . 'busco');
    shell_exec('cd ' . $path . '/' . $input . 'outBusco; for i in *; do mkdir ' . $path . '/' . $input . 'busco/$i; cp -r $i/run_*/* ' . $path . '/' . $input . 'busco/$i ; done');
    shell_exec('cd ' . $path . '/' . $input . 'busco; for i in *; do mv $i ' . $path . '/' . $input . 'busco/run_$i; done');
    
    // Remove invalid BUSCO runs
    foreach(glob(dirname(dirname(__DIR__)) . "/admin/core/" . $input . "busco/*") as $filename) {
        if(!file_exists($filename . '/short_summary.txt')) {
            $filenameBusco = $filename;
            shell_exec('sudo rm -r ' . $filenameBusco);
            echo 'sudo rm -r ' . $filenameBusco;
        }
    }
    
    // Change to input directory
    shell_exec('cd ' . $path . '/' . $input);
    
    // Phylogenetic analysis
    if(isset($outgroup) && ($outgroup == "" || is_numeric($outgroup))) {
        shell_exec('cd ' . $path . '/' . $input . '; sudo python3 ' . $path . '/scripts/script_phylo.py -d busco -o out -t 20 > ' . $path . '/' . $input . 'phylo.log');
        createShellScript($path, $input, $outgroup, false);
        shell_exec('cd ' . $path . '/' . $input . 'out; bash ' . $path . '/' . $input . 'out/s.sh  >> ' . $path . '/' . $input . 'tree.log');
    } else {
        shell_exec('cd ' . $path . '/' . $input . '; sudo python3 ' . $path . '/scripts/script_phylo.py -og ' . $outgroup . ' -d busco -o out -t 20 >> ' . $path . '/' . $input . 'phylo.log');
        createShellScript($path, $input, $outgroup, true);
        shell_exec('cd ' . $path . '/' . $input . 'out; bash ' . $path . '/' . $input . 'out/s.sh  >> ' . $path . '/' . $input . 'tree.log');
    }
    
    // Combine logs
    shell_exec('cat ' . $path . '/' . $input . 'busco.log ' . $path . '/' . $input . 'phylo.log ' . $path . '/' . $input . 'tree.log > ' . $path . '/' . $input . 'BuscoPhylo.log');
    
    // Generate summaries and plots
    shell_exec('mkdir ' . $path . '/' . $input . 'busco_summaries');
    shell_exec('cp ' . $path . '/' . $input . 'outBusco/*/short_summary*.txt ' . $path . '/' . $input . 'busco_summaries/');
    shell_exec('python3 ' . $path . '/scripts/generate_plot.py -wd ' . $path . '/' . $input . 'busco_summaries/ ');
    
    // Log end time
    shell_exec(' echo "end : ' . date('d-m-y H:i:s') . '" >> ' . $path . '/' . $input . 'runtime.log');
    
    // Create result zip
    shell_exec('cd ' . $path . '/' . $input . ' ; zip -r Result.zip *');
}

// Function to create shell scripts for tree visualization
function createShellScript($path, $input, $outgroup, $useOutgroup) {
    shell_exec('sudo touch ' . $path . '/' . $input . 'out/s.sh');
    $myfile = fopen($_SERVER["DOCUMENT_ROOT"] . "/admin/core/" . $input . "out/s.sh", "w") or die("Unable to open file!");
    $txt = "#!/bin/bash\n";
    fwrite($myfile, $txt);
    
    if ($useOutgroup) {
        $txt = "exec su root --command 'export QT_QPA_PLATFORM=offscreen && export XDG_RUNTIME_DIR=/tmp/runtime-runner && python3 " . $path . "/scripts/tree.py " . $outgroup . " ' \n";
    } else {
        $txt = "exec su root --command 'export QT_QPA_PLATFORM=offscreen && export XDG_RUNTIME_DIR=/tmp/runtime-runner && python3 " . $path . "/scripts/tree.py' \n";
    }
    
    fwrite($myfile, $txt);
    fclose($myfile);
}

// Main execution
$resultsFile = $_SERVER["DOCUMENT_ROOT"] . '/results.json';
processResultsFile($resultsFile);

// Process the second results file if the first one doesn't meet the criteria
if (true) {  // This logic is maintained from the original file
    $resultsFile2 = $_SERVER["DOCUMENT_ROOT"] . '/results_2.json';
    processResultsFile($resultsFile2);
}
?>
