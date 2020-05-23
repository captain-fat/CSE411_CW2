function changeclass(inp){
	var ele = document.querySelector("body");
	var name = ele.classList.item(0);
	ele.classList.replace(name, inp);

}

var apples = ["apple1.jpg", "apple2.jpg", "apple3.jpg", "apple4.jpg", "apple5.jpg"]

var ele_img = document.querySelector("#Imgtest");
ele_img.addEventListener("click", doSomething, false)
var i = 0;

function doSomething() {
    for (i; i < apples.length; i++){
		ele_img.src = "images/" + apples[i];
		i++;
		if (i == apples.length){
			i = 0;
		}
		break;
	}
}

window.addEventListener("keydown", checkKey, false);

function checkKey(e) {
    if (e.keyCode == "39") {
        window.open("apple.html");
    }
}

function getcal(sym){
	switch (sym)
	{
	case "plus":
		return "+";
		break;
	case "minus":
		return "-";
		break;
	case "mul":
		return "*";
		break;
	case "div":
		return "/";
		break;
	}
}

function disp(inp1, inp2, sym){
	if (inp1 == "" || inp2 == ""){
		alert("Empty");
	}
	else{
		switch (sym){
			case "plus":
				var results = Number(inp1) + Number(inp2);
				document.getElementById("res").value=results;
				break;
			case "minus":
				var results = inp1 - inp2;
				document.getElementById("res").value=results;
				break;
			case "mul":
				var results = inp1 * inp2;
				document.getElementById("res").value=results;
				break;
			case "div":
				var results = inp1 / inp2;
				document.getElementById("res").value=results;
				break;
		}
	}
}
