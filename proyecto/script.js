$(function() {

//.children .last .prev .first .next. parent, parents, closest, prepend, append, before, after

    // $("a").on("click",function() {
    //     alert("Cuidado");
    // // });
    alert("Una vez sean ingresadas las calificaciones, no se modificaran ni se eliminaran.");
    console.log("asjkashd");
    let tablas = $("table").children();
    let tbodys = new Array(tablas.length);
    console.log(tablas);
    let id_prog = document.getElementById("cali_prog");
    
    let id_cons = document.getElementById("cali_cons");
    let id_design = document.getElementById("cali_design");
 
    if (id_prog !== null) {
        $("#btn_prog").remove();
    }
    if (id_cons !== null) {
        $("#btn_cons").remove();
    }
    if (id_design !== null) {
        $("#btn_design").remove();
    }
    // $("#btn_prog").remove();
    // $("#btn_design").remove();
    // $("#btn_cons").remove();
    // console.log(tbodys);
    // if(tablas[1].textContent !== "Calificar"){
    //     $("#btn_cons").remove();
    // }
    // if(tablas[].textContent !== "Calificar"){
    //     $("#btn_cons").remove();
    // }
    // if(tablas[1].textContent !== "Calificar"){
    //     $("#btn_cons").remove();
    // }
    //console.log(tablas[1].textContent);
});