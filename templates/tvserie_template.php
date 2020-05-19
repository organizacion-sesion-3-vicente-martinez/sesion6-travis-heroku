{ "collection" :
    {
        "title" : "TVSerie Database",
            "type" : "tvserie",
            "version" : "1.0",
            "href" : "{{ path_for('tvseries')}}",
      
            "links" : [
                {"rel" : "profile" , "href" : "http://schema.org/TVSeries","prompt":"Perfil"},
                {"rel" : "collection", "href" : "{{ path_for('movies') }}","prompt":"Movies"},
                {"rel" : "collection", "href" : "{{ path_for('books') }}","prompt":"Books"},
                {"rel" : "collection", "href" : "{{ path_for('musicalbums') }}","prompt":"Music Albums"},
                {"rel" : "collection", "href" : "{{ path_for('tvseries') }}","prompt":"TV Series"}
            ],
      
            "items" : [
                {
                    "href" : "{{ path_for('tvseries') }}/{{ item.id }}",
                        "data" : [
                            {"name" : "name", "value" : "{{ item.name }}", "prompt" : "Nombre de la serie"},
                            {"name" : "description", "value" : "{{ item.description }}", "prompt" : "Descripción de la serie"},
                            {"name" : "director", "value" : "{{ item.director }}", "prompt" : "Creador de la serie"},
                            {"name" : "datePublished", "value" : "{{ item.datePublished }}", "prompt" : "Fecha de lanzamiento"},
                            {"name" : "embedUrl", "value" : "{{ item.embedUrl }}", "prompt" : "Información de la serie"},
                            {"name" : "productionCompany", "value" : "{{ item.productionCompany }}", "prompt" : "Plataforma de streaming"},
                            {"name" : "numberOfSeasons", "value" : "{{ item.numberOfSeasons }}", "prompt" : "Número de temporadas"}
                        ]
                        } 
	  
            ],
      
            "template" : {
            "data" : [
                {"name" : "name", "value" : "", "prompt" : "Nombre de la serie"},
                {"name" : "description", "value" : "", "prompt" : "Descripción de la serie"},
                {"name" : "director", "value" : "", "prompt" : "Creador de la serie"},
                {"name" : "datePublished", "value" : "", "prompt" : "Fecha de lanzamiento"},
                {"name" : "embedUrl", "value" : "", "prompt" : "Información de la serie"},
                {"name" : "productionCompany", "value" : "", "prompt" : "Plataforma de streaming"},
                {"name" : "embedUrl", "value" : "", "prompt" : "Número de temporadas"}                        
            ]
                }
    } 
}




