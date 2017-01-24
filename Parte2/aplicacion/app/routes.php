<?php
$app->group('/', function () {  
	$this->map(['GET', 'POST'], 'view/{id}', 'App\Action\SimpleCRUD:view');
	$this->get('xml', 'App\Action\SimpleCRUD:xml');
	$this->map(['GET', 'POST'], '[/]', 'App\Action\SimpleCRUD:main');
});