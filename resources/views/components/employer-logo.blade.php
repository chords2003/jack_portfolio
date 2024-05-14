@props(['width' => 90]) <!-- This is how we define props in a component -->

<img src="http://picsum.photos/seed/{{ rand(0,100000) }}/{{ $width }}" alt="" class="rounded-xl">
