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
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
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
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/Mymain.js":
/*!********************************!*\
  !*** ./resources/js/Mymain.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// Start Confirmation Box
$(function () {
  $('#edit-preferences').click(function () {
    $('#edit-preferences-modal').addClass('is-active');
  });
  $('.modal-card-head button.delete, .modal-save, .modal-cancel').click(function () {
    $('#edit-preferences-modal').removeClass('is-active');
  });
}); // End Confirmation Box
//
//   $(document).ready(function() {
//     $('#DataTable').DataTable();
//     $('.datepicker').datepicker({
//         format: "yyyy-mm",
//         startView: "months",
//         minViewMode: "months",
//
//      });
// } );

$('.add-friend').click(function (e) {
  e.preventDefault();
  var friend_id = $(this).attr("id");
  console.log(friend_id);
  var data = {
    friend_id: friend_id
  };
  axios.post('/add-friend', data).then(function (response) {
    e.target.innerHTML = "Cancel Request"; // e.currentTarget.parentElement.innerHTML = "<span class='success'>Request Sent Successfully</span>";

    e.currentTarget.className = "card-footer-item button is-danger cancel-request";
  });
}); // Remove Friend or Cancel Request

$('.remove-friend').click(function (e) {
  e.preventDefault();
  var friend_id = $(this).attr("id"); // console.log(friend_id);

  var data = {
    friend_id: friend_id
  };
  axios.post('/friend/remove-friend', data).then(function (response) {
    console.log(response.data.friend_id);
    e.target.innerHTML = "Add Friend";
    e.currentTarget.className = "card-footer-item button is-info add-friend";
  });
});
$('.cancel-request').click(function (e) {
  if (confirm("Are you sure you want to Cancel Request ?")) {
    e.preventDefault();
    var friend_id = $(this).attr("id"); // console.log(friend_id);

    var data = {
      friend_id: friend_id
    };
    axios.post('/friend/cancel-request', data).then(function (response) {
      console.log(response.data.friend_id);
      e.target.innerHTML = "Add Friend";
      e.currentTarget.className = "card-footer-item button is-info add-friend";
    });
  } else {
    return false;
  }
}); // Friend Request from app nav

$('.friendRrequest').click(function (e) {
  e.preventDefault();
  var request = e.target.previousElementSibling == null;
  var userid = e.target.parentNode.dataset['userid'];
  console.log(userid);
  console.log(request);
  var data = {
    isRequest: request,
    user_id: userid
  };
  axios.post('/friendRrequest', data).then(function (response) {
    console.log(response.data);

    if (response.data['true']) {
      e.currentTarget.parentElement.innerHTML = "<span class='success'>You are now Friends</span>";
    } else {
      e.currentTarget.parentElement.innerHTML = "<span class='danger'>You canceled the friend request</span>";
    }
  });
});

/***/ }),

/***/ 1:
/*!**************************************!*\
  !*** multi ./resources/js/Mymain.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\RealTimeChat\resources\js\Mymain.js */"./resources/js/Mymain.js");


/***/ })

/******/ });