@if($color == 'red')
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5 style="margin-bottom:0px;"><i class="icon fas fa-exclamation-triangle"></i> Ooops! {{ $slot }}</h5>
    </div>
@endif

@if($color == 'orange')
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5 style="margin-bottom:0px;"><i class="icon fas fa-exclamation-triangle"></i>  Ooops! {{ $slot }}</h5>
    </div>
@endif

@if($color == 'green')
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5 style="margin-bottom:0px;"><i class="icon fas fa-thumbs-up"></i> {{ $slot }}</h5>
    </div>
@endif