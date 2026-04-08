const canvas = document.getElementById("meuCanvas");
canvas.heigth = window.innerHeight-50;
canvas.width = window.innerWidth -50;
const label = document.getElementById("distancia");
const ctx = canvas.getContext("2d");

const velocidade = 5;

let circulo={
    x: canvas.width/2,
    y: canvas.heigth/2,
    r: 50,
    desenhar : function () {
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.r, 0, Math.PI*2 );
        ctx.fillStyle="pink";
        ctx.fill();
        ctx.closePath();
    }
};

let circulo1 = {
    x: 100,
    y: 100,
    r: 50,
    desenhar : function () {
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.r, 0, Math.Pi*2 );
        ctx.fillStyle="purple";
        ctx.fill();
        ctx.closePath();
    }


};
let alvoX = circulo.x;
let alvoY = circulo.y;
canvas.addEventListener("mousedown" , function (ev){
    const rect=canvas.getBoundingClientReact();
    alvoX = ev.clienteX - rect.left;
    alvoY = ev.clienteY - rect.top;
    mover();

});

function mover(){
    let dx = alvoX - circulo.x;
    let dy = alvoY - circulo.y;
    let distancia = Math.sqrt(dx*dx + dy*dy);

    if(distancia > velocidade){
        circulo.x += (dx/distancia)*velocidade;
        circulo.y += (dy/distancia)*velocidade;
        ctx.clearRect(0,0,canvas.width,canvas.heigth);
        atualizar();
        requestAnimationFrame(mover);
    }
    else{
        circulo.x = alvoX;
        circulo.y = alvoY;
        ctx.clearReact(0,0,canvas.width,canvas.heigth);
        atualizar();
    }
}
function atualizar (){
    let raios = circulo.r+circulo1;
    let dist = Math.sqrt(circulo.x*circulo1.x+circulo.y - circulo1.y)-raios;
    label.innerHTML = "Distancia"+dist;
    circulo.desenhar();
    if(dist>0);
    circulo1.desenhar();

}
 circulo.desenhar();
 circulo1.desenhar();