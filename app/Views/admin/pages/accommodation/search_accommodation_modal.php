<div class="modal fade" id="seeMoreModal" tabindex="-1" aria-labelledby="seeMoreModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="seeMoreModalLabel">Hotel Details</h5>
                        <!-- Note: For Bootstrap 5 use btn-close -->
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">&times</button>
                    </div>
                    <div class="modal-body">
                        <!-- Hotel Information Section -->
                        <div class="row">
                            <div class="col-12 pl-2 pr-2">
                                <div class="card">
                                    <div class="card-body">
                                        <h2 style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;" class="text-center">
                                            <i class="fas fa-hotel"></i> Hotel Information
                                        </h2>
                                        <div class="row">
                                            <div class="col-6">
                                                <br>
                                                <label for="email">Email:</label>
                                                <span class="modal-email"></span>
                                                <br>
                                                <label for="contact">Contact:</label>
                                                <span class="modal-contact"></span>
                                                <br>
                                                <label for="fb">Facebook:</label>
                                                <a href="#" target="_blank" class="modal-fb"></a>
                                                <br>
                                                <label for="hotel_name">Hotel Name:</label>
                                                <span class="modal-hotel_name"></span>
                                                <br>
                                                <label for="distance_from">Distance From:</label>
                                                <span class="modal-distance_from"></span>
                                                <br>
                                                <label for="distance_location">Season Type:</label>
                                                <span class="modal-season_type"></span>
                                                <br>
                                                <label for="season_date">Season Date:</label>
                                                <span class="modal-season_date"></span>
                                            </div>
                                            <div class="col-6 mt-4">
                                                <label for="per_head">Per Head:</label>
                                                <span class="modal-per_head text-success"></span>
                                                <br>
                                                <label for="total_rate">Total Rate:</label>
                                                <span class="modal-total_rate text-primary"></span>
                                                <br>
                                                <label for="capacity">Capacity:</label>
                                                <span class="modal-capacity"></span>
                                                <br>
                                                <label for="star_rating">Star Rating:</label>
                                                <span class="modal-star_rating text-warning"></span>
                                                <br>
                                                <label for="distance_location">Distance Location:</label>
                                                <span class="modal-distance_location"></span>

                                                <br>
                                                <label for="can_accommodate">Can Accommodate w/o extra bed:</label>
                                                <span class="modal-can_accommodate"></span>
                                                <br>
                                                <label for="can_accommodate">Area:</label>
                                                <span class="modal-can_accommodate"></span>
                                            </div>

                                            <div class="col-12">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Amenities Section -->
                        <div class="row">
                            <div class="col-12 pl-2 pr-2">
                                <div class="card">
                                    <div class="card-body">
                                        <h2 style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;" class="text-center">
                                            <i class="fas fa-concierge-bell"></i> Amenities
                                        </h2>
                                        <div class="row">
                                            <div class="col-6">
                                                <br>
                                                <label for="pet_friendly">Pet Friendly:</label>
                                                <span class="modal-petfriendly"></span>
                                                <br>
                                                <label for="breakfast">With Breakfast:</label>
                                                <span class="modal-breakfast"></span>
                                                <br>
                                                <label for="pool">With Pool:</label>
                                                <span class="modal-pool"></span>
                                            </div>
                                            <div class="col-6 mt-4">
                                                <label for="elevator">With Elevator:</label>
                                                <span class="modal-elevator"></span>
                                                <br>
                                                <label for="function_hall">With Function Hall:</label>
                                                <span class="modal-functionhall"></span>
                                                (<small> Can Accommodate </small>)
                                                <br>
                                                <label for="beachfront">Beach Front:</label>
                                                <span class="modal-beachfront"></span>

                                            </div>
                                            <div class="col-12">
                                                <hr>
                                            </div>
                                            <div class="col-6 mt-2">
                                                <label for="remarks">Remarks:</label>
                                                <span class="modal-remarks"></span>
                                            </div>
                                            <div class="col-6 mt-2">
                                                <label for="updated_by">Updated By:</label>
                                                <span class="modal-updatedby"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Pin Location Section -->
                        <div class="row">
                            <div class="col-12 pl-2 pr-2">
                                <div class="card">
                                    <div class="card-body">
                                        <h2 style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;" class="text-center">
                                            <i class="fas fa-map-marker-alt"></i> Pin Location
                                        </h2>
                                        <div class="row">
                                            <div class="col-12">
                                                <p>
                                                    <strong>Location:</strong>
                                                    <a href="#" target="_blank" class="modal-pinlocation"></a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Hotel Description Accordion -->
                        <div class="custom-accordion">
                            <div class="accordion-item">
                                <div class="accordion-header">
                                    Hotel Description
                                    <i class="fas fa-angle-down"></i>
                                </div>
                                <div class="accordion-body">
                                    <span class="modal-description"></span>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>