<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>
        
<div class="flex flex-col justify-center py-12 sm:px-6 lg:px-8">

  <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
    <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
      <form method="POST" action="#">
        <div>
          <label class="block text-sm font-medium text-gray-700" for="username">
            Username
          </label>
          <div class="mt-1">
            <input class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required="" autocomplete="username" type="text" name="username" id="username">
          </div>
        </div>

        <div class="mt-6">
          <label class="block text-sm font-medium text-gray-700" for="email">
            Email address
          </label>
          <div class="mt-1">
            <input class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required="" autocomplete="email" type="email" name="email" id="email">
          </div>
        </div>

        <div class="mt-6">
          <label class="block text-sm font-medium text-gray-700" for="confirm-email">
            Confirm Email address
          </label>
          <div class="mt-1">
            <input class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required="" autocomplete="email" type="email" name="confirm-email" id="confirm-email">
          </div>
        </div>

        <div class="mt-6">
          <label class="block text-sm font-medium text-gray-700" for="password">
            Password
          </label>
          <div class="mt-1">
            <input class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required="" autocomplete="current-password" type="password" name="password" id="password">
          </div>
        </div>

        <div class="mt-6">
          <label class="block text-sm font-medium text-gray-700" for="confirm-password">
            Confirm Password
          </label>
          <div class="mt-1">
            <input class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required="" autocomplete="current-password" type="password" name="confirm-password" id="confirm-password">
          </div>
        </div>

        <div class="mt-6">
          <label class="block text-sm font-medium text-gray-700" for="dob">
            Date of Birth
          </label>
          <div class="mt-1">
            <input class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required="" type="date" name="dob" id="dob">
          </div>
        </div>
        
        <div class="flex items-center justify-center mt-6">
  <span class="mr-3 text-gray-700 font-medium">Gender:</span>
  <label class="inline-flex items-center">
    <input type="radio" class="form-radio h-5 w-5 text-pink-600" name="gender" value="Male">
    <span class="ml-2 text-gray-700">Male</span>
  </label>
  <label class="inline-flex items-center ml-6">
    <input type="radio" class="form-radio h-5 w-5 text-purple-600" name="gender" value="Female">
    <span class="ml-2 text-gray-700">Female</span>
  </label>
</div>



        <!-- <div class="mt-6 flex items-center justify-between">
          <div class="flex items-center">
            <input class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded" type="checkbox" name="terms-and-condition" id="terms-and-condition">
            <label class="ml-2 block text-sm text-gray-900" for="terms-and-condition">
              I agree to the terms and conditions
            </label>
          </div>
        </div> -->

        <div class="mt-6">
          <button class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" type="submit">
            Sign up
          </button>
        </div>
        <a href="login.php">Already Registered? login here</a>
      </form>
    </div>
  </div>
</div>



</body>
</html>