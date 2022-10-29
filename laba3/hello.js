const table = document.createElement("table");
let lineNumber=0;

function addTable() {
    if (document.getElementById('table') !=null){
        alert("Уже есть");
    }
    else {

        table.innerHTML = "<table>\n" +
            "<tr>\n" +
            "      <th>\n" +
            lineNumber+
            "      </td>\n" +
            "     </td>\n" +
            "      <td>\n" +
            "      </td>\n" +
            "</tr>"
            "              </table>";

        table.setAttribute('id','table')
        document.body.append(table);
        lineNumber++;
    }
}

function addLine(){
    let tab = table.insertRow();
    tab.insertCell().append(lineNumber);
    tab.insertCell().append("Хочу 5");
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