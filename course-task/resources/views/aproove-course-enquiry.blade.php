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

    <br>
    <br>
    <br>
    <br>

    <div class="pb-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 mt-n8 mb-4 mb-lg-0">
                    <!-- Card -->
                    <div class="card rounded-3">
                        <!-- Card header -->
                        <div class="card-header border-bottom-0 p-0">
                            <div style="padding: 20px;">
                                <h4 style="text-align: center;">Get a Course</h4>
                            </div>
                        </div>

                    </div>

                    <br>
                    <!-- Card Body -->

                    <div class="tab-content" style="background-color: white;box-shadow: 0px 0px 10px 10px #ddd;">
                        <h3 style="color: green;"> {{$success ?? ''}}</h3>

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="tab-pane show active" id="input-types-preview" style="padding: 20px;">
                            <div class="row">
                                <div class="col-lg-12">



                                    <form action="{{url('add-enquiry-approve')}}" method="POST">
                                        @csrf

                                        <input type="text" hidden value="{{$enquiryId->id}}" name="enquiry_id" id="simpleinput" class="form-control">

                                        <div class="mb-3">
                                            <select name="payment_method" class="form-select" aria-label="Default select example">
                                                <option value="" hidden>Select Pyment Method</option>
                                                <option value="cash">cash</option>
                                                <option value="gpay">gpay</option>
                                                <option value="bank transfer">bank transfer</option>
                                            </select>
                                        </div>


                                        <div class="mb-3">
                                            <select name="payment_mode" class="form-select" aria-label="Default select example">
                                                <option value="" hidden>Select Pyment Mode</option>

                                                <option value="advance">advance</option>

                                                <option value="EMI-I">EMI-I</option>
                                                <option value="EMI-II">EMI-II</option>


                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Amount</label>
                                            <input type="text" name="amount" id="simpleinput" class="form-control">
                                        </div>






                                        <button type="submit" class="btn btn-primary mb-2">Submit</button>
                                    </form>
                                </div> <!-- end col -->

                            </div>
                            <!-- end row-->
                        </div> <!-- end preview-->

                    </div> <!-- end tab-content-->
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