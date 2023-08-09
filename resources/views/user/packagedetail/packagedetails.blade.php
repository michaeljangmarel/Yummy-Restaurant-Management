@extends('user.layout.common')


@section('content')

    <!-- ======= Book A Table Section ======= -->
    <section  class="mt-5 ">
        <div class="container" data-aos="fade-up">

          <div class="section-header">
            <h2>Book A Table</h2>
            <p>Book <span>Your Stay</span> With Us</p>
          </div>

          <div class="row g-0">

            <div class="col-lg-4 reservation-img" style="background-image: url({{ asset('storage/'.$one->image) }});" data-aos="zoom-out" data-aos-delay="200"></div>

            <div class="col-lg-8 d-flex align-items-center reservation-form-bg p-3  shadow-3">
              <form   method="GET"  >
                @csrf
                <div class="row gy-4">
                    <input type="text" disabled  class="form-control  mb-4"  value="{{ $one->name }} || $ {{ $one->price }} For Your Happiness .">
                    <input type="text" hidden name="package_id"   value="{{ $one->id }}">
                    <input type="text" hidden name="user_id" value="{{ Auth::user()->id }}">
                  <div class="col-lg-4 col-md-6">
                    <input type="text" name="name" class="form-control @error('name')
                        is-invalid
                    @enderror"  placeholder="Your Name"  required >@error('name')
                        <small class="text-danger">{{ $message  }}</small>
                    @enderror

                  </div>
                  <div class="col-lg-4 col-md-6">
                    <input type="email" class="form-control @error('email')
                        is-invalid
                    @enderror" name="email"  placeholder="Your Email" required >
                    @error('email')
                        <small class="text-danger">{{  $message  }}</small>
                    @enderror

                  </div>
                  <div class="col-lg-4 col-md-6">
                    <input type="number" class="form-control @error('phone')
                        is-invalid
                    @enderror" name="phone"   placeholder="Your Phone"  required >@error('phone')
                        <small class="text-danger">{{ $message  }}</small>
                    @enderror

                  </div>

                  <div class="col-lg-4 col-md-6">
                    <input type="number" class="form-control @error('people')
                        is-invalid
                    @enderror" name="people"  required  placeholder="# of people" >@error('people')
                        <small class="text-danger">{{ $message  }}</small>
                    @enderror

                  </div>
                  <div class="form-group mt-3">
                    <textarea name="mess" id="" class="form-control" cols="30" rows="10"></textarea>
                   </div>
                   <div class="text-center"><button  id="packorder" class="btn btn-danger mt-2">Book a Table</button></div>
                </div>


              </form>
            </div><!-- End Reservation Form -->

          </div>

        </div>
      </section><!-- End Book A Table Section -->
@endsection
@section('jquery')
<script>
$(document).ready(function(){

$('#packorder').click(function(){

    alert('hi');
});


});
</script>
@endsection
