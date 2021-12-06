<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Technology') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <section class="py-5 text-center">
            <table class="table table-dark table-striped table-responsive">
            <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
  
    </tr>
  </thead>
  <tbody>

    
  @foreach($getTechnology as $AllCourses)

    <tr>
      <td>{{$AllCourses->name}}</td>
      <td>{{$AllCourses->description}}</td>

    
    </tr>
    @endforeach
  
  </tbody>
</table>
  </section>
            </div>
        </div>
    </div>
</x-app-layout>
