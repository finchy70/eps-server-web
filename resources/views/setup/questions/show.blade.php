@extends('layouts.app')

@section('title', 'Setup Menu')

@section('content')

    <livewire:order-questions :section="$section" :questions="$questions" />

@stop
