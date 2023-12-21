<div>
    
<header>
    <div class="bg-contain bg-center bg-no-repeat" style="background-image: url('{{ asset('storage/'.$post->banner) }}');">
      <!-- Container -->
      <div class="mx-auto w-full max-w-7xl px-5 py-12 md:px-10 md:py-16 lg:py-20">
        <!-- Component -->
        <div class="flex min-h-screen flex-col justify-center mx-auto w-full max-w-3xl py-12 md:py-16 lg:py-20 gap-10">
          <!-- Title -->
          <div class="flex flex-col items-center gap-y-5">
            <h1 class="text-center text-4xl font-bold md:text-6xl">{{ $post->title }}</h1>
            {{-- <p class="text-center text-[#808080] max-w-lg text-sm sm:text-base">Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquampurus sit amet luctus venenatis, lectus</p> --}}
          </div>
          <!-- Buttons -->
          
        </div>
      </div>
  </header>
<main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
    <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
        <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
            <header class="mb-4 lg:mb-6 not-format">
                <address class="flex items-center mb-6 not-italic">
                    <div class="inline-flex items-center gap-3 ml-3 text-sm text-gray-900 dark:text-white">
                        <img class="mr-4 w-16 h-16 rounded-full" src="{{ asset('assets/images/profile.png') }}" alt="Jese Leos">
                        <div>
                            <a href="#" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">{{ $post->user->name }}</a>
                            <p class="text-base text-gray-500 dark:text-gray-400">كاتب محتوى على مدونة مورف</p>
                            <p class="text-base text-gray-500 dark:text-gray-400">
                                <time pubdate datetime="2022-02-08" title="February 8th, 2022">{{ $post->user->created_at->format('d.m.Y') }}</time></p>
                        </div>
                    </div>
                </address>
                <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">{{ $post->title }}</h1>
            </header>
            
            {!! $post->content !!}
            
            <section class="not-format my-5">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">التعليقات ({{ $comments->count() }})</h2>
                </div>
                <form class="mb-6" wire:submit.prevent="addComment">
                    @if (!Auth::check())
                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-2" for="name">
                            أسمك
                        </label>
                        <input wire:model="newComment.User_name"
                            class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-gray-500"
                            id="name" type="text" placeholder="ادخل اسمك">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-2" for="email">
                            الايميل
                        </label>
                        <input wire:model="newComment.User_email"
                            class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-gray-500"
                            id="email" type="text" placeholder="الايميل">
                    </div>
                        
                    @endif
                   
                    <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                        <label for="comment" class="sr-only">Your comment</label>
                        <textarea id="comment" rows="6" wire:model="newComment.text"
                            class="px-0 w-full text-sm text-gray-900  focus:outline-none focus:ring-0 dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                            placeholder="اكتب تعليقك ..." required></textarea>
                    </div>
                    <button type="submit"
                        class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                        نشر 
                    </button>
                </form>
                @foreach ($comments as $comment)
                <article class="p-6 mb-6 text-base bg-white rounded-lg dark:bg-gray-900">
                    <footer class="flex justify-between items-center mb-2">
                        <div class="flex items-center">
                            <p class="inline-flex items-center gap-2 ml-3 font-semibold text-sm text-gray-900 dark:text-white"><img
                                    class="mr-2 w-6 h-6 rounded-full"
                                    src="{{ asset('assets/images/user1.png') }}"
                                    alt="Michael Gough"> {{ $comment->User_name }}
                                </p>
                            <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-08"
                                    title="February 8th, 2022">{{ $comment->created_at->diffForHumans()}}</time></p>
                        </div>
                        <button id="dropdownComment1Button" data-dropdown-toggle="dropdownComment1"
                            class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:text-gray-400 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                            type="button">
                              <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                  <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                              </svg>
                            <span class="sr-only">Comment settings</span>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdownComment1"
                            class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownMenuIconHorizontalButton">
                                <li>
                                    <a href="#"
                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                                </li>
                            </ul>
                        </div>
                    </footer>
                    <p>{{ $comment->text }}</p>
                   
                </article>
                @endforeach
               
            </section>
        </article>
    </div>
  </main>
  <aside aria-label="Related articles" class="py-8 lg:py-24 bg-gray-50 dark:bg-gray-800">
    <div class="px-4 mx-auto max-w-screen-xl">
        <h2 class="mb-8 text-2xl font-bold text-gray-900 dark:text-white">مقالات ذات صلة </h2>
        <div class="grid gap-12 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($relateds as $related)
            @livewire('related-card', ['post' => $related])
        @endforeach
        </div>
    </div>
  </aside>
</div>
