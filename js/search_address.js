async function searchAddress(){
	let zipcode = document.getElementById('zipcode').value;
	if(zipcode !== ""){
		let response = await fetch('https://zipcloud.ibsnet.co.jp/api/search?zipcode='+zipcode);
		let result = await response.json();
		let address = document.getElementById('address');
		if(result.results !== null){
			address.value = result.results[0]['address1']+result.results[0]['address2']+result.results[0]['address3'];
		}
	}
}
