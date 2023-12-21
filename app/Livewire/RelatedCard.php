<?php

namespace App\Livewire;

use Livewire\Component;

class RelatedCard extends Component
{
    public $post;

    public function mount($post)
    {
        $this->post = $post;
    }
    public function render()
    {
        return view('livewire.related-card');
    }
}
