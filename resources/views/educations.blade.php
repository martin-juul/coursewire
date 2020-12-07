@extends('layouts.app')

@section('title')
    Fag
@endsection

@section('meta_tags')
    <meta name="description"
          content="Uddannelserne">
    <link rel="canonical" href="{{ route('educations') }}"
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
