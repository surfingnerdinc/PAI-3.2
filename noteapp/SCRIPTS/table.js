/* dziala tylko w polowie */
function selectedRow() {
    selTab = document.getElementById('mytable')
    selTabRowsLength = selTab.rows.length

    for (var i = 1; i < selTabRowsLength; i++) {
        selTab.rows[i].onclick = function () {
            ('tr').click(function () {
                (this).addClass("selected").siblings().removeClass("selected");
            });
        }
    }
}

rowCounter = document.getElementsByTagName('tr').length-1
document.getElementById('rowCounter').innerHTML = ("Notes counter: " + rowCounter)