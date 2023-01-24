@extends('front.index')
@section('content')
<div id="blog" class="latest-news-area section" style="background-color: #e1e1e1;">
    <!--======  Start Section Title Five ======-->
    <div class="section-title-five">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="content">
              <h6>latest news</h6>
              <h2 class="fw-bold">Latest News & Blog</h2>
              <p>
                There are many variations of passages of Lorem Ipsum available,
                but the majority have suffered alteration in some form.
              </p>
            </div>
          </div>
        </div>
        <!-- row -->
      </div>
      <!-- container -->
    </div>
    <!--======  End Section Title Five ======-->
    <div class="container">
      <div class="row">
        @foreach ($blogs as $blog)
        <div class="col-lg-4 col-md-6 col-12">
            <!-- Single News -->
            <div class="single-news">
              <div class="image">
                <a href="javascript:void(0)"><img style="max-height:200px; min-height:200px min-width:403px; min-width:403px;" class="thumb" src="{{asset("storage/$blog->image")}}" alt="Blog" /></a>
                <div class="meta-details">
                  <img class="thumb" src="{{asset("storage/$blog->logo")}}" alt="Author"/>
                  <span>{{$blog->title}}</span>
                </div>
              </div>
              <div class="content-body">
                <h4 class="title">
                  <a href="javascript:void(0)">{{$blog->name}}</a>
                </h4>
                <p>
                {{$blog->description}}
                </p>
              </div>
            </div>
            <!-- End Single News -->
          </div>
        @endforeach
        
        {{-- <div class="col-lg-4 col-md-6 col-12">
          <!-- Single News -->
          <div class="single-news">
            <div class="image">
              <a href="javascript:void(0)"><img class="thumb" src="{{asset('front/assets/images/blog/2.jpg')}}" alt="Blog" /></a>
              <div class="meta-details">
                <img class="thumb" src="{{asset('front/assets/images/blog/b6.jpg')}}" alt="Author" />
                <span>BY TIM NORTON</span>
              </div>
            </div>
            <div class="content-body">
              <h4 class="title">
                <a href="javascript:void(0)">
                  The newest web framework that changed the world
                </a>
              </h4>
              <p>
                Lorem Ipsum is simply dummy text of the printing and
                typesetting industry. Lorem Ipsum has been the industry's
                standard.
              </p>
            </div>
          </div>
          <!-- End Single News -->
        </div>
        <div class="col-lg-4 col-md-6 col-12">
          <!-- Single News -->
          <div class="single-news">
            <div class="image">
              <a href="javascript:void(0)"><img class="thumb" src="{{asset('front/assets/images/blog/3.jpg')}}" alt="Blog" /></a>
              <div class="meta-details">
                <img class="thumb" src="{{asset('front/assets/images/blog/b6.jpg')}}" alt="Author" />
                <span>BY TIM NORTON</span>
              </div>
            </div>
            <div class="content-body">
              <h4 class="title">
                <a href="javascript:void(0)">
                  5 ways to improve user retention for your startup
                </a>
              </h4>
              <p>
                Lorem Ipsum is simply dummy text of the printing and
                typesetting industry. Lorem Ipsum has been the industry's
                standard.
              </p>
            </div>
          </div>
          <!-- End Single News -->
        </div> --}}
      </div>
    </div>
  </div> 
@endsection
