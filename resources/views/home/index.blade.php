<!DOCTYPE html>
<html lang="en">
<head>
	@include('home.css')
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
    
    <!-- Navbar -->
    @include('home.header')

    <!--  About Section  -->
    @include('home.about')

    <!--  gallary Section  -->
    @include('home.gallary')

    <!-- book a table Section  -->
    @include('home.booktable')

    <!-- BLOG Section  -->
    @include('home.blog')
    <!-- REVIEWS Section  -->
    @include('home.review')
    <!-- CONTACT Section  -->
    @include('home.contact')

    <!-- page footer  -->
    @include('home.footer')

</body>
</html>
