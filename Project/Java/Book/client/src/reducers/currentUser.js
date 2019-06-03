import * as Types from './../constants/ActionType';
var initialState = {};
let user = JSON.parse(localStorage.getItem('current_user'));
initialState = user ? user : initialState;

const currentUser = (state = initialState, action) => {
    switch(action.type){
        case Types.LOG_OUT:
            localStorage.setItem('current_user', JSON.stringify({id: -1}));
            return null;
        default :
            return state;
    }
}

export default currentUser;