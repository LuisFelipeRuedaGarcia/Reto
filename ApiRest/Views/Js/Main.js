import { GetCampers } from "./API.js";
addEventListener("DOMContentLoaded", ()=>{
    RenderCampers();
})
let tbody = document.querySelector("tbody");
async function RenderCampers(){
    let Campers = await GetCampers()
    console.log(Campers);
Campers.forEach(Camper => {
    tbody.insertAdjacentHTML("beforeend", /*html*/`<tr>
    <td>${Camper["IdCamper"]}</td>
    <td>${Camper["NombreCamper"]}</td>
    <td>${Camper["ApellidoCamper"]}</td>
    <td>${Camper["FechaNacimiento"]}</td>
    <td>${Camper["IdRegion"]}</td>
    <td><button type="button" id='btnCamper${Camper['IdCamper']}'>Eliminar</button></td>
    </tr>
    </tr>
    `)
let form = document.querySelector("form");
form.addEventListener("submit", (e) => {
 formDataCamper(e);
})
    function formDataCamper(e){
        e.preventDefault();
        let dataform = Object.fromEntries(new FormData(e.target))
        let newCamperModel = {
IdCamper: dataform.IdCamper,
NombreCamper: dataform.NombreCamper,
ApellidoCamper: dataform.ApellidoCamper,
FechaNacimiento: dataform.FechaNacimiento,
IdRegion: dataform.IdRegion,
        }
        console.log(newCamperModel);
        postCamper(newCamperModel);
    }
});

async function postCamper(object){
try {
    await fetch("http://localhost/ArTeM01-047/Reto/ApiRest/Controllers/Camper.php?op=Insert", {
        method: "POST",
        body: JSON.stringify(object),
        headers: {
          "Content-Type": "application/json"
        }
      })
} catch (error) {
    console.log(error);
}
}
}
