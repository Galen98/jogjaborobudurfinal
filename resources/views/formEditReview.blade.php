@extends('index')
@extends('navadmin')
@section('content')
<div class="card">
                <div class="card-body">
                  <p class="card-description">
                    Edit Review
                  </p>
                  @foreach($review as $item)
                  <form method="post" action="{{url('editreview/' .$item->id)}}" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputName1">Rating</label>
                      <div class="row">
                    <div class="col">
                <div class="rate" >
               <input type="radio" id="star5" class="rate" name="rating" value="5"  {{ $item->star_rating == 5 ? 'checked' : '' }}/>
               <label for="star5" title="text"></label>
               <input type="radio" id="star4" class="rate" name="rating" value="4"  {{ $item->star_rating == 4 ? 'checked' : '' }}/>
               <label for="star4" title="text"></label>
               <input type="radio" id="star3" class="rate" name="rating" value="3"  {{ $item->star_rating == 3 ? 'checked' : '' }}/>
               <label for="star3" title="text"></label>
               <input type="radio" id="star2" class="rate" name="rating" value="2"  {{ $item->star_rating == 2 ? 'checked' : '' }}/>
               <label for="star2" title="text"></label>
               <input type="radio" id="star1" class="rate" name="rating" value="1"  {{ $item->star_rating == 1 ? 'checked' : '' }}/>
               <label for="star1" title="text"></label>
            </div>
         </div>
      </div>
                    </div>

                    <div class="form-group">
                      <label for="exampleTextarea1">Review</label>
                      <textarea class="form-control" maxlength="1000" style="height:150px" name="review" placeholder="Insert Review" id="formcategory">
                    {{$item->comments}}
                    </textarea>
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="/destination-category">Cancel</a>
                  </form>
                  @endforeach
                </div>
              </div>
@endsection
