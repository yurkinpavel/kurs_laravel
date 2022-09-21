<?php

$menu_arr = array();
$template_link = '<span><a href="LINK">TITLE</a></span>';
$template_link_disable = '<span>TITLE</span>';
$menu_arr[] = ['page' => 'comon', 'title' => 'Добро пожаловать', 'url' => '/'];
$menu_arr[] = ['page' => 'news', 'title' => 'Новости', 'url' => '/news'];
$menu_arr[] = ['page' => 'about', 'title' => 'О проекте', 'url' => 'about'];

foreach($menu_arr as $menu_item_arr)
{
    if($menu_item_arr['page'] == $page){
        $menu_item = str_replace('TITLE',$menu_item_arr['title'],$template_link_disable);
        echo($menu_item);
    }else{
        $menu_item = str_replace('TITLE',$menu_item_arr['title'],$template_link);
        $menu_item = str_replace('LINK',$menu_item_arr['url'],$menu_item);
        echo($menu_item);;
    }
         
}

?>

 
