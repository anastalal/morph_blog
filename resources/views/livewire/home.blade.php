<div class="">
<section>
    <!-- Container -->
    <div class="mx-auto w-full max-w-7xl px-5 py-16 md:px-10 md:py-24 lg:py-32">
      <!-- Component -->
      <div class="flex flex-col items-center">
        <!-- Heading Div -->
        <div class="mb-8 max-w-[800px] text-center md:mb-12 lg:mb-16">
          <h2 class="text-3xl font-semibold md:text-5xl">تصفح  <span class="bg-cover bg-center px-4 text-white" style="background-image: url('https://assets.website-files.com/63904f663019b0d8edf8d57c/639156ce1c70c97aeb755c8a_Rectangle%2010%20(1).svg');">المقالات</span>
          </h2>
          {{-- <p class="mx-auto mt-4 max-w-[528px] text-[#636262]">Lorem ipsum dolor sit amet elit ut aliquam</p> --}}
        </div>
        <!-- Blog Div -->
      
         
        <div class="mb-6 grid grid-cols-1 justify-items-center gap-8 sm:justify-items-stretch md:mb-10 md:grid-cols-3 md:gap-4 lg:mb-12">
      
          @foreach ($posts as $post)
            @livewire('post-card', ['post' => $post])
            
        @endforeach
      
        </div>
       
       {{ $posts->links(data: ['scrollTo' => false]) }}
       
       
      </div>
    </div>
  </section>
  <livewire:scripts />
  
</div>