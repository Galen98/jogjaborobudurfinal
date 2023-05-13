@extends('blogjogjaborobudur.index')
@section('breadscrumb')
<nav class="bg-grey-light rounded-md w-full">
  <ol class="list-reset container flex px-4 mx-auto flex items-center py-3">
    <li><a href="/blog" class="text-blue-500 hover:text-blue-500">Home</a></li>
    <li><span class="text-gray-500 mx-2">></span></li>
    <li class="text-gray-500">List Blog</li>
  </ol>
</nav>
@endsection
@section('content')
<div class="container mx-auto px-4 flex flex-wrap lg:flex-nowrap">
            
            <!-- Main content -->
                <!-- regular post -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-3 mt-4">
                    @if(count($blog) === 0)
                    <h1>No Data</h1>
                    @else
                	@foreach($blog as $item)
                    <div class="rounded-sm bg-white p-4 pb-5 shadow-sm">
                        <a href="{{'/blog/'.$item->slug}}" class="block rounded-md overflow-hidden">
                            <img src="{{ url('public/img/'.$item->image) }}"
                                class="w-full h-60 object-cover transform hover:scale-110 transition duration-500">
                        </a>
                        <div class="mt-3">
                            <a href="#">
                                <h2
                                    class="block text-xl font-semibold text-gray-700 hover:text-blue-500 transition font-roboto">
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
                    @endif
                    <br>
                </div>
            </div>
             <div class="w-full  rounded-sm p-4  mt-8 container flex px-4 mx-auto flex items-center py-3">
                {{ $blog->links('pagination::tailwind') }}
             </div>
             <div class="w-full bg-white shadow-sm rounded-sm p-4  mt-8 container flex px-4 mx-auto flex items-center py-3">
                    <div class="flex items-center flex-wrap gap-2">
                    	@foreach($tagx as $item)
                        <a href="{{'/blog/tag/'.$item->tags}}"
                            class="px-3 py-1  text-sm border border-gray-200 rounded-sm transition hover:bg-blue-500 hover:text-white">{{$item->tags}}</a>
                            @endforeach
                    </div>
                </div>
@endsection