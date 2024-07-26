<x-front-layout title="home">
    <ul>
        @foreach($cities as $city)
            <li><a href="{{route('city.show', $city->slug)}}">
                    {{$city->name}}
                </a>
            </li>
        @endforeach
    </ul>
</x-front-layout>
