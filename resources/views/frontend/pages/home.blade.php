  @extends('frontend.master')

  @section('content')
      @include('frontend.components.hero')

      <!DOCTYPE html>
      <html lang="en">

      <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Category Layout</title>
          <style>
              * {
                  margin: 0;
                  padding: 0;
                  box-sizing: border-box;
              }

              body {
                  font-family: Arial, sans-serif;
                  background-color: #f8f8f8;
              }

              .container {
                  max-width: 1200px;
                  margin: 0 auto;
                  padding: 20px;
              }

              .title {
                  text-align: center;
                  margin-bottom: 40px;
              }

              .categories {
                  display: grid;
                  grid-template-columns: repeat(4, 1fr);
                  gap: 20px;
              }

              .category-item {
                  background-color: white;
                  border: 1px solid #ddd;
                  border-radius: 8px;
                  overflow: hidden;
                  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                  text-align: center;
                  padding: 20px;
                  transition: transform 0.3s ease-in-out;
              }

              .category-item:hover {
                  transform: translateY(-10px);
              }

              .category-item img {
                  width: 100%;
                  height: auto;
                  border-bottom: 1px solid #ddd;
              }

              .category-item h3 {
                  margin: 15px 0;
                  font-size: 20px;
              }

              .category-item p {
                  font-size: 16px;
                  color: #666;
              }

              .category-item a {
                  display: inline-block;
                  margin-top: 10px;
                  padding: 10px 15px;
                  background-color: #0e1a27;
                  color: white;
                  text-decoration: none;
                  border-radius: 5px;
                  transition: background-color 0.3s ease;
              }

              .category-item a:hover {
                  background-color: #6d2248;
              }

              @media screen and (max-width: 992px) {
                  .categories {
                      grid-template-columns: repeat(2, 1fr);
                  }
              }

              @media screen and (max-width: 600px) {
                  .categories {
                      grid-template-columns: 1fr;
                  }
              }
          </style>
      </head>

      <body>
          <div class="container">
              <div class="title">
                  <h2>Shop by Category</h2>
              </div>
              <div class="categories">
                  @foreach ($categories as $item)
                      <div class="category-item">

                          <li><a href="{{ url('/category', $item->id) }}">
                                  <h3>{{ $item->type }} </h3>
                              </a></li>



                      </div>
                  @endforeach

              </div>
          </div>
      </body>

      </html>

      @include('frontend.components.product')
  @endsection
