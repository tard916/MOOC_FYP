function navbarDropdown(){
    var userID = document.getElementById("navbarDropdown").value;       
    var http = new XMLHttpRequest();
    var url = "../backend/ckle.php";
    var params = "userID="+userID;
    http.open("POST", url, true);

    //Send the proper header information along with the request
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    /* http.onreadystatechange = function() {//Call a function when the state changes.
        if(http.readyState == 4 && http.status == 200) {
            if(http.responseText == 1){
            alert("Login is successfull");
            }
            else{
            alert("Invalid Username or Password");
            }
        }
        else{
        alert("Error :Something went wrong");
        }
    }*/
    http.send(params);
}