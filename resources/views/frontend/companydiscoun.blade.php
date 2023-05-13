@extends('frontend.form')
@section('header')
<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url({{asset('traveler')}}/images/logins.jpg);height: 657px;">
    <div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-left">
					<div class="row row-mt-15em">

						<div class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
							<h3 style="color: white;font-size:70px;">Corporate Event</h3>
							<h2>Get our exclusive deals for your organization!</h2>	
						</div>
						
					</div>
					
				</div>
			</div>
		</div>
</header>
@endsection
@section('content')
@include('sweetalert::alert')
<div class="col-md-12">
	<form method="POST" action="{{url('insertcorporatediscount')}}" enctype="multipart/form-data">
		@csrf
					<div class="col-md-6" style="color: black;">
					<h2 class="activity-card__title" data-v-a1084d9e style="font-size: 20px;">Corporate Event</h2>
					<br>
						<div class="row form-group">
							<div class="col-md-12">
								<label class="activity-card__title" data-v-a1084d9e for="name">Official Website</label>
								<input type="text" name="website" id="website" class="form-control" placeholder="Please enter your organization website" required="">
							</div>
							
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<label class="activity-card__title" data-v-a1084d9e for="email">Office Address</label>
								<input type="text" id="email" name="address" class="form-control" placeholder="Please enter your organization address" required="">
							</div>
						</div>
						<br>
						<div class="row form-group">
							<div class="col-md-12">
								<h2 class="activity-card__title" data-v-a1084d9e style="font-size: 20px;">Contact Person</h2>
								<br>
								<label class="activity-card__title" data-v-a1084d9e for="subject">Your Name</label>
								<input type="text" name="name" id="subject" class="form-control" placeholder="Your Name">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<label class="activity-card__title" data-v-a1084d9e  for="email">Your Job Title</label>
								<input type="text" id="email" name="job" class="form-control" placeholder="Your Job" required="">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12">
								<label class="activity-card__title" data-v-a1084d9e class="activity-card__title" data-v-a1084d9e  for="email">Your Email</label>
								<input type="text" id="email" name="email" class="form-control" placeholder="Your Email" required="">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12">
								<label class="activity-card__title" data-v-a1084d9e class="activity-card__title" data-v-a1084d9e  for="email">Your WhatsApp/Wechat/Line?</label>
								<input type="text" id="email" name="phone" class="form-control" placeholder="Please enter Your WhatsApp/Wechat/Line" required="">
							</div>
						</div>

						
						<div class="form-group">
							<button type="submit" class="cekharga js-check-availability gtm-trigger__adp-check-availability-btn avoid-close-dropdown-on-click c-button c-button--medium filbtn" data-v-dd428772><!---->
							    Submit
							  </button>
						</div>

						
				</div>

				<div class="col-md-5 col-md-push-1" style="color: black;">
					
					<div class="gtco-contact-info">
						<div class="row form-group">
							<div class="col-md-12">
								<label class="activity-card__title" data-v-a1084d9e for="message">Your Message</label>
								<textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Please tell us little bit about your inquiry. Such as; how many people are going, type of activities, and any special requirements you might want on the activity."></textarea>
							</div>
						</div>
					</div>


				</div>
				</form>	
				</div>
@endsection