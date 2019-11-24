<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DownloadFilesController extends Controller
{
    public function index(Request $request)
    {

        Excel::import(new UsersExport(),request()->file('file'));
        dd('end');
        return redirect()->route('')->with('success', 'Created successfully');


    }

}
