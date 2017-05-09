@if(session()->has('flash_message'))
    <div class="alert alert-{{ session('flash_message_level') }} alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <h3>{{ session('flash_message') }}</h3>
    </div>
@endif