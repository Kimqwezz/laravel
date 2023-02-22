<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    protected $news = [
        'News 1',
        'News 2',
        'News 3'
    ];


    public function index() 
    {
        echo "<a href='".route("news.create")."'>Adding a news</a><br>";
        foreach($this->news as $key => $news) {
            echo $news . "<a href='".route('news.edit', ['id' => $key])."'>Edit<a><br>";
        }
    }
    public function create() 
    {
        return "<h2>Adding news</h2><br><a href='".route('news.index')."'>On home</a>";
    }
    public function edit (int $id) 
    {
        return "Edit news #" . $id;
    }
}
