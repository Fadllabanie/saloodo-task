<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="px-4 md:px-10 py-4 md:py-7">
                    <div class="flex items-center justify-between">
                        <p tabindex="0" class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800">Parcels</p>
                    </div>
                </div>
                @if(Session::has('message_biker'))
                <div class="bg-green-100 rounded-lg py-5 px-6 mb-4 text-base text-green-700 mb-3" role="alert">
                  {{ Session::get('message_biker') }}
                </div>
              @endif
                <div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10">
                    <div class="mt-7 overflow-x-auto">
                      <div class="container mx-auto px-4 sm:px-8">
                        <div class="py-8">
                          <div>
                            <h2 class="text-2xl font-semibold leading-tight">List Parcels</h2>
                          </div>
                          <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                            <div
                              class="inline-block min-w-full shadow-md rounded-lg overflow-hidden"
                            >
                              <table class="min-w-full leading-normal">
                                <thead>
                                  <tr>
                                    <th
                                      class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider"
                                    >
                                      Name
                                    </th>
                                    <th
                                      class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider"
                                    >
                                      Address
                                    </th>
                                   
                                    <th
                                      class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider"
                                    >
                                      Status
                                    </th>  
                                    <th
                                      class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider"
                                    >
                                      Pick Up
                                    </th>
                                    <th
                                      class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider"
                                    >
                                      Dorp Off
                                    </th>
                                    <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider"
                                  >
                                    Since
                                  </th> 
                                    <th
                                      class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100"
                                    ></th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @forelse ($parcels as $parcel)
                                  <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                      <div class="flex">
                                        <div class="flex-shrink-0 w-10 h-10">
                                          {{$loop->iteration}}
                                        </div>
                                        <div class="ml-3">
                                          <p class="text-gray-900 whitespace-no-wrap">
                                            {{$parcel->name}}
                                          </p>
                                          <p class="text-gray-600 whitespace-no-wrap">{{$parcel->uuid}}</p>
                                        </div>
                                      </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                      <ul class="stepper" data-mdb-stepper="stepper" data-mdb-stepper-type="vertical">
                                        <li class="stepper-step stepper-active">
                                          <div class="stepper-head">
                                            <span class="stepper-head-icon"> 1 </span>
                                            <span class="stepper-head-text"> Pick Up </span>
                                          </div>
                                          <div class="stepper-content">
                                            {{$parcel->pick_up}}
                                          </div>
                                        </li>
                                        <li class="stepper-step">
                                          <div class="stepper-head">
                                            <span class="stepper-head-icon"> 2 </span>
                                            <span class="stepper-head-text"> Drop Off </span>
                                          </div>
                                          <div class="stepper-content">
                                           
                                            {{$parcel->drop_off}}                                          
                                          </div>
                                        </li>
                                       
                                      </ul>
                                    </td>
                                   
                                      <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <x-status status="{{$parcel->status}}"></x-status>
                                      </td>
                                      
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                      @if ($parcel->status->value == 1)
                                      <form action="{{route('pick_up.parcel',$parcel->id)}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="inline-block px-6 py-2.5 bg-green-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-600 hover:shadow-lg focus:bg-green-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-700 active:shadow-lg transition duration-150 ease-in-out">Pick-Up</button>

                                      </form>
                                      @else
                                      Picked up
                                      @endif
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                      @if ($parcel->status->value == 2)

                                      <form action="{{route('drop_off.parcel',$parcel->id)}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out">Drop Off</button>
                                      </form>
                                      @elseif($parcel->status->value ==  1 )
                                      Not Picked up Yat 
                                      @elseif($parcel->status->value ==  3 )
                                      Picked up
                                      @endif

                                    </td> 
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                      <p class="text-gray-900 whitespace-no-wrap">  {{$parcel->created_at->diffforhumans()}}</p>
                                    </td> 
                                  </tr>
                                  @empty
                                           No Data 
                                        @endforelse 
                                </tbody>
                               
                              </table>
                              <nav aria-label="Page navigation example">
                                {{$parcels->links()}}
                                </nav>
                            </div>
                          </div>
                        </div>
                      </div></div>
                    </div>
                </div>
                

            </div>
        </div>
    </div>
</x-app-layout>
