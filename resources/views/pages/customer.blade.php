@include('sections.head')
<body class="g-sidenav-show  bg-gray-200">


    @include('sections.aside')
    @include('sections.nav')
    <div style="margin-left: 300px">
    @include('sections.customer_table')
    </div>
    @include('sections.fixed')
    @include('sections.js')
</body>

</html>
