function Caballo(e) {

            $(".cuadro").removeClass("verde activo");
            cuadroM(e);
            let x = +e.target.dataset.x;
            let y = +e.target.dataset.y;
            console.log(x);
            console.log(y);
            let j = 2;
            for (let i = 1; i < 3; i++) {
                $(`.cuadro[data-x=${x - i}][data-y=${y + j}]`).addClass('activo');
                $(`.cuadro[data-x=${x - i}][data-y=${y - j}]`).addClass('activo');
                $(`.cuadro[data-x=${x + i}][data-y=${y + j}]`).addClass('activo');
                $(`.cuadro[data-x=${x + i}][data-y=${y - j}]`).addClass('activo');
                j--;
            }
        }

const cuadroM = (e) => {
    e.target.classList.add("verde");
}

const Dibujar = () => {
    let salida = "";
    let m = 0;
    for (let i = 0; i < 8; i++) {
        for (let j = 0; j < 8; j++) {
            m++;
            if (m % 2 == 0) {
                salida += `<div data-x=${i} data-y=${j} class = "cuadro negro"></div>`;
            } else {
                salida += `<div data-x=${i} data-y=${j} class = 'cuadro blanco'></div>`;
            }
        }
        m++;
    }
    $(".tabla").html(salida);
    $(".cuadro").bind("click", Caballo);

};
Dibujar();