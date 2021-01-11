/*
function ValidateChangeParrent()
{
    var regexp;
    var nowy_rodzic = document.getElementById('nowy_rodzic');
    if (!(nowy_rodzic.disabled ||
        nowy_rodzic.style.display === 'none' ||
        nowy_rodzic.style.visibility === 'hidden'))
    {
        if (nowy_rodzic.selectedIndex < 0)
        {
            alert("Musisz wybrać nowego rodzica");
            nowy_rodzic.focus();
            return false;
        }
        if (nowy_rodzic.selectedIndex == 0)
        {
            alert("Musisz wybrać nowego rodzica");
            nowy_rodzic.focus();
            return false;
        }
    }
    return true;
}
*/

function ValidateNewName()
{
    var regexp;
    var nowa_nazwa = document.getElementById('nowa_nazwa');
    if (!(nowa_nazwa.disabled || nowa_nazwa.style.display === 'none' || nowa_nazwa.style.visibility === 'hidden'))
    {
        regexp = /^[A-Za-zÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿ \t\r\n\f0-9-]*$/;
        if (!regexp.test(nowa_nazwa.value))
        {
            alert("Nazwa może zawierać litery, cyfry i spacje");
            nowa_nazwa.focus();
            return false;
        }
        if (nowa_nazwa.value == "")
        {
            alert("Nazwa może zawierać litery, cyfry i spacje");
            nowa_nazwa.focus();
            return false;
        }
        if (nowa_nazwa.value.length < 1)
        {
            alert("Nazwa może zawierać litery, cyfry i spacje");
            nowa_nazwa.focus();
            return false;
        }
        if (nowa_nazwa.value.length > 250)
        {
            alert("Nazwa może zawierać litery, cyfry i spacje");
            nowa_nazwa.focus();
            return false;
        }
    }
    return true;
}


function ValidateNewNode()
{
    var regexp;
    var parent = document.getElementById('rodzic');
    if (!(parent.disabled ||
        parent.style.display === 'none' ||
        parent.style.visibility === 'hidden'))
    {
        if (parent.selectedIndex < 0)
        {
            alert("Musisz wybrać rodzica węzła");
            parent.focus();
            return false;
        }
        if (parent.selectedIndex == 0)
        {
            alert("Musisz wybrać rodzica węzła");
            parent.focus();
            return false;
        }
    }
    var name = document.getElementById('nazwa');
    if (!(name.disabled || name.style.display === 'none' || name.style.visibility === 'hidden'))
    {
        regexp = /^[A-Za-zÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿ \t\r\n\f0-9-]*$/;
        if (!regexp.test(name.value))
        {
            alert("Nazwa może zawierać litery, cyfry i spacje");
            name.focus();
            return false;
        }
        if (name.value == "")
        {
            alert("Nazwa może zawierać litery, cyfry i spacje");
            name.focus();
            return false;
        }
        if (name.value.length < 1)
        {
            alert("Nazwa może zawierać litery, cyfry i spacje");
            name.focus();
            return false;
        }
        if (name.value.length > 250)
        {
            alert("Nazwa może zawierać litery, cyfry i spacje");
            name.focus();
            return false;
        }
    }
    return true;
}

function addToList(nazwa, id) {

    var option = document.createElement("option");
    option.text = nazwa;
    option.value = id;
    var option2 = document.createElement("option");
    option2.text = nazwa;
    option2.value = id;
    rodzic.add(option);
    //nowy_rodzic.add(option2);
}

// Dodaje ID węzła do formularza

function setNodeId(id) {
    //document.getElementById('id_wezla').value=id;
    document.getElementById('id_wezla2').value=id;
    document.getElementById('id_wezla3').value=id;
}

function setNewNameInputVal(name){
    document.getElementById('nowa_nazwa').value=name;
}

// Rozwija wszystkie gałęzie drzewa

var rozwiniete = 0;

function expandTree() {

    if(rozwiniete == 0) {
        rozwiniete = 1;
        $("#tree-container").jstree('open_all');
    } else {
        rozwiniete = 0;
        $("#tree-container").jstree('close_all');
    }


}

function sendPOST(form){

    var url = form.attr('action');

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        url: url,
        data: form.serialize(),
        success: function(data)
        {

            if(data.status == 'success'){

                updateTree(true);

                $('#rodzic').empty();
                countries = data.countries;
                var i;
                for (i = 0; i < countries.length; i++) {
                    addToList(countries[i].text, countries[i].id);
                }

                setNewNameInputVal('');

            }

            alert(data.response);
        }
    });
}

function updateTree(refresh = false){
    if(refresh)
        $('#tree-container').jstree("destroy");

    $('#tree-container')
        // listen for event
        .on('changed.jstree', function (e, data) {
            var i, j, r = [];
            for(i = 0, j = data.selected.length; i < j; i++) {
                r.push(data.instance.get_node(data.selected[i]).id);
                r.push(data.instance.get_node(data.selected[i]).text);
            }
            var idWezla = r[0];
            var textWezla = r[1];

            setNodeId(idWezla);
            setNewNameInputVal(textWezla);
        })

    $('#tree-container').jstree({
        'plugins': ["wholerow", "dnd"],
        //"dnd": {
        //    check_while_dragging: true
        //},
        'core' : {
            "check_callback" : true,
            'multiple' : false,

            'data' : {
                "url" : "./index.php/prepare",
            }
        },
    });
}





function saveChanges(ids, changedWith){

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        url: "./index.php/moveNode",
        data: {
            'ids'               : ids,
            'changedWith'       : changedWith,
        },
        success: function(data)
        {
            if(data.status == 'success'){

            }
        }
    });


}








