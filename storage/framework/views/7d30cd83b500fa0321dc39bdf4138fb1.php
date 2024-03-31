<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Client List</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/gradient.css')); ?>">
    <link rel="icon" type="image/x-icon" href="/images/elaw.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
     <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
     <script>
      const accessToken = localStorage.getItem('access_token');

if (!accessToken) {
    window.location.href = "<?php echo e(route('login')); ?>";
}
     </script>

     <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

 <!-- View Modal -->
      <input type="checkbox" id="my_modal_view_<?php echo e($client->id); ?>" class="modal-toggle" />
      <div class="modal" role="dialog">
        <div class="modal-box w-11/12 max-w-5xl">
          <div class="hero justify-start">
            <div class="hero-content flex-col  lg:flex-row">
              <img src="<?php echo e(URL('images/pic.png')); ?>" class="max-w-sm h-64 hidden lg:block" />
              <div>
                <h1 class="text-md font-semibold text-gray-500 ml-1 "><?php echo e($client->caseid); ?></h1>
                <h1 class="text-5xl text-cyan-400 font-bold"><?php echo e($client->name); ?></h1>
                <div class="flex align-center ml-1">
                  <i class="fas fa-briefcase text-white text-sm mt-1 mr-1"></i>
                  <h1 class="text-xl font-semibold text-gray-500 ml-1 "> <?php echo e($client->job); ?></h1>
                </div> 
                <p class="py-6"><?php echo e($client->description); ?></p>
              </div>
            </div>
          </div>
          <div class="modal-action">
            <label for="my_modal_view_<?php echo e($client->id); ?>" class="btn text-error">Close</label>
          </div>
        </div>
      </div>
   <!-- View Modal -->

        <!-- Edit Modal -->
          <input type="checkbox" id="my_modal_edit_<?php echo e($client->id); ?>" class="modal-toggle" />
          <div class="modal" role="dialog">
            <div class="modal-box">
              <h2 class="mb-4 text-4xl font-extrabold text-gray-900 text-white md:text-4xl lg:text-4xl"><span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">Edit Client Info</span></h2>
              <form action="<?php echo e(route('clients.update', $client->id)); ?>" method="POST" class="grid grid-cols-1 gap-4">
                <?php echo csrf_field(); ?>  
                <?php echo method_field('PUT'); ?>
                <div class="mb-6">
                    <label for="name" class="text-blue-300">Client Name</label>
                    <br>
                    <input type="text" id="name" name="name" value="<?php echo e(old('name', $client->name)); ?>"
                        class="input input-bordered border-cyan-400 w-full max-w-xs mt-1" />
                </div>
              
                <div class="mb-6">
                    <label for="caseid" class="text-blue-300">Client ID</label>
                    <br>
                    <input type="text" id="caseid" name="caseid" value="<?php echo e(old('caseid', $client->caseid)); ?>"
                        class="align-center input input-bordered border-cyan-400 w-full max-w-xs mt-1" />
                </div>
                <div class="mb-6">
                  <label for="job" class="text-blue-300">Job</label>
                  <br>
                  <input type="text" id="job" name="job" value="<?php echo e(old('job', $client->job)); ?>"
                      class="align-center input input-bordered border-cyan-400 w-full max-w-xs mt-1" />
              </div>
              <div class="mb-6">
                <label for="description"  class="text-blue-300">Charge Description</label>
                <br>
                <textarea id="description" name="description" class="align-start justify-start input input-bordered border-cyan-400 w-full max-w-xs mt-1">
                  <?php echo e(old('description', $client->description)); ?>

              </textarea>
            </div>
                <div class="flex items-center justify-between ">
                    <button class="btn bg-cyan-400 hover:bg-blue-400 text-black duration-300 shadow-md" type="submit">Save
                    </button>
                    <div class="modal-action">
                      <label for="my_modal_edit_<?php echo e($client->id); ?>" class="btn mb-4 text-error">Close</label>
                    </div>
                </div>
            </form>
            </div>
          </div>
     <!-- EditModal -->


    <!-- Delete Modal -->
          <input type="checkbox" id="my_modal_delete_<?php echo e($client->id); ?>" class="modal-toggle" />
          <div class="modal" role="dialog">
            <div class="modal-box">
              <h3 class="font-bold text-lg text-error">Warning!</h3>
              <p class="py-4">Deleted cases cannot be returned.</p>
              <div class="modal-action">
                <form method="POST" action="<?php echo e(route('clients.delete', $client->id)); ?>">
                  <?php echo csrf_field(); ?>
                  <?php echo method_field('DELETE'); ?>
                <button class="btn text-error" type="submit">Delete</button>
                </form>
                <label for="my_modal_delete_<?php echo e($client->id); ?>" class="btn">Close</label>
              </div>
            </div>
          </div>
     <!-- Delete Modal -->
    
      <!-- Add Modal -->
      <input type="checkbox" id="my_modal_add" class="modal-toggle" />
      <div class="modal" role="dialog">
        <div class="modal-box">
          <h2 class="mb-4 text-4xl font-extrabold text-gray-900 text-white md:text-4xl lg:text-4xl"><span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">Add a Client</span></h2>
          <form action="<?php echo e(route('clients.store')); ?>" id="addClientForm" method="POST" class="grid grid-cols-1 gap-4">
            <?php echo csrf_field(); ?>
            <div class="mb-6">
                <label for="name" class="text-blue-300">Client Name</label>
                <br>
                <input type="text" id="name" name="name" value=""
                    class="input input-bordered border-cyan-400 w-full max-w-xs mt-1" />
            </div>
            <div class="mb-6">
                <label for="caseid" class="text-blue-300">Client ID</label>
                <br>
                <input type="text" id="caseid" name="caseid" value=""
                    class="align-center input input-bordered border-cyan-400 w-full max-w-xs mt-1" />
            </div>
            <div class="mb-6">
              <label for="job" class="text-blue-300">Job</label>
              <br>
              <input type="text" id="job" name="job" value=""
                  class="align-center input input-bordered border-cyan-400 w-full max-w-xs mt-1" />
          </div>
          <div class="mb-6">
            <label for="description"  class="text-blue-300">Description</label>
            <br>
            <textarea type="pargraph" id="description" name="description" value=""
                class="align-start justify-start input input-bordered border-cyan-400 w-full max-w-xs mt-1">
          </textarea>
        </div>
            <div class="flex items-center justify-between ">
              
                <button class="btn bg-cyan-400 hover:bg-blue-400 text-black duration-300 shadow-md" onclick="submitForm()">
                  <i class="fas fa-user-plus"></i>Add Client
                </button>
                <div class="modal-action">
                  <label for="my_modal_add" class="btn mb-4 text-error">Close</label>
                </div>
            </div>
        </form>
        </div>
      </div>
  <!-- Add Modal -->

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

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
    <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-400 bg-transparent   hover:bg-cyan-400 hover:shadow-lg transition ease-in-out duration-400 hover:text-neutral rounded-lg focus:outline-none focus:shadow-outline focus:bg-cyan-500" href="<?php echo e(URL('dashboard')); ?>"><i class="fas fa-home mr-2"></i>Home</a>
    <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-400 hover:bg-cyan-400 hover:text-neutral hover:shadow-lg transition ease-in-out duration-400 rounded-lg focus:outline-none focus:shadow-outline focus:bg-cyan-500" href="<?php echo e(URL('cases')); ?>"><i class="fas fa-file-contract mr-2"></i> Legal Cases</a>
    <a class="block px-4 py-2 mt-2 text-sm font-semibold text-white bg-neutral transition ease-in-out duration-400 rounded-lg hover:text-cyan-400 focus:text-cyan-600 focus:outline-none focus:shadow-outline hover:shadow-lg" href="<?php echo e(URL('clients')); ?>"><i class="fas fa-user mr-2 "></i>Clients</a>
    <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-400 bg-transparent   hover:bg-cyan-400 hover:shadow-lg transition ease-in-out duration-400 hover:text-neutral rounded-lg focus:outline-none focus:shadow-outline focus:bg-cyan-500" href="<?php echo e(URL('meetings')); ?>"><i class="fas fa-handshake mr-2"></i>Scheduled Meetings</a>
    <label for="my_modal_signout" class="hover:cursor-pointer block px-4 py-2 mt-2 text-sm font-semibold text-white bg-error bg-opacity-30 transition ease-in-out duration-400 rounded-lg hover:text-error focus:text-neutral-900 focus:outline-none focus:shadow-outline hover:shadow-lg" href="#"><i class="fas fa-right-from-bracket mr-1"></i> Sign Out</label>
  </nav>
