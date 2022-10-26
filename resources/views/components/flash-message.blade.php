@if(session()->has('message'))
    <div id="flash-message" class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-indigo-500 text-white px-48 py-3">
        <p>
            {{session('message')}}
        </p>
    </div>
@endif

<script>
    const flashMessage = document.getElementById('flash-message');

    (function(){
        setTimeout(() => {
            flashMessage.classList.toggle('hidden')
        }, 2000);
    })()
</script>