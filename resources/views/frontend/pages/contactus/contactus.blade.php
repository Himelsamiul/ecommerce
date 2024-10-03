

@extends('frontend.master')

  @section('content')

  <section class="page-wrapper">
    <div class="contact-section">
      <div class="container">
        <div class="row">
          <!-- Contact Form -->
          <div class="contact-form col-md-8">
            <form action="{{route('contact.form.store')}}" method="POST">
              @csrf
  
              <div class="form-group">
                <input type="text" placeholder="Your Name" class="form-control" name="name" id="name">
              </div>
  
              <div class="form-group">
                <input type="email" placeholder="Your Email" class="form-control" name="email" id="email">
              </div>
  
              <div class="form-group">
                <textarea rows="6" placeholder="Message" class="form-control" name="message" id="message"></textarea>
              </div>
  
              <div id="cf-submit">
                <input type="submit" id="contact-submit" class="btn btn-transparent" value="Submit">
              </div>
            </form>
          </div>
          <!-- ./End Contact Form -->
  
          <!-- Additional Information -->
          <div class="additional-info col-md-4">
            <h2>Contact Us</h2>
            <p>You can reach us through the contact form or by using the following information:</p><br>
            <ul>
              <li><strong>Address:</strong> IUBAT, Sector 10</li><br>
              <li><strong>Phone:</strong> 0177333333</li><br>
              <li><strong>Email:</strong> iubat@gmail.com</li><br>
            </ul>
           
           
          </div>
          <!-- ./End Additional Information -->
        </div> <!-- end row -->
      </div> <!-- end container -->
    </div>
  </section>
  


@endsection
