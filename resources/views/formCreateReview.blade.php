@extends('index')
@extends('navadmin')
@section('content')
<div class="card">
                <div class="card-body">
                  <p class="card-description">
                    Create Review
                  </p>
                  
                  <form method="post" action="{{url('insertnewreview')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="exampleTextarea1">Name</label>
                      <input type="text" name="name" placeholder="Insert Name" class="form-control" required/>
                      <input type="hidden" name="idwisata" placeholder="Insert Name" class="form-control" value="{{$idwisata}}" required/>
                    </div>

                    <div class="form-group">
                      <label for="exampleTextarea1">Nationality</label>
                      <select name="negaras" class="form-control">
                    <option class="option">Select Your Country</option>
                        @foreach($country as $item)
                    <option value="{{$item->nicename}}" id="countrys" class="option">{{$item->nicename}}</option>
                    @endforeach
                    </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputName1">Rating</label>
                      <div class="row">
                    <div class="col">
                <div class="rate" >
               <input type="radio" id="star5" class="rate" name="rating" value="5"/>
               <label for="star5" title="text"></label>
               <input type="radio" id="star4" class="rate" name="rating" value="4"/>
               <label for="star4" title="text"></label>
               <input type="radio" id="star3" class="rate" name="rating" value="3"/>
               <label for="star3" title="text"></label>
               <input type="radio" id="star2" class="rate" name="rating" value="2"/>
               <label for="star2" title="text"></label>
               <input type="radio" id="star1" class="rate" name="rating" value="1"/>
               <label for="star1" title="text"></label>
            </div>
         </div>
      </div>
                    </div>

                    <div class="form-group">
                      <label for="exampleTextarea1">Review</label>
                      <textarea class="form-control" style="height:150px" name="review" placeholder="Insert Review" id="formcategory">
                    </textarea>
                    </div>
                    
                    <div class="form-group">
                    <label for="exampleTextarea1">Insert Photo</label>
                    <input class="form-control" type="file" name="images[]" accept="image/*" id="formFileMultiple" multiple>
                    </div>

                    <div id="photo-preview-container">
                    <!-- Preview images will be displayed here -->
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="/destination-category">Cancel</a>
                  </form>
                 
                </div>
              </div>
@endsection

@section('scripts')
<script>
$(document).ready(function () {
    const inputPhotos = $('input[name="images[]"]');
    const photoPreviewContainer = $('#photo-preview-container');
    const maxAllowedPhotos = 5;
    const maxFileSizeMB = 2;

    inputPhotos.on('change', function () {
        PhotoPreview(this.files);
    });

    function PhotoPreview(files) {
        if (files.length > maxAllowedPhotos) {
            swal("Error", "Max allowed photos is 5", "error");
            return;
        }

        photoPreviewContainer.empty();

        $.each(files, function (index, file) {
            const reader = new FileReader();

            // Validasi ukuran file
            if (file.size > maxFileSizeMB * 1024 * 1024) {
                swal("Error", "File size exceeds 2MB limit", "error");
                return;
            }

            reader.onload = function (e) {
                const img = $('<img>').attr('src', e.target.result).css({
                    'max-width': '200px',
                    'max-height': '100px',
                    'margin-right': '20px'
                });
                photoPreviewContainer.append(img);
            };

            reader.readAsDataURL(file);
        });
    }
});
    </script>
@endsection