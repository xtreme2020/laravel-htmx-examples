<div class="flex justify-center">
    <input class="min-w-[480px] rounded-md"
           type="search"
           name="q"
           id="search"
           autocomplete="off"
           value="{{ session('q') }}"
           hx-get="{{session('selected_view')}}"
           hx-trigger="keyup search changed delay:500ms"
           hx-target="#search-results"
           hx-swap="innerHTML transition:true"
           placeholder="Search..."
           hx-indicator=".loader">
</div>
<script>
    document.addEventListener("htmx:load", function(event)
    {
        document.getElementById('search').focus();
    });
</script>
