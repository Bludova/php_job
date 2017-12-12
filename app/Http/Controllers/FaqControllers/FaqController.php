<?php

namespace App\Http\Controllers\FaqControllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categorie;
class FaqController extends Controller
{

    public function faq() {
//$sql = "SELECT  categories.categorie, categories.id AS categories_id,question.question, answer.answer, question.status  FROM categories JOIN question ON categories.id = question.categories_id JOIN answer ON answer.id_question = question.id ";


$questionsAnswers = DB::table('categories')
             ->leftJoin('question', 'question.categories_id', '=', 'categories.id')
             ->leftJoin('answer', 'answer.id_question', '=', 'question.id')
             ->where('question.status', '=', 1)
             ->select('categories.*', 'question.question', 'answer.answer')
             ->orderBy('categories.categorie','desc')
             ->get();

$categoriesQuestions = DB::table('categories')
             ->join('question', function($join)
             {
                $join->on('question.categories_id', '=', 'categories.id')
                    ->where('question.status', '=', 1);
              })
             ->select('categories.*')
             ->orderBy('categories.categorie', 'desc')
             ->get();
// ->groupBy('categories.categorie')
 // dump($categoriesQuestions);
 //dump($questionsAnswers);
        $header = 'Вопросы-Ответы';
        $categories = Categorie::select(['id','categorie'])->get();
        return view('faq/index')->with(['header'=>$header,
                                        'categories'=>$categories,
                                        'questionsAnswers'=>$questionsAnswers,
                                        'categoriesQuestions'=>$categoriesQuestions
                                         ]);
    }

}
