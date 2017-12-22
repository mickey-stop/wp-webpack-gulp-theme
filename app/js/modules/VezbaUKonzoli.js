var MojObjekat=(function(){
    var prvi='Prvo svojstvo';
    var drugi=`Drugo svojstvo`;
    return {
        prviPar: prvi,
        drugiPar:drugi
    }
})();
class Auto{
    constructor(vrsta,brojTockova=4){
        this.vrsta=vrsta;
        this.brojTockova=brojTockova;
    }
    izracunajBrojTockova(){
        if(this.vrsta!="putnicko"){
            this.brojTockova=2;
            console.log("Bicikl ima "+this.brojTockova+" tocka");
        }
        else{
            console.log("Automobil ima "+this.brojTockova+" tocka")
        }
    }
}
export default MojObjekat;
export {Auto};