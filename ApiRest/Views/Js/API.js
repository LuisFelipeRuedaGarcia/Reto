const Url = "http://localhost/ArTeM01-047/Reto/ApiRest/Controllers/Camper.php?op=GetAll";

export async function GetCampers(){
    try{
        const Response = await fetch(Url);
        const result = await Response.json();
        return result;
    }
    catch(error){
        return error;
    }
}