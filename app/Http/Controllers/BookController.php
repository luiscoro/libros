<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getAllCategories()
    {
        $books = json_decode(file_get_contents('http://www.etnassoft.com/api/v1/get/?category=libros_programacion&criteria=most_viewed'), true);

        $categoryes = json_decode(file_get_contents('http://www.etnassoft.com/api/v1/get/?get_categories=all'), true);
        return view('index', compact("categoryes", "books"));
    }

    public function getBooksByCategory($id)
    {
        $l1 = "http://www.etnassoft.com/api/v1/get/?category_id=";
        $l2 = "&results_range=0,10";
        $books = json_decode(file_get_contents($l1 . $id . $l2), true);
        $categoryes = json_decode(file_get_contents('http://www.etnassoft.com/api/v1/get/?get_categories=all'), true);
        return view('index', compact("books", "categoryes"));
    }
}
