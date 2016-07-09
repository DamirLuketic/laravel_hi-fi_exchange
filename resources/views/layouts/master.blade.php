<!DOCTYPE html>
<html lang="en">

<head>

@include('layouts.master.header')

</head>

<body id="admin-page">

<div id="wrapper">
    
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

        @include('layouts.master.menu')

        @include('layouts.master.sidebar')

                    <!-- /.navbar-static-side -->
    </nav>


</div>

<!-- Page Content -->

@include('layouts.master.content')

<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

@include('layouts.master.footer')

</body>

</html>
