function decryptString(ciphertext) {
    return CryptoJS.AES.decrypt(ciphertext, sessionStorage.getItem('key')).toString(CryptoJS.enc.Utf8)
}
String.prototype.escape = function() {
    var tagsToReplace = {
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;'
    };
    return this.replace(/[&<>]/g, function(tag) {
        return tagsToReplace[tag] || tag;
    });
};
function clearAESkey() {
    sessionStorage.clear();
}
