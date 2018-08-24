<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\BladeExport;
use App\User as UserMod;
use App\Charts\SampleChart;

class DemoController extends Controller
{
    public function index()
    {

        return "Method GET: Index";
    }

    public function demotwo()
    {
        return "Method POST: demotwo";
    }

    public function demothree()
    {
        session(['myname'=>'Hello', 'myname2'=>'Hello2']);

        echo session('myname')."<br/>";
        echo session('myname2')."<br/>";

        //return "Method GET, POST : demothree";
    }

    public function demofour()
    {
        if(session('myname') == 'Hello'){
            echo "IF WOW"."<br/>";
            session()->forget('myname');
            //session()->flush();
        }

        //return "Method GET, POST, PUT/PATCH, DELETE : demofour";
    }

    public function testexcel(){

        $user = UserMod::all();
        return \Excel::download(new BladeExport($user->toArray()), 'invoices.xlsx');
    }

    public function getUser(){
        $user = UserMod::all();
        return $user;
    }

    public function getCharts()
    {
        $chart = new SampleChart;
        $chart->dataset('Sample', 'line', [100, 65, 84, 45, 90]);
        return view('charts', ['chart' => $chart]);
    }
}
