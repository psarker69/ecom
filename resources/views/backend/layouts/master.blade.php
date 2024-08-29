
<!DOCTYPE html>
<html lang="en" data-footer="true" data-override='{"attributes": {"placement": "vertical", "layout": "boxed" }, "storagePrefix": "ecommerce-platform"}'>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Laravel @yield('title')</title>
    <meta name="description" content="Ecommerce Dashboard" />

    @include('backend.layouts.inc.style')

  </head>

  <body>
    <div id="root">
      <div id="nav" class="nav-container d-flex">
        <div class="nav-content d-flex">

            @include('backend.layouts.inc.logo')
            @include('backend.layouts.inc.user-menu')
            @include('backend.layouts.inc.menu')

        </div>
        <div class="nav-shadow"></div>
      </div>

      <main>
        <div class="container">
            @yield('admin_content')
        </div>
      </main>

        @include('backend.layouts.inc.footer')

    </div>

    @include('backend.layouts.inc.script')

</body>
</html>
