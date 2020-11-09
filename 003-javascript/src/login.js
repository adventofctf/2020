function checkPass()
{
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    var novi = '-NOVI';

    if (password == btoa(username + novi)) {
        window.setTimeout(function() {
            window.location.assign('inde' + 'x.php?username='+ username +'&password=' + password);
        }, 500);
    }
}
