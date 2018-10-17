<!doctype html>
<html class="no-js h-100" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>SDSSU</title>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <script src="/js/third_party/sweetalert.js"></script>
        <link rel="stylesheet" href="{{url('/css/datatables-bootstrap4.min.css')}}">
        <meta name="description" content="A high-quality &amp; free Bootstrap admin dashboard template pack that comes with lots of templates and components.">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="/js/third_party/css/bootstrap4.min.css" >
        <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="/dashboard/styles/shards-dashboards.1.1.0.min.css">
        <link rel="stylesheet" href="/dashboard/styles/extras.1.1.0.min.css">
        <script async defer src="/js/third_party/button.js"></script>
        <script src="/js/third_party/sortable.js"></script>
        <style>
        table.dataTable thead th, table.dataTable thead td { border-color: #ddd!important; }
        table.dataTable.no-footer {border-color: #ddd!important;}
        </style>
    </head>
    <body class="h-100">
        <div class="container-fluid">
            <div class="row">
                @include('templates-dashboard.sidebar')
                <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
                    @yield('content')
                </main>
            </div>
        </div>
        @if (\Request::path() == 'admin/listofrooms')
               <script src="/js/room.js"></script>
        @endif
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
        <script src="/dashboard/scripts/extras.1.1.0.min.js"></script>
        <script src="/dashboard/scripts/shards-dashboards.1.1.0.min.js"></script>
        <script src="/dashboard/scripts/app/app-blog-overview.1.1.0.js"></script>
        <script src='https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js'></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
        <script>
        $(document).ready( function () {
            $('#tables').DataTable();
            $('#deleteTables').DataTable({
                "aLengthMenu": [[2, 50, 75, -1], [2, 50, 75, "All"]],
                "iDisplayLength": 2
            });
        });
        </script>
        @if (\Request::path() == 'admin/schedule'  || \Request::path() == 'admin/instructors' || \Request::path() == 'admin/scheduling')
               <script src="/js/custom.js"></script>
        @elseif(\Request::path() == 'admin/subjects')
               <script src="/js/subjects.js"></script>
        @elseif(\Request::path() == 'admin/block')
               <script src="/js/block.js"></script>
        @elseif(\Request::path() == 'admin/index')
                <script>
                    let listBox = document.querySelector('#semester');
                    let PrevValue = null;
                    let token = document.querySelector('meta[name="csrf-token"]').content;
                    listBox.addEventListener('focus', () => {
                        PrevValue = listBox.value;
                    });

                    listBox.addEventListener('change' , () => {
                       let confirmation = confirm('Would you like to change the semester?');
                       if(confirmation)
                       {
                           fetch(`/admin/index`,{
                              method: 'POST',
                              body: JSON.stringify({
                                 _token:token,
                                semested_id:listBox.value
                             }),
                              headers: new Headers({ "Content-Type": "application/json" })
                            })
                           .then((res) => res.json())
                            .then((data) => {
                                if(data.success == true)
                                {
                                      swal("Good job!", `Semester changed`, "success")
                                }
                            })
                       } else {
                            listBox.value = PrevValue;
                       }
                    });
                </script>
        @endif
        <script src="/js/addgrade.js"></script>
        <script>
         // sort: true
        Sortable.create(sortTrue, {
            animation:200,
          group: "sorting",
          sort: true,
        });

        // sort: false
        Sortable.create(sortFalse, {
            animation:200,
          group: "sorting",
          sort: false
        });

        </script>

      @if (str_contains(request()->fullUrl(),'assign'))
       <script>
            // sort: true
        Sortable.create(sortTrue, {
            animation:200,
          group: "sorting",
          sort: true,
            onMove: function (evt) {
            if (evt.to.childElementCount > 0) {
                return false;
            }
        }
        });

        // sort: false
        Sortable.create(sortFalse, {
            animation:200,
          group: "sorting",
          sort: false,
        });
        </script>
      @endif
    </body>
</html>
