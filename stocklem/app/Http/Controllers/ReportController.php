<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Entry;
use App\Models\Issue;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('reports.index', compact('articles'));
    }

    public function export_articles()
    {
        $articles = Article::all();
        $data = array(
            'articles' => $articles
        );

        $pdf = Pdf::loadView('reports.export_articles', $data)
            ->setPaper('letter', 'portrait')
            ->setOptions([
                'defaultFont' => 'sans-serif', 
                'isRemoteEnabled' => true
            ]);

        return $pdf->download('artículos-stockclem.pdf');
    }

    public function export_movements_by_article(Request $request)
    {
        $article = Article::findOrFail($request['article_id']);
        $entries = Entry::where('article_id', $request['article_id'])->get();
        $issues = Issue::where('article_id', $request['article_id'])->get();

        $data = array(
            'article' => $article,
            'entries' => $entries,
            'issues' => $issues
        );

        $pdf = Pdf::loadView('reports.export_movements_by_article', $data)
            ->setPaper('letter', 'portrait')
            ->setOptions([
                'defaultFont' => 'sans-serif', 
                'isRemoteEnabled' => true
            ]);

        return $pdf->download('movimientos_por_artículo-stockclem' . $request['id_article'] . '.pdf');
    }

    public function export_all_movements_by_date(Request $request)
    {
        $entries = Entry::whereBetween('date_entry', [$request['start_date'], $request['end_date']])->get();
        $issues = Issue::whereBetween('date_issue', [$request['start_date'], $request['end_date']])->get();

        $data = array(
            'entries' => $entries,
            'issues' => $issues,
            'start_date' => $request['start_date'],
            'end_date' => $request['end_date']
        );

        $pdf = Pdf::loadView('reports.export_all_movements_by_date', $data)
                ->setPaper('letter', 'portrait')
                ->setOptions([
                    'defaultFont'=>'sans-serif', 
                    'isRemoteEnabled'=>true
                ]);
                
        return $pdf->download('movimientos_por_fecha-stockclem.pdf');
    }
}
