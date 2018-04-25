<?php
/**
 * Created by PhpStorm.
 * User: mnv
 * Date: 26.04.18
 * Time: 0:07
 */

namespace App\Http\Controllers;


use App\Jobs\Pipeline\ProcessDataPipeline;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function example(Request $request)
    {
        (new ProcessDataPipeline())->start($request->all());
    }
}