</div>
  <!-- component -->

    <!-- CLIENTS TABLE -->
    

    <!-- component -->
    <section class="container mx-auto p-6 ">
      <div class="bg-neutral-900 rounded-lg border-none   mb-4 shadow-md">
        <form action="<?php echo e(route('clients.search')); ?>" method="GET">
          <?php echo csrf_field(); ?>
          <div class="flex items-center">
            <i class="px-3 fas fa-search ml-1"></i>
          <input type="text" name="search" id="search" placeholder="Search by keyword..." class="ml-3  focus:outline-none w-full bg-neutral-900  opacity-30">
        <button type="submit" action="" class="btn m-2 text-cyan-400 hover:shadow-md ">Search</button>
      </form>
    </div>
  </div>
        <div class="mb-2 flex justify-start items-center">
        <label for="my_modal_add" class="btn bg-neutral-900 rounded-lg"><svg viewBox="0 0 24 24"class="h-5" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M20 18L17 18M17 18L14 18M17 18V15M17 18V21M11 21H4C4 17.134 7.13401 14 11 14C11.695 14 12.3663 14.1013 13 14.2899M15 7C15 9.20914 13.2091 11 11 11C8.79086 11 7 9.20914 7 7C7 4.79086 8.79086 3 11 3C13.2091 3 15 4.79086 15 7Z" stroke="#00f7ff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <span class="text-cyan-400"> Add Client</span></label>
    </div>
       <?php if( count($clients) > 0): ?>
        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
          <div class="w-full overflow-x-auto">
            <table class="w-full">
              <thead class="bg-neutral-900">
                <tr class="text-md font-semibold bg-neutral-900  text-cyan-400 tracking-wide text-left s bg-gray-100 uppercase  border-gray-600">
                  <th class="px-4 py-3">Name</th>
                  <th class="px-4 py-3">ID</th>
                  <th class="px-4 py-3">Job</th>
                  <th colspan="3"></th>
                </tr>
              </thead>
              <tbody class="bg-neutral-800">
            



