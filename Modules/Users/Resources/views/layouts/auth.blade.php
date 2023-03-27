<!DOCTYPE html>
<html lang="en">
<head>
   
    <title></title>
    @include('includes.head')
</head>
<body>
    <section class="myaccount-section">
        <div class="auto-container">
            <div class="row clearfix">
                <!-- Login And Register -->
                 @yield('authentication')
            </div>
        </div>
    </section>
</body>
</html>