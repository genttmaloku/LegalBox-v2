<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lawyer Dashboard</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/gradient.css')); ?>">
    <link rel="icon" type="image/x-icon" href="/images/elaw.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
     <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
     <!-- Edit Modal -->




          <input type="checkbox" id="my_modal_edit" class="modal-toggle" />
          <div class="modal" role="dialog">
            <div class="modal-box">
              <h2 class="mb-4 text-4xl font-extrabold text-gray-900 text-white md:text-4xl lg:text-4xl"><span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">Edit Profile</span></h2>
              <form action="" method="POST" class="grid grid-cols-1 gap-4">
                <div class="mb-4">
                    <label for="title" class="text-blue-300">Name</label>
                    <br>
                    <input type="text" id="name" name="title" value=""
                        class="input input-bordered border-cyan-400 w-full max-w-xs mt-1" />
                </div>
                <div class="mb-6">
                    <label for="name" class="text-blue-300">Surname</label>
                    <br>
                    <input type="text" id="surname" name="surname" value=""
                        class="input input-bordered border-cyan-400 w-full max-w-xs mt-1" />
                </div>
                <div class="mb-6">
                    <label for="surname" class="text-blue-300">Username</label>
                    <br>
                    <input type="text" id="username" name="surname" value=""
                        class="input input-bordered border-cyan-400 w-full max-w-xs mt-1" />
                </div>
                <div class="mb-6">
                    <label for="task_description" class="text-blue-300">Location</label>
                    <br>
                    <input type="text" id="location" name="location" value=""
                        class="align-center input input-bordered border-cyan-400 w-full max-w-xs mt-1" />
                </div>
          
               <div class="mb-6">
                    <label for="task_description" class="text-blue-300">Password</label>
                    <br>
                    <input type="text" id="password" name="password" value=""
                        class="align-center input input-bordered border-cyan-400 w-full max-w-xs mt-1" />
                </div>
          
                <div class="flex items-center justify-between ">
                    <button class="btn bg-cyan-400 hover:bg-blue-400 text-black duration-300 shadow-md" type="submit">Save
                    </button>
                    <div class="modal-action">
                      <label for="my_modal_edit" class="btn mb-4 text-error">Close</label>
                    </div>
                </div>
            </form>
              
            </div>
          </div>
            
            

  
     <!-- EditModal -->
     
     <!-- Sign Out Modal -->

            <input type="checkbox" id="my_modal_signout" class="modal-toggle" />
          <div class="modal" role="dialog">
            <div class="modal-box">
              <h3 class="font-bold text-lg text-error">Warning!</h3>
              <p class="py-4">Are you sure you want to Sign Out?</p>
              <div class="modal-action">
                <button class="btn text-error" id="logoutButton" method="POST" >Sign Out</button>
                <label for="my_modal_signout" class="btn">Close</label>
                
              </div>
            </div>
          </div>
     <!-- Sign Out Modal -->
</head>
<body class>

    <!-- component -->

    

<div class="md:flex flex-col md:flex-row md:min-h-screen w-full">
  <div @click.away="open = false" class="flex flex-col  rounded-r-sm  lg:rounded-r-lg w-full md:w-64 text-gray-700 bg-neutral-900 flex-shrink-0" x-data="{ open: false }">
    <div class="flex-shrink-0 px-8 py-4  flex flex-row items-center justify-between lg:justify-center">
      <a href="#" class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline"><img src="<?php echo e(URL('images/elaw.png')); ?>" alt="" class="h-10"></a>
    <a href="#" class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline"><img src="<?php echo e(URL('images/legalboxteal.png')); ?>" alt="" class="h-10"></a>
    <button class="rounded-lg md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
      <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6 text-cyan-400">
        <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
        <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
      </svg>
    </button>
  </div>
  <nav :class="{'block': open, 'hidden': !open}" class=" flex-grow md:block px-4 pb-4 md:pb-0 md:overflow-y-auto">
    <div>
    <a class="block px-4 py-2 mt-2 text-sm font-semibold text-white bg-neutral transition ease-in-out duration-400 rounded-lg hover:text-cyan-400 focus:text-cyan-600 focus:outline-none focus:shadow-outline hover:shadow-lg" href="#"><i class="fas fa-home mr-2 "></i>Home</a>
    
    <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-400 hover:bg-cyan-400 hover:text-neutral hover:shadow-lg transition ease-in-out duration-400 rounded-lg focus:outline-none focus:shadow-outline focus:bg-cyan-500" href="<?php echo e(URL('cases')); ?>"><i class="fas fa-file-contract mr-2"></i> Legal Cases</a>
    <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-400 bg-transparent   hover:bg-cyan-400 hover:shadow-lg transition ease-in-out duration-400 hover:text-neutral rounded-lg focus:outline-none focus:shadow-outline focus:bg-cyan-500" href="<?php echo e(URL('clients')); ?>"><i class="fas fa-user mr-2"></i>Clients</a>
    <label for="my_modal_signout" class="hover:cursor-pointer block px-4 py-2 mt-2 text-sm font-semibold text-white bg-error bg-opacity-30 transition ease-in-out duration-400 rounded-lg hover:text-error focus:text-neutral-900 focus:outline-none focus:shadow-outline hover:shadow-lg" href="#"><i class="fas fa-right-from-bracket mr-1"></i> Sign Out</label>
   
  </nav>
