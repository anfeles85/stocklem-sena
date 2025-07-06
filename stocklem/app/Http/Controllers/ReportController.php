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
        return $pdf->download('articles.pdf');
    }

    public function export_movements_by_article(Request $request)
    {
        $article = Article::findOrFail($request['id_article']);
        $entries = Entry::where('id_article', $request['id_article'])->get();
        $issues = Issue::where('id_article', $request['id_article'])->get();

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
        return $pdf->download('movementsByArticle_' . $request['id_article'] . '.pdf');
    }

    public function export_all_movements_by_date(Request $request)
    {
        $entries = Entry::whereBetween('date', [$request['date1'], $request['date2']])->get();
        $issues = Issue::whereBetween('date', [$request['date1'], $request['date2']])->get();
                
        $data = array(
            'entries' => $entries,
            'issues' => $issues,
            'date1' => $request['date1'],
            'date2' => $request['date2']
        );

        $pdf = Pdf::loadView('reports.export_all_movements_by_date', $data)
                ->setPaper('letter', 'portrait')
                ->setOptions([
                    'defaultFont'=>'sans-serif', 
                    'isRemoteEnabled'=>true
                ]); 
                
        return $pdf->download('MovementsByDate.pdf');
    }
}
