@extends('frontend.form')
@section('header')
<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url({{asset('traveler')}}/images/merapi.webp);height: 657px;">
    <div class="overlay"></div>
    <div class="gtco-container">
      <div class="row">
        <div class="col-md-12 col-md-offset-0 text-left">
          <div class="row row-mt-15em">

            <div class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
            <h3 style="color: white;font-size:70px;">Travel Agent</h3>
              <h2>Are you a travel agent?
              a tour operator? B2B / B2C?
              Interested in one of our tours
              and expecting special quotation
              as a partner? Fill out the following
              form, once it seem interesting for us,
              our staff will get back to you!</h2> 
            </div>
            
          </div>
          
        </div>
      </div>
    </div>
</header>
@endsection
@section('content')
@include('sweetalert::alert')
<div class="col-md-12" style="color: black;">
  <form method="POST" action="{{url('inserttravelagent')}}" enctype="multipart/form-data">
    @csrf
          <div class="col-md-6">
            <div class="row form-group">
              <div class="col-md-12">
                <label class="activity-card__title" data-v-a1084d9e for="name">Official Website</label>
                <input type="text" name="website" id="website" class="form-control" placeholder="Please enter official website" required>
              </div>
            </div>

            <div class="row form-group">
              <div class="col-md-12">
                <label class="activity-card__title" data-v-a1084d9e for="name">Office Address</label>
                <input type="text" name="address" id="website" class="form-control" placeholder="Please enter office address" required>
              </div>
            </div>

            <div class="row form-group">
              <div class="col-md-12">
                <label class="activity-card__title" data-v-a1084d9e for="email">Social Media URL</label>
                <input type="text" id="email" name="sosmed" class="form-control" placeholder="Please enter your facebook/instagram/twitter/youtoube account." required>
              </div>
            </div>

            <div class="row form-group">
              <div class="col-md-12">
                <h2 class="activity-card__title" data-v-a1084d9e style="font-size: 20px;">Contact Person</h2>
                <br>
                <label class="activity-card__title" data-v-a1084d9e for="subject">Your Name</label>
                <input type="text" name="name" id="subject" class="form-control" placeholder="Your Name" required>
              </div>
            </div> 

            <div class="row form-group">
              <div class="col-md-12">
                <label class="activity-card__title" data-v-a1084d9e  for="subject">Job Title</label>
                <input type="text" name="job" id="subject" class="form-control" placeholder="Your Job" required>
              </div>
            </div> 

            <div class="row form-group">
              <div class="col-md-12">
                <label class="activity-card__title" data-v-a1084d9e  for="subject">Email</label>
                <input type="text" name="email" id="subject" class="form-control" placeholder="Your Email" required>
              </div>
            </div> 

            <div class="row form-group">
              <div class="col-md-12">
                <label class="activity-card__title" data-v-a1084d9e  for="subject">WhatsApp/wechat/line?</label>
                <input type="text" name="phone" id="subject" class="form-control" placeholder="Your WhatsApp/wechat/line" required>
              </div>
            </div> 
            <div class="form-group">
              <button type="submit" class="cekharga js-check-availability gtm-trigger__adp-check-availability-btn avoid-close-dropdown-on-click c-button c-button--medium filbtn" data-v-dd428772><!---->
                  Submit
                </button>
            </div>

            
        </div>
        <div class="col-md-5 col-md-push-1">
          
          <div class="gtco-contact-info">
            <div class="row form-group">
              <div class="col-md-12">
                <label class="activity-card__title" data-v-a1084d9e for="message">Your Message</label>
                <textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Please tell us little bit about your inquiry. Such as; how many people are going, type of activities, which one of our tours that you interested in, or any special requirements you might want on the activity."></textarea>
              </div>
            </div>
          </div>


        </div>
        </form> 
        </div>
@endsection