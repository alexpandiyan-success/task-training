<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div style="padding: 20px;">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <h1>welcome to todoapp</h1>

                    <form action="{{url('getstore')}}" method="POST">
                        @csrf
                        <input type="text" name="task_name">
                        <br><br>
                        <button style="background-color: aquamarine;">submit</button>
                    </form>

                    <a href="{{url('getall')}}"> View data </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>