<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cases</title>
    <link rel="icon" type="image/x-icon" href="/images/elaw.png">
    <link rel="stylesheet" href="{{asset('css/gradient.css')}}">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">


    <script>

      const accessToken = localStorage.getItem('access_token');
      
      if (!accessToken) {
          // Redirect to the login page if the access token is not found
          window.location.href = "{{ route('login') }}";
      }
          </script>
  
  

     @vite('resources/css/app.css')

     @foreach($legalcases as $case)

      <!-- View Modal -->

      <input type="checkbox" id="my_modal_view_{{$case->id}}" class="modal-toggle" />
      <div class="modal" role="dialog">
        <div class="modal-box w-11/12 max-w-5xl">
          <div class="hero flex justify-start ">
            <div class="hero-content flex-col lg:flex-row">
              <img src="{{URL('images/document.png')}}" class="max-w-sm h-64 hidden lg:block" />
              <div>
                <h1 class="text-md font-semibold text-gray-500 ml-1 "> {{$case->case_id}}</h1>
                <h1 class="text-5xl text-cyan-400 font-bold">{{$case->title}}</h1>
                <div class="flex align-center ml-1">
                  <i class="fas fa-user text-white text-sm mt-1 mr-1"></i>
                  <h1 class="text-xl font-semibold text-gray-500 ml-1 "> {{$case->client}}</h1>
                </div>
                <div class="flex align-center ml-1 ">
                  <i class="fas fa-scale-balanced text-white text-sm mt-1 mr-1"></i>
                  <h1 class="text-xl font-semibold text-gray-500 ml-1 ">{{$case->category}}</h1>
                </div>

                
               
                <progress class="progress progress-accent w-56" value="{{$case->progress}}" max="100"></progress> 
                   <p class="py-6">{{$case->description}}</p>
              </div>
            </div>
          </div>
          <div class="modal-action">
            <label for="my_modal_view_{{$case->id}}" class="btn text-error">Close</label>
          </div>
        </div>
      </div>
   <!-- View Modal -->

        <!-- Edit Modal -->




          <input type="checkbox" id="my_modal_edit_{{$case->id}}" class="modal-toggle" />
          <div class="modal" role="dialog">
            <div class="modal-box">
              <h2 class="mb-4 text-4xl font-extrabold text-gray-900 text-white md:text-4xl lg:text-4xl"><span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">Edit Case</span></h2>
              <form action="{{route('cases.update', $case->id)}}" method="POST" class="grid grid-cols-1 gap-4">
                 @csrf  
                @method('PUT')
                <div class="mb-4">
                    <label for="title" class="text-blue-300">Case ID</label>
                    <br>
                    <input type="text" id="case_id" name="case_id" value="{{ old('case_id', $case->case_id) }}"
                        class="input input-bordered border-cyan-400 w-full max-w-xs mt-1" />
                </div>
                <div class="mb-6">
                    <label for="name" class="text-blue-300">Client Title</label>
                    <br>
                    <input type="text" id="title" name="title" value="{{ old('title', $case->title) }}"
                        class="input input-bordered border-cyan-400 w-full max-w-xs mt-1" />
                </div>
                <div class="mb-6">
                  <label for="task_description" class="text-blue-300">Client</label>
                  <br>
                 <select name="client" value="{{ old('client', $case->client)}}" class="input input-bordered border-cyan-400 w-full max-w-xs mt-1" id="client">
                  @foreach($clients as $client)
                  <option value="{{$client->name}} {{$client->surname}}">{{$client->name}} {{$client->surname}}</option>
                  @endforeach
                 </select>
              </div>
                <div class="mb-6">
                    <label for="task_description" class="text-blue-300">Case Category</label>
                    <br>
                    
                     <select name="category" class="input input-bordered border-cyan-400 w-full max-w-xs mt-1" id="category">
                <option value="Business Law">Business Law</option>
                <option value="Family Law">Family Law</option>
                <option value="Criminal Defense">Criminal Defense</option>
               </select>
                </div>
          
                       <div class="mb-6">
                <label for="case_progress" class="text-blue-300">Case Progress</label>
                <br>
                <div class="flex flex-col space-y-2 p-2 w-80">
   <input type="number" id="progress" name="progress" value="{{ old('progress', $case->progress) }}" min="0" max="100"
                    class="input input-bordered border-cyan-400 w-full max-w-xs mt-1 " />
 
