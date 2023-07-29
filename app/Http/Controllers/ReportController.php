<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ReportController extends Controller
{
    function index() {
        $items = Item::summaryItemsSales();

        return view('reports.index')->with('items', $items);
    }
}
