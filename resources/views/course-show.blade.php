@extends('layouts.app')

@section('title')
    {{ $courseTitle }}
@endsection

@section('meta_tags')
    <meta name="description"
          content="Fag på data og kommunikationsuddannelsen.">
    <link rel="canonical" href="{{ @route('courses.show', ['courseNo' => $courseNo]) }}"
@endsection
