function getDataPaginate() {
    event.preventDefault();

    let enlace = $(event.target);
    let valor = parseInt(enlace.text());

    $(event.target).addClass("active");
    axios.get('/giveproducts?page='+valor)
        .then(function (response) {
            $('#productlist').html(response.data);
            attachAsyncTask();
        }).catch(function (error) {
        console.log(error);
    })

}


function attachAsyncTask() {
    $(".pagination > li > a").on('click', getDataPaginate);
}


$(function () {
    attachAsyncTask();
});