
      <section class="page-wrapper">
        <div class="contact-section">
          <div class="container">
            <div class="row">
              <!-- Contact Form -->
              <div class="contact-form col-md-8 " >
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
                  
                  <div id="mail-success" class="success">
                    Thank you. The Mailman is on His Way :)
                  </div>
                  
                  <div id="mail-fail" class="error">
                    Sorry, don't know what happened. Try later :(
                  </div>
                  
                  <div id="cf-submit">
                    <input type="submit" id="contact-submit" class="btn btn-transparent" value="Submit">
                  </div>						
                  
                </form>
              </div>
              <!-- ./End Contact Form -->
                      
            
            </div> <!-- end row -->
          </div> <!-- end container -->
        </div>
      </section>