<?php
namespace App\Http\Controllers;

use App\Models\WeeklyStat;
use Illuminate\Http\Request;

class WeeklyStatController extends Controller {
    public function index() {
        $stats = WeeklyStat::with('player')->get();
        return view('weekly-stats.index', compact('stats'));
    }
    public function create() {
        return view('weekly-stats.create');
    }
    public function store(Request $request) {
        // handle import...
    }
    // other resource methods...
}
