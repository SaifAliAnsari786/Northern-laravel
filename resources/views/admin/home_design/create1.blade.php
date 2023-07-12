<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Laravel 9 Summernote Editor Image Upload Example</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css" />
</head>

<body>
<div class="container mt-5">
    <h1>Laravel 9 Summernote Editor Image Upload Example - ItSolutionStuff.com</h1>
    {{--    <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">--}}
    <form method="post"  enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" />
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea id="editor1" name="body"></textarea>
        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-success btn-block">Publish</button>
        </div>
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.js"></script>
{!! Html::script('ckeditor_4.14.0_standard/ckeditor/ckeditor.js') !!}


<script type="text/javascript">
    $(document).ready(function () {
        // CKEDITOR.replace( 'editor1' );
        // $('#summernote').summernote({
        //     height: 300,
        // });

        CKEDITOR.replace( 'editor1' );

        ClassicEditor
            .create( document.querySelector( '#body1' ),{
                ckfinder: {
                    uploadUrl: '{{route('image.upload').'?_token='.csrf_token()}}',
                }
            })
            .catch( error => {
                console.error( error );
            } );
    });
</script>

</body>
</html>
