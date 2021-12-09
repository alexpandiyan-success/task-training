<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">

    <!-- Theme CSS -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>


<body>
    <!-- Page header -->
    <div class="pt-lg-8 pb-lg-16 pt-8 pb-12 bg-primary">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-7 col-lg-7 col-md-12">
                    <br>
                    <br><br>
                    <div>
                        <h1 class="text-white display-4 fw-semi-bold">{{($getCourse->name)}}</h1>
                        <p class="text-white mb-6 lead">
                            {{Str::limit($getCourse->short_description, 200)}}
                        </p>
                        <br>
                        <br><br>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <br><br>
    <div class="pb-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-12 mt-n8 mb-4 mb-lg-0">
                    <img src="{{ url('images/'.$getCourse->image) }}" style="width: 100%;">
                    <!-- Card -->

                    <div class="card rounded-3">
                        <!-- Card header -->
                        <div class="card-header border-bottom-0 p-0">

                            <h2 style="padding-left: 20px;">Description</h2>
                            <div style="padding: 20px;">
                                {{($getCourse->detailed_description)}}
                            </div>
                        </div>
                        <!-- Card Body -->
                        <br><br>
                        <h4 class="card-title pricing-card-title" style="padding-left: 20px;">What you'll learn</h4>
                        <ul class="list-unstyled mt-3 mb-4" style="padding-left:20px ;">
                            @foreach($students['course_learnings'] as $stu)
                            <li> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-all" viewBox="0 0 16 16">
                                    <path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z" />
                                    <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z" />
                                </svg> {{ $stu['name'] }}
                            </li>
                            @endforeach


                        </ul>
                        <br>
                        <hr>
                        <br>

                        <div class="accordion" id="accordionExample">
                            @foreach($students['course_title'] as $stu2)

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        {{ $stu2['title'] }}
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">

                                        @foreach($stu2['course_title_details'] as $stu3)
                                        <strong> {{ print_r($stu3['title']) }}</strong> :
                                        {{ print_r($stu3['description']) }}
                                        @endforeach

                                    </div>
                                </div>
                            </div>

                            @endforeach

                        </div>

                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12 mt-lg-n22">
                    <!-- Card -->
                    <div class="card mb-3 mb-4">
                        <div class="p-1">
                            <div class="d-flex justify-content-center position-relative rounded py-10 border-white border rounded-3 bg-cover" style="background-image: url(../assets/images/course/course-javascript.jpg);">
                                <a class="popup-youtube icon-shape rounded-circle btn-play icon-xl text-decoration-none" href="https://www.youtube.com/watch?v=JRzWRZahOVU">
                                    <i class="fe fe-play"></i>
                                </a>
                            </div>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">


                            <iframe style="width: 100%;height:300px" src="https://www.youtube.com/embed/{{($getCourse->video_url)}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <br>
                            <br>
                            <!-- Price single page -->
                            <div class="mb-3">
                                <span class="text-dark fw-bold h2">${{($getCourse->price)}}</span>
                                <del class="fs-4 text-muted">${{($getCourse->price)+165456}}</del>
                            </div>
                            <div class="d-grid">
                                <a href="{{url('checkout/'.$getCourse->id)}}" class="btn btn-outline-primary">Buy</a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </div>
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>



</body>

</html>