<?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <!-- TABLE CELL !-->
                <tr class="text-gray-700 border-b-2 border-cyan-600 border-opacity-25">
                    <td class="px-4 py-3 border-r-1">
                      <div class="flex items-center text-sm">
                        <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                          <img class="object-cover  rounded-full" src="<?php echo e(URL('images/pic.png')); ?>" alt="" loading="lazy" />
                          <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                        </div>
                        <div>
                          <p class="font-semibold text-gray-300"><?php echo e($client->name); ?></p>
                          <p class="text-xs text-gray-500">Client</p>
                        </div>
                      </div>
                    </td>
                    <td class="px-4 py-3 text-ms text-gray-300 font-semibold "><?php echo e($client->caseid); ?></td>
                    <td class="px-4 py-3 text-xs ">
                      <p class="py-1 font-bold    text-gray-300  "> <?php echo e($client->job); ?></p>
                    </td>
                    <td class=" py-3 text-sm "><label for="my_modal_view_<?php echo e($client->id); ?>" class="btn btn-sm rounded-full mr-2"><svg viewBox="0 0 24 24" class="h-5" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9ZM11 12C11 11.4477 11.4477 11 12 11C12.5523 11 13 11.4477 13 12C13 12.5523 12.5523 13 12 13C11.4477 13 11 12.5523 11 12Z" fill="#00ff40"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M21.83 11.2807C19.542 7.15186 15.8122 5 12 5C8.18777 5 4.45796 7.15186 2.17003 11.2807C1.94637 11.6844 1.94361 12.1821 2.16029 12.5876C4.41183 16.8013 8.1628 19 12 19C15.8372 19 19.5882 16.8013 21.8397 12.5876C22.0564 12.1821 22.0536 11.6844 21.83 11.2807ZM12 17C9.06097 17 6.04052 15.3724 4.09173 11.9487C6.06862 8.59614 9.07319 7 12 7C14.9268 7 17.9314 8.59614 19.9083 11.9487C17.9595 15.3724 14.939 17 12 17Z" fill="#00ff40"></path> </g></svg></label></td>
                    <td class=" py-3 text-sm "><label for="my_modal_edit_<?php echo e($client->id); ?>" class="mr-2 btn btn-sm rounded-full rounded-full"><svg viewBox="0 0 24 24" fill="none" class="h-5" xmlns="http://www.w3.org/2000/svg" stroke="#ffc800"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z" stroke="#ffc800" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13" stroke="#ffc800" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg></label></td>
                    <td class=" py-3 text-sm "><label for="my_modal_delete_<?php echo e($client->id); ?>" class="btn btn-sm rounded-full"><svg viewBox="0 0 24 24" class="h-5" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M10 12V17" stroke="#ff0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M14 12V17" stroke="#ff0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M4 7H20" stroke="#ff0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M6 10V18C6 19.6569 7.34315 21 9 21H15C16.6569 21 18 19.6569 18 18V10" stroke="#ff0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="#ff0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg></label></td>
                  </tr>
                    <!-- TABLE CELL !-->
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php else: ?>
<div class="flex mt-10 items-center justify-center p-5 w-full bg-gray-850 ">
  <div class="text-center">
    <div class="inline-flex rounded-full bg-neutral-900 p-4">
      <div class="rounded-full stroke-gray-900 bg-cyan-400 opacity-15 p-4">
        <svg class="w-16 h-16"   viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6 8H6.01M6 16H6.01M6 12H18C20.2091 12 22 10.2091 22 8C22 5.79086 20.2091 4 18 4H6C3.79086 4 2 5.79086 2 8C2 10.2091 3.79086 12 6 12ZM6 12C3.79086 12 2 13.7909 2 16C2 18.2091 3.79086 20 6 20H14" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path><path d="M17 16L22 21M22 16L17 21" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
      </div>
    </div>
    <h1 class="mt-5 text-[36px] font-bold text-cyan-400 opacity-15 lg:text-[50px]">No cases found!</h1>
    <p class="text-slate-600 lg:text-lg"> Try searching something else.</p>
  </div>
</div>
<?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </section>

</div>

<!-- component -->


<script>
  document.getElementById('logoutButton').addEventListener('click', function (e) {
      e.preventDefault();
  

      fetch("<?php echo e(route('lawyer.logout')); ?>", {
          method: "POST",
          headers: {
              "Content-Type": "application/json",
              "X-CSRF-TOKEN": "<?php echo e(csrf_token()); ?>"
          },
      })
      .then(response => {
          window.location.href = "<?php echo e(route('home')); ?>";
  
          localStorage.removeItem('access_token');
      })
      .catch(error => {
          console.error(error);
      });
  });
  </script>
</body>
</html><?php /**PATH C:\xampp1\htdocs\LegalBox\resources\views/clientlist.blade.php ENDPATH**/ ?>