@extends('layouts.app')

@section('content')

    <form id="noteform">
        <input type="text" id="cleartextTitle">
        <div id="test-editor">
            <div class="form-group">
                <label for="noteeditor">Entry</label>
                <textarea class="form-control" id="noteeditor" rows="10"></textarea>
            </div>        </div>
        <p>
            <button id="editor-submit" type="submit" class="btn btn-success">Save</button>
            — <span id="savedstatus" class="text-muted">Last saved <span id="saved-time"></span></span>
        </p>

    </form>

@endsection
@section('css')
    <link rel="stylesheet" href="/editormd/css/editormd.css"/>
@endsection
@section('js')
    <script src="/js/aes.js"></script>
    <script src="/js/moment.js"></script>
    <script src="/js/app.js"></script>
    <script src="/editormd/editormd.min.js"></script>
    <script src="/editormd/languages/en.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            loadNote();

        });


        function loadNote() {
            $.ajax({
                type: "GET",
                url: '/api/getnote/{{$id}}',
                success: function (data) {

                    $('#noteeditor').html(decryptString(data.body));
                    $('#cleartextTitle').val(decryptString(data.title));
                    $('#saved-time').html(moment(data.updated_at).calendar());
                },
                error: function (request, status, error) {
                }
            });
        }

        $("#noteform").submit(function (e) {

            e.preventDefault(); // avoid to execute the actual submit of the form.
            encryptedTitle = CryptoJS.AES.encrypt($("#cleartextTitle").val(), sessionStorage.getItem('key')).toString();
            encryptedBody = CryptoJS.AES.encrypt($("#noteeditor").val(), sessionStorage.getItem('key')).toString();
            $.post("/note/edit/{{$id}}", {
                "_token": "{{ csrf_token() }}",
                title: encryptedTitle,
                body: encryptedBody
            }).done(function (data) {
                $('#saved-time').html(moment(data.updated_at).calendar());
            });
        });


    </script>


@endsection

