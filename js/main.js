function showExpense(str) {
  if (!str) {
    document.getElementById("expense").innerHTML = "";

    return;
  } else {
    if (window.XMLHttpRequest) {
      xmlhttp = new XMLHttpRequest();
    } else {
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("expense").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "display-expenses-table.php?energie=" + str, true);
    xmlhttp.send();
  }

}
