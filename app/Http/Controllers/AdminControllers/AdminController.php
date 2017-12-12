<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
        public function admin() {

// SELECT categories.categorie, categories.id AS categories_id, question.question, question.id AS question_id, answer.answer, question.status FROM categories LEFT JOIN question ON question.categories_id = categories.id LEFT JOIN answer ON answer.id = question.id_answer ORDER BY categories.id


$topics = DB::table('categories')
             ->leftJoin('question', 'question.categories_id', '=', 'categories.id')
             ->leftJoin('answer', 'answer.id_question', '=', 'question.id')
             ->select('categories.*', 'question.question','question.id AS question_id','question.status', 'answer.answer')
             ->orderBy('categories.categorie','desc')
             ->get();

 $categories = [];
             foreach ($topics as $name => $title) {
                 $categories[] = $title;

}

dump($categories);
// dump($categories);

        $header = 'hi admin!!!';
        return view('admin/index')->with(['header'=>$header,
                                          'topics'=>$topics]);
    }

}


