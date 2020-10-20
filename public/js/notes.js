// A $( document ).ready() block.
$(document).ready(function () {
    console.log("page ready!");
    let aeskey = sessionStorage.getItem('key');
    if (aeskey) {
        loadNotes();
    } else {
        console.log("key wasn't found for current session, prompting user for key");
        $("#keyEntryModal").modal();
    }
});

function saveAESkey() {
    sessionStorage.setItem('key', sha256($("#input-keyEntryModal-decrpytionkey").val()));
    $("#keyEntryModal").modal('dispose');
}

function loadNotes() {
    $.ajax({
        type: "GET",
        url: '/api/getallnotes',
        success: function (data) {
            data.forEach(addEntry)
        },
        error: function (request, status, error) {
        }
    });
}

function addEntry(item) {
    var decryptedTitle;
    if (item.title == null) {
        decryptedTitle = "&lt;untitled&gt;";
    }
    else
    {
        decryptedTitle = decryptString(item.title).escape()
    }
    $("#notes").append('<tr data-noteid="' + item.id + '">\n' +
        '                   <td>' + moment(item.updated_at).fromNow() + '</td>\n' +
        '                   <td>' + decryptedTitle + '</td>\n' +
        '                   <td>\n' +
        '                       <a class="btn btn-primary btn-sm-0 deleteEntryButton" data-entryid="' + item.id + '" href="/note/edit/' + item.id + '">Edit</a>\n' +
        '                   </td>\n' +
        '                </tr>')
}


