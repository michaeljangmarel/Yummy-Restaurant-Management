@extends('user.layout.common')
@section('title' , 'Products')
@section('content')

    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu">
        <div class="container" data-aos="fade-up">

          <div class="section-header">
             <p>Check Our <span>Yummy Menu</span></p>
          </div>

          <div class="row">
            <div class="col-6 offset-3 ">
                <div class="row">
                    <div class="col-6 offset-3">
                        <form action="{{ route('ui_pro_cat') }}" method="GET" >
                            @csrf
                            <div class="  d-flex">
                                <input type="search" name="key" class="form-control" placeholder="Search Products">
                                <button type="submit" class="btn btn-danger">Search</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
          </div>
{{--
          <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">
            @foreach ($cat  as  $c)
            <a href="{{ route('search_pro',$c->id) }}">
                {{ $c->name}}
            </a>
            @endforeach
          </ul> --}}

          <div class="tab-content" data-aos="fade-up" data-aos-delay="300">

            <div class="tab-pane fade active show" id="menu-starters">

              <div class="tab-header text-center">
                <p>Make Your Perfect Day </p>
                <h3></h3>
              </div>

              <div class="row gy-5">
                @foreach ($pro as $one )

                <div class="col-lg-4 menu-item">
                    <a href="{{ asset('storage/'.$one->image) }}" class="glightbox"><img src="{{ asset('storage/'.$one->image) }}" class="menu-img img-fluid" alt=""></a>
                    <h4 class="text-dark">{{ $one->name }}</h4>
                    <p class="ingredients">
                   {{-- {{ $one->description }} --}}
                    </p>
                    <p class="price text-secondary">
                      {{ $one->price }} Kyats
                    </p>
                    <a href="{{ route('ui_cart',$one->id) }}">
                        <button class="btn btn-danger text-white"> <i class="fa-solid fa-cart-shopping"></i> Add to Cart </button>
                    </a>
                  </div><!-- Menu Item -->
                @endforeach
              </div>
            </div><!-- End Starter Menu Content -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg mt-2">
        <div class="container" data-aos="fade-up">

          <div class="section-header">
            <h2>Testimonials</h2>
            <p>What Are They <span>Saying About Us</span></p>
          </div>

          <div class="slides-1 swiper" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper">

              <div class="swiper-slide">
                <div class="testimonial-item">
                  <div class="row gy-4 justify-content-center">
                    <div class="col-lg-6">
                      <div class="testimonial-content">
                        <p>
                          <i class="bi bi-quote quote-icon-left"></i>
                          Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                          <i class="bi bi-quote quote-icon-right"></i>
                        </p>
                        <h3>Saul Goodman</h3>
                        <h4>Ceo &amp; Founder</h4>
                        <div class="stars">
                          <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-2 text-center">
                      <img src="{{ asset('user/assets/img/testimonials/testimonials-1.jpg') }}" class="img-fluid testimonial-img" alt="">
                    </div>
                  </div>
                </div>
              </div><!-- End testimonial item -->

              <div class="swiper-slide">
                <div class="testimonial-item">
                  <div class="row gy-4 justify-content-center">
                    <div class="col-lg-6">
                      <div class="testimonial-content">
                        <p>
                          <i class="bi bi-quote quote-icon-left"></i>
                          Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                          <i class="bi bi-quote quote-icon-right"></i>
                        </p>
                        <h3>Sara Wilsson</h3>
                        <h4>Designer</h4>
                        <div class="stars">
                          <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-2 text-center">
                      <img src="{{ asset('user/assets/img/testimonials/testimonials-2.jpg') }}" class="img-fluid testimonial-img" alt="">
                    </div>
                  </div>
                </div>
              </div><!-- End testimonial item -->

              <div class="swiper-slide">
                <div class="testimonial-item">
                  <div class="row gy-4 justify-content-center">
                    <div class="col-lg-6">
                      <div class="testimonial-content">
                        <p>
                          <i class="bi bi-quote quote-icon-left"></i>
                          Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                          <i class="bi bi-quote quote-icon-right"></i>
                        </p>
                        <h3>Jena Karlis</h3>
                        <h4>Store Owner</h4>
                        <div class="stars">
                          <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-2 text-center">
                      <img src="{{ asset('user/assets/img/testimonials/testimonials-3.jpg') }}" class="img-fluid testimonial-img" alt="">
                    </div>
                  </div>
                </div>
              </div><!-- End testimonial item -->

              <div class="swiper-slide">
                <div class="testimonial-item">
                  <div class="row gy-4 justify-content-center">
                    <div class="col-lg-6">
                      <div class="testimonial-content">
                        <p>
                          <i class="bi bi-quote quote-icon-left"></i>
                          Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                          <i class="bi bi-quote quote-icon-right"></i>
                        </p>
                        <h3>John Larson</h3>
                        <h4>Entrepreneur</h4>
                        <div class="stars">
                          <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-2 text-center">
                      <img src="{{ asset('user/assets/img/testimonials/testimonials-4.jpg') }}" class="img-fluid testimonial-img" alt="">
                    </div>
                  </div>
                </div>
              </div><!-- End testimonial item -->

            </div>
            <div class="swiper-pagination"></div>
          </div>

        </div>
      </section><!-- End Testimonials Section -->

@endsection
