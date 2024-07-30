



  <section class="page-header">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="content">
            <h1 class="page-name">Dashboard</h1>
            <ol class="breadcrumb">
              <li><a href="index.html">Home</a></li>
              <li class="active">my account</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  
  <section class="user-dashboard page-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ul class="list-inline dashboard-menu text-center">
            <li><a class="active" href="#">Profile</a></li>
           
          </ul>
          <div class="dashboard-wrapper user-dashboard">
            <div class="media">
             
              <div class="media-body">
                <h2 class="media-heading">Welcome {{ auth()->user()->name }}</h2>
             
              </div>
            </div>
            <div class="total-order mt-20">
              <h4>Address : {{ auth()->user()->address }}</h4>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Order ID</th>
                      <th>Date</th>
                      <th>Items</th>
                      <th>Total Price</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if (empty($order))
                        <tr>
                            <td colspan="8">No Order History</td>
                        </tr>
                        @else
                        @foreach ($order as $index => $item)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ $item->created_at->format('Y-m-d') }}</td>
                            <td>{{ $item->price }} Tk</td>

                            <td>{{ $item->status }}</td>
                            
                            
                        </tr>
                        @endforeach
                        @endif
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>