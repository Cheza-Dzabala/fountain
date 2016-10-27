@extends('layouts.master')

@section('title')
    F.M.F.S | Dashboard
@endsection

@section('styles')
    <link href="{{ asset('../assets/global/plugins/morris/morris.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('page-title')
    Dashboard
@endsection

@section('content')
<form action="{{ route('pmtTest') }}" method="post">
    {{ csrf_field() }}
    <input name="interest" placeholder="interest">
    <input name="loanAmount" placeholder="loanAmount">
    <input name="months" placeholder="months">

    <input type="submit" value="submit">
</form>
@endsection