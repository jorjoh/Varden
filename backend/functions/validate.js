/**
 * Created by roed on 09.03.2016.
 */

//Validering av bilder
function validate(title, photographer) {
    if(photographer.length < 1 || title.length < 1) {
        return false;
    }
    else {
        return true;
    }
}