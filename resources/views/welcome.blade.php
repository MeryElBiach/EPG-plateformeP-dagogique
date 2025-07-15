<!DOCTYPE html>
<html lang="en">
  <head>
    @include('home.partials.head')
  </head>
  <body>
    <!---start header---->
         @include('home.partials.header')
    <!---start main---->
    <main>
    @include('home.sections.home')
    @include('home.sections.features')
    @include('home.sections.categories')
    @include('home.sections.courses')
    @include('home.sections.mentors')
    @include('home.sections.newsletter')
    </main>

    <!---start footer---->
     @include('home.partials.footer')
    <script src="script.js"></script>
  </body>
</html>
