var app = new Vue ({
    el : '#root' ,
    data : {
        albumsAll : [] ,
    } ,
    created() {
        this.getAlbumsByApi();
    } , 

    methods : {
        getAlbumsByApi() {
            axios.get('server.php')
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
    }
});

