@extends('frontend.form')
@section('header')
<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url({{asset('traveler')}}/images/summer.jpeg);height: 657px;">
    <div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-left">
					<div class="row row-mt-15em">

						<div class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
							<h3 style="color: white;font-size:70px;">Influencer</h3>
							<h2>Are you a blogger? vlogger?
							Youtuber? Have many of followers
							on Instagram? Liked by many people
							on Facebook Page? We have 
							a really big deals for you. Fill out
							the following form, we will get back 
							to you ASAP!</h2>	
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
	<form method="POST" action="{{url('insertinfluencer')}}" enctype="multipart/form-data">
		@csrf
					<div class="col-md-6">
					<h2 class="activity-card__title" data-v-a1084d9e style="font-size: 20px;">FOR YOUR INFORMATION, WE ARE NOT INTERESTED IN WORKING
					WITH “LESS-POPULAR” INFLUENCER, SUCH AS THOSE WHO HAVE
					FOLLOWERS BELOW 100K</h2>
					<br>
					
						<div class="row form-group" style="color: black;">
							<div class="col-md-12">
								<label class="activity-card__title" data-v-a1084d9e for="name">Website</label>
								<input type="text" name="website" id="website" class="form-control" placeholder="Please enter your website" required style="color : black; ">
							</div>
							
						</div>

						<div class="row form-group" style="color: black;">
							<div class="col-md-12">
								<label class="activity-card__title" data-v-a1084d9e for="email">Social Media</label>
								<input type="text" id="email" name="sosmed" class="form-control" placeholder="Please enter your facebook/instagram/twitter/youtoube account. (separate by coma)" required>
							</div>
						</div>

						<div class="row form-group" style="color: black;">
							<div class="col-md-12">
								<label class="activity-card__title" data-v-a1084d9e  for="subject">Your Email</label>
								<input type="text" name="email" id="subject" class="form-control" placeholder="Your Email" required="">
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
								<textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Please tell us little bit about your expectation in working with us. "></textarea>
							</div>
						</div>
					</div>


				</div>
				</form>	
				</div>
@endsection