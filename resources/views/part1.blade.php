@extends('masters')
@section('title','pagetitle')
@section('main')
    <ul>
        @foreach($fav as $f)

@break($f === '')
            <li>{{$f}}</li>

            @endforeach


    </ul>
    @include('parts.part2');
    @endsection