<?php

//use Illuminate\Http\Request;

function adminAsset($assetLink){
    return asset('admin/'.$assetLink);
}
function isActive($url){
    return Request::is($url) ? 'active' : '';
}