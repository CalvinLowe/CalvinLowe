// URL to send the request to
var url = "../../backend/php/contact/contact.php";

// Add event handler to submit button
var submit = document.getElementById("submit");
submit.addEventListener("click", submitMessage);

// Form values
let name;
let email;
let subject;
let message;

// Get values from form inputs
function getFormValues() {
	name = document.getElementById("name").value;
	email = document.getElementById("email").value;
	subject = document.getElementById("subject").value;
	message = document.getElementById("message").value;
}

function submitMessage (event) {
	getFormValues();
	msg = new Message(name, email, subject, message);
	msg.send(url)
	.then(response => { // success arrow function
					console.log(response);
					console.log(response.response);
					console.log(response.message);
					// TODO: Create a response object and use to it create error/success/info messages
				})
	.catch(error => console.error(error));
	event.preventDefault();
}