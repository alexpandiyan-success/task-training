
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
                    <!-- Card -->
                    <div class="card rounded-3">
                        <!-- Card header -->
                        <div class="card-header border-bottom-0 p-0">
                            <div style="padding: 20px;">
                            {{($getCourse->detailed_description)}}
                            </div>
                        </div>
                        <!-- Card Body -->
                        
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



</body>

</html>