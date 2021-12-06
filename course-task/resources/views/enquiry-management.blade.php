<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Enquiry') }}
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
      <th scope="col">Course</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile Number</th>
      <th scope="col">dob</th>
      <th scope="col">passed_out</th>
      <th scope="col">studying_year</th>
      <th scope="col">district</th>
      <th scope="col">ug_degree</th>
      <th scope="col">specialization</th>
      <th scope="col">college_name</th>
      <th scope="col">interested_course</th>
    </tr>
  </thead>
  <tbody>

    
  @foreach($getAllEnquiry as $allEnquiry)

    <tr>
      <td>{{$allEnquiry->name}}</td>
      <td>{{$allEnquiry->course_id}}</td>
      <td>{{$allEnquiry->email}}</td>
      <td>{{$allEnquiry->mobile_number}}</td>
      <td>{{$allEnquiry->dob}}</td>
      <td>{{$allEnquiry->passed_out}}</td>
      <td>{{$allEnquiry->studying_year}}</td>
      <td>{{$allEnquiry->district}}</td>
      <td>{{$allEnquiry->ug_degree}}</td>
      <td>{{$allEnquiry->specialization}}</td>
      <td>{{$allEnquiry->college_name}}</td>
      <td>{{$allEnquiry->interested_course}}</td>


    
    </tr>
    @endforeach
  
  </tbody>
</table>
  </section>
            </div>
        </div>
    </div>
</x-app-layout>
