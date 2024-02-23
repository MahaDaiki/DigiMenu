<x-app-layout>

    <section class="section section-lg bg-gray-1 text-center">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-9 col-lg-7">
                    <h3>Restaurant Details</h3>

                    <!-- Button to trigger the modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#restaurantModal">
                        Open Form
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="restaurantModal" tabindex="-1" role="dialog" aria-labelledby="restaurantModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="restaurantModalLabel">Restaurant Details</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Form goes here -->
                                    <form class="rd-form rd-mailform" method="post" action="">
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
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-app-layout>
