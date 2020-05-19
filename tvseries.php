<?php

// Modelo de objetos que se corresponde con la tabla de MySQL
class TVSerie extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'tvseries';
    public $timestamps = false;
}

/* Obtención de la lista de series */

$app->get('/tvseries', function ($req, $res, $args) {

    // Creamos un objeto collection + json con la lista de series

    // Obtenemos la lista de series de la base de datos y la convertimos del formato Json (el devuelto por Eloquent) a un array PHP
    $series = json_decode(\TVSerie::all());

    // Mostramos la vista
    return $this->view->render($res, 'tvserielist_template.php', [
        'items' => $series
    ]);
})->setName('tvseries');


/*  Obtención de una serie en concreto  */
$app->get('/tvseries/{name}', function ($req, $res, $args) {

    // Creamos un objeto collection + json con la serie pasada como parámetro

    // Obtenemos la serie de la base de datos a partir de su id y la convertimos del formato Json (el devuelto por Eloquent) a un array PHP
    $p = \TVSerie::find($args['name']);  
    $serie = json_decode($p);

    // Mostramos la vista
    return $this->view->render($res, 'tvserie_template.php', [
        'item' => $serie
    ]);

});

//Borrar serie
$app->delete('/tvseries/{name}', function ($req, $res, $args) {
    //Le pasamos la variable para que la encuentre
    $serie = TVSerie::find($args['name']);
    //Borramos la serie encontrada
    $serie->delete();
});

//Guardar nueva serie
$app->post('/tvseries', function ($req, $res, $args)  {
    $template = $req->getParsedBody();

    $datos = $template['template']['data'];
    //longitud del vector
    $longitud = count($datos);
    //bucle que recorre vector
    for ($i = 0; $i < $longitud; $i++)
    {
        switch($datos[$i]['name'])
        {
        case "name":
            $name = $datos[$i]['value'];
            break;
        case "description":
            $description = $datos[$i]['value'];
            break;
        case "director":
            $director = $datos[$i]['value'];
            break;
        case "embedUrl":
            $embedUrl = $datos[$i]['value'];
            break;
        case "datePublished":
            $datePublished = $datos[$i]['value'];
            break;
        case "productionCompany":
            $productionCompany = $datos[$i]['value'];
            break;
        case "numberOfSeasons":
            $numberOfSeasons = $datos[$i]['value'];
            break;

        }
    }
    $nueva_serie = new TVSerie;
    $nueva_serie['name'] = $name;
    $nueva_serie['description'] = $description;
    $nueva_serie['director'] = $director;
    $nueva_serie['datePublished'] = $datePublished;
    $nueva_serie['embedUrl'] = $embedUrl;
    $nueva_serie['productionCompany'] = $productionCompany;
    $nueva_serie['numberOfSeasons'] = $numberOfSeasons;
    $nueva_serie->save();
});

//Actualizar serie
$app->put('/tvseries/{id}', function ($req, $res, $args) {
    $template = $req->getParsedBody();
    $datos = $template['template']['data'];
    //longitud del vector
    $longitud = count($datos);
    //bucle que recorre vector
    for ($i = 0; $i < $longitud; $i++)
    {
        switch($datos[$i]['name'])
        {
        case "name":
            $name = $datos[$i]['value'];
            break;
        case "description":
            $description = $datos[$i]['value'];
            break;
        case "director":
            $director = $datos[$i]['value'];
            break;
        case "embedUrl":
            $embedUrl = $datos[$i]['value'];
            break;
        case "datePublished":
            $datePublished = $datos[$i]['value'];
            break;
        case "productionCompany":
            $productionCompany = $datos[$i]['value'];
            break;
        case "numberOfSeasons":
            $numberOfSeasons = $datos[$i]['value'];
            break;

        }
    }
  
    $nueva_serie = TVSerie::find($args['id']);
    $nueva_serie['name'] = $name;
    $nueva_serie['description'] = $description;
    $nueva_serie['director'] = $director;
    $nueva_serie['embedUrl'] = $embedUrl;
    $nueva_serie['datePublished'] = $datePublished;
    $nueva_serie['productionCompany'] = $productionCompany;
    $nueva_serie['numberOfSeasons'] = $numberOfSeasons;
  
    $nueva_movie->save();

});

?>
