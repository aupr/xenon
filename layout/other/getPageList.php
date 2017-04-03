<?php
/**
 * Created by PhpStorm.
 * User: Aman
 * Date: 4/3/2017
 * Time: 8:17 AM
 */

function getPageList($total, $limit, $page, $url){
    $pagination = new pagination();
    $pagination->total = $total;
    $pagination->limit = $limit;
    $pagination->num_links = 7;
    $pagination->page = $page;
    $pagination->url = $url;;
    return $pagination->render();
}