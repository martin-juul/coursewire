@extends('layouts.app')

@section('title', __('Not Found'))

@section('meta_tags')
<script>
    setTimeout(() => window.location = '/', 1000);
</script>
@endsection

@section('content')
    <v-card>
        <v-card-title>Siden kunne ikke findes</v-card-title>
        <v-card-text>
            Vi kunne desværre ikke finde den ønskede side.
        </v-card-text>
    </v-card>
@endsection
