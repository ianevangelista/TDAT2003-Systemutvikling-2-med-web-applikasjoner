let myButton = document.querySelector("#myButton");

myButton.addEventListener("click", event => {
    let myInput = document.getElementById("input").value;
    console.log(myInput);
    let url = "http://bigdata.stud.iie.ntnu.no/sentiment/webresources/sentiment/log?api-key=Happy!!!";

    fetch(url, {
    method: "POST",
    headers: {
    "Content-Type": "application/json; charset=utf-8"
    },
    body: JSON.stringify({sentence: myInput})})

    .then(response => response.json())
    .then(json => color(json.value))
    .catch(error => console.error("Error: ", error)); 
});

function color(value){
    if(value == 0){
        document.body.style.backgroundColor = "red";
        console.log(value)
    }
    else if(value == 1){
        document.body.style.backgroundColor = "orange";
        console.log(value)
    }
    else if(value == 2){
        document.body.style.backgroundColor = "yellow";
        console.log(value)
    }
    else if(value == 3){
        document.body.style.backgroundColor = "lightgreen";
        console.log(value)
    }
    else if(value == 4){
        document.body.style.backgroundColor = "green";
        console.log(value)
    }
}