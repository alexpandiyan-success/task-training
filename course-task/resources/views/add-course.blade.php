<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Course') }}
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
                <div class="content">


                    <!-- Start Content-->
                    <div class="container-fluid">


                        <div class="row">
                            <div class="col-12">
                                <div class="card" style="border: none !important;">
                                    <div class="card-body">

                                        @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif


                                        <h3 style="color: green;"> {{$success ?? ''}}</h3>

                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="input-types-preview">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <form action="{{url('add-course')}}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="mb-3">
                                                                <label for="simpleinput" class="form-label">Course Name</label>
                                                                <input type="text" name="name" id="simpleinput" class="form-control">
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="simpleinput" class="form-label">Price</label>
                                                                <input type="number" name="price" id="simpleinput" class="form-control">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="simpleinput" class="form-label">Course Short Description</label>
                                                                <input type="text" name="short_description" id="simpleinput" class="form-control">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="simpleinput" class="form-label">Detailed Description</label>
                                                                <textarea class="form-control" name="detailed_description" id="example-textarea" rows="5"></textarea>
                                                            </div>


                                                            <div class="mb-3">
                                                                <label for="example-fileinput" class="form-label">Course Thumbnail</label>
                                                                <input type="file" name="file_path" id="example-fileinput" class="form-control">
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="simpleinput" class="form-label">Video url</label>
                                                                <input type="text" name="video_url" id="simpleinput" class="form-control">
                                                            </div>

                                                            <button type="submit" class="btn btn-primary mb-2">Submit</button>
                                                        </form>
                                                    </div> <!-- end col -->

                                                </div>
                                                <!-- end row-->
                                            </div> <!-- end preview-->

                                        </div> <!-- end tab-content-->
                                    </div> <!-- end card-body -->
                                </div> <!-- end card -->
                            </div><!-- end col -->
                        </div><!-- end row -->


                    </div>
                </div>
            </div>
        </div>
</x-app-layout>