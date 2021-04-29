<?php
    include 'partials/database.php';

    header('Content-Type: application/json');

    $request = $_GET;
    
    
    if($_GET['list'] == 'artists'){

        $artistsList = [];

        foreach ($database as $album) {
            $artistsList[] = $album['author'];
        }
        
        echo json_encode($artistsList);
    }

    

    if($request['artist'] == 'all') {
        echo json_encode($database);
    }
    else {
        $filteredDatabase = [];

        foreach ($database as $album) {
    
            if($album['author']==$request['artist']){
            $filteredDatabase[] = $album;        
            }
        }
        echo json_encode($filteredDatabase);

    }

?>