</div>
            </div>
            <div class="mb-6">
                <label for="description"  class="text-blue-300">Charge Description</label>
                <br>
                <textarea id="description" name="description" class="align-start justify-start input input-bordered border-cyan-400 w-full max-w-xs mt-1">
                  {{ old('description', $case->description) }}
              </textarea>
            </div>
          
                <div class="flex items-center justify-between ">
                    <button class="btn bg-cyan-400 hover:bg-blue-400 text-black duration-300 shadow-md" type="submit">Save
                    </button>
                    <div class="modal-action">
                      <label for="my_modal_edit_{{$case->id}}" class="btn mb-4 text-error">Close</label>
                    </div>
                </div>
            </form>
              
            </div>
          </div>
            
            

  
     <!-- EditModal -->


          <!-- Delete Modal -->

          <input type="checkbox" id="my_modal_delete_{{$case->id}}" class="modal-toggle" />
          <div class="modal" role="dialog">
            <div class="modal-box">
              <h3 class="font-bold text-lg text-error">Warning!</h3>
              <p class="py-4">Deleted cases cannot be returned.</p>
              <div class="modal-action">
                <form method="POST" action="{{route('cases.delete' , $case->id)}}">
                   @csrf
                  @method('DELETE')
                <button type="submit" class="btn text-error">Delete</button>
              </form>
                <label for="my_modal_delete_{{$case->id}}" class="btn">Close</label>
                
              </div>
            </div>
          </div>
  
     <!-- Delete Modal -->

    
      <!-- Add Modal -->

      <input type="checkbox" id="my_modal_add" class="modal-toggle" />
      <div class="modal" role="dialog">
        <div class="modal-box">
          <h2 class="mb-4 text-4xl font-extrabold text-gray-900 text-white md:text-4xl lg:text-4xl"><span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">Add a Legal Case</span></h2>
          <form action="{{route('legalcases.store')}}" method="POST" class="grid grid-cols-1 gap-4">
            @csrf
            <div class="mb-4">
                <label for="title" class="text-blue-300">Case ID</label>
                <br>
                <input type="text" id="case_id" name="case_id" value=""
                    class="input input-bordered border-cyan-400 w-full max-w-xs mt-1" />
            </div>
            <div class="mb-6">
                <label for="name" class="text-blue-300">Case Title</label>
                <br>
                <input type="text" id="title" name="title" value=""
                    class="input input-bordered border-cyan-400 w-full max-w-xs mt-1" />
            </div>
            <div class="mb-6">
              <label for="task_description" class="text-blue-300">Client</label>
              <br>
             <select name="client" class="input input-bordered border-cyan-400 w-full max-w-xs mt-1" id="client">
              @foreach($clients as $client)
              <option value="{{$client->name}}">{{$client->name}}</option>
              @endforeach
             </select>
          </div>
            <div class="mb-6">
                <label for="task_description" class="text-blue-300">Category</label>
                <br>
               <select name="category" class="input input-bordered border-cyan-400 w-full max-w-xs mt-1" id="category">
                <option value="Business Law">Business Law</option>
                <option value="Family Law">Family Law</option>
                <option value="Criminal Defense">Criminal Defense</option>
               </select>
            </div>
      
            <div class="mb-6">
                <label for="case_progress" class="text-blue-300">Case Progress</label>
                <br>
                <div class="flex flex-col space-y-2 p-2 w-80">
   <input type="number" id="progress" name="progress" value=""
                    class="input input-bordered border-cyan-400 w-full max-w-xs mt-1" />
 
</div>
            </div>
        <div class="mb-6">
                <label for="description"  class="text-blue-300">Charge Description</label>
                <br>
                <textarea id="description" name="description" class="align-start justify-start input input-bordered border-cyan-400 w-full max-w-xs mt-1">
               
              </textarea>
            </div>
          
            <div class="flex items-center justify-between ">
                <button class="btn bg-cyan-400 hover:bg-blue-400 text-black duration-300 shadow-md" type="submit">Save
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

  @endforeach
   
