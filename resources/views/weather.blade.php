<!DOCTYPE html>
<html>
<head>
    <title>Weather Search</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        .weather-box { border: 1px solid #ccc; padding: 20px; width: 300px; }
        .error { color: red; }
    </style>
</head>
<body>
    <h1>Search City Weather</h1>

    <form action="{{ route('weather') }}" method="GET">
        <input type="text" name="city" value="{{ old('city', $city) }}" placeholder="Enter city name" required>
        <button type="submit">Search</button>
    </form>

    @if ($errors->any())
        <div class="error">{{ $errors->first() }}</div>
    @endif

    @if ($weather)
        <div class="weather-box">
            <h2>{{ $weather['name'] }} ({{ $weather['sys']['country'] }})</h2>
            <p><strong>Temp:</strong> {{ $weather['main']['temp'] }} °C</p>
            <p><strong>Condition:</strong> {{ ucfirst($weather['weather'][0]['description']) }}</p>
            <p><strong>Humidity:</strong> {{ $weather['main']['humidity'] }}%</p>
            <p><strong>Wind:</strong> {{ $weather['wind']['speed'] }} m/s</p>
        </div>
    @endif
</body>
</html>
