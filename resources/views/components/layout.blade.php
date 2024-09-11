<!DOCTYPE html>
<html lang="en">
  <head>
    <x-head-content />
  </head>
  <body>
    <x-header />
    
    @if (session()->has('success'))
      <div class="container container--narrow">
        <div class="alert alert-success text-center">{{ session('success') }}</div>
      </div>
    @elseif (session()->has('error'))
      <div class="container container--narrow">
        <div class="alert alert-danger text-center">{{ session('error') }}</div>
      </div>
    @endif
    {{ $slot }}
  
    <!-- footer begins -->
    <x-footer />
    </body>
  </html>