</head>
<body class>

    <!-- component -->

<div class="md:flex flex-col md:flex-row md:min-h-screen w-full">
  <div @click.away="open = false" class="flex flex-col  rounded-r-sm  lg:rounded-r-lg w-full md:w-64 text-gray-700 bg-neutral-900 flex-shrink-0" x-data="{ open: false }">
    <div class="flex-shrink-0 px-8 py-4  flex flex-row items-center justify-between lg:justify-center">
      <a href="#" class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline"><img src="{{URL('images/elaw.png')}}" alt="" class="h-10"></a>
    <a href="#" class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline"><img src="{{URL('images/legalboxteal.png')}}" alt="" class="h-10"></a>
    <button class="rounded-lg md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
      <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6 text-cyan-400">
        <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
        <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
      </svg>
    </button>
  </div>
  <nav :class="{'block': open, 'hidden': !open}" class=" flex-grow md:block px-4 pb-4 md:pb-0 md:overflow-y-auto">
    <div>
    <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-400 bg-transparent   hover:bg-cyan-400 hover:shadow-lg transition ease-in-out duration-400 hover:text-neutral rounded-lg focus:outline-none focus:shadow-outline focus:bg-cyan-500" href="{{URL('dashboard')}}"><i class="fas fa-home mr-2"></i>Home</a>
    <a class="block px-4 py-2 mt-2 text-sm font-semibold text-white bg-neutral transition ease-in-out duration-400 rounded-lg hover:text-cyan-400 focus:text-cyan-600 focus:outline-none focus:shadow-outline hover:shadow-lg" href="{{URL('cases')}}"><i class="fas fa-file-contract mr-2"></i> Legal Cases</a>
    <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-400 bg-transparent   hover:bg-cyan-400 hover:shadow-lg transition ease-in-out duration-400 hover:text-neutral rounded-lg focus:outline-none focus:shadow-outline focus:bg-cyan-500" href="{{URL('clients')}}"><i class="fas fa-user mr-2 "></i>Clients</a>
    <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-400 bg-transparent   hover:bg-cyan-400 hover:shadow-lg transition ease-in-out duration-400 hover:text-neutral rounded-lg focus:outline-none focus:shadow-outline focus:bg-cyan-500" href="{{URL('meetings')}}"><i class="fas fa-handshake mr-2"></i>Scheduled Meetings</a>
    <label for="my_modal_signout" class="hover:cursor-pointer block px-4 py-2 mt-2 text-sm font-semibold text-white bg-error bg-opacity-30 transition ease-in-out duration-400 rounded-lg hover:text-error focus:text-neutral-900 focus:outline-none focus:shadow-outline hover:shadow-lg" href="#"><i class="fas fa-right-from-bracket mr-1"></i> Sign Out</label>
  </nav>
</div>
  <!-- component -->

   

    <!-- component -->
    <section class="container mx-auto p-6 ">
         <!-- Search Bar -->
        <div class="bg-neutral-900 rounded-lg border-none  p-2 mb-4 shadow-md">

          

                <form action="{{route('cases.search')}}" method="GET">
                  @csrf
                  <div class="flex items-center">
                    <i class="px-3 fas fa-search ml-1"></i>
                  <input type="text" name="search" id="search" placeholder="Search by keyword..." class="ml-3  focus:outline-none w-full bg-neutral-900  opacity-30">
                <button type="submit" action="" class="btn text-cyan-400 hover:shadow-md ">Search</button>
              </form>
            </div>
        </div>


