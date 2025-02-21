@extends('frontend.layouts.main')
@section('main-content')
    {{-- hero --}}
    @include('template.hero')

    @include('template.about')

    @include('template.stats')

    @include('template.clients')

    @include('template.services')

    @include('template.portofolio')

    @include('template.testimonials')

    @include('template.team')

    @include('template.gallery')

    @include('template.contact')

    @include('template.footer')
@endsection
