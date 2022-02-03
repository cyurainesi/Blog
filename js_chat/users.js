const searchBar=document.querySelector(".allcontainer .search input"),
searchBtn=document.querySelector(".allcontainer .search button"),
userList=document.querySelector(".userList");
searchBtn.onclick= ()=>{
	searchBar.classList.toggle("active");
}

searchBar.onkeyup = () =>{
	let searchTerm=searchBar.value;
	if (searchTerm != "") {
			searchBar.classList.add("active");
		}else{
			searchBar.classList.remove("active");
		}
	 let xhr = new XMLHttpRequest();
	xhr.open("POST","c_chat/search.php", true);
	xhr.onload= ()=>{
		if (xhr.readyState === XMLHttpRequest.DONE) {
			if (xhr.status == 200) {
				let data=xhr.response; 
				userList.innerHTML=data;
 
				 
			}
     	}
	} 
	xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
	xhr.send("searchTerm="+searchTerm);
}




setInterval(() =>{  
	let xhr = new XMLHttpRequest();
	xhr.open("POST","c_chat/friendschat.php", true);
	xhr.onload= ()=>{
		if (xhr.readyState === XMLHttpRequest.DONE) {
			if (xhr.status == 200) {
				let data=xhr.response;
				if (!searchBar.classList.contains("active")) { 
					userList.innerHTML=data; 
				} 
			}	
     	}
	} 
	xhr.send();
},500);
