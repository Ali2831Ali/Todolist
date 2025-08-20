<!DOCTYPE html>
<html lang="en" xmlns:livewire="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('app/master/style.css')}}">
    @livewireStyles
    @stack('styles')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

</head>
<body>

@livewire('Sidebar')

@livewireScripts


@stack('scripts')
<script>
    function dataLoader() {
        return {
            loading: false,
            result: '',
            loadData() {
                this.loading = true;
                fetch('/my-data')  // اینجا آدرس روت خودت رو بزن
                    .then(res => res.json())
                    .then(data => {
                        this.result = data.message;
                    })
                    .catch(() => {
                        this.result = 'خطا در دریافت اطلاعات';
                    })
                    .finally(() => {
                        this.loading = false;
                    });
            }
        }
    }
</script>
</body>
</html>
