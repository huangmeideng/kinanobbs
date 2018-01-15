<?php

/**
 * @author: Kinano
 * @return mixed
 * 将当前请求的路由名称转换为CSS类名称
 */
function route_class(){
    return str_replace('.','-',Route::currentRouteName());
}

function make_excerpt($value,$length = 200)
{
    $excerpt = trim(preg_replace_array('/\r\n|\r|\n+/','',strip_tags($value)));
    return str_limit($excerpt,$length);
}