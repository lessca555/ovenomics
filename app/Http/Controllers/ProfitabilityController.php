<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class ProfitabilityController extends Controller
{
    public function index()
    {
        $recipes = Recipe::all();
        return view('profitability.profitability', ['recipes' => $recipes]);
    }

    public function report(Request $request)
    {
        $tableData = json_decode($request->input('tableData'), true);
        return view('profitability.report', ['tableData' => $tableData]);
    }
}
