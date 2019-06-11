function openNav() {
  document.getElementById("mySidenav").style.width = "20%";
  document.getElementById("mouse").style.left = "20%";
  document.getElementById("body").style.margin = "0% 0% 0% 20%";
  document.getElementById("body").style.transform = " scale(0.8)";
  document.getElementById("body2").style.margin = "0% 0% 0% 20%";
  document.getElementById("body2").style.transform = " scale(0.8)";
  document.getElementById("title").style.margin = "2% 5% 0% 29%";
  document.getElementById("title").style.fontSize = "2.4vw";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0%";
  document.getElementById("mouse").style.left = "0%";
  document.getElementById("body").style.margin = "2% 5% 3% 10%";
  document.getElementById("body").style.transform = " scale(1)";
  document.getElementById("body2").style.margin = "1% 5% 1% 10%";
  document.getElementById("body2").style.transform = " scale(1)";
  document.getElementById("title").style.margin = "2% 5% 0% 11%";
  document.getElementById("title").style.fontSize = "3vw";
}
