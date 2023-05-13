@extends('blogjogjaborobudur.forcontent')
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

                <!-- post view -->
                @foreach($blog as $item)
                <div class="rounded-sm overflow-hidden bg-white shadow-sm">
                    <div class="">
                        <img src="{{ url('public/img/'.$item->image) }}" class="w-full h-96 object-cover">
                    </div>
                    <div class="p-4 pb-5">
                        <h2 class="block text-2xl font-semibold text-gray-700 font-roboto">
                            {{$item->judulblog}}
                        </h2>
                        <div class="mt-2 flex space-x-4">
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
                        <h2 class="block text-lg font-semibold text-gray-700 font-roboto mt-5 mb-3">
                            Share
                        </h2>
                        <div class="social-btn-sp">
                            {!! $shareButtons1 !!}
                    </div>
                        <h2 class="block text-xl font-semibold text-gray-700 font-roboto mt-5">
                            Overview
                        </h2>
                        <p class="text-gray-500 text-sm mt-5">
                            {{$item->shortdescription}}
                        </p>

                        <h2 class="block text-xl font-semibold text-gray-700 font-roboto mt-5">
                            Description
                        </h2>
                        <p class="text-gray-500 text-sm mt-8">
                            {!! $item->deskripsi !!}
                        </p>

                        

                        <div class="flex items-center flex-wrap gap-2 mt-5">
                            
                            @foreach($tagblog as $item)
                            <a href="{{'/blog/tag/'.$item->tags}}"
                                class="px-3 py-1  text-sm border border-gray-200 rounded-sm transition hover:bg-blue-500 hover:text-white">{{$item->tags}}</a>
                                @endforeach
                        </div>

                        
                    </div>
                </div>
                @endforeach

                <!-- title -->
                <div class="flex bg-white px-3 py-2 justify-between items-center rounded-sm mt-8">
                    <h5 class="text-base uppercase font-semibold">Related post</h5>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 gap-2 mt-4">
                    @foreach($similarblog as $item)
                    <div class="rounded-sm bg-white p-3 pb-5 shadow-sm">
                        <a href="{{'/blog/'.$item->slug}}" class="block rounded-md overflow-hidden">
                            <img src="{{ url('public/img/'.$item->image) }}"
                                class="w-full h-40 object-cover transform hover:scale-110 transition duration-500">
                        </a>
                        <div class="mt-3">
                            <a href="#">
                                <h2
                                    class="block text-base font-semibold text-gray-700 hover:text-blue-500 transition font-roboto">
                                    {{$item->judulblog}}
                                </h2>
                            </a>
                            <div class="mt-2 flex space-x-3">
                                <div class="flex text-gray-400 text-xs items-center">
                                    <span class="mr-1 text-xs">
                                        <i class="far fa-clock"></i>
                                    </span>
                                    {{\Carbon\Carbon::parse($item->created_at)->format('d/m/Y') ?? ''}}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                
            </div>

            <!-- right sidebar -->
            <div class="lg:w-3/12 w-full mt-8 lg:mt-0">
                <!-- Social plugin -->
                <div class="w-full bg-white shadow-sm rounded-sm p-4 ">
                    <h3 class="text-md font-semibold text-gray-700 mb-3 font-roboto">Social Media</h3>
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
                    <h3 class="text-md font-semibold text-gray-700 mb-3 font-roboto">Popular Posts</h3>
                    <div class="space-y-4">
                        @foreach($popular as $item)
                        <a href="{{'/blog/'.$item->slug}}" class="flex group">
                            <div class="flex-shrink-0">
                                <img src="{{ url('public/img/'.$item->image) }}" class="h-14 w-20 lg:w-14 xl:w-20 rounded object-cover">
                            </div>
                            <div class="flex-grow pl-3">
                                <h5
                                    class="text-md leading-5 block font-roboto font-semibold  transition group-hover:text-blue-500">
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
                    <h3 class="text-md font-semibold text-gray-700 mb-3 font-roboto">Tags</h3>
                    <div class="flex items-center flex-wrap gap-2">
                        @foreach($tags as $item)
                        <a href="{{'/blog/'.$item->tags}}"
                            class="px-3 py-1  text-sm border border-gray-200 rounded-sm transition hover:bg-blue-500 hover:text-white">{{$item->tags}}</a>
                            @endforeach
                    </div>
                </div>
            </div>

        </div>

@endsection