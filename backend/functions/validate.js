/**
 * Created by roed on 09.03.2016.
 */

//Validering av bilder
function validate(photographer) {
    if(photographer.length < 1) {

        return false;
    }
    else {
        console.log("photographer = " + photographer.toString());
        return true;
    }
}