<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ATK-PCR</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css" rel="stylesheet" >
        <link href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css" rel="stylesheet" >
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

        <!-- Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Kanit|Athiti:400,300&subset=thai,latin' rel='stylesheet'
        type='text/css'>
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/f97e59eabd.js" crossorigin="anonymous"></script>


        <style>
            .select2-selection__rendered {
                line-height: 38px !important;
            }
        
            .select2-container .select2-selection--single {
                height: 40px !important;
            }
        
            .select2-selection__arrow {
                height: 39px !important;
            }
        
        </style>
        <!-- Styles -->
        <style>
            
    * {
        font-family: 'Kanit', sans-serif;
    }

    .bg-cmpho {
    --bs-bg-opacity: 1;
    background-color: rgb(14, 128, 75) !important;
}

        </style>
    </head>
    <body>
      @include('layouts.navfrontend')
        <div class="container-fluid"> 
        @yield('content')
        </div>
   
        <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script src="https://npmcdn.com/flatpickr/dist/l10n/th.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/3.0.2/js/dataTables.responsive.js"></script>
        <script src="https://cdn.datatables.net/responsive/3.0.2/js/responsive.dataTables.js"></script>
        <script>
            $(document).ready(function() {
                $('.js-example-basic-single').select2({
                    width:'100%',
                    placeholder:'กรุณาเลือก'
                });
            });
        </script>
        @if($message = Session::get('success'))
        <script>
            $(function() {
                var Toast = Swal.mixin({
                    position: 'top-end',
                    toast: true,
                    showConfirmButton: false,
                    timer: 10000
                });
                    Toast.fire({
                    icon: 'success',
                    title: '{{ $message }}'
                })
            });
        </script>
        @endif

        @if($errors->any())
        <script>
           Swal.fire({
            title: 'พบข้อผิดพลาด',
            icon: 'warning',
            html: '<div class="text-start">'+
                        '<ul>'+
                            '@foreach ($errors->all() as $error)' +
                                '<li>{{ $error }}</li>' +
                            '@endforeach'+
                        '</ul>'+
                    '</div>'
            })
        </script>
    @endif
    </body>
    @section('script')
    @show
        
</html>
