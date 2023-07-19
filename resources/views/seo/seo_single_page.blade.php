<meta property="og:title" content="{{$seo->seo_title}}"/>
<meta property="og:url" content="{{url()->current() }}"/>
<meta property="og:description" content="{{$seo->seo_description}}"/>
@if($seo->image != null)
    <meta property="og:image" content="{{url($seo->image)}}"/>
@endif
<meta property="og:image:alt" content="{{$seo->image_alt}}">
<meta property="og:type" content="article"/>
<meta property="og:site_name " content="Ruby Homes"/>
<meta name="keywords" content="{{$seo->seo_keyword}}"/>
<meta name="meta keywords" content="{{$seo->seo_meta_keyword}}" data-rh="true"/>
<meta name="author" content="Ruby Homes"/>
<meta name="description" content="{{$seo->seo_description}}"/>
<meta name="subject" content="Ruby Homes">
<meta name="publisher" content="Ruby Homes">
