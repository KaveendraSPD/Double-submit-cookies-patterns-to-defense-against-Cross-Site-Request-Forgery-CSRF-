//uncomment *** marked comments if you want to see the flow of process
function tokenRequest(cookie) {
  //get cookies
  var cookieSet = document.cookie;
  //***alert(cookieSet);
  var EditedcookieSet = cookieSet.replace(/ /g,"");
  var arr = EditedcookieSet.split(";");
  var arrSize = arr.length;
  var csrfToken = "";
  var i = 0;
  //search for csrf token
  while(i <= arrSize){
    var element = arr[i];
    var result = element.match(cookie+"=");
    if(result != null){
      var arr2 = arr[i].split("=");
      csrfToken = arr2[1];
      break;
    }
    i++;
  }
  document.getElementById("MyToken").setAttribute("value", csrfToken);
}
