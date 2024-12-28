<style>
  td,th{
    border: 2px solid black;
    height: 100px;
    text-align: center;
  }
</style>


      @if (count($products)>= 1)

      <table style="border-color: black !important; border: 2px solid black;margin-right: 30px ;width: 95%;">

        <tr>
          <th style="width: 150px" scope="col">Product Name</th>
          <th scope="col">Product Price</th>
          <th scope="col">Description</th>
          <th scope="col">Image</th>
          <th scope="col">Category</th>
          <th scope="col">Actions</th>
        </tr>

        @foreach ($products as $p )
        <tr >

            <td> {{ $p->name }}</td>

            <td>{{ $p->price }}</td>

            <td>{{ $p->desc }}</td>

            <td><img width="100px" height="100px" src="{{ $p->image }}"></td>

            <td>{{ $p->category->name }}</td>

            <td>
                {{--    --}}
              <form action="{{ route('delete_product', $p->id)   }}" method="post">

              @csrf
              <input type="submit" value="Delete" style="width: 100%" class="btn btn-primary">
             </form>
              <br>
              {{--    --}}
              <form action="{{ route('edit_product', $p->id)   }}" method="get">

              @csrf
              <input type="submit" value="Edit" style="width: 100%" class="btn btn-outline-success">
             </form>
           </td>

          </tr>
        @endforeach
      </table>

      @else
      <h3>NO Prodcts in your Store</h3>
      @endif





