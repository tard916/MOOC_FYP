function navbarDropdown(){
    var userID = document.getElementById("navbarDropdown").value;       
    var http = new XMLHttpRequest();
    var url = "../backend/ckle.php";
    var params = "userID="+userID;
    http.open("POST", url, true);
    
    //Send the proper header information along with the request
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.onreadystatechange = function() {//Call a function when the state changes.
        console.log(params);
    }
    http.send(params);
}