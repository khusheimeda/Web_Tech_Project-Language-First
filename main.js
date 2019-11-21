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
      d4.setAttribute("class","col-sm-6");
      var d5= document.createElement("div");
      d5.setAttribute("class","well");
      var p2 = document.createElement("p");
      p2.textContent = "Bite(Please)";
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
      p4.textContent = "Bitte*";
      d11.appendChild(p4);
      d10.appendChild(d11);
      d6.appendChild(d10);
      console.log(d1);
    }
  
  }
  