@if (Session::has('success'))

<div class="alert alert-success alert-dismissible fade show" role="alert" id="alert-box">
  {{Session::get('success')}}



</div>

@elseif(Session::has('error'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert-box">

  {{Session::get('error')}}

</div>

@endif