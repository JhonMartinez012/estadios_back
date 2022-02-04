<?php
use Illuminate\Support\Facades\DB;


if (! function_exists('concatenarUrl')) {
    function concatenarUrl($estadios)
    {        
        return config('app.url_server').$estadios->img_principal;
    }
}
if (! function_exists('concatenarUrl2')) {
    function concatenarUrl2($estadios)
    {        
        return config('app.url_server').$estadios->img;
    }
}

