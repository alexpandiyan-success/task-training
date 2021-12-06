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
                                         
                                        
                                         <h3 style="color: green;">   {{$success ?? ''}}</h3>
                                        
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
                                                                <textarea class="form-control" name="detailed_description" id="example-textarea" rows="5"></textarea>                                                            </div>


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