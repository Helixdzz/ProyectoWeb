<div style="border: 1px solid #e5e7eb; border-radius: 0.5rem; padding: 1.5rem; background: white;">
    <h3 style="font-weight: 500; font-size: 1.125rem; margin-bottom: 1rem; color: #1f2937;">Clima en tu ciudad</h3>

    <form action="{{ route('weather') }}" method="GET" style="margin-bottom: 1rem;">
        <input 
            type="text" 
            name="city" 
            value="{{ old('city', request('city')) }}" 
            placeholder="Ej. Monterrey" 
            required
            style="padding: 0.5rem; width: 70%; border: 1px solid #d1d5db; border-radius: 0.375rem; margin-right: 0.5rem;">
        <button 
            type="submit" 
            style="padding: 0.5rem 1rem; background: #3b82f6; color: white; border-radius: 0.375rem; font-weight: 500; border: none;">
            Buscar
        </button>
    </form>

    @if ($errors->has('city'))
        <div style="color: #dc2626; margin-bottom: 1rem;">{{ $errors->first('city') }}</div>
    @endif

    @if (isset($weather))
        <div style="line-height: 1.6;">
            <strong>{{ $weather['name'] }}, {{ $weather['sys']['country'] }}</strong><br>
            Temperatura: {{ $weather['main']['temp'] }} °C<br>
            Estado: {{ ucfirst($weather['weather'][0]['description']) }}<br>
            Humedad: {{ $weather['main']['humidity'] }}%<br>
            Viento: {{ $weather['wind']['speed'] }} m/s
        </div>
    @endif
</div>
