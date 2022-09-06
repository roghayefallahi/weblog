<?php

namespace App\Http\Livewire\Article;

use App\Models\Article as ModelsArticle;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Article extends Component
{

    public $article;
    public $comment_text = "";
    public $commentToAnswer;
    public $isAnswer = 0;


    public function addComment()
    {
        $this->validate([
            'comment_text' => 'required'
        ]);

        $comment = new Comment();
        $comment->text = $this->comment_text;
        $comment->user_id = Auth::user()->id;
        $comment->article_id = $this->article->id;
        $comment->is_active = 1;
        $comment->parent_id = 0;
        $comment->save();
        $this->comment_text = "";
        $this->emit('showAlert', 'نظر با موفقیت ثبت شد');
    }

    public function commentDelete($id)
    {
        Comment::find($id)->delete();
        $this->emit('showAlert', 'نظر با موفقیت حذف شد');
    }

    public function mount($id)
    {

        $this->article = ModelsArticle::find($id);
    }
    public function getCommentToAnswer($comment)
    {
        $this->commentToAnswer = $comment;
        $this->isAnswer = 1 ;
    }


    public function addAnswer(){
        $this->validate([
            'comment_text' => 'required'
        ]);

        $comment = new Comment();
        $comment->text = $this->comment_text;
        $comment->user_id = Auth::user()->id;
        $comment->article_id = $this->article->id;
        $comment->is_active = 1;
        $comment->parent_id = $this->commentToAnswer['id'];
        $comment->save();
        $this->comment_text = "";
        $this->emit('showAlert', 'پاسخ با موفقیت ثبت شد');
        $this->cancelAnswer();

    }

    public function cancelAnswer(){
        $this->reset('commentToAnswer', 'isAnswer'); 
    }

    public function render()
    {
        $comment = Comment::where([
            ['article_id', $this->article->id],
            ['parent_id', 0]
        ])->orderBy('id', 'DESC')->get();
        $answer = Comment::where([
            ['article_id', $this->article->id],
            ['parent_id','>', 0]
        ])->orderBy('id', 'DESC')->get();

        return view('livewire.article.article', compact('comment', 'answer'));
    }
}
