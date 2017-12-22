/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var _ChangeOnScroll = __webpack_require__(1);

var _ChangeOnScroll2 = _interopRequireDefault(_ChangeOnScroll);

var _VezbaUKonzoli = __webpack_require__(2);

var _VezbaUKonzoli2 = _interopRequireDefault(_VezbaUKonzoli);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

//da je u istom folderu kao i app.js bio bi from './ChangeOnScroll'
var scrolled = new _ChangeOnScroll2.default();

console.log(_VezbaUKonzoli2.default.prviPar);
console.log(_VezbaUKonzoli2.default.drugiPar);

var auto = new _VezbaUKonzoli.Auto("putnicko");
auto.izracunajBrojTockova();
console.log(auto);

var bicikl = new _VezbaUKonzoli.Auto("bicikl");
bicikl.izracunajBrojTockova();
console.log(bicikl);

/***/ }),
/* 1 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
	value: true
});

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var ChangeOnScroll = function ChangeOnScroll() {
	_classCallCheck(this, ChangeOnScroll);

	var a = 5;
	var b = 6;
	var c = a + b;
	console.log(c);
};

exports.default = ChangeOnScroll;

/***/ }),
/* 2 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var MojObjekat = function () {
    var prvi = 'Prvo svojstvo';
    var drugi = "Drugo svojstvo";
    return {
        prviPar: prvi,
        drugiPar: drugi
    };
}();

var Auto = function () {
    function Auto(vrsta) {
        var brojTockova = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 4;

        _classCallCheck(this, Auto);

        this.vrsta = vrsta;
        this.brojTockova = brojTockova;
    }

    _createClass(Auto, [{
        key: "izracunajBrojTockova",
        value: function izracunajBrojTockova() {
            if (this.vrsta != "putnicko") {
                this.brojTockova = 2;
                console.log("Bicikl ima " + this.brojTockova + " tocka");
            } else {
                console.log("Automobil ima " + this.brojTockova + " tocka");
            }
        }
    }]);

    return Auto;
}();

exports.default = MojObjekat;
exports.Auto = Auto;

/***/ })
/******/ ]);