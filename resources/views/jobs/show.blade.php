<x-layout>
    <x-slot:heading>
        Job
    </x-slot>

    <h2 class="font-bold text-lg"> {{ $job['title'] }} </h2>
    <br>

    <p> Pays {{ $job['salary'] }} per year. </p>



</x-layout>
