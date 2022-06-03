function sizeCheck() {
	let mSize = document.getElementById("m_price").value;
	let lSize = document.getElementById("l_price").value;
	let size = document.getElementsByName("size");
	let sizePrice = 0;
	for(let i=0; i<size.length; i++){
		if(size[i].checked){
			if(size[i].value === "m"){
				sizePrice = mSize;
			}else if(size[i].value === "l"){
				sizePrice = lSize;
			}
		}
	}
	return Number(sizePrice);
}

function toppingCheck() {
	let toppings = document.getElementsByName("toppings[]");
	let sizeM = document.getElementById("size_m");
	let sizeL = document.getElementById("size_l");
	let toppingPrice = 0;
	for(let i=0; i<toppings.length; i++){
		if(toppings[i].checked){
			if(sizeM.checked){
				toppingPrice += 200;
			}else if(sizeL.checked){
				toppingPrice += 300;
			}
		}
	}
	return Number(toppingPrice);
}

function insertPrice() {
	let price = 0;
	let sizePrice = sizeCheck();
	price += sizePrice;
	let toppingPrice = toppingCheck();
	price += toppingPrice;
	let totalPrice = document.getElementById("total_price");
	totalPrice.innerHTML = price;
	document.getElementById("hidden_total_price").value = price;
}

window.onload = function(){
	insertPrice();
}
