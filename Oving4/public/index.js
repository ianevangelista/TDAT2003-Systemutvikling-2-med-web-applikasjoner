let myButton = document.querySelector("#myButton");

myButton.addEventListener("click", e => {
  console.log("Fikk klikk-event");
  let url = "/login";
  fetch(url, {
    method: "POST",
    headers: {
      "Content-Type": "application/json; charset=utf-8"
    },
    body: JSON.stringify({"brukernavn": document.getElementById("username").value, "passord": document.getElementById("password").value})
    
  })
    .then(response => response.json())
    .then(json => (localStorage.setItem("token", json.jwt)))
    .catch(error => console.error("Error: ", error));
    
});

btnGetPersoner.addEventListener("click", e => {
  console.log("Fikk klikk-event");
  let url1 = "api/person";
  let url2 = "/token";
  fetch(url1, {
    method: "GET",
    headers: {
      "x-access-token": localStorage.getItem("token")
    }
  })
    .then(response => response.json())
    .then(json => document.getElementById("allPersons").innerHTML=json.name)
    .catch(error => console.error("Error: ", error));

  fetch(url2, {
    method: "POST",
    headers: {
      "x-access-token": localStorage.getItem("token")
    }
  }) 
    .then(response => response.json())
    .then(json => (localStorage.setItem("token", json.jwt)))
    .catch(error => console.error("Error: ", error)); 
});


