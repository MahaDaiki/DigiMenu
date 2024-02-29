<x-app-layout>
    <section class="section section-lg bg-gray-1 text-center">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-9 col-lg-7 card p-4">
                    <h3 class="h1">Restaurant Details</h3>
    
                    @if(session()->has('success'))
                        <div class="alert alert-success mt-4">
                            {{ session()->get('success') }}
                        </div>
                    @endif
    
                    @if(session()->has('error'))
                        <div class="alert alert-danger mt-4">
                            {{ session()->get('error') }}
                        </div>
                    @endif
    <div class="d-flex mx-auto">
                    @if (empty($restaurants))
                        <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#restaurantModal">
                            +
                        </button>
                    @else
                        <button type="button" class="btn btn-warning mt-3" style="color: white; background-color: rgb(70, 79, 81); border: red;" data-toggle="modal" data-target="#modifyRestaurantModal">
                            Modify
                        </button>
                    @endif
                    <form action="{{ route('restaurants.destroy', ['id' => $restaurants->id]) }}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger mt-3" onclick="return confirm('Are you sure you want to delete this restaurant?');" style="color: white; background-color: red; border: red;">
                          X
                        </button>
                    </form></div>
    
                    <h1 class="h2 mt-4">My Restaurant:</h1>
                    <div class="d-flex mx-auto" style="font-size:30px">
                    <i class="fas fa-utensils"></i><h1 class="ml-2 fs-3" >{{ $restaurants->name }}</h1></div>
                   <div class="d-flex mx-auto " style="font-size:20px"> <i class="fas fa-map-marker-alt"></i><h2 class="ml-2">{{ $restaurants->location }}</h2></div>
                   <div class="d-flex mx-auto " style="font-size:20px"> <i class="fa-solid fa-clock"></i><h2 class="ml-2">Open at: {{ $restaurants->open_at }}, Close at: {{ $restaurants->close_at }}</h3></div>
                </div>
            </div>
        </div>
    </section>
    
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
                        <form class="rd-form rd-mailform" method="post" action="{{ route('restaurants.update', ['id' => $restaurants->id]) }}">
                            <div class="modal-body">
                                @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
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
  
    </div>
</div>
</div>

      

        
    </section>
    <section></section>

</x-app-layout>
