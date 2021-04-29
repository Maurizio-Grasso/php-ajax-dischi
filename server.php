<?php
    include 'partials/database.php';

    header('Content-Type: application/json');
    
    
    if(!empty($_GET['list']) ) {

        if ( $_GET['list']  == 'artists') {
            
            $artistsList = ['All Artists'];
            
            foreach ($database as $album) {
                $artistsList[] = $album['author'];
            }
            
            echo json_encode($artistsList);
        }
    }
        
    if(!empty($_GET['artist']) ) {

        if($_GET['artist'] == 'All Artists') {
            echo json_encode($database);
        }
        
        else {

            $filteredDatabase = [];

            foreach ($database as $album) {
        
                if($album['author']==$_GET['artist']){
                $filteredDatabase[] = $album;        
                }
            }

            echo json_encode($filteredDatabase);

        }
}

?>
