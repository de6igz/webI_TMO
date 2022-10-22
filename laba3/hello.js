const table = document.createElement("table");
let lineNumber=1;

function addTable() {
    if (document.getElementById('table') !=null){
        alert("Уже есть");
    }
    else {

        table.innerHTML = "<table>\n" +
            "    <tr>\n" +
            "        <th>\n" +
            "           Нулевая строка \n" +
            "        </th>\n" +
            "    </tr>\n" +
            "</table>";

        table.setAttribute('id','table')
        document.body.append(table);
    }
}

function addLine(){
    let tab = table.insertRow();
    tab.insertCell();
    tab.append(lineNumber);
    lineNumber++;
}
function deleteLine(){
    if (document.getElementById('num').value=="") {
        alert("Должно быть число, а не пустота");
        return null;
    }
    num = document.getElementById('num').value;
    try {
        table.deleteRow(num);
    }
    catch (DOMexcepion){
        alert("такой строки нет")
    }

}