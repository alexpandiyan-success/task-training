<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add College') }}
        </h2>
    </x-slot>

    <header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="{{ url('technology-management') }}" class="nav-link px-2 text-white">Technology Management</a></li>
          <li><a href="{{ url('course-management') }}" class="nav-link px-2 text-white">Course Management</a></li>
          <li><a href="{{ url('course-technologies-management') }}" class="nav-link px-2 text-white">Course Technologies Management</a></li>
          <li><a href="{{ url('course-learning-management') }}" class="nav-link px-2 text-white">Course Learning Management</a></li>
          <li><a href="{{ url('add-degrees') }}" class="nav-link px-2 text-white">Degrees</a></li>
          <li><a href="{{ url('add-colleges') }}" class="nav-link px-2 text-white">Colleges</a></li>
          <li><a href="{{ url('add-specializtions') }}" class="nav-link px-2 text-white">Specializtions</a></li>
          <li><a href="{{ url('add-coursetitle') }}" class="nav-link px-2 text-white">Course Titles</a></li>
          <li><a href="{{ url('add-coursetitledetails') }}" class="nav-link px-2 text-white">Course Title Details</a></li>
        </ul>

       
      </div>
    </div>
  </header>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="content">


                    <!-- Start Content-->
                    <div class="container-fluid">


                        <div class="row">
                            <div class="col-12">
                                <div class="card" style="border: none !important;">
                                    <div class="card-body">

                                        <table class="table table-dark">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Location</th>
                                                    <th scope="col">image</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($getAllColleges as $getAllCollege)

                                                <tr>
                                                    <td>{{$getAllCollege->name}} </td>
                                                    <td>{{$getAllCollege->location}} </td>
                                                    <td><img src="{{ ('images/'.$getAllCollege->image) }}" style="height: 100px;"></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div> <!-- end card-body -->
                                </div> <!-- end card -->
                            </div><!-- end col -->
                        </div><!-- end row -->


                    </div>
                </div>
            </div>
        </div>
</x-app-layout>