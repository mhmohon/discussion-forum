<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Idea;
use App\Department;
use Charts;
use DB;

class ReportController extends Controller
{
    public function ideaDepartment()
    {
    	$deparment = Department::where('status', 1);
        $author = DB::table('ideas')
        			->where('status', '=', '1');
        			

        $chart = Charts::create('bar', 'highcharts')
                ->title('Number of Idea made by each Department')
                ->elementLabel("Total Idea")
                ->labels($deparment->pluck('name'))
                //values($data->pluck('price'))
                ->values(['1','2','3','4', '5'])
                ->responsive(false);
               

        return view ('backend.pages.report.departmentIdea', compact('chart'));
    }
}
