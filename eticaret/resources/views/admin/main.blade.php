@extends("/layouts/mainlayout")

@section("title")
    {{$title}}
@endsection

@section("topbar")
    @include("/admin/topbar")
@endsection

@section("footer")
    @include("/admin/footer")
@endsection

@section("topcontent")
    @include("/admin/topcontent")
@endsection

@section("content")
    {!! $content !!}
@endsection


