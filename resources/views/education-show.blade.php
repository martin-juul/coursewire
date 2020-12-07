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

@section('jsonld')
<script type="application/ld+json">
@if(app()->environment('local'))
{!! json_encode($jsonld, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
@else
{!! json_encode($jsonld, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
@endif
</script>
@endsection
