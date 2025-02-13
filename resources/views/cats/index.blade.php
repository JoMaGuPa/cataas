<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria de Gats</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        h1 {
            margin-top: 20px;
            font-size: 36px;
            color: #333;
        }

        .gallery {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* 3 columns */
            grid-template-rows: repeat(2, 1fr); /* 2 rows */
            gap: 20px;
            padding: 20px;
            justify-content: center;
            max-width: 90%;
            margin: auto;
        }

        .gallery img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .gallery div {
            text-align: center;
        }

        .pagination {
            margin-top: 20px;
            display: flex;
            justify-content: center;
        }

        .pagination a {
            padding: 10px 20px;
            margin: 0 5px;
            border: 1px solid #ccc;
            color: #333;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .pagination a:hover {
            background-color: #ddd;
        }

        .pagination .active {
            background-color: #333;
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
            <p>Tags: {{ implode(', ', json_decode($cat->tags) ?? []) }}</p>
        </div>
        @endforeach
    </div>

    <div class="pagination">
        {{ $cats->links() }}
    </div>
</body>

</html>