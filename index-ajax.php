<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Google Font Roboto -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 

    <!-- VueJS -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>

    <!-- Axios -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.20.0/axios.min.js"></script>

    <!-- Style -->
    <link rel="stylesheet" href="css/boolstrap.css">
    <link rel="stylesheet" href="css/style.css">

    <title>Vue Dischi</title>
</head>
<body>
    
    <div id="root" class="outer-wrapper">

        <header class="header bg-primary">

            <div class="inner-header flex-container inner-wrapper text-center">


                <!-- LOGO -->

                <div class="outer-logo padding-standard">
                    <img src="img/spotify_logo.png" alt="" class="logo">
                </div>


                <!-- Artists Select -->

                <div class="outer-select padding-standard bg-primary">
                    <label for="select-artist" class="margin-r-standard text-white">Filtra per Artista</label>

                        <select class="padding-l-more padding-r-more padding-t-standard padding-b-standard" 
                                name="" 
                                id="select-artist" 
                                @change="getAlbumsByApi" 
                                v-model="selectedArtist">

                            <option 
                                v-for="artist in artistsAll" 
                                :value="artist">{{ artist }}
                            </option>

                        </select>
                </div>


                <!-- Sort By Year Button -->

                <div class="outer-button padding-standard">

                    <button 
                        @click="orderAlbums()" 
                        class="padding-l-more padding-r-more padding-t-standard padding-b-standard text-white">
                            Ordina per Anno
                    </button>

                </div>

            </div>

        </header>

        <main class="main">
            

            <!-- Cards Container -->

            <div class="outer-card-container flex-container inner-wrapper padding-standard">

                <!-- Each single Card -->

                <div v-for="album in albumsAll" class="single-card-outer flex-container bg-primary padding-standard margin-b-standard text-center">
                    
                    <img class="album-cover" :src="album.poster" alt="not available">
                    <h3 class="album-title text-white margin-t-standard">{{ album.title }}</h3>
                    <span class="album-artist margin-t-standard">{{ album.author }}</span>
                    <span class="album-year margin-t-standard">{{ album.year }}</span>

                </div>  <!-- Single Card END -->

            </div>  <!-- Card Container END -->
            
        </main>
        
    </div>  <!-- Outer Wrapper END -->

    <!-- Javascript -->
    <script src="js/main.js"></script>
</body>
</html>