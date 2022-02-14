<?php
use Illuminate\Support\Facades\DB;

// funcion global para concatenar las imagenes con la url
if (! function_exists('concatenarUrl')) {
    function concatenarUrl($imagen, $llave="img_principal")
    {        
        return config('app.url_server').$imagen->$llave;
    }
}




// if (! function_exists('concatenarUrl2')) {
//     function concatenarUrl2($estadios)
//     {        
//         return config('app.url_server').$estadios->img;
//     }
// }

