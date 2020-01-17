import URL from './url';
import axios from 'axios';

export default {
    all(then) {
        axios.get(URL.all).then(then);
    },
    create(data, then) {
        axios.post(URL.create, data).then(then);
    }
}