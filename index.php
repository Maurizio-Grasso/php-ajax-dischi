<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Google Font Roboto -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 

    <!-- Style -->
    <link rel="stylesheet" href="css/boolstrap.css">
    <link rel="stylesheet" href="css/style.css">

    <title>Vue Dischi</title>
</head>
<body>
    
    <div id="root" class="outer-wrapper">
        
        <!-- HEADER -->

        <?php include __DIR__."/partials/header.php"; ?>

        
        <main class="main">
            
        <!-- CARDS CONTAINER -->

            <div class="outer-card-container flex-container inner-wrapper padding-standard">
                
                <!-- Inclusione database.php -->
                
                <?php include __DIR__."/partials/database.php"; ?>
                  
                <!-- Stampa contenuti provenienti dal database -->

                <?php foreach($database as $album){

                        //apertura div.single-card-outer
                        echo "<div class=\"single-card-outer flex-container bg-primary padding-standard margin-b-standard text-center\">";
                        
                            // Cover
                            echo "<img class=\"album-cover\" src=\"".$album[poster]."\" alt=\"not available\">";        

                            //titolo
                            echo "<h3  class=\"album-title text-white margin-t-standard\">".$album['title']."</h3>";    
                            
                            //autore
                            echo "<span class=\"album-artist margin-t-standard\">".$album['author']."</span>";

                            //anno
                            echo "<span class=\"album-year margin-t-standard\">".$album['year']."</span>";

                        //chiusura div
                        echo "</div>";                        
                    }
                ?>

            </div><!-- Outer Card Container END-->
        </main>
        
    </div><!-- Outer Wrapper END -->
</body>
</html>