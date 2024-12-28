<style>
  td,th{
    border: 2px solid black;
    height: 100px;
    text-align: center;
  }
</style>


      @if (count($categories)>= 1)
      <table style="border-color: black !important; border: 2px solid black;margin-right: 30px ;width: 95%;">

        <tr>
          <th scope="col">name</th>
          <th scope="col">Count Products</th>
          <th scope="col">Actions</th>
        </tr>
        @foreach ($categories as $c )
        <tr >

            <td> {{ $c->name }}</td>

            <td>{{ $c->products->count() }}</td>

            <td>
              <form action="{{ route('delete_category', $c->id)   }}" method="get">

              @csrf
              <input type="submit" value="Delete" style="width: 100%" class="btn btn-primary">
             </form>

           </td>

          </tr>
        @endforeach
      </table>

      @else
      <h3>NO categories in your Store</h3>
      @endif





