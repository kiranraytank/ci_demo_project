<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="<?php echo base_url().'public/css/custom.css'; ?>" >
    <link rel="stylesheet" href="<?php echo base_url('public/css/bootstrap.min.css'); ?>" >
  </head>

  <body>
    <!-- <h1>Hello, world!</h1> -->
  
    <header>
      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
          <a class="navbar-brand" href="<?php echo base_url('home'); ?>">Codeigniter Web application</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
  
          <div class="collapse navbar-collapse right-align" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('home'); ?>">Home </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('/page/about') ?>">About us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('/page/service') ?>">Services</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('blog') ?>">Blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Ctegories</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contacts</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </header>
