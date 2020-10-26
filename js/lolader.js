/**
 * Created by Theo on 09.10.2020.
 */
function checkup(str) {
   var d = document;
    
    if (str.length > 0)
    {
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            if (this.readyState==4 && this.status==200) {
               jQuery("#resultTable").find('tbody').append(this.responseText);
            }
        };
        xmlhttp.open("GET","actionCrawler.php?q="+str,true);
        xmlhttp.send();
    }

}