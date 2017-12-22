import ChangeOnScroll from './modules/ChangeOnScroll';//da je u istom folderu kao i app.js bio bi from './ChangeOnScroll'
import MojObjekat from './modules/VezbaUKonzoli';
import {Auto} from './modules/VezbaUKonzoli';

var scrolled=new ChangeOnScroll();

console.log(MojObjekat.prviPar);
console.log(MojObjekat.drugiPar);

var auto=new Auto("putnicko");
auto.izracunajBrojTockova();
console.log(auto);

var bicikl=new Auto("bicikl");
bicikl.izracunajBrojTockova();
console.log(bicikl);