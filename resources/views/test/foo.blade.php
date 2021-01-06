@extends('masters')
@section('title','pagetitle')
@section('main')
    @push('Mohsen')
    @each('parts.part2', $fav,'fav')

    @endpush
    <h1>Test Push</h1>
    <ul>


 @datetime('14:20')

    </ul>

@endsection