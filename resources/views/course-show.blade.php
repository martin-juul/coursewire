@extends('layouts.app')

@section('title')
    {{ $title }}
@endsection

@section('meta_tags')
    <meta property="og:title" content="{{ $title }}" />
    <meta property="og:image" content="{{ route('asset.hero', ['text' => $title]) }}" />
    <meta name="description" content="{{ $overview }}" />
    <link rel="canonical" href="{{ @route('courses.show', ['courseNo' => $courseNo]) }}" />
@endsection

@section('jsonld')
<script type="application/ld+json">
    {!! json_encode($jsonld, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
</script>
@endsection
