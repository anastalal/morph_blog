<div>
    <a href="{{ route('post.show', ['slug' => $post->slog]) }}" class="flex flex-col gap-4 rounded-2xl border border-solid border-[#b1b1b1] bg-[#f5f8ff] p-6 font-bold text-black transition hover:[box-shadow:rgb(0,_0,_0)_7px_7px]">
        <img src="{{ asset('storage/'.$post->banner) }} " alt="" class="inline-block h-60 w-full object-cover" />
        <div class="w-full pt-4">
          <p class="mb-4 text-xs font-semibold uppercase text-[#636262]">{{ $post->category->name }}</p>
          <p class="mb-4 text-xl font-semibold">{{ $post->title }}</p>
          <p class="mb-5 font-normal text-[#636262] lg:mb-8 line-clamp-3">{!! strip_tags($post->content) !!}</p>
          <div class="mx-auto flex max-w-[480px] flex-row items-center text-right">
            <img src="{{ asset('assets/images/profile.png') }}" alt="" class="ml-4 inline-block h-12 w-12 rounded-full object-cover" />
            <div class="flex flex-col items-start">
              <h6 class="text-base font-semibold">{{ $post->user->name }}</h6>
              <div class="flex items-start max-[991px]:flex-col lg:items-center">
                <p class="text-sm text-[#636262]">{{ $post->created_at->diffForHumans() }}</p>
              </div>
            </div>
          </div>
        </div>
      </a>
</div>
