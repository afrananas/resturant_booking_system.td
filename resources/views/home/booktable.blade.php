<div class="container-fluid has-bg-overlay text-center text-light has-height-lg middle-items" id="book-table">
    <div class="">
        <h2 class="section-title mb-5">BOOK A TABLE</h2>
<form action="{{ url('book_table') }}" method="POST">
    @csrf
    <div class="row mb-3">
        <!-- Phone Number -->
        <div class="col-12 col-sm-6 col-md-3 my-2">
            <label for="phone" class="form-label visually-hidden">Phone Number</label>
            <input type="tel" id="phone" name="phone" 
                   class="form-control form-control-lg custom-form-control"
                   placeholder="Phone Number" required
                   >
        </div>

        <!-- Number of Guests -->
        <div class="col-12 col-sm-6 col-md-3 my-2">
            <label for="guests" class="form-label visually-hidden">Number of Guests</label>
            <input type="number" id="guests" name="n_guests" 
                   class="form-control form-control-lg custom-form-control"
                   placeholder="Number of Guests" min="1" max="20" required>
        </div>

        <!-- Time -->
        <div class="col-12 col-sm-6 col-md-3 my-2">
            <label for="time" class="form-label visually-hidden">Time</label>
            <input type="time" id="time" name="time" placeholder="Time"
                   class="form-control form-control-lg custom-form-control"
                   required>
        </div>

        <!-- Date -->
        <div class="col-12 col-sm-6 col-md-3 my-2">
            <label for="date" class="form-label visually-hidden">Date</label>
            <input type="date" id="date" name="date" placeholder="Date"
                   class="form-control form-control-lg custom-form-control"
                   required>
        </div>
    </div>

    <!-- Submit Button -->
    <div class="text-center mt-4">
        <button type="submit" class="btn btn-lg btn-primary rounded-btn">
            Book Table
        </button>
    </div>
</form>
    </div>
</div>