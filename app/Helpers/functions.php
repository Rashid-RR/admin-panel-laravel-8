<?php

//use Illuminate\Http\Request;
function isActive($url){
    return Request::is($url) ? 'active' : '';
}