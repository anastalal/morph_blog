<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Home extends Component
{
    use WithPagination;
    // public $posts;
    public $limitPerPage = 5;
    protected $listeners = ['load-more' => 'loadMore'];
      public function render()
      {
        $posts = Post::latest()->paginate($this->limitPerPage);
        return view('livewire.home', [ 'posts' => $posts]);
        
      }
    public function loadMore()
   {
       $this->limitPerPage = $this->limitPerPage + 2;
   }
  
}
