<?php

require __DIR__ . '/../vendor/autoload.php';

use Model\Locations;
use Http\Request;
use Http\Response;

// Config
$debug = true;

$app = new \App(new View\TemplateEngine(
    __DIR__ . '/templates/'
), $debug);

/**
 * Index
 */
$app->get('/', function () use ($app) {
    return $app->render('index.php');
});

/**
 * GET /locations
*/
$app->get('/locations', function (Request $request) use ($app) {
	$loc = new Model\Locations();
	
	// test du format
	$format = $request->guessBestFormat();
	if($format == 'json')
	{
		$response = new Response(json_encode($loc->findAll()), 200, array('Content-Type' => 'application/json'));
		return $response;
	}
	
	// format html
	return $app->render('locations.php', array('locations' => $loc->findAll()));
});

/**
 * GET /location/id
 */
$app->get('/locations/(\d+)', function (Request $request, $id) use ($app) {
	$loc = new Model\Locations();
	
	// test du format
	$format = $request->guessBestFormat();
	if($format == 'json')
	{
		$response = new Response(json_encode($loc->findOneById($id)), 200, array('Content-Type' => 'application/json'));
		return $response;
	}
	
	// forat html
	return $app->render('location.php', array('location' => $loc->findOneById($id), 'id' => $id));
}); 

/**
 * POST /locations
 */ 
$app->post('/locations', function (Request $request) use ($app) {
	$loc = new Model\Locations();
    $id = $loc->create($request->getParameter('name'));
    
    // test du format
	$format = $request->guessBestFormat();
	if($format == 'json')
	{
		$response = new Response(json_encode($id),201, array('Content-Type' => 'application/json'));
		var_dump($request);
		return $response;
	}
    
    $app->redirect('/locations');
});

/**
 * PUT /locations/id
 */ 
$app->put('/locations/(\d+)', function (Request $request, $id) use ($app) {
	$loc = new Locations();
	var_dump($request);
	$loc->update($id, $request->getParameter('name'));
	$app->redirect('/locations/'.$id);
});

/**
 * DELETE /locations/id
 */ 
$app->delete('/locations/(\d+)', function (Request $request, $id) use ($app) {
	$loc = new Locations();
	$loc->delete($id);
	$app->redirect('/locations');
});


return $app;
