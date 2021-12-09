<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Course Management') }}
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
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <section class="py-5 text-center container">
          <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
              <p class="lead text-muted">A course management system (CMS) is a collection of software tools providing an online environment for course interactions. A CMS typically includes a variety of online tools and environments, such as: An area for faculty posting of class materials such as course syllabus and handouts.
              </p>
              <a href="{{ url('course-management-url-add') }}" class="btn btn-primary my-2">Add Course</a>
              <a href="{{ url('view-course') }}" class="btn btn-secondary my-2">View Course</a>
              </p>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
</x-app-layout>