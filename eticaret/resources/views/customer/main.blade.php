@extends("/layouts/mainlayout")

@section("title")
    {{$title}}
@endsection

@section("categories")
    {!! $categories !!}
@endsection

@section("totalprice")
    {!! $totalprice !!}
@endsection

@section("topcontent")
    @include("/customer/topcontent")
@endsection
@section("footer")
    @include("/customer/footer")
@endsection

@section("topbar")
    @include("/customer/topbar")
@endsection

@section("content")
    {!! $content !!}
@endsection


