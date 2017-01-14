<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CercaController extends Controller
{
    //
        public function show($lat, $long){
                // This is the data you want to pass to Python
                $data = array($lat, $long);
                // Execute the python script with the JSON data
		$result = shell_exec('python /var/www/html/Urban/app/Http/Controllers/Scripts/Establecimiento_Cerca.py ' . escapeshellarg(json_encode($data)));
                // Decode the result
                $resultData = json_decode($result, true);
                // This will contain: array('status' => 'Yes!')
                return($resultData);
        }
}
