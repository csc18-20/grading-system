<?php

namespace App\Http\Controllers;

use App\SpreadSheet;
use Illuminate\Http\Request;

class SpreadsheetsController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    /**
     * displays a list of all spreadsheets.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $spreadsheets = SpreadSheet::all();

        return  view('spreadsheets.index', compact('spreadsheets'));
    }

    /**
     * creates a new spreadsheet.
     */
    public function create()
    {
        return view('spreadsheets.create');
    }

    public function store(Request $request)
    {
        return SpreadSheet::store(
            $request->validate(['file' => 'file|required|mimes:xlsx,xls'])
        );
    }

    public function show(Spreadsheet $spreadsheet)
    {
        
        $marks=$spreadsheet->marks()->get();
        
        return view('spreadsheets.show', compact('spreadsheet','marks'));
    }
}
