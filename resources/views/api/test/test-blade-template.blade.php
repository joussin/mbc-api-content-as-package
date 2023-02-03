<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Titre de la page</title>
    {{--    <link rel="stylesheet" href="style.css">--}}
    {{--    <script src="script.js"></script>--}}
</head>
<body>

simple-blade-template

<h1>Route</h1>
uri: {{ $route['uri'] }}<br>
static_uri: {{ $route['static_uri'] }}<br>

<h1>Page</h1>
name: {{ $page['name'] }}<br>
template_name: {{ $page['template_name'] }}<br>

<h1>Content list</h1>

@foreach($page_contents as $page_content)

    id: {{ $page_content['id'] }}<br>
    name: {{ $page_content['name'] }}<br>
    content: {{ $page_content['content'] }}<br><br><br>

@endforeach

<h1>Content by name</h1>

name: {{ $page_content_by_name['name'] ?? '' }}<br>
content: {{ $page_content_by_name['content'] ?? '' }}<br>



</body>
</html>
