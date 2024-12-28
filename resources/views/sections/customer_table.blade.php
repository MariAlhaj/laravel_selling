<style>
  td,th{
    border: 2px solid black;
    height: 100px;
    text-align: center;
  }
</style>


      @if (count($customer)>= 1)
      <table style="border-color: black !important; border: 2px solid black;margin-right: 30px ;width: 95%;">

        <tr>

          <th scope="col">Customer Name</th>
          <th scope="col">Address</th>
          <th scope="col">Phone</th>
          <th scope="col">email</th>
          <th scope="col">Count of Orders</th>
        </tr>
        @foreach ($customer as $c )
        <tr >



            <td>{{ $c->name }}</td>

            <td>{{ $c->address }}</td>
            <td>{{ $c->phone }}</td>

            <td>{{ $c->email }}</td>
            <td>{{ $c->orders->count() }}</td>


          </tr>
        @endforeach
      </table>

      @else
      <h3>NO Prodcts in your Store</h3>
      @endif





