<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/gradient.css')); ?>">
    <link rel="icon" type="image/x-icon" href="/images/elaw.png">
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
</head>
<body class="background-radial-gradient ">

    <!-- Section: Design Block -->
<section class="  overflow-hidden ">

  <!-- Navbar -->
  <nav
    class=" bg-white py-2 shadow-sm shadow-neutral-700/10 dark:bg-neutral-800 dark:shadow-black/30  "
    data-te-navbar-ref>
    <!-- Container wrapper -->
    <div class="flex w-full flex-wrap items-start justify-between px-6">
      <div class="flex items-center">
        <!-- Toggle button -->
        <button
          class="block border-0 bg-transparent py-2 pr-2.5 text-neutral-500 hover:no-underline hover:shadow-none focus:no-underline focus:shadow-none focus:outline-none focus:ring-0 dark:text-neutral-200 lg:hidden"
          type="button" data-te-collapse-init data-te-target="#navbarSupportedContentY"
          aria-controls="navbarSupportedContentY" aria-expanded="false" aria-label="Toggle navigation">
          <img src="<?php echo e(URL('images/elaw.png')); ?>" alt="" class="h-10 w-10">
        </button>

        <!-- Navbar Brand -->
        <a class="text-primary dark:text-primary-400" href="#!">
          <span class="[&>svg]:ml-2 [&>svg]:mr-3 [&>svg]:h-6 [&>svg]:w-6 [&>svg]:lg:ml-0">
            <div class="hidden lg:flex">
              <img src="<?php echo e(URL('images/elaw.png')); ?>" alt="" class="h-10 w-10">
           <img src="<?php echo e(URL('images/legalboxteal.png')); ?>" alt="" class="h-8 mt-1">
            </div>
           
          </span>
        </a>
      </div>

      <!-- Collapsible wrapper -->
      <div class="!visible hidden flex-grow basis-[100%] items-center lg:!flex lg:basis-auto"
        id="navbarSupportedContentY" data-te-collapse-item>
        <!-- Left links -->
        <ul class="mr-auto lg:flex lg:flex-row" data-te-navbar-nav-ref>
         
         
        </ul>
        <!-- Left links -->
      </div>
      <!-- Collapsible wrapper -->

      <!-- Right elements -->
      <div class="my-1 flex items-center lg:my-0 lg:ml-auto">
        <a href="<?php echo e(URL('login')); ?>">
          <button type="button" 
          class="mr-2 inline-block rounded px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-primary transition duration-150 ease-in-out hover:bg-neutral-500 hover:bg-opacity-10 hover:text-primary-600 focus:text-primary-600 focus:outline-none focus:ring-0 dark:text-cyan-400 dark:hover:bg-neutral-700 dark:hover:bg-opacity-60 dark:hover:text-primary-500 dark:focus:text-primary-500 dark:active:text-primary-60"
          data-te-ripple-init data-te-ripple-color="light">
          Login
        </button>
        </a>
        
        <button type="button"
          class="inline-block rounded bg-cyan-400 px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg- active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
          data-te-ripple-init data-te-ripple-color="light">
          Sign up 
        </button>
      </div>
      <!-- Right elements -->
    </div>
    <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->

  <!-- Jumbotron -->
  <div class=" text-center md:px-12 lg:py-24 lg:text-left animate-fade-up" id="jumbotron">
    <div class="w-100 mx-auto text-neutral-800 sm:max-w-2xl md:max-w-3xl lg:max-w-5xl xl:max-w-7xl">
      <div class="grid items-center  gap-12 lg:grid-cols-2">
        <div class=" mt-12 lg:mt-0 px-10 lg:px-0" style="z-index: 10">
          <img src="<?php echo e(URL('images/legalboxteal.png')); ?>" alt="" class="h-20 animate-fade-down ">
          <h1
            class="mt-0  mb-12 text-5xl font-bold tracking-tight md:text-6xl xl:text-7xl text-[hsl(218,81%,95%)]">
           
            Your legal case, <br /><span class="text-cyan-400">our expertise</span>
          </h1>
          <p class="opacity-70 text-sky-50">
            Introducing LegalBox, a cutting-edge web application designed for legal professionals seeking unparalleled case and client management. Streamline your legal practice with intuitive features that empower you to effortlessly organize and track legal cases.
          </p>
        
        </div>
        <div class="relative mb-12 lg:mb-0 px-6 lg:px-0">
          <div id="radius-shape-1" class="absolute rounded-full shadow-lg"></div>
          <div id="radius-shape-2" class="absolute shadow-lg"></div>
          <div
            class="relative bg-[hsla(0,0%,100%,0.9)] backdrop-blur-[25px] backdrop-saturate-[200%] block rounded-lg px-6 py-12 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-[hsla(0,0%,15%,0.9)] dark:shadow-black/20 md:px-12 ">
            <h1 class="text-4xl font-bold text-white text-center">Sign Up Now!</h1>
            <div class="hero-content flex-col lg:flex-row text-white">
              
              <img src="<?php echo e(URL('images/recruiter.png')); ?>" class="max-w-sm h-64 " />
              <div class="pr-10">
                
                <p class="py-6">Sign up to manage your legal procedures and clients using LegalBox now. It's free!</p>
                <button class="btn text-white bg-cyan-400">SIGN UP</button>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Jumbotron -->
</section>

