@extends('layouts.app')

@section('title', 'Teknokimya || Laboratuvar & Endüstriyel Kimya')

@section('content')
    @include('sections.slider')
    @include('sections.feature')
    @include('sections.about')
    @include('sections.service')
    @include('sections.text-slider')
    @include('sections.work-step')
    @include('sections.product')
    @include('sections.cta')
@endsection

