var url = "../../backend/php/contact/contact.php";
//Users/calvinlowe/Developer/WebDevProjects/CalvinLowe/backend/php/contact/contact.php
///Users/calvinlowe/Developer/WebDevProjects/CalvinLowe/www/js/contact.js
// TODO: define msg object from grabbing from contact form.. after validation??

// Test vars..
var name = "Calvin";
var email = "calvinwlowe@gmail.com";
var subject = "New job";
var message = "Hey man this is a test message";

msg = new Message(name, email, subject, message);

msg.send(url)
.then(response => { // success arrow function
					console.log(JSON.stringify(response));
					if (response.response === 'failure') {
						// do something
					} else if (response.response === 'success') {
						// do something else
					}
				})
.catch(error => console.error(error));

