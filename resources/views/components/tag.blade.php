@props(['tag', 'size' => 'base']) <!-- creating a size attribute to use on different layouts or cards base on the feature -->

@php
    $classes = "bg-white/10 hover:bg-white/25 rounded-xl font-bold transition-colors duration-300";

    if ($size === 'base') {
        $classes .= " px-5 py-1 text-sm"; // setting the default size for the tag. Notice the space between the classes and the dot. This is to avoid concatenation errors.
    }

    if ($size === 'small') {
        $classes .= " px-3 py-1 text-xxs";
    }
@endphp

<a href="" class="{{ $classes }}">{{ $slot }}</a>
