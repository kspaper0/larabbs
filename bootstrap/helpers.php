<?php

function route_class()
{
    return str_replace('.', '-', Route::currentRouteName());

    //此方法会将当前请求的路由名称转换为CSS类名称
    //例如users.show page => users-show-page
}

function make_excerpt($value, $length = 200)
{
    $excerpt = trim(preg_replace('/\r\n|\r|\n+/', ' ', strip_tags($value)));
    //strip_tags() 剥去字符串中的 HTML 标签：
    return str_limit($excerpt, $length);
}