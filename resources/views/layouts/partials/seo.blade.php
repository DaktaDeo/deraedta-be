{{-- Meta Tags Blade View --}}
@if($websiteModel->title)
    <title>{{ $websiteModel->title }}</title>
@endif

@if($websiteModel->description)
    <meta name="description" content="{{ $websiteModel->description }}">
@endif

@if($websiteModel->keywords)
    <meta name="keywords" content="{{ $websiteModel->keywords }}">
@endif

@foreach($websiteModel->meta_tags as $key => $value)
    <meta name="{{ $key }}" content="{{ $value }}">
@endforeach
