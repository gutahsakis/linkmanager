@props([
    'title'=>null, 
    'actions'
    ])

<div class="bg-base-100 w-96 shadow-xl ">
    <div class="card-body">
        @if ($title)
         <div class="card-title mb-4">{{$title}} </div>
        @endif


            {{ $slot }}
    </div>

    @if ($actions)
    <div class="card-actions flex items-center justify-between mt-10">
        @if ($message = session()->get('message'))
	    <div> {{ $message}} </div>
        @endif

        {{ $actions }}
    </div>
    @endif 
    

</div>