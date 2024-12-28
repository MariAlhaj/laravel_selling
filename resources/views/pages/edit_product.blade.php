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
      <h1>Edit Your Product</h1>
      <form enctype="multipart/form-data" action="{{ route('update_product') }}" method="POST">
        @csrf
        <input type="hidden"  value="{{ $product->id }}" name="id" placeholder="Product Name">
        <h3>Product Name</h3>
        <input type="text" id="name" value="{{ $product->name }}" name="name" placeholder="Product Name" required>


        <h4>Product Price</h4>
        <input style="width: 100%;height :50px " type="number" id="email" name="price" value="{{ $product->price }}" placeholder="Product Price" required>
        <br>



        <h4 style="margin-right: 800px">Description</h4>

        <textarea style="margin-top: 25px" id="message" name="desc" placeholder="Description">{{ $product->desc }}</textarea>
        <br>


        <h4>الرجاء اعادة تحديد الصورة والصنف </h4>
        <br>

        <input style="margin-top: 25px" type="file" id="email" name="image" placeholder="Image for Product" required>

        <select style="margin-top: 25px"  id="size"  name="category_id" required>


            <option selected value="{{ $product->category->id }}">{{ $product->category->name}}</option>

            @foreach ($category as $c )

            <option value="{{ $c->id }}">{{ $c->name }}</option>

            @endforeach


          </select>
        <input  style="width: 100%;font-size: 30px" type="submit" value="Update">
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
