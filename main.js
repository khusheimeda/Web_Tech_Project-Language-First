function text_query()
{
  var txt = document.getElementsByTagName("textarea")[0];
  txt.addEventListener("input", get_text, false);
}
var a;
    
function get_text()
{
  a = document.getElementsByTagName("textarea")[0].value;
  console.log(a);
}
var ans;
function reply()
{
  ans = window.prompt("Enter reply");
  document.getElementById("re").textContent = ans;
}
function delete1()
{
  document.getElementById("re").textContent = " ";
}
window.onload = function(){
    
    var btn = document.getElementById("btnpost");
    console.log(btn);
  //   debugger;
    btn.addEventListener("click", create_query, false);
    function create_query(e){
      console.log(e);
      var d1 = document.createElement("div");
      d1.setAttribute("class","row");
      var d2= document.createElement("div");
      d2.setAttribute("class","col-sm-2");
      var d3= document.createElement("div");
      d3.setAttribute("class", "well");
      var p1 = document.createElement("p");
      p1.textContent = "John";
      var img1 = document.createElement("img");
      img1.setAttribute("src", "g1.gif");
      img1.setAttribute("class", "img-circle");
      img1.setAttribute("height", "35");
      img1.setAttribute("width","35");
      d3.appendChild(p1);
      d3.appendChild(img1);
      d2.appendChild(d3);
      d1.appendChild(d2);
      var d4= document.createElement("div");
      d4.setAttribute("class","col-sm-8");
      var d5= document.createElement("div");
      d5.setAttribute("class","well");
      var p2 = document.createElement("p");
      p2.textContent = a;
      p2.setAttribute("style","color:black;");
      var d6 = document.createElement("div");
      d6.setAttribute("class","row");
      var d7= document.createElement("div");
      d7.setAttribute("class","col-sm-2");
      var d8= document.createElement("div");
      d8.setAttribute("class","well");
      var p3 = document.createElement("p");
      p3.textContent = "Shawn";
      d8.appendChild(p3);
      d7.appendChild(d8);
      d6.appendChild(d7);
      d5.appendChild(p2);
      d5.appendChild(d6);
      d4.appendChild(d5);
      d1.appendChild(d4);
      var d9 = document.getElementById("outermost_row");
      d9.appendChild(d1);
      var d10 = document.createElement("div");
      d10.setAttribute("class","col-sm-10");
      var d11= document.createElement("div");
      d11.setAttribute("class","well");
      var p4 = document.createElement("p");
      p4.setAttribute("id", "re");
      p4.textContent = "Bitte*";
      d11.appendChild(p4);
      d10.appendChild(d11);
      d6.appendChild(d10);
      var b1= document.createElement("input");
      b1.value="REPLY";
      b1.type="button";
      b1.id="com1";
      d2.appendChild(b1);
      var b2= document.createElement("input");
      b2.value="DELETE";
      b2.type="button";
      b2.id="com2";
      d2.appendChild(b2);
      b1.setAttribute("onClick","reply()");
			b2.setAttribute("onClick","delete1()");

      var dx = document.getElementById("query_section");
      dx.appendChild(d1);
      console.log(d1);
    }
  
  }
  