<div class="inline-flex">
  <div class="mt-1">
       <label for="my_modal_add" class="btn align-center mb-4 bg-neutral-900 text-cyan-400"> <svg class="h-5" viewBox="0 0 64 64" id="Layer_1" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M59.942,64h-38.53c-1.383,0-2.504-1.121-2.504-2.504V30.652c0-1.174,0.815-2.19,1.961-2.445 c4.337-0.965,7.811-4.38,8.849-8.702c0.271-1.126,1.277-1.919,2.435-1.919h12.238c0.665,0,1.303,0.265,1.773,0.735l15.551,15.581 c0.469,0.469,0.732,1.106,0.732,1.769v25.824C62.447,62.879,61.325,64,59.942,64z M23.916,58.991h33.521V36.707L43.352,22.595 h-9.352c-1.725,4.612-5.449,8.281-10.084,9.936V58.991z" style="fill:#00f7ff;"></path> </g> <g> <path d="M58.747,38.175H44.391c-1.383,0-2.504-1.121-2.504-2.504V21.288c0-1.218,0.727-2.307,1.853-2.772 c1.126-0.465,2.409-0.21,3.27,0.653l13.86,13.886c0,0,0,0,0,0c0.86,0.862,1.114,2.145,0.648,3.269 C61.052,37.449,59.964,38.175,58.747,38.175z M57.325,36.594C57.325,36.594,57.325,36.594,57.325,36.594L57.325,36.594 L57.325,36.594z M46.895,33.166h7.009l-7.009-7.022V33.166z" style="fill:#00f7ff;"></path> </g> <g> <path d="M18.302,33.498c-9.236,0-16.749-7.514-16.749-16.749S9.067,0,18.302,0 c9.235,0,16.749,7.514,16.749,16.749S27.538,33.498,18.302,33.498z M18.302,5.009c-6.474,0-11.74,5.267-11.74,11.74 s5.267,11.74,11.74,11.74c6.473,0,11.74-5.267,11.74-11.74S24.776,5.009,18.302,5.009z" style="fill:#00f7ff;"></path> </g> <g> <path d="M23.285,19.253h-9.661c-1.383,0-2.504-1.121-2.504-2.504c0-1.383,1.121-2.504,2.504-2.504h9.661 c1.383,0,2.504,1.121,2.504,2.504C25.789,18.132,24.668,19.253,23.285,19.253z" style="fill:#00f7ff;"></path> </g> <g> <path d="M18.455,24.084c-1.383,0-2.504-1.121-2.504-2.504v-9.661c0-1.383,1.121-2.504,2.504-2.504 c1.383,0,2.504,1.121,2.504,2.504v9.661C20.959,22.962,19.838,24.084,18.455,24.084z" style="fill:#00f7ff;"></path> </g> </g> </g></svg> Add Case</label>
      </div>

       <div class="dropdown">
        <div tabindex="0" role="button" class="btn m-1 bg-neutral-900">
          <i class="fas fa-filter text-yellow-500"></i>
          <p class="text-yellow-500 opacity-50">Filter</p>
        </div>
        <ul tabindex="0" class="font-bold mb-5 dropdown-content z-[1] menu p-2 shadow bg-neutral-800 rounded-box w-52">
          <form action="{{route('cases.filter','progress')}}" method="POST" class="grid grid-cols-1 gap-4">
            @csrf
          <li><button type="submit">Sort by Progress</button></li>
          </form>

          <form action="{{route('cases.filter','business')}}" method="POST" class="grid grid-cols-1 gap-4">
            @csrf
            <li><button type="submit">Business Law </button></li>
          </form>

          <form action="{{route('cases.filter','family')}}" method="POST" class="grid grid-cols-1 gap-4">
            @csrf
            <li><button type="submit">Family Law </button></li>
          </form>

          <form action="{{route('cases.filter','criminal')}}" method="POST" class="grid grid-cols-1 gap-4">
            @csrf
            <li><button type="submit" class="flex justify-start">Criminal Defense </button></li>
          </form>
        </ul>
      </div>

    </div>


