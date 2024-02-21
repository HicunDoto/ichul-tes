<!doctype html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    {{-- <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" /> --}}
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
    />
    {{-- <link
       rel="stylesheet" href="{{asset('css/dataTables.bootstrap5.min.css')}}" /> --}}
    {{-- <link rel="stylesheet" href="{{asset('css/style.css')}}" /> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link  href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <style>
        .login{
            /* background-color: blue; */
        }
    </style>
      {{-- @vite('resources/css/app.css') --}}
    <title>Marketing</title>
  </head>
<body>
    <section class="bg-gray-50 dark:bg-gray-900">
    <form action="{{route('postLogin')}}" method="POST" >
    {{ csrf_field() }}
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Login untuk masuk
                    </h1> 
                    @if (session('status'))
                      <div class="alert alert-danger">
                          {{ session('status') }}
                      </div>
                    @endif
                        <div>
                            <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                            <input type="username" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="username" required="">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                        </div>
                        <div class="flex items-center justify-between">
                        </div>
                        <button type="submit" class="login w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</button>
                </div>
            </div>
        </div>
    </form>
    </section>
</body>
<script>
    $(document).on('click', '.login', function(event){
        // console.log()
        let username = $('#username').val();
        let password = $('#password').val();
        // let checkboxStatus = 0;
        // let getID = 0;
        // if ($('#checked-status').is(':checked')) {
        //     checkboxStatus = 1;
        // }

        // if ($('#promoid').val() != null) {
        //     getID = $('#promoid').val();
        // }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            }
        });
        $.ajax({
            type: 'POST',
            url: "{{route('postLogin')}}",
            data: {
                // ID : getID,
                username: username,
                password: password
                // status: checkboxStatus
            },
            dataType: 'json',
            success: function(data) {
                console.log(data)
                // alert('data berhasil disimpan');
                if(data.data == 'superadmin'){
                    // console.log('super-admin')
                    window.location.href = `{{ url('/program') }}`
                }else{
                    // console.log('admin')
                    window.location.href = `{{ url('/sales') }}`
                }
            },
            error: function(data) {
                alert('Username/Password Salah!')
            }

        })
    });
</script>
</html>