function show() {
    $.get("script/show.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}

function add() {
    var id = $("#id").val();
    var name = $("#name").val();
    var year = $("#year").val();

    //push data to model
    $.post("script/add.php", {
        id: id,
        name: name,
        year: year
    }, function (data, status) {
        // close popup
        $("#add_new_car_modal").modal("hide");
        show();
        $("#id").val("");
        $("name").val("");
        $("year").val("");
    });
}

function detail(id) {
    $("#hidden_id").val(id);

    $.post("script/detail.php", {
        id: id
    }, function (data, status) {
        var car = JSON.parse(data);
        $("#update_id").val(car.id);
        $("#update_name").val(car.name);
        $("#update_year").val(car.year);

        $("#update_car_modal").modal("show");
    });
}
function update() {
    var idOld = $("#hidden_id").val();
    var id = $("#update_id").val();
    var name = $("#update_name").val();
    var year = $("#update_year").val();
    $.post("script/update.php", {
        idOld: idOld,
        id: id,
        name: name,
        year: year
    }, function (data, status) {
        $("#update_car_modal").modal("hide");
        show();
    }
    );
}

function delCar(id) {
    var del = confirm("Do you really want to delete this Car?");
    if (del == true) {
        $.post("script/delete.php", {
            id: id
        },
                function (data, status) {
                    show();
                }
        );
    }
}

$(document).ready(function () {
    show();
});