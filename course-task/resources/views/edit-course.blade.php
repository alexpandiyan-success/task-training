<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('View Course') }}
    </h2>
  </x-slot>
  <header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
            <use xlink:href="#bootstrap"></use>
          </svg>
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
    <div>
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <section class="py-5 text-center">
          <table class="table table-dark table-striped table-responsive">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Detailed Description</th>
                <th scope="col">Short Description</th>
                <!-- <th scope="col">image</th> -->
                <th scope="col">Video URL</th>
              </tr>
            </thead>
            <tbody>


              @foreach($getAllCourses as $AllCourses)

              <tr>
                <td>{{$AllCourses->name}}</td>
                <td>${{$AllCourses->price}}</td>
                <td>{{$AllCourses->detailed_description}}</td>
                <td>{{$AllCourses->short_description}}</td>
                <!-- <td>{{$AllCourses->image}}</td> -->
                <td>{{$AllCourses->video_url}}</td>

              </tr>
              @endforeach

            </tbody>
          </table>
        </section>
      </div>
    </div>
  </div>
</x-app-layout>