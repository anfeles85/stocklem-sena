<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Entry;
use App\Models\Issue;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        $entries = Entry::all();
        $issues = Issue::all();
        $suppliers = Supplier::all();

        // Top 5 proveedores con más artículos
        $topSuppliers = DB::table('supplier as s')
            ->join('article as a', 's.id', '=', 'a.supplier_id')
            ->select('s.name', 's.phone', DB::raw('COUNT(a.id) as total_articles'))
            ->groupBy('s.id', 's.name', 's.phone')
            ->orderByDesc('total_articles')
            ->limit(5)
            ->get();

        // Estadísticas de stock
        $stockLevels = [
            'danger'     => $articles->filter(fn($a) => $a->quantity <= $a->min_quantity)->count(),
            'warning'    => $articles->filter(fn($a) => $a->quantity > $a->min_quantity && $a->quantity < 500)->count(),
            'sufficient' => $articles->filter(fn($a) => $a->quantity >= 500)->count(),
        ];


        // Entradas y salidas por mes actual
        $monthlyEntries = Entry::selectRaw("MONTH(date_entry) as month, SUM(quantity) as total")
            ->whereYear('date_entry', now()->year)
            ->groupBy('month')
            ->pluck('total', 'month');

        $monthlyIssues = Issue::selectRaw("MONTH(date_issue) as month, SUM(quantity) as total")
            ->whereYear('date_issue', now()->year)
            ->groupBy('month')
            ->pluck('total', 'month');

        // Datos para los gráficos en la vista index
        $chartData = [
            'stockLevels'   => $stockLevels,
            'monthlyEntries' => $monthlyEntries,
            'monthlyIssues' => $monthlyIssues,
        ];

        // Productos (entradas) próximos a vencer: dentro de los próximos 30 días (misma estructura que monthlyEntries)
        $expiringProducts = Entry::selectRaw(
                "entry.id as entry_id, entry.article_id, a.name as name, entry.sena_code as batch, entry.expiration_date as expiration_date, entry.quantity as quantity, entry.observations as location"
            )
            ->join('article as a', 'entry.article_id', '=', 'a.id')
            ->whereNotNull('entry.expiration_date')
            ->whereBetween('entry.expiration_date', [now()->toDateString(), now()->addDays(30)->toDateString()])
            ->where('entry.quantity', '>', 0)
            ->orderByRaw('entry.expiration_date ASC')
            ->get();

        return view('index', compact('articles', 'entries', 'issues', 'suppliers', 'topSuppliers', 'chartData', 'expiringProducts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
