<?php

namespace App\Http\Livewire\Index;

use App\Models\Article;
use Livewire\Component;

class Index extends Component
{

    public $bestArticle;
    public $newArticle;

    public function mount()
    {
        $this->newArticle = Article::orderBy('id', 'DESC')->take(4)->get();
        $this->bestArticle = Article::where('is_best', 1)->take(4)->get();
    }

    public function render()
    {
        // $bestArticle = Article::orderBy('id', 'DESC')->take(4)->get();

        return view('livewire.index.index');
    }
}
