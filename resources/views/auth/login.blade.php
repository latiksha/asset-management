<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <title>{{ $title ?? 'Auth - Ninety One' }}</title>
    <style>
    </style>
</head>
<body class="flex font-poppins items-center justify-center">



    <div class="container">
        <div class="grid gap-8 mt-10 m-96">
            <div id="back-div" class="bg-gradient-to-r from-blue-500 to-purple-500 rounded-[26px] ">
                <div class="rounded-[20px]  bg-white lg:p-10 md:p-10 sm:m-2">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header flex justify-center font-bold text-2xl mb-6">{{ __('Login') }}</div>

                                <div class="card-body">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="row mb-3 ">
                                            <label for="email" class="col-md-4 col-form-label text-md-end ">{{ __('Email address') }}</label>

                                            <div class="col-md-4 ">

                                                <input class="border dark:bg-indigo-700 dark:text-gray-300 dark:border-gray-700 p-1 mb-2 shadow-md placeholder:text-base border-gray-300 rounded-sm w-full focus:scale-105 ease-in-out duration-300" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>


                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                            <div class="col-md-6">
                                                <input class="border dark:bg-indigo-700 dark:text-gray-300 dark:border-gray-700 p-1 mb-2 shadow-md placeholder:text-base border-gray-300 rounded-sm w-full focus:scale-105 ease-in-out duration-300" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">


                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6 offset-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                    <label class="form-check-label" for="remember">
                                                        {{ __('Remember Me') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-0">
                                            <div class="col-md-8 offset-md-4 flex justify-center">
                                                <button type="submit" class=" bg-gradient-to-r from-blue-500 to-purple-500 px-10 py-2 rounded-xl border-2 border-blue-900 text-white">

                                                    {{ __('Login') }}
                                                </button>
                                            </div>
                                            <div class="flex justify-center text-sm mt-1">
                                                @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                                @endif
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
</body>
</html>
