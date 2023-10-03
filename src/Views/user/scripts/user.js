const attr = {
    credentials: 'include',
    headers: {
        "Content-Type": "application/json"
    }
}

const register = () => {

    const email = document.getElementById('email').value;
    const name = document.getElementById('name').value;
    const password = document.getElementById('password').value;
    const message = document.getElementById('message');

    const req_body = {
        'email': email,
        'name': name,
        'password': password
    }

    fetch('/user/register', {
        method: 'POST',
        body: JSON.stringify(req_body),
        ...attr
    })
    .then(res => res.json())
    .then(res => {
        message.innerHTML = res.message;
        console.log(res);
    })
    .catch(err => console.log(err))

}

const login = () => {

    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const message = document.getElementById('message');

    req_body = {
        'email': email,
        'password': password
    }

    fetch('/user/login', {
        method: 'POST',
        body: JSON.stringify(req_body),
        ...attr
    })
    .then(res => res.json())
    .then(res => {
        message.innerHTML = res.message;
        console.log(res);
    })
    .catch(err => console.log(err))
}