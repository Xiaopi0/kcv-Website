<link rel="stylesheet" href="../assets/css/menu.css">
<script charset="utf-8">
/* Open the sidenav */
function openNav() {
  document.getElementById("mySidenav").style.width = "100%";
}

/* Close/hide the sidenav */
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="http://kcv/Home">Hjem</a>
  <a href="http://kcv/msgs/?t=in">Inbox</a>
  <a href="http://kcv/msgs/?t=out">Outbox</a>
  <a href="http://kcv/msgs/?t=sendmsg">Send Besked</a>
  <a href="http://kcv/Upload">Upload Fil</a>
</div>

<!-- Use any element to open the sidenav -->
<span class="menu" onclick="openNav()"><img src="../assets/images/list.png"></span>
