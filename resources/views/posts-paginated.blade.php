<x-search-htmx/>

<div class="flex min-w-full flex-wrap justify-center mb-5 font-mono font-semibold text-2xl text-amber-300">

    @foreach($posts as $post)
        <div id="fade-me-in"
            class='flex min-w-[480px] w-1/3 items-center mt-4 justify-center from-[#F9F5F3] via-[#F9F5F3] to-[#F9F5F3] bg-gradient-to-br px-2'>
            <div class='w-full max-w-md  mx-auto bg-white rounded-3xl shadow-xl overflow-hidden'>
                <div class='max-w-md mx-auto'>
                    <div class='h-[200px]'
                        style='background-image:url({{ $post->image }});background-size:cover;background-position:center'>
                    </div>
                    <div class='p-4 sm:p-6'>

                        <p class='font-bold text-gray-700 text-[14px]  mb-1'>
                            <div class="border mr-1 text-md shadow-2xl inline-flex p-2 font-semibold">
                                {{ $post->id }}</div>{{ $post->title }}
                        </p>
                        <p class='text-[#7C7C80] text-[16px] mt-6'>{{ $post->body }}</p>
                        <a style="font-size: medium;" target='_blank' href='#'
                            class='block mt-10 !text-md w-full text-white px-4 py-3 tracking-wide text-center capitalize transition-colors duration-300 transform bg-[#FFC933] rounded-[12px] hover:bg-[#FFC933DD] focus:outline-none focus:ring focus:ring-teal-300 focus:ring-opacity-80'>
                            Read more...
                        </a>
                    </div>
                </div>
            </div>
        </div>

    @endforeach
</div>
<div class="m-5">{{ $posts->links() }}</div>
@unless($posts->count()>0)
    <div class="flex justify-center m-10 font-mono font-semibold text-2xl text-amber-300">No Results...</div>
@endunless

<style>
    #fade-me-in.htmx-added {
        opacity: 0;
    }

    #fade-me-in {
        opacity: 1;
        transition: opacity 1s ease-out;
    }

</style>
