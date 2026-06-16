@extends('layouts.create')

@section('title', "Aggiungi una ricetta")

@section("content")

{{-- Form da components --}}
<x-recipe-form
    title="Aggiungi una ricetta"
    :action="route('recipes.store')"
    :cancelRoute="route('recipes.index')"
    :meals="$meals"
/>

{{-- Iniezione script --}}
@push('scripts')
    @include('partials.script-recipes')
@endpush

@endsection
