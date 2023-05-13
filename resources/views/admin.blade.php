@extends('index')
@extends('navadmin')

@section('content')
@include('sweetalert::alert')
<div id="gyg" data-server-rendered="true">
  <div class="main-wrapper  partner-left-layout" data-v-5120f7ad>
  <a href="#main-content" class="skip-link">Skip to content</a> 
  <main id="main-content">
    <section layout="vertical" class="grid-wrapper container grid-wrapper--list">
      <div class="collection-header" data-v-76e871e0><div class="collection-header--title-container" data-v-76e871e0>
    <span data-test-id="collection-title" class="collection-header_title" data-v-76e871e0>
        Jogja Borobudur Tour & Travel
      </span> <!---->
    </div> <!---->
    </div>
@foreach($travel as $item)
  <div class="activity-card-block--grid" style="margin-bottom: 0px;">
  <article data-test-id="horizontal-activity-card" class="activity-card horizontal-activity-card companion-inactive activity-card-block__card--grid activity-card-block--desktop" data-v-a1084d9e>
  <a role="contentinfo" target="_blank" rel="noopener" data-activity-id="412877" class="activity-card__container gtm-trigger__card-interaction" data-v-a1084d9e>
  <div class="activity-card__image" data-v-a1084d9e> 
  <div class="activity-card__image-info align-end" data-v-a1084d9e><!----></div> 
  <picture data-v-a1084d9e>
  <source srcset="{{ url('public/img/'.$item->image) }}" type="image/webp"> 
  <img src="{{ url('public/img/'.$item->image) }}" alt="{{$item->namawisata}}">
  </picture>
  </div> 
  <div class="activity-card__details" data-v-a1084d9e>
  <div class="activity-card__details-main" data-v-a1084d9e>
  <div class="activity-card__details-left" data-v-a1084d9e><!----> 
  <h2 class="activity-card__title" data-v-a1084d9e>{{$item->namawisata}}</h2> 
  <div class="activity-card__attributes" data-v-a1084d9e>
  <ul class="activity-attributes__container" data-v-67560657 data-v-a1084d9e>
  <li class="activity-attributes__attribute" data-v-67560657>
  <span data-v-67560657>
    <span data-v-67560657>{{$item->durasi}}</span>
  </span>
</li>
  </ul> <!---->
  </div> <!----> 
  <div class="activity-card__badges__container" data-v-a1084d9e><!----> <!----> <!---->
  </div>
  </div> 
  <div class="activity-card__details-right" data-v-a1084d9e>
  <div class="rating-overall__container" data-v-a1084d9e>
  <div class="rating-overall__rating">
  <form action="{{'/item/'.$item->slug}}" method="get">
  <button type="submit" class="btn-sm btn btn-outline-info">Check it!</button>
  </form>
</div> 
</div> 
<div class="activity-card__pricing" data-v-a1084d9e><div class="baseline-pricing" data-v-24caa43d data-v-a1084d9e><div class="baseline-pricing__container" data-v-24caa43d><div class="baseline-pricing__value" data-v-24caa43d><p class="baseline-pricing__from" data-v-24caa43d>From</p>
        @currency($item->IDR)
      </div> <p class="baseline-pricing__category" data-v-24caa43d>
        {{$item->kategories}}
      </p></div></div></div> <!---->
    </div> <!---->
    </div>
    </div>
    </a>
    </article>
    </div>
    @endforeach
  </section>
</main>
</div>
</div>
<div class="container">
<div class="text-center">
<a href="{{'paketwisata'}}" class="btn btn-light">See more!</a>
</div>
</div>
@endsection

@section('blog')
<div id="gyg" data-server-rendered="true">
  <div class="main-wrapper  partner-left-layout" data-v-5120f7ad>
  <a href="#main-content" class="skip-link">Skip to content</a> 
  <main id="main-content">
    <section layout="vertical" class="grid-wrapper container grid-wrapper--list">
      <div class="collection-header" data-v-76e871e0><div class="collection-header--title-container" data-v-76e871e0>
    <span data-test-id="collection-title" class="collection-header_title" data-v-76e871e0>
        Jogja Borobudur Blog
      </span> <!---->
    </div> <!---->
    </div>
@foreach($blog as $item)
  <div class="activity-card-block--grid" style="margin-bottom: 0px;">
  <article data-test-id="horizontal-activity-card" class="activity-card horizontal-activity-card companion-inactive activity-card-block__card--grid activity-card-block--desktop" data-v-a1084d9e>
  <a role="contentinfo" target="_blank" rel="noopener" data-activity-id="412877" class="activity-card__container gtm-trigger__card-interaction" data-v-a1084d9e>
  <div class="activity-card__image" data-v-a1084d9e> 
  <div class="activity-card__image-info align-end" data-v-a1084d9e><!----></div> 
  <picture data-v-a1084d9e>
  <source srcset="{{ url('public/img/'.$item->image) }}" type="image/webp"> 
  <img src="{{ url('public/img/'.$item->image) }}" alt="{{$item->namawisata}}">
  </picture>
  </div> 
  <div class="activity-card__details" data-v-a1084d9e>
  <div class="activity-card__details-main" data-v-a1084d9e>
  <div class="activity-card__details-left" data-v-a1084d9e><!----> 
  <h2 class="activity-card__title" data-v-a1084d9e>{{$item->judulblog ?? ''}}</h2> 
  <div class="activity-card__attributes" data-v-a1084d9e>
  <ul class="activity-attributes__container" data-v-67560657 data-v-a1084d9e>
  <li class="activity-attributes__attribute" data-v-67560657>
  <span data-v-67560657>
    <span data-v-67560657>{{$item->shortdescription ?? ''}}</span>
  </span>
</li>
  </ul> <!---->
  </div> <!----> 
  <div class="activity-card__badges__container" data-v-a1084d9e><!----> <!----> <!---->
  </div>
  </div> 
  <div class="activity-card__details-right" data-v-a1084d9e>
  <div class="rating-overall__container" data-v-a1084d9e>
  <div class="rating-overall__rating">
  <form action="{{'blog/'.$item->slug}}" method="get">
  <button type="submit" class="btn-sm btn btn-outline-info">Read more!</button>
  </form>
</div> 
</div> 
<div class="activity-card__pricing" data-v-a1084d9e><div class="baseline-pricing" data-v-24caa43d data-v-a1084d9e><div class="baseline-pricing__container" data-v-24caa43d><div class="baseline-pricing__value" data-v-24caa43d><p class="baseline-pricing__from" data-v-24caa43d>Posted in: {{\Carbon\Carbon::parse($item->created_at)->format('d/m/Y') ?? ''}}</p>
      </div> 
    </div></div></div> <!---->
    </div> <!---->
    </div>
    </div>
    </a>
    </article>
    </div>
    @endforeach
  </section>
</main>
</div>
</div>

<div class="container">
<div class="text-center">
<a href="{{'blog'}}" class="btn btn-light">See more!</a>
</div>
</div>
@endsection
