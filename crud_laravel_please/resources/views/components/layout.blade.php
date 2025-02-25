<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $metaTitle ?? 'chupame la pija'}}</title>
</head>
<style>
    .flex{
        display: flex;
        gap: 15%;
    }

    .column{
        flex-direction: column;
    }
</style>
<body>
@include('partials.nav')

{{$slot}}

@isset($sidebar)
<div class="sidebar">
    <h3>
        Sidebar
    </h3>
    <div>{{ $sidebar }}</div>
</div>
@endisset

</body>
</html>
