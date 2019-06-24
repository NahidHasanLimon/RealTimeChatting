// Start Confirmation Box
$(() => {
  $('#edit-preferences').click(function(){
   $('#edit-preferences-modal').addClass('is-active');
  });
  $('.modal-card-head button.delete, .modal-save, .modal-cancel').click(function(){
    $('#edit-preferences-modal').removeClass('is-active');
  });
});

// End Confirmation Box


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


$('.add-friend').click(function(e){
  e.preventDefault();
  var friend_id=$(this).attr("id");
  console.log(friend_id);
  var data= {
    friend_id: friend_id
  }
  axios.post('/add-friend',data).then(response =>{


     e.target.innerHTML = "Cancel Request";
       // e.currentTarget.parentElement.innerHTML = "<span class='success'>Request Sent Successfully</span>";
         e.currentTarget.className="card-footer-item button is-danger cancel-request"
  })
})

// Remove Friend or Cancel Request
$('.remove-friend').click(function(e) {

    e.preventDefault();
    var friend_id=$(this).attr("id");
    // console.log(friend_id);
    var data = {
        friend_id: friend_id
    }
    axios.post('/friend/remove-friend', data).then(response => {
        console.log(response.data.friend_id);
        e.target.innerHTML = "Add Friend";
        e.currentTarget.className = "card-footer-item button is-info add-friend";
    })
})
$('.cancel-request').click(function(e) {

  if(confirm("Are you sure you want to Cancel Request ?")){
    e.preventDefault();
    var friend_id=$(this).attr("id");
    // console.log(friend_id);
    var data = {
        friend_id: friend_id
    }
    axios.post('/friend/cancel-request', data).then(response => {
        console.log(response.data.friend_id);
        e.target.innerHTML = "Add Friend";
      e.currentTarget.className = "card-footer-item button is-info add-friend";
    })
   }
   else{
       return false;
   }

})

// Friend Request from app nav
$('.friendRrequest').click(function(e) {

    e.preventDefault();
    var request = e.target.previousElementSibling == null;
    var userid = e.target.parentNode.dataset['userid'];
      console.log(userid);
      console.log(request);
    var data = {
        isRequest: request,
        user_id: userid
    }
    axios.post('/friendRrequest', data).then(response => {
        console.log(response.data);
        if (response.data['true']) {
            e.currentTarget.parentElement.innerHTML = "<span class='success'>You are now Friends</span>";
        }
        else {
            e.currentTarget.parentElement.innerHTML = "<span class='danger'>You canceled the friend request</span>";
        }
    })
});
