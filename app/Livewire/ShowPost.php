<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\Comment;
use Livewire\Component;

class ShowPost extends Component
{
    public $post;
    public $relateds;
    public $comments;
    public $newComment = [];
    
    

    public function mount($slug)
    {
        $this->post = Post::where('slog', $slug)->first();
        $this->relateds = Post::where('category_id', $this->post->category_id)->take(3)->get();
        $this->comments = Comment::where('post_id', $this->post->id)->get();
        $this->post->views += 1;
        $this->post->save();
    }
    public function render()
    {
        return view('livewire.show-post')
        ->layoutData(['title' => $this->post->title]);
    }
    public function addComment()
    {
    $this->newComment['post_id'] = $this->post->id;
    if(auth()->check()){
        $user = auth()->user();
        $this->newComment['User_name'] = $user->name;
        $this->newComment['User_email'] = $user->email;
    }
    Comment::create($this->newComment);
    $this->comments = Comment::where('post_id', $this->post->id)->get();
    $this->newComment = [];
    }
    
}
