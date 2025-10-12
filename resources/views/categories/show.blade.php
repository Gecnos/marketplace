@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold text-gray-900 mb-4">Category: {{ $category->name ?? 'Category' }}</h1>
    <p class="text-gray-500">Providers for this category will be listed here.</p>
</div>
@endsection
