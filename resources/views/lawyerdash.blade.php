<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lawyer Dashboard</title>
    <link rel="stylesheet" href="{{asset('css/gradient.css')}}">
    <link rel="icon" type="image/x-icon" href="/images/elaw.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    

    <script>
const accessToken = localStorage.getItem('access_token');

if (!accessToken) {
    window.location.href = "{{ route('login') }}";
}
    </script>
    
     @vite('resources/css/app.css')
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
    <a class="block px-4 py-2 mt-2 text-sm font-semibold text-white bg-neutral transition ease-in-out duration-400 rounded-lg hover:text-cyan-400 focus:text-cyan-600 focus:outline-none focus:shadow-outline hover:shadow-lg" href="#"><i class="fas fa-home mr-2 "></i>Home</a>
    
    <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-400 hover:bg-cyan-400 hover:text-neutral hover:shadow-lg transition ease-in-out duration-400 rounded-lg focus:outline-none focus:shadow-outline focus:bg-cyan-500" href="{{URL('cases')}}"><i class="fas fa-file-contract mr-2"></i> Legal Cases</a>
    <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-400 bg-transparent   hover:bg-cyan-400 hover:shadow-lg transition ease-in-out duration-400 hover:text-neutral rounded-lg focus:outline-none focus:shadow-outline focus:bg-cyan-500" href="{{URL('clients')}}"><i class="fas fa-user mr-2"></i>Clients</a>
        <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-400 hover:bg-cyan-400 hover:text-neutral hover:shadow-lg transition ease-in-out duration-400 rounded-lg focus:outline-none focus:shadow-outline focus:bg-cyan-500" href="{{URL('meetings')}}"><i class="fas fa-handshake mr-2"></i>Scheduled Meetings</a>
    <label for="my_modal_signout" class="hover:cursor-pointer block px-4 py-2 mt-2 text-sm font-semibold text-white bg-error bg-opacity-30 transition ease-in-out duration-400 rounded-lg hover:text-error focus:text-neutral-900 focus:outline-none focus:shadow-outline hover:shadow-lg" href="#"><i class="fas fa-right-from-bracket mr-1"></i> Sign Out</label>
   
  </nav>
</div>

    <!-- DASHBOARD -->
<div class=" bg-grey-800 flex flex-col min-h-screen w-full">
    <div>
        

      
    <div class="flex-grow container mx-auto sm:px-4 pt-6 pb-8 p-4">
      <div>
        <h1 class="text-3xl ml-2 py-5 font-bold">Welcome Back!
          <br>
         <span class="text-lg">Here's your latest data:</span> 
        </h1>
   
      </div>
  
       
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
              
              <span class="text-5xl text-cyan-400">{{$totalCases}}</span>
            
            </div>
            <div class="text-green-light text-sm">
              
            </div>
          </div>
          <div class="flex-shrink w-32 inline-block relative">
        <a href="{{URL('clients')}}"><button class="btn btn-md ml-12 bg-neutral-800 border-none text-cyan-400 hover:bg-neutral-700"> See All</button></a>
          </div>
        </div>
        <div class="hidden lg:flex">
          <div class="w-1/3 text-center py-8">
            <div class="border-r">
              <div class="text-grey-darker mb-2">
                
                <span class="text-5xl font-bold text-cyan-400">{{$totalClients}}</span>
                
              </div>
              <div class="text-sm uppercase text-grey tracking-wide">
                Number of Clients
              </div>
            </div>
          </div>
          <div class="w-1/3 text-center py-8">
            <div class="border-r">
              <div class="text-grey-darker mb-2">

                <span class="text-5xl font-bold text-cyan-400">{{$totalCases}}</span>
             
              </div>
              <div class="text-sm uppercase text-grey tracking-wide">
                Number of cases
              </div>
            </div>
          </div>
          <div class="w-1/3 text-center py-8">
            <div>
              <div class="text-grey-darker mb-2">
                
                <span class="text-5xl font-bold text-cyan-400">{{$totalMeetings}}</span>
                
              </div>
              <div class="text-sm uppercase text-grey tracking-wide">
                Pending Meetings
              </div>
              <div class="text-sm uppercase text-grey tracking-wide">
            
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="flex flex-wrap -mx-4">
        <div class="w-full mb-6 lg:mb-0 lg:w-1/2 px-4 flex flex-col">
          <div class="overflow-x-auto">
            <table class="table bg-neutral-900">
              <!-- head -->
              <thead class="text-cyan-400">
                <tr>
               
                  <th><h1 class="text-lg">Latest Clients</h1></th>

                </tr>
                <tr>
               
                  <th>Name</th>
                  <th>ID</th>
           
                  <th>Date Added</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>

                @foreach($latestClients as $client)
                <!-- row  -->
                <tr class="font-bold">
               
                  <td>
                    <div class=" ">
                     
                      <div>
                        <div class="font-bold">{{$client->name}} {{$client->surname}}</div>
                       
                      </div>
                    </div>
                  </td>
                  <td>
                   {{$client->caseid}}
                    <br/>
                   
                  </td>
            
                  <th>
                     {{ $client->created_at->format('F j, Y') }}
                  </th>
                </tr>

                @endforeach
               
              
            </table>
          </div>
        </div>
        <div class="w-full lg:w-1/2 px-4">
          <div class="overflow-x-auto">
            <table class="table bg-neutral-900">
              <!-- head -->
              <thead class="text-cyan-400">
                <tr>
               
                  <th><h1 class="text-lg">Latest Cases</h1></th>

                </tr>
                <tr>
               
                  <th>Title</th>
                  <th>Client</th>
                  
                  <th>Date Added</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($latestLegalCases as $case)
                <!-- row 1 -->
                <tr class="font-bold">
               
                  <td>
                    <div class=" ">
                     
                      <div>
                        <div class="font-bold">{{$case->title}}</div>
                       
                      </div>
                    </div>
                  </td>
                  <td>
                   {{$case->client}}
                    <br/>
                   
                  </td>
                  <td>{{ $case->created_at->format('F j, Y') }}</td>
                  
                </tr>
               @endforeach
              
            </table>
          </div>
        </div>
      </div>
    </div>
    
  </div>
</div>

<!-- component -->

    
</body>

<script>
document.getElementById('logoutButton').addEventListener('click', function (e) {
    e.preventDefault();

    fetch("{{ route('lawyer.logout') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
    })
    .then(response => {
       
        window.location.href = "{{ route('home') }}";
        localStorage.removeItem('access_token');
    })
    .catch(error => {
        console.error(error);
    });
});
</script>
</html>