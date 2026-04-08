const canvas = document.getElementById("meuCanvas");
const ctx = canvas.getContext("2d"); //ctx: contexto

ctx.beginPath();
ctx.arc(100, 100, 50, 0, Math.PI*2); //coordenadas do circulo: x,y, raio, onde começa e termina
ctx.fillStyle="#DB7093"; //cor - cores code html no google 
ctx.fill();
ctx.stroke();
ctx.closePath(); //acaba o circulo

ctx.beginPath();
ctx.rect(150, 40, 100,60); //x, y, largura e altura
ctx.fillStyle="blue";
ctx.fill();
ctx.strokeStyle="blue"; // cor linha
ctx.stroke(); 
ctx.closePath();

//Triângulo
ctx.beginPath();
ctx.moveTo(70, 170); //comece o desenho numa coordenada tal
ctx.lineTo(30, 240);
ctx.lineTo(110, 240);
ctx.fillStyle="#006400";
ctx.fill();
ctx.strokeStyle="#006400";
ctx.stroke();
ctx.closePath();
