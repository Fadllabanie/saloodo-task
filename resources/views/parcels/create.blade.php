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
                        <p tabindex="0" class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800">Tasks</p>
                    </div>
                </div>

                <div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10">
                  
                  <div class="contaner">
                    @if(Session::has('message'))
                    <div class="bg-green-100 rounded-lg py-5 px-6 mb-4 text-base text-green-700 mb-3" role="alert">
                      {{ Session::get('message') }}
                    </div>
                  @endif
                  <div class="block p-6 rounded-lg shadow-lg bg-white max-w-md">
                    <form action="{{route('parcels.store')}}" method="POST">
                      @csrf
                      <div class="grid grid-cols-2 gap-4">
                        <div class="form-group mb-6">
                          <input type="text" name="pick_up"  class="form-control
                            block
                            w-full
                            px-3
                            py-1.5
                            text-base
                            font-normal
                            text-gray-700
                            bg-white bg-clip-padding
                            border border-solid border-gray-300
                            rounded
                            transition
                            ease-in-out
                            m-0
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput123"
                            aria-describedby="emailHelp123" placeholder="Pick Up">
                            @error('pick_up')
                          <div class="text-sm text-red-600">{{$errors->first('pick_up') }}</div>
                          @enderror

                        
                        
                          </div>
                        <div class="form-group mb-6">
                          <input type="text" name="drop_off" class="form-control
                            block
                            w-full
                            px-3
                            py-1.5
                            text-base
                            font-normal
                            text-gray-700
                            bg-white bg-clip-padding
                            border border-solid border-gray-300
                            rounded
                            transition
                            ease-in-out
                            m-0
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput124"
                            aria-describedby="emailHelp124" placeholder="Drop Off">
                          
                            @error('drop_off')
                            <div class="text-sm text-red-600">{{$errors->first('drop_off') }}</div>
                            @enderror

                          
                          </div>
                      </div>
                      <div class="form-group mb-6">
                        <input type="text" name="name" class="form-control block
                          w-full
                          px-3
                          py-1.5
                          text-base
                          font-normal
                          text-gray-700
                          bg-white bg-clip-padding
                          border border-solid border-gray-300
                          rounded
                          transition
                          ease-in-out
                          m-0
                          focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput125"
                          placeholder="Name of Parcel">
                          @error('name')
                          <div class="text-sm text-red-600">{{$errors->first('name') }}</div>
                          @enderror
                         
                      </div>
                      <button type="submit" class="
                        w-full
                        px-6
                        py-2.5
                        bg-blue-600
                        text-white
                        font-medium
                        text-xs
                        leading-tight
                        uppercase
                        rounded
                        shadow-md
                        hover:bg-blue-700 hover:shadow-lg
                        focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
                        active:bg-blue-800 active:shadow-lg
                        transition
                        duration-150
                        ease-in-out">Add</button>
                    </form>
                  </div>
                </div>
                

            </div>
        </div>
    </div>
</x-app-layout>
