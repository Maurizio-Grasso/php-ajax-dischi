var app = new Vue ({
    el : '#root' ,
    data : {
        albumsAll : [] ,
        artistsAll: [] ,
        selectedArtist : false
    } ,
    created() {
        this.populateArtistsArray();
    } , 

    methods : {
        populateArtistsArray(){
            axios.get('server.php?list=artists')
            .then( (response) =>  {
                this.artistsAll=response.data;
                this.selectedArtist = this.artistsAll[0];
                this.getAlbumsByApi()
            });
        } ,
          
        getAlbumsByApi() {
            console.log(this.selectedArtist);
            axios.get('server.php?artist='+ this.selectedArtist)
            .then( (response) =>  {
                    this.albumsAll = response.data;
                    console.log(this.albumsAll);
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
    }
});