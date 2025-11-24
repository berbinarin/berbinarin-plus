<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="X-UA-Compatible" content="ie=edge" />
<title>Berbinar Insightful Indonesia</title>

<!-- Add DataTables CSS -->
<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css" rel="stylesheet">

<!-- DataTables Custom Styling -->
<style>
    .dataTables_wrapper .dataTable thead th {
        padding: 1rem;
        background-color: white;
        border-bottom: 1px solid #e5e7eb;
    }

    /* Keep Tailwind's text alignment classes */
    .dataTables_wrapper .dataTable thead th.text-center {
        text-align: center !important;
    }

    .dataTables_wrapper .dataTable thead th.text-left {
        text-align: left !important;
    }

    .dataTables_wrapper .dataTable thead th.text-right {
        text-align: right !important;
    }
</style>

<!-- Other existing styles -->
<link rel="shortcut icon" href="{{ asset('assets/images/landing/logo/logo-berbinar.webp') }}" type="image/x-icon" />
<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
@vite('resources/css/app.css')
