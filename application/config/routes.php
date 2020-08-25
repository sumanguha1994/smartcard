<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['migrate'] = 'Migrate';

//dashboard
$route['dashboard'] = 'Welcome/dashboard';

//members
$route['member'] = 'Welcome/member';

//card
$route['card'] = 'Welcome/card';