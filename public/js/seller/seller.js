/*var buttonDescription = document.getElementById("description");
    buttonDecription.onclick = load_div_edit;

    function load_div_edit(onclick) {
        var divDescription = document.createElement('div');
        document.getElementsById('img_seller').appendChild(divDescription);
        divDescription.setAttribute("class", "description");
};


var buttonDescription = document.getElementById("description");
buttonDescription.addEventListener('click',load_div_edit,false);




        //supp txtarea
        var removetxt = document.getElementById('txtDescription');
        removetxt.parentNode.removeChild(removetxt);

        //supp btn valider
        var removebtn = document.getElementById('btnValider');
        removebtn.parentNode.removeChild(removebtn);





        var removediv = document.getElementById('divDescription');
        removediv.parentNode.removeChild(removediv);

        function load(){
        load_description();
    }

    function supp_description(){
        //supp btn edit
        var removebtn = document.getElementById('btnDescription');
        removebtn.parentNode.removeChild(removebtn);

        

        load_div_edit();
    }

        
*/

       /*function load_div_edit() {
        //supp div
        var removediv = document.getElementById('divDescription');
        removediv.parentNode.removeChild(removediv);

        //creer div
        var divDescription = document.createElement('div');

        //position div
        var ancreDescription = document.getElementById('ancre');
        ancreDescription.appendChild(divDescription);
        divDescription.setAttribute("id", "divDescription");
        
        //contenu div
        divDescription.innerHTML='Modifier votre description ci-dessous : ';
        //creer form + input + btnValider
        var formDescription = document.createElement('form');
        var txtDescription = document.createElement('textarea');
        var btnValider = document.createElement('button');

        //form
        divDescription.appendChild(formDescription);
        formDescription.setAttribute("id", "formDescription");
        formDescription.setAttribute("method", "POST");
        formDescription.setAttribute("action", "");

        //input
        formDescription.appendChild(txtDescription);
        txtDescription.setAttribute("id", "txtDescription");
        txtDescription.setAttribute("name", 'txtDescription');

        //btn
        formDescription.appendChild(btnValider);
        btnValider.setAttribute("id", "btnValider");
        btnValider.setAttribute("onclick", "load_description()");
        btnValider.setAttribute("type", "button")
        btnValider.innerHTML ="Valider";
    };

    function load_description() {
        //supp div
        var removediv = document.getElementById('divDescription');
        removediv.parentNode.removeChild(removediv);

        //creer div
        var divDescription = document.createElement('div');

        //position div
        var ancreDescription = document.getElementById('ancre');
        ancreDescription.appendChild(divDescription);
        divDescription.setAttribute("id", "divDescription");

        //contenu div
        //rempli div de notre txt
        divDescription.innerHTML='txt BD';

        //creer btn edit pour modifier
        var btnEdit = document.createElement('button');
        divDescription.appendChild(btnEdit);
        btnEdit.setAttribute("id", "btnEdit");
        btnEdit.setAttribute("onclick", "load_div_edit()");
        btnEdit.setAttribute("type", "button")
        btnEdit.innerHTML ="Edit"

    };*/

    function load_description(){
        //supp div
        var removediv = document.getElementById('divDescription');
        removediv.parentNode.removeChild(removediv);

        //creer div
        var divDescription = document.createElement('div');

        //position div
        var ancreDescription = document.getElementById('ancre');
        ancreDescription.appendChild(divDescription);
        divDescription.setAttribute("id", "divAddDescription");

        //contenu div
        //rempli div de notre txt
        divDescription.innerHTML='txt BD';

        //creer btn edit pour modifier
        var btnEdit = document.createElement('button');
        divDescription.appendChild(btnEdit);
        btnEdit.setAttribute("id", "btnEdit");
        btnEdit.setAttribute("type", "button")
        btnEdit.innerHTML ="Edit"

    }