@extends('layouts.app')

@section('title')
    {{ $title }}
@endsection

@section('meta_tags')
    <meta property="og:title" content="{{ $title }}" />
    <meta property="og:image" content="{{ route('asset.hero', ['text' => $title]) }}" />
    <meta name="description" content="{{ $overview }}" />
    <link rel="canonical" href="{{ @route('courses.show', ['courseNo' => $courseNo]) }}" />

<script type="application/ld+json">
  {
    "@context": "https://schema.org/",
    "@type": "Course",
    "name": "{{ $title }}",
    "description": "{{ $overview }}",
    "courseCode": "{{ $courseNo }}",
    "teaches": "{{ $about }}",
    "provider": {
        "name": "{{ config('branding.name') }}",
        "alternateName": "{{ config('branding.acronym') }}",
        "email": "{{ config('branding.email') }}",
        "telephone": "{{ config('branding.phone') }}",
        "image": "{{ url('/branding/sde/favicon.png') }}",
        "url": "{{ config('branding.url') }}"
    }
  }
</script>
@endsection
