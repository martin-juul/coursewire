@extends('layouts.app')

@section('title')
    {{ $title }}
@endsection

@section('meta_tags')
    <meta name="description" content="Om {{ $title }} uddannelsen." />
    <link rel="canonical" href="{{ @route('educations.show', ['slug' => $slug]) }}" />
    <meta property="og:title" content="{{ $title }}" />
    <meta name="og:image" content="{{ $image }}" />
@endsection
