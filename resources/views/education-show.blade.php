@extends('layouts.app')

@section('title')
    {{ $title }}
@endsection

@section('meta_tags')
    <meta name="description"
          content="Fag på data og kommunikationsuddannelsen.">
    <link rel="canonical" href="{{ @route('educations.show', ['slug' => $slug]) }}"
@endsection
