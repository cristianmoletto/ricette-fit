@extends('layouts.create')

@section('title', "Modifica la ricetta")

@section("content")

{{-- Form da components --}}
<x-recipe-form
    title="Modifica la ricetta"
    :action="route('recipes.update', $recipe)"
    :cancelRoute="route('recipes.show', $recipe)"
    :meals="$meals"
    :recipe="$recipe"
/>

{{-- Iniezione script --}}
@push('scripts')
    @include('partials.script-recipes')
@endpush

@endsection
