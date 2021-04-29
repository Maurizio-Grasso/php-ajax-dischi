var app = new Vue ({
    el : '#root' ,
    data : {
        albumsAll : [] ,
        artistsAll: ['All Artists']
    } ,
    created() {
        this.populateArtistsArray();
        this.getAlbumsByApi();
    } , 

    methods : {
        populateArtistsArray(){
            axios.get('server.php?list=artists')
            .then( (response) =>  {
                // response.data.forEach(author => {
                    console.log(response);                

                    this.artistsAll=response.data;                    
                    console.log(this.artistsAll);
                // });
            });

        } ,
          
        getAlbumsByApi() {
            axios.get('server.php?artist=all')
            .then( (response) =>  {
                    this.albumsAll = response.data;
            });
        } ,        

        orderAlbums() {
            var tmpArray = [];
            var minIndex;             

            while(this.albumsAll.length > 0 ) {

                minIndex = 0;                
                this.albumsAll.forEach((album , index) => {                    
                    if(parseInt(album.year) < this.albumsAll[minIndex].year) {
                        minIndex = index;
                    }    
                });

                tmpArray.push(this.albumsAll[minIndex]);
                this.albumsAll.splice(minIndex,1);
            }

            this.albumsAll = tmpArray;

        } ,


        filterByArtist(){
            // console.log("ciao");
        }
    }
});

