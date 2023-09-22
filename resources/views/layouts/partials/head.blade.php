<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
    <title>Taxi Booking System</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- include common vendor stylesheets & fontawesome -->
    <link rel="stylesheet" type="text/css" href="{{asset('backend2')}}/vendors/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{asset('backend2')}}/vendors/@fortawesome/fontawesome-free/css/fontawesome.css">
    <link rel="stylesheet" type="text/css" href="{{asset('backend2')}}/vendors/@fortawesome/fontawesome-free/css/regular.css">
    <link rel="stylesheet" type="text/css" href="{{asset('backend2')}}/vendors/@fortawesome/fontawesome-free/css/brands.css">
    <link rel="stylesheet" type="text/css" href="{{asset('backend2')}}/vendors/@fortawesome/fontawesome-free/css/solid.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hanuman:wght@100;300;400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('assets/bootstrap-icon/bootstrap-icons-9f7ec267.css')}}">
    @stack('vendor-styles')
    <!-- include fonts -->
    <link rel="stylesheet" type="text/css" href="{{asset('backend2')}}/dist/css/ace-font.css">
    <!-- ace.css -->
    <link rel="stylesheet" type="text/css" href="{{asset('backend2')}}/dist/css/ace.css">
    <!-- favicon -->
    <link rel="icon" type="image/png" href="{{asset('backend2')}}/assets/favicon.png" />
    <!-- "Calendar" page styles, specific to this page for demo only -->
    <style>
      body{
        font-family: 'Hanuman', 'Roboto' !important;
      }
      .navbar-inner{
        /* background: linear-gradient(6deg, rgba(255,0,0,1) 0%, rgba(117,143,145,1) 54%, rgba(255,214,0,1) 100%) !important; */
      }
      .navbar-intro{
        /* background: linear-gradient(6deg, rgba(255,0,0,1) 0%, rgba(117,143,145,1) 54%, rgba(255,214,0,1) 100%) !important; */
      }
    </style>
    @stack('page-styles')
  </head>
