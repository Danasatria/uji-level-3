function tambahItem(id) {
    $.get('addsession.php?session=' + id);
    location.reload();
}

function kurangItem(id) {
    $.get('kurangSession.php?session=' + id);
    location.reload();
}

function hapusItem(id) {
    $.get('sessionDel.php?session=' + id);
    location.reload();
}
