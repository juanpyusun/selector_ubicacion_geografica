<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Location</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <h1>Select a geographic location</h1>
    <div class="container">
        <div class="row">
            <select name="pais" id="pais">
                <option value="0" selected disabled>Select a Country</option>
                @foreach ($paises as $pais)
                    <option value="{{ $pais['id'] }}">{{ $pais['name'] }}</option>                    
                @endforeach
            </select>
        </div>
        <div class="row">
            <select name="departamento" id="departamento" disabled>
                <option value="0" selected disabled>Select a State</option>
            </select>
        </div>
        <div class="row">
            <select name="ciudad" id="ciudad" disabled>
                <option value="0" selected >Select a City</option>
            </select>
        </div>
        <div>
            <input type="text" id="resultado" disabled>
        </div>
        <div id="map" style="height: 400px; width: 400px"></div>
        <div class="row">
            <button id="reset">Reset</button>
        </div>


    </div>
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>