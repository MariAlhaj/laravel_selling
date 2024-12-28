<!DOCTYPE html>
<html>
  <head>
    <title>Product Page</title>
    <style>
      /* Add some basic styles */
      body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
      }
      .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
      }
      form {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
      }
      input[type="text"], input[type="email"], select, textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-bottom: 16px;
      }
      input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }
      input[type="submit"]:hover {
        background-color: #45a049;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <h1>Create New Category</h1>
      <form enctype="multipart/form-data" action="{{ route('store_catrgory') }}" method="POST">
        @csrf
        <input type="text" id="name" name="name" placeholder="Category Name" required>

        <input  style="width: 100%;font-size: 30px" type="submit" value="Create">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
      </form>
    </div>
  </body>
</html>
