{{-- <title>Weather</title>

<x-app-layout>
    <x-slot name="header">
        <x-header title="Weather" />
    </x-slot>

    <div class="max-w-3xl mx-auto p-6 bg-white rounded-xl shadow-xl flex items-center">
        @if($weatherData && array_key_exists('main', $weatherData) && array_key_exists('weather', $weatherData) && array_key_exists('wind', $weatherData))
            @php
                $convertedTempToCelcius = number_format($weatherData['main']['temp'] - 273.15);
                $convertedWeatherDesc = ucwords($weatherData['weather'][0]['description']);
                $convertedFeelsLike = number_format($weatherData['main']['feels_like']) - 273.15;
                $weatherIcon = $weatherData['weather'][0]['icon'];
                $iconUrl = "http://openweathermap.org/img/w/$weatherIcon.png";
            @endphp

            <div class="flex-1">
                <p class="text-3xl">Now</p>
                <p class="text-3xl">{{ $convertedTempToCelcius }}&#8451;</p><img src="{{ $iconUrl }}" alt="Weather Icon" class="w-24 h-24">
                <p class="text-3xl">Feels Like: {{ $convertedFeelsLike }}&#8451;</p>
                <p class="text-3xl">Weather: {{ $convertedWeatherDesc }}</p>
                <p class="text-lg">Humidity: {{ $weatherData['main']['humidity'] }}%</p>
                <p class="text-lg">Wind Speed: {{ $weatherData['wind']['speed'] }} m/s</p>
                <p class="text-xl">Town: {{ $weatherData['name'] }}</p>
            </div>
        @else
            <p class="text-3xl">No weather information available</p>
        @endif
    </div>
</x-app-layout>
 --}}

 <title>Weather</title>

 <x-app-layout>
     <x-slot name="header">
         <x-header title="Weather" />
     </x-slot>
 
     <div class="max-w-3xl mx-auto p-6 bg-slate-900 rounded-xl shadow-xl flex items-start">
         @if($weatherData && array_key_exists('main', $weatherData) && array_key_exists('weather', $weatherData) && array_key_exists('wind', $weatherData))
             @php
                 $convertedTempToCelcius = number_format($weatherData['main']['temp'] - 273.15);
                 $convertedWeatherDesc = ucwords($weatherData['weather'][0]['description']);
                 $convertedFeelsLike = number_format($weatherData['main']['feels_like'] - 273.15);
                 $weatherIcon = $weatherData['weather'][0]['icon'];
                 $iconUrl = "http://openweathermap.org/img/w/$weatherIcon.png";
             @endphp
 
             <div class="flex items-start justify-between w-full text-white">
                 <div class="flex items-start">
                     <div class="pr-6">
                         <p class="text-3xl mb-2">Now</p>
                         <p class="text-4xl font-bold">{{ $convertedTempToCelcius }}&#8451;</p>
                         <img src="{{ $iconUrl }}" alt="Weather Icon" class="w-20 h-20 ml-2">
                         <p class="text-lg mt-2">Feels like {{ $convertedFeelsLike }}&#8451;</p>
                     </div>
                 </div>
                 <div class="pl-6 text-right">
                     <p class="text-3xl">{{ $convertedWeatherDesc }}</p>
                     <p class="text-lg">Humidity: {{ $weatherData['main']['humidity'] }}%</p>
                     <p class="text-lg">Wind Speed: {{ $weatherData['wind']['speed'] }} m/s</p>
                     <p class="text-xl">Town: {{ $weatherData['name'] }}</p>
                 </div>
             </div>
         @else
             <p class="text-3xl">No weather information available</p>
         @endif
     </div>
 </x-app-layout>
 
 
