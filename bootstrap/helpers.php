<?php

function route_class()
{
    return str_replace('.', '-', Route::currentRouteName());

    //此方法会将当前请求的路由名称转换为CSS类名称
    //例如users.show page => users-show-page
}