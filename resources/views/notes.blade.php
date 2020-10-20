@extends('layouts.app')

@section('content')
    <a href="/note/new" class="btn btn-primary">new entry</a>
    <div id="note-container">
        <table id="notes" class="table table-striped">
            <thead>
            <tr>
                <th>Time</th>
                <th>Title</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>










    <div class="modal fade" id="keyEntryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="keyEntryModalLabel">Enter Decryption Key</h5>
                </div>
                <form class="form-inline" onsubmit="saveAESkey();">
                    <div class="modal-body">
                        Enter the key you use to encrypt your notes.
                        <div class="form-group mx-sm-3 mb-2">
                            <label for="input-keyEntryModal-decrpytionkey" class="sr-only">Decryption Key</label>
                            <input type="password" class="form-control" id="input-keyEntryModal-decrpytionkey"
                                   placeholder="correcthorsebatterystaple">
                        </div>
                        <button type="submit" class="btn btn-primary">Decrypt</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="/js/sha256.min.js"></script>
    <script src="/js/aes.js"></script>
    <script src="/js/moment.js"></script>
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="/js/app.js"></script>
    <script src="/js/notes.js"></script>

@endsection
@section('css')
    <link href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection
