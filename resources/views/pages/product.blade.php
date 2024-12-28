@include('sections.head')
<body class="g-sidenav-show  bg-gray-200">


    @include('sections.aside')
    @include('sections.nav')
    {{--  <a href="{{ route('create_product') }}">  --}}
    <a href="{{ route('create_product') }}">

    <button style="margin-left: 1300px;" class="btn btn-primary">Create New Product</button>
    </a>
    <div style="margin-left: 300px">
    @include('sections.products_table')
    </div>
    @include('sections.fixed')
    @include('sections.js')
</body>

</html>
