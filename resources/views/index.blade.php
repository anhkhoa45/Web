@extends('layouts.main')

@section('style')
  <style>
    .pagination-links {
      text-align: center;
      margin-top: 100px;
    }

    .header-nav {
      position: absolute;
      margin-bottom: 0;
    }
  </style>
@endsection

@section('content')
  @include('includes.slider')
  <!-- Services Section -->
  <section class="irs-courses-one">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs irs-course-tab clear-fix" role="tablist">
              <li class="irs-course-title pull-left"><h3>Edu Hub Courses</h3></li>
              <li role="presentation">
                <a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Top Rated</a>
              </li>
              <li role="presentation">
                <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Most Popular</a>
              </li>
              <li role="presentation" class="active">
                <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Recently Added</a>
              </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="home">
                @foreach($r_courses as $course)
                  <div class="col-xs-12 col-sm-6 col-md-3 irs-ext-pad animatedParent">
                    <div class="irs-courses-fstcol animated fadeIn delay-250">
                      <div class="irs-course-thumb">
                        <a href="{{ route('course-info', ['id' => $course->id ]) }}">
                          <img class="img-responsive img-fluid" src="{{ Storage::url($course->avatar) }}" alt="1.jpg">
                        </a>
                      </div>
                      <div class="irs-course-details">
                        <ul class="list-inline">
                          <li class="irs-user">
                            <a href="#"><span class="flaticon-people-1"></span> {{ $course->buyers }}</a></li>
                          <li class="irs-ccomment"><a href="#"><span class="fa fa-star" aria-hidden="true"></span> {{ number_format($course->avg_rating, 0) }}</a></li>
                          <li class="irs-course-price"><a href="#" class="text-thm2"><span class=""></span>
                              ${{ $course->cost }}</a></li>
                        </ul>
                        <h3><a href="{{ route('course-info', ['id' => $course->id ]) }}">{{ $course->name }}</a></h3>
                        <div class="irs-student-info">
                          <div class="irs-studend-thumb"><img class="img-responsive img-circle"
                                                              src="{{ Storage::url($course->teacher_avatar) }}"
                                                              alt="student1.png"></div>
                          <div class="irs-student-name">
                            <a href="{{ route('teacher-info', ['id' => $course->teacher_id]) }}">
                              with <span class="text-thm2">{{ $course->teacher_name }}</span>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
              <div role="tabpanel" class="tab-pane" id="profile">
                @foreach($p_courses as $course)
                  <div class="col-xs-12 col-sm-6 col-md-3 irs-ext-pad animatedParent">
                    <div class="irs-courses-fstcol animated fadeIn delay-250">
                      <div class="irs-course-thumb">
                        <a href="{{ route('course-info', ['id' => $course->id ]) }}">
                          <img class="img-responsive img-fluid" src="{{ Storage::url($course->avatar) }}" alt="1.jpg">
                        </a>
                      </div>
                      <div class="irs-course-details">
                        <ul class="list-inline">
                          <li class="irs-user">
                            <a href="#"><span class="flaticon-people-1"></span> {{ $course->buyers }}</a></li>
                          <li class="irs-ccomment"><a href="#"><span class="fa fa-star" aria-hidden="true"></span> {{ number_format($course->avg_rating, 0) }}</a></li>
                          <li class="irs-course-price"><a href="#" class="text-thm2"><span class=""></span>
                              ${{ $course->cost }}</a></li>
                        </ul>
                        <h3><a href="{{ route('course-info', ['id' => $course->id ]) }}">{{ $course->name }}</a></h3>
                        <div class="irs-student-info">
                          <div class="irs-studend-thumb"><img class="img-responsive img-circle"
                                                              src="{{ Storage::url($course->teacher_avatar) }}"
                                                              alt="student1.png"></div>
                          <div class="irs-student-name">
                            <a href="{{ route('teacher-info', ['id' => $course->teacher_id]) }}">
                              with <span class="text-thm2">{{ $course->teacher_name }}</span>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
              <div role="tabpanel" class="tab-pane" id="messages">
                <div class="col-xs-12 col-sm-6 col-md-3 irs-ext-pad animatedParent">
                  <div class="irs-courses-fstcol animated fadeIn delay-250">
                    <div class="irs-course-thumb">

                      <img class="img-responsive img-fluid" src="images/courses/1.jpg"
                                                       alt="1.jpg">
                    </div>
                    <div class="irs-course-details">
                      <ul class="list-inline">
                        <li class="irs-user"><a href="#"><span class="flaticon-people-1"></span> 321</a></li>
                        <li class="irs-ccomment"><a href="#"><span class="flaticon-interface"></span> 4</a></li>
                        <li class="irs-course-price"><a href="#" class="text-thm2"><span class=""></span> $59.00</a>
                        </li>
                      </ul>
                      <h3><a href="#">Numerical scientific skills</a></h3>
                      <div class="irs-student-info">
                        <div class="irs-studend-thumb"><img src="images/resource/student1.png" alt="student1.png"></div>
                        <div class="irs-student-name"><a href="">with <span class="text-thm2">Jessica Hamson</span></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 irs-ext-pad animatedParent">
                  <div class="irs-courses-fstcol animated fadeIn delay-500">
                    <div class="irs-course-thumb"><img class="img-responsive img-fluid" src="images/courses/2.jpg"
                                                       alt="2.jpg"></div>
                    <div class="irs-course-details">
                      <ul class="list-inline">
                        <li class="irs-user"><a href="#"><span class="flaticon-people-1"></span> 321</a></li>
                        <li class="irs-ccomment"><a href="#"><span class="flaticon-interface"></span> 4</a></li>
                        <li class="irs-course-price"><a href="#" class="text-thm2"><span class=""></span> Free</a></li>
                      </ul>
                      <h3><a href="#">Computer Science and Philosophy</a></h3>
                      <div class="irs-student-info">
                        <div class="irs-studend-thumb"><img src="images/resource/student2.png" alt="student2.png"></div>
                        <div class="irs-student-name"><a href="">with <span class="text-thm2">Jessica Hamson</span></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 irs-ext-pad animatedParent">
                  <div class="irs-courses-fstcol animated fadeIn delay-750">
                    <div class="irs-course-thumb"><img class="img-responsive img-fluid" src="images/courses/3.jpg"
                                                       alt="3.jpg"></div>
                    <div class="irs-course-details">
                      <ul class="list-inline">
                        <li class="irs-user"><a href="#"><span class="flaticon-people-1"></span> 321</a></li>
                        <li class="irs-ccomment"><a href="#"><span class="flaticon-interface"></span> 4</a></li>
                        <li class="irs-course-price"><a href="#" class="text-thm2"><span class=""></span> $49.00</a>
                        </li>
                      </ul>
                      <h3><a href="#">Health and Medical Sciences</a></h3>
                      <div class="irs-student-info">
                        <div class="irs-studend-thumb"><img src="images/resource/student3.png" alt="student3.png"></div>
                        <div class="irs-student-name"><a href="">with <span class="text-thm2">Jessica Hamson</span></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 irs-ext-pad animatedParent">
                  <div class="irs-courses-fstcol animated fadeIn delay-1000">
                    <div class="irs-course-thumb"><img class="img-responsive img-fluid" src="images/courses/4.jpg"
                                                       alt="4.jpg"></div>
                    <div class="irs-course-details">
                      <ul class="list-inline">
                        <li class="irs-user"><a href="#"><span class="flaticon-people-1"></span> 321</a></li>
                        <li class="irs-ccomment"><a href="#"><span class="flaticon-interface"></span> 4</a></li>
                        <li class="irs-course-price"><a href="#" class="text-thm2"><span class=""></span> $25.00</a>
                        </li>
                      </ul>
                      <h3><a href="#">Plant and Microbial Biology</a></h3>
                      <div class="irs-student-info">
                        <div class="irs-studend-thumb"><img src="images/resource/student4.png" alt="student4.png"></div>
                        <div class="irs-student-name"><a href="">with <span class="text-thm2">Jessica Hamson</span></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Newsletter Section -->
  <section class="irs-newsletter-subscribe">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center">
          <h2>Get our Edu Hub latest courses & promos on your email:</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="irs-nl-form">
            <form>
              <div class="form-group">
                <input class="form-control" id="email3" placeholder="Your Email Address">
                <button type="submit" class="btn btn-default pull-right"><span class="flaticon-note"></span></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  @include('includes.footer')
@endsection

@section('script')
  <script>
      let swiper = new Swiper('.swiper-container', {
          pagination: '.swiper-pagination',
          slidesPerView: 2,
          slidesPerColumn: 2,
          paginationClickable: true,
          spaceBetween: 20,
          mousewheelControl: true
      });
  </script>
@endsection