@extends('user.layout.common')

@section('content')

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact ">
        <div class="container" data-aos="fade-up">

          <div class="section-header">
            <h2 class="mt-5">Contact</h2>
            <p>Need Help? <span>Contact Us</span></p>
          </div>

          <div class="row">
          @if (session('success'))
          <div class="col-6 offset-3">
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
        </div>
          @endif
          </div>

          <form action="{{ route('contact_create') }}" method="post"    >
            @csrf
            <div class="row mt-5   ">
              <div class="col-xl-6 form-group">
                <input type="text" name="name" class="form-control @error('name')
                    is-invalid
                @enderror" id="name" placeholder="Your Name"  >
              </div>
              <div class="col-xl-6 form-group">
                <input type="email" class="form-control @error('email')
                    is-invalid
                @enderror" name="email" id="email" placeholder="Your Email"  >
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control mt-4 @error('subject')
                  is-invalid
              @enderror" name="subject"   placeholder="Subject" >
            </div>
            <div class="form-group">
              <textarea class="form-control mt-4 @error('message')
                  is-invalid
              @enderror" name="message" rows="5" placeholder="Message"  ></textarea>
            </div>

            <div class="text-center"><button type="submit" class="btn btn-danger mt-3">Send Message</button></div>
          </form><!--End Contact Form -->

          <div class="row gy-4 mt-4">

            <div class="col-md-6">
              <div class="info-item  d-flex align-items-center">
                <i class="icon bi bi-map flex-shrink-0"></i>
                <div>
                  <h3>Our Address</h3>
                  <p>No.21 Banmaw-Lashio Road , Near Phyo Mobile</p>
                </div>
              </div>
            </div><!-- End Info Item -->

            <div class="col-md-6">
              <div class="info-item d-flex align-items-center">
                <i class="icon bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h3>Email Us</h3>
                  <p>michaeljangma@gmail.com</p>
                </div>
              </div>
            </div><!-- End Info Item -->

            <div class="col-md-6">
              <div class="info-item  d-flex align-items-center">
                <i class="icon bi bi-telephone flex-shrink-0"></i>
                <div>
                  <h3>Call Us</h3>
                  <p>09755859694 | 09253464681</p>
                </div>
              </div>
            </div><!-- End Info Item -->

            <div class="col-md-6">
              <div class="info-item  d-flex align-items-center">
                <i class="icon bi bi-share flex-shrink-0"></i>
                <div>
                  <h3>Opening Hours</h3>
                  <div><strong>Mon-Sat:</strong> 11AM - 23PM;
                    <strong>Sunday:</strong> Closed
                  </div>
                </div>
              </div>
            </div><!-- End Info Item -->

          </div>
          <div class="mb-3 mt-4">
            <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d1620.4475815409717!2d97.23507541987293!3d24.249406720652!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2smm!4v1691567178139!5m2!1sen!2smm"  style="border:0; width: 100%; height: 350px;" frameborder="0" allowfullscreen

            ></iframe>
           </div><!-- End Google Maps -->


        </div>
      </section><!-- End Contact Section -->


    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery section-bg">
        <div class="container" data-aos="fade-up">

          <div class="section-header">
            <h2>gallery</h2>
            <p>Check <span>Our Gallery</span></p>
          </div>

          <div class="gallery-slider swiper">
            <div class="swiper-wrapper align-items-center">
                @foreach ($b as $c )
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="{{ asset('storage/'.$c->image) }}"><img src="{{ asset('storage/'.$c->image) }}" class="img-fluid" alt=""></a></div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
          </div>

        </div>
      </section><!-- End Gallery Section -->

@endsection