<div class="container my-12 mx-auto  mt-0" >
  <!-- Features Block -->
  <section class="mb-32 animate-fade-down" >
    <style>
      
    </style>
    
    <div class=" text-center text-white lg:h-[400px] h-[300px]  ">
      <h2 class="mb-12 text-cyan-400 text-center text-7xl font-bold">Features</h2>
      <div class="hidden md:hidden lg:flex justify-between">
        <img src="<?php echo e(URL('images/flying.png')); ?>" alt="" class="h-64 z-10">
        <img src="<?php echo e(URL('images/flying2.png')); ?>" alt="" class="h-32 lg:h-80 mt-0 md:mt-0  lg:mt-20 z-10 ">
      </div>
  
     
    </div>

    <div class="grid px-6 md:px-12 lg:grid-cols-3 xl:px-32" style="margin-top: -200px">
      <div class="p-0 py-12">
        <div
          class="relative bg-[hsla(0,0%,100%,0.9)] backdrop-blur-[25px] backdrop-saturate-[200%] block rounded-lg px-6 py-12 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-[hsla(0,0%,15%,0.9)] dark:shadow-black/20 md:px-12">
          <div class="block r border-b-2 border-neutral-100 border-opacity-100 p-6 text-center dark:border-opacity-10">
            <p class="mb-4 text-lg text-cyan-400">
                <img src="<?php echo e(URL('images/clientmanagement.png')); ?>" alt="" class="h-20 mx-auto mb-5">
                <strong>Client Management</strong>
              
            </p>
        </div>
          <div class="p-6">
            <ol class="list-inside">
              <li class="mb-4 flex">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                  stroke="currentColor" class="mr-3 h-5 w-5 text-primary dark:text-primary-400">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg>Add Clients
              </li>
              <li class="mb-4 flex">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                  stroke="currentColor" class="mr-3 h-5 w-5 text-primary dark:text-primary-400">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg> Manage Clients
              </li>
              <li class="mb-4 flex">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                  stroke="currentColor" class="mr-3 h-5 w-5 text-primary dark:text-primary-400">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg> Track Client Status
              </li>
               <li class="mb-4 flex">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                  stroke="currentColor" class="mr-3 h-5 w-5 text-primary dark:text-primary-400">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg> Search Clients
              </li>
               
            </ol>
          </div>
        </div>
      </div>

      <div>
        <div
          class="relative bg-[hsla(0,0%,100%,0.9)] backdrop-blur-[25px] backdrop-saturate-[200%] block rounded-lg px-6 py-12 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-[hsla(0,0%,15%,0.9)] dark:shadow-black/20 md:px-12"
          style="z-index: 1">
          <div class="block r border-b-2 border-neutral-100 border-opacity-100 p-6 text-center dark:border-opacity-10">
            <p class="mb-4 text-lg text-cyan-400">
                <img src="<?php echo e(URL('images/LEGALCASE.png')); ?>" alt="" class="h-20 mx-auto mb-5">
                <strong>Legal Case Management</strong>
              
            </p>
        </div>
          <div class="p-6">
            <ol class="list-inside">
              <li class="mb-4 flex">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                  stroke="currentColor" class="mr-3 h-5 w-5 text-primary dark:text-primary-400">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg>Add Legal Cases
              </li>
              <li class="mb-4 flex">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                  stroke="currentColor" class="mr-3 h-5 w-5 text-primary dark:text-primary-400">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg>Edit Legal Cases
              </li>
              <li class="mb-4 flex">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                  stroke="currentColor" class="mr-3 h-5 w-5 text-primary dark:text-primary-400">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg>Track Progress
              </li>
              <li class="mb-4 flex">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                  stroke="currentColor" class="mr-3 h-5 w-5 text-primary dark:text-primary-400">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg>Save Case Information
              </li>
              <li class="mb-4 flex">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                  stroke="currentColor" class="mr-3 h-5 w-5 text-primary dark:text-primary-400">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg> Legal Dashboard
              </li>
              <li class="mb-4 flex">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                  stroke="currentColor" class="mr-3 h-5 w-5 text-primary dark:text-primary-400">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg> Customer Support
          
              </li>
           
            </ol>
          </div>
        </div>
      </div>

      <div class="py-12">
        <div
          class="relative bg-[hsla(0,0%,100%,0.9)] backdrop-blur-[25px] backdrop-saturate-[200%] block rounded-lg px-6 py-12 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-[hsla(0,0%,15%,0.9)] dark:shadow-black/20 md:px-12">
          <div class="block r border-b-2 border-neutral-100 border-opacity-100 p-6 text-center dark:border-opacity-10">
            <p class="mb-4 text-lg text-cyan-400">
                <img src="<?php echo e(URL('images/lawfirm.png')); ?>" alt="" class="h-20 mx-auto mb-5">
                <strong>Law Firm Management</strong>
              
            </p>
        </div>
          <div class="p-6">
            <ol class="list-inside">
              <li class="mb-4 flex">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                  stroke="currentColor" class="mr-3 h-5 w-5 text-primary dark:text-primary-400">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg>Register Law Firm
              </li>
              <li class="mb-4 flex">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                  stroke="currentColor" class="mr-3 h-5 w-5 text-primary dark:text-primary-400">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg>Register Lawyers
              </li>
              <li class="mb-4 flex">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                  stroke="currentColor" class="mr-3 h-5 w-5 text-primary dark:text-primary-400">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg>Manage Lawyers
              </li>
              <li class="mb-4 flex">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                  stroke="currentColor" class="mr-3 h-5 w-5 text-primary dark:text-primary-400">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg>Firm Dashboard
              </li>
             
            </ol>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: Design Block -->
</div>
<!-- Footer -->
<footer class="footer footer-center p-10 bg-base-200 text-base-content rounded ">
  
  <aside>
    <p>Copyright © 2024 - All rights reserved by LegalBox</p>
  </aside>
</footer>
<!-- Section: Design Block -->
    
</body>

</html><?php /**PATH C:\xampp\htdocs\LegalBox\resources\views/home.blade.php ENDPATH**/ ?>