<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if (auth()->user()->type == App\Enums\UserType::Biker() )
            
       
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container mx-auto pr-4 flex justify-between">
                <div class="row">

                    <div class="w-72 bg-white max-w-xs mx-auto rounded-sm overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100 cursor-pointer">
                        <div class="h-20 bg-blue-500 flex items-center justify-between">
                            <p class="mr-0 text-white text-lg pl-5">New Parcels</p>
                        </div>
                        <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-gray-600">
                            <p>TOTAL</p>
                        </div>
                        <p class="py-4 text-3xl ml-5">{{App\Models\Parcel::where('status',1)->count()}}</p>
      <!-- <hr > -->
    </div>
</div><div class="row">

                    <div class="w-72 bg-white max-w-xs mx-auto rounded-sm overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100 cursor-pointer">
                        <div class="h-20 bg-blue-500 flex items-center justify-between">
                            <p class="mr-0 text-white text-lg pl-5">My Active Parcels</p>
                        </div>
                        <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-gray-600">
                            <p>TOTAL</p>
                        </div>
                        <p class="py-4 text-3xl ml-5">{{App\Models\Parcel::where('biker_id',auth()->user()->id)->count()}}</p>
      <!-- <hr > -->
    </div>
</div><div class="row">

                    <div class="w-72 bg-white max-w-xs mx-auto rounded-sm overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100 cursor-pointer">
                        <div class="h-20 bg-blue-500 flex items-center justify-between">
                            <p class="mr-0 text-white text-lg pl-5">My Finished Parcels</p>
                        </div>
                        <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-gray-600">
                            <p>TOTAL</p>
                        </div>
                        <p class="py-4 text-3xl ml-5">{{App\Models\Parcel::where('biker_id',auth()->user()->id)->finished()->count()}}</p>
      <!-- <hr > -->
    </div>
</div>
</div>
@else
<div class="container mx-auto pr-4 flex justify-between">
<div class="row">

    <div class="w-72 bg-white max-w-xs mx-auto rounded-sm overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100 cursor-pointer">
        <div class="h-20 bg-blue-500 flex items-center justify-between">
            <p class="mr-0 text-white text-lg pl-5">My Finished Parcels</p>
        </div>
        <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-gray-600">
            <p>TOTAL</p>
        </div>
        <p class="py-4 text-3xl ml-5">{{App\Models\Parcel::where('sender_id',auth()->user()->id)->finished()->count()}}</p>
<!-- <hr > -->
</div>
</div>
<div class="row">

    <div class="w-72 bg-white max-w-xs mx-auto rounded-sm overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100 cursor-pointer">
        <div class="h-20 bg-blue-500 flex items-center justify-between">
            <p class="mr-0 text-white text-lg pl-5">My New Parcels</p>
        </div>
        <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-gray-600">
            <p>TOTAL</p>
        </div>
        <p class="py-4 text-3xl ml-5">{{App\Models\Parcel::where('sender_id',auth()->user()->id)->new()->count()}}</p>
<!-- <hr > -->
</div>
</div>
<div class="row">

    <div class="w-72 bg-white max-w-xs mx-auto rounded-sm overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100 cursor-pointer">
        <div class="h-20 bg-blue-500 flex items-center justify-between">
            <p class="mr-0 text-white text-lg pl-5">My Processing Parcels</p>
        </div>
        <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-gray-600">
            <p>TOTAL</p>
        </div>
        <p class="py-4 text-3xl ml-5">{{App\Models\Parcel::where('sender_id',auth()->user()->id)->Processing()->count()}}</p>
<!-- <hr > -->
</div>
</div>
</div>
@endif
</div>
    </div>
</x-app-layout>
