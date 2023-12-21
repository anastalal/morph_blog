<article class="max-w-xs">
    <a href="{{ route('post.show', ['slug' => $post->slog]) }}">
        <img src="{{ asset('storage/'.$post->banner) }} " class="mb-5 rounded-lg" alt="Image 1">
    </a>
    <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900 dark:text-white">
        <a href="{{ route('post.show', ['slug' => $post->slog]) }}">{{ $post->title }}</a>
    </h2>
    <p class="mb-4 text-gray-500 dark:text-gray-400 line-clamp-3">{!! strip_tags($post->content) !!}</p>
    {{-- <a href="#" class="inline-flex items-center font-medium underline underline-offset-4 text-primary-600 dark:text-primary-500 hover:no-underline">
        Read in 2 minutes
    </a> --}}
</article>