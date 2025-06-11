<div class="modal fade" id="serviceModal" tabindex="-1" aria-labelledby="serviceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="serviceModalLabel">Van Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Dynamic content loaded via JavaScript -->
                <div class="row">
                    <!-- Left Column: Service Image -->
                    <div class="col-md-6 d-flex align-items-center justify-content-center">
                        <img src="" alt="Service Image" id="modalServiceImage" class="img-fluid mb-3">
                    </div>

                    <!-- Right Column: Service Details -->
                    <div class="col-6 mt-lg-5">
                        <p id="modalServiceTitle">Van Title1</p>
                        <hr>
                        <ul style="list-style: none; padding-left: 0;">
                            <li id="modalServicePrice" class="text-success fw-bold">Price</li>
                            <hr>
                            <!-- New Status display -->
                            <li id="modalServiceStatus"></li>
                        </ul>
                    </div>

                    <div class="col-12">

                        <ul style="list-style: none; padding-left: 0;">

                            <li id="modalServiceDescription">Description</li>
                            <hr>
                            <br>
                            <li id="modalServiceInclusion"><strong>Inclusion:</strong></li>
                            <br>
                            <hr>
                            <li id="modalServiceExclusion"><strong>Exclusion:</strong></li>
                        </ul>
                    </div

                        </div>

                    <hr>

                    <!-- Booking Calendar Section -->

                </div>
                <div class="modal-footer">
                    <!-- You can add dynamic Edit/Delete links here if needed -->
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Booking Modal -->
    <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bookingModalLabel">Book Your Service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="booking-calendar mt-4">
                        <h5 style="font-weight: bold;">Book Your Service</h5>
                        <hr>
                        <form id="bookingForm">
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="bookingStart" Aclass="form-label">Start Date & Time</label>
                                        <input type="datetime-local" class="form-control" id="bookingStart" name="bookingStart">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="bookingEnd" class="form-label">End Date & Time</label>
                                        <input type="datetime-local" class="form-control" id="bookingEnd" name="bookingEnd">
                                    </div>
                                </div>
                            </div>

                            <h5 style="font-weight: bold;">Choose Your Pick up & Drop off Location</h5>
                            <hr>
                            <div class="row">
                                <!-- Pick Up Location -->
                                <div class="col-6">
                                    <div class="mb-3 position-relative">
                                        <label class="form-label">
                                            <i class="fa-solid fa-location-dot"></i> Pick Up Location
                                        </label>
                                        <input type="text" class="form-control" id="pickupLocation" name="pickupLocation" placeholder="Block, Lot, Phase, Subdivision Barangay, Municipality/City or Province" data-bs-toggle="tooltip" title="This is Autocomplete Address, but at times, it may be inaccurate as many places are not widely recognized.">
                                        <!-- Suggestion list container -->
                                        <ul id="pickup-suggestions" class="suggestions-list list-unstyled"></ul>
                                        <br>
                                    </div>
                                </div>
                                <!-- Drop Off Location -->
                                <div class="col-6">
                                    <div class="mb-3 position-relative">
                                        <label class="form-label">
                                            <i class="fa-solid fa-location-dot"></i> Drop Off Location
                                        </label>
                                        <input type="text" class="form-control" id="dropoffLocation" name="dropoffLocation" placeholder="Block, Lot, Phase, Subdivision Barangay, Municipality/City or Province" data-bs-toggle="tooltip" title="This is Autocomplete Address, but at times, it may be inaccurate as many places are not widely recognized.">
                                        <!-- Suggestion list container -->
                                        <ul id="dropoff-suggestions" class="suggestions-list list-unstyled"></ul>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>