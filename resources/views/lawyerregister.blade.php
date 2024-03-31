<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lawyer Register</title>
    <link rel="icon" type="image/x-icon" href="/images/elaw.png">
    <link rel="stylesheet" href="{{asset('css/gradient.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    @vite('resources/css/app.css')
</head>
<body>
   
    <div class="h-screen md:flex ">
        
        <div
            class="rounded-r-3xl shadow-2xl relative overflow-hidden md:flex w-1/2 background-radial-gradient i justify-around items-center hidden">
            <div>
                <div class="flex">
                <img src="{{URL('images/elaw.png')}}" alt="" class="h-20">
                <img src="{{URL('images/legalboxteal.png')}}" alt="" class="h-20">
            </div>
            
                <p class="text-white mt-1 text-wrap">Register as a Lawyer to manage your clients and legal procedures.</p>
                 <a href="{{URL('home')}}"><p class="underline">Back to Home Page</p></a>
           
            </div>
            <div class="absolute -bottom-32 -left-40 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8"></div>
            <div class="absolute -bottom-40 -left-20 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8 "></div>
            <div class="absolute -top-40 -right-0 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8"></div>
            <div class="absolute -top-20 -right-20 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8"></div>
        </div>

        
        <div class="flex md:w-1/2 justify-center py-10 px-10 items-center">
       

            
                
           
            <form  class=" lg:w-1/2" id="registerForm" >
                @csrf

           
                <div class="inline-block">
                    <h1 id="failMessage" class="font-semibold text-error animate-pulse animate-infinite"></h1>
                    <h1 id="successMessage" class="font-semibold text-success animate-pulse animate-infinite"></h1>
                </div>
                 

                <h1 class="text-white font-bold text-2xl mb-1">Register as a <span class="text-cyan-400">Lawyer</span> </h1> 
                <p class="text-sm font-normal text-white mb-7">Already registered? <a href="{{URL('login')}}" class="underline text-cyan-600 hover:text-cyan-400 duration-300"> Log in here.</a> </p>
              
              
              
                <div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-400" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                            clip-rule="evenodd" />
                    </svg>
                    <input class="pl-2 outline-none border-none bg-base-100 " type="text" name="name" id="name" required placeholder="Name" />
                    
          </div>
         
          
          
                    <div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-400" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                            clip-rule="evenodd" />
                    </svg>
                        <input class="pl-2 outline-none border-none bg-base-100" type="text" name="surname" id="surname" placeholder="Surname" required />
          </div>
     
          
            
          <div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
                         <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4" />
                        </svg>
                        
                        <input class="pl-2 outline-none border-none bg-base-100" type="text" name="username" id="username" placeholder="Username" required />
          </div>
          
         
                
                        <div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                            </svg>
                            <input class="pl-2 outline-none border-none bg-base-100" type="email" name="email" id="email" placeholder="Email Address" required />
          </div>
          
      
                
                            <div class="flex items-center border-2 py-2 px-3 rounded-2xl">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-400" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                <input class="pl-2 outline-none border-none bg-base-100" type="password" name="password" id="password" placeholder="Password" required />
          </div>
                                <button type="submit" class="btn block w-full bg-cyan-800  hover:bg-cyan-400 hover:shadow-lg mt-4 py-2 rounded-2xl text-white font-semibold mb-2">Login</button>
                               
            </form>

           <script>
    document.getElementById('registerForm').addEventListener('submit', function (e) {
        e.preventDefault();

        var formData = new FormData(this);

       
        fetch("{{ route('lawyer.register') }}", {
            method: "POST",
            body: formData,
        })
        .then(response => {
          
            const contentType = response.headers.get('content-type');
            if (!contentType || !contentType.includes('application/json')) {
                throw new Error('Expected JSON response, but received non-JSON content');
            }

            return response.json();
        })
        .then(data => {
            console.log(data);

            if (data.token) {
                document.getElementById('successMessage').innerText = "Successfully registered! ";
                window.location.href = "{{ URL('login') }}";
            } else {
                document.getElementById('failMessage').innerText = "Registration failed! Please check your information. ";
            }
        })
        .catch(error => {
            console.error(error);
           
        });
    });
</script>
        </div>
    </div>
</body>


</html>