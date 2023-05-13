@extends('blogjogjaborobudur.index')
@section('content')
<div class="container mx-auto px-4 flex flex-wrap lg:flex-nowrap">
            <!-- left sidebar -->
            <div class="w-3/12 hidden xl:block">
                <!-- categories -->
                

                <!-- random posts -->
                <div class="w-full mt-8 bg-white shadow-sm rounded-sm p-4 ">
                    <h3 class="text-md font-semibold text-gray-700 mb-3">Recent Posts</h3>
                    <div class="space-y-4">
                        @if(count($today) === 0)
                        <h5>No Post</h5>
                        @else
                    	@foreach($today as $item)
                        <a href="{{'/blog/'.$item->slug}}" class="flex group">
                            <div class="flex-shrink-0">
                                <img src="{{ url('public/img/'.$item->image) }}" class="h-14 w-20 rounded object-cover">
                            </div>
                            <div class="flex-grow pl-3">
                                <h5
                                    class="text-md leading-5 block font-semibold  transition group-hover:text-blue-500">
                                    {{$item->judulblog}}
                                </h5>
                                <div class="flex text-gray-400 text-sm items-center">
                                    <span class="mr-1 text-xs"><i class="far fa-clock"></i></span>
                                    {{\Carbon\Carbon::parse($item->created_at)->format('d/m/Y') ?? ''}}
                                </div>
                            </div>
                        </a>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <div class="xl:w-6/12 lg:w-9/12 w-full  xl:ml-6 lg:mr-6">
                

                <!-- title -->
                <!-- big post -->
                @foreach($banner as $item)
                <div class="rounded-sm overflow-hidden bg-white shadow-sm">
                    <a class="block rounded-md overflow-hidden" href="{{'/blog/'.$item->slug}}">
                        <img src="{{ url('public/img/'.$item->image) }}"
                            class="w-full h-96 object-cover transform hover:scale-110 transition duration-500">
                    </a>
                    <div class="p-4 pb-5">
                        <a >
                            <h2
                                class="block text-2xl font-semibold text-gray-700">
                                {{$item->judulblog}}
                            </h2>
                        </a>

                        <p class="text-gray-500 text-sm mt-2">
                            {{ Str::limit($item->shortdescription, 120) }}
                        </p>
                        <div class="mt-3 flex space-x-4">
                            
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- regular post -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                	@foreach($blog2 as $item)
                    <div class="rounded-sm bg-white p-4 pb-5 shadow-sm">
                        <a href="{{'/blog/'.$item->slug}}" class="block rounded-md overflow-hidden">
                            <img src="{{ url('public/img/'.$item->image) }}"
                                class="w-full h-60 object-cover transform hover:scale-110 transition duration-500">
                        </a>
                        <div class="mt-3">
                            <a href="{{'/blog/'.$item->slug}}">
                                <h2
                                    class="block text-xl font-semibold text-gray-700 hover:text-blue-500 transition">
                                    {{$item->judulblog}}
                                </h2>
                            </a>
                            <p class="text-gray-500 text-sm mt-2">
                           {{ Str::limit($item->shortdescription, 120) }}
                        </p>
                            <div class="mt-2 flex space-x-3">
                                <div class="flex text-gray-400 text-sm items-center">
                                    <span class="mr-2 text-xs">
                                        <i class="far fa-user"></i>
                                    </span>
                                    {{$item->author}}
                                </div>
                                <div class="flex text-gray-400 text-sm items-center">
                                    <span class="mr-2 text-xs">
                                        <i class="far fa-clock"></i>
                                    </span>
                                    {{\Carbon\Carbon::parse($item->created_at)->format('d/m/Y') ?? ''}}
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach
                 
                  
                </div>
                <br>
                <br>
                <form action="{{'blog/list'}}" method="get">
                <button type="submit" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow" style="align-items: center;text-align: center;">
                      See More
                    </button>
                    </form>
                <!-- {{ $blog2->links('pagination::tailwind') }} -->

            </div>

            <!-- right sidebar -->
            <div class="lg:w-3/12 w-full mt-8 lg:mt-0">
                <!-- Social plugin -->
                <div class="w-full bg-white shadow-sm rounded-sm p-4 ">
                    <h3 class="text-md font-semibold text-gray-700 mb-3">Social Media</h3>
                    <div class="flex gap-2 group-hover:text-blue-500">
                        <a href="#"
                            class="w-8 h-8 rounded-sm flex items-center justify-center border border-gray-400 text-base text-gray-800 ">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#"
                            class="w-8 h-8 rounded-sm flex items-center justify-center border border-gray-400 text-base text-gray-800">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#"
                            class="w-8 h-8 rounded-sm flex items-center justify-center border border-gray-400 text-base text-gray-800">
                            <i class="fab fa-instagram"></i>
                        </a>
                        
                    </div>
                </div>

                <!-- Popular posts -->
                <div class="w-full mt-8 bg-white shadow-sm rounded-sm p-4 ">
                    <h3 class="text-md font-semibold text-gray-700 mb-3">Popular Posts</h3>
                    <div class="space-y-4">
                    	@foreach($popular as $item)
                        <a href="{{'/blog/'.$item->slug}}" class="flex group">
                            <div class="flex-shrink-0">
                                <img src="{{ url('public/img/'.$item->image) }}" class="h-14 w-20 lg:w-14 xl:w-20 rounded object-cover">
                            </div>
                            <div class="flex-grow pl-3">
                                <h5
                                    class="text-md leading-5 block font-semibold  transition group-hover:text-blue-500">
                                    {{$item->judulblog}}
                                </h5>
                                <div class="flex text-gray-400 text-sm items-center">
                                    <span class="mr-1 text-xs"><i class="far fa-clock"></i></span>
                                    {{\Carbon\Carbon::parse($item->created_at)->format('d/m/Y') ?? ''}}
                                </div>
                            </div>
                        </a>
                        @endforeach
                        
                        
                    </div>
                </div>

                <!-- tag -->
                <!-- categories -->
                <div class="w-full bg-white shadow-sm rounded-sm p-4  mt-8">
                    <h3 class="text-md font-semibold text-gray-700 mb-3">Tags</h3>
                    <div class="flex items-center flex-wrap gap-2">
                        @foreach($tags as $item)
                        <a href="{{'/blog/tag/'.$item->tags}}"
                            class="px-3 py-1  text-sm border border-gray-200 rounded-sm transition hover:bg-blue-500 hover:text-white">{{$item->tags}}</a>
                            @endforeach
                    </div>
                </div>
            </div>

        </div>
        
           <div class="container my-24 px-6 mx-auto">

  <!-- Section: Design Block -->
  <section class="mb-32 text-gray-800 text-center lg:text-left">
    <div class="px-6 py-12 lg:my-12">
      <div class="container mx-auto xl:px-32">
        <div class="grid lg:grid-cols-2 gap-12 flex items-center">
          <div class="mt-12 lg:mt-0">
            <h1 class="text-4xl md:text-5xl xl:text-6xl font-bold tracking-tight mb-12">
              Are you ready <br /><span class="text-blue-600">for your journey?</span>

            </h1>

            <div class="md:flex flex-row">
              <input
                type="text"
                class="form-control block w-full px-4 py-2 mb-2 md:mb-0 md:mr-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                placeholder="Enter your email"
              />
              <button
                type="submit"
                class="inline-block px-7 py-3 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                data-mdb-ripple="true"
                data-mdb-ripple-color="light"
              >
                Subscribe
              </button>
            </div>
          </div>
          <div class="mb-12 lg:mb-0">
            <div
              class="embed-responsive embed-responsive-16by9 relative w-full overflow-hidden rounded-lg shadow-lg"
              style="padding-top: 56.25%"
            >
              <iframe
                class="embed-responsive-item absolute top-0 right-0 bottom-0 left-0 w-full h-full"
                src="https://www.youtube.com/embed/vlDzYIIOYmM?enablejsapi=1&amp;origin=https%3A%2F%2Fmdbootstrap.com"
                allowfullscreen=""
                data-gtm-yt-inspected-2340190_699="true"
                id="240632615"
              ></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: Design Block -->
  
</div>
@endsection