/**
 * Created by tenapercy on 4/25/15.
 */
/* UTIL FUNCTIONS */
$.support.cors = true;

$.ajaxSetup ({
    //Disables caching of AJAX Responses
    cache: false
});
var number = 101;
var makeTable = function(grid) {
    var table = $('<table id="table">');
    var topRow = ("<tr><th>AnimalID</th><th>Status</th><th>Name</th><th>Species</th><th>Breed</th><th>Sex</th><th>Size</th><th>Description</th><th>Picture</th></tr>");
    $(table).append(topRow);

    var makeRow = function(index,value) {
        var row = $("<tr>");

        var makeCell = function(key,val) {
            var cell = $("<td>");
            if(key == 'picURL') {
                cell.append('<a href="'+val+'"><img src="'+val+'"></a>');
            } else {
                cell.append(val);
            }

            $(row).append(cell);
        };
        $.each(value, makeCell);

        $(table).append(row);

    };

    //table body
    $.each(grid, makeRow);

    return table;
};

var displayAlert = function(label, details) {
    var html = "<h3>" + label + ":</h3><pre>" +
        JSON.stringify(details, null, 2) +
        "</pre>Please re-submit the form:<hr>";
    $("#output").html(html);
}

var displayError = function(jqXHR, textStatus, errorThrown) {
    alert(textStatus + "\n" + errorThrown);
};

/* Functions and variables to load, submit, and display results of the selection form */
var actionSelect;
var populateSelect;

var displaySelectResult = function(data) {
    //console.log(data);
    //$("#output").html("<pre>" + data + "</pre>");
    var json = JSON.parse(data);
    populateSelect = json.submitted;
    var query = json.query;
    var result = json.result;
    //console.log(result);
    if (Object.keys(json.errors).length > 0) {
        displayAlert("Errors", json.errors);
        return;
    }
    if (typeof json.success !== 'undefined') {
        if (result.length > 0) {
            $("#output").append(makeTable(result));
        } else {
            $("#output").append('<p id="noResults">Your search returned 0 results</p>');
        }
    }
};


/* Submit form, invoke handler for result */
/*  @param event the submit event object */

var submitSelectForm = function(event) {
    var data = new FormData($(this)[0]);
    try {
        $.ajax({
            url: actionSelect,
            type: 'POST',
            data: data,
            success: displaySelectResult,
            cache: false,
            contentType: false,
            processData: false,
            error: displayError
        });
    } catch(error) {
        alert("ajax error: " + error);
    }
    event.preventDefault();
};

var populateSelectForm = function() {
    if (typeof populateSelect !== 'undefined') {
        $('#formHolder form select[name="species"]').val(populateSelect.species);
        $('#formHolder form select[name="breed"]').val(populateSelect.breed);
        $('#formHolder form select[name="sex"]').val(populateSelect.sex);
        $('#formHolder form select[name="size"]').val(populateSelect.size);
    }
};

var redirectSelectForm = function (data) {
    actionSelect = $("#formHolder form").attr("action");
    $('#formHolder form').submit(submitSelectForm);
    populateSelectForm();
};


$(document).ready(function() {
    $("#search").click(redirectSelectForm);


    $("#toggleDes").on("click", function() {
        $("td:nth-child(8),th:nth-child(8)").toggleClass("description");
        $(".description").toggle();
    });
    $("#output").arrive("table", function() {
        var n = $("table").length;
        if (n > 1) {
            for (i=1; i<n; i++) {

                $("table")[i].style.display="none";
            }
        }
    });
});

