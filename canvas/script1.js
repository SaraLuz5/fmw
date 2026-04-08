const canvas = document.getElementById("meuCanvas");
const ctx = canvas.getContext("2d"); 

let circulo={
    x:100,
    r:50,
    desenhar:function(y) {
        ctx.beginPath();
        ctx.arc(this.x,y,this.r,0,Math.PI*2)
        ctx.strokeStyle="#FFF0F5"; // stoke:borda
        ctx.fillStyle="#D8BFD8"; // fill:dentro
        ctx.fill();
        ctx.stroke();
        ctx.closePath();
    },
    mover:function () {
        this.x++; //mexe 1 x
    }
};

function executar(){
    ctx.clearRect(0,0,canvas.width,canvas.height);
    circulo.desenhar(100);
    circulo.desenhar(200);
    circulo.mover();
    requestAnimationFrame(executar);
}

executar();