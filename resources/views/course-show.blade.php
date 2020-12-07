@extends('layouts.app')

@section('title')
    {{ $title }}
@endsection

@section('meta_tags')
    <meta property="og:title" content="{{ $title }}" />
    <meta property="og:image" content="{{ route('asset.hero', ['text' => base64_encode($title)]) }}" />
    <meta name="description" content="{{ $overview }}" />
    <link rel="canonical" href="{{ route('courses.show', ['courseNo' => $courseNo]) }}" />
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

