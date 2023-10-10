@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Settings')
@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="title">
                <h4>Settings</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{route('admin.home')}}">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Settings
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="pd-20 card-box mb-4">
    @livewire('admin-settings')
</div>
@endsection
@push('scripts')
    <script>
        $('#change_site_logo_form').on('submit', function(e){
            e.preventDefault();
            var form         = this;
            var formdata     = new FormData(form);
            var inputFileVal = $(form).find('input[type="file"][name="site_logo"]').val();

            if(inputFileVal.length > 0){
                $.ajax({
                    url: $(form).attr('action'),
                    method: "POST",
                    data: {
                        'data': formdata,
                        '_token': "{{ csrf_token() }}",
                    },
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function(){
                        toastr.remove();
                        $(form).find('span.error-text').text('');
                    },
                    success:function(response){
                        if(response.status == 1){
                            toastr.success(response.msg);
                            $(form)[0].reset();
                        }else{
                            toastr.error(response.msg);
                        }
                    }
                });
            }else{
                $(form).find('span.error-text').text('Please, select favicon image file. PNG file type is recommende.');
            }
        });

        $('#change_site_favicon_form').on('submit', function(e){
            e.preventDefault();
            var form         = this;
            var formdata     = new FormData(form);
            var inputFileVal = $(form).find('input[type="file"][name="site_favicon"]').val();

            if(inputFileVal.length > 0){
                $.ajax({
                    url: $(form).attr('action'),
                    method: "POST",
                    data: {
                        'data': formdata,
                        '_token': "{{ csrf_token() }}",
                    },
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function(){
                        toastr.remove();
                        $(form).find('span.error-text').text('');
                    },
                    success:function(response){
                        if(response.status == 1){
                            toastr.success(response.msg);
                            $(form)[0].reset();
                        }else{
                            toastr.error(response.msg);
                        }
                    }
                });
            }else{
                $(form).find('span.error-text').text('Please, select logo image file. PNG file type is recommende.');
            }
        });
    </script>
@endpush
