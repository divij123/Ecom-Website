var count=0;
function updateCart() {
	count++;

	document.getElementById("number").innerHTML = count;
}

    function toggleFormValid(){

      var name = document.getElementById('name').value;
      var mail = document.getElementById('email').value;
      var pass = document.getElementById('password').value;
      var error = document.getElementById('error');
      var btns2 = document.getElementById('submit').value;
      if(name=='' || email=='' || pass==''){
        document.getElementById("btns2").disabled = true;
        alert("Fill all the Fields");
        
      } else{
        document.getElementById("btns2").disabled = false;
        console.log("VALID yay");
      }
    }

     function validation(){
      var name = document.getElementById('name').value;
      var mail = document.getElementById('email').value;
      var pass = document.getElementById('password').value;
      var error = document.getElementById('error');
      var btns2 = document.getElementById('submit').value;
      if(name=='' || email=='' || pass==''){
        alert('All Fields are Required');
        return false;
      }

      if (!isValidName(name)) {
         alert('Invalid Name');
         return false;
      }

      if(!isEmail(mail)){
        alert('Invalid Mail Id');
        return false;
      }

    }

    function isValidName(name) {
      var regex = /^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$/;
      return regex.test(name);
    }

    function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
    }
