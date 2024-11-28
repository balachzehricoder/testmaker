<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;900&family=Ysabeau+Infant:wght@100;900&display=swap" rel="stylesheet">

    <!-- GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.0/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.0/ScrollTrigger.min.js"></script>
    <script src="assets/js/gsap.js"></script>

    <!-- PLUGIN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Custom CSS -->
    <style>
        .navbar {
            transition: all 0.3s ease;
        }

        .navbar.transparent {
            background-color: transparent;
        }

        .navbar.white {
            background-color: white;
        }

        h1 {
            color: black;
        }

        span {
            color: red;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <header class="text-gray-600 body-font sticky-header navbar transparent" id="navbar">
        <div class="container mx-auto flex flex-wrap p-5 items-center justify-between">
            <a class="flex title-font font-medium items-center text-gray-900">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                </svg>
                <span class="ml-3 text-xl">Tailblocks</span>
            </a>

            <!-- Hamburger Icon -->
            <button id="nav-toggle" class="inline-flex items-center md:hidden bg-gray-100 border-0 py-2 px-3 hover:bg-gray-200 rounded">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                    <path d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>

            <!-- Navbar Links -->
            <nav id="mobile-nav-menu"  class="hidden md:flex md:flex-row flex-col md:ml-auto items-center text-base">
                <a href="index.html" class="block md:inline-block mr-5 hover:text-gray-900 py-2">Home</a>
                <a href="freetrial.html" class="block md:inline-block mr-5 hover:text-gray-900 py-2">Free Trial</a>
                <a href="reviews.html" class="block md:inline-block mr-5 hover:text-gray-900 py-2">Testimonials</a>
                <a href="pricing.html" class="block md:inline-block mr-5 hover:text-gray-900 py-2">Pricing</a>
                <a href="registration.html" class="block md:inline-block mr-5 hover:text-gray-900 py-2">Registration</a>
            </nav>

            <!-- CTA Button -->
            <button class="hidden md:inline-flex items-center bg-red-600 text-white border-0 py-1 px-3 hover:bg-red-700 rounded text-base">
                Login
            </button>
        </div>
    </header>

    <!-- Slider -->
    <section class="slider">
        <ul>
            <li>
                <article class="center-y padding_2x">
                    <h3 class="big title"><span>Create Custom</span> Tests Effortlessly</h3>
                    <p>With Our Comprehensive Test Making Platform</p>
                    <a href="#about" class="btn btn_3">More about us</a>
                </article>
            </li>
            <li>
                <article class="center-y padding_2x">
                    <h3 class="big title"><span>Enhance Learning</span> with Tailored Quizzes</h3>
                    <p>Personalized tests for educators and institutions.</p>
                </article>
            </li>
        </ul>
    </section>
    <aside>
                <a href="#"></a>
                <a href="#"></a>
                <a href="#"></a>
            </aside>

    <!-- JS -->
    <script>
        // Handle scroll effect
        window.onscroll = function () {
            const navbar = document.getElementById("navbar");
            if (document.documentElement.scrollTop > 50) {
                navbar.classList.add("white");
                navbar.classList.remove("transparent");
            } else {
                navbar.classList.add("transparent");
                navbar.classList.remove("white");
            }
        };

        // Toggle Mobile Menu
        document.getElementById('nav-toggle').addEventListener('click', function () {
            const navMenu = document.getElementById('mobile-nav-menu');
            navMenu.classList.toggle('hidden');
        });
    </script>


  <!-- navbar and slider end -->


  


  <section>
    <br><br><br>
    <div class="flex flex-col text-center w-full mb-20">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900" id="section-title">Why Choose <span>us</span></h1>
    </div>
  
    <section class="text-gray-600 body-font">
      <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
        <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
          <img class="object-cover object-center rounded" alt="hero" src="assets/images/pexels-lilartsy-1925536.jpg" id="section-image">
        </div>
        <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
          <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900" id="section-heading">Create customized tests effortlessly for <br class="hidden lg:inline-block">your school with our easy-to-use platform before it's gone!</h1>
          <p class="mb-8 leading-relaxed" style="color: black;" id="section-paragraph">Choose us for seamless test creation with intuitive tools, customizable options, and secure assessments. Our platform ensures a smooth experience for schools, offering reliable, efficient solutions tailored to your needs.</p>
        </div>
      </div>
    </section>
  </section>


<br><br>

<div class="flex flex-col text-center w-full mb-20">
  <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">How to <span>use</span>
  </h1>
</div>

<section class="text-gray-400 bg-gray-900 body-font">
  <div class="container px-5 py-24 mx-auto flex flex-wrap">
      <div class="flex flex-wrap w-full">
          <div class="lg:w-2/5 md:w-1/2 md:pr-10 md:py-6">
              <div class="flex relative pb-12" id="step-1">
                  <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                      <div class="h-full w-1 bg-gray-800 pointer-events-none"></div>
                  </div>
                  <div class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10">
                      <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                          <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                      </svg>
                  </div>
                  <div class="flex-grow pl-4">
                      <h2 class="font-medium title-font text-sm text-white mb-1 tracking-wider">STEP 1</h2>
                      <p class="leading-relaxed">VHS cornhole pop-up, try-hard 8-bit iceland helvetica. Kinfolk bespoke try-hard cliche palo santo offal.</p>
                  </div>
              </div>
              <div class="flex relative pb-12" id="step-2">
                  <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                      <div class="h-full w-1 bg-gray-800 pointer-events-none"></div>
                  </div>
                  <div class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10">
                      <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                          <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                      </svg>
                  </div>
                  <div class="flex-grow pl-4">
                      <h2 class="font-medium title-font text-sm text-white mb-1 tracking-wider">STEP 2</h2>
                      <p class="leading-relaxed">Vice migas literally kitsch +1 pok pok. Truffaut hot chicken slow-carb health goth, vape typewriter.</p>
                  </div>
              </div>
              <div class="flex relative pb-12" id="step-3">
                  <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                      <div class="h-full w-1 bg-gray-800 pointer-events-none"></div>
                  </div>
                  <div class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10">
                      <circle cx="12" cy="5" r="3"></circle>
                      <path d="M12 22V8M5 12H2a10 10 0 0020 0h-3"></path>
                  </svg>
                  </div>
                  <div class="flex-grow pl-4">
                      <h2 class="font-medium title-font text-sm text-white mb-1 tracking-wider">STEP 3</h2>
                      <p class="leading-relaxed">Coloring book nar whal glossier master cleanse umami. Salvia +1 master cleanse blog taiyaki.</p>
                  </div>
              </div>
              <div class="flex relative pb-12" id="step-4">
                  <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                      <div class="h-full w-1 bg-gray-800 pointer-events-none"></div>
                  </div>
                  <div class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10">
                      <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                          <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                          <circle cx="12" cy="7" r="4"></circle>
                      </svg>
                  </div>
                  <div class="flex-grow pl-4">
                      <h2 class="font-medium title-font text-sm text-white mb-1 tracking-wider">STEP 4</h2>
                      <p class="leading-relaxed">VHS cornhole pop-up, try-hard 8-bit iceland helvetica. Kinfolk bespoke try-hard cliche palo santo offal.</p>
                  </div>
              </div>
              <div class="flex relative" id="finish">
                  <div class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10">
                      <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                          <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                          <path d="M22 4L12 14.01l-3-3"></path>
                      </svg>
                  </div>
                  <div class="flex-grow pl-4">
                      <h2 class="font-medium title-font text-sm text-white mb-1 tracking-wider">FINISH</h2>
                      <p class="leading-relaxed">Pitchfork ugh tattooed scenester echo park gastropub whatever cold-pressed retro.</p>
                  </div>
              </div>
          </div>
          <img class="lg:w-3/5 md:w-1/2 object-cover object-center rounded-lg md:mt-0 mt-12" src="assets/images/pexels-cottonbro-4778424.jpg" alt="step">
      </div>
  </div>
</section>

  



 
  <br><br>
  <section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
      <div class="flex flex-col text-center w-full mb-20">
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Our Impact <span>in Numbers</span>
        </h1>
       
      </div>
      <div class="flex flex-wrap -m-4 text-center">
        <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
          <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="text-indigo-500 w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
              <path d="M8 17l4 4 4-4m-4-5v9"></path>
              <path d="M20.88 18.09A5 5 0 0018 9h-1.26A8 8 0 103 16.29"></path>
            </svg>
            <h2 class="title-font font-medium text-3xl text-gray-900">2.7K</h2>
            <p class="leading-relaxed">Downloads</p>
          </div>
        </div>
        <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
          <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="text-indigo-500 w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
              <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"></path>
              <circle cx="9" cy="7" r="4"></circle>
              <path d="M23 21v-2a4 4 0 00-3-3.87m-4-12a4 4 0 010 7.75"></path>
            </svg>
            <h2 class="title-font font-medium text-3xl text-gray-900">1.3K</h2>
            <p class="leading-relaxed">Users</p>
          </div>
        </div>
        <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
          <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="text-indigo-500 w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
              <path d="M3 18v-6a9 9 0 0118 0v6"></path>
              <path d="M21 19a2 2 0 01-2 2h-1a2 2 0 01-2-2v-3a2 2 0 012-2h3zM3 19a2 2 0 002 2h1a2 2 0 002-2v-3a2 2 0 00-2-2H3z"></path>
            </svg>
            <h2 class="title-font font-medium text-3xl text-gray-900">74</h2>
            <p class="leading-relaxed">Files</p>
          </div>
        </div>
        <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
          <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="text-indigo-500 w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
              <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
            </svg>
            <h2 class="title-font font-medium text-3xl text-gray-900">46</h2>
            <p class="leading-relaxed">Places</p>
          </div>
        </div>
      </div>
    </div>
  </section>






<br><br>
<?php 
include "footer.html"

?>