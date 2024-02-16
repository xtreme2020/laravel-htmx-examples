<x-app-layout>
    <div class="flex flex-col justify-center mt-5">
        <div class="mb-5">
            @foreach($view_examples as $key => $value)
                <a hx-get="{{$value}}"
                   href="#"
                   hx-target="#search-results"
                   hx-swap="innerHTML transition:true"
                   class="text-xl views {{session('selected_view')===$value ? 'selected-option':'' }} shadow-md border-2 text-purple-500 mr-2 inline-block font-bold py-3 px-6 rounded-full">
                    {{ $key }}
                </a>
            @endforeach
        </div>
        <div class="flex justify-center">
            <div class="loader htmx-indicator"></div>
        </div>
        <div class="flex justify-center">
            <div id="search-results" hx-get="{{session('selected_view')}}" hx-swap="innerHTML transition:true" hx-trigger="load"></div>
        </div>
    </div>
    </div>

<script>




    document.addEventListener("htmx:load", function (event) {

        //set active class on the selected view
        document.querySelectorAll('.views').forEach(function (el) {
            el.addEventListener('click', function (e) {
                document.querySelectorAll('.views').forEach(function (el) {
                    el.classList.remove('selected-option');
                });
                el.classList.add('selected-option');
            });
        });

        //Convert the pagination links to htmx
        // select all the pagination links
        let paginationLinks =document.querySelectorAll('[role="navigation"] a');

        // if there are no pagination links, return
        if(paginationLinks.length === 0) return;

        // loop through the pagination links and add the htmx attributes
        paginationLinks.forEach(function (el) {
            el.setAttribute("hx-get", el.getAttribute("href"));
            el.setAttribute("hx-target", "#search-results");
            // process the element to add the htmx behavior
            htmx.process(el);
        });
    });
</script>
    <style>
        .htmx - indicator {
            display: none;
        }

           .selected-option {
                  border: 2px solid #FFC933;
                }

        /* HTML: <div class="loader"></div> */
        .loader {
            font - weight: bold;
            font - family: monospace;
            display: inline - grid;
            font - size: 30 px;
            margin - top: 10 px;
        }

        .loader: before,
        .loader: after {
            content: "Loading...";
            grid - area: 1 / 1;
            - webkit - mask - size: 1.5 ch 100 %,
                100 % 100 %;
            - webkit - mask - repeat: no - repeat;
            - webkit - mask - composite: xor;
            mask - composite: exclude;
            animation: l36 - 1 2 s infinite;
        }

        .loader: before {
            -webkit - mask - image:
                linear - gradient(#000 0 0),
                linear-gradient(# 000 0 0);
        }

        .loader: after {
            -webkit - mask - image: linear - gradient(#000 0 0);
            animation:
                l36-1 1s infinite,
                l36-2 .2s infinite cubic-bezier(0.5, 200, 0.5, -200);
        }

        <blade keyframes|%20l36-1%7B>0% {
            -webkit-mask-position: 0 0, 0 0
        }

        20% {
            -webkit-mask-position: .5ch 0, 0 0
        }

        40% {
            -webkit-mask-position: 100% 0, 0 0
        }

        60% {
            -webkit-mask-position: 4.5ch 0, 0 0
        }

        80% {
            -webkit-mask-position: 6.5ch 0, 0 0
        }

        100% {
            -webkit-mask-position: 2.5ch 0, 0 0
        }
        }

        <blade keyframes|%20l36-2%7B>100% {
            transform: translateY(0.2px)
        }
        }

    </style>
</x-app-layout>
