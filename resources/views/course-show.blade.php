@extends('layouts.app')

@section('title')
    {{ $courseTitle }}
@endsection

@section('meta_tags')
    <meta name="description"
          content="{{ $overview }}">
    <link rel="canonical" href="{{ @route('courses.show', ['courseNo' => $courseNo]) }}"
@endsection