@if ( count($legalcases) > 0)

        @foreach($legalcases as $case) 

        <!-- LEGAL CASE CARD !-->

        <div class="w-full mb-8 overflow-hidden rounded-lg ">
          <div class="w-full overflow-x-auto">
            
            


                <!-- Main Content -->
        <div class="lg:flex gap-4 items-stretch bg-neutral-900">
            <!-- Legal Case -->
            <div class="bg-neutral-900 flex md:p-2 p-6 rounded-lg  mb-4 lg:mb-0  lg:w-[35%] ">
                <div class="flex justify-center items-center space-x-5 h-full">
                  <img src="{{URL('images/document.png')}}" alt="wallet"
                        class="h-32 w-38">
                    <div>
                      
                       
                      
                        <h2 class="text-4xl font-bold text-gray-400">{{$case->title}}</h2>
                        <p class="text-cyan-400">{{$case->case_id}}</p>
                    </div>
                    
                </div>
            </div>

            <!-- Caja Blanca -->
            <div class=" p-4 bg-neutral-900 rounded-lg xs:mb-4 max-w-full shadow-md lg:w-[65%]">
                <!-- Cajas pequeñas -->
                <div class="flex flex-wrap justify-between h-full">
                    <!-- Card 1 -->
                    <div
                        class="flex-1  to-cyan-900 rounded-lg flex flex-col items-center justify-center p-4 space-y-2  m-2">
                        <i class="fas fa-user text-white text-4xl"></i>
                        <p class="text-gray-400 font-bold">{{$case->client}}</p>
                    </div>

                      <!-- Card 2 -->
                      <div
                      class="flex-1  rounded-lg flex flex-col items-center justify-center p-4 space-y-2  m-2">
                      <div class="radial-progress bg-gray-800 text-cyan-400 border-primary" style="--value:{{$case->progress}};" role="progressbar">{{$case->progress}}%</div>
                  </div>

                    <!-- Card 3 -->
                    <div
                        class="flex-1    rounded-lg flex  items-center justify-center p-4 space-y-2  m-2">
                        <div class="flex ">
                          <label for="my_modal_view_{{$case->id}}" class="btn btn-circle mr-2"><svg viewBox="0 0 24 24" class="h-5" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9ZM11 12C11 11.4477 11.4477 11 12 11C12.5523 11 13 11.4477 13 12C13 12.5523 12.5523 13 12 13C11.4477 13 11 12.5523 11 12Z" fill="#00ff40"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M21.83 11.2807C19.542 7.15186 15.8122 5 12 5C8.18777 5 4.45796 7.15186 2.17003 11.2807C1.94637 11.6844 1.94361 12.1821 2.16029 12.5876C4.41183 16.8013 8.1628 19 12 19C15.8372 19 19.5882 16.8013 21.8397 12.5876C22.0564 12.1821 22.0536 11.6844 21.83 11.2807ZM12 17C9.06097 17 6.04052 15.3724 4.09173 11.9487C6.06862 8.59614 9.07319 7 12 7C14.9268 7 17.9314 8.59614 19.9083 11.9487C17.9595 15.3724 14.939 17 12 17Z" fill="#00ff40"></path> </g></svg></label>
                          <label for="my_modal_edit_{{$case->id}}" class="mr-2 btn btn-circle rounded-full"><svg viewBox="0 0 24 24" fill="none" class="h-5" xmlns="http://www.w3.org/2000/svg" stroke="#ffc800"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z" stroke="#ffc800" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13" stroke="#ffc800" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg></label>
                          <label for="my_modal_delete_{{$case->id}}" class="btn btn-circle"><svg viewBox="0 0 24 24" class="h-5" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M10 12V17" stroke="#ff0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M14 12V17" stroke="#ff0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M4 7H20" stroke="#ff0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M6 10V18C6 19.6569 7.34315 21 9 21H15C16.6569 21 18 19.6569 18 18V10" stroke="#ff0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="#ff0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg></label>
                          
                        </div>
  
                    </div>

                  
                </div>
            </div>
        </div>

        

          </div>
        </div>
         <!-- LEGAL CASE CARD !-->

         @endforeach

         @else
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

         @endif

        
        
      </section>


</div>

<script>
  document.getElementById('logoutButton').addEventListener('click', function (e) {
      e.preventDefault();
  
      // Send logout request to the Laravel backend
      fetch("{{ route('lawyer.logout') }}", {
          method: "POST",
          headers: {
              "Content-Type": "application/json",
              "X-CSRF-TOKEN": "{{ csrf_token() }}"
          },
      })
      .then(response => {
          // Assuming the logout endpoint returns a 204 No Content status on success
          // Logout successful, redirect to the home page
          window.location.href = "{{ route('home') }}";
  
          // Delete the token from localStorage
          localStorage.removeItem('access_token');
      })
      .catch(error => {
          console.error(error);
          // Handle logout error
      });
  });
  </script>


</body>
</html>