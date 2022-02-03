
const form=document.querySelector(".messagesendarea form"),
sendbutton=form.querySelector(".send button"),
messageer=form.querySelector(".messageer"),
errorsending=form.querySelector(".errorsending"),
messages=document.querySelector("#message");

form.onsubmit = (e) =>{
    e.preventDefault();
}
sendbutton.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST","c_chat/sendmessage.php", true);
    xhr.onload= ()=>{
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data=xhr.response;
                if (data == "success") { 
                messageer.value=" "; 
                }else{
                    messageer.value=" "; 
                    errorsending.textContent=data;
                }
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
    
}


messages.onmouseenter = () =>{
    messages.classList.add("active");
}

messages.onmouseleave = () =>{
    messages.classList.remove("active");
}

setInterval(() =>{  
    let xhr = new XMLHttpRequest();
    xhr.open("POST","c_chat/message.php", true);
    xhr.onload= ()=>{
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status == 200) {
                let data=xhr.response;
                messages.innerHTML=data;
                if (!messages.classList.contains("active")) { 
                   scrollToBottom();
                } 
                
                  
            }   
        }
    } 
    let formData = new FormData(form);
    xhr.send(formData); 
},500);

function scrollToBottom() {
   messages.scrollTop = messages.scrollHeight;
}