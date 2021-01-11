
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>Test App</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
        <link href="css/app.css" rel="stylesheet">
        <link href="css/jquery-ui.min.css" rel="stylesheet">
        <link href="css/style.min.css" rel="stylesheet">
        <link href="css/theme.css" rel="stylesheet" >
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/jstree.min.js"></script>
        <script src="js/app.js"></script>
    </head>
    <body>
    <div id="container">

       <div id="Html3" style="position:absolute;left:0px;top:270px;width:994px;height:564px;overflow:auto;z-index:51">
            <div id="tree-container"></div></div>
        <div id="Layer5" >

            <div id="Layer4" >
                <div id="wb_nowy_wezel" >
                    <form name="nowy_wezel" method="post" action="./index.php/addNode" id="nowy_wezel">
                        <input type="hidden" name="form_name" value="nowy_wezel">
                        <input type="submit" id="Button1" class="btn btn-primary" name="" value="Dodaj węzeł" style="position:absolute;left:0px;top:161px;width:210px;height:40px;z-index:1;" tabindex="3">
                        <select name="rodzic" size="1" id="rodzic" style="position:absolute;left:0px;top:109px;width:210px;height:33px;z-index:2;" tabindex="2">
                            <option selected>Wybierz...</option>
                        </select>
                        <div id="wb_Text7" style="position:absolute;left:0px;top:80px;width:135px;height:18px;z-index:3;">
                            <span style="color:#000000;font-family:Arial;font-size:15px;"><strong>Rodzic węzła:</strong></span></div>
                        <input type="text" id="nazwa" style="position:absolute;left:0px;top:32px;width:192px;height:23px;z-index:4;" name="nazwa" value="" maxlength="250" tabindex="1" autocomplete="off" spellcheck="false">
                        <div id="wb_Text8" style="position:absolute;left:0px;top:3px;width:183px;height:18px;z-index:5;">
                            <span style="color:#000000;font-family:Arial;font-size:15px;"><strong>Nazwa nowego węzła:</strong></span></div>
                    </form>
                </div>
            </div>

            <div id="Layer3" >
                <div id="wb_nowa_nazwa_form" >
                    <form name="nowa_nazwa" method="post" action="./index.php/changeNode" id="nowa_nazwa_form">
                        <input type="hidden" name="form_name" value="nowa_nazwa">
                        <input type="hidden" name="id_wezla" value="" id="id_wezla3">
                        <input type="submit" id="Button5"  name="" value="Zmień nazwę" style="position:absolute;left:0px;top:161px;width:210px;height:39px;z-index:11;" tabindex="7">
                        <div id="wb_Text6" style="position:absolute;left:0px;top:8px;width:183px;height:18px;z-index:12;">
                            <span style="color:#000000;font-family:Arial;font-size:15px;"><strong>Nowa nazwa węzła:</strong></span></div>
                        <input type="text" id="nowa_nazwa" style="position:absolute;left:0px;top:37px;width:192px;height:23px;z-index:13;" name="nowa_nazwa" value="" maxlength="250" autocomplete="off" spellcheck="false" title="6">
                    </form>
                </div>
            </div>
            <div id="Layer2" >
                <div id="wb_usun_wezel" style="position:absolute;left:13px;top:11px;width:219px;height:53px;z-index:16;">
                    <form name="usun_wezel" method="post" action="./index.php/deleteNode" id="usun_wezel">
                        <input type="hidden" name="form_name" value="usun_wezel">
                        <input type="hidden" name="id_wezla" value="" id="id_wezla2">
                        <input type="submit" id="Button7" name="" value="Usuń węzeł" style="position:absolute;left:9px;top:155px;width:210px;height:39px;z-index:15;" tabindex="8">
                    </form>
                </div>
            </div>
        </div>


        <div id="Html4" style="position:absolute;left:1039px;top:418px;width:100px;height:100px;z-index:55">
        </div>
        <input type="button" id="Button2" onclick="expandTree();return false;" name="" value="Rozwiń / zwiń drzewo" style="position:absolute;left:0px;top:869px;z-index:59;" tabindex="9">
    </div>

    @if(count($countries))
        @foreach($countries as $country)
            <script> addToList("{{$country->text}}", "{{$country->id}}"); </script>
        @endforeach
    @else
        <script> addToList("No countries", "0"); </script>
    @endif

    <script>

        $(document)
            .bind("dnd_stop.vakata", function(e, data) {
                element = data.element;
                target = data.event.target;
                if((typeof(target.attributes) != 'undefined') && (typeof(target.attributes[7]) != 'undefined')){
                    changedWith = target.attributes[7].value;

                    //ids
                    ids = data.data.nodes;

                    saveChanges(ids, changedWith);
                }

            });


        $(document).ready(function(){
            updateTree();
            }
        );

        $( "#nowy_wezel" ).submit(function() {
            if(ValidateNewNode()){
                sendPOST($(this));
            }
            return false;
        });

        $( "#nowa_nazwa_form" ).submit(function() {

            var id = document.getElementById("id_wezla3").value;

            if(id == "") {

                alert("Nie wybrano żadnego węzła");

            } else {
                if(ValidateNewName())
                    sendPOST($(this));
            }
            return false;
        });

        $("#usun_wezel").submit(function(){
            var id = document.getElementById("id_wezla2").value;

            if(id == "") {

                alert("Nie wybrano żadnego węzła");

            } else {
                sendPOST($(this));
            }
            return false;
        });


    </script>

    </body>

</html>
