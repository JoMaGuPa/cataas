<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria de Gats</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }

        h1 {
            color: #333;
            margin-top: 20px;
            font-size: 2.5rem;
        }

        .gallery {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            padding: 30px;
            justify-items: center;
        }

        .gallery img {
            width: 100%;
            max-height: 250px;
            object-fit: cover;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }

        .gallery img:hover {
            transform: scale(1.05);
        }

        .tags {
            margin-top: 15px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .tags a {
            text-decoration: none;
            background-color: #007bff;
            padding: 8px 15px;
            border-radius: 20px;
            margin: 5px;
            color: white;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .tags a:hover {
            background-color: #0056b3;
        }

        .pagination {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .pagination a {
            padding: 8px 15px;
            margin: 0 5px;
            border-radius: 5px;
            background-color: #ddd;
            text-decoration: none;
            color: #333;
            display: inline-flex;
            align-items: center;
        }

        .pagination a:hover {
            background-color: #007bff;
            color: white;
        }

        .pagination .active {
            background-color: #007bff;
            color: white;
        }

        /* Estilo para las flechas */
        .pagination .prev,
        .pagination .next {
            font-size: 18px;
            padding: 8px;
            background-color: #ddd;
            border-radius: 50%;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            color: #333;
        }

        .pagination .prev:hover,
        .pagination .next:hover {
            background-color: #007bff;
            color: white;
        }

        /* Botones para la primera y última página */
        .pagination .first,
        .pagination .last {
            font-size: 18px;
            padding: 8px 12px;
            background-color: #ddd;
            border-radius: 5px;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            color: #333;
        }

        .pagination .first:hover,
        .pagination .last:hover {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>

<body>
    <h1>Galeria de Gats</h1>

    <div class="gallery">
        @foreach($cats as $cat)
        <div>
            <img src="https://cataas.com/cat/{{ $cat->_id }}" alt="Cat Image">
            <div class="tags">
                <p>Tags:
                    @foreach(json_decode($cat->tags) as $tag)
                    <a href="{{ route('cats.filter', $tag) }}">{{ $tag }}</a>
                    @endforeach
                </p>
            </div>
        </div>
        @endforeach
    </div>

    <div class="pagination">
        @if($cats->currentPage() > 1)
        <a class="first" href="{{ $cats->url(1) }}">Primera</a>
        @else
        <span class="first" style="visibility: hidden;">Primera</span>
        @endif

        @if($cats->onFirstPage())
        <span class="prev" style="visibility: hidden;">&laquo;</span>
        @else
        <a class="prev" href="{{ $cats->previousPageUrl() }}">&laquo;</a>
        @endif

        @php
        $currentPage = $cats->currentPage();
        $lastPage = $cats->lastPage();
        $range = 2;
        @endphp

        @for ($i = max(1, $currentPage - $range); $i <= min($lastPage, $currentPage + $range); $i++)
            <a class="{{ $cats->currentPage() == $i ? 'active' : '' }}" href="{{ $cats->url($i) }}">{{ $i }}</a>
            @endfor

            @if($cats->hasMorePages())
            <a class="next" href="{{ $cats->nextPageUrl() }}">&raquo;</a>
            @else
            <span class="next" style="visibility: hidden;">&raquo;</span>
            @endif

            @if($cats->currentPage() < $cats->lastPage())
                <a class="last" href="{{ $cats->url($cats->lastPage()) }}">Última</a>
                @else
                <span class="last" style="visibility: hidden;">Última</span>
                @endif
    </div>
</body>

</html>