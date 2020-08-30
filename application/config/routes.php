<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['migrate'] = 'Migrate';

//dashboard
$route['dashboard'] = 'Welcome/dashboard';

//category
$route['category'] = 'Welcome/category';
$route['create-category'] = 'Category/categoryCreate';
$route['edit-category'] = 'Category/categoryEdit';
$route['delete-category'] = 'Category/categoryDelete';
//members
$route['member'] = 'Welcome/member';
$route['create-franchise'] = 'Franchise/createfranchise';
$route['edit-franchise'] = 'Franchise/editfranchise';
$route['delete-franchise'] = 'Franchise/deletefranchise';
//shopkeeper
$route['shopkeeper'] = 'Welcome/shopkeeper';
$route['create-shopkeeper'] = 'Franchise/createshopkeeper';
$route['edit-shopkeeper'] = 'Franchise/editshopkeeper';
$route['delete-shopkeeper'] = 'Franchise/deleteshopkeeper';
//user
$route['user'] = 'Welcome/user';
$route['delete-customer'] = 'Franchise/deletecustomer';
//card
$route['card'] = 'Welcome/card';
$route['create-card'] = 'Card/createcard';
$route['edit-card'] = 'Card/editcard';
$route['delete-card'] = 'Card/deletecard';
//issue card
$route['issue-card'] = 'Welcome/issuecard';
$route['create-issuecard'] = 'Card/createissuecard';
$route['edit-issuecard'] = 'Card/editissuecard';
$route['delete-issuecard'] = 'Card/deleteissuecard';