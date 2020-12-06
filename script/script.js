function show(id) {
    let selct_id = document.getElementById(id);
    selct_id.style.visibility = "visible";
    location.href = "#" + id
}

function sembunyi(id) {
    let select_query = document.getElementById(id);
    select_query.style.visibility = "hidden";
}