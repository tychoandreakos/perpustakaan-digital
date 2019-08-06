import Axios from "axios";

class User {
    login(data) {
        Axios.post('/api/auth/login', data)
        .then(res => console.log(res))
        .catch(err => console.log(err))
    }
}

export default User = new User();