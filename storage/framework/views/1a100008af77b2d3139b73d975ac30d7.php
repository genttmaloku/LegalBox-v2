<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lawyer Login</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/gradient.css')); ?>">
    <link rel="icon" type="image/x-icon" href="/images/elaw.png">
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
</head>
<body class="background-radial-gradient">
    <!-- component -->
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<div class="bg-no-repeat bg-cover bg-center relative" style=";"><div class="absolute   opacity-75 inset-0 z-0"></div>

  <div class="min-h-screen sm:flex sm:flex-row mx-0 justify-center">
    
      <div class="flex-col flex  self-center p-10 sm:max-w-5xl xl:max-w-2xl  z-10">
        <img src="<?php echo e(URL('images/woman.png')); ?>" class="hidden lg:flex mb-3 object-scale-down w-96">

        <div class="self-start hidden lg:flex flex-col  text-white">

          <h1 class="mb-3 font-bold text-5xl">Welcome Back! </h1>
          <p class="pr-3 text-lg">Log in to your account to continue managing your legal procedures and clients.</p>
        </div>
      </div>
            
      
      <div class="flex justify-center self-center  z-10">
        
        <div class="p-12 relative bg-[hsla(0,0%,100%,0.9)] backdrop-blur-[25px] backdrop-saturate-[200%] block rounded-lg px-6 py-12 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-[hsla(0,0%,15%,0.9)] dark:shadow-black/20 md:px-12 mx-auto rounded-2xl w-100 z-10 ">
          
            <div class="mb-4 ">
              
              <form action="" id="loginForm">
                <?php echo csrf_field(); ?>
              <h3 class="font-semibold text-2xl text-white">Sign In </h3>
              <p class="text-gray-500 ">Please sign in to your account.</p>
            </div>
            
            <div class="space-y-5">
              
              <div class="  text-white  rounded-lg relative" role="alert">
              
                <span class="block sm:inline text-error font-semibold animate-pulse animate-infinite" id="errorMessage"></span>
               
              </div>
                        <div class="space-y-2">
                              <label class="text-sm font-medium text-white tracking-wide">Email</label>
                              
              <input class=" w-full text-base px-4 py-2 border  border-gray-300 rounded-lg focus:outline-none focus:border-cyan-400" type="email" name="email" id="email" placeholder="mail@gmail.com">
              </div>
                          <div class="space-y-2">
              <label class="mb-5 text-sm font-medium text-white tracking-wide">
                Password
              </label>
              <input class="w-full content-center text-base px-4 py-2 border  border-gray-300 rounded-lg focus:outline-none focus:border-cyan-400" type="password" name="password" id="password" placeholder="Enter your password">
            </div>
              <div class="flex items-center justify-between">
              
              
            </div>
            <div>
              <button type="submit" class="btn btn-neutral w-full flex justify-center bg-cyan-800  hover:bg-cyan-400 text-gray-100 p-3  rounded-xl tracking-wide font-semibold  shadow-lg cursor-pointer transition ease-in duration-200">
                Sign In
              </button>
            </div>
            </div>
          </form>

          <script>
            document.getElementById('loginForm').addEventListener('submit', function (e) {
                e.preventDefault();
        
                var formData = new FormData(this);
        
        
                fetch("<?php echo e(route('lawyer.login')); ?>", {
                    method: "POST",
                    body: formData,
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
        
             
                    if (data.token) {
                   
                        localStorage.setItem('access_token', data.token);
        
                      
                        window.location.href = "<?php echo e(URL('dashboard')); ?>";
                    } else {
                        document.getElementById('errorMessage').innerText = "Invalid login data! ";
                    }
                })
                .catch(error => {
                    console.error(error);
                   
                });
            });
        </script>
            
        </div>
      </div>
  </div>
</div>
</body>
</html><?php /**PATH C:\xampp1\htdocs\LegalBox\resources\views/lawyerlogin.blade.php ENDPATH**/ ?>