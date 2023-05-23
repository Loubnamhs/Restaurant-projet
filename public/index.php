<?php
require '../vendor/autoload.php';

define('DEBUG_TIME',microtime(true));

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();  

$router = new App\Router(dirname(__DIR__) . '/views');

$router    
    ->get('/','acceuil/index','acceuil')
    ->get('/article/[i:ArticleID]','article/show', "article")
    ->get('/article','article/index','articles')
    ->get('/categorie','categorie/show','categories')
    ->get('/connexion','connexion/index','connexion')
    ->post('/connexion','connexion/index','connexion1')
    ->post('/register','connexion/register','register')
    ->get('/home/[i:userID]','espace-membre/home','home')
    ->get('/admin','admin/article/index','admin')
    ->match('/admin/article/[i:id]','admin/article/edit','admin_article')
    ->match('/admin/article/new','admin/article/new','admin_article_new')
    ->post('/admin/article/[i:id]/delete','admin/article/delete','admin_article_delete')
    ->get('/admin/menu','admin/menu/index','admin_menu')
    ->match('/admin/menu/[i:id]','admin/menu/edit','admin_menu_id')
    ->match('/admin/menu/new','admin/menu/new','admin_menu_new')
    ->post('/admin/menu/[i:id]/delete','admin/menu/delete','admin_menu_delete')
    ->get('/admin/reservation','admin/reservation/index','admin_reservation')
    ->match('/admin/reservation/[i:id]','admin/reservation/edit','admin_reservation_id')
    ->match('/admin/reservation/new','admin/reservation/new','admin_reservation_new')
    ->post('/admin/reservation/[i:id]/delete','admin/reservation/delete','admin_reservation_delete')
    ->get('/admin/horaire','admin/horaire/index','admin_horaire')
    ->match('/admin/horaire/[i:id]','admin/horaire/edit','admin_horaire_id')
    ->get('/carte','carte/index','carte')
    ->get('/admin/image','admin/galerie/index','admin_image')
    ->match('/admin/image/[i:id]','admin/galerie/edit','admin_image_id')
    ->match('/admin/image/new','admin/galerie/new','admin_image_new')
    ->post('/admin/image/[i:id]/delete','admin/galerie/delete','admin_image_delete')
    ->match('/reservation','reservation/index','reservation')
    ->match('/reservation/[i:id]','reservation/edit','reservation_id')
    ->match('/reservation/new','reservation/new','reservation_new')
    ->match('/reservation/filter','reservation/filter','reservation_filter')
    ->run();