</div>

    <!-- DASHBOARD -->
<div class=" bg-grey-800 flex flex-col min-h-screen w-full">
    <div>
        

    <div class="flex-grow container mx-auto sm:px-4 pt-6 pb-8 p-4">
        <h1 class="text-3xl ml-2 py-5 font-bold">Welcome back, <span class="text-cyan-400">User</span>!</h1>
      <div class="background-radial-gradient border-cyan-800  rounded-lg shadow mb-6">
        <div class="px-6">
          <div class="flex justify-between -mb-px">
            <div class="lg:hidden text-blue-dark py-4 text-lg font-bold">
             Number of Clients
            </div>
            <div class="hidden lg:flex">
        
            </div>
            
          </div>
        </div>
        <div class="flex items-center px-6 lg:hidden">
          <div class="flex-grow flex-no-shrink py-6">
            <div class="text-cyan-400 mb-2">
              
              <span class="text-5xl text-cyan-400">34</span>
            
            </div>
            <div class="text-green-light text-sm">
              
            </div>
          </div>
          <div class="flex-shrink w-32 inline-block relative">
        <a href="<?php echo e(URL('clients')); ?>"><button class="btn btn-md ml-12 bg-neutral-800 border-none text-cyan-400 hover:bg-neutral-700"> See All</button></a>
          </div>
        </div>
        <div class="hidden lg:flex">
          <div class="w-1/3 text-center py-8">
            <div class="border-r">
              <div class="text-grey-darker mb-2">
                
                <span class="text-5xl font-bold text-cyan-400">34</span>
                
              </div>
              <div class="text-sm uppercase text-grey tracking-wide">
                Number of Clients
              </div>
            </div>
          </div>
          <div class="w-1/3 text-center py-8">
            <div class="border-r">
              <div class="text-grey-darker mb-2">

                <span class="text-5xl font-bold text-cyan-400">12</span>
             
              </div>
              <div class="text-sm uppercase text-grey tracking-wide">
                Number of cases
              </div>
            </div>
          </div>
          <div class="w-1/3 text-center py-8">
            <div>
              <div class="text-grey-darker mb-2">
                <button class="btn  btn-lg bg-neutral-800 border-none text-cyan-400 shadow-lg mt-1 ">See All</button>
              </div>
              <div class="text-sm uppercase text-grey tracking-wide">
            
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="flex flex-wrap -mx-4">
        <div class="w-full mb-6 lg:mb-0 lg:w-1/2 px-4 flex flex-col">
          <div class="flex-grow flex flex-col bg-neutral-900  rounded-xl shadow overflow-hidden">
            <div class="border-b-2 border-cyan-400">
              <div class="flex justify-between px-6 -mb-px">
                <h3 class="text-cyan-400 font-bold py-4  text-lg">Latest Clients</h3>
                
              </div>
            </div>
            <!-- CLIENT CELL !-->
            <div class="flex-grow flex px-6  text-grey-darker items-center border-b  -mx-4">
              <div class="w-28 ml-4 px-4 flex items-center ">
                
                <div class="rounded-full inline-flex mr-3 ">
                   
                </div>
                <span class="text-lg  text-cyan-400 font-semibold">Name </span>
              </div>
              <div class="hidden md:flex lg:hidden xl:flex w-1/4 px-4 items-center text-cyan-400 font-semibold">
                <div class="bg-orange h-2 rounded-full flex-grow mr-2"></div>
                Surname
              </div>
              <div class="flex w-3/5 md:w/12">
                <div class="w-1/2 px-4">
                  <div class="text-center text-cyan-400 font-semibold">
                    City
                  </div>
                </div>
                <div class="w-1/2 px-4">
                  <div class="text-center text-cyan-400 text-grey font-semibold">
                    ID
                  </div>
                </div>
              </div>
            </div>
                <!-- CLIENT CELL !-->

            <div class="flex-grow flex px-6 py-6 text-grey-darker items-center border-b border-1  -mx-4">
                <div class="w-28 px-4 mr-4 flex items-center ">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z" stroke="#00f7ff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M12 14C8.13401 14 5 17.134 5 21H19C19 17.134 15.866 14 12 14Z" stroke="#00f7ff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                    <div class="rounded-full bg-orange inline-flex mr-3">
                       
                    </div>
                    <span class="">Filan </span>
                  </div>
              <div class="hidden md:flex lg:hidden xl:flex w-1/4 px-4 items-center">
                <div class="bg-grey h-2 w-2 rounded-full mr-2"></div>
                Fisteku
              </div>
              <div class="flex w-3/5 md:w/12">
                <div class="w-1/2 px-4">
                  <div class="text-center">
                    Prizren
                  </div>
                </div>
                <div class="w-1/2 px-4">
                  <div class="text-center text-grey">
                    123456
                  </div>
                </div>
              </div>
            </div>
            
            <div class="flex-grow flex px-6 py-6 text-grey-darker items-center border-b -mx-4">
                <div class="w-28 px-4 mr-4 flex items-center ">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z" stroke="#00f7ff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M12 14C8.13401 14 5 17.134 5 21H19C19 17.134 15.866 14 12 14Z" stroke="#00f7ff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                    <div class="rounded-full bg-orange inline-flex mr-3">
                       
                    </div>
                    <span class="">Filan </span>
                  </div>
              <div class="hidden md:flex lg:hidden xl:flex w-1/4 px-4 items-center">
                <div class="bg-grey h-2 w-2 rounded-full mr-2"></div>
                Fisteku
              </div>
              <div class="flex w-3/5 md:w/12">
                <div class="w-1/2 px-4">
                  <div class="text-center">
                    Prizren
                  </div>
                </div>
                <div class="w-1/2 px-4">
                  <div class="text-center text-grey">
                    123456
                  </div>
                </div>
              </div>
            </div>
            <div class="px-6 py-4">
              <div class="text-center text-grey">
               
              </div>
            </div>
          </div>
        </div>
        <div class="w-full lg:w-1/2 px-4">
          <div class="bg-neutral-900   rounded-lg shadow">
            <div class="border-b">
              <div class="flex justify-between px-6 -mb-px">
                <h3 class="text-cyan-400 py-4 font-bold text-lg">My Account</h3>
              </div>
            </div>
            <div>
              <div class="text-center px-6 py-4">
                <div class="py-8">
                  <div class="mb-4 text-center justify-center flex">
                    <img src="<?php echo e(URL('images/pic.png')); ?>" class="h-20" alt="">
                  </div>
                  <p class="text-2xl text-cyan-400 font-bold mb-2">Filan Fisteku</p>
                  <div class="flex justify-center ">
                    <svg class="h-4 mt-2"  fill="#00a3a9" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke="#00a3a9"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M12,1a11,11,0,0,0,0,22,1,1,0,0,0,0-2,9,9,0,1,1,9-9v2.857a1.857,1.857,0,0,1-3.714,0V7.714a1,1,0,1,0-2,0v.179A5.234,5.234,0,0,0,12,6.714a5.286,5.286,0,1,0,3.465,9.245A3.847,3.847,0,0,0,23,14.857V12A11.013,11.013,0,0,0,12,1Zm0,14.286A3.286,3.286,0,1,1,15.286,12,3.29,3.29,0,0,1,12,15.286Z"></path></g></svg>
                    <h1 class="m-1">filanfisteku</h1>
                    
                    

                  </div>

                  <div class="flex justify-center">
                    <svg class="h-4 mt-2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#00a3a9"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12 21C15.5 17.4 19 14.1764 19 10.2C19 6.22355 15.866 3 12 3C8.13401 3 5 6.22355 5 10.2C5 14.1764 8.5 17.4 12 21Z" stroke="#00a3a9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M12 12C13.1046 12 14 11.1046 14 10C14 8.89543 13.1046 8 12 8C10.8954 8 10 8.89543 10 10C10 11.1046 10.8954 12 12 12Z" stroke="#00a3a9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                    <h1 class="m-1">Prizren</h1>
                    
                    

                  </div>
     
                  <div>
                    <label for="my_modal_edit" class="btn btn-md bg-neutral-800 hover:shadow-lg border-none text-cyan-400">Edit Profile</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </div>
</div>

<!-- component -->

    
</body>

<script>
  // Assuming you have a logout button with id 'logoutButton'
document.getElementById('logoutButton').addEventListener('click', function (e) {
    e.preventDefault();

    // Send logout request to the Laravel backend
    fetch("<?php echo e(route('lawyer.logout')); ?>", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "<?php echo e(csrf_token()); ?>"
        },
    })
    .then(response => {
        // Assuming the logout endpoint returns a 204 No Content status on success
       
            // Logout successful, redirect to the home page
            window.location.href = "<?php echo e(route('home')); ?>";
       
    })
    .catch(error => {
        console.error(error);
        // Handle logout error
    });
});
</script>
</html><?php /**PATH C:\xampp\htdocs\LegalBox\resources\views/lawyerdash.blade.php ENDPATH**/ ?>