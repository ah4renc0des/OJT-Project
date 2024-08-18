function showIt() {
    document.getElementById("hid").style.visibility = "visible";
  }
  setTimeout("showIt()", 3000); // after 3 seconds
  
  function closePopup() {
    document.getElementById('hid').style.visibility = 'hidden';
}
