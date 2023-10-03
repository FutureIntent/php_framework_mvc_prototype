const attr = {
    credentials: 'include',
    headers: {
        "Content-Type": "application/json"
    }
}

const message = document.getElementById('message');

fetch('/user/logout', {
    method: 'POST',
    ...attr
})
.then(res => res.json())
.then(res => {
    message.innerHTML = res.message;
    console.log(res);
})
.catch(err => console.log(err))