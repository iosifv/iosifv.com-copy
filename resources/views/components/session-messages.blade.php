@if (Session::has('error'))
    <script>
        M.toast({
            html: '{!! Session::get('error') !!}',
            classes: 'red darken-4'
        })
    </script>
@endif

@if (Session::has('message'))
    <script>
        M.toast({
            html: '{!! Session::get('message') !!}',
            classes: 'teal accent-2'
        });
    </script>
@endif

@if (Session::has('success'))
    <script>
        M.toast({
            html: '{!! Session::get('success') !!}',
            classes: 'light-green darken-3'
        });
    </script>
@endif