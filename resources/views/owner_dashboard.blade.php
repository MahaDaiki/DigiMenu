<x-app-layout>

    <section class="section section-lg bg-gray-1 text-center">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-9 col-lg-7">
                    <h3>Restaurant Details</h3>
                    @if(session()->has('success'))
                    <div class="bg-green-500 text-white p-4 mb-6">
                        {{ session()->get('success') }}
                    </div>
                @endif

                @if(session()->has('error'))
                    <div class="bg-red-500 text-white p-4 mb-6">
                        {{ session()->get('error') }}
                    </div>
                @endif
                  
                


                    @if (empty($restaurants))
                        
                    
                    <button type="button" class=" btn  btn-primary" style="color:green " data-toggle="modal" data-target="#restaurantModal" >
                    +
                    </button>
                    @else<button type="button" class="btn btn-warning" style="color:rgb(88, 84, 79)" data-toggle="modal" data-target="#modifyRestaurantModal">
                        Modify
                    </button>
                    @endif
                    <button type="button" class="btn btn-danger" style="color:red; border:red">x</button>

                
                    <div class="modal fade" id="restaurantModal" tabindex="-1" role="dialog" aria-labelledby="restaurantModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="restaurantModalLabel">Restaurant Details</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                
                                <form class="rd-form rd-mailform" method="post" action="{{ route('restaurants.store') }}">
                                    <div class="modal-body">
                                        @if(session()->has('success'))
                                        <div class="bg-green-500 text-white p-4 mb-6">
                                            {{ session()->get('success') }}
                                        </div>
                                    @endif
                
                                    @if(session()->has('error'))
                                        <div class="bg-red-500 text-white p-4 mb-6">
                                            {{ session()->get('error') }}
                                        </div>
                                    @endif
                                        
                                            @csrf
                                            <div class="form-wrap">
                                                <input class="form-control" id="restaurant-name" type="text" name="name">
                                                <label class="form-label" for="restaurant-name">Restaurant Name</label>
                                            </div>
                                            <div class="form-wrap">
                                                <input class="form-control" id="restaurant-location" type="text" name="location">
                                                <label class="form-label" for="restaurant-location">Location</label>
                                            </div>
                                            <div class="form-wrap">
                                                <input class="form-control" id="restaurant-open-at" type="time" name="open_at">
                                                <label class="form-label" for="restaurant-open-at">Open At</label>
                                            </div>
                                            <div class="form-wrap">
                                                <input class="form-control" id="restaurant-close-at" type="time" name="close_at">
                                                <label class="form-label" for="restaurant-close-at">Close At</label>
                                            </div>
                                    
                                    </div>
                                    <div class="modal-footer">
                                    
                                        <button type="submit" class="btn btn-primary" style="background:green">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <div class="modal fade" id="modifyRestaurantModal" tabindex="-1" role="dialog" aria-labelledby="modifyRestaurantModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modifyRestaurantModalLabel">Modify Restaurant</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                        <form class="rd-form rd-mailform" method="post" action="{{ route('restaurants.update', ['restaurant' => $restaurants->first()->id]) }}">
                            <div class="modal-body">
                                @csrf
                                @method('PUT')
                                
                                @if ($errors->any())
                                    <div class="bg-red-500 text-white p-4 mb-6">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="form-wrap">
                                    <input class="form-control" id="modify-restaurant-name" type="text" name="name" value="{{ $restaurants->first()->name }}">
                                    <label class="form-label" for="modify-restaurant-name">Restaurant Name</label>
                                </div>
                                <div class="form-wrap">
                                    <input class="form-control" id="modify-restaurant-location" type="text" name="location" value="{{ $restaurants->first()->location }}">
                                    <label class="form-label" for="modify-restaurant-location">Location</label>
                                </div>
                                <div class="form-wrap">
                                    <input class="form-control" id="modify-restaurant-open-at" type="time" name="open_at" value="{{ $restaurants->first()->open_at }}">
                                    <label class="form-label" for="modify-restaurant-open-at">Open At</label>
                                </div>
                                <div class="form-wrap">
                                    <input class="form-control" id="modify-restaurant-close-at" type="time" name="close_at" value="{{ $restaurants->first()->close_at }}">
                                    <label class="form-label" for="modify-restaurant-close-at">Close At</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" style="background: blue">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
  <h1>My Restaurant:</h1>
        <h1>{{ $restaurants->name }}</h1>
        <h2>{{ $restaurants->location }}</h2>
        <h3>Opne at:{{ $restaurants->open_at }},Close at: {{ $restaurants->close_at }}</h3>
    </div>
</div>
</div>

      

        
    </section>
    <section></section>

</x-app-